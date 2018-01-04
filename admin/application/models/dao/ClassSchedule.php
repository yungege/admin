<?php
/**
 * 锻炼课程表
 */

class Dao_ClassScheduleModel extends Db_Mongodb {
    
    protected $table = 'class_schedule';

    protected $fields = [
        'userid'            => '',
        'project_name'      => '',
        'week_done_time'    => [],
        'position'          => '',
        'school_id'         => '',
        'school_name'       => '',
        'contact_mobileno'  => 0,
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