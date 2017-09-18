<?php
class Service_Push_AppNoticeModel extends BasePageService {

    protected $newsModel;

    public function __construct(){
        $this->newsModel = Dao_NewsModel::getInstance();
    }

    protected function __declare(){
        
    }

    protected function __execute($req){
        $req = $req['post'];

        if(empty(trim($req['title'])) || mb_strlen($req['title']) > 36){
            throw new Exception("标题长度必须小于36", -1);
        }

        if(empty(trim($req['desc'])) || mb_strlen($req['desc']) > 128){
            throw new Exception("摘要长度必须小于128", -1);
        }

        if(!preg_match("/.*?(jpg|jpeg|gif|png)/", $req['cover_img'])){
            throw new Exception("请上传封面图", -1);
        }

        if(empty(trim($req['content']))){
            throw new Exception("请输入消息内容", -1);
        }

        $insertData = [
            'title'         => trim($req['title']),      
            'desc'          => trim($req['desc']),      
            'content'       => $req['content'],      
            'cover_img'     => $req['cover_img'],      
            'ctime'         => time(),
        ];

        $result = $this->newsModel->insert($insertData);
        if($result === false){
            throw new Exception("", PUSH_FAULT);
        }

        $uMPush = new UmengPush();
        // $res = $uMPush->iosPushByListcast($req['title'], $req['desc'], '0bdb40085047d739a39cb7d5b1c6b94881a980d9e2e301fb85f756daf099cca1');
        $uMPush->iosPushByBroadcast($req['title'], $req['desc']);
        $uMPush->androidPushByBroadcast($req['title'], $req['desc']);
        return;
    }

}