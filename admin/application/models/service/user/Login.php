<?php
class Service_User_LoginModel extends BasePageService {

	protected $userModel;
    protected $adminModel;

	protected $reqData;
	protected $resData;
    private static $admin = [];

    public function __construct() {
		$this->userModel = Dao_UserModel::getInstance();
        $this->adminModel = Dao_BackendAdminModel::getInstance();
    }

    protected function __declare() {
    	// 关闭登录验证
        $this->declareLogin = false;
    }

    protected function __execute($req) {
        $req = $req['post'];
        $adminOptions['projection'] = ['mobileno' => 1];
        $adminOptions['limit'] = 0;
        $adminList = $this->adminModel->query([],$adminOptions);
        self::$admin = array_column($adminList,'mobileno');

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
        $host = $_SERVER['SERVER_NAME'];
        if($host == 'localhost'){
            $host = $_SERVER['SERVER_ADDR'];
        }

        // 获取权限信息
        $rbac = new Rbac_Rbac();
        $rbac->getMyMeau();

        setcookie(session_name(), session_id(), time() + 30*86400, '/', $host);
        setcookie('ttxs', serialize($res), time() + 30*86400, '/', $host);
        return $res;
	}

    protected function doLogin($req){
        

        if(!preg_match("/^1\d{10}$/", $req['mob'])){
            return false;
        }

        // if(!preg_match("/^[a-zA-Z]\w{5,17}$/", $req['pwd'])){
        //     return false;
        // }

        if(!in_array($req['mob'], self::$admin)){
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
