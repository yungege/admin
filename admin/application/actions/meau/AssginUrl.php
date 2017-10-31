<?php
class AssginUrlAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_AssginUrlModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}