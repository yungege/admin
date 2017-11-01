
<?php
class Dao_TrainingDoneOutsideModel extends Db_Mongodb {

        protected $table = 'training_done_outside';

        protected $fields = [
            'htype'             => 0,    // 1-翻转课堂,2-身体素质作业,3-跑步,4-兴趣班,5-普通锻炼项目...
            'userid'            => '',   // 用户(学生)id号
            'starttime'         => 0,    // 开始时间
            'endtime'           => 0,    // 结束时间
            'createtime'        => 0,    // 创建时间
            'homeworkid'        => '',   // 作业ID
            'projecttime'       => 0.00,  // 锻炼时间
            'burncalories'      => 0.00, // 本次锻炼消耗卡路里
            'exciseimg'         => [],   // 锻炼监管和感想图片:[{type(图片类型:1-运动监督gif,2-运动感想添加图片),imgurl(图片地址)}......]
            'commenttext'       => '',   // 锻炼感想/评论文本内容
            'status'            => 0,    // 1-已统计 0-未统计
            'train_name'        => '',   // 锻炼名字
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

        public function getListByMonth(array $match, array $fields = [], array $options = [], string $monthDate, &$resList){
        $fields = $this->filterFields($fields);

        $options['limit'] = 0;
        $options['projection'] = empty($fields) ? $this->fields : $fields;

        $list = $this->query($match, $options);

        if(empty($list)) return;

        $calorie = 0;
        $trainCount = count($list);

        foreach($list as $hData){
            $trainData = [];

            $trainData['trainId'] = $hData['_id'];
            $trainData['pName'] = empty($hData['train_name']) ? '课外锻炼' : $hData['train_name'];
            $trainData['pId'] = "";
            $trainData['pInterval'] = $hData['projecttime'];
            $trainData['trainingImg'] = array_shift($hData['exciseimg']);
            if(empty($trainData['trainingImg']) && !empty($hData['imginfo'])){
                $trainData['trainingImg'] = $hData['imginfo'][0]['gifUrl'];
            }
            $trainData['calorie'] = $hData['burncalories'];
            $trainData['finishTime'] = $hData['endtime'];
            $trainData['hType'] = $hData['htype'];
            $trainData['hId'] = (string)$hData['homeworkid'];
            $trainData['originalTime'] = strtotime(date('Y-m-d',$hData['starttime']));

            $calorie += (float)$trainData['calorie'];
            $resList['list'][] = $trainData;

            // 写入缓存
            $this->addCacheDataByMonth($match['userid'], $monthDate, $trainData);
        }

        $resList['calorie'] = $calorie;
        $resList['trainCount'] = $trainCount;
    }

    /**
     * zset 类型(有序集合)
     * @Author    422909231@qq.com
     * @DateTime  2017-07-05
     * @version   [version]
     * @return    [type]           [description]
     */
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

    /**
     * zset 添加缓存 将锻炼结束时间+三位随机数作为分数 避免排名相同
     * @Author    422909231@qq.com
     * @DateTime  2017-07-06
     * @version   [version]
     * @param     string           $redisKey
     * @param     array            $data
     */
    public function addCacheDataByMonth(string $uid, string $monthDate, array $data){
        $score = floatval((string)$data['finishTime'].(string)rand(100,999));
        $jsonItem = json_encode($data);
        $redisKey = Tools::getRedisKey($uid.'_'.$monthDate, 'train_history');

        $res = $this->redis->zAdd($redisKey, $jsonItem, $score);
        if($res){
            $this->redis->setExpire($redisKey, 30 * 86400);
        }
        return $res;
    }

    public function getTrainById(string $id, array $fields){

        $where = [
            '_id' => $id,
        ];

        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $options['protection'] = $fields;
        }
         
        return $this->queryOne($where,$options);
    }

}