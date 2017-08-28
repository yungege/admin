<?php
class CityAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_CityModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/city.tpl',
            ],
        ];
    }
}