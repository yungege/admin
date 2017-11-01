<?php
class RegisterAction extends BaseAction {

    protected function __declare(){
        $this->declareAuthUrl = false;
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_RegisterModel';
        $this->declareRender = [ 
            'tpl' => [
                'tplName' => 'user/register.tpl',
            ],
        ];
    }
}
