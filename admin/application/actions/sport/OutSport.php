<?php
class OutSportAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_OutSportModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'sport/outsport.tpl',
            ],
        ];
                
        
    }
}
