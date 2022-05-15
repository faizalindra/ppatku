-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 06:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

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
(278, 'Wanayasa', 20);

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
(20, 'Wanayasa');

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
  `nama_penjual` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) DEFAULT NULL,
  `biaya` int(12) DEFAULT 0,
  `dp` int(8) DEFAULT 0,
  `tot_biaya` int(9) DEFAULT 0,
  `keterangan` varchar(255) DEFAULT ' ',
  `berkas_selesai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id`, `tgl_masuk`, `reg_sertipikat`, `desa`, `kecamatan`, `jenis_berkas`, `nama_penjual`, `nama_pembeli`, `biaya`, `dp`, `tot_biaya`, `keterangan`, `berkas_selesai`) VALUES
(1, '2021-12-01', 1, 'Mandiraja', 'Mandiraja Wetan', 'AJB', 'iubfub', 'bjubbvis', 0, 0, 0, ' Selesai', 1),
(2, '2021-12-05', 2, 'Mandiraja Kulon', 'Mandiraja', 'APHT', 'pohiah', 'nhifhiasf', 62686000, 4749720, 0, 'nofnofhhbs', 1),
(3, '2021-11-29', 21, 'purwanegara', 'purwanegara', 'AJB', 'sri', 'khosiyah', 0, 0, 0, ' jajal; drop table lapangan;', 1),
(6, '2021-11-29', 3, 'Banjengan', 'Mandiraja', 'APHT', 'Indra', 'Indra', 40000000, NULL, 0, ' ', 1),
(8, '2021-11-29', 4, 'Banjengan', 'Mandiraja', 'APHT', 'Faizali', '', 0, 0, 0, ' ', 1),
(9, '2021-11-29', 2, 'Mandiraja', 'Kaliwungu', 'APHB', 'Amri', 'Indra', 40000000, 5000000, 0, ' ', 1),
(12, '2021-11-29', NULL, 'kalimendong', 'purwanegara', 'AJB,Konversi', 'Munawar', 'Hamid', 0, 0, 0, ' ', 1),
(14, '2021-11-29', NULL, 'merden', 'purwanegara', 'APHT', 'arif', 'mustakim', 0, 0, 0, ' ', 1),
(19, '2021-11-29', NULL, 'gfuegabni', 'nfois', 'AJB', 'noitbu9w9jcn', 'obofweboub', 0, 0, 0, ' ', 1),
(20, '2021-11-29', NULL, 'fnon', 'ofneona', 'APHT', 'kjbfjeb', 'kjbfejob', 0, 0, 0, ' ', 1),
(23, '2021-11-29', NULL, 'qazwsx', 'edcrfv', 'Pemecahan', 'indra', 'faizal', 0, 0, 0, ' ', 0),
(24, '2021-11-29', NULL, 'plmokj', 'iif', 'Pengeringan', 'indra', 'faizal', 0, 0, 0, ' ', 0),
(28, '2021-11-29', NULL, 'Banjengan', 'Mandiraja', 'APHT', 'infi', 'infwin', 0, 0, 0, '', 0),
(29, '2021-11-29', NULL, 'Purwasaba', 'Mandiraja', 'Hibah', 'Indra', 'Hamid', 0, 0, 0, '', 0),
(30, '2021-11-29', NULL, 'Purwasaba', 'Mandiraja', 'APHT', 'Indra', 'infwin', 0, 0, 0, '', 0),
(36, '2021-11-29', NULL, 'Banjengan', 'Mandiraja', 'Hibah', 'infi', 'fniqn', 0, 0, 0, '', 0),
(40, '2021-11-29', NULL, 'Banjengan', 'Mandiraja', 'Hibah', 'Indra', 'infwin', 0, 0, 0, '', 0),
(41, '2021-11-29', NULL, 'Banjengan', 'Mandiraja', 'Konversi', 'Faizal', 'infwin', 0, 0, 0, '', 0),
(42, '2021-11-29', NULL, 'Purwasaba', 'jfijnn', 'Konversi', 'Indra', 'Hamid', 0, 0, 0, '', 1),
(43, '2021-11-29', NULL, 'ih8', 'ojonfro', 'APHB', 'infi', 'Hamid', 0, 0, 0, '', 1),
(44, '2021-11-29', NULL, 'kfbi', 'fnwofn', 'SKMHT', 'knfqpnkwfn', 'ofnwo', 0, 0, 0, '', 0),
(45, '2021-11-29', NULL, 'Purwasaba', 'ifi0on', 'Hibah', 'Indra', 'Hamid', 0, 0, 0, '', 0),
(46, '2021-11-29', NULL, 'Purwasaba', 'ifi0on', 'Hibah', 'infi', 'infwin', 0, 0, 0, '', 0),
(47, '2021-11-29', NULL, 'kfbi', 'fnwofn', 'APHB', 'Indra', 'nifn', 0, 0, 0, '', 0),
(48, '2021-11-29', NULL, 'kfbi', 'fnwofn', 'APHB', 'Indra', 'nifn', 0, 0, 0, '', 0),
(49, '2021-11-29', NULL, 'Purwasaba', 'fnwofn', 'Hibah', 'inifn', 'nifn', 0, 0, 0, '', 0),
(50, '2021-11-29', NULL, 'Banjengan,mandiraja', 'mandiraja', 'Pemecahan', 'inifn', 'infwin', 0, 0, 0, '', 0),
(51, '2021-11-29', NULL, 'Banjengan', 'fnwofn', 'Hibah', 'Faizal', 'ofnwo', 0, 0, 0, '', 0),
(76, '2021-11-29', NULL, 'ifi0on', 'Purwasaba', '', 'knfqpnkwfn', 'Indra', 0, 0, 0, '', 0),
(77, '2021-11-29', NULL, 'Mandiraja', 'Purwasaba', '', 'infi', 'faizul', 0, 0, 0, 'jkbdjba', 0),
(78, '2021-11-29', NULL, 'Purwasaba', 'ifi0on', 'APHT,SKMHT,Hibah', 'amri', 'faizul', 0, 0, 0, '', 0),
(80, '2021-11-29', NULL, 'Kesenet', 'Banjarnegara', 'SKMHT', 'infi', 'Hamid', 0, 0, 0, '', 0),
(81, '2021-11-30', NULL, 'Mandiraja Wetan', 'Mandiraja', 'AJB,Hibah', 'Indra', 'Faizal', 0, 0, 0, '', 0),
(85, '0000-00-00', NULL, 'Mandiraja Kulon', 'Mandiraja', 'AJB', 'QAZ', 'WSX', 0, 0, 0, ' ', 0),
(86, '0000-00-00', NULL, 'Mandiraja Kulon', 'Mandiraja', 'AJB', 'QAZ', 'WSX', 0, 0, 0, ' ', 0),
(87, '0000-00-00', NULL, 'Banjengan', 'Mandiraja', 'APHT', 'qaz', 'wsx', 0, 0, 0, ' ', 0),
(88, '0000-00-00', 1, 'Bawang', 'Mantrianom', 'AJB,SKMHT,Konversi', 'infi', 'Hamid', 4000000, 0, 0, '- kurang ktp\r\n- kurang sppt', 0),
(89, '0000-00-00', NULL, 'Gripit', 'Banjarmangu', 'APHT', 'gfsf', 'adffaergtez', 0, 0, 0, '', 0),
(90, '2021-12-15', NULL, 'Aribaya', 'Pagentan', 'SKMHT,Hibah', 'rgzdg', 'eggrgxhgx', 0, 0, 0, '', 0),
(91, '2021-12-16', NULL, 'Dieng', 'Batur', 'APHT,SKMHT', 'Indra', 'fazal', 0, 0, 0, '', 1),
(92, '2021-12-16', NULL, 'Krandegan', 'Banjarnegara', 'AJB, APHT, APHB, SKMHT', 'Poiha', 'Polini', 0, 0, 0, '', 0),
(94, '2021-12-16', NULL, 'Karangtengah', 'Batur', 'AJB, APHT, APHB', 'infini', 'indvsini', 0, 0, 0, '', 0),
(95, '2021-12-16', NULL, 'Sijenggung', 'Banjarmangu', 'APHT', 'bfub', 'vdisnfio', 0, 0, 0, '', 0),
(96, '2021-12-16', NULL, 'Sijenggung', 'Banjarmangu', 'APHT', 'bfub', 'vdisnfio', 0, 0, 0, '', 0),
(97, '2021-12-16', NULL, 'Krandegan', 'Banjarnegara', 'SKMHT', 'ysda', 'dads', 0, 0, 0, '', 0),
(98, '2021-12-16', NULL, 'Cendana', 'Banjarnegara', 'Hibah', 'afd', 'feEde', 0, 0, 0, '', 0),
(99, '2021-12-16', NULL, 'Cendana', 'Banjarnegara', 'SKMHT', 'bbab', 'fnaeindi', 0, 0, 0, '', 0),
(100, '2021-12-16', NULL, 'Cendana', 'Banjarnegara', 'SKMHT', 'bbab', 'fnaeindi', 0, 0, 0, '', 2),
(101, '2021-12-16', NULL, 'Kaliajir', 'Purwanegara', 'SKMHT', 'yhn', 'ujm', 0, 0, 0, '', 0),
(102, '2021-12-16', NULL, 'Bandingan', 'Rakit', 'Hibah', 'wert', 'rtyu', 0, 0, 0, '', 1),
(103, '2021-12-16', NULL, 'Mandiraja', 'Mandiraja Wetan', 'APHT', 'Wendys', 'McDonald', 5000000, 3000000, 0, '', 0),
(104, '2022-04-28', NULL, 'Gumelar', 'Karangkobar', 'AJB,SKMHT', 'indra', 'faizal', 8000000, 2000000, 0, '- BSY Mandiraja', 0),
(106, '2022-04-28', NULL, 'Badamita', 'Rakit', 'Hibah,Konversi', 'Mahmud CS', 'Lara', 9000000, 2000000, 0, '- kurang ktp', 0),
(107, '2022-04-28', NULL, 'Badamita', 'Rakit', 'Hibah,Konversi', 'Mahmud CS', 'Lara', 9000000, 2000000, 0, '- kurang ktp', 0),
(108, '2022-04-28', NULL, 'Badamita', 'Rakit', 'Hibah,Konversi', 'Mahmud CS', 'Lara', 9000000, 2000000, 0, '- kurang ktp', 0),
(109, '2022-04-28', NULL, 'Panerusan', 'Susukan', 'APHB,Hibah', 'mahmud', 'litfi', 6500000, 4000000, 0, '- belum roya', 0),
(110, '2022-04-28', NULL, 'Sigaluh', 'Sawal', 'APHB', 'Nami', 'Zoro', 10000000, 5000000, 35000000, '- belum roya', 0),
(111, '2022-04-28', NULL, 'Purworejo Klampok', 'Klampok', 'Hibah', 'Hakim', 'Jury', 13000000, 5000000, 35000000, '- ofenbwid', 0),
(112, '2022-04-28', NULL, 'Kuta', 'Banjarnegara', 'AJB', 'oj fdj', 'fonaidni auidn', 120000000, 5000000, 0, '', 0),
(113, '2022-04-28', NULL, 'Sawal', 'Sigaluh', 'SKMHT', 'ufun nihf8h', 'finnd inriaje0i', 13000000, 1000000, 0, '', 0),
(114, '2022-04-28', NULL, 'Gelang', 'Rakit', 'APHB', 'ih j auh', 'jqw9ea9 9wjd9', 13000000, 1000000, 12000000, '', 0),
(115, '2022-04-28', NULL, 'Kalitengah', 'Purwanegara', 'APHT', 'ugnih98ha adiwhn', '9hadnn 8hduaudn', 13130000, 213130, 12916870, '- hqegb daubu', 0),
(116, '2022-04-28', 16, 'Kincang', 'Rakit', 'APHB', 'ugfemsudi ihda', 'fishijd ihaifhi', 5000000, 2000000, 4800000, '', 0),
(117, '2022-04-28', NULL, 'Rakit', 'Gelang', 'AJB', 'qwsdf', 'sadfvs', 5000000, 3000000, 0, '', 0),
(118, '2022-04-28', NULL, 'Gemuruh', 'Bawang', 'AJB', 'infinin', 'ifnindin', 14000000, 4000000, 10000000, '', 0),
(119, '2022-04-28', NULL, 'Berta', 'Susukan', 'APHB', 'hyvfyaninh audnub', 'ifn dq huqhd', 0, 0, 0, '', 0),
(120, '2022-04-28', 17, 'Batur', 'Pekasiran', 'AJB', 'qwsd', 'ytfvc', 12000000, 10000000, 2000000, '', 0),
(122, '2022-05-12', NULL, 'Dieng', 'Batur', 'AJB', 'Kusmiah', 'Lastri', 5000000, 0, 5000000, '', 1),
(123, '2022-05-14', NULL, 'Krandegan', 'Banjarnegara', 'AJB', 'Miki', 'Kitti', 3000000, 1000000, 2000000, '', 0),
(124, '2022-05-14', NULL, 'Argasoka', 'Banjarnegara', 'APHT', 'Oyen', 'Black', 0, 0, 0, '', 0),
(125, '2022-05-14', NULL, 'Beji', 'Banjarmangu', 'SKMHT', 'Madun', 'mujer', 0, 0, 0, '', 1),
(126, '2022-05-14', NULL, 'Adipasir', 'Rakit', 'APHT', 'Mukhlis', 'Riyadi', 0, 0, 0, '', 1),
(127, '2022-05-14', NULL, 'Karangtengah', 'Batur', 'SKMHT', 'Udin', 'Sedunia', 0, 0, 0, '', 1);

