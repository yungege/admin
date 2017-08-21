<?php
class ClassSearchAction extends BaseAction {

	protected function __declare(){
		$this->declareParams = true;
		$this->declarePageService = 'Service_User_ClassSearchModel';
		$this->declareRender = [
			'interface' => [

			],
		];
	}
}