<?php
return array(
	//'配置项'=>'配置值'
	'APP_GROUP_LIST' => 'Home,Admin,Test,Njb,PHP_API',
	'DEFAULT_GROUP' => 'Home',
	
	/*
	*  开启独立分组
	*/
	'APP_GROUP_MODE' => 1,
	'APP_GROUP_PATH' => 'Modules',
    'APP_GROUP_LIST'=>'Index',      //项目分组列表
    'DEFAULT_GROUP'=>'Index',         //默认分组
		
	//定义错误页面
	//'TMPL_EXCEPTION_FILE'=>'./App/Tpl/Public/error.html' // 定义公共错误模板
	
	//数据库连接参数
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' => 'passwd',
	'DB_NAME' => 'hd_thinkphp',
	'DB_PREFIX' => 'tp_',//数据表前缀
	
	//'SESSION_TYPE' => 'Db'
	//'SESSION_TYPE' => 'Redis'
);
?>