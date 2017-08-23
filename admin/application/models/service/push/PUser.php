<?php
class Service_Push_PUserModel extends BasePageService {

	protected $userModel;

	public function __construct(){
		$this->userModel = Dao_UserModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		$userIds = explode('|', $req['userIds']);
		array_walk($userIds,array($this,'trimValue'));

		$whereUser = [
			'_id' => ['$in' => $userIds],
			'devicetoken' => [ '$nin' => [null , ""]],
		];

		$option['projection'] = [
			'devicetoken' => 1 ,
			'clientsource' => 1 ,
		];

		$deviceToken['ios'] = [];
		$deviceToken['android'] = [];
		$userInfos = $this->userModel->query($whereUser,$option);

		foreach($userInfos as $userInfo){
			if($userInfo['clientsource'] == 'ios' && !empty($userInfo['devicetoken'])){
				array_push($deviceToken['ios'],$userInfo['devicetoken']);
			}
			if($userInfo['clientsource'] == 'android'){
				array_push($deviceToken['android'],$userInfo['devicetoken']);
			}
		}

		$data['theme'] = trim($req['theme']);
		$data['content'] = trim($req['description']);
		$deviceToken['ios'] = implode("," , $deviceToken['ios']);
		$deviceToken['android'] = implode("," , $deviceToken['android']);

		$uMPush = new UmengPush();
		$retIos = $uMPush->iosPushByListcast($data['theme'],$data['content'],$deviceToken['ios']);
		$retAndroid = $uMPush->androidPushByListcast($data['theme'],$data['content'],$deviceToken['android']);

		return ;

	}

	protected function trimValue(&$value,$key){
		$value = trim($value);
	}



}