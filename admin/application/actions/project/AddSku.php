<?php
class AddskuAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Project_AddSkuModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}
