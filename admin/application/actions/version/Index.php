<?php
class IndexAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Version_IndexModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'version/index.tpl',
            ],
        ];
    }
}
