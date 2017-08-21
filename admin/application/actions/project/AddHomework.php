<?php
class AddHomeworkAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Project_AddHomeworkModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'project/addhomework.tpl',
            ],
        ];
    }
}
