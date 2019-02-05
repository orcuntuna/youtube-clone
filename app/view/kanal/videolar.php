<?php

if(get('s')){
	if(get('s') == "asc" || get('s') == "desc"){
		$siralama = "ORDER BY tarih " . get('s');
	}else{
		$siralama = "ORDER BY tarih DESC";
	}
}else{
	$siralama = "ORDER BY tarih DESC";
}

$videolar = $db->query("SELECT * FROM video WHERE kanal = {$kanal_id} {$siralama}", PDO::FETCH_ASSOC);
if($videolar->rowCount()){
	?>
	<div class="tabust">
		<select class="siralama" id="videolarSiralamaSelect" kanal_id="<?php echo $kanal_id; ?>">
			<option value="desc" <?php if(get('s') == "desc"){echo "selected";} ?>>Yeniden eskiye sırala</option>
			<option value="asc" <?php if(get('s') == "asc"){echo "selected";} ?>>Eskiden yeniye sırala</option>
		</select>
	</div>
	<?php
	foreach($videolar as $video){
		
		?>
		<div class="kanalvideo">
			<div class="onizleme"><i class="fa fa-play-circle"></i></div>
			<div class="img">
			<a href="<?php echo base_url() . "video?id=" . $video["id"]; ?>" title="<?php echo $video["baslik"]; ?>"><img src="<?php echo base_url() . "upload/kapak/" . $video["kapak"]; ?>"></a>
			</div>
			<div class="baslik">
				<a href="<?php echo base_url() . "video?id=" . $video["id"]; ?>" title="<?php echo $video["baslik"]; ?>"><?php echo $video["baslik"]; ?></a>
			</div>
			<p><b>İzlenme: </b><?php echo izlenme_bilgisi($video["izlenme"]); ?><?php if(time() - $video['tarih'] < 86400){echo '<span class="yeni">yeni</span>';} ?></p>
			<p><b>Eklenme tarihi: </b><?php echo tarih_bilgisi($video["tarih"]); ?></p>
		</div><!--video-->
		<?php
	}
}else{
	echo "<p>Bu kanalda henüz bir video mevcut değil.</p>";
}
?>

<div class="clearfix"></div>