<?php 

yoneticilik(1);

if(post("giris")){
	$eposta = addslashes(strip_tags(trim(post("eposta"))));
	$parola = md5(addslashes(strip_tags(trim(post("parola")))));
	if(!empty($eposta) && !empty($parola)){
		$kontrol = $db->query("SELECT * FROM admin WHERE eposta = '{$eposta}' AND sifre = '{$parola}'")->fetch(PDO::FETCH_ASSOC);
		if($kontrol){
			$_SESSION["yonetici_id"] = $kontrol["id"];
			$_SESSION["yonetici_eposta"] = $kontrol["eposta"];
			redirect("admin");
		}else{
			$hata = "E-posta ya da parola hatalı!";
		}
	}else{
		$hata = "Tüm alanları doldurun!";
	}
}

include view("admin/giris");