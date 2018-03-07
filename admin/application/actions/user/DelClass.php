<?php
class DelClassAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_DelClassModel';
        $this->declareRender = [ 
            'interface' => [
            ],
        ];
    }
}