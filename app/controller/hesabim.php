<?php

$uyelik = uyelik_kontrol();
if(!$uyelik){
	redirect('giris?ref=hesabim');
}

$uye = uye_bilgileri($uyelik);

if($_POST){

	$isim = post('isim');
	$kanal = post('kanal');
	$aciklama = post('aciklama');
	$sifre = post('sifre');
	$sifre2 = post('sifre2');

	$resimson = $uye['resim'];
	$sifreson = $uye['sifre'];

	if($aciklama){
		nl2br($aciklama);
	}else{
		$aciklama = "";
	}

	$aciklama = addslashes($aciklama);

	if(!empty($isim) && !empty($kanal)){

		if(!empty($sifre) && !empty($sifre2)){
			if($sifre == $sifre2){
				if(strlen($sifre) > 7){
					$sifreson = $sifre;
				}else{
					$hata = 'Şifre 8 karakterden kısa olduğu için şifre güncellenemedi.';
				}
			}else{
				$hata = 'Şifreler uyuşmadığı için şifre güncellenemedi.';
			}
		}

		if(!empty($_FILES['resim']['size'])){

			$resim_uzantilar = array('image/png', 'image/x-png', 'image/jpg', 'image/jpeg');
			if(in_array(strtolower($_FILES['resim']['type']), $resim_uzantilar)){

				$resim_dizin = BASE_DIR . 'upload/profil/';
				$resim_uzanti_parca = explode(".", $_FILES['resim']['name']);
				$resim_uzanti = end($resim_uzanti_parca);
				$resim_hedef = $resim_dizin . $uye['id'] . '.' . $resim_uzanti;
				$resim_isim = $uye['id'] . '.' . $resim_uzanti;

				if(move_uploaded_file($_FILES['resim']['tmp_name'], $resim_hedef)){
					if($resim_isim != $uye['resim']){
						unlink($resim_dizin . $uye['resim']);
					}
					$resimson = $resim_isim;
				}else{
					$hata = 'Resim yüklenirken sorun oluştuğu için resim güncellenemedi.';
				}

			}else{
				$hata = 'Dosya türü desteklenmediği için resim güncellenemedi.';
			}

		}else{
			$resim = $uye['resim'];
		}

		$uye_id = $uye['id'];
		$guncelle = $db->prepare("UPDATE uyeler SET isim = ?, kanal = ?, aciklama = ?, sifre = ?, resim = ? WHERE id = {$uye_id}")->execute(array($isim,$kanal,$aciklama,$sifreson,$resimson));
		if($guncelle){
			$basari = 'Başarıyla profil bilgileri güncellendi.';
		}else{
			$hata = 'Güncelleme yapılırken bir sorun oluştu.';
		}

	}else{
		$hata = 'İsim ve kanal boş bırakılamaz';
	}

}

include view('static/header');
include view('hesabim');
include view('static/footer');