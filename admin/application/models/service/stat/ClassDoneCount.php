<?php

use PHPExcel;
use PHPExcel_Writer_Excel2007;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Fill;
use PHPExcel_IOFactory;

class Service_Stat_ClassDoneCountModel extends BasePageService {

    // protected $schoolId;

    protected $schoolModel;
    protected $userModel;
    protected static $gradeNo = [11,12,13,14,15,16];
    protected $classModel;
    protected $resArr = [];
    protected $resData = [];

    public static $header = [
        'A1' => '班级名',
        'B1' => '锻炼次数',
        'C1' => '锻炼人数',
        'D1' => '学生名单',
    ];

    public function __construct() {
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
        $this->classModel = Dao_ClassinfoModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();

        // 锻炼
        $this->doneModel  = Dao_TrainingdoneModel::getInstance();
        // 兴趣替换
        $this->outDoorModel = Dao_TrainingDoneOutsideModel::getInstance();
        // 打卡替换
        $this->punchModel = Dao_PunchModel::getInstance();
    }

    protected function __declare() {

    }

    protected function __execute($req) {
        if(isset($req['get']['export'])){
            $this->reqData = $req['get'];
            $this->exportExcel($req['get']);
            exit;
        }

        $startTime = date('Y-m-d', strtotime("-6 days"));
        $endTime = date('Y-m-d');

        $schoolList = $this->schoolModel->query(['is_test' => ['$ne' => 1]], ['limit' => 0]);
        return [
            'initStart' => $startTime,
            'initEnd' => $endTime,
            'schoolList' => $schoolList,
            'grade' => $this->gradeNo,
        ];
    }

