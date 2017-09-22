<?php
/**
 * banner 图
 */
class Dao_MeauModel extends Db_Mongodb {
    
    protected $table = 'backend_meau';

    protected $fields = [
        "pid"        => "",
        "name"       => "",
        "url"        => "#",
        "icon_style" => "",
        "status"     => 1,
        "sort"       => 1
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

    public function listMeau(){
        $where = [
            'status' => 1
        ];

        $options = [
            'sort' => [
                'sort' => 1
            ],
            'limit' => 0,
        ];

        return $this->query($where, $options);
        // if(empty($list)) return [];
        // return rootTree(array_column($list, null, '_id'), 'sub', false);
    }
}