-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2017 at 05:47 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berk2695_beritakehilangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `source_id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `user_id`, `source`, `source_id`) VALUES
(3, 62, 'facebook', '10203696636892420'),
(12, 75, 'facebook', '10209516369774601'),
(13, 78, 'facebook', '10154936148434092');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator', 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrator', 1, 'administrator can creat all', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE IF NOT EXISTS `beritas` (
  `berita_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `jenis_berita` enum('Kehilangan','Ditemukan') NOT NULL,
  `judul_berita` varchar(50) NOT NULL,
  `deskripsi_berita` text NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `hub_email` int(1) NOT NULL,
  `no_telp1` varchar(100) NOT NULL,
  `no_telp2` varchar(100) NOT NULL,
  `pin_bb` varchar(100) NOT NULL,
  `hub_wa` int(1) NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `regency_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `tampilkan_alamatlengkap` varchar(100) NOT NULL,
  `tampilkan_notelp1` varchar(1) NOT NULL,
  `tampilkan_notelp2` varchar(1) NOT NULL,
  `hub_pin_bb` varchar(1) NOT NULL,
  `status_ditemukan` char(1) NOT NULL,
  `tampil_nama` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`berita_id`, `user_id`, `category_id`, `jenis_berita`, `judul_berita`, `deskripsi_berita`, `tanggal_kejadian`, `email`, `hub_email`, `no_telp1`, `no_telp2`, `pin_bb`, `hub_wa`, `status`, `province_id`, `regency_id`, `district_id`, `village_id`, `alamat`, `created_at`, `updated_at`, `tampilkan_alamatlengkap`, `tampilkan_notelp1`, `tampilkan_notelp2`, `hub_pin_bb`, `status_ditemukan`, `tampil_nama`) VALUES
(14, 30, 4, 'Kehilangan', 'STNK  Atas nama ROSIK ', 'Telah hilang\r\nSebuah dompet berisi uang,ATM dan\r\nSIM \r\nAtas nama Bonari \r\nDukuh gabahan \r\nDesa kalisat Bungkal,\r\nSTNK \r\nAtas nama ROSIK \r\nDesa pandak \r\nBalong \r\nHilang perjalanan Alon alon ponorogo - Bungkal\r\nBagi siapapun yg menemukan dimohon menghubungi \r\n081233848700 Terimakasih', '2017-06-01', 'mirapandie@gmail.com', 1, '04113637195', '081135242616', '2a93eee0', 1, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18a', '2017-06-24 15:50:12', '2017-06-24 15:50:12', '1', '1', '1', '1', '', ''),
(15, 29, 4, 'Ditemukan', 'ROSIK  Desa pandak  Balong', 'Sebuah dompet berisi uang,ATM dan\r\nSIM \r\nAtas nama Bonari \r\nDukuh gabahan \r\nDesa kalisat Bungkal,\r\nSTNK \r\nAtas nama ROSIK \r\nDesa pandak \r\nBalong \r\nHilang perjalanan Alon alon ponorogo - Bungkal\r\nBagi siapapun yg menemukan dimohon menghubungi \r\n081233848700 Terimakasih', '2017-06-03', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-24 15:51:35', '2017-06-25 05:29:22', '1', '0', '0', '1', '3', ''),
(18, 40, 4, 'Kehilangan', 'Dimas Febrian Ramadhan', 'Telah hilang dompet berisi ktp a/n Dimas Febrian Ramadhan, atm, sim, npwp, bpjs, dan STNK a/n Cecep nopol F3269GV. Kemungkinan jatuh di jalan RE. Martadinata - Kebon kacang. Jika ditemukan Mohon hub 087777282844. Terima Kasih.', '2017-06-06', 'Ramadhan@gmail.com', 0, '', '087777282844', '', 0, 'Disable', 51, 5171, 0, 0, 'Kota Bali', '2017-06-24 21:21:17', '2017-06-24 21:21:17', '1', '0', '1', '', '', ''),
(21, 29, 4, 'Ditemukan', 'sebuah tas di pinggir jalan', 'Ditemukan sebuah tas di pinggir jalan ... jalur tembus btp... \r\nKe tol ir sutami... Brupa dompet dan identitas...  \r\nBagi yg merasa kehilangan harap ke pos security di jln p\r\nTembus btp ke tol...... Atau hubungi... 082293348280', '2017-06-14', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 05:53:54', '2017-06-25 06:33:17', '0', '0', '0', '', '', '0'),
(22, 29, 4, 'Ditemukan', 'DOMPET YG BERISIKAN SIM A DAN ', 'Tabe boss yg merasa kehilangan barang berhargax berupa DOMPET YG BERISIKAN SIM A DAN SIM C VISA MANDIRI DAN LAIN LAIN .....\r\nDitemukan tercecer di jln.A.yani makassar, depan polrestabes makassar\r\nBantu up tawwa\r\nNAMA : HABIBIE ABUSTAN \r\nALAMAT :JL. DG HAYO LR1', '2017-06-14', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:34:16', '2017-06-25 06:35:56', '0', '0', '0', '', '', '0'),
(23, 29, 4, 'Ditemukan', 'atas nama baso dg.nakku', 'Telah ditemukan dompet warna hitam agak pudar.atas nama baso dg.nakku.yg merasa kehlangan dompt trsbut agar behbngan langsung dgan saya .isi dompet trsbut masih utuh shabat ikkm..', '2017-06-21', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:37:20', '2017-06-25 06:41:36', '0', '0', '0', '', '', '0'),
(24, 29, 4, 'Kehilangan', 'STNK atas nama RUDI ANDIKA', 'Tabe, mungkin ada yang temukan STNK atas nama RUDI ANDIKA,Nomor Polisi DD 5538 UG\r\nKiranya ada yang menemukan..\r\nBesar harapan untuk menghubungi kami di No 085394693040 Terima kasih sebelumnya.', '2017-06-14', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:42:47', '2017-06-25 06:42:47', '0', '0', '0', '', '', '0'),
(25, 29, 4, 'Ditemukan', 'stnknya Atas nama INDA', 'tabe sepupu dapat stnk tercecer diBTP, sempatkah ada keluargata ataukah temanta kehilangan stnknya, Atas nama INDA', '2017-06-20', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:44:05', '2017-06-25 06:44:35', '0', '0', '0', '', '', '0'),
(26, 29, 4, 'Ditemukan', 'dompet atas nama samsudding', 'Di temukan dompet atas nama samsudding beralamat toa daeng makassar _ berisikan sim dan uang klo pemiliknya melihat ini hubungima 085256775131', '2017-06-14', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:45:43', '2017-06-25 06:45:43', '0', '0', '0', '', '', '0'),
(27, 29, 4, 'Ditemukan', 'dompet ATAS NAMA SOFYAN', 'Tabe'' siapa tau ada yang kenal ini yang punya dompet tolongki infokan ki di dapat di terongan paotere.dompet berisi KTP.surat2 beserta uang yang tak di sebutkan nelpon maki saja di nomor ini 085340850003 ATAS NAMA SOFYAN', '2017-05-10', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:46:41', '2017-06-25 06:47:57', '0', '0', '0', '', '', '0'),
(28, 29, 4, 'Ditemukan', 'sim stnk,tlong infokan', 'Tabe,smpat ad yg kenal orgx yg khlngan sim stnk,tlong infokan.makasih', '2017-06-19', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:48:45', '2017-06-25 06:49:36', '0', '0', '0', '', '', '0'),
(29, 29, 4, 'Ditemukan', 'stnk yg bernama khaeril gaffar', 'Tabe yg merasa kehilangan stnk yg bernama khaeril gaffar, sya dpt tdi d psar senggol,', '2017-06-30', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:50:49', '2017-06-25 06:51:18', '0', '0', '0', '', '', '0'),
(30, 29, 2, 'Ditemukan', 'ada stiker FIS UNM, Ini motor ', 'Siapa tau ada yg kenal atau tau ini motor siapa?ada stiker FIS UNM..\r\nIni motor curian skrg posisinya ada di jl syekh yusuf katangka...', '2017-06-29', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:54:21', '2017-06-25 06:57:35', '0', '0', '0', '', '', '0'),
(31, 29, 3, 'Ditemukan', 'brusan sya nemu hp samsung s6', 'Tabe''...brusan sya nemu hp samsung s6...siapa tau ada di grup ini, keluarga teman atau yg puny ini hp bisa tlp no yg ada di hp yg sy dapat...sengaja sya hidupkan supaya ku tungg yg punya nelp..soalnya waktu saya temukan dlam keadaan mati,hp sya temukan bersama kacamata\r\n\r\n', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 06:58:49', '2017-06-25 06:58:49', '0', '0', '0', '', '', '0'),
(32, 29, 4, 'Ditemukan', 'MULIAWAN RAHMAN ada 2 STNK', 'tabe ada saya dapat dompet di jalan abdesir atas nama MULIAWAN RAHMAN ada 2 STNK dan sejumlah uang..\r\n\r\nkalau ada yang kenal tolong informasikan ke dia dan hubungi nomorku 085242534478 terimakasih', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 07:42:24', '2017-06-25 07:47:21', '0', '0', '0', '', '', '0'),
(33, 29, 4, 'Ditemukan', 'STNK atas nama Riki idris', 'Sapa tau ad yg kenal ini STNK atas nama Riki idris alamat rappocini raya lr.6a/64.teman menemukan nya d depan perwakilan alam indah perintis kemerdekaan laporan selesai', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 07:48:53', '2017-06-25 07:53:06', '0', '0', '0', '', '', '0'),
(34, 29, 4, 'Ditemukan', 'dompet nya di antasari', 'Yg kehilangan dompet nya di antasari segera chat atau inbok aku. Dompetnya aman sama aku isinya juga aman. Tolong ya di bantu share', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:26:20', '2017-06-25 08:26:34', '0', '0', '0', '', '', '0'),
(35, 29, 4, 'Kehilangan', 'SIM,STNK,BPJS,KTP. atas Nama: H.TINGKA HADING', 'Barang siapa yg menemukan dompet di sekitar HARTAKO sd JL.PAJJAING.\r\nIsinya: SIM,STNK,BPJS,KTP.\r\nNama: H.TINGKA HADING\r\nHP : 082191306948\r\n: 085299264700 \r\nMOHON DI (SHARE) YA\r\nTERIMA KASIH', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:27:58', '2017-06-25 08:27:58', '0', '0', '0', '', '', '0'),
(36, 29, 4, 'Ditemukan', 'ditemukan STNK td pagi di jl.mannuruki raya', 'Tolong bantu disebarkan.. kasihan yg punya mencari.. \r\nditemukan STNK td pagi di jl.mannuruki raya', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:28:59', '2017-06-25 08:28:59', '0', '0', '0', '', '', '0'),
(37, 29, 8, 'Ditemukan', 'KUNCI MOBIL ISUZU beserta STNK', 'Telah di temukan KUNCI MOBIL ISUZU beserta STNK yg bernama: MISKAN\r\nAlamat : Dkh bandaralim kidul \r\nRt/Rw : 03/03\r\nLOKASI JATUH : timur perempatan jambon/pakis.\r\nBagi yg merasa kehilangan atau kerabat terdekat.. bisa sms,tlpn no +6281938548840', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:35:01', '2017-06-25 08:36:34', '0', '0', '0', '', '', '0'),
(38, 29, 4, 'Ditemukan', 'ktp di masjid ar rohman irodranan', 'Ditemukan ktp di masjid ar rohman irodranan. Bagi yg kenal pemilik ktp ni tolg di informasikan agar menemui bpak sakin irodranan', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:37:30', '2017-06-25 08:37:57', '0', '0', '0', '', '', '0'),
(39, 29, 4, 'Kehilangan', 'atas nama siti toyyibah matirswn', 'Assalamualaikum teman2 telah hilang dompet berwarna merah dan berfariasi hijau ,dompet tersebut berisi buku rekening atas nama siti toyyibah perkiraan hilang antara BNI cab po sampai dg foto copy angkasa , barang siapa yg menemukan saya mohon untuk mengembalikanya ke yg punya hubungi no ini 085257175834 atas nama siti toyyibah matirswn', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:39:04', '2017-06-25 08:39:04', '0', '0', '0', '', '', '0'),
(40, 29, 4, 'Kehilangan', 'ktp+sim+atm dengan nama Muhamad cahyono', 'Temen2 minta tlong kalau ada yg menemukan dompet warna coklat yang berisi ktp+sim+atm dengan nama Muhamad cahyono hilang sekitar tambakbayan sampai sekayu hubi saya ya.. No/wa 082234055285 Trimakash', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:40:16', '2017-06-25 08:40:16', '0', '0', '0', '', '', '0'),
(41, 29, 4, 'Kehilangan', 'isi ktp atas nama samsuri stnk atm sim', 'Lur minta tolong klo ada yg nemuin ato lihat dompet jatuh warna coklat dijalan tumpuk arah telaga ngebel . isi ktp atas nama samsuri stnk atm sim bgi yg menemukan akn di beri imbalan sepantasy trimak', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:41:09', '2017-06-25 08:41:09', '0', '0', '0', '', '', '0'),
(42, 29, 4, 'Ditemukan', 'dompet coklat di masjid Darut Taqwa', 'Telah ditemukan sebuah dompet coklat di masjid Darut Taqwa Jl.Rsya Danyang Sukosari Babadan Ponorogo. Bagi pemilik barang tersebut bisa mengambil pada pengurus Takmir..mohon bantu sebarkan info ini . Barang kali yg bersangkutan sahabat , kenalan atau tetangga saudara ....TRIms atas perhatiannya', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:42:58', '2017-06-25 08:42:58', '0', '0', '0', '', '', '0'),
(43, 29, 4, 'Kehilangan', 'STNK motor plat AE2860VM SATRIA F 150', 'Bagi yang menemukan STNK motor plat AE2860VM SATRIA F 150, harab hubungi saya 085856877092', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:43:43', '2017-06-25 08:43:43', '0', '0', '0', '', '', '0'),
(44, 29, 4, 'Ditemukan', 'KTP atas nama EVI NUR KANAH', 'Ditemukan dompet warna biru diduga milik pengunjung yan lari pada saat longsor susulan berisi :\r\n1. KTP atas nama EVI NUR KANAH alamat Dkh. Plosorejo Rt 02 Rw 01 Kemiri Jenangan.\r\n2. STNK Nopol : AE 3330 VF atas nama SURATNO alamat Sda.\r\n3. Kartu ATM BRI.\r\n4. Uang Tunai Rp. 159.200,-\r\nDi selatan sektor D.\r\nDulur2 yg rmhnya d wilayah jenangan tlng bantu menyampaikan kpd yg bersangkutan bhw pemilik barang2 yg d temukan tsb d atas agar melapor k Polsek Pulung.', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:45:14', '2017-06-25 08:45:14', '0', '0', '0', '', '', '0'),
(45, 29, 4, 'Kehilangan', 'nama bapak mustofa', 'Nyuwun sewu min, enten brita kehilangan,DOMPET warna hitam berisi ktp,sim a sim c,stn 2, atas nama bapak mustofa alamat jl.cempaka 118 desa polorejo, kronologi.. Prjalanan dri sukorejo nampan sampai polorejo,medal e kretek gantung basuki bareng. mbok bilih enten ingkang ngertos mugi" purun nyukakne mangke enten imbalan nipun, surat" e mwon ingkang pnting saget hbungi nmer niki 082140572877. Mtur sembah nuwun.', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:46:45', '2017-06-25 08:46:45', '0', '0', '0', '', '', '0'),
(46, 29, 4, 'Kehilangan', 'an"rismiati" sim ,c , an"paiman', 'Kehilangan dompet di perjalanan dari pp darul huda mayak sampai jln prahasto, isi stnk, ae 2787,wd, an"rismiati" sim ,c , an"paiman, bagi yg menemukan" tolong3.....hubungi aku "servis tv depan balai desa madusari, hp" 081335835111, ads imbalan sepantasnya, trim..........', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:47:42', '2017-06-25 08:47:42', '0', '0', '0', '', '', '0'),
(47, 29, 4, 'Kehilangan', 'Kartu Lisensi Atas Nama FREDY HERMAWAN', 'Info Telah kehilangan STNK SIM KTP NPWP ATM Kartu Lisensi Atas Nama FREDY HERMAWAN siapapun yang menemukan mohon di kembalikan. Ke alamat Dsn Darungan Ds Punjul Kec Plosoklaten Kab Kediri RT 05 RW 07 atao nomer HP di 082257080065 terima Kasih !', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:48:34', '2017-06-25 08:48:34', '0', '0', '0', '', '', '0'),
(48, 29, 4, 'Kehilangan', 'STNK  AD 4652 Z Ats nma Setyaningsih', 'Mohon bantuanya saudaraku...jika menemukan STNK Honda Vario dg nopol AD 4652 Z\r\nAts nma Setyaningsih\r\nPambregan Rt06/07,Malangjiwan,Colomadu,Karanganyar\r\nTlh hubungi sy 085647518897\r\nMohon bantuannya n terimakasih..', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:49:35', '2017-06-25 08:49:35', '0', '0', '0', '', '', '0'),
(49, 29, 4, 'Kehilangan', 'STNK, ATM, KTP dan surat2 penting lainnya', 'Maaf geh min, saya mau minta bantaunnya dari saudara2 ICWP Ponorogo.\r\nSya tadi sekitar jam stengah 11 berhenti di warung pojok alun2 PO beli air minum, dan sy duduk sekitar kurang lebih 10 menit.\r\nSetelah itu langsung segera bayar dan pulang ke Kebonsari.\r\nSesampainya di rumahku ternyata dompet saya hilang. Trus sy kembali lagi ke warung dan bertanya kepada mas mbak penjualnya, katanya tidak tahu.\r\n(Dompet warna hitam/kulit merk VILLA)\r\nIsi : STNK, ATM, KTP dan surat2 penting lainnya.\r\nBagi yg menemukan dompet saya mohon dengan hormat tolog kembalikan dompet beserta surat2 penting ke saya, sy cuman butuh surat surat yg ada di dalam dompet sy. Masalah isi (uang) pean ambil semua juga ndak apa2.\r\nIni no hp saya:\r\n081 335 016 369\r\nAan Lukman Hakim\r\nDusun sekawis rt. 06/03\r\nDs. Desa Tanjungrejo\r\nKec. Kebonsari Madiun\r\nWahid Hasyim Anhari Ong Kah Kion Kawok Ae \r\nJi Adji Syaiful Anwar Mbah Tro Wardoyo Loor Keyank.', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:50:37', '2017-06-25 08:50:37', '0', '0', '0', '', '', '0'),
(50, 29, 4, 'Kehilangan', 'STNK TIGER 2009 A/N EDY SUSILO', 'UTUH INFO TEMAN2 BAGI YANG MENEMUKAN STNK TIGER 2009 \r\nA/N EDY SUSILO ALAMAT DKH KORI WETAN RT 05 RW 06 \r\nDESA KORI SAWO PONOROGO..\r\nMOHON HBUNGI NOMER INI..085856870146\r\nADA JASA TRIMAKASIH DR SAYA.\r\nArea ATM JETIS KE TIMUR.', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:51:48', '2017-06-25 08:52:03', '0', '0', '0', '', '', '0'),
(51, 29, 4, 'Kehilangan', 'Atas nama:fendhi hidianto ', 'Ijin melaporkan\r\nKehilangan 1 buah tas futsal berisi dompet.hp.atm.kartu pelajar.dll\r\nHilang di sekitarran GOR perjalanan pulang kerumah kemarin sore sekitar jam 3\r\nAtas nama:fendhi hidianto \r\nFB : fendhi Hdyt\r\nSekolah di smpn 1 ponorogo\r\nBagi yang menemukan bisa menghubunggi \r\nW.A:+85262107886/Ayam panggang mbak sur jalan mt haryono.lor pom.bensin asem buntung \r\nDepan hotel mutiara +6285235441741', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:53:46', '2017-06-25 08:53:46', '0', '0', '0', '', '', '0'),
(52, 29, 4, 'Ditemukan', 'ktp ats nm nisa,ulmusyyadah', 'D temkn dmpt wrna htm ktp ats nm nisa,ulmusyyadah,pilang,tulong sampung,yg mrsa khlngn bs tlpn 085735535655,or parani wae bngkel mtr RMS doncak,tmr polsek sukorjo', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 08:54:56', '2017-06-26 17:24:00', '0', '0', '0', '', '', '0'),
(53, 29, 4, 'Kehilangan', 'kehilangan dompet atas nama maria miranda', 'Mohon yang menemukan dompwr dengan ktp ataa nama maeia miranda agae segwra mwnhubungi 082344566544', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-25 09:05:49', '2017-06-25 09:05:49', '0', '0', '0', '', '', '0'),
(55, 46, 2, 'Kehilangan', 'Ini motor ada hilang.', '\r\nKalo ada yang lihat ini motor tolong info dulu.', '0000-00-00', 'KLSADJFLKA@LSAJDLK.COM', 0, 'SADFASDFASDF', '34324124312412', '', 0, 'Disable', 12, 1103, 0, 0, 'SDFASDF', '2017-06-26 12:57:26', '2017-06-26 12:57:26', '0', '0', '0', '', '', '0'),
(56, 29, 4, 'Ditemukan', 'stnk honda beat plat nomer AB 2113 QU', 'telah hilang stnk honda beat plat nomer AB 2113 QU .warna putih .hilang diperkirakan sekitar pom ngembal sampai simpang tujuh mohon barangkali sedulur isk ada yg menemukan untuk mengembalikan bisa menghubungi nomor 08562664242/085310215735 pBagi yg menemukan diberikan imbalan sepantasnya . sebelumnya saya berterimakasih semoga kebaikan anda dibalas Tuhan yme dibulan penuh berkah .', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-26 13:02:50', '2017-06-26 13:02:50', '0', '0', '0', '', '', '0'),
(68, 29, 2, 'Kehilangan', 'Motor yamaha Vega R Warna Biru Tahun 2006', 'Telah HIlang Motor yamaha Vega R Warna Biru Tahun 2006 bulan 2\r\nNomor B 6181 SFL... Barangsiapa yang Melihatnya akan diberikan Imbalan sepantassnya..\r\nhubungi redaksi ini', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-26 19:31:45', '2017-06-26 19:31:45', '0', '0', '0', '', '', '0'),
(69, 29, 4, 'Kehilangan', 'MUHAMMAD ABDUL FATAH dari POLITEKNIK NEGERI JEMBER', 'Mohon bantuannnya, mungkin ada yang\r\nmenemukan dompet berwarna cokelat belang yang\r\nisinya surat2 penting diantaranya:\r\n- STNK atas nama MASKANAH dg nopol P 4380\r\nTZ\r\n- STNK atas nama RAKHMAD HIDAYAT dg nopol P\r\n5638 QY\r\n- SIM C atas nama MUHAMMAD ABDUL FATAH\r\n- KTP Atas nama MUHAMMAD ABDUL FATAH\r\n- Kartu Tanda Mahasiswa atas nama MUHAMMAD\r\nABDUL FATAH dari POLITEKNIK NEGERI JEMBER\r\n- Kartu ATM Mandiri.\r\nDan beberapa kartu pendukung lain.\r\nHilang pada tgl 03 januari 2015 sekitar jam 21.00\r\ndisekitar POM BENSIN Bondowoso Kota sampai\r\nJl. Jawa Jember.\r\nBagi yang menemukannya, untuk menghubungi ke\r\nnomer 085746420523 atas nama Muhammad\r\nAbdul Fatah.\r\nTerima kasih', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-27 08:34:11', '2017-06-27 08:34:11', '0', '0', '0', '', '', '0'),
(70, 29, 10, 'Ditemukan', 'Motor Mio J wrna merah dg plat nomer P 6253 TO', 'Bagi yg punya ayah/kakek/sdra/pakdhe yg mempunyai kndraan Motor Mio J wrna merah dg plat nomer P 6253 TO harap hubungi sya 085708599575 ats nama Tri Anggara.. Dikarenakan korban pengendara MIO J trsebut mngalami kcelakaan dan gegar otak berat dan skr sdh dbwa ke RSU Subandi.. Korban tdk mmbawa identitas apapunSya mhon sebarkan BC ini untuk menemukan keluarganya.. BC anda sangat membantu..trm ksh', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-27 08:37:35', '2017-06-27 08:37:35', '0', '0', '0', '', '', '0'),
(71, 29, 10, 'Kehilangan', 'seorang anak perempuan sejak sabtu 26 juli 2014', 'Telah hilang seorang anak perempuan sejak sabtu 26 juli 2014\r\nNama : putri\r\nUsia : 13 th/kls 1 smp\r\nAlamat: dsn besuk ds. Wirowongso kec. ajung\r\nCiri fisik: kulit putih agak gemuk\r\nTerakhir memakai baju kuning membawa spd vario techno', '0000-00-00', 'oktofianuskanni@gmail.com', 0, '0411 - 3637195', '081355242616', '2a93eee0', 0, 'Disable', 73, 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '2017-06-27 08:38:49', '2017-06-27 08:38:49', '0', '0', '0', '', '', '0'),
(75, 59, 4, 'Kehilangan', 'kehilangan dompet yang isinya SIM, KTP, Kartu BPJS', 'dompet tersebut hilang dalam perjalan dari terminal karangkater ke terminal arjosari malang', '0000-00-00', 'cadkatchonk@gmail.com', 1, '', '085331933441', '', 1, 'Disable', 35, 3528, 0, 0, 'pal daya 1, palengaan daya', '2017-06-28 12:43:28', '2017-06-28 12:43:28', '1', '1', '1', '', '', '1'),
(77, 75, 4, 'Kehilangan', ' KTP atas nama Kadek Ariskhawanta(desa sawan)', 'Telah hilang dompet kulit warna hitam, isi stnk,ktp,atm,kartu plajar, dan uang tunai. KTP atas nama Kadek Ariskhawanta(desa sawan), Stnk: vario hitam, atas nama MADE PUSPAWAN, no plat DK 3688 DI, KARTU PELAJAR: KADEK ARISKHAWANTA (SMA3SGR). Hilang di sekitaran GOR Bhuana Patra. Bagi yg menemukan, bisa menghubungi Aris di no 083117239000/085792620153. Terima kasih.', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:12:56', '2017-06-30 23:12:56', '0', '0', '0', '', '', '0'),
(78, 75, 4, 'Kehilangan', 'SIM stnk KTP Atas nama Budiono', 'Saya kehilangan dompet warna hijau.berisi SIM stnk KTP\r\nAtas nama Budiono \r\nAlamatnya bangilan tuban bagi yang menemukan mohon infonya...\r\nHubungi di nomer082331198812', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:14:03', '2017-06-30 23:14:03', '0', '0', '0', '', '', '0'),
(79, 75, 4, 'Ditemukan', 'stnk a/n andrew chrisdy  Dk 8875 OG', 'Di temukan dompet hitam \r\nISi stnk a/n andrew chrisdy \r\nDk 8875 OG\r\ndllm. hub .085737399131', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:14:51', '2017-06-30 23:14:51', '0', '0', '0', '', '', '0'),
(80, 75, 4, 'Ditemukan', 'bca platinum dengan nomer 6019004518350614', 'saya menemukan kartu atm bca platinum dengan nomer 6019004518350614 sapa yg pux bisa hubungi hp saya 085655540100', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:15:53', '2017-06-30 23:15:53', '0', '0', '0', '', '', '0'),
(81, 75, 4, 'Kehilangan', 'ktp a/n Muhammad Widi Hardiyanto', 'Kehilangan dompet berisi\r\n-ktp a/n Muhammad Widi Hardiyanto\r\n-stnk motor JupiterMX F6538KW a/n linseu n\r\n-kartu pelajar Smkn 1 GunungPutri a/n Muhammad Widi Hardiyanto\r\n-Kartu berobahH Thamrin.\r\n\r\nBagi yang menemukan harap hubungi no 08991518528\r\nTerima kasih', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:17:03', '2017-06-30 23:17:03', '0', '0', '0', '', '', '0'),
(82, 75, 4, 'Kehilangan', 'SIM an. Aryo Seno Sulistyo P', 'Saya kehilangan dompet warna coklat beserta isinya sebagai berikut pada saat naik bus BRT Semarang Jurusan Mangkang:\r\n1. SIM an. Aryo Seno Sulistyo P\r\n2. STNK Sepeda Motor B 3451 TCC an. Laksono Soleh Widodo\r\n3. NPWP, Kartu BPJS, dan SIM C an Aryo Seno Sulistyo Putro\r\nBagi yang menemukan dapat menghubungi saya di NO 087888 7666 76', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:18:03', '2017-06-30 23:18:03', '0', '0', '0', '', '', '0'),
(83, 75, 2, 'Kehilangan', 'beat pop warna putih B 3093 KUE', 'saya kehilangan motor beat pop warna putih B 3093 KUE beserta stnk,ktp,dan atm atas nama roslina,bagi yang mengetahuinya hubungi saya ke nmr 085777335110', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:19:07', '2017-06-30 23:19:07', '0', '0', '0', '', '', '0'),
(84, 75, 4, 'Kehilangan', 'atas nama novita rahardjo', 'malam.. saya kehilangan dompet td siang di sidoarjo. ktp sim c atm dll. atas nama novita rahardjo. tolong yg menemukan hubungi saya di no 088805190262 atau 03192185918. thx', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:20:09', '2017-06-30 23:20:09', '0', '0', '0', '', '', '0'),
(85, 75, 4, 'Kehilangan', ' pak yudi anto kp jomblongan', 'Saya kehilangan dompet berisi sim a sim c ktp stnk ktp npwp mohon impo nya barang siapa yang menemukan dengan saya pak yudi anto kp jomblongan rt 01 jemblongan barang siapa yang menemukan nya akan dapat imbalan sepantas nya', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:21:17', '2017-06-30 23:21:17', '0', '0', '0', '', '', '0'),
(86, 75, 4, 'Kehilangan', ' nama saya: SARTO', 'Saya telah kehilangan dompet dan isinya sbb:KTP.SIM A. Kartu jamsostek.ATM BRI.dan lainya.semua atas nama saya: SARTO.lokasi Hilang di Rest Area cikampek. Bagi yang menemukan tolong hubungi ke no hp saya:081932732066', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:22:03', '2017-06-30 23:22:03', '0', '0', '0', '', '', '0'),
(87, 75, 4, 'Kehilangan', 'stnk motor a/n lukman hakim', 'Berita kehilangan,tlah hilang sebuah dompet berisikan surat2 penting terutama stnk motor a/n lukman hakim dengan nopol B 3010 UHM,Bagi yg menemukan mohon hubungi nomor 081282817330,trimakasih atas bantuannya', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:22:40', '2017-06-30 23:22:40', '0', '0', '0', '', '', '0'),
(88, 75, 10, 'Kehilangan', 'Nama : YULIUS BEANAL', 'DI CARI\r\nORANG HILANG\r\nNama : YULIUS BEANAL\r\nBagi yang menemukannya tolong hubungi nomor\r\nHP : 081333377991/081333332042', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:24:30', '2017-06-30 23:24:30', '0', '0', '0', '', '', '0'),
(89, 75, 4, 'Ditemukan', '1. KTM 2. SIM 3. ATM 4. UANG dll', 'Assalamu''alaikum...\r\nDitemukan dompet beserta isinya :\r\n1. KTM\r\n2. SIM\r\n3. ATM\r\n4. UANG dll\r\nDengan identitas sperti gambar dibawah ini ...\r\nTolong yang merasa kehilangan bisa langsung check k Toko Kuncen depan Pasar Klitikan.....\r\nmatur nuwun.....\r\nWassalamu''alaikum...', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '353251252151', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:25:44', '2017-06-30 23:25:44', '0', '0', '0', '', '', '0'),
(90, 75, 4, 'Kehilangan', 'Hilang di sekitar wilayah mall PARAGON SEMARANG', 'TELAH HILANG!!\r\nDOMPET WANITA\r\nHilang di sekitar wilayah mall PARAGON SEMARANG.Dengan ciri-ciri:\r\n• BENTUK PANJANG(SEPERTI DOMPET PEREMPUAN),\r\n• WARNA COKELAT, MERK PAPILLON\r\n• BERISI SURAT-SURAT PENTING :KTP,SIM,KTM,STNK,DLL. ATAS NAMA WIDIYA NINGRUM\r\n\r\nBAGI SIAPAPUN YANG MENEMUKAN MOHON DI KEMBALIKAN DAN AKAN DI BERI IMBALAN SEBESAR Rp.650.000,-(JIKA UTUH), Rp.300.000,- (JIKA HANYA DOMPET DAN SURAT2)\r\n\r\nBAGI YANG MENEMUKAN HARAP SEGERA MENGHUBUNGI NOMOR INI : 082217062340/082311638075\r\n\r\nKAMI DARI PIHAK KELUARGA SANGAT MEMOHON AGAR BARANG DAPAT DI KEMBALIKAN KEPADA PEMILIKNYA.', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:28:02', '2017-06-30 23:28:02', '0', '0', '0', '', '', '0'),
(91, 75, 4, 'Kehilangan', 'ktp, sim, atm, stnk yang beratas nama basriandi', 'kehilangan dompet di sekitar MTQ, parit indah,\r\ntaman sari, depan hotel ratu mayang garden. yg\r\nberisi uang, ktp, sim, atm, stnk yang beratas nama\r\nbasriandi di ktp dan sim, bagi yang menemukan\r\nharap di kembalikan ya.', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:29:36', '2017-06-30 23:29:36', '0', '0', '0', '', '', '0'),
(92, 75, 4, 'Kehilangan', ' KTM dan KTP an Wisma Firanti Utami', 'Berita kehilangan sebuah dompet berwarna coklat berisi \r\n1. KTM dan KTP an Wisma Firanti Utami\r\n2. STNK an Pamuji\r\n3. Kartu ATM mandiri\r\n\r\nHilang saat perjalanan dari maospati - jogja. Bagi yg menemukan mohon menghubungi 085784614230\r\n\r\nBagi yg menemukan akan diberi imbalan. Terima kasih', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:30:12', '2017-06-30 23:30:12', '0', '0', '0', '', '', '0'),
(93, 75, 4, 'Kehilangan', 'stnk atas nama MULYADI SUGIARTO', 'Kehilangan dompet sekitar daerah sukamiskin pasir impun, isinya ada ktp,sim,stnk atas nama MULYADI SUGIARTO. Bagi yang menemukan mohon bantuannya dg menghubungi no 089606386447 trimksh', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:30:57', '2017-06-30 23:30:57', '0', '0', '0', '', '', '0'),
(94, 75, 4, 'Kehilangan', '1.sim c 2buah stnk ninja dan beat .atm bni', 'Bagi yang menemukan dompet warna coklat isi dompet 1.sim c 2buah stnk ninja dan beat .atm bni diharapkan mengenbalikan kealamat stnk tersebuat...nanti akan ada imbalannya', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:31:47', '2017-06-30 23:31:47', '0', '0', '0', '', '', '0'),
(95, 75, 4, 'Ditemukan', 'nopol B 3304 FAP atas nama SUBARKAH', 'Telah di temukan STNK motor di daerah perumahan chandra pondok Melati nopol B 3304 FAP atas nama SUBARKAH,alamat : jl.teratai 11c blok D 9/25 PTMRT.1/3 WARNASARI CIBITUNG BEKASI,bagi yang merasa kehilangan bisa menghubungi 081385688693,tolong bantu share ya', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:33:11', '2017-06-30 23:33:11', '0', '0', '0', '', '', '0'),
(96, 75, 4, 'Kehilangan', 'Identitas an Rika Rochmanti', 'PENGUMUMAN !!!\r\nBerita kehilangan dompet berwarna salem berisikan sbg:\r\n1. KTP \r\n2. SIM C\r\n3. STNK\r\n4. dll\r\nSemua Identitas an Rika Rochmanti\r\nBarang siapa yang menemukan dimohon untuk dikembalikan hubungi:\r\nHP:081322725454\r\nNB: Barang siapa yang menemukan akan mendapat imbalan..\r\nTrima kasih Banyak sebelum nya', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:33:48', '2017-06-30 23:33:48', '0', '0', '0', '', '', '0'),
(97, 75, 4, 'Kehilangan', 'KTP , SIM A/C , ATM atas nama Risqi Kurniawan', 'Tolong yg menemukan dompet hitam ,berisi :STNK , KTP , SIM A/C , ATM atas nama Risqi Kurniawan alamat RT,18. RW 08, dukuh, karang sari, Pengasih, Kulon Progo. Mohon hubungi; 085228344690, akan saya beri imbalan sepantasnya', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:35:19', '2017-06-30 23:35:19', '0', '0', '0', '', '', '0'),
(98, 75, 4, 'Kehilangan', 'SUPRI YANTO dan stnk atn MANISAH', 'Sya kehilangan dompet beriskan sim atn SUPRI YANTO dan stnk atn MANISAH', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:35:40', '2017-06-30 23:35:40', '0', '0', '0', '', '', '0'),
(99, 75, 4, 'Kehilangan', 'ktp "surya prayogi" dan stmk motor an. "sarman" ', 'bagi yang menemukan dompet arsenel putih dengan ktp "surya prayogi" dan stmk motor atas nama "sarman" di harap menghubungi nomer 088970385495 hilang di sekitar depan mall malioboro. terimakasih', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:36:38', '2017-06-30 23:36:38', '0', '0', '0', '', '', '0'),
(100, 75, 4, 'Kehilangan', 'ATS NAMA {ABD. QODIR', 'BERITA KEHILANGAN …..TELAH HILANG DOMPET WARNA BIRU (PERJALANAN DARI KANTOR MTS MAMBAUL ULUM BATA-BATA SAMPAI JALAN LARANGAN)YANG DIDALAMNYA BERISI SEBAGAI BEIKUT :- KTP ATAS NAMA SAYA SENDIRI (KHOIRUL UMAM) ALAMAT BANGKES KADUR PAMEKASAN- SIM C ATAS NAMA SAYA SENDIRI- DUA STNK (1. ATS NAMA {ABD. QODIR} 2. ATAS NAMA {FATHOR ROHMAN})- SEDIKIT UANG- DAN LAIN2,MOHON BAGI YANG MENEMUKAN DOMPET TERSEBUT KEIKHLASANNYA UNTUK MENGHUNGI SAYA DI 081938205734 ATAU LANGSUNG KERUMAH SAYA DAN ATAU KE KANTOR MTS. MAMBAUL ULUM BATA-BATA. ATAS PERHATIAN DAN BANTUANYA DISAMPAIKAN TERIMAKASIHBAGI TEMAN2 YANG MEMBACA INI, TOLONG BANTU doa n SHARE!', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:37:35', '2017-06-30 23:37:35', '0', '0', '0', '', '', '0'),
(101, 75, 4, 'Kehilangan', 'ktp an yeremia fritz hein k, stnk b 6927 gdz', 'saya kehilangan dompet beserta isinya berupa ktp atas nama yeremia fritz hein k, stnk b 6927 gdz,npwp, atm bca dan kartu2 laiinnya.mohon bila menemukan hubungii 083808752360\r\nterima kasih', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:38:22', '2017-06-30 23:38:22', '0', '0', '0', '', '', '0'),
(102, 75, 4, 'Kehilangan', 'ktp an yeremia fritz hein k, stnk b 6927 gdz', 'saya kehilangan dompet beserta isinya berupa ktp atas nama yeremia fritz hein k, stnk b 6927 gdz,npwp, atm bca dan kartu2 laiinnya.mohon bila menemukan hubungii 083808752360\r\nterima kasih', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:38:22', '2017-06-30 23:38:22', '0', '0', '0', '', '', '0'),
(103, 75, 4, 'Kehilangan', 'stnk motor satria fu . atas nama iyang ', 'saya kehilangan dompe dan isinya ktp atas nama adi tia pangestu dan ada stnk motor satria fu . atas nama iyang . barang kali ada yg menemukan . tolong anterin ke cetring selera nusantara sebelah mol cikampek ....', '0000-00-00', 'oktafianus_mks@yahoo.co.id', 0, '', '081355242616', '', 0, 'Disable', 73, 7371, 0, 0, 'fsdg', '2017-06-30 23:41:15', '2017-06-30 23:41:15', '0', '0', '0', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Enable','Disable') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mobil', 'Enable', '2017-05-28 15:15:16', '2017-05-28 15:15:16'),
(2, 'Motor', 'Enable', '2017-05-28 15:15:23', '2017-05-28 15:15:23'),
(3, ' Elektronik & Gadget', 'Enable', '2017-05-28 15:15:46', '2017-05-28 15:15:46'),
(4, 'Surat-surat', 'Enable', '2017-05-28 15:15:54', '2017-05-28 15:15:54'),
(8, 'Lain-lain', 'Enable', '2017-05-28 15:16:43', '2017-05-28 15:16:43'),
(9, 'Hewan', 'Enable', '2017-06-26 17:30:18', '2017-06-26 17:30:18'),
(10, 'Orang', 'Enable', '2017-06-27 08:36:38', '2017-06-27 08:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `document_id` int(11) NOT NULL,
  `berita_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `berita_id`, `filename`, `created_at`, `updated_at`) VALUES
