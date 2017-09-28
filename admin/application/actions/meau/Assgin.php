<?php
class AssginAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_AssginModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'meau/assgin.tpl',
            ],
        ];
    }
}