<?php
class IOutSportAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Upload_IOutSportModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}