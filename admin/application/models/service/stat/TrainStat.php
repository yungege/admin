<?php
class Service_Stat_TrainStatModel extends BasePageService {

    protected $schoolId;
    protected $schoolModel;
    protected $userModel;
    protected $trainModel;
    protected $statData = [];
    protected $gradeNo = [12,13,14,15,16];
    protected $classModel;
    protected $trainOutsideModel;
    protected $startTime;
    protected $endTime;
    protected $userIds;

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

        error_reporting(E_ALL);
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
                        ->setCellValue('A1', '班级')
                        ->setCellValue('B1', '总人数')
                        ->setCellValue('C1', '总锻炼次数')
                        ->setCellValue('D1', '总锻炼时间')
                        ->setCellValue('E1', '总消耗卡路里')
                        ->setCellValue('F1', '人均锻炼次数')
                        ->setCellValue('G1', '总替换次数');




        $this->schoolId = "587f31732a46800e0a8b4567";
        $schoolFields = ['name'];
        $schoolInfo = $this->schoolModel->getSchoolById($this->schoolId,$schoolFields);

        $classWhere = [
            'schoolid' => $this->schoolId,
            'is_test' => ['$ne' => 1],
            'grade' => ['$in' => $this->gradeNo],
            'branch_school' => null,
            ];
        $classOptions = [
            'sort' => ['grade' => 1,'classno' => 1],
        ];
        $classOptions = [
            'projection' => ['name' => 1 ,'_id' => 1],
        ];

        $classInfos = $this->classModel->query($classWhere,$classOptions);
        // var_dump($classInfos);
        // exit;
        
        $i = 2;
        foreach($classInfos as $classInfo){

            $a = 'A' . $i;
            $b = 'B' . $i;
            $c = 'C' . $i;
            $d = 'D' . $i;
            $e = 'E' . $i;
            $f = 'F' . $i;
            $g = 'G' . $i;

            $userWhere = [
                'classinfo.classid' => $classInfo['_id'],
                'type' => 1,
            ];
            $option['projection'] = ['username' => 1,'ssoid' => 1,'mobileno' => 1,'_id' => 1, 'schoolinfo' => 1,'grade' => 1];
            $userInfos = $this->userModel->query($userWhere,$option);
            $this->userIds = array_column($userInfos,'_id');
            $userNo = count($this->userIds);

            $where = [
                'starttime' => [
                    '$gte' => $this->startTime,
                    '$lte' => $this->endTime,
                ],
                'htype' => [
                    '$in' => [1,2,3],
                ],
                'userid' => [
                    '$in' => $this->userIds,
                ],
            ];

            $fields = [
                '$project' => [
                    'userid' => 1,
                    'burncalories' => 1,
                    'projecttime' => 1,
                    'htype' => 1,
                ]
            ];

            $group = [
                '$group' => [
                    '_id' => '$userid',
                    'burncalorie' => ['$sum' => '$burncalories'],
                    'projecttime' => ['$sum' => '$projecttime'],
                    'count' => ['$sum' => 1],
                    // 'htype' => ['$push' => '$htype'],
                ]
            ];
            $aggregate = [
                ['$match' => $where],
                $fields,
                $group
            ];

            $list = $this->trainModel->aggregate($aggregate);

            unset($where['htype']);
            $aggregate = [
                ['$match' => $where],
                $fields,
                $group
            ];

            $list2 = $this->trainOutsideModel->aggregate($aggregate);

            $trainNo = 0;
            $calories = 0;
            $trainTime = 0;
            if(!empty($list)){
                foreach($list as $value){
                    $trainNo += $value['count'];
                    $calories += $value['burncalorie'];
                    $trainTime += $value['projecttime'];
                }
            }
            
            $trainNo1 = $trainNo;
            if(!empty($list2)){
                foreach($list2 as $value){
                    $trainNo += $value['count'];
                    $calories += $value['burncalorie'];
                    $trainTime += $value['projecttime'];
                }
            }

            $avgNo = round($trainNo/$userNo,2);
            $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue($a, $classInfo['name'])
                            ->setCellValue($b, $userNo)
                            ->setCellValue($c, $trainNo)
                            ->setCellValue($d, round($trainTime/60,2))
                            ->setCellValue($e, $calories)
                            ->setCellValue($f, $avgNo)
                            ->setCellValue($g, $trainNo - $trainNo1);
            $i++;
        }
        
        

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('学校统计');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        ob_end_clean();
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