<?php
class Service_Ugc_ShareModel extends BasePageService {

    protected $trainingId;
    protected $userId;
    protected $shareModel;
    protected $shareInfo = [];
    protected $userModel;
    protected $userInfo = [];
    protected $resData = []; 

    public function __construct() {

        $this->shareModel = Dao_ShareModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
        
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

        $req = $req['get'];
        $this->userId = $req['userId'];
        $this->trainingId = $req['trainingId'];
        
        $shareWhere = [
            'user_id' => $this->userId,
            'traindone_id' => $this->trainingId,
        ];
        $shareFields = ['user_id','share_type','training_name','up_num','ctime'];

        $this->shareInfo = $this->shareModel->getShareList($shareWhere,$shareFields)[0];
        $this->shareInfo['ctime'] = date('Y-m-d H:i:s',$this->shareInfo['ctime']);

        $userWhere = [
            '_id' => $this->userId,
        ];
        $userFields = [
            'username','classinfo','schoolinfo','grade'
        ];

        $this->userInfo = $this->userModel->getUserList($userWhere,$userFields)[0];
        $this->resData['list'][] = array_merge($this->userInfo,$this->shareInfo);

        return $this->resData;
    }

}