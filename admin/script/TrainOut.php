<?php

include_once "Cli.php";

$app->execute(['TrainOut','init']);

class TrainOut {

    // 同年级班级调换
    public static function init(){

        $userModel = Dao_UserModel::getInstance();

        $skip = 0;
        $limit = 1;
        while(1){

            $where = [
                'type' => 1,
            ];
            $options = [
                'skip' => $skip,
                'limit' => $limit,    
            ];

            $user = $userModel->queryOne($where,$options);
            if(empty($user)){
                break;
            }

            $userId = (string)$user['_id'];
            $classId = $user['classinfo']['classid'];
            if(empty($userId) || empty($classId)){
                continue;
            }

// echo $classId;

            // $tWhere = [
            //     "type" => 2,
            //     "manageclassinfo" => ["classid" => $classId]
            // ];


            // echo $classId;
            // continue;

            $tWhere["manageclassinfo"]["classid"] = $classId;

            $teacher = $userModel->queryOne($tWhere);

            if(empty($teacher)){
                echo '空';
            }else{
                echo $teacher['username'];
            }
            // echo $userId;
            // echo $classId;
            // echo $user['username'];
            $skip++;

            if(!empty($teacher)){
                echo $teacher['username'];
                break;
            }else{
                echo $kip;
            }

            // if($skip == 5){
            //     exit;
            // }

        }


        echo "11";

    }

    

}
