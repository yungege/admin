<?php
class Service_Meau_ShowRoleModel extends BasePageService {

    protected $roleModel;

    protected $reqData;

    public function __construct() {
        $this->roleModel = Dao_RoleModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $list = $this->roleModel->query(
            [   'status' => 1,
                'name' => ['$ne' => 'superadmin'],

            ],
            [
                'sort' => [
                    'ctime' => 1
                ],
                'limit' => 0,
                'projection' => ['name' => 1, 'desc' => 1],
            ]
        );
        $this->resData['list'] = &$list;

        // var_dump($this->resData['list']);
        // exit;

        return $this->resData;
    }

}