<?php
class PUserAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_PUserModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}
