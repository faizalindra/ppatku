-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 10:52 AM
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
-- Database: `ppatku`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(3) NOT NULL,
  `nama` varchar(17) NOT NULL,
  `id_kecamatan` int(2) NOT NULL
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
(23, 'Kutabanjarnegara', 2),
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
  `id` int(3) NOT NULL,
  `nama` varchar(18) NOT NULL
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
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` int(5) NOT NULL,
  `tgl_bayar` date NOT NULL DEFAULT current_timestamp(),
  `jum_bayar` int(7) NOT NULL,
  `jenis_bayar` tinyint(1) DEFAULT 0,
  `ket_bayar` varchar(30) DEFAULT ' ',
  `penyetor` varchar(20) DEFAULT 'Tamu',
  `id_berkas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `tgl_bayar`, `jum_bayar`, `jenis_bayar`, `ket_bayar`, `penyetor`, `id_berkas`) VALUES
(1, '2022-08-09', 400000, 1, 'Validasi Pajak', 'Tamu', 1),
(2, '2022-08-09', 100000, 1, 'Suket Desa', 'Tamu', 1),
(3, '2022-08-09', 100000, 1, '', 'Tamu', 1),
(4, '2022-08-09', 500000, 0, '', 'indra', 1),
(5, '2022-08-09', 500000, 1, 'Roya', 'Tamu', 2),
(6, '2022-08-09', 700000, 1, 'SKMHT', 'Tamu', 2),
(7, '2022-08-09', 700000, 0, '', 'Bank Surya Mandiri', 2),
(8, '2022-08-09', 500000, 0, '', 'Bank Surya Mandiri', 2),
(9, '2022-08-09', 900000, 1, 'Peningkatan Hak', 'Tamu', 3),
(10, '2022-08-09', 900000, 0, '', 'Serti', 3),
(11, '2022-08-10', 400000, 1, 'cek plot', 'Tamu', 4),
(12, '2022-08-13', 100000, 1, 'Cek Plot', 'Tamu', 5),
(13, '2022-08-13', 5000000, 1, 'validasi Pajak', 'Tamu', 5),
(14, '2022-08-13', 4500000, 1, 'Balik Nama', 'Tamu', 5),
(15, '2022-08-13', 7000000, 0, '', 'Mujir', 5),
(16, '2022-08-13', 2600000, 0, '', 'Yeni', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id` int(5) NOT NULL,
  `tgl_masuk` date NOT NULL DEFAULT current_timestamp(),
  `reg_sertipikat` int(5) DEFAULT NULL,
  `alamat` int(3) NOT NULL,
  `jenis_berkas` varchar(50) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `nama_pembeli` varchar(50) DEFAULT ' ',
  `tot_biaya` int(9) DEFAULT 0,
  `keterangan` varchar(50) DEFAULT ' ',
  `berkas_selesai` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id`, `tgl_masuk`, `reg_sertipikat`, `alamat`, `jenis_berkas`, `nama_penjual`, `nama_pembeli`, `tot_biaya`, `keterangan`, `berkas_selesai`) VALUES
(1, '2022-08-09', 1, 31, 'AJB,SKMHT', 'Faizal Indra', 'Amri', 600000, '', 3),
(2, '2022-08-09', 2, 125, 'Roya,SKMHT', 'Qedara Faqih', ' Deb. Agus Fatur', 1200000, 'tttuuy', 0),
(3, '2022-08-09', 3, 35, 'Peningkatan Hak', 'Serti Murti', ' ', 900000, '', 1),
(4, '2022-08-10', 9, 136, 'Pemecahan', 'Ruslam Hadi', 'Suwito Nugroho, Darmo Suwito', 400000, 'KTP Darmo hilang', 1),
(5, '2022-08-13', 6, 23, 'APHB', 'Fadlun', 'Yeni, Mujir', 9600000, 'belum ada', 1),
(6, '2022-08-13', 5, 49, 'APHB,Waris', 'Dasda', 'adaffa', 0, '', 3),
(7, '2022-08-13', NULL, 163, 'Waris', 'Suratmo:  Agus, Fitri', 'Fitri', 0, 'yuyuy', 0),
(8, '2022-08-13', NULL, 116, 'AJB,Konversi', 'Fadlun Fauiz', 'Irfan Mahrufi', 0, '', 0);

--
-- Triggers `tb_berkas`
--
DELIMITER $$
CREATE TRIGGER `mk_kelengkapan` AFTER INSERT ON `tb_berkas` FOR EACH ROW insert into tb_kelengkapan set id_kelengkapan=new.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mk_proses` AFTER INSERT ON `tb_berkas` FOR EACH ROW insert into tb_ket_proses set no_proses=new.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_catatan`
--

