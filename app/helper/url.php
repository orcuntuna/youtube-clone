<?php 

// site url döndüren fonksiyon
function base_url($extra = null){
	if($extra){
		return BASE_URL . trim(trim($extra),'/');
	}else{
		return BASE_URL;
	}
}

// assets url döndüren fonksiyon
function assets_url($extra = null){
	if($extra){
		return BASE_URL . "assets/" . trim(trim($extra),'/');
	}else{
		return BASE_URL . "assets/";
	}
}

// yönlendirme
function redirect($param = null){
	if(!$param){
		header("Location:" . base_url());
	}else{
		header("Location:" . base_url(trim($param)));
	}
}

// view dahil etme
function view($view)
{
    if(file_exists(BASE_DIR . 'app/view/' . $view . '.php')){
		return BASE_DIR . 'app/view/' . $view . '.php';
	}
	return false;
}