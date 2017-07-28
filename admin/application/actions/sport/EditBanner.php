<?php
class EditBannerAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_EditBannerModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}
