<?php
class AddAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Version_AddModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'version/add.tpl'
            ]
        ];
    }
}
