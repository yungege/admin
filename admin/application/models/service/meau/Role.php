<?php
class Service_Meau_RoleModel extends BasePageService {

    protected $roleModel;
    protected $userModel;
    protected $treeModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '7-2',
    ];

    public function __construct() {
        $this->roleModel = Dao_RoleModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $list = $this->roleModel->query(
<<<<<<< HEAD
            ['status' => 1,
            // 'name' => ['$ne' => 'superadmin'],
=======
            [
                'status' => 1,
                'name' => ['$ne' => 'superadmin'],
>>>>>>> 7bb41cd23732f53853bb2f27fe7f9bafa0739b89
            ],
            [
                'sort' => [
                    'ctime' => 1
                ],
                'limit' => 0,
            ]
        );
        $this->resData['list'] = &$list;
        return $this->resData;
    }

}