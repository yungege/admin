<?php
class Service_Project_SkuModel extends BasePageService {

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
    public static $difficultyArr = [
        0 => '低',
        1 => '中',
        2 => '高',
    ];
    protected $pid;
    protected $projectInfo;

    public function __construct() {
        $this->projectModel = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel = Dao_ExerciseProjectSkuModel::getInstance();
        $this->actionModel = Dao_ExerciseactionModel::getInstance();
        $uri = $_SERVER['REQUEST_URI'];
        preg_match("/sku\/(\w+)\.html/", $uri, $params);
        $this->pid = $params[1];
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

        $this->resData['uptoken'] = getUploadToken();
        if(empty($this->pid))
            throw new Exception("PAGE NOT FOUNT", 404);

        $this->getProjectInfo();

        $this->getActionList();
        $this->getRestList();
        $this->resData['type'] = Dao_ExerciseactionModel::$type;

        return $this->resData;
    }

    protected function getProjectInfo(){
        $this->projectInfo = $this->projectModel->getInfoById($this->pid,[
            'name','coverimg','has_level'
        ]);

        $skuInfo = $this->projectSkuModel->getProjectSkuInfoByProjectIds((array)$this->pid,[
            'project_id','difficulty',
        ]);

        if($this->projectInfo['has_level'] == -1){
            if(!empty($skuInfo)){
                throw new Exception("PAGE NOT FOUNT", 404);
            }
        }
        else{
            if(count($skuInfo) == 3){
                throw new Exception("PAGE NOT FOUNT", 404);
            }
            else{
                $skuDiff = array_column($skuInfo, 'difficulty');
                $skuDiff = array_diff(array_keys(self::$difficultyArr), $skuDiff);
                $this->projectInfo['sku'] = $skuInfo;
                $this->projectInfo['difficultyVal'] = $skuDiff;
                $this->projectInfo['difficultyArr'] = self::$difficultyArr;
            }
        }

        $this->resData['project'] = $this->projectInfo;
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
            'typeno' => ['$in' => [4,6]],
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