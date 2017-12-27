<?php

include_once "Cli.php";

$app->execute(['TrainOut','init']);

class TrainOut {

    public static function init(){

        $schoolOutModel = Dao_SchoolInfoTrainingModel::getInstance();
        $userModel = Dao_UserModel::getInstance();
        $homeworkModel = Dao_TrainingHomeworkModel::getInstance();     
        $trainOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();

        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Shanghai');

        $schoolInfos = $schoolOutModel->distinct("school_name",["school_name" => ['$ne' => ""]]);
        $schoolInfos = $schoolInfos->values;

        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                     ->setLastModifiedBy("Maarten Balliauw")
                                     ->setTitle("Office 2007 XLSX Test Document")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");

        $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', '培训机构')
                        ->setCellValue('B1', '运动名称')
                        ->setCellValue('C1', '机构地址')
                        ->setCellValue('D1', '机构电话')
                        ->setCellValue('E1', '学校')
                        ->setCellValue('F1', '姓名')
                        ->setCellValue('G1', '班级')
                        ->setCellValue('H1', '电话');

        $i = 2;
        foreach($schoolInfos as $schoolInfo){

            $where = [
                'school_name' => $schoolInfo,
            ];
            $schools = $schoolOutModel->query($where);
            $workIds = array_column($schools,'homework_id');
            $works = $homeworkModel->query(['_id' => ['$in' => $workIds]]);

            $workNames = array_column($works,'train_name');
            $workNames = array_unique($workNames);

            $users = [];
            foreach($workNames as $workName){
                foreach($works as $work){
                    if($work['train_name'] == $workName){
                        if($users[$workName] == null){
                            $users[$workName] = [];
                        }
                        array_push($users[$workName],$work['_id']);
                    }
                }    
            }

            foreach($users as $key => $value){

                $a = 'A' . $i;
                $b = 'B' . $i;
                $c = 'C' . $i;
                $d = 'D' . $i;
                $e = 'E' . $i;
                $f = 'F' . $i;
                $g = 'G' . $i;
                $h = 'H' . $i;

                $trains = $trainOutsideModel->query(['homeworkid' => ['$in' => $value]]);
                $value = array_column($trains,'userid');

                $userInfos = $userModel->query(['_id' => ['$in' => $value],"username" => ['$ne' => "张羽"]],[
                    'projection' => ['username' => 1,'schoolinfo' =>1,'classinfo' =>1,'mobileno'=>1]]);

                foreach($userInfos as $userInfo){
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($a, $schoolInfo)
                        ->setCellValue($b, $key)
                        ->setCellValue($c, $schools[0]['addr'])
                        ->setCellValue($d, $schools[0]['mobile'] ? $schools[0]['mobile'] : "")
                        ->setCellValue($e, $userInfo['schoolinfo']['schoolname'])
                        ->setCellValue($f, $userInfo['username'])
                        ->setCellValue($g, $userInfo['classinfo']['classname'])
                        ->setCellValue($h, $userInfo['mobileno'][0]);                  
                    $i++;    
                }  

            }
            // if($i == 5){
            //     break;
            // }
            
        }

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('学校统计');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // ob_end_clean();
        // Redirect output to a client’s web browser (Excel5)
        // header('Content-Type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment;filename="01simple.xls"');
        // header('Cache-Control: max-age=0');
        // // If you're serving to IE 9, then the following may be needed
        // header('Cache-Control: max-age=1');

        // // If you're serving to IE over SSL, then the following may be needed
        // header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        // header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        // header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        // header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        // $objWriter->save('php://output');
        $objWriter->save('/a.xls');


        // exit;

        var_dump(2);exit;
        
    }


}
