	<div class="container">
		<?php include view('static/sidebar'); ?>
		<div class="site icerik">
			<div class="siteic">
				<div class="sabitsayfa">
					<div class="kutu">
						<form class="hesap" method="post" action="<?php echo base_url('hesabim'); ?>" enctype="multipart/form-data">
							
							<p class="kutubaslik">Hesap Bilgileriniz</p>

							<?php if(isset($hata)): ?>
							<div class="hata">
								<i class="fa fa-exclamation-triangle"></i>
								<?php echo $hata; ?>
							</div>
							<?php endif; ?>

							<?php if(isset($basari)): ?>
							<div class="basari">
								<i class="fa fa-check-circle"></i>
								<?php echo $basari; ?>
							</div>
							<?php endif; ?>

							<div class="grup grupsol">
								<label>Adınız Soyadınız <span>(*)</span></label>
								<input type="text" name="isim" value="<?php echo $uye['isim']; ?>" required>
							</div>

							<div class="grup grupsag">
								<label>Kanal İsmi <span>(*)</span></label>
								<input type="text" name="kanal" value="<?php echo $uye['kanal']; ?>" required>
							</div>

							<div class="grup">
								<label>E-Posta Adresiniz <span>(Değiştirilemez)</span></label>
								<input type="text" value="<?php echo $uye['eposta']; ?>" disabled>
							</div>

							<div class="grup grupresimli">
								<div class="grupresim"><img src="<?php echo kanal_img($uye['id']); ?>"></div>
								<div class="grupicerik">
									<label>Kanal Profil Fotoğrafı <span>(250x250 - png, jpg)</span></label>
									<input type="file" name="resim" accept="image/*">
								</div>
							</div>

							<div class="grup">
								<label>Kanal Açıklaması</label>
								<textarea rows="5" name="aciklama"><?php echo stripslashes(str_replace(array('<br>','<br/>'), "\n", $uye['aciklama'])); ?></textarea>
							</div>

							<div class="grup grupsol">
								<label>Şifre <span>(Minimum 8 karakter)</span></label>
								<input type="password" name="sifre" placeholder="Şifrenizi değiştirmek istiyorsanız doldurun">
							</div>

							<div class="grup grupsag">
								<label>Şifre <span>(Tekrar)</span></label>
								<input type="password" name="sifre2" placeholder="Şifrenizi değiştirmek istiyorsanız doldurun">
							</div>

							<div class="grup">
								<button type="submit" value="submit">Hesap Bilgilerini Güncelle</button>	
							</div>

							<div class="clearfix"></div>

						</form>
					</div><!--kutu-->
				</div><!--sabitsayfa-->
			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->