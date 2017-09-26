<?php
class AddroleAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_AddRoleModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}