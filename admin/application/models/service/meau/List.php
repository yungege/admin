<?php
class Service_Meau_ListModel extends BasePageService {

    protected $meauModel;
    protected $userModel;

    protected $reqData;
    protected $resData = [
        'pageTag' => '7-1',
    ];

    public function __construct() {
        
    }

    protected function __declare() {
        
    }

    protected function __execute($req) {
        
        return $this->resData;
    }

}