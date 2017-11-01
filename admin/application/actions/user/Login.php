<?php
class LoginAction extends BaseAction {

    protected function __declare(){
        if(!empty($_SESSION['userInfo'])){
            header("Location:/index.html");
            exit;
        }
        
        $this->declareAuthUrl = false;
        $this->declareParams = false;
        $this->declareRender = [
            'tpl' => [
                'tplName' => 'user/login.tpl',
            ],
        ];
    }
}