CREATE TABLE `tb_catatan` (
  `id_catatan` int(5) NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `isi_catatan` tinytext NOT NULL,
  `star_catatan` tinyint(1) NOT NULL,
  `user_id_catatan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_catatan`
--

INSERT INTO `tb_catatan` (`id_catatan`, `tgl`, `isi_catatan`, `star_catatan`, `user_id_catatan`) VALUES
(5, '2022-05-27', 'Butuh ktp', 1, 1),
(9, '2022-07-28', 'Butuh KK Agus B09976', 0, 1),
(10, '2022-07-28', 'Besok pengikatan di PT. Nugraha', 0, 1),
(12, '2022-08-13', 'Besok daftar APHB berkas Yeni', 1, 44),
(13, '2022-08-13', 'Catatan 2', 0, 44),
(14, '2022-08-13', 'Catatan 3', 0, 44),
(15, '2022-08-13', 'Catatan 4', 0, 44);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelengkapan`
--

CREATE TABLE `tb_kelengkapan` (
  `id_kelengkapan` int(5) NOT NULL,
  `ktp_penjual` tinyint(1) DEFAULT NULL,
  `ktp_p_penjual` tinyint(1) DEFAULT NULL,
  `kk_penjual` tinyint(1) DEFAULT NULL,
  `ktp_pembeli` tinyint(1) DEFAULT NULL,
  `ktp_p_pembeli` tinyint(1) DEFAULT NULL,
  `kk_pembeli` tinyint(1) DEFAULT NULL,
  `sppt` tinyint(1) DEFAULT NULL,
  `akta_kematian` tinyint(1) DEFAULT NULL,
  `bpjs` tinyint(1) DEFAULT NULL,
  `imb` tinyint(1) DEFAULT NULL,
  `ktp_ahli_waris` tinyint(1) DEFAULT NULL,
  `kk_ahli_waris` tinyint(1) DEFAULT NULL,
  `persetujuan_hibah` tinyint(1) DEFAULT NULL,
  `ket_beda_nama` tinyint(1) DEFAULT NULL,
  `shm` tinyint(1) DEFAULT NULL,
  `order_` tinyint(1) DEFAULT NULL,
  `spk` tinyint(1) DEFAULT NULL,
  `pengantar_roya` tinyint(1) DEFAULT NULL,
  `ket_kelengkapan` varchar(256) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelengkapan`
--

INSERT INTO `tb_kelengkapan` (`id_kelengkapan`, `ktp_penjual`, `ktp_p_penjual`, `kk_penjual`, `ktp_pembeli`, `ktp_p_pembeli`, `kk_pembeli`, `sppt`, `akta_kematian`, `bpjs`, `imb`, `ktp_ahli_waris`, `kk_ahli_waris`, `persetujuan_hibah`, `ket_beda_nama`, `shm`, `order_`, `spk`, `pengantar_roya`, `ket_kelengkapan`) VALUES
(1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(2, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, ''),
(3, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, ''),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KTP Pihak 2 salah'),
(6, NULL, NULL, 1, 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ket_proses`
--

CREATE TABLE `tb_ket_proses` (
  `no_proses` int(5) NOT NULL,
  `ukur` tinyint(1) DEFAULT NULL,
  `pert_teknis` tinyint(1) DEFAULT NULL,
  `perijinan` tinyint(1) DEFAULT NULL,
  `pengeringan` tinyint(1) DEFAULT NULL,
  `cek_plot` tinyint(1) DEFAULT NULL,
  `cek_sertipikat` tinyint(1) DEFAULT NULL,
  `roya` tinyint(1) DEFAULT NULL,
  `ganti_nama` tinyint(1) DEFAULT NULL,
  `tapak_kapling` tinyint(1) DEFAULT NULL,
  `bayar_pajak` tinyint(1) DEFAULT NULL,
  `konversi` tinyint(1) DEFAULT NULL,
  `waris` tinyint(1) DEFAULT NULL,
  `balik_nama` tinyint(1) DEFAULT NULL,
  `peningkatan_hak` tinyint(1) DEFAULT NULL,
  `skmht` tinyint(1) DEFAULT NULL,
  `ht` tinyint(1) DEFAULT NULL,
  `ganti_blangko` tinyint(1) DEFAULT NULL,
  `znt` tinyint(1) DEFAULT NULL,
  `iph` tinyint(1) DEFAULT NULL,
  `kutip_su` tinyint(1) DEFAULT NULL,
  `validasi_sert` tinyint(1) DEFAULT NULL,
  `lainnya` tinyint(1) DEFAULT NULL,
  `ket_proses` varchar(256) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ket_proses`
--

INSERT INTO `tb_ket_proses` (`no_proses`, `ukur`, `pert_teknis`, `perijinan`, `pengeringan`, `cek_plot`, `cek_sertipikat`, `roya`, `ganti_nama`, `tapak_kapling`, `bayar_pajak`, `konversi`, `waris`, `balik_nama`, `peningkatan_hak`, `skmht`, `ht`, `ganti_blangko`, `znt`, `iph`, `kutip_su`, `validasi_sert`, `lainnya`, `ket_proses`) VALUES
(1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 2, NULL, NULL, 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(4, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum ada NOP'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proses_bpn`
--

CREATE TABLE `tb_proses_bpn` (
  `no_proses_bpn` int(5) NOT NULL,
  `tgl_masuk` date NOT NULL DEFAULT current_timestamp(),
  `tgl_selesai` date DEFAULT NULL,
  `no_bpn` smallint(6) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nama_pemohon` varchar(25) NOT NULL,
  `jenis_proses` varchar(30) NOT NULL,
  `id_berkas` int(5) DEFAULT NULL,
  `ket` varchar(50) DEFAULT '''\\'' \\''''',
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proses_bpn`
--

INSERT INTO `tb_proses_bpn` (`no_proses_bpn`, `tgl_masuk`, `tgl_selesai`, `no_bpn`, `tahun`, `nama_pemohon`, `jenis_proses`, `id_berkas`, `ket`, `status`) VALUES
(1, '2022-08-09', '2020-10-12', 6281, 2022, 'Agus Faturi', 'Roya', 2, '', 1),
(2, '2022-08-13', '2022-08-13', 32767, 2022, 'Mujir', 'Balik Nama', 5, '', 1),
(3, '2022-08-13', NULL, 4244, 2022, 'Agust', 'Balik Nama', 2, 'KTP Tidak terdaftar Dukcapil', 2),
(4, '2022-08-13', NULL, 32767, 2022, 'Agus Fatur', 'Ganti Nama', 2, 'Pending', 0),
(5, '2022-08-13', NULL, 32767, 2022, 'Adfaaa', 'Waris', 6, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(2) NOT NULL,
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
  `no_reg` int(5) NOT NULL,
  `tgl_daftar` date NOT NULL DEFAULT current_timestamp(),
  `no_sertipikat` int(6) NOT NULL,
  `jenis_hak` tinytext NOT NULL,
  `dsa` int(3) NOT NULL,
  `luas` smallint(6) DEFAULT 0,
  `pemilik_hak` varchar(50) NOT NULL,
  `pembeli_hak` varchar(50) DEFAULT ' ',
  `proses` varchar(50) DEFAULT NULL,
  `ket` varchar(50) DEFAULT ' ',
  `is_used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sertipikat`
--

INSERT INTO `tb_sertipikat` (`no_reg`, `tgl_daftar`, `no_sertipikat`, `jenis_hak`, `dsa`, `luas`, `pemilik_hak`, `pembeli_hak`, `proses`, `ket`, `is_used`) VALUES
(1, '2022-07-28', 555, 'M', 31, 0, 'Faizal Indra', 'Amri', 'AJB,SKMHT', '- Titipan Agung', 0),
(2, '2022-07-28', 523, 'M', 125, 0, 'Qedara Faqih', ' Deb. Agus Fatur', 'SKMHT', '', 1),
(3, '2022-07-28', 524, 'GB', 35, 45, 'Serti Murti', ' ', 'Peningkatan Hak', '', 0),
(4, '2022-07-28', 634, 'M', 71, 0, 'Ratna Fatima', ' Deb. Mujer', 'Roya,SKMHT', '', 0),
(5, '2022-07-28', 24, 'M', 49, 500, 'Dasda', 'adaffa', 'APHB,Waris', '', 0),
(6, '2022-08-01', 90, 'M', 23, 79, 'Fadlun', 'Yeni, Mujir', 'APHB', '', 0),
(7, '2022-08-01', 555, 'M', 59, 305, 'Kusuma', 'Cahyo Guntur Wijaya Hartanto', 'Lain-Lain', '', 0),
(8, '2022-08-05', 9898, 'GB', 23, 45, 'PT. Adi Cahya Purnama', 'Indra Faizal Amri', 'AJB,Peningkatan Hak', '- Akad PT', 0),
(9, '2022-08-09', 467, 'M', 136, 60, 'Ruslam Hadi', 'Suwito Nugroho', 'Pemecahan', '', 0),
(10, '2022-08-09', 926, 'M', 204, 120, 'Hajarudin', 'Deb. Muhidin al Komari', 'APHT', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role_id`, `is_active`) VALUES
(0, 'Sugeng Purwito', 'notaris', '$2y$10$6c3801qy.3f4e9PNqaEpfO828/fa3wys/5IAkP.nLMBMzARsLrLa6', 0, 1),
(1, 'Indra', 'admin', '$2y$10$bRDio3SJA/kf2dsCwl5RP.9uWusCWgFPQrmmj98LhN0fT7XlI9c22', 1, 1),
(44, 'staff', 'staff', '$2y$10$YNTVps0/aXL8.h6MGSjmhObu5NFo/L.Z5.xx4KSSGszEuyoEroTAy', 2, 1),
(45, 'qazwsx', 'qazwsx', '$2y$10$lRElG/7jHOhhALJiLehn1OLnoordsPPLrCHWo75odo8Mh780JUDHq', 2, 1),
(46, 'odnww', 'faizal', '$2y$10$dNKzITh05.IImzFHFrzLAeHZO.K2ucpPhn8ZsmQS69u9LvinV46y2', 2, 0),
(48, 'Agus Khoerudin', 'aguss', '$2y$10$cs5ZTUCYtnZ9e4.tIBmo1.nI8zPm6KdkoDbCSNpn2dJZ9BaNISAhO', 1, 1);

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
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `tb_bayar_ibfk_1` (`id_berkas`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_sertipikat` (`reg_sertipikat`),
  ADD KEY `tb_berkas_ibfk_2` (`alamat`);

--
-- Indexes for table `tb_catatan`
--
ALTER TABLE `tb_catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `tb_catatan_ibfk_1` (`user_id_catatan`);

--
-- Indexes for table `tb_kelengkapan`
--
ALTER TABLE `tb_kelengkapan`
  ADD PRIMARY KEY (`id_kelengkapan`);

--
-- Indexes for table `tb_ket_proses`
--
ALTER TABLE `tb_ket_proses`
  ADD PRIMARY KEY (`no_proses`);

--
-- Indexes for table `tb_proses_bpn`
--
ALTER TABLE `tb_proses_bpn`
  ADD PRIMARY KEY (`no_proses_bpn`),
  ADD KEY `id_berkas` (`id_berkas`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sertipikat`
--
ALTER TABLE `tb_sertipikat`
  ADD PRIMARY KEY (`no_reg`),
  ADD KEY `dsa` (`dsa`);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_catatan`
--
ALTER TABLE `tb_catatan`
  MODIFY `id_catatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_proses_bpn`
--
ALTER TABLE `tb_proses_bpn`
  MODIFY `no_proses_bpn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sertipikat`
--
ALTER TABLE `tb_sertipikat`
  MODIFY `no_reg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD CONSTRAINT `tb_bayar_ibfk_1` FOREIGN KEY (`id_berkas`) REFERENCES `tb_berkas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD CONSTRAINT `tb_berkas_ibfk_1` FOREIGN KEY (`reg_sertipikat`) REFERENCES `tb_sertipikat` (`no_reg`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_berkas_ibfk_2` FOREIGN KEY (`alamat`) REFERENCES `desa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_catatan`
--
ALTER TABLE `tb_catatan`
  ADD CONSTRAINT `tb_catatan_ibfk_1` FOREIGN KEY (`user_id_catatan`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_kelengkapan`
--
ALTER TABLE `tb_kelengkapan`
  ADD CONSTRAINT `tb_kelengkapan_ibfk_1` FOREIGN KEY (`id_kelengkapan`) REFERENCES `tb_berkas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_ket_proses`
--
ALTER TABLE `tb_ket_proses`
  ADD CONSTRAINT `mk_ket_proses` FOREIGN KEY (`no_proses`) REFERENCES `tb_berkas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_proses_bpn`
--
ALTER TABLE `tb_proses_bpn`
  ADD CONSTRAINT `tb_proses_bpn_ibfk_1` FOREIGN KEY (`id_berkas`) REFERENCES `tb_berkas` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `tb_proses_bpn_ibfk_2` FOREIGN KEY (`id_berkas`) REFERENCES `tb_berkas` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `tb_sertipikat`
--
ALTER TABLE `tb_sertipikat`
  ADD CONSTRAINT `tb_sertipikat_ibfk_1` FOREIGN KEY (`dsa`) REFERENCES `desa` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
