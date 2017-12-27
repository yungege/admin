<?php
class TeacherAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_TeacherModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'user/teacher.tpl',
            ],
        ];
    }
}
