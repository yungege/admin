<?php
class MatchAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Homework_MatchModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
                
        
    }
}
