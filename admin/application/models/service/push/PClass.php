<?php
class Service_Push_PClassModel extends BasePageService {

	protected $theme;
	protected $content;
	protected $desc;
	protected $type;
	protected $deviceToken = [];
	protected $userInfos;
	protected $classIds;
	protected $messageModel;

	protected $userModel;
	protected $uMPush;

	public function __construct(){

		$this->userModel = Dao_UserModel::getInstance();
		$this->messageModel = Dao_MessageModel::getInstance();
		$this->uMPush = new UmengPush();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		if(empty($req['theme']) || empty($req['description']) || empty($req['classIds']) || empty($req['content']) || empty($req['type'])){
			
			$this->errNo = REQUEST_PARAMS_ERROR;
			return false;
		}

		$this->classIds = explode('|', $req['classIds']);
		$this->type = (int)$req['type'];
		$this->theme = trim($req['theme']);
		$this->content = trim($req['content']);
		$this->desc = trim($req['description']);
		$this->desc = str_replace("\r\n","",$this->desc);
		$this->content = str_replace("\r\n","",$this->content);
		array_walk($this->classIds,array($this,'trimValue'));

		$whereUser = [
			'classinfo.classid' => ['$in' => $this->classIds],
			'devicetoken' => [ '$nin' => [null , ""]],
		];

		$option['projection'] = [
			'devicetoken' => 1 ,
			'clientsource' => 1 ,
		];

		$this->deviceToken['ios'] = [];
		$this->deviceToken['android'] = [];
		$this->userInfos = $this->userModel->query($whereUser,$option);

		foreach($this->classIds as $classId){
			$this->message['platform'] = 2;
			$this->message['type'] = $this->type;
			$this->message['title'] = $this->theme;
			$this->message['to_id'] = $classId;
			$this->message['sendtime'] = time();
			$this->message['content'] = $this->content;
			$this->message['desc'] = $this->desc;
			$this->message['status'] = 1;
			$this->message['ctime'] = time();
			$this->message['utime'] = time();
			$result = $this->messageModel->insert($this->message);
		}

		foreach($this->userInfos as $userInfo){

			if($userInfo['clientsource'] == 'ios' && !empty($userInfo['devicetoken'])){
				array_push($this->deviceToken['ios'],$userInfo['devicetoken']);
			}

			if($userInfo['clientsource'] == 'android' && !empty($userInfo['devicetoken'])){
				array_push($this->deviceToken['android'],$userInfo['devicetoken']);
			}
		}

		if(!empty($this->deviceToken['ios'])){

			$this->deviceToken['ios'] = array_unique($this->deviceToken['ios']);
			$this->deviceToken['ios'] = array_chunk($this->deviceToken['ios'],500);
			array_walk($this->deviceToken['ios'],array($this,'pushByIos'));
		}
	
		if(!empty($this->deviceToken['android'])){

			$this->deviceToken['android'] = array_unique($this->deviceToken['android']);
			$this->deviceToken['android'] = array_chunk($this->deviceToken['android'],500);
			array_walk($this->deviceToken['android'],array($this,'pushByAndroid'));
		}

		return ;
	}

	protected function trimValue(&$value,$key){

		$value = trim($value);
	}

	protected function pushByIos($deviceToken){

		$deviceToken = implode("," , $deviceToken);
		$this->uMPush->iosPushByListcast($this->theme,$this->desc,$deviceToken);
		return true;
	}

	protected function pushByAndroid($deviceToken){

		$deviceToken = implode("," , $deviceToken);
		$this->uMPush->androidPushByListcast($this->theme,$this->desc,$deviceToken);
		return true;
	}

}