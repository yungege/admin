<?php
class Service_Push_PClassModel extends BasePageService {

	protected $theme;
	protected $content;
	protected $deviceToken = [];
	protected $userInfo;

	protected $userModel;
	protected $uMPush;

	public function __construct(){

		$this->userModel = Dao_UserModel::getInstance();
		$this->uMPush = new UmengPush();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		$classIds = explode('|', $req['classIds']);

		$this->theme = trim($req['theme']);
		$this->content = trim($req['description']);
		array_walk($classIds,array($this,'trimValue'));

		$whereUser = [
			'classinfo.classid' => ['$in' => $classIds],
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
			// array_walk($this->deviceToken['android'],array($this,'pushByAndroid'));
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