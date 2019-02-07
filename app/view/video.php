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

					<div class="videobilgi">
						<div class="kanalbilgi">
							<a href="#">
								<img src="assets/img/kanal/netd.jpg">
							</a>
							<div class="kanalbilgitext">
								<a href="#" class="kanalisim">netd müzik <i class="fa fa-check-circle"></i></a>
								<span>07.10.2018 tarihinde eklendi</span>
							</div>
						</div><!--kanalbilgi-->
						<div class="begenibilgi">
							<!-- a aktif class alıyor -->
							<a href="#" class="like"><i class="fa fa-thumbs-up"></i> 137</a>
							<a href="#" class="dislike"><i class="fa fa-thumbs-down"></i> 24</a>
						</div><!--begenibilgi-->
					</div><!--videobilgi-->

					<div class="clearfix"></div>

					<div class="videoaciklama">
						<div class="metin">
							Ece Seçkin'in, DGL & DMC etiketiyle yayınlanan "Dibine Dibine" isimli tekli çalışması, video klibiyle netd müzik'te.
							<br>"Dibine Dibine" şarkı sözleri ile
							<br><br>Sanki olmasan yaşayamam şu koca dünyada
							<br>Sabrı bir şekilde veriyor emin ol bana allah
							<br>	
							<br>Bir alttan bir üstten giriyor
							<br>Orda burada dolanıyor
							<br>Gidiyor suyumdan bu ara
							<br>Yine kafalar sanıyor
							<br>Of of nasıl sıkıldım senin o dilinden
							<br>
							<br>Bundan sonra seyret sen görücen şimdi beni de
							<br>Gezicem tozucam eğlenicem vurucam dibine dibine 
							<br>Yatıcan kalkıcan merak edicen sorucan nereye
							<br>Gidiyorum cehennemin ta dibine
							<br>Gelcen mi?
							<br>
							<br>netd müzik, Facebook'ta, http://bit.ly/ndm-facebook
							<br>aynı zamanda Twitter'da, http://bit.ly/ndm-twitter
							<br>bir de Instagram'da! http://bit.ly/ndm-insta
							<br>ve Spotify'da: http://spoti.fi/2GbWAEx
							<br>peki YouTube kanalımıza abone oldunuz mu? http://bit.ly/2d8ihWS
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