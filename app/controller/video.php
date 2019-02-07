<?php 

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}

$video_id = intval(get('id'));

if(empty($video_id)){
	redirect();
}

if(intval($video_id)>0){
	$vd = $db->query("SELECT * FROM video WHERE id = {$video_id}")->fetch(PDO::FETCH_ASSOC);
	if(!$vd){
		redirect();
		die();
	}
}else{
	redirect();
	die();
}

include view('static/header');
include view('video');
include view('static/footer');