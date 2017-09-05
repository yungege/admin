<?php
class Service_Stat_ContristModel extends BasePageService {

    protected $school;
    protected $class;
    protected $userModel;
    protected $trainModel;
    protected $tcModel;

    protected $resData;
    public $map = [];
    public $schoolList = [];
    public $classList = [];
    public $userlist = [];
    public $filename = '';
    public $passNum = 0;

    public static $keyName = [
        'userCount'     => '总人数(人)',
        'trainCount'    => '总锻炼数(次)',
        'trainTime'     => '总时长(min)',
        'trainCal'      => '总能量(千卡)',
        'trainAvg'      => '人均锻炼数(次/人)',
        'doneRate'      => '完成率(%)',
    ];

    public static $sourceName = [
        1 => '总体数据',
        2 => '分项数据',
        3 => '体测与锻炼数据',
    ];

    public function __construct() {
        $this->school       = Dao_SchoolinfoModel::getInstance();
        $this->class        = Dao_ClassinfoModel::getInstance();
        $this->userModel    = Dao_UserModel::getInstance();
        $this->trainModel   = Dao_TrainingdoneModel::getInstance();
        $this->tcModel      = Dao_PhysicalfitnesstestModel::getInstance();
    }

    protected function __declare() {

    }

    protected function __execute($req) {
        $this->getWhere($req);
        $this->getSchool();
        // $this->getClass();

        switch ($req['get']['source']) {
            case 1:
                $this->getAllData();
                break;
            case 2:
                $this->getDoneRate();
                break;
            case 3:
                $this->getScoreTarinData();
                break;
            
            default:
                # code...
                break;
        }

        return $this->resData;
    }

    protected function getWhere($req){
        // [source] => 1 2 3

        $req = $req['get'];

        // 学校
        if(isset($req['province']) && $req['province'] != -1 && preg_match("/\w+/", $req['province'])){
            $this->map['school']['province_id'] = $req['province'];
        }

        if(isset($req['city']) && $req['city'] != -1 && preg_match("/\w+/", $req['city'])){
            $this->map['school']['city_id'] = $req['city'];
        }

        if(isset($req['district']) && $req['district'] != -1 && preg_match("/\w+/", $req['district'])){
            $this->map['school']['district_id'] = $req['district'];
        }

        if(isset($req['school']) && $req['school'] != -1 && preg_match("/\w+/", $req['school'])){
            $this->map['school']['_id'] = $req['school'];
        }

        // 班级
        if(isset($req['grade']) && $req['grade'] != -1 && preg_match("/\d{2}/", $req['grade'])){
            $this->map['class']['grade'] = (int)$req['grade'];
        }

        if(isset($req['class']) && $req['class'] != -1 && preg_match("/\w+/", $req['class'])){
            $this->map['class']['_id'] = $req['class'];
        }

        // 个人
        if(isset($req['user']) && $req['user'] != -1 && preg_match("/\w+/", $req['user'])){
            $this->map['user']['_id'] = $req['user'];
        }

        // 时间
        $this->map['time']['start'] = strtotime($req['start'] . ' 00:00:00');
        $this->map['time']['end'] = strtotime($req['end'] . '23:59:59');

        if(isset($this->map['school']['_id'])){
            $this->map['school'] = [
                '_id' => $this->map['school']['_id'],
            ];
        }

        if(isset($this->map['class']['_id'])){
            $this->map['class'] = [
                '_id' => $this->map['class']['_id'],
            ];
        }

        if(isset($req['down'])){
            $this->map['down'] = $req['down'];
        }

        $numPerDay = sprintf('%.2f', 4/7);
        $this->passNum = ceil($numPerDay * sprintf('%.2f', ($this->map['time']['end'] - $this->map['time']['start'])/86400));
    }

