<?php
class InsertAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Action_InsertModel';
        $this->declareRender = [
            'interface' => [
                
            ]
        ];
    }
}
