<?php
class StatController extends Yaf_Controller_Abstract{
    public $actions = array(
        'statistics'        => 'actions/stat/Statistics.php',
        'trainstat'         => 'actions/stat/TrainStat.php',
        'contrist'          => 'actions/stat/Contrist.php',
        'uploadword'        => 'actions/stat/UploadWord.php',
        'uploadexcel'       => 'actions/stat/UploadExcel.php',
        'total'             => 'actions/stat/Total.php',
        'classdonecount'    => 'actions/stat/ClassDoneCount.php',
    );
}
