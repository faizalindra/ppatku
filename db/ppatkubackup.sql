-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 08:16 AM
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
-- Database: `ppatkubackup`
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
(278, 'Wanayasa', 20),
(279, '0', 25);

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
(20, 'Wanayas'),
(25, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id` int(5) NOT NULL,
  `tgl_masuk` date NOT NULL DEFAULT current_timestamp(),
  `reg_sertipikat` int(5) DEFAULT NULL,
  `desa` text NOT NULL,
  `kecamatan` text NOT NULL,
  `jenis_berkas` varchar(100) NOT NULL,
  `id_proses` int(5) DEFAULT NULL,
  `status_proses` int(5) DEFAULT NULL,
  `nama_penjual` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `biaya` int(12) DEFAULT 0,
  `dp` int(8) DEFAULT 0,
  `tot_biaya` int(9) DEFAULT 0,
  `keterangan` varchar(255) DEFAULT ' ',
  `konversi` int(1) NOT NULL DEFAULT 0,
  `berkas_selesai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id`, `tgl_masuk`, `reg_sertipikat`, `desa`, `kecamatan`, `jenis_berkas`, `id_proses`, `status_proses`, `nama_penjual`, `nama_pembeli`, `biaya`, `dp`, `tot_biaya`, `keterangan`, `konversi`, `berkas_selesai`) VALUES
(1, '2021-11-29', 1, 'mandiraja', 'mandiraja wetan', 'aphb', 0, NULL, 'iubfub', 'bjubbvis', 0, 0, 0, ' ', 0, 1),
(2, '2021-11-29', 2, 'mandiraja', 'mandiraja', 'apht', 1, NULL, 'pohiah', 'nhifhiasf', 62686000, 4749720, 6246489, 'nofnofhhbs', 0, 0),
(3, '2021-11-29', NULL, 'purwanegara', 'purwanegara', 'skmht', NULL, NULL, 'sri', 'khosiyah', 0, 0, 0, ' ', 0, 0),
(6, '2021-11-29', 3, 'Banjengan', 'Mandiraja', 'apht', 0, NULL, 'Indra', 'Indra', 40000000, NULL, 0, ' ', 0, 0),
(8, '2021-11-29', 4, 'Banjengan', 'Mandiraja', 'apht', 0, NULL, 'Faizali', '', 0, 0, 0, ' ', 0, 1),
(9, '2021-11-29', 2, 'Kaliwungu', 'Mandiraja', 'aphb', 0, NULL, 'Amri', 'Indra', 40000000, NULL, 0, ' ', 0, 0),
(12, '2021-11-29', NULL, 'kalimendong', 'purwanegara', 'ajb,konversi', 0, NULL, 'Munawar', 'Hamid', 0, 0, 0, ' ', 0, 0),
(14, '2021-11-29', NULL, 'merden', 'purwanegara', 'skmht', NULL, NULL, 'arif', 'mustakim', 0, 0, 0, ' ', 0, 0),
(19, '2021-11-29', NULL, 'gfuegabni', 'nfois', 'ajb', NULL, NULL, 'noitbu9w9jcn', 'obofweboub', 0, 0, 0, ' ', 0, 0),
(20, '2021-11-29', NULL, 'fnon', 'ofneona', 'nioef', NULL, NULL, 'kjbfjeb', 'kjbfejob', 0, 0, 0, ' ', 0, 0),
(23, '2021-11-29', NULL, 'qazwsx', 'edcrfv', 'pemecahan', NULL, NULL, 'indra', 'faizal', 0, 0, 0, ' ', 0, 0),
(24, '2021-11-29', NULL, 'plmokj', 'iif', 'pengeringan', NULL, NULL, 'indra', 'faizal', 0, 0, 0, ' ', 0, 0),
(25, '2021-11-29', NULL, 'mandiraja kulon', 'mandiraja', '', NULL, NULL, 'rini', 'erna', 0, 0, 0, ' ', 0, 0),
(28, '2021-11-29', 0, 'Banjengan', 'Mandiraja', 'apht', NULL, NULL, 'infi', 'infwin', 0, 0, 0, '', 0, 0),
(29, '2021-11-29', 0, 'Purwasaba', 'Mandiraja', 'Hibah', NULL, NULL, 'Indra', 'Hamid', 0, 0, 0, '', 0, 0),
(30, '2021-11-29', 0, 'Purwasaba', 'Mandiraja', 'apht', NULL, NULL, 'Indra', 'infwin', 0, 0, 0, '', 0, 0),
(31, '2021-11-29', NULL, '', '', '', NULL, NULL, '', '', 0, 0, 0, ' ', 0, 0),
(36, '2021-11-29', 0, 'Banjengan', 'Mandiraja', 'Hibah', NULL, NULL, 'infi', 'fniqn', 0, 0, 0, '', 0, 0),
(38, '2021-11-29', 3, 'Purwasaba', 'ifi0on', '2', NULL, NULL, 'Faizal', 'infwin', 0, 0, 0, '', 0, 0),
(39, '2021-11-29', 0, 'Banjengan', 'Mandiraja', '4', NULL, NULL, 'Faizal', 'Hamid', 0, 0, 0, '', 0, 0),
(40, '2021-11-29', 0, 'Banjengan', 'Mandiraja', 'Hibah', NULL, NULL, 'Indra', 'infwin', 0, 0, 0, '', 0, 0),
(41, '2021-11-29', 0, 'Banjengan', 'Mandiraja', 'Konversi', NULL, NULL, 'Faizal', 'infwin', 0, 0, 0, '', 0, 0),
(42, '2021-11-29', 0, 'Purwasaba', 'jfijnn', 'Konversi', NULL, NULL, 'Indra', 'Hamid', 0, 0, 0, '', 0, 0),
(43, '2021-11-29', 0, 'ih8', 'ojonfro', 'APHB', NULL, NULL, 'infi', 'Hamid', 0, 0, 0, '', 0, 0),
(44, '2021-11-29', 0, 'kfbi', 'fnwofn', 'SKMHT', NULL, NULL, 'knfqpnkwfn', 'ofnwo', 0, 0, 0, '', 0, 0),
(45, '2021-11-29', 0, 'Purwasaba', 'ifi0on', 'Hibah', NULL, NULL, 'Indra', 'Hamid', 0, 0, 0, '', 0, 0),
(46, '2021-11-29', 0, 'Purwasaba', 'ifi0on', 'Hibah', NULL, NULL, 'infi', 'infwin', 0, 0, 0, '', 0, 0),
(47, '2021-11-29', 0, 'kfbi', 'fnwofn', 'APHB', NULL, NULL, 'Indra', 'nifn', 0, 0, 0, '', 0, 0),
(48, '2021-11-29', 0, 'kfbi', 'fnwofn', 'APHB', NULL, NULL, 'Indra', 'nifn', 0, 0, 0, '', 0, 0),
(49, '2021-11-29', 0, 'Purwasaba', 'fnwofn', 'Hibah', NULL, NULL, 'inifn', 'nifn', 0, 0, 0, '', 0, 0),
(50, '2021-11-29', 0, 'Banjengan,mandiraja', 'mandiraja', 'Pemecahan', NULL, NULL, 'inifn', 'infwin', 0, 0, 0, '', 0, 0),
(51, '2021-11-29', 0, 'Banjengan', 'fnwofn', 'Hibah', NULL, NULL, 'Faizal', 'ofnwo', 0, 0, 0, '', 0, 0),
(76, '2021-11-29', 0, 'Purwasaba', 'ifi0on', 'Konversi,Hibah', NULL, NULL, 'knfqpnkwfn', 'Indra', 0, 0, 0, '', 0, 0),
(77, '2021-11-29', 0, 'Purwasaba', 'ifi0on', 'APHT,SKMHT,Hibah', NULL, NULL, 'amri', 'faizul', 0, 0, 0, '', 0, 0),
(78, '2021-11-29', 0, 'Purwasaba', 'ifi0on', 'APHT,SKMHT,Hibah', NULL, NULL, 'amri', 'faizul', 0, 0, 0, '', 0, 0),
(79, '2021-11-29', 0, '115', '8', 'SKMHT,Hibah', NULL, NULL, 'fnionq', 'Indra', 0, 0, 0, '', 0, 0),
(80, '2021-11-29', 0, 'Kesenet', 'Banjarnegara', 'SKMHT', NULL, NULL, 'infi', 'Hamid', 0, 0, 0, '', 0, 0),
(81, '2021-11-30', 0, 'Mandiraja Wetan', 'Mandiraja', 'AJB,Konversi', NULL, NULL, 'Indra', 'Faizal', 0, 0, 0, '', 0, 0);

--
-- Triggers `tb_berkas`
--
DELIMITER $$
CREATE TRIGGER `mk_proses` AFTER INSERT ON `tb_berkas` FOR EACH ROW insert into tb_ket_proses set no_proses=new.id
$$
DELIMITER ;

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
  `tematik` varchar(50) DEFAULT NULL,
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

--
-- Dumping data for table `tb_ket_proses`
--

INSERT INTO `tb_ket_proses` (`no_proses`, `cek_plot`, `ganti_nama`, `roya`, `znt`, `cek_sertipikat`, `tapak_kapling`, `tematik`, `pemecahan`, `ukur`, `ht`, `konversi`, `ganti_blangko`, `peningkatan_hak`, `balik_nama`, `waris`, `iph`, `lainnya`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_proses`
--

CREATE TABLE `tb_proses` (
  `proses_id` int(5) NOT NULL,
  `nama_proses` varchar(50) NOT NULL,
  `proses_rank` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proses`
--

INSERT INTO `tb_proses` (`proses_id`, `nama_proses`, `proses_rank`) VALUES
(1, '0', 0);

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
  `no_sertipikat` int(6) NOT NULL,
  `jenis_hak` varchar(30) NOT NULL,
  `dsa` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL,
  `luas` int(6) DEFAULT NULL,
  `pemilik_hak` varchar(255) NOT NULL,
  `pembeli_hak` varchar(255) DEFAULT NULL,
  `tgl_daftar` date NOT NULL DEFAULT current_timestamp(),
  `proses` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sertipikat`
--

INSERT INTO `tb_sertipikat` (`no_reg`, `no_sertipikat`, `jenis_hak`, `dsa`, `kec`, `luas`, `pemilik_hak`, `pembeli_hak`, `tgl_daftar`, `proses`, `ket`) VALUES
(0, 0, 'null', '', '', NULL, '', '', '0000-00-00', NULL, NULL),
(1, 57193, 'SHM', 'Mandiraja Wetan', 'Mandiraja', 5388, 'Indra Faizal Amri', 'Irfan', '2021-11-03', 'AJB', NULL),
(2, 7521, 'SHGB', 'Somawangi', 'Mandiraja', 412, 'Purnomo', 'Ajiz', '2021-11-17', 'AJB', NULL),
(3, 1311, 'SHM', 'Kaliwungu', 'Mandiraja', 912, 'Amri', 'Injiz', '2021-11-17', 'AJB', NULL),
(4, 6172, 'SHM', 'Jalatunda', 'Mandiraja', 723, 'indra', 'Ajiz', '2021-11-17', 'AJB', NULL);

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
(19, 'faizal', 'faizal', '$2y$10$bGs5rqiB.6U7GI5krXghoOxNUBIfQFk2DRrX0bf.S2ZS3byjm/MbG', 1, 1),
(20, 'amria', 'amria', '$2y$10$Hep2TqmTE9BQfMjCrTOkUOr36NIinWYqowXrTSOVyB9PvowIZh4xe', 2, 1);

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
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_sertipikat` (`reg_sertipikat`),
  ADD KEY `status_proses` (`status_proses`);

--
-- Indexes for table `tb_jenis_berkas`
--
ALTER TABLE `tb_jenis_berkas`
  ADD PRIMARY KEY (`id_jenis_berkas`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_jenis_berkas`
--
ALTER TABLE `tb_jenis_berkas`
  MODIFY `id_jenis_berkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_proses`
--
ALTER TABLE `tb_proses`
  MODIFY `proses_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `no_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
