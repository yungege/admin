<?php 
class InsertAction extends BaseAction {

	protected function __declare(){
		$this->declareParams = true;
		$this->declarePageService = 'Service_Student_InsertModel';
		$this->declareRender = [
			'interface' => [
                
            ],
		];
	}

}