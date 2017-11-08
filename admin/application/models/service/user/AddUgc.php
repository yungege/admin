<?php
class Service_User_AddUgcModel extends BasePageService {

    protected $projectModel;
    protected $projectSkuModel;
    protected $homeworkModel;
    protected $trainModel;
    protected $trainOutModel;
    protected $trainDoneOutsideModel;
    protected $trainSchoolModel;
    protected $redis;

    protected $reqData;
    protected $resData;


    public function __construct() {

        $this->redis = Cache_CacheRedis::getInstance();
        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->homeworkModel = Dao_ExerciseHomeworkModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
        $this->trainSchoolModel = Dao_SchoolInfoTrainingModel::getInstance();
        $this->trainOutModel = Dao_TrainingHomeworkModel::getInstance();
        $this->trainDoneOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
       
    }

    protected function __declare() {
        $this->declareCheckXss = true;
    }

    protected function __execute($req) {
        $this->checkXss($req['post']);
        $req = $req['post'];

        if(
            empty($req['uid']) ||
            !preg_match("/\w+/", $req['uid']) ||
            !in_array($req['htype'], [1,2,3,4]) ||
            !preg_match("/(\d{4})-(\d{2})-(\d{2})/", $req['wtime'])
        ){
            throw new Exception("Error Params", -1);
        }

        switch ($req['htype']) {
            // 跑步
            case 3:
                $this->addRun($req);
                break;

            case 4:
                $this->addPunch($req);
                break;
            
            default:
                $this->addNormal($req);
                break;
        }
    }

    // 跑步数据
    protected function addRun($req){
        if(!preg_match("/^[1-9]\d+$/", $req['time_cost'])){
            throw new Exception("跑步时长错误.", -1);
        }

        if(!is_numeric($req['distance']) || (int)$req['distance'] <= 0){
            throw new Exception("跑步距离错误.", -1);
        }

        $data = [
            "originaltime"  => (int)strtotime($req['wtime'].' 00:00:00'),
            'starttime' => (int)strtotime($req['wtime'].' 19:00:00'),
            'endtime'   => intval(strtotime($req['wtime'].' 19:00:00') + $req['time_cost']),
            'type'      => 3,
            'htype'     => 3,
            'userid'    => $req['uid'],
            'burncalories'  => CommonFuc::calCalorie($req['distance'] * 1000, $req['time_cost']),
            'projecttime'   => (int)$req['time_cost'],
            'commenttext'   => '系统补交',
            'exciseimg'     => [
                'https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg',
            ],
            'route' => [
            ],
            'distance' => floatval($req['distance'] * 1000),
            'region' => [
                "maxlat" => 39.940865,
                "maxlon" => 116.41684,
                "minlat" => 39.939175,
                "minlon" => 116.41034,
            ],
            'createtime' => time(),
            'status' => 0,
        ];

        $res = $this->trainModel->insert($data);
        if($res === false){
            throw new Exception("操作失败", -1);
        }

        $monthDate = date('Y_m', $data['endtime']);
        $this->addCache($req['uid'], $monthDate, $res, $data, 3);
        return;
    }

