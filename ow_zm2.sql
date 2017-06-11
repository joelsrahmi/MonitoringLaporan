-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2017 at 08:41 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ow_zm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT 'administrator',
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_session` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `no_telp`, `email`, `blokir`, `id_session`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'LPPM UIN', '085228482669', 'lppm@uinjkt.ac.id', 'N', '0mhkd8ubdlekgfmc3uv0vgjnu6');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(9) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username_login` varchar(100) NOT NULL,
  `password_login` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_lengkap`, `username_login`, `password_login`, `alamat`, `no_telp`, `email`) VALUES
(24, '67676767676734', 'Elsy Rahajeng', 'elsy', '68904c581c1c355200d8b6b20b896c60', 'Ciputat', '087637623', 'elsy.rahajeng@uinjkt.ac.id'),
(23, '1976091033391001', 'Djaka Badrayana', 'djakabdr', '9f6cc8b9203d7f58f50236575b35c067', 'Jalan Serua Indah No 29 ', '08129382930', 'djaka.badrayana@uinjkt.ac.id'),
(22, '11111111111', 'ssssssssss', '111', '698d51a19d8a121ce581499d7b701668', 'aaaaaaaaaaa', '1111111111', '111111111@mail.com'),
(19, '123123123123', 'Julisah', 'julisah', 'f9c24513cc0274eb21dd8e37c134e4a6', 'coba', '08561415614', 'sdhasdhg@uinjkt.ac.id'),
(20, '19710217998031000', 'M. Syarif Nasution, SH.I', 'syarif', '8daa2f003d41f1ea865c1503b3d99d3d', 'UIN Jakarta', '08123456789', 'lppm@uinjkt.ac.id'),
(21, '19710217998031002', 'Eva Nugraha, M.Ag', 'eva', '61a5b3cd01e7a18e2ed77033a7c0f088', 'UIN Jakarta', '0856123456789', 'lppm@uinjkt.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `iId` int(5) NOT NULL AUTO_INCREMENT,
  `iJudul` varchar(150) NOT NULL,
  `iIsi` text NOT NULL,
  `pengirim` int(11) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`iId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`iId`, `iJudul`, `iIsi`, `pengirim`, `tgl`) VALUES
(5, 'Informasi Jadwal Ujian', '<p>Ujian Seminar akan dilakukan pada tanggal 12 s/d 19 november 2014.</p>\r\n\r\n<p>Untuk info lebih jelas hubungi bagian akademik. Terima Kasih</p>\r\n', 1, '2014-07-07'),
(6, 'Info Baru', '<p>Isi Info Baru</p>\r\n', 3, '2014-08-06'),
(7, 'Login Mahasiswa', '<p>Disampaikan kepada perwakilan setiap kelompok KKN 2016 untuk menghubungi admin PPM untuk melakukan registrasi akun dengan kelengkapan persyaratan yang telah ditentukan. Terima Kasih</p>\n', 3, '2014-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `kkId` int(11) NOT NULL AUTO_INCREMENT,
  `kId` int(11) NOT NULL,
  `kkLevel` enum('2','3') DEFAULT NULL,
  `kkOleh` varchar(20) DEFAULT NULL,
  `kkPesan` text NOT NULL,
  `kkBaca` enum('0','1') NOT NULL DEFAULT '0',
  `kkWaktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kkId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`kkId`, `kId`, `kkLevel`, `kkOleh`, `kkPesan`, `kkBaca`, `kkWaktu`) VALUES
(3, 1, '2', '12', 'Perbaiki penulisan sesuaikan dengan panduan penulisan', '1', '2014-08-07 16:33:36'),
(4, 1, '3', '200911336', 'Terima kasih pak..\r\nakan saya perbaiki secepatnya..', '1', '2014-08-07 16:52:08'),
(5, 1, '3', '200911336', 'Apakah ada batasan tahun buku yang digunakan untuk referensi??', '1', '2014-08-07 16:54:05'),
(6, 2, '2', '12', 'Lengkapi BAB 3 dengan jadwal penelitian', '1', '2014-08-07 17:44:40'),
(7, 4, '2', '12', 'Silahkan antar lembar konsultasi dan berkas untuk di ACC', '1', '2014-08-07 17:45:26'),
(8, 5, '2', '12', 'perbaiki latar belakang', '1', '2014-09-17 16:02:06'),
(9, 5, '3', '200911336', 'ok', '1', '2014-09-17 16:02:43'),
(10, 1, '2', '12', 'paling lama lima tahun dari sekarang', '1', '2016-12-27 05:42:53'),
(11, 6, '2', '12', 'format belum benar', '0', '2017-01-08 03:01:17'),
(12, 15, '3', '201011165', 'ini saya lampirkan konsulnya', '1', '2017-01-11 17:23:17'),
(13, 15, '2', '20', 'formatnya masi belum benar, cek lagi panduan dengan benar', '1', '2017-01-11 19:04:48'),
(14, 17, '2', '20', 'ada beberapa yang masih salah formatnya, coba baca kembali panduan yang sudah diberikan. OK!', '1', '2017-01-12 02:25:18'),
(15, 17, '3', '201011169', 'baik pak, akan segera saya perbaiki, terima kasih pak:)', '1', '2017-01-12 02:26:18'),
(16, 17, '2', '20', 'OK! Saya tunggu', '0', '2017-01-12 02:28:34'),
(17, 19, '2', '20', 'lanjutkan bab 2', '1', '2017-01-12 03:24:06'),
(18, 20, '2', '20', 'covernya oke', '1', '2017-01-12 03:26:51'),
(19, 21, '2', '20', 'masih banyak format yang salah\r\nkamu lihat buku panduan atau tidak?!', '1', '2017-01-12 17:19:14'),
(20, 22, '2', '20', 'covernya bagus, itu kamu yang bikin?', '0', '2017-01-12 17:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE IF NOT EXISTS `konsultasi` (
  `kId` int(5) NOT NULL AUTO_INCREMENT,
  `pid` int(5) NOT NULL,
  `dosId` int(11) NOT NULL,
  `kBaca` enum('0','1') NOT NULL DEFAULT '0',
  `kKet` text NOT NULL,
  `kFile` varchar(255) NOT NULL,
  `kWaktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`kId`, `pid`, `dosId`, `kBaca`, `kKet`, `kFile`, `kWaktu`) VALUES
