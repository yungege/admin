<?php
class Dao_UserModel extends Db_Mongodb{

    const SSO_SOURCE_WEIXIN_APP = 1; //微信客户端app授权登录
    const SSO_SOURCE_QQ_APP = 2; //qq客户端app授权登录
    const SSO_SOURCE_WEIBO_APP = 3; //微博客户端app授权登录
    const SSO_SOURCE_WEIXIN_H5 = 4; //微信H5授权登录
    const SSO_SOURCE_WEIBO_H5 = 5; //微博H5授权登录
    const SSO_SOURCE_QQ_H5 = 6; //qq平台H5授权登录

    const USER_TYPE_UGC = 0; //UGC
    const USER_TYPE_PGC = 1; //PGC
    const USER_TYPE_EDITOR_CHIEF = 2; //主编
    const USER_TYPE_EDITOR_RESPONSIBILITY = 3; //责任编辑
    const USER_TYPE_EDITOR_GENERAL = 4; //编辑
    const USER_TYPE_INTERN = 5; //实习生

    public static $relation = [
        1 => '父亲',
        2 => '母亲',
        3 => '外公',
        4 => '外婆',
        5 => '爷爷',
        6 => '奶奶',
        7 => '其他',
    ];

    public static $grade = [
        // 小学
        11 => '小学1年级',
        12 => '小学2年级',
        13 => '小学3年级',
        14 => '小学4年级',
        15 => '小学5年级',
        16 => '小学6年级',
        // 初中
        21 => '初中1年级',
        22 => '初中2年级',
        23 => '初中3年级',
        // 高中
        31 => '高中1年级',
        32 => '高中2年级',
        33 => '高中3年级',
    ];

    protected $table = 'user';