    protected function addNormal($req){
        if(!isset($req['h-pid']) || empty($req['h-pid'])){
            throw new Exception("请选择要补交的锻炼项目.", -1);
        }

        list($hid, $pid, $cal, $time,$count) = explode('|', $req['h-pid']);
        if(
            !preg_match("/\w+/", $hid) || 
            !preg_match("/\w+/", $pid) ||
            !is_numeric($cal) || empty($cal) ||
            !preg_match("/^[1-9]\d+$/", $time) ||
            !preg_match("/^[1-9]\d{0,1}$/", $count)
        ){
            throw new Exception("作业信息错误.", -1);
        }

        $projectInfo = $this->projectSkuModel->getInfoById($pid, ['project_id']);
        if(empty($projectInfo)) throw new Exception("作业信息错误.", -1);
        $projectInfo = $this->projectModel->getInfoById($projectInfo['project_id'], ['name']);
        if(empty($projectInfo)) throw new Exception("作业信息错误.", -1);

        $sTime = (int)strtotime($req['wtime'].' 19:00:00');
        $eTime = intval(strtotime($req['wtime'].' 19:00:00')+$time);
        $res = $this->trainModel->checkRepeatSubmit(
            1, $req['uid'], $sTime, $eTime, $pid);
        if($res !== false){
            throw new Exception("当天作业已补交.", -1);
        }

        $data = [
            "originaltime"  => (int)strtotime($req['wtime'].' 00:00:00'),
            "starttime"     => (int)strtotime($req['wtime'].' 19:00:00'),
            "endtime"       => intval(strtotime($req['wtime'].' 19:00:00')+$time),
            "actioncount"   => (int)$count,
            "burncalories"  => (float)$cal,
            "commenttext"   => "系统补交",
            "exciseimg"     => [ 
                "https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"
            ],
            "createtime"    => time(),
            "type"          => 5,
            "trainingtype"  => 2,
            "userid"        => $req['uid'],
            "trainingid"    => $pid,
            "trainingname"  => $projectInfo['name'],
            "homeworkid"    => $hid,
            "status"        => 0,
            "htype"         => (int)$req['htype'],
            "projecttime"   => (int)$time
        ];

        $res = $this->trainModel->insert($data);
        if($res === false){
            throw new Exception("操作失败", -1);
        }

        $monthDate = date('Y_m', $data['originaltime']);
        $this->addCache($req['uid'], $monthDate, $res, $data);
        return;
    }

    // 加入缓存 todo 要加入的月份（以endtime为准）如果没有缓存数据 需要当月所有数据放入缓存
    protected function addCache($uId, $monthDate, $trainId, $data, $type = 1){
        $cacheRes = $this->trainModel->getCacheDataByMonth($uId, $monthDate);
        if(empty($cacheRes)){
            $firstDay = strtotime(date('Y-m-01', $data['originaltime']));
            $lastDay = strtotime(date('Y-m-t', $data['originaltime']) . ' 23:59:59');
            $hMap = [
                'userid' => $uId,
                'htype' => ['$in' => [1,2,3]],
                'originaltime' => ['$gte' => $firstDay, '$lte' => $lastDay]
            ];

            // 锻炼历史
            $options = [
                'sort' => ['endtime' => -1],
            ];
            $fields = ['htype','trainingid','starttime','endtime','burncalories','originaltime','exciseimg','mapurl','imginfo','homeworkid','distance'];
            $resList = [];
            $this->trainModel->getListByMonth($hMap, $fields, $options, $monthDate, $resList);
        }
        else{
            if($type == 3){
                $cacheData = [
                    "trainId" => $trainId,
                    "pName" => "跑步锻炼",
                    "pInterval" => $data['projecttime'],
                    "pId" => '',
                    "trainingImg" => array_shift($data['exciseimg']),
                    "calorie" => $data['burncalories'],
                    "finishTime" => $data['endtime'],
                    "hType" => 3,
                    "hId" => '',
                    "originalTime" => 0,
                    "distance" => $data['distance'],
                ];
            }
            else{
                $cacheData = [
                    "trainId" => $trainId,
                    "pName" => $data['htype'] == 1 ? '翻转课堂' : '身体素质作业',
                    "pInterval" => $data['projecttime'],
                    "pId" => $data['trainingid'],
                    "trainingImg" => array_shift($data['exciseimg']),
                    "calorie" => $data['burncalories'],
                    "finishTime" => $data['endtime'],
                    "hType" => $data['htype'],
                    "hId" => $data['homeworkid'],
                    "originalTime" => $data['originaltime'],
                    "distance" => 0.00,
                ];
            }
            
            $this->trainModel->addCacheDataByMonth($uId, $monthDate, $cacheData);
        }
    }

