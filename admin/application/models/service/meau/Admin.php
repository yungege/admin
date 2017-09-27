<?php
class Service_Meau_AdminModel extends BasePageService {

    protected $roleModel;
    protected $userModel;
    protected $assginModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '7-3',
        'list' => [],
    ];

    public function __construct() {
        $this->roleModel = Dao_RoleModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
        $this->assginModel = Dao_RoleAssginModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $adminList = BackendAdmin::listAdmin();
        if(empty($adminList)) return $this->resData;

        $userList = $this->userModel->batchGetUserInfoByUserids(
            array_keys($adminList), ['nickname','iconurl'], 0, 0
        );

        $assginList = $this->assginModel->query([],['limit'=>0]);
        if(!empty($assginList)){
            $assginList = array_column($assginList, null, 'uid');

            $roleList = $this->roleModel->listRole();
            $roleList = array_column($roleList, null, '_id');

            foreach ($assginList as &$al) {
                $al['role_name'] = $roleList[$al['role_id']]['name'];
            }
        }

        foreach ($userList as &$ul) {
            $ul['role_info'] = $assginList[$ul['_id']] ? : [];
            $ul['mobile'] = $adminList[$ul['_id']];
        }

        $this->resData['list'] = &$userList;
        return $this->resData;
    }

}