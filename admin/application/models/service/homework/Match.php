<?php
class Service_Homework_MatchModel extends BasePageService {

    protected $workModel;
    protected $skuModel;
    protected $classModel;
    protected $userModel;

    public function __construct() {
        $this->workModel = Dao_ExerciseHomeworkModel::getInstance();
        $this->skuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->classModel = Dao_ClassinfoModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['get'];
        
        if(
            empty($req['date']) || 
            !preg_match("/(\d{4})-(\d{2})-(\d{2})/", $req['date']) ||
            !preg_match("/\w+/", $req['cid']) ||
            !preg_match("/\w+/", $req['uid']) ||
            !in_array($req['type'], [1,2,3])
        ){
            throw new Exception("", REQUEST_PARAMS_ERROR);
        }

        $originalTime = strtotime($req['date'] . " 00:00:00");
        $userInfo = $this->userModel->getInfoById($req['uid'], [
            'schoolinfo', 'classinfo','classinfo_history'
        ]);

        if(empty($userInfo)){
            throw new Exception("", USER_USER_NON_EXSIT);
        }

        $schoolId = $userInfo['schoolinfo']['schoolid'];
        $classId = $userInfo['classinfo']['classid'];

        $hisSId = '';
        $hisCid = $this->classModel->getClassInfoByTime(
            $originalTime, $userInfo['classinfo_history'], $hisSId
        );

        if(!empty($hisCid)){
            $schoolId = $hisSId;
            $classId = $hisCid;
        }

        $this->getHomeWorkByDate($schoolId, $classId, $originalTime);
    }

    protected function getHomeWorkByDate($sId, $cId, $time){
        $userData = [
            'schoolinfo' => [
                'schoolid' => $sId,
            ],
            'classinfo' => [
                'classid' => $cId,
            ],
        ];

        $list = $this->workModel->getNowHomeworkInfos($userData, $time, [
            '_id','name','project_id','type'
        ]);
        print_r($list);exit;
    }

}