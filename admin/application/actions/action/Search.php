<?php
class SearchAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Action_SearchModel';
        $this->declareRender = [
            'interface' => [
                
            ]
        ];
    }
}
