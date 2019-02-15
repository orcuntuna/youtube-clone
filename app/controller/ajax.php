<?php

if($_POST){

	// giriş
	if(post('type') == 'giris'){

		$eposta = post('eposta');
		$sifre = md5(post('sifre'));
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
			die('Lütfen tüm alanları doldurun xx');
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

							$ekle = $db->prepare("INSERT INTO uyeler SET isim = ?, eposta = ?, kanal = ?, sifre = ?")->execute(array($isim,$eposta,$kanal,md5($sifre)));
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

	// abone ol & abonelikten çık

	if(post('type') == 'abonelik'){

		/*
			0: hata
			1: abone olundu
			2: abonelikten çıkıldı
		*/

		$ben = intval($_SESSION["uye_id"]);
		$sen = intval(post("kanal_id"));

		$abonelik_kontrol = $db->query("SELECT * FROM abone WHERE olan = {$ben} AND olunan = {$sen}")->fetch(PDO::FETCH_ASSOC);
		if($abonelik_kontrol){
			// abonelikten çıkıyoruz
			$mevcut_abonelik_id = $abonelik_kontrol["id"];
			$abonelikten_cik = $db->exec("DELETE FROM abone WHERE id = {$mevcut_abonelik_id}");
			if($abonelikten_cik){
				echo 2;
			}else{
				echo 0;
			}
		}else{
			// abone oluyoruz
			$abone_ol = $db->prepare("INSERT INTO abone (olan,olunan) VALUES (?,?)")->execute(array($ben,$sen));
			if($abone_ol){
				echo 1;
			}else{
				echo 0;
			}
		}

	}


	// like & dislike

	if(post('type') == 'begeni'){

		$video_id = post("video_id");
		$uye_id = $_SESSION["uye_id"];
		$islem = post("islem");

		$video_kontrol = $db->query("SELECT * FROM video WHERE id = {$video_id}")->fetch(PDO::FETCH_ASSOC);
		if($video_kontrol){
			$suan = ben_begendim_mi($video_id);
			if($suan == 1 && $islem == 1){
				// like sil
				$like_sil = $db->exec("DELETE FROM begeni WHERE video_id = {$video_id} AND uye_id = {$uye_id}");
				echo 0;
			}elseif($suan == 1 && $islem == 2){
				// like sil + dislike ekle
				$like_sil = $db->exec("DELETE FROM begeni WHERE video_id = {$video_id} AND uye_id = {$uye_id}");
				$dislike_ekle = $db->prepare("INSERT INTO begeni (video_id,uye_id,islem) VALUES (?,?,?)")->execute(array($video_id,$uye_id,2));
				echo 2;
			}elseif($suan == 2 && $islem == 2){
				// dislike sil
				$dislike_sil = $db->exec("DELETE FROM begeni WHERE video_id = {$video_id} AND uye_id = {$uye_id}");
				echo 0;
			}elseif($suan == 2 &&  $islem == 1){
				// dislike sil + like ekle
				$dislike_sil = $db->exec("DELETE FROM begeni WHERE video_id = {$video_id} AND uye_id = {$uye_id}");
				$like_ekle = $db->prepare("INSERT INTO begeni (video_id,uye_id,islem) VALUES (?,?,?)")->execute(array($video_id,$uye_id,1));
				echo 1;
			}elseif($suan == 0 &&  $islem == 2){
				// dislike ekle
				$dislike_ekle = $db->prepare("INSERT INTO begeni (video_id,uye_id,islem) VALUES (?,?,?)")->execute(array($video_id,$uye_id,2));
				echo 2;
			}elseif($suan == 0 &&  $islem == 1){
				$like_ekle = $db->prepare("INSERT INTO begeni (video_id,uye_id,islem) VALUES (?,?,?)")->execute(array($video_id,$uye_id,1));
				echo 1;
			}
		}else{
			echo 0;
		}

	}

	// daha fazla video göster

	if(post('type') == 'daha_fazla_goster'){

		$sayfa = post("sayfa");
		$baslangic = post("baslangic");
		$adet = post("adet");
		

	}

}else{
	die("Erişim reddedildi!");
}