(4, 95, 'uploads/95/thum/11205580_10203886722682484_399584229152295951_n.jpg', '2017-06-30 23:33:12', '2017-06-30 23:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1495974124),
('m130524_201442_init', 1495981328),
('m170529_110124_buat_tabel_auth', 1498734317);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`province_id`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE IF NOT EXISTS `regencies` (
  `regency_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regencies`
--

INSERT INTO `regencies` (`regency_id`, `province_id`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `accept` varchar(100) NOT NULL,
  `attachment_1` varchar(100) NOT NULL,
  `multiple` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `regency_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_handphone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pin_bb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_account` smallint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `province_id`, `regency_id`, `district_id`, `village_id`, `alamat`, `telephone`, `mobile_handphone`, `pin_bb`, `status_account`) VALUES
(29, 'Oktofianus Kanni', 'oktofianuskanni', 'nj4LQwkrSFFMhqlZxkzC_Wgcp-OuHEwU', '$2y$13$ZGJA1of8zVuZ/luW1cgV4eM3UorryfgCUsT2of5lT6/e7Im/vQA5i', '3bIqGvnnaHOzDX-fnaVy_-7hme5m-GW-_1498542430', 'oktofianuskanni@gmail.com', 10, 0, '0000-00-00 00:00:00', '73', 7371, 0, 0, 'Jl. Tondong Kura No. 18A', '0411 - 3637195', '081355242616', '2a93eee0', 1),
(30, 'Mira Pandie', 'mirapandie', '89LowGfW4Or4ryYiqDR90NMDPfgt8r18', '$2y$13$4teXItRHzhtQcEozZKecG.RkEvTZfKD4nds606bDZbCJEyHwA.UcC', NULL, 'mirapandie@gmail.com', 10, 0, '0000-00-00 00:00:00', '73', 7371, 0, 0, 'Jl. Tondong Kura No. 18a', '04113637195', '081135242616', '2a93eee0', 1),
(38, 'Basyar Kantin', 'basyarkantin', 'Lxw4EkXlYxvsrvprt-gfl9JjYs5Mrz2b', '$2y$13$KR4jZCAp6IOV0RCnQ2X39uQyxegDYz5tYQpUcjV94fWQ.jKGgLTyK', NULL, 'basyarkantin@gmail.com', 10, 0, '0000-00-00 00:00:00', '73', 7301, 0, 0, 'ok', '', '08698799879', '', 1),
(39, 'N4115', 'N4115', '-hidkeriKiZGPJtZjQ0lXzrlkc4gHwT_', '$2y$13$nbud6/jSTnxkgB9LbyCIIei7xH5A6glhlz7dJqvg128y/WYLP9tya', NULL, 'N4115@gmail.com', 10, 0, '0000-00-00 00:00:00', '', 0, 0, 0, '', 'N4115', 'N4115', '', 1),
(40, 'Dimas Febrian Ramadhan', 'Ramadhan', 'ArTMKyZ42Gp5peK3rTdSya8fFTR9LBUw', '$2y$13$94NVqGEiN8W7R2/C068WrubiaAZI.ADJPrSrlxQDdf54qDZ/jdAWK', NULL, 'Ramadhan@gmail.com', 10, 0, '0000-00-00 00:00:00', '51', 5171, 0, 0, 'Kota Bali', '', '087777282844', '', 1),
(46, 'ALKSDJLFKJALKG', 'LJLSKDJFLKASJ', 'i1E-X1EzULLJ1udLtMcRRTDd1u7g2NJx', '$2y$13$64nvHJSB12QsSuJz5RO7M.QEFSsFCavM.e/RKUgpWB.vYLZ9q/rz.', NULL, 'KLSADJFLKA@LSAJDLK.COM', 10, 1498452794, '2017-06-26 12:53:56', '12', 1103, 0, 0, 'SDFASDF', 'SADFASDFASDF', '34324124312412', '', 1),
(48, '', 'mpampam', 'kndLWhRZwP7u8pIj6CdIM9F-naEn8FB4', '$2y$13$TgmAshjscj/ItRCXuWg6ZeAtOtOFRYAzgwubHp3UsiPQ6xqYjshLq', NULL, 'Mpampam5@gmail.com', 10, 1498479077, '0000-00-00 00:00:00', '', 0, 0, 0, '', '', '', '', 1),
(49, '', 'Mirapandie1983', 'FIHuUITo_vPaX1iNxMrQ3mPjMzGqtQfW', '$2y$13$Y1g7RpeNPss31U/JsIzd4.rJLHLQO8jTBaZQWqon11Zx3DXM2KRmK', NULL, 'Mirapandie1983@gmail.com', 10, 1498481494, '0000-00-00 00:00:00', '', 0, 0, 0, '', '', '', '', 1),
(50, '', 'administrator', 'xGOv8nsuxV2j2pMij9orFajIs1FB2i6d', '$2y$13$gDiiIJhgiRKzZ538RLnTf.t1x0VNCt75sZXvoU8eGgVW21VRPCN1q', NULL, 'administrator@gmail.com', 10, 1498487147, '0000-00-00 00:00:00', '', 0, 0, 0, '', '', '', '', 1),
(51, '', 'admin', 'kKbFPFvDULFA5ZYrFtF_GGWhw9rXnAB9', '$2y$13$EsYG0XfyY3yRyAcxRJlsIu1f5PBwvH.QYYlIHdFtQFTsmBxDyYsNe', NULL, 'admin@gmail.com', 10, 1498487184, '0000-00-00 00:00:00', '', 0, 0, 0, '', '', '', '', 1),
(52, '''', 'msstoci', 'ymeJBPPCfnzyTtcFc5Fv7lerEdA-8fDx', '$2y$13$HSy2Cd2NYUEbMHVsqSYxFuKdFKsfAJwfsv5bkv/sS9SuDznfND42S', NULL, 'a2n_chomod@yahoo.com', 10, 1498490327, '2017-06-26 23:20:32', '14', 1403, 0, 0, 'HGJGH', 'JGH', '7', '', 1),
(54, 'Abu Rozak', 'roozzak', 'jQIT3oP-SfJXTsW-MBlPoMq3Bsh5EzG-', '$2y$13$.S1Vgv6sTz8shsiwFbUBZO.i4ae80ONm11pI3G7iakmGP8jH9P1M6', NULL, 'roozzak@gmail.com', 10, 1498506999, '2017-06-27 03:59:01', '31', 3174, 0, 0, 'disini', '', '08888', '', 1),
(57, 'sdfasdfdsafdas', 'sfsdfasdg@asff.com', '5ul2KUeR3kZP5sepDsOevc2E1f1NYIVR', '$2y$13$CTtrgmC0xpVd2VR5FRjmC.c4l2wvA7xSBIY06lZqAABSjc35ZMhpy', NULL, 'sfsdfasdg@asff.com', 10, 1498561681, '2017-06-27 19:08:59', '12', 1101, 0, 0, 'sdfsadf', 'sdfdasf', '23234523452345', '', 1),
(58, '', 'ksdjfhjksadh', 'legS-VqgGmhPC-_LzC1EwQw3pv19Lf7X', '$2y$13$mEpEfrAvTThbSQEUMF8rl.yZEcaimWYiF69SkSaTyVld.ERvWLcli', NULL, 'jdshksdjfhjk@kdsfs.com', 10, 1498617978, '0000-00-00 00:00:00', '', 0, 0, 0, '', '', '', '', 1),
(59, 'moh syarif', 'katchonk', 'WGuyUuMpF7l9lOErtLBrE2ulzz7WdfWE', '$2y$13$zJGg4FF0JI/sRd9/VqefEuTis2KE0bfM9tNlCZO..f8874sNjftuy', NULL, 'cadkatchonk@gmail.com', 10, 1498623952, '2017-06-28 12:40:11', '35', 3528, 0, 0, 'pal daya 1, palengaan daya', '', '085331933441', '', 1),
(62, '', 'mohhax354@gmail.com', 'OGx-9TbNl-5OWgfNX-deiuWkjSXFAUzY', '$2y$13$vcE8KHPCG.ucRe0ZWRCyzef6UV8s0W4ReHvfFPnb8RuIQDzASMOhu', '6U7YxllyPam5sjU_Sz68bE_G1c0yeciM_1498745057', 'mohhax354@gmail.com', 10, 1498745057, '0000-00-00 00:00:00', '', 0, 0, 0, '', '', '', '', 1),
(75, 'Oktofianus Kanni', 'oktafianus_mks@yahoo.co.id', 'iG02wVbGzTiHn4rBLIK8VVzlNJNEg-47', '$2y$13$ejtYZ37etPJf0Nebe.uWCuyQ5MzHdBPhtJrPkP1Af6TbjVY8466VS', 'IjxY4_s_FU7npZ6r-3U-uGPX_cj2R4Lx_1498813013', 'oktafianus_mks@yahoo.co.id', 10, 1498813013, '2017-06-30 23:26:53', '73', 7371, 0, 0, 'fsdg', '', '081355242616', '', 1),
(77, '', 'cvkcxlvjlcxk@gmail.com', 'REn-nzpeNHddLB5cqt3mxNKm8UTAol51', '$2y$13$unTh2HPx3BIXPCHk7XvsW.VBfGtzeRrCqTLS5/nyRJCDhXAU3C6j2', NULL, 'cvkcxlvjlcxk@gmail.com', 10, 1498814383, '0000-00-00 00:00:00', '', 0, 0, 0, '', '', '', '', 1),
(78, 'Si Beduls', 'si_beduls@yahoo.com', '7rrSNyzyRM9Rpt0Oc3GeprMlB44h2a_4', '$2y$13$geTfdoWeEyf28EA3j6wkJ.dT9vKFY79fNgwVCJtbcJj1GeL9frcZS', 'BT2yZ4X-ajv2tb0F3Rckhm-PKFf8501K_1498835487', 'si_beduls@yahoo.com', 10, 1498835487, '0000-00-00 00:00:00', '', 0, 0, 0, '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `user_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hub_email` varchar(100) NOT NULL,
  `no_telp1` varchar(100) NOT NULL,
  `no_telp2` varchar(100) NOT NULL,
  `pin_bb` varchar(100) NOT NULL,
  `hub_wa` varchar(100) NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  `province_id` int(11) NOT NULL,
  `regency_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE IF NOT EXISTS `villages` (
  `village_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-auth-user_id-user-id` (`user_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `districts_id_index` (`regency_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `berita_id` (`berita_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD PRIMARY KEY (`regency_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_detail_id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`village_id`),
  ADD KEY `villages_district_id_index` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `fk-auth-user_id-user-id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `beritas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `beritas_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`regency_id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`berita_id`) REFERENCES `beritas` (`berita_id`);

--
-- Constraints for table `regencies`
--
ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`province_id`);

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`district_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
