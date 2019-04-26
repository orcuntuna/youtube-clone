<?php

require_once 'config.php';

session_start();


$path = dirname(dirname(dirname(__FILE__)));
$list = explode("/", $path);
$script_path = end($list);

$_base_url = "http://" . $_SERVER["SERVER_NAME"] . "/" .  trim($script_path , "/");

define('BASE_URL', rtrim(trim($_base_url), '/').'/');
define('BASE_DIR', dirname(dirname(__DIR__)).'/');

// helperları dahil et
foreach ($config['helpers'] as $helper) {
	$helper_adres = BASE_DIR . 'app/helper/'.$helper.'.php';
	if(file_exists($helper_adres)){
		require_once $helper_adres;
	}
}

// veritabanı bağlantısı
try{
	$db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'].';charset=utf8', $config['db']['user'], $config['db']['pass']); 
}catch(PDOException $e){
	die('<b>Veritabanı hatası:</b> '. $e);
}