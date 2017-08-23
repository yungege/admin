<?php
class UserPushAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_UserPushModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/userpush.tpl',
            ],
        ];
    }
}
