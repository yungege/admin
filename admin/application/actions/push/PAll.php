<?php
class PAllAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_PAllModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}