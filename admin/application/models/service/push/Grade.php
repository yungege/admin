<?php
class Service_Push_GradeModel extends BasePageService {

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

	public function __construct(){
		
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$this->resData['grade'] = self::$grade;

		return $this->resData;

	}

}