<?php
class SportController extends Yaf_Controller_Abstract{
    public $actions = array(
        'banner'        => 'actions/sport/Banner.php',
        'delbanner'     => 'actions/sport/DelBanner.php',
        'editbanner'    => 'actions/sport/EditBanner.php',
        'addbanner'     => 'actions/sport/AddBanner.php',
        'action'        => 'actions/sport/Action.php',
        'homework'      => 'actions/sport/Homework.php',
        'actiondel'     => 'actions/sport/ActionDel.php',
        'project'       => 'actions/sport/Project.php',
        'pro'           => 'actions/sport/Pro.php',
        'ugc'           => 'actions/sport/UGC.php',
        'outsport'      => 'actions/sport/OutSport.php',
        'updatedeadlinetime' => 'actions/sport/UpdateDeadlineTime.php',
        );
}
