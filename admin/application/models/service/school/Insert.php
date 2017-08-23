<?php
class Service_School_InsertModel extends BasePageService {

	protected $schoolModel;
	protected $resData = [];

	public function __construct(){

		$this->schoolModel = Dao_SchoolinfoModel::getInstance();

	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];

		if(empty($req['name']) || empty($req['province']) || empty($req['city']) || empty($req['district']) || $req['district'] == -1 ){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$schoolWhere = [
			'name' => trim($req['name']),
			'city' => trim($req['city']),
		];
		$options['projection'] = [
			'_id' => 1,
		];

		$schoolInfo = $this->schoolModel->queryOne($schoolWhere,$options);
		if(!empty($schoolInfo)){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$data['name'] = trim($req['name']);
		$data['createtime'] = time();
		$data['province'] = $req['province'];
		$data['city'] = $req['city'];
		$data['district'] = $req['district'];
		if(!empty($req['adress'])){
			$data['adress'] = $req['adress'];
		}

		if(!empty($req['introduction'])){
			$data['introduction'] = $data['introduction'];
		}

		$result = $this->schoolModel->insert($data);

		if($result !== false){
			$this->resData['schoolId'] = $result;
			return $this->resData;
		}else{
			return $this->errNo = SCHOOL_ADD_FAULT;
		}
		
	}

}