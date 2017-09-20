<?php
class ListAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_ListModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'meau/list.tpl',
            ],
        ];
    }
}