-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 05:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydemik`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenissurat`
--

CREATE TABLE `jenissurat` (
  `idJenis` int(11) NOT NULL,
  `kodeJenis` varchar(10) NOT NULL,
  `jenisSurat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenissurat`
--

INSERT INTO `jenissurat` (`idJenis`, `kodeJenis`, `jenisSurat`) VALUES
(1, '-', '-'),
(2, 'KP', 'Kerja Praktek'),
(3, 'SK', 'Skripsi'),
(4, 'PG', 'Pengantar Penelitian');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`) VALUES
(1, 'Surat Masuk'),
(2, 'Surat Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `keperluan`
--

CREATE TABLE `keperluan` (
  `idKeperluan` int(11) NOT NULL,
  `Keperluan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keperluan`
--

INSERT INTO `keperluan` (`idKeperluan`, `Keperluan`) VALUES
(1, 'Permohonan Beasiswa'),
(2, 'Mencari Kerja'),
(3, 'Perpanjangan ASKES'),
(4, 'Permohonan Wawancara'),
(5, 'Permhonan Izin Belajar'),
(6, 'BPJS');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `idMahasiswa` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `idProdi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`idMahasiswa`, `nim`, `nama`, `alamat`, `tlp`, `idProdi`) VALUES
(3, 3216701, 'Dedril Maiyanto', 'Jl.Hang jebat Gg.Serai No.95 Kijang Kota', '081364532380', 1),
(4, 1213702, 'M.Sanjaya', 'Jl.Hang jebat Gg.Serai No.95 Kijang Kota', '082169814220', 3),
(5, 3213426, 'Desfi Lazuardi', 'TPI', '081374696886', 1),
(8, 1214404, 'Bening Utami', 'Jl.Batu 5 Belakang Polres', '082110502129', 3),
(9, 3216412, 'Kurnia Hari Saputra', 'Jl.Brigjend Katamso', '-', 1),
(10, 1214448, 'Serly', 'Jl.MT Haryono No.38 A-B', '081266731684', 3),
(11, 1214415, 'Yurinanda', 'Jl.Tata Bumi No.01 Ceruk Ijuk Kec.Toapaya - Bintan', '082288428504', 3),
(12, 3214017, 'Dewi Laksri Yuliana', 'Jl.Sutan Syahrir No.57 Tanjungpinang Barat \nKepulauan Riau', '081372474665', 1),
(13, 1212006, 'Gayatri Dwisetya Cahyani', 'Jl.Brigjend Katamso', '081275657317', 3),
(14, 3214437, 'Tommy', '', '081261488738', 1),
(15, 3214441, 'Slamet Heldi', '', '082353069884', 1),
(16, 1214446, 'Sandovik Ardian Pratama', '-', '-', 3),
(17, 1214451, 'Firman Dwi Saputra', '', '081973374385', 3),
(18, 3215705, 'Tuti Mujiastuti', '-', '085363289046', 1),
(19, 1213008, 'Reno Kurniawan', '', '082384382237', 3),
(20, 1216432, 'Gerry Lee Gautama', '', '081372301151', 3),
(21, 1212428, 'Karno', '', '', 3),
(22, 1213015, 'Bella Reuni', '', '', 3),
(23, 4216401, 'Lindy Chua', 'Jl.Ir Sutami Gg.Sukaramai No.22', '081270759928', 2),
(24, 3216418, 'Fergiana', 'Jl.Pasar Ikan Lr.IV No.1', '081261490211', 1),
(25, 3216410, 'Wellian Riska', 'Jl.Pelantar Gunung Kawi No.06', '085263139798', 1),
(26, 4216408, 'Maria Mina', 'Jl.Diponegoro No.739 Tanjungpinang', '085379261675', 1),
(27, 3215622, 'Iwan Purnomo', '', '085668896680', 1),
(28, 1215625, 'Rio Putra', '', '081277273366', 3),
(29, 1215623, 'Bayu Hermawan', '', '082325021116', 3),
(30, 3215411, 'Yuddi', '', '081276703778', 1),
(31, 3215616, 'Hejli Sandi Manik', '', '081378300484', 1),
(32, 1215624, 'Tulus P.S', '', '', 3),
(33, 4215603, 'Melian Yanti', '', '', 2),
(34, 1216413, 'Yulinda', 'Jl.Brigjend Katamso Gg.Meranti No.60', '085762351226', 3),
(35, 1216424, 'Kelvin', 'Jl.Merdeka No.125', '082389130511', 3),
(36, 3214004, 'Nurmalitasari', 'Kijang Kota Jl.Kp Lengkuas RT.05 RW.02', '081991711191', 1),
(37, 1215008, 'Bayu Sigit Wijanarko', 'Jl.brijend Katamso No.92 Km 2.5', '081991949520', 3),
(38, 1213006, 'Defri Muhfudli Nurcahyo', 'Jl.brijend Katamso No.92 Km 2.5', '085788859895', 3),
(39, 3215437, 'Eko Phartiono Pangestu', '', '', 1),
(40, 3215412, 'Suhartono', '', '', 1),
(41, 3216439, 'Wan Arie Oktavian', 'Jl.Serasan No.29 Seijang', '082288380811', 1),
(43, 3215426, 'Ari Saputra', '', '', 1),
(44, 3215423, 'Yusup', '', '', 1),
(45, 3215406, 'Ronaldi Pitun B', '', '', 1),
(46, 3215409, 'Ray Kumar ', '', '', 1),
(47, 4216702, 'Heliyanto', '', '085765383155', 2),
(48, 1216703, 'MUHAMMAD DWI KUNIA LUBIS', '', '', 3),
(49, 3213401, 'Iswahyudi', 'Perum SD 03 Tanjungpinang Timur', '082285580286', 1),
(50, 1215427, 'Wellystia', 'Perum Griya Hangtuah Permai Blok F No.22', '082298353895', 3),
(51, 3213004, 'Chronika Aprillia Sinaga', 'Jl.Pramuka No.16', '082384106975', 1),
(52, 1213452, 'Setya Handayani', 'Jl.Nusantara KM.13', '085375992423', 3),
(53, 1216421, 'Muhammad Andyka Pratama', '-', '082285696162', 3),
(54, 3216438, 'Tri Prawira', 'Jl.Nusantara Perum Bandara Asri', '082285054442', 3),
(55, 1212002, 'Syaivijar Anggratama', 'Jl.Ganet Km.12', '082173059972', 3),
(56, 3212416, 'Yogi Dwi Saputra', 'Jl.Hang Lekir Km.10', '082157052224', 1),
(57, 3217706, 'Iwan Yulianto', 'Perum Balai City Garden Blok 06 No.26 RT/RW 005/001', '082388807775', 1),
(58, 4214418, 'Rezqy Ramadan', '', '', 2),
(59, 3211428, 'Deddy', 'Jl.Brigjend Katamso Gg.Damar 11 No.84', '', 1),
(60, 3212410, 'Agustris Sutama', '', '', 1),
(61, 3215011, 'Alinotasia Frastika S', 'Perum Permata Kharisma Blok E No.07', '0895320795964', 1),
(62, 4213421, 'Ervi Pratiwi', 'Jl Dr.Sutomo RT/RW 006 Kel.Bukit Cermin', '081266263437', 2),
(63, 1215415, 'Lisa Yulianda Sari', '', '082284234557', 3),
(64, 1214415, 'Yurinanda', 'Jl.Ir Sutami LR. Hutan Lindung I No.40', '082288428504', 2),
(65, 4214012, 'Riska Indrayani', 'Perumahan Mahkota Alam Raya Blok J No.3', '082172376353', 2),
(66, 1214013, 'Nana Lazuardi', 'Jln.Lembah Purnama Gg.Antara No.1', '085931015503', 3),
(67, 1213455, 'Anggie Novita H', '', '082391455499', 3),
(68, 1215432, 'Juno Redian Bagaskara', 'Kp.Karang Rejo No.60', '081270858572', 3),
(69, 3217422, 'Ansiyah Muriyani', 'Jl. Pramuka Lr. Buru No.11', '081378304050', 1),
(70, 1217407, 'Kanda Yuldio', 'Jl.Srimulyo Gg.Kelinci No.12', '082389388201', 3),
(71, 1213452, 'Setya Handayani', 'Jl.Nusantara Km.13', '085375992423', 3),
(72, 1215625, 'Rio Putra', '', '', 3),
(73, 1212008, 'Riska Andayani', '', '', 3),
(74, 3215407, 'Herianti', '', '', 1),
(75, 3217702, 'Imanuel Pinem', 'Perum Lembah Asri Blok D1 No.11', '081372491616', 1),
(76, 4214011, 'Riza Ratnawati', '', '', 2),
(77, 1215417, 'Novan Prasetyo', '', '', 3),
(78, 4214012, 'Riska Indriani', '', '', 2),
(79, 1217605, 'Syah Reza Fa\'izi', '', '', 3),
(80, 1217605, 'Syah Reza Fa\'izi', 'Kp.Raya RT.004 RW.009 Kel.Tanjung Uban Kota\nKec.Bintan Utara', '', 3),
(81, 3212005, 'Renzy Asera', '', '085762849368', 1),
(82, 3216604, 'Sella  Matussaqdiyah', 'Kp.Harapan Teluk Sasah', '085830524126', 1),
(83, 1214003, 'Slamet Raharjo', '', '', 3),
(84, 1212425, 'Ella Ferdian', 'Jl.Sultan Sulaiman Kp.Bulang Bawah No.33 RT.003 \nRW.010', '081372006519', 1),
(85, 1214436, 'Agung Primadana', 'Perum Pinang Cipta Karya Blok. B KM.8\n', '082392822656', 3),
(86, 3215620, 'Hengki Eka Putra', '', '', 1),
(87, 4215405, 'Rino Sahputra', 'Perm.Alam Gas Residence Blok.C No.3', '08127539004', 2),
(88, 3216410, 'Wellian Riska', 'Jl.Pelantar Gunung Kawi No.6', '082166259818', 1),
(89, 4216401, 'Lindy Chua', 'Jl.Ir Sutami Gg.Suka Ramai No.22', '081270759928', 2),
(90, 3215710, 'Rieza Rakhmawati', '', '081267307788', 1),
(91, 3215707, 'Endah Fri Handayani', '', '', 1),
(92, 1442701, 'Dedek Suryani', '', '085761700287', 2),
(93, 1212427, 'Emir Zariyadi', 'Jl. Pahlawan, Dabo Singkep', '082381234678', 3),
(94, 3213007, 'Dwi Meilyanto', 'Jl.Kampung Jawa Kel.Sungai Lekop', '082310305342', 1),
(95, 1212427, 'Emir Zariayadi', '', '082381234678', 3),
(96, 3214428, 'David', '', '081372441912', 1),
(97, 1215624, 'Tulus Pardamean Simanullang', 'LDII Blok R No.143 Kec. Seri Kuala Lobam\nKab. Bintan Utara - Kepulauan Riau', '082161230419', 3),
(98, 3214009, 'Mofika Herawati', 'Jl. Pramuka Gang Tanama No.2B', '081275642042', 1),
(99, 4215418, 'Puput Lutfiarani', '', '08117011516', 2),
(100, 3216702, 'Kisman Prayogie', 'Jl.DI Panjaitan No.16 \nRT.001 / RW.008 ', '081372657585', 1),
(101, 3216701, 'Dedril Maiyanto ', 'Jl.Hang Jebat GG.Serai No.95', '081364532380', 1),
(102, 1213004, 'Ade Rainalwi', '', '082382606063', 3),
(103, 3216012, 'Devy Amelia', 'Perm. Mahkota Alam Permai Blok L No.6', '082386387407', 1),
(104, 3216009, 'Haifa Nabila Oktaviani', 'Jl.R.E Martadinata No.28 KM.6', '083184110440', 1),
(105, 1216005, 'Muhammad Farid Hasyami', 'Jl.Kota Piring Gg. Putri Riau Lr.1 No.5', '083173001630', 3),
(106, 1216011, 'Muhammad Fachrizan', 'Kp.Bugis Batu Gajah', '085668377172', 3),
(107, 3216003, 'Tyo Pratama W', 'Perm. Griya Senggarang Permai Blok.B No.24', '087791558164', 1),
(108, 3216002, 'Eko Budi Prayitno', 'Jl.Tanjung Uban KM.36', '082174765768', 1),
(109, 3216011, 'Novi Ardita', 'Jl.Lintasan Bungguran No.044', '082286202886', 1),
(110, 1215441, 'Aprilia F Igo', 'Perum Bukit Galang Permai Blok.J No.21', '082166513260', 3),
(111, 1215424, 'Bintan Aditama', 'Jl.Gatot Gg.Putri Bima No.38', '085264000960', 3),
(112, 1217023, 'Nasran', 'Jl.Lembah Purnama', '082284601063', 3),
(113, 3214011, 'Iva Astriyani', 'Jl.Gudang Minyak', '081261685596', 1),
(114, 3214417, 'Dewi Surtykanti', 'KM.13', '083183258878', 1),
(115, 3215012, 'Wilson Fernando', 'Jl.Gatot Subroto KM.5 Bawah', '082390098199', 1),
(116, 3217010, 'Galih Suryo Nugroho', 'JL.RH Fisabilillah No.586', '082389005344', 1),
(117, 3216608, 'Adi Kurniawan', 'Jl.Tanjung Uban,KM.29 Kangboi', '081536557919', 1),
(118, 3216601, 'Asih Nugroho', 'Perm Lobam Mas Asri Blok M.168', '08192608854', 1),
(119, 3216603, 'Paulina Lubis', 'Perm Lobam Mas Asri Blok M.13', '082169799237', 1),
(120, 3216605, 'Felany', 'Jl.Taman Sari No.3B', '085668818280', 1),
(121, 3216606, 'Rophan Afdhillah', 'Kampung Raya Gg.Sakinah', '085810779298', 1),
(122, 3216607, 'Danil Syah', 'Kampung Raya Gg.Sakinah', '085363008663', 1),
(123, 3216602, 'Ari Kuswoyo', 'Perm Lobam Mas Asri Blok M.206', '08126102329', 1),
(124, 3216609, 'Delvina Fressia', 'Kp.Mentingi Imam Bonjol RT.003/RW.001', '081267630232', 1),
(125, 3216610, 'M.Aldi Mahendra', 'Tg.Permai Blok A No.67', '081275807694', 1),
(126, 4214431, 'Dian Novryanto', 'Jl. Sultan Machmud No.5', '085278099877', 2),
(127, 4217417, 'Maery Kenti', 'Jl.Potong Lembu', '089623356378', 2),
(128, 3216417, 'Ahmad Kriswantoro', 'Jl.Arah Tanjung Uban KM.18 Mantrust', '083184071523', 1),
(129, 1215009, 'Angger Andrea Amanda', 'Perm.Mega Asri Pratama Blok D. No.8\nTanjungpinang Timur', '0813985571110', 3),
(130, 4214409, 'Silvia Elrahman', 'Jl.Durai II No.13 Seijang', '085272523432', 2),
(131, 1217444, 'Musi Muntian Tasena', 'Perm Mahkota Alam Raya 3 No.28A', '082326708881', 3),
(132, 1217427, 'Yogi Indrawan Hamzah', 'RT.02 RW.01 Gunung Kijang Kab.Bintan', '085272950544', 3),
(133, 1216412, 'Tengku Andy Wahyudi', 'Perm. Lembah Asri KM.IX Blok K No.7', '085834671484', 1),
(134, 1214003, 'Selamet Raharjo', '', '085668065683', 3),
(135, 3217435, 'Muhamad Vikry Karnadi', 'Jl.H Ungar Lr.Manjangan No.7 ', '082170041223', 1),
(136, 1214014, 'Widya Rezki Ramadhani', 'Jl.Harmoko bt.7', '082170611148', 3),
(137, 1217403, 'Irfan Cahyo Oktariawan', 'Jl.Perum Taman Lestari B4 No.12\n Batu Aji - Batam', '081270134014', 3),
(138, 3217404, 'Ferri Martin', 'Perm Nusa Raya No.17B', '081370690983', 1),
(139, 3217431, 'Gusparizal', 'Perum Griya Indo Kencana Sei Lekop\nBintan Timur', '082391845371', 1),
(140, 3217704, 'Amiruddin', 'Jl. Gatot Subroto Blok.E No.8', '081364560207', 1),
(141, 4214426, 'Wira Cristina', '', '', 2),
(142, 1217703, 'Yoga Pradana', 'Jl.Ganet KM.11 Bintan Permai', '081270080632', 3),
(143, 3217433, 'Rahmat Kurniawan', 'Mutiara Bintan Blok B-14', '08127772696', 1),
(144, 3214467, 'Willy', 'Jl.Batam No.12', '082283657099', 1),
(147, 3214405, 'david', 'Jalan  Ir. Sutami', '085668852723', 1),
(148, 1217426, 'Nurcholis Gading P', 'Jl.Sutan Mahmud No.68 Tanjung Unggat', '085700397203', 3),
(149, 1217430, 'Dhaniel Pratama', 'Jl.Brigjen Katamso', '081288947369', 1),
(150, 3216439, 'wan arie oktavian', 'jalan serasa no 29 sei jang', '082288380811', 1),
(151, 3215012, 'wilson fernando', 'batu 5 bawah', '082390098199', 1),
(152, 4214014, 'Vanisa Laurenza', 'Perum Kijang Kencana', '082210357077', 2),
(153, 1215421, 'Suyamto Widodo', 'Jl.Pantai Impian', '089560942146', 3),
(154, 1212444, 'Muhammad Algifari Imron', '', '081991638838', 3),
(155, 3215012, 'Wilson Fernando', 'BT.5 Bawah', '082390098199', 1),
(156, 4215424, 'Berly Agung Perdana', 'Gang kayu putih no 43 Tanjungpinang', '085271924714', 2),
(157, 1213005, 'Hardi', 'Kp.Pisang RT.002 RW.009 Kijang Kota', '082288428480', 3),
(158, 1215012, 'Dimas Febrian', 'Jalan D.I panjaitan km 9 Cipta Rezky no 1', '082285940250', 3),
(159, 1215012, 'Hendrik Kurniawan', 'jalan D.I Panjitan km 9 Cipta rezky no. 1', '082285940250', 3),
(160, 1215110, 'Hagus Purnomo', 'Jalan Pompa Air no 36', '089627467326', 3),
(161, 3217413, 'YUDI', 'Jalan Hutan Lindung', '085805220051', 1),
(162, 3212416, 'Yogi Dwi Saputra', 'Jalan Hanglekir', '082157052224', 1),
(163, 1212440, 'Ahmad Arfandi', '', '081268063334', 3),
(164, 1212448, 'Adhitia Noer Haiman', '', '081378305509', 3),
(165, 1212427, 'EMIR ZARIYADI', '', '082381234678', 3),
(166, 4212405, 'Eka Putri Hendryan', '', '081372647347', 2),
(167, 4212413, 'Ika Ayu Fatekhasari', '', '085364543210', 2),
(168, 3215708, 'Ratna Lia Usmanti', '', '081372992006', 1),
(172, 3217601, 'Irawati Tampubolon', 'Kawasan BIIE Lobam, Dormitory 10 Unit 9', '085374204229', 1),
(173, 1215006, 'Julio Dominggus', 'Km. 9 Jalan Handoyo Putro', '081267182155', 3),
(174, 3217606, 'Sihol Roito Rohana Samosir', 'LOBAM MAS BLOK D NO. 11 ', '', 1),
(175, 4217603, 'Tika Permata Sari Br. Tarigan', 'LOBAM MAS BLOK E NO. 23 A ', '', 2),
(176, 3214466, 'Mufti Saldi', 'Jalan Kukindo KM.20 Kijang', '081268146531', 1),
(177, 1217454, 'Hendranita Sitorus', 'jalan Pramuka Lorong Belitung No. 8 c', '081375407039', 3),
(178, 3212416, 'Yogi Dwi Saputra', 'Jalan Hang Lekir', '082157052224', 1),
(179, 1214422, 'Anton Rio', '', '082169971148', 3),
(180, 3215704, 'Berthin Mila sari', '', '082169009006', 1),
(181, 1214447, 'Kurnia Fajar Nanda', '', '082176460872', 3),
(182, 3217610, 'elsera ferani', '', '', 1),
(183, 1212433, 'Mitra Qalbu', 'Jl. Pantai Impian Gg. Lumba-lumba 3 No.1', '08126197464', 3),
(184, 1212433, 'Mitra Qalbu', 'Jl. Pantai Impian Gg. Lumba-lumba 3 No.1', '08126197464', 3),
(185, 1212433, 'Mitra Qalbu', 'Jl. Pantai Impian Gg. Lumba-lumba 3 No.1', '08126197464', 3),
(186, 4216402, 'Raymond Rinaldy', '', '08126821809', 1),
(187, 4216402, 'Raymond Rinaldy', 'Jalan Sumatera No 16', '08126821809', 1),
(188, 1216008, 'Samuel Hasiholan Simare Mare', 'Jln. Hanjoyo Putro Gg.Kamboja', '081372634809', 3),
(189, 1213013, 'ARI RAMDAHAN', 'JALAN GUDANG MINYAK NO. 278', '081268643631', 3),
(190, 3217419, 'Jessica', 'Jalan Haji Unggar Lr. Sumba No. 70', '081364995353', 1),
(191, 3216606, 'Rophan Afdhillah', 'Kampung Raya Gank Sakinah RT 002/ RW 009 Tanjung Uban', '085810779298', 1),
(192, 3214017, 'Dewi Laksri Yuliana', 'Perum. Hangtuah Blok C1 No. 10 Km. 11', '081372474665', 1),
(193, 1214447, 'Kurnia Fajar Nanda', '', '', 3),
(194, 3215004, 'Ahmad Fadzil', 'Hangtuah Permai Blok R No. 1', '082385388727', 1),
(195, 3215004, 'Ahmad Fadzil', 'Hangtuah Permai Blok R No. 1', '082385388727', 1),
(196, 3214005, 'Tiras Iksani', 'Perumnas Tokojo Blok K No. 16', '083180463684', 1),
(197, 3216606, 'Rophan Afdhillah', 'Kp.Raya ,Jl.  Nahkoda Lancang \nGg Sakinah - Tanjung Uban\n', '', 1),
(198, 3215002, 'Windy Athaya Imantha Putri', 'Jl.DI Panjaitan KM.9 No.23 \nTanjungpinang', '082389924310', 1),
(199, 3215009, 'Pehulisa', 'Kantor Satpol PP \nKota Tanjungpinang', '081372661768', 1),
(200, 1217618, 'Petrus F Gede Kian', 'Taman Surya Indah No. 6 Kel. Teluk Sasah Kec. Seri Kuala Lobam', '', 3),
(201, 1217019, 'Yohanes Gede', 'Taman Surya Indah No. 6 Kel. Teluk Sasah Kec. Seri Kuala Lobam', '', 3),
(202, 3217614, 'Elsera farani', 'Lobam Mas Asri Blok C No. 22', '', 1),
(203, 1217429, 'Muhamad Miftahudin NST', 'Jln Brigjen Katamso No.30', '081277706162', 3),
(205, 3214013, 'Miranda Fajry', 'Jalan Bhayangkara No. 21', '081991518287', 1),
(206, 4214009, 'Kurniawati Putri', 'Jalan R.E Martadinata No. 68 Km. 6', '081363900264', 2),
(207, 3214014, 'Farlyandi Fadillah ', 'Jalan Gatot Subroto Perum. Bumi Intan Sari Blok C No. 16', '081364059114', 1),
(208, 4217005, 'Muhammad Rafil Saputra', 'Jalan Saputra No. 52 Rt 01/ Rw 05', '081379414981', 2),
(209, 1217418, 'Supriyati', 'Jalan Raya Uban Km. 14 PRM SDN 007 TT', '085767248342', 3),
(210, 1216005, 'Muhammad Farid Hasymi', 'Jalan Kota Piring Gang putri Riau IV Lorong 1 Nomor 5', '0878-6781-4004', 3),
(211, 3216421, 'Dicky Nopfika Chandra', 'KM 48 Bintan Buyu', '0823-8327-7827', 1),
(212, 1213485, 'Nurlin Firdaus', '', '', 3),
(213, 3217019, 'Muhammad Rizky Rusdiansyah', 'Perum Citra mangoes I Kel. batu IX Tanjungpinang Timur', '0813-7213-4407', 1),
(214, 3216423, 'M.H.Iqbal', 'Kp. Madong', '0812-7703-0034', 1),
(215, 3214004, 'Nurmalitasari', 'Kijang', '0819-9171-1191', 1),
(216, 1216703, '1216703', 'Pramuka Lorong Nias No. 11', '0856-89901-7582', 3),
(217, 1216703, 'M. Dwi Kurnia Lubis', 'Pramuka Lorong Nias No 11', '0856-8901-7582', 1),
(218, 3212433, 'Sri Hartati ', 'Perumahan Tiban Koperasi Blok K No. 81', '0853-5577-3381', 1),
(219, 4214009, 'Kurniawati Putri', 'Jln.Martadinata No.68', '08127795642', 2),
(220, 3215009, 'Pehulisa', 'Perum. Griya Bestari Blok.C No.18', '081372661768', 1),
(221, 4214009, 'Kurniawati Putri', 'Jalan Martadinata No.68 ', '08127795642', 2),
(222, 1214013, 'Nana Lazuardi', 'Jl.Lembah Purnama Gg.Antara No.1', '085931015503', 3),
(223, 3216403, 'RIKA FITRIANI', 'KP. MEKAR JAYA GANG NURI NO 70', '0823-9293-2190', 1),
(224, 3216406, 'HAFIDAH MUNA DINA RIMADHANI', 'JALAN RE. MARTADINATA KM 6', '0822-8800-0424', 1),
(225, 3213012, 'Maruli Sosor Manalu', 'Jalan Haji Ungar Lr. raya No. 48 Tanjungpinang', '0823-8673-4290', 1),
(226, 1214421, 'Muhammad Aifin Narian Has', 'Kp. Air Raja', '0812-8083-694', 3),
(227, 4214004, 'Panjie Bagaskara', '', '', 2),
(228, 3216606, 'Rophan Afdhillah', 'tanjung uban', '0858-177-9298', 1),
(229, 3216607, 'Danil Syah Arihardjo', 'lobam', '', 1),
(230, 3216605, 'Felany', 'lobam', '0856-6881-8280', 1),
(231, 3216602, 'Ari Kuswoyo', 'lobam', '0812612329', 1),
(233, 3216601, 'Asih Nugroho', 'lobam', '0819-2608-854', 1),
(234, 3216609, 'Delvina Fressia', 'lobam', '812-7630-232', 1),
(235, 3216603, 'Paulina Lubis', 'lobam', '0812-6979-9237', 1),
(236, 3217428, 'Julianto', 'Jl.W.R Supratman', '081266801345', 1),
(237, 4217417, 'Maery Kenti', 'Jl.Potong Lembu Gg.Mutiara I No.72', '0895335489635', 2),
(238, 3214421, 'SONIA SEVIROVA', 'JALAN DELIMA NO. 61', '0812-7549-4742', 1),
(239, 3213401, 'ISWAHYUDI', '', '', 1),
(240, 1214415, 'YURINANDA', '', '', 3),
(241, 3215005, 'Suci Thania', 'Jalan Rempang No 39 Perumnas Seijang Batu 4', '0853-6347-8501', 1),
(242, 3217708, 'ardy febriansyah', 'KM. 5 atas Jl. Sidorejo Gang Tebu Ireng No. 86 Tanjungpinang', '0852-6455-5239', 1),
(243, 1217455, 'Rudi Yanto', 'Perum griya Hangtuah Permai Blok L No. 2 ', '0812-7065-7599', 3),
(244, 3216413, 'GIANDICKA', '', '', 1),
(245, 3216425, 'FEDRY', '', '', 1),
(246, 3216417, 'Ahmad Kriswantoro', '', '', 1),
(247, 3216404, 'Herwin Sudharum', '', '', 1),
(248, 3217411, 'WILYANTO', 'JALAN M.T HARYONO GANG KAPUR', '0812-7595-6418', 1),
(249, 1216423, 'RAHMAT SANTOSO', '', '', 3),
(250, 3217002, 'M. IRFAN FITRIAN', 'BATU HITAM JALAN PRI KANAN', '0812-7007-0680', 1),
(251, 3216413, 'GIANDICKA', '', '', 1),
(252, 3216425, 'FEDRY', '', '', 1),
(253, 3216438, 'TRI PRAWIRA', '', '', 1),
(254, 3216437, 'ALFRED CHRISTIAN', '', '', 1),
(255, 3217407, 'AAN DWIANTARA', '', '', 1),
(256, 321748, 'NURMILA', '', '', 1),
(257, 321748, 'Nurmila', '', '082174060698', 1),
(258, 3213007, 'Dwi Meilyanto', 'Jalan musi Km 19', '0823-130-5342', 1),
(259, 3216414, 'Ario Tri Prasetyo', 'jalan Nusantara KM 17 Kijang', '0858-3467-4850', 1),
(260, 4214012, 'Riska Indriani', '', '', 1),
(261, 1217408, 'Dwi Oktaviani Pangestuti', 'Jl.Kuantan Gg.Putri Ayu 8', '085363528681', 3),
(262, 1214012, 'Dea Ayuwita', 'Jalan Handoyo Putro KM.9', '0822-8441-8438', 3),
(263, 4214009, 'Kurniawati Putri', 'Jalan Martadinata No 68', '081363900264', 1),
(264, 4214012, 'Riska Indriani ', '', '082287069844', 2),
(265, 1218427, 'Rhatih Prananingsih ', 'Jalan Cendana No. 1 Tanjungpinang ', '0813-7287-0569', 3),
(266, 3218453, 'Tengku Azri Iskandar ', 'Perum.Bumi Indah blok F No. 7 KM. 10 Tanjungpinang ', '0822-8308-1500', 1),
(267, 1214412, 'Ayogya Biyandra', 'Jalan Sri Katon No. 69 Tanjungpinang Timur', '0821-6962-7006', 1),
(268, 3217704, 'Amiruddin. I', 'Jalan Gatot Subroto Gang Raudah Blok E No. 8', '0813-6456-0507', 1),
(269, 3216610, 'M. Aldi Mahendra', '', '0812-7580-7694', 1),
(270, 4217410, 'Muhammad Shidiq', 'Jalan Handoyo Putro Gang Aniedi No. 48', '0812-7565-3299', 2),
(271, 4217606, 'Eka Yantiningsih', 'Jalan Taman sari Rt 002/Rw 003 Tanjung Uban Utara', '0853-7449-9537', 2),
(272, 4217703, 'Erma Kurnia', '', '0812276361096', 2),
(273, 1214013, 'NANA LAZUARDI', 'Jl Lembah Purnama GG.Antara No.1', '081991538397', 3),
(274, 1214013, 'NANA LAZUARDI', 'Jl Lembah Purnama GG.Antara No.1', '081991538397', 3),
(275, 1215627, 'Alexander Pandopotan Simbolon', '', '085834641288', 3),
(276, 4215419, 'Rozizah', '', '', 2),
(277, 1218440, 'Rahmat Taufik', 'Jalan Hang Lekir Batu 10 Tanjungpinang', '0812-7025-7904', 3),
(278, 1214436, 'Agung Primadana', 'Perumahan Pinang Cipta Karya Blok No. 41 Km 8 atas Tanjungpinang', '0823-9282-2656', 3),
(279, 4217004, 'Rizky Novendra Ajserda', 'Jalan Batu Kucing KM 5', '0812-7763-9841', 2),
(280, 4217008, 'Noviana Wulandari', 'Batu 11 perum Kijang Kencana 3', '0813-6321-3569', 2),
(281, 3217707, 'Ady Kurniawan', 'Jalan Pramuka', '0823-8558-4004', 1),
(282, 3217409, 'Sya\'ban Sidryanto', 'Perum Taman Bukit Asri Blok B No 08 Kp. Mekar Baru', '0812-6196-1835', 1),
(283, 1216702, 'MHD Danny', '', '', 3),
(284, 3213401, 'Iswahyudi', 'Tanjungpinang', '08228558006', 1),
(285, 1215423, 'HARUN', '', '', 3),
(286, 4214013, 'ESTER PATTIASINA', '', '', 2),
(287, 4218416, 'Maris Stella Yoe', 'Jalan Soekarno Hatta Gang Nila Blok E No. 4', '0813-6555-8558', 2),
(288, 3218710, 'Ramadhan Eka Saputra', 'Jalan Bhayangkara Gang Bawal No 29', '0823-8367-9120', 3),
(289, 1213452, 'Setya Handayani', 'Jl. Nusantara Km 13 Rt.003,Rw. X ', '0853-7599-2423', 3),
(290, 1213428, 'Ridho Kurniawan', '', '', 3),
(291, 1214007, 'Fachrul Razi', 'Jalan Karimun No. 33', '0823-8992-10418', 3),
(292, 3217433, 'Rahmat Kurniawan', 'Perum. Bukit Indah Lestari Blok H No. 16 Km. 8', '0823-8812-9949', 1),
(293, 1214415, 'Yurinanda', 'Jalan Ir. Sutami, Lorong Hutan Lindung I No. 40', '0822-8842-8504', 3),
(294, 1214404, 'Bening Utami', '', '', 3),
(295, 1213474, 'Febbry Ekalaya Fatwa', '', '', 3),
(296, 1213424, 'Muhammad Yuhandi', '', '', 3),
(297, 1214014, 'Widya Rezki Ramadhani', '', '', 3),
(298, 1214448, 'Serly', '', '', 3),
(299, 1215625, 'Rio Putra', '', '', 3),
(300, 3213460, 'Hasnira', '', '', 1),
(301, 1213486, 'Adhy Purnama Putra', '', '', 3),
(302, 4217005, 'Muhammad Rafil Saputra', 'Jalan Sumatera No. 52', '0813-7941-4981', 1),
(303, 1216005, 'Muhammad Farid hasymi', 'Jalan Kota Piring Gang Putri Riau IV Lorong I No. 5 Kel. Air Raja ', '0878-6781-4004', 3),
(304, 3218434, 'Devi Angeriani', 'Jalan Kampung Baru No. 33', '0823-8204-4077', 1),
(305, 3218707, 'ZULKARNAIN', 'Jalan Ganet Perum BPI Blok Wijaya Kusuma No. 17 TPI', '0823-8914-7584', 1),
(306, 3218706, 'MOCHAMAD JAFAR', 'Jalan Pemuda Gang Pandan No. 1 TPI', '0813-6426-0999', 1),
(307, 1215429, 'Retno Jaya', '', '', 3),
(308, 1215431, 'Alek', '', '', 3),
(309, 1215434, 'Abdul Rachmat', '', '', 3),
(310, 1217008, 'Maykel ', 'd\'green city', '0812-6717-8989', 3),
(311, 3213428, 'Aldino Rio Mela', '', '', 1),
(312, 3213703, 'Sumarwanto', '', '', 1),
(313, 1217452, 'Budi Prasetyo ', 'Jalan Kuantan No 39', '0813-6317-8221', 3),
(314, 1215420, 'Erin Bevidianka', '', '', 3),
(315, 4217002, 'Deni Mellyanti', 'Jalan Harmoko', '0858-3744-5093', 2),
(316, 3213701, 'Dian Monalisa', 'Jl.Pompan Air No.28', '08117002638', 1),
(317, 1213452, 'Setya Handayani', '', '', 3),
(318, 3212008, 'Maryudianto', '', '', 1),
(319, 4211412, 'Fenna Tika Susiani', '', '', 2),
(320, 3215410, 'Andrew A Vesta', '', '', 1),
(321, 3215417, 'Sandra', '', '', 1),
(322, 1218410, 'Ravi Gustianto', '', '', 3),
(323, 1213452, 'setya handayani', '', '', 3),
(324, 1213424, 'Muhammad Yuhandi', '', '', 3),
(325, 3214011, 'Iva Astriyani', '', '', 1),
(326, 4215402, 'Angie', '', '', 2),
(328, 1213013, 'Ari Ramadhan', 'Jalan Gudang Minyak No 28', '0812-6864-3631', 3),
(329, 1213463, 'Heti Barkun', '', '', 3),
(330, 3214445, 'ERNA', '', '', 1),
(331, 3215712, 'Yudha Adi Brattakusuma', '', '', 1),
(332, 3215713, 'Pepy Candra', '', '', 1),
(333, 1215415, 'Lisa Yuliandasari', '', '', 3),
(335, 1216441, 'Crystal Al Thoriq', 'Jl.Pramuka Lr.Bawean Blok.A2 No.09', '082384691941', 3),
(336, 124436, 'Agung Primadana', '', '', 3),
(337, 1213417, 'Irene Frastica Ayu Lestari', '', '', 3),
(338, 3214446, 'Hendro', '', '', 1),
(339, 3215615, 'Kiki Hartanti', '', '', 1),
(340, 3215618, 'Lingga Armadani', '', '', 1),
(341, 4215601, 'Jeny', '', '', 2),
(342, 1215605, 'Erifin', '', '', 3),
(343, 4215610, 'Murhana', '', '', 2),
(344, 4215611, 'Kantun Puji Astuti', '', '', 2),
(345, 4215612, 'Lyse', '', '', 2),
(346, 3215621, 'Thera Dahlisa', '', '', 1),
(347, 3213707, 'Andi Fitri Agustina Waty', '', '', 1),
(348, 4212411, 'Noor Hilda Mawati ', '', '', 2),
(349, 4215407, 'Wira Crisyanti', '', '', 2),
(350, 4214434, 'Manto', '', '', 2),
(351, 1217403, 'Irfan Cahyo Oktariawan', '', '', 3),
(352, 4515410, 'Sheron Angelia', '', '', 2),
(353, 4215410, 'Sheron Angelia', '', '', 2),
(354, 3215703, 'Evi Traningsih', '', '', 1),
(355, 3215407, 'Heriyanti', '', '', 1),
(356, 4214420, 'Cristina Irawati', '', '', 2),
(357, 3218420, 'Verri Ardian Permana', 'Jalan Brigjen Katamso Komplek Angkasa Loka', '0878-0136-9266', 1),
(358, 1215423, 'Harun', '', '', 3),
(359, 3215422, 'Krisna Putra', '', '', 1),
(360, 1214425, 'Dio Sepriyantino Pratama', '', '', 3),
(361, 1214420, 'Robert', '', '', 3),
(362, 3215429, 'Helen', '', '', 1),
(363, 3213436, 'Desfi Lazuardi Putera', '', '', 1),
(364, 1211436, 'Yohendra Saputra', '', '', 3),
(365, 3213435, 'Renold Sintong Marojohan', '', '', 1),
(366, 3214011, 'Iva Astriyani', '', '', 1),
(367, 3214417, 'Dewi Surtykanti', '', '', 1),
(368, 1213458, 'Adelfi Nadayang', '', '', 3),
(369, 4214001, 'M. Solihin', '', '', 2),
(370, 1218442, 'Rachmad Dani', 'Jl.Wila Block E No.40', '', 3),
(371, 4211003, 'RAHMAT', 'Jl Brigjen Katamso', '081378301033', 2),
(372, 3218702, 'Amri Sirait', 'Jalan Hang Tuah Komp. KPLP Tanjung Uban', '0813-7268-5158', 1),
(373, 4217004, 'Rizky Novendra Ajserda', 'Jalan Batu Kucing', '0812-7763-9841', 2),
(374, 4217006, 'Zulfikar', 'Kp. Sukamaju Keke, Kelurahan Kijang Kota', '0859-7543-7232', 2),
(375, 3216423, 'M. Harum Iqbal', 'Kp. Madong', '0822-3436-2203', 1),
(376, 3216421, 'Dicky Nopfika Chandra', 'Bintan Buyu Km 48', '0823-8377-7827', 1),
(377, 1215436, 'Jecka Sona Faranco', 'D.I PANJAITAN KM 8 ATAS', '0821-7072-1984', 3),
(378, 1217023, 'Nasran', 'Jalan Ganet', '0822-8460-1063', 3),
(379, 1217412, 'Ulan Tika Widayanti', 'Jl. Lembah Merpati KM 13 Kp. Sidomakmur, Rt 01/Rw 012', '0858-3053-5949', 3),
(380, 1218432, 'Elly Mulyani', 'Jalan Pemuda No. 24', '0812-7604-686', 3),
(381, 3217432, 'Amir Muda Harahap', '', '', 1),
(382, 3216003, 'Tyo Pratama W.', 'Jl. Raya Tj Uban Km. 16 Taqnjungpinang', '081270375442', 1),
(383, 3216003, 'Tyo Pratama W.', 'Jl. Raya Tj Uban Km. 16 Taqnjungpinang', '081270375442', 1),
(384, 3216003, 'Tyo Pratama W.', 'Jl. Raya Tj Uban Km. 16 Taqnjungpinang', '081270375442', 1),
(385, 1216002, 'Gofar P.', '', '081268521938', 1),
(386, 1213012, 'Maruli Sosor Manalu', 'Jl. Haji Ungar Lr. Raya No. 48', '0823-8673-4290', 3),
(387, 3216010, 'Israyati', '', '', 1),
(388, 1217401, 'Prayogo Pangestu', 'Jalan Kijang Lama Gang Berdikari No 3', '0831-8483-2951', 3),
(389, 1217425, 'Fozimat Amhas', 'Jl. Ahmad Yani Gang Sejahtera No 102', '0811-6666-383', 3),
(390, 3216012, 'Devy Amelia', '', '', 1),
(391, 4215417, 'Shelvy Soviana', 'Jl. Kamboja No. 38/1 Kompleks Pertamina Tanjung Uban', '0831-8415-6604', 2),
(392, 3216010, 'ISRAYATI', '', '', 1),
(393, 3214013, 'Miranda Fajry', 'Jalan Bhayangkara', '0813-7281-9187', 1),
(394, 1216430, 'Agam Yusliman', 'Perum. Kenangan Jaya 6 Blok F14', '', 3),
(395, 3216003, 'Saddam Fadilah', 'Jl Imam Hasanudin Gang Saddam', '081276465662', 1),
(396, 1217454, 'Hendranita Sitorus', 'Jl Karya Batu 9', '081375407039', 3),
(397, 3218443, 'Sri Dwi Susanti', 'Jl. M.T Haryono Gg.Soka Nusa No.35 ', '081268764418', 1),
(398, 3217438, 'Ega Putri', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idPerusahaan` int(11) NOT NULL,
  `namaPerusahaan` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`idPerusahaan`, `namaPerusahaan`, `alamat`, `tlp`) VALUES
(1, 'Dinas Kependudukan', 'Jl.Ahmad Yani Km.5 Tanjungpinang', '-'),
(2, 'Kejaksaan Negeri Tanjungpinang', 'Jl.Basuki Rahmat', '-'),
(3, 'SMPN 8 TANJUNGPINANG', 'Jl.Sutan Syahrir No.57 Tanjungpinang', '-'),
(4, 'MA Madani Bintan', 'Jl.Tata Bumi No.01 Ceruk Ijuk Kec.Toapaya - Bintan', '-'),
(5, 'Standart Music', 'Jl.MT Haryono No.38 A-B', '-'),
(6, 'Junior Futsal', 'Jl.Batu 5 Belakang Polres', '-'),
(7, 'Kantor BPKAD Bintan', 'Jl.Alumina No.1 Kijang', ''),
(8, 'SMKN 4 Tanjungpinang', 'Jl.Nusantara KM.14', ''),
(9, 'Novi Cell Tour & Travel', 'Jl.Kuantan', ''),
(10, 'PT.Bank Negara Indonesia (Persero)', 'Jl.Teuku Umar No.630', ''),
(11, 'SMK Negeri Kundur', 'KM.14 Sawang Selatan Tanjung Batu - Kundur', ''),
(12, 'Kementrian Pekerjaan Umum dan Perumahan Rakyat', '', ''),
(13, 'Salman Bandung', 'Jl.Brigend Katamso No.92 KM.2,5', ''),
(14, 'Klinik Dokter Gigi drg. Riri E', '', ''),
(15, 'PT.Honeywell Indonesia', 'Jl.Teratai Lot D-16,BIE,Lobam,Bintan', ''),
(16, 'Toko Ban Bin', 'Jl. Martadinata No.22, Tanjung Uban', ''),
(17, 'CV. Putra Lagoi', 'Jl.Ketapang, Desa Sebong Lagoi, Kec.Teluk Sebong, Kab.Bintan', ''),
(18, 'PT.Yoshikawa Electronic Bintan', 'Jl.Teratai,Lot 18,Bintan Industriall Estate Kab.Bintan,Prov Kepri', ''),
(19, 'SD Calisa', 'Jl.Bhakti Praja, Pasar Baru - Tanjung Uban', ''),
(20, 'PT.Bintanindo Sukses Perkasa', 'Jl.Raya Praja Tanjung Uban Bintan', ''),
(21, 'Yamaha Asli Motor VIII', 'Jl.Jendral Ahmad Yani Kecamatan Bukit Bestari Kota tanjungpinang', ''),
(22, 'PT. Pinang Lestari', 'Jl.D.I Panjaitan', '441776'),
(23, 'CV.Sumber Rental', 'Jl.Sutan Mahmud No.9C', '082386635673'),
(24, 'Satuan Polisi Pamong Praja Dan Pemadam Kebakaran', 'Jl.H. Agus Salim', ''),
(25, 'Loco EST-2016', 'Jl.Gudang Minyak,Komplek Rimba Jaya No.133', ''),
(26, 'Dinas Perhubungan Kabupaten Bintan', 'Jl.Tanjungpinang - Tanjung Uban Km.42', ''),
(27, 'Supermarket AL BAIK Tanjungpinang', '', ''),
(28, 'SMK Kesehatan Widya Tanjungpinang', 'Jl.DIPanjaitan KM 6 No 15', ''),
(29, 'Nayaka Japan', 'Jl.Basuki Rahmat No.9', ''),
(30, 'Puskesmas Seijang Tanjungpinang', 'Jl.Seijang Km.5 Tanjungpinang', ''),
(31, 'Polres Tanjungpinang ', 'Jl.Ahmad Yani No.1 Tanjungpinang', ''),
(32, 'Honeywell Indonesia', '', ''),
(33, 'SMK NEGERI 1 SERI KUALA LOBAM', '', ''),
(34, 'Media Cell', 'Jl. Adi Sucipto KM.11', ''),
(35, 'PT. Kasri Indo Jaya', 'Jl. DI Panjaitan KM.9', ''),
(36, 'CV. Suria Bintan Perkasa', 'Jl. DI Panjaitan KM.7', ''),
(37, 'SMK Maitreya Wira', 'Tanjungpinang', ''),
(38, 'BAZNAS Tanjungpinang', 'Jl.Soerkarno Hatta No.109 Kp.Baru Tanjungpinang', 'Tanjungpiang'),
(39, 'BAZNAS Provinsi Kepulaun Riau', '', ''),
(40, 'MAN Tanjungpinang', 'Jl. Raya Ali Haji KM. 4 Tanjungpinang', ''),
(41, 'Apotek Mitra Husada', '', ''),
(42, 'SMPN 28 Bintan', '', ''),
(43, 'SMPN 4 Bintan', '', ''),
(44, 'Dr. Yan Cahyadi Anas', '', ''),
(45, 'Dinas Pendidikan Kota Tanjungpinang', 'Jl. Soekarno Hatta', ''),
(46, 'KESBANGPOL LINMAS KOTA TANJUNGPINANG', '', ''),
(47, 'Biro Kesra Kantor Gubernur Kepulauan Riau', '', ''),
(48, 'SMPN 12 Bintan', '', ''),
(49, 'SMPN 17 BINTAN', '', ''),
(50, 'Toko Bangunan Senli Tanjungpinang', '', ''),
(51, 'PT.Citra Utama Distribusindoraya', 'Kawasan Industri citra buana III,Lot.19 - Batam Center', '07787482507'),
(52, 'SDS Maitreyawira', 'Jalan Ir. sutami', '0771 312672'),
(53, 'Rumah Belajar Eduhana III No.36', '', ''),
(54, 'UD. Sinar Permai Indah', '', ''),
(55, 'SDN 007 Bukit Bestari TPI', 'Jalan Basuki Rahmat', ''),
(56, 'PT. BINTAN SENTOSA INDAH', 'JALAN BRIGJEN KATAMSO NO .16-17 TANJUNGPINANG BARAT', '0771 29668'),
(57, 'LOHAS WELLNESS VILLAGE', 'JALAN KAWAL RT 013 RW 005 KEL. TOPAYA ASRI, KAB. BINTAN', '+62 82299000080'),
(58, 'SMA NEGERI 1 SINGKEP BARAT', 'JALAN RAJA ALI HAJI SINGKEP BARAT, KABUPATEN LINGGA', ''),
(59, 'PT PLN (PERSERO) WILAYAH RIAU DAN KEPRI AREA TANJUNGPINANG', 'JALAN BAKAR BATU NO. 55', '0771 23755'),
(60, 'PT HONDA BINTAN PRATAMA', 'JALAN GATOT SUBROTO NO. 81-82 KM. 5 BAWAH TANJUNGPINANG', '0771 318227'),
(61, 'PT BANK NEGARA INDONESIA (PERSERO) TBK', 'JALAN TEUKU UMAR', '0771 21432'),
(62, 'RSUD PROVINSI KEPULAUAN RIAU AHMAD THABIB', 'JALAN WR. SUPRATMAN KM. 8 NO. 100', '0811779625'),
(63, 'PT BANK BUKOPIN, TBK CABANG TANJUNGPINANG', 'JALAN KETAPANG NO. 609 I,J,K', '0771 27700'),
(64, 'TK ISLAM RA ANANDA', 'JALAN SULAIMAN ABDULLAH GANG SKIP II NO. 6 TANJUNGPINANG', '081270144987'),
(65, 'Nirwana Garden Resort', 'Jalan Panglima Pantar, Sebong Lagoi, Teluk Sebong, Kab.Bintan', ''),
(66, 'Bank BRI KCP Tanjunguban', '', ''),
(67, 'PT SANDEN ELECTRONICS INDONESIA', '', ''),
(68, 'SMKN 1 BINTAN', '', ''),
(69, 'TK ISLAM RA ANANDA', 'Jalan Sulaiman Abdullah Gang Skip III No. 6 Tanjungpinang', '081270144987'),
(70, 'SINAR BAHAGIA GROUP', 'Jl.DI Panjaitan KM.9 No.23 \nTanjungpinang', ''),
(71, 'Satpol PP Kota Tanjungpinang', 'JL. Haji Agus Salim No.1', ''),
(72, 'DPRD Provinsi Kepulauan Riau', 'Dompak', ''),
(73, 'SMK Muhammadiyah', 'Jl. Mekar sari No. 03, Tanjung Uban, Bintan Utara', ''),
(74, 'PT BATAM BINTAN TELEKOMUNIKASI', 'Jalan batin Kopak, Kawasan Wisata Lagoi, Samping Office BRC Finance', '0853-6300-8663'),
(75, 'Omega Service', 'Ruko Perum Lobam Mas Asri blok No. 1 Teluk Sasah, Seri Kuala Lobam, Bintan Kepri', '0821-7330-2007'),
(76, 'SD CALISA', 'Jalan Bakti Praja, Pasar baru Tanjung Uban', '0813-6402-6059'),
(77, 'OPTIK OVA', 'Jalan Permaisuri No. 7 Tanjung Uban', '0822-8530-4300'),
(78, 'SMPN 16 BINTAN', 'Jalan Pendidikan Kel. Teluk Lobam, Kec. Seri Kuala lobam, Kab. Bintan', ''),
(79, 'DISDUKCAPIL KOTA TANJUNGPINANG', 'JALAN KIJANG LAMA', '0822-8558-0286'),
(80, 'MA MADANI ', 'JALAN TATA BUMI CERUK IJUK TOAPAYA BINTAN', '0853-5598-7362'),
(81, 'MA MADANI ', 'JALAN TATA BUMI CERUK IJUK TOAPAYA BINTAN', '0853-5598-7362'),
(82, 'SDN 014 BINAAN BUKIT BESTARI TANJUNGPINANG', 'JL. SENAYANG PERUMNAS SEIJANG TANJUNGPINANG', '813-7287-4621'),
(83, 'KESBANGPOLINMAS', 'Jalan Raja Ali Haji Fisabilillah', '0822-8558-0286'),
(84, 'PT ALDORA SUKSES PERKASA', 'JALAN MARTADINATA', '0812-7577-1204'),
(85, 'TOKO AGUNG SEKEN', 'JALAN BAKAR BATU', '0815-3478-2013'),
(86, 'DINAS PARIWISATA KABUPATEN BINTAN', 'TELUK BAKAU JALAN PANTAI TRIKORA KM 36', ''),
(87, 'PASAR RAYA BINTAN DUA SATU', 'JALAN IR. SUTAMI NO. 25 TANJUNGPINANG', ''),
(88, 'PT BATAM INTERMEDIA PERS (HARIAN TANJUNGPINANG POS)', 'JALAN DI. PANJAITAN KM. 9 KOMPLEKS PINANG MAS', '0823-9105-1810'),
(89, 'KESBANGPOL PROV. KEPULAUAN RIAU', 'DOMPAK - TANJUNGPINANG', '0813-6407-6128'),
(90, 'PEGADAIAN', 'JALAN PASAR BERDIKARI', '0811-7097-748'),
(91, 'BP3KB', 'JALAN TATA BUMI KM.20 CURUK IJUK KECAMATAN TOAPAYA', '0852-6465-8166'),
(92, 'ASIANG SEKEN', 'JALAN POTONG LEMBU', '0815-3478-2013'),
(93, 'PT ALDORA SUKSES PERKASA', 'JALAN MARTADINATA', '0812-7779-1571'),
(94, 'Distrik Navigasi Tanjungpinang', 'Kijang ', '0822-8706-9844'),
(95, 'KOREM 033 / Wira Pratama', 'Jl.Timun Kalidomi , Air Raja Tanjungpinang Timur ', ''),
(96, 'Distrik Navigasi Tanjungpinang', '', ''),
(97, 'KOREM 033 / WIRA PRATAMA ', 'Jalan Timun, Kalidomo, Air Raja, Tanjungpinang Timur ', '0813-6390-0264'),
(98, 'PT ESCO BINTAN INDONESIA', '', '0812-7580-7694'),
(99, 'PT. Esco Bintan Indonesia', 'Bintan', ''),
(100, 'SMPN 1 BINTAN', 'Jalan Kampung Jawa', ''),
(101, 'SMPN 1 BINTAN TIMUR', 'Jalan Korindo No 21 Kijang Kota', ''),
(102, 'DPRKP TANJUNGPINANG', 'Jalan Peralatan KM 7', ''),
(103, 'Badan KPPD Kabupaten Bintan', 'Kabupaten Bintan', '08228550286'),
(104, 'Badan Kepegawaian, Pendidikan dan Pelatihan Daerah Kabupaten Bintan', 'Kabupaten Bintan', '082285580286'),
(105, 'Dinas Komunikasi Dan Informasi Kabupaten Bintan', 'Kabupaten Bintan', '08228558086'),
(107, 'DKUPP BINTAN', 'Jalan M.T Haryono KM 3,5 No. 46 Tanjungpinang', ''),
(108, 'Kejaksaan Tinggi Kepulauan Riau', 'Jalan Sei. Timun No. 1 Senggarang ', '0853-6523-8339'),
(109, 'SMA MUHAMMADIYAH TANJUNGPINANG', 'Jalan RH. Fisabilillah No, 70 KM. 8', '0823-8263-6450'),
(110, 'KANTOR CAMAT SERASAN', 'SERASAN', '0896-9648-8952'),
(111, 'SMA N 3 TANJUNGPINANG', 'Jalan Tugu Pahlawan', ''),
(112, 'APOTEK MUARA', 'Jalan Dr. Sutomo No. 15 ', '898-5320-037'),
(113, 'AMAN BERKAT MOTOR', 'Jalan Gatot Subroto No. 13 Batu 5 ', '0812-6673-1684'),
(114, 'DINAS KOMUNIKASI DAN INFORMATIKA KOTA TANJUNGPINANG', 'Jl. Gatot Subroto Km.5 Bawah ', ''),
(115, 'PT. VISION CEMERLANG', 'Jalan Sultan Sulaiman No. 01', '0857-6653-8297'),
(116, 'PT SINARMAS MULTIFINANCE', 'Jalan Engku Putri Tanjungpinang', '0812-7055-647'),
(117, 'SMPN 5 TANJUNGPINANG', 'Jalan H. Juanda No. 3', '0813-9787-3454'),
(118, 'DPD REI KEPRI', 'Plaza Bintan Center Jalan D.I panjaitan KM. 9 Lt. II', '0771-41108'),
(119, 'DPD REI KEPRI', 'Plaza Bintan Center Jalan D.I panjaitan KM. 9 Lt. II Tanjungpinang ', '0771-41108'),
(120, 'Badan Pusat Statistik Tanjungpinang', 'Jalan W.R Supratman No. 1', '0821-7026-5814'),
(121, 'Dinas Pariwisata dan kebudayaan Tanjungpinang', 'Jalan Merdeka No. 5 Tanjungpinang', '0821-7026-5814'),
(122, 'Dinas Kependudukan dan Pencatatan Sipil Kabupaten Bintan', 'Tempat', ''),
(123, 'PT TASPEN (PERSERO) CAB. TANJUNGPINANG', 'Jalan Daeng Celak KM 8 Tanjungpinang Timur', '0812-6633-3979'),
(124, 'SMKN 3 TANJUNGPINANG', 'Jalan Sultan Sulaiman Kampung Bulang Tanjungpinang', ''),
(125, 'SMPN 2 TANJUNGPINANG', 'Jl. Kuantan No. 9 Melayu Kota piring', '0822-8558-2365'),
(126, 'STT Indonesia Tanjungpinang', 'Jl.Pompa Air No.28', '08117002638'),
(127, 'Taman Kota Seri Kuala Lobam', 'Jl.Industri Seri Kuala Lobam Bintan', '085363161660'),
(128, 'PT.Pelni Cabang Tanjungpinang', 'Jl.A.Yani KM.5 Atas', '085375992423'),
(129, 'Toko Dual Comm Tanjungpinang', 'Jl.Ketapang No.3', ''),
(130, 'Legacies', 'Jl.Gudang Minyak No.4 Tanjungpinang', ''),
(131, 'SMA NEGERI 4 BINTAN', 'Jl.Tg. Uban - Tg.Pinang KM.54 Sri Bintan', ''),
(132, 'PT. Baruna Jaya', 'Jl.POS No.16 Tanjungpinang', ''),
(133, 'Aisy Laundry', 'Jl.Ganet No.8', ''),
(134, 'PT SINAR BAHAGIA', 'Jl. DI. Panjaitan Air Raj No. 23 KM 9 Tanjungpinang Kepri ', '0812-7564-2042'),
(135, 'PT SINAR BAHAGIA', 'Jl. DI. Panjaitan Air Raja No. 23 KM 9 Tanjungpinang Kepri ', '0812-7564-2042'),
(136, 'APOTEK MUARA', 'Jl. Dr. Sutomo No. 5', '0771-317127'),
(137, 'TOKO UTAMA BAN', 'Jl RH fisabilillah Ruko Metro Garden No 8 Tanjungpinang', '0812-7602-6951'),
(138, 'KLINIK BERSALIN PAMEDAN', 'Jl. Raja Ali Haji No 20 D', '0771-312698'),
(139, 'Masjid Raya Nur Ilahi Provinsi KEPRI', 'Jl Dompak ', '0811-7707-57'),
(140, 'BPBD PROVINSI KEPRI', 'Jl. Tugu Pahlawan No 18 Tanjungpinang', '0822-8881-1902'),
(141, 'BMKG TANJUNGPINANG', 'Jl. Adi Sucipto KM 12.5 Bandara Kijang', '0822-8881-9022'),
(142, 'CV NURABADI SERVICE', 'Jl Ir. Sutami No 54 A', '0813-7232-5448'),
(143, 'BIMBEL SAHABAT PELAJAR', 'Jl. Raya Tanjung Uban KM 14 Kel. Pinang Kencana, Kec. Tanjungpinang Timur', ''),
(144, 'BKD Provinsi Kepulauan Riau', '', ''),
(145, 'DPRD Kota Tanjungpinang', '', ''),
(146, 'Puskesmas Tanjung Unggat', '', ''),
(147, 'Kantor Skuadron 400', '', ''),
(148, 'PT.Bintan Columbia', '', ''),
(149, 'PT SUKSES BINTAN PERMATA', 'Jalan Kijang Lama', '0852-7203-7678'),
(150, 'PT.Tirta Utama Riani Indah', '', ''),
(151, 'SMA N 6 TANJUNGPINANG', 'SENGGARANG', '822-8815-1507'),
(152, 'CV. Mega Mulia Tanjungpinang', '', ''),
(153, 'Balai KIPM Tanjungpinang', '', ''),
(154, 'PT. Panca Rasa Pratama Tanjungpinang', '', ''),
(155, 'Badan Pengelola Keuangan dan Aset Daerah', '', ''),
(156, 'PT KARYA HARAPAN MUDA', 'Jl. Lintas Barat KM 16', ''),
(157, 'PUSKESMAS SRI BINTAN', 'Jl. Tanjung Uban KM 52 Sri Bintan', '0812-7646-4090'),
(158, 'PT CITRA SERAYA', 'Jl. Gatot Subroto No 98 A', ''),
(159, 'Dinas PU dan Tata Kota Tanjungpinang', '', ''),
(160, 'Dinas Kebersihan Pertamanan dan Pemakaman Bintan', '', ''),
(162, 'RSUD KOTA TANJUNGPINANG ', '', '0812-7646-4090'),
(163, 'RUMKITAL Dr. MIDIYATO SURATANI', 'Jl. Ciptadi Np. 1', '0771-21428'),
(164, 'Lapangan Futsal Tri Mazmur', 'Jl. Basuki Rahmat Samping Kantor Kejaksaan ', '0822-8517-2365'),
(165, 'Mayor (K) dr. Anggiat Purba, Sp.S', '', ''),
(166, 'PT TRISINDO', 'Jl. Pasar Baru, Uban', '0821-7046-5392'),
(167, 'PT Bintan Inti Industrial Estate', 'Lobam', '0822-8352-5967'),
(168, 'Museum Bahari Kabupaten Bintan', 'Jl. Trikora Km 36 Desa Teluk Bakau, Kec. Gunung Kijang, Kab. Bintan', '0822-8441-8438'),
(169, 'SMP N 17 Kab. Bintan', 'Jl. Tanjung Uban KM 22 Gesek Toapaya Bintan', '08199153-8397'),
(170, 'STT Indonesia Tanjungpinang', 'Jl Pompa Air No 28', '0811-7002-638'),
(171, 'Restoran Panjang', 'Jl. Engku Putri', '0812-7072-1232'),
(172, 'KEJAKSAAN NEGERI TANJUNGPINANG', 'Jalan Basuki Rahmat', '0813-7459-5886'),
(173, 'Dinas Pariwisata Kab. Bintan', 'Jl. Trikora KM 36, Teluk Bakau, Kabupaten Bintan', '0852-6409-8756'),
(174, 'Dinas Penanaman Modal dan PTSP Kab. Bintan', '', ''),
(175, 'Rudimin Pusat Tanjungpinang', 'Jalan Ahmad Yani No 13', '0853-7683-3300'),
(176, 'SDN 010 Kec. Tanjungpinang Timur', 'Lembah Merpati Km 13 Tanjungpinang Timur', ''),
(177, 'PAUD Kasih Bunda', '', ''),
(178, 'Toko Jahit Dua', 'Jalan Asoka Dalam No. 8 Batu 10', '0812-7412-8910'),
(179, 'TK Negeri Pembina', '', ''),
(180, 'SDN 006 Timur Tanjungpinang', 'Jalan Hang Lekir KM 10 Tanjungpinang', '0822-8558-2365'),
(181, 'SERVICE POINT TANJUNGPINANG', 'Jl. Engku Putri, Tj. Ayun Sakti, Bukit Bestari', '0856-6837-7172'),
(182, 'SMAN 2 TANJUNGPINANG', 'Jalan Basuki Rahmat', '0822-8504-5935'),
(183, 'SMAN 2 TANJUNGPINANG', 'Jalan Basuki Rahmat', '0822-8504-5935'),
(184, 'Rental Mobil Arijaya', 'Jl Raya Tj Uban KM.16 Tanjungpinang', '081270375442'),
(185, 'Berkah Laundry', 'Jl. Seijang Gang Irian I No. 2', '0831-6533-3393'),
(186, 'AIRNUR', 'Jalan Arief Rahman Hakim', '0771-279000'),
(187, 'The BigBoss Laundry', 'Jl Brigjen Katamso', '3216010'),
(188, 'BPKAD Provinsi Kepulauan Riau', '', ''),
(189, 'BP Kawasan Tanjungpinang', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idProdi` int(11) NOT NULL,
  `kodeProdi` varchar(5) NOT NULL,
  `namaProdi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`idProdi`, `kodeProdi`, `namaProdi`) VALUES
(1, 'SI', 'Sistem Informasi'),
(2, 'KA', 'Komputer Akuntansi'),
(3, 'TI', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `idSurat` int(11) NOT NULL,
  `idJenis` int(11) NOT NULL,
  `tanggalSurat` date NOT NULL,
  `idMahasiswa` int(11) NOT NULL,
  `idKeperluan` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `tanggalBuat` date NOT NULL,
  `noSurat` varchar(200) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `idThajaran` int(11) NOT NULL,
  `judul` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`idSurat`, `idJenis`, `tanggalSurat`, `idMahasiswa`, `idKeperluan`, `idKategori`, `tanggalBuat`, `noSurat`, `tujuan`, `idThajaran`, `judul`) VALUES
(66, 2, '2017-04-26', 16, 1, 2, '2017-04-26', '126/Sket/Puket-I/IV/2017', 8, 3, 'sistem informasi penerimaan siswa baru smkn 4 tanjungpinang'),
(67, 2, '2017-04-26', 17, 1, 2, '2017-04-26', '127/Sket/Puket-I/IV/2017', 9, 3, 'aplikasi sistem penjualan pulsa elektrik pada novi cell tour & travel di tanjungpinang'),
(68, 1, '2017-04-29', 13, 3, 2, '2017-04-29', '128/Sket/Puket-I/IV/2017', 1, 3, ''),
(69, 3, '2017-04-29', 18, 1, 2, '2017-04-29', '129/Sket/Puket-I/IV/2017', 10, 3, 'sistem informasi pengelolaan distribusi surat berharga berbasis website pada pt.bank negara indonesia (persero) '),
(70, 3, '2017-05-03', 19, 1, 2, '2017-05-03', '130/Sket/Puket-I/V/2017', 11, 3, 'aplikasi e-learning berbasis web pada smk negeri kundur'),
(71, 1, '2017-05-03', 20, 4, 2, '2017-05-03', '131/Sket/Puket-I/V/2017', 1, 3, ''),
(72, 3, '2017-05-08', 21, 1, 2, '2017-05-08', '132/Sket/Puket-I/V/2017', 13, 3, 'sistem informasi pendaftaran murid baru dan keuangan berbasis website pada salman bandung kota tanjungpinang'),
(73, 3, '2017-05-08', 22, 1, 2, '2017-05-08', '133/Sket/Puket-I/V/2017', 14, 3, 'Perancangan sistem pakar mendiagnosa penyakit gigi dan mulut menggunan bayes'),
(74, 1, '2017-05-10', 23, 1, 2, '2017-05-10', '134/Sket/Puket-I/V/2017', 1, 3, ''),
(75, 1, '2017-05-10', 24, 1, 2, '2017-05-10', '135/Sket/Puket-I/V/2017', 1, 3, ''),
(76, 1, '2017-05-10', 25, 1, 2, '2017-05-10', '136/Sket/Puket-I/V/2017', 1, 3, ''),
(77, 1, '2017-05-10', 26, 1, 2, '2017-05-10', '137/Sket/Puket-I/V/2017', 1, 3, ''),
(78, 2, '2017-05-10', 32, 1, 2, '2017-05-10', '138/Sket/Puket-I/V/2017', 19, 3, 'Aplikasi pengolahan data nilai siswa sd calisa pasar baru'),
(79, 2, '2017-05-10', 30, 1, 2, '2017-05-10', '139/Sket/Puket-I/V/2017', 17, 3, 'Sistem informasi rental mobil cv.putra lagoi berbasis web '),
(82, 2, '2017-05-10', 27, 1, 2, '2017-05-10', '140/Sket/Puket-I/V/2017', 15, 3, 'Sistem Informasi Persediaan Barang Mini Store PT.Honeywell Indonesia'),
(83, 2, '2017-05-10', 31, 1, 2, '2017-05-10', '141/Sket/Puket-I/V/2017', 18, 3, 'SISTEM INFORMASI DOCUMENT REPORT BERBASIS WEB PADA PT.YOSHIKAWA ELECTRONICS BINTAN'),
(84, 2, '2017-05-10', 33, 1, 2, '2017-05-10', '142/Sket/Puket-I/V/2017', 20, 3, 'Aplikasi penyewaan alat berat pada pt.bintanindo sukses perkasa kabupaten bintan'),
(85, 1, '2017-05-12', 34, 1, 2, '2017-05-12', '143/Sket/Puket-I/V/2017', 1, 3, ''),
(86, 1, '2017-05-12', 35, 1, 2, '2017-05-12', '144/Sket/Puket-I/V/2017', 1, 3, ''),
(88, 1, '2017-05-12', 37, 1, 2, '2017-05-12', '145/Sket/Puket-I/V/2017', 1, 3, ''),
(89, 1, '2017-05-12', 36, 1, 2, '2017-05-12', '146/Sket/Puket-I/V/2017', 1, 3, ''),
(90, 1, '2017-05-12', 38, 1, 2, '2017-05-12', '147/Sket/Puket-I/V/2017', 1, 3, ''),
(95, 2, '2017-05-16', 40, 1, 2, '2017-05-16', '150/Sket/Puket-I/V/2017', 21, 3, 'SISTEM PENGOLAHAN DATA PENJUALAN DAN PEMBELIAN BARANG YAMAHA ASLI MOTOR VIII TANJUNGPINANG'),
(96, 2, '2017-05-16', 39, 1, 2, '2017-05-16', '151/Sket/Puket-I/V/2017', 22, 3, 'APLIKASI PENGGAJIAN KARYAWAN PADA PT.PINANG LESTARI KOTA TANJUNGPINANG'),
(97, 1, '2017-05-19', 41, 1, 2, '2017-05-19', '152/Sket/Puket-I/V/2017', 1, 3, ''),
(98, 2, '2017-05-19', 43, 1, 2, '2017-05-19', '153/Sket/Puket-I/V/2017', 26, 3, 'aplikasi pengolahan data pegawai pada dinas perhubungan kabupaten bintan'),
(99, 2, '2017-05-19', 44, 1, 2, '2017-05-19', '154/Sket/Puket-I/V/2017', 25, 3, 'sistem informasi reservasi meja pada cafe loco est-2016'),
(100, 2, '2017-05-19', 45, 1, 2, '2017-05-19', '155/Sket/Puket-I/V/2017', 23, 3, 'sistem informasi pengolahan data penyewaan mobil di cv.sumber rental tanjungunggat'),
(101, 2, '2017-05-19', 46, 1, 2, '2017-05-19', '156/Sket/Puket-I/V/2017', 24, 3, 'penerapan sistem informasi akuntansi penggajian pada kantor satuan polisi pamongpraja dan pemadam kebakaran'),
(103, 1, '2017-05-22', 47, 4, 2, '2017-05-22', '157/Sket/Puket-I/V/2017', 1, 3, ''),
(104, 1, '2017-05-22', 48, 4, 2, '2017-05-22', '158/Sket/Puket-I/V/2017', 1, 3, ''),
(106, 1, '2017-05-24', 49, 5, 2, '2017-05-24', '159/Sket/Puket-I/V/2017', 1, 3, ''),
(109, 4, '2017-05-24', 47, 1, 2, '2017-05-24', '160/Sket/Puket-I/V/2017', 27, 3, 'SIM'),
(110, 4, '2017-05-24', 48, 1, 2, '2017-05-24', '161/Sket/Puket-I/V/2017', 27, 3, 'SIM'),
(111, 1, '2017-05-30', 50, 6, 2, '2017-05-30', '162/Sket/Puket-I/V/2017', 1, 3, ''),
(112, 1, '2017-06-06', 51, 1, 2, '2017-06-06', '163/Sket/Puket-I/VI/2017', 1, 3, ''),
(113, 1, '2017-06-14', 54, 6, 2, '2017-06-14', '164/Sket/Puket-I/VI/2017', 1, 3, ''),
(114, 1, '2017-06-14', 53, 1, 2, '2017-06-14', '165/Sket/Puket-I/VI/2017', 1, 3, ''),
(115, 1, '2017-06-14', 52, 6, 2, '2017-06-14', '166/Sket/Puket-I/VI/2017', 1, 3, ''),
(116, 1, '2017-07-06', 55, 1, 2, '2017-07-06', '167/Sket/Puket-I/VII/2017', 1, 3, ''),
(117, 1, '2017-07-16', 56, 1, 2, '2017-07-16', '168/Sket/Puket-I/VII/2017', 1, 4, ''),
(118, 1, '2017-07-21', 57, 2, 2, '2017-07-21', '169/Sket/Puket-I/VII/2017', 1, 4, ''),
(119, 3, '2017-07-24', 58, 1, 2, '2017-07-24', '170/Sket/Puket-I/VII/2017', 28, 4, 'Perancangan dan Implementasi administrasi sistem informasi sekolah smk widya tanjungpinang dengan aplikasi java desktop '),
(120, 1, '2017-07-31', 59, 1, 2, '2017-07-31', '171/Sket/Puket-I/VII/2017', 1, 4, ''),
(121, 3, '2017-08-12', 60, 1, 2, '2017-08-12', '172/Sket/Puket-I/VIII/2017', 29, 4, 'aplikasi pembelajaran interaktif bahasa jepang berbasis multimedia di lkp nayaka japan'),
(122, 1, '2017-08-14', 61, 2, 2, '2017-08-14', '173/Sket/Puket-I/VIII/2017', 1, 4, ''),
(123, 1, '2017-08-14', 62, 2, 2, '2017-08-14', '174/Sket/Puket-I/VIII/2017', 1, 4, ''),
(124, 2, '2017-08-16', 63, 1, 2, '2017-08-16', '175/Sket/Puket-I/VIII/2017', 30, 4, 'Aplikasi pengolahan data stok obat di puskesmas seijang tanjungpinang'),
(125, 1, '2017-08-18', 64, 1, 2, '2017-08-18', '176/Sket/Puket-I/VIII/2017', 1, 4, ''),
(126, 1, '2017-08-18', 65, 2, 2, '2017-08-18', '177/Sket/Puket-I/VIII/2017', 1, 4, ''),
(127, 1, '2017-08-19', 66, 2, 2, '2017-08-19', '178/Sket/Puket-I/VIII/2017', 1, 4, ''),
(128, 2, '2017-08-19', 67, 1, 2, '2017-08-19', '179/Sket/Puket-I/VIII/2017', 31, 4, 'sistem pengolahan data surat masuk dan surat keluar polres tanjungpianang'),
(129, 1, '2017-08-19', 68, 6, 2, '2017-08-19', '180/Sket/Puket-I/VIII/2017', 1, 4, ''),
(130, 1, '2017-08-22', 69, 2, 2, '2017-08-22', '181/Sket/Puket-I/VIII/2017', 1, 4, ''),
(131, 1, '2017-08-22', 70, 2, 2, '2017-08-22', '182/Sket/Puket-I/VIII/2017', 1, 4, ''),
(132, 1, '2017-08-23', 71, 1, 2, '2017-08-23', '183/Sket/Puket-I/VIII/2017', 1, 4, ''),
(133, 2, '2017-08-23', 72, 1, 2, '2017-08-23', '184/Sket/Puket-I/VIII/2017', 15, 4, 'aplikasi incoming material inpection data record pt.honeywell indonesia'),
(134, 3, '2017-08-24', 73, 1, 2, '2017-08-24', '185/Sket/Puket-I/VIII/2017', 33, 4, 'aplikasi pengenalan pembelajaran dasar bahasa arab melayu menggunakan adobe flash professional cs6'),
(135, 2, '2017-08-30', 78, 1, 2, '2017-08-30', '186/Sket/Puket-I/VIII/2017', 34, 4, 'perancangan sistem informasi pembelian dan penjualan handphone pada toko media cell'),
(136, 2, '2017-08-30', 77, 1, 2, '2017-08-30', '187/Sket/Puket-I/VIII/2017', 35, 4, 'aplikasi penggajian pada pt.kasri jaya'),
(137, 2, '2017-08-30', 76, 1, 2, '2017-08-30', '188/Sket/Puket-I/VIII/2017', 36, 4, 'sistem aplikasi pembelian dan penjualan pada show room mobil cv.suria bintan perkasa kota tanjungpinang'),
(138, 1, '2017-08-30', 75, 1, 2, '2017-08-30', '189/Sket/Puket-I/VIII/2017', 1, 4, ''),
(140, 2, '2017-08-30', 74, 1, 2, '2017-08-30', '191/Sket/Puket-I/VIII/2017', 37, 4, 'sistem informasi pembayaran uang sekolah pada smk maitreya wira tanjungpinang'),
(142, 1, '2017-08-30', 80, 1, 2, '2017-08-30', '192/Sket/Puket-I/VIII/2017', 1, 4, ''),
(143, 3, '2017-09-02', 81, 1, 2, '2017-09-02', '193/Sket/Puket-I/IX/2017', 38, 4, 'sistem informasi pembayaran zakat baznas tanjungpinang'),
(144, 3, '2017-09-02', 81, 1, 2, '2017-09-02', '193/Sket/Puket-I/IX/2017', 38, 4, 'sistem informasi pembayaran zakat pada baznas tanjungpinang'),
(145, 3, '2017-09-02', 67, 1, 2, '2017-09-02', '194/Sket/Puket-I/IX/2017', 31, 4, 'kuisioner kepuasan masyarakat terhadap pelayanan pembuatan surat izin mengemudi (sim) berbasis web pada polres tanjungpinang'),
(146, 3, '2017-09-05', 81, 1, 2, '2017-09-05', '195/Sket/Puket-I/IX/2017', 39, 4, 'sistem informasi pembayaran zakat pada baznas provinsi kepulauan riau'),
(147, 3, '2017-09-05', 82, 1, 2, '2017-09-05', '196/Sket/Puket-I/IX/2017', 1, 4, ''),
(148, 3, '2017-09-05', 82, 1, 2, '2017-09-05', '196/Sket/Puket-I/IX/2017', 1, 4, ''),
(149, 3, '2017-09-05', 82, 1, 2, '2017-09-05', '196/Sket/Puket-I/IX/2017', 1, 4, ''),
(150, 3, '2017-09-05', 82, 1, 2, '2017-09-05', '196/Sket/Puket-I/IX/2017', 1, 4, ''),
(151, 1, '2017-09-05', 82, 1, 2, '2017-09-05', '197/Sket/Puket-I/IX/2017', 1, 4, ''),
(152, 2, '2017-09-11', 83, 1, 2, '2017-09-11', '198/Sket/Puket-I/IX/2017', 40, 4, 'aplikasi absensi siswa berbasis barcode di madrasah aliyah negeri tanjungpinang'),
(153, 1, '2017-09-11', 84, 1, 2, '2017-09-11', '199/Sket/Puket-I/IX/2017', 1, 4, ''),
(154, 1, '2017-09-12', 85, 1, 2, '2017-09-12', '200/Sket/Puket-I/IX/2017', 1, 4, ''),
(155, 3, '2017-09-12', 86, 1, 2, '2017-09-12', '201/Sket/Puket-I/IX/2017', 41, 4, 'sistem informasi manajemen data penjualan dan pembelian obat apotik mitra husada tanjunguban berbasis web '),
(156, 1, '2017-09-15', 87, 2, 2, '2017-09-15', '202/Sket/Puket-I/IX/2017', 1, 4, ''),
(157, 1, '2017-09-15', 88, 2, 2, '2017-09-15', '203/Sket/Puket-I/IX/2017', 1, 4, ''),
(158, 1, '2017-09-15', 89, 2, 2, '2017-09-15', '204/Sket/Puket-I/IX/2017', 1, 4, ''),
(159, 3, '2017-09-16', 90, 1, 2, '2017-09-16', '205/Sket/Puket-I/IX/2017', 10, 4, 'sistem informasi pengelolaan database kredit konsumer pt. Bank negara indonesia (persero).tbk cabang tanjungpinang'),
(161, 3, '2017-09-16', 91, 1, 2, '2017-09-16', '206/Sket/Puket-I/IX/2017', 10, 4, 'sistem informasi manajemen pengajuan cuti berbasis website dan penerapan sms gateway notification pada pt.Bni kcu tanjungpinang'),
(162, 3, '2017-09-18', 92, 1, 2, '2017-09-18', '207/Sket/Puket-I/IX/2017', 42, 4, 'sistem informasi perpustakaan pada smpn 28 bintan berbasis web'),
(163, 3, '2017-09-28', 94, 1, 2, '2017-09-28', '208/Sket/Puket-I/IX/2017', 43, 4, 'Jl. Kampung Jawa Kel. Sungai Lekop'),
(164, 2, '2017-09-28', 93, 1, 2, '2017-09-28', '209/Sket/Puket-I/IX/2017', 44, 4, 'Aplikasi Praktek Dokter'),
(165, 4, '2017-10-04', 96, 1, 2, '2017-10-04', '210/Sket/Puket-I/X/2017', 45, 4, 'Sistem Informasi Perekrutan Tenaga Kerja Pada Dinas Pendidikan Kota Tanjungpinang '),
(166, 1, '2017-10-05', 97, 1, 2, '2017-10-05', '211/Sket/Puket-I/X/2017', 1, 4, ''),
(167, 3, '2017-10-05', 96, 1, 2, '2017-10-05', '212/Sket/Puket-I/X/2017', 46, 4, 'sistem informasi perekrutan tenaga kerja pada dinas pendidikan kota tanjungpinang'),
(168, 3, '2017-10-09', 94, 1, 2, '2017-10-09', '213/Sket/Puket-I/X/2017', 43, 4, 'sistem informasi penilaian kinerja guru pada smp negeri 04 bintan berbasis web'),
(169, 1, '2017-10-09', 98, 1, 2, '2017-10-09', '214/Sket/Puket-I/X/2017', 1, 4, ''),
(170, 2, '2017-10-09', 99, 1, 2, '2017-10-09', '215/Sket/Puket-I/X/2017', 47, 4, 'aplikasi penggajian pegawai honorer biro kesra kantor gubernur kepulauan riau'),
(171, 1, '2017-10-10', 101, 1, 2, '2017-10-10', '216/Sket/Puket-I/X/2017', 1, 4, ''),
(172, 1, '2017-10-10', 100, 1, 2, '2017-10-10', '217/Sket/Puket-I/X/2017', 1, 4, ''),
(173, 3, '2017-10-10', 102, 1, 2, '2017-10-10', '218/Sket/Puket-I/X/2017', 48, 4, 'sistem informasi akademik berbasis mobile pada smpn 12 bintan'),
(174, 1, '2017-10-11', 103, 1, 2, '2017-10-11', '219/Sket/Puket-I/X/2017', 1, 4, ''),
(175, 1, '2017-10-11', 104, 1, 2, '2017-10-11', '220/Sket/Puket-I/X/2017', 1, 4, ''),
(176, 1, '2017-10-11', 105, 1, 2, '2017-10-11', '221/Sket/Puket-I/X/2017', 1, 4, ''),
(177, 1, '2017-10-11', 107, 1, 2, '2017-10-11', '222/Sket/Puket-I/X/2017', 1, 4, ''),
(178, 1, '2017-10-11', 106, 1, 2, '2017-10-11', '223/Sket/Puket-I/X/2017', 1, 4, ''),
(179, 1, '2017-10-11', 108, 1, 2, '2017-10-11', '224/Sket/Puket-I/X/2017', 1, 4, ''),
(180, 1, '2017-10-11', 109, 1, 2, '2017-10-11', '225/Sket/Puket-I/X/2017', 1, 4, ''),
(181, 1, '2017-10-11', 110, 1, 2, '2017-10-11', '226/Sket/Puket-I/X/2017', 1, 4, ''),
(182, 1, '2017-10-11', 111, 1, 2, '2017-10-11', '227/Sket/Puket-I/X/2017', 1, 4, ''),
(183, 1, '2017-10-12', 112, 1, 2, '2017-10-12', '228/Sket/Puket-I/X/2017', 1, 4, ''),
(184, 1, '2017-10-12', 113, 1, 2, '2017-10-12', '229/Sket/Puket-I/X/2017', 1, 4, ''),
(185, 1, '2017-10-12', 114, 1, 2, '2017-10-12', '230/Sket/Puket-I/X/2017', 1, 4, ''),
(186, 1, '2017-10-12', 115, 1, 2, '2017-10-12', '231/Sket/Puket-I/X/2017', 1, 4, ''),
(187, 1, '2017-10-12', 116, 1, 2, '2017-10-12', '232/Sket/Puket-I/X/2017', 1, 4, ''),
(188, 1, '2017-10-13', 117, 1, 2, '2017-10-13', '233/Sket/Puket-I/X/2017', 1, 4, ''),
(189, 1, '2017-10-13', 118, 1, 2, '2017-10-13', '234/Sket/Puket-I/X/2017', 1, 4, ''),
(190, 1, '2017-10-13', 119, 1, 2, '2017-10-13', '235/Sket/Puket-I/X/2017', 1, 4, ''),
(191, 1, '2017-10-13', 120, 1, 2, '2017-10-13', '236/Sket/Puket-I/X/2017', 1, 4, ''),
(192, 1, '2017-10-13', 121, 1, 2, '2017-10-13', '237/Sket/Puket-I/X/2017', 1, 4, ''),
(193, 1, '2017-10-13', 122, 1, 2, '2017-10-13', '238/Sket/Puket-I/X/2017', 1, 4, ''),
(194, 1, '2017-10-13', 123, 1, 2, '2017-10-13', '239/Sket/Puket-I/X/2017', 1, 4, ''),
(195, 1, '2017-10-13', 124, 1, 2, '2017-10-13', '240/Sket/Puket-I/X/2017', 1, 4, ''),
(196, 1, '2017-10-13', 125, 1, 2, '2017-10-13', '241/Sket/Puket-I/X/2017', 1, 4, ''),
(197, 1, '2017-10-16', 126, 1, 2, '2017-10-16', '242/Sket/Puket-I/X/2017', 1, 4, ''),
(198, 1, '2017-10-16', 127, 1, 2, '2017-10-16', '243/Sket/Puket-I/X/2017', 1, 4, ''),
(199, 1, '2017-10-16', 128, 1, 2, '2017-10-16', '244/Sket/Puket-I/X/2017', 1, 4, ''),
(200, 1, '2017-10-16', 129, 1, 2, '2017-10-16', '245/Sket/Puket-I/X/2017', 1, 4, ''),
(201, 1, '2017-10-16', 130, 1, 2, '2017-10-16', '246/Sket/Puket-I/X/2017', 1, 4, ''),
(202, 1, '2017-10-16', 131, 1, 2, '2017-10-16', '247/Sket/Puket-I/X/2017', 1, 4, ''),
(203, 1, '2017-10-16', 132, 1, 2, '2017-10-16', '248/Sket/Puket-I/X/2017', 1, 4, ''),
(204, 1, '2017-10-16', 135, 1, 2, '2017-10-16', '249/Sket/Puket-I/X/2017', 1, 4, ''),
(205, 1, '2017-10-16', 136, 1, 2, '2017-10-16', '250/Sket/Puket-I/X/2017', 1, 4, ''),
(206, 1, '2017-10-16', 133, 1, 2, '2017-10-16', '251/Sket/Puket-I/X/2017', 1, 4, ''),
(207, 1, '2017-10-16', 137, 1, 2, '2017-10-16', '252/Sket/Puket-I/X/2017', 1, 4, ''),
(208, 1, '2017-10-16', 138, 1, 2, '2017-10-16', '253/Sket/Puket-I/X/2017', 1, 4, ''),
(209, 1, '2017-10-17', 139, 1, 2, '2017-10-17', '254/Sket/Puket-I/X/2017', 1, 4, ''),
(210, 1, '2017-10-17', 140, 1, 2, '2017-10-17', '255/Sket/Puket-I/X/2017', 1, 4, ''),
(211, 2, '2017-10-26', 134, 1, 2, '2017-10-26', '256/Sket/Puket-I/X/2017', 49, 4, 'APLIKASI PERPUSTAKAAN DI SMPN 17 BINTAN '),
(212, 3, '2017-10-28', 141, 1, 2, '2017-10-28', '257/Sket/Puket-I/X/2017', 50, 4, 'sistem informasi perhitungan nilai persediaan bahan bangunan dengan metode rata-rata bergerak pada toko bangunan senli tanjungpinang'),
(213, 1, '2017-10-29', 142, 1, 2, '2017-10-29', '258/Sket/Puket-I/X/2017', 1, 4, ''),
(214, 1, '2017-11-07', 143, 1, 2, '2017-11-07', '259/Sket/Puket-I/XI/2017', 1, 4, ''),
(215, 3, '2017-11-24', 144, 1, 2, '2017-11-24', '260/Sket/Puket-I/XI/2017', 51, 4, 'HELPDESK TICKETING SYSTEM BERBASIS WEB PADA PT.WINGS FOOD CABANG BATAM'),
(216, 3, '2017-11-28', 147, 1, 2, '2017-11-28', '261/Sket/Puket-I/XI/2017', 52, 4, 'sistem informasi pemesanan dan pembayaran seragam sds maitreyawira'),
(217, 1, '2017-11-28', 148, 1, 2, '2017-11-28', '262/Sket/Puket-I/XI/2017', 1, 4, ''),
(218, 1, '2017-11-28', 149, 1, 2, '2017-11-28', '263/Sket/Puket-I/XI/2017', 1, 4, ''),
(219, 1, '2017-11-29', 151, 5, 2, '2017-11-29', '264/Sket/Puket-I/XI/2017', 1, 4, ''),
(220, 2, '2017-11-30', 152, 1, 2, '2017-11-30', '265/Sket/Puket-I/XI/2017', 53, 4, 'aplikasi pendaftaran siswa rumah belajar eduhana tanjungpinang'),
(221, 1, '2017-11-30', 153, 1, 2, '2017-11-30', '266/Sket/Puket-I/XI/2017', 1, 4, ''),
(222, 1, '2017-11-30', 154, 1, 2, '2017-11-30', '267/Sket/Puket-I/XI/2017', 1, 4, ''),
(223, 3, '2017-11-30', 154, 1, 2, '2017-11-30', '268/Sket/Puket-I/XI/2017', 54, 4, 'aplikasi data mining menggunakan naive bayes classifier untuk persetujuan kredit pada UD.Sinar Permai Indah '),
(224, 1, '2017-11-30', 155, 1, 2, '2017-11-30', '269/Sket/Puket-I/XI/2017', 1, 4, ''),
(225, 1, '2017-11-30', 156, 5, 2, '2017-11-30', '270/Sket/Puket-I/XI/2017', 1, 4, ''),
(226, 1, '2017-11-30', 157, 1, 2, '2017-11-30', '271/Sket/Puket-I/XI/2017', 1, 6, ''),
(227, 1, '2017-12-02', 158, 5, 2, '2017-12-02', '272/Sket/Puket-I/XII/2017', 1, 6, ''),
(228, 1, '2017-12-02', 159, 5, 2, '2017-12-02', '273/Sket/Puket-I/XII/2017', 1, 6, ''),
(229, 1, '2017-12-02', 160, 5, 2, '2017-12-02', '274/Sket/Puket-I/XII/2017', 1, 6, ''),
(230, 1, '2017-12-04', 161, 5, 2, '2017-12-04', '275/Sket/Puket-I/XII/2017', 1, 6, ''),
(234, 3, '2017-12-05', 162, 1, 2, '2017-12-05', '278/Sket/Puket-I/XII/2017', 55, 6, 'SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN GURU FAVORIT DENGAN METODE ANALYTICAL HIEARCHY PROCESS (AHP) DI SDN 007 BUKIT BESTARI'),
(235, 2, '2017-12-06', 163, 1, 2, '2017-12-06', '279/Sket/Puket-I/XII/2017', 56, 6, 'APLIKASI PENJUALAN SPAREPART MOTOR BERBASIS WEB PADA PT. BINTAN SENTOSA INDAH'),
(236, 3, '2017-12-06', 164, 1, 2, '2017-12-06', '280/Sket/Puket-I/XII/2017', 57, 6, 'SISTEM INFORMASI RESERVASI HOTEL BERBASIS WEB '),
(237, 2, '2017-12-06', 165, 1, 2, '2017-12-06', '281/Sket/Puket-I/XII/2017', 58, 6, 'RANCANG BANGUN APLIKASI PENGOLAHAN DATA NILAI TARGET GURU BERBASIS WEB PADA SMA NEGERI 1 SINGKEP BARAT'),
(238, 3, '2017-12-07', 166, 1, 2, '2017-12-07', '282/Sket/Puket-I/XII/2017', 59, 6, 'ANALISIS PENGOLAHAN DATA PEMBAYARAN PEKERJAAN BERBASIS WEBSITE PADA PT PLN (PERSERO) WILAYAH RIAU DAN KEPRI AREA TANJUNGPINANG'),
(239, 1, '2017-12-07', 167, 1, 2, '2017-12-07', '283/Sket/Puket-I/XII/2017', 60, 6, 'PERANCANGAN DAN PERHITUNGAN POS (POINT OF SALE) INVENTORY SPAREPART PADA PT HONDA BINTAN PRATAMA'),
(240, 3, '2017-12-07', 167, 1, 2, '2017-12-07', '284/Sket/Puket-I/XII/2017', 60, 6, 'PERANCANGAN DAN PERHITUNGAN POS (POINT OF SALE) INVENTORY SPAREPART PADA PT HONDA BINTAN PRATAMA'),
(241, 3, '2017-12-07', 168, 1, 2, '2017-12-07', '285/Sket/Puket-I/XII/2017', 61, 6, 'PENGARUH KUALITAS LAYANAN M BANKING DAN INTERNET BANKING TERHADAP KEPUASAN NASABAH PT BANK NEGARA INDONESIA (PERSERO) TBK CABANG TANJUNGPINANG'),
(244, 1, '2017-12-07', 172, 5, 2, '2017-12-07', '286/Sket/Puket-I/XII/2017', 1, 6, ''),
(245, 1, '2017-12-08', 173, 5, 2, '2017-12-08', '287/Sket/Puket-I/XII/2017', 1, 6, ''),
(246, 1, '2017-12-11', 174, 5, 2, '2017-12-11', '288/Sket/Puket-I/XII/2017', 1, 6, ''),
(247, 1, '2017-12-11', 175, 5, 2, '2017-12-11', '289/Sket/Puket-I/XII/2017', 1, 6, ''),
(248, 1, '2017-12-11', 176, 5, 2, '2017-12-11', '290/Sket/Puket-I/XII/2017', 1, 6, ''),
(249, 1, '2017-12-11', 177, 5, 2, '2017-12-11', '291/Sket/Puket-I/XII/2017', 1, 6, ''),
(250, 1, '2017-12-11', 178, 1, 2, '2017-12-11', '292/Sket/Puket-I/XII/2017', 1, 6, ''),
(251, 3, '2017-12-11', 179, 1, 2, '2017-12-11', '293/Sket/Puket-I/XII/2017', 62, 6, 'SISTEM PAKAR UNTUK MENGETAHUI PENYEBAB PENYAKIT GALAU DENGAN MENGGUNAKAN  METODE BAYES'),
(252, 3, '2017-12-11', 179, 1, 2, '2017-12-11', '294/Sket/Puket-I/XII/2017', 62, 6, 'SISTEM PAKAR UNTUK MENGETAHUI PENYEBAB PENYAKIT GALAU DENGAN MENGGUNAKAN METODE BAYES'),
(253, 3, '2017-12-12', 180, 1, 2, '2017-12-12', '295/Sket/Puket-I/XII/2017', 63, 6, 'PENGARUH PENINGKATAN KINERJA DAN KUALITAS KREDIT RETAIL TERHADAP PENERAPAN APLIKASI SISTEM INFORMASI KREDIT TERPADU (SIKT) PADA PT BANK BUKOPIN TBK CABANG TANJUNGPINANG'),
(256, 1, '2017-12-12', 180, 1, 2, '2017-12-12', '296/Sket/Puket-I/XII/2017', 63, 6, 'PENGARUH PENINGKATAN KINERJA DAN KUALITAS KREDIT RETAIL TERHADAP PENERAPAN APLIKASI SISTEM INFORMASI KREDIT TERPADU (SIKT) PADA PT BANK BUKOPIN TBK CABANG TANJUNGPINANG'),
(257, 3, '2017-12-13', 181, 1, 2, '2017-12-13', '297/Sket/Puket-I/XII/2017', 1, 6, ''),
(258, 3, '2017-12-13', 181, 1, 2, '2017-12-13', '298/Sket/Puket-I/XII/2017', 64, 6, 'APLIKASI PENERIMAAN SISWA BARU TK ISLAM RA ANANDA BERBASIS JAVA DESKTOP'),
(259, 1, '2017-12-27', 182, 1, 2, '2017-12-27', '299/Sket/Puket-I/XII/2017', 1, 6, ''),
(260, 1, '2017-12-27', 182, 1, 2, '2017-12-27', '300/Sket/Puket-I/XII/2017', 65, 6, ''),
(261, 1, '2017-12-27', 182, 1, 2, '2017-12-27', '300/Sket/Puket-I/XII/2017', 65, 6, 'izin wawancara'),
(262, 1, '2017-12-27', 182, 1, 2, '2017-12-27', '300/Sket/Puket-I/XII/2017', 65, 6, 'izin wawancara'),
(263, 3, '2017-12-27', 182, 1, 2, '2017-12-27', '301/Sket/Puket-I/XII/2017', 65, 6, 'izin wawancara'),
(264, 1, '2018-01-03', 89, 1, 2, '2018-01-03', '302/Sket/Puket-I/I/2018', 66, 6, ''),
(265, 1, '2018-01-03', 89, 1, 2, '2018-01-03', '302/Sket/Puket-I/I/2018', 66, 6, ''),
(266, 1, '2018-01-03', 89, 1, 2, '2018-01-03', '302/Sket/Puket-I/I/2018', 66, 6, 'd'),
(267, 3, '2018-01-03', 89, 1, 2, '2018-01-03', '302/Sket/Puket-I/I/2018', 66, 6, 'd'),
(268, 3, '2018-01-03', 17, 1, 2, '2018-01-03', '303/Sket/Puket-I/I/2018', 67, 6, ''),
(269, 3, '2018-01-03', 10, 1, 2, '2018-01-03', '304/Sket/Puket-I/I/2018', 67, 6, ''),
(270, 3, '2018-01-03', 10, 1, 2, '2018-01-03', '304/Sket/Puket-I/I/2018', 67, 6, ''),
(271, 3, '2018-01-03', 5, 1, 2, '2018-01-03', '305/Sket/Puket-I/I/2018', 68, 6, ''),
(272, 1, '2018-01-04', 185, 1, 2, '2018-01-04', '306/Sket/Puket-I/I/2018', 1, 6, ''),
(274, 1, '2018-01-04', 186, 6, 2, '2018-01-04', '307/Sket/Puket-I/I/2018', 1, 6, ''),
(275, 1, '2018-01-04', 187, 6, 2, '2018-01-04', '308/Sket/Puket-I/I/2018', 1, 6, ''),
(276, 1, '2018-01-06', 188, 1, 2, '2018-01-06', '309/Sket/Puket-I/I/2018', 1, 6, ''),
(277, 1, '2018-01-09', 189, 6, 2, '2018-01-09', '310/Sket/Puket-I/I/2018', 1, 6, ''),
(278, 1, '2018-01-10', 190, 2, 2, '2018-01-10', '311/Sket/Puket-I/I/2018', 1, 6, ''),
(279, 1, '2018-01-16', 191, 2, 2, '2018-01-16', '312/Sket/Puket-I/I/2018', 1, 6, ''),
(280, 1, '2018-01-16', 192, 6, 2, '2018-01-16', '313/Sket/Puket-I/I/2018', 1, 6, ''),
(281, 3, '2018-01-16', 193, 1, 2, '2018-01-16', '314/Sket/Puket-I/I/2018', 64, 6, 'APLIKASI PENERIMAAN SISWA BARU TK ISLAM RA ANANDA BERBASIS JAVA DESKTOP'),
(282, 2, '2018-01-16', 193, 1, 2, '2018-01-16', '314/Sket/Puket-I/I/2018', 64, 6, 'APLIKASI PENERIMAAN SISWA BARU TK ISLAM RA ANANDA BERBASIS JAVA DESKTOP'),
(283, 1, '2018-01-16', 195, 1, 2, '2018-01-16', '315/Sket/Puket-I/I/2018', 1, 6, ''),
(284, 1, '2018-01-16', 196, 1, 2, '2018-01-16', '316/Sket/Puket-I/I/2018', 1, 6, ''),
(285, 1, '2018-01-17', 197, 2, 2, '2018-01-17', '317/Sket/Puket-I/I/2018', 1, 6, ''),
(286, 2, '2018-01-17', 198, 1, 2, '2018-01-17', '318/Sket/Puket-I/I/2018', 70, 6, 'Sistem Informasi Penjualan Rumah Berbasis Website'),
(287, 2, '2018-01-17', 199, 1, 2, '2018-01-17', '319/Sket/Puket-I/I/2018', 71, 6, 'Sistem informasi kegiatan operasional satpol pp kota tanjungpinang berbasis website'),
(288, 1, '2018-01-17', 200, 1, 2, '2018-01-17', '320/Sket/Puket-I/I/2018', 1, 6, ''),
(289, 1, '2018-01-17', 201, 1, 2, '2018-01-17', '321/Sket/Puket-I/I/2018', 1, 6, ''),
(290, 1, '2018-01-17', 202, 1, 2, '2018-01-17', '322/Sket/Puket-I/I/2018', 1, 6, ''),
(292, 1, '2018-01-23', 205, 1, 2, '2018-01-23', '323/Sket/Puket-I/I/2018', 1, 6, ''),
(293, 1, '2018-01-23', 206, 1, 2, '2018-01-23', '324/Sket/Puket-I/I/2018', 1, 6, ''),
(294, 1, '2018-01-23', 207, 6, 2, '2018-01-23', '325/Sket/Puket-I/I/2018', 1, 6, ''),
(295, 1, '2018-01-24', 208, 1, 2, '2018-01-24', '326/Sket/Puket-I/I/2018', 1, 6, ''),
(296, 1, '2018-01-24', 209, 1, 2, '2018-01-24', '327/Sket/Puket-I/I/2018', 1, 6, ''),
(297, 1, '2018-01-31', 210, 1, 2, '2018-01-31', '328/Sket/Puket-I/I/2018', 1, 6, ''),
(298, 1, '2018-01-31', 211, 1, 2, '2018-01-31', '329/Sket/Puket-I/I/2018', 1, 6, ''),
(299, 2, '2018-02-01', 212, 1, 2, '2018-02-01', '330/Sket/Puket-I/II/2018', 61, 6, 'rancang bangun aplikasi pengolahan data aset pada pt.bank negara indonesia (persero) tbk kantor cabang tanjungpinang'),
(300, 1, '2018-02-03', 213, 5, 2, '2018-02-03', '331/Sket/Puket-I/II/2018', 1, 6, ''),
(301, 1, '2018-02-06', 214, 1, 2, '2018-02-06', '332/Sket/Puket-I/II/2018', 1, 6, ''),
(302, 1, '2018-02-08', 215, 1, 2, '2018-02-08', '333/Sket/Puket-I/II/2018', 1, 6, ''),
(303, 1, '2018-02-10', 217, 1, 2, '2018-02-10', '334/Sket/Puket-I/II/2018', 1, 6, ''),
(304, 1, '2018-02-10', 218, 1, 2, '2018-02-10', '335/Sket/Puket-I/II/2018', 1, 6, ''),
(305, 1, '2018-02-19', 219, 1, 2, '2018-02-19', '336/Sket/Puket-I/II/2018', 1, 6, ''),
(306, 1, '2018-02-19', 220, 1, 2, '2018-02-19', '337/Sket/Puket-I/II/2018', 1, 6, ''),
(307, 1, '2018-02-19', 221, 1, 2, '2018-02-19', '338/Sket/Puket-I/II/2018', 1, 6, ''),
(308, 1, '2018-03-01', 222, 6, 2, '2018-03-01', '339/Sket/Puket-I/III/2018', 1, 6, ''),
(309, 1, '2018-03-01', 223, 1, 2, '2018-03-01', '340/Sket/Puket-I/III/2018', 1, 6, ''),
(310, 1, '2018-03-01', 224, 1, 2, '2018-03-01', '341/Sket/Puket-I/III/2018', 1, 6, ''),
(311, 1, '2018-03-01', 224, 1, 2, '2018-03-01', '342/Sket/Puket-I/III/2018', 1, 6, ''),
(312, 1, '2018-03-01', 224, 1, 2, '2018-03-01', '342/Sket/Puket-I/III/2018', 1, 6, ''),
(313, 1, '2018-03-01', 223, 1, 2, '2018-03-01', '343/Sket/Puket-I/III/2018', 1, 6, ''),
(314, 1, '2018-03-03', 225, 1, 2, '2018-03-03', '344/Sket/Puket-I/III/2018', 1, 6, ''),
(315, 1, '2018-03-07', 226, 1, 2, '2018-03-07', '345/Sket/Puket-I/III/2018', 1, 6, ''),
(317, 2, '2018-03-12', 227, 1, 2, '2018-03-12', '346/Sket/Puket-I/III/2018', 72, 6, 'aplikasi penggajian pada kantor dprd provinsi kepulauan riau dompak'),
(318, 2, '2018-03-12', 228, 1, 2, '2018-03-12', '347/Sket/Puket-I/III/2018', 73, 6, 'SISTEM INFORMASI DATA SISWA'),
(320, 2, '2018-03-13', 229, 1, 2, '2018-03-13', '348/Sket/Puket-I/III/2018', 74, 6, 'APLIKASI INVENTORY BARANG ASET PADA PT BATAM BINTAN TELEKOMUNIKASI BERBASIS DESKTOP'),
(321, 2, '2018-03-13', 230, 1, 2, '2018-03-13', '349/Sket/Puket-I/III/2018', 67, 6, 'SISTEM INFORMASI DAFTAR PENGELUARAN BAHAN BAKU GUDANG DI PT SANDEN ELECTRONICS INDONESIA'),
(322, 2, '2018-03-13', 231, 1, 2, '2018-03-13', '350/Sket/Puket-I/III/2018', 73, 6, 'SISTEM INFORMASI PENGELOLAAN DAN PEMINJAMAN BUKU PERPUSTAKAAN SMK MUHAMMADIYAH TANJUNG UBAN'),
(324, 2, '2018-03-13', 233, 1, 2, '2018-03-13', '352/Sket/Puket-I/III/2018', 75, 6, 'SISTEM INFORMASI SERVICE ELECTRONIC BERBASIS JAVA NETBEANS DI OMEGA SERVICE'),
(325, 2, '2018-03-13', 235, 1, 2, '2018-03-13', '353/Sket/Puket-I/III/2018', 76, 6, 'SISTEM INFORMASI PENGELOLAAN DATA SISWA SD CALISA TANJUNG UBAN'),
(326, 2, '2018-03-13', 234, 1, 2, '2018-03-13', '354/Sket/Puket-I/III/2018', 77, 6, 'SISTEM INFORMASI PENJUALAN KACAMATA PADA OPTIK OVA'),
(327, 1, '2018-03-14', 236, 1, 2, '2018-03-14', '355/Sket/Puket-I/III/2018', 1, 6, ''),
(328, 1, '2018-03-14', 237, 1, 2, '2018-03-14', '356/Sket/Puket-I/III/2018', 1, 6, ''),
(330, 1, '2018-03-16', 238, 1, 2, '2018-03-16', '358/Sket/Puket-I/III/2018', 1, 6, ''),
(332, 3, '2018-03-20', 239, 1, 2, '2018-03-20', '360/Sket/Puket-I/III/2018', 79, 6, 'AUDIT KEAMANAN SISTEM INFORMASI PENDAFTARAN KARTU KELUARGA ONLINE PADA DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL KOTA TANJUNGPINANG MENGGUNAKAN FRAMEWORK COBIT 5'),
(333, 2, '2018-03-29', 240, 1, 2, '2018-03-29', '361/Sket/Puket-I/III/2018', 80, 6, 'SISTEM INFORMASI PENGOLAHAN DATA NILAI RAPOR SISWA PADA MA MADANI BINTAN'),
(334, 2, '2018-03-29', 241, 1, 2, '2018-03-29', '362/Sket/Puket-I/III/2018', 82, 6, 'APLIKASI PENERIMAAN SISWA BARU DI SEKOLAH DASAR 014 BINAAN BUKIT BESTARI TANJUNGPINANG BERBASIS DESKTOP'),
(335, 1, '2018-03-31', 242, 2, 2, '2018-03-31', '363/Sket/Puket-I/III/2018', 1, 6, ''),
(336, 1, '2018-04-03', 243, 5, 2, '2018-04-03', '364/Sket/Puket-I/IV/2018', 1, 6, ''),
(337, 3, '2018-04-03', 239, 1, 2, '2018-04-03', '365/Sket/Puket-I/IV/2018', 83, 6, 'AUDIT KEAMANAN SISTEM INFORMASI PENDAFTARAN KARTU KELUARGA ONLINE PADA DINAS KEPENDUDUKAN DAN PENCACATAN SIPIL KOTA TANJUNGPINANG MENGGUNAKAN FRAMEWORK COBIT 5'),
(338, 2, '2018-04-05', 244, 1, 2, '2018-04-05', '366/Sket/Puket-I/IV/2018', 84, 6, 'SISTEM INFORMASI PENGOLAHAN DATA PADA PERUSAHAAN PT ALDORA SUKSES PERKASA'),
(339, 2, '2018-04-05', 245, 1, 2, '2018-04-05', '367/Sket/Puket-I/IV/2018', 85, 6, 'APLIKASI KASIR'),
(340, 2, '2018-04-10', 246, 1, 2, '2018-04-10', '368/Sket/Puket-I/IV/2018', 86, 6, 'PERANCANGAN SISTEM INFORMASI PENGGAJIAN PEGAWAI DINAS PARIWISATA KABUPATEN BINTAN'),
(341, 2, '2018-04-10', 247, 1, 2, '2018-04-10', '369/Sket/Puket-I/IV/2018', 87, 6, 'SISTEM INFORMASI ABSENSI KARYAWAN'),
(343, 1, '2018-04-20', 82, 1, 2, '2018-04-20', '370/Sket/Puket-I/IV/2018', 1, 6, ''),
(344, 1, '2018-04-24', 248, 1, 2, '2018-04-24', '371/Sket/Puket-I/IV/2018', 1, 6, ''),
(345, 1, '2018-04-24', 250, 1, 2, '2018-04-24', '372/Sket/Puket-I/IV/2018', 1, 6, ''),
(346, 2, '2018-04-24', 249, 1, 2, '2018-04-24', '373/Sket/Puket-I/IV/2018', 88, 6, 'SISTEM INFORMASI DATA CUTI KARYAWAN PADA PT BATAM INTERMEDIA PERS'),
(347, 1, '2018-04-26', 251, 1, 2, '2018-04-26', '374/Sket/Puket-I/IV/2018', 93, 6, 'SISTEM INFORMASI PENGOLAHAN DATA PENJUALAN PADA PT ALDORA SUKSES PERKASA TANJUNGPINANG'),
(348, 1, '2018-04-26', 251, 1, 2, '2018-04-26', '374/Sket/Puket-I/IV/2018', 93, 6, 'SISTEM INFORMASI PENGOLAHAN DATA PENJUALAN PADA PT ALDORA SUKSES PERKASA TANJUNGPINANG'),
(349, 2, '2018-04-26', 251, 1, 2, '2018-04-26', '374/Sket/Puket-I/IV/2018', 93, 6, 'SISTEM INFORMASI PENGOLAHAN DATA PENJUALAN PADA PT ALDORA SUKSES PERKASA TANJUNGPINANG'),
(350, 2, '2018-04-26', 252, 1, 2, '2018-04-26', '375/Sket/Puket-I/IV/2018', 92, 6, 'PEMBUATAN PROGRAM KASIR UNTUK TOKO ASIANG SEKEN'),
(351, 2, '2018-04-26', 253, 1, 2, '2018-04-26', '376/Sket/Puket-I/IV/2018', 91, 6, 'SISTEM INFORMASI PERANCANGAN ABSENSI KARYAWAN'),
(352, 2, '2018-04-26', 254, 1, 2, '2018-04-26', '377/Sket/Puket-I/IV/2018', 90, 6, 'PERANCANGAN SISTEM INFORMASI MENGGADAIKAN SURAT BPKB PADA PEGADAIAN '),
(353, 3, '2018-04-26', 255, 1, 2, '2018-04-26', '378/Sket/Puket-I/IV/2018', 89, 6, 'AUDIT SISTEM INFORMASI LAYANAN APARATUR TERPADU (SILAT) DI BKPSDM PROV. KEPULAUAN RIAU MENGGUNAKAN STANDAR COBIT 5 DOMAIN MEA (MONITOR, EVELUATE AND ASCESS)'),
(354, 1, '2018-05-03', 195, 1, 2, '2018-05-03', '379/Sket/Puket-I/V/2018', 1, 6, ''),
(355, 3, '2018-05-09', 256, 1, 2, '2018-05-09', '380/Sket/Puket-I/V/2018', 89, 6, 'PERANCANGAN SISTEM INFORMASI PERJALANAN DINAS PEGAWAI BADAN PENGELOLAAN KEUANGAN DAN ASER DAERAH PROVINSI KEPULAUAN RIAU'),
(356, 3, '2018-05-09', 257, 1, 2, '2018-05-09', '381/Sket/Puket-I/V/2018', 89, 6, 'perancangan sistem informasi perjalanan dinas pegawai badan pengelolaan keuangan dan aset daerah provinsi kepulauan riau'),
(357, 1, '2018-06-02', 258, 1, 2, '2018-06-02', '382/Sket/Puket-I/VI/2018', 1, 6, ''),
(358, 1, '2018-06-05', 259, 5, 2, '2018-06-05', '383/Sket/Puket-I/VI/2018', 1, 6, ''),
(359, 3, '2018-07-23', 260, 1, 2, '2018-07-23', '384/Sket/Puket-I/VII/2018', 94, 6, 'SISTEM INFORMASI MANAJEMEN LOGISTIK PADA DISTRIK NAVIGASI TANJUNGPINANG'),
(360, 1, '2018-07-23', 261, 1, 2, '2018-07-23', '385/Sket/Puket-I/VII/2018', 1, 6, ''),
(361, 1, '2018-07-24', 262, 6, 2, '2018-07-24', '386/Sket/Puket-I/VII/2018', 1, 3, ''),
(362, 3, '2018-07-25', 263, 1, 2, '2018-07-25', '387/Sket/Puket-I/VII/2018', 95, 3, 'rancang bangun sistem informasi koperasi simpan pinjam berbasis web pada korem 033 / wira pratama'),
(363, 3, '2018-07-25', 264, 1, 2, '2018-07-25', '388/Sket/Puket-I/VII/2018', 96, 3, 'sistem informasi manajemen logistik distrik navigasi tanjungpinang'),
(364, 3, '2018-07-27', 263, 1, 2, '2018-07-27', '389/Sket/Puket-I/VII/2018', 97, 3, 'RANCANG BANGUN SISTEM INFORMASI KOPERASI SIMPAN PINJAM BERBASIS WEB DI KOREM 033 / WIRA PRATAMA '),
(365, 1, '2018-07-27', 265, 5, 2, '2018-07-27', '390/Sket/Puket-I/VII/2018', 1, 3, ''),
(366, 1, '2018-07-28', 266, 5, 2, '2018-07-28', '391/Sket/Puket-I/VII/2018', 1, 3, ''),
(367, 1, '2018-07-31', 50, 6, 2, '2018-07-31', '392/Sket/Puket-I/VII/2018', 1, 3, ''),
(368, 3, '2018-07-31', 263, 6, 2, '2018-07-31', '392/Sket/Puket-I/VII/2018', 97, 3, 'RANCANG APLIKASI PENGOLAHAN SIMPAN PINJAM PADA KOPERASI KOREM 033 / WIRA PRATAMA'),
(369, 1, '2018-08-02', 267, 5, 2, '2018-08-02', '393/Sket/Puket-I/VIII/2018', 1, 3, ''),
(370, 1, '2018-08-02', 267, 5, 2, '2018-08-02', '394/Sket/Puket-I/VIII/2018', 1, 3, ''),
(371, 1, '2018-08-04', 268, 5, 2, '2018-08-04', '395/Sket/Puket-I/VIII/2018', 1, 3, ''),
(372, 2, '2018-08-07', 269, 1, 2, '2018-08-07', '396/Sket/Puket-I/VIII/2018', 98, 3, 'SISTEM INFORMASI PEMINJAMAN DAN PENGEMBALIAN TOOLS'),
(373, 2, '2018-08-07', 271, 6, 2, '2018-08-07', '396/Sket/Puket-I/VIII/2018', 98, 3, 'SISTEM INFORMASI PEMINJAMAN DAN PENGEMBALIAN TOOLS'),
(374, 2, '2018-08-07', 271, 6, 2, '2018-08-07', '396/Sket/Puket-I/VIII/2018', 98, 3, 'SISTEM INFORMASI PEMINJAMAN DAN PENGEMBALIAN TOOLS'),
(375, 2, '2018-08-07', 271, 6, 2, '2018-08-07', '397/Sket/Puket-I/VIII/2018', 1, 3, ''),
(376, 1, '2018-08-07', 271, 6, 2, '2018-08-07', '398/Sket/Puket-I/VIII/2018', 1, 3, ''),
(377, 1, '2018-08-07', 270, 6, 2, '2018-08-07', '398/Sket/Puket-I/VIII/2018', 1, 3, ''),
(378, 1, '2018-08-14', 272, 1, 2, '2018-08-14', '399/Sket/Puket-I/VIII/2018', 1, 3, ''),
(379, 1, '2018-08-15', 274, 2, 2, '2018-08-15', '400/Sket/Puket-I/VIII/2018', 1, 3, ''),
(380, 3, '2018-08-15', 275, 1, 2, '2018-08-15', '401/Sket/Puket-I/VIII/2018', 98, 3, 'implementasi metode saw untuk menilai kinerja karyawan pada pt.esco bintan indonesia berbasis web menggunakan framework codeigniter'),
(381, 3, '2018-08-20', 276, 1, 2, '2018-08-20', '402/Sket/Puket-I/VIII/2018', 37, 3, 'SISTEM PENDUKUNG KEPUTUSAN SELEKSI PENERIMAAN SISWA BARU SMK MAITREYAWIRYA TANJUNGPINANG DENGAN METODE ELECTRE'),
(382, 3, '2018-08-21', 258, 1, 2, '2018-08-21', '403/Sket/Puket-I/VIII/2018', 100, 3, 'SISTEM PENDUKUNG KEPUTUSAN PENELITIAN KINERJA GURU PADA SMPN 1 BINTAN DENGAN METODE BAYES DAN METODE PERBANDINGAN EKSPONENSIAL'),
(383, 3, '2018-08-21', 258, 1, 2, '2018-08-21', '403/Sket/Puket-I/VIII/2018', 101, 3, 'SISTEM PENDUKUNG KEPUTUSAN PENELITIAN KINERJA GURU PADA SMPN 1 BINTAN TIMUR DENGAN METODE BAYES DAN METODE PERBANDINGAN EKSPONENSIAL'),
(384, 1, '2018-08-21', 277, 5, 2, '2018-08-21', '404/Sket/Puket-I/VIII/2018', 1, 3, ''),
(385, 1, '2018-08-23', 278, 6, 2, '2018-08-23', '405/Sket/Puket-I/VIII/2018', 1, 3, ''),
(386, 1, '2018-08-23', 279, 6, 2, '2018-08-23', '405/Sket/Puket-I/VIII/2018', 1, 3, ''),
(387, 1, '2018-08-23', 280, 1, 2, '2018-08-23', '406/Sket/Puket-I/VIII/2018', 1, 3, ''),
(388, 1, '2018-08-25', 281, 5, 2, '2018-08-25', '407/Sket/Puket-I/VIII/2018', 1, 3, ''),
(389, 1, '2018-08-28', 282, 5, 2, '2018-08-28', '408/Sket/Puket-I/VIII/2018', 1, 3, ''),
(392, 2, '2018-08-28', 283, 1, 2, '2018-08-28', '409/Sket/Puket-I/VIII/2018', 102, 3, 'APLIKASI DATA LAMPU PENERANGAN JALAN UMUM DI TANJUNGPINANG'),
(393, 3, '2018-09-06', 284, 1, 2, '2018-09-06', '410/Sket/Puket-I/IX/2018', 104, 3, 'Audit Keamanan Sistem Informasi Manajemen Aparatur Sipil Negara Pada Badan Kepegawaian, Pendidikan dan Pelatihan Daerah Kabupaten Bintan Menggunakan Framework Cobit 5'),
(394, 3, '2018-09-06', 284, 4, 2, '2018-09-06', '411/Sket/Puket-I/IX/2018', 103, 3, 'Audit Keamanan Sistem Informasi Manajemen Aparatur Sipil Negara Pada Badan Kepegawaian, Pendidikan dan Pelatihan Daerah Kabupaten Bintan Menggunakan Framework Cobit 5'),
(395, 3, '2018-09-06', 284, 4, 2, '2018-09-06', '412/Sket/Puket-I/IX/2018', 105, 3, 'Audit Keamanan Sistem Informasi Manajemen Aparatur Sipil Negara Pada Badan Kepegawaian, Pendidikan dan Pelatihan Daerah Kabupaten Bintan Menggunakan Framework Cobit 5'),
(397, 3, '2018-09-10', 286, 1, 2, '2018-09-10', '414/Sket/Puket-I/IX/2018', 107, 3, 'PENGARSIPAN SURAT MASUK DAN SURAT KELUAR BERBASIS WEBSITE'),
(398, 1, '2018-09-14', 287, 5, 2, '2018-09-14', '415/Sket/Puket-I/IX/2018', 1, 3, ''),
(399, 1, '2018-09-17', 288, 5, 2, '2018-09-17', '416/Sket/Puket-I/IX/2018', 1, 3, ''),
(400, 1, '2018-09-17', 289, 5, 2, '2018-09-17', '416/Sket/Puket-I/IX/2018', 1, 3, ''),
(401, 3, '2018-09-17', 290, 1, 2, '2018-09-17', '417/Sket/Puket-I/IX/2018', 108, 3, 'PENERAPAN STRING MATCHING PADA APLIKASI E-ARSIP BERBASIS WEB KEJAKSAAN TINGGI '),
(402, 1, '2018-09-18', 291, 5, 2, '2018-09-18', '418/Sket/Puket-I/IX/2018', 1, 3, ''),
(403, 1, '2018-09-18', 292, 1, 2, '2018-09-18', '418/Sket/Puket-I/IX/2018', 1, 3, ''),
(404, 1, '2018-09-21', 293, 1, 2, '2018-09-21', '419/Sket/Puket-I/IX/2018', 1, 3, ''),
(405, 3, '2018-09-25', 294, 1, 2, '2018-09-25', '420/Sket/Puket-I/IX/2018', 109, 3, 'SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN GURU TELADAN MENGGUNAKAN METODE TOPSIS (STUDI KASUS SMA MUHAMMADIYAH TANJUNGPINANG)'),
(406, 3, '2018-09-25', 295, 1, 2, '2018-09-25', '421/Sket/Puket-I/IX/2018', 110, 3, 'APLIKASI PENGOLAHAN DATA ABSENSI PEGAWAI KANTOR CAMAT SERASAN '),
(407, 3, '2018-09-25', 296, 1, 2, '2018-09-25', '422/Sket/Puket-I/IX/2018', 111, 3, 'APLIKASI PERPUSTAKAAN SMA NEGERI 3 TANJUNGPINANG BERBASIS DEKSTOP'),
(408, 3, '2018-09-25', 297, 1, 2, '2018-09-25', '423/Sket/Puket-I/IX/2018', 112, 3, 'SISTEM PAKAR MENDIAGNOSA PENYAKIT PARKINSON PADA ORANG TUA MENGGUNAKAN METODE CERTAINTY FACTOR'),
(409, 3, '2018-09-25', 298, 1, 2, '2018-09-25', '424/Sket/Puket-I/IX/2018', 113, 3, 'SISTEM PAKAR DETEKSI KERUSAKAN ENGINE MOUNTING PADA KENDARAAN BERMOTOR RODA EMPAT MENGGUNAKAN METODE CERTAINTY FACTOR'),
(410, 1, '2018-09-27', 299, 1, 2, '2018-09-27', '425/Sket/Puket-I/IX/2018', 114, 3, 'SISTEM INFORMASI PENGOLAHAN DATA STATISTIK STUDI KASUS DINAS KOMUNIKASI DAN INFORMASI KOTA TANJUNGPINANG'),
(411, 1, '2018-09-27', 299, 1, 2, '2018-09-27', '425/Sket/Puket-I/IX/2018', 114, 3, 'SISTEM INFORMASI PENGOLAHAN DATA STATISTIK STUDI KASUS DINAS KOMUNIKASI DAN INFORMASI KOTA TANJUNGPINANG'),
(412, 3, '2018-09-27', 299, 1, 2, '2018-09-27', '425/Sket/Puket-I/IX/2018', 114, 3, 'SISTEM INFORMASI PENGOLAHAN DATA STATISTIK STUDI KASUS DINAS KOMUNIKASI DAN INFORMASI KOTA TANJUNGPINANG'),
(413, 2, '2018-09-29', 301, 1, 2, '2018-09-29', '426/Sket/Puket-I/IX/2018', 116, 3, 'ANALISIS PROSES BISNIS PENGAJUAN KREDIT PADA PT SINARMAS MULTIFINANCE'),
(414, 2, '2018-09-29', 300, 1, 2, '2018-09-29', '426/Sket/Puket-I/IX/2018', 115, 3, 'ANALISIS LAYOUT PELAYANAN MENGGUNAKAN ARC'),
(415, 2, '2018-09-29', 296, 1, 2, '2018-09-29', '427/Sket/Puket-I/IX/2018', 111, 3, 'APLIKASI PERPUSTAKAAN SMA N 3 TANJUNGPINANG BERBASIS DEKSTOP'),
(416, 2, '2018-09-29', 295, 1, 2, '2018-09-29', '427/Sket/Puket-I/IX/2018', 110, 3, 'APLIKASI PENGOLAHAN DATA ABSENSI PEGAWAI KANTOR CAMAT SERASAN '),
(417, 1, '2018-10-02', 302, 1, 2, '2018-10-02', '428/Sket/Puket-I/X/2018', 1, 3, ''),
(418, 1, '2018-10-04', 303, 6, 2, '2018-10-04', '429/Sket/Puket-I/X/2018', 1, 3, ''),
(419, 3, '2018-10-04', 196, 6, 2, '2018-10-04', '429/Sket/Puket-I/X/2018', 1, 3, 'PERANCANGAN APLIKASI PENGOLAHAN DATA KOPERASI SIMPAN PINJAM'),
(420, 3, '2018-10-04', 196, 1, 2, '2018-10-04', '430/Sket/Puket-I/X/2018', 117, 3, 'PERANCANGAN APLIKASI PENGOLAHAN DATA KOPERASI SIMPAN PINJAM'),
(421, 3, '2018-10-08', 129, 1, 2, '2018-10-08', '431/Sket/Puket-I/X/2018', 119, 3, 'SISTEM INFORMASI GEOGRAFIS (SIG) PROPERTI DI KOTA TANJUNGPINANG '),
(422, 1, '2018-10-13', 304, 5, 2, '2018-10-13', '432/Sket/Puket-I/X/2018', 1, 3, ''),
(423, 1, '2018-10-20', 306, 5, 2, '2018-10-20', '433/Sket/Puket-I/X/2018', 1, 3, ''),
(424, 1, '2018-10-20', 305, 5, 2, '2018-10-20', '433/Sket/Puket-I/X/2018', 1, 3, ''),
(426, 3, '2018-10-23', 307, 1, 2, '2018-10-23', '434/Sket/Puket-I/X/2018', 121, 3, 'sistem pendukung keputusan pemilihan objek wisata di tanjungpinang menggunakan metode topsis'),
(427, 3, '2018-10-23', 307, 1, 2, '2018-10-23', '434/Sket/Puket-I/X/2018', 120, 3, 'sistem pendukung keputusan pemilihan objek wisata di tanjungpinang'),
(428, 3, '2018-10-23', 308, 1, 2, '2018-10-23', '434/Sket/Puket-I/X/2018', 121, 3, 'sistem pendukung keputusan pemesanan hotel menggunakan metode ahp'),
(429, 3, '2018-10-23', 308, 1, 2, '2018-10-23', '434/Sket/Puket-I/X/2018', 120, 3, 'sistem pendukung keputusan pemesanan hotel menggunakan metode ahp'),
(430, 1, '2018-10-24', 310, 6, 2, '2018-10-24', '435/Sket/Puket-I/X/2018', 1, 3, ''),
(431, 3, '2018-10-25', 311, 1, 2, '2018-10-25', '436/Sket/Puket-I/X/2018', 122, 3, 'sistem informasi pelayanan surat pindah penduduk pada dinas kependudukan dan pendatatan sipil kabupaten bintan '),
(432, 1, '2018-10-26', 198, 6, 2, '2018-10-26', '437/Sket/Puket-I/X/2018', 1, 3, ''),
(433, 3, '2018-10-26', 30, 6, 2, '2018-10-26', '437/Sket/Puket-I/X/2018', 86, 3, 'sistem informasi geografis pemetaan pariwisata kabupaten bintan berbasis web '),
(434, 3, '2018-10-30', 312, 1, 2, '2018-10-30', '438/Sket/Puket-I/X/2018', 123, 3, 'aplikasi collecting data gaji pegawai negeri aktif sipil di wilayah PT TASPEN (persero) cabang tanjungpinang berbasis web '),
(435, 1, '2018-11-02', 313, 5, 2, '2018-11-02', '439/Sket/Puket-I/XI/2018', 1, 3, ''),
(436, 3, '2018-11-09', 314, 1, 2, '2018-11-09', '440/Sket/Puket-I/XI/2018', 124, 3, 'sistem informasi perpustakaan berbasis web di smk negeri 3 tanjungpinang '),
(437, 1, '2018-11-12', 241, 1, 2, '2018-11-12', '441/Sket/Puket-I/XI/2018', 1, 3, ''),
(438, 1, '2018-11-12', 241, 1, 2, '2018-11-12', '442/Sket/Puket-I/XI/2018', 1, 3, ''),
(439, 1, '2018-11-19', 315, 1, 2, '2018-11-19', '443/Sket/Puket-I/XI/2018', 1, 3, ''),
(440, 2, '2018-11-22', 192, 1, 2, '2018-11-22', '444/Sket/Puket-I/XI/2018', 125, 3, 'aplikasi peminjaman dan pengembalian buku di perpustakaan smpn 2 tanjungpinang'),
(441, 3, '2018-11-26', 316, 1, 2, '2018-11-26', '445/Sket/Puket-I/XI/2018', 126, 3, 'rancang bangun aplikasi notification alert berbasis web bagi layanan lowingan kerja alumni sekolah tinggi teknoogi indonesia tanjungpinang'),
(442, 3, '2018-11-26', 275, 1, 2, '2018-11-26', '446/Sket/Puket-I/XI/2018', 127, 3, 'aplikasi pengolahan data dan pemesanan lapangan futsal taman kota seri kuala lobam'),
(443, 3, '2018-11-26', 317, 1, 2, '2018-11-26', '447/Sket/Puket-I/XI/2018', 128, 3, 'aplikasi e-booking tiket kapal antar wilayah kepulauan riau berbasis android dan web'),
(444, 3, '2018-11-26', 318, 1, 2, '2018-11-26', '448/Sket/Puket-I/XI/2018', 126, 3, 'aplikasi perpustakaan pada perpustakaan sekolah tinggi teknologi indonesia tanjungpinang'),
(445, 3, '2018-11-29', 319, 1, 2, '2018-11-29', '449/Sket/Puket-I/XI/2018', 131, 3, 'aplikasi pengolahan data keuangan siswa sma negeri 4 bintan'),
(446, 3, '2018-11-29', 320, 1, 2, '2018-11-29', '450/Sket/Puket-I/XI/2018', 129, 3, 'sistem informasi pengolahan stok barang pada toko dual comm tanjungpinang berbasis client server'),
(447, 1, '2018-11-29', 321, 1, 2, '2018-11-29', '451/Sket/Puket-I/XI/2018', 130, 3, 'sistem pendukung keputusan pemberian insentif untuk karyawan legacies dengan menggunakan saw'),
(448, 1, '2018-11-29', 321, 1, 2, '2018-11-29', '451/Sket/Puket-I/XI/2018', 130, 3, 'sistem pendukung keputusan pemberian insentif untuk karyawan legacies dengan menggunakan saw'),
(449, 3, '2018-11-29', 321, 1, 2, '2018-11-29', '451/Sket/Puket-I/XI/2018', 130, 3, 'sistem pendukung keputusan pemberian insentif untuk karyawan legacies dengan menggunakan saw'),
(450, 1, '2018-11-29', 322, 1, 2, '2018-11-29', '452/Sket/Puket-I/XI/2018', 1, 3, ''),
(451, 3, '2018-11-30', 323, 1, 2, '2018-11-30', '453/Sket/Puket-I/XI/2018', 132, 3, 'aplikasi e-booking tiket kapal antar wilayah pulau bintan dan pulau batam berbasis android dan web'),
(452, 3, '2018-11-30', 323, 1, 2, '2018-11-30', '453/Sket/Puket-I/XI/2018', 132, 3, 'aplikasi e-booking tiket kapal antar wilayah pulau bintan dan pulau batam berbasis android dan web'),
(453, 3, '2018-12-04', 324, 1, 2, '2018-12-04', '454/Sket/Puket-I/XII/2018', 133, 3, 'aplikasi administrasi dan pengelolaan keuangan pada rumah cuci laundry'),
(454, 3, '2018-12-06', 98, 1, 2, '2018-12-06', '455/Sket/Puket-I/XII/2018', 135, 3, 'sistem pendukung keputusan pemilihan perumahan dengan metode electre'),
(455, 3, '2018-12-06', 325, 1, 2, '2018-12-06', '456/Sket/Puket-I/XII/2018', 136, 3, 'sistem pakar mendiagnosa penyakit vertigo dengan menggunakan metode certainty factor'),
(456, 3, '2018-12-08', 326, 1, 2, '2018-12-08', '457/Sket/Puket-I/XII/2018', 137, 3, 'perancangan sistem informasi pembayaran gaji menggunakan perhitungan metode pro rata pada toko utama ban tanjungpinang'),
(457, 3, '2018-12-08', 189, 1, 2, '2018-12-08', '457/Sket/Puket-I/XII/2018', 138, 3, 'sistem pakar diagnosa penyakit pada kehamilan menggunakan metode certainty factor'),
(458, 3, '2018-12-08', 99, 1, 2, '2018-12-08', '457/Sket/Puket-I/XII/2018', 138, 3, 'sistem informasi monitoring kegiatan berbasis web pada masjid raya nur ilahi provinsi kepri'),
(459, 3, '2018-12-08', 99, 1, 2, '2018-12-08', '457/Sket/Puket-I/XII/2018', 139, 3, 'sistem informasi monitoring kegiatan berbasis web pada masjid raya nur ilahi provinsi kepri'),
(460, 3, '2018-12-08', 328, 1, 2, '2018-12-08', '458/Sket/Puket-I/XII/2018', 138, 3, 'sistem pakar diagnosa penyakit pada kehamilan menggunakan metode certainty factor'),
(461, 3, '2018-12-08', 329, 1, 2, '2018-12-08', '459/Sket/Puket-I/XII/2018', 140, 3, 'aplikasi peringatan dini cuaca ekstrim berdasarkan informasi bmkg berbasis web gateway'),
(462, 3, '2018-12-08', 329, 1, 2, '2018-12-08', '459/Sket/Puket-I/XII/2018', 141, 3, 'aplikasi peringatan dini cuaca ekstrim berdasarkan informasi bmkg berbasis web gateway'),
(463, 3, '2018-12-08', 193, 1, 2, '2018-12-08', '460/Sket/Puket-I/XII/2018', 142, 3, 'sistem pakar kerusakan laptop dengan metode certainty factor'),
(464, 3, '2018-12-08', 330, 1, 2, '2018-12-08', '461/Sket/Puket-I/XII/2018', 143, 3, 'perancangan aplikasi tes ujian masuk berbasis web pada bimbingan belajar sahabat pelajar tanjungpinang'),
(465, 3, '2018-12-10', 331, 1, 2, '2018-12-10', '462/Sket/Puket-I/XII/2018', 1, 3, 'sistem informasi pemgambilan keputusan mutasi pegawai dengan menggunakan metode simple additive weighting pada badan kepegawaian daerah kota provinsi kepulauan riau'),
(466, 3, '2018-12-10', 331, 1, 2, '2018-12-10', '463/Sket/Puket-I/XII/2018', 144, 3, 'sistem informasi pemgambilan keputusan mutasi pegawai dengan menggunakan metode simple additive weighting pada badan kepegawaian daerah kota provinsi kepulauan riau'),
(467, 3, '2018-12-10', 332, 1, 2, '2018-12-10', '464/Sket/Puket-I/XII/2018', 145, 3, 'sistem informasi media penerima aspirasi masyarakat bagi anggota dprd kota tanjungpinang'),
(468, 3, '2018-12-10', 333, 1, 2, '2018-12-10', '465/Sket/Puket-I/XII/2018', 146, 3, 'sistem pakar diagnosa penyakit stroke menggunakan metode bayes'),
(469, 1, '2018-12-11', 335, 1, 2, '2018-12-11', '466/Sket/Puket-I/XII/2018', 1, 3, ''),
(470, 3, '2018-12-11', 336, 1, 2, '2018-12-11', '467/Sket/Puket-I/XII/2018', 147, 3, 'pengembangan sistem informasi peminjaman dan pengembalian barang inventaris'),
(471, 3, '2018-12-11', 337, 1, 2, '2018-12-11', '468/Sket/Puket-I/XII/2018', 148, 3, 'sistem informasi pengolahan data gaji karyawan pada bintan columbia'),
(472, 3, '2018-12-11', 338, 1, 2, '2018-12-11', '469/Sket/Puket-I/XII/2018', 149, 3, 'analisis aplikasi GF akuntansi dalam segi keamanan menggunakan iso/iec 17799'),
(473, 3, '2018-12-13', 346, 1, 2, '2018-12-13', '470/Sket/Puket-I/XII/2018', 67, 3, 'sistem informasi product and proces development (ppd) sample team berbasis client server pada pt sanden electronics indonesia'),
(474, 3, '2018-12-13', 345, 1, 2, '2018-12-13', '470/Sket/Puket-I/XII/2018', 67, 3, 'aplikasi multi user inventarisasi aset tetap berbasis web pada pt sanden electronics indonesia'),
(475, 3, '2018-12-13', 344, 1, 2, '2018-12-13', '470/Sket/Puket-I/XII/2018', 67, 3, 'aplikasi monitoring production planning berbasis client server pada pt sanden electronics indonesia'),
(476, 3, '2018-12-13', 343, 1, 2, '2018-12-13', '470/Sket/Puket-I/XII/2018', 67, 3, 'aplikasi cost of poor quality pt sanden electronics indonesia berbasis client server'),
(477, 3, '2018-12-13', 341, 1, 2, '2018-12-13', '470/Sket/Puket-I/XII/2018', 67, 3, 'aplikasi pengendalian anggaran berbasis client server pt sanden electronics indonesia'),
(478, 3, '2018-12-13', 342, 1, 2, '2018-12-13', '470/Sket/Puket-I/XII/2018', 67, 3, 'aplikasi inventory stock tak berbasis client server pt sanden electronics indonesia'),
(479, 3, '2018-12-13', 340, 1, 2, '2018-12-13', '470/Sket/Puket-I/XII/2018', 67, 3, 'sistem informasi material reject slip dan material reject board pada pt sanden electronics indonesia'),
(480, 3, '2018-12-13', 339, 1, 2, '2018-12-13', '470/Sket/Puket-I/XII/2018', 67, 3, 'sistem informasi inventory alat tulis kantor (atk) pada pt sanden electronics indonesia'),
(481, 3, '2018-12-14', 347, 1, 2, '2018-12-14', '471/Sket/Puket-I/XII/2018', 150, 3, 'perancangan dan implementasi engginering maintenance sistem berbasis web pada pt.tirta utama riani indah'),
(482, 2, '2018-12-15', 217, 1, 2, '2018-12-15', '472/Sket/Puket-I/XII/2018', 151, 3, 'sistem pengelolaan data absensi siswa sman 6 berbasis java'),
(483, 3, '2018-12-18', 348, 1, 2, '2018-12-18', '473/Sket/Puket-I/XII/2018', 153, 3, 'aplikasi penggajian honorer pada balai karantina ikan, pengendalian mutu dan keamanan hasil perikanan tanjungpinang'),
(484, 3, '2018-12-18', 349, 1, 2, '2018-12-18', '474/Sket/Puket-I/XII/2018', 152, 3, 'sistem informasi pengelolaan dan pendistribusian kosmetik berdasarkan nomot batch dengan metode first expired forst out pada cv. mega mulia perkasa tanjungpinang'),
(485, 3, '2018-12-18', 350, 1, 2, '2018-12-18', '475/Sket/Puket-I/XII/2018', 154, 3, 'pengembangan aplikasi untuk integrasi penggajian dan absensi menggunakan rfid pada pt.panca rasa pratama tanjungpinang'),
(486, 3, '2018-12-18', 351, 1, 2, '2018-12-18', '476/Sket/Puket-I/XII/2018', 155, 3, 'sistem informasi manajemen surat di bidang anggaran badan pengelola keuangan dan aset daerah prov. kepri'),
(487, 3, '2018-12-18', 353, 1, 2, '2018-12-18', '477/Sket/Puket-I/XII/2018', 156, 3, 'sistem informasi akuntansi pada pt karya harapan muda'),
(488, 3, '2018-12-20', 354, 1, 2, '2018-12-20', '478/Sket/Puket-I/XII/2018', 157, 3, 'sistem pakar mendiagnosis penyakit stroke menggunakan metode forward chaining'),
(489, 3, '2018-12-20', 355, 1, 2, '2018-12-20', '479/Sket/Puket-I/XII/2018', 158, 3, 'perancangan sistem informasi e commerce pada yakseng cake shop tanjungpinang'),
(490, 3, '2018-12-20', 263, 1, 2, '2018-12-20', '480/Sket/Puket-I/XII/2018', 95, 3, 'sistem informasi pengolahan simpan pinjam berbasis web pada koperasi korem 033 / wira pratama'),
(491, 1, '2018-12-26', 357, 1, 2, '2018-12-26', '481/Sket/Puket-I/XII/2018', 1, 3, ''),
(492, 3, '2018-12-26', 356, 1, 2, '2018-12-26', '482/Sket/Puket-I/XII/2018', 158, 3, 'sistem informasi pembelian dan penjualan bahan bangunan dengan metode fifo pada pt citra seraya tanjungpinang');
INSERT INTO `surat` (`idSurat`, `idJenis`, `tanggalSurat`, `idMahasiswa`, `idKeperluan`, `idKategori`, `tanggalBuat`, `noSurat`, `tujuan`, `idThajaran`, `judul`) VALUES
(493, 3, '2018-12-26', 358, 1, 2, '2018-12-26', '483/Sket/Puket-I/XII/2018', 159, 3, 'sistem lampu jalan otomatis berbasis microcontroller'),
(494, 3, '2018-12-26', 358, 1, 2, '2018-12-26', '483/Sket/Puket-I/XII/2018', 160, 3, 'sistem lampu jalan otomatis berbasis microcontroller'),
(495, 3, '2018-12-27', 354, 1, 2, '2018-12-27', '484/Sket/Puket-I/XII/2018', 162, 3, 'sistem pakkar mendiagnosa penyakit stroke menggunakan metode forward chaining'),
(496, 3, '2018-12-27', 354, 1, 2, '2018-12-27', '485/Sket/Puket-I/XII/2018', 163, 3, 'sistem pakar mendiagnosa penyakit stroke menggunakan forward chaining'),
(497, 3, '2018-12-29', 359, 1, 2, '2018-12-29', '486/Sket/Puket-I/XII/2018', 164, 3, 'sistem informasi reservasi realtime pada lapangan futsal tri mazmur berbasis web dengan websocket'),
(498, 3, '2019-01-02', 354, 1, 2, '2019-01-02', '487/Sket/Puket-I/I/2019', 165, 3, 'sistem pakar mendiagnosa penyakit stroke menggunakan metode forward chaining'),
(499, 3, '2019-01-03', 274, 1, 2, '2019-01-03', '488/Sket/Puket-I/I/2019', 169, 3, 'aplikasi pengolahan buku jurnal kegiatan pembelajaran pada sekolah menengah pertama 17 kabupaten'),
(500, 3, '2018-12-24', 262, 1, 2, '2019-01-03', '488/Sket/Puket-I/I/2019', 168, 3, 'pengembangan aplikasi pengolahan data pengunjung dan inventaris ruangan pada museum bahari kabupaten bintan'),
(501, 3, '2019-01-03', 360, 1, 2, '2019-01-03', '488/Sket/Puket-I/I/2019', 167, 3, 'pengembangan aplikasi export/import berbasis desktop di PT bintan inti industrial estate'),
(502, 3, '2019-01-03', 361, 1, 2, '2019-01-03', '488/Sket/Puket-I/I/2019', 166, 3, 'aplikasi sistem pengambilan keputusan metode weighted (wp) pemilihan rumah pada pt trisindo'),
(503, 2, '2019-01-03', 37, 1, 2, '2019-01-03', '489/Sket/Puket-I/I/2019', 170, 3, 'aplikasi penggajian pada sekolah tinggi teknologi indonesia tanjungpinang'),
(504, 3, '2019-01-03', 362, 1, 2, '2019-01-03', '490/Sket/Puket-I/I/2019', 171, 3, 'sistem informasi reservasi tempat makan di restoran panjang tanjungpinang berbasis website'),
(505, 3, '2019-01-04', 363, 1, 2, '2019-01-04', '491/Sket/Puket-I/I/2019', 172, 3, 'sistem informasi geografis tempat pariwisata pulau bintan berbasis android menggunakan location base service'),
(506, 3, '2019-01-04', 363, 1, 2, '2019-01-04', '491/Sket/Puket-I/I/2019', 172, 3, 'aplikasi peminjaman barang berbasis online pada kejaksaan negeri tanjungpinang'),
(507, 3, '2019-01-04', 364, 1, 2, '2019-01-04', '491/Sket/Puket-I/I/2019', 173, 3, 'sistem informasi geografis tempat pariwisata pulau bintan berbasis android menggunakan location base service'),
(508, 3, '2019-01-05', 364, 1, 2, '2019-01-05', '492/Sket/Puket-I/I/2019', 174, 3, 'sistem informasi geografis tempat pariwisata pulau bintan berbasis android menggunakan location basis  service'),
(509, 1, '2019-01-05', 328, 1, 2, '2019-01-05', '493/Sket/Puket-I/I/2019', 1, 3, ''),
(510, 1, '2019-01-05', 328, 1, 2, '2019-01-05', '494/Sket/Puket-I/I/2019', 1, 3, ''),
(511, 1, '2019-01-05', 365, 1, 2, '2019-01-05', '495/Sket/Puket-I/I/2019', 1, 3, ''),
(512, 3, '2019-01-05', 365, 1, 2, '2019-01-05', '496/Sket/Puket-I/I/2019', 175, 3, 'sistem informasi rawat jalan dan rawat inap pada rumah detensi imigrasi'),
(513, 3, '2019-01-07', 366, 1, 2, '2019-01-07', '497/Sket/Puket-I/I/2019', 176, 3, 'aplikasi pengolahan dana bos bagi siswa kurang mampu berbasis web pada sdn 010 kecamatan tanjungpinang timur kota tanjungpinang'),
(514, 3, '2019-01-08', 367, 1, 2, '2019-01-08', '498/Sket/Puket-I/I/2019', 176, 3, 'aplikasi pengolahan rapor siswa sd negeri 010 tanjungpinang timur kecamatan tanjungpinang timur'),
(515, 3, '2019-01-10', 368, 1, 2, '2019-01-10', '499/Sket/Puket-I/I/2019', 177, 3, 'sistem informasi pengolahan data paud kasih bunda berbasis web'),
(516, 1, '2019-01-11', 203, 1, 2, '2019-01-11', '500/Sket/Puket-I/I/2019', 1, 3, ''),
(517, 3, '2019-01-11', 369, 1, 2, '2019-01-11', '501/Sket/Puket-I/I/2019', 178, 3, 'sistem informasi pengolahan data penjualan barang menggunakan metode fifo toko jahit dua tanjungpinang'),
(518, 1, '2019-01-11', 263, 1, 2, '2019-01-11', '502/Sket/Puket-I/I/2019', 1, 3, ''),
(519, 1, '2019-01-12', 370, 1, 2, '2019-01-12', '503/Sket/Puket-I/I/2019', 1, 3, ''),
(520, 3, '2019-01-14', 192, 1, 2, '2019-01-14', '504/Sket/Puket-I/I/2019', 179, 3, 'aplikasi pengolahan data pendaftaran pada taman kanak - kanak negeri pembina 1 ditanjungpinang'),
(521, 1, '2019-01-19', 372, 5, 2, '2019-01-19', '505/Sket/Puket-I/I/2019', 1, 3, ''),
(522, 1, '2019-01-21', 375, 5, 2, '2019-01-21', '506/Sket/Puket-I/I/2019', 1, 3, ''),
(523, 1, '2019-01-21', 374, 1, 2, '2019-01-21', '506/Sket/Puket-I/I/2019', 1, 3, ''),
(524, 1, '2019-01-21', 373, 1, 2, '2019-01-21', '506/Sket/Puket-I/I/2019', 1, 3, ''),
(525, 3, '2019-01-21', 192, 1, 2, '2019-01-21', '507/Sket/Puket-I/I/2019', 180, 3, 'aplikasi pengolahan data penerimaan siswa baru di sdn 006'),
(526, 1, '2019-01-21', 376, 5, 2, '2019-01-21', '508/Sket/Puket-I/I/2019', 1, 3, ''),
(527, 1, '2019-01-22', 196, 1, 2, '2019-01-22', '509/Sket/Puket-I/I/2019', 1, 3, ''),
(528, 1, '2019-01-25', 378, 1, 2, '2019-01-25', '510/Sket/Puket-I/I/2019', 1, 3, ''),
(529, 1, '2019-01-25', 377, 2, 2, '2019-01-25', '510/Sket/Puket-I/I/2019', 1, 3, ''),
(530, 1, '2019-01-25', 379, 1, 2, '2019-01-25', '510/Sket/Puket-I/I/2019', 1, 3, ''),
(531, 1, '2019-01-25', 380, 1, 2, '2019-01-25', '511/Sket/Puket-I/I/2019', 1, 3, ''),
(532, 1, '2019-01-25', 51, 1, 2, '2019-01-25', '512/Sket/Puket-I/I/2019', 1, 3, ''),
(533, 2, '2019-01-25', 106, 1, 2, '2019-01-25', '513/Sket/Puket-I/I/2019', 181, 3, 'aplikasi penggajian service point tanjungpinang'),
(534, 1, '2019-01-28', 303, 1, 2, '2019-01-28', '514/Sket/Puket-I/I/2019', 170, 3, 'sistem aplikasi voting pemilihan raya mahasiswa sekolah tinggi teknologi indonesia tanjungpinang'),
(535, 1, '2019-01-28', 303, 1, 2, '2019-01-28', '514/Sket/Puket-I/I/2019', 170, 3, 'sistem aplikasi voting pemilihan raya mahasiswa sekolah tinggi teknologi indonesia tanjungpinang'),
(536, 2, '2019-01-28', 303, 1, 2, '2019-01-28', '514/Sket/Puket-I/I/2019', 170, 3, 'sistem aplikasi voting pemilihan raya mahasiswa sekolah tinggi teknologi indonesia tanjungpinang'),
(537, 1, '2019-01-28', 263, 6, 2, '2019-01-28', '515/Sket/Puket-I/I/2019', 1, 3, ''),
(538, 1, '2019-01-28', 263, 6, 2, '2019-01-28', '515/Sket/Puket-I/I/2019', 1, 3, ''),
(539, 3, '2019-01-29', 381, 1, 2, '2019-01-29', '516/Sket/Puket-I/I/2019', 182, 3, 'perancangan sistem informasi perpustakaan berbasis php menggunakan twitter bootstrap di sma negeri 2 tanjungpinang'),
(540, 1, '2019-02-04', 384, 1, 2, '2019-02-04', '517/Sket/Puket-I/II/2019', 184, 3, 'Rental Mobil Arijaya'),
(541, 2, '2019-02-04', 384, 1, 2, '2019-02-04', '517/Sket/Puket-I/II/2019', 184, 3, 'Sistem Informasi Penggajian Karyawan Rental Mobil Arijaya'),
(542, 2, '2019-02-04', 385, 1, 2, '2019-02-04', '518/Sket/Puket-I/II/2019', 184, 3, 'Sistem Informasi Penyewaan Mobil Arijaya'),
(543, 1, '2019-02-07', 386, 1, 2, '2019-02-07', '519/Sket/Puket-I/II/2019', 1, 3, ''),
(544, 1, '2019-02-07', 303, 1, 2, '2019-02-07', '520/Sket/Puket-I/II/2019', 1, 3, ''),
(545, 2, '2019-02-09', 387, 1, 2, '2019-02-09', '521/Sket/Puket-I/II/2019', 185, 3, 'sistem informasi pengolahan data berkah laundry'),
(546, 1, '2019-02-09', 195, 1, 2, '2019-02-09', '522/Sket/Puket-I/II/2019', 1, 3, ''),
(547, 1, '2019-02-12', 389, 1, 2, '2019-02-12', '523/Sket/Puket-I/II/2019', 1, 3, ''),
(548, 1, '2019-02-12', 388, 1, 2, '2019-02-12', '523/Sket/Puket-I/II/2019', 1, 3, ''),
(549, 2, '2019-02-12', 390, 1, 2, '2019-02-12', '524/Sket/Puket-I/II/2019', 186, 3, 'sistem informasi pemasaran dan penjualan di depot air minum isi ulang airnur kota tanjungpinang'),
(550, 3, '2019-02-13', 192, 1, 2, '2019-02-13', '525/Sket/Puket-I/II/2019', 180, 3, 'aplikasi pengolahan data pendaftaran siswa baru pada sdn 006 timur tanjungpinang'),
(551, 1, '2019-02-14', 391, 6, 2, '2019-02-14', '526/Sket/Puket-I/II/2019', 1, 3, ''),
(552, 1, '2019-02-27', 392, 1, 2, '2019-02-27', '527/Sket/Puket-I/II/2019', 187, 3, 'Sistem Informasi Pengolahan Data The Big Boss Laundry'),
(553, 2, '2019-02-27', 392, 1, 2, '2019-02-27', '527/Sket/Puket-I/II/2019', 187, 3, 'Sistem Informasi Pengolahan Data The Big Boss Laundry'),
(554, 1, '2019-03-01', 393, 1, 2, '2019-03-01', '528/Sket/Puket-I/III/2019', 1, 3, ''),
(555, 1, '2019-03-02', 394, 2, 2, '2019-03-02', '529/Sket/Puket-I/III/2019', 1, 3, ''),
(556, 1, '2019-03-08', 395, 6, 2, '2019-03-08', '530/Sket/Puket-I/III/2019', 1, 8, ''),
(557, 1, '2019-03-13', 396, 1, 2, '2019-03-13', '531/Sket/Puket-I/III/2019', 188, 8, 'Sistem Informasi Kenaikan Gaji Berkala ASN Pemerintah Provinsi Kepulauan Riau'),
(558, 3, '2019-03-13', 396, 1, 2, '2019-03-13', '532/Sket/Puket-I/III/2019', 188, 8, 'Sistem Informasi Kenaikan Gaji Berkala ASN Pemerintah Provinsi Kepulauan Riau'),
(559, 1, '2019-03-13', 396, 1, 2, '2019-03-13', '533/Sket/Puket-I/III/2019', 188, 8, 'Sistem Informasi Kenaikan Gaji Berkala ASN Pemerintah Provinsi Kepulauan Riau'),
(560, 1, '2019-03-13', 397, 2, 2, '2019-03-13', '534/Sket/Puket-I/III/2019', 1, 8, ''),
(561, 2, '2019-03-13', 398, 1, 2, '2019-03-13', '535/Sket/Puket-I/III/2019', 189, 8, 'sistem informasi pengarsipan surat masuk dan surat keluar berbasis web pada badan pengusahaan kawasan kota tanjungpinang');

-- --------------------------------------------------------

--
-- Table structure for table `thajaran`
--

CREATE TABLE `thajaran` (
  `idThajaran` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `semester` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thajaran`
--

INSERT INTO `thajaran` (`idThajaran`, `tahun`, `status`, `semester`) VALUES
(3, '2018/2019', 0, 'Ganjil'),
(4, '2017/2018', 0, 'Ganjil'),
(6, '2017/2018', 0, 'Genap'),
(7, '2017/2018', 0, 'Ganjil'),
(8, '2018/2019', 1, 'Pendek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenissurat`
--
ALTER TABLE `jenissurat`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `keperluan`
--
ALTER TABLE `keperluan`
  ADD PRIMARY KEY (`idKeperluan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`idMahasiswa`),
  ADD KEY `idProdi` (`idProdi`),
  ADD KEY `idProdi_2` (`idProdi`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idPerusahaan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idProdi`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`idSurat`),
  ADD KEY `idKeperluan` (`idKeperluan`),
  ADD KEY `idMahasiswa` (`idMahasiswa`),
  ADD KEY `idJenis` (`idJenis`),
  ADD KEY `idKategori` (`idKategori`),
  ADD KEY `tujuan` (`tujuan`),
  ADD KEY `idThajaran` (`idThajaran`);

--
-- Indexes for table `thajaran`
--
ALTER TABLE `thajaran`
  ADD PRIMARY KEY (`idThajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenissurat`
--
ALTER TABLE `jenissurat`
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `keperluan`
--
ALTER TABLE `keperluan`
  MODIFY `idKeperluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `idMahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idPerusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `idProdi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `idSurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562;
--
-- AUTO_INCREMENT for table `thajaran`
--
ALTER TABLE `thajaran`
  MODIFY `idThajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`idJenis`) REFERENCES `jenissurat` (`idJenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`idKeperluan`) REFERENCES `keperluan` (`idKeperluan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_3` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_4` FOREIGN KEY (`idMahasiswa`) REFERENCES `mahasiswa` (`idMahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_5` FOREIGN KEY (`tujuan`) REFERENCES `perusahaan` (`idPerusahaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_6` FOREIGN KEY (`idThajaran`) REFERENCES `thajaran` (`idThajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
