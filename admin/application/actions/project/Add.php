<?php
class AddAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Project_AddModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'project/add.tpl',
            ],
        ];
    }
}
