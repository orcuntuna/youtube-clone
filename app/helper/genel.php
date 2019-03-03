<?php

function gece_modu($css_dosya = ""){
	if(isset($_COOKIE["yt_gece_modu"])){

		if($_COOKIE["yt_gece_modu"] == 1){
			echo '<link rel="stylesheet" type="text/css" href="'.assets_url().'css/'.$css_dosya.'">';
		}else{
			return false;
		}

	}else{
		return false;
	}
}