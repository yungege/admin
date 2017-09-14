<?php
class PictureAction extends BaseAction {

	protected function __declare(){

		$this->declareParams = true;
        $this->declarePageService = 'Service_Ugc_PictureModel';
        $this->declareRender = [
            'interface' => [
                
            ],
        ];
	}
}