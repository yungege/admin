<?php
class Service_Project_AddSkuModel extends BasePageService {

    protected $projectModel;
    protected $projectSkuModel;
    protected $actionModel;

    protected $reqData;
    protected $resData = [
        
    ];
    public static $difficultyArr = [
        '-1' => '无难度',
        '0'  => '低',
        '1'  => '中',
        '2'  => '高',
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

// var_dump($req);
// exit;

        $this->checkXss($req);

        $this->checkParams($req);

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
            empty($req['actionList']) ||
            empty($req['project_desc'])
        ){
            throw new Exception('', REQUEST_PARAMS_ERROR);
        }

        $proInfo = $this->projectModel->getInfoById($req['project_id'], ['_id','name','type']);
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
        $fileSizeArr = [];

        $section = 1;
        foreach ($req['actionList'] as &$aval) {

            // 如果动作type 为6进入下一节
            if($aval['type'] == 6){
                $section++;
                continue;
            }
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

            if($aval['type'] != 4 && $aval['type'] != 6){
                $actionCount += 1;

                if(!isset($fileSizeArr[$aval['id']])){
                    $fileSizeArr[$aval['id']] = $actionInfo['vfilesize'];
                    $filesize += $actionInfo['vfilesize'];
                }

                if($actionInfo['singletime'] == 0){
                    // $time += $aval['count'];
                    $calorie += ($aval['count'] * $actionInfo['calorie']);
                }
                else{
                    // $time += ($aval['count'] * $actionInfo['singletime']);
                    $calorie += ($aval['count'] * $actionInfo['calorie'] * $actionInfo['singletime']);
                }
                
            }

            if($actionInfo['singletime'] == 0){
                $time += $aval['count'];
            }
            else{
                $time += ($aval['count'] * $actionInfo['singletime']);
            }

            $actions[] = [
                'action_id' => $aval['id'],
                'action_time' => ($actionInfo['singletime'] != 0 ? (int)($aval['count'] * $actionInfo['singletime']) : (int)$aval['count']),
                'action_groupno' => (int)$aval['count'],
                'calorie' => ($aval['type'] == 4 ? 0 : ($actionInfo['singletime'] != 0 ? (float)($aval['count'] * $actionInfo['calorie'] * $actionInfo['singletime']) : (float)($aval['count'] * $actionInfo['calorie']))),
                'section' => $section,
            ];
        }

        $req['action_info'] = $actions;
        $req['vfilesize'] = (float)$filesize;
        $req['time_cost'] = (int)$time;
        $req['calorie_cost'] = (float)$calorie;
        $req['action_count'] = (int)$actionCount;
        $req['difficulty'] = (int)$req['difficulty'];
        $req['type'] = (int)$proInfo['type'];
        $req['project_desc'] = str_replace(PHP_EOL, '', $req['project_desc']);
        $req['ctime'] = time();
        $req['sections'] = ["第一节","第二节","第三节","第四节","第五节","第六节","第七节","第八节","第九节","第十节"];
        
        if($req['difficulty'] === 0){
            $req['difficulty_new'] = "T1";
            $req['project_name'] = $proInfo['name'] . '初级';
        }elseif($req['difficulty'] === 1){
            $req['difficulty_new'] = "T2";
            $req['project_name'] = $proInfo['name'] . '中级';
        }elseif($req['difficulty'] === 2){
            $req['difficulty_new'] = "T3";
            $req['project_name'] = $proInfo['name'] . '高级';
        }else{
            $req['project_name'] = $proInfo['name'];
        }

        unset($req['actionList']);
    }
}