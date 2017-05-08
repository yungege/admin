<?php
class Dao_ExerciseProjectSkuModel extends Db_Mongodb {
    
    protected $table = 'exercise_project_sku';

    protected $fields = [
        'project_id'   => '',      // 所属项目
        'recommend'     => 0,       // 是否推荐
        'vfilesize'     => 0.00,    // 项目文件大小
        'time_cost'     => 0,       // 项目所需时间（s）
        'calorie_cost'  => 0.00,    // 项目所需卡路里
        'action_count'  => 0,       // 动作数
        'difficulty'    => 0,       // 难度 0低，1中，2高
        'action_info'   => [],      // 项目动作组合 ["action_id","action_time","action_groupno","calorie"]
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