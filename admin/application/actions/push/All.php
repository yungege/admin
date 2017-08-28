<?php
class AllAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_AllModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/all.tpl',
            ],
        ];
    }
}