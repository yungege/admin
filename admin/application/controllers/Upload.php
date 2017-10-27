<?php
class UploadController extends Yaf_Controller_Abstract{
	public $actions = array(

                'index'     => 'actions/upload/Index.php', 
                'user'      => 'actions/upload/User.php',
                'outsport'  => 'actions/upload/OutSport.php',
                'ioutsport' => 'actions/upload/IOutSport.php',
                'punch'     => 'actions/upload/Punch.php',
        );
}
