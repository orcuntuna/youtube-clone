<?php 

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}

$kanal_id = intval(get('id'));
if(intval($kanal_id)>0){
	$kn = $db->query("SELECT * FROM uyeler WHERE id = {$kanal_id}")->fetch(PDO::FETCH_ASSOC);
	if(!$kn){
		redirect();
		die();
	}
}else{
	redirect();
	die();
}

include view('static/header');
include view('kanal');
include view('static/footer');