<?php
class Service_User_ClassModel extends BasePageService {

	const PAGESIZE = 15;

	protected $classModel;
    protected $userModel;

	protected $resData = [
        'list' => [],
        'pageTag' => '2-2'
    ];

    public function __construct() {

        $this->classModel = Dao_ClassinfoModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        $this->declareCheckXss = true;
    }

    protected function __execute($req) {
        $this->checkXss($req);
        
    	$match = [];
    	$req = $req['get'];
        $this->resData['grade'] = Dao_UserModel::$grade;
      
        if(!isset($req['pn']) || !is_numeric($req['pn'])){
            $req['pn'] = 1;
        }

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

        if($_SESSION['userInfo']['type'] == 2){
            $teacher = $this->userModel->queryOne(['_id' => $_SESSION['userInfo']['_id']],['protection' => ['manageclassinfo' => 1]]);
            $classIds = array_column($teacher['manageclassinfo'],'classid');
            if(empty($req['classid'])){
                $match['_id'] = ['$in' => $classIds];
            }else{
                if(!in_array($req['classid'],$classIds)){
                    return ;
                }
            }
        }

    	$fields = [
            '_id',
    		'name',
    		'schoolname',
            'schoolid'
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