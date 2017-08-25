<?php
class Service_School_InsertModel extends BasePageService {

	protected $schoolModel;
	protected $provinceModel;
	protected $cityModel;
	protected $districtModel;

	protected $resData = [];
	protected $provinceInfo;
	protected $cityInfo;
	protected $districtInfo;


	public function __construct(){

		$this->schoolModel = Dao_SchoolinfoModel::getInstance();
		$this->provinceModel = Dao_ProvinceModel::getInstance();
		$this->cityModel = Dao_CityModel::getInstance();
		$this->districtModel = Dao_DistrictModel::getInstance();

	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];

		if(empty($req['name']) || empty($req['province']) || empty($req['city']) || empty($req['district']) || $req['district'] == -1 ){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		$data['name'] = trim($req['name']);
		$data['createtime'] = time();
		$data['province_id'] = trim($req['province']);
		$data['city_id'] = trim($req['city']);
		$data['district_id'] = trim($req['district']);

		$provinceWhere = [
			'_id' => $data['province_id'],
		];
		$pOptions['projection'] = ['name' => 1];
		$this->provinceInfo = $this->provinceModel->queryOne($provinceWhere,$pOptions);
		if(empty($this->provinceInfo)){
			$this->errNo = PROVINCE_NOT_EXIST;
            return false;
		}
		$data['province'] = $this->provinceInfo['name'];

		$cityWhere = [
			'_id' => $data['city_id'],
		];
		$cOptions['projection'] = ['name' => 1];
		$this->cityInfo = $this->cityModel->queryOne($cityWhere,$cOptions);
		if(empty($this->cityInfo)){
			$this->errNo = CITY_NOT_EXIST;
            return false;
		}
		$data['city'] = $this->cityInfo['name'];

		$districtWhere = [
			'_id' => $data['district_id'],
		];
		$dOptions['projection'] = ['name' => 1];
		$this->districtInfo = $this->districtModel->queryOne($districtWhere,$dOptions);
		if(empty($this->districtInfo)){
			$this->errNo = DISTRICT_NOT_EXIST;
            return false;
		}
		$data['district'] = $this->districtInfo['name'];

		$schoolWhere = [
			'name' => trim($req['name']),
			'city_id' => $data['city_id'],
		];
		$options['projection'] = [
			'_id' => 1,
		];

		$schoolInfo = $this->schoolModel->queryOne($schoolWhere,$options);
		if(!empty($schoolInfo)){
			$this->errNo = REQUEST_PARAMS_ERROR;
            return false;
		}

		if(!empty($req['adress'])){
			$data['adress'] = trim($req['adress']);
		}

		if(!empty($req['introduction'])){
			$data['introduction'] = trim($data['introduction']);
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