<?php
class Service_Sport_ProModel extends BasePageService {

    // protected $programeModel;
    // protected $userModel;
    protected $projectModel;
    protected $projectSkuModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '3-2',
        'pro' => [],
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
        $query = $_SERVER['REQUEST_URI'];
        preg_match_all("/p\/(.*?)\.html/", $query, $arr);
        if(empty($arr[1][0]))
            return $this->resData;
        $pid = $arr[1][0];

        $pinfo = $this->projectModel->getInfoById($pid, ['name','desc','has_level','_id']);
        $this->resData['pinfo'] = $pinfo;
        $proSku = $this->projectSkuModel->getProjectInfo($pid);
        $proSku = array_column($proSku, null, 'difficulty');
        $this->resData['pro'] = $proSku;

        return $this->resData;
    }

}