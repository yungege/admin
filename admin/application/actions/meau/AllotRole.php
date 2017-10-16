<?php
class AllotroleAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_AllotRoleModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'meau/allotrole.tpl',
            ],
        ];
    }
}