<?php
/**
 * 支持多主多重
 */

require_once CONFIG_PATH . "/NRedisConfig.class.php";

class Cache_CacheRedis{
    public static $instance = NULL;
    public static $linkHandle = array();
    private $conf;

    private function __clone(){

    }

    //construct:connect redis
    private function __construct()
    {
        $this->__getConfig();
    }

    // 获取配置文件
    private function __getConfig()
    {
        $servers = array();
        // $serverList = Yaf_Application::app()->getConfig()->cache->redis;
        // $servers['master'] = $serverList->master->toArray(); // master
        // $slaves = $serverList->slaves; // slaves
        
        $servers['master'] = NRedisConfig::getAllMasterServers(); // master
        $servers['slave'] = NRedisConfig::getAllSlaveServers(); // slaves

        // if (!empty($slaves)){
        //     $slaves = array();

        //     $slave_hosts        = explode('|', $slaves->hosts);
        //     $slave_ports        = explode('|', $slaves->ports);
        //     $slave_timeouts     = explode('|', $slaves->timeouts);
        //     $slave_passwords    = explode('|', $slaves->passwords);
        //     $slave_persistents  = explode('|', $slaves->persistents);

        //     foreach ($slave_hosts as $key => $slave_host){
        //         if (
        //             isset($slave_ports[$key]) &&
        //             isset($slave_timeouts[$key]) && 
        //             isset($slave_passwords[$key]) && 
        //             isset($slave_persistents[$key])
        //         ){
        //             $servers['slave'][] = array(
        //                 'host' => $slave_host,
        //                 'port' => $slave_ports[$key],
        //                 'persistent' => $slave_persistents[$key],
        //                 'timeout' => $slave_timeouts[$key],
        //                 'password' => $slave_passwords[$key],
        //                 );
        //         }
        //     }
        // }

        $this->conf = $servers;
    }

    /**
     * Get a instance of MyRedisClient
     *
     * @param string $key
     * @return object
     */
    static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 获得redis Resources
     * 
     * @param $key     redis存的key/或随机值
     * @param string $tag    master/slave
     */
    public function getRedis($key = null, $tag = 'master')
    {
        if(!empty(self::$linkHandle[$tag])){
            return self::$linkHandle[$tag];
        }

        empty($key) ? $key = uniqid() : '';
        // 如果没有配置从库 则取主库
        if($tag == 'slave'){
            if(empty($this->conf[$tag])){
                $tag = 'master';
            }
        }

        $servers  = $this->conf[$tag];
        $serverIndex = $this->getHostByHash($key, count($this->conf[$tag])); //获得相应主机的数组下标
        $serverSelect = $servers[$serverIndex]; // 命中的服务器

        try{

            $obj = new Redis();

            if($serverSelect['persistent'] == 0){
                $obj->connect($serverSelect['host'], $serverSelect['port']);
            }
            else{
                $obj->pconnect($serverSelect['host'], $serverSelect['port']);
                // 长连接 不超时
                $obj->setOption(Redis::OPT_READ_TIMEOUT, -1);
            }
            // if(!$res) throw new Exception("Redis Server Connect Failed.", -1);
            $obj->auth($serverSelect['password']);
            // $res = $obj->auth($serverSelect['password']);
            // if(!$res) throw new Exception("Redis Password Error.", -1);

            self::$linkHandle[$tag] = $obj;

            return $obj;

        } catch(Exception $e) {

            $msg = $e->getMessage();
            $this->redisErrorLog($msg);
            throw new Exception($msg, -1);
        }
        
    }

    /**
     * 随机取出主机
     * @param $key      变量key值
     * @param $n        主机数
     * @return string
     */
    private function getHostByHash($key,$n)
    {
        if($n<2) return 0;
        $u = strtolower($key);
        $id = sprintf("%u", crc32($key));

        $m = base_convert( intval(fmod($id, $n)), 10, $n);
        return $m{0};
    }

    /**
     * 关闭连接
     * pconnect 连接是无法关闭的
     *  
     * @param int $flag 关闭选择 0:关闭 Master 1:关闭 Slave 2:关闭所有
     * @return boolean
     */
    public function close($flag=2)
    {
        switch($flag){
            // 关闭 Master
            case 0:
                foreach (self::$linkHandle['master'] as $var){
                    $var->close();
                }
                break;
                // 关闭 Slave
            case 1:
                foreach (self::$linkHandle['slave'] as $var){
                    $var->close();
                }
                break;
                // 关闭所有
            case 2:
                $this->close(0);
                $this->close(1);
                break;
        }
        return true;
    }

    /**
     * redis 字符串（String） 类型
     * 将key和value对应。如果key已经存在了，它会被覆盖，而不管它是什么类型。
     * @param $key
     * @param $value
     * @param $exp 过期时间
     */
    public function set($key, $value, $exp=0)
    {
        $redis = $this->getRedis($key);

        $value = (is_object($value) || is_array($value)) ? json_encode($value) : $value;

        $redis->set($key, $value);
        !empty($exp) && $redis->expire($key, $exp);
    }

