<?php
class Service_Meau_ListModel extends BasePageService {

    protected $meauModel;
    protected $userModel;
    protected $treeModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '7-1',
    ];

    public function __construct() {
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
            '&nbsp;&nbsp;&nbsp;└─ '
        ];
        $this->treeModel->nbsp = '&nbsp;&nbsp;&nbsp;';

        $list = $this->treeModel->getGridTree();
        $this->resData['list'] = &$list;
        return $this->resData;
    }

}