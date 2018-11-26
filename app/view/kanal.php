	<div class="container">
		<?php include view('static/sidebar'); ?>
		<div class="site icerik">
			<div class="siteic">
				<div class="sabitsayfa">
					<div class="kutu">
						<div class="kanalsayfa">
							
							<div class="kanalust">
								<div class="kanalresim">
									<img src="<?php echo kanal_img($kn['id']); ?>">
								</div>
								<div class="kanalbilgi">
									<h1><?php echo $kn['kanal']; ?></h1>
									<p class="abonesayisi"><?php echo kanal_abone_sayisi($kn['id']); ?> abone</p>
								</div>
								<div class="aboneol">
									<a href="#!" class="aboneolbuton">Abone Ol <i class="fa fa-bell"></i></a>
									<!--<a href="#!" class="aboneolundubuton">Abone Olundu</a>-->
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="tabbaslik" id="tabbaslik">
								<ul>
									<li id="sekmeVideolar"><a href="javascript:void(0)">Videolar</a></li>
									<li id="sekmePopuler"><a href="javascript:void(0)">Popüler</a></li>
									<li id="sekmeHakkinda"><a href="javascript:void(0)">Hakkında</a></li>
									<li id="sekmeAnket"><a href="javascript:void(0)">Anket</a></li>
								</ul>
							</div>

							<div class="tabicerik" id="tabicerik">
								<div id="tabVideolar" class="tab">

								<div class="tabust">
									<select class="siralama">
										<option value="izlenme">Yeniden eskiye sırala</option>
										<option value="izlenme">Eskiden yeniye sırala</option>
									</select>
								</div>
								
								<?php
								$kanal_id = intval(get('id'));
								$videolar = $db->query("SELECT * FROM video WHERE kanal = {$kanal_id} ORDER BY tarih DESC", PDO::FETCH_ASSOC);
								if($videolar->rowCount()){
									foreach($videolar as $video){
										?>

										<div class="kanalvideo">
											<div class="onizleme"><i class="fa fa-play-circle"></i></div>
											<div class="img">
											<a href="<?php echo base_url() . "video/" . $video["id"]; ?>" title="<?php echo $video["baslik"]; ?>"><img src="<?php echo base_url() . "upload/kapak/" . $video["kapak"]; ?>"></a>
											</div>
											<div class="baslik">
												<a href="<?php echo base_url() . "video/" . $video["id"]; ?>" title="<?php echo $video["baslik"]; ?>"><?php echo $video["baslik"]; ?></a>
											</div>
											<p><b>İzlenme: </b><?php echo izlenme_bilgisi($video["izlenme"]); ?><span class="yeni">yeni</span></p>
											<p><b>Eklenme tarihi: </b><?php echo date("d.m.Y", $video["tarih"]); ?></p>
										</div><!--video-->

										<?php
									}
								}else{
									echo "<p>Bu kanalda henüz bir video mevcut değil.</p>";
								}

								?>

								<div class="clearfix"></div>
								
								</div>
								<div id="tabPopuler" class="tab">popular</div>
								<div id="tabHakkinda" class="tab">hakkinda</div>
								<div id="tabAnket" class="tab">anket</div>
							</div>

						</div><!--kanalsayfa-->
					</div><!--kutu-->
				</div><!--sabitsayfa-->
			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->