-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Jun 2018 pada 19.06
-- Versi Server: 10.1.25-MariaDB
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
-- Struktur dari tabel `distribusi`
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
-- Dumping data untuk tabel `distribusi`
--

INSERT INTO `distribusi` (`id_distribusi`, `tgl_bast_u`, `no_bast_u`, `id_barang`, `qty`, `satuan`, `penerima`) VALUES
(8, '2018-06-19', 'NO02930', 103, 10, NULL, 'Dindi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasilstokopname`
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
-- Dumping data untuk tabel `hasilstokopname`
--

INSERT INTO `hasilstokopname` (`id`, `kodebarang`, `namabarang`, `jmlfisik`, `jmlprogram`, `selisih`, `tglopname`, `waktu`, `pic`, `no_opname`) VALUES
(1, '543050064001', 'Xiaomi', 1, 1, 0, '2018-06-07', NULL, 'Ujang', 'wer23'),
(2, '543050078001', 'kkk', 4, 4, 0, '2018-06-07', NULL, 'Ujang', 'wer23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbarang`
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
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `kode` varchar(40) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `kode`, `lokasi`) VALUES
(1, 'GD01', 'Gudang 1'),
(2, 'GD02', 'Gudang 2'),
(3, 'GD03', 'Gudang 3'),
(4, 'LM01', 'Lemari 1'),
(5, 'LM02', 'Lemari 2'),
(6, 'LM03', 'Lemari Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_barang`
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
  `ket` enum('sebagian','full','belum_datang') DEFAULT NULL,
  `pengajuan` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_barang`
--

INSERT INTO `mst_barang` (`id_barang`, `nama`, `satuan`, `spesifikasi`, `id_lokasi`, `gambar`, `sumber_dana`, `quantity`, `harga`, `kodebarang`, `status_barang`, `qty_datang`, `ket`, `pengajuan`) VALUES
(103, 'Processor Core I7 Coffelake 47 Ghz 32mb ', 'Box', '<table class=\"table table-striped table-bordered table-condensed table-hover table-width-full\" width=\"386\">\n<tbody>\n<tr>\n<td colspan=\"3\" width=\"386\"><strong>SPESIFIKASI SINGKAT</strong></td>\n</tr>\n<tr>\n<td width=\"130\"><strong>CPU Name</strong></td>\n<td width=\"127\"><strong>Core i7-8750H</strong></td>\n<td><strong>Core i7-8700</strong></td>\n</tr>\n<tr>\n<td width=\"130\"><strong># of Cores</strong></td>\n<td width=\"127\">6</td>\n<td>6</td>\n</tr>\n<tr>\n<td width=\"130\"><strong># of Threads</strong></td>\n<td width=\"127\">12</td>\n<td>12</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>Base CPU Clock</strong></td>\n<td width=\"127\">2200 MHz</td>\n<td>3200 MHz</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>Turbo – 1 Core</strong></td>\n<td width=\"127\">4200 MHz</td>\n<td>4600 MHz</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>TDP</strong></td>\n<td width=\"127\">45 W</td>\n<td>65 W</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>Unlocked</strong></td>\n<td width=\"127\">NO</td>\n<td>NO</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>L3 Cache (Total)</strong></td>\n<td width=\"127\">9 MB</td>\n<td>12 MB</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>Max. Mem. Speed</strong></td>\n<td width=\"127\">DDR4-2666</td>\n<td width=\"129\">DDR4-2666</td>\n</tr>\n</tbody>\n</table>', 1, NULL, 'RKA', 10, 1401000, 'PRC02910', '1', 10, 'full', '1'),
(104, 'Processor Core I9 Coffelake 4.9 Ghz 68mb', NULL, '<table class=\"table table-striped table-bordered table-condensed table-hover table-width-full\" width=\"386\">\n<tbody>\n<tr>\n<td colspan=\"3\" width=\"386\"><strong>SPESIFIKASI SINGKAT</strong></td>\n</tr>\n<tr>\n<td width=\"130\"><strong>CPU Name</strong></td>\n<td width=\"127\"><strong>Core i7-8750H</strong></td>\n<td><strong>Core i7-8700</strong></td>\n</tr>\n<tr>\n<td width=\"130\"><strong># of Cores</strong></td>\n<td width=\"127\">6</td>\n<td>6</td>\n</tr>\n<tr>\n<td width=\"130\"><strong># of Threads</strong></td>\n<td width=\"127\">12</td>\n<td>12</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>Base CPU Clock</strong></td>\n<td width=\"127\">2200 MHz</td>\n<td>3200 MHz</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>Turbo – 1 Core</strong></td>\n<td width=\"127\">4200 MHz</td>\n<td>4600 MHz</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>TDP</strong></td>\n<td width=\"127\">45 W</td>\n<td>65 W</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>Unlocked</strong></td>\n<td width=\"127\">NO</td>\n<td>NO</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>L3 Cache (Total)</strong></td>\n<td width=\"127\">9 MB</td>\n<td>12 MB</td>\n</tr>\n<tr>\n<td width=\"130\"><strong>Max. Mem. Speed</strong></td>\n<td width=\"127\">DDR4-2666</td>\n<td width=\"129\">DDR4-2666</td>\n</tr>\n</tbody>\n</table>', 1, NULL, 'RKA', 11, 2100000, 'PRC329000', NULL, NULL, NULL, '1'),
(105, 'Mantap', 'Satuan', '<p>Spesifikasi :Mantaps</p>\r\n', 2, '', 'RKA', 1, 12000, '940105', NULL, NULL, NULL, '1'),
(107, 'Xiaomi', 'box', '<p>Spesifikasi :</p>\r\n\r\n<ul>\r\n	<li>Manjay</li>\r\n	<li>mantap djiwa</li>\r\n	<li>lanjay</li>\r\n	<li>fullset</li>\r\n	<li>lecet pemakaian</li>\r\n</ul>\r\n', 1, '740106-Xiaomi.jpg', 'RKA', 10, 21000, '720106', '1', 9, 'full', '1'),
(108, 'Mekanikal tool kit', 'Set', 'TOOLKIT MECHANICAL W/ALUMUNIUM CASE (59)  \r\nWidth : 32 cmHeight  \r\n Garansi : -', 1, 'ASUS-ROG-Strix-GL553VD.jpg', 'RKA', 1, 1310186, '529010006003', NULL, NULL, NULL, '0'),
(109, 'Example Item', 'Suej', '', 1, 'paslon_3.jpg', 'RKA', 145, 1000000, '41010201', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_quantity`
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
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `kode`, `satuan`) VALUES
(1, '1', 'Unit'),
(2, '2', 'Buah'),
(3, '3', 'Pasang'),
(4, '4', 'Lembar'),
(5, '5', 'Keping'),
(6, '6', 'Batang'),
(7, '7', 'Bungkus'),
(8, '8', 'Potong'),
(9, '9', 'Tablet'),
(10, '10', 'Ekor'),
(11, '11', 'Rim'),
(12, '12', 'Karat'),
(13, '13', 'Botol'),
(14, '14', 'Roll'),
(15, '15', 'Dus'),
(16, '16', 'Karung'),
(17, '17', 'Sak'),
(18, '18', 'Bal'),
(19, '19', 'Kaleng'),
(20, '20', 'Gulung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datang`
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
-- Dumping data untuk tabel `tb_datang`
--

INSERT INTO `tb_datang` (`id_kedatangan`, `no_bst`, `tgl_bst`, `no_po`, `pic`, `id_barang`, `tgl_pengajuan`, `tgl_datang`) VALUES
(30, 'NO123', '2018-06-20', 'OAI23', 'Dindi', 103, '2018-06-20', '2018-06-20'),
(32, '231AS', '2018-06-21', 'OI23', 'popo', 107, '2018-06-08', '2018-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
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
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `tgl_pengajuan`, `prog_kerja`, `kegiatan`, `id_barang`, `pengajuan`) VALUES
(65, '2018-06-18 00:00:00', 'Example', 'Pendidikan', 103, 'Logistik'),
(66, '2018-06-18 00:00:00', 'Example', 'Pendidikan', 104, 'Logistik'),
(67, '2018-06-08 00:00:00', 'Kegiatan', 'pendidikan', 107, 'Direktprat Sistem da'),
(68, '2016-02-15 00:00:00', 'asdo', 'iias', 108, 'SAPPK'),
(69, '2017-04-05 00:00:00', 'Pendidikan', 'Pengabdian Masyarakat', 109, 'Direktorat Sistem da');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, '20NudoGZK/PVQBeaq0t67.', 1268889823, 1529771043, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
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
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_distribusi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mst_barang`
--
ALTER TABLE `mst_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_kedatangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
