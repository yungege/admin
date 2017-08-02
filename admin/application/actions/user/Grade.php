<?php
class GradeAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_GradeModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'user/grade.tpl',
            ],
        ];
    }
}
