<?php
class Service_School_ListModel extends BasePageService {

    protected $districtId;
    protected $schoolList;
    protected $schoolModel;
    protected $resData = [];

    public function __construct() {

        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {

        $req = $req['post'];
        $this->districtId = $req['districtId'];
        $schoolWhere = [
            'district_id' => $this->districtId,
        ];

        $options['projection'] = [
            'name' => 1,'_id' => 1,
        ];

        $this->schoolList = $this->schoolModel->query($schoolWhere,$options);
        // $this->districtList = array_column($this->districtList,'name','_id');
        $this->resData['schoolList'] = $this->schoolList;
       
        return $this->resData;
    }

}