    /**
     * 设置key对应字符串value，并且设置key在给定的seconds时间之后超时过期
     * @param  $key
     * @param  $value
     * @param  $exp
     */
    public function setex($key, $value, $exp=0)
    {
        $redis = $this->getRedis($key);

        $value = (is_object($value) || is_array($value)) ? json_encode($value) : $value;

        $redis->setex($key, $exp, $value);
    }

    /**
     * 设置一个key的过期时间
     * 
     * @param  $key        
     * @param  $exp    过期时间
     */
    public function setExpire($key,$exp)
    {
        $redis = $this->getRedis($key);
        $redis->expire($key,$exp);
    }

    /**
     * 返回key的value。如果key不存在，返回特殊值nil。如果key的value不是string，就返回错误，因为GET只处理string类型的values。
     * @param $key
     */
    public function get($key)
    {
        $value = $this->getRedis($key,'slave')->get($key);
        $jsonData  = json_decode( $value, true );
        return ($jsonData === NULL) ? $value : $jsonData;
    }

    /**
     * KEYS pattern
     * 查找所有匹配给定的模式的键
     * @param $is_key   默认是一个非正则表达试，使用模糊查询
     * @param $key
     */
    public function keys($key, $is_key=true)
    {
        if ($is_key) {
            return $this->getRedis($key,'slave')->keys("*$key*");
        }
        return $this->getRedis($key,'slave')->keys("$key");
    }

    /**
     * 批量填充HASH表。不是字符串类型的VALUE，自动转换成字符串类型。使用标准的值。NULL值将被储存为一个空的字符串。
     * 
     * 可以批量添加更新 value,key 不存在将创建，存在则更新值
     * 
     * @param  $key
     * @param  $fieldArr
     * @return
     * 如果命令执行成功，返回OK。
     * 当key不是哈希表(hash)类型时，返回一个错误。
     */
    public function hMSet($key, $fieldArr)
    {
        return $this->getRedis($key)->hmset($key,$fieldArr);
    }

    /**
     * 设置 key 指定的哈希集中指定字段的值。如果 key 指定的哈希集不存在，会创建一个新的哈希集并与 key 关联。如果字段在哈希集中存在，它将被重写。
     *
     * @param $key
     * @param $field_name
     * @param $field_value
     * @return 1如果field是一个新的字段,0如果field原来在map里面已经存在
     */
    public function hSet($key, $field_name, $field_value)
    {
        return $this->getRedis($key)->hset($key, $field_name, $field_value);
    }

    /**
     * 批量的添加多个key 到redis
     * @param $fieldArr
     */
    public function mSetnx($fieldArr)
    {
        $this->getRedis()->mSetnx($fieldArr);
    }

    /**
     * 返回 key 指定的哈希集中所有的字段和值
     * @param $key
     * @return 返回值
     * 多个返回值：哈希集中字段和值的列表。当 key 指定的哈希集不存在时返回空列表。
     */
    public function hGetAll($key)
    {
        return $this->getRedis($key,'slave')->hGetAll($key);
    }

    /**
     * 向已存在于redis里的Hash 添加多个新的字段及值
     * 
     * @param  $key            redis 已存在的key
     * @param  $field_arr    kv形数组
     */
    public function hAddFieldArr($key, $field_arr)
    {
        foreach ($field_arr as $k=>$v){
            $this->hAddFieldOne($key, $k, $v);
        }
    }

    /**
     * 向已存在于redis里的Hash 添加一个新的字段及值
     * @param  $key
     * @param  $field_name
     * @param  $field_value
     * @return bool
     */
    public function hAddFieldOne($key, $field_name, $field_value)
    {
        return $this->getRedis($key)->hsetnx($key,$field_name,$field_value);
    }

    /**
     * 向Hash里添加多个新的字段或修改一个已存在字段的值
     * @param $key
     * @param $field_arr
     */
    public function hAddOrUpValueArr($key,$field_arr)
    {
        foreach ($field_arr as $k=>$v){
            $this->hAddOrUpValueOne($key, $k, $v);
        }
    }

    /**
     * 向Hash里添加多个新的字段或修改一个已存在字段的值
     * @param  $key
     * @param  $field_name
     * @param  $field_value
     * @return boolean 
     * 1 if value didn't exist and was added successfully, 
     * 0 if the value was already present and was replaced, FALSE if there was an error.
     */
    public function hAddOrUpValueOne($key,$field_name,$field_value)
    {
        return $this->getRedis($key)->hset($key,$field_name,$field_value);
    }

    /**
     *  删除哈希表key中的多个指定域，不存在的域将被忽略。
     * @param $key
     * @param $field_arr
     */
    public function hDel($key,$field_arr)
    {
        foreach ($field_arr as $var){
            $this->hDelOne($key,$var);
        }
    }

