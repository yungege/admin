<?php
class Service_Sport_EditBannerModel extends BasePageService {

    protected $bannerModel;

    public function __construct() {
        $this->bannerModel = Dao_BannerModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['request_param'];
        $this->checkXss($req);
        $urlPreg = "/\b(([\w-]+:\/\/?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|\/)))/";

        if(
            empty($req['_id']) ||
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

        $req['starttime'] = strtotime(date('Y-m-d', strtotime($req['starttime'])) . ' 00:00:00');
        $req['endtime'] = strtotime(date('Y-m-d', strtotime($req['endtime'])) . ' 23:59:59');

        if($req['starttime'] >= $req['endtime'] || time() >= $req['endtime']){
            return $this->errNo = -1;
        }

        $id = $req['_id'];
        unset($req['_id']);

        $res = $this->bannerModel->update(
            ['_id' => $id],
            $req
            );

        if($res === false)
            $this->errNo = -1;

        return;
    }

}