    /**
     * 总体数据
     * （1）总人数
     * （2）总锻炼次数
     * （3）总锻炼时间（分钟）
     * （4）总消耗卡路里（千卡）
     * （5）完成比例统计
     * （6）人均次数统计
     * 
     */
    protected function getAllData(){
        $this->getUserCount();
        if($this->resData['userCount'] == 0) return;

        $this->getTrainCount();
        $this->formatData();

        if(!empty($this->map['down'])){
            $file = $this->map['down'];
            xlsHeader($this->resData['xkeys'], $file);
            xlsOutput(array_keys(self::$keyName), [$this->resData]);
            exit;
        }
    }

    // 获取学校ID
    protected function getSchool(){
        $where = isset($this->map['school']) ? $this->map['school'] : [];
        $options = [
            'limit' =>0,
            'projection' => [
                '_id' => 1,
            ],
        ];
        $this->schoolList = array_column($this->school->query($where, $options), '_id');
    }

    // 获取班级ID
    protected function getClass(){
        if(empty($this->schoolList)) return;

        $where = isset($this->map['class']) ? $this->map['class'] : [];
        $where['schoolid'] = ['$in' => $this->schoolList];
        $where['name'] = ['$ne' => '测试班级'];
        $options = [
            'limit' =>0,
            'projection' => [
                '_id' => 1
            ],
        ];

        $this->classList = $this->class->query($where, $options);
    }

    // 总人数
    protected function getUserCount(){
        $userCountMap = [
            'type' => 1,
            'classinfo.classid' => [
                '$ne' => Dao_ClassinfoModel::TEST_CLASS,
            ],
        ];

        if(!empty($this->map['school'])){
            $userCountMap['schoolinfo.schoolid'] = [
                '$in' => $this->schoolList,
            ];

            if(!empty($this->map['class'])){
                if(empty($this->map['class']['_id'])){
                    $userCountMap['grade'] = (int)$this->map['class']['grade'];
                }
                else{
                    $userCountMap['classinfo.classid'] = $this->map['class']['_id'];
                    unset($userCountMap['schoolinfo.schoolid']);
                }

                if(!empty($this->map['user']['_id'])){
                    $userCountMap['_id'] = $this->map['user']['_id'];
                    unset($userCountMap['classinfo.classid']);
                }
            }
        }
        
        $this->userlist = $this->userModel->query(
            $userCountMap,
            [
                'limit' => 0,
                'projection' => [
                    '_id' => 1,
                ]
            ]
        );
        $this->userlist = array_column($this->userlist, '_id');
        $this->resData['userCount'] = count($this->userlist);
    }

    // 总锻炼次数 时长 卡路里 人均次数
    protected function getTrainCount(){
        $where = [
            'originaltime' => [
                '$gte' => $this->map['time']['start'],
                '$lte' => $this->map['time']['end'],
            ],
            'htype' => [
                '$in' => [1,2,3],
            ],
            'userid' => [
                '$in' => $this->userlist,
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
                'htype' => ['$push' => '$htype'],
            ]
        ];
        $aggregate = [
            ['$match' => $where],
            $fields,
            $group
        ];

        $list = $this->trainModel->aggregate($aggregate);
        $this->resData['trainCount'] = 0;
        $this->resData['trainTime'] = 0;
        $this->resData['trainCal'] = 0;
        $this->resData['doneRate'] = 0;

        $userDoneNum = 0;

        if(!empty($list)){
            foreach ($list as $row) {
                $this->resData['trainCount'] += (int)$row['count'];
                $this->resData['trainTime'] += (int)$row['projecttime'];
                $this->resData['trainCal'] += (float)sprintf('%.2f', $row['burncalorie']);
                $thisUserDoneNum = 0;
                foreach ($row['htype'] as $htype) {
                    if($htype == 2){
                        $thisUserDoneNum += 1;
                    }
                }
                if($thisUserDoneNum >= ($this->passNum)){
                    $userDoneNum += 1;
                }
            }
        }

        $this->resData['trainTime'] = !empty($list) ? ((float)sprintf('%.2f',$this->resData['trainTime']/60)) : 0;
        $this->resData['trainAvg'] = !empty($list) ? ((float)sprintf('%.2f',$this->resData['trainCount']/$this->resData['userCount'])) : 0;
        $this->resData['doneRate'] = !empty($list) ? ((float)sprintf('%.4f',$userDoneNum / count($list)) * 100) : 0;
    }

