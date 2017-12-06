<?php
class Service_Meau_AllotRoleModel extends BasePageService {

    protected $roleModel;
    protected $assginModel;
    protected $userModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '7-4',
        'list' => [],
        'myRole' => '',
    ];
    protected static $oidPreg = "/[0-9a-z]{24}/";

    public function __construct() {
        $this->roleModel = Dao_RoleModel::getInstance();
        $this->assginModel = Dao_RoleAssginModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $method = strtolower(REQUEST_METHOD);
        if($method === 'post'){
            $this->post($req['post']);
            exit();
        }

        $uid = $req['get']['_id'];
        if(!isset($uid) || !preg_match(self::$oidPreg, $uid)){
            throw new Exception("PAGE NOT FOUND", 404);
        }

        $list = $this->roleModel->query(
            [   'status' => 1,
                'name' => ['$ne' => 'superadmin'],
            ],
            [
                'sort' => [
                    'ctime' => 1
                ],
                'limit' => 0,
            ]
        );
        $this->resData['list'] = &$list;

        $myRole = $this->assginModel->getRoleByUId($uid);
        if(!empty($myRole)){
            $this->resData['myRole'] = $myRole[0]['rid'];
        }

        $nickname = $this->userModel->getInfoById($uid, ['nickname']);
        $this->resData['nickname'] = $nickname['nickname'];
        return $this->resData;
    }

    protected function post($req){
        if(
            !preg_match(self::$oidPreg, $req['uid']) || 
            !preg_match(self::$oidPreg, $req['rid'])
        ){
            return false;
        }

        $data = [
            'uid' => $req['uid'],
            'rid' => $req['rid'],
        ];

        $isExists = $this->assginModel->getRoleByUId($req['uid']);

        if(empty($isExists)){
            $this->assginModel->insert($data);
        }
        else{
            if(
                ($req['uid'] == $isExists[0]['uid']) && 
                ($req['rid'] == $isExists[0]['rid'])
            ){
                return false;
            }

            unset($data['uid']);
            $this->assginModel->updateById($isExists[0]['_id'], $data);
        }
        return true;
    }

}