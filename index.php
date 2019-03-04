<?php

require_once 'app/system/init.php';

// url yapısı
$_url = get('url');
$_url = array_filter(explode('/', $_url));

if(!isset($_url[0])){
	$_url[0] = 'index';
}

if($_url[0] == 'admin'){
	if(!isset($_url[1])){
		$_url[1] = 'index';
	}
	if(!file_exists('app/admin_controller/'. $_url[1] . '.php')){
		redirect('admin');
	}
	$admin_helper = BASE_DIR . 'app/helper/admin.php';
	if(file_exists($admin_helper)){
		require_once $admin_helper;
	}
	require 'app/admin_controller/'. $_url[1] . '.php';
}else{
	if(!file_exists('app/controller/'. $_url[0] . '.php')){
		redirect();
	}
	require 'app/controller/'. $_url[0] . '.php';
}


