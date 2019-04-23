<?php 

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}

$bul = get("q");
if($bul){
	$bul = addslashes(strip_tags(trim($bul)));
}else{
	redirect();
}

include view('static/header');
include view('ara');
include view('static/footer');