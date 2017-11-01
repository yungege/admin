<?php
class Service_Index_IndexModel extends BasePageService {

    protected $userModel;

    protected $reqData;
    protected $resData;

    public function __construct() {
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        
        return [
            'pageTag' => '1-1',
        ];
    }

}