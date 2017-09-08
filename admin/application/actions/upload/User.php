<?php
class UserAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Upload_UserModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}