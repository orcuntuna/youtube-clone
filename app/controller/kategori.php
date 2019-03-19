<?php

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}

if(get("id")){
	$id = intval(get("id"));
	$kontrol = $db->query("SELECT * FROM kategoriler WHERE id = {$id}")->fetch(PDO::FETCH_ASSOC);
	if(!$kontrol){
		redirect();
	}
}else{
	redirect();
}

$kategori_videolar = $db->query("SELECT * FROM video WHERE kategori = {$id} ORDER BY id DESC LIMIT 24", PDO::FETCH_ASSOC);

include view('static/header');
include view('kategori');
include view('static/footer');