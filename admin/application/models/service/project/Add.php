<?php
class Service_Project_AddModel extends BasePageService {

    protected $projectModel;
    protected $projectSkuModel;
    protected $actionModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '3-2',
    ];
    protected $typeList = [
        1 => [],
        2 => [],
        3 => [],
    ];


    public function __construct() {

        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $this->getActionList();
        $this->getRestList();
        $this->resData['type'] = Dao_ExerciseactionModel::$type;

        return $this->resData;
    }

    protected function getActionList(){
        $where = [
            'typeno' => [
                '$ne' => 4
            ],
            'status' => [
                '$ne' => -9
            ],
        ];

        $options = [
            'projection' => [
                '_id' => 1,
                'name' => 1,
                'typeno' => 1,
            ],
            'sort' => [
                'createtime' => -1
            ],
            'limit' => 0,
        ];
        $actionList = $this->actionModel->query($where, $options);
        if(!empty($actionList)){
            foreach ($actionList as $ac) {
                $this->typeList[$ac['typeno']][] = $ac;
            }
        }
        $this->resData['actionList'] = $this->typeList;
    }

    protected function getRestList(){
        $where = [
            'typeno' => 4,
            'status' => [
                '$ne' => -9
            ],
        ];

        $options = [
            'projection' => [
                '_id' => 1,
                'name' => 1,
                'typeno' => 1,
                'singletime' =>1,
            ],
            'sort' => [
                'createtime' => -1
            ],
            'limit' => 0,
        ];
        $actionList = $this->actionModel->query($where, $options);
        $this->resData['restList'] = $actionList;
    }
}