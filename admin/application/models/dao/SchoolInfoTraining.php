<?php
class Dao_SchoolInfoTrainingModel extends Db_Mongodb {
    
    protected $table = 'school_info_training';

    protected $fields = [
       
        'homework_id' => '',               //作业ID
		'school_name' => '',               //学校名字
		'mobile' => 0,                   //学校练习电话
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
