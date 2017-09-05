<?php
class Service_Stat_StatisticsModel extends BasePageService {

    protected $province;
    protected $city;
    protected $district;
    protected $school;
    protected $class;
    protected $userModel;

    protected $trainModel;

    protected $resData = [
        'pageTag' => '4-3',
        'data'  => [],
    ];

    public function __construct() {
        // $this->province     = Dao_ProvinceModel::getInstance();
        $this->city         = Dao_CityModel::getInstance();
        $this->district     = Dao_DistrictModel::getInstance();
        $this->school       = Dao_SchoolinfoModel::getInstance();
        $this->class        = Dao_ClassinfoModel::getInstance();
        $this->userModel    = Dao_UserModel::getInstance();
        $this->trainModel   = Dao_TrainingdoneModel::getInstance();
    }

    protected function __declare() {

    }

    protected function __execute($req) {
        $this->resData['data']['province'] = CommonFuc::getProvince();
        $this->resData['data']['initStart'] = date('Y-m-d', strtotime('-6 day'));
        $this->resData['data']['initEnd'] = date('Y-m-d');

        return $this->resData;
    }

    

}