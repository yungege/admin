<?php
class ClassController extends Yaf_Controller_Abstract{
    public $actions = array(
        'add'       => 'actions/class/Add.php',
        'list'      => 'actions/class/List.php',
        'insert'    => 'actions/class/Insert.php',
        'index'     => 'actions/class/Index.php',
    );
}
