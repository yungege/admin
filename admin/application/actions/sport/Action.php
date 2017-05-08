<?php
class ActionAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_ActionModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'sport/action.tpl',
            ],
        ];
                
        
    }
}
