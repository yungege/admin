<?php
class Service_Push_PUserModel extends BasePageService {

	protected $userModel;
	protected $uMPush;
	protected $messageModel;

	protected $deviceToken = [];
	protected $theme;
	protected $content;
	protected $desc;
	protected $userInfos;
	protected $userIds;

	public function __construct(){

		$this->uMPush = new UmengPush();
		$this->userModel = Dao_UserModel::getInstance();
		$this->messageModel = Dao_MessageModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		if(empty($req['theme']) || empty($req['description']) || empty($req['userIds']) || empty($req['content']) || empty($req['type'])){

			$this->errNo = REQUEST_PARAMS_ERROR;
			return false;
		}

		$this->userIds = explode('|', $req['userIds']);
		array_walk($this->userIds,array($this,'trimValue'));

		$whereUser = [
			'_id' => ['$in' => $this->userIds],
			'devicetoken' => [ '$nin' => [null , ""]],
		];

		$option['projection'] = [
			'devicetoken' => 1 ,
			'clientsource' => 1 ,
			'_id' =>1
		];

		$this->deviceToken['ios'] = [];
		$this->deviceToken['android'] = [];
		$this->theme = trim($req['theme']);
		$this->content = trim($req['content']);
		$this->desc = trim($req['description']);
		$this->userInfos = $this->userModel->query($whereUser,$option);
		$this->desc = str_replace("\r\n","",$this->desc);
		$this->content = str_replace("\r\n","",$this->content);

		foreach($this->userInfos as $userInfo){
			$this->message['platform'] = 1;
			$this->message['type'] = (int)$req['type'];
			$this->message['title'] = $this->theme;
			$this->message['to_id'] = $userInfo['_id'];
			$this->message['sendtime'] = time();
			$this->message['desc'] = $this->desc;
			$this->message['content'] = $this->content;
			$this->message['status'] = 1;
			$this->message['ctime'] = time();
			$this->message['utime'] = time();
			$result = $this->messageModel->insert($this->message);
		}

		foreach($this->userInfos as $userInfo){
			if($userInfo['clientsource'] == 'ios' && !empty($userInfo['devicetoken'])){
				array_push($this->deviceToken['ios'],$userInfo['devicetoken']);
			}
			if($userInfo['clientsource'] == 'android' && !empty($userInfo['devicetoken']) ){
				array_push($this->deviceToken['android'],$userInfo['devicetoken']);
			}
		}

		$this->deviceToken['ios'] = implode("," , $this->deviceToken['ios']);
		$this->deviceToken['android'] = implode("," , $this->deviceToken['android']);

		if(!empty($this->deviceToken['ios'])){

			$retIos = $this->uMPush->iosPushByListcast($this->theme,$this->desc,$this->deviceToken['ios']);
		}
	
		if(!empty($this->deviceToken['android'])){

			$retAndroid = $this->uMPush->androidPushByListcast($this->theme,$this->desc,$this->deviceToken['android']);
		}

		return ;

	}

	protected function trimValue(&$value,$key){
		$value = trim($value);
	}

}