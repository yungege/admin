<?php
class Service_Meau_AssginModel extends BasePageService {

    protected $roleModel;
    protected $assginModel;
    protected $userModel;
    protected $meauModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '7-4',
        'list' => [],
        'myRole' => '',
    ];
    protected static $oidPreg = "/[0-9a-z]{24}/";

    public function __construct() {
        $this->roleModel = Dao_RoleModel::getInstance();
        $this->assginModel = Dao_RoleAssginModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
        $this->meauModel = Dao_MeauModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $list = $this->meauModel->listMeau();
        $this->treeModel = new Tree($list);
        $this->treeModel->icon = [
            '&nbsp;&nbsp;&nbsp;│ ', 
            '&nbsp;&nbsp;&nbsp;├─ ', 
            '&nbsp;&nbsp;&nbsp;└─ ',
        ];
        $this->treeModel->nbsp = '&nbsp;&nbsp;&nbsp;';
        $list = $this->treeModel->getGridTree();

        foreach ($list as &$row) {
            $sort = $row['new_sort'];
            $sort = preg_replace("/\d{1,}/", "<input type='checkbox' name='urls[]' value='".$row['url']."' data-id='".$row['_id']."' data-pid='".$row['pid']."'>", $sort);
            $row['checkbox'] = $sort;
        }

        $this->resData['list'] = &$list;
        return $this->resData;
    }

}