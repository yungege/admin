<?php
/**
 * 消息表
 */

class Dao_MessageModel extends Db_Mongodb {
    
    protected $table = 'message';

    const MSG_ACTIVE = 1;   //活动
    const MSG_UP     = 2;   //点赞
    const MSG_TRAIN  = 3;   //锻炼提醒

    const MSG_UNREAD = 1;   //未读
    const MSG_READED = 2;   //已读
    const MSG_DELETE = -9;  //删除

    const MSG_PLT_PER = 1; // 个人
    const MSG_PLT_CLASS = 2; // 班级
    const MSG_PLT_SCHOOL = 3; // 学校
    const MSG_PLT_ALL = 4; // 所有用户

    protected $fields = [
        'platform'      => 1,       // 1个人 2班级 3学校 4所有用户
        'type'          => 0,       // 消息类型 1:学校通知，2:点赞，3:锻炼提醒 5:点评
        'title'         => '',      // 标题
        'from_id'       => '595604602173cc77db5a5248',      // 发送人
        'to_id'         => '',      // 接收人 学校id 班级id 学生id 全部0
        'share_id'      => '',      // 点赞类型时，存分享动态ID
        'sendtime'      => 0,       // 发送时间
        'url'           => '',      // 页面的URL
        'desc'          => '',      // 简介
        'content'       => '',      // 内容
        'cover_img_url' => '',      // 封面图片URL
        'status'        => 1,       // 状态 1未读，2已读, -9删除
        'ctime'         => 0,       // 创建时间
        'utime'         => 0,       // 修改时间
        'traingdone_id' => '',      // 锻炼的ID
    ];

    protected function __construct(){
        parent::__construct();
    }

    /**
     * 获得实例
     * @param string $confkey
     * @return mongodb
     */
    public static function getInstance() {

        if(!self::$instance instanceof self){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 获取消息列表
     * @Author    422909231@qq.com
     * @DateTime  2017-04-25
     * @version   [version]
     * @param     array            $where   [description]
     * @param     array            $options [description]
     * @return    [type]                    [description]
     */
    public function getMsgInfo(array $where, array $options = []){
        $msgList = [];

        $list = $this->query($where, $options);

        if(empty($list))
            return [];

        foreach ($list as $row) {
            $msgList[] = [
                'msgId'         => $row['_id'],
                'msgPusher'     => $row['from_id'],
                'msgPushTime'   => $row['sendtime'],
                'msgImgUrl'     => '',
                'msgUrl'        => $row['url'],
                'msgTitle'      => $row['title'],
                'msgDetail'     => $row['content'],
                // 'hasRead'       => $row['status'] == 2 ? true : false, // true:已读,false:未读
                'platform'      => $row['platform'],
            ];
        }

        if(empty($msgList))
            return [];

        $fromIds = array_column($msgList, 'msgPusher');
        $userModel = Dao_UserStudentModel::getInstance();
        $userInfo = $userModel->batchGetUserInfoByUserids($fromIds, ['username','iconurl']);
        $userInfo = array_column($userInfo, null, '_id');

        foreach ($msgList as &$row) {
            $row['msgImgUrl'] = $userInfo[$row['msgPusher']]['iconurl'];
            $row['msgPusher'] = $userInfo[$row['msgPusher']]['username'];
        }
        return $msgList;
    }

    public function readMsg(array $ids){
        if(empty($ids))
            return false;

        $where = [
            '_id' => ['$in' => $ids],
        ];

        $update = [
            'status' => 2,
            'utime' => time(),
        ];

        return $this->update($where, $update);
    }
}