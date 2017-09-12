<?php
class LogoutAction extends BaseAction {

    protected function __declare(){
        session_unset();
        session_destroy();

        $host = $_SERVER['SERVER_NAME'];
        if($host == 'localhost'){
            $host = $_SERVER['SERVER_ADDR'];
        }
        setcookie(session_name(), '', time()-86400, '/', $host);
        setcookie('ttxs', '', time()-86400, '/', $host);
        header('Location:/login.html');
        exit;
    }
}
