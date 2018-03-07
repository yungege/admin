<?php
class LogController extends Yaf_Controller_Abstract{
    public $actions = array(
        'index' => 'actions/log/Index.php',
        'read'  => 'actions/log/Read.php',
        'studentlogin' => 'actions/log/StudentLogin.php',
    );
}
