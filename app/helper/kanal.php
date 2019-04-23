<?php

function kanal_bilgileri($kanal_id,$col=null){
    global $db;
    $kanal_kontrol = $db->query("SELECT * FROM uyeler WHERE id = {$kanal_id}")->fetch(PDO::FETCH_ASSOC);
    if($kanal_kontrol){
        if($col){
            return $kanal_kontrol[$col];
        }else{
            return $kanal_kontrol;
        }
    }else{
        return false;
    }
}

function kanal_resim($kanal_id){
    global $db;
    $kanal_kontrol = $db->query("SELECT * FROM uyeler WHERE id = {$kanal_id}")->fetch(PDO::FETCH_ASSOC);
    if($kanal_kontrol["resim"]){
        if(!empty($kanal_kontrol["resim"])){
            return upload_url("profil/".$kanal_kontrol["resim"]);
        }else{
            return upload_url("profil/default.png");
        }
    }else{
        return upload_url("profil/default.png");
    }
}

function anket_sonuc($kanal_id, $soru_id){
    global $db;
    $tum_anketler = $db->query("SELECT COUNT(*) AS sayi FROM anket WHERE kanal_id = {$kanal_id} AND soru_id = {$soru_id}")->fetch(PDO::FETCH_ASSOC);
    $pozitif_anketler = $db->query("SELECT COUNT(*) AS sayi FROM anket WHERE kanal_id = {$kanal_id} AND soru_id = {$soru_id} AND puan = 1")->fetch(PDO::FETCH_ASSOC);
    if($tum_anketler["sayi"] > 0){
        $oran = $pozitif_anketler["sayi"] / $tum_anketler["sayi"];
        $yuzde = round($oran * 100);
        return $yuzde;
    }else{
        return 0;
    }
}

function anket_cevap($kanal_id, $soru_id, $uye_id){
    global $db;
    if(uyelik_kontrol()){
        $puan = $db->query("SELECT puan FROM anket WHERE kanal_id = {$kanal_id} AND soru_id = {$soru_id} AND uye_id = {$uye_id}")->fetch(PDO::FETCH_ASSOC);
        if($puan){
            if($puan["puan"] == 1){
                echo "<span>(Cevabınız: Evet)</span>";
            }else{
                echo "<span>(Cevabınız: Hayır)</span>";
            }
        }
    }
}