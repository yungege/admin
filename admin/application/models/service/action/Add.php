<?php
class Service_Action_AddModel extends BasePageService {


    protected $actionModel;

    protected $resData = [
        'pageTag' => '3-4',
    ];

    public function __construct() {
        $this->actionModel = Dao_VersionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['post'];

        return $this->resData;
    }

    
}