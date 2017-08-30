<?php
class GradeAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_GradeModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/grade.tpl',
            ],
        ];

    }
}