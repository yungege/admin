<?php
class Service_Push_PAllModel extends BasePageService {

	public function __construct(){
		$this->userModel = Dao_UserModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		$data['theme'] = trim($req['theme']);
		$data['content'] = trim($req['description']);

		$uMPush = new UmengPush();
		if(!empty($deviceToken['ios'])){
			$retIos = $uMPush->iosPushByBroadcast($data['theme'],$data['content']);
		}
		
		if(!empty($deviceToken['android'])){
			$retAndroid = $uMPush->androidPushByBroadcast($data['theme'],$data['content']);
		}


		var_dump(11);
		exit;

		return ;

	}

}