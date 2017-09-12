<?php
class Service_Homework_MatchModel extends BasePageService {

    protected $workModel;
    protected $skuModel;
    protected $proModel;
    protected $classModel;
    protected $userModel;

    public function __construct() {
        $this->workModel = Dao_ExerciseHomeworkModel::getInstance();
        $this->skuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->proModel = Dao_ExerciseProjectModel::getInstance();
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
            !in_array($req['type'], [1,2])
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

        $this->diff = (new Data_TrainMatchingModel($req['uid']))->getUserDefaultLevel();
        $homeworkList = $this->getHomeWorkByDate($schoolId, $classId, $originalTime, $req['type']);
        return ['works' => $homeworkList];
    }

    protected function getHomeWorkByDate($sId, $cId, $time, $type){
        $works = [];

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
        if(empty($list)) return $works;

        foreach ($list as &$row) {
            if($row['type'] == $type){
                $proInfo = $this->proModel->batchGetInfoByIds((array)$row['project_id'], ['_id','name']);
                if(empty($proInfo)) continue;
                foreach ($proInfo as &$pro) {
                    $sku = $this->skuModel->getProjectSkuInfoByProjectIdAndDifficulty($pro['_id'], $this->diff, ['id','calorie_cost','time_cost','action_count']);
                    $pro['sku_id'] = $sku['_id'];
                    $pro['calorie'] = $sku['calorie_cost'];
                    $pro['time'] = $sku['time_cost'];
                    $pro['action'] = $sku['action_count'];
                }
                $row['projects'] = $proInfo;
                $works[] = $row;
            }
        }

        return $works;
    }

}