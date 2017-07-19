<?php
class PublishAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Version_PublishModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}
