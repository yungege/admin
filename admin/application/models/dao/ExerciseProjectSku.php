<?php
class Dao_ExerciseProjectSkuModel extends Db_Mongodb {
    
    protected $table = 'exercise_project_sku';

    protected $fields = [
        'project_name'  => '',      // 名称
        'project_id'    => '',      // 所属项目
        'project_desc'  => '',      // 介绍
        'recommend'     => 0,       // 是否推荐
        'vfilesize'     => 0.00,    // 项目文件大小
        'time_cost'     => 0,       // 项目所需时间（s）
        'calorie_cost'  => 0.00,    // 项目所需卡路里
        'action_count'  => 0,       // 动作数
        'difficulty'    => 0,       // 难度 -1无难度，0低，1中，2高
        'difficulty_new'=> 0,       // 难度 -1无难度，0低，1中，2高
        'action_info'   => [],      // 项目动作组合 ["action_id","action_time","action_groupno","calorie","section"]
        'type'          => 0,       // 1室内 2户外
        'up_num'        => 0,       // 点赞数
        'sections'      => [],      // 节拍信息
    ];

    protected $actionModel;

    protected function __construct(){
        parent::__construct();
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
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

    public function getProjectInfo(string $pid, array $fields = [], array $options = []){
        $fields = $this->filterFields($fields);
        if(!empty($fields))
            $options['projection'] = $fields;

        if(empty($pid) || !preg_match("/\w+/", subject))
            return [];

        $where = [
            'project_id' => $pid,
        ];

        $info = $this->query($where, $options);

        if(empty($info)) return [];

        foreach ($info as &$row) {
            $actionIds = array_unique(array_column($row['action_info'], 'action_id'));
            if(empty($actionIds)) continue;

            $match = [
                '_id' => ['$in' => $actionIds],
            ];

            $opt = [
                'projection' => [
                    'name' => 1,
                    'createtime' => 1,
                    'typeno' => 1,
                ]
            ];

            $actions = $this->actionModel->query($match, $opt);
            if(empty($actions)) continue;

            $actions = array_column($actions, null, '_id');
            
            $restCount = 0;
            foreach ($row['action_info'] as &$aval) {
                if($actions[$aval['action_id']]['typeno'] == 4){
                    $restCount ++;
                }
                $aval['name'] = $actions[$aval['action_id']]['name'];
                $aval['ctime'] = $actions[$aval['action_id']]['createtime'];
                $aval['action_type'] = Dao_ExerciseactionModel::$type[$actions[$aval['action_id']]['typeno']];
            }
            $row['rest_count'] = $restCount;
        }
        return $info;
    }

    /**
     * 获取某一项目指定难度级别的项目信息
     * @Author    422909231@qq.com
     * @DateTime  2017-05-11
     * @version   [version]
     * @param     string           $pid
     * @param     int              $difficulty
     * @param     array            $fields
     * @return    array
     */
    public function getProjectSkuInfoByProjectIdAndDifficulty(string $pid, int $difficulty, array $fields = []){
        $where = [
            'project_id' => $pid,
            'difficulty' => ['$in' => [$difficulty,-1]],
        ];

        $options = [];
        $fields = $fields ? $this->filterFields($fields) : [];
        if(!empty($fields)){
            $options['projection'] = $fields;
        }

        return $this->queryOne($where, $options);
    }

    public function getProjectSkuInfoByProjectIds(array $ids, array $fields=[], array $options=[]){
        $where = [
            'project_id' => [
                '$in' => $ids,
            ],
        ];

        $fields = $fields ? $this->filterFields($fields) : [];
        if(!empty($fields)){
            $options['projection'] = $fields;
        }
        $options['limit'] = 0;

        return $this->query($where, $options);
    }
}