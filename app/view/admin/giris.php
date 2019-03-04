<!doctype html>
<html lang="tr">
	<head>
		<title>Yönetim Paneli</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo assets_url('css/admin.css'); ?>">
		<link rel="stylesheet" href="<?php echo assets_url('lib/font-awesome/css/font-awesome.min.css'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	</head>
	<body class="giris">
		<div class="kutu">
			<div class="logo">
				<img src="<?php echo assets_url('img/logo.png'); ?>" alt="">
			</div>
			<form action="<?php echo base_url("admin/giris"); ?>" method="post">
				<input type="hidden" value="1" name="giris">
				<input type="email" name="eposta" placeholder="E-Posta" required <?php if(isset($eposta)){echo 'value="'.$eposta.'"'; } ?>>
				<input type="password" name="parola" placeholder="Parola" required>
				<button>Giriş Yap</button>
			</form>
			
			<?php

			if(isset($hata)){
				echo '<div class="hata"><i class="fa fa-exclamation-triangle"></i> '.$hata.'</div>';
			}

			?>

		</div>
	</body>
</html>