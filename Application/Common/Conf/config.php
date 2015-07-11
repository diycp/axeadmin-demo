<?php
$config = array(
	'DB_TYPE'   => 'mysqli', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'axeadmin', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'root', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'axe_', // 数据库表前缀
	'DB_CHARSET'=> 'utf8', // 字符集

	'URL_HTML_SUFFIX'	=>	'',
		
);

$debug = array();
if(APP_DEBUG)
{
	$debug = array(
			'SHOW_PAGE_TRACE' =>false,
			'LOG_RECORD' => false, // 开启日志记录
			'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR,DEBUG', // 只记录EMERG ALERT CRIT ERR 错误
	);	
}

return array_merge($config,$debug);