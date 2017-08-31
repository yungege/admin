<?php
class Service_Stat_ContristModel extends BasePageService {

    protected $province;
    protected $city;
    protected $district;
    protected $school;
    protected $class;
    protected $userModel;

    protected $trainModel;

    protected $resData;
    public $map = [];

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
        $this->getWhere($req);
    }

    protected function getWhere($req){

        // [province] => 599bda9c2173cc77db5a526c
        // [city] => 599bdad02173cc77db5a526d
        // [district] => 599bdc112173cc77db5a526e
        // [school] => 587f31732a46800e0a8b4567
        // [grade] => 12
        // [class] => 587f31732a46800e0a8b4576
        // [user] => 587f31732a46800e0a8b45be
        // [start] => 2017-08-31
        // [end] => 2017-08-31
        // [source] => 1

        $req = $req['post'];

        if($req['province']){
            
        }
    }

}