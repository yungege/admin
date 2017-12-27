<?php
class Service_User_AddClassModel extends BasePageService {

    protected $userModel;
    protected $uId;
    protected $classId;
    protected $type;

    public function __construct() {
        $this->userModel = Dao_UserModel::getInstance();
        $this->classModel = Dao_ClassinfoModel::getInstance();
    }

    protected function __declare() {

    }

    protected function __execute($req) {
        $postData = $req['post'];

        $this->uId = $postData['uid'];
        $this->classId = $postData['classid'];
        $this->type = (int)$postData['type'];

        if($this->type == 1){
            $res = $this->addClass();
        }

        if($res == true){
            return ;
        }else{
            $this->errNo = USER_MODIFY_FAILED;
            return false;
        }
        
    }

    protected function addClass(){
        if(empty($this->uId) || 
            !preg_match("/\w+/", $this->uId) ||
            empty($this->classId) ||
            !preg_match("/\w+/", $this->classId)
        ){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        $classInfo = $this->classModel->getClassInfoByClassId($this->classId,['name']);
        if(empty($classInfo)){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        $userInfo = $this->userModel->getUserInfoByUserId($this->uId,['manageclassinfo']);
        $classIds = array_column($userInfo['manageclassinfo'],'classid');
        if(in_array($this->classId,$classIds)){
            return true;
        }else{
            
        }

        if(empty($userInfo)){
            $this->errNo = USER_USER_NON_EXSIT;
            return false;
        }

        $class = [
            'classname' => $classInfo['name'],
            'classid' => (string)$classInfo['_id'],
        ];

        $userInfo['manageclassinfo'][] = $class;
        $result = $this->userModel->updateUserInfoByUserid($this->uId,$userInfo);

        if($result === false){
            var_dump('失败');
        }else{
            return true;
        }
    }

}
