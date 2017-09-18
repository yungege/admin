<?php
class IndexAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Upload_IndexModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'upload/index.tpl',
            ],
        ];
    }
}