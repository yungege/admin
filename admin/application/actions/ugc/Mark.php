<?php
class MarkAction extends BaseAction {

	protected function __declare(){

		$this->declareParams = true;
        $this->declarePageService = 'Service_Ugc_MarkModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'ugc/mark.tpl',
            ],
        ];
	}
}