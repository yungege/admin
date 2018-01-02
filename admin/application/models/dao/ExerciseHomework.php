<?php
class Dao_ExerciseHomeworkModel extends Db_Mongodb {
    
    protected $table = 'exercise_homework';

    protected $fields = [
        'type'              => 0,   // 项目类型:1-翻转课堂,2-身体测试作业,3-跑步,4-兴趣班,5-普通锻炼项目......
        'class_info'        => [],  // 班级信息:[classid,......]
        'school_info'       => '',  // 学校信息id号
        'coverimg'          => '',  // 项目封面
        'name'              => '',  // 运动项目/体育作业的名称
        'describe'          => '',  // 备注/小贴士等信息
        'exertime'          => [],  // 周锻炼时间:["1","3","5"],分别表示周一\周三\周五
        'gender'            => 2,   // 适合性别:0-男,1-女,2-男女
        'project_id'        => [],  // 体育作业所包含的"运动项目的id号":[project_id,......]
        'create_time'       => 0,   // 创建时间
        'creator_info'      => [],  // 创建者基本信息:{creatorid(创建者id),creatorname(创建者姓名)}
        'start_time'        => 0,   // 开始时间
        'deadline_time'     => 0,   // 结束时间
        'weekdoneno'        => 0,   // 周计划锻炼次数
        'makeup_limit'      => 0,   // 补作业的时间间隔:单位秒
        'homework_require'  => '',  // 作业要求要求
        'makeup_interval'   => 0,   // 补作业时间限制:单位天(超过该时间限制的作业不能补做)
        'fzkt_type'         => 0,   // 翻转课堂类型 0-锻炼类型 1-教学类型
        'is_replace'        => 0,   // 是否替换身体素质作业 1-不替换，2-替换
    ];

    public static $type = [
        1 => '翻转课堂',
        2 => '常规作业',
        3 => '跑步',
        4 => '校外打卡',
        6 => '常规作业',
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
     * 获取作业信息
     * @Author    422909231@qq.com
     * @DateTime  2017-05-11
     * @version   [version]
     * @param     string           $_id    [description]
     * @param     array            $fields [description]
     * @return    [type]                   [description]
     */
    public function getHomeworkInfoById(string $_id, array $fields = []){

    }

    /**
     * 获取作业的项目信息
     * @Author    422909231@qq.com
     * @DateTime  2017-05-11
     * @version   [version]
     * @param     string           $_id    [description]
     * @param     array            $fields [description]
     * @return    [type]                   [description]
     */
    public function getHomeworkProjectInfoById(string $_id, array $fields = []){}

    /**
     * 获取当前有效的翻转课堂作业与身体素质作业
     * @Author    422909231@qq.com
     * @DateTime  2017-05-19
     * @version   [version]
     * @return    [type]           [description]
     */
    public function getCurrentHomework(string $schoolId, string $classId, array $fields=[]){
        $now = time();
        $options = [];

        $where = [
            'type' => ['$in' => [1,2]],
            'school_info' => $schoolId,
            'class_info' => ['$in' => [$classId]],
            'start_time' => ['$lte' => $now],
            'deadline_time' => ['$gte' => $now],
        ];

        $fields = empty($fields) ? [] : $this->filterFields($fields);
        if(!empty($fields)) $options['projection'] = $fields;
        
        return $this->query($where, $options);
    }

    public function getNormalHomeworkByTime(string $schoolId, string $classId, int $time, array $fields=[]){
        $options = [];

        $where = [
            'type' => 2,
            'school_info' => $schoolId,
            'class_info' => ['$in' => [$classId]],
            'start_time' => ['$lte' => $time],
            'deadline_time' => ['$gte' => $time],
        ];

        $fields = empty($fields) ? [] : $this->filterFields($fields);
        if(!empty($fields)) $options['projection'] = $fields;
        
        return $this->queryOne($where, $options);
    }

    public function getFzktHomeworkByTime(string $schoolId, string $classId, int $time, array $fields=[]){
        $options = [];

        $where = [
            'type' => 1,
            'school_info' => $schoolId,
            'class_info' => ['$in' => [$classId]],
            'start_time' => ['$lte' => $time],
            'deadline_time' => ['$gte' => $time],
        ];

        $fields = empty($fields) ? [] : $this->filterFields($fields);
        if(!empty($fields)) $options['projection'] = $fields;
        
        return $this->queryOne($where, $options);
    }

    /**
     * @Author    422909231@qq.com
     * @DateTime  2017-05-25
     * @version   [version]
     * @param     array            $userinfo 
     * array('schoolinfo'=>['schoolid'],'classinfo'=>['classid'])
     * @param     int              $time     
     * @param     array            $fields   
     * @return    array
     */
    public function getNowHomeworkInfo(array $userinfo, int $time, array $fields = []){
        $options = [];
        $fields = $fields ? $this->filterFields($fields) : [];
        if(!empty($fields)) $options['projection'] = $fields;

        $schoolId = $userinfo['schoolinfo']['schoolid'];
        $classId = $userinfo['classinfo']['classid'];

        $fzktWork = $this->getFzktHomeworkByTime($schoolId, $classId, $time);
        $workInfo = $fzktWork;
        if(empty($fzktWork)){
            $stszWork = $this->getNormalHomeworkByTime($schoolId, $classId, $time);
            $workInfo = $stszWork;
        }

        return $workInfo;
    }

    /**
     * @Author    799318466@qq.com
     * @DateTime  2017-06-14
     * @version   [version]
     * @param     array          $userinfo
     * array('schoolinfo'=>['schoolid'],'classinfo'=>['classid'])
     * @param     int            $time
     * @param     array          $fields
     * @return    array
     */
    public function getNowHomeworkInfos(array $userinfo, int $time, array $fields = []){
        $options = [];

        $where = [
            'type' => ['$in' => [1,2]],
            'school_info' => $userinfo['schoolinfo']['schoolid'],
            'class_info' => ['$in' => [$userinfo['classinfo']['classid']]],
            'start_time' => ['$lte' => $time],
            'deadline_time' => ['$gte' => $time]
        ];

        $fields = empty($fields) ? [] : $this->filterFields($fields);
        if(!empty($fields)) $options['projection'] = $fields;
        
        return $this->query($where, $options);

    }

    /**
     * 获取项目信息
     * @Author     799318466@qq.com
     * @DateTime   2017-6-19
     * @copyright  [copyright]
     * @param      array           $match
     * @param      array           $fields
     * @param      array           $options
     * orderBy sort limit offset
     * @return     array
     */
    public function getHomeworkInfos(array $where, array $fields, $options = []){

        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        return $this->query($where,$options);

    }

    // 获取最新的一次作业
    public function getLastHomeworkByClassId(string $classId, array $fields = []){
        $where = [
            'class_info' => $classId,
            'start_time' => [
                '$lte' => time(),
            ],
            'type' => 2,
        ];

        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        $options['sort'] = [
            'start_time' => -1,
        ];

        return $this->queryOne($where, $options);
    }

    // 检查是否有该班级的作业
    public function checkHomeworkExists(string $homeworkId, string $classId, array $options = []){
        $where = [
            '_id' => $homeworkId,
            'class_info' => $classId,
        ];

        return $this->queryOne($where, $options);
    }

}