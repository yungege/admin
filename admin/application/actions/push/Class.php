<?php
class ClassAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_ClassModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/class.tpl',
            ],
        ];
    }
}