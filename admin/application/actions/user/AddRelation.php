<?php
class AddRelationAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_User_AddRelationModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}
