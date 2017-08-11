<?php
class DoregisterAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_DoregisterModel';
        $this->declareRender = [ 
            'interface' => [
            ],
        ];
    }
}
