<?php
/**
 * banner 图
 */
class Dao_UrlModel extends Db_Mongodb {
    
    protected $table = 'backend_url';
    public $redis;

    const URL_REDIS_KEY = 'ttxs_redis_backend_url';

    protected $fields = [
        'url'        => '',
        'remark'     => '',
        'status'     => 1,
    ];

    protected function __construct(){
        parent::__construct();
        $this->redis = Cache_CacheRedis::getInstance();
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

    public function listUrl(){
        $cacheData = $this->redis->get(self::URL_REDIS_KEY);
        if(!empty($cacheData)) return $cacheData;

        $where = [
            'status' => 1
        ];

        $list = $this->query($where, ['limit'=>0]);
        if(empty($list)) return [];
        $this->redis->set(self::URL_REDIS_KEY, $list);

        return $list;
    }

    public function update(array $where, array $option = []){
        $res = parent::update($where, $option);
        if(false !== $res){
            $this->redis->delete(self::URL_REDIS_KEY);
        }
        return $res;
    }

    public function insert(array $data){
        $res = parent::insert($data);
        if(false !== $res){
            $this->redis->delete(self::URL_REDIS_KEY);
        }
        return $res;
    }

    public function checkUrlExists(string $url){
        $where = [
            'url' => $url,
        ];

        return (bool)$this->queryOne($where);
    }
}