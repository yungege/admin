<?php
class Service_Push_PAllModel extends BasePageService {

	protected $messageModel;
	protected $message = [];
	protected $theme;
	protected $content;

	public function __construct(){
		
		$this->messageModel = Dao_MessageModel::getInstance();
	}

	protected function __declare(){

	}

	protected function __execute($req){

		$req = $req['post'];
		$this->theme = trim($req['theme']);
		$this->content = trim($req['description']);

		if(empty($this->theme) || empty($this->content)){
			$this->errNo = REQUEST_PARAMS_ERROR;
			return false;
		}

		$this->message['platform'] = 4;
		$this->message['type'] = 3;
		$this->message['title'] = $this->theme;
		$this->message['to_id'] = 0;
		$this->message['sendtime'] = time();
		$this->message['content'] = $this->content;
		$this->message['status'] = 1;
		$this->message['ctime'] = time();
		$this->message['utime'] = time();
		$result = $this->messageModel->add($this->message);
		if($result === false){
			$this->errNo = PUSH_FAULT;
			return false;
		}

		$uMPush = new UmengPush();
		$retIos = $uMPush->iosPushByBroadcast($this->theme,$this->content);
		$retAndroid = $uMPush->androidPushByBroadcast($this->theme,$this->content);

		return ;

	}

}