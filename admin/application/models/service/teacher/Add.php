<?php
class Service_Teacher_AddModel extends BasePageService {

	protected $provinceModel;
	protected $province;
	protected $resData = [];

	protected static $grade = [
        "11" => '小学1年级',
        "12" => '小学2年级',
        "13" => '小学3年级',
        "14" => '小学4年级',
        "15" => '小学5年级',
        "16" => '小学6年级',
        "21" => '初中1年级',
        "22" => '初中2年级',
        "23" => '初中3年级',
        "31" => '高中1年级',
        "32" => '高中2年级',
        "33" => '高中3年级'
    ];

    protected static $sex = [
    	'0' => '男',
    	'1' => '女',
    ];

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
		$this->resData['gradeList'] = self::$grade;
		$this->resData['sex'] = self::$sex;

		return $this->resData;

	}

}