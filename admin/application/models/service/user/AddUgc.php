<?php
class Service_User_AddUgcModel extends BasePageService {

    protected $projectModel;
    protected $projectSkuModel;
    protected $homeworkModel;
    protected $trainModel;

    protected $reqData;
    protected $resData;


    public function __construct() {

        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->homeworkModel = Dao_ExerciseHomeworkModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $uid = $req['get']['uid'];

        if(empty($uid) || !preg_match("/\w+/", $uid))
            return $this->errNo = -1;

        $hasDo = $this->trainModel->getTodayBjTrain($uid);
        if(!empty($hasDo))
            return $this->errNo = TRAINING_BJ_ERROR;

        $homeworkInfo = $this->homeworkModel->get;

    }
}