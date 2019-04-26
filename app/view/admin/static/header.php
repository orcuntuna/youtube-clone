<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Yönetim Paneli</title>
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/admin.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('lib/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>font/roboto.css">
</head>
<body>

	<div class="site">
		
		<div class="sol">
			<div class="solic">
				<h2>Yönetim Paneli</h2>

				<ul>
					<li><a href="#"><i class="fa fa-dashboard"></i>Anasayfa</a></li>
					<li><a href="#"><i class="fa fa-cog"></i>Site Ayarları</a></li>
					<li><a href="#"><i class="fa fa-file"></i>Sayfalar</a></li>
					<li><a href="<?php echo base_url("admin/uyeler"); ?>"><i class="fa fa-user"></i>Üyeler</a></li>
					<li><a href="#"><i class="fa fa-tag"></i>Kategoriler</a></li>
					<li><a href="#"><i class="fa fa-play-circle"></i>Videolar</a></li>
					<li><a href="#"><i class="fa fa-comment"></i>Yorumlar</a></li>
					<li><a href="<?php echo base_url("admin/cikis"); ?>"><i class="fa fa-sign-out"></i>Çıkış Yap</a></li>
				</ul>
			</div>
		</div><!--sol-->

		<div class="sag">