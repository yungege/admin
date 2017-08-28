<?php
class CityAction extends BaseAction {

	protected function __declare(){

		$this->declareParams = true;
        $this->declarePageService = 'Service_Area_CityModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
	}
}