<?php
class DelBannerAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_DelBannerModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
                
        
    }
}
