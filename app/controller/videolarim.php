<?php

$uyelik = uyelik_kontrol();
if(!$uyelik){
	redirect('giris?ref=videolarim');
}

$uye = uye_bilgileri($uyelik);

if(isset($_url[1])){

	if($_url[1] == "sil"){
		
		$id = intval(get("id"));
		$uye_id = $_SESSION["uye_id"];
		if(empty($id)){redirect("videolarim");}
		$sil = $db->exec("DELETE FROM video WHERE id = {$id} AND kanal = {$uye_id}");
		redirect("videolarim");


	}elseif($_url[1] == "duzenle"){

		$id = intval(get("id"));
		$uye_id = $_SESSION["uye_id"];
		$video = $db->query("SELECT * FROM video WHERE id = {$id} AND kanal = {$uye_id}")->fetch(PDO::FETCH_ASSOC);
		if($video){
			if($_POST){
				if(!empty(post("baslik")) && !empty(post("kategori")) && !empty(post("aciklama"))){
					$guncelle = $db->prepare("UPDATE video SET baslik = ?, kategori = ?, aciklama = ? WHERE id = ?")->execute(array(strip_tags(post("baslik")), intval(post("kategori")), strip_tags(post("aciklama")), $id ));
					if($guncelle){
						$basari = "Video bilgileri başarıyla güncellendi";
						$video = $db->query("SELECT * FROM video WHERE id = {$id} AND kanal = {$uye_id}")->fetch(PDO::FETCH_ASSOC);
					}else{
						$hata = "Bir sorun oluştu";
					}
				}else{
					$hata = "Tüm alanları doldurunuz";
				}
			}
			$view = "videolarim/duzenle";
		}else{
			redirect("videolarim");
		}

	}else{
		redirect("videolarim");
	}

}else{
	$view = "videolarim/liste";
}

include view('static/header');
include view($view);
include view('static/footer');