<?php
class Dao_UrlToRoleModel extends Db_Mongodb {
    
    protected $table = 'backend_url_role';

    protected $fields = [
        'rid'      => '', // role id
        'url'      => '', // url
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