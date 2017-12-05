<?php

include_once "Cli.php";

$app->execute(['TrainOut','init']);

class TrainOut {

    // 同年级班级调换
    public static function init(){

    	$userModel = Dao_UserModel::getInstance();
        // $classModel = Dao_ClassinfoModel::getInstance();
        // $ustatModel = Dao_ExerciseuserstatModel::getInstance();

        $file = '/mnt/file/' . 'a.xlsx';
        $ext = self::getExt($file);
        $datas = self::importExcel($file,$ext);
        unset($datas[1]);
        foreach($datas as $data){

            $data[0] = (string)$data[0];
            $data[1] = (string)$data[1];
            $data[2] = intval(($data[2] - 25569) * 3600 * 24) - 8 * 3600;
            // $data[2] = (string)$data[2];
            // $data[2] = strtotime($data[2]);

            // echo $data[0];
            // echo $data[1];
            // echo $data[2];

            // exit;


            if(empty($data[1]) || empty($data[2]) || empty($data[0])){
                echo 1;
                echo (string)$data[0];
                continue;
            }

            if($data[2] < 120654720){
                echo (string)$data[0];
                continue;
            }

            $user['username'] = (string)$data[0];
            $user['birthday'] = $data[2];
            $user['profile'] = "好好学习，天天向上！";
            $user['type'] = 1;
            $user['nation'] = 1;
            $user['createtime'] = time();
            if($data[1] == '男'){
                $user['sex'] = 0;
            }else{
                $user['sex'] = 1;
            }
            
            $user['grade'] = 14;
            $user['schoolinfo'] = [
                'schoolid' => "5a2607b0c9609c142d177934",
                'schoolname' => "北锣鼓巷小学",
            ];
            $user['classinfo'] = [
                'classid' => "5a2607efc9609c0e1e5ed413",
                'classname' => "4年级6班",
            ];

            $a = $userModel->insert($user);
            if($a == false){
                echo (string)$data[0];
            }
            
        }


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
