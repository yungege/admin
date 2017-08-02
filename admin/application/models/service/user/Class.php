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

    	$queryArr = $req;
    	unset($queryArr['pn']);

    	$this->resData['query'] = http_build_query($queryArr);
        $this->resData['grade'] = self::$grade;
      
        if(!isset($req['pn']) || !is_numeric($req['pn'])){
            $req['pn'] = 1;
        }

        $this->resData['pn'] = $req['pn'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;

        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => ['classno' => 1],
          
        ];

    	if(!empty($req['schoolid'])){
    		$match['schoolid'] = $req['schoolid'];
    	}
    	if(!empty($req['grade']) && $req['grade'] != -1){
    		$match['grade'] = (int)$req['grade'];
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
        // var_dump( $page-> url);
        // exit;

        $this->resData['page'] = $show;
    	$this->resData['list'] = $list;

        // var_dump($page->url);
        // exit;

        return $this->resData;
    }
}