<?php
class MeauController extends Yaf_Controller_Abstract{
    public $actions = array(
        'list'      => 'actions/meau/List.php',
        'addfirst'  => 'actions/meau/AddFirst.php',
        'role'      => 'actions/meau/Role.php',
        'addrole'   => 'actions/meau/AddRole.php',
        'admin'     => 'actions/meau/Admin.php',
        'allotrole' => 'actions/meau/AllotRole.php',
        );
}
