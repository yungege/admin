<?php
class TrainAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_TrainModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/train.tpl',
            ],
        ];

    }
}