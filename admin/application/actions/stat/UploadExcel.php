<?php
class UploadExcelAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Stat_UploadExcelModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}