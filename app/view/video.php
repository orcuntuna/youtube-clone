<div class="container">
		<div class="videosayfa">
			<div class="site icerik sitevideo">
				<div class="siteic sayfavideo">

					<div class="playerdiv">
						<video id="player" playsinline controls autoplay>
						    <source src="<?php echo upload_url("video/".$vd["video"]); ?>" type="video/mp4">
						</video>
					</div><!--playerdiv-->

					<div class="videobaslik">
						<h1><?php echo htmlspecialchars(strip_tags(trim($vd["baslik"]))); ?> <span><i class="fa fa-eye"></i> <b><?php echo intval($vd["izlenme"]); ?></b> görüntülenme </span></h1>
					</div>

					<?php $kanal = kanal_bilgileri($vd["kanal"]); ?>

					<div class="videobilgi">
						<div class="kanalbilgi">
							<a href="<?php echo kanal_url($vd["kanal"]); ?>">
								<img src="<?php echo upload_url("profil/".$kanal["resim"]); ?>">
							</a>
							<div class="kanalbilgitext">
								<a href="<?php echo kanal_url($vd["kanal"]); ?>" class="kanalisim"><?php echo $kanal["kanal"]; ?> <?php if($kanal["dogrulanmis"] == 1){echo '<i title="Doğrulanmış Kanal" class="fa fa-check-circle"></i>';} ?></a>
								<span><?php echo date("d.m.Y",$vd["tarih"]); ?> tarihinde eklendi</span>
							</div>
						</div><!--kanalbilgi-->
						<div class="begenibilgi">
							<!-- a aktif class alıyor -->
							<script type="text/javascript">
								var begeni_suan = <?php echo ben_begendim_mi($vd["id"]); ?>;
								var begeni_like = <?php echo video_begeni_sayisi($vd["id"],"like"); ?>;
								var begeni_dislike = <?php echo video_begeni_sayisi($vd["id"],"dislike"); ?>;
							</script>
							<a href="javascript:void(0)" class="begenenler" id="begenenler"><i class="fa fa-question"></i></a>
							<a href="javascript:void(0)" onclick="begeni(<?php echo $vd['id']; ?>,1)" class="like <?php if(ben_begendim_mi($vd["id"]) == 1){echo 'likeactive';} ?>"><i class="fa fa-thumbs-up"></i> <?php echo video_begeni_sayisi($vd["id"],"like"); ?></a>
							<a href="javascript:void(0)" onclick="begeni(<?php echo $vd['id']; ?>,2)" class="dislike <?php if(ben_begendim_mi($vd["id"]) == 2){echo 'dislikeactive';} ?>"><i class="fa fa-thumbs-down"></i> <?php echo video_begeni_sayisi($vd["id"],"dislike"); ?></a>
						</div><!--begenibilgi-->
					</div><!--videobilgi-->

					<div class="clearfix"></div>

					<div class="videoaciklama">
						<div class="metin">
							<?php echo $vd["aciklama"]; ?>
						</div>
						<p class="devaminigor"><a href="javascript:void(0);">Devamını Göster</a></p>
					</div>

					<div class="clearfix"></div>

					<div class="yorumlar">

						<h3>Yorumlar (3)</h3>
						
						<div class="yeniyorum">
							<div class="yorumbox">
								<div class="yorumresim">
									<img src="assets/img/avatar.png" width="64" height="64">	
								</div>
								<div class="yorumic" onclick="videoya_yorum(12, 'Ozan Doğulu feat. Ece Seçkin - Sayın Seyirciler');">
									Herkese açık bir yorum ekle...
								</div>
							</div>
						</div><!--yeniyorum-->

						<div class="yorum">
							<div class="yorumbox">
								<div class="yorumresim">
									<a href="#"><img src="assets/img/avatar/7.jpg" width="45" height="45"></a>
								</div>
								<div class="yorumic">
									<a href="#" class="kanalisim">İsimsiz Fedai</a>
									<span>(+12)</span>
									<p>bu bir yorumdur haberiniz ola..</p>
									<a href="#" class="yorumbuton active"><i class="fa fa-thumbs-up"></i></a>
									<a href="#" class="yorumbuton"><i class="fa fa-thumbs-down"></i></a>
									<a href="#" class="yorumbuton">Yanıtla</a>
								</div>
							</div>
						</div><!--yorum-->

						<div class="yorum">
							<div class="yorumbox">
								<div class="yorumresim">
									<a href="#"><img src="assets/img/avatar/8.png" width="45" height="45"></a>
								</div>
								<div class="yorumic">
									<a href="#" class="kanalisim">Ayşe Oyunda</a>
									<span>(-5)</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum sed sapien at suscipit. Aliquam commodo nunc non bibendum gravida. Phasellus lectus libero, posuere vel bibendum a, consectetur vitae leo. Fusce ultricies tellus sit amet viverra porttitor. Morbi in arcu vel quam tempor malesuada. Duis convallis nunc nec nisl pulvinar, nec rhoncus velit vehicula.</p>
									<a href="#" class="yorumbuton"><i class="fa fa-thumbs-up"></i></a>
									<a href="#" class="yorumbuton active"><i class="fa fa-thumbs-down"></i></a>
									<a href="#" class="yorumbuton">Yanıtla</a>
								</div>
							</div>
						</div><!--yorum-->

						<div class="yorum">
							<div class="yorumbox">
								<div class="yorumresim">
									<a href="#"><img src="assets/img/avatar/1.jpg" width="45" height="45"></a>
								</div>
								<div class="yorumic">
									<a href="#" class="kanalisim">Arka Kural</a>
									<span>(0)</span>
									<p>Mükemmel şarkı harbiden helal olsun</p>
									<a href="#" class="yorumbuton"><i class="fa fa-thumbs-up"></i></a>
									<a href="#" class="yorumbuton"><i class="fa fa-thumbs-down"></i></a>
									<a href="#" class="yorumbuton">Yanıtla</a>
								</div>
							</div>
						</div><!--yorum-->

					</div><!--yorumlar-->
					
				</div><!--siteic-->
			</div><!--site-->

			<div class="sidebar sidebarvideo" id="sidebar">
				<div class="sidebaric">
					
					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

					<div class="onerilen">
						<div class="onizleme"><i class="fa fa-play-circle"></i></div>
						<a href="#" title="#"><img src="assets/img/video/1.jpg"></a>
						<div class="baslik">
							<a href="#" title="#">Oğuzhan Uğur feat Murat Dalkılıç - Mağlubiyet (Official Video)</a>
						</div>
						<p class="kanal"><a href="#" title="#">Poll Production</a></p>
					</div><!--onerilen-->

				</div><!--sidebaric-->
			</div><!--sidebar-->
		</div><!--videosayfa-->
		
	</div><!--container-->


	<div class="modal" id="modal">
		<div class="modalic">
			<div class="modalust">
				<h3>Yorum Ekle</h3>
				<a class="kapat"><i class="fa fa-times"></i></a>
			</div>
			<div class="modalicerik">
				<p class="yorumbilgi">Ahmet Kural kullanıcısına yanıt veriyorsunuz:</p>
				<form>
					<input type="hidden" name="tur" value="video">
					<input type="hidden" name="videoid" value="12">
					<!--
					<input type="hidden" name="tur" value="video">
					<input type="hidden" name="yorumid" value="13">
					-->
					<textarea placeholder="Yorumunuzu buraya giriniz. (Maks. 1.000 karakter)"></textarea>
					<div class="butonlar">
						<button type="reset" class="temizle">Temizle</button>
						<button type="submit" class="gonder">Gönder</button>
					</div>
				</form>
			</div>
		</div>
	</div><!--modal-->

	<div class="modal" id="modal_begenenler">
		<div class="modalic">
			<div class="modalust">
				<h3>Beğenenler Listesi</h3>
				<a class="kapat"><i class="fa fa-times"></i></a>
			</div>
			<div class="modalicerik">
				<div class="begenenler-liste">
				<?php

				$vid = $vd["id"];
				$begeni_liste = $db->query("SELECT * FROM begeni LEFT JOIN uyeler ON begeni.uye_id = uyeler.id WHERE video_id = {$vid} AND uyeler.id IS NOT NULL", PDO::FETCH_ASSOC);
				if($begeni_liste->rowCount()){
					foreach($begeni_liste as $begenen){
						?>

						<div class="begenen">
							<a class="kanalresim" href="<?php echo kanal_url($begenen["uye_id"]); ?>">
								<img src="<?php echo upload_url("profil/".$begenen["resim"]); ?>">
							</a>
							<a href="<?php echo kanal_url($begenen["uye_id"]); ?>" class="kanalisim"><?php echo $begenen["kanal"]; ?></a>
							<div class="islem">
								<?php
									if($begenen["islem"] == 1){
										echo '<i class="fa fa-thumbs-up yesil"></i>';
									}elseif($begenen["islem"] == 2){
										echo '<i class="fa fa-thumbs-down kirmizi"></i>';
									}
								?>
							</div>
						</div>

						<?php
					}
				}else{
					echo '<p>Bu videoyu henüz kimse beğenmedi.</p>';
				}

				
				?>
				</div>	
			</div>
		</div>
	</div><!--modal-->