--
-- Triggers `tb_berkas`
--
DELIMITER $$
CREATE TRIGGER `mk_proses` AFTER INSERT ON `tb_berkas` FOR EACH ROW insert into tb_ket_proses set no_proses=new.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ket_proses`
--

CREATE TABLE `tb_ket_proses` (
  `no_proses` int(11) NOT NULL,
  `ukur` int(1) DEFAULT NULL,
  `pert_teknis` int(1) DEFAULT NULL,
  `perijinan` int(1) DEFAULT NULL,
  `pengeringan` int(1) DEFAULT NULL,
  `cek_plot` int(1) DEFAULT NULL,
  `cek_sertipikat` int(1) DEFAULT NULL,
  `roya` int(1) DEFAULT NULL,
  `ganti_nama` int(1) DEFAULT NULL,
  `tapak_kapling` int(1) DEFAULT NULL,
  `bayar_pajak` int(1) DEFAULT NULL,
  `konversi` int(1) DEFAULT NULL,
  `waris` int(1) DEFAULT NULL,
  `balik_nama` int(1) DEFAULT NULL,
  `peningkatan_hak` int(1) DEFAULT NULL,
  `skmht` int(1) DEFAULT NULL,
  `ht` int(1) DEFAULT NULL,
  `ganti_blangko` int(1) DEFAULT NULL,
  `znt` int(1) DEFAULT NULL,
  `iph` int(11) NOT NULL,
  `lainnya` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ket_proses`
