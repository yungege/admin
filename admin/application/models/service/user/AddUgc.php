<?php
class Service_User_AddUgcModel extends BasePageService {

    protected $projectModel;
    protected $projectSkuModel;
    protected $homeworkModel;
    protected $trainModel;
    protected $redis;

    protected $reqData;
    protected $resData;


    public function __construct() {
        $this->redis = Cache_CacheRedis::getInstance();
        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->homeworkModel = Dao_ExerciseHomeworkModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
    }

    protected function __declare() {
        $this->declareCheckXss = true;
    }

    protected function __execute($req) {
        $this->checkXss($req['post']);
        $req = $req['post'];

        if(
            empty($req['uid']) ||
            !preg_match("/\w+/", $req['uid']) ||
            !in_array($req['htype'], [1,2,3]) ||
            !preg_match("/(\d{4})-(\d{2})-(\d{2})/", $req['wtime'])
        ){
            throw new Exception("Error Params", -1);
        }

        switch ($req['htype']) {
            // 跑步
            case 3:
                $this->addRun($req);
                break;
            
            default:
                $this->addNormal($req);
                break;
        }
    }

    // 跑步数据
    protected function addRun($req){
        if(!preg_match("/^[1-9]\d+$/", $req['time_cost'])){
            throw new Exception("跑步时长错误.", -1);
        }

        if(!is_numeric($req['distance']) || (int)$req['distance'] <= 0){
            throw new Exception("跑步距离错误.", -1);
        }

        $data = [
            'starttime' => (int)strtotime($req['wtime'].' 19:00:00'),
            'endtime'   => intval(strtotime($req['wtime'].' 19:00:00') + $req['time_cost']),
            'type'      => 3,
            'htype'     => 3,
            'userid'    => $req['uid'],
            'burncalories'  => CommonFuc::calCalorie($req['distance'] * 1000, $req['time_cost']),
            'projecttime'   => (int)$req['time_cost'],
            'commenttext'   => '系统补交',
            'exciseimg'     => [
                'https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg',
            ],
            'route' => [
            ],
            'distance' => floatval($req['distance'] * 1000),
            'region' => [
                "maxlat" => 39.940865,
                "maxlon" => 116.41684,
                "minlat" => 39.939175,
                "minlon" => 116.41034,
            ],
            'createtime' => time(),
            'status' => 0,
        ];

        $res = $this->trainModel->insert($data);
        if($res === false){
            throw new Exception("操作失败", -1);
        }

        $redisKey = CommonFuc::getRedisKey($req['uid'].'_'.date('Y_m',$data['endtime']), 'train_history');

        $this->redis->delete($redisKey);
        return;
    }

    protected function addNormal($req){
        if(!isset($req['h-pid']) || empty($req['h-pid'])){
            throw new Exception("请选择要补交的锻炼项目.", -1);
        }

        list($hid, $pid, $cal, $time,$count) = explode('|', $req['h-pid']);
        if(
            !preg_match("/\w+/", $hid) || 
            !preg_match("/\w+/", $pid) ||
            !is_numeric($cal) || empty($cal) ||
            !preg_match("/^[1-9]\d+$/", $time) ||
            !preg_match("/^[1-9]\d+$/", $count)
        ){
            throw new Exception("作业信息错误.", -1);
        }

        $data = [
            "originaltime"  => (int)strtotime($req['wtime'].' 00:00:00'),
            "starttime"     => (int)strtotime($req['wtime'].' 19:00:00'),
            "endtime"       => intval(strtotime($req['wtime'].' 19:00:00')+$time),
            "actioncount"   => (int)$count,
            "burncalories"  => (float)$cal,
            "commenttext"   => "系统补交",
            "exciseimg"     => [ 
                "https://oi7ro6pyq.qnssl.com/o_1bpq74tqm1vdj18dd118o1ko01mumd.jpg"
            ],
            "createtime"    => time(),
            "type"          => 5,
            "trainingtype"  => 2,
            "userid"        => $req['uid'],
            "trainingid"    => $pid,
            "homeworkid"    => $hid,
            "status"        => 0,
            "htype"         => (int)$req['htype'],
            "projecttime"   => (int)$time
        ];

        $res = $this->trainModel->insert($data);
        if($res === false){
            throw new Exception("操作失败", -1);
        }

        $redisKey = CommonFuc::getRedisKey($req['uid'].'_'.date('Y_m',$data['endtime']), 'train_history');

        $this->redis->delete($redisKey);
        return;
    }
}