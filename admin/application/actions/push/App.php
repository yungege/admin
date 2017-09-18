<?php
class AppAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_AppModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/app.tpl',
            ],
        ];
        
    }
}