    protected function formatData(){
        foreach ($this->resData as $k => $v) {
            $this->resData['xkeys'][] = self::$keyName[$k];
            $this->resData['yvals'][] = $v;
        }
    }

    /**
     * 完成次数比例
     * @Author    422909231@qq.com
     * @DateTime  2017-09-04
     * @version   1.0
     */
    protected function getDoneRate(){
        $this->getUserCount();
        $this->resData['xkeys'] = ['0次'];
        $this->resData['yvals'] = [
            [
                'name'      => '完成人数',
                'type'      => 'bar',
                'data'      => [$this->resData['userCount']],
            ],
            [
                'name'      => '人数占比',
                'type'      => 'line',
                'yAxisIndex' => 1,
                'data'      => [100],
            ]
        ];

        $this->resData['legend'] = [
            '完成人数','人数占比',
        ];

        $this->resData['yAxis'] = [
            [
                'type' => 'value',
                'name' => '完成人数',
                'axisLabel' => [
                    'formatter' => '{value} 人',
                ],
            ],
            [
                'type' => 'value',
                'name' => '人数占比',
                'axisLabel' => [
                    'formatter' => '{value} %',
                    'textStyle' => [
                        'color' => 'red',
                    ],
                ],
            ],
        ];

        $this->resData['totalCount'] = 0; // 总锻炼次数
        $this->resData['doneNumUsers'] = []; // 各次学生信息

        // 及格次数
        $this->resData['needNum'] = $this->passNum;

        $where = [
            'htype' => [
                '$in' => [1,2,3],
            ],
            'originaltime' => [
                '$gte' => $this->map['time']['start'],
                '$lte' => $this->map['time']['end'],
            ],
            'userid' => [
                '$in' => $this->userlist,
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

        // 二次聚合
        $sgroup = [
            '$group' => [
                '_id' => '$count',
                'count' => ['$sum' => 1],
                'sum' => ['$sum' => '$count'],
            ]
        ];

        // 班级级别获取每个学生信息
        if(isset($this->map['class']['_id']) && !isset($this->map['user']['_id'])){
            $sgroup['$group']['user'] = ['$addToSet' => '$_id'];
        }

        $aggregate = [
            ['$match' => $where],
            $fields,
            $group,
            $sgroup,
            ['$sort' => ['_id' => -1]],
        ];

        $list = $this->trainModel->aggregate($aggregate);
        $this->undoneUserCount = $this->resData['userCount'];
        if(!empty($list)){
            $this->resData['xkeys'] = array_map(function($v){
                return $v.'次';
            }, array_column($list, '_id'));

            // 0次人数
            array_push($this->resData['xkeys'], '0次');
            $yvals = array_column($list, 'count');
            $zeroUserCount = $this->resData['userCount'] - array_sum($yvals);
            array_push($yvals, $zeroUserCount);
            $this->resData['yvals'] = [
                [
                    'name'      => '完成人数',
                    'type'      => 'bar',
                    'data'      => $yvals,
                ],
            ];

            $doneRate = array_map(function($v){
                // if()
                return (float)sprintf('%.4f', $v/$this->resData['userCount']) * 100;
            }, $yvals);

            $this->resData['yvals'][] = [
                'name'      => '人数占比',
                'type'      => 'line',
                'data'      => $doneRate,
                'yAxisIndex' => 1,
                'itemStyle' => [
                    'normal' => [
                        'color' => 'red',
                        'label' => [
                            'show' => true,
                            'position' => 'middle',
                            'textStyle' => [
                                'color' => 'red',
                            ],
                        ],
                        'lineStyle' => [
                            'color' => 'red',
                        ]
                    ],
                ],
            ];

            // 总锻炼次数
            $this->resData['totalCount'] = array_sum(array_column($list, 'sum'));
        }

        // 获取学生信息
        if(isset($this->map['class']['_id']) && !isset($this->map['user']['_id'])){
            $users = $this->userModel->getUserListByClassId($this->map['class']['_id'], ['username','nickname']);
            $users = array_column($users, null, '_id');
            if(!empty($list)){
                foreach ($list as $row) {
                    $userRange = [];
                    foreach ($row['user'] as $uid) {
                        if(isset($users[$uid])){
                            if(empty($users[$uid]['username'])){
                                $users[$uid]['username'] = $users[$uid]['nickname'];
                            }
                            $userRange[] = $users[$uid];
                            unset($users[$uid]);
                        }
                    }
                    $this->resData['doneNumUsers'][] = $userRange;
                }
            }

            if(!empty($users)){
                $this->resData['doneNumUsers'][] = array_values($users);
                $this->undoneUserCount = count($users);
            }
        }

        // 生成表格数据
        $this->getTableHtml();

        // 下载数据
        if(!empty($this->map['down'])){
            $file = $this->map['down'];
            $header = [
                '完成次数','完成人数(人)','人数占比(%)','学生信息'
            ];

            $bodyer = [];
            foreach ($this->resData['xkeys'] as $tk => $tval) {
                $itemVal = [$tval];
                foreach ($this->resData['yvals'] as $yval) {
                    $itemVal[] = $yval['data'][$tk];
                }
                $userVal = [];
                if(!empty($this->resData['doneNumUsers'])){
                    foreach ($this->resData['doneNumUsers'][$tk] as $uval) {
                        $userVal[] = $uval['username'];
                    }
                }
                $itemVal[] = implode('、', $userVal);
                $bodyer[] = $itemVal;
            }

            xlsHeader($header, $file);
            xlsOutput(array_keys($header), $bodyer);
            exit;
        }

        unset($this->resData['doneNumUsers']);
        unset($this->resData['doneRate']);
    }

    protected function getTableHtml(){
        $this->resData['tableDataHtml'] = "<caption>数据表</caption><thead><tr><th>完成次数</th><th>完成人数(人)</th><th>人数占比(%)</th><th style='width:40%;'>学生信息</th></tr></thead><tbody>";
        
        foreach ($this->resData['xkeys'] as $tk => $tval) {
            $this->resData['tableDataHtml'] .= "</tr><td>{$tval}</td>";
            foreach ($this->resData['yvals'] as $yval) {
                $this->resData['tableDataHtml'] .= "<td>{$yval['data'][$tk]}</td>";
            }
            $aHtml = '';
            if(!empty($this->resData['doneNumUsers'])){
                foreach ($this->resData['doneNumUsers'][$tk] as $uval) {
                    $aHtml .= '<a class="user-a" href="/user/student?uid='.$uval['_id'].'">'.$uval['username'].'</a>';
                }
            }
            $this->resData['tableDataHtml'] .= '<td>'.$aHtml.'</td></tr>';
        }
        $this->resData['tableDataHtml'] .= "</tbody>";

        $this->resData['warmHtml'] = '<p>该时段内应完成次数：'.$this->passNum.'次&emsp;总人数: '.$this->resData['userCount'].'人&emsp;总锻炼次数：'.$this->resData['totalCount'].'次&emsp;参与锻炼人数：'.($this->resData['userCount']-$this->undoneUserCount).'人&emsp;无锻炼记录人数：'.$this->undoneUserCount.'人';
    }

    /**
     * 各体测分数区间段的锻炼数据
     * @Author    422909231@qq.com
     * @DateTime  2017-09-05
     * @version   1.0
     */
    protected function getScoreTarinData(){
        $item = [
            'trainCount' => 0,
            'userCount' => 0,
            'avgTrainCount' => 0,
            'doneRate' => 0,
            'userlist' => [],
        ];
        $format = [
            '90-100次'     => $item,
            '80-90次'      => $item,
            '70-80次'      => $item,
            '70次以下'     => $item,
            '无体测数据' => $item,
        ];

        // 获取该空间维度下的学生列表
        $this->getUserCount();

        // 获取学生体测数据
        $this->getPhyData($format);
        
        // 获取学生锻炼数据
        $this->getTrainData($format);

        $this->resData['xkeys'] = array_keys($format);
        $this->resData['yvals'] = [
            [
                'name'      => '总人数',
                'type'      => 'bar',
                'data'      => array_column($format, 'userCount'),
            ],
            [
                'name'      => '总锻炼数',
                'type'      => 'bar',
                'data'      => array_column($format, 'trainCount'),
            ],
            [
                'name'      => '人均锻炼数',
                'type'      => 'line',
                'data'      => array_column($format, 'avgTrainCount'),
            ],
            [
                'name'      => '完成比例',
                'type'      => 'line',
                'data'      => array_column($format, 'doneRate'),
            ],
        ];
        $this->resData['legend'] = [
            '总人数','总锻炼数','人均锻炼数','完成比例'
        ];

        return $this->resData;
    }

    protected function getPhyData(&$format){
        $tcList = $this->tcModel->getPhyInfoByUserids($this->userlist, ['userid','totalscore']);
        if(!empty($tcList)) $tcList = array_column($tcList, null, 'userid');

        foreach ($this->userlist as $uid) {
            if(isset($tcList[$uid])){
                if(!empty($tcList[$uid]['totalscore'])){
                    $score = (float)$tcList[$uid]['totalscore'][0]['score'];
                    $this->getScoreRange($score, $uid, $format);
                }
                else{
                    $format['无体测数据']['userCount'] += 1;
                    $format['无体测数据']['userlist'][] = $uid;
                }
            }
            else{
                $format['无体测数据']['userCount'] += 1;
                $format['无体测数据']['userlist'][] = $uid;
            }
        }
    }

    protected function getScoreRange($score, $uid, &$format){
        if($score >= 90){
            $format['90-100次']['userCount'] += 1;
            $format['90-100次']['userlist'][] = $uid;
        }
        else if($score >= 80){
            $format['80-90次']['userCount'] += 1;
            $format['80-90次']['userlist'][] = $uid;
        }
        else if($score >= 70){
            $format['70-80次']['userCount'] += 1;
            $format['70-80次']['userlist'][] = $uid;
        }
        else{
            $format['70次以下']['userCount'] += 1;
            $format['70次以下']['userlist'][] = $uid;
        }
    }

    protected function getTrainData(&$format){
        $where = [
            'htype' => [
                '$in' => [1,2,3],
            ],
            'originaltime' => [
                '$gte' => $this->map['time']['start'],
                '$lte' => $this->map['time']['end'],
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

        foreach ($format as $skey => &$sval) {
            if(!empty($sval['userlist'])){
                $where['userid'] = [
                    '$in' => $sval['userlist'],
                ];

                $aggregate = [
                    ['$match' => $where],
                    $fields,
                    $group,
                    ['$sort' => ['_id' => -1]],
                ];

                $list = $this->trainModel->aggregate($aggregate);
                if(!empty($list)){
                    foreach ($list as $lval) {
                        $sval['trainCount'] += $lval['count'];
                        if($lval['count'] >= $this->passNum){
                            $sval['doneRate'] += 1;
                        }
                    }
                }

                $sval['avgTrainCount'] = (float)sprintf('%.2f', $sval['trainCount']/$sval['userCount']);
                $sval['doneRate'] = (float)sprintf('%.4f', $sval['doneRate']/$sval['userCount']) * 100;

                unset($sval['userlist']);
            }
        }
    }

}