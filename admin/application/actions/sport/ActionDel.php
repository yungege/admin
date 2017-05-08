<?php
class ActionDelAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_ActionDelModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
                
        
    }
}
