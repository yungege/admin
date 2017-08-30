<?php
class StatisticsAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Stat_StatisticsModel';
        $this->declareRender = [
            'tpl' => [
                'tplName'   => 'stat/statistics.tpl'
            ],
        ];
    }
}
