<?php
/**
 * @declare 入口文件
 */
define('APP_NAME', 'ttxs_admin');
define('APP_DOMAIN', '');
define('APPLICATION_PATH', dirname(dirname(__FILE__)));
define('APP_PATH', APPLICATION_PATH.'/application');
define('VIEW_PATH', APP_PATH.'/views');
define('LOG_DIR', '/var/log/admin/php');
define('CONFIG_PATH', '/var/www/ttxs_conf');
define('VERDOR_PATH', APPLICATION_PATH.'/vendor');

ini_set('yaf.use_spl_autoload', 1);

if (!extension_loaded('yaf'))
	exit('yaf extension not install.');

require_once dirname(__FILE__).'/func.php';
require_once CONFIG_PATH.'/BackendAdmin.php';
$application = new Yaf_Application(APPLICATION_PATH . "/conf/application.ini");
$application->bootstrap()->run();
