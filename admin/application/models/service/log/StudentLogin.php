<?php
class Service_Log_StudentLoginModel extends BasePageService {
    const PAGESIZE = 10;

    protected $resData = [
        'list' => [],
    ];

    public function __construct() {
        $this->logModel = Dao_LoginLogsModel::getInstance();
    }

    protected function __declare() {

    }

    protected function __execute($req) {
        $req = $req['get'];
        if(!isset($req['uid']) || !preg_match("/[0-9a-z]{24}/", $req['uid'])){
            return $this->resData;
        }

        if(!isset($req['pn']) || !is_numeric($req['pn'])){
            $req['pn'] = 1;
        }
        $this->resData['pn'] = $req['pn'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;

        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => ['ctime' => -1],
        ];

        $count = $this->logModel->count(['userid' => $req['uid']]);
        $page = new Page($count, self::PAGESIZE);
        $this->resData['page'] = $page->show();

        if($count <= 0) return $this->resData;
        $this->resData['pageCount'] = ceil($count / self::PAGESIZE);

        $list = $this->logModel->query(['userid' => $req['uid']], $options);
        if(!empty($list)){
            $this->resData['list'] = &$list;
        }
        return $this->resData;
    }

}