<?php

function yoneticilik_kontrol(){
	global $db;
	if(isset($_SESSION["yonetici_id"]) && isset($_SESSION["yonetici_eposta"])){
		$id = intval($_SESSION["yonetici_id"]);
		$eposta = addslashes($_SESSION["yonetici_eposta"]);
		$kontrol = $db->query("SELECT * FROM admin WHERE id = {$id} AND eposta = '{$eposta}'")->fetch(PDO::FETCH_ASSOC);
		if($kontrol){
			return $kontrol["id"];
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function yoneticilik($login = 0){
	global $db;
	if($login == 1){
		if(yoneticilik_kontrol()){
			redirect('admin');
		}
	}else{
		if(!yoneticilik_kontrol()){
			redirect('admin/giris');
		}
	}
}