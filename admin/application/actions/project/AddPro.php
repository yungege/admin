<?php
class AddproAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Project_AddProModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}
