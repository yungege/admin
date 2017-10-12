<?php
class Service_User_RegisterModel extends BasePageService {

	protected $userModel;

	protected $reqData;
	protected $resData;

    private static $admin = [
        13522213145,
        13161486949,
        18513886256,
        17701306902,
        18600024371,
        18210085688,
        15101141025,
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