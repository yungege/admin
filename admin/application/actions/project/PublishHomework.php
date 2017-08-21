<?php
class PublishHomeworkAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Project_PublishHomeworkModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
    }
}
