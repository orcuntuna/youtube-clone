<?php

// get fonksiyonu
function get($name){
	if(isset($_GET[$name])){
		if(is_array($_GET[$name])){
			return array_map(function($item){
				return htmlspecialchars(trim($item));
			}, $_GET[$name]);
		}else{
			return htmlspecialchars(trim($_GET[$name]));
		}
	}
	return false;
}

// post fonksiyonu
function post($name){
	if(isset($_POST[$name])){
		if(is_array($_POST[$name])){
			return array_map(function($item){
				return htmlspecialchars(trim($item));
			}, $_POST[$name]);
		}else{
			return htmlspecialchars(trim($_POST[$name]));
		}
	}
	return false;
}