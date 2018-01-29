<?php
class UploadWordAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Stat_UploadWordModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}