<?php
class PushController extends Yaf_Controller_Abstract {
	public $actions = array(
		'user'		=> 'actions/push/User.php',
		'puser'     => 'actions/push/PUser.php',
		'all'       => 'actions/push/All.php',
	);

}