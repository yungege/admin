<?php
class Service_Push_PUserModel extends BasePageService {

	protected $userModel;
	protected $uMPush;

	protected $deviceToken = [];
	protected $theme;
	protected $content;
	protected $userInfos;
	protected $userIds;

	public function __construct(){

		$this->uMPush = new UmengPush();
		$this->userModel = Dao_UserModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		if(empty($req['theme']) || empty($req['description']) || empty($req['userIds'])){

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
		];

		$this->deviceToken['ios'] = [];
		$this->deviceToken['android'] = [];
		$this->userInfos = $this->userModel->query($whereUser,$option);

		foreach($this->userInfos as $userInfo){
			if($userInfo['clientsource'] == 'ios' && !empty($userInfo['devicetoken'])){
				array_push($this->deviceToken['ios'],$userInfo['devicetoken']);
			}
			if($userInfo['clientsource'] == 'android' && !empty($userInfo['devicetoken']) ){
				array_push($this->deviceToken['android'],$userInfo['devicetoken']);
			}
		}

		$this->theme = trim($req['theme']);
		$this->content = trim($req['description']);
		$this->deviceToken['ios'] = implode("," , $this->deviceToken['ios']);
		$this->deviceToken['android'] = implode("," , $this->deviceToken['android']);

		if(!empty($this->deviceToken['ios'])){

			$retIos = $this->uMPush->iosPushByListcast($this->theme,$this->content,$this->deviceToken['ios']);
		}
	
		if(!empty($this->deviceToken['android'])){

			$retAndroid = $this->uMPush->androidPushByListcast($this->theme,$this->content,$this->deviceToken['android']);
		}

		return ;

	}

	protected function trimValue(&$value,$key){
		$value = trim($value);
	}

}