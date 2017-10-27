<?php
class Dao_TrainingdoneModel extends Db_Mongodb {
    
    protected $table = 'trainingdone';

    protected $fields = [
        'type'              => 0,    // 锻炼类型:1-翻转课堂,2-身体素质作业,3-跑步,4-兴趣班,5-普通锻炼项目... （老数据，现为htype）
        'htype'             => 0,    // 1-翻转课堂,2-身体素质作业,3-跑步,4-兴趣班,5-普通锻炼项目...
        'trainingtype'      => 0,    // 所属锻炼项目类型类型编号：1-普通运动，2-跑步运动，3-高抬腿运动(编号内容会再调整)
        'trainingid'        => '',   // 锻炼项目的id号
        'trainingname'      => '',   // 锻炼项目的id号
        'part'              => 0,    // 锻炼项目中的节次信息,比如完成了"增肌训练第二节"
        'userid'            => '',   // 用户(学生)id号
        'originaltime'      => 0,    // 作业原始时间
        'starttime'         => 0,    // 开始时间
        'endtime'           => 0,    // 结束时间
        'createtime'        => 0,    // 创建时间
        'actioncount'       => 0,    // 本次锻炼的动作数量
        'burncalories'      => 0.00, // 本次锻炼消耗卡路里
        'commenttext'       => '',   // 锻炼感想/评论文本内容
        'commentaudio'      => [],   // 锻炼感想/评论音频内容
        'commentvideo'      => [],   // 锻炼感想/评论视频内容
        'exciseimg'         => [],   // 锻炼监管和感想图片:[{type(图片类型:1-运动监督gif,2-运动感想添加图片),imgurl(图片地址)}......]
        'GPSinfo'           => '',   // GPS地理位置信息
        'route'             => [],   // 跑步路线
        'distance'          => 0,    // 跑步距离
        'averagevelocity'   => 0,    // 平均速度
        'pace'              => [],   // 配速信息(按照第一公里,第二公里的顺序插入到数组中):[{speed(公里速度),time(时间),calories(消耗卡路里)}......]
        'region'            => [],   // 区域{minlat(最小维度),maxlat(最大维度),minlon(最小经度),maxlon(最大经度)}
        'mapurl'            => '',   // 地图图片
        'isdelay'           => 0,    // 是否是延期作业(2-是，0-不是)
        'homeworkid'        => '',   // 作业ID
        'status'            => 0,    // 1-已统计 0-未统计
        'mark'              => '',   // 标记
	];

    protected function __construct(){
        parent::__construct();
        $this->redis = Cache_CacheRedis::getInstance();
        $this->projectSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
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

    public function getTodayBjTrain(string $uid, string $date = '', array $option = []){
        if(empty($uid)) return false;

        if(empty($date))
            $date = date('Y-m-d');

        $start = strtotime($date.' 00:00:00');
        $end = strtotime($date.' 23:59:59');

        $where = [
            'uid' => $uid,
            'createtime' => [
                '$gte' => $start,
                '$lte' => $end,
            ]
        ];

        return $this->queryOne($where, $option);
    }

    public function getTrainList(array $where,array $fields){

         $fields = $this->filterFields($fields);
         if(!empty($fields)){
            $options['protection'] = $fields;
         }
         
         return $this->query($where,$options);
    }

    public function updataById(string $id, array $fields){

        $where = [
            '_id' => $id,
        ];

        return $this->update($where,$fields);
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

            if($hData['htype'] == 1 || $hData['htype'] == 2){
                if((int)$hData['originaltime'] <= 0){
                    continue;
                }
                // 获取项目的锻炼时间
                $timeCost = (int)$this->projectSkuModel->getInfoById(
                    $hData['trainingid'] ,
                    ['time_cost']
                )['time_cost'];
                if(empty($timeCost)){
                    $timeCost = $hData['endtime'] - $hData['starttime'];
                }
                
                $trainData['trainId'] = $hData['_id'];
                $trainData['pName'] = $hData['htype'] == 1 ? '翻转课堂' : '身体素质锻炼';
                $trainData['pId'] = (string)$hData['trainingid'];
                $trainData['pInterval'] = (int)$timeCost;
                $trainData['trainingImg'] = array_shift($hData['exciseimg']);
                if(empty($trainData['trainingImg']) && !empty($hData['imginfo'])){
                    $trainData['trainingImg'] = $hData['imginfo'][0]['gifUrl'];
                }
            }
            else{
                $trainData['trainId'] = $hData['_id'];
                $trainData['pName'] = "跑步锻炼";
                $trainData['pInterval'] = $hData['endtime'] - $hData['starttime'];
                $trainData['pId'] = (string)$hData['_id'];
                $trainData['trainingImg'] = array_shift($hData['exciseimg']);
                if(empty($trainData['trainingImg']) && !empty($hData['mapurl'])){
                    $trainData['trainingImg'] = $hData['mapurl'];
                }
            }
            
            $trainData['calorie'] = $hData['burncalories'];
            $trainData['finishTime'] = $hData['endtime'];
            $trainData['hType'] = $hData['htype'];
            $trainData['hId'] = (string)$hData['homeworkid'];
            $trainData['originalTime'] = $hData['originaltime'];

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

    public function checkRepeatSubmit(int $type, string $userId, int $startTime, int $endTime, string $projectId = ''){

        $map['userid'] = $userId;
        $map['starttime'] = $startTime;
        $map['endtime']= $endTime;

        // 非跑步
        if($type != 3){
            $map['trainingid'] = $projectId;
        }

        $result = $this->queryOne($map);
        if(!empty($result)){
            return $result['_id'];
        }else{
            return false;
        }
    }

    public function addCacheDataByMonth(string $uid, string $monthDate, array $data){
        $score = floatval((string)$data['finishTime'].(string)rand(100,999));
        $jsonItem = json_encode($data);
        $redisKey = Tools::getRedisKey($uid.'_'.$monthDate, 'train_history');

        $res =  $this->redis->zAdd($redisKey, $jsonItem, $score);
        if($res){
            $this->redis->setExpire($redisKey, 30 * 86400);
        }
        return $res;
    }

}