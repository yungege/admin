<?php
class ReadAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Log_ReadModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}