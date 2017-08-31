<?php
class Service_School_IndexModel extends BasePageService {

    protected $schoolModel;

    protected $resData = [];

    public function __construct(){
        $this->schoolModel = Dao_SchoolinfoModel::getInstance();
    }

    protected function __declare(){

    }

    protected function __execute($req){
        $req = $req['get'];
        $where = [];

        if(isset($req['districtId']) && preg_match("/\w+/", $req['districtId'])){
            $where['district_id'] = addslashes($req['districtId']);
        }

        $options = [
            'limit' => 0,
            'projection' => [
                'name' => 1,
            ],
        ];

        $this->resData['schoolList'] = $this->schoolModel->query($where, $options);
        return $this->resData;
    }

}