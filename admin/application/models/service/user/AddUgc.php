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
        $cid = $req['get']['cid'];
        $hid = $req['get']['hid'];

        if(
            empty($uid) ||
            !preg_match("/\w+/", $uid) ||
            empty($cid) ||
            !preg_match("/\w+/", $cid) ||
            empty($hid) ||
            !preg_match("/\w+/", $hid)
        ){
            throw new Exception("Error Params", -1);
        }

        $hasDo = $this->trainModel->getTodayBjTrain($uid);
        if(!empty($hasDo))
            throw new Exception("", TRAINING_BJ_ERROR);
            

        // $homeworkInfo = $this->homeworkModel->getLastHomeworkByClassId($cid, ['project_id']);

        
        $homeworkInfo = $this->homeworkModel->checkHomeworkExists($hid, $cid, ['projection'=>['_id'=>1,'project_id'=>1,'type'=>1]]);
        if(empty($homeworkInfo))
            throw new Exception("", HOMEWORK_NOT_EXISTS);

        $matchModel = new Data_TrainMatchingModel($uid);
        $level = $matchModel->getUserDefaultLevel();
        $protectInfo = $this->projectSkuModel->getProjectSkuInfoByProjectIdAndDifficulty(
            $homeworkInfo['project_id'][0], $level);

        // 身体素质
        $trainData = [
            "type"          => 5,
            "htype"         => $homeworkInfo['type'],
            "trainingtype"  => 1,
            "trainingid"    => $protectInfo['_id'],
            "userid"        => $uid,
            "originaltime"  => strtotime(date('Y-m-d').' 00:00:00'),
            "starttime"     => strtotime(date('Y-m-d').' 00:00:00'),
            "endtime"       => strtotime(date('Y-m-d').' 00:00:00') + $protectInfo['time_cost'],
            "createtime"    => time(),
            "actioncount"   => $protectInfo['action_count'],
            "burncalories"  => $protectInfo['calorie_cost'],
            "exciseimg"     => [ 
                // 待确认
                // "https://oi7ro6pyq.qnssl.com/da50314efa4516261ca7de69010b039f.gif", 
                // "https://oi7ro6pyq.qnssl.com/c9245fe1f280554bf6be8a9fe1f102fd.gif"
            ],
            "homeworkid"    => $homeworkInfo['_id'],
            "status"        => 0
        ];
        // 暂时不开放
        // throw new Exception("此功能请联系管理员.", -1);
        
        $res = $this->trainModel->insert($data);
        if($res === false)
            throw new Exception("", TRAINING_BJ_ERROR);
            
        return;
    }
}