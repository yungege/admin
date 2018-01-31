<?php
class Service_Stat_TotalModel extends BasePageService {

    protected $startTime;
    protected $endTime;
    public static $excelHeader = [
        'school'    => '学校',
        'class'     => '班级',
        'doneCount' => '总完成次数',
        'userCount' => '总人数',
        'tyName'    => '体育老师',
        'tyMobile'  => '体育老师电话',
        'bzrName'   => '班主任',
        'bzrMobile' => '班主任电话',
    ];
    public static $fileName = '/各校区锻炼统计.xls';

    protected $resData = [
        
    ];

    public function __construct() {
        
    }

    protected function __declare() {

    }

    protected function __execute($req) {

        $schoolModel = Dao_SchoolinfoModel::getInstance();
        $classModel = Dao_ClassinfoModel::getInstance();
        $userModel = Dao_UserModel::getInstance();
        $doneModel = Dao_TrainingdoneModel::getInstance();
        $punchModel = Dao_PunchModel::getInstance();
        $outModel = Dao_TrainingDoneOutsideModel::getInstance();

        $req = $req['get'];
        $index = 0;

        $this->startTime = strtotime($req['startTime']);
        $this->endTime = strtotime($req['endTime']) + 86399;

        if(!empty($req['school']) && $req['school'] != 'undefined'){
            $schoolWhere = ['_id' => $req['school']];
        }else{
            $schoolWhere = [ ];
        }

        $schoolClassLists = [];

        while (1) {
            $schoolInfo = $schoolModel->queryOne($schoolWhere, [
                'limit' => 1,
                'skip' => $index,
                'projection' => [
                    'name' => 1,
                ]
            ]);

            if(empty($schoolInfo)) break;

            $schoolId = $schoolInfo['_id'];
            $classList = $classModel->query(
                ['schoolid' => $schoolId,'is_test' => 0],
                ['limit' => 0,'projection' => ['name' => 1,'schoolname'=>1,'grade'=>1,'classno' => 1]]
            );
            if(empty($classList)){
                $index ++;
                continue;
            }

            $schoolClassList = [];
            foreach ($classList as $crow) {
                $item = [];
                $userList = $userModel->query(
                    ['classinfo.classid' => $crow['_id']],
                    ['projection' => ['_id' => 1, 'username' => 1]]
                );
                $userCount = count($userList);
                if(empty($userList)){
                    continue;
                }

                $userIds = array_column($userList, '_id');
                $doneCount = $doneModel->count([
                    'userid' => [
                        '$in' => $userIds,
                    ],
                    'htype' => [
                        '$exists' => 1
                    ],
                    'starttime' => ['$gte' => $this->startTime],
                    'endtime' => ['$lte' => $this->endTime],
                ]);

                $punchCount = $punchModel->count([
                    'userid' => [
                        '$in' => $userIds,
                    ],
                    'ctime' => ['$gte' => $this->startTime,'$lte' => $this->endTime]
                ]);

                $outCount = $outModel->count([
                    'userid' => [
                        '$in' => $userIds,
                    ],
                    'starttime' => ['$gte' => $this->startTime],
                    'endtime' => ['$lte' => $this->endTime],
                ]);

                // 体育老师 班主任
                $teachers = $userModel->query(
                    ['$or' => [['schoolinfo.schoolid' => $schoolId],['schoolinfo_second.schoolid' => $schoolId]],'type' => 2,'teacher_type' => ['$in' => [2,3]]],
                    ['projection' => ['username'=>1,'mobileno'=>1,'teacher_type'=>1,'manageclassinfo'=>1],'limit' => 0]
                );
                $t1 = $t2 = [];
                if(!empty($teachers)){
                    foreach ($teachers as $trow) {
                        foreach ($trow['manageclassinfo'] as $mrow) {
                            if($mrow['classid'] == $crow['_id']){
                                if($trow['teacher_type'] == 2){
                                    // 班主任
                                    if(empty($t1)){
                                        $t1 = [
                                            'name' => $trow['username'],
                                            'mobile' => $trow['mobileno'][0],
                                        ];
                                    }
                                }
                                else{
                                    // 体育老师
                                    if(empty($t2)){
                                        $t2 = [
                                            'name' => $trow['username'],
                                            'mobile' => $trow['mobileno'][0],
                                        ];
                                    }
                                }
                            }
                        }
                    }
                }

                $item = [
                    'school' => $schoolInfo['name'],
                    'class' => $crow['name'],
                    'classNo' => (int)$crow['classno'],
                    'doneCount' => ($doneCount + $punchCount + $outCount),
                    'userCount' => $userCount,
                    'tyName' => (string)$t2['name'],
                    'tyMobile' => (string)$t2['mobile'],
                    'bzrName' => (string)$t1['name'],
                    'bzrMobile' => (string)$t1['mobile'],
                ];

                $schoolClassList[(int)$crow['grade']][] = $item;
            }

            if(!empty($schoolClassList)){
                ksort($schoolClassList);
                foreach($schoolClassList as $row){
                    $schoolClassLists = array_merge($schoolClassLists,$row);
                }
            }

            $index ++;
        }

        xlsHeader(self::$excelHeader, '测试.xls');
        xlsOutput(array_keys(self::$excelHeader), $schoolClassLists);
        exit;
    }

}