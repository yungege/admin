<?php
class PushController extends Yaf_Controller_Abstract {
	public $actions = array(
		'userpush'		=> 'actions/push/User.php',
		'puserpush'     => 'actions/push/PUser.php',
	);

}