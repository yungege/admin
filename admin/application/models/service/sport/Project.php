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
        'pageCount' => 0,
        'list' => [],
        'pn' => 1,
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

        $this->resData['pn'] = $req['pn'];
        $where = [
            'status' => ['$ne' => -9],
        ];
        $fields = [];
        $offset = ($req['pn'] - 1) * self::PAGESIZE;
        $sort = ['createtime' => -1];
        $options = [
            'limit' => self::PAGESIZE,
            'offset' => $offset,
            'sort' => $sort,
        ];
        $count = $this->projectModel->count($where);
        $this->resData['pageCount'] = ceil($count / self::PAGESIZE);
        if($count == 0)
            return $this->resData;
        
        $list = $this->projectModel->getListByPage($where, $fields, $options);

        if(empty($list))
            return $this->resData;
        foreach ($list as &$row) {
            $row['gender'] = Tools::getSexInfo($row['gender']);
            foreach ($row['grade_apply'] as &$val) {
                $val = Tools::getGradeInfo($val);
            }

            $img = (string)$row['coverimg'];
            if(!empty($img))
                $row['coverimg'] .= '?imageView2/2/w/100/h/60/q/100';
        }

        $this->resData['list'] = $list;
        return $this->resData;
    }

}