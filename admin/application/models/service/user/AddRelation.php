<?php
class Service_User_AddRelationModel extends BasePageService {

    protected $userModel;

    public function __construct() {
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {

    }

    protected function __execute($req) {
        $postData = $req['post'];
        $uId = $postData['uid'];

        if(empty($uId) || !preg_match("/\w+/", $uId)){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        $relation = (int)$postData['re-sel'];
        $parentname = htmlspecialchars(trim($postData['re-name']));
        $phone = (int)$postData['re-mobile'];

        if(
            empty($relation) || 
            $relation == -1 || 
            empty($parentname) ||
            !preg_match("/^1\d{10}$/", $phone)
        ){
            $this->errNo = REQUEST_PARAMS_ERROR;
            return false;
        }

        // 一个手机号只能绑定一个账号 2017.7.21 修改
        $hasBind = $this->userModel->getUserInfoByMobile($phone, ['_id']);
        if(!empty($hasBind)){
            $this->errNo = MOBILE_HAS_BIND;
            return false;
        }

        if(!isset(Dao_UserModel::$relation[$relation])){
            $relation = 7;
        }

        $userdata = $this->userModel
            ->getUserInfoByUserId($uId, ['mobileno','parentinfo']);

        $insertParent = [
            'phone' => $phone,
            'parentrelation' => $relation,
            'parentname' => mb_substr($parentname, 0, 12),
        ];
        $userdata['parentinfo'][] = $insertParent;
        $userdata['mobileno'] = (array)$userdata['mobileno'];
        $userdata['mobileno'][] = $phone;


        $res = $this->userModel->updateUserInfoByUserid($uId, $userdata);
        if(false === $res)
            $this->errNo = USER_MODIFY_FAILED;

        return;
    }

}
