<?php
class ProvinceAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_ProvinceModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/province.tpl',
            ],
        ];
    }
}