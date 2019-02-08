<?php

// Site adres bilgisi (sonda / olup olmaması fark etmez)
$config['site_url'] = 'http://localhost/youtube/';

// Yüklenecek helper dosyaları
$config['helpers'] = array('url','form','uyelik','kanal','video');

// Veritabanı bağlantı bilgileri
$config['db'] = array(
	'host' => 'localhost',
	'dbname' => 'youtube',
	'user' => 'root',
	'pass' => ''
);