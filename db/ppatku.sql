-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 10:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppatku`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama`, `id_kecamatan`) VALUES
(1, 'Banjarkulon', 1),
(2, 'Banjarmangu', 1),
(3, 'Beji', 1),
(4, 'Gripit', 1),
(5, 'Jenggawur', 1),
(6, 'Kalilunjar', 1),
(7, 'Kendaga', 1),
(8, 'Kesenet', 1),
(9, 'Majatengah', 1),
(10, 'Paseh', 1),
(11, 'Pekandangan', 1),
(12, 'Prendengan', 1),
(13, 'Rejasari', 1),
(14, 'Sigeblog', 1),
(15, 'Sijenggung', 1),
(16, 'Sijeruk', 1),
(17, 'Sipedang', 1),
(18, 'Ampelsari', 2),
(19, 'Argasoka', 2),
(20, 'Cendana', 2),
(21, 'Karangtengah', 2),
(22, 'Krandegan', 2),
(23, 'Kuta Banjarnegara', 2),
(24, 'Parakancanggah', 2),
(25, 'Semampir', 2),
(26, 'Semarang', 2),
(27, 'Sokanandi', 2),
(28, 'Sokayasa', 2),
(29, 'Tlagawera', 2),
(30, 'Wangon', 2),
(31, 'Bakal', 3),
(32, 'Batur', 3),
(33, 'Dieng Kulon', 3),
(34, 'Karangtengah', 3),
(35, 'Kepakisan', 3),
(36, 'Pasurenan', 3),
(37, 'Pekasiran', 3),
(38, 'Sumberejo', 3),
(39, 'Bandingan', 4),
(40, 'Bawang', 4),
(41, 'Binorong', 4),
(42, 'Blambangan', 4),
(43, 'Depok', 4),
(44, 'Gemuruh', 4),
(45, 'Joho', 4),
(46, 'Kebondalem', 4),
(47, 'Kutayasa', 4),
(48, 'Majalengka', 4),
(49, 'Mantrianom', 4),
(50, 'Masaran', 4),
(51, 'Pucang', 4),
(52, 'Serang', 4),
(53, 'Wanadri', 4),
(54, 'Watuurip', 4),
(55, 'Winong', 4),
(56, 'Wiramastra', 4),
(57, 'Asinan', 5),
(58, 'Bedana', 5),
(59, 'Gununglangit', 5),
(60, 'Kalibening', 5),
(61, 'Kalibombong', 5),
(62, 'Kalisat Kidul', 5),
(63, 'Karang Anyar', 5),
(64, 'Kasinoman', 5),
(65, 'Kertasari', 5),
(66, 'Majatengah', 5),
(67, 'Plorengan', 5),
(68, 'Sembawa', 5),
(69, 'Sidakangen', 5),
(70, 'Sikumpul', 5),
(71, 'Sirukem', 5),
(72, 'Sirukun', 5),
(73, 'Ambal', 6),
(74, 'Binangun', 6),
(75, 'Gumelar', 6),
(76, 'Jlegong', 6),
(77, 'Karanggondang', 6),
(78, 'Karangkobar', 6),
(79, 'Leksana', 6),
(80, 'Pagerpelah', 6),
(81, 'Pasuruhan', 6),
(82, 'Paweden', 6),
(83, 'Purwodadi', 6),
(84, 'Sampang', 6),
(85, 'Slatri', 6),
(86, 'Bantarwaru', 7),
(87, 'Blitar', 7),
(88, 'Clapar', 7),
(89, 'Dawuhan', 7),
(90, 'Gununggiana', 7),
(91, 'Kaliurip', 7),
(92, 'Karanganyar', 7),
(93, 'Kenteng', 7),
(94, 'Kutayasa', 7),
(95, 'Limbangan', 7),
(96, 'Madukara', 7),
(97, 'Pagelak', 7),
(98, 'Pakelen', 7),
(99, 'Pekauman', 7),
(100, 'Penawangan', 7),
(101, 'Petambakan', 7),
(102, 'Rakitan', 7),
(103, 'Rejasa', 7),
(104, 'Sered', 7),
(105, 'Talunamba', 7),
(106, 'Banjengan', 8),
(107, 'Blimbing', 8),
(108, 'Candiwulan', 8),
(109, 'Glempang', 8),
(110, 'Jalatunda', 8),
(111, 'Kaliwungu', 8),
(112, 'Kebakalan', 8),
(113, 'Kebanaran', 8),
(114, 'Kertayasa', 8),
(115, 'Mandiraja Kulon', 8),
(116, 'Mandiraja Wetan', 8),
(117, 'Panggisari', 8),
(118, 'Purwasaba', 8),
(119, 'Salamerta', 8),
(120, 'Simbang', 8),
(121, 'Somawangi', 8),
(122, 'Duren', 9),
(123, 'Gentansari', 9),
(124, 'Gunungjati', 9),
(125, 'Kebutuhduwur', 9),
(126, 'Kebutuhjurang', 9),
(127, 'Lebakwangi', 9),
(128, 'Pagedongan', 9),
(129, 'Pesangkalan', 9),
(130, 'Twelagiri', 9),
(131, 'Aribaya', 10),
(132, 'Babadan', 10),
(133, 'Gumingsir', 10),
(134, 'Kalitlaga', 10),
(135, 'Karangnangka', 10),
(136, 'Karekan', 10),
(137, 'Kasmaran', 10),
(138, 'Kayuares', 10),
(139, 'Larangan', 10),
(140, 'Majasari', 10),
(141, 'Metawana', 10),
(142, 'Nagasari', 10),
(143, 'Pagentan', 10),
(144, 'Plumbungan', 10),
(145, 'Sokaraja', 10),
(146, 'Tegaljeruk', 10),
(147, 'Beji', 11),
(148, 'Lawen', 11),
(149, 'Pandanarum', 11),
(150, 'Pasegeran', 11),
(151, 'Pingit Lor', 11),
(152, 'Pringamba', 11),
(153, 'Sinduaji', 11),
(154, 'Sirongge', 11),
(155, 'Beji', 12),
(156, 'Biting', 12),
(157, 'Condong Campur', 12),
(158, 'Darmayasa', 12),
(159, 'Gembol', 12),
(160, 'Giritirta', 12),
(161, 'Grogol', 12),
(162, 'Kalilunjar', 12),
(163, 'Karangsari', 12),
(164, 'Panusupan', 12),
(165, 'Pegundungan', 12),
(166, 'Pejawaran', 12),
(167, 'Ratamba', 12),
(168, 'Sarwodadi', 12),
(169, 'Semangkung', 12),
(170, 'Sidengok', 12),
(171, 'Tlahap', 12),
(172, 'Badakarya', 13),
(173, 'Bondolharjo', 13),
(174, 'Danakerta', 13),
(175, 'Jembangan', 13),
(176, 'Karangsari', 13),
(177, 'Kecepit', 13),
(178, 'Klapa', 13),
(179, 'Mlaya', 13),
(180, 'Petuguran', 13),
(181, 'Punggelan', 13),
(182, 'Purwasana', 13),
(183, 'Sambong', 13),
(184, 'Sawangan', 13),
(185, 'Sidarata', 13),
(186, 'Tanjungtirta', 13),
(187, 'Tlaga', 13),
(188, 'Tribuana', 13),
(189, 'Danaraja', 14),
(190, 'Gumiwang', 14),
(191, 'Kaliajir', 14),
(192, 'Kalipelus', 14),
(193, 'Kalitengah', 14),
(194, 'Karanganyar', 14),
(195, 'Kutawuluh', 14),
(196, 'Merden', 14),
(197, 'Mertasari', 14),
(198, 'Parakan', 14),
(199, 'Petir', 14),
(200, 'Pucungbedug', 14),
(201, 'Purwonegoro', 14),
(202, 'Kalilandak', 15),
(203, 'Kalimandi', 15),
(204, 'Kaliwinasuh', 15),
(205, 'Kecitran', 15),
(206, 'Klampok', 15),
(207, 'Pagak', 15),
(208, 'Purworejo', 15),
(209, 'Sirkandi', 15),
(210, 'Adipasir', 16),
(211, 'Badamita', 16),
(212, 'Bandingan', 16),
(213, 'Gelang', 16),
(214, 'Kincang', 16),
(215, 'Lengkong', 16),
(216, 'Luwung', 16),
(217, 'Pingit', 16),
(218, 'Rakit', 16),
(219, 'Situwangi', 16),
(220, 'Tanjunganom', 16),
(221, 'Bandingan', 17),
(222, 'Bojanegara', 17),
(223, 'Gembongan', 17),
(224, 'Kalibenda', 17),
(225, 'Karangmangu', 17),
(226, 'Kemiri', 17),
(227, 'Panawaren', 17),
(228, 'Prigi', 17),
(229, 'Pringamba', 17),
(230, 'Randegan', 17),
(231, 'Sawal', 17),
(232, 'Sigaluh', 17),
(233, 'Singomerto', 17),
(234, 'Tunggara', 17),
(235, 'Wanacipta', 17),
(236, 'Berta', 18),
(237, 'Brengkok', 18),
(238, 'Derik', 18),
(239, 'Dermasari', 18),
(240, 'Gumelem Kulon', 18),
(241, 'Gumelem Wetan', 18),
(242, 'Karangjati', 18),
(243, 'Karangsalam', 18),
(244, 'Kedawung', 18),
(245, 'Kemranggon', 18),
(246, 'Pakikiran', 18),
(247, 'Panerusan Kulon', 18),
(248, 'Panerusan Wetan', 18),
(249, 'Piasa Wetan', 18),
(250, 'Susukan', 18),
(251, 'Gumingsir', 19),
(252, 'Kandangwangi', 19),
(253, 'Karangjambe', 19),
(254, 'Karangkemiri', 19),
(255, 'Kasalib', 19),
(256, 'Lemahjaya', 19),
(257, 'Linggasari', 19),
(258, 'Medayu', 19),
(259, 'Tapen', 19),
(260, 'Wanadadi', 19),
(261, 'Wanakarsa', 19),
(262, 'Balun', 20),
(263, 'Bantar', 20),
(264, 'Dawuhan', 20),
(265, 'Jatilawang', 20),
(266, 'Karangtengah', 20),
(267, 'Kasimpar', 20),
(268, 'Kubang', 20),
(269, 'Legoksayem', 20),
(270, 'Pagergunung', 20),
(271, 'Pandansari', 20),
(272, 'Penanggungan', 20),
(273, 'Pesantren', 20),
(274, 'Susukan', 20),
(275, 'Suwidak', 20),
(276, 'Tempuran', 20),
(277, 'Wanaraja', 20),
(278, 'Wanayasa', 20);

