<?php
/**
 * yaf 路由同统一配置
 * 自定义路由 按以下格式配置
 * 'name' => [
 *      'match',
 *		['module' => 'model name', 'controller' => 'controller name', 'action' => 'action name'],   	
 * ],
 */

return [
	// 登录
	'login' => [
		'/login\.html',
		['module' => 'index', 'controller' => 'user', 'action' => 'login'],
	],
    // 首页
    'index' => [
        '/index\.html',
        ['module' => 'index', 'controller' => 'index', 'action' => 'index'],
    ],
    // 项目详情页
    'projectinfo' => [
        '/sport/p/(\w+)\.html',
        ['module' => 'index', 'controller' => 'sport', 'action' => 'pro'],
    ],

	
];
