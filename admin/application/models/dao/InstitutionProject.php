<?php
class Dao_InstitutionProjectModel extends Db_Mongodb {
    
    protected $table = 'institution_project';

    protected $fields = [
        'iid'           => '',
        'iname'         => '',
        'project_name'  => '',
        'project_pic'   => '',
        'project_desc'  => '',
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

    public function getInfoByIidAndPname(string $iId, string $name){
        $where = [
            'iid' => $iId,
            'project_name' => (string)$name,
        ];

        return $this->queryOne($where);
    }
}