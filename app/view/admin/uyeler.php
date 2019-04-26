<h1 class="baslik">Üyeler</h1>

<div class="kart">
	<div class="kartbaslik">
		Üye Listesi
		<i class="fa fa-caret-down kartkapat"></i>
	</div>
	<div class="kartic">
		<table>
			<thead>
			
				<td>#</td>
				<td>Kanal</td>
				<td>İsim</td>
				<td>E-posta</td>
				<td>Kayıt</td>
				<td>Video</td>
				<td>Durum</td>
				<td>İşlem</td>
			
			</thead>
			<tbody>
				<?php

				if($uyeler->rowCount()){
					foreach($uyeler as $uye){
						?>

						<tr>
							<td><?php echo $uye["id"]; ?></td>
							<td><?php echo $uye["kanal"]; ?></td>
							<td><?php echo $uye["isim"]; ?></td>
							<td><?php echo $uye["eposta"]; ?></td>
							<td><?php echo date("d.m.Y", strtotime($uye["tarih"])); ?></td>
							<td><?php echo video_sayisi($uye["id"]); ?></td>
							<td><?php if($uye["dogrulanmis"]){echo '<i title="Doğrulanmış Kanal" class="fa fa-check-circle"></i>';}else{echo '<i title="Doğrulanmamış Kanal" class="fa fa-times"></i>';} ?></td>
							<td class="islem">
								<a target="_blank" href="<?php echo kanal_url($uye["id"]); ?>"><i class="fa fa-eye"></i></a>
								<a href="#"><i class="fa fa-pencil-square-o"></i></a>
								<a href="#"><i class="fa fa-trash"></i></a>
							</td>
						</tr>

						<?php
					}
				}

				?>
			</tbody>
		</table>
	</div>
</div>

