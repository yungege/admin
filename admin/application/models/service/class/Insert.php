<?php
class Service_Class_InsertModel extends BasePageService {

	protected $classModel;
	protected $schoolModel;

	protected $gradeList = [
		11 => '1年级',
		12 => '2年级',
		13 => '3年级',
		14 => '4年级',
		15 => '5年级',
		16 => '6年级',
		21 => '初1年级',
		22 => '初2年级',
		23 => '初3年级',
		31 => '高1年级',
		32 => '高2年级',
		33 => '高3年级',
	];

	protected $classList = [
		1 => '1班',
		2 => '2班',
		3 => '3班',
		4 => '4班',
		5 => '5班',
		6 => '6班',
		7 => '7班',
		8 => '8班',
		9 => '9班',
		10 => '10班',
		11 => '11班',
		12 => '12班',
		13 => '13班',
		14 => '14班',
		15 => '15班',
		16 => '16班',
		17 => '17班',
		18 => '18班',
		19 => '19班',
		20 => '20班',
		21 => '21班',
		22 => '22班',
		23 => '23班',
		24 => '24班',
		25 => '25班',
		26 => '26班',
		27 => '27班',
		28 => '28班',
		29 => '29班',
		30 => '30班',
	];

	protected $resData = [];

	public function __construct() {

		$this->classModel = Dao_ClassinfoModel::getInstance();
		$this->schoolModel = Dao_SchoolinfoModel::getInstance();
	}

	protected function __declare() {

	}

	protected function __execute($req) {

		$req = $req['post'];
		if(empty($req['schoolId']) || empty($req['grade']) || empty($req['classNo']) || empty($req['startTime'])){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}
		$data['schoolId'] = trim($req['schoolId']);
		$fields = ['_id' , 'name'];
		$schoolInfo = $this->schoolModel->getSchoolById($data['schoolId'],$fields);
		if(empty($schoolInfo)){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$classWhere = [
			'schoolid' => $data['schoolId'],
			'classno' => (int)$req['classNo'],
			'grade' => (int)$req['grade'],
		];

		$classInfo = $this->classModel->queryOne($classWhere);
		if(!empty($classInfo)){
			
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$schoolFields = ['name','_id','adress'];
		$schoolInfo = $this->schoolModel->getSchoolById($req['schoolId'],$schoolFields);

		$data['name'] = $this->gradeList[$req['grade']] . $this->classList[$req['classNo']];
		$data['schoolid'] = trim($req['schoolId']);
		$data['schoolname'] = $schoolInfo['name'];
		$data['createtime'] = time();
		$data['grade'] = (int)$req['grade'];
		$data['admissiontime'] = strtotime($req['startTime']);
		$data['classno'] = (int)$req['classNo'];
		$data['is_test'] = 0;

		$res = $this->classModel->insert($data);
		
		if($res === false){
			return $this->errNo = CLASS_ADD_FAULT;
		}
		$this->resData['classId'] = $res;
		
		return $this->resData;
	}

}