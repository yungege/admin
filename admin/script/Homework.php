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

        $schoolId = "587f31732a46800e0a8b4567";
        $schoolName = "府学胡同小学";
        $limit = 1;
        $skip = 0;

        $where = [
            'train_school_name' => ['$regex' => "府学"],
            'starttime' => ['$gte' => 1504195200],
        ];
        $userIds = $trainOutsideModel->distinct('userid',$where);
        $userIds = $userIds->values;

        // var_dump($userIds);
        // exit;

        // var_dump($userIds);
        // exit;
        while(1){

            if(empty($userIds[$skip])){
                break;
            }

            $stat = [];
            $tMatch = [
                '$match' => [
                    'train_school_name' => ['$regex' => "府学"],
                    'userid' => $userIds[$skip],
                    'starttime' => ['$gte' => 1504195200],
                ],
            ];
            $tFields = [
                '$project' => [
                    'userid' => 1,'train_school_name' => 1,'train_school_id' => 1,'train_name' => 1,'starttime' => 1
                ]
            ];
            $tGroup = [
               '$group' => [
                    '_id' => '$train_name','starttime' => ['$push' => '$starttime'],
               ]
            ];
            $aggregate = [$tMatch,$tFields,$tGroup];
            $tDatas = $trainOutsideModel->aggregate($aggregate);
            if(empty($tDatas)){
               continue;
            }
            // $skip++;
            // continue;
            foreach($tDatas as $$tName => &$tData){
                $tData['doneNo'] = array_values(array_unique(array_map(['TrainOut','weekSwitch'],$tData['starttime'])));
            }
           
            $schedule = [];
            foreach($tDatas as $key => $value){

                $scheduleWhere = [
                    'user_id' => $userIds[$skip],
                    'train_name' => $value['_id'],
                ];
                $result = $trainSchedule->query($scheduleWhere,[]);
                if(!empty($result)){
                    continue;
                }

                $schedule = [
                    'user_id'                  => $userIds[$skip],
                    'train_school_id'          => $schoolId,
                    'train_school_name'        => $schoolName,
                    'done_date'                => $value['doneNo'],
                    'train_name'               => $value['_id'],
                    'ctime'                    => time(),

                ];
                $trainSchedule->insert($schedule);
            }

            
            // var_dump($tDatas);
            // exit;
            
            $skip++;
        }
    }

    public function weekSwitch($value){

        return (int)date('w',$value) ? (int)date('w',$value) : 7;
    }


}