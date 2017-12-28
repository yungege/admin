<?php 
class InsertAction extends BaseAction {

	protected function __declare(){
		$this->declareParams = true;
		$this->declarePageService = 'Service_Teacher_InsertModel';
		$this->declareRender = [
			'interface' => [
                
            ],
		];
	}

}