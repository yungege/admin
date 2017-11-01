<?php
class Service_Ugc_MarkModel extends BasePageService {

    protected $trainingId;
    protected $toId;
    protected $fromId;
    protected $title;
    protected $content;
    protected $messageModel;
    protected $userModel;
    protected $trainData = [];
    protected $resData;
    protected $userInfo;
    protected $uMPush;
    protected $sentUser;

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
       $this->content = str_replace("\r\n","",$this->content);

       $userQuery = [
          '_id' => $this->fromId,
       ];

       $userOption['projection'] = [
         'devicetoken' => 1,
         'username' =>1,
         'clientsource' =>1,
       ];

       $this->sentUser = $this->userModel->queryOne($userQuery,$userOption);

       $this->title = $this->userInfo['username'] . "老师点评了你的锻炼";

       if($result === false){

          return $this->errNo = TRAINING_MASK_FAULT;
       }
       
       $sendData = [
          'type'  => 5,
          'title' => $this->title,
          'from_id' => $this->fromId,
          'to_id' => $this->toId,
          'sendtime' => time(),
          'content' => $this->content,
          'ctime' => time(),
          'traingdone_id' => $this->trainingId,
       ];

       if(empty($sendData['from_id'])){
          unset($sendData['from_id']);
       }

       $result = $this->messageModel->insert($sendData);

       $userQuery = [
          '_id' => $this->toId,
       ];

       $userOption['projection'] = [
         'devicetoken' => 1,
         'username' =>1,
         'clientsource' =>1,
       ];

       $this->userInfo = $this->userModel->queryOne($userQuery,$userOption);

      if($this->userInfo['clientsource'] == 'ios' && !empty($this->userInfo['devicetoken'])){

        $retIos = $this->uMPush->iosPushByListcast($sendData['title'],$sendData['content'],$this->userInfo['devicetoken']);
      }

      if($this->userInfo['clientsource'] == 'android' && !empty($this->userInfo['devicetoken']) ){

        $retAndroid = $this->uMPush->androidPushByListcast($sendData['title'],$sendData['content'],$this->userInfo['devicetoken']);
      }

      return ;

    }

}