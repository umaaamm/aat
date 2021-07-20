-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2021 pada 16.03
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `no_hp_karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `no_hp_karyawan`) VALUES
(3, 'Jon', 'Jakarta Pusat', '01283918231'),
(4, 'Pram', 'Jaksel', '372878121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alat`
--

CREATE TABLE `tbl_alat` (
  `id_alat` int(11) NOT NULL,
  `merk_alat` varchar(255) NOT NULL,
  `tahun_beli` varchar(10) NOT NULL,
  `seri_alat` varchar(255) NOT NULL,
  `jumlah_alat` int(11) NOT NULL,
  `kondisi_alat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_alat`
--

INSERT INTO `tbl_alat` (`id_alat`, `merk_alat`, `tahun_beli`, `seri_alat`, `jumlah_alat`, `kondisi_alat`) VALUES
(3, 'Makita - Bor Listrik', '2020', 'SN7328HJ', 1902, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kondisi_alat`
--

CREATE TABLE `tbl_kondisi_alat` (
  `id_kondisi` int(11) NOT NULL,
  `kondisi_alat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kondisi_alat`
--

INSERT INTO `tbl_kondisi_alat` (`id_kondisi`, `kondisi_alat`) VALUES
(1, 'Baik'),
(2, 'Rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kwitansi`
--

CREATE TABLE `tbl_kwitansi` (
  `id_kwitansi` int(11) NOT NULL,
  `no_kwitansi` varchar(50) NOT NULL,
  `sudah_terima_dari` varchar(255) NOT NULL,
  `terbilang_uang` varchar(255) NOT NULL,
  `nominal_uang` varchar(50) NOT NULL,
  `untuk_pembayaran` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kwitansi`
--

INSERT INTO `tbl_kwitansi` (`id_kwitansi`, `no_kwitansi`, `sudah_terima_dari`, `terbilang_uang`, `nominal_uang`, `untuk_pembayaran`, `tanggal`) VALUES
(1, '003/AAT/KW/VII/21', 'PT. INDOLAMPUNG PERKASA, Km. 108, Astra Ksetra, Menggala, Tulang Bawang', 'Tujuh Ratus Tujuh Puluh Ribu Rupiah', '770000', 'Progress 100% - Pembayaran 5% Perbaikan Pintu Gudang FGWH Km. 43\r\nDilokasi PT. INDOLAMPUNG PERKASA\r\n\r\nSesuai WO No : P-00666 Incl.PPn. 10%', '2021-07-07'),
(2, '002/SSM/KW/VII/21', 'PT. Pertamina (Persero)', 'Satu Milyar Rupiah', '1000000000', 'Pembangunan Stasiun Pengisian Bahan Bakar Lampung', '2021-07-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_material`
--

CREATE TABLE `tbl_material` (
  `id_material` int(11) NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `harga_material` decimal(10,0) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_material`
--

INSERT INTO `tbl_material` (`id_material`, `nama_material`, `harga_material`, `satuan`) VALUES
(10, 'Paku', '100000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_no_surat`
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
-- Dumping data untuk tabel `tbl_no_surat`
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
(10, 1, 'BJ', 'SSM', 'IV', 21, '001/SSM/BJ/IV/21'),
(11, 1, 'KW', 'AAT', 'VII', 21, '001/AAT/KW/VII/21'),
(12, 1, 'KW', '2', 'VII', 21, '001/2/KW/VII/21'),
(13, 2, 'KW', '2', 'VII', 21, '002/2/KW/VII/21'),
(14, 2, 'KW', 'AAT', 'VII', 21, '002/AAT/KW/VII/21'),
(15, 1, 'KW', 'SSM', 'VII', 21, '001/SSM/KW/VII/21'),
(16, 3, 'KW', 'AAT', 'VII', 21, '003/AAT/KW/VII/21'),
(17, 2, 'KW', 'SSM', 'VII', 21, '002/SSM/KW/VII/21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perusahaan_rekanan`
--

CREATE TABLE `tbl_perusahaan_rekanan` (
  `id_perusahaan_rekanan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_perusahaan_rekanan`
--

INSERT INTO `tbl_perusahaan_rekanan` (`id_perusahaan_rekanan`, `nama_perusahaan`, `alamat_perusahaan`) VALUES
(2, 'IKEA Alam Sutera', 'Jl. Jalur Sutera Boulevard Alam No.45, RT.002/RW.002, Kunciran, Sutera, Kota Tangerang, Banten 15320');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_previllage`
--

CREATE TABLE `tbl_previllage` (
  `id_previllage` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_proyek`
--

CREATE TABLE `tbl_proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `alamat_proyek` text NOT NULL,
  `nama_pic` varchar(50) NOT NULL,
  `no_hp_pic` varchar(15) NOT NULL,
  `id_pt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_proyek`
--

INSERT INTO `tbl_proyek` (`id_proyek`, `nama_proyek`, `alamat_proyek`, `nama_pic`, `no_hp_pic`, `id_pt`) VALUES
(2, 'Ducting & Isolasi', 'Jl. Jalur Sutera Boulevard Alam No.45, RT.002/RW.002, Kunciran, Sutera, Kota Tangerang, Banten 15320', 'Pramesty Jaya', '081723712171', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pt`
--

CREATE TABLE `tbl_pt` (
  `id_pt` int(11) NOT NULL,
  `nama_pt` varchar(50) NOT NULL,
  `key_pt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pt`
--

INSERT INTO `tbl_pt` (`id_pt`, `nama_pt`, `key_pt`) VALUES
(1, 'CV. ANUGRAH AGUNG TEKNIK', 'AAT'),
(2, 'PT. SIDDHAKARYYA SATUHU MUKTI', 'SSM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL,
  `key_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`, `key_satuan`) VALUES
(1, 'Kg', 'Kilogram'),
(2, 'Buah', 'buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_slip_gaji`
--

CREATE TABLE `tbl_slip_gaji` (
  `id_slip_gaji` int(11) NOT NULL,
  `id_pt` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `uang_lembur` int(11) NOT NULL,
  `lama_lembur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
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
(10, 'lalala', 'umam.tekno@gmail.com', '081290766692', 'd3018a22f6bc8b9d03e6e5e4621070b5', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng', '1'),
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
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_alat`
--
ALTER TABLE `tbl_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `tbl_kondisi_alat`
--
ALTER TABLE `tbl_kondisi_alat`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indeks untuk tabel `tbl_kwitansi`
--
ALTER TABLE `tbl_kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indeks untuk tabel `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_no_surat`
--
ALTER TABLE `tbl_no_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tbl_perusahaan_rekanan`
--
ALTER TABLE `tbl_perusahaan_rekanan`
  ADD PRIMARY KEY (`id_perusahaan_rekanan`);

--
-- Indeks untuk tabel `tbl_previllage`
--
ALTER TABLE `tbl_previllage`
  ADD PRIMARY KEY (`id_previllage`);

--
-- Indeks untuk tabel `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indeks untuk tabel `tbl_pt`
--
ALTER TABLE `tbl_pt`
  ADD PRIMARY KEY (`id_pt`);

--
-- Indeks untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tbl_slip_gaji`
--
ALTER TABLE `tbl_slip_gaji`
  ADD PRIMARY KEY (`id_slip_gaji`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_alat`
--
ALTER TABLE `tbl_alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_kondisi_alat`
--
ALTER TABLE `tbl_kondisi_alat`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kwitansi`
--
ALTER TABLE `tbl_kwitansi`
  MODIFY `id_kwitansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_no_surat`
--
ALTER TABLE `tbl_no_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_perusahaan_rekanan`
--
ALTER TABLE `tbl_perusahaan_rekanan`
  MODIFY `id_perusahaan_rekanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_previllage`
--
ALTER TABLE `tbl_previllage`
  MODIFY `id_previllage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pt`
--
ALTER TABLE `tbl_pt`
  MODIFY `id_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_slip_gaji`
--
ALTER TABLE `tbl_slip_gaji`
  MODIFY `id_slip_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
