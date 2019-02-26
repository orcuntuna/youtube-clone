<?php

$uyelik = uyelik_kontrol();
if(!$uyelik){
	redirect('giris?ref=yukle'); 
}

if($_POST){

	$baslik = post('baslik');
	$kategori = post('kategori');
	$aciklama = nl2br(post('aciklama'));

	if(!empty($baslik) && !empty($kategori) && !empty($aciklama) && !empty($_FILES['kapak']) && !empty($_FILES['video'])){

		$uye_id = uyelik_kontrol();
		// post sonrası yenileme için tekrar kayıt engeli
		$kontrol = $db->query("SELECT * FROM video WHERE baslik = '{$baslik}' && kanal = '{$uye_id}'")->fetch(PDO::FETCH_ASSOC);
		if(!$kontrol){

			$resim_uzantilar = array('image/png', 'image/x-png', 'image/jpg', 'image/jpeg');
			$video_uzantilar = array('video/mp4', 'video/avi');

			if(in_array(strtolower($_FILES['kapak']['type']), $resim_uzantilar)){

				if(in_array(strtolower($_FILES['video']['type']), $video_uzantilar)){

					$video_ekle = $db->prepare("INSERT INTO video SET baslik = ?, kategori = ?, aciklama = ?, tarih = ?, kanal = ?")->execute(array($baslik, $kategori, $aciklama, time(), $uye_id));
					if($video_ekle){

						$video_id = $db->lastInsertId();

						$resim_dizin = BASE_DIR . 'upload/kapak/';
						$resim_uzanti_parca = explode(".", $_FILES['kapak']['name']);
						$resim_uzanti = end($resim_uzanti_parca);
						$resim_hedef = $resim_dizin . md5($video_id) . '.' . $resim_uzanti;
						$resim_isim = md5($video_id) . '.' . $resim_uzanti;

						$video_dizin = BASE_DIR . 'upload/video/';
						$video_uzanti_parca = explode(".", $_FILES['video']['name']);
						$video_uzanti = end($video_uzanti_parca);
						$video_hedef = $video_dizin . md5($video_id) . '.' . $video_uzanti;
						$video_isim =  md5($video_id) . '.' . $video_uzanti;

						if(move_uploaded_file($_FILES['kapak']['tmp_name'], $resim_hedef)){

							if(move_uploaded_file($_FILES['video']['tmp_name'], $video_hedef)){

								$guncelle = $db->prepare("UPDATE video SET kapak = ?, video = ? WHERE id = {$video_id}")->execute(array($resim_isim, $video_isim));
								if($guncelle){

									$video_url = base_url('video?id='.$video_id);
									$basari = 'Video başarıyla yüklendi, <a href="'.$video_url.'">görüntülemek için buraya tıklayın.</a>';
									
								}else{
									$hata = 'Video işlenirken sorun oluştu';
								}

							}else{
								$hata = 'Video yüklenirken sorun oluştu';
							}

						}else{
							$hata = 'Kapak fotoğrafı yüklenirken sorun oluştu';
						}

					}else{
						$hata = 'Video yüklenirken bir sorun oluştu';
					}

				}else{
					$hata = 'Video sadece mp4 ve avi uzantılı olabilir';
				}

			}else{
				$hata = 'Kapak fotoğrafı sadece png ve jpg uzantılı olabilir';
			}

		}else{
			$hata = 'Bu videoyu zaten daha önce paylaştınız';
		}

	}else{
		$hata = 'Tüm alanları doldurunuz';
	}

}

include view('static/header');
include view('yukle');
include view('static/footer');