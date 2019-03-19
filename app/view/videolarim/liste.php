	<div class="container">
		<?php include view('static/sidebar'); ?>
		<div class="site icerik">
			<div class="siteic">
				<div class="sabitsayfa">
					<div class="kutu">
						<form class="hesap" method="post" action="<?php echo base_url('hesabim'); ?>" enctype="multipart/form-data">
							
							<p class="kutubaslik">Video Yöneticisi</p>

							<table class="videolarim">
								<thead>
									<td>#</td>
									<td>Başlık</td>
									<td>Kategori</td>
									<td>Tarih</td>
									<td>Yorum</td>
									<td>İzlenme</td>
									<td>İşlem</td>
								</thead>
								<?php

								$kanal_id = $_SESSION["uye_id"];
								$videolarim = $db->query("SELECT * FROM video WHERE kanal = {$kanal_id} ORDER BY id DESC", PDO::FETCH_ASSOC);
								if($videolarim->rowCount()){
									foreach ($videolarim as $video) {
										?>
										<tr>
											<td class="ortala"><?php echo $video["id"]; ?></td>
											<td><a target="_blank" href="<?php echo video_url($video["id"]); ?>"><?php echo $video["baslik"]; ?></a></td>
											<td class="ortala"><?php echo kategori_bilgileri($video["kategori"], "isim"); ?></td>
											<td class="ortala"><?php echo date("d.m.Y", $video["tarih"]); ?></td>
											<td class="ortala"><?php echo yorum_sayisi($video["id"]); ?></td>
											<td class="ortala"><?php echo izlenme_bilgisi($video["izlenme"]); ?></td>
											<td class="ortala">
												<a href="<?php echo base_url('videolarim/duzenle/?id='.$video["id"]); ?>" class="duzenle">Düzenle</a>
												<a onclick="return confirm('Video silinsin mi?');" href="<?php echo base_url('videolarim/sil/?id='.$video["id"]); ?>" class="sil">Sil</a>
											</td>
										</tr>
										<?php
									}
								}else{
									echo '<tr><td class="ortala" colspan="7">Kanalınızda henüz hiç video mevcut değil.</td></tr>';
								}

								?>
							</table>

							<div class="clearfix"></div>

						</form>
					</div><!--kutu-->
				</div><!--sabitsayfa-->
			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->