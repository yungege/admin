<?php
class Service_Meau_UrlModel extends BasePageService {

    protected $urlModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '7-3',
    ];

    public function __construct() {
        $this->urlModel = Dao_UrlModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $list = $this->urlModel->listUrl();

        $this->resData['list'] = &$list;
        return $this->resData;
    }

}