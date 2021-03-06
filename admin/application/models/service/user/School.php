<?php
class Service_User_SchoolModel extends BasePageService {

	const PAGESIZE = 15;

	protected $schoolModel;
	protected $resData = [
        'list' => [],
        'pageTag' => '2-3'
    ];

    public function __construct() {

        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
    }

    protected function __declare() {
        $this->declareCheckXss = true;
    }

    protected function __execute($req) {
        $this->checkXss($req);

    	$match = [];
    	$req = $req['get'];
        if(!isset($req['pn']) || !is_numeric($req['pn'])){
          $req['pn'] = 1;
        }

        $this->resData['type'] = $req['type'];
        $this->resData['projectId'] = $req['projectId'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $options = [
          'limit' => self::PAGESIZE,
          'offset' => $offset,
          
        ];

    	if(!empty($req['schoolid']) && preg_match("/\w+/",$req['schoolid'])){
    		$match['_id'] = $req['schoolid'];
    	}
        if(!empty($req['schoolname'])){
            $match['name'] = ['$regex' => addslashes($req['schoolname']), '$options' => 'i'];
        }

    	$fields = [
    		'name',
    		'_id',
    		'province',
            'city',
    	];
        
    	$list = $this->schoolModel->getListByPage($match, $fields, $options);
        $count = $this->schoolModel->count($match);
        $page  = new Page($count,15);
        $show  = $page->show();

        $this->resData['page'] = $show;
    	$this->resData['list'] = $list;

        return $this->resData;
    }
}