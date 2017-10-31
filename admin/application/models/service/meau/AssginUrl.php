<?php
class Service_Meau_AssginUrlModel extends BasePageService {

    protected $roleModel;
    protected $urlModel;
    protected $roleUrlModel;

    public function __construct() {
        $this->roleModel = Dao_RoleModel::getInstance();
        $this->urlModel = Dao_UrlModel::getInstance();
        $this->roleUrlModel = Dao_UrlToRoleModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['post'];

        if(!isset($req['rid']) || !preg_match("/[0-9a-z]{24}/", $req['rid'])){
            throw new Exception("参数错误", -1);
        }

        $roleInfo = $this->roleModel->getInfoById($req['rid'],['name','status']);
        if(empty($roleInfo) || $roleInfo['status'] != 1){
            throw new Exception("角色不存在", -1);
        }

        if(empty($req['urls']) || !is_array($req['urls'])){
            $req['urls'] = [];
        }

        $urls = [];
        array_map(function($v) use (&$urls){
            if(preg_match("/^\/(\w+)(\/\w+){1,}/", $v)){
                if(!in_array($v, $$urls)){
                    $urls[] = $v;
                }
            }
        }, $req['urls']);

        $update = [
            'rid' => $req['rid'],
            'url' => json_encode($urls),
        ];

        $res = $this->roleUrlModel->assginUrl($req['rid'], $update);
        if(false === $res){
            throw new Exception("分配失败", -1);
        }
        return;
    }

}