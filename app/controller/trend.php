<?php

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}

$trend_videolar = $db->query("SELECT * FROM video ORDER BY izlenme DESC LIMIT 24", PDO::FETCH_ASSOC);

include view('static/header');
include view('trend');
include view('static/footer');