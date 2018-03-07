<?php
class Dao_SchoolInfoTrainingModel extends Db_Mongodb {
    
    protected $table = 'school_info_training';

    protected $fields = [
       
  //       'homework_id' => '',               //作业ID
		// 'school_name' => '',               //学校名字
		// 'mobile' => 0,                     //学校练习电话
  //       'link_man' => '',                  //联系人
        'user_id'       => '',  //所属用户
        'school_name'   => '',  //学校名字
        'addr'          => '',  //地址
        'point'         => [
            'long' => 0,
            'lat'  => 0,
        ],
        'homework_id'   => '',  //作业ID
        'contact'       => '',  //联系人
        'mobile'        => '',  //联系电话
        'desc'          => '',  //简介
        'ctime'         => 0,   //注册时间
        'is_delete'     => 0,   // 是否删除
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
