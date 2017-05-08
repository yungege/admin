<?php
class Service_User_LoginModel extends BasePageService {

	protected $userModel;

	protected $reqData;
	protected $resData;

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
            $this->errMessage = '账号或密码错误';
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

        if(!preg_match("/^[a-zA-Z]\w{5,17}$/", $req['pwd'])){
            return false;
        }

        $req['pwd'] = md5(substr($req['mob'], 1,8) . $req['pwd']);

        $userInfo = $this->userModel->query([
            'mobileno' => (int)$req['mob'],
            'password' => (string)$req['pwd']
            ])[0];

        if(empty($userInfo)){
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