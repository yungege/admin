<?php
class Service_Stat_TrainStatModel extends BasePageService {

    protected $schoolId;

    protected $schoolModel;
    protected $userModel;
    protected $trainModel;
    protected $proSkuModel;
    protected $statData = [];

    public function __construct() {
        
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
        $this->proSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
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






        $this->schoolId = "587f31732a46800e0a8b4567";

        $schoolFields = ['name'];

        $schoolInfo = $this->schoolModel->getSchoolById($this->schoolId,$schoolFields);

        $userWhere = [
            'schoolinfo.schoolid' => $this->schoolId,
            'classinfo.classname' => ['$ne' => '测试班级'],
            'type' => 1
        ];
        $option['projection'] = ['username' => 1,'ssoid' => 1,'mobileno' => 1,'_id' => 1, 'schoolinfo' => 1];
        $userInfos = $this->userModel->query($userWhere,$option);

        $proSkuWhere = [];
        $options['projection'] = ['time_cost' => 1];
        $proSku = $this->proSkuModel->query($proSkuWhere,$options);
        $proSku = array_column($proSku,'time_cost','_id');
        
        $userIds = array_column($userInfos,'_id');

        $trainWhere = [
            'userid' => ['$in' => $userIds],
            'starttime' => ['$gte' => 1499875200],
            'endtime' => ['$lte' => 1503885600],
            'htype' => ['$in' => [1,2,3]],
        ];
        $option['projection'] = [
            'userid' => 1,'trainingid' => 1,'burncalories' => 1, 'htype' => 1,'endtime' => 1,'starttime' => 1
        ];
        
        $trainDatas = $this->trainModel->query($trainWhere,$option);

        $this->statData['timeSum'] = 0;
        $this->statData['burncalorieSum'] = 0;
        foreach($trainDatas as $trainData){
            if(!empty($trainData['trainingid'])){
                if(!empty($proSku[$trainData['trainingid']])){
                    $this->statData['timeSum'] += $proSku[$trainData['trainingid']];
                    $this->statData['burncalorieSum'] += $trainData['burncalories'];
                }
            }else{
                $this->statData['timeSum'] += ($trainData['endtime'] - $trainData['starttime']);
                $this->statData['burncalorieSum'] += $trainData['burncalories'];
            }
            
        }

        $this->statData['timeSum'] = round( $this->statData['timeSum'] / 60 ,2);
        $this->statData['burncalorieSum'] = round($this->statData['burncalorieSum'],2);

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', '学校')
                    ->setCellValue('B1', '总人数')
                    ->setCellValue('C1', '总锻炼次数')
                    ->setCellValue('D1', '总锻炼时间')
                    ->setCellValue('E1', '总消耗卡路里')
                    ->setCellValue('F1', '人均锻炼次数');


        $studentNo = count($userInfos);
        $trainNo = count($trainDatas);
        $avg = round($trainNo / $studentNo ,2);

// var_dump($schoolInfo['name']);
// var_dump($studentNo);
// var_dump($trainNo);
// var_dump($this->statData['timeSum']);
// var_dump($this->statData['burncalorieSum']);
// var_dump($avg);
// exit;


        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A2', $schoolInfo['name'])
                    ->setCellValue('B2', $studentNo)
                    ->setCellValue('C2', $trainNo)
                    ->setCellValue('D2', $this->statData['timeSum'])
                    ->setCellValue('E2', $this->statData['burncalorieSum'])
                    ->setCellValue('F2', $avg);
        

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