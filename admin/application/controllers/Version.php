<?php
class VersionController extends Yaf_Controller_Abstract{
    public $actions = array(
        'index'     => 'actions/version/Index.php',
        'add'       => 'actions/version/Add.php',
        'publish'   => 'actions/version/Publish.php',
        );
}
