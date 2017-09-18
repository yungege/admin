<?php
class OutSportAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Upload_OutSportModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'upload/outsport.tpl',
            ],
        ];
    }
}