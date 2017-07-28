<?php
class Dao_ExerciseProjectModel extends Db_Mongodb {
    
    protected $table = 'exercise_project';

    protected $fields = [
        'name'              => '', // 运动项目/体育作业的名称
        'exert_ype'         => '', // 1-跑步运动，2-普通锻炼(编号内容会再调整)
        'coverimg'          => '', // 项目封面
        'desc'              => '', // 备注
        'ctime'             => 0,  // 创建时间
        'creator_info'      => [], // 创建者基本信息:{creatorid(创建者id),creatorname(创建者姓名)}
        'gender'            => 2,  // 适合性别 0男 1女 2通用
        'grade_apply'       => [], // 适用年级
        'status'            => 1,  // 1正常 -9 删除
        'has_level'         => 1,  // 是否区分难度：1-有 -1-无
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
}