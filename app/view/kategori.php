	<div class="container">
		<?php include view('static/sidebar'); ?>
		<div class="site anasayfa">
			<div class="siteic">

				<?php 

				if($kategori_videolar->rowCount()){
					foreach ($kategori_videolar as $av) {
						?>
						<div class="video">
							<div class="onizleme"><i class="fa fa-play-circle"></i></div>
							<a href="<?php echo base_url() . "video?id=" . $av["id"]; ?>" title="<?php echo $av["baslik"]; ?>"><img src="<?php echo upload_url('kapak/'.$av['kapak']); ?>"></a>
							<div class="baslik">
								<a href="<?php echo base_url() . "video?id=" . $av["id"]; ?>" title="<?php echo $av["baslik"]; ?>"><?php echo $av["baslik"]; ?></a>
							</div>
							<p class="kanal"><a href="<?php echo base_url() . "kanal?id=" . $av["kanal"]; ?>" title="<?php echo kanal_bilgileri($av["kanal"], "kanal"); ?>"><?php echo kanal_bilgileri($av["kanal"], "kanal"); ?> <?php if(kanal_bilgileri($av['kanal'],'dogrulanmis') == 1){echo '<i class="fa fa-check-circle-o"></i>';} ?></a></p>
						</div><!--video-->
						<?php
					}
				}else{
					echo '<p style="text-align:center;margin-top:15px;">Bu kategoride video mevcut değil.</p>';
				}

				?>
				
			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->