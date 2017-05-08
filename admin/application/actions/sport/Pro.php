<?php
class ProAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_ProModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'sport/pro.tpl',
            ],
        ];
                
        
    }
}
