<?php
class Service_User_IndexModel extends BasePageService {

    protected $userModel;

    protected $reqData;
    protected $resData = [
        
    ];

    public function __construct() {
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $match = [];
        $req = $req['get'];
        
        if(!isset($req['classId']) || !preg_match("/\w+/", $req['classId'])){
            throw new Exception("Error Processing Request", -1);
        }

        $fields = [
            'username',
            'nickname'
        ];

        $this->resData['userList'] = $this->userModel->getUserListByClassId($req['classId'], $fields);

        if(!empty($this->resData['userList'])){
            foreach ($this->resData['userList'] as &$row) {
                if(empty($row['username'])){
                    $row['name'] = $row['nickname'];
                }
                else{
                    $row['name'] = $row['username'];
                }
            }
        }
        return $this->resData;
    }

    
}