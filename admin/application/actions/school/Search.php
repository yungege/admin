<?php
class SearchAction extends BaseAction {

    protected function __declare(){

        $this->declareParams = true;
        $this->declarePageService = 'Service_School_SearchModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}