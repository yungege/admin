<?php
class LogoutAction extends BaseAction {

    protected function __declare(){
        session_unset();
        session_destroy();
        setcookie(session_id(), '', time()-86400, '/', '.ttxs.com');
        header('Location:/login.html');
        exit;
    }
}
