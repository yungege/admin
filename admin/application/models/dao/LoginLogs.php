<?php
/**
 * 登录日志
 */

class Dao_LoginLogsModel extends Db_Mongodb {

    protected $table = 'login_logs';

    protected $fields = [
        'type'      => 0, //  1=>'手机',2=>'wx',3=>'qq',9=>'切换账号',
        'mobile'    => '', // type = 1需要
        'userid'    => '',
        'username'  => '',
        'ip'        => '',
        'platform'  => '', // android || ios
        'version'   => '', // 客户端版本号
        'ctime'     => 0,
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

    public function addLog(array $fields){
        if(!empty($fields)){
            $this->insert($fields);
        }
    }
}