    // 课外活动打卡
    protected function addPunch ($req){

        if(empty($req['school_name']) || empty($req['school_mobile']) || empty($req['train_name'])){
            throw new Exception("参数有误", -1);
        }

        $where = [
            'starttime' => (int)strtotime($req['wtime'].' 08:00:00'),
            'train_name' => $req['train_name'],
            'userid' => $req['uid'],
        ];
        $query = $this->trainDoneOutsideModel->query($where);
        if(!empty($query)){
            return;
        }

        $workData['train_name'] = $req['train_name'];
        $workData['start_time'] = (int)strtotime($req['wtime'] . '00:00:00');
        $workData['end_time'] = (int)strtotime($req['wtime'].' 23:59:59');
        $workData['done_no'] = '';
        $workData['userid'] = $req['uid'];
        $workId = $this->trainOutModel->insert($workData);

        $trainSchool['homework_id'] = (string)$workId;
        $trainSchool['school_name'] = $req['school_name'];
        $trainSchool['mobile'] = $req['school_mobile'];
        $this->trainSchoolModel->insert($trainSchool);
        
        $doneOutside['htype'] = 4;
        $doneOutside['userid'] = $req['uid'];
        $doneOutside['starttime'] = (int)strtotime($req['wtime'].' 08:00:00');
        $doneOutside['endtime'] = (int)strtotime($req['wtime'].' 09:00:00');
        $doneOutside['createtime'] = $doneOutside['endtime'];
        $doneOutside['homeworkid'] = $workId;
        $doneOutside['projecttime'] = $doneOutside['endtime'] - $doneOutside['starttime'];
        $doneOutside['burncalories'] = mt_rand(90,110);
        $doneOutside['exciseimg'] = ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"];
        $doneOutside['commenttext'] = '兴趣班';
        $doneOutside['status'] = 0;
        $doneOutside['train_name'] = $req['train_name'];    
        $result = $this->trainDoneOutsideModel->insert($doneOutside);

        // 写入缓存 后期加入消息队列
        $monthDate = date('Y_m', $doneOutside['endtime']);
        $this->punchAddCache($req['uid'], $monthDate, $result, $doneOutside);
        return;
    }

    // 加入缓存 todo 要加入的月份（当前）如果没有缓存数据 需要当月所有数据放入缓存
    protected function punchAddCache($uId, $monthDate, $trainId, $data){

        $cacheRes = $this->trainDoneOutsideModel->getCacheDataByMonth($uId, $monthDate);
        if(empty($cacheRes)){
            $firstDay = strtotime(date('Y-m-01', $data['endtime']));
            $lastDay = strtotime(date('Y-m-t', $data['endtime']) . ' 23:59:59');
            $hMap = [
                'userid' => $uId,
                'endtime' => ['$gte' => $firstDay, '$lte' => $lastDay]
            ];

            // 锻炼历史
            $options = [
                'sort' => ['endtime' => -1],
            ];
            $fields = ['htype','starttime','endtime','burncalories','originaltime','exciseimg','homeworkid','train_name'];
            $resList = [];
            $this->trainDoneOutsideModel->getListByMonth($hMap, $fields, $options, $monthDate, $resList);
        }
        else{
            $pInterval = 3600;
            if(empty($pInterval)) $pInterval = ($data['endtime'] - $data['starttime']);
            $cacheData = [
                "trainId" => $trainId,
                "pName" => $data['train_name'],
                "pInterval" => 3600,
                "pId" => "",
                "trainingImg" => array_shift($data['exciseimg']),
                "calorie" => $data['burncalories'],
                "finishTime" => $data['endtime'],
                "hType" => $data['htype'],
                "hId" => $data['homeworkid'],
                "originalTime" => strtotime(date('Y-m-d',$data['starttime'])),
                'distance' => 0.00,
            ];
            $this->trainDoneOutsideModel->addCacheDataByMonth($uId, $monthDate, $cacheData);
        }

        return true;
    }
}