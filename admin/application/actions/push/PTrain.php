<?php
class PTrainAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_PTrainModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}