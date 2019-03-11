<?php

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}

$anasayfa_videolar = $db->query("SELECT * FROM video ORDER BY id DESC LIMIT 24", PDO::FETCH_ASSOC);

include view('static/header');
include view('anasayfa');
include view('static/footer');