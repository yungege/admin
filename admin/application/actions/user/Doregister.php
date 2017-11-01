<?php
class DoregisterAction extends BaseAction {

    protected function __declare(){
        $this->declareAuthUrl = false;
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_DoregisterModel';
        $this->declareRender = [ 
            'interface' => [
            ],
        ];
    }
}
