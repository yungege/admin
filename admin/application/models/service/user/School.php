<?php
class Service_User_SchoolModel extends BasePageService {

	const PAGESIZE = 15;

	protected $schoolModel;

	protected $reqData;
	protected $resData = [
        'pageTag' => '2-1',
        'pageCount' => 0,
        'list' => [],
        'pn' => 1,
    ];


    public function __construct() {

        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

    	$match = [];
    	$req = $req['get'];

    	$queryArr = $req;
    	unset($queryArr['pn']);
    	$this->resData['query'] = http_build_query($queryArr);
        if(!isset($req['pn']) || !is_numeric($req['pn'])){
          $req['pn'] = 1;
        }
        $this->resData['pn'] = $req['pn'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;

        $options = [
          'limit' => self::PAGESIZE,
          'offset' => $offset,
          
        ];

    	if(!empty($req['schoolid'])){
    		$match['_id'] = $req['schoolid'];
    	}

    	$fields = [
    		'name',
    		'_id',
    		'province',
            'city',
    	];

    	$list = $this->schoolModel->getListByPage($match, $fields, $options);

    	$this->resData['list'] = $list;

        return $this->resData;
    }
}