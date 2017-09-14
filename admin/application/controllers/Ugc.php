<?php
class UgcController extends Yaf_Controller_Abstract{
        
	public $actions = array(
                'picture'       => 'actions/ugc/Picture.php',
                'share'         => 'actions/ugc/Share.php',
                'mark'          => 'actions/ugc/Mark.php',
        );
}