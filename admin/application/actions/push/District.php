<?php
class DistrictAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_DistrictModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/district.tpl',
            ],
        ];
    }
}