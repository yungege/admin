<?php
class IndexAction extends BaseAction {

    protected function __declare(){
        $this->declareAuthUrl = false;
        $this->declareParams = true;
        $this->declarePageService = 'Service_Index_IndexModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'index/index.tpl',
            ],
        ];
                
        
    }
}
