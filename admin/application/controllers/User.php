<?php
class UserController extends Yaf_Controller_Abstract{
	public $actions = array(
        'login'     => 'actions/user/Login.php',
        'dologin'   => 'actions/user/Dologin.php',
        'register'  => 'actions/user/Register.php',
        'doregister'=> 'actions/user/Doregister.php',
        'logout'    => 'actions/user/Logout.php',
        'student'   => 'actions/user/Student.php',
        'class'     => 'actions/user/Class.php',
        'grade'     => 'actions/user/Grade.php',
        'school'    => 'actions/user/School.php',
        'addugc'    => 'actions/user/AddUgc.php',
        'classsearch' =>'actions/user/ClassSearch.php',
        'addschool' => 'actions/user/AddSchool.php',
<<<<<<< HEAD
        'index'     => 'actions/user/Index.php', 
=======
        'index'     => 'actions/user/Index.php',  
        'addrelation' => 'actions/user/AddRelation.php',
>>>>>>> aca1a76f6047e6650dd74beff90dd8a36bc2818c
        );
}
