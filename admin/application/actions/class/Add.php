<?php
class AddAction extends BaseAction {

	protected function __declare(){

		$this->declareParams = true;
        $this->declarePageService = 'Service_Class_AddModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'class/add.tpl',
            ],
        ];
	}
}