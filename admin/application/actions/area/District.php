<?php
class DistrictAction extends BaseAction {

	protected function __declare(){

		$this->declareParams = true;
        $this->declarePageService = 'Service_Area_DistrictModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
	}
}