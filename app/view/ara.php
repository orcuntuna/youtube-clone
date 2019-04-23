	<div class="container">
		<?php include view('static/sidebar'); ?>
		<div class="site anasayfa">
			<div class="siteic">

				<div class="aramasonuclari">

					<h3>Arama sonuçları: <?php echo $bul; ?></h3>

					<?php
					$sonuclar = $db->query("SELECT * FROM video WHERE baslik LIKE '%{$bul}%' ORDER BY izlenme DESC LIMIT 30", PDO::FETCH_ASSOC);
					if($sonuclar->rowCount()){
						foreach ($sonuclar as $video) {
							?>

							<div class="kanalvideo">
								<div class="onizleme"><i class="fa fa-play-circle"></i></div>
								<div class="img">
								<a href="<?php echo base_url() . "video?id=" . $video["id"]; ?>" title="<?php echo $video["baslik"]; ?>"><img src="<?php echo base_url() . "upload/kapak/" . $video["kapak"]; ?>"></a>
								</div>
								<div class="baslik">
									<a href="<?php echo base_url() . "video?id=" . $video["id"]; ?>" title="<?php echo $video["baslik"]; ?>"><?php echo $video["baslik"]; ?></a>
								</div>
								<p><b>İzlenme: </b><?php echo izlenme_bilgisi($video["izlenme"]); ?><?php if(time() - $video['tarih'] < 86400){echo '<span class="yeni">yeni</span>';} ?></p>
								<p><b>Eklenme tarihi: </b><?php echo tarih_bilgisi($video["tarih"]); ?></p>
							</div><!--video-->

							<?php
						}
					}else{
						echo '<p>Bu arama için sonuç bulunamadı.</p>';
					}


					?>

				</div>
			
				
			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->