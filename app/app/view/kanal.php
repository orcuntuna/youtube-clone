

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
									<h1><?php echo $kn['kanal']; ?> <?php if($kn["dogrulanmis"] == 1){echo '<i title="Doğrulanmış Kanal" class="fa fa-check-circle"></i>';} ?></h1>
									<p class="abonesayisi"><?php echo kanal_abone_sayisi($kn['id']); ?> abone</p>
								</div>
								<div class="aboneol" id="kanal_abonelik_butonlar">
									<!--<a href="#!" class="aboneolbuton">Abone Ol <i class="fa fa-bell"></i></a>-->
									<!--<a href="#!" class="aboneolundubuton">Abone Olundu</a>-->
									<?php

									if(isset($uye)){
										if($kn['id'] == $uye['id']){
											echo '<a href="'.base_url("hesabim").'" class="aboneolundubuton">Kanalı Düzenle</a>';
										}else{
											$abone_olan_id = $_SESSION["uye_id"];
											$abone_olunan_id = $kanal_id;
											$abonelik_kontrol = $db->query("SELECT * FROM abone WHERE olan = {$abone_olan_id} AND olunan = {$abone_olunan_id}")->fetch(PDO::FETCH_ASSOC);
											if($abonelik_kontrol){
												echo '<a href="javascript:void(0)" class="aboneolundubuton" id="kanal_abonelikten_cik" kanal_id="'.$abone_olunan_id.'">Abonelikten Çık</a>';
											}else{
												echo '<a href="javascript:void(0)" class="aboneolbuton" id="kanal_abone_ol" kanal_id="'.$abone_olunan_id.'">Abone Ol <i class="fa fa-bell"></i></a>';
											}
										}
									}

									?>
								</div>
							</div>

							<div class="clearfix"></div>
							<div class="tabbaslik" id="tabbaslik">
								<ul>
									<li id="sekmeVideolar" class="<?php if(!empty($_url[1])){if($_url[1] == 'v'){echo 'active';}} ?>"><a href="<?php echo base_url('kanal/v/?id='.$kanal_id)?>">Videolar</a></li>
									<li id="sekmePopuler" class="<?php if(!empty($_url[1])){if($_url[1] == 'p'){echo 'active';}} ?>"><a href="<?php echo base_url('kanal/p/?id='.$kanal_id)?>">Popüler</a></li>
									<li id="sekmeHakkinda" class="<?php if(!empty($_url[1])){if($_url[1] == 'h'){echo 'active';}} ?>"><a href="<?php echo base_url('kanal/h/?id='.$kanal_id)?>">Hakkında</a></li>
									<li id="sekmeAnket" class="<?php if(!empty($_url[1])){if($_url[1] == 'a'){echo 'active';}} ?>"><a href="<?php echo base_url('kanal/a/?id='.$kanal_id)?>">Anket</a></li>
								</ul>
							</div>

							<div class="tabicerik" id="tabicerik">
								<div id="tabVideolar" class="tab <?php if(!empty($_url[1])){if($_url[1] == 'v'){echo 'active';}} ?>">
									<?php if(!empty($_url[1])){if($_url[1] == 'v'){ include view('kanal/videolar'); }} ?>
								</div>
								<div id="tabPopuler" class="tab <?php if(!empty($_url[1])){if($_url[1] == 'p'){echo 'active';}} ?>">
									<?php if(!empty($_url[1])){if($_url[1] == 'p'){ include view('kanal/populer'); }} ?>
								</div>
								<div id="tabHakkinda" class="tab <?php if(!empty($_url[1])){if($_url[1] == 'h'){echo 'active';}} ?>">
									<?php if(!empty($_url[1])){if($_url[1] == 'h'){ include view('kanal/hakkinda'); }} ?>
								</div>
								<div id="tabAnket" class="tab <?php if(!empty($_url[1])){if($_url[1] == 'a'){echo 'active';}} ?>">anket</div>
							</div>

						</div><!--kanalsayfa-->
					</div><!--kutu-->
				</div><!--sabitsayfa-->
			</div><!--siteic-->
		</div><!--site-->
	</div><!--container-->