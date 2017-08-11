<?php
class Service_Project_AddModel extends BasePageService {

    protected $actionModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '3-2',
    ];

    public function __construct() {
        $this->resData['grade'] = Dao_UserModel::$grade;
        $this->resData['uptoken'] = getUploadToken();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        
        return $this->resData;
    }

}