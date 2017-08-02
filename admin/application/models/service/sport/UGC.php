<?php
class Service_Sport_UGCModel extends BasePageService {

    protected $projectModel;
    protected $projectSkuModel;
    protected $trainModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '4-2',
    ];

    public function __construct() {
        $this->projectModel     = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel  = Dao_ExerciseProjectSkuModel::getInstance();
        $this->trainModel  = Dao_TrainingdoneModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $this->resData['worktype'] = Dao_ExerciseHomeworkModel::$type;

        $trainList = $this->trainModel->get

        return $this->resData;
    }

}