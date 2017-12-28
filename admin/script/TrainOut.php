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

        $limit = 10;
        $skip =0;

        while(1){

            $where = [
                'type' => 2,
            ];
            $options = [
                'projection' => ['manageclassinfo' => 1],
                'limit' => $limit,
                'skip' => $skip,
            ];
            $teacherInfos = $userModel->query($where,$options);

            if(empty($teacherInfos)){
                break;
            }

            foreach($teacherInfos as $teacherInfo){

                $classIds = array_column($teacherInfo['manageclassinfo'],'classid');

                if(!empty($classIds)){
                    $classWhere = [
                        '_id' => ['$in' => $classIds],
                    ];

                    $classOptions = [
                        'projection' => ['name' => 1],
                    ];

                    $classInfos = $classModel->query($classWhere,$classOptions);
                    $classes['manageclassinfo'] = [];
                    foreach($classInfos as $classInfo){
                        $class['classid'] = $classInfo['_id'];
                        $class['classname'] = $classInfo['name'];
                        $classes['manageclassinfo'][] = $class;
                    }
                    $result = $userModel->updateUserInfoByUserid($teacherInfo['_id'],$classes);
                }
                
            }
            $skip = $skip + 10;
        }
    }


}
