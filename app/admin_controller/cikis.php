<?php

$_SESSION["yonetici_id"] = false;
$_SESSION["yonetici_eposta"] = false;

unset($_SESSION["yonetici_id"]);
unset($_SESSION["yonetici_eposta"]);

session_destroy();

redirect("admin");
die();
