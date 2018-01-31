<?php
class Dao_MyInstitutionProjectModel extends Db_Mongodb {

    protected $table = 'my_institution_project';

    protected $fields = [
        'uid'           => '',
        'iid'           => '',
        'iname'         => '',
        'pid'           => '',
        'pname'         => '',
        'status'        => 0, // 0-待审核 -1-审核失败 1-审核通过
        'ctime'         => 0,
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