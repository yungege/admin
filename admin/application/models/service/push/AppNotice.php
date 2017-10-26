<?php
class Service_Push_AppNoticeModel extends BasePageService {

    protected $newsModel;
    protected $msgModel;
    protected $userModel;

    protected $type = [
        1, // 学校通知
        2, // 平台消息
    ];

    public function __construct(){
        $this->newsModel = Dao_NewsModel::getInstance();
        $this->msgModel = Dao_MessageModel::getInstance();
        $this->userModel = Dao_UserModel::getInstance();
    }

    protected function __declare(){
        
    }

    protected function __execute($req){
        $req = $req['post'];

        if(empty($req['type']) || !in_array($req['type'], $this->type)){
            throw new Exception("请选择推送类型", -1);
        }

        if($req['type'] == 1 && empty($req['schools'])){
            throw new Exception("请选择学校", -1);
        }
        $req['schools'] = array_unique(array_filter($req['schools']));

        if(empty(trim($req['title'])) || mb_strlen($req['title']) > 36){
            throw new Exception("标题长度必须小于36", -1);
        }

        if(empty(trim($req['desc'])) || mb_strlen($req['desc']) > 128){
            throw new Exception("摘要长度必须小于128", -1);
        }

        if($req['type'] == 2){
            if(!preg_match("/.*?(jpg|jpeg|gif|png)/", $req['cover_img'])){
                throw new Exception("请上传封面图", -1);
            }
        }
        

        if(empty(trim($req['content']))){
            throw new Exception("请输入消息内容", -1);
        }

        if($req['type'] == 2){
            $insertData = [
                'title'         => trim($req['title']),      
                'desc'          => trim($req['desc']),      
                'content'       => htmlspecialchars($req['content']),      
                'cover_img'     => (string)$req['cover_img'],      
                'ctime'         => time(),
            ];

            $result = $this->newsModel->insert($insertData);
        }
        else{
            $now = time();
            foreach ($req['schools'] as $sid) {
                $insertData[] = [
                    'type'          => 1,
                    'platform'      => 3, 
                    'title'         => trim($req['title']),      
                    'desc'          => trim($req['desc']),      
                    'content'       => htmlspecialchars($req['content']),
                    'to_id'         => $sid,           
                    'sendtime'      => $now,
                    'ctime'         => $now,       // 创建时间
                ];
            }
            
            $result = $this->msgModel->batchInsert($insertData);
        }
        
        if($result === false){
            throw new Exception("", PUSH_FAULT);
        }

        $uMPush = new UmengPush();
        if($req['type'] == 2){
            // 平台
            $uMPush->iosPushByBroadcast($req['title'], $req['desc']);
            $uMPush->androidPushByBroadcast($req['title'], $req['desc']);
        }
        else if($req['type'] == 1){
            // 学校
            $whereUser = [
                'schoolinfo.schoolid' => ['$in' => $req['schools']],
                'devicetoken' => [ '$nin' => [null , ""]],
            ];

            $options = [
                'projection' => [
                    'devicetoken' => 1,
                    'clientsource' => 1,
                    'nickname' => 1,
                ],
                'limit' => 20,
                'skip' => 0,
            ];

            $pagesize = 20;
            $index = 1;
            while (1) {
                $appList = [
                    'ios' => [],
                    'android' => [],
                ];
                $options['skip'] = ($index - 1) * $pagesize;
                $userList = $this->userModel->query($whereUser, $options);
                if(empty($userList)) break;

                foreach ($userList as $row) {
                    if($row['clientsource'] == 'ios' && !empty($row['devicetoken'])){
                        $appList['ios'][] = $row['devicetoken'];
                    }
                    else if($row['clientsource'] == 'android' && !empty($row['devicetoken'])){
                        $appList['android'][] = $row['devicetoken'];
                    }
                }

                if(!empty($appList['ios'])){
                    $iosDeviceToken = implode(',', $appList['ios']);
                    $res = $uMPush->iosPushByListcast(
                        $req['title'], 
                        $req['desc'], 
                        $iosDeviceToken
                    );
                }

                if(!empty($appList['android'])){
                    $androidDeviceToken = implode(',', $deviceToken);
                    $uMPush->iosPushByListcast(
                        $req['title'], 
                        $req['desc'],
                        $androidDeviceToken
                    );
                }

                $index += 1;
            } 
        }
        
        return;
    }

}