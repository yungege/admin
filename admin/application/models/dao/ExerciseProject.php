<?php
class Dao_ExerciseProjectModel extends Db_Mongodb {
    
    protected $table = 'exercise_project';

    protected $fields = [
        'name'              => '', // 运动项目/体育作业的名称
        'exer_type'         => '', // 1-跑步运动，2-普通锻炼(编号内容会再调整)
        'coverimg'          => '', // 项目封面
        'desc'              => '', // 备注
        'ctime'             => 0,  // 创建时间
        'creator_info'      => [], // 创建者基本信息:{creatorid(创建者id),creatorname(创建者姓名)}
        'gender'            => 2,  // 适合性别 0-男 1-女 2-通用
        'grade_apply'       => [], // 适用年级
        'status'            => 1,  // 1-正常 -9-删除
        'has_level'         => 1,  // 是否区分难度：1-有 -1-无
        'type'              => 0,  // 1室内 2户外
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
     * 获取项目的基本信息
     * @Author    422909231@qq.com
     * @DateTime  2017-05-11
     * @version   [version]
     * @param     string           $_id    [description]
     * @param     array            $fields [description]
     * @return    [type]                   [description]
     */
    public function getProjectBaseInfoById(string $_id, array $fields = []){
        $where = [
            '_id' => $_id
        ];

        $fields = $this->filterFields($fields);

        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        return $this->queryOne($where,$options);

    }

    /**
     * 获取项目完整信息（包括不同难度）
     * @Author    422909231@qq.com
     * @DateTime  2017-05-11
     * @version   [version]
     * @param     string           $_id    [description]
     * @param     array            $fields [description]
     * @return    [type]                   [description]
     */
    public function getProjectFullInfoById(string $_id, array $fields = []){}

    /**
     * 获取某个难度项目的动作信息
     * @Author    422909231@qq.com
     * @DateTime  2017-05-11
     * @version   [version]
     * @param     string           $_id [description]
     * @return    [type]                [description]
     */
    public function getProjectActionsById(string $_id){}

    /**
     * 根据年级获取项目
     * @Author    422909231@qq.com
     * @DateTime  2017-05-18
     * @version   [version]
     * @param     int              $grade [description]
     * @return    [type]                  [description]
     */
    public function getProjectByGrade(array $grade, array $fields = [], array $options = []){
        $where = [
            'grade_apply' => [
                '$in' => $grade,
            ],
            'status' => 1,
        ];

        $fields = $fields ?? $this->filterFields($fields);

        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        return $this->query($where, $options);
    }
}