<?php
class UserAction extends BaseAction {

    protected function __declare(){
        $this->declareParams = true;
        $this->declarePageService = 'Service_Push_UserModel';
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'push/user.tpl',
            ],
        ];
    }
}
