<?php
return array(
				'DB_TYPE'           =>'mysql',     // 数据库类型
				'DB_HOST'               =>  'localhost', // 服务器地址
				'DB_NAME'               =>  'myblog',          // 数据库名
				'DB_USER'               =>  'root',      // 用户名
				'DB_PWD'                =>  'root',          // 密码
				'DB_PORT'               =>  '3306',        // 端口
				'DB_PREFIX'             =>  '',    // 数据库表前缀
				'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查 3.2.3版本废弃
				'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
				'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

				// 显示页面Trace信息
				'SHOW_PAGE_TRACE' =>true, 
				'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
				'DEFAULT_MODULE'       =>    'Home',  // 默认模块
				'URL_MODEL'             =>  2,  
				'URL_ROUTER_ON'   => true,  //路由规则开启
				'URL_ROUTE_RULES'=>array(  //路由规则
    						'/^'.PATH.'\/(\d+)\/?([a-zA-Z]+)?\/?(\d+)?$/' => 'Home/Code/index?id=:1&m=:2&p=:3',  //列表页
    						// PATH.'/:id\d/:p\d' => 'Home/Code/index',
    						CONTENT.'/:id\d' => 'Home/Code/detail', //文章页
    						'/^'.PATH.'\/search\/?(\d+)?$/'=> 'Home/Code/search?p=:1', //搜索页

    			)
				
				
);