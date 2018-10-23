<?php

unset($_SESSION['uye_giris']);
unset($_SESSION['uye_id']);
unset($_COOKIE['yt_hash']);
unset($_COOKIE['yt_eposta']);
setcookie("yt_hash", "", time()-3600);
setcookie("yt_eposta", "", time()-3600);
session_destroy();
redirect();
