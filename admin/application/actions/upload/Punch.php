<?php
class PunchAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Upload_PunchModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'upload/punch.tpl',
            ],
        ];
    }
}