    /**
     * 删除哈希表key中的一个指定域，不存在的域将被忽略。
     * 
     * @param $key
     * @param $field
     * @return BOOL TRUE in case of success, FALSE in case of failure
     */
    public function hDelOne($key,$field)
    {
        return $this->getRedis($key)->hdel($key,$field);
    }

    /**
     * 添加一个字符串值到LIST容器的顶部（左侧），如果KEY不存在，曾创建一个LIST容器，如果KEY存在并且不是一个LIST容器，那么返回FLASE。
     * 
     * @param $key
     * @param $val
     */
    public function lPush($key, $val)
    {
        $this->getRedis($key)->lPush($key,$val);
    }

    public function rPush($key, $val)
    {
        $this->getRedis($key)->rPush($key,$val);
    }

    /**
     * 返回LIST顶部（左侧）的VALUE，并且从LIST中把该VALUE弹出。
     * @param $key
     */
    public function lPop($key){
        return $this->getRedis($key,'slave')->lPop($key);
    }

    public function rPop($key)
    {
        return $this->getRedis($key,'slave')->rPop($key);
    }

    public function lrem($key, $val)
    {
        return $this->getRedis($key)->lrem($key, $val);
    }

    public function getList($key, $start = 0, $end = -1)
    {
        return $this->getRedis($key,'slave')->lrange($key, $start, $end);
    }

    public function zAdd($key, $val, int $score)
    {
        return $this->getRedis($key,'slave')->zadd($key, $score, $val); 
    }

    public function zRange($key)
    {
        return $this->getRedis($key,'slave')->zrange($key, 0, -1);
    }

    public function zRevrange($key, $start = 0, $end = -1, $withScore = false)
    {
        return $this->getRedis($key,'slave')->zrevrange($key, $start, $end, $withScore);
    }

    /**
     * 倒序获取评分介于[$start, $end]区间的元素
     * @Author    422909231@qq.com
     * @DateTime  2017-07-05
     * @version   [version]
     * @param     [type]           $key
     * @param     integer          $start
     * @param     integer          $end
     * @param     array            $options 
     * [
     *     'limit' => [0, 10],
     *     'withscores' => false
     * ]
     * @return    array
     */
    public function zRangeByScore($key, $start = 0, $end = -1, $options = [
        'limit' => [0, 10],
        'withscores' => false]
    ){
        return $this->getRedis($key,'slave')->zrangebyscore($key, $start, $end, $options);
    }

    // 获取有序集合的元素个数
    public function zSize($key)
    {
        return (int)$this->getRedis($key,'slave')->zsize($key);
    }


    /**
     * 值加加操作,类似 ++$i ,如果 key 不存在时自动设置为 0 后进行加加操作
     *
     * @param string $key 缓存KEY
     * @param int $default 操作时的默认值
     * @return int　操作后的值
     */
    public function incr($key, $default=1)
    {
        if($default == 1){
            return $this->getRedis($key)->incr($key);
        }else{
            return $this->getRedis($key)->incrBy($key, $default);
        }
    }

    /**
     * 值减减操作,类似 --$i ,如果 key 不存在时自动设置为 0 后进行减减操作
     *
     * @param string $key 缓存KEY
     * @param int $default 操作时的默认值
     * @return int　操作后的值
     */
    public function decr($key, $default=1)
    {
        if($default == 1){
            return $this->getRedis($key)->decr($key);
        }else{
            return $this->getRedis($key)->decrBy($key, $default);
        }
    }

    /**
     * 重命名key
     * 
     * @param $oldkey
     * @param $newkey
     */
    public function renameKey($oldkey,$newkey)
    {
        return $this->getRedis($oldkey)->rename($oldkey,$newkey);
    }

    /**
     * 删除一个或多个key
     * @param $keys
     */
    public function delete($keys)
    {
        if(is_array($keys)){
            foreach ($keys as $key){
                $this->getRedis($key)->del($key);
            }
        }else {
            $this->getRedis($keys)->del($keys);
        }
    }

    public function redisErrorLog($msg = ''){
        $file = date('Y-m-d').'.redis.error';

        //间隔线
        Log::writeLog($file, '====================='.date('Y-m-d H:i:s').'===========================', '');

        Log::writeLog($file, 'time', date('Y-m-d H:i:s'));

        //entrytype
        Log::writeLog($file, "entrance_type", $_SERVER['HTTP_USER_AGENT']);

        //ourl
        $ourl = $_SERVER['REQUEST_URI'];
        Log::writeLog($file, "ourl",$ourl);

        Log::writeLog($file, 'request_method', REQUEST_METHOD);
        Log::writeLog($file, 'source', Ip::getClientIp());

        Log::writeLog($file, 'msg', $msg);
    }

}