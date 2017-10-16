<?php
class Service_Stat_TrainStatModel extends BasePageService {

    protected $schoolId;
    protected $schoolModel;
    protected $userModel;
    protected $trainModel;
    protected $statData = [];
    protected $trainOutsideModel;
    protected $gradeNo = [12,13,14,15,16];
    protected $classModel;
    protected $startTime;
    protected $endTime;

    public function __construct() {
        
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
        $this->classModel = Dao_ClassinfoModel::getInstance();
        $this->trainOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
        $this->startTime = 1499961600;
        $this->endTime = 1505663999;
    }

    protected function __declare() {

    }

    protected function __execute($req) {

        // error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Shanghai');

        if (PHP_SAPI == 'cli'){
            die('This example should only be run from a Web Browser');
        }

        /** Include PHPExcel */
        // require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';

        // Create new PHPExcel object
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
                        ->setCellValue('A1', '年级')
                        ->setCellValue('B1', '班级')
                        ->setCellValue('C1', '姓名')
                        ->setCellValue('D1', '联系电话')
                        ->setCellValue('E1', '替换次数');

                        $i = 2;
        // $this->schoolId = "587f31732a46800e0a8b4567";
        // $classWhere = [
        //     'schoolid' => $this->schoolId,
        //     'is_test' => 0.0,
        //     'grade' => ['$in' => $this->gradeNo],
        //     'branch_school' => null,
        // ];
        // $classOptions['sort'] = ['grade' => 1,'classno' => 1];
        // $classOptions['projection'] = ['name' => 1];
        // $classInfos = $this->classModel->query($classWhere,$classOptions);

        // foreach($classInfos as $classInfo){

        //     $userWhere = [
        //         'classinfo.classid' => $classInfo['_id'],
        //     ];
        //     $userOption['projection'] = ['username' => 1, 'grade' => 1,'_id' => 1,'classinfo' =>1,'mobileno'=>1];

        //     $userDatas = $this->userModel->query($userWhere,$userOption);
        //     foreach($userDatas as $userData){
        //         $trainWhere =[
        //             'userid' => $userData['_id'],
        //             'starttime' => ['$gte' => $this->startTime],
        //             'endtime' => ['$lte' => $this->endTime],
        //             'htype' => ['$in' => [1,2,3]],
        //         ];
        //         $trainNo = $this->trainModel->count($trainWhere);
        //         unset($trainWhere['htype']);
        //         $interestNo = $this->trainOutsideModel->count($trainWhere);
        //         if(($trainNo + $interestNo) >= 30){
        //             if(is_array($userData['mobileno'])){
        //                 $mobileNo = implode(',',$userData['mobileno']);
        //             }else{
        //                 $mobileNo = $userData['mobileno'];
        //             }
        //             $a = 'A' . $i;
        //             $b = 'B' . $i;
        //             $c = 'C' . $i;
        //             $d = 'D' . $i;
        //             $e = 'E' . $i;

        //             // Miscellaneous glyphs, UTF-8
        //             $objPHPExcel->setActiveSheetIndex(0)
        //                         ->setCellValue($a, $userData['grade'])
        //                         ->setCellValue($b, $userData['classinfo']['classname'])
        //                         ->setCellValue($c, $userData['username'])
        //                         ->setCellValue($d, $mobileNo)
        //                         ->setCellValue($e, $interestNo);
        //             $i++;
        //         }
        //     }
            
        // }
   

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('学校统计');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="01simple.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;



        var_dump(2);exit;
    }

}
