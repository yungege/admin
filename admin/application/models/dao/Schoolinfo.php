<?php
class Dao_SchoolinfoModel extends Db_Mongodb {
    
    protected $table = 'schoolinfo';

    protected $fields = [
        'name' => '',               // 学校名称
        'createtime' => 0,          // 录入数据库时间
        'province_id' => '',        
        'province' => '',           // 所属省份
        'city_id' => '',        
        'city' => '',               // 所属城市
        'district_id' => '',
        'district' => '',           // 所属区域
        'classinfo' => [],          // 学校班级信息:{classid(班级id号),classname(班级名称)}
        'adress' => '',             // 学校地址
        'introduction' => '',       // 学校基本介绍
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

    public function getListByPage(array $where, array $fields = [], array $options = []){
       
        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $newOptions['projection'] = $fields;
        }

        if(!empty($options['limit'])){
            $newOptions['limit'] = (int)$options['limit'];
        }

        if(!empty($options['offset'])){
            $newOptions['skip'] = (int)$options['offset'];
        } 
            
        if(!empty($options['sort'])){
            $newOptions['sort'] = $options['sort'];
        }
        
        return $this->query($where, $newOptions);
    }

    public function getSchoolById(string $id, array $fields = [], array $options = []){

        $where = [
            '_id' => $id,
        ];

        $fields = $this->filterFields($fields);
        if(!empty($fields)){
            $newOptions['projection'] = $fields;
        }

        return $this->queryOne($where, $newOptions);
    }

}