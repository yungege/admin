<?php
class Service_Sport_AddBannerModel extends BasePageService {

    protected $bannerModel;

    public function __construct() {
        $this->bannerModel = Dao_BannerModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $now = time();
        $req = $req['request_param'];
        $req['coverimgurl'] = $req['coverimgurl-add'];
        $this->checkXss($req);
        $urlPreg = "/\b(([\w-]+:\/\/?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|\/)))/";

        if(
            empty($req['title']) ||
            empty($req['h5content']) || 
            empty($req['starttime']) || 
            empty($req['endtime']) || 
            empty($req['coverimgurl']) ||
            empty($req['aspectRatio'])
            ){
            return $this->errNo = -1;
        }

        if(!empty($req['h5url'])){
            if(!preg_match($urlPreg, $req['h5url'])){
                return $this->errNo = -1;
            }
        }

        if(!is_numeric($req['aspectRatio'])){
            return $this->errNo = -1;
        }
        else{
            $req['aspectRatio'] = (float)$req['aspectRatio'];
        }

        $req['starttime'] = (int)strtotime(date('Y-m-d', strtotime($req['starttime'])) . ' 00:00:00');
        $req['endtime'] = (int)strtotime(date('Y-m-d', strtotime($req['endtime'])) . ' 23:59:59');

        if($req['starttime'] >= $req['endtime'] || $now >= $req['endtime']){
            return $this->errNo = -1;
        }

        $req['creator'] = $_SESSION['userInfo']['_id'];
        $req['createtime'] = $now;

        $res = $this->bannerModel->insert($req);

        if($res === false)
            $this->errNo = -1;

        return;
    }

}