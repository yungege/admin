<?php
class RoleAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_RoleModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'meau/role.tpl',
            ],
        ];
    }
}