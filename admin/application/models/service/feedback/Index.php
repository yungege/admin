<?php
class Service_Feedback_IndexModel extends BasePageService {

    const PAGESIZE = 15;

    protected $fedModel;
    protected $userModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '4-5',
        'pageCount' => 0,
        'list' => [],
        'pn' => 1,
    ];

    public function __construct() {
        $this->fedModel = Dao_FeedbackModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['get'];
        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;
        $this->resData['pn'] = $req['pn'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $sort = ['createtime' => -1];
        
        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => $sort,
        ];
        $count = $this->fedModel->count();
        $this->resData['pageCount'] = ceil($count / self::PAGESIZE);
        if($count <= 0)
            return $this->resData;

        $list = $this->fedModel->getListByPage([], [], $options);
        if(empty($list))
            return $this->resData;

        $userIds = array_column($list, 'userid');
        $userInfo = $this->userModel->batchGetUserInfoByUserids($userIds, ['iconurl','nickname','mobileno','parentinfo']);
        if(!empty($userInfo)){
            $userIds = array_unique($userIds);
            $userInfo = array_column($userInfo, null, '_id');

            foreach ($list as &$row) {
                $iconurl = (string)$userInfo[$row['userid']]['iconurl'];
                if(!empty($iconurl))
                    $iconurl .= '?imageView2/2/h/40/q/100';
                $parent = (array)$userInfo[$row['userid']]['parentinfo'];
                $info = [];
                if(!empty($parent)){
                    foreach ($parent as $parr) {
                        $rel = Dao_UserModel::$relation[$parr['parentrelation']];
                        if(empty($rel)) $rel = '其他';
                        $info[] = $rel . ': ' . $parr['phone'];
                    }
                }
                $row['parent'] = $info;
                $row['iconurl'] = $iconurl;
                $row['nickname'] = (string)$userInfo[$row['userid']]['nickname'];
                $row['date'] = date('Y-m-d', $row['createtime']);
                $row['time'] = date('H:i:s', $row['createtime']);
                $row['mobile'] = (int)$userInfo[$row['userid']]['mobileno'];
            }
        }

        $this->resData['list'] = $list;

        return $this->resData;
    }

}