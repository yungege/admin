<?php
/**
 * 咨询新闻表
 */

class Dao_NewsModel extends Db_Mongodb {
    
    protected $table = 'news';

    const MSG_PLT_PER       = 1; // 个人
    const MSG_PLT_CLASS     = 2; // 班级
    const MSG_PLT_SCHOOL    = 3; // 学校
    const MSG_PLT_ALL       = 4; // 所有用户

    protected $fields = [
        'platform'      => 4,       // 1个人 2班级 3学校 4所有用户
        'from_id'       => '595604602173cc77db5a5248',      // 发送人
        'to_id'         => '',      // 接收人 学校id 班级id 学生id 全部0
        'title'         => '',      // 标题
        'desc'          => '',      // 简介
        'content'       => '',      // 内容
        'cover_img'     => '',      // 封面图片URL
        'status'        => 1,       // 状态 1正常，-9删除
        'ctime'         => 0,       // 创建时间
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

    public function getNewsInfo(array $where, array $options = []){
        $list = $this->query($where, $options);
        if(empty($list)) return [];

        $fromIds = array_unique(array_column($list, 'from_id'));
        $userModel = Dao_UserStudentModel::getInstance();
        $userInfo = $userModel->batchGetUserInfoByUserids($fromIds, ['nickname','username','iconurl']);
        $userInfo = array_column($userInfo, null, '_id');

        $resList = [];

        $host = CommonFuc::getHostInfo();

        foreach ($list as &$row) {
            $resList[] = [
                'msgId'         => $row['_id'],
                'msgPusherAvatar' => $userInfo[$row['from_id']]['iconurl'],
                'msgPusherName' => $userInfo[$row['from_id']]['nickname'] ? : $userInfo[$row['from_id']]['username'],
                'msgPushTime'   => $row['ctime'],
                'msgUrl'        => "{$host}/news/{$row['_id']}.html",
                'msgTitle'      => $row['title'],
                'msgDesc'       => $row['desc'],
                'msgCoverPic'   => $row['cover_img'],
            ];
        }
        return $resList;
    }

}