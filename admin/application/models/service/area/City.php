<?php
class Service_Area_CityModel extends BasePageService {

    protected $provinceId;
    protected $cityList;
    protected $cityModel;
    protected $resData = [];

    public function __construct() {

        $this->cityModel = Dao_CityModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

        $req = $req['post'];
        $this->provinceId = $req['provinceId'];

        $cityWhere = [
            'province_id' => $this->provinceId,
        ];

        $options['projection'] = [
            'name' => 1,
        ];

        $this->cityList = $this->cityModel->query($cityWhere,$options);
        //$this->cityList = array_column($this->cityList,'name','_id');
        
        $this->resData['cityList'] = $this->cityList;
     
        return $this->resData;
    }

}