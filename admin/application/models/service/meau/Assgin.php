<?php
class Service_Meau_AssginModel extends BasePageService {

    protected $urlAssginModel;
    protected $urlModel;
    // protected $userModel;
    // protected $meauModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '7-5',
        'list' => [],
        'myList' => [],
    ];
    protected static $oidPreg = "/[0-9a-z]{24}/";

    public function __construct() {
        $this->urlAssginModel = Dao_UrlToRoleModel::getInstance();
        // $this->assginModel = Dao_RoleAssginModel::getInstance();
        // $this->userModel = Dao_UserModel::getInstance();
        $this->urlModel = Dao_UrlModel::getInstance();
        // $this->meauModel = Dao_MeauModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $rid = $req['get']['rid'] ? : '';
        if(empty($rid) || !preg_match(self::$oidPreg, $rid)){
            die('PAGE NOT FOUND');
        }

        $assginUrl = $this->urlAssginModel->getInfoByRoleId($rid);

        $list = $this->urlModel->listUrl();
        $this->resData['list'] = &$list;
        $this->resData['myList'] = &$assginUrl;
        return $this->resData;
    }

}