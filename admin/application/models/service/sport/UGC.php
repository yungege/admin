<?php
class Service_Sport_UGCModel extends BasePageService {

    const PAGESIZE = 10;

    protected $projectModel;
    protected $projectSkuModel;
    protected $trainModel;
    protected $userModel;
    protected $shareModel;

    public static $delay = [
        '1' => 2,
        '-1' => 0,
    ];

    protected $reqData;
    protected $resData = [
        'pageTag' => '4-2',
    ];

    public function __construct() {
        $this->projectModel     = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel  = Dao_ExerciseProjectSkuModel::getInstance();
        $this->trainModel  = Dao_TrainingdoneModel::getInstance();
        $this->userModel  = Dao_UserModel::getInstance();
        $this->shareModel = Dao_ShareModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['get'];
        $where = [];

        $this->resData['worktype'] = Dao_ExerciseHomeworkModel::$type;

        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;

        if(isset(Dao_ExerciseHomeworkModel::$type[$req['type']])){
            $where['htype'] = (int)$req['type'];
        }
        else{
            $where['htype'] = [
                '$in' => array_keys(Dao_ExerciseHomeworkModel::$type),
            ];
        }

        if(preg_match("/\w+/", $req['uid'])){
            $where['userid'] = (string)$req['uid'];
        }

        if(isset(self::$delay[$req['delay']])){
            $where['isdelay'] = (int)self::$delay[$req['delay']];
        }

        if(preg_match("/(\d{4})-(\d{2})-(\d{2})/", $req['start'])){
            $where['endtime']['$gte'] = (int)strtotime($req['start']." 00:00:00");
        }

        if(preg_match("/(\d{4})-(\d{2})-(\d{2})/", $req['end'])){
            $where['endtime']['$lte'] = (int)strtotime($req['end']." 23:59:59");
        }
        
        $fields = [
            'htype',
            'trainingid',
            'userid',
            'originaltime',
            'starttime',
            'endtime',
            'createtime',
            'burncalories',
            'distance',
            'isdelay',
            'homeworkid',
        ];

        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $sort = ['createtime' => -1];
        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => $sort,
        ];

        $count = $this->trainModel->count($where);
        $page       = new Page($count, self::PAGESIZE);
        $show       = $page->show();
        $trainList = $userInfo = $proInfo = $shareInfo = [];

        if($count > 0){
            $trainList = $this->trainModel->getListByPage($where, $fields, $options);
        }

        if(!empty($trainList)){
            // user
            $users = array_unique(array_column($trainList, 'userid'));
            $userInfo = $this->userModel->batchGetUserInfoByUserids($users, ['_id','username','nickname','iconurl']);
            $userInfo = array_column($userInfo, null, '_id');

            // projectSku
            $proids = array_unique(array_column($trainList, 'trainingid'));
            $proInfo = $this->projectSkuModel->batchGetInfoByIds($proids, ['_id','project_id']);
            $proInfo = array_column($proInfo, null, '_id');
            // project
            $pids = array_unique(array_column($proInfo, 'project_id'));
            $pInfo = $this->projectModel->batchGetInfoByIds($pids, ['_id','name']);
            $pInfo = array_column($pInfo, null, '_id');
            foreach ($proInfo as $key => &$prow) {
                $prow['name'] = $pInfo[$prow['project_id']]['name'];
                $prow['pid'] = $pInfo[$prow['project_id']]['_id'];
            }
            // share
            $shareids = array_unique(array_column($trainList, '_id'));
            $shareInfo = $this->shareModel->query(['traindone_id' => ['$in' => $shareids],'share_type' => 2], ['projection' => ['_id'=>1,'traindone_id'=>1]]);
            $shareInfo = array_column($shareInfo, null, 'traindone_id');
        }

        foreach ($trainList as &$row) {
            $row['username'] = $userInfo[$row['userid']]['username'];
            $row['nickname'] = $userInfo[$row['userid']]['nickname'];
            $row['iconurl'] = $userInfo[$row['userid']]['iconurl'] ? : '';
            $row['hname'] = Dao_ExerciseHomeworkModel::$type[$row['htype']];
            $row['pname'] = ($row['htype'] != 3 && empty($proInfo[$row['trainingid']]['name'])) ? '测试项目' : $proInfo[$row['trainingid']]['name'];
            $row['pid'] = ($row['htype'] != 3 && !empty($proInfo[$row['trainingid']]['name'])) ? $proInfo[$row['trainingid']]['pid'] : '';
            $row['burncalories'] = number_format($row['burncalories'], 2, '.', '');
            $row['distance'] = $row['htype'] == 3 ? number_format($row['distance'], 2, '.', '') : '';
            $row['share'] = isset($shareInfo[$row['_id']]) ? 1 : 0;
            $row['avgSpeed'] = ($row['htype'] == 3 && (float)$row['distance'] > 0) ? number_format(($row['distance']/(($row['endtime']-$row['starttime'])/3.6)), 2, '.', '') : 0;
        }
        $this->resData['list'] = $trainList;
        $this->resData['page'] = $show;
        
        return $this->resData;
    }

}