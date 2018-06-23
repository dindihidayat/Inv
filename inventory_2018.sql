-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 09:36 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id_distribusi` int(255) NOT NULL,
  `tgl_bast_u` date DEFAULT NULL,
  `no_bast_u` varchar(255) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `satuan` varchar(15) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id_distribusi`, `tgl_bast_u`, `no_bast_u`, `id_barang`, `qty`, `satuan`, `penerima`) VALUES
(5, '2018-06-08', '6789', 98, 1, NULL, 'Dindi'),
(6, '2018-06-08', '6789', 98, 1, NULL, 'Dindi'),
(7, '2018-06-08', '6789', 100, NULL, NULL, 'Dindi');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `hasilstokopname`
--

CREATE TABLE `hasilstokopname` (
  `id` int(11) NOT NULL,
  `kodebarang` varchar(100) DEFAULT NULL,
  `namabarang` varchar(100) DEFAULT NULL,
  `jmlfisik` int(11) DEFAULT NULL,
  `jmlprogram` int(11) DEFAULT NULL,
  `selisih` int(11) DEFAULT NULL,
  `tglopname` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `no_opname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasilstokopname`
--

INSERT INTO `hasilstokopname` (`id`, `kodebarang`, `namabarang`, `jmlfisik`, `jmlprogram`, `selisih`, `tglopname`, `waktu`, `pic`, `no_opname`) VALUES
(1, '543050064001', 'Xiaomi', 1, 1, 0, '2018-06-07', NULL, 'Ujang', 'wer23'),
(2, '543050078001', 'kkk', 4, 4, 0, '2018-06-07', NULL, 'Ujang', 'wer23');

-- --------------------------------------------------------

--
-- Table structure for table `logbarang`
--

CREATE TABLE `logbarang` (
  `id` int(11) NOT NULL,
  `inout` enum('1','0') DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kodebarang` varchar(40) DEFAULT NULL,
  `keluar` int(11) DEFAULT NULL,
  `masuk` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'admin@admin.coms', 1528355989);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `kode` varchar(40) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `kode`, `lokasi`) VALUES
(1, 'GD01', 'Gudang 1'),
(2, 'GD02', 'Gudang 2'),
(3, 'GD03', 'Gudang 3'),
(4, 'LM01', 'Lemari 1'),
(5, 'LM02', 'Lemari 2');

-- --------------------------------------------------------

--
-- Table structure for table `mst_barang`
--

CREATE TABLE `mst_barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `spesifikasi` text,
  `id_lokasi` int(10) DEFAULT NULL,
  `gambar` text,
  `sumber_dana` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `harga` int(15) DEFAULT NULL,
  `kodebarang` varchar(40) DEFAULT NULL,
  `status_barang` varchar(2) DEFAULT NULL,
  `qty_datang` int(11) DEFAULT NULL,
  `ket` enum('sebagian','full','belum_datang') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_barang`
--

INSERT INTO `mst_barang` (`id_barang`, `nama`, `satuan`, `spesifikasi`, `id_lokasi`, `gambar`, `sumber_dana`, `quantity`, `harga`, `kodebarang`, `status_barang`, `qty_datang`, `ket`) VALUES
(98, 'Xiaomi', 'Unit', 'C922 PRO STREAM WEBCAM FULL HD 1080P AT 30FPS / 720P AT 60FPS STREAMING \r\nCUSTOMIZABLE BACKGROUND REPLACEMENT \r\nAUTOMATIC LOW LIGHT CORRECTION \r\nMicrophones  \r\nUSB 2.0 \r\n \r\nGaransi min 1 tahun', 1, 'bare_tree_png_by_doloresdevelde-d5f61yl.png', 'RKA', 1, 2308900, '543050064001', '1', 1, 'full'),
(99, 'kkk', 'Unit', 'Resolusi XGA (1024x768), brighness 3300:1, 2800 Lumen, Garansi minimal 1 tahun', 1, 'angry_bird_png_by_simfonic-d4aps24.png', 'RKA', 4, 7865000, '543050078001', '1', 4, 'full'),
(100, 'dindi', 'box', '<p>Spesifikasi :Mantab Djiwa</p>\r\n', 1, '180100-dindi.jpg', 'RKA', 10, 1000, '620100', '1', 10, 'full'),
(101, 'din', 'box', '<p>Spesifikasi :Paling Mantab Djiwa Draga</p>\r\n', 3, '480101-din.jpg', 'RKA', 10, 10000, '370101', '0', 9, 'belum_datang');

-- --------------------------------------------------------

--
-- Table structure for table `mst_quantity`
--

CREATE TABLE `mst_quantity` (
  `id_quantity` int(11) NOT NULL,
  `id_pengajuan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_datang` int(11) DEFAULT NULL,
  `qty_pengajuan` int(11) DEFAULT NULL,
  `qty_datang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_datang`
--

CREATE TABLE `tb_datang` (
  `id_kedatangan` int(11) NOT NULL,
  `no_bst` varchar(30) DEFAULT NULL,
  `tgl_bst` date DEFAULT NULL,
  `no_po` varchar(30) DEFAULT NULL,
  `pic` varchar(40) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `tgl_datang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datang`
--

INSERT INTO `tb_datang` (`id_kedatangan`, `no_bst`, `tgl_bst`, `no_po`, `pic`, `id_barang`, `tgl_pengajuan`, `tgl_datang`) VALUES
(18, 'POPO', '2018-06-06', 'SMKDA', 'Dindi', 99, '0000-11-30', '2018-06-06'),
(20, '0909', '2018-06-08', '98767', 'Ujang', 100, '2018-06-08', '2018-06-08'),
(21, NULL, '2018-06-08', NULL, 'Dindi', 100, '2018-06-08', '2018-06-08'),
(22, NULL, '2018-06-08', NULL, 'Dindi', 101, '2018-06-08', '2018-06-08'),
(23, NULL, '2018-06-08', NULL, 'Dindi', 98, '2018-06-09', '2018-06-08'),
(24, NULL, '2018-06-08', NULL, 'Dindi', 99, '2018-06-09', '2018-06-08'),
(25, NULL, '2018-06-08', NULL, 'Dindi', 100, '2018-06-09', '2018-06-08'),
(26, NULL, '2018-06-08', NULL, 'Dindi', 101, '2018-06-09', '2018-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prog_kerja` varchar(40) DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `id_barang` int(11) DEFAULT '0',
  `pengajuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `tgl_pengajuan`, `prog_kerja`, `kegiatan`, `id_barang`, `pengajuan`) VALUES
(53, '2017-08-23 00:00:00', 'Pendidikan', 'Operasional', 99, 'Direktorat Sistem da'),
(54, '2018-06-08 00:00:00', 'dian', 'dian', 100, NULL),
(55, '2018-06-08 00:00:00', 'dian', 'dian', 101, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, '6CpVPFDxeJcTUJSHZjO52e', 1268889823, 1528439348, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id_distribusi`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasilstokopname`
--
ALTER TABLE `hasilstokopname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbarang`
--
ALTER TABLE `logbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_barang`
--
ALTER TABLE `mst_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mst_quantity`
--
ALTER TABLE `mst_quantity`
  ADD PRIMARY KEY (`id_quantity`);

--
-- Indexes for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD PRIMARY KEY (`id_kedatangan`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_distribusi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hasilstokopname`
--
ALTER TABLE `hasilstokopname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logbarang`
--
ALTER TABLE `logbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_barang`
--
ALTER TABLE `mst_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_kedatangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
