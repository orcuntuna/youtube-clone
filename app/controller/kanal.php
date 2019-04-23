<?php 

$uyelik = uyelik_kontrol();
if($uyelik){
	$uye = uye_bilgileri($uyelik);
}

$kanal_id = intval(get('id'));

if(empty($_url[1])){
	redirect("kanal/v/?id=".$kanal_id);
}

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

if(isset($_url[1])){
	if($_url[1] == "a"){
		
		if($_POST){
			$uye_id = $_SESSION["uye_id"];
			foreach ($_POST as $key => $value) {
				$key = intval($key);
				$value = intval($value);
				$ekle = $db->prepare("INSERT INTO anket (soru_id, kanal_id, uye_id, puan) VALUES (?,?,?,?)")->execute(array($key,$kanal_id,$uye_id,$value));
			}
			redirect("kanal/a/?id=" . $kanal_id);
		}

		if(uyelik_kontrol()){
			$uye_id = $_SESSION["uye_id"];
			$anket_kontrol_sorgu = $db->query("SELECT * FROM anket WHERE uye_id = {$uye_id} AND kanal_id = {$kanal_id}", PDO::FETCH_ASSOC);
			if($anket_kontrol_sorgu->rowCount()){
				$anket_kontrol = true;
			}
		}else{
			$uye_id = false;
			$anket_kontrol = true;
		}
	}
}

include view('static/header');
include view('kanal');
include view('static/footer');