--

INSERT INTO `tb_ket_proses` (`no_proses`, `ukur`, `pert_teknis`, `perijinan`, `pengeringan`, `cek_plot`, `cek_sertipikat`, `roya`, `ganti_nama`, `tapak_kapling`, `bayar_pajak`, `konversi`, `waris`, `balik_nama`, `peningkatan_hak`, `skmht`, `ht`, `ganti_blangko`, `znt`, `iph`, `lainnya`) VALUES
(1, 2, NULL, NULL, NULL, 2, 1, 2, 2, NULL, 2, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL, 0, NULL),
(2, 1, NULL, NULL, NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 0, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(6, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(8, NULL, NULL, NULL, NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL),
(9, 1, NULL, NULL, NULL, 2, NULL, 2, 2, NULL, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(12, 2, NULL, NULL, NULL, 2, NULL, 2, 2, NULL, 2, 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(14, NULL, NULL, NULL, NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, NULL, 0, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(19, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(20, NULL, NULL, NULL, NULL, 2, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(23, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(28, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(30, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(41, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(51, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(76, 2, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(77, NULL, NULL, NULL, NULL, 2, 2, 2, 2, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(78, NULL, NULL, NULL, NULL, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(87, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(89, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(92, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, NULL),
(93, 1, 1, 1, NULL, 1, 1, 1, NULL, NULL, 1, 1, 2, 2, 1, 1, 1, NULL, NULL, 0, NULL),
(94, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, NULL, NULL, 0, NULL),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 0, NULL),
(102, NULL, NULL, NULL, NULL, 2, NULL, 2, 2, NULL, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(120, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(122, NULL, NULL, NULL, NULL, 2, NULL, 2, 2, NULL, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(126, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

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
  `tgl_masuk` date NOT NULL DEFAULT current_timestamp(),
  `no_bpn` varchar(11) DEFAULT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `jenis_proses` varchar(30) NOT NULL,
  `id_berkas` int(5) DEFAULT NULL,
  `estimasi` date NOT NULL,
  `ket` text DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proses_bpn`
--

INSERT INTO `tb_proses_bpn` (`no_proses_bpn`, `tgl_masuk`, `no_bpn`, `nama_pemohon`, `jenis_proses`, `id_berkas`, `estimasi`, `ket`, `status`) VALUES
(1, '2022-04-30', '123131/2022', 'Indra Faizal', '', 0, '0000-00-00', 'fsdf', 0),
(2, '2022-04-30', '1231/2022', 'Indra Faizal', '', 0, '0000-00-00', 'fsdzdad', 0),
(3, '0000-00-00', NULL, 'Muhammad', '4', 0, '0000-00-00', 'dzd', 0),
(5, '0000-00-00', '1234', 'Muhammad', '3', 0, '0000-00-00', 'adsdcz', 0),
(7, '2022-05-02', '123131/2022', 'Indra Faizal', 'A', 0, '0000-00-00', NULL, 0),
(9, '2022-05-02', '13121', 'Muhi', 'Pengecekan', 0, '0000-00-00', 'sdadad', 0),
(10, '0000-00-00', '123131', 'Mahmud', 'Cek Plot', 0, '0000-00-00', 'dfad', 0),
(11, '0000-00-00', '', 'Abdul', 'Pengalihan Hak', 0, '0000-00-00', '05/01/2022', 0),
(12, '2022-05-02', '12313', 'Abdul', 'Pengecekan', 0, '0000-00-00', '2022-05-05', 0),
(13, '2022-05-01', '11111', 'indra', 'Pengecekan', 0, '0000-00-00', 'qazwsxedc', 0),
(14, '2022-05-05', '41321', 'Muhammad', 'Roya', 0, '0000-00-00', 'onadindi', 0),
(15, '2022-05-05', '1231', 'Muhammad', 'Peningkatan Hak', 0, '0000-00-00', 'daknd', 0),
(16, '2022-05-05', '23132', 'Maki', 'Pengecekan', 0, '0000-00-00', 'odo', 0),
(17, '2022-05-05', '23132', 'Maki', 'Pengecekan', 0, '0000-00-00', 'odo', 0),
(18, '2022-05-05', '5555', 'Abdul', 'Roya', 0, '0000-00-00', 'qa', 0),
(19, '2022-05-05', '5555', 'Abdul', 'Roya', 0, '0000-00-00', 'qa', 0),
(20, '2022-05-01', '1212', 'Muhi', 'Pemberian Hak Tanggungan', 0, '0000-00-00', 'tt', 0),
(21, '2022-05-05', '1234', 'indra', 'Roya', 0, '0000-00-00', 'qazwsx', 0),
(22, '2022-05-05', '1234', 'indra', 'Roya', 0, '0000-00-00', 'qazwsx', 0),
(23, '2022-05-01', '777', 'Mahmud', 'Pengecekan', 0, '0000-00-00', '7yh', 0),
(24, '2022-05-05', '1234', 'Abdul', 'Pengecekan', 0, '0000-00-00', 'oifehwhf', 0),
(25, '2022-05-05', '7878', 'Abdul', 'Pengecekan', 0, '2022-05-08', 'ihi', 0),
(26, '2022-05-09', '1212', 'Abdul', 'Pengecekan', 0, '2022-05-12', 'ttt', 0),
(27, '2022-05-09', '6565', 'Muhammad', 'Pengalihan Hak', 0, '2022-11-09', 'rrr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(0, 'notaris'),
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertipikat`
--

CREATE TABLE `tb_sertipikat` (
  `no_reg` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL DEFAULT current_timestamp(),
  `no_sertipikat` int(6) NOT NULL,
  `jenis_hak` varchar(30) NOT NULL,
  `dsa` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL,
  `luas` int(6) DEFAULT NULL,
  `pemilik_hak` varchar(255) NOT NULL,
  `pembeli_hak` varchar(255) DEFAULT NULL,
  `proses` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sertipikat`
--

INSERT INTO `tb_sertipikat` (`no_reg`, `tgl_daftar`, `no_sertipikat`, `jenis_hak`, `dsa`, `kec`, `luas`, `pemilik_hak`, `pembeli_hak`, `proses`, `ket`) VALUES
(0, '0000-00-00', 0, 'null', '', '', NULL, '', '', NULL, NULL),
(1, '2021-11-03', 57193, 'M', 'Mandiraja Wetan', 'Mandiraja', 3231, 'Indra Faizal Amri', 'Irfan', 'Hibah', 'sffs'),
(2, '2021-11-17', 7521, 'GB', 'Somawangi', 'Mandiraja', 33, 'Purnomo', 'Ajiz', 'Hibah', 'ubfeuwendmia'),
(3, '2021-11-17', 1311, 'M', 'Kaliwungu', 'Mandiraja', 2131, 'Amri', 'Injiz', 'Hibah', 'adasdwq'),
(4, '2021-11-17', 6172, 'M', 'Jalatunda', 'Mandiraja', 723, 'indra', 'Ajiz', 'AJB', 'dadad'),
(5, '2021-12-08', 1234, 'M', 'Somawangi', 'Mandiraja', 111, 'Indra', 'Faizal', 'SKMHT', 'entah'),
(6, '2021-12-08', 57123, 'M', 'Glempang', 'Mandiraja', 123, 'qaz', 'wsx', 'SKMHT', '- sda'),
(7, '2021-12-08', 4321, 'M', 'Beji', 'Banjarmangu', 450, 'Faiz', 'Indra', 'APHT', 'dad'),
(8, '2021-12-16', 1234, 'M', 'Karangtengah', 'Batur', 400, 'Indra', 'wsx', 'AJB', 'gsdff'),
(9, '2021-12-16', 442, 'M', 'Wanadri', 'Bawang', 441, 'fas', 'dads', 'APHT', 'ada'),
(10, '2021-12-16', 13412, 'GB', 'Bandingan', 'Bawang', 5718, 'ufuaebfu', 'ifninin', 'APHT', 'fsad'),
(11, '2021-12-16', 13412, 'M', 'Bandingan', 'Bawang', 5718, 'ufuaebfu', 'ifninin', 'APHT', ''),
(12, '2021-12-16', 6826, 'M', 'Lengkong', 'Rakit', 7000, 'poiuytrewq', 'qwertyuiop', 'AJB,APHB', ''),
(13, '2021-12-16', 6826, 'M', 'Lengkong', 'Rakit', 7000, 'poiuytrewq', 'qwertyuiop', 'AJB,APHB', ''),
(14, '2021-12-16', 1234, 'M', 'Balun', 'Wanayasa', 1234, 'qazwsxedc', 'edcwsxqaz', 'AJB', ''),
(15, '2021-12-16', 1234, 'M', 'Balun', 'Wanayasa', 1234, 'qazwsxedc', 'edcwsxqaz', 'AJB', ''),
(16, '2021-12-16', 102938, 'M', 'Kalilandak', 'Purworejo Klampok', 1234, 'Indra', 'Edi', 'AJB', ''),
(17, '2022-04-28', 1231, 'M', 'Krandegan', 'Banjarnegara', 1212, 'qdadced', 'dasfsfrser', 'AJB', ''),
(18, '2022-04-28', 2113, 'M', 'Kalilunjar', 'Banjarmangu', 300, 'Indra', 'Faizal', 'AJB', '- belum roya'),
(19, '2022-04-28', 9898, 'M', 'Kepakisan', 'Batur', 0, 'Albert', 'Udit', 'SKMHT', ''),
(20, '2022-04-29', 11111, 'M', 'Banjarkulon', 'Banjarmangu', 1111, 'satu satu', 'dua dua', 'AJB', '1 satu'),
(21, '2022-04-29', 2222, 'M', 'Argasoka', 'Banjarnegara', 2222, 'dua dua', 'satu satu', 'APHT', 'dua 2 2 2');

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
(20, 'amria', 'amria', '$2y$10$Hep2TqmTE9BQfMjCrTOkUOr36NIinWYqowXrTSOVyB9PvowIZh4xe', 2, 1),
(25, 'Dea', 'dea01', '$2y$10$.BPkIAhQhrlfrKlHdU64X.TKk2HNb/.i3PgLcT2Qn8m9p2TWC.sQq', 2, 1),
(26, 'indra', 'indra', '$2y$10$lEVEGbpCSFhX8U5qLdceCe8.OAoytifh945ySnHQu6Ge448O04Sx2', 0, 1);

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
  ADD KEY `reg_sertipikat` (`reg_sertipikat`);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tb_proses`
--
ALTER TABLE `tb_proses`
  MODIFY `proses_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_proses_bpn`
--
ALTER TABLE `tb_proses_bpn`
  MODIFY `no_proses_bpn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sertipikat`
--
ALTER TABLE `tb_sertipikat`
  MODIFY `no_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  ADD CONSTRAINT `tb_berkas_ibfk_1` FOREIGN KEY (`reg_sertipikat`) REFERENCES `tb_sertipikat` (`no_reg`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
