<?php
class Service_Push_ProvinceModel extends BasePageService {

	protected $provinceModel;
	protected $resData = [];
	protected $provinceList = [];

	public function __construct(){
		
		$this->provinceModel = Dao_ProvinceModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$provinceWhere = [ ];
		$provinceOptions['projection'] = ['name'];
		$this->provinceList = $provinceModel->query($provinceWhere,$provinceOptions);

		var_dump($this->provinceList);
		exit;

		return $this->resData;

	}

}