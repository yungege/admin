<?php
class Dao_RoleAssginModel extends Db_Mongodb {
    
    protected $table = 'backend_role_assgin';

    protected $fields = [
        'uid'      => '', // user id
        'rid'      => '', // role id
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

    public function listRole(){
        $where = [
            'status' => 1,
        ];

        $options = [
            'limit' => 0,
        ];

        return $this->query($where, $options);
    }

    public function getRoleByUId(string $uid){
        return $this->query(['uid' => $uid]);
    }

}