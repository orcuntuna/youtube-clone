<p class="kanalhakkindabaslik">Kanal Açıklaması</p>

<div class="kanalaciklama">
<?php

$aciklama = $db->query("SELECT * FROM uyeler WHERE id = {$kanal_id}")->fetch(PDO::FETCH_ASSOC);
if($aciklama["aciklama"]){
	echo stripslashes(nl2br(trim($aciklama["aciklama"])));
}else{
	echo "Kanal açıklaması henüz girilmemiş.";
}

?>
</div>

<div class="clearfix"></div>