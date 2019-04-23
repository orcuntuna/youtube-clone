<?php

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}else{
	redirect("giris");
}


include view('static/header');
include view('abonelikler');
include view('static/footer');