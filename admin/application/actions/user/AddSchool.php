<?php 
class AddSchoolAction extends BaseAction {

	protected function __declare(){
		$this->declareParams = true;
		$this->declarePageService = 'Service_User_AddSchoolModel';
		$this->declareRender = [
			'interface' => [

			],
		];
	}

}