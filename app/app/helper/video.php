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

function video_begeni_sayisi($video_id,$tur){
    global $db;
    $video_kontrol = $db->query("SELECT * FROM video WHERE id = {$video_id}")->fetch(PDO::FETCH_ASSOC);
    if($video_kontrol){
        switch ($tur) {
            case 'like':
                $islem = 1;
                break;
            case 'dislike':
                $islem = 2;
                break;
            default:
                $islem = 0;
                break;
        }
        $begeni_sayisi = $db->query("SELECT COUNT(id) AS cevap FROM begeni WHERE video_id = {$video_id} AND islem = {$islem}")->fetch(PDO::FETCH_ASSOC);
        return $begeni_sayisi["cevap"];
    }else{
        return false;
    }
}

function video_izlenme_sayisi($video_id){
    global $db;
    $video_kontrol = $db->query("SELECT * FROM video WHERE id = {$video_id}")->fetch(PDO::FETCH_ASSOC);
    if($video_kontrol){
        return $video_kontrol["izlenme"];
    }else{
        return false;
    }
}

function video_izlenme_arttir($video_id){
    global $db;
    $video_kontrol = $db->query("SELECT * FROM video WHERE id = {$video_id}")->fetch(PDO::FETCH_ASSOC);
    if($video_kontrol){
        if(!isset($_COOKIE["izlendi_video_".$video_id])){
            $guncelle = $db->prepare("UPDATE video SET izlenme = ? WHERE id = ?")->execute(array($video_kontrol["izlenme"]+1,$video_id));
            if($guncelle){
                setcookie("izlendi_video_".$video_id, "1", time() + (86400 * 30), "/"); // 1 gün (izlendi_video_x) x: video_id
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function ben_begendim_mi($video_id){
    global $db;
    if(isset($_SESSION["uye_id"])){
        $uye_id = $_SESSION["uye_id"];
    }else{
        return 0;
    }
    $video_kontrol = $db->query("SELECT * FROM video WHERE id = {$video_id}")->fetch(PDO::FETCH_ASSOC);
    if($video_kontrol){
        $begeni_kontrol = $db->query("SELECT * FROM begeni WHERE video_id = {$video_id} AND uye_id = {$uye_id}")->fetch(PDO::FETCH_ASSOC);
        if($begeni_kontrol){
            return $begeni_kontrol["islem"];
        }
    }
    return 0;
}

function yorum_sayisi($video_id){
    global $db;
    $yorum_sayisi = $db->query("SELECT COUNT(yorum_id) AS sayi FROM yorum WHERE video_id = {$video_id}")->fetch(PDO::FETCH_ASSOC);
    if($yorum_sayisi){
        return $yorum_sayisi["sayi"];
    }else{
        return 0;
    }
}


function yorumu_ben_begendim_mi($yorum_id){
    global $db;
    if(isset($_SESSION["uye_id"])){
        $uye_id = $_SESSION["uye_id"];
    }else{
        return 0;
    }
    $yorum_kontrol = $db->query("SELECT * FROM yorum WHERE yorum_id = {$yorum_id}")->fetch(PDO::FETCH_ASSOC);
    if($yorum_kontrol){
        $begeni_kontrol = $db->query("SELECT * FROM yorum_begeni WHERE yorum_id = {$yorum_id} AND uye_id = {$uye_id}")->fetch(PDO::FETCH_ASSOC);
        if($begeni_kontrol){
            return $begeni_kontrol["islem"];
        }
    }
    return 0;
}