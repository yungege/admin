<?php
class Service_Version_IndexModel extends BasePageService {

    const PAGESIZE = 15;

    protected $versionModel;

    protected $reqData;

    protected $resData = [
        'pageTag' => '6-1',
        'pageCount' => 0,
        'list' => [],
        'pn' => 1,
    ];

    public function __construct() {
        $this->versionModel = Dao_VersionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['get'];
        // pageno
        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;
        $this->resData['pn'] = $req['pn'];

        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $sort = ['createtime' => -1];
        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => $sort,
        ];

        $count = $this->versionModel->count();

        $this->resData['pageCount'] = ceil($count / self::PAGESIZE);
        if($count <= 0)
            return $this->resData;

        $list = $this->versionModel->getListByPage([], [], $options);
        if(!empty($list)){
            $this->resData['list'] = $list;
        }

        return $this->resData;
    }

    
}