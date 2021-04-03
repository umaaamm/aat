-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2021 at 02:45 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aat`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `no_hp_karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `id_material` int(11) NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `harga_material` decimal(10,0) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_no_surat`
--

CREATE TABLE `tbl_no_surat` (
  `id_surat` int(11) NOT NULL,
  `nomor_inc` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `key_perusahaan` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` int(11) NOT NULL,
  `combine` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_no_surat`
--

INSERT INTO `tbl_no_surat` (`id_surat`, `nomor_inc`, `type`, `key_perusahaan`, `bulan`, `tahun`, `combine`) VALUES
(2, 1, 'SJ', 'SSM', 'IV', 21, '001/SSM/SJ/IV/21'),
(3, 2, 'SJ', 'SSM', 'IV', 21, '002/SSM/SJ/IV/21'),
(4, 3, 'SJ', 'SSM', 'IV', 21, '003/SSM/SJ/IV/21'),
(5, 4, 'SJ', 'SSM', 'IV', 21, '004/SSM/SJ/IV/21'),
(6, 5, 'SJ', 'SSM', 'IV', 21, '005/SSM/SJ/IV/21'),
(7, 1, 'SJ', 'AAT', 'IV', 21, '001/AAT/SJ/IV/21'),
(8, 2, 'SJ', 'AAT', 'IV', 21, '002/AAT/SJ/IV/21'),
(9, 6, 'SJ', 'SSM', 'IV', 21, '006/SSM/SJ/IV/21'),
(10, 1, 'BJ', 'SSM', 'IV', 21, '001/SSM/BJ/IV/21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_previllage`
--

CREATE TABLE `tbl_previllage` (
  `id_previllage` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyek`
--

CREATE TABLE `tbl_proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `alamat_proyek` text NOT NULL,
  `nama_pic` varchar(50) NOT NULL,
  `no_hp_pic` varchar(15) NOT NULL,
  `id_pt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pt`
--

CREATE TABLE `tbl_pt` (
  `id_pt` int(11) NOT NULL,
  `nama_pt` varchar(50) NOT NULL,
  `key_pt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pt`
--

INSERT INTO `tbl_pt` (`id_pt`, `nama_pt`, `key_pt`) VALUES
(1, 'CV. ANUGRAH AGUNG TEKNIK', 'AAT'),
(2, 'PT. SIDDHAKARYYA SATUHU MUKTI', 'SSM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL,
  `key_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`, `key_satuan`) VALUES
(1, 'Kg', 'Kilogram'),
(2, 'Buah', 'buah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `no_hp`, `password`, `alamat`, `role`) VALUES
(1, 'Umam', 'admin', '0899225545', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1'),
(2, 'fadfadnk', 'umam.tekno@gmail.com', '081290766692', 'fdafaf', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(3, 'fadfa', 'fdafad@gmail.com', '4343434', '43434', '34', '1'),
(4, 'fadfa', 'fdafad@gmail.com', '4343434', '43434', '34', '1'),
(5, 'fdafa', 'daf@gmail.com', '081290766692', 'fadfa', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(6, 'fdfd', 'umam.tekno@gmail.com', '081290766692', 'fdfd', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(7, 'fdfd', 'umam.tekno@gmail.com', '081290766692', 'afdaf', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(8, 'fdfd', 'umam.tekno@gmail.com', '081290766692', 'afdaf', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(9, 'dafd', 'umam.tekno@gmail.com', '081290766692', 'fadfa', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(10, 'casas', 'umam.tekno@gmail.com', '081290766692', 'dsadas', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(11, 'dfafa', 'fasf@mal.com', '431413', 'fafaf', 'fadfad', '1'),
(12, 'dsafad', 'adfad@m.com', '53242', 'fdfs', 'dsfsd', '1'),
(13, 'fadfadf', 'umam.tekno@gmail.com', '081290766692', 'fdaf', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(14, 'fafadf', 'umam.tekno@gmail.com', '081290766692', 'fdfd', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(15, 'fafadf', 'umam.tekno@gmail.com', '081290766692', 'fdfd', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
(16, 'fadfadnk', 'umam.tekno@gmail.com', '081290766692', 'fdafd', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_no_surat`
--
ALTER TABLE `tbl_no_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_previllage`
--
ALTER TABLE `tbl_previllage`
  ADD PRIMARY KEY (`id_previllage`);

--
-- Indexes for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `tbl_pt`
--
ALTER TABLE `tbl_pt`
  ADD PRIMARY KEY (`id_pt`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_no_surat`
--
ALTER TABLE `tbl_no_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_previllage`
--
ALTER TABLE `tbl_previllage`
  MODIFY `id_previllage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pt`
--
ALTER TABLE `tbl_pt`
  MODIFY `id_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
