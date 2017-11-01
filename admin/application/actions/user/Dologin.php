<?php
class DologinAction extends BaseAction {

    protected function __declare(){
        $this->declareAuthUrl = false;
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_LoginModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}
