<?php
/**
 * @author 422909231@qq.com
 * @Data:2017-05-31
 * Crontab 脚本入口文件 运行示例：
 * php /var/www/TT-PHP-API/ttxs/script/Test.php $arg1 ...
 */

date_default_timezone_set("Asia/Shanghai");
mb_internal_encoding("UTF-8");


define('APPLICATION_PATH', dirname(dirname(__FILE__)));
define('APP_PATH', APPLICATION_PATH.'/application');
define('LOG_DIR', '/var/log/ttxs/script');
define('CONFIG_PATH', '/var/www/test_conf');

$app = new Yaf_Application(APPLICATION_PATH . "/conf/application.ini");
$app->bootstrap();

$_SERVER['REMOTE_ADDR'] = '127.0.0.1';

// 不限制执行时间
set_time_limit(0);
// 设置运行内存为512M
ini_set("memory_limit","512M");