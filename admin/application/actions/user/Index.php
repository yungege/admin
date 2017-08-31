<?php
class IndexAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_IndexModel';
        $this->declareRender = [ 
            'interface' => [
            ],
        ];
    }
}