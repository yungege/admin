<?php
class Dao_PunchModel extends Db_Mongodb {

    protected $table = 'punch';
    public $limitTime = 0;

    protected $fields = [
        'qr_id'             => '',   // 二维码ID
        'htype'             => 5,    // 打卡
        'userid'            => '',   // 用户(学生)id号
        'exciseimg'         => [],
        'train_school_id'   => '',   // 训练机构ID
        'train_school_name' => '',   // 训练机构名
        'project_id'        => '',   // 锻炼项目ID
        'project_name'      => '',   // 锻炼项目名
        'has_evaluate'      => 0,    // 是否已评价 0无 1有
        'ctime'             => 0,    // 创建时间
    ];

    protected function __construct(){
        parent::__construct();

        // $this->redis = Cache_CacheRedis::getInstance();
        // $commonConfig = require(CONFIG_PATH . "/CommonConfig.php");
        // $this->limitTime = $commonConfig['punch_limit_time'];
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

    public function getDoneByUidAndQid(string $uid, string $qid, array $fields = []){
        $fields = $this->filterFields($fields);
        $options['projection'] = empty($fields) ? [] : $fields;

        $where = [
            'userid' => $uid,
            'qr_id' => $qid,
        ];

        return $this->queryOne($where, $options);
    }

    public function getDoneByUidAndId(string $uid, string $id, array $fields = []){
        $fields = $this->filterFields($fields);
        $options['projection'] = empty($fields) ? [] : $fields;

        $where = [
            '_id' => $id,
            'userid' => $uid,
        ];

        return $this->queryOne($where, $options);
    }

    public function getDoneListByUid(string $uid, array $fields = [], int $skip = 0, int $limit = 10){
        $fields = $this->filterFields($fields);
        $options['projection'] = empty($fields) ? [] : $fields;
        $options['limit'] = $limit;
        $options['skip'] = $skip;
        $options['sort'] = [
            'ctime' => -1,
        ];

        $where = [
            'userid' => $uid,
            'qr_id' => [
                '$exists' => true,
                '$ne' => '',
            ],
        ];

        return $this->query($where, $options);
    }

    public function getListByMonth(array $match, array $fields = [], array $options = [], string $monthDate, &$resList){
        $fields = $this->filterFields($fields);

        $options['limit'] = 0;
        if(!empty($fields)){
            $options['projection'] = $fields;
        }
        $list = $this->query($match, $options);
        if(empty($list)) return;

        $calorie = 0;
        $trainCount = count($list);

        foreach($list as $hData){
            $trainData = [];

            $trainData['trainId'] = $hData['_id'];
            $trainData['pName'] = ($hData['project_name'] ? (string)$hData['project_name'] : '兴趣锻炼');
            $trainData['pId'] = (string)$hData['project_id'];
            $trainData['trainingImg'] = (string)array_shift($hData['exciseimg']);
            $trainData['calorie'] = 0.00;
            $trainData['finishTime'] = $hData['ctime'];
            $trainData['hType'] = $hData['htype'];
            $trainData['hId'] = '';
            $trainData['originalTime'] = $hData['ctime'];
            $trainData['distance'] = 0.00;

            $resList['list'][] = $trainData;

            // 写入缓存
            $this->addCacheDataByMonth($match['userid'], $monthDate, $trainData);
        }

        $resList['calorie'] = $calorie;
        $resList['trainCount'] = $trainCount;
    }

    public function addCacheDataByMonth(string $uid, string $monthDate, array $data){
        $score = floatval((string)$data['finishTime'].(string)rand(100,999));
        $jsonItem = json_encode($data);
        $redisKey = Tools::getRedisKey($uid.'_'.$monthDate, 'train_history');
        $res = $this->redis->zAdd($redisKey, $jsonItem, $score);
        if($res){
            $this->redis->setExpire($redisKey, 30 * 86400);
        }
    }

    public function getCacheDataByMonth(string $uid, string $monthDate, int $pageNo = 1, int $pageSize = 10){
        $calorie = 0;
        $resList = [];
        $start = ($pageNo - 1) * $pageSize;
        $end = $start + $pageSize;

        $redisKey = Tools::getRedisKey($uid.'_'.$monthDate, 'train_history');
        $list = $this->redis->zRevrange($redisKey);
        $count = count($list);
        if($count == 0) return [];

        foreach ($list as $key => $row) {
            $item = [];
            $item = json_decode($row, true);
            $calorie += (float)$item['calorie'];
            if($key >= $start && $key < $end){
                $resList[] = $item;
            }
        }

        return [
            'pageCount'  => ceil($count / $pageSize),
            'trainCount' => $count,
            'calorie'    => $calorie,
            'list'       => $resList,
        ];
    }

    // 两次打卡时间间隔
    public function checkTimeLimit(string $uid){
        $where = [
            'userid' => $uid,
        ];

        $now = time();

        $info = $this->queryOne($where, ['projection'=>['ctime'=>1]]);
        if(!empty($info)){
            $diffTime = $now - (int)$info['ctime'];
            if($diffTime <= $this->limitTime){
                return false;
            }
        }

        return true;
    }

}