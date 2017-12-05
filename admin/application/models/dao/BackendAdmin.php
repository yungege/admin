<?php
/**
 * 后台管理员列表
 */

class Dao_BackendAdminModel extends Db_Mongodb {
    
    protected $table = 'backend_admin';

    protected $fields = [
        'userid'          => '',
        'mobileno'        => 0,
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