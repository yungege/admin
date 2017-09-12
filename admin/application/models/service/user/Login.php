<?php
class Service_User_LoginModel extends BasePageService {

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

        $res = $this->doLogin($req);
        if(false === $res){
            $this->errNo = -1;
            $this->errMsg = '账号或密码错误';
            return false;
        }
        if($res === -1){
            $this->errNo = -2;
            return false;
        }
        $_SESSION['userInfo'] = $res;
        setcookie(session_name(), session_id(), time() + 30*86400, '/', '.ttxs.com');
        setcookie('ttxs', serialize($res), time() + 30*86400, '/', '.ttxs.com');
        return $res;
	}

    protected function doLogin($req){
        

        if(!preg_match("/^1\d{10}$/", $req['mob'])){
            return false;
        }

        // if(!preg_match("/^[a-zA-Z]\w{5,17}$/", $req['pwd'])){
        //     return false;
        // }

        if(!in_array($req['mob'],self::$admin)){
            return false;
        }

        $req['pwd'] = md5(substr($req['mob'], 1,8) . $req['pwd']);

        $userInfo = $this->userModel->queryOne([
            'mobileno' => (int)$req['mob'],
            ]);

        if(empty($userInfo)){
            return false;
        }

        if(empty($userInfo['password'])){
            return -1;
        }

        if($req['pwd'] != $userInfo['password']){
            return false;
        }


        $newUserInfo = [
            '_id' => $userInfo['_id'],
            'username' => $userInfo['username'],
            'profile' => $userInfo['profile'],
            'iconurl' => $userInfo['iconurl'],
        ];

        return $newUserInfo;
    }
}
