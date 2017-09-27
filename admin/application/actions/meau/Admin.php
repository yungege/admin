<?php
class AdminAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_AdminModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'meau/admin.tpl',
            ],
        ];
    }
}