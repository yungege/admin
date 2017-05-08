<?php
class ProjectAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Sport_ProjectModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'sport/project.tpl',
            ],
        ];
                
        
    }
}
