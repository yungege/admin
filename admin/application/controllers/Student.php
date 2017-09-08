<?php
class StudentController extends Yaf_Controller_Abstract{
        
	public $actions = array(
                'add'       => 'actions/student/Add.php',
                'insert'    => 'actions/student/Insert.php',
        );
}