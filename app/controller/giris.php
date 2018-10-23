<?php

$uyelik = uyelik_kontrol();
if($uyelik){
	redirect();
}

$title = 'Giriş Yap';

include view('static/header');
include view('giris');
include view('static/footer');