-- --------------------------------------------------------

--
-- Table structure for table `desa_`
--

CREATE TABLE `desa_` (
  `id` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`) VALUES
(1, 'Banjarmangu'),
(2, 'Banjarnegara'),
(3, 'Batur'),
(4, 'Bawang'),
(5, 'Kalibening'),
(6, 'Karangkobar'),
(7, 'Madukara'),
(8, 'Mandiraja'),
(9, 'Pagedongan'),
(10, 'Pagentan'),
(11, 'Padanarum'),
(12, 'Pajewaran'),
(13, 'Punggelan'),
(14, 'Purwanegara'),
(15, 'Purworejo Klampok'),
(16, 'Rakit'),
(17, 'Sigaluh'),
(18, 'Susukan'),
(19, 'Wanadadi'),
(20, 'Wanayas');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan_`
--

CREATE TABLE `kecamatan_` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id` int(5) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `reg_sertipikat` int(5) DEFAULT NULL,
  `jenis_berkas` varchar(100) NOT NULL,
  `id_proses` int(5) NOT NULL,
  `status_proses` int(5) NOT NULL,
  `nama_penjual` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `biaya` int(12) DEFAULT NULL,
  `dp` int(8) DEFAULT NULL,
  `tot_biaya` int(9) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `berkas_selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_desa_`
--

CREATE TABLE `tb_desa_` (
  `kd_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kd_kec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_desa_`
--

INSERT INTO `tb_desa_` (`kd_desa`, `nama_desa`, `kd_kec`) VALUES
(1, 'Banjarkulon', 1),
(2, 'Banjarmangu', 1),
(3, 'Beji', 1),
(4, 'Gripit', 1),
(5, 'Jenggawur', 1),
(6, 'Kalilunjar', 1),
(7, 'Kendaga', 1),
(8, 'Kesenet', 1),
(9, 'Majatengah', 1),
(10, 'Paseh', 1),
(11, 'Pekandangan', 1),
(12, 'Prendengan', 1),
(13, 'Rejasari', 1),
(14, 'Sigeblog', 1),
(15, 'Sijenggung', 1),
(16, 'Sijeruk', 1),
(17, 'Sipedang', 1),
(18, 'Ampelsari', 2),
(19, 'Argasoka', 2),
(20, 'Cendana', 2),
(21, 'Karangtengah', 2),
(22, 'Krandegan', 2),
(23, 'Kuta Banjarnegara', 2),
(24, 'Parakancanggah', 2),
(25, 'Semampir', 2),
(26, 'Semarang', 2),
(27, 'Sokanandi', 2),
(28, 'Sokayasa', 2),
(29, 'Tlagawera', 2),
(30, 'Wangon', 2),
(31, 'Bakal', 3),
(32, 'Batur', 3),
(33, 'Dieng Kulon', 3),
(34, 'Karangtengah', 3),
(35, 'Kepakisan', 3),
(36, 'Pasurenan', 3),
(37, 'Pekasiran', 3),
(38, 'Sumberejo', 3),
(39, 'Bandingan', 4),
(40, 'Bawang', 4),
(41, 'Binorong', 4),
(42, 'Blambangan', 4),
(43, 'Depok', 4),
(44, 'Gemuruh', 4),
(45, 'Joho', 4),
(46, 'Kebondalem', 4),
(47, 'Kutayasa', 4),
(48, 'Majalengka', 4),
(49, 'Mantrianom', 4),
(50, 'Masaran', 4),
(51, 'Pucang', 4),
(52, 'Serang', 4),
(53, 'Wanadri', 4),
(54, 'Watuurip', 4),
(55, 'Winong', 4),
(56, 'Wiramastra', 4),
(57, 'Asinan', 5),
(58, 'Bedana', 5),
(59, 'Gununglangit', 5),
(60, 'Kalibening', 5),
(61, 'Kalibombong', 5),
(62, 'Kalisat Kidul', 5),
(63, 'Karang Anyar', 5),
(64, 'Kasinoman', 5),
(65, 'Kertasari', 5),
(66, 'Majatengah', 5),
(67, 'Plorengan', 5),
(68, 'Sembawa', 5),
(69, 'Sidakangen', 5),
(70, 'Sikumpul', 5),
(71, 'Sirukem', 5),
(72, 'Sirukun', 5),
(73, 'Ambal', 6),
(74, 'Binangun', 6),
(75, 'Gumelar', 6),
(76, 'Jlegong', 6),
(77, 'Karanggondang', 6),
(78, 'Karangkobar', 6),
(79, 'Leksana', 6),
(80, 'Pagerpelah', 6),
(81, 'Pasuruhan', 6),
(82, 'Paweden', 6),
(83, 'Purwodadi', 6),
(84, 'Sampang', 6),
(85, 'Slatri', 6),
(86, 'Bantarwaru', 7),
(87, 'Blitar', 7),
(88, 'Clapar', 7),
(89, 'Dawuhan', 7),
(90, 'Gununggiana', 7),
(91, 'Kaliurip', 7),
(92, 'Karanganyar', 7),
(93, 'Kenteng', 7),
(94, 'Kutayasa', 7),
(95, 'Limbangan', 7),
(96, 'Madukara', 7),
(97, 'Pagelak', 7),
(98, 'Pakelen', 7),
(99, 'Pekauman', 7),
(100, 'Penawangan', 7),
(101, 'Petambakan', 7),
(102, 'Rakitan', 7),
(103, 'Rejasa', 7),
(104, 'Sered', 7),
(105, 'Talunamba', 7),
(106, 'Banjengan', 8),
(107, 'Blimbing', 8),
(108, 'Candiwulan', 8),
(109, 'Glempang', 8),
(110, 'Jalatunda', 8),
(111, 'Kaliwungu', 8),
(112, 'Kebakalan', 8),
(113, 'Kebanaran', 8),
(114, 'Kertayasa', 8),
(115, 'Mandiraja Kulon', 8),
(116, 'Mandiraja Wetan', 8),
(117, 'Panggisari', 8),
(118, 'Purwasaba', 8),
(119, 'Salamerta', 8),
(120, 'Simbang', 8),
(121, 'Somawangi', 8),
(122, 'Duren', 9),
(123, 'Gentansari', 9),
(124, 'Gunungjati', 9),
(125, 'Kebutuhduwur', 9),
(126, 'Kebutuhjurang', 9),
(127, 'Lebakwangi', 9),
(128, 'Pagedongan', 9),
(129, 'Pesangkalan', 9),
(130, 'Twelagiri', 9),
(131, 'Aribaya', 10),
(132, 'Babadan', 10),
(133, 'Gumingsir', 10),
(134, 'Kalitlaga', 10),
(135, 'Karangnangka', 10),
(136, 'Karekan', 10),
(137, 'Kasmaran', 10),
(138, 'Kayuares', 10),
(139, 'Larangan', 10),
(140, 'Majasari', 10),
(141, 'Metawana', 10),
(142, 'Nagasari', 10),
(143, 'Pagentan', 10),
(144, 'Plumbungan', 10),
(145, 'Sokaraja', 10),
(146, 'Tegaljeruk', 10),
(147, 'Beji', 11),
(148, 'Lawen', 11),
(149, 'Pandanarum', 11),
(150, 'Pasegeran', 11),
(151, 'Pingit Lor', 11),
(152, 'Pringamba', 11),
(153, 'Sinduaji', 11),
(154, 'Sirongge', 11),
(155, 'Beji', 12),
(156, 'Biting', 12),
(157, 'Condong Campur', 12),
(158, 'Darmayasa', 12),
(159, 'Gembol', 12),
(160, 'Giritirta', 12),
(161, 'Grogol', 12),
(162, 'Kalilunjar', 12),
(163, 'Karangsari', 12),
(164, 'Panusupan', 12),
(165, 'Pegundungan', 12),
(166, 'Pejawaran', 12),
(167, 'Ratamba', 12),
(168, 'Sarwodadi', 12),
(169, 'Semangkung', 12),
(170, 'Sidengok', 12),
(171, 'Tlahap', 12),
(172, 'Badakarya', 13),
(173, 'Bondolharjo', 13),
(174, 'Danakerta', 13),
(175, 'Jembangan', 13),
(176, 'Karangsari', 13),
(177, 'Kecepit', 13),
(178, 'Klapa', 13),
(179, 'Mlaya', 13),
(180, 'Petuguran', 13),
(181, 'Punggelan', 13),
(182, 'Purwasana', 13),
(183, 'Sambong', 13),
(184, 'Sawangan', 13),
(185, 'Sidarata', 13),
(186, 'Tanjungtirta', 13),
(187, 'Tlaga', 13),
(188, 'Tribuana', 13),
(189, 'Danaraja', 14),
(190, 'Gumiwang', 14),
(191, 'Kaliajir', 14),
(192, 'Kalipelus', 14),
(193, 'Kalitengah', 14),
(194, 'Karanganyar', 14),
(195, 'Kutawuluh', 14),
(196, 'Merden', 14),
(197, 'Mertasari', 14),
(198, 'Parakan', 14),
(199, 'Petir', 14),
(200, 'Pucungbedug', 14),
(201, 'Purwonegoro', 14),
(202, 'Kalilandak', 15),
(203, 'Kalimandi', 15),
(204, 'Kaliwinasuh', 15),
(205, 'Kecitran', 15),
(206, 'Klampok', 15),
(207, 'Pagak', 15),
(208, 'Purworejo', 15),
(209, 'Sirkandi', 15),
(210, 'Adipasir', 16),
(211, 'Badamita', 16),
(212, 'Bandingan', 16),
(213, 'Gelang', 16),
(214, 'Kincang', 16),
(215, 'Lengkong', 16),
(216, 'Luwung', 16),
(217, 'Pingit', 16),
(218, 'Rakit', 16),
(219, 'Situwangi', 16),
(220, 'Tanjunganom', 16),
(221, 'Bandingan', 17),
(222, 'Bojanegara', 17),
(223, 'Gembongan', 17),
(224, 'Kalibenda', 17),
(225, 'Karangmangu', 17),
(226, 'Kemiri', 17),
(227, 'Panawaren', 17),
(228, 'Prigi', 17),
(229, 'Pringamba', 17),
(230, 'Randegan', 17),
(231, 'Sawal', 17),
(232, 'Sigaluh', 17),
(233, 'Singomerto', 17),
(234, 'Tunggara', 17),
(235, 'Wanacipta', 17),
(236, 'Berta', 18),
(237, 'Brengkok', 18),
(238, 'Derik', 18),
(239, 'Dermasari', 18),
(240, 'Gumelem Kulon', 18),
(241, 'Gumelem Wetan', 18),
(242, 'Karangjati', 18),
(243, 'Karangsalam', 18),
(244, 'Kedawung', 18),
(245, 'Kemranggon', 18),
(246, 'Pakikiran', 18),
(247, 'Panerusan Kulon', 18),
(248, 'Panerusan Wetan', 18),
(249, 'Piasa Wetan', 18),
(250, 'Susukan', 18),
(251, 'Gumingsir', 19),
(252, 'Kandangwangi', 19),
(253, 'Karangjambe', 19),
(254, 'Karangkemiri', 19),
(255, 'Kasalib', 19),
(256, 'Lemahjaya', 19),
(257, 'Linggasari', 19),
(258, 'Medayu', 19),
(259, 'Tapen', 19),
(260, 'Wanadadi', 19),
(261, 'Wanakarsa', 19),
(262, 'Balun', 20),
(263, 'Bantar', 20),
(264, 'Dawuhan', 20),
(265, 'Jatilawang', 20),
(266, 'Karangtengah', 20),
(267, 'Kasimpar', 20),
(268, 'Kubang', 20),
(269, 'Legoksayem', 20),
(270, 'Pagergunung', 20),
(271, 'Pandansari', 20),
(272, 'Penanggungan', 20),
(273, 'Pesantren', 20),
(274, 'Susukan', 20),
(275, 'Suwidak', 20),
(276, 'Tempuran', 20),
(277, 'Wanaraja', 20),
(278, 'Wanayasa', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_berkas`
--

CREATE TABLE `tb_jenis_berkas` (
  `id_jenis_berkas` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kec_`
--

CREATE TABLE `tb_kec_` (
  `kd_kec` int(11) NOT NULL,
  `nama_kec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kec_`
--

INSERT INTO `tb_kec_` (`kd_kec`, `nama_kec`) VALUES
(1, 'Banjarmangu'),
(2, 'Banjarnegara'),
(3, 'Batur'),
(4, 'Bawang'),
(5, 'Kalibening'),
(6, 'Karangkobar'),
(7, 'Madukara'),
(8, 'Mandiraja'),
(9, 'Pagedongan'),
(10, 'Pagentan'),
(11, 'Padanarum'),
(12, 'Pajewaran'),
(13, 'Punggelan'),
(14, 'Purwanegara'),
(15, 'Purworejo Klampok'),
(16, 'Rakit'),
(17, 'Sigaluh'),
(18, 'Susukan'),
(19, 'Wanadadi'),
(20, 'Wanayas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ket_proses`
--

CREATE TABLE `tb_ket_proses` (
  `no_proses` int(11) NOT NULL,
  `cek_plot` varchar(20) DEFAULT NULL,
  `ganti_nama` varchar(50) DEFAULT NULL,
  `roya` varchar(50) DEFAULT NULL,
  `znt` varchar(50) DEFAULT NULL,
  `cek_sertipikat` varchar(50) DEFAULT NULL,
  `tapak_kapling` varchar(50) DEFAULT NULL,
  `pert_teknis` varchar(50) DEFAULT NULL,
  `pemecahan` varchar(50) DEFAULT NULL,
  `ukur` varchar(50) DEFAULT NULL,
  `ht` varchar(50) DEFAULT NULL,
  `konversi` varchar(50) DEFAULT NULL,
  `ganti_blangko` varchar(50) DEFAULT NULL,
  `peningkatan_hak` varchar(50) DEFAULT NULL,
  `balik_nama` varchar(50) DEFAULT NULL,
  `waris` varchar(50) DEFAULT NULL,
  `iph` varchar(50) DEFAULT NULL,
  `lainnya` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_proses`
--

CREATE TABLE `tb_proses` (
  `proses_id` int(11) NOT NULL,
  `nama_proses` varchar(50) NOT NULL,
  `proses_rank` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_proses_bpn`
--

CREATE TABLE `tb_proses_bpn` (
  `no_proses_bpn` int(11) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `no_bpn` varchar(50) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `estimasi` int(4) NOT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertipikat`
--

CREATE TABLE `tb_sertipikat` (
  `no_reg` int(11) NOT NULL,
  `jenis_hak` varchar(30) NOT NULL,
  `no_sertipikat` int(6) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL,
  `luas` int(6) DEFAULT NULL,
  `pemilik_hak` varchar(255) NOT NULL,
  `pembeli_hak` varchar(255) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `proses` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role_id`, `is_active`) VALUES
(2, 'indra', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(17, 'admin', '', '$2y$10$r39yvdrAIwU/qGcF.UWgz.NUqbJQBz1whnnLfZY0gTtzHGjSvmdLm', 2, 1),
(19, 'faizal', 'faizal', '$2y$10$bGs5rqiB.6U7GI5krXghoOxNUBIfQFk2DRrX0bf.S2ZS3byjm/MbG', 1, 1),
(20, 'amria', 'amria', '$2y$10$Hep2TqmTE9BQfMjCrTOkUOr36NIinWYqowXrTSOVyB9PvowIZh4xe', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_`
--

CREATE TABLE `user_` (
  `id_staff` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_`
--

INSERT INTO `user_` (`id_staff`, `nama`, `username`, `password`, `role_id`, `is_active`) VALUES
(1, 'indra faizal', 'indra', '22bf59bcca5b77263b4021cf4695288d', 1, 1),
(2, 'indraf', 'indraf', '099c6c983f3db931def14e8480a0cbaa', 1, 1),
(3, 'amria', 'amria', 'amria', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id`),
  ADD KEY `desa_ibfk_1` (`id_kecamatan`);

--
-- Indexes for table `desa_`
--
ALTER TABLE `desa_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan_`
--
ALTER TABLE `kecamatan_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_sertipikat` (`reg_sertipikat`),
  ADD KEY `status_proses` (`status_proses`);

--
-- Indexes for table `tb_desa_`
--
ALTER TABLE `tb_desa_`
  ADD PRIMARY KEY (`kd_desa`),
  ADD KEY `kd_kec` (`kd_kec`);

--
-- Indexes for table `tb_jenis_berkas`
--
ALTER TABLE `tb_jenis_berkas`
  ADD PRIMARY KEY (`id_jenis_berkas`);

--
-- Indexes for table `tb_kec_`
--
ALTER TABLE `tb_kec_`
  ADD PRIMARY KEY (`kd_kec`);

--
-- Indexes for table `tb_ket_proses`
--
ALTER TABLE `tb_ket_proses`
  ADD PRIMARY KEY (`no_proses`);

--
-- Indexes for table `tb_proses`
--
ALTER TABLE `tb_proses`
  ADD PRIMARY KEY (`proses_id`);

--
-- Indexes for table `tb_proses_bpn`
--
ALTER TABLE `tb_proses_bpn`
  ADD PRIMARY KEY (`no_proses_bpn`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sertipikat`
--
ALTER TABLE `tb_sertipikat`
  ADD PRIMARY KEY (`no_reg`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `desa_`
--
ALTER TABLE `desa_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kecamatan_`
--
ALTER TABLE `kecamatan_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_desa_`
--
ALTER TABLE `tb_desa_`
  MODIFY `kd_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `tb_jenis_berkas`
--
ALTER TABLE `tb_jenis_berkas`
  MODIFY `id_jenis_berkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kec_`
--
ALTER TABLE `tb_kec_`
  MODIFY `kd_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_ket_proses`
--
ALTER TABLE `tb_ket_proses`
  MODIFY `no_proses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_proses`
--
ALTER TABLE `tb_proses`
  MODIFY `proses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_proses_bpn`
--
ALTER TABLE `tb_proses_bpn`
  MODIFY `no_proses_bpn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sertipikat`
--
ALTER TABLE `tb_sertipikat`
  MODIFY `no_reg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_`
--
ALTER TABLE `user_`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD CONSTRAINT `tb_berkas_ibfk_1` FOREIGN KEY (`reg_sertipikat`) REFERENCES `tb_sertipikat` (`no_reg`),
  ADD CONSTRAINT `tb_berkas_ibfk_2` FOREIGN KEY (`status_proses`) REFERENCES `tb_ket_proses` (`no_proses`);

--
-- Constraints for table `tb_desa_`
--
ALTER TABLE `tb_desa_`
  ADD CONSTRAINT `tb_desa__ibfk_1` FOREIGN KEY (`kd_kec`) REFERENCES `tb_kec_` (`kd_kec`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_`
--
ALTER TABLE `user_`
  ADD CONSTRAINT `user__ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
