<?php
class Dao_ExerciseProjectModel extends Db_Mongodb {
    
    protected $table = 'exercise_project';

    protected $fields = [
        'name'              => '', // 运动项目/体育作业的名称
        'scope_type'        => 0,  // 项目类型:0-全部,1-自定义体育家庭作业（翻转课堂）,2-运动处方(根据体质健康测试成绩发布的锻炼信息，身体素质教育),3-跑步,4-兴趣班,5-普通锻炼项目（1,2中可包含5）......
        'exert_ype'         => '', // 所属锻炼项目类型类型编号(scopetype = 5)：1-跑步运动，2-普通锻炼(编号内容会再调整)
        'coverimg'          => '', // 项目封面
        'desc'              => '', // 备注
        'ctime'             => 0,  // 创建时间
        'creator_info'      => [], // 创建者基本信息:{creatorid(创建者id),creatorname(创建者姓名)}
        'gender'            => 2,  // 适合性别 0男 1女 2通用
        'grade_apply'       => [], // 适用年级
        'status'            => 1,  // 1正常 -9 删除
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