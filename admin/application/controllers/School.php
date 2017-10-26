<?php
class SchoolController extends Yaf_Controller_Abstract{

    public $actions = array(
        'search'     => 'actions/school/Search.php',
        'add'        => 'actions/school/Add.php',
        'list'       => 'actions/school/List.php',
        'insert'     => 'actions/school/Insert.php',
        'index'      => 'actions/school/Index.php',
    );
}