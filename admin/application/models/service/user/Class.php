<?php
class Service_User_ClassModel extends BasePageService {

	const PAGESIZE = 15;

	protected $classModel;

	protected $reqData;
	protected $resData = [
        // 'pageTag' => '2-1',
        // 'pageCount' => 0,
        'list' => [],
        'pn' => 1,
    ];

    public static $grade = [
        // 小学
        11 => '小学1年级',
        12 => '小学2年级',
        13 => '小学3年级',
        14 => '小学4年级',
        15 => '小学5年级',
        16 => '小学6年级',
        // 初中
        21 => '初中1年级',
        22 => '初中2年级',
        23 => '初中3年级',
        // 高中
        31 => '高中1年级',
        32 => '高中2年级',
        33 => '高中3年级',
    ];

    public function __construct() {

        $this->classModel = Dao_ClassinfoModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

    	$match = [];
    	$req = $req['get'];
        $this->resData['grade'] = self::$grade;
      
        if(!isset($req['pn']) || !is_numeric($req['pn'])){
            $req['pn'] = 1;
        }

        $this->resData['pn'] = $req['pn'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;

        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => ['grade' => 1,'classno'=>1],
          
        ];
        
    	if(!empty($req['schoolid']) && preg_match("/\w+/",$req['schoolid'])){
    		$match['schoolid'] = $req['schoolid'];
    	}
    	if(!empty($req['grade']) && $req['grade'] != -1){
    		$match['grade'] = (int)$req['grade'];
    	}
        if(!empty($req['classid']) && preg_match("/\w+/",$req['classid'])){
            $match['_id'] = $req['classid'];
        }
        if(!empty($req['schoolname'])){
            $match['schoolname'] = ['$regex' => addslashes($req['schoolname']), '$options' => 'i'];
        }
        if(!empty($req['classname'])){
            $match['name'] = ['$regex' => addslashes($req['classname']), '$options' => 'i'];
        }

    	$fields = [
    		'name',
    		'_id',
    		'schoolname',
    	];
    	
    	$list = $this->classModel->getListByPage($match, $fields, $options);

        $count = $this->classModel->count($match);
        $page  = new Page($count,15);
        $show  = $page->show();

        $this->resData['page'] = $show;
    	$this->resData['list'] = $list;

        return $this->resData;
    }
}