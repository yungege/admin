<?php
class UserController extends Yaf_Controller_Abstract{
	public $actions = array(
        'login'     => 'actions/user/Login.php',
        'dologin'   => 'actions/user/Dologin.php',
        'logout'    => 'actions/user/Logout.php',
        'student'   => 'actions/user/Student.php',
        'class'     => 'actions/user/Class.php',
        'grade'     => 'actions/user/Grade.php',
        'school'     => 'actions/user/School.php',
        );
}
