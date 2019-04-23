	<div class="container">
		<?php include view('static/sidebar'); ?>
		<div class="site anasayfa">
			<div class="siteic">

				<?php 

				$uye_id = uyelik_kontrol();
				$abonelikler = $db->query("SELECT * FROM abone WHERE olan = {$uye_id}", PDO::FETCH_ASSOC);
				if($abonelikler->rowCount()){
					echo '<ul class="abonelikler abonelik-sayfasi">';
					foreach ($abonelikler as $kanalbilgi) {
						$abone_olunan_kanal_id = $kanalbilgi['olunan'];
						$kanal = $db->query("SELECT * FROM uyeler WHERE id = {$abone_olunan_kanal_id}")->fetch(PDO::FETCH_ASSOC);
						if($kanal){
							echo '<li><a href="'.kanal_url($kanal['id']).'" title="'.$kanal['kanal'].'"><img src="'.kanal_img($kanal['id']).'"><span>'.$kanal['kanal'].'</span></a></li>';
						}
					}
					echo '</ul>';
				}else{
					echo '<p>Henüz hiçbir kanala abone değilsiniz.</p>';
				}

				?>
				
			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->