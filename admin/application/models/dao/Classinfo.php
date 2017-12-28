<?php
class Dao_ClassinfoModel extends Db_Mongodb {
    
    protected $table = 'classinfo';

    const TEST_CLASS = '5881dabb565bc00a259718a6';

    protected $fields = [
        'name'          => '',                   // 班级名称
        'schoolname'    => '',             // 学校名称
        'schoolid'      => '',               // 学校id号
        'createtime'    => 0,             // 信息创建时间
        'admissiontime' => 0,          // 班级入学时间
        'grade'         => '',                  // 年级
        'classno'       => '',                // 班级编号
        'malemembersid' => [],          // 男生成员id信息
        'femalemembersid' => [],        // 女生成员id信息
        'gymteacherid'  => [],           // 管理体育老师id号
        'studentno'     => 0,              // 学生总数量
        'pushtime'      => [],               // 推送时间
        'exerciseproject' => [],        // 锻炼项目信息:[{type(锻炼类型),exerciseid(锻炼项目id),createtime(锻炼项目创建时间),endtime(项目截止时间),weekdoneno(周计划锻炼次数)}......]
        'branch_school' => null,
        'createtime' => 0,
        'is_test' => 0,
	];

    protected function __construct(){
        parent::__construct();
    }

    /**
     * 获得实例
     * @param string $confkey
     * @return mongodb
     */
    public static function getInstance() {

        if(!self::$instance instanceof self){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 根据id获取班级信息
     * @Author    422909231@qq.com
     * @DateTime  2017-04-11
     * @copyright [copyright]
     * @param     string           $classId [description]
     * @param     array            $fields  [description]
     * @return    [type]                    [description]
     */
    public function getClassInfoByClassId(string $classId, $fields = []){
        $where = [
            '_id' => $classId,
        ];

        $fields = $this->filterFields($fields);

        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        return $this->queryOne($where, $options);
    }

    public function getClassListByClassIds(array $classIds, $fields = [], $options = []){
        $newOptions = [];
        $where = [
            '_id' => ['$in' => $classIds],
        ];

        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $newOptions['projection'] = $fields;
        }

        $newOptions['limit'] = $options['limit'] ? (int)$options['limit'] : 20;
        $newOptions['skip'] = $options['offset'] ? (int)$options['offset'] : 0;
        if(!empty($options['sort']))
            $newOptions['sort'] = $options['sort'];

        return $this->query($where, $newOptions);
    }

    public function getListByPage(array $where, array $fields = [], array $options = []){
       
        $fields = $this->filterFields($fields);
        if(!empty($fields))
            $newOptions['projection'] = $fields;
        $newOptions['limit'] = (int)$options['limit'];
        $newOptions['skip'] = (int)$options['offset'];
        if(!empty($options['sort']))
            $newOptions['sort'] = $options['sort'];
        return $this->query($where, $newOptions);
    }

    public function getList(array $where, array $fields = [] ,array $options = []){

        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $newOptions['projection'] = $fields;
        }
        if(!empty($options['sort']))
            $newOptions['sort'] = $options['sort'];
        return $this->query($where, $newOptions);
    }

    public function getGradeList(array $where){
        $fields = [
            '$project' => [
                '_id' => 1,
                'grade' => 1,
            ]
        ];

        $group = [
            '$group' => [
                '_id' => '$grade',
            ]
        ];
        $aggregate = [
            ['$match' => $where],
            $fields,
            $group,
            ['$sort' => ['_id' => 1]],
        ];

        return $this->aggregate($aggregate);
    }

    public function getBranchAndTestClass(array $fields = [], array $options = []){
        $match1 = [
            'branch_school' => [
                '$ne' => null,
            ],
        ];

        $match2 = [
            'is_test' => 1,
        ];

        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        $branch = $this->query($match1, $options);
        $test = $this->query($match2, $options);

        return array_merge($branch, $test);
    }

    public function getClassInfoByTime($monthStartTime, &$historyClass = [], &$schoolId = ''){
        $classId = '';
        
        if(empty($historyClass)) return $classId;

        foreach ($historyClass as $hv) {
            $gradeStart = strtotime($hv['date']);
            $dateTimeArr = explode('-', $hv['date']);
            $dateTimeArr[0] += 1;
            $gradeEnd = strtotime(implode('-', $dateTimeArr).' 00:00:00');

            if($monthStartTime >= $gradeStart && $monthStartTime < $gradeEnd){
                $classId = $hv['classid'];
                $schoolId = $hv['schoolid'];
                break;
            }
        }

        return $classId;
    }

    public function getClassBySchool(string $schoolId,array $fields = [],array $options){
        $newOptions = [];
        $where = [
            'schoolid' => $schoolId,
            'is_test' => 0,
        ];

        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $newOptions['projection'] = $fields;
        }

        $newOptions['limit'] = $options['limit'] ? (int)$options['limit'] : 20;
        $newOptions['skip'] = $options['offset'] ? (int)$options['offset'] : 0;
        if(!empty($options['sort']))
            $newOptions['sort'] = $options['sort'];

        return $this->query($where, $newOptions);
    }
    
}