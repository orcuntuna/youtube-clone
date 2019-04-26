<?php

yoneticilik();

$uyeler = $db->query("SELECT * FROM uyeler ORDER BY id DESC", PDO::FETCH_ASSOC);

include view("admin/static/header");
include view("admin/uyeler");
include view("admin/static/footer");