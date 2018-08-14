-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 11:26 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cigenerator`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktivitas`
--

CREATE TABLE `tbl_aktivitas` (
  `id_aktivitas` int(50) NOT NULL,
  `jenis_komponen` varchar(100) NOT NULL,
  `id_komponen` varchar(100) NOT NULL,
  `id_suplier` varchar(100) NOT NULL,
  `komponen_keluar` varchar(100) NOT NULL,
  `komponen_masuk` varchar(100) NOT NULL,
  `id_produk` varchar(100) NOT NULL,
  `tgl_aktivitas` date NOT NULL,
  `nota` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT 'T' COMMENT 'T="TRANSAKSI" & R="RETUR"',
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aktivitas`
--

INSERT INTO `tbl_aktivitas` (`id_aktivitas`, `jenis_komponen`, `id_komponen`, `id_suplier`, `komponen_keluar`, `komponen_masuk`, `id_produk`, `tgl_aktivitas`, `nota`, `status`, `keterangan`) VALUES
(1, 'Resistor', 'RS02', 'SP003', '0', '10', '', '0000-00-00', 'BLT1', 'T', '2018-08-03'),
(2, 'Dioda', 'D001', 'SP001', '0', '20', '', '2018-08-04', 'CD1', 'T', '2018-08-04'),
(3, 'Kapasitor', 'KP01', 'SP002', '0', '33', '', '2018-08-02', 'MD1', 'T', '2018-08-02'),
(4, 'Dioda', 'D001', 'SP001', '0', '10', '', '2018-08-07', 'C12', 'T', '2018-08-07'),
(5, 'Dioda', 'D002', 'SP001', '0', '20', '', '2018-08-07', 'C12', 'T', '2018-08-07'),
(6, 'Kapasitor', 'KP03', 'SP002', '0', '3', '', '2018-08-07', NULL, 'R', NULL),
(7, 'Resistor', 'RS01', 'SP002', '0', '12', '', '2018-08-07', 'MD33', 'T', ''),
(8, 'Kapasitor', 'KP03', 'SP002', '0', '15', '', '2018-08-07', 'MD33', 'T', ''),
(9, 'Dioda', 'D001', 'SP002', '0', '5', '', '2018-08-07', 'MD33', 'T', ''),
(10, 'Dioda', 'D002', 'SP003', '0', '22', '', '2018-08-06', 'BL02', 'T', '2018-08-06'),
(11, 'Kapasitor', 'KP03', 'SP002', '0', '3', '', '2018-08-07', NULL, 'R', NULL),
(12, 'Dioda', 'D001', 'SP002', '0', '3', '', '2018-08-07', NULL, 'R', NULL),
(13, 'Kapasitor', 'KP01', 'SP001', '0', '2', '', '2018-08-06', 'CD04', 'T', '2018-08-06'),
(14, 'Kapasitor', 'KP03', '', '22', '', '', '2018-08-08', NULL, 'T', '2018-08-08'),
(15, '', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(16, '', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(17, '', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(18, '', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(19, '', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(20, '', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(21, '', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(22, '', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(23, 'Array', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(24, 'Array', '', '', '', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(25, 'Dioda', 'D001', '', '3', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(26, 'Kapasitor', 'KP03', '', '3', '0', '', '2018-08-13', NULL, 'T', '2018-08-13'),
(27, 'Dioda', 'D001', '', '3', '0', '', '2018-08-14', NULL, 'T', '2018-08-14'),
(28, 'Kapasitor', 'KP03', '', '3', '0', '', '2018-08-14', NULL, 'T', '2018-08-14'),
(29, 'Dioda', 'D001', '', '3', '0', 'RM01', '2018-08-13', NULL, 'T', '2018-08-13'),
(30, 'Kapasitor', 'KP03', '', '3', '0', 'RM01', '2018-08-13', NULL, 'T', '2018-08-13'),
(31, 'Dioda', 'D001', '', '3', '0', 'RM01', '2018-08-13', NULL, 'T', '2018-08-13'),
(32, 'Kapasitor', 'KP03', '', '3', '0', 'RM01', '2018-08-13', NULL, 'T', '2018-08-13'),
(33, 'Dioda', 'D001', '', '3', '0', 'RM01', '2018-08-13', NULL, 'T', '2018-08-13'),
(34, 'Kapasitor', 'KP03', '', '3', '0', 'RM01', '2018-08-13', NULL, 'T', '2018-08-13'),
(35, 'Kapasitor', 'KP01', 'SP001', '0', '55', '', '2018-08-15', '005', 'T', '2018-08-15'),
(36, 'Kapasitor', 'KP01', '', '5', '0', 'HP01', '2018-08-14', NULL, 'T', '2018-08-14'),
(37, 'Resistor', 'RS01', '', '5', '0', 'HP01', '2018-08-14', NULL, 'T', '2018-08-14'),
(38, 'Dioda', 'D001', '', '0', '5', '', '2018-08-14', NULL, 'R', NULL),
(39, 'Dioda', 'D002', '', '0', '5', '', '0000-00-00', NULL, 'R', NULL),
(40, 'Kapasitor', 'KP03', '', '0', '6', '', '2018-08-14', NULL, 'R', NULL),
(41, 'Resistor', 'RS02', '', '0', '20', '', '2018-08-15', NULL, 'R', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(21, 2, 1),
(24, 1, 9),
(28, 2, 3),
(29, 2, 2),
(30, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_komponen`
--

CREATE TABLE `tbl_kategori_komponen` (
  `jenis_komponen` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kategori_komponen`
--

INSERT INTO `tbl_kategori_komponen` (`jenis_komponen`, `nama_kategori`, `keterangan`) VALUES
('Dioda', 'Dioda', 'Dioda'),
('Kapasitor', 'Kapasitor', 'Kapasitor'),
('Resistor', 'Resistor', 'Resistor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_komponen`
--

CREATE TABLE `tbl_master_komponen` (
  `id_komponen` varchar(50) NOT NULL,
  `jenis_komponen` varchar(100) NOT NULL,
  `nama_komponen` varchar(100) NOT NULL,
  `gambar_komponen` varchar(200) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_komponen`
--

INSERT INTO `tbl_master_komponen` (`id_komponen`, `jenis_komponen`, `nama_komponen`, `gambar_komponen`, `keterangan`) VALUES
('D001', 'Dioda', 'LED 10 W', '', 'Diodab'),
('D002', 'Dioda', 'LED 20 W', 'Picture11.png', 'LED dengan kapasitas 20 Watt'),
('KP01', 'Kapasitor', 'Kapasitor 10 OHM', 'Picture12.png', 'Kapasitor dengan besar 10 OHM'),
('KP03', 'Kapasitor', 'Kapasitor 30', '', 'Resistor'),
('RS01', 'Resistor', 'Resistor 10 OHM', '', 'Resistor Dengan hambatan 10 OHM'),
('RS02', 'Resistor', 'Resistor 20', '11.png', 'Resistor 20 OHM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_suplier`
--

CREATE TABLE `tbl_master_suplier` (
  `id_suplier` varchar(100) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_suplier`
--

INSERT INTO `tbl_master_suplier` (`id_suplier`, `nama_suplier`, `alamat`) VALUES
('SP001', 'Cendana', 'Griya Santha Malang'),
('SP002', 'MD Pulsa1', 'Malang'),
('SP003', 'Gudang Blitar', 'Kabupaten Blitar - Wlingi'),
('SP004', 'Syeh Kholif', 'Purworejo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  `no_urut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`, `no_urut`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y', 4),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y', 5),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'n', 6),
(9, 'MASTER', 'welcome/form', 'fa fa-list', 0, 'y', 3),
(13, 'MASTER KOMPONEN', 'masterkomponen', 'fa fa-list-alt', 9, 'y', 3),
(14, 'LAPORAN', 'laporan', 'fa fa-list', 0, 'y', 1),
(15, 'MASTER KATEGORI KOMPONEN', 'kategorikomponen', 'fa fa-list-alt', 9, 'y', 3),
(16, 'AKTIVITAS', 'aktivitas', 'fa fa-list', 0, 'y', 2),
(17, 'Update Stock', 'updatestock', 'fa fa-list-alt', 16, 'y', 2),
(18, 'Master Suplier', 'mastersuplier', 'fa fa-list-alt', 9, 'y', 3),
(19, 'AKTIVITAS', 'aktivitas', 'fa fa-list-alt', 16, 'y', 2),
(20, 'RETUR STOK', 'returstok', 'fa fa-list-alt', 16, 'y', 2),
(21, 'MASTER PRODUK RANCANGAN', 'produkrancangan', 'fa fa-list-alt', 9, 'y', 3),
(22, 'LAPORAN AKTIVITAS', 'laporanaktivitas', 'fa fa-list-alt', 14, 'y', 1),
(23, 'LAPORAN STOK', 'laporanstok', 'fa fa-list-alt', 14, 'y', 1),
(24, 'LAPORAN RETUR', 'Laporanretur', 'fa fa-list-alt', 14, 'y', 1),
(25, 'LAPORAN UPDATE STOK', 'laporanupdatestok', 'fa fa-list-alt', 14, 'y', 1),
(26, 'AKTIVITAS PER-KOMPONEN', 'aktivitasperkomponen', 'fa fa-list-alt', 16, 'y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk_rancangan`
--

CREATE TABLE `tbl_produk_rancangan` (
  `id` int(100) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_komponen` varchar(100) NOT NULL,
  `jml_komponen` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_produk_rancangan`
--

INSERT INTO `tbl_produk_rancangan` (`id`, `id_produk`, `nama_produk`, `id_komponen`, `jml_komponen`) VALUES
(1, 'RM01', 'Remote', 'D001', 3),
(2, 'RM01', 'Remote', 'KP03', 3),
(3, 'CR01', 'CARD READER', 'RS01', 2),
(4, 'CR01', 'CARD READER', 'KP01', 2),
(5, 'CR01', 'CARD READER', 'D001', 3),
(6, 'HP01', 'HP', 'KP01', 5),
(7, 'HP01', 'HP', 'RS01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retur_stok`
--

CREATE TABLE `tbl_retur_stok` (
  `id_aktivitas` int(50) NOT NULL,
  `jenis_komponen` varchar(100) NOT NULL,
  `id_komponen` varchar(100) NOT NULL,
  `jml_komponen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_retur_stok`
--

INSERT INTO `tbl_retur_stok` (`id_aktivitas`, `jenis_komponen`, `id_komponen`, `jml_komponen`) VALUES
(1, 'Kapasitor', 'KP03', '3'),
(2, 'Kapasitor', 'KP03', '3'),
(3, 'Dioda', 'D001', '3'),
(4, 'Dioda', 'D001', '5'),
(5, 'Dioda', 'D002', '5'),
(6, 'Kapasitor', 'KP03', '6'),
(7, 'Resistor', 'RS02', '20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id_aktivitas` int(100) NOT NULL,
  `id_komponen` varchar(100) NOT NULL,
  `jenis_komponen` varchar(100) NOT NULL,
  `jml_komponen` varchar(20) NOT NULL,
  `id_suplier` varchar(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nota_beli` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stok`
--

INSERT INTO `tbl_stok` (`id_aktivitas`, `id_komponen`, `jenis_komponen`, `jml_komponen`, `id_suplier`, `keterangan`, `tanggal`, `nota_beli`) VALUES
(1, 'RS02', 'Resistor', '10', 'SP003', NULL, '2018-08-03', 'BLT1'),
(2, 'D001', 'Dioda', '20', 'SP001', NULL, '0000-00-00', 'CD1'),
(3, 'KP01', 'Kapasitor', '33', 'SP002', NULL, '2018-08-02', 'MD1'),
(4, 'D001', 'Dioda', '10', 'SP001', NULL, '2018-08-07', 'C12'),
(5, 'D002', 'Dioda', '20', 'SP001', NULL, '2018-08-07', 'C12'),
(6, 'RS01', 'Resistor', '12', 'SP002', NULL, '2018-08-07', 'MD33'),
(7, 'KP03', 'Kapasitor', '15', 'SP002', NULL, '2018-08-07', 'MD33'),
(8, 'D001', 'Dioda', '5', 'SP002', NULL, '2018-08-07', 'MD33'),
(9, 'D002', 'Dioda', '22', 'SP003', NULL, '2018-08-06', 'BL02'),
(10, 'KP01', 'Kapasitor', '2', 'SP001', NULL, '2018-08-06', 'CD04'),
(11, 'KP01', 'Kapasitor', '55', 'SP001', NULL, '2018-08-15', '005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Nuris Akbar M.Kom', 'nuris.akbar@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
(2, 'younggarega', 'younggarega@gmail.com', 'rega22051996', '', 1, 'y'),
(3, 'Muhammad hafidz Muzaki', 'hafid@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '7.png', 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aktivitas`
--
ALTER TABLE `tbl_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori_komponen`
--
ALTER TABLE `tbl_kategori_komponen`
  ADD PRIMARY KEY (`jenis_komponen`);

--
-- Indexes for table `tbl_master_komponen`
--
ALTER TABLE `tbl_master_komponen`
  ADD PRIMARY KEY (`id_komponen`),
  ADD KEY `jenis_komponen` (`jenis_komponen`);

--
-- Indexes for table `tbl_master_suplier`
--
ALTER TABLE `tbl_master_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_produk_rancangan`
--
ALTER TABLE `tbl_produk_rancangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_retur_stok`
--
ALTER TABLE `tbl_retur_stok`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD UNIQUE KEY `id_aktivitas` (`id_aktivitas`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD KEY `id_suplier` (`id_suplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aktivitas`
--
ALTER TABLE `tbl_aktivitas`
  MODIFY `id_aktivitas` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_produk_rancangan`
--
ALTER TABLE `tbl_produk_rancangan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_retur_stok`
--
ALTER TABLE `tbl_retur_stok`
  MODIFY `id_aktivitas` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  MODIFY `id_aktivitas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_master_komponen`
--
ALTER TABLE `tbl_master_komponen`
  ADD CONSTRAINT `Jenis_Komponen` FOREIGN KEY (`jenis_komponen`) REFERENCES `tbl_kategori_komponen` (`jenis_komponen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