    protected $fields = [
        'username' => '',             //用户名称
        'nickname' => '',             //用户昵称
        'type' => 0,                 //用户类型:普通用户?管理员?其他
        'nation' => 0,               //民族
        'password' => '',             //密码
        'birthday' => 0,             //出生日期
        'profile' => '',              //个性签名
        'sex' => 0,                  //性别
        'address' => '',              //联系地址
        'salt' => '',                 //密码加盐
        'iconurl' => '',              //用户头像
        // 'dynamic' => '',              //我的动态
        'createtime' => 0,           //创建时间
        // 'idmodifytime' => 0,         //ID修改时间
        // 'idmodifycount' => 0,        //ID修改次数
        // 'isdeleted' => 0,            //是否被删除
        'deviceid' => '',             //设备号
        'devicetoken' => '',          //设备唯一标识（友盟）
        'versions' => '',             //客户端版本号
        'clientsource' => '',         //客户端来源
        'deviceinfo' => '',           //设备信息
        'ua' => '',                   //认证信息
        'iscompleted' => 0,          //个人信息是否完整
        // 'mocked' => 0,               //是否内部使用人员测试用户
        'ssoid' => '',                //第三方平台认证信息
        'source' => '',               //第三方登录源 wx qq phone weibo
        // 'haslabel' => '',             //用户是否为自己设置标签
        // 'isauthor' => 0,             //用户是否为专栏作者
        // 'isanonymous' => 0,          //是否匿名用户
        // 'isshieldcontent' => 0,      //是否屏蔽此用户发布的文章
        // 'isfrozen' => 0,             //是否冻结用户
        // 'accountstate' => 1,         //账号状态:正常使用?已经冻结?禁言?其他
        'mobileno' => [],             //手机号码 可关联多个号码
        // 'favourtags' => '',           //用户喜号标签信息
        // 'read' => [],                 //用户阅读信息
        // 'topic' => [],                //用户参与话题信息
        // 'articleinfo' => [],          //我关注的文章
        // 'myarticlecount' => 0,       //我发布的文章数
        // 'mycommentbyaticle' => [],    //我发布的评论(根据文章id检索)
        // 'mycommentbytime' => [],      //我发布的评论(按时间倒序排列)
        // 'mycommenteebytime' => [],    //@我的评论(按时间倒排)
        // 'mycommenteeunread' => [],    //表示@我的未读的评论
        // 'myup' => [],                 //我发出的赞
        // 'atmyupunread' => 0,         //@我的未读的赞数
        // 'favorarticle' => [],         //收藏的文章
        // 'authority' => [],            //用户权限
        // 'mycommenteebytime',    //评论信息
        // 'mycommenteeunread',    //未读评论
        // 'myupunread' => [],           //未读赞
        // 'sessionid' => '',
        'grade' => 0,                // 年级信息:1-12(小学一年级到高中三年级)
        'parentrelationship' => 0,   // 家长关系:1-父亲,2-母亲,3-外公,4-外婆,5-爷爷,6-奶奶,7-其他
        'parentname' => '',           // 家长姓名
        'studentno' => '',            // 学生学号
        'schoolinfo' => [],           // 学校信息:{schoolid(学校id号),schoolname(学校名称),admissiontime(入学时间)}
        'classinfo' => [],            // 班级信息:{classid(班级id号),classname(班级名称),admissiontime(入班时间)}
        "classinfo_history" => [],      //历史班级信息
        'exerciseinfo' => [],         // 锻炼项目信息:[{type(锻炼类型),exerciseid(锻炼项目id),createtime(锻炼项目创建时间),totalexertime(已经锻炼总次数),exertime(周锻炼时间:["1","2","5"],分别表示周一\周三\周五),part(锻炼的节次信息),weekdoneno(周锻炼次数)}......]
        // 'exercisealam' => [],         // 家庭作业定时提醒时间:[{type(锻炼类型),exerciseprogramid(锻炼项目id号),alarmtime(提醒时间)}......]
        // 'teacherno' => '',            // 教师工号
        'manageclassinfo' => [],      // 教师管理班级id信息(默认是全校班级):[{classid(班级id号),classname(班级名称)}......]
        // 'receivemessage' => [],       // 接收到的通知消息:[{sendtime(发送时间),type(类型,0-教师催促信息,1-平台通知...),delete(是否被删除,0-没有被删除,1-已经被删除),senderid(发送者id),content(内容),sendericonurl(发布者的头像),sendername(发布者的名字)}......]
        'lastsubmittime' => 0,       // 最后一次提交作业时间
        'parentinfo' => [],
        // time,logintype,phone => wx,qq,phone
        'lastlogin' => [
            'time' => 0,
            'logintype' => '',
            'phone' => 0,
        ],
        'upgrade_year' => 0, // 升级年级信息(升级年-月) 脚本专用
        'create_time' => 0 , //创建时间
        'my_teacher' => '',
        'teacher_type' => 0, //老师类型 1-系主任 2-班主任 3-体育老师 4-体验老师
        'status' => 1,
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

    public function getUserInfoBySsoid(string $ssoid){
        $where = [
            'ssoid' => $ssoid,
        ];

        return $this->query($where);
    }

    public function getUserInfoByMobile(int $mobile){
        $where = [
            'mobileno' => $mobile,
            'type' => 1,
        ];

        return $this->query($where);
    }

    public function getTeacherInfoByMobile(int $mobile){
        $where = [
            'mobileno' => $mobile,
            'type' => 2
        ];

        return $this->query($where);
    }

    public function getUserInfoByUserId(string $userId, $fields = []){
        $where = [
            '_id' => $userId,
        ];

        $fields = $this->filterFields($fields);

        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        return $this->queryOne($where, $options);
    }

    public function batchGetUserInfoByUserids(array $userIds, $fields = [], $offset = 0, $limit = 50){
        if(empty($userIds))
            return [];

        $fields = $this->filterFields($fields);

        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        $options['limit'] = (int)$limit;
        $options['skip'] = (int)$offset;

        $where = [
            '_id' => ['$in' => $userIds]
        ];

        return $this->query($where, $options);
    }

    public function updateUserInfoByUserid(string $userId, array $set){
        $where = [
            '_id' => $userId,
        ];

        return $this->update($where, $set);
    }

    public function getUserListByClassId(string $classId, array $fields){
        $where = [
            'classinfo.classid' => $classId,
        ];

        $fields = $this->filterFields($fields);

        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        $options['limit'] = 0;
        
        return $this->query($where, $options);
    }

    public function getUserList(array $where,array $fields){
        
        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $options['projection'] = $fields;
        }
        return $this->query($where, $options);
    }

    public function getUserInfoByClassId(string $classId, array $fields = [], array $options = ['limit' => 0]){
        $where = [
            'classinfo.classid' => $classId,
            'type' => 1,
            'status' => 1,
        ];

        $fields = $this->filterFields($fields);

        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        return $this->query($where, $options);
    }

}
