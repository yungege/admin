<?php
class UpdatedeadlinetimeAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_UpdateDeadlineTimeModel';
        $this->declareRender = [
            'interface' => [
            ],
        ];
    }
}
