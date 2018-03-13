<?php
class ClassdonecountAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Stat_ClassDoneCountModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'stat/classdonecount.tpl'
            ],
        ];
    }
}
