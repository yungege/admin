<?php
class StudentAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_StudentModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'user/student.tpl',
            ],
        ];
    }
}
