<?php
class AdduriAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_AddUriModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}