<?php
class Service_User_DoregisterModel extends BasePageService {

	protected $userModel;

	protected $reqData;
	protected $resData;

    private static $admin = [
        13522213145,
        13161486949,
        18513886256,
        17701306902,
        18600024371,
    ];

    public function __construct() {
    	
		$this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
    	// 关闭登录验证
        $this->declareLogin = false;
    }

    protected function __execute($req) {
       
        $req = $req['post'];
        $req['post'] = 1;
        $res = $this->doRegister($req);
       
        if($res === 1){
            $this->errNo = -1;
            $this->errMsg = '手机号不符合规则';
            return false;
        }
        if($res === 2){
            $this->errNo = -1;
            $this->errMsg = '密码不符合规则';
            return false;
        }
        if($res === 3){
            $this->errNo = -1;
            $this->errMsg = '密码输入不一致';
            return false;
        }
        if($res === 4){
            $this->errNo = -1;
            $this->errMsg = '该手机号无权限注册';
            return false;
        }
        if($res === 5){
            $this->errNo = -1;
            $this->errMsg = '该用户已经注册过';
            return false;
        }

        return ture;
        
	}

    protected function doRegister($req){

        if(!preg_match("/^1\d{10}$/", $req['mob'])){
            return 1;
        }

        if(!preg_match("/^[a-zA-Z]\w{5,17}$/", $req['pwd'])){
            return 2;
        }

        if($req['pwd'] !== $req['pwd2']){
            return 3;
        }

        if(!in_array($req['mob'],self::$admin)){
            return 4;
        }

        $req['pwd'] = md5(substr($req['mob'], 1,8) . $req['pwd']);
        $userInfo = $this->userModel->queryOne(['mobileno' => (int)$req['mob']]);

        if(!empty($userInfo['password'])){
            return 5;
        }

        $set['password'] = $req['pwd'];
        $update = $this->userModel->updateUserInfoByUserid($userInfo['_id'],$set);

        return ture;
    }

}