<?php
class AddAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Action_AddModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'action/add.tpl'
            ]
        ];
    }
}
