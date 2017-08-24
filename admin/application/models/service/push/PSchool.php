<?php
class Service_Push_PSchoolModel extends BasePageService {

	protected $userModel;

	public function __construct(){
		$this->userModel = Dao_UserModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		$schoolIds = explode('|', $req['schoolIds']);
		array_walk($schoolIds,array($this,'trimValue'));

		$whereUser = [
			'schoolinfo.schoolid' => ['$in' => $schoolIds],
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

		$deviceToken['ios'] = array_chunk($deviceToken['ios'],500);
		$deviceToken['android'] = array_chunk($deviceToken['android'],500);

		var_dump($deviceToken['android']);
		exit;


		$data['theme'] = trim($req['theme']);
		$data['content'] = trim($req['description']);
		$deviceToken['ios'] = implode("," , $deviceToken['ios']);
		$deviceToken['android'] = implode("," , $deviceToken['android']);

		// $uMPush = new UmengPush();
		// if(!empty($deviceToken['ios'])){
		// 	$retIos = $uMPush->iosPushByListcast($data['theme'],$data['content'],$deviceToken['ios']);
		// }
		
		// if(!empty($deviceToken['android'])){
		// 	$retAndroid = $uMPush->androidPushByListcast($data['theme'],$data['content'],$deviceToken['android']);
		// }

		// return ;

	}

	protected function trimValue(&$value,$key){
		$value = trim($value);
	}

}