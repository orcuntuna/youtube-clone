<?php

function izlenme_bilgisi($sayi){
    
    if(empty($sayi)){
        return "izlenme yok";
    }elseif($sayi < 1000){
        return $sayi;
    }elseif($sayi < 1000000){
        return floor($sayi / 1000) . " B";
    }else{
        return floor($sayi / 1000000) . " M";
    }

}


function tarih_bilgisi($sayi){
    $sayi = time() - $sayi;
    if($sayi < 3600){
        return "Şimdi";
    }elseif($sayi < 3600 * 24){
        
    }
}