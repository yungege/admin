<?php
class AddBannerAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_AddBannerModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}
