<?php
class Service_User_RegisterModel extends BasePageService {

	protected $userModel;

	protected $reqData;
	protected $resData;

    private static $admin = [
        13522213145,
        13161486949
    ];

    public function __construct() {
    	
		$this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare() {
    	// 关闭登录验证
        $this->declareLogin = false;
    }

    protected function __execute($req) {
       
        $req=$req['get'];
        return $this->resData = $req;
      
	}


}