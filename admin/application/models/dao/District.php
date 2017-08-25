<?php
/**
 * 消息表
 */

class Dao_DistrictModel extends Db_Mongodb {
    
    protected $table = 'area_district';

    protected $fields = [
        'province_id'   => '',
        'city_id'       => '',
        'name'          => '',
        'area_code'     => ''
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