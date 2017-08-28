<?php
class PSchoolAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_PSchoolModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}