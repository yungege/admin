<?php
class Service_Push_PSchoolModel extends BasePageService {

	protected $theme;
	protected $content;
	protected $deviceToken = [];
	protected $userInfos;
	protected $schoolIds;
	protected $message;

	protected $userModel;
	protected $messageModel;
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
		if(empty($req['theme']) || empty($req['description']) || empty($req['schoolIds'])){
			
			$this->errNo = REQUEST_PARAMS_ERROR;
			return false;
		}

		$this->schoolIds = explode('|', $req['schoolIds']);
		$this->theme = trim($req['theme']);
		$this->content = trim($req['description']);
		array_walk($this->schoolIds,array($this,'trimValue'));

		foreach($this->schoolIds as $schoolId){
			$this->message['platform'] = 3;
			$this->message['type'] = 3;
			$this->message['title'] = $this->theme;
			$this->message['to_id'] = $schoolId;
			$this->message['sendtime'] = time();
			$this->message['content'] = $this->content;
			$this->message['status'] = 1;
			$this->message['ctime'] = time();
			$this->message['utime'] = time();
			$result = $this->messageModel->insert($this->message);
		}

		$whereUser = [
			'schoolinfo.schoolid' => ['$in' => $this->schoolIds],
			'devicetoken' => [ '$nin' => [null , ""]],
		];

		$option['projection'] = [
			'devicetoken' => 1 ,
			'clientsource' => 1 ,
		];

		$this->deviceToken['ios'] = [];
		$this->deviceToken['android'] = [];
		$this->userInfos = $this->userModel->query($whereUser,$option);

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
			$this->deviceToken['ios'] = array_chunk($this->deviceToken['ios'],2);
			array_walk($this->deviceToken['ios'],array($this,'pushByIos'));
		}
	
		if(!empty($this->deviceToken['android'])){

			$this->deviceToken['android'] = array_unique($this->deviceToken['android']);
			$this->deviceToken['android'] = array_chunk($this->deviceToken['android'],2);
			array_walk($this->deviceToken['android'],array($this,'pushByAndroid'));
		}

		return ;
	}

	protected function trimValue(&$value,$key){

		$value = trim($value);
	}

	protected function pushByIos($deviceToken){

		$deviceToken = implode("," , $deviceToken);
		$this->uMPush->iosPushByListcast($this->theme,$this->content,$deviceToken);
		return true;
	}

	protected function pushByAndroid($deviceToken){

		$deviceToken = implode("," , $deviceToken);
		$this->uMPush->androidPushByListcast($this->theme,$this->content,$deviceToken);
		return true;
	}

}