    // 文件导出
    protected function exportExcel($req){
        // 不限制执行时间
        set_time_limit(0);
        // 设置运行内存为512M
        ini_set("memory_limit","256M");

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $activeSheet = $objPHPExcel->getActiveSheet();

        // 居中
        $activeSheet->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $activeSheet->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


        foreach (self::$header as $col => $val) {
            $activeSheet->setCellValue($col, $val);
            $activeSheet->getStyle($col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C2C2C2');
        }

        // 设置列宽
        $activeSheet->getColumnDimension('A')->setWidth(12);
        $activeSheet->getColumnDimension('B')->setWidth(12);
        $activeSheet->getColumnDimension('C')->setWidth(12);
        $activeSheet->getColumnDimension('D')->setWidth(100);
        // 设置行高
        $activeSheet->getRowDimension('1')->setRowHeight(40);
        // 固定第一行
        $activeSheet->freezePane('A2');

        if($req['school'] == -1){
            die('无法获取数据，请联系管理员');
        }

        $classList = $this->getClassList($req['school']);
        if(empty($classList)){
            die('该学校暂无班级信息');
        }

        $schooName = $classList[0]['schoolname'];
        $this->startTime = strtotime($req['start'].' 00:00:00');
        $this->endTime = strtotime($req['end'].' 23:59:59');
        $this->fileName = implode([$schooName,$req['start'],$req['end'],'统计数据.xlsx'], '_');

        if($this->startTime >= $this->endTime || $this->startTime >= time()){
            die('请选择正确的日期');
        }

        $this->getAllTrainCount($classList);
        if(empty($this->resData)){
            die('该学校暂无学生信息');
        }

        // sheet title
        $activeSheet->setTitle($schooName);

        // $activeSheet->getStyle('A1:F100')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)->getColor()->setRGB('e8ecee');
        $activeSheet->getStyle('A1:F100')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $activeSheet->getStyle('A1:F100')->getBorders()->getAllBorders()->getColor()->setRGB('E0E0E0'); // color

        $i = 2;
        foreach($this->resData as $line => $info){
            $startLine = $i;
            foreach ($info['users'] as $count => $users) {
                $activeSheet->getRowDimension($i)->setRowHeight(22);
                $activeSheet->setCellValue('B'.$i, $count);
                $activeSheet->setCellValue('C'.$i, count($users));
                $activeSheet->setCellValue('D'.$i, implode($users, ','));
                $i += 1;
            }
            $endLine = $startLine + count($info['users']) - 1;

            $activeSheet->mergeCells("A{$startLine}:A{$endLine}");
            $activeSheet->setCellValue("A{$startLine}", $info['cname']);
        }

        $this->saveFile($objPHPExcel);
    }

    // 文件下载
    protected function saveFile($objPHPExcel){
        ob_end_clean();
        ob_start();
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$this->fileName.'"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $objWriter->save('php://output');
        exit;
    }

    /**
     * 获取班级列表
     */
    protected function getClassList($schoolId){
        $newList = [];
        $classList = $this->classModel->query(
            ['schoolid' => (string)$schoolId, 'is_test' => ['$ne' => 1], 'grade' => ['$in' => self::$gradeNo]],
            ['limit' => 0,'projection' => ['name' => 1,'classno' => 1,'schoolname' => 1,'grade' => 1]]
        );

        if(empty($classList)) return $newList;

        foreach ($classList as &$row) {
            $row['grade'] = (int)$row['grade'];
            $row['classno'] = (int)$row['classno'];
            $row['classOrder'] = intval($row['grade']) * 100 + intval($row['classno']);
        }

        $classList = Tools::multiArraySort($classList, 'classOrder', SORT_ASC);
        return $classList;
    }

    // 获取锻炼信息
    protected function getAllTrainCount($classList){
        foreach ($classList as $row) {
            $this->userCount = 0;
            $this->resArr = []; // 重置数组

            $studentList = $this->userModel->getUserInfoByClassId(
                $row['_id'],
                ['username']
            );
            if(empty($studentList)){
                continue;
            };

            // 获取锻炼次数
            $this->getTrainCount($studentList, 'endtime', 1);

            // 获取替换次数
            $this->getTrainCount($studentList, 'endtime', 2);

            // 获取打卡次数
            $this->getTrainCount($studentList, 'ctime', 3);

            $this->resData[] = [
                'cid' => $row['_id'],
                'cname' => $row['name'],
                'users' => $this->formatData(),
                'userCount' => $this->userCount,
            ];
        }

    }

    protected function getTrainCount($userList, $timeField = 'endtime', $type = 1){
        $where = [
            'userid' => [
                '$in' => array_column($userList, '_id'),
            ],
            "{$timeField}" => [
                '$gte' => $this->startTime,
                '$lte' => $this->endTime,
            ],
        ];

        $fields = [
            '$project' => [
                'userid' => 1,
            ]
        ];

        $group = [
            '$group' => [
                '_id' => '$userid',
                'count' => ['$sum' => 1],
            ]
        ];

        $aggregate = [
            ['$match' => $where],
            $fields,
            $group,
            ['$sort' => ['count' => 1]],
        ];

        $list = $type == 1 ? $this->doneModel->aggregate($aggregate) : ( $type == 2 ? $this->outDoorModel->aggregate($aggregate) : $this->punchModel->aggregate($aggregate));
        if(empty($list) && ($type == 1)){
            foreach ($userList as $u) {
                $this->resArr[$u['_id']] = [
                    '_id' => $u['_id'],
                    'username' => $u['username'],
                    'count' => 0,
                ];
            }
            return;
        }

        $list = array_column($list, null, '_id');
        foreach ($userList as $row) {
            $this->resArr[$row['_id']] = [
                '_id' => $row['_id'],
                'username' => $row['username'],
                'count' => isset($list[$row['_id']]) ? (isset($this->resArr[$row['_id']]) ? $this->resArr[$row['_id']]['count']+$list[$row['_id']]['count'] : $list[$row['_id']]['count']) : (isset($this->resArr[$row['_id']]) ? $this->resArr[$row['_id']]['count'] : 0),
            ];
        }

        return;
    }

    // 数据格式化
    protected function formatData(){
        $arr = [];
        foreach ($this->resArr as $uid => $r) {
            if(!isset($arr[$r['count']])){
                $arr[$r['count']] = [
                    $r['username'],
                ];
            }
            else{
                $arr[$r['count']][] = $r['username'];
            }
        }
        if(!isset($arr[0])){
            $arr[0] = [];
        }
        ksort($arr);
        $this->userCount = count($this->resArr);

        return $arr;
    }

}