<?php

include_once "Cli.php";

$app->execute(['TrainOut','init']);

class TrainOut {

    public static function init(){

        $schoolOutModel = Dao_SchoolInfoTrainingModel::getInstance();
        $userModel = Dao_UserModel::getInstance();
        $homeworkModel = Dao_TrainingHomeworkModel::getInstance();     
        $trainOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
        $classModel = Dao_ClassinfoModel::getInstance();
        $trainSchedule = Dao_TrainScheduleModel::getInstance();

        $skip = 0;
    	while(1){

    	   	$where = [];
            $options = [
                'skip' => $skip,
                'limit' => 1,
            ];

            $schedule = $trainSchedule->queryOne($where,$options);
            $skip++;
            if(empty($schedule)){
                break;
            }

            $start = strtotime("last Monday");

            foreach($schedule['done_date'] as $value){

                $starttime = $start + ($value - 1) * 86400 + 8 * 3600;
                $tWhere = [
                    'starttime' => $starttime,
                    'train_name' => $schedule['train_name'],
                    'userid' => $schedule['user_id'],
                ];
                $tData = $trainOutsideModel->query($tWhere);
                if(!empty($tData)){
                    continue;
                }
                $trainData = [

                    'htype' => 4,
                    'userid' => $schedule['user_id'],
                    'starttime' => $starttime,
                    'endtime' => $starttime + 3600,
                    'createtime' => $starttime + 3600,
                    'projecttime' => 3600,
                    'burncalories' => mt_rand(90,110),
                    'exciseimg' => ["https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"],
                    'commenttext' => '兴趣班',
                    'status' => 0,
                    'train_name' => $schedule['train_name'],
                    'train_school_name' => $schedule['train_school_name'],
                    'train_school_id' => $schedule['train_school_id'],
                ];
                $result = $trainOutsideModel->insert($trainData);

                // 写入缓存 后期加入消息队列
                $monthDate = date('Y_m', $trainData['endtime']);
                self::addCache($schedule['user_id'], $monthDate, $result, $trainData);
            }    
        }

        var_dump("结束");
        exit;

    }

    // 加入缓存 todo 要加入的月份（当前）如果没有缓存数据 需要当月所有数据放入缓存
    protected static function addCache($uId, $monthDate, $trainId, $data){
        $trainOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
        $cacheRes = $trainOutsideModel->getCacheDataByMonth($uId, $monthDate);
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
            $fields = ['htype','starttime','endtime','burncalories','originaltime','exciseimg','homeworkid','train_name','projecttime'];
            $resList = [];
            $trainOutsideModel->getListByMonth($hMap, $fields, $options, $monthDate, $resList);
        }
        else{
            $pInterval = 3600;
            if(empty($pInterval)) $pInterval = ($data['endtime'] - $data['starttime']);
            if(empty($data['train_name'])){
                $data['train_name'] = '课外活动';
            }
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
            ];
            $trainOutsideModel->addCacheDataByMonth($uId, $monthDate, $cacheData);
        }
    }

}