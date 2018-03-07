<?php
class Service_User_DelClassModel extends BasePageService {

    protected $userModel;
    protected $uId;
    protected $classId;

    public function __construct() {
        $this->userModel = Dao_UserModel::getInstance();
        $this->classModel = Dao_ClassinfoModel::getInstance();
    }

    protected function __declare() {

    }

    protected function __execute($req) {

        $req = $req['post'];
        $this->uId = $req['uid'];
        $this->classId = $req['classid'];

        $userInfo = $this->userModel->getUserInfoByUserId($this->uId,["manageclassinfo"]);

        if(empty($userInfo) || empty($this->uId) || empty($this->classId)){
            $this->errNo = -1;
            $this->errMsg = '删除失败';
            return false;
        }

        $managerClass = array_column($userInfo['manageclassinfo'],null,'classid');
        unset($managerClass[$this->classId]);

        $userInfo['manageclassinfo'] = array_values($managerClass);
        $result = $this->userModel->updateUserInfoByUserid($this->uId,$userInfo);
       
        if($result === false){
            $this->errNo = -1;
            $this->errMsg = '删除失败';
            return false;
        }else{
            return true;
        }

    }

   

}
