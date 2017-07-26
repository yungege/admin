<?php
class HomeworkAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_HomeworkModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'sport/homework.tpl',
            ],
        ];
                
        
    }
}
