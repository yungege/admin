<?php
class PushController extends Yaf_Controller_Abstract {
	public $actions = array(
		'user'		=> 'actions/push/User.php',
		'puser'     => 'actions/push/PUser.php',
		'app'		=> 'actions/push/App.php',
		'all'       => 'actions/push/All.php',
		'pall'      => 'actions/push/PAll.php',
		'school'    => 'actions/push/School.php',
		'pschool'   => 'actions/push/PSchool.php',
		'grade'     => 'actions/push/Grade.php',
		'pgrade'    => 'actions/push/PGrade.php',
		'class'     => 'actions/push/Class.php',
		'pclass'    => 'actions/push/PClass.php',
		'province'  => 'actions/push/Province.php',
		'city'      => 'actions/push/City.php',
		'district'  => 'actions/push/District.php',
	);

}