(1, 1, 12, '1', 'Konsultasi Pertama', '35Laravel - From Apprentice To Artisan.pdf', '2017-01-07 10:28:45'),
(2, 4, 12, '1', 'Konslutasi Pertama', '5manual moodle lengkap.doc', '2017-01-07 17:35:42'),
(4, 1, 12, '1', 'Konsultasi Kedua (Perbaikan penulisan)', '33making_forum.pdf', '2017-01-10 17:38:56'),
(5, 1, 12, '1', 'Bab I', '55MAKALAH DAPSON.docx', '2017-01-04 15:59:55'),
(6, 4, 12, '1', '', '80PROPOSAL PKL_YULIZA RAHMI_UIN JKT.docx', '2017-01-08 02:59:03'),
(7, 9, 14, '0', 'asdasd', '65PROPOSAL PKL_YULIZA RAHMI_UIN JKT.docx', '2017-01-08 12:24:24'),
(16, 7, 20, '0', 'Cover', '901 - Owl.jpg', '2017-01-11 21:22:56'),
(15, 1, 20, '1', 'tes', '2BAB I PROYEK MINOR.docx', '2017-01-11 17:11:26'),
(17, 10, 20, '1', 'pak, ini bab 1 kelompok kami', '3Tugas Meringkas Bab 7 SBI - Yuliza Rahmi - TIPS 4.docx', '2017-01-12 02:23:37'),
(18, 10, 20, '0', 'pak, ini bab 1 yang sudah saya perbaiki', '16kisi dan jawaban.doc', '2017-01-12 02:27:13'),
(19, 12, 20, '1', 'Bab 1', '84SOAL.docx', '2017-01-12 03:22:26'),
(20, 12, 20, '1', 'cover', '73Capture.PNG', '2017-01-12 03:25:28'),
(21, 15, 20, '1', 'Draft buku laporan (full)', '87DRAFT BUKU LAPORAN KKN LOKAL DAYA.docx', '2017-01-12 17:17:04'),
(22, 15, 20, '1', 'Cover ', '10cover.png', '2017-01-12 17:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `mid` int(15) NOT NULL AUTO_INCREMENT,
  `nkel` varchar(4) NOT NULL,
  `mNama` varchar(50) NOT NULL,
  `mTelp` varchar(15) NOT NULL,
  `mEmail` varchar(50) NOT NULL,
  `mDesaKota` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mfoto` varchar(100) NOT NULL,
  PRIMARY KEY (`mid`),
  UNIQUE KEY `nkel` (`nkel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201011174 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mid`, `nkel`, `mNama`, `mTelp`, `mEmail`, `mDesaKota`, `username`, `password`, `mfoto`) VALUES
(201011166, '123', '111', '1111', '11@gmail.com', '1111', 'asaaa', 'f530e3093a1617d64f400c5578005b7c', '745-Abstract-Simple-Patterns-with-PSD-Pat-File-thumb05.jpg'),
(201011173, '088', 'Jafsinsky', '08561415614', 'yuliza.rahmi14@mhs.uinjkt.ac.id', 'Teu Terang / Bogor', 'julisah', '39899b505b0e5a0a939802fb9ef8b3b3', '61icon3.png'),
(201011165, '100', 'tez', '121212121', 'asad@fsf.com', 'Pesanggrahan / Tangerang', 'tez', '3546f4f788b7dae54f896f9a03ce6231', '12logo uin jkt.png'),
(201011167, '145', 'asdasd', '111111', '111111111@mail.com', 'asdad', 'asdf', '912ec803b2ce49e4a541068d495ab570', '71congruent_pentagon.png'),
(201011168, '144', 'asd', 'asdasd', 'asd@gmail.bom', 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e', '965-Abstract-Simple-Patterns-with-PSD-Pat-File-thumb05.jpg'),
(201011169, '110', 'Bring Changes', '087699827182', 'bringchanges@gmail.com', 'Sukasari / Bogor', 'bc110', '0f715c9cee48d458272e8cd1418fd280', '811 - Owl.jpg'),
(201011170, '097', 'Al-Izza', '087347343', 'ija@gmail.com', 'Cidokom / Bogor', 'izza', '4b569f5568af7aea0bd5b56c8267d22c', '90minor.PNG'),
(201011171, '090', 'Dipta Jaya', '099739173', 'dip@jaya.com', 'Wirajaya / Bogor', 'dipta', '7edd8b2d1ef9731c8a5540b798d2eaa4', '23minor.PNG'),
(201011172, '132', 'Wiralodaya', '082913712134', 'wiralodaya132@gmail.com', 'Cidokom / Bogor', 'wiralodaya', '7725236ca49cbd1f121f10c9eb9205e5', '57Screenshot (76).png');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE IF NOT EXISTS `penugasan` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `nkel` varchar(4) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `id_dosen` int(11) DEFAULT NULL,
  `sTgl` date DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `komentar` varchar(300) DEFAULT NULL,
  `statJudul` enum('0','1','2') DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `penugasan`
--

INSERT INTO `penugasan` (`pid`, `nkel`, `status`, `id_dosen`, `sTgl`, `judul`, `komentar`, `statJudul`) VALUES
(1, '100', '2', 20, '2017-01-11', 'tes', 'lanjutkan dengan membuat cover dan isi buku sesuai panuan yg sudah tersedia', '2'),
(3, '128', '0', NULL, NULL, NULL, NULL, '0'),
(4, '128', '0', NULL, NULL, NULL, NULL, '0'),
(5, '128', '0', NULL, NULL, NULL, NULL, '0'),
(6, '128', '0', NULL, NULL, NULL, NULL, '0'),
(7, '123', '2', 20, '2017-01-12', 'tes', 'lanjutkan ', '2'),
(8, '145', '0', NULL, NULL, NULL, NULL, '0'),
(9, '144', '0', NULL, NULL, NULL, NULL, '0'),
(10, '110', '2', 20, '2017-01-12', 'Sukasari, Surga Debu yang Damai', 'judul yang diajukan sudah baik, lanjutkan bukunya yaa :)', '2'),
(11, '097', '2', 24, '2017-01-12', 'Embun Cidokom Tak Pernah Sama', 'lanjut', '2'),
(12, '090', '2', 20, '2017-01-12', 'Dipta Jaya Asik', 'lanjutkan laporannya ya', '2'),
(13, '132', '2', 23, '2017-01-12', 'Cidokom Indah Bersama Wiralodaya', NULL, '0'),
(14, '093', '0', NULL, NULL, NULL, NULL, '0'),
(15, '088', '2', 20, '2017-01-13', 'Jafsinsky di Bogor', 'lanjutkan', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
