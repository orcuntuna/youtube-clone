<?php

function session($isim){
	if(isset($_SESSION[$isim])){
		return $_SESSION[$isim];
	}
	return false;
}

function cookie($isim){
	if(isset($_COOKIE[$isim])){
		return $_COOKIE[$isim];
	}
	return false;
}


function uyelik_kontrol(){
	global $db;
	if( session('uye_giris') && session('uye_id') ){
		$uye_id = intval(session('uye_id'));
		$kontrol = $db->query("SELECT * FROM uyeler WHERE id = {$uye_id}")->fetch(PDO::FETCH_ASSOC);
		if($kontrol){
			return $uye_id;
		}
	}else{
		if(cookie('yt_hash') && cookie('yt_eposta')){
			$eposta = cookie('yt_eposta');
			$hash = cookie('yt_hash');
			$kontrol = $db->query("SELECT * FROM uyeler WHERE eposta = '{$eposta}' && hash = '{$hash}'")->fetch(PDO::FETCH_ASSOC);
			if($kontrol){
				if($hash = hash_olustur($kontrol['eposta'], $kontrol['sifre'])){
					$_SESSION['uye_giris'] = 1;
					$_SESSION['uye_id'] = $kontrol['id'];
					return $kontrol['id'];
				}
			}
		}
	}

	return false;
}

function uye_bilgileri($id){
	global $db;
	$id = intval($id);
	$bilgi = $db->query("SELECT * FROM uyeler WHERE id = {$id}")->fetch(PDO::FETCH_ASSOC);
	if($bilgi){
		return $bilgi;
	}
}

function hash_olustur($eposta,$sifre){
	return md5(sha1(sha1($eposta) . sha1($sifre) . md5($_SERVER['HTTP_USER_AGENT'])));
}

function kanal_url($id){
	global $db;
	$id = intval($id);
	$kontrol = $db->query("SELECT * FROM uyeler WHERE id = {$id}")->fetch(PDO::FETCH_ASSOC);
	if($kontrol){
		return base_url('kanal?id='.$kontrol['id']);
	}
	return false;
}

function kanal_img($id){
	global $db;
	$id = intval($id);
	$kontrol = $db->query("SELECT * FROM uyeler WHERE id = {$id}")->fetch(PDO::FETCH_ASSOC);
	if($kontrol){
		if(!empty($kontrol['resim']) && file_exists(BASE_DIR . 'upload/profil/'.$kontrol['resim'])){
			return base_url('upload/profil/'.$kontrol['resim']);
		}else{
			return base_url('upload/profil/default.png');
		}
	}
	return false;
}

function kanal_abone_sayisi($id){
	global $db;
	$id = intval($id);
	$kontrol = $db->query("SELECT * FROM uyeler WHERE id = {$id}")->fetch(PDO::FETCH_ASSOC);
	if($kontrol){
		$sayi = $db->query("SELECT COUNT(id) FROM abone WHERE olunan = {$id}")->fetch(PDO::FETCH_ASSOC);
		if($sayi){
			return $sayi['COUNT(id)'];
		}else{
			return 0;
		}
	}
	return false;
}