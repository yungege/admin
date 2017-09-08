<?php
class ListAction extends BaseAction {

    protected function __declare(){

        $this->declareParams = true;
        $this->declarePageService = 'Service_School_ListModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}