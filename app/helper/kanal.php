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