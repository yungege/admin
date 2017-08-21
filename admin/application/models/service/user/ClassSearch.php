<?php
class Service_User_ClassSearchModel extends BasePageService {

	protected $resData = [];

	protected $classModel;

	protected $gradeInfo = [
		11 => '小学1年级',
		12 => '小学2年级',
		13 => '小学3年级',
		14 => '小学4年级',
		15 => '小学5年级',
		16 => '小学6年级',
		21 => '初中1年级',
		22 => '初中2年级',
		23 => '初中3年级',
		31 => '高中1年级',
		32 => '高中2年级',
		33 => '高中3年级',
	];

	public function __construct() {

		$this->classModel = Dao_ClassinfoModel::getInstance();

	}

	public function __declare() {
	
	}

	public function __execute($req){
		
		$req = $req['post'];
		if(empty($req['schoolId'])){
			return false ;
		}else{
			$where['schoolid'] = $req['schoolId'];
		}
		
		if(!empty(trim($req['name']))){
			$where['name'] = ['$regex' => addslashes($req['name']), '$options' => 'i'];
		}

		if(!empty($req['grade'])){
			$where['grade'] = (int)$req['grade'];
		}

		$options = [
			'projection' => [
				'_id' => 1,
				'name' => 1,
				'grade' => 1,
			],
			'sort' => ['classno' => 1,'grade' => 1],
		];
		
		$classInfos= $this->classModel->query($where,$options);
		foreach($classInfos as $classInfo){
			$list[$this->gradeInfo[$classInfo['grade']]][] = $classInfo;
		}
		$classList['list'] = $list;

		return $this->resData = $classList;
	}
}