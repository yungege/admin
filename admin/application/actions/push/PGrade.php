<?php
class PGradeAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_PGradeModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}