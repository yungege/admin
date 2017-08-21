<?php
class ProjectController extends Yaf_Controller_Abstract{
    public $actions = array(
        'add'        => 'actions/project/Add.php',
        'addpro'     => 'actions/project/AddPro.php',
        'sku'        => 'actions/project/Sku.php',
        'addhomework'=> 'actions/project/AddHomework.php',
        'publishhomework' => 'actions/project/PublishHomework.php'
        );
}
