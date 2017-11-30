<?php

include_once "Cli.php";

$app->execute(['TrainOut','init']);

class TrainOut {

    public static function init(){

    	// $userModel = Dao_UserModel::getInstance();
     //    $classModel = Dao_ClassinfoModel::getInstance();
     //    $ustatModel = Dao_ExerciseuserstatModel::getInstance();

     //    $file = '/mnt/file/' . 'student.xlsx';
     //    $ext = self::getExt($file);
     //    $datas = self::importExcel($file,$ext);
     //    unset($datas[1]);
     //    foreach($datas as $data){
     //        $userName = (string)$data[0];
     //        $birth = (string)$data[4];
     //        $birth = strtotime($birth);
     //        $className = (string)$data[2] . (string)$data[3];

     //        // echo $className;
     //        // exit;

     //        $where = [
     //            'username' => $userName,
     //            'birthday' => $birth,
     //            'grade' => 14,
     //        ];

     //        $userInfo = $userModel->queryOne($where);

     //        if(empty($userInfo) || $userInfo['classinfo']['classname'] == $className){
     //            // echo $userName;
     //            continue;
     //        }

     //        $classWhere = [
     //            'schoolname' => '府学胡同小学',
     //            'name' => $className
     //        ];

     //        $count = $classModel->count($classWhere);
     //        $classInfo = $classModel->queryOne($classWhere);
     //        if(empty($classInfo)){
     //            echo $userName;
     //            continue;
     //        }

     //        $userUpdate['classinfo'] = [
     //            'classid' => (string)$classInfo['_id'],
     //            'classname' => $classInfo['name'],
     //        ];

     //        $userUpdate = [
     //            'classinfo' =>[
     //                'classid' => (string)$classInfo['_id'],
     //                'classname' => $classInfo['name'],
     //            ]
     //        ];

     //        $result = $userModel->update(['_id'=>$userInfo['_id']],$userUpdate);
     //        if($result === false){
     //            echo $userName;
     //            continue;
     //        }

     //        $statWhere = [
     //            'starttime' => ['$gte' => 1504195200],
     //            'userid' => $userInfo['_id'],
     //        ];
     //        $statOption['projection'] = ['_id' =>1];

     //        $ustatData = $ustatModel->query($statWhere,$statOption);

     //        $ustatIds = array_column($ustatData,'_id');

     //        foreach($ustatIds as $ustatId){

     //            $statUpdate = ['class_id' => $classInfo['_id']];
     //            $ustatModel->update(['_id'=>$ustatId],$statUpdate);
     //        }   

     //    }

echo "结束";
exit;



    }

    private static function getExt($fileName) {

        return strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    }

    private static function importExcel($file,$ext) {
        // 判断文件是什么格式
        ini_set('max_execution_time', '0');
        if($ext == 'xlsx'){
            $type = 'Excel2007';
        }

        if($ext == 'xls'){
            $type = 'Excel5';
        }
        // 判断使用哪种格式
        $objReader = \PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($file); 
        $sheet = $objPHPExcel->getSheet(0); 
        // 取得总行数 
        $highestRow = $sheet->getHighestRow();  
        // 取得总列数      
        $highestColumn = $sheet->getHighestColumn(); 
        //循环读取excel文件,读取一条,插入一条
        $data=array();
        //从第一行开始读取数据
        for($j=1;$j<=$highestRow;$j++){

            //从A列读取数据
            for($k='A';$k!=$highestColumn;$k++){
                // 读取单元格
                $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
            } 
            $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
        }

        return $data;
    }

}
