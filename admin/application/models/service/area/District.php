<?php
class Service_Area_DistrictModel extends BasePageService {

    protected $cityId;
    protected $districtList;
    protected $districtModel;
    protected $resData = [];

    public function __construct() {

        $this->districtModel = Dao_DistrictModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

        $req = $req['post'];
        $this->cityId = $req['cityId'];
        $cityWhere = [
            'city_id' => $this->cityId,
        ];

        $options['projection'] = [
            'name' => 1,
        ];

        $this->districtList = $this->districtModel->query($cityWhere,$options);
        // $this->districtList = array_column($this->districtList,'name','_id');
        $this->resData['districtList'] = $this->districtList;
     
        return $this->resData;
    }

}