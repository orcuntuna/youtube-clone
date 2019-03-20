<?php

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}else{
	redirect("giris");
}

$uye_id = $uye["id"];

$gecmis_videolar = $db->query("SELECT * FROM gecmis JOIN video ON gecmis.video_id = video.id WHERE gecmis.uye_id = {$uye_id} ORDER BY gecmis.id DESC LIMIT 100", PDO::FETCH_ASSOC);

include view('static/header');
include view('gecmis');
include view('static/footer');