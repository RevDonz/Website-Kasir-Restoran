-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 Apr 2020 pada 14.22
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id_dorder` int(11) NOT NULL,
  `check_available` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `keterangan_dorder` text,
  `jumlah_dorder` int(11) NOT NULL,
  `hartot_dorder` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_dorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_dorder`, `check_available`, `id_order`, `id_masakan`, `keterangan_dorder`, `jumlah_dorder`, `hartot_dorder`, `id_user`, `status_dorder`) VALUES
(28, 1, 'ORD0001', 22, 'jangan pedes', 5, 175000, 1, 0),
(29, 1, 'ORD0001', 26, 'manis', 5, 40000, 1, 0),
(30, 2, 'ORD0002', 13, '', 6, 180000, 1, 0),
(31, 2, 'ORD0002', 19, '', 2, 10000, 1, 0),
(32, 2, 'ORD0002', 16, '', 3, 27000, 1, 0),
(33, 2, 'ORD0002', 25, '', 1, 9000, 1, 0),
(35, 3, 'ORD0003', 22, '', 4, 140000, 6, 0),
(40, 4, 'ORD0004', 13, '', 1, 30000, 1, 0),
(41, 5, 'ORD0005', 15, '', 1, 15000, 1, 0),
(42, 6, 'ORD0006', 12, '', 4, 100000, 1, 0),
(43, 6, 'ORD0006', 16, '', 4, 36000, 1, 0),
(44, 6, 'ORD0006', 20, '', 3, 24000, 1, 0),
(48, 7, 'ORD0007', 13, 'Jangan kelamaan', 5, 150000, 1, 0),
(49, 7, 'ORD0007', 16, '', 2, 18000, 1, 0),
(50, 7, 'ORD0007', 26, '', 6, 48000, 1, 0),
(51, 7, 'ORD0007', 22, '', 2, 70000, 1, 0),
(52, 8, 'ORD0008', 15, '', 9, 135000, 1, 0),
(53, 8, 'ORD0008', 18, '', 6, 30000, 1, 0),
(54, 8, 'ORD0008', 25, '', 5, 45000, 1, 0),
(55, 8, 'ORD0008', 13, '', 2, 60000, 1, 0),
(56, 8, 'ORD0008', 19, '', 4, 20000, 1, 0),
(58, 9, 'ORD0009', 15, '', 3, 45000, 1, 0),
(59, 10, 'ORD00010', 12, '', 1, 25000, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Waiter'),
(3, 'Kasir'),
(4, 'Owner'),
(5, 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masakan`
--

CREATE TABLE `tb_masakan` (
  `id_masakan` int(11) NOT NULL,
  `kategori_masakan` varchar(128) NOT NULL,
  `nama_masakan` varchar(128) NOT NULL,
  `harga_masakan` int(128) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_masakan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_masakan`
--

INSERT INTO `tb_masakan` (`id_masakan`, `kategori_masakan`, `nama_masakan`, `harga_masakan`, `foto`, `status_masakan`) VALUES
(12, 'Makanan', 'Ayam Geprek', 25000, '27022020052629yuk-buat-ayam-geprek-pedas-cocok-untuk-buka-puasa-bareng-keluarga-z1VHhnEl4n.jpg', 1),
(13, 'Makanan', 'Ayam Bakar', 30000, '27022020052639bakar.jpg', 1),
(14, 'Makanan', 'Ayam Betutu', 40000, '27022020052709vetutu.jpg', 0),
(15, 'Makanan', 'Ayam Goreng', 15000, '27022020052721goreng.png', 1),
(16, 'Minuman', 'Jus Mangga', 9000, '27022020052834mangga.jpg', 1),
(17, 'Minuman', 'Jus Alpukat', 10000, '27022020052842alpukat.webp', 0),
(18, 'Minuman', 'Es Teh ', 5000, '27022020052850esteh.png', 1),
(19, 'Minuman', 'Teh Panas', 5000, '27022020052903tehpanas.jpg', 1),
(20, 'Minuman', 'Jus Jeruk', 8000, '27022020052912jus-jeruk.jpg', 1),
(21, 'Makanan', 'Ayam Penyet', 25000, '27022020052734penyet.jpg', 0),
(22, 'Makanan', 'Ayam Taliwang', 35000, '29022020063639taliwang.jpg', 1),
(23, 'Makanan', 'Ayam Teriyaki', 30000, '29022020063702teriyaki.jpg', 0),
(24, 'Makanan', 'Ayam Rica-Rica', 33000, '29022020063741rica.jpg', 1),
(25, 'Minuman', 'Jus Jambu', 9000, '29022020064540jambu.jpg', 1),
(26, 'Minuman', 'Jus Strawberri', 8000, '29022020064611stro.jpg', 1),
(27, 'Minuman', 'Es Campur', 10000, '12032020114043struktur.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_meja`
--

CREATE TABLE `tb_meja` (
  `meja_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_meja`
--

INSERT INTO `tb_meja` (`meja_id`, `status`) VALUES
(1, 1),
(2, 1),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` varchar(50) NOT NULL,
  `meja_order` int(11) NOT NULL,
  `tanggal_order` int(11) NOT NULL,
  `aTanggal_order` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan_order` text,
  `status_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `meja_order`, `tanggal_order`, `aTanggal_order`, `id_user`, `keterangan_order`, `status_order`) VALUES
('ORD0001', 1, 1584421827, '17-03-2020', 1, 'jangan lama ya', '1'),
('ORD00010', 1, 1585742978, '01-04-2020', 0, '', '0'),
('ORD0002', 4, 1584438024, '17-03-2020', 1, 'lama', '1'),
('ORD0003', 3, 1584504489, '18-03-2020', 6, '', '1'),
('ORD0004', 5, 1584505049, '18-03-2020', 1, '', '1'),
('ORD0005', 1, 1584519508, '18-03-2020', 1, '', '1'),
('ORD0006', 3, 1584604793, '19-03-2020', 1, '', '1'),
('ORD0007', 3, 1585206678, '26-03-2020', 1, 'jangan lama', '1'),
('ORD0008', 2, 1585206736, '26-03-2020', 1, '', '0'),
('ORD0009', 3, 1585742867, '01-04-2020', 1, '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_order` varchar(50) NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL,
  `aTanggal_transaksi` varchar(50) NOT NULL,
  `hartot_transaksi` int(11) NOT NULL,
  `diskon_transaksi` int(11) NOT NULL,
  `totbar_transaksi` int(11) NOT NULL,
  `uang_transaksi` int(11) NOT NULL,
  `kembalian_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal_transaksi`, `aTanggal_transaksi`, `hartot_transaksi`, `diskon_transaksi`, `totbar_transaksi`, `uang_transaksi`, `kembalian_transaksi`) VALUES
(15, 10, 'ORD0001', 1584439258, '17-03-2020', 215000, 50, 107500, 120000, 12500),
(16, 0, 'ORD0002', 1584449806, '17-03-2020', 226000, 0, 226000, 250000, 24000),
(17, 8, 'ORD0003', 1584504519, '18-03-2020', 140000, 0, 140000, 150000, 10000),
(18, 0, 'ORD0004', 1584505556, '18-03-2020', 30000, 0, 30000, 30000, 0),
(19, 0, 'ORD0005', 1584519572, '18-03-2020', 15000, 0, 15000, 20000, 5000),
(20, 0, 'ORD0006', 1584604809, '19-03-2020', 160000, 0, 160000, 200000, 40000),
(21, 9, 'ORD0007', 1585206764, '26-03-2020', 286000, 10, 257400, 260000, 2600),
(22, 0, 'ORD0009', 1585742923, '01-04-2020', 45000, 30, 31500, 35000, 3500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `id_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'doni', '123', 'Reva Doni Aprilio', 1),
(2, 'tupik', '123', 'Taufik Hidayat', 2),
(6, 'andri', '123', 'Andri Priyandi', 3),
(7, 'pinu', '123', 'M. Finuary Renggalih', 4),
(8, 'yogas', '123', 'Yogas Destariansyah', 5),
(9, 'fajri', '123', 'Fajri Hijrian', 5),
(10, 'rafli', '123', 'Rafli Dwi Apriliant', 5),
(11, 'aziz', '123', 'Aziz Naufal Bagaskara Setiawan', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_dorder`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`meja_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_dorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_meja`
--
ALTER TABLE `tb_meja`
  MODIFY `meja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
