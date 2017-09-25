<?php
class AddfirstAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_AddFirstModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}