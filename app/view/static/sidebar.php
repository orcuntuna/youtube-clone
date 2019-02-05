<div class="sidebar" id="sidebar">
	<div class="sidebaric">
		<ul>
			<li<?php if($_url[0] == "index"){echo ' class="active"';} ?>><a href="<?php echo base_url(); ?>" title="anasayfa"><i class="fa fa-home"></i> Anasayfa</a></li>
			<li<?php if($_url[0] == "trend"){echo ' class="active"';} ?>><a href="<?php echo base_url('trend'); ?>" title="trendler"><i class="fa fa-gratipay"></i> Trendler</a></li>
			<li<?php if($_url[0] == "gecmis"){echo ' class="active"';} ?>><a href="<?php echo base_url('gecmis'); ?>" title="video geçmişi"><i class="fa fa-history"></i> Geçmiş</a></li>
			<li<?php if($_url[0] == "abonelikler"){echo ' class="active"';} ?>><a href="<?php echo base_url('abonelikler'); ?>" title="abonelikler"><i class="fa fa-address-book-o"></i> Abonelikler</a></li>
		</ul>

		<hr/>

		<label>Kitaplık</label>
		<ul>
			<?php
				$kategoriler = $db->query("SELECT * FROM kategoriler", PDO::FETCH_ASSOC);
				if($kategoriler->rowCount()){
					foreach ($kategoriler as $kategori) {
						?>
						<li><a href="<?php echo base_url('kategori?id='.$kategori['id']); ?>" title="<?php echo $kategori['isim']; ?>"><i class="fa fa-<?php echo $kategori['icon']; ?>"></i> <?php echo $kategori['isim']; ?></a></li>
						<?php
					}
				}
			?>
			
		</ul>

		<hr/>

		<label>Abonelikler</label>

		<?php if(uyelik_kontrol()): ?>

			<?php
			$uye_id = uyelik_kontrol();
			$abonelikler = $db->query("SELECT * FROM abone WHERE olan = {$uye_id}", PDO::FETCH_ASSOC);
			if($abonelikler->rowCount()){
				echo '<ul class="abonelikler">';
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

		<?php else: ?>
			<p>Henüz giriş yapmadınız, aboneliklerinizi görebilmek için <a href="<?php echo base_url('giris'); ?>" title="giriş yap">buraya tıklayarak giriş yapabilirsiniz.</a></p>
		<?php endif; ?>

	</div><!--sidebaric-->
</div><!--sidebar-->