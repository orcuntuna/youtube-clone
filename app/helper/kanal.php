<?php

function izlenme_bilgisi($sayi){ 
    if(empty($sayi)){
        return "izlenme yok";
    }elseif($sayi < 1000){
        return $sayi;
    }elseif($sayi < 1000000){
        return floor($sayi / 1000) . " B";
    }else{
        return floor($sayi / 1000000) . " Milyon";
    }
}

function tarih_bilgisi($sayi){
    $sayi = time() - $sayi;
    if($sayi < 3600){
        return "Şimdi";
    }elseif($sayi < 3600 * 24){
        return floor($sayi / 3600) . " saat önce";
    }elseif($sayi < 3600 * 24 * 30){
        return floor($sayi / (3600 * 24)) . " gün önce";
    }elseif($sayi < 3600 * 24 * 30 * 12){
        return floor($sayi / (3600 * 24 * 30)) . " ay önce";
    }else{
        return floor($sayi / (3600 * 24 * 30 * 12)) . " yıl önce";
    }
}