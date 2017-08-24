<?php
class PClassAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_PClassModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}