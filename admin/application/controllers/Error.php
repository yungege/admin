<?php
/**
 * 错误信息输出
 *
 */

class ErrorController extends Yaf_Controller_Abstract {
    
	public function errorAction($exception) {
    	$errMsg = $exception->getMessage();
        if (DEBUG_MODE)
        {
            echo "<pre>";
            print_r($errMsg);exit;
        }
        else{
            header("HTTP/1.1 404 PAGE NOT FOUND.");
        }
    }
}
