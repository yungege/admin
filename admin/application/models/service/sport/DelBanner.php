<?php
class Service_Sport_DelBannerModel extends BasePageService {

    protected $bannerModel;

    public function __construct() {
        $this->bannerModel = Dao_BannerModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $id = $req['post']['id'];
        if(empty($id) || !preg_match("/\w+/", $id)){
            $this->errNo = -1;
            return;
        }

        $res = $this->bannerModel->delete(['_id' => $id]);
        if(false === $res){
            $this->errNo = -1;
        }
    }

}