<?php

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}

include view('static/header');
include view('anasayfa');
include view('static/footer');