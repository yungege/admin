<?php
class ShowRoleAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_ShowRoleModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}