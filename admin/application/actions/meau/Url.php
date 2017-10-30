<?php
class UrlAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Meau_UrlModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'meau/url.tpl',
            ],
        ];
    }
}