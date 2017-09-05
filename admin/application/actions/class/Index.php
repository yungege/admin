<?php
class IndexAction extends BaseAction {

    protected function __declare(){

        $this->declareParams = true;
        $this->declarePageService = 'Service_Class_IndexModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}