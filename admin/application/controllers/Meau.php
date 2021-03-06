<?php
class MeauController extends Yaf_Controller_Abstract{
    public $actions = array(
        'list'      => 'actions/meau/List.php',
        'addfirst'  => 'actions/meau/AddFirst.php',
        'role'      => 'actions/meau/Role.php',
        'addrole'   => 'actions/meau/AddRole.php',
        'admin'     => 'actions/meau/Admin.php',
        'allotrole' => 'actions/meau/AllotRole.php',
        'assgin'    => 'actions/meau/Assgin.php',
        'url'       => 'actions/meau/Url.php',
        'assginurl' => 'actions/meau/AssginUrl.php',
        'adduri'    => 'actions/meau/AddUri.php',
        'showrole'  => 'actions/meau/ShowRole.php',
        'addadmin'  => 'actions/meau/AddAdmin.php',
        'deladmin'  => 'actions/meau/DelAdmin.php',
        );
}
