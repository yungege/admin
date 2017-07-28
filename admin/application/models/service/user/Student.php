<?php
class Service_User_StudentModel extends BasePageService {

    const PAGESIZE = 15;

    protected $userModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '2-1',
        'pageCount' => 0,
        'list' => [],
        'pn' => 1,
    ];

    public static $grade = [
        // 小学
        11 => '小学1年级',
        12 => '小学2年级',
        13 => '小学3年级',
        14 => '小学4年级',
        15 => '小学5年级',
        16 => '小学6年级',
        // 初中
        21 => '初中1年级',
        22 => '初中2年级',
        23 => '初中3年级',
        // 高中
        31 => '高中1年级',
        32 => '高中2年级',
        33 => '高中3年级',
    ];

    public function __construct() {
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $match = [];
        $req = $req['get'];
        $queryArr = $req;
        unset($queryArr['pn']);
        $this->resData['query'] = http_build_query($queryArr);
        $this->resData['grade'] = self::$grade;

        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;
        $this->resData['pn'] = $req['pn'];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;

        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => ['createtime' => -1],
        ];

        $fields = [
            'username',
            'nickname',
            'birthday',
            'sex',
            'iconurl',
            'createtime',
            'versions',
            'clientsource',
            'mobileno',
            'grade',
            'parentrelationship',
            'parentname',
            'schoolinfo',
            'classinfo',
            'lastsubmittime',
            'parentinfo',
            'lastlogin',
        ];

        if(is_numeric($req['grade']) && isset(self::$grade[$req['grade']])){
            $match['grade'] = (int)$req['grade'];
        }

        if(!empty($req['username'])){
            $match['$or'] = [
                ['username' => ['$regex' => addslashes($req['username']), '$options' => 'i']],
                ['nickname' => ['$regex' => addslashes($req['username']), '$options' => 'i']],
            ];
        }

        if(preg_match("/\w+/", $req['uid'])){
            $uid = addslashes($req['uid']);
            $match['_id'] = $this->userModel->makeObjectId($uid);
        }

        if(!empty($req['parentname'])){
            $match['parentname'] = ['$regex' => addslashes($req['parentname']), '$options' => 'i'];
        }

        if(preg_match("/^1\d{10}$/", $req['mobile'])){
            $match['mobileno'] = (int)$req['mobile'];
        }

        $count = $this->userModel->count($match);
        $this->resData['pageCount'] = ceil($count / self::PAGESIZE);
        if($count <= 0) return $this->resData;

        if(!empty($match['_id'])){
            $match['_id'] = $req['uid'];
        }
        $list = $this->userModel->getListByPage($match, $fields, $options);

        if(empty($list))
            return $this->resData;

        foreach ($list as &$row) {
            $mobileArr = [];
            $mobileno = (array)$row['mobileno'];
            foreach ($mobileno as $mb) {
                $mobileArr[] = "<a href='tel:{$mb}'>{$mb}</a>";
            }
            if(!empty($mobileArr)){
                $row['mobileno'] = implode('<br/>', $mobileArr);
            }

            $lastlogin = '登录方式：'.$row['lastlogin']['logintype'].'<br/>';
            if($row['lastlogin']['logintype'] == 'phone'){
                $lastlogin .= '手机：<a href="tel:'.$row['lastlogin']['phone'].'">'.$row['lastlogin']['phone'].'</a><br/>';
            }
            $lastlogin .= '时间：'.date('Y-m-d H:i:s', $row['lastlogin']['time']);
            $row['lastlogin'] = $lastlogin;
        }

        $this->resData['list'] = $list;
        return $this->resData;
    }

    
}