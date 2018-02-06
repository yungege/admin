<?php
class Service_Teacher_InsertModel extends BasePageService {

	protected $classModel;
	protected $schoolModel;
	protected $userModel;

	protected $userInfo;
	protected $schoolInfo;
	protected $schoolId;

	public function __construct(){

		$this->classModel = Dao_ClassinfoModel::getInstance();
		$this->schoolModel = Dao_SchoolinfoModel::getInstance();
		$this->userModel = Dao_UserModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){
		
		$req = $req['post'];
		$req['type'] = (int)$req['type'];
		if( 
			empty($req['school']) ||
			!preg_match('/^\w+$/',$req['school']) ||
			empty($req['username']) ||
			empty($req['type']) ||
			in_array([1,2,3],(int)$req['type'])
			){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		if($req['type'] === 1){

			$classInfos = $this->classModel->getClassBySchool($req['school'],['_id','name'],[]);
		}

		if($req['type'] === 2){
			$where = [
				'schoolid' => $req['school'],
				'grade' => (int)$req['grade'],
				'is_test' => 0,
			];
			$classInfos = $this->classModel->getList($where,['_id','name'],[]);
		}

		if($req['type'] === 3){

			$classIds = explode('|',$req['class']);
			$classIds = array_map([$this,'trimClassId'],$classIds);
			$where = [
				'_id' => ['$in' => $classIds],
			];
			$classInfos = $this->classModel->getList($where,['_id','name'],[]);
		}

		$classInfos = array_map([$this,'classDisplay'],$classInfos);

		$this->schoolId = $req['school'];
		$schoolFiedls = ['name','_id'];
		$this->schoolInfo = $this->schoolModel->getSchoolById($this->schoolId,$schoolFiedls);

		if(empty($this->schoolInfo)){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$this->userInfo['type'] = 2;
		$this->userInfo['username'] = trim($req['username']);
		$this->userInfo['nickname'] = $this->userInfo['username'];
		$this->userInfo['schoolinfo']['schoolid'] = $this->schoolId;
		$this->userInfo['schoolinfo']['schoolname'] = $this->schoolInfo['name'];
		$this->userInfo['manageclassinfo'] = $classInfos;

		$result = $this->userModel->insert($this->userInfo);

		if($result !== false){
			$this->resData['userId'] = $result;
			return $this->resData;
		}else{
			return $this->errNo = USER_ADD_FAILED;
		}
	}

	protected function trimClassId($classId){
		return trim($classId);
	}

	protected function classDisplay($classInfo){
		$classData = [
			'classid' => $classInfo['_id'],
			'classname' => $classInfo['name'],
		];

		return $classData;
	}

}
