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
									<a href="#!" class="aboneolbuton">Abone Ol</a>
									<!--<a href="#!" class="aboneolundubuton">Abone Olundu</a>-->
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="tabbaslik">
								<ul>
									<li class="active" id="tabVideolar"><a href="#">Videolar</a></li>
									<li id="tabPopuler"><a href="#">Popüler</a></li>
									<li id="tabHakkinda"><a href="#">Hakkında</a></li>
									<li id="tabAnket"><a href="#">Anket</a></li>
								</ul>
							</div>

							<div class="tabicerik">
								<div class="tabVideolar">videolar</div>
								<div class="tabPopular">popular</div>
								<div class="tabHakkinda">hakkinda</div>
								<div class="tabAnket">anket</div>
							</div>

						</div><!--kanalsayfa-->
					</div><!--kutu-->
				</div><!--sabitsayfa-->
			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->