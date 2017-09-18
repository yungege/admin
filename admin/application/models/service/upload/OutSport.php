<?php
class Service_Upload_OutSportModel extends BasePageService {

	protected $provinceModel;
	protected $province;
	protected $resData = [];

	public function __construct(){

		$this->provinceModel = Dao_ProvinceModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$where = [];
		$options['projection'] = ['name' => 1];
		$this->province = $this->provinceModel->query($where,$options);
		$this->province = array_column($this->province,'name','_id');
		$this->resData['provinceList'] = $this->province;

		return $this->resData;

	}

}