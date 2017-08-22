<?php
class TrainStatAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Stat_TrainStatModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
                
        
    }
}
