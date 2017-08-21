<?php
class AddAction extends BaseAction {

	protected function __declare(){

		$this->declareParams = true;
        $this->declarePageService = 'Service_School_AddModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'school/add.tpl',
            ],
        ];
	}
}