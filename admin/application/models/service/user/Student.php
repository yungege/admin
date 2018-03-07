<?php
class Service_User_StudentModel extends BasePageService {

    const PAGESIZE = 15;

    protected $userModel;
    protected $trainModel;
    protected $trainOutsideModel;
    protected $punchModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '2-1',
        'pageCount' => 0,
        'list' => [],
        'pn' => 1,
    ];

    public function __construct() {
        $this->userModel = Dao_UserModel::getInstance();
        $this->trainModel = Dao_TrainingdoneModel::getInstance();
        $this->trainOutsideModel = Dao_TrainingDoneOutsideModel::getInstance();
        $this->punchModel = Dao_PunchModel::getInstance();
    }

    protected function __declare() {
        $this->declareCheckXss = true;
    }

    protected function __execute($req) {
        $this->checkXss($req);

        $this->resData['today'] = date('Y-m-d');
        $match = ['type' => 1];
        $req = $req['get'];
        $this->resData['grade'] = Dao_UserModel::$grade;

        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;
        
        $offset = ($req['pn'] - 1) * self::PAGESIZE;

        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => ['createtime' => -1],
        ];

        $fields = [
            '_id',
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

        if(preg_match("/\w+/", $req['cid'])){
            $match['classinfo.classid'] = trim($req['cid']);
        }

        if(is_numeric($req['grade']) && isset(Dao_UserModel::$grade[$req['grade']])){
            $match['grade'] = (int)$req['grade'];
        }

        if(!empty(trim($req['username']))){
            $match['$or'] = [
                ['username' => ['$regex' => addslashes(trim($req['username'])), '$options' => 'i']],
                ['nickname' => ['$regex' => addslashes(trim($req['username'])), '$options' => 'i']],
            ];
        }

        if(preg_match("/\w+/", $req['uid'])){
            $uid = trim($req['uid']);
            $match['_id'] = $this->userModel->makeObjectId($uid);
        }

        if(!empty($req['parentname'])){
            $match['parentname'] = ['$regex' => addslashes(trim($req['parentname'])), '$options' => 'i'];
        }

        if(preg_match("/^1\d{10}$/", $req['mobile'])){
            $match['mobileno'] = (int)$req['mobile'];
        }

        $count = $this->userModel->count($match);
        $page = new Page($count, self::PAGESIZE);
        $this->resData['page'] = $page->show();
        
        if($count <= 0) return $this->resData;

        if(!empty($match['_id'])){
            $match['_id'] = $req['uid'];
        }

        if($_SESSION['userInfo']['type'] == 2){
            $teacher = $this->userModel->queryOne(['_id' => $_SESSION['userInfo']['_id']],['protection' => ['manageclassinfo' => 1]]);
            $classIds = array_column($teacher['manageclassinfo'],'classid');
            $match['classinfo.classid'] = ['$in' => $classIds];
        }
        $list = $this->userModel->getListByPage($match, $fields, $options);
        $list = array_column($list,null,'_id');
        $userIds = array_column($list,'_id');
       
        if(empty($list)){
            return $this->resData;
        }

        $doneCount = $this->doneCoune($userIds);
        foreach($doneCount as $k => $v){

            $list[$k]['doneCount'] = $v;
        }   
        
        foreach ($list as &$row) {
            $mobileArr = [];
            $mobileno = (array)$row['mobileno'];
            foreach ($mobileno as $mb) {
                $mobileArr[] = "<a href='tel:{$mb}'>{$mb}</a>";
            }
            if(!empty($mobileArr)){
                $row['mobileno'] = implode('<br/>', $mobileArr);
            }
            else{
                $row['mobileno'] = '<span style="display:inline-block;margin-bottom:2px;" class="label label-warning">无记录</span>';
            }

            $lastlogin = '';
            if(!empty($row['lastlogin'])){
                $lastlogin = '登录方式：'.$row['lastlogin']['logintype'].'<br/>';
                if($row['lastlogin']['logintype'] == 'phone'){
                    $lastlogin .= '手机：<a href="tel:'.$row['lastlogin']['phone'].'">'.$row['lastlogin']['phone'].'</a><br/>';
                }
                $lastlogin .= '时间：'.date('Y-m-d H:i:s', $row['lastlogin']['time']);
            }
            else{
                $lastlogin = '<span class="label label-warning">无记录</span>';
            }
            $row['lastlogin'] = $lastlogin;
            if(empty($row['doneCount'])){
                $row['doneCount'] = 0;
            }
            
        }

        $this->resData['list'] = $list;
        return $this->resData;
    }

    protected function doneCoune($userIds){

        $where = [
            'htype' => [
                '$in' => [1,2,3,4,5,6,7],
            ],
            'userid' => [
                '$in' => $userIds,
            ],
        ];

        $fields = [
            '$project' => [
                'userid' => 1,
                'htype' => 1,
            ]
        ];

        $group = [
            '$group' => [
                '_id' => '$userid',
                'count' => ['$sum' => 1],
                'htype' => ['$push' => '$htype'],
            ]
        ];
        $aggregate = [
            ['$match' => $where],
            $fields,
            $group
        ];

        $list = $this->trainModel->aggregate($aggregate);

        if(!empty($list)){
            $list = array_column($list,'count','_id');
        }else{
            $list = [];
        }

        $list2 = $this->trainOutsideModel->aggregate($aggregate);
        if(!empty($list2)){
            $list2 = array_column($list2,'count','_id');
            foreach($list2 as $key => $value){
                if(empty($list[$key])){
                    $list[$key] = $value;
                }else{
                    $list[$key] += $value;
                }
            }
        }

        unset($where['starttime']);
       
        $aggregate = [
            ['$match' => $where],
            $fields,
            $group
        ];

        $list3 = $this->punchModel->aggregate($aggregate);
        if(!empty($list3)){
            $list3 = array_column($list3,'count','_id');
            foreach($list3 as $key => $value){
                if(empty($list[$key])){
                    $list[$key] = $value;
                }else{
                    $list[$key] += $value;
                }
            }
        }
        if(empty($list)){
            return [];
        }else{
            return $list;
        }
    }

}