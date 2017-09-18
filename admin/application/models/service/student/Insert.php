<?php
class Service_Student_InsertModel extends BasePageService {

	protected $classModel;
	protected $schoolModel;
	protected $userModel;

	protected $userInfo;
	protected $schoolInfo;
	protected $classInfo;
	protected $schoolId;
	protected $classId;

	public function __construct(){

		$this->classModel = Dao_ClassinfoModel::getInstance();
		$this->schoolModel = Dao_SchoolinfoModel::getInstance();
		$this->userModel = Dao_UserModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){
		
		$req = $req['post'];
		if( empty($req['grade']) ||
			!preg_match('/^\d+$/',$req['grade']) ||
			empty($req['class']) ||
			!preg_match('/^\w+$/',$req['class']) ||
			empty($req['school']) ||
			!preg_match('/^\w+$/',$req['school']) ||
			empty($req['username']) ||
			empty($req['birthday']) ||
			!strtotime($req['birthday']) ||
<<<<<<< HEAD
	//		empty($req['sex']) ||
=======
<<<<<<< HEAD
	//		empty($req['sex']) ||
=======
			// empty($req['sex']) ||
>>>>>>> 6a458b29c95397511f5674c2a53df40fdef08b8e
>>>>>>> 56c9bb418d48cd9f4e8c75630650715e9f0bdfd3
			!preg_match('/^[0-1]$/',$req['sex'])
			){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}
		
		$this->schoolId = $req['school'];
		$schoolFiedls = ['name','_id'];
		$this->schoolInfo = $this->schoolModel->getSchoolById($this->schoolId,$schoolFiedls);

		$this->classId = $req['class'];
		$classFields = ['name','_id'];
		$this->classInfo = $this->classModel->getClassInfoByClassId($this->classId,$classFields);

		if(empty($this->schoolInfo) || empty($this->classInfo)){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$this->userInfo['type'] = 1;
		$this->userInfo['sex'] = (int)$req['sex'];
		$this->userInfo['username'] = trim($req['username']);
		$this->userInfo['nickname'] = $this->userInfo['username'];
		$this->userInfo['birthday'] = strtotime($req['birthday']);
		$this->userInfo['grade'] = (int)$req['grade'];
		$this->userInfo['schoolinfo']['schoolid'] = $this->schoolId;
		$this->userInfo['schoolinfo']['schoolname'] = $this->schoolInfo['name'];
		$this->userInfo['classinfo']['classid'] = $this->classId;
		$this->userInfo['classinfo']['classname'] = $this->classInfo['name'];
		$result = $this->userModel->insert($this->userInfo);

		if($result !== false){
			$this->resData['userId'] = $result;
			return $this->resData;
		}else{
			return $this->errNo = USER_ADD_FAILED;
		}
	}

}
