<?php 
class AddAction extends BaseAction {

	protected function __declare(){
		$this->declareParams = true;
		$this->declarePageService = 'Service_Teacher_AddModel';
		$this->declareRender = [
			'tpl' => [
                'tplName' => 'teacher/add.tpl',
            ],
		];
	}

}