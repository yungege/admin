<?php 
class AddAction extends BaseAction {

	protected function __declare(){
		$this->declareParams = true;
		$this->declarePageService = 'Service_Student_AddModel';
		$this->declareRender = [
			'tpl' => [
                'tplName' => 'student/add.tpl',
            ],
		];
	}

}