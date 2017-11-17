<?php
	header('Content-Type:text/json;charset=utf-8');
	require("db_mysqli.class.php");
	
	//配置文件
	static $config = array (
		'hostname' => 'localhost',
		'port' => 3306,
		'database' => 'phpcmsv9',
		'username' => '',
		'password' => '',
		'tablepre' => 'v9_',
		'charset' => 'utf8',
		'type' => 'mysqli',
		'debug' => true,
		'pconnect' => 0,
		'autoconnect' => 0
		);
	$config['hostname']="localhost";
	$config['username']="root";
	$config['password']="";
	$config['database']="paper";
	$config['port'] = 3306;
	$config['autoconnect'] = 1;
	$config['debug'] = 'false';
	
	//连接数据库
	$db = new db_mysqli();
	$db->open($config);

	//选择数据
	$datalist = $db->select('id,title,name,no','papers','','','id');

	//返回
	$respond['code']=0;
	$respond['msg']='';
	$respond['count']=sizeof($datalist);
	$respond['data']=$datalist;
	echo json_encode($respond); 
?>