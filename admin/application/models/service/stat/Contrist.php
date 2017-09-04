<?php
class Service_Stat_ContristModel extends BasePageService {

    protected $school;
    protected $class;
    protected $userModel;
    protected $trainModel;

    protected $resData;
    public $map = [];
    public $schoolList = [];
    public $classList = [];
    public $userlist = [];
    public $filename = '';

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
                # code...
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

        $numPerDay = (float)sprintf('%.2f', 4/7);
        $dayCount = (float)sprintf('%.2f',($this->map['time']['end'] + 1 - $this->map['time']['start'])/86400);
        $needNum = sprintf('%.2f', ($numPerDay * $dayCount));

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
                if($thisUserDoneNum >= $needNum){
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
        $this->resData['yvals'] = [$this->resData['userCount']];
        $this->resData['doneRate'] = [100];
        $this->resData['totalCount'] = 0;
        $this->resData['doneNumUsers'] = [];

        $numPerDay = sprintf('%.2f', 4/7);
        $needNum = ceil($numPerDay * sprintf('%.2f', ($this->map['time']['end'] - $this->map['time']['start'])/86400));

        // 及格次数
        $this->resData['needNum'] = $needNum;

        $where = [
            'htype' => 2,
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
        if(isset($this->map['class']['_id'])){
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
        if(!empty($list)){
            $this->resData['xkeys'] = array_map(function($v){
                return $v.'次';
            }, array_column($list, '_id'));
            $this->resData['yvals'] = array_column($list, 'count');
            // 0次人数
            array_push($this->resData['xkeys'], '0次');
            array_push($this->resData['yvals'], $this->resData['userCount'] - array_sum($this->resData['yvals']));

            $this->resData['doneRate'] = array_map(function($v){
                return (float)sprintf('%.4f', $v/$this->resData['userCount']) * 100;
            }, $this->resData['yvals']);

            // 总锻炼次数
            $this->resData['totalCount'] = array_sum(array_column($list, 'sum'));

            // 获取学生信息
            if(isset($this->map['class']['_id'])){
                $users = $this->userModel->getUserListByClassId($this->map['class']['_id'], ['username','nickname']);
                $users = array_column($users, null, '_id');
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
                if(!empty($users)){
                    $this->resData['doneNumUsers'][] = $users;
                }
            }
        }

        if(!empty($this->map['down'])){
            $file = $this->map['down'];
            array_unshift($this->resData['xkeys'], '完成次数');
            xlsHeader($this->resData['xkeys'], $file);

            array_unshift($this->resData['yvals'], '完成人数');
            xlsOutput(array_keys($this->resData['xkeys']), [$this->resData['yvals']]);

            array_unshift($this->resData['doneRate'], '完成比例');
            xlsOutput(array_keys($this->resData['xkeys']), [$this->resData['doneRate']]);
            exit;
        }

    }

}