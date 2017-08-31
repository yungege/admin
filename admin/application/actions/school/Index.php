<?php
class IndexAction extends BaseAction {

    protected function __declare(){

        $this->declareParams = true;
        $this->declarePageService = 'Service_School_IndexModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}