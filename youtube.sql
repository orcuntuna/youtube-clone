-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Şub 2019, 07:35:24
-- Sunucu sürümü: 10.1.30-MariaDB
-- PHP Sürümü: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `youtube`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abone`
--

CREATE TABLE `abone` (
  `id` int(11) NOT NULL,
  `olan` int(11) NOT NULL,
  `olunan` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `abone`
--

INSERT INTO `abone` (`id`, `olan`, `olunan`, `tarih`) VALUES
(39, 2, 1, '2019-02-07 18:43:56'),
(40, 1, 2, '2019-02-07 21:12:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `begeni`
--

CREATE TABLE `begeni` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `islem` int(11) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `begeni`
--

INSERT INTO `begeni` (`id`, `video_id`, `uye_id`, `islem`, `tarih`) VALUES
(113, 17, 2, 1, '2019-02-07 20:37:36'),
(117, 15, 2, 2, '2019-02-07 20:38:02'),
(120, 13, 2, 1, '2019-02-07 20:54:23'),
(121, 17, 1, 1, '2019-02-07 21:10:36'),
(135, 16, 1, 2, '2019-02-07 21:12:21'),
(139, 16, 2, 1, '2019-02-07 21:14:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `isim` varchar(128) NOT NULL,
  `icon` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `isim`, `icon`) VALUES
(1, 'Müzik', 'music'),
(2, 'Spor', 'futbol-o'),
(3, 'Eğlence', 'gift'),
(4, 'Gündem', 'file-text'),
(5, 'Oyun', 'gamepad'),
(6, 'Fragman', 'video-camera');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `kanal` varchar(128) NOT NULL,
  `isim` varchar(128) NOT NULL,
  `eposta` varchar(128) NOT NULL,
  `onay` int(1) NOT NULL DEFAULT '0',
  `resim` varchar(128) DEFAULT NULL,
  `aciklama` text,
  `hash` varchar(32) DEFAULT NULL,
  `sifre` varchar(32) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dogrulanmis` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kanal`, `isim`, `eposta`, `onay`, `resim`, `aciklama`, `hash`, `sifre`, `admin`, `tarih`, `dogrulanmis`) VALUES
(1, 'netd müzik', 'netd müzik', 'netd@gmail.com', 1, '1.jpg', 'resmi netd müzik youtube kanalı', 'a03098cfd60a8337babd2cf85f15db84', '25D55AD283AA400AF464C76D713C07AD', 0, '2018-10-14 11:43:47', 1),
(2, 'arkkod', 'Orçun', 'orcun.tuna@hotmail.com', 0, '2.png', 'arkkod yazılım bloğu resmi youtube kanalı\r\nE-posta: iletisim@arkkod.com \\\'aa\\\'z', '5851bf77fd2c9004a0a8fb979dafd378', '25D55AD283AA400AF464C76D713C07AD', 0, '2018-10-14 11:43:47', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL DEFAULT '0',
  `kanal` int(11) NOT NULL,
  `baslik` varchar(400) NOT NULL,
  `aciklama` text,
  `tarih` varchar(64) NOT NULL,
  `izlenme` int(11) NOT NULL DEFAULT '0',
  `kapak` varchar(64) NOT NULL,
  `video` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `video`
--

INSERT INTO `video` (`id`, `kategori`, `kanal`, `baslik`, `aciklama`, `tarih`, `izlenme`, `kapak`, `video`) VALUES
(11, 1, 1, 'Derya Uluğ - Canavar', 'Derya Uluğ, Canavar şarkısı için performansı ilk kez netd kanalında.', '1549403656', 15211, '6512bd43d9caa6e02c990b0a82652dca.jpg', '6512bd43d9caa6e02c990b0a82652dca.mp4'),
(12, 1, 1, 'Beyazıt Öztürk - Gemilerde Talim Var', 'Beyaz gemilerde talim var', '1549403922', 1, 'c20ad4d76fe97759aa27a0c99bff6710.jpg', 'c20ad4d76fe97759aa27a0c99bff6710.mp4'),
(13, 1, 1, 'Burak King - Koştum Hekime', 'burak king şarkısı', '1549403973', 1, 'c51ce410c124a10e0db5e4b97fc2af39.jpg', 'c51ce410c124a10e0db5e4b97fc2af39.mp4'),
(14, 1, 1, 'Eda Baba - Her şey seninle güzel', 'eda baba', '1549404076', 1, 'aab3238922bcc25a6f606eb525ffdc56.jpg', 'aab3238922bcc25a6f606eb525ffdc56.mp4'),
(15, 1, 1, 'IMERA - Sevdan ile feat Gaye Aksu', '', '1549404171', 1, '9bf31c7ff062936a96d3c8bd1f8f2ff3.jpg', '9bf31c7ff062936a96d3c8bd1f8f2ff3.mp4'),
(16, 1, 1, 'Merve Özbey - Vuracak', 'Merve özbey mükemmel vuracak şarkısı', '1549404245', 2, 'c74d97b01eae257e44aa9d5bade97baf.jpg', 'c74d97b01eae257e44aa9d5bade97baf.mp4'),
(17, 3, 2, 'deneme vdeo', 'sadsad<br />\r\nsadas<br />\r\ndas<br />\r\ndas<br />\r\nd<br />\r\nasd<br />\r\nasd<br />\r\nas<br />\r\ndas', '1549563536', 8, '70efdf2ec9b086079795c442636b55fb.jpg', '70efdf2ec9b086079795c442636b55fb.mp4');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abone`
--
ALTER TABLE `abone`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `begeni`
--
ALTER TABLE `begeni`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abone`
--
ALTER TABLE `abone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `begeni`
--
ALTER TABLE `begeni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
