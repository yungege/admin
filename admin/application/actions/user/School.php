<?php
class SchoolAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_SchoolModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'user/school.tpl',
            ],
        ];
    }
}
