<?php
class SkuAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Project_SkuModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'project/addsku.tpl',
            ],
        ];
    }
}
