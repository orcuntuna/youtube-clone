<?php

if($_POST){

	// giriş
	if(post('type') == 'giris'){

		$eposta = post('eposta');
		$sifre = post('sifre');
		$benihatirla = post('benihatirla');

		if(!empty($eposta) && !empty($sifre)){

			$kontrol = $db->query("SELECT * FROM uyeler WHERE eposta='{$eposta}' && sifre='{$sifre}'")->fetch(PDO::FETCH_ASSOC);
			if($kontrol){

				$uye_id = $kontrol['id'];
				if($benihatirla == 1){
					$hash = hash_olustur($eposta,$sifre);
					$guncelle = $db->prepare("UPDATE uyeler SET hash=? WHERE id = {$uye_id}")->execute(array($hash));
					if($guncelle){
						setcookie("yt_hash", $hash, time() + 60 * 60 * 24 * 90);
						setcookie("yt_eposta", $eposta, time() + 60 * 60 * 24 * 90);
					}
				}

				$_SESSION['uye_giris'] = 1;
				$_SESSION['uye_id'] = $uye_id;

				echo 'ok';

			}else{
				die('Eposta adresi veya şifre hatalı');
			}

		}else{
			die('Lütfen tüm alanları doldurun');
		}

	}


	// kayıt

	if(post('type') == 'kayit'){

		$isim = post('isim');
		$eposta = post('eposta');
		$kanal = post('kanal');
		$sifre = post('sifre');
		$sifre2 = post('sifre2');

		if(!empty($isim) && !empty($eposta) && !empty($kanal) && !empty($sifre) && !empty($sifre2)){

			if($sifre == $sifre2){

				if(strlen($sifre) > 7){

					if(filter_var($eposta, FILTER_VALIDATE_EMAIL)){

						$kontrol = $db->query("SELECT * FROM uyeler WHERE eposta = '{$eposta}'")->fetch(PDO::FETCH_ASSOC);
						if(!$kontrol){

							$ekle = $db->prepare("INSERT INTO uyeler SET isim = ?, eposta = ?, kanal = ?, sifre = ?")->execute(array($isim,$eposta,$kanal,$sifre));
							if($ekle){

								$uye_id = $db->lastInsertId();
								$hash = hash_olustur($eposta,$sifre);
								$guncelle = $db->prepare("UPDATE uyeler SET hash=? WHERE id = {$uye_id}")->execute(array($hash));
								if($guncelle){
									setcookie("yt_hash", $hash, time() + 60 * 60 * 24 * 90);
									setcookie("yt_eposta", $eposta, time() + 60 * 60 * 24 * 90);
								}

								$_SESSION['uye_giris'] = 1;
								$_SESSION['uye_id'] = $uye_id;

								echo 'ok';
							}

						}else{
							die('E-posta adresi zaten kayıtlı.');
						}

					}else{
						die('E-posta adresi geçerli değil.');
					}

				}else{
					die('Şifre en az 8 karakterli olmalıdır.');
				}

			}else{
				die('Şifreler uyuşmuyor');
			}

		}else{
			die('Lütfen tüm alanları doldurun');
		}

	}


}else{
	die("Erişim reddedildi!");
}