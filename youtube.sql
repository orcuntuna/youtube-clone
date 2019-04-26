-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2019 at 08:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `abone`
--

CREATE TABLE `abone` (
  `id` int(11) NOT NULL,
  `olan` int(11) NOT NULL,
  `olunan` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `abone`
--

INSERT INTO `abone` (`id`, `olan`, `olunan`, `tarih`) VALUES
(40, 1, 2, '2019-02-07 21:12:43'),
(47, 3, 1, '2019-03-14 20:24:28'),
(48, 4, 3, '2019-03-14 20:44:04'),
(49, 4, 1, '2019-03-14 20:44:07'),
(51, 2, 4, '2019-03-15 07:27:05'),
(53, 2, 6, '2019-03-15 07:57:34'),
(56, 2, 5, '2019-03-21 17:34:36'),
(57, 2, 3, '2019-04-22 16:19:51'),
(59, 2, 1, '2019-04-23 15:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `eposta` varchar(64) NOT NULL,
  `sifre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `eposta`, `sifre`) VALUES
(1, 'orcun.tuna@outlook.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `anket`
--

CREATE TABLE `anket` (
  `id` int(11) NOT NULL,
  `soru_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `kanal_id` int(11) NOT NULL,
  `puan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anket`
--

INSERT INTO `anket` (`id`, `soru_id`, `uye_id`, `kanal_id`, `puan`) VALUES
(1, 1, 2, 1, 1),
(2, 2, 2, 1, 0),
(3, 3, 2, 1, 1),
(4, 4, 2, 1, 0),
(41, 1, 1, 1, 1),
(42, 2, 1, 1, 1),
(43, 3, 1, 1, 0),
(44, 4, 1, 1, 0),
(45, 1, 1, 6, 0),
(46, 2, 1, 6, 1),
(47, 3, 1, 6, 1),
(48, 4, 1, 6, 0),
(49, 1, 1, 2, 1),
(50, 2, 1, 2, 1),
(51, 3, 1, 2, 1),
(52, 4, 1, 2, 0),
(53, 1, 2, 6, 0),
(54, 2, 2, 6, 1),
(55, 3, 2, 6, 0),
(56, 4, 2, 6, 1),
(57, 1, 2, 5, 1),
(58, 2, 2, 5, 1),
(59, 3, 2, 5, 1),
(60, 4, 2, 5, 0),
(61, 1, 1, 5, 1),
(62, 2, 1, 5, 1),
(63, 3, 1, 5, 0),
(64, 4, 1, 5, 1),
(65, 1, 2, 3, 0),
(66, 2, 2, 3, 1),
(67, 3, 2, 3, 0),
(68, 4, 2, 3, 1),
(69, 1, 2, 4, 1),
(70, 2, 2, 4, 0),
(71, 3, 2, 4, 1),
(72, 4, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `begeni`
--

CREATE TABLE `begeni` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `islem` int(11) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `begeni`
--

INSERT INTO `begeni` (`id`, `video_id`, `uye_id`, `islem`, `tarih`) VALUES
(113, 17, 2, 1, '2019-02-07 20:37:36'),
(117, 15, 2, 2, '2019-02-07 20:38:02'),
(120, 13, 2, 1, '2019-02-07 20:54:23'),
(121, 17, 1, 1, '2019-02-07 21:10:36'),
(135, 16, 1, 2, '2019-02-07 21:12:21'),
(160, 23, 3, 1, '2019-03-14 20:32:06'),
(161, 41, 2, 1, '2019-03-20 10:51:27'),
(169, 34, 2, 1, '2019-03-22 18:20:49'),
(175, 16, 2, 1, '2019-04-22 16:17:34'),
(176, 26, 2, 1, '2019-04-22 16:18:54'),
(177, 37, 2, 2, '2019-04-22 16:18:55'),
(178, 25, 2, 1, '2019-04-22 16:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `gecmis`
--

CREATE TABLE `gecmis` (
  `id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gecmis`
--

INSERT INTO `gecmis` (`id`, `uye_id`, `video_id`, `tarih`, `unix`) VALUES
(6, 1, 49, '2019-03-20 10:33:28', 1553078008),
(7, 1, 48, '2019-03-20 10:33:39', 1553078019),
(8, 1, 45, '2019-03-20 10:33:42', 1553078022),
(9, 2, 49, '2019-03-20 10:33:55', 1553078035),
(10, 2, 11, '2019-03-20 10:34:26', 1553078066),
(11, 2, 41, '2019-03-20 10:50:16', 1553079016),
(12, 2, 16, '2019-03-20 10:52:02', 1553079122),
(13, 2, 33, '2019-03-20 10:52:43', 1553079163),
(14, 2, 32, '2019-03-20 10:56:21', 1553079381),
(15, 2, 29, '2019-03-20 10:56:29', 1553079389),
(16, 2, 49, '2019-03-21 17:31:03', 1553189463),
(17, 2, 28, '2019-03-21 17:31:16', 1553189476),
(18, 2, 39, '2019-03-21 17:31:29', 1553189489),
(19, 2, 48, '2019-03-21 17:31:36', 1553189496),
(20, 2, 35, '2019-03-21 17:32:00', 1553189520),
(21, 2, 42, '2019-03-21 17:34:24', 1553189664),
(22, 1, 49, '2019-03-21 17:35:52', 1553189752),
(23, 1, 48, '2019-03-21 17:36:12', 1553189772),
(24, 2, 41, '2019-03-22 12:22:13', 1553257333),
(25, 2, 36, '2019-03-22 12:22:24', 1553257344),
(26, 2, 16, '2019-03-22 12:22:51', 1553257371),
(27, 2, 44, '2019-03-22 12:24:57', 1553257497),
(28, 2, 32, '2019-03-22 12:25:05', 1553257505),
(29, 2, 22, '2019-03-22 12:25:07', 1553257507),
(30, 2, 27, '2019-03-22 12:25:21', 1553257521),
(31, 2, 37, '2019-03-22 17:33:19', 1553275999),
(32, 2, 39, '2019-03-22 17:37:49', 1553276269),
(33, 2, 15, '2019-03-22 17:45:18', 1553276718),
(34, 2, 34, '2019-03-22 17:50:11', 1553277011),
(35, 2, 26, '2019-03-22 17:53:38', 1553277218),
(36, 2, 35, '2019-03-22 17:57:16', 1553277436),
(37, 2, 11, '2019-03-22 18:10:03', 1553278203),
(38, 2, 28, '2019-03-22 18:13:26', 1553278406),
(39, 2, 49, '2019-03-22 18:37:48', 1553279868),
(40, 2, 48, '2019-03-22 18:55:33', 1553280933),
(41, 2, 13, '2019-03-22 19:04:14', 1553281454),
(42, 2, 29, '2019-03-22 19:04:49', 1553281489),
(43, 2, 30, '2019-03-22 19:08:56', 1553281736),
(44, 2, 28, '2019-03-25 21:14:08', 1553548448),
(45, 2, 37, '2019-03-29 08:13:25', 1553847205),
(46, 2, 49, '2019-03-30 11:51:41', 1553946701),
(47, 2, 28, '2019-03-30 11:52:44', 1553946764),
(48, 2, 48, '2019-03-30 11:53:47', 1553946827),
(49, 2, 16, '2019-03-30 11:54:07', 1553946847),
(50, 2, 34, '2019-03-30 11:54:07', 1553946847),
(51, 2, 37, '2019-04-15 16:29:38', 1555345778),
(52, 2, 29, '2019-04-22 13:08:20', 1555938500),
(53, 2, 36, '2019-04-22 13:10:08', 1555938608),
(54, 2, 16, '2019-04-22 13:11:09', 1555938669),
(55, 2, 49, '2019-04-22 13:11:48', 1555938708),
(56, 2, 26, '2019-04-22 16:17:00', 1555949820),
(57, 2, 27, '2019-04-22 16:17:15', 1555949835),
(58, 2, 11, '2019-04-22 16:17:21', 1555949841),
(59, 2, 48, '2019-04-22 16:18:45', 1555949925),
(60, 2, 37, '2019-04-22 16:18:55', 1555949935),
(61, 2, 25, '2019-04-22 16:18:57', 1555949937),
(62, 2, 39, '2019-04-22 16:19:02', 1555949942),
(63, 2, 23, '2019-04-22 16:19:43', 1555949983),
(64, 2, 12, '2019-04-22 16:20:02', 1555950002),
(65, 1, 49, '2019-04-22 16:23:20', 1555950200),
(66, 1, 16, '2019-04-22 16:23:26', 1555950206),
(67, 1, 14, '2019-04-22 16:23:29', 1555950209),
(68, 1, 13, '2019-04-22 16:23:30', 1555950210),
(69, 1, 12, '2019-04-22 16:23:32', 1555950212),
(70, 1, 11, '2019-04-22 16:23:33', 1555950213),
(71, 1, 15, '2019-04-22 16:23:34', 1555950214),
(72, 1, 34, '2019-04-22 16:23:37', 1555950217),
(73, 1, 28, '2019-04-22 16:23:38', 1555950218),
(74, 1, 26, '2019-04-22 16:24:39', 1555950279),
(75, 1, 31, '2019-04-23 16:04:37', 1556035477),
(76, 2, 11, '2019-04-23 16:20:20', 1556036420),
(77, 2, 49, '2019-04-23 16:23:42', 1556036622),
(78, 2, 16, '2019-04-23 16:27:34', 1556036854),
(79, 2, 36, '2019-04-23 16:31:15', 1556037075),
(80, 2, 36, '2019-04-25 16:08:58', 1556208538),
(81, 2, 35, '2019-04-25 16:19:08', 1556209148),
(82, 2, 12, '2019-04-25 16:23:33', 1556209413),
(83, 2, 11, '2019-04-25 16:25:05', 1556209505),
(84, 2, 49, '2019-04-25 13:28:27', 1556198907),
(85, 2, 25, '2019-04-25 13:32:19', 1556199139),
(86, 2, 39, '2019-04-25 13:36:52', 1556199412),
(87, 2, 14, '2019-04-25 13:39:55', 1556199595),
(88, 2, 13, '2019-04-25 13:51:29', 1556200289),
(89, 2, 28, '2019-04-25 13:55:07', 1556200507),
(90, 2, 48, '2019-04-25 14:47:57', 1556203677),
(91, 2, 27, '2019-04-25 14:55:23', 1556204123),
(92, 2, 37, '2019-04-25 15:19:37', 1556205577),
(93, 2, 15, '2019-04-25 15:24:28', 1556205868),
(94, 2, 16, '2019-04-25 15:24:36', 1556205876);

-- --------------------------------------------------------

--
-- Table structure for table `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `isim` varchar(128) NOT NULL,
  `icon` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategoriler`
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
-- Table structure for table `uyeler`
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
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dogrulanmis` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`id`, `kanal`, `isim`, `eposta`, `onay`, `resim`, `aciklama`, `hash`, `sifre`, `tarih`, `dogrulanmis`) VALUES
(1, 'netd müzik', 'netd müzik', 'netd@gmail.com', 1, '1.jpg', 'resmi netd müzik youtube kanalı', 'b3da4ba28712dcc99e9b99a54fc08193', '25D55AD283AA400AF464C76D713C07AD', '2018-10-14 11:43:47', 1),
(2, 'arkkod', 'Orçun', 'orcun.tuna@hotmail.com', 0, '2.jpg', 'arkkod yazılım bloğu resmi youtube kanalı\r\nE-posta: iletisim@arkkod.com \\\'aa\\\'z', 'a673ef3a02e342e731092c7b365ccf44', '25D55AD283AA400AF464C76D713C07AD', '2018-10-14 11:43:47', 0),
(3, 'Show Haber', 'show haber', 'showhaber@gmail.com', 0, '3.png', 'Show tv resmi youtube kanalı', '0137d46689413ebaafe7508fc2d63dd0', '25d55ad283aa400af464c76d713c07ad', '2019-03-14 20:21:24', 1),
(4, 'Sıla VEVO', 'Sıla Gençoğlu', 'silavevo@gmail.com', 0, '4.jpg', '', 'aaac7a21f4d0989916e57da4853e0816', '25d55ad283aa400af464c76d713c07ad', '2019-03-14 20:33:07', 1),
(5, 'Oyun Arşivi', 'Oyun arşivi', 'oyunarsivi@gmail.com', 0, '5.jpg', '', 'd40202263d2ed34fe2df049b175fa313', '25d55ad283aa400af464c76d713c07ad', '2019-03-14 20:48:56', 0),
(6, 'TRT SPOR', 'TRT Spor', 'trtspor@gmail.com', 0, '6.jpg', '', '71627258915bd1f741b0b9f3c401baff', '25d55ad283aa400af464c76d713c07ad', '2019-03-15 07:48:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
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
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `kategori`, `kanal`, `baslik`, `aciklama`, `tarih`, `izlenme`, `kapak`, `video`) VALUES
(11, 1, 1, 'Derya Uluğ - Canavar', 'Derya Uluğ, Canavar şarkısı için performansı ilk kez netd kanalında.', '1549403656', 15217, '6512bd43d9caa6e02c990b0a82652dca.jpg', '6512bd43d9caa6e02c990b0a82652dca.mp4'),
(12, 1, 1, 'Beyazıt Öztürk - Gemilerde Talim Var', 'Beyaz gemilerde talim var', '1549403922', 4, 'c20ad4d76fe97759aa27a0c99bff6710.jpg', 'c20ad4d76fe97759aa27a0c99bff6710.mp4'),
(13, 1, 1, 'Burak King - Koştum Hekime', 'burak king şarkısı', '1549403973', 5, 'c51ce410c124a10e0db5e4b97fc2af39.jpg', 'c51ce410c124a10e0db5e4b97fc2af39.mp4'),
(14, 1, 1, 'Eda Baba - Her şey seninle güzel', 'eda baba', '1549404076', 4, 'aab3238922bcc25a6f606eb525ffdc56.jpg', 'aab3238922bcc25a6f606eb525ffdc56.mp4'),
(15, 1, 1, 'IMERA - Sevdan ile feat Gaye Aksu', '', '1549404171', 5, '9bf31c7ff062936a96d3c8bd1f8f2ff3.jpg', '9bf31c7ff062936a96d3c8bd1f8f2ff3.mp4'),
(16, 1, 1, 'Merve Özbey - Vuracak', 'Merve özbey mükemmel vuracak şarkısı', '1549404245', 12, 'c74d97b01eae257e44aa9d5bade97baf.jpg', 'c74d97b01eae257e44aa9d5bade97baf.mp4'),
(18, 4, 3, 'Bu ismi taşıyan sadece 3 kişi var', 'Bu ismi taşıyan sadece 3 kişi var', '1552595313', 0, '6f4922f45568161a8cdf4ad2299f6d23.png', '6f4922f45568161a8cdf4ad2299f6d23.mp4'),
(19, 4, 3, '11 yaşındaki çocuk doğum yaptı', '11 yaşındaki çocuk doğum yaptı', '1552595340', 0, '1f0e3dad99908345f7439f8ffabdffc4.png', '1f0e3dad99908345f7439f8ffabdffc4.mp4'),
(20, 4, 3, 'Makyaj gitti aşk bitti', 'Makyaj gitti aşk bitti', '1552595414', 0, '98f13708210194c475687be6106a3b84.png', '98f13708210194c475687be6106a3b84.mp4'),
(21, 4, 3, 'Utangaç gelin damadı çıldırttı', 'Utangaç gelin damadı çıldırttı', '1552595449', 1, '3c59dc048e8850243be8079a5c74d079.png', '3c59dc048e8850243be8079a5c74d079.mp4'),
(22, 4, 3, 'Hırsız boksöre tosladı', 'Hırsız boksöre tosladı', '1552595471', 2, 'b6d767d2f8ed5d21a44b0e5886680cb9.png', 'b6d767d2f8ed5d21a44b0e5886680cb9.mp4'),
(23, 4, 3, 'Şaka olduğunu anlayınca sunucuyu dövdü', 'Şaka olduğunu anlayınca sunucuyu dövdü', '1552595491', 2, '37693cfc748049e45d87b8c7d8b9aacd.png', '37693cfc748049e45d87b8c7d8b9aacd.mp4'),
(25, 1, 4, 'Sila - Yabanci (Official Music Video)', 'Sila - Yabanci (Official Music Video)', '1552596292', 4, '8e296a067a37563370ded05f5a3bf3ec.jpg', '8e296a067a37563370ded05f5a3bf3ec.mp4'),
(26, 1, 4, 'Sila - Reverans (Official Music Video)', 'Sila - Reverans (Official Music Video)', '1552596353', 3, '4e732ced3463d06de0ca9a15b6153677.jpg', '4e732ced3463d06de0ca9a15b6153677.mp4'),
(27, 1, 4, 'Sila - Oluruna Bırak (Official Music VIdeo)', 'Sila - Oluruna Bırak (Official Music VIdeo)', '1552596418', 4, '02e74f10e0327ad868d138f2b4fdd6f0.jpg', '02e74f10e0327ad868d138f2b4fdd6f0.mp4'),
(28, 1, 4, 'Sila - Engerek (Official Music Video)', 'Sila - Engerek (Official Music Video)', '1552596463', 7, '33e75ff09dd601bbe69f351039152189.jpg', '33e75ff09dd601bbe69f351039152189.mp4'),
(29, 5, 5, 'Xantares CS:GO En Güzel Vuruşları', 'Xantares CS:GO En Güzel Vuruşları', '1552596608', 3, '6ea9ab1baa0efb9e19094440c317e21b.jpg', '6ea9ab1baa0efb9e19094440c317e21b.mp4'),
(30, 5, 5, 'PUBG: wtcn ve mithrain kapışıyor', 'PUBG: wtcn ve mithrain kapışıyor', '1552596659', 1, '34173cb38f07f89ddbebc2ac9128303f.jpg', '34173cb38f07f89ddbebc2ac9128303f.mp4'),
(31, 5, 5, 'PES 2018 EN Güzel Goller ve Şutlar', 'PES 2018 EN Güzel Goller ve Şutlar', '1552596711', 1, 'c16a5320fa475530d9583c34fd356ef5.jpg', 'c16a5320fa475530d9583c34fd356ef5.mp4'),
(32, 5, 5, 'Fortnite Turnuvasının Önemli Anları', 'Fortnite Turnuvasının Önemli Anları', '1552596811', 3, '6364d3f0f495b6ab9dcf8d3b5c6e0b01.jpg', '6364d3f0f495b6ab9dcf8d3b5c6e0b01.mp4'),
(33, 5, 5, 'Half-Life Dünya Şampiyonu UNLOST Oynayışı', 'Half-Life Dünya Şampiyonu UNLOST', '1552596865', 2, '182be0c5cdcd5072bb1864cdee4d3d6e.jpg', '182be0c5cdcd5072bb1864cdee4d3d6e.mp4'),
(34, 1, 1, 'Çağla - Saz mı caz mı?', 'Çağla - Saz mı caz mı?', '1552635602', 4, 'e369853df766fa44e1ed0ff613f563bd.jpg', 'e369853df766fa44e1ed0ff613f563bd.mp4'),
(35, 1, 1, 'Yüzük - Oğuzhan Koç Official Video', 'yüzük', '1552635712', 4, '1c383cd30b7c298ab50293adfecb7b18.jpg', '1c383cd30b7c298ab50293adfecb7b18.mp4'),
(36, 1, 1, 'Mabel Matiz - Öyle Kolaysa', 'Mabel Matiz - Öyle Kolaysa', '1552635801', 5, '19ca14e7ea6328a42e0eb13d585e4c22.jpg', '19ca14e7ea6328a42e0eb13d585e4c22.mp4'),
(37, 1, 1, 'Göksel - Aşkın Yalanmış', 'Göksel - Aşkın Yalanmış', '1552635834', 5, 'a5bfc9e07964f8dddeb95fc584cd965d.jpg', 'a5bfc9e07964f8dddeb95fc584cd965d.mp4'),
(39, 1, 1, 'Sancak - Düşün Ki', 'Sancak - Düşün Ki düzenlendi', '1552635929', 5, 'd67d8ab4f4c10bf22aa353e27879133c.jpg', 'd67d8ab4f4c10bf22aa353e27879133c.mp4'),
(41, 2, 6, 'Beşiktaş 3-2 Konyaspor Maç Özeti', 'Beşiktaş 3-2 Konyaspor Maç Özeti', '1552636170', 3, '3416a75f4cea9109507cacd8e2f2aefc.Jpeg', '3416a75f4cea9109507cacd8e2f2aefc.mp4'),
(42, 2, 6, 'Bursaspor 1 - 3 Trabzonspor #Özet', 'Bursaspor 1 - 3 Trabzonspor #Özet', '1552636207', 1, 'a1d0c6e83f027327d8461063f4ac58a6.jpg', 'a1d0c6e83f027327d8461063f4ac58a6.mp4'),
(43, 2, 6, 'Hatayspor 4-2 Galatasaray - Maç Özeti Tüm Golleri', 'Hatayspor 4-2 Galatasaray - Maç Özeti Tüm Golleri', '1552636249', 2, '17e62166fc8586dfa4d1bc0e1742c08b.jpg', '17e62166fc8586dfa4d1bc0e1742c08b.mp4'),
(44, 2, 6, 'Fenerbahçe 0-1 Ümraniyespor Maç Özeti', 'Fenerbahçe 0-1 Ümraniyespor Maç Özeti', '1552636313', 4, 'f7177163c833dff4b38fc8d2872f1ec6.jpg', 'f7177163c833dff4b38fc8d2872f1ec6.mp4'),
(45, 2, 6, 'M. Başakşehir 3 - 2 Kasımpaşa #Özet', 'M. Başakşehir 3 - 2 Kasımpaşa #Özet', '1552636361', 1, '6c8349cc7260ae62e3b1396831a8398f.jpg', '6c8349cc7260ae62e3b1396831a8398f.mp4'),
(48, 1, 1, 'BÖ - Unutursun', 'BÖ - Unutursun', '1552769785', 4, '642e92efb79421734881b53e1e1b18b6.jpg', '642e92efb79421734881b53e1e1b18b6.mp4'),
(49, 1, 1, 'Mor ve Ötesi - Cambaz', 'cambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıicambaz şarkısıi', '1552769820', 5, 'f457c545a9ded88f18ecee47145a72c0.jpg', 'f457c545a9ded88f18ecee47145a72c0.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `yorum`
--

CREATE TABLE `yorum` (
  `yorum_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `etiket` int(11) NOT NULL DEFAULT '0',
  `yorum` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yorum`
--

INSERT INTO `yorum` (`yorum_id`, `uye_id`, `video_id`, `parent_id`, `etiket`, `yorum`, `tarih`) VALUES
(1, 2, 16, 0, 0, 'gerçekten çok güzel bir parça olmuş', '2019-02-23 17:01:22'),
(2, 1, 16, 1, 0, 'biz yaptık olacak o kadar', '2019-02-24 10:27:49'),
(3, 1, 16, 0, 0, 'hoşunuza gittiyse beğenmeyi unutmayın :)', '2019-02-24 10:52:44'),
(7, 2, 16, 1, 1, 'tebrik ederim :)', '2019-02-24 11:51:45'),
(8, 2, 17, 0, 0, 'deneme yorum', '2019-03-01 07:50:11'),
(11, 2, 16, 1, 2, 'test', '2019-03-08 08:40:28'),
(12, 2, 16, 1, 0, 'sadsadsa', '2019-03-08 08:40:40'),
(15, 3, 23, 0, 0, 'deneme yapıyoruz', '2019-03-14 20:32:02'),
(16, 4, 23, 0, 0, 'iyi dövmüş', '2019-03-14 20:33:31'),
(17, 4, 12, 0, 0, 'günaydın', '2019-03-14 20:41:38'),
(18, 2, 16, 0, 0, 'ttttt', '2019-04-25 15:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `yorum_begeni`
--

CREATE TABLE `yorum_begeni` (
  `begeni_id` int(11) NOT NULL,
  `yorum_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `islem` int(11) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yorum_begeni`
--

INSERT INTO `yorum_begeni` (`begeni_id`, `yorum_id`, `uye_id`, `islem`, `tarih`) VALUES
(1, 1, 2, 1, '2019-02-24 11:36:33'),
(2, 2, 2, 1, '2019-02-24 11:36:33'),
(11, 7, 2, 1, '2019-03-03 11:31:18'),
(12, 15, 3, 1, '2019-03-14 20:32:05'),
(13, 18, 2, 1, '2019-04-25 15:24:54'),
(14, 3, 2, 1, '2019-04-25 15:24:56'),
(15, 11, 2, 0, '2019-04-25 15:24:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abone`
--
ALTER TABLE `abone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anket`
--
ALTER TABLE `anket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `begeni`
--
ALTER TABLE `begeni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gecmis`
--
ALTER TABLE `gecmis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Indexes for table `yorum_begeni`
--
ALTER TABLE `yorum_begeni`
  ADD PRIMARY KEY (`begeni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abone`
--
ALTER TABLE `abone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anket`
--
ALTER TABLE `anket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `begeni`
--
ALTER TABLE `begeni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `gecmis`
--
ALTER TABLE `gecmis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `yorum`
--
ALTER TABLE `yorum`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `yorum_begeni`
--
ALTER TABLE `yorum_begeni`
  MODIFY `begeni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
