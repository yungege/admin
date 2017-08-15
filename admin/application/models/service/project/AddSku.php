<?php
class Service_Project_AddSkuModel extends BasePageService {

    protected $projectModel;
    protected $projectSkuModel;
    protected $actionModel;

    protected $reqData;
    protected $resData = [
        
    ];
    public static $difficultyArr = [
        0 => '低',
        1 => '中',
        2 => '高',
    ];
    protected $pid;
    protected $projectInfo;

    public function __construct() {
        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['post'];

        $this->checkParams($req);
print_r($req);exit;
        $res = $this->projectSkuModel->insert($req);
        if($res === false){
            throw new Exception("", PROJECT_ADD_FAILED);
        }
        return;
    }

    protected function checkParams(&$req){
        if(
            !preg_match("/\w+/", $req['project_id']) ||
            !isset(self::$difficultyArr[$req['difficulty']]) ||
            empty($req['actionList'])
        ){
            throw new Exception('', REQUEST_PARAMS_ERROR);
        }

        $proInfo = $this->projectModel->getInfoById($req['project_id'], ['_id']);
        if(empty($proInfo)){
            throw new Exception('', RESOURCE_NOT_EXISTS);
        }

        $proSkuInfo = $this->projectSkuModel
            ->getProjectSkuInfoByProjectIdAndDifficulty($req['project_id'], (int)$req['difficulty'], ['_id']);
        if(!empty($proSkuInfo)){
            throw new Exception('', PROJECT_SKU_EXISTS);
        }

        $actionCount = $filesize = $time = $calorie = 0;
        $actions = [];

        foreach ($req['actionList'] as &$aval) {
            // 费休息动作
            if($aval['type'] == 0 && $aval['count'] == 0){
                throw new Exception("{$actionInfo['name']} 已被删除", -1);
            }

            $actionInfo = $this->actionModel->getInfoById($aval['id'],
                ['name','typeno','vfilesize','singletime','calorie','status']
            );

            if($actionInfo['status'] == -9){
                throw new Exception("{$actionInfo['name']} 已被删除", -1);
            }

            if($aval['type'] == 1){
                $actionCount += 1;
                $filesize += $actionInfo['vfilesize'];
                $time += ($aval['count'] * $actionInfo['singletime']);
                $calorie += ($aval['count'] * $actionInfo['calorie']);
            }

            $actions[] = [
                'action_id' => $aval['id'],
                'action_time' => (int)($aval['count'] * $actionInfo['singletime']),
                'action_groupno' => (int)$aval['count'],
                'calorie' => (float)($aval['count'] * $actionInfo['calorie']),
            ];
        }

        $req['action_info'] = $actions;
        $req['vfilesize'] = (float)$filesize;
        $req['time_cost'] = (int)$time;
        $req['calorie_cost'] = (float)$calorie;
        $req['action_count'] = (int)$actionCount;
        $req['difficulty'] = (int)$req['difficulty'];

        unset($req['actionList']);
    }
}