<?php
class Service_Ugc_MarkModel extends BasePageService {

    protected $trainingId;
    protected $toId;
    protected $fromId;
    protected $content;
    protected $messageModel;
    protected $userModel;
    protected $trainData = [];
    protected $resData;
    protected $userInfo;
    protected $uMPush;

    public function __construct() {

       $this->messageModel = Dao_MessageModel::getInstance();  
       $this->userModel = Dao_UserModel::getInstance();
       $this->uMPush = new UmengPush();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

       $req = $req['post'];
       $this->trainingId = $req['trainId'];
       $this->toId = $req['toId'];
       $this->content = $req['description'];
       $this->fromId = $_SESSION['userInfo']['_id'];
       
       $sendData = [
          'type'  => 5,
          'title' => '有人对您的锻炼点评了',
          'from_id' => $this->fromId,
          'to_id' => $this->toId,
          'sendtime' => time(),
          'content' => $this->content,
          'ctime' => time(),
          'traingdone_id' => $this->trainingId,
       ];

       $result = $this->messageModel->insert($sendData);

       $userQuery = [
          '_id' => $this->toId,
       ];

       $userOption['projection'] = [
         'devicetoken' => 1,
       ];


       $this->userInfo = $this->userModel->queryOne($userQuery,$userOption);

       if($result === false){

          return $this->errNo = TRAINING_MASK_FAULT;
       }

       
      if($this->userInfo['clientsource'] == 'ios' && !empty($this->userInfo['devicetoken'])){
        $retIos = $this->uMPush->iosPushByListcast($sendData['title'],$sendData['content'],$this->deviceToken['ios']);
      }

      if($this->userInfo['clientsource'] == 'android' && !empty($this->userInfo['devicetoken']) ){
        $retAndroid = $this->uMPush->androidPushByListcast($sendData['title'],$sendData['content'],$this->deviceToken['android']);
      }

      return ;

    }

}