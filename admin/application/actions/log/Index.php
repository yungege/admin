<?php
class IndexAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Log_IndexModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'log/index.tpl',
            ],
        ];
    }
}