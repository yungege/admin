<?php
class AddAdminAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_AddAdminModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}