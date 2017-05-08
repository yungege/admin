<?php
class Service_Sport_BannerModel extends BasePageService {

    const PAGESIZE = 10;

    protected $userModel;
    protected $bannerModel;
    protected $resData = [
        'pageCount' => 0,
        'list' => [],
        'pn' => 1,
        'pageTag' => '3-1',
        'uptoken' => '',
    ];

    public function __construct() {
        $this->bannerModel = Dao_BannerModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $time = time();
        $req = $req['get'];
        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;
        $this->resData['pn'] = $req['pn'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $sort = ['createtime' => -1];
        $where = [
            'endtime' => ['$gt' => $time],
        ];
        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => $sort,
        ];
        $count = $this->bannerModel->count($where);
        $this->resData['pageCount'] = ceil($count / self::PAGESIZE);
        if($count <= 0)
            return $this->resData;

        $list = $this->bannerModel
            ->getBannerListByPage($where, [], $options);
        if(empty($list))
            return $this->resData;

        $userIds = array_unique(array_column($list, 'creator'));
        $userInfo = $this->userModel->batchGetUserInfoByUserids($userIds,['username']);
        if(!empty($userInfo))
            $userInfo = array_column($userInfo, null, '_id');

        foreach ($list as &$row) {
            $row['starttime'] = empty($row['starttime']) ? '' : date('Y-m-d H:i:s', $row['starttime']);
            $row['endtime'] = empty($row['endtime']) ? '' : date('Y-m-d H:i:s', $row['endtime']);
            $row['createtime'] = empty($row['createtime']) ? '' : date('Y-m-d H:i:s', $row['createtime']);
            if(isset($userInfo[$row['creator']]))
                $row['creator'] = $userInfo[$row['creator']]['username'];
        }

        $this->resData['list'] = $list;
        $this->resData['uptoken'] = (string)$this->getUploadToken();
        return $this->resData;
    }

    protected function getUploadToken(){
        $bkt = 'ugcimg';
        $url = 'https://api.ttxstech.com/index.php/mew/autoupload/getToken?bucket=' . $bkt;
        $json = HttpCurl::request($url, 'get')[0];
        return json_decode($json, true)['uptoken'];
    }

}