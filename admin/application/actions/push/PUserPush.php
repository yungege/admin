<?php
class PUserPushAction extends BaseAction {

	protected function __declare(){
		$this->declareParams = true;
		$this->declarePageService = 'Service_Push_PUserPushModel';
		$this->declareRender = [
            'interface' => [
                
            ],
        ];
	}
}