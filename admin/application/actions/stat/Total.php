<?php
class TotalAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Stat_TotalModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}