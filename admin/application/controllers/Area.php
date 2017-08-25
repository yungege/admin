<?php
class AreaController extends Yaf_Controller_Abstract{
    public $actions = array(
        'city' => 'actions/area/City.php',
        'district' => 'actions/area/District.php',
        // 'insert' => 'actions/care/Insert.php',
    );
}
