<?php
class Service_Meau_AddRoleModel extends BasePageService {

    protected $roleModel;

    protected $reqData;
    protected $resData;

    public function __construct() {
        $this->roleModel = Dao_RoleModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $type = $req['get']['type'];
        $req = $req['post'];
        $this->checkXss($req);

        if(empty($req['name']) || mb_strlen($req['name']) > 20){
            throw new Exception("角色名称必须在20个字以内", -1);
        }

        if(isset($type) && $type == 2){
            if(!preg_match("/[0-9a-z]{24}/", $req['_id'])){
                throw new Exception("角色信息错误，请刷新再试.", -1);
            }
            $info = $this->roleModel->getInfoById($req['_id']);
            if(empty($info) || $info['status'] != 1){
                throw new Exception("角色信息错误，请刷新再试.", -1);
            }

            $updateData = [
                'name' => $req['name'],
                'desc' => mb_substr($req['desc'], 0, 50),
            ];
            $res = $this->roleModel->updateById($req['_id'], $updateData);
        }
        else{
            $insertData = [
                'name' => $req['name'],
                'desc' => mb_substr($req['desc'], 0, 50),
                'ctime' => time(),
            ];
            $res = $this->roleModel->insert($insertData);
        }
        
        if(false === $res){
            throw new Exception("操作失败", -1);
        }
        return true;
    }

}