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
                'schoolinfo.schoolid' => "5a4edc06c9609c0e1d1622bd",
                "my_teacher" => "",
                'classinfo.classname' => ['$ne' => "测试班级"]
            ];
           
            // $options = [
            //     // 'skip' => $skip,
            //     // 'limit' => $limit,    
            // ];

            $user = $userModel->queryOne($where);



            if(empty($user)){
                break;
            }

            $userId = (string)$user['_id'];
            $classId = $user['classinfo']['classid'];

            if(empty($userId) || empty($classId)){
                continue;
            }

            $tWhere['type'] = 2;
            $tWhere['manageclassinfo.classid'] = $classId;
            $teacher = $userModel->queryOne($tWhere);
            $teacherId = (string)$teacher['_id'];

            // continue;
            if(empty($teacher)){
                echo "无老师";
                echo $user['username'];
                continue;
            }else{

                $set['my_teacher'] = $teacherId;
                $result = $userModel->update(['_id' => $userId],$set);

                // echo json_encode($result);
                // exit;
                if($result == false){
                    echo "修改失败";
                    echo $user['username'];
                    continue;
                }else{
                    echo "成功";
                    echo $user['username'];
                    continue;
                }
                
            }

        }
        echo "结束";
    }

    

}
