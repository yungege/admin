<?php
class StudentLoginAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Log_StudentLoginModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'log/studentlogin.tpl',
            ],
        ];
    }
}