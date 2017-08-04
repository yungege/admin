<?php
class Service_Project_AddModel extends BasePageService {

    protected $projectModel;
    protected $projectSkuModel;
    protected $actionModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '3-2',
    ];


    public function __construct() {

        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

        return $this->resData;
    }
}