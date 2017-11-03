<?php
class Service_Push_PGradeModel extends BasePageService {

	protected $theme;
	protected $content;
	protected $desc;
	protected $type;
	protected $deviceToken = [];
	protected $userInfos;
	protected $schoolIds;
	protected $selectedGrade;
	protected $classInfos;
	protected $classIds;

	protected $messageModel;
	protected $userModel;
	protected $classModel;
	protected $uMPush;

	public function __construct(){

		$this->userModel = Dao_UserModel::getInstance();
		$this->classModel = Dao_ClassinfoModel::getInstance();
		$this->messageModel = Dao_MessageModel::getInstance();
		$this->uMPush = new UmengPush();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		if(empty($req['theme']) || empty($req['desc']) || empty($req['schoolIds']) || empty($req['grade']) || empty($req['content']) || empty($req['type'])){
			
			$this->errNo = REQUEST_PARAMS_ERROR;
			return false;
		}

		$this->schoolIds = explode('|', $req['schoolIds']);
		$this->type = (int)$req['type'];
		$this->theme = trim($req['theme']);
		$this->desc = trim($req['desc']);
		$this->content = trim($req['content']);
		$this->desc = str_replace("\r\n","",$this->desc);
		$this->content = str_replace("\r\r","",$this->content);
		$this->selectedGrade = explode('|' , $req['grade']);
		array_walk($this->schoolIds,array($this,'trimValue'));
		array_walk($this->selectedGrade,array($this,'gradeToInt'));

		$whereUser = [
			'schoolinfo.schoolid' => ['$in' => $this->schoolIds],
			'devicetoken' => [ '$nin' => [null , ""]],
			'grade' => ['$in' => $this->selectedGrade],
		];

		$option['projection'] = [
			'devicetoken' => 1 ,
			'clientsource' => 1 ,
		];

		$this->deviceToken['ios'] = [];
		$this->deviceToken['android'] = [];
		$this->userInfos = $this->userModel->query($whereUser,$option);

		$classWhere = [
			'schoolid' => ['$in' => $this->schoolIds],
			'grade' => ['$in' => $this->selectedGrade],
		];

		$classOptions['projection'] = [
			'_id' => 1,
		];

		$this->classInfos = $this->classModel->query($classWhere,$classOptions);
		$this->classIds = array_column($this->classInfos,'_id');

		foreach($this->classIds as $classId){
			$this->message['platform'] = 2;
			$this->message['type'] = $this->type;
			$this->message['title'] = $this->theme;
			$this->message['to_id'] = $classId;
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
		$this->uMPush->iosPushByListcast($this->theme,$this->desc,$deviceToken);
		return true;
	}

	protected function pushByAndroid($deviceToken){

		$deviceToken = implode("," , $deviceToken);
		$this->uMPush->androidPushByListcast($this->theme,$this->desc,$deviceToken);
		return true;
	}

	protected function gradeToInt(&$value,$key){

		$value = (int)$value;
	}

}