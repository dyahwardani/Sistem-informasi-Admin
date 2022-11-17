-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 01:57 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nayfa_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'galang', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `berangkat`
--

CREATE TABLE IF NOT EXISTS `berangkat` (
`id_berangkat` int(10) NOT NULL,
  `id_supir` int(10) NOT NULL,
  `id_rekan` int(10) NOT NULL,
  `id_mobil` int(10) NOT NULL,
  `tanggal_jemput` varchar(50) NOT NULL,
  `jam_pulang` varchar(50) NOT NULL,
  `jam_berangkat` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berangkat`
--

INSERT INTO `berangkat` (`id_berangkat`, `id_supir`, `id_rekan`, `id_mobil`, `tanggal_jemput`, `jam_pulang`, `jam_berangkat`) VALUES
(16, 1, 0, 1, '12/01/2016', '10.00', '13.00'),
(17, 1, 0, 1, '12/02/2016', '09.00', '14.00'),
(18, 1, 0, 1, '12/09/2016', '09.00', '09.00'),
(19, 1, 0, 1, '12/13/2016', '', '13.00'),
(20, 1, 0, 1, '12/28/2016', '', '13.00'),
(21, 2, 0, 2, '12/28/2016', '', '14.00'),
(22, 2, 0, 1, '12/30/2016', '', '13.00'),
(23, 2, 0, 1, '12/31/2016', '', ''),
(24, 1, 0, 1, '01/01/2017', '', '13.00'),
(25, 2, 0, 2, '01/01/2017', '', '15.00'),
(26, 1, 0, 1, '01/05/2017', '', '07:06'),
(27, 1, 0, 1, '01/06/2017', '', '09:00'),
(28, 2, 0, 2, '01/06/2017', '', '09:00'),
(29, 1, 0, 1, '01/07/2017', '', '09:00'),
(30, 1, 0, 1, '01/08/2017', '12:00', '09:00'),
(31, 2, 0, 2, '01/08/2017', '13:00', '09:00'),
(32, 1, 0, 1, '08/02/2020', '17.00', '09.00'),
(33, 4, 0, 1, '08/03/2020', '21.00', '12.00'),
(34, 2, 0, 2, '08/03/2020', '15.00', '09.00'),
(35, 4, 0, 3, '08/03/2020', '21.00', '15.00'),
(36, 1, 2, 4, '08/03/2020', '17.00', '08.00'),
(37, 4, 0, 1, '08/04/2020', '21.00', '15.00'),
(38, 1, 0, 2, '08/04/2020', '23.00', '17.00'),
(39, 2, 0, 1, '08/07/2020', '21.00', '12.00'),
(40, 4, 0, 1, '08/08/2020', '13.00', '08.00'),
(41, 2, 0, 1, '08/09/2020', '15.00', '09.00'),
(42, 1, 0, 2, '08/09/2020', '22.00', '11.00'),
(43, 1, 0, 3, '', '15.00', '08.00'),
(44, 1, 0, 1, '08/10/2020', '13.00', '08.00'),
(45, 3, 0, 3, '08/10/2020', '17.00', '11.00'),
(46, 2, 0, 1, '08/15/2020', '21.00', '09.00');

-- --------------------------------------------------------

--
-- Table structure for table `departure_juanda`
--

CREATE TABLE IF NOT EXISTS `departure_juanda` (
`id_depart` int(225) NOT NULL,
  `maskapai` varchar(225) NOT NULL,
  `flight` varchar(225) NOT NULL,
  `menuju` varchar(225) NOT NULL,
  `jam` varchar(225) NOT NULL,
  `term` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departure_juanda`
--

INSERT INTO `departure_juanda` (`id_depart`, `maskapai`, `flight`, `menuju`, `jam`, `term`, `status`) VALUES
(1, 'Citilink', 'QG806', 'JAKARTA', '21:00', 'T1', 'Final Call'),
(2, 'Air Asia', 'XT-7681', 'JAKARTA', '21:45', 'T2', 'Ke Ruang Tunggu'),
(3, 'Garuda Indonesia', 'GA-331', 'JAKARTA', '21:50', 'T2', 'No Operate'),
(4, 'CitiLink', 'QG816', 'HalimPK', '05:05', 'T1', 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `dt_rekanan`
--

CREATE TABLE IF NOT EXISTS `dt_rekanan` (
`id_rekan` int(10) NOT NULL,
  `nm_rekan` varchar(225) NOT NULL,
  `alamat_rekan` varchar(225) NOT NULL,
  `no_hp` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_rekanan`
--

INSERT INTO `dt_rekanan` (`id_rekan`, `nm_rekan`, `alamat_rekan`, `no_hp`) VALUES
(2, 'Nahwa Tour', 'Malang', '087334543123'),
(3, 'Abimanyu', 'Malang', '081228345812'),
(4, 'Puri Tour', 'Malang', '081339110220'),
(5, '-', 'Malang', '089009223123');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
`id_keuangan` int(225) NOT NULL,
  `tanggal_keuangan` date NOT NULL,
  `c_order` varchar(225) NOT NULL,
  `tagihan` bigint(225) NOT NULL,
  `uang_saku` bigint(225) NOT NULL,
  `bbm` bigint(225) NOT NULL,
  `tol` bigint(225) NOT NULL,
  `parkir` bigint(225) NOT NULL,
  `fee_driver` bigint(225) NOT NULL,
  `nama_driver` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `tanggal_keuangan`, `c_order`, `tagihan`, `uang_saku`, `bbm`, `tol`, `parkir`, `fee_driver`, `nama_driver`) VALUES
(1, '2016-11-19', 'TRAVEL 03.00', 820000, 100000, 100000, 13000, 12000, 175000, 'Darmo'),
(2, '2016-11-19', 'TRAVEL 03.00', 640000, 100000, 100000, 16500, 12000, 120000, 'Junaidi'),
(3, '2016-11-20', 'MSC003', 890000, 100000, 100000, 13000, 12000, 175000, 'Junaidi'),
(4, '2016-11-20', 'MSPFY17', 820000, 100000, 100000, 13000, 12000, 175000, 'Junaidi'),
(5, '2020-07-31', 'TRAVEL 03.00', 800000, 100000, 100000, 15000, 12000, 150000, 'Darmo'),
(6, '2020-07-31', 'TRAVEL 03.00', 700000, 100000, 100000, 16000, 12000, 130000, 'Junaidi'),
(7, '2020-08-02', 'TRAVEL 03.00', 700000, 100000, 100000, 15000, 12000, 150000, 'Darmo'),
(8, '2020-08-02', 'MSC003', 800000, 100000, 100000, 16000, 12000, 170000, 'Junaidi'),
(9, '2020-08-02', 'MSC003', 750000, 100000, 100000, 15000, 12000, 160000, 'Darmo'),
(10, '2020-08-02', 'TRAVEL 03.00', 600000, 100000, 100000, 15000, 12000, 155000, 'Junaidi');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
`id_mobil` int(10) NOT NULL,
  `nama_mobil` varchar(225) NOT NULL,
  `jenis_mobil` varchar(225) NOT NULL,
  `plat_nomer` varchar(225) NOT NULL,
  `jum_seat` int(11) DEFAULT NULL,
  `jum_duduk` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `jenis_mobil`, `plat_nomer`, `jum_seat`, `jum_duduk`) VALUES
(1, 'Avanza', 'Van', 'N1234MM', 2, 6),
(2, 'Xenia', 'Van', 'N2233ZX', 3, 6),
(3, 'Mobilio', 'Van', 'N4551ZX', 3, 6),
(4, 'Kijang Innova', 'Van', 'N3245XC', 3, 6),
(5, 'Ertiga', 'suzuki', 'N9000KL', 3, 6),
(6, 'Kijang Innova', 'Van', 'N4566CC', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `nayfa`
--

CREATE TABLE IF NOT EXISTS `nayfa` (
`id_nayfa` int(10) NOT NULL,
  `nama_perusahan` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nayfa`
--

INSERT INTO `nayfa` (`id_nayfa`, `nama_perusahan`, `alamat`, `no_telp`) VALUES
(1, 'Nayfa travel', 'Perum Griya Sampoerna Blok C3 No 3 Karangploso Malang', '081333665909 (Telkomsel)\n\n082330200031 (Telkomsel)\n\n081945144494 (XL)\n\n2B4ECBB8 (PIN BB)');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
`id_operator` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `username`, `password`) VALUES
(1, 'galang', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE IF NOT EXISTS `sewa` (
`id_sewa` int(225) NOT NULL,
  `id_rekan` int(225) DEFAULT NULL,
  `tanggal_jemput` varchar(225) DEFAULT NULL,
  `jam_jemput` varchar(100) DEFAULT NULL,
  `nama_sewa` varchar(225) DEFAULT NULL,
  `no_hp` varchar(225) DEFAULT NULL,
  `alamat_jemput` varchar(225) DEFAULT NULL,
  `alamat_antar` varchar(225) DEFAULT NULL,
  `paket` varchar(225) DEFAULT NULL,
  `harga_sewa` bigint(225) DEFAULT NULL,
  `tanggal_booking` varchar(225) DEFAULT NULL,
  `jam_booking` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_rekan`, `tanggal_jemput`, `jam_jemput`, `nama_sewa`, `no_hp`, `alamat_jemput`, `alamat_antar`, `paket`, `harga_sewa`, `tanggal_booking`, `jam_booking`, `status`) VALUES
(15, 2, '08/02/2020', '09:00', 'Dyah Wardani', '081-390-648-992', 'malang', 'blitar', 'FD 12 Jam', 100000, '08/01/2020', '09:00', NULL),
(16, 3, '08/03/2020', '11:15', 'Siti Mardiyah', '089-609-271-744', 'Malang', 'Sidoarjo', 'FD 12 Jam', 300000, '08/02/2020', '09:00', NULL),
(17, 3, '08/03/2020', '09:00', 'Endah Ratih', '081-229-881-222', 'Malang', 'Sidoarjo', '12 Jam', 130000, '08/03/2020', '07:00', NULL),
(18, 1, '08/04/2020', '15:00', 'NIKO', '085-555-112-233', 'malang', 'surabaya', 'Drop', 130000, '08/04/2020', '09:00', NULL),
(19, 1, '08/04/2020', '12:00', 'Dika', '072-998-172-899', 'Surabaya', 'Blitar', '12 Jam', 100000, '08/04/2020', '08:00', NULL),
(20, 1, '08/04/2020', '18:00', 'Coki sitohang', '000-000-000-000', 'Blitar', 'Sidoarjo', 'Drop', 150000, '08/04/2020', '16:00', '1'),
(21, 1, '08/04/2020', '13:00', 'doni setiawan', '099-900-990-000', 'Sidoarjo', 'Blitar', 'FD 12 Jam', 200000, '08/04/2020', '07:00', '1'),
(22, 5, '08/09/2020', '09:00', 'Nanik', '082-338-902-119', 'Malang', 'Surabaya', 'FD 12 Jam', 100000, '08/09/2020', '08:00', '1'),
(23, 5, '08/09/2020', '11:00', 'Doni', '078-998-211-900', 'Surabaya', 'Malang', 'FD', 90000, '08/09/2020', '09:00', '1'),
(24, 5, '08/09/2020', '12:00', 'didit', '086-778-119-911', 'Blitar', 'Sidoarjo', '12 Jam', 100000, '08/09/2020', '09:00', '1'),
(25, 5, '08/09/2020', '11:00', 'sendy', '089-889-112-299', 'malang', 'blitar', '12 Jam', 100000, '08/09/2020', '05:00', '1'),
(26, 5, '08/09/2020', '12:00', 'fafa', '077-788-899-901', 'blitar', 'surabaya', 'FD 12 Jam', 120000, '08/09/2020', '09:00', '1'),
(27, 5, '08/09/2020', '11:00', 'sika', '099-009-922-111', 'blitar', 'malang', '12 Jam', 100000, '08/09/2020', '08:00', '1'),
(28, 3, '08/09/2020', '08:00', 'cicik', '111-111-111-110', 'Blitar', 'Sidoarjo', 'Drop', 100, '08/09/2020', '06:00', '1'),
(29, 4, '08/09/2020', '13:00', 'dinda1', '128-889-900-000', 'malang', 'surabaya', 'FD', 120000, '08/09/2020', '08:00', '1'),
(30, 4, '08/09/2020', '09:20', 'sita', '099-893-788-111', 'Blitar', 'Malang', '12 Jam', 120, '08/09/2020', '08:00', '1'),
(31, 5, '08/09/2020', '11:00', 'didin', '189-022-999-011', 'blitar', 'surabaya', '12 Jam', 100000, '08/09/2020', '07:00', '1'),
(32, 5, '08/10/2020', '13:00', 'SINDI', '087-665-112-211', 'Malang', 'Surabaya', 'FD 12 Jam', 100000, '08/10/2020', '05:00', '1'),
(33, 4, '08/10/2020', '12:00', 'SITA', '087-656-611-728', 'Surabaya', 'Blitar', '12 Jam', 120000, '08/10/2020', '08:00', '1'),
(34, 5, '08/10/2020', '14:00', 'SONI', '087-998-872-721', 'Sidoarjo', 'Surabaya', 'Drop', 100000, '08/10/2020', '08:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sewa_berangkat`
--

CREATE TABLE IF NOT EXISTS `sewa_berangkat` (
`id_sewaberangkat` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_berangkat` int(11) NOT NULL,
  `id_rekan` int(225) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa_berangkat`
--

INSERT INTO `sewa_berangkat` (`id_sewaberangkat`, `id_sewa`, `id_berangkat`, `id_rekan`, `status`, `keterangan`) VALUES
(1, 20, 37, 1, '1', 'pergi'),
(2, 21, 38, 1, '1', 'pergi'),
(3, 22, 42, 1, '1', 'pergi'),
(4, 23, 42, 1, '1', 'pergi'),
(5, 24, 42, 4, '1', 'pulang'),
(6, 25, 42, 2, '1', 'pulang'),
(7, 26, 42, 1, '1', 'pergi'),
(8, 27, 42, 4, '1', 'pulang'),
(9, 28, 41, 1, '1', 'pulang'),
(10, 29, 41, 5, '1', 'pergi'),
(11, 30, 41, 5, '1', 'pergi'),
(12, 31, 41, 5, '1', 'pulang'),
(13, 32, 44, 5, '1', 'pulang'),
(14, 33, 44, 5, '1', 'pergi'),
(15, 34, 44, 4, '1', 'pergi');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE IF NOT EXISTS `supir` (
`id_supir` int(10) NOT NULL,
  `ktp` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `nohp` varchar(225) NOT NULL,
  `tanggal_lahir` varchar(225) NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`id_supir`, `ktp`, `nama`, `alamat`, `nohp`, `tanggal_lahir`, `tempat_lahir`) VALUES
(1, '111223-456789-0000', 'agung teguh wa', 'malang', '978-787-878-878', '11/10/2016', 'kediri'),
(2, '121212-121212-1212', 'arief', '<p>kediri</p>', '454-545-454-544', '11/03/2016', 'kediri'),
(3, '121212-121212-1212', 'arief', '<p>kediri</p>', '454-545-454-544', '11/03/2016', 'kediri'),
(4, '999999-999999-9999', 'dyah', 'cepu', '090-990-909-090', '07/08/2020', 'blora');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE IF NOT EXISTS `travel` (
`id_travel` int(10) NOT NULL,
  `id_rekan` int(10) DEFAULT NULL,
  `jam_jemput` varchar(225) DEFAULT NULL,
  `tanggal_jemput` varchar(225) DEFAULT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `hp` varchar(225) DEFAULT NULL,
  `alamat_jemput` text,
  `ket_antar` text,
  `rute` varchar(225) DEFAULT NULL,
  `seat` varchar(225) DEFAULT NULL,
  `jum_seat` decimal(10,0) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `jadwal_booking` varchar(225) DEFAULT NULL,
  `waktu_booking` varchar(225) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id_travel`, `id_rekan`, `jam_jemput`, `tanggal_jemput`, `nama`, `hp`, `alamat_jemput`, `ket_antar`, `rute`, `seat`, `jum_seat`, `harga`, `jenis`, `jadwal_booking`, `waktu_booking`, `keterangan`, `status`) VALUES
(6, 0, '10.00', '12/13/2016', 'Agung teguh', '085-649-633-443', '<p>perum aston blok i3 nomor 8</p>', '<p>juanda sidoarjo</p>', 'MLG-SBY', '2', '5', '100000', 'BA', '01/12/2016', '10:17:35', 'penumpang', '1'),
(7, 0, '09.00', '12/13/2016', 'Agung teguh', '085-649-633-443', '<p>perumahan asrikaton blok i3 nomor 8</p>', '<p>juanda surabaya</p>', 'MLG-SBY', '2', '5', '100000', 'BA', '02/12/2016', '06:37:30', 'penumpang', '1'),
(8, 0, '12.00', '12/13/2016', 'Ayska', '087-655-261-626', '<p>Perumahan griyasanta blok i9 nomor 3</p>', '<p>juanda sby</p>', 'MLG-JND', '3', '5', '100000', 'BA', '02/12/2016', '06:50:31', 'penumpang', '1'),
(9, 0, '09.00', '12/13/2016', 'agung twa', '085-649-633-443', '<p>perumahan asrikaton indah</p>', '<p>surabay</p>', 'MLG-SBY', '2', '3', '100000', 'BA', '06/12/2016', '17:36:14', 'penumpang', '1'),
(10, 0, '09.00', '12/13/2016', 'ggfg', '808-978-776-543', '<p>kjkh</p>', '<p>jhjh</p>', 'MLG-SBY', '3', '2', '100000', 'BA', '06/12/2016', '21:06:00', 'penumpang', '1'),
(11, 0, '09.00', '12/13/2016', 'ahgung', '098-777-666-666', '<p>jjhdjhsdjshjs</p>', '<p>jsdhjdssjhl</p>', 'MLG-SBY', '2', '3', '100000', 'BA', '06/12/2016', '12:58:46', 'penumpang', '1'),
(12, 0, '12.11', '12/28/2016', 'Heru', '098-778-987-889', '<p>mdklscmc kjc jncjsdln</p>', '<p>,mclacnascascjlnascl</p>', 'MLG-SBY', '9', '12', '900000', 'BA', '28/12/2016', '11:39:43', 'penumpang', '1'),
(13, 0, '09.00', '12/30/2016', 'Galang AS', '908-098-908-090', '<p>ascsacsacacs</p>', '<p>cascsascascsacasc</p>', 'MLG-SBY', '04', '12', '999999', 'BA', '30/12/2016', '22:11:38', 'penumpang', '1'),
(14, 0, '09.00', '01/01/2017', 'ascsacasc', '908-923-101-391', '<p>caklnsapc;</p>', '<p>cansal</p>', 'MLG-SBY', '12', '12', '999999', 'BA', '01/01/2017', '20:17:15', 'penumpang', '1'),
(15, 0, '15.00', '01/01/2017', 'kndvjkdfvsl', '921-301-302-132', '<p>acsbcsahkcnsascjbakscba</p>', '<p>ajnskcanbska</p>', 'MLG-SBY', '11', '13', '989890', 'BA', '01/01/2017', '21:45:23', 'penumpang', '1'),
(16, 0, '08.00', '01/01/2017', 'gyhjyrh', '563-453-453-523', '<p>cdvfbdhfjtjdgffdvv</p>', '<p>vdshdyjyuyjftdnfbddfbesbtbrstbdfbtf</p>', 'MLG-SBY', '2', '12', '777777', 'BA', '01/01/2017', '22:10:01', 'penumpang', '1'),
(17, 0, '02.00', '01/01/2017', 'jjjskcnaoslkca', '093-404-320-948', '<p>casfjgdgfndfbsdvdv</p>', '<p>dfghegs</p>', 'MLG-SBY', '3', '11', '888888', 'LA', '01/01/2017', '23:27:46', 'penumpang', '1'),
(18, 0, '09.00', '01/05/2017', 'Galang AS', '898-990-890-809', '<p>cacascascsacsac</p>', '<p>sacsacsacasc</p>', 'MLG-SBY', '04', '12', '120000', 'BA', '05/01/2017', '01:20:13', 'penumpang', '1'),
(19, 0, '09.00', '01/05/2017', 'Irfan', '989-090-090-909', '<p>cascacasc</p>', '<p>ascsacasc</p>', 'BT-JND', '05', '12', '999999', 'BA', '05/01/2017', '18:55:02', 'penumpang', '1'),
(20, 0, '09.00', '01/06/2017', 'Galang AS', '123-254-535-435', '<p>ascvdsdsfdaC</p>', '<p>cvascgdfsFwe</p>', 'MLG-SBY', '04', '12', '878788', 'LA', '06/01/2017', '09:32:16', 'penumpang', '1'),
(21, 0, '12.00', '01/06/2017', 'John Doe', '384-829-394-891', '<p>kasncjabcao</p>', '<p>kacmnjacnajl</p>', 'MLG-SBY', '12', '21', '984839', 'LA', '06/01/2017', '09:33:33', 'paket', '1'),
(22, 0, '09.00', '01/07/2017', 'Pandu', '798-797-967-988', '<p>nbjgchk</p>', '<p>jbhkjb</p>', 'MLG-SBY', '1', '12', '888888', 'BA', '06/01/2017', '19:18:08', 'penumpang', '1'),
(23, 0, '10.00', '01/07/2017', 'John Doe', '213-214-354-353', '<p>ascmnasjc</p>', '<p>aksjncsjaicb</p>', 'MLG-SBY', '12', '12', '989090', 'BA', '07/01/2017', '20:38:27', 'penumpang', '1'),
(24, 0, '09.00', '01/08/2017', 'Galang AS', '823-019-283-190', '<p>ascdsvcsac</p>', '<p>cafegeacq</p>', 'MLG-SBY', '05', '12', '120000', 'BA', '08/01/2017', '19:44:25', 'penumpang', '1'),
(25, 0, '12.00', '01/08/2017', 'Mr reming', '928-391-203-812', '<p>acsacnasjco</p>', '<p>ac jskcbascaocnlao</p>', 'SBY-MLG', '2', '12', '210000', 'BA', '08/01/2017', '19:45:59', 'penumpang', '1'),
(26, 2, '23:00', '07/26/2020', 'Dyah Wardani', '089-898-637-281', 'Malang', 'Surabaya', 'MLG-SBY', '2', '2', '0', 'LA', '26/07/2020', '21:42:45', 'penumpang', '0'),
(28, 3, '05:00', '07/30/2020', 'sinta', '089-778-667-888', 'blitar', 'sidoarjo', 'MLG-SBY', '1', '2', '200000', 'BA', '27/07/2020', '20:46:30', 'penumpang', '1'),
(29, 2, '09:00', '07/30/2020', 'nita', '089-789-667-890', 'mlg', 'jombang', 'MLG-JND', '2', '2', '100000', 'BA', '30/07/2020', '14:34:31', 'Penumpang', '1'),
(31, 2, '08:00', '07/28/2020', 'dyahwar', '089-778-667-888', 'blitar', 'sidoarjo', 'MLG-SDR', '1', '2', '100000', 'LA', '28/07/2020', '20:13:48', 'penumpang', '1'),
(32, 2, '08:00', '07/28/2020', 'NANDA', '089-989-123-478', 'malang', 'surabaya', 'MLG-SBY', '2', '2', '100000', 'LA', '28/07/2020', '20:18:06', 'penumpang', '1'),
(33, 2, '08:00', '07/28/2020', 'DITAwardani', '090-909-090-909', 'malang', 'surabaya', 'MLG-SBY', '1', '1', '0', 'LA', '30/07/2020', '14:36:30', 'Penumpang', '1'),
(35, 2, '08:00', '07/31/2020', 'TONDIa', '081-909-909-090', 'SIDOARJO', 'SURABAYA', 'SDR-SBY', '2', '2', '0', 'BA', '30/07/2020', '15:25:06', 'Penumpang', '1'),
(36, 3, '09:00', '08/03/2020', 'Siti Setyorini', '083-853-127-978', 'Lowokwaru', 'Krian', 'MLG-SDR', '3', '2', '120000', 'BA', '03/08/2020', '11:25:20', 'Penumpang', '1'),
(37, 3, '09:00', '08/03/2020', 'Siti Rini', '085-775-123-678', 'Blitar', 'Malang', 'BT-MLG', '2', '3', '120000', 'BA', '03/08/2020', '11:47:06', 'penumpang', '1'),
(38, 3, '11:00', '08/03/2020', 'Eko Setyawan', '021-223-990-111', 'Krian', 'Surabaya', 'SDR-SBY', '1', '1', '100000', 'BA', '03/08/2020', '12:11:47', 'penumpang', '1'),
(39, 1, '09:00', '08/03/2020', 'Andi', '089-709-667-189', 'Malang', 'Sidoarjo', 'MLG-SDR', '2', '2', '100000', 'BA', '03/08/2020', '20:49:10', 'penumpang', '1'),
(40, 1, '09:00', '08/04/2020', 'KIKI', '081-111-222-333', 'surabaya', 'malang', 'SBY-MLG', '2', '2', '100000', 'LA', '04/08/2020', '13:08:47', 'penumpang', '1'),
(41, 1, '11:00', '08/04/2020', 'Siska', '031-999-883-678', 'Blitar', 'Malang', 'BT-MLG', '3', '2', '120000', 'LA', '04/08/2020', '15:04:39', 'penumpang', '1'),
(42, 1, '11:00', '08/04/2020', 'sandi negara', '088-888-888-888', 'surabaya', 'blitar', 'SBY-BT', '2', '2', '110000', 'LA', '04/08/2020', '17:14:54', 'penumpang', '1'),
(43, 1, '14:00', '08/04/2020', 'Nonik ', '083-824-112-345', 'wonokromo', 'krian', 'SBY-SDR', '2', '2', '0', 'LA', '04/08/2020', '19:22:43', 'penumpang', '1'),
(44, 3, '06:00', '08/04/2020', 'Cicik', '082-339-102-933', 'Malang', 'Sidoarjo', 'MLG-SDR', '2', '2', '100000', 'BA', '04/08/2020', '19:35:41', 'penumpang', '1'),
(45, 5, '12:00', '08/04/2020', 'Tiya', '999-999-999-999', 'Malang', 'Surabya', 'MLG-SBY', '1', '1', '100000', 'LA', '04/08/2020', '20:13:43', 'penumpang', '1'),
(46, 5, '11:00', '08/04/2020', 'Sela', '888-888-888-888', 'Lowokwaru', 'Wonokromo', 'MLG-SBY', '3', '2', '100000', 'LA', '04/08/2020', '20:16:28', 'penumpang', '1'),
(47, 5, '09:00', '08/07/2020', 'Dyah Wardani', '082-887-117-822', 'Malang', 'Sidoarjo', 'MLG-SDR', '2', '2', '100000', 'LA', '07/08/2020', '19:30:17', 'penumpang', '1'),
(48, 5, '09:00', '08/07/2020', 'Sendy', '089-227-189-277', 'Malang', 'Surabaya', 'MLG-SBY', '3', '1', '100000', 'LA', '07/08/2020', '19:33:26', 'penumpang', '1'),
(49, 5, '07:00', '08/07/2020', 'Dika', '085-447-998-290', 'Malang', 'Sidoarjo', 'MLG-SDR', '2', '1', '100000', 'LA', '07/08/2020', '19:36:04', 'penumpang', '1'),
(50, 5, '08:00', '08/07/2020', 'Sinta', '085-778-726-718', 'Malang', 'Surabaya', 'MLG-SBY', '2', '1', '100000', 'LA', '07/08/2020', '20:06:29', 'penumpang', '1'),
(51, 0, '09:00', '08/08/2020', 'kokok', '086-889-182-911', 'malang', 'surabaya', 'MLG-SDR', '2', '2', '150000', 'LA', '15/08/2020', '20:42:01', 'Penumpang', '1'),
(52, 5, '09:00', '08/08/2020', 'siko', '111-111-111-112', 'malang', 'wonokromo', 'MLG-SBY', '1', '1', '100000', 'LA', '08/08/2020', '22:45:22', 'penumpang', '1'),
(53, 5, '08:00', '08/08/2020', 'sisi', '999-090-292-920', 'sidoarjo', 'surabaya', 'SDR-SBY', '1', '1', '0', 'LA', '08/08/2020', '22:56:34', 'penumpang', '1'),
(54, 5, '12:00', '08/08/2020', 'Andik', '087-889-898-000', 'wonokromo', 'Blitar', 'SBY-BT', '3', '1', '120000', 'LA', '09/08/2020', '10:09:27', 'penumpang', '1'),
(55, 5, '13:00', '08/08/2020', 'salma', '087-112-223-334', 'sidoarjo', 'surabaya', 'SDR-SBY', '2', '2', '0', 'LA', '09/08/2020', '10:40:58', 'penumpang', '1'),
(56, 2, '09:10', '08/09/2020', 'dyahw', '898-989-898-980', 'Sidoarjo', 'Blitar', 'SDR-BT', '1', '1', '110000', 'LA', '09/08/2020', '12:42:14', 'Penumpang', '1'),
(57, 5, '09:00', '08/09/2020', 'ciki', '909-999-999-999', 'malang', 'surabaya', 'MLG-SBY', '2', '3', '100000', 'LA', '09/08/2020', '12:51:05', 'penumpang', '1'),
(58, 3, '12:20', '08/09/2020', 'Siti', '089-998-399-999', 'Malang', 'Blitar', 'MLG-BT', '3', '2', '120000', 'LA', '09/08/2020', '14:54:43', 'Penumpang', '1'),
(59, 5, '09:00', '08/09/2020', 'dika', '089-909-098-291', 'mlg', 'sby', 'MLG-SBY', '1', '1', '100000', 'LA', '09/08/2020', '14:55:27', 'penumpang', '1'),
(60, 5, '09:00', '08/09/2020', 'sita', '888-888-888-800', 'mlg', 'sby', 'MLG-SBY', '1', '1', '100000', 'LA', '09/08/2020', '15:00:33', 'penumpang', '1'),
(61, 5, '08:00', '08/09/2020', 'zeta', '777-777-777-777', 'mlg', 'sby', 'MLG-SBY', '2', '2', '0', 'LA', '09/08/2020', '15:01:16', 'penumpang', '1'),
(62, 5, '09:00', '08/09/2020', 'momo', '087-999-890-988', 'mlg', 'blitar', 'MLG-BT', '2', '2', '100000', 'LA', '09/08/2020', '16:05:56', 'penumpang', '1'),
(63, 5, '07:00', '08/09/2020', 'sisi', '777-898-998-999', 'mlg', 'sby', 'MLG-SBY', '1', '1', '100000', 'LA', '09/08/2020', '16:06:52', 'penumpang', '1'),
(64, 5, '09:00', '08/09/2020', 'didik', '222-222-222-222', 'mlg', 'sby', 'MLG-SBY', '2', '2', '100000', 'LA', '09/08/2020', '16:21:51', 'penumpang', '1'),
(65, 5, '07:00', '08/09/2020', 'joni', '555-556-556-656', 'mlg', 'sdr', 'MLG-SDR', '1', '1', '100000', 'LA', '09/08/2020', '16:22:35', 'penumpang', '1'),
(66, 5, '09:00', '08/09/2020', 'niko', '089-998-009-279', 'sdr', 'sby', 'SDR-SBY', '1', '1', '100000', 'LA', '09/08/2020', '16:27:15', 'penumpang', '1'),
(67, 5, '08:00', '08/09/2020', 'adi', '078-891-827-288', 'sdr', 'blitar', 'SDR-BT', '2', '2', '100000', 'LA', '09/08/2020', '16:27:52', 'penumpang', '1'),
(68, 5, '', '08/10/2020', '', '087-667-227-222', 'Blitar', 'Malang', 'BT-MLG', '1', '2', '100000', 'LA', '10/08/2020', '14:32:11', 'penumpang', '1'),
(69, 2, '10:00', '08/10/2020', 'DISKA', '087-998-123-562', 'Blitar', 'Surabaya', 'BT-SBY', '1', '1', '120000', 'BA', '10/08/2020', '14:33:34', 'penumpang', '1'),
(70, 5, '12:00', '08/10/2020', 'Danila', '087-665-226-611', 'Blitar', 'Sidoarjo', 'BT-SDR', '2', '2', '130000', 'LA', '10/08/2020', '14:37:35', 'penumpang', '1'),
(71, 5, '09:00', '', '', '010-101-029-000', 'Malang', 'Surabaya', 'MLG-SBY', '1', '1', '100000', 'LA', '15/08/2020', '20:56:05', 'penumpang', '1'),
(72, 0, '11:00', '08/15/2020', 'CITRA', '080-009-920-000', 'Blitar', 'Malang', 'BT-MLG', '2', '2', '120000', 'BA', '15/08/2020', '21:17:27', 'Penumpang', '1'),
(73, 5, '11:00', '08/15/2020', 'ANJAS', '087-998-829-911', 'Sidoarjo', 'Blitar', 'SDR-BT', '1', '2', '120000', 'LA', '15/08/2020', '20:57:46', 'penumpang', '1'),
(74, 3, '13:00', '08/15/2020', 'TIKA', '066-718-199-999', 'Malang', 'Blitar', 'MLG-BT', '3', '1', '130000', 'BA', '15/08/2020', '20:58:30', 'penumpang', '1');

-- --------------------------------------------------------

--
-- Table structure for table `travel_berangkat`
--

CREATE TABLE IF NOT EXISTS `travel_berangkat` (
`id_keberangkatan` int(11) NOT NULL,
  `id_travel` int(11) DEFAULT NULL,
  `id_berangkat` int(11) DEFAULT NULL,
  `id_rekan` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_berangkat`
--

INSERT INTO `travel_berangkat` (`id_keberangkatan`, `id_travel`, `id_berangkat`, `id_rekan`, `status`, `keterangan`) VALUES
(3, 14, 24, NULL, '1', ''),
(7, 15, 24, NULL, '1', ''),
(8, 16, 25, NULL, '1', ''),
(9, 18, 26, NULL, '1', ''),
(10, 19, 26, NULL, '1', ''),
(11, 20, 27, NULL, '1', ''),
(12, 21, 27, NULL, '1', ''),
(13, 22, 29, NULL, '1', 'pulang'),
(14, 23, 29, NULL, '1', 'pergi'),
(15, 24, 30, NULL, '1', 'pergi'),
(16, 25, 30, NULL, '1', 'pulang'),
(17, 36, 33, 1, '1', 'pergi'),
(18, 37, 34, 2, '1', 'pergi'),
(19, 38, 33, 1, '1', 'pergi'),
(20, 39, 33, 1, '1', 'pergi'),
(21, 40, 37, 1, '1', 'pergi'),
(22, 41, 38, 1, '1', 'pergi'),
(23, 42, 38, 1, '1', 'pergi'),
(24, 43, 38, 1, '1', 'pergi'),
(25, 44, 37, 1, '1', 'pergi'),
(26, 45, 37, 1, '1', 'pergi'),
(27, 46, 37, 4, '1', 'pergi'),
(28, 47, 39, 2, '1', 'pulang'),
(29, 48, 39, 1, '1', 'pergi'),
(30, 49, 39, 1, '1', 'pergi'),
(31, 50, 39, 1, '1', 'pergi'),
(32, 51, 40, 3, '1', 'pergi'),
(33, 52, 40, 1, '1', 'pergi'),
(34, 53, 40, 1, '1', 'pergi'),
(35, 0, 40, 1, '1', 'pergi'),
(36, 55, 40, 3, '1', 'pulang'),
(37, 56, 41, 3, '1', 'pulang'),
(38, 57, 41, 3, '1', 'pulang'),
(39, 58, 41, 1, '1', 'pergi'),
(40, 59, 41, 1, '1', 'pergi'),
(41, 60, 41, 1, '1', 'pergi'),
(42, 61, 41, 1, '1', 'pergi'),
(49, 66, 41, 3, '1', 'pergi'),
(50, 67, 41, 4, '1', 'pulang'),
(51, 62, 42, 1, '1', 'pergi'),
(52, 63, 42, 1, '1', 'pulang'),
(53, 64, 42, 1, '1', 'pergi'),
(55, 68, 44, 5, '1', 'pergi'),
(56, 69, 44, 2, '1', 'pulang'),
(57, 70, 44, 5, '1', 'pulang'),
(58, 71, 46, 5, '1', 'pergi'),
(59, 72, 46, 4, '1', 'pergi'),
(60, 73, 46, 5, '1', 'pulang'),
(61, 74, 46, 3, '1', 'pulang');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE IF NOT EXISTS `tujuan` (
`id_tujuan` int(225) NOT NULL,
  `nama_lokasi` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `nama_lokasi`) VALUES
(1, 'SURABAYA'),
(2, 'BANDARA JUANDA'),
(3, 'BATU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berangkat`
--
ALTER TABLE `berangkat`
 ADD PRIMARY KEY (`id_berangkat`);

--
-- Indexes for table `departure_juanda`
--
ALTER TABLE `departure_juanda`
 ADD PRIMARY KEY (`id_depart`);

--
-- Indexes for table `dt_rekanan`
--
ALTER TABLE `dt_rekanan`
 ADD PRIMARY KEY (`id_rekan`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
 ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
 ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `nayfa`
--
ALTER TABLE `nayfa`
 ADD PRIMARY KEY (`id_nayfa`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
 ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
 ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `sewa_berangkat`
--
ALTER TABLE `sewa_berangkat`
 ADD PRIMARY KEY (`id_sewaberangkat`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
 ADD PRIMARY KEY (`id_supir`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
 ADD PRIMARY KEY (`id_travel`);

--
-- Indexes for table `travel_berangkat`
--
ALTER TABLE `travel_berangkat`
 ADD PRIMARY KEY (`id_keberangkatan`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
 ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `berangkat`
--
ALTER TABLE `berangkat`
MODIFY `id_berangkat` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `departure_juanda`
--
ALTER TABLE `departure_juanda`
MODIFY `id_depart` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dt_rekanan`
--
ALTER TABLE `dt_rekanan`
MODIFY `id_rekan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
MODIFY `id_keuangan` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
MODIFY `id_mobil` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nayfa`
--
ALTER TABLE `nayfa`
MODIFY `id_nayfa` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
MODIFY `id_operator` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
MODIFY `id_sewa` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sewa_berangkat`
--
ALTER TABLE `sewa_berangkat`
MODIFY `id_sewaberangkat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
MODIFY `id_supir` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
MODIFY `id_travel` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `travel_berangkat`
--
ALTER TABLE `travel_berangkat`
MODIFY `id_keberangkatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
MODIFY `id_tujuan` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
