<?php
class ClassAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_ClassModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'user/class.tpl',
            ],
        ];
    }
}
