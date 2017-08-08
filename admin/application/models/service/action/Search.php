<?php
class Service_Action_SearchModel extends BasePageService {


    protected $actionModel;

    protected $resData = [
        'pageTag' => '3-2',
    ];

    protected $typeList = [
        1 => [
            'name' => '计时锻炼',
            'list' => [],
        ],
        2 => [
            'name' => '计组数锻炼',
            'list' => [],
        ],
        3 => [
            'name' => '节拍锻炼',
            'list' => [],
        ],
    ];

    public function __construct() {
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['post'];
        $where = [
            'status' => [
                '$ne' => -9,
            ],
            'typeno' => [
                '$ne' => 4,
            ],
        ];
        
        if(!empty(trim($req['name']))){
            $where['name'] = ['$regex' => addslashes($req['name']), '$options' => 'i'];
        }

        if(isset(Dao_ExerciseactionModel::$type[$req['typeno']])){
            $where['typeno'] = (int)$req['typeno'];
        }

        if(isset(Dao_ExerciseactionModel::$physicalquality[$req['physicalquality']])){
            $where['physicalquality'] = (int)$req['physicalquality'];
        }

        if(isset(Dao_ExerciseactionModel::$sex[$req['sex']])){
            $where['sex'] = (int)$req['sex'];
        }

        $options = [
            'projection' => [
                '_id' => 1,
                'name' => 1,
                'typeno' => 1,
            ],
            'limit' => 0,
        ];

        $list = $this->actionModel->query($where, $options);
        if(!empty($list)){
            foreach ($list as $ac) {
                $this->typeList[$ac['typeno']]['list'][] = $ac;
            }
        }

        foreach ($this->typeList as $tk => $tv) {
            if(empty($tv['list'])){
                unset($this->typeList[$tk]);
            }
        }

        $this->resData['list'] = $this->typeList;

        return $this->resData;
    }

    
}