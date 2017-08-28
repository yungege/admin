<?php
class Service_Stat_TrainStatModel extends BasePageService {

    protected $schoolId;

    protected $schoolModel;
    protected $userModel;
    protected $trainModel;

    public function __construct() {
        
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
    }

    protected function __declare() {

    }

    protected function __execute($req) {

        $this->schoolId = "587f31732a46800e0a8b4567";

        $schoolWhere = [
            'name' =>['$ne' =>'府学胡同小学'],
        ];
        $option['projection'] = ['name'=>1,'_id'=>1];
        $schoolInfos = $this->schoolModel->query($schoolWhere,$option);
        $schoolIds = array_column($schoolInfos,'_id');

        $userWhere = [
            'schoolinfo.schoolid' => ['$in' => $schoolIds],
        ];
        $option['projection'] = ['username' => 1,'ssoid' => 1,'mobileno' => 1,'_id' => 1, 'schoolinfo' => 1];
        $userInfos = $this->userModel->query($userWhere,$option);
        
        $userIds = array_column($userInfos,'_id');

        $trainWhere = [
            'userid' => ['$in' => $userIds],
            // 'starttime' => ['$gte' => 1499875200],
        ];
        $option['projection'] = [
            'userid' => 1,
        ];
        
        $trainDatas = $this->trainModel->query($trainWhere,$option);
        $trainList = [];
        foreach($trainDatas as $key => $value ){
            $trainList[$value['userid']][] = $value;
        }

        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Europe/London');

        if (PHP_SAPI == 'cli'){
            die('This example should only be run from a Web Browser');
        }


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


        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', '姓名')
                    ->setCellValue('B1', '学校')
                    ->setCellValue('C1', '是否激活')
                    ->setCellValue('D1', '锻炼次数');

        // Miscellaneous glyphs, UTF-8
        $i = 2;
        foreach($schoolIds as $schoolId){
            foreach($userInfos as $userInfo){
                if($userInfo['schoolinfo']['schoolid'] == $schoolId){
                    $a = 'A' . $i;
                    $b = 'B' . $i;
                    $c = 'C' . $i;
                    $d = 'D' . $i;

                    $data['schoolName'] = $userInfo['schoolinfo']['schoolname'];
                    $data['username'] = $userInfo['username'];
                    if(empty($userInfo['ssoid']) && empty($userInfo['mobileno'])){
                        $data['register'] = "未激活";
                    }else{
                        $data['register'] = '已激活';
                    }
                    
                    if(empty($trainList[$userInfo['_id']])){
                        $data['trainNo'] = 0;
                    }else{
                        $data['trainNo'] = count($trainList[$userInfo['_id']]);
                    }
                    
                    $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue($a , $data['username'])
                            ->setCellValue($b , $data['schoolName'])
                            ->setCellValue($c , $data['register'])
                            ->setCellValue($d , $data['trainNo']);
                    $i++;
                }
            }
        }
        

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('统计');


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
    }

}