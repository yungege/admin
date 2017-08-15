<?php
class Service_Sport_ProjectModel extends BasePageService {

    const PAGESIZE = 15;

    // protected $programeModel;
    // protected $userModel;
    protected $projectModel;
    protected $projectSkuModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '3-2',
        'list' => [],
        'page' => '',
    ];

    public function __construct() {
        // $this->userModel        = Dao_UserModel::getInstance();
        // $this->programeModel    = Dao_ExerciseprogramModel::getInstance();
        $this->projectModel     = Dao_ExerciseProjectModel::getInstance();
        $this->projectSkuModel  = Dao_ExerciseProjectSkuModel::getInstance();
        
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        $req = $req['get'];
        if(!isset($req['pn']) || !is_numeric($req['pn']))
            $req['pn'] = 1;

        $where = [
            'status' => ['$ne' => -9],
        ];
        $fields = [];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $sort = ['ctime' => -1];
        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => $sort,
        ];
        $count = $this->projectModel->count($where);
        $page = new Page($count, self::PAGESIZE);
        $this->resData['page'] = $page->show();

        if($count == 0)
            return $this->resData;
        
        $list = $this->projectModel->getListByPage($where, $fields, $options);

        if(empty($list))
            return $this->resData;

        $pids = array_column($list, '_id');
        $skus = $this->projectSkuModel->getProjectSkuInfoByProjectIds($pids, ['_id','project_id','difficulty']);
        // $skus = array_column($skus, null, 'project_id');

        foreach ($list as &$row) {
            $row['gender'] = Tools::getSexInfo($row['gender']);
            foreach ($row['grade_apply'] as &$val) {
                $val = Tools::getGradeInfo($val);
            }

            $row['skus'] = [];
            if(!empty($skus)){
                foreach ($skus as $sk => $sv) {
                    if($sv['project_id'] == $row['_id']){
                        $row['skus'][] = $sv;
                        unset($skus[$sk]);
                    }
                }
            }
            $row['skus'] = Tools::multiArraySort($row['skus'], 'difficulty', SORT_ASC);

            if($row['has_level'] == 1){
                if(count($row['skus']) < 3){
                    $row['add'] = 1;
                }
            }
            else{
                if(empty($row['skus'])){
                    $row['add'] = 1;
                }
            }

            $img = (string)$row['coverimg'];
            if(!empty($img))
                $row['coverimg'] .= '?imageView2/2/w/100/h/60/q/100';
        }

        $this->resData['list'] = $list;
        return $this->resData;
    }

}