<?php
class Service_Sport_ActionModel extends BasePageService {

    const PAGESIZE = 10;

    protected $actionModel;
    protected $userModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '3-3',
        'list' => [],
    ];

    protected static $grade = [
        "11" => '小学1年级',
        "12" => '小学2年级',
        "13" => '小学3年级',
        "14" => '小学4年级',
        "15" => '小学5年级',
        "16" => '小学6年级',
        "21" => '初中1年级',
        "22" => '初中2年级',
        "23" => '初中3年级',
        "31" => '高中1年级',
        "32" => '高中2年级',
        "33" => '高中3年级'
    ];

    protected static $difficulty = [
        0 => '低',
        1 => '中',
        2 => '难',
    ];

    public function __construct() {
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['get'];
        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;

        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $sort = ['createtime' => -1];
        
        $where = ['status' => ['$ne' => -9]];
        if(!empty(trim($req['aname']))){
            $where['$or'] = [
                ['name' => ['$regex' => addslashes(trim($req['aname'])), '$options' => 'i']],
                ['name' => ['$regex' => addslashes(trim($req['aname'])), '$options' => 'i']],
            ];
        }

        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => $sort,
        ];
        $count = $this->actionModel->count($where);
        $page = new Page($count, self::PAGESIZE);
        $this->resData['page'] = $page->show();

        if($count <= 0)
            return $this->resData;

        $list = $this->actionModel->getListByPage($where, [], $options);
        if(empty($list))
            return $this->resData;

        $userIds = array_unique(array_column($list, 'createor'));
        $userInfo = $this->userModel->batchGetUserInfoByUserids($userIds, ['username']);
        if(!empty($userInfo))
            $userInfo = array_column($userInfo, null, '_id');

        foreach ($list as &$row) {
            $row['typeno'] = Dao_ExerciseactionModel::$type[$row['typeno']];
            $row['createor'] = (string)$userInfo[$row['createor']]['username'];
            $row['vfilesize'] = sprintf('%.2f', $row['vfilesize']);
            $row['calorie'] = sprintf('%.2f', $row['calorie']);
            $row['physicalquality'] = Dao_ExerciseactionModel::$physicalquality[$row['physicalquality']];
            $dif = [];
            if(!empty($row['gradedifficulty'])){
                foreach ($row['gradedifficulty'] as $grade => $lev) {
                    $dif[self::$grade[$grade]] = self::$difficulty[$lev];
                }
            }
            $row['gradedifficulty'] = $dif;

            $img = (string)$row['coverimg'];
            if(!empty($img))
                $row['coverimg'] .= '?imageView2/2/w/100/h/60/q/100';

        }

        $this->resData['list'] = $list;
        return $this->resData;
    }

}