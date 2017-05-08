<?php
class DologinAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_LoginModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}
