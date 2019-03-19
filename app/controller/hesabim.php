<?php

$uyelik = uyelik_kontrol();
if(!$uyelik){
	redirect('giris?ref=videolarim');
}

$uye = uye_bilgileri($uyelik);

include view('static/header');
include view('hesabim');
include view('static/footer');