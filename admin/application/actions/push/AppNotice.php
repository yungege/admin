<?php
class AppnoticeAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_AppNoticeModel';
        $this->declareRender = [
            'interface' => [

            ],
        ];
    }
}