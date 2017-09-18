<?php
class ShareAction extends BaseAction {

	protected function __declare(){

		$this->declareParams = true;
        $this->declarePageService = 'Service_Ugc_ShareModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'ugc/share.tpl',
            ],
        ];
	}
}