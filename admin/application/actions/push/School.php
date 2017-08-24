<?php
class SchoolAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_SchoolModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/school.tpl',
            ],
        ];
    }
}