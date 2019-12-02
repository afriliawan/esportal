-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 05:26 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afr-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagan_pubg`
--

CREATE TABLE `bagan_pubg` (
  `idTurnamen` int(11) NOT NULL,
  `namaTurnamen` varchar(50) NOT NULL,
  `namaPanitia` varchar(50) NOT NULL,
  `idGame` int(1) NOT NULL,
  `idbaganPUBG` int(11) NOT NULL,
  `namaTim` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagan_pubg`
--

INSERT INTO `bagan_pubg` (`idTurnamen`, `namaTurnamen`, `namaPanitia`, `idGame`, `idbaganPUBG`, `namaTim`, `is_active`) VALUES
(182, 'PUBG TEGAL GO', 'PANITIA B', 1, 47, 'army', 1),
(182, 'PUBG TEGAL GO', 'PANITIA B', 1, 49, 'AcademySaga', 1),
(182, 'PUBG TEGAL GO', 'PANITIA B', 1, 50, 'cecansquad', 1),
(182, 'PUBG TEGAL GO', 'PANITIA B', 1, 51, 'BintangTerang', 1),
(182, 'PUBG TEGAL GO', 'PANITIA B', 1, 52, 'AugmentedArrows', 1);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_pendaftaran`
--

CREATE TABLE `biaya_pendaftaran` (
  `idBiaya` int(11) NOT NULL,
  `biayaPendaftaran` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_pendaftaran`
--

INSERT INTO `biaya_pendaftaran` (`idBiaya`, `biayaPendaftaran`) VALUES
(1, 10000),
(2, 20000),
(3, 30000),
(4, 40000),
(5, 50000),
(47, 15000),
(48, 100000),
(50, 55000),
(51, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `idGame` int(11) NOT NULL,
  `namaGame` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`idGame`, `namaGame`) VALUES
(1, 'PUBG'),
(2, 'Mobile Legend');

-- --------------------------------------------------------

--
-- Table structure for table `gathering`
--

CREATE TABLE `gathering` (
  `id` int(11) NOT NULL,
  `fotoGath` varchar(50) NOT NULL,
  `namaGath` varchar(50) NOT NULL,
  `deskGath` text,
  `biaya` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `tempatGath` varchar(50) NOT NULL,
  `tglGath` date NOT NULL,
  `tglPosting` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gathering`
--

INSERT INTO `gathering` (`id`, `fotoGath`, `namaGath`, `deskGath`, `biaya`, `idUser`, `tempatGath`, `tglGath`, `tglPosting`, `is_active`) VALUES
(5, 'uqqs02gwp0kxsh6hutnd.png', 'MCL Gather 2019', 'Gathering Mobile Legens regional Tegal yang biasa diadakan 1 tiap tahun.', 20000, 55, 'Alun2 Kota Tegal', '2019-07-24', '2019-07-14', 1),
(6, 'i3kswukjaz1ki61xdggc.png', 'Sembah Fortnite Community Gather', 'Kuy Ramaikan Acara Gather Tahunan Komunitas Fortnite Tegal. \n\nGUESS STAR = Pewdiepie', 25000, 51, 'Rumah Gaming, Tegal', '2019-07-20', '2019-07-14', 1),
(7, 'f4t6mz7b7dj5qrw9knnj.png', 'ff gather tegal', 'Ff gqther', 10000, 53, 'Tegal wkwk', '2019-07-30', '2019-07-17', 1),
(11, '3fwzhy3f428r0rheu346.png', 'Orot Clan', 'jvdekchslxb', 2147483647, 49, 'Tokyo', '2022-12-31', '2019-07-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gathering_regis`
--

CREATE TABLE `gathering_regis` (
  `id` int(11) NOT NULL,
  `idGath` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tglSimpan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gathering_regis`
--

INSERT INTO `gathering_regis` (`id`, `idGath`, `idUser`, `is_active`, `tglSimpan`) VALUES
(6, 5, 55, 1, '2019-07-14'),
(7, 5, 51, 1, '2019-07-14'),
(8, 7, 53, 1, '2019-07-17'),
(9, 12, 49, 1, '2019-07-24'),
(10, 14, 49, 1, '2019-07-24'),
(11, 15, 49, 1, '2019-07-24'),
(12, 11, 39, 1, '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `reward_history`
--

CREATE TABLE `reward_history` (
  `idPoint` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reward` int(11) NOT NULL,
  `tanggalUpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward_history`
--

INSERT INTO `reward_history` (`idPoint`, `id`, `name`, `reward`, `tanggalUpdate`) VALUES
(51, 35, 'Yuki', 5000, '2019-07-12'),
(52, 50, 'AlHamidsy', 5000, '2019-07-14'),
(53, 51, 'Nillexya', 3000, '0000-00-00'),
(54, 50, 'AlHamidsy', 2000, '0000-00-00'),
(55, 51, 'Nillexya', 5000, '2019-07-14'),
(56, 52, 'Shyryn', 5000, '2019-07-14'),
(57, 52, 'Shyryn', 5000, '2019-07-14'),
(58, 51, 'Nillexya', 3000, '0000-00-00'),
(59, 52, 'Shyryn', 3000, '0000-00-00'),
(60, 50, 'AlHamidsy', 2000, '0000-00-00'),
(61, 53, 'SangkurianG', 3000, '0000-00-00'),
(62, 54, 'Sains', 5000, '2019-07-15'),
(63, 55, 'MAJINOR', 2000, '0000-00-00'),
(64, 52, 'Shyryn', 5000, '2019-07-15'),
(65, 56, 'AYI', 5000, '2019-07-15'),
(66, 56, 'AYI', 2000, '0000-00-00'),
(67, 52, 'Shyryn', 5000, '2019-07-17'),
(68, 53, 'SangkurianG', 5000, '2019-07-17'),
(69, 36, 'Yuko', 5000, '2019-07-22'),
(70, 36, 'Yuko', 5000, '2019-07-22'),
(71, 41, 'cobb', 5000, '2019-07-24'),
(72, 45, 'sekareu', 5000, '2019-07-24'),
(73, 59, 'cavendish', 5000, '2019-07-24'),
(74, 44, 'reqruit22', 5000, '2019-07-24'),
(75, 43, 'samsunggo', 5000, '2019-07-24'),
(76, 42, 'applegogo', 5000, '2019-07-24'),
(77, 40, 'mobilego', 5000, '2019-07-24'),
(78, 49, 'smagawi1', 5000, '2019-07-24'),
(79, 50, 'smagawi2', 5000, '2019-07-24'),
(80, 51, 'smagawi3', 5000, '2019-07-24'),
(81, 52, 'smagawi4', 5000, '2019-07-24'),
(82, 53, 'smagawi5', 5000, '2019-07-24'),
(83, 54, 'smaga6', 5000, '2019-07-24'),
(84, 55, 'smaga7', 5000, '2019-07-24'),
(85, 49, 'smagawi1', 3000, '0000-00-00'),
(86, 35, 'Yuki', 5000, '2019-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

CREATE TABLE `tb_tempat` (
  `idTempat` int(2) NOT NULL,
  `namaTempat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`idTempat`, `namaTempat`) VALUES
(1, 'Budi Net Tegal'),
(2, 'Rita Mall'),
(3, 'Pasific Mall'),
(4, 'Poltek Harber Tegal'),
(5, 'WKWK Cafe'),
(6, 'Transmart Tegal'),
(7, 'Telkomsel Tegal'),
(9, 'Mall Tegal'),
(10, 'Poltek'),
(11, 'Di Slawi Gan'),
(12, 'Dekat Indomart Slawi');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `idTurnamen` int(11) NOT NULL,
  `namaTurnamen` varchar(50) NOT NULL,
  `fotoTurnamen` varchar(50) NOT NULL,
  `deskTurnamen` text NOT NULL,
  `idGame` int(11) NOT NULL,
  `jenisTurnamen` varchar(50) NOT NULL,
  `namaPanitia` varchar(50) NOT NULL,
  `slotMax` int(11) NOT NULL,
  `slotTerisi` int(11) NOT NULL,
  `biayaPendaftaran` int(11) NOT NULL,
  `totalHadiah` int(11) NOT NULL,
  `batasPendaftaran` date NOT NULL,
  `tanggalTM` date NOT NULL,
  `tanggalTurnamen` date NOT NULL,
  `tempatTurnamen` varchar(50) NOT NULL,
  `tanggalPosting` date NOT NULL,
  `noHP` char(12) NOT NULL,
  `fotoStruk` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(1) NOT NULL,
  `status_event` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`idTurnamen`, `namaTurnamen`, `fotoTurnamen`, `deskTurnamen`, `idGame`, `jenisTurnamen`, `namaPanitia`, `slotMax`, `slotTerisi`, `biayaPendaftaran`, `totalHadiah`, `batasPendaftaran`, `tanggalTM`, `tanggalTurnamen`, `tempatTurnamen`, `tanggalPosting`, `noHP`, `fotoStruk`, `is_active`, `role_id`, `status_event`) VALUES
(170, 'PUBG Summer 2019', 'PUBG119.jpg', 'Rules menyusul gan', 1, 'Online', 'Sains', 8, 2, 10000, 3000000, '2019-07-18', '2019-07-19', '2019-07-20', 'Pasific Mall Tegal', '2019-07-14', '081902991000', '', 1, 2, 2),
(171, 'MoLe Tour 2019', 'ML19.jpg', 'aas', 2, 'Online', 'Daffa M', 8, 1, 10000, 5000000, '2019-07-25', '2019-07-25', '2019-07-26', 'Tegal', '2019-07-14', '085788828881', '', 1, 3, 3),
(172, 'ML Free To Play Tournament', 'ML23.jpg', 'Rules menyusul.', 2, 'Online', 'Daffa M', 16, 1, 40000, 1000000, '2019-07-18', '2019-07-19', '2019-07-20', 'Rital Mall Tegal', '2019-07-14', '081900029948', '', 1, 3, 1),
(173, 'PUBG Going Stars', 'PUBG27.jpg', 'All Map', 1, 'Online', 'Sains', 50, 1, 40000, 3000000, '2019-07-18', '2019-07-19', '2019-07-20', 'Pasific Mall Tegal', '2019-07-14', '081988271662', '', 1, 2, 2),
(174, 'PUBG Lonely Day', 'PUBG318.jpg', 'For newbie', 2, 'Offline', 'PANITIA B', 16, 2, 30000, 1500000, '2019-07-25', '2019-07-26', '2019-07-27', 'Budi Net Tegal', '2019-07-14', '081992839192', 'buktitf.jpg', 1, 4, 1),
(175, 'Newbie of Moba 2019', 'ML516.jpg', 'Rules menyusul', 2, 'Offline', 'PANITIA B', 16, 1, 40000, 1500000, '2019-07-18', '2019-07-19', '2019-07-20', 'Kampus Poltek Tegal', '2019-07-14', '087782880100', 'buktitf2.jpg', 1, 4, 3),
(177, 'PUBG Zeemba Turnamen', 'PUBG319.jpg', 'Turnamen regional, silahkan bawa KTP untuk validasi sebelum pertandingan', 1, 'Offline', 'PANITIA A', 16, 2, 30000, 2500000, '2019-08-01', '2019-08-02', '2019-08-03', 'Pasific Mall Tegal', '2019-07-14', '081902009857', 'buktitf3.jpg', 1, 4, 2),
(178, 'ML School Day', 'ML110.jpg', 'Turnamen khusus pelajar', 2, 'Offline', 'PANITIA A', 16, 2, 40000, 1500000, '2019-07-25', '2019-07-26', '2019-07-27', 'Aula SMA Negeri 3 Slawi', '2019-07-14', '085870000416', 'buktitf4.jpg', 1, 4, 3),
(179, 'ML Swedanz', 'ML415.jpg', 'Double slot available', 2, 'Offline', 'Ridho Sugi', 8, 8, 30000, 3000000, '2019-07-25', '2019-07-26', '2019-07-27', 'Pasific Mall Tegal', '2019-07-14', '081900002958', '', 1, 3, 1),
(181, 'AAWWW', 'PUBG320.jpg', 'ASDAS', 1, 'Online', 'Sains', 25, 0, 10000, 2000000, '2019-07-19', '2019-07-19', '2019-07-19', 'Pasific Mall Tegal', '2019-07-16', '081902991000', '', 0, 2, 1),
(182, 'PUBG TEGAL GO', 'PUBG321.jpg', 'Turnamen ini dikhususkan untuk player Tegal', 1, 'Offline', 'PANITIA B', 16, 16, 30000, 3000000, '2019-07-18', '2019-07-19', '2019-07-19', 'Kudaile, Slawi', '2019-07-17', '085788828881', 'buktitf5.jpg', 1, 4, 2),
(183, 'Molejen 2019', 'ML517.jpg', 'akdja', 2, 'Online', 'Daffa M', 16, 1, 30000, 500000, '2019-07-18', '2019-07-19', '2019-07-20', 'Kudaile, Slawi', '2019-07-17', '085788828881', '', 1, 3, 2),
(184, 'ML 2019 Pro Player', 'ML518.jpg', 'wdqwsq', 2, 'Online', 'Daffa M', 8, 1, 10000, 1500000, '2019-01-10', '2019-07-12', '2019-07-13', 'Tegal', '2019-07-17', '081900029948', 'buktitf1.jpg', 1, 3, 3),
(185, 'tes', 'smagawi_logo.jpg', 'jkj', 2, 'Online', 'Daffa M', 8, 0, 10000, 3000000, '2019-07-24', '2019-07-24', '2019-07-24', 'Pasific Mall Tegal', '2019-07-24', '081992839192', '', 0, 3, 1),
(186, 'PUBG Smagawi Part 1', 'smagawi_logo.jpg', 'Demo Apps', 1, 'Online', 'Sains', 25, 1, 30000, 2000000, '2019-07-26', '2019-07-26', '2019-07-27', 'Aula SMA Negeri 3 Slawi', '2019-07-24', '085870000416', '', 1, 2, 3),
(187, 'ML Smagawi Part 1', 'smagawi_logo1.jpg', 'Demo Apps', 2, 'Online', 'Daffa M', 16, 1, 40000, 3000000, '2019-07-25', '2019-07-26', '2019-07-27', 'Aula SMA Negeri 3 Slawi', '2019-07-24', '085870000416', '', 1, 3, 2),
(188, 'PUBG Smagawi Part 2', 'ML519.jpg', 'Demo Apps', 1, 'Online', 'Sains', 25, 1, 30000, 2000000, '2019-07-26', '2019-07-26', '2019-07-27', 'Aula SMA Negeri 3 Slawi', '2019-07-24', '085870000416', '', 1, 2, 2),
(189, 'ML Smagawi Part 2', 'smagawi_logo1.jpg', 'Demo Apps', 2, 'Online', 'Daffa M', 16, 1, 40000, 3000000, '2019-07-25', '2019-07-26', '2019-07-27', 'Aula SMA Negeri 3 Slawi', '2019-07-24', '085870000416', '', 1, 3, 2),
(190, 'ML Smagawi Part 3', 'smagawi_logo1.jpg', 'Demo Apps', 2, 'Online', 'Daffa M', 16, 1, 40000, 3000000, '2019-07-25', '2019-07-26', '2019-07-27', 'Aula SMA Negeri 3 Slawi', '2019-07-24', '085870000416', '', 1, 3, 2),
(191, 'PUBG Smagawi Part 3', 'smagawi_logo.jpg', 'Demo Apps', 1, 'Online', 'Sains', 25, 1, 30000, 2000000, '2019-07-26', '2019-07-26', '2019-07-27', 'Aula SMA Negeri 3 Slawi', '2019-07-24', '085870000416', '', 1, 2, 2),
(192, 'turney fruittea', 'PUBG322.jpg', 'menyusul', 1, 'Offline', 'muhammad zulfikar', 16, 1, 50000, 5000000, '2019-06-24', '2019-06-24', '2019-08-24', 'mall grage cirebon', '2019-07-24', '085747371346', 'PUBG11.jpg', 1, 4, 3),
(193, 'Test PUBG 1', 'PUBG323.jpg', 'Rules menyusul', 1, 'Online', 'Sains', 50, 1, 40000, 1000000, '2019-07-26', '2019-08-02', '2019-08-03', 'Rital Mall Tegal', '2019-07-25', '085788828881', '', 1, 2, 3),
(194, 'tet', 'ML25.jpg', 'test', 1, 'Offline', 'PANITIA Good', 8, 0, 10000, 500000, '2019-08-08', '2019-08-22', '2019-08-09', '3', '0000-00-00', '085870000416', '', 0, 4, 1),
(195, 'testt', 'ML111.jpg', 'test', 1, 'Offline', 'PANITIA Good', 8, 0, 10000, 500000, '2019-08-16', '2019-08-17', '2019-08-22', 'Budi Net Tegal', '0000-00-00', '081992839192', '', 0, 4, 1),
(196, 'awwew', 'ML520.jpg', 'tess', 2, 'Offline', 'PANITIA Good', 16, 0, 50000, 500000, '2019-08-09', '2019-08-17', '2019-08-23', 'Budi Net Tegal', '0000-00-00', '081992839192', '', 0, 4, 1),
(197, 'Testttttttt', 'DOTA_KUY.jpg', 'jdaksjd', 1, 'Offline', 'PANITIA Good', 8, 0, 10000, 1000000, '2019-08-15', '2019-08-23', '2019-08-16', 'Pasific Mall', '0000-00-00', '081900029948', '', 0, 4, 1),
(198, 'sdfijs', 'DOTA_KUY1.jpg', 'oifoifjfo', 1, 'Offline', 'PANITIA Good', 8, 0, 10000, 1000000, '2019-08-17', '2019-08-16', '2019-08-17', 'Budi Net Tegal', '0000-00-00', '081992839192', '', 0, 4, 1),
(199, 'ljlkdsgjdlskgjsd', '', 'lkjff', 1, 'Offline', 'PANITIA Good', 8, 0, 10000, 1000000, '2019-02-12', '2019-12-29', '2019-12-31', 'Budi Net Tegal', '0000-00-00', '081900002958', '', 0, 4, 1),
(200, 'PUBG Slawi', 'PUBG324.jpg', 'Rules menyusul', 1, 'Offline', 'akun baru gan', 16, 0, 40000, 2000000, '2019-08-16', '2019-08-23', '2019-08-24', 'Pasific Mall', '2019-08-11', '081902991000', '', 1, 4, 2),
(201, 'PUBG AWWE', 'PUBG325.jpg', 'ASDASD', 1, 'Offline', 'PANITIA Good', 16, 0, 30000, 1500000, '2019-08-22', '2019-08-15', '2019-08-23', 'Transmart Tegal', '2019-08-11', '085870000416', 'buktitf7.jpg', 1, 4, 1),
(202, 'PUBG DEMO APK', 'PUBG326.jpg', 'Rules menyusul', 1, 'Offline', 'Akhil Afril', 16, 0, 30000, 2000000, '2019-08-23', '2019-08-23', '2019-08-24', 'Poltek Harber Tegal', '2019-08-11', '081902991000', 'buktitf6.jpg', 1, 4, 3),
(203, 'PUBG Stand By Me', 'PUBG327.jpg', 'All region available to join', 1, 'Offline', 'Daffa M', 50, 2, 10000, 11123123, '2019-08-14', '2019-08-27', '2019-08-27', 'Budi Net Tegal', '2019-08-14', '081900002958', 'buktitf9.jpg', 1, 4, 2),
(204, 'TEST TEST', '', 'TEST', 1, 'Offline', 'Daffa M', 8, 0, 10000, 500000, '2019-08-23', '2019-08-29', '2019-08-31', 'Budi Net Tegal', '0000-00-00', '081992839192', '', 0, 4, 1),
(205, 'TEST A', '', 'TEST', 1, 'Offline', 'Daffa M', 8, 0, 10000, 2000000, '2019-08-14', '2019-08-15', '2019-08-16', 'Budi Net Tegal', '0000-00-00', '085870000416', '', 0, 4, 1),
(206, 'COBA A', '', 'KJDLK', 1, 'Offline', 'Daffa M', 8, 0, 10000, 11123123, '2019-08-21', '2019-08-15', '2019-08-16', 'Budi Net Tegal', '0000-00-00', '085870000416', '', 0, 4, 1),
(207, 'ML Day Event 1', 'ML523.jpg', 'Rules dapat berubah sewaktu-waktu', 2, 'Offline', 'Daffa M', 8, 4, 10000, 500000, '2019-08-14', '2019-08-27', '2019-08-31', 'Budi Net Tegal', '2019-08-30', '081992839192', 'buktitf41.jpg', 1, 4, 3),
(208, 'PUBG Back to school', 'smagawi_logo3.jpg', 'Only for student', 1, 'Offline', 'Daffa M', 50, 0, 10000, 1500000, '2019-08-23', '2019-08-27', '2019-08-16', 'Budi Net Tegal', '0000-00-00', '081900002958', 'buktitf42.jpg', 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_bagan`
--

CREATE TABLE `tournament_bagan` (
  `idBagan` int(11) NOT NULL,
  `idTurnamen` int(11) NOT NULL,
  `idGame` int(1) NOT NULL,
  `namaTurnamen` varchar(128) NOT NULL,
  `namaPanitia` varchar(128) NOT NULL,
  `team1` varchar(50) NOT NULL,
  `team2` varchar(50) NOT NULL,
  `team3` varchar(50) NOT NULL,
  `team4` varchar(50) NOT NULL,
  `team5` varchar(50) NOT NULL,
  `team6` varchar(50) NOT NULL,
  `team7` varchar(50) NOT NULL,
  `team8` varchar(50) NOT NULL,
  `team9` varchar(50) NOT NULL,
  `team10` varchar(50) NOT NULL,
  `team11` varchar(50) NOT NULL,
  `team12` varchar(50) NOT NULL,
  `team13` varchar(50) NOT NULL,
  `team14` varchar(50) NOT NULL,
  `team15` varchar(50) NOT NULL,
  `team16` varchar(50) NOT NULL,
  `team17` varchar(50) NOT NULL,
  `team18` varchar(50) NOT NULL,
  `team19` varchar(50) NOT NULL,
  `team20` varchar(50) NOT NULL,
  `team21` varchar(50) NOT NULL,
  `team22` varchar(50) NOT NULL,
  `team23` varchar(50) NOT NULL,
  `team24` varchar(50) NOT NULL,
  `team25` varchar(50) NOT NULL,
  `hasil1` varchar(50) NOT NULL,
  `hasil2` varchar(50) NOT NULL,
  `hasil3` varchar(50) NOT NULL,
  `hasil4` varchar(50) NOT NULL,
  `hasil5` varchar(50) NOT NULL,
  `hasil6` varchar(50) NOT NULL,
  `hasil7` varchar(50) NOT NULL,
  `hasil8` varchar(50) NOT NULL,
  `hasil9` varchar(50) NOT NULL,
  `hasil10` varchar(50) NOT NULL,
  `hasil11` varchar(50) NOT NULL,
  `hasil12` varchar(50) NOT NULL,
  `hasil13` varchar(50) NOT NULL,
  `hasil14` varchar(50) NOT NULL,
  `hasil15` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(1) NOT NULL,
  `status_event` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament_bagan`
--

INSERT INTO `tournament_bagan` (`idBagan`, `idTurnamen`, `idGame`, `namaTurnamen`, `namaPanitia`, `team1`, `team2`, `team3`, `team4`, `team5`, `team6`, `team7`, `team8`, `team9`, `team10`, `team11`, `team12`, `team13`, `team14`, `team15`, `team16`, `team17`, `team18`, `team19`, `team20`, `team21`, `team22`, `team23`, `team24`, `team25`, `hasil1`, `hasil2`, `hasil3`, `hasil4`, `hasil5`, `hasil6`, `hasil7`, `hasil8`, `hasil9`, `hasil10`, `hasil11`, `hasil12`, `hasil13`, `hasil14`, `hasil15`, `is_active`, `role_id`, `status_event`) VALUES
(1, 171, 2, 'MoLe Tour 2019', 'Daffa M', 'Team A', 'Team B', 'Team C', 'Team D', 'Team E', 'Team F', 'Team G', 'Team H', 'Team I', 'Team J', 'Team K', 'Team L', 'Team M', 'Team N', 'Team O', 'Team P', '', '', '', '', '', '', '', '', '', 'Team B', 'Team D', 'Team E', 'Team G', 'Team J', 'Team K', 'Team M', 'Team O', 'Team POLTEK', 'Team E', 'Team K', 'Team O', 'Team E', 'Team K', '', 1, 3, 2),
(2, 180, 1, 'PUBG Poltek 2019', 'PANITIA B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 4, 2),
(3, 182, 1, 'PUBG TEGAL GO', 'PANITIA B', 'Team A', 'Team B', 'Team C', 'Team D', 'Team E', 'Team F', 'Team G', 'Team H', 'Team I', 'Team J', 'Team K', 'Team L', 'Team M', 'Team N', 'Team O', 'Team P', 'Team Q', 'Team P', 'Team R', 'Team S', 'Team T', 'Team U', 'Team V', 'Team W', 'Team X', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4, 2),
(4, 183, 2, 'Molejen 2019', 'Daffa M', 'Team A', 'Team B', 'Team C', 'Team D', 'Team E', 'BYE', 'Team G', 'Team H', 'Team I', 'Team J', 'Team K', 'Team L', 'Team M', 'Team N', 'Team O', 'Team P', '', '', '', '', '', '', '', '', '', 'Team B', 'Team D', 'Team E', 'Team G', 'Team D', 'Team G', 'Team N', 'Team O', 'Team D', 'Team G', 'Team G', 'Team O', '', '', '', 1, 3, 2),
(5, 184, 2, 'sas', 'Daffa M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 3, 2),
(6, 175, 2, 'Newbie of Moba 2019', 'PANITIA B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4, 2),
(7, 187, 2, 'ML Smagawi Part 1', 'Daffa M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 3, 2),
(8, 189, 2, 'ML Smagawi Part 2', 'Daffa M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 3, 2),
(9, 190, 2, 'ML Smagawi Part 3', 'Daffa M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 3, 2),
(10, 186, 1, 'PUBG Smagawi Part 1', 'Sains', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 2, 2),
(11, 188, 1, 'PUBG Smagawi Part 2', 'Sains', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 2, 2),
(12, 191, 1, 'PUBG Smagawi Part 3', 'Sains', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 2, 2),
(13, 192, 1, 'turney fruittea', 'muhammad zulfikar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4, 2),
(14, 193, 1, 'Test PUBG 1', 'Sains', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 2, 2),
(15, 202, 1, 'PUBG DEMO APK', 'Akhil Afril', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4, 2),
(16, 170, 0, 'PUBG Summer 2019', 'Sains', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0),
(20, 170, 1, 'PUBG Summer 2019', 'Sains', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(21, 177, 1, 'PUBG Zeemba Turnamen', 'PANITIA A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(22, 200, 1, 'PUBG Slawi', 'akun baru gan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4, 2),
(23, 203, 1, 'NTAR DULU', 'Daffa M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4, 2),
(24, 207, 1, 'GO A', 'Daffa M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_regis`
--

CREATE TABLE `tournament_regis` (
  `idRegis` int(11) NOT NULL,
  `idTurnamen` int(11) NOT NULL,
  `idGame` int(11) NOT NULL,
  `namaTurnamen` varchar(50) NOT NULL,
  `namaPanitia` varchar(50) NOT NULL,
  `namaTim` varchar(50) NOT NULL,
  `usrKetua` varchar(50) NOT NULL,
  `noKetua` varchar(50) NOT NULL,
  `ignKetua` varchar(50) NOT NULL,
  `usrAng1` varchar(50) NOT NULL,
  `ignAng1` varchar(50) NOT NULL,
  `accAng1` int(1) NOT NULL,
  `usrAng2` varchar(50) NOT NULL,
  `ignAng2` varchar(50) NOT NULL,
  `accAng2` int(1) NOT NULL,
  `usrAng3` varchar(50) NOT NULL,
  `ignAng3` varchar(50) NOT NULL,
  `accAng3` int(1) NOT NULL,
  `usrAng4` varchar(50) NOT NULL,
  `ignAng4` varchar(50) NOT NULL,
  `accAng4` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `fotoStruk` varchar(50) NOT NULL,
  `role_id` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament_regis`
--

INSERT INTO `tournament_regis` (`idRegis`, `idTurnamen`, `idGame`, `namaTurnamen`, `namaPanitia`, `namaTim`, `usrKetua`, `noKetua`, `ignKetua`, `usrAng1`, `ignAng1`, `accAng1`, `usrAng2`, `ignAng2`, `accAng2`, `usrAng3`, `ignAng3`, `accAng3`, `usrAng4`, `ignAng4`, `accAng4`, `is_active`, `fotoStruk`, `role_id`, `date_created`) VALUES
(91, 179, 2, 'ML Swedanz', 'Ridho Sugi', 'Exploid', 'Afriliawan', '085870000416', 'Shyryn', 'akiravo', 'Voltrine', 0, 'rifaigae', 'Beezzt', 0, 'abayujelly', 'Shytsune', 0, 'agungswen', 'Shyzwen', 0, 1, 'kpiziw6zqcjz0p3031pm.png', 3, '2019-07-14'),
(92, 177, 1, 'PUBG Zeemba Turnamen', 'PANITIA A', 'XNuke', 'Afriliawan', '085870001111', 'XNIRyn407', 'adityaxo', 'XNICyclone407', 0, 'sendy200', 'XNIVelazuel407', 0, 'epriyanaaa', 'XNIDuxen407', 0, 'rizalsyafiz', 'XNIJoeysz407', 0, 1, '9787vph9zdukyy15r3za.png', 4, '2019-07-14'),
(93, 179, 2, 'ML Swedanz', 'Ridho Sugi', 'MyGood', 'daffa123', '085542369980', 'majinor24', 'grobakmiskin', 'Nillexya', 0, 'kanda001', 'PeeWasHere', 0, 'bungaku1', 'BungaEsL', 0, 'dimasbek', 'UnderLead', 0, 1, 'n8kw4anzrq9fbk4zzxid.png', 3, '2019-07-14'),
(94, 178, 2, 'ML School Day', 'PANITIA A', 'KalongGaming', 'daffa123', '085542369980', 'majinor', 'magisa', 'Magisachan', 0, 'graha', 'Grahambell', 0, 'billy', 'BillyGates', 0, 'firman29', 'firman29', 0, 1, '7nc7j04zfni2mssbcr0t.png', 4, '2019-07-14'),
(95, 177, 1, 'PUBG Zeemba Turnamen', 'PANITIA A', 'Nuke', 'daffa123', '085542369980', 'majinor', 'raihan11', 'BGMcode1', 0, 'mariam', 'BGMcode2', 0, 'sfxkentut', 'BGMcode3', 0, 'milly565', 'BGMcode4', 0, 1, '	 xuh4a6e3mcj1fndpc7ha.png', 4, '2019-07-14'),
(96, 175, 2, 'Newbie of Moba 2019', 'PANITIA B', 'DravoID', 'Afriliawan', '085870000416', 'Draforis', 'arfisyy', 'Delvoef', 0, 'yabiyuakbaaf', 'Agitur', 0, 'vieztaan', 'ikitanaGoro', 0, 'waliki', 'Velitizh', 0, 1, 'zwd9d6w959evhgqgi5bg.png', 4, '2019-07-14'),
(97, 175, 2, 'Newbie of Moba 2019', 'PANITIA B', 'HirayukiTeam', 'daffa123', '085542369980', 'majinor', 'guardian8', 'Scatz91', 0, 'samsung77', 'MyValen', 0, 'didi1111', 'DeadlY1', 0, 'sherllya', 'Sherllya', 0, 1, 'efx9qrh0zapqu6qdqw5g.png', 4, '2019-07-14'),
(98, 174, 1, 'PUBG Lonely Day', 'PANITIA B', 'Bismillah', 'daffa123', '085542369980', 'majinor', 'account2', 'JinxProKamil', 0, 'hirooo', 'belGY', 0, 'sankyu0019', 'TRYO', 0, 'samuh19', 'HunterMan', 0, 1, '9asjtbnrrrjkpe1my928.png', 4, '2019-07-14'),
(99, 173, 1, 'PUBG Going Stars', 'Sains', 'Hyugoro', 'Afriliawan', '085870000416', 'Sholbnner', 'asgard', 'BillZoo', 0, 'avinaff', 'Vinshara', 0, 'poligoynn', 'Drakzzone', 0, 'alfufass', 'yoPirnz', 0, 0, '5cjm26fj2ufgx12hiq4u.png', 2, '2019-07-14'),
(100, 173, 1, 'PUBG Going Stars', 'Sains', 'maryPoss', 'daffa123', '085542369980', 'majinor', 'riadimas', 'JJ7allBender', 0, 'doom227', 'DOOM5', 0, 'rifqi67', 'Gembel007', 0, 'cryble', 'Cribble001', 0, 0, '0cw8j6p8m3z80smnu23f.png', 2, '2019-07-14'),
(101, 172, 2, 'ML Free To Play Tournament', 'Daffa M', 'Lsciasa', 'Afriliawan', '085870000416', 'LaffyTaffy', 'bogrenzo', 'BASQveff', 0, 'allianado', 'Persiciana', 0, 'yudiruso', 'BoonShu', 0, 'verifep', 'Vederrica', 0, 1, 'f4mcvp1bsrvytc39s4bc.png', 3, '2019-07-14'),
(102, 172, 2, 'ML Free To Play Tournament', 'Daffa M', 'BillYOver', 'daffa123', '085542369980', 'majinor', 'american99', 'HereCapt', 0, 'asura8', 'ASURA', 0, 'diniyan', 'RoadRAACERS99', 0, 'shoutcast', 'MiLL', 0, 1, '99jeuz7dribtiemerc1b.png', 3, '2019-07-14'),
(103, 170, 1, 'PUBG Summer 2019', 'Sains', 'StopTalking', 'Afriliawan', '085870000416', 'Alkatsaru', 'mugellowe', 'Artmei', 0, 'flappytew', 'YumenoKyusaku', 0, 'aonafabb', 'Dahyuuuunjie', 0, 'artopalo', 'Klongzu', 0, 1, 'yakg4spuwsx3cam0ed62.png', 2, '2019-07-14'),
(104, 171, 2, 'MoLe Tour 2019', 'Daffa M', 'Gryfindor', 'daffa123', '085542369980', 'majinor', 'harry772', 'PottERrs', 0, 'granger1', 'Hermiony', 0, 'shiiets887', 'ToxED', 0, 'synxaaaa', 'RansXoid', 0, 1, 'xuh4a6e3mcj1fndpc7ha.png', 3, '2019-07-14'),
(105, 170, 1, 'PUBG Summer 2019', 'Sains', 'Roundz', 'daffa123', '085542369980', 'majinor', 'limas5', 'SigmaLord', 0, 'route55', 'Malaxy', 0, 'galaxyyw', 'SounderPylar00', 0, 'kaliiist1', 'Ragooons', 0, 1, 'czpe58zsh4195z71i265.png', 2, '2019-07-14'),
(106, 175, 2, 'Newbie of Moba 2019', 'PANITIA B', 'RaGUNaN', 'rangga123', '081224336699', 'Qutilinia', 'mariasan', 'BerryBlue', 0, 'sandychicka', 'SandyChicka', 0, 'ngapakaing', 'NgapakDewa', 0, 'keras99', 'HelloWorld', 0, 1, 'n8kw4anzrq9fbk4zzxid.png', 4, '2019-07-14'),
(107, 179, 2, 'ML Swedanz', 'Ridho Sugi', 'AcademySaga', 'Sainsfull', '085712346978', 'SaijouChu', 'antharozo', 'Tsukasa', 0, 'nineoktaa', 'SungjiWoo', 0, 'andisawe10', 'ShimazuWu', 0, 'kumikoo', 'Shylvein', 0, 2, 'v64wbsmzdq39k2aj5k0g.png', 3, '2019-07-14'),
(108, 170, 1, 'PUBG Summer 2019', 'Sains', 'PerangPisau', 'rangga123', '081224336699', 'Qutilinia', 'rounded81', '007seer', 0, 'werewolf2', 'RoAR2', 0, 'werewolf3', 'RoAR3', 0, 'syntax188', 'wrong@sound', 0, 1, '34nnje5jr2y37hzaurna.png', 2, '2019-07-14'),
(109, 177, 1, 'PUBG Zeemba Turnamen', 'PANITIA A', 'TeamHore', 'Sainsfull', '085712346978', 'Hayagi24', 'sayakajo', 'Artcit', 0, 'rachela', 'Rachquelleta', 0, 'fajarhabi', 'Samamaaki', 0, 'nazeer', 'Nazeerrava', 0, 1, 'u7q16s29xyyrj2zm3j3g.png', 4, '2019-07-14'),
(110, 175, 2, 'Newbie of Moba 2019', 'PANITIA B', 'RevokeEvo', 'Sainsfull', '085712346978', 'Volenska', 'anhaya', 'Raikira', 0, 'misaki29', 'Lexonite', 0, 'yudirush', 'Ruthmarish', 0, 'kyodsha', 'Ryokaya', 0, 1, 'dky8re4csxmvpundw0s3.png', 4, '2019-07-14'),
(111, 173, 1, 'PUBG Going Stars', 'Sains', 'NyicipTurney', 'rangga123', '081224336699', 'Qutilinia', 'nosex2019', 'ColaySquad', 0, 'harum88', 'SQDoragon', 0, 'nopal91', 'NyxAssassin', 0, 'reez', 'SssXXXssS', 0, 0, 't5himxw9xthmzs45i445.png', 2, '2019-07-14'),
(112, 170, 1, 'PUBG Summer 2019', 'Sains', 'TestTour', 'Sainsfull', '085712346978', 'Argahath', 'missha26', 'Qraved', 0, 'yokaydes', 'JVNKO', 0, 'pepsokrk', 'Kriizza', 0, 'daunces', 'Vanexo', 0, 1, 'ucppvccr8cbt97h7g8na.png', 2, '2019-07-14'),
(113, 173, 1, 'PUBG Going Stars', 'Sains', 'Exploid2019', 'Sainsfull', '085712346978', 'Shyryn', 'adhot277', 'StarsProWars', 0, 'kanebooos', 'LPProsenseiA', 0, 'agoong39', 'Shyzwen', 0, 'abajeljel', 'Shytsune', 0, 3, 'dky8re4csxmvpundw0s3.png', 2, '2019-07-14'),
(114, 171, 2, 'MoLe Tour 2019', 'Daffa M', 'ExploidGo', 'Sainsfull', '085712346978', 'Shyryn', 'helmokun', 'Keina', 0, 'Adhooooy', 'SPWGG', 0, 'agoeng27', 'Shyzwen', 0, 'bazzel', 'Shytsune', 0, 1, 'x22envsenp5sp335swy1.png', 3, '2019-07-14'),
(115, 173, 1, 'PUBG Going Stars', 'Sains', 'ShroudisMyLeader', 'grobakmiskin', '089554122367', 'Magis', 'raisa99', 'SpellCaster', 0, 'rian991', 'NagaMerah', 0, 'bima1111', 'siBIDANG', 0, 'pitung99', 'SarungKudaLiar', 0, 2, 'xuh4a6e3mcj1fndpc7ha.png', 2, '2019-07-14'),
(116, 172, 2, 'ML Free To Play Tournament', 'Daffa M', 'AugmentedArrows', 'grobakmiskin', '089554122367', 'Leadersz', 'songa77', 'Barbarian66', 0, 'nutella', 'YikesArc', 0, 'jijeni', 'Yolo22', 0, 'mandipasir99', 'Sangkuriang', 0, 0, '', 3, '2019-07-14'),
(117, 177, 1, 'PUBG Zeemba Turnamen', 'PANITIA A', 'WillKillU', 'ayi123', '086653113698', 'ayi', 'daffa123', 'majin', 0, 'mark', 'roast', 0, 'idks', 'kdnbs', 0, 'ndns', 'mznsa', 0, 1, 'xybni6i1019ivimjwm91.png', 4, '2019-07-15'),
(118, 174, 1, 'PUBG Lonely Day', 'PANITIA B', 'nsnbs', 'ayi123', '086653113698', 'nsbsvs', 'jsmsm', 'ishgs', 0, 'jsjsj', 'jskks', 0, 'jsbsv', 'jsmms', 0, 'jssbs', 'jsnsn', 0, 1, 'bkvqj0nq8sakneewdnc9.png', 4, '2019-07-15'),
(119, 170, 1, 'PUBG Summer 2019', 'Sains', 'nsbsb', 'ayi123', '086653113698', 'jssns', 'hsjks', 'jxmmx', 0, 'ndndnnd', 'nsmsm', 0, 'jsnmd', 'nsmms', 0, 'jsns', 'jnss', 0, 1, 'pz0x28e4rd413sg33kbz.png', 2, '2019-07-15'),
(120, 178, 2, 'ML School Day', 'PANITIA A', 'TeamGileee', 'ayi123', '086653113698', 'nmsms', 'daffa123', 'ndnd', 0, 'ksksm', 'kdkkd', 0, 'jnbd', 'jks', 0, 'kkks', 'iwjjn', 0, 1, 'hyuqycja55ss9bban2xv.png', 4, '2019-07-15'),
(121, 182, 1, 'PUBG TEGAL GO', 'PANITIA B', 'sample', 'rangga123', '081224336699', 'rudistar', 'grobakmiskin', 'vinoG', 0, 'muhtarelo24', 'astafaro', 0, 'daffa123', 'mugelloQ', 0, 'ayi123', 'Antaha', 0, 1, 'bfmt5w6w1tb76vnkhkab.png', 4, '2019-07-17'),
(122, 183, 2, 'Molejen 2019', 'Daffa M', 'teamWGu', 'rangga123', '081224336699', 'ndbdv', 'grobakmiskin', 'ksnsbb', 0, 'daffa123', 'uwow', 0, 'muhtarelo24', 'bsbdv', 0, 'ayi123', 'jb', 0, 1, '0equ2dbdre4zifm48jx1.png', 3, '2019-07-17'),
(123, 184, 2, 'sas', 'Daffa M', 'fagagss', 'rangga123', '081224336699', 'aaaa', 'daffa123', 'aaaa', 0, 'daffa123', 'a', 0, 'daffa123', 'tttt', 0, 'daffa123', 'aaaaaaaaa', 0, 1, 'fb8kdj84cxfugdyja403.png', 3, '2019-07-17'),
(124, 191, 1, 'PUBG Smagawi Part 3', 'Sains', 'army', 'smagawi1', '085544136699', 'kuyy', 'smagawi2', 'hayy', 0, 'smagawi3', 'hee', 0, 'smagawi4', 'okeoek', 0, 'smagawi5', 'yooo', 0, 1, 'vsjqsc48wrkx2mjd7mh6.png', 2, '2019-07-24'),
(125, 188, 1, 'PUBG Smagawi Part 2', 'Sains', 'req amir qeon', 'smagawi1', '085544136699', 'masepa', 'smagawi2', 'asphyxia', 0, 'smagawi3', 'RRQmoza', 0, 'smagawi4', 'BangPennn', 0, 'smagawi5', 'BANGALEX', 0, 1, 'wspvq6dddihct101dm0e.png', 2, '2019-07-24'),
(126, 187, 2, 'ML Smagawi Part 1', 'Daffa M', 'cecansquad', 'smagawi1', '085544136699', 'cecansquad', 'smagawi2', 'cecansquad', 0, 'smagawi3', 'cecansquad', 0, 'smagawi4', 'cecansquad', 0, 'smagawi5', 'cecansquad', 0, 1, '94s9qjkmycqhc30gfzgy.png', 3, '2019-07-24'),
(127, 190, 2, 'ML Smagawi Part 3', 'Daffa M', 'duabelas', 'smagawi1', '085544136699', 'pedeell', 'smagawi2', 'cantik', 0, 'smagawi3', 'jelek', 0, 'smagawi4', 'ganteng', 0, 'smagawi5', 'kamu', 0, 1, 'e0yddd01b9wg74nzadvu.png', 3, '2019-07-24'),
(128, 186, 1, 'PUBG Smagawi Part 1', 'Sains', 'ryoshin', 'smagawi1', '085544136699', 'sensei', 'smagawi2', 'sakti74', 0, 'smagawi3', 'ninaobob', 0, 'smagawi4', 'orot', 0, 'smagawi5', 'wongayu', 0, 1, 'jidehwrsd5abyztk3bbi.png', 2, '2019-07-24'),
(129, 189, 2, 'ML Smagawi Part 2', 'Daffa M', 'RRQ EVOS', 'smagawi1', '085544136699', 'Asphyxia', 'smagawi2', 'Kirito-Kun', 0, 'smagawi3', 'Massbbooyy', 0, 'smagawi4', 'BANGALEX', 0, 'smagawi5', 'JessNoLimit', 0, 1, '1rghbuq6rsphu121y95m.png', 3, '2019-07-24'),
(130, 192, 1, 'turney fruittea', 'muhammad zulfikar', 'Bocil', 'smagawi1', '085544136699', 'majinor', 'smagawi2', 'ang22', 0, 'smagawi3', 'ang33', 0, 'smagawi4', 'ang66', 0, 'smagawi5', 'ksjhb', 0, 1, '6syr1ypg9qbnentgesmt.png', 4, '2019-07-24'),
(131, 192, 1, 'turney fruittea', 'muhammad zulfikar', 'mary', 'smagawi1', '085544136699', 'nick', 'smagawi2', 'ksbbbh', 0, 'smagawi3', 'nsbdb', 0, 'smagawi4', 'bdhdv', 0, 'smagawi5', 'iuuygeghb', 0, 1, 'w5ptryp370m7pa1b62d1.png', 4, '2019-07-24'),
(132, 193, 1, 'Test PUBG 1', 'Sains', 'Morph', 'deniii123', '081668853223', 'Denni', 'grobakmiskin', 'MAJINOR', 0, 'smagawi3', 'billlY', 0, 'smagawi1', 'Margat', 0, 'smagawi2', 'mergrett', 0, 1, 'r4q4jeza8q1jvhb8ixrs.png', 2, '2019-07-28'),
(133, 194, 1, 'Transmart PUBGM Tournament', 'PANITIA Good', 'BintangTerang', 'smagawi1', '085544136699', 'selole', 'grobakmiskin', 'alaaddin', 0, 'akhil123', 'shyryn', 0, 'smagawi2', 'kdnsbsb', 0, 'smagawi3', 'blade', 0, 1, 'gxd4tujrs5pgiexf1ziu.png', 4, '2019-07-31'),
(134, 177, 1, 'PUBG Zeemba Turnamen', 'PANITIA A', 'bvgc', 'smagawi1', '085544136699', 'bvgf', 'smagawi2', 'bnvhndd', 1, 'smagawi3', 'vnf', 1, 'smagawi4', 'vffghnnmm', 1, 'smagawi5', 'vcffdd', 1, 2, '7fgqcywjcvzenyg6puiu.png', 4, '2019-08-01'),
(135, 187, 2, 'ML Smagawi Part 1', 'Daffa M', 'lalala', 'grobakmiskin', '089541409890', 'jshdgdg', 'smagawi1', 'jsbsbbs', 0, 'smagawi2', 'hshshbs', 0, 'smagawi3', 'bsvdvdb', 0, 'smagawi4', 'bdbdb', 0, 0, '', 3, '2019-08-10'),
(136, 187, 2, 'ML Smagawi Part 1', 'Daffa M', 'nsnzb', 'grobakmiskin', '089541409890', 'bsjdndnx', 'smagawi2', 'nsbsb', 0, 'smagawi1', 'bdbdb', 0, 'smagawi4', 'bdbsnsn', 0, 'smagawi3', 'ndnxn', 0, 0, '', 3, '2019-08-10'),
(137, 187, 2, 'ML Smagawi Part 1', 'Daffa M', 'hundnsn', 'grobakmiskin', '089541409890', 'hsbsb', 'smagawi1', 'nsbsbbs', 0, 'smagawi2', 'jxbdsn', 0, 'smagawi3', 'jssbnsms', 0, 'smagawi4', 'ndndn', 0, 0, '', 3, '2019-08-10'),
(138, 187, 2, 'ML Smagawi Part 1', 'Daffa M', 'ndjdhd', 'grobakmiskin', '089541409890', 'ndndbd', 'smagawi1', 'nsnsbsv', 0, 'smagawi2', 'nsbsbs', 1, 'smagawi3', 'jsnbs', 0, 'smagawi4', 'nxnxbx', 0, 0, '', 3, '2019-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_result`
--

CREATE TABLE `tournament_result` (
  `idPemenang` int(11) NOT NULL,
  `idTurnamen` int(11) NOT NULL,
  `idGame` int(1) NOT NULL,
  `namaTurnamen` varchar(50) NOT NULL,
  `namaPanitia` varchar(50) NOT NULL,
  `juaraPertama` varchar(50) NOT NULL,
  `juaraKedua` varchar(50) NOT NULL,
  `juaraKetiga` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(1) NOT NULL,
  `status_event` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament_result`
--

INSERT INTO `tournament_result` (`idPemenang`, `idTurnamen`, `idGame`, `namaTurnamen`, `namaPanitia`, `juaraPertama`, `juaraKedua`, `juaraKetiga`, `is_active`, `role_id`, `status_event`) VALUES
(1, 171, 2, 'MoLe Tour 2019', 'Daffa M', 'ExploidGo', 'Gryfindor', 'Test', 1, 3, 3),
(2, 178, 2, 'ML School Day', 'PANITIA A', 'TeamGileee', 'gremo', 'sukai', 1, 4, 3),
(3, 180, 1, 'PUBG Poltek 2019', 'PANITIA B', 'rustofa', 'ayugoro', 'squindalz', 1, 4, 3),
(4, 182, 1, 'PUBG TEGAL GO', 'PANITIA B', 'sample', 'viezyh', 'yordinah', 1, 4, 3),
(5, 184, 2, 'sas', 'Daffa M', '', '', '', 1, 3, 3),
(6, 175, 2, 'Newbie of Moba 2019', 'PANITIA B', '', '', '', 0, 4, 3),
(7, 186, 1, 'PUBG Smagawi Part 1', 'Sains', 'ryoshin', 'req amir qeon', 'army', 1, 2, 3),
(8, 192, 1, 'turney fruittea', 'muhammad zulfikar', 'ryoshin', 'req amir qeon', 'army', 0, 4, 3),
(9, 193, 1, 'Test PUBG 1', 'Sains', '', '', '', 1, 2, 3),
(10, 202, 1, 'PUBG DEMO APK', 'Akhil Afril', '', '', '', 1, 4, 3),
(11, 177, 1, 'PUBG Zeemba Turnamen', 'PANITIA A', '', '', '', 1, 4, 3),
(12, 207, 1, 'GO A', 'Daffa M', '', '', '', 1, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `userPoint` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nohp` varchar(14) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `userPoint`, `email`, `nohp`, `alamat`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, '', 'Afriliawan', 0, 'akhilafriliawan@gmail.com', '085870000416', 'Slawi', 'zazaza1.png', '$2y$10$horgKg4BYDOOMEAra.lI1OVk1Wyr6gFD4so/nXzTTJftahRUyVmxG', 1, 1, 20190425),
(15, '', 'Sains', 0, 'rusminmanata@gmail.com', '085712341234', 'Slawi', 'adminEsportal.png', '$2y$10$SWtYcUj33Ebe/57jpmH82eDODENDHiijb3qBNvbHDLcDeoWEBxd1u', 2, 1, 20190512),
(30, '', 'Daffa Muhtar', 0, 'penoyana00@gmail.com', '085711114444', 'Tegal', 'adminEsportal.png', '$2y$10$2OF8ac5Kvz5oPsOZgToCXuUhzOgga0iVP7fYmgJSoekANsKGf1zou', 3, 1, 20190518),
(32, '', 'Ali Yudi', 0, 'inzazigasi@gmail.com', '081902209281', 'Tegal', 'adminEsportal.png', '$2y$10$gWp7lyM/MKP7uimA.w3WwurFXyvVCHBfe01kYCrQmjajWxzGW35aK', 2, 1, 20190520),
(33, '', 'Ridho Sugi', 0, 'kariayamspes@gmail.com', '082291929995', 'Slawi', 'adminEsportal.png', '$2y$10$Hzmix2ChiDoiulzlmNhkFeyNSK258sXvEefldS/NFn1iIYCoVNREi', 3, 1, 20190520),
(34, '', 'PANITIA A', 0, 'picapiran3@gmail.com', '087718288188', 'Jl. Kudanil no 29 Margasari', 'default.jpg', '$2y$10$Qx/eOBZjVwos.Vk5bGmNE.J6SUSQ/Ohnqdwi/TTpnGSHXvxl1iFhK', 4, 1, 20190520),
(35, 'yuki123', 'Yuki', 15000, 'sarinahene@gmail.com', '081902000599', '', 'default.jpg', '$2y$10$t2KqhiYi/TnBZL0e89JrUO9y79nQrR7oq2w2qXRd0hiDWfrEREB5u', 5, 1, 20190520),
(36, 'yuko', 'Yuko', 12000, 'cekguyasmin@gmail.com', '087782881992', '', 'default.jpg', '$2y$10$t2KqhiYi/TnBZL0e89JrUO9y79nQrR7oq2w2qXRd0hiDWfrEREB5u', 5, 1, 20190520),
(37, 'yaris', 'Gewla', 7000, 'yarisyua@gmail.com', '081902992881', '', 'default.jpg', '$2y$10$t2KqhiYi/TnBZL0e89JrUO9y79nQrR7oq2w2qXRd0hiDWfrEREB5u', 5, 1, 20190520),
(38, '', 'Daffa M', 0, 'testlogin@gmail.com', '', '', 'smagawi_logo.jpg', '$2y$10$IvKIBCeLzIu4z722.8dFBOReeoFv6XfvUMc9qTuX1cEOF8ZKlHClK', 4, 1, 20190614),
(39, 'grobakmiskin', 'MAJINOR', 10000, 'daffa.muhtar@gmail.com', '0895414098903', '', '', '123', 5, 1, 20190614),
(40, 'akhil123', 'mobilego', 5000, 'akhil123@gmail.com', '80099', '', '', '123', 5, 1, 20190705),
(41, 'daffa123', 'websitego', 5000, 'daffakakdkndb@.gmail.com', '0888569855', '', '', 'ee79976c9380d5e337fc1c095ece8c8f22f91f306ceeb161fa51fecede2c4ba1', 5, 1, 0),
(42, 'Widia Nur Hayanti', 'applegogo', 5000, 'widianurhayanti8@gmail.com', '082324382957', '', '', '838655113d30249b1affe5eb78d2650c0891d4cccd847bb040b51c41c47e7c55', 5, 1, 0),
(43, 'putridwilestari541', 'samsunggo', 5000, 'putridwilestari541@gmail.com ', '089699737201', '', '', '7440b9339fad27909d12b710e516bac1f97a2bd2540b2487bd763617a84948cb', 5, 1, 0),
(44, 'coba111s', 'reqruit22', 5000, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(45, 'sekarragil', 'sekareu', 5000, 'sekarragilpangesti@gmail.com', '081477065301', '', '', '512f216a2b24bd4ae4707e9b949321aca16eec4738e4eb9aee3fb0a36f8111fd', 5, 1, 0),
(46, 'irnaini izna', 'irnaaaa', 0, 'eninuraeni0601@gmail.com', '082329189320', '', '', '00d88557e809d8f29c67e5a08ea277f10b1fb12eda8a67a321e61e1429bfb1be', 5, 1, 0),
(47, 'nananananana22', 'namamama', 0, 'santosofina22@gmail.com', '081329913541', '', '', 'c51dc7cd48955112dd87a14748d97ece9c304d28015ee358439e576abe05798b', 5, 1, 0),
(48, 'sekarragilp', 'sekareu', 0, 'sekarreuu@gmail.com', '081477065301', '', '', '512f216a2b24bd4ae4707e9b949321aca16eec4738e4eb9aee3fb0a36f8111fd', 5, 0, 0),
(49, 'smagawi1', 'smagawi1', 8000, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(50, 'smagawi2', 'smagawi2', 5000, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(51, 'smagawi3', 'smagawi3', 5000, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(52, 'smagawi4', 'smagawi4', 5000, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(53, 'smagawi5', 'smagawi5', 5000, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(54, 'smaga6', 'smaga6', 5000, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(55, 'smaga7', 'smaga7', 5000, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(56, 'smaga8', 'smaga8', 0, 'daffffa@gmail.com', '085544136699', '', '', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325', 5, 1, 0),
(57, 'aghnia nadhira', 'anyp', 0, 'aghnianyp@gmail.com', '085290304925', '', '', 'bdeb9368ce012d624336efbf01a6ffa8b1130b5f4d0ba12cab3a8a5d24b2dd43', 5, 0, 0),
(58, 'khaerunnisa', 'anissssdy', 0, 'khaerunnisadwiyanti2002@gmail.com', '082324052827', '', '', 'bb23013f56c5bbace81b23f5237b82be1460da9a404b6eac00ef6809c8f3f40a', 5, 0, 0),
(59, 'adelliacr', 'cavendish', 5000, 'cadelia605@gmail.com', '081476645590', '', '', 'b68823eded0bc9c7f3317d601ac24f6ac563895cee8e5a2bd2ca475906fe2615', 5, 0, 0),
(61, '', 'muhammad zulfikar', 0, 'mzulfikar021@gmail.com', '087728817281', 'jl. Pandjaitan no 10', 'default.jpg', '$2y$10$Qblobh6vABRzSmuS3n47D.6HEM8WGcM48YWhljwIjMaF7iFmygRni', 4, 0, 0),
(62, 'sampelakun', 'daffe', 0, 'kansjbcjdj@gmail.com', '089888855452', '', '', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 5, 0, 0),
(63, 'sampelakun3', 'daffe', 0, 'kansdjbcjdj@gmail.com', '089888855452', 'Jl. Lele no 28', '', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 5, 0, 0),
(64, '', 'Murtado', 0, 'murtadodev@gmail.com', '', '', 'default.jpg', '$2y$10$qhaPcCRyY6PKKx727OY4p.jt/w0MxXATpxEKQf6I1FnUPoW0in1tO', 4, 0, 0),
(66, '', 'saeful putra', 0, 'saeful123@gmail.com', '', '', 'default.jpg', '$2y$10$Y6Q4u01rLfy7OX0.XLG3G.yCZ89Czr/23K0fjTDFyXMOvmMIgwyZW', 3, 1, 0),
(67, '', 'aaaaaaa', 0, 'aadwwaw@daffa.com', '', '', 'default.jpg', '$2y$10$CwzNGXmnDSlUjV3zEOV44u8WIERmI7ye5NTEGGS9eZTRjA1aV.E1O', 4, 0, 0),
(68, '', 'afriliawan', 0, 'dawertyyy@yjtfjuyftyt.com', '', '', 'default.jpg', '$2y$10$wkcfPW63dn5Rl9PG6acrjuhM/s/pky8t3dMzNCIpnHNTnSbh6zbnm', 4, 0, 0),
(70, 'deniii123', 'DeniMar', 0, 'daffa.muhtar2@gmail.com', '081668853223', '', '', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', 5, 1, 0),
(71, 'lalapooow', 'Billie', 0, 'lalapooow@gmail.com', '088554663221', '', '', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', 5, 0, 0),
(73, '', 'avrilz', 0, 'avrilcool64@yahoo.co.id', '', '', 'default.jpg', '$2y$10$6Hqj/21JhFDwnknySX303uOL02ePQ1wfMbLj/VD/zQneYiviIrM9O', 4, 1, 0),
(76, '', 'huskart', 0, 'huskartust@yahoo.com', '', '', 'default.jpg', '$2y$10$RBwFJVtLimcZjY/zbQSVnuDcEDSI.yGEC72bFhbBFZid0BLbH0UHO', 4, 1, 0),
(79, '', 'Akhil Afril', 0, 'bagaromina@yahoo.com', '0858700001111', 'Slawi', 'smagawi_logo2.jpg', '$2y$10$LPGbJpYl1KEkfGr/53DzGO2n6FaumwiYDooDD54gGT6d2paHMuODS', 4, 1, 1565545632),
(80, '', 'admin baru', 0, 'adminbaru@gmail.com', '', '', 'default.jpg', '$2y$10$vg6U3sBvHRC.f0rjr0ow2O7OLaS8FrO8gEksEJ.95E4uwU0Ks.6dW', 2, 1, 1565547904);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(185, 1, 3),
(186, 2, 5),
(187, 2, 2),
(188, 3, 2),
(189, 3, 6),
(190, 4, 2),
(191, 4, 11),
(192, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(0, 'AfrilDEMO'),
(1, 'Superadmin'),
(2, 'User'),
(3, 'Menu'),
(5, 'AdminPUBG'),
(6, 'AdminML'),
(11, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Admin PUBG'),
(3, 'Admin ML'),
(4, 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(0, 2, 'Trayeman', 'user/trayeman', 'fas fa-wa fa-calendar-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-wa fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-wa fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-wa fa-folder', 1),
(8, 3, 'Submenu Management', 'menu/submenu', 'fas fa-wa fa-folder-open', 1),
(11, 1, 'Role', 'superadmin/role', 'fas fa-fw fa-user-tie', 1),
(13, 2, 'Change Password', 'user/changepassword', 'fas fa-wa fa-key', 1),
(20, 5, 'Event', 'adminPUBG/event', 'fas fa-wa fa-play', 1),
(22, 5, 'Data Tim', 'adminPUBG/teamdata', 'far fa-wa fa-address-book', 1),
(23, 5, 'Bagan Pertandingan', 'adminPUBG/schedule', 'fas fa-wa fa-calendar-alt', 1),
(24, 5, 'Hasil Pertandingan', 'adminPUBG/champion', 'fas fa-wa fa-trophy', 1),
(26, 6, 'Event', 'adminML/event', 'fas fa-wa fa-play', 1),
(28, 6, 'Data Tim', 'adminML/teamdata', 'far fa-wa fa-address-book', 1),
(29, 6, 'Bagan Pertandingan', 'adminML/schedule', 'fas fa-wa fa-calendar-alt', 1),
(30, 6, 'Hasil Pertandingan', 'adminML/champion', 'fas fa-wa fa-trophy', 1),
(34, 11, 'Team List', 'management/teamlist', 'far fa-wa fa-address-book', 1),
(35, 11, 'Bagan Pertandingan PUBG', 'management/schedulePUBG', 'fas fa-wa fa-calendar-alt', 1),
(36, 11, 'Bagan Pertandingan ML', 'management/scheduleML', 'fas fa-wa fa-calendar-alt', 1),
(37, 11, 'Hasil Pertandingan', 'management/champion', 'fas fa-wa fa-trophy', 1),
(41, 10, 'Bagan Pertandingan', 'pertandinganML/schedule', 'fas fa-wa fa-calendar-alt', 1),
(44, 11, 'My Event', 'management/myevent', 'fas fa-wa fa-play', 1),
(46, 5, 'Registrasi Masuk', 'adminPUBG/registrasimasuk', 'fas fa-wa fa-list-ul', 1),
(47, 5, 'Pembayaran Masuk', 'adminPUBG/pembayaranmasuk', 'fas fa-wa fa-money-check-alt', 1),
(48, 6, 'Registrasi Masuk', 'adminML/registrasimasuk', 'fas fa-wa fa-list-ul', 1),
(49, 6, 'Pembayaran Masuk', 'adminML/pembayaranmasuk', 'fas fa-wa fa-money-check-alt', 1),
(52, 1, 'Tournament Request', 'superadmin/reqtour', 'fas fa-wa far fa-paper-plane', 1),
(53, 1, 'Data Admin PUBG', 'superadmin/accadminPUBG', 'fas fa-wa fa-user-alt', 1),
(54, 1, 'Data Admin ML', 'superadmin/accadminML', 'fas fa-wa fa-user-alt', 1),
(55, 1, 'Data Panitia', 'superadmin/accpanitia', 'fas fa-wa fa-user-friends', 1),
(56, 1, 'Data Player', 'superadmin/accplayer', 'fas fa-wa fa-users', 1),
(57, 1, 'Ranking Point', 'superadmin/rankingpoint', 'fas fa-wa fa-chart-line', 1),
(58, 1, 'Event', 'superadmin/allEvent', 'fas fa-wa fa-play', 1),
(59, 1, 'Data Tim', 'superadmin/allTeamdata', 'far fa-wa fa-address-book', 1),
(60, 1, 'Hasil Pertandingan', 'superadmin/allChampion', 'fas fa-wa fa-trophy', 1),
(61, 1, 'Data Gathering', 'superadmin/allGathering', 'fas fa-wa fa-handshake', 1),
(62, 1, 'Biaya Pendaftaran', 'superadmin/biayaPendaftaran', 'fab fa-wa fa-amazon-pay', 1),
(63, 1, 'Lokasi Turnamen', 'superadmin/lokasiTurnamen', 'fas fa-wa fa-globe-asia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(16, 'akhilafriliawan@gmail.com', '4CNQ50AVunkMvSkY1H6Y89tBOQ2WdssITJbqfmx5QSE=', '2019-04-25'),
(17, 'penoyana00@gmail.com', '/O1yK2jVzlL5u6uv9MSQDSvISF7avV/DQKrtmFPPRiM=', '2019-05-18'),
(19, 'sarinahene@gmail.com', 'ewlMvspBP13+aEkpxCDWCWncS/fNclIhWGsiNKFnMjg=', '2019-05-20'),
(20, 'picapiran3@gmail.com', 'YWGQ45WWjSLjyHpVVwz7YgpYHNlxanm24Tor5nouVO8=', '2019-05-20'),
(21, 'sarinahene@gmail.com', '/BP4Vdx0hVniwI5vwu5pBAZnvF/CLzfLj9JFFtJpcnk=', '2019-05-20'),
(22, 'inzazigasi@gmail.com', '5/sO44caw2Vupu4zS2dU4c3OKaerAHoUuSHYj0JHo2Q=', '2019-05-20'),
(23, 'testtesaaa@gmail.com', 'Us5YNOJp5jp2/gvNnvS7k2KgWI2/pJsE2coXhk8YXNs=', '0000-00-00'),
(24, 'zakkipemalang@gmail.com', 'VBWGOtT5JOn/RSGqO4jcfv0UxKU7Vs8AIv9GcR65jwA=', '0000-00-00'),
(25, 'picapiran3@gmail.com', 'C28KfZDEEfvIh0fvo0MD80c2wqQe0EhulWl2t1FaVS0=', '0000-00-00'),
(26, 'penoyana00@gmail.com', 'HvMvBCzSBP7lJWIdX9kl6Uomw4J1Y9us3/riK4GdFyA=', '0000-00-00'),
(27, 'picapiran3@gmail.com', '4sydPuWbI3ZAF9VhhIZ4+cF+4M1wDUreJX1oce4E/VM=', '0000-00-00'),
(28, 'rusminmanata@gmail.com', 'bliwDoMsnR4Lpop6XWRCZzJeRuHhJJtJfJk+4VKc430=', '0000-00-00'),
(29, 'rusminmanata@gmail.com', 'lLtMwQPygmuBfQcRy10lEujEzPOvSEJhcLQ2avo6Hck=', '0000-00-00'),
(30, 'cobalagi@gmail.com', '2LMCbC2ck/LwG1oGCmNPCktp/MG4qjshmdwNjyMV8Ag=', '0000-00-00'),
(31, 'picapiran3@gmail.com', '2w2Mx5k6VLIErGPOW0bZTRnKAFKHdBCU3jbB8j+xAvA=', '0000-00-00'),
(32, 'mzulfikar021@gmail.com', '+fNnfAA25EQ7GMrlKNpxzRpTEShIIpbMHmhsVW9kLy4=', '0000-00-00'),
(33, 'mzulfikar021@gmail.com', 'gfmdGSHGoDeeHidcE40TSeLKYueq7APAeyk43k1qPhc=', '0000-00-00'),
(34, 'murtadodev@gmail.com', '39LcqwmUI3J/zSIPjB5HCrGgCxCqV6PorCkUhauTiNY=', '0000-00-00'),
(35, 'rusto200@gmail.com', 'iQS5kR8Kmhd3mcN1hJisW4JZERTQQnFTXC017Pj5rAk=', '0000-00-00'),
(36, 'saeful123@gmail.com', 'g1C2/SYiFGagqeBcRULnaVYXFaXauGm2ufgTEg6icaA=', '0000-00-00'),
(37, 'penoyana00@gmail.com', '2z4iXjZAe579r/SoZJV4VxXjxsiC2IQIqncpNnYdr64=', '0000-00-00'),
(38, 'aadwwaw@daffa.com', 'zDU0reI5pTCXhT0tqcrNp5PY8laba0CW1iYWBorDWFk=', '0000-00-00'),
(39, 'dawertyyy@yjtfjuyftyt.com', 'mOL8R2u+4NltFohUSsr6JesBXoyFPm+mv4c+xlHfPzk=', '0000-00-00'),
(40, 'dawsssertyyy@yjtfjuyftfffffyt.com', 'QUq78Fv2fBRqI2mkvtJv9OHgv9pxrWCZ5Cq80zhfJZE=', '0000-00-00'),
(41, 'testlogin@gmail.com', 'Kr4HuQua1jb01/PsqAmo3iZJT86JuZB66hm0oINui2U=', '0000-00-00'),
(42, 'huskartust@yahoo.com', 'SjV9f20myuHKHY6inN6ewhngV/7Hdm8WrsieX8wxmuc=', '0000-00-00'),
(43, 'huskartust@yahoo.com', 'IKWjvVZipQ0SzSd2wa8kjED/1KVddyGD5IL0HpPKMms=', '0000-00-00'),
(44, 'huskartust@yahoo.com', 'hcoyir0phNZXHmTq7akVwm4SXv3AW4hDM2YLwyAGl0Y=', '0000-00-00'),
(48, 'bagaromina@yahoo.com', 'yHZHExA3scWCkTkYqvrI8njICvMcnaByLjP6+lWBPhY=', '0000-00-00'),
(49, 'adminbaru@gmail.com', 'frnFbmjWdTws7KCOdZKgEBJYf8qhYIqEPjxIrH20Ngw=', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagan_pubg`
--
ALTER TABLE `bagan_pubg`
  ADD PRIMARY KEY (`idbaganPUBG`);

--
-- Indexes for table `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  ADD PRIMARY KEY (`idBiaya`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idGame`);

--
-- Indexes for table `gathering`
--
ALTER TABLE `gathering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gathering_regis`
--
ALTER TABLE `gathering_regis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_history`
--
ALTER TABLE `reward_history`
  ADD PRIMARY KEY (`idPoint`);

--
-- Indexes for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  ADD PRIMARY KEY (`idTempat`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`idTurnamen`);

--
-- Indexes for table `tournament_bagan`
--
ALTER TABLE `tournament_bagan`
  ADD PRIMARY KEY (`idBagan`);

--
-- Indexes for table `tournament_regis`
--
ALTER TABLE `tournament_regis`
  ADD PRIMARY KEY (`idRegis`),
  ADD KEY `idTurnamen` (`idTurnamen`);

--
-- Indexes for table `tournament_result`
--
ALTER TABLE `tournament_result`
  ADD PRIMARY KEY (`idPemenang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagan_pubg`
--
ALTER TABLE `bagan_pubg`
  MODIFY `idbaganPUBG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  MODIFY `idBiaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `idGame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gathering`
--
ALTER TABLE `gathering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gathering_regis`
--
ALTER TABLE `gathering_regis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reward_history`
--
ALTER TABLE `reward_history`
  MODIFY `idPoint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `idTempat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `idTurnamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `tournament_bagan`
--
ALTER TABLE `tournament_bagan`
  MODIFY `idBagan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tournament_regis`
--
ALTER TABLE `tournament_regis`
  MODIFY `idRegis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tournament_result`
--
ALTER TABLE `tournament_result`
  MODIFY `idPemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tournament_regis`
--
ALTER TABLE `tournament_regis`
  ADD CONSTRAINT `tournament_regis_ibfk_1` FOREIGN KEY (`idTurnamen`) REFERENCES `tournament` (`idTurnamen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
