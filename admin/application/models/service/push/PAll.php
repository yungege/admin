<?php
class Service_Push_PAllModel extends BasePageService {

	public function __construct(){
		
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		$data['theme'] = trim($req['theme']);
		$data['content'] = trim($req['description']);

		$uMPush = new UmengPush();
		$retIos = $uMPush->iosPushByBroadcast($data['theme'],$data['content']);
		$retAndroid = $uMPush->androidPushByBroadcast($data['theme'],$data['content']);

		return ;

	}

}