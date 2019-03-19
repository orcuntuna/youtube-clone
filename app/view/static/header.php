<!DOCTYPE html>
<html lang="tr">
<head>
	<title>YouTube <?php if(!empty($title)){echo ' - '.$title;} ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="description" content="Youtube Ödevi">
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>css/grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>css/site.css">
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>lib/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>/lib/plyr/plyr.css">
	<link rel="icon" type="image/png" href="<?php echo assets_url(); ?>img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<?php gece_modu("dark.css"); ?>
</head>
<body>

	<div class="ustmenu">
		<div class="container">
			
			<div class="logo">
				<a href="<?php echo base_url(); ?>" title="anasayfa">
					<img src="<?php echo assets_url(); ?>img/logo.png" alt="logo">
				</a>
			</div><!--logo-->

			<div class="ara">
				<form method="get" action="<?php echo base_url('ara'); ?>">
					<input type="text" id="q" name="q" placeholder="Video aramak için giriniz..">
					<button class="submit"><i class="fa fa-search"></i></button>
				</form>
				<div class="arama-onerileri"></div>
			</div><!--ara-->

			<div class="giris">
				
				<a class="buton" href="<?php echo base_url('yukle'); ?>" title="video yükle"><i class="fa fa-upload"></i></a>
				<?php if(uyelik_kontrol()): ?>
					<a class="buton hesabimbuton" onclick="hesabim()" href="javascript:void(0)" title="hesabım"><?php $uye=uye_bilgileri(uyelik_kontrol()); echo $uye['kanal']; ?></a>
				<?php else: ?>
					<a class="buton" href="<?php echo base_url('giris'); ?>" title="üyelik">Üyelik</a>
				<?php endif; ?>
				
				<div class="hesabim">
					<a href="<?php echo base_url('kanal?id='.$uye['id']); ?>">Kanalım</a>
					<a href="<?php echo base_url('hesabim'); ?>">Hesap Ayarları</a>
					<a href="<?php echo base_url('videolarim'); ?>">Video Yöneticisi</a>
					<?php
						if(isset($_COOKIE["yt_gece_modu"])){
							echo '<a id="gecemodu_buton" href="javascript:void(0)">Gündüz Modu</a>';
						}else{
							echo '<a id="gecemodu_buton" href="javascript:void(0)">Gece Modu</a>';
						}
					?>
					<a href="<?php echo base_url('cikis'); ?>">Çıkış Yap</a>
				</div>

			</div><!--giris-->

		</div><!--container-->
	</div><!--ustmenu-->

	<div class="clearfix"></div>