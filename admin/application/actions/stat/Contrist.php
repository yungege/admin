<?php
class ContristAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Stat_ContristModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}
