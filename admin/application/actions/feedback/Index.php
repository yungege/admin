<?php
class IndexAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Feedback_IndexModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'feedback/index.tpl',
            ],
        ];
                
        
    }
}
