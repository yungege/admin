<?php
/**
 * 消息表
 */

class Dao_CityModel extends Db_Mongodb {
    
    protected $table = 'area_city';

    protected $fields = [
        'province_id'   => '',
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

    public function getCityByAreaCode(string $code){
        $where = [
            'area_code'   => $code,
        ];

        return $this->queryOne($where);
    }

}