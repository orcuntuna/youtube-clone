<?php

$sayfaBasiVideo = 5;

if(get('s')){
	if(get('s') == "asc" || get('s') == "desc"){
		$siralama = "ORDER BY izlenme " . get('s');
	}else{
		$siralama = "ORDER BY izlenme DESC";
	}
}else{
	$siralama = "ORDER BY izlenme DESC";
}

$videolar = $db->query("SELECT * FROM video WHERE kanal = {$kanal_id} {$siralama} LIMIT {$sayfaBasiVideo}", PDO::FETCH_ASSOC);
if($videolar->rowCount()){
	?>
	<div class="tabust">
		<select class="siralama" id="populerSiralamaSelect" kanal_id="<?php echo $kanal_id; ?>">
			<option value="desc" <?php if(get('s') == "desc"){echo "selected";} ?>>En fazla izlenilen</option>
			<option value="asc" <?php if(get('s') == "asc"){echo "selected";} ?>>En az izlenilen</option>
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

<div class="eklenecekVideolar"></div>

<div class="clearfix"></div>

<?php if($videolar->rowCount() > $sayfaBasiVideo): ?>
<div class="dahafazla">
	<button class="dahaFazlaVideoKanal">Daha Fazla Yükle</button>
</div>
<?php endif; ?>

<script>
	var limit = <?php echo $sayfaBasiVideo; ?>;
	var mevcut = <?php echo $sayfaBasiVideo; ?>;
	var kanal = <?php echo $kanal_id; ?>;
	var order = '<?php echo get("s")=="asc" ? "asc" : "desc"; ?>';
	var order_by = 'izlenme';	
</script>