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

        $schoolNames = $schoolOutModel->distinct("school_name",["school_name" => ['$ne' => ""]]);
        $schoolNameNo = count($schoolNames);

        foreach($schoolNames->values as $schoolName){
           
            $userIds = $schoolOutModel->distinct("user_id",["school_name" => $schoolName])->values;
            foreach($userIds as $userId){
                $schoolWhere = ['school_name' => $schoolName,'user_id' => $userId];
                $schoolInfos = $schoolOutModel->query($schoolWhere,[]);
                // var_dump($schoolInfos);       
                $schoolNo = count($schoolInfos);
                if($schoolNo <= 1){
                    continue;
                }
                for($i = 1;$i < $schoolNo;$i++){
                    $set = ['is_delete' => 1];
                    $result = $schoolOutModel->updateById($schoolInfos[$i]['_id'],$set);
                } 
            }
            var_dump($schoolName);
        }

        var_dump('结束');
        exit;
    }


}