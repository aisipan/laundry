-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2016 at 09:20 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `cucikilo`
--

CREATE TABLE `cucikilo` (
  `id` int(4) NOT NULL,
  `no_rak` int(3) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(250) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_masuk` varchar(25) NOT NULL,
  `tanggal_keluar` varchar(25) NOT NULL,
  `opsi_pencucian` varchar(25) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `harga_perkilo` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `ket` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cucikilo`
--

INSERT INTO `cucikilo` (`id`, `no_rak`, `nama_karyawan`, `nama_pelanggan`, `alamat`, `tanggal_masuk`, `tanggal_keluar`, `opsi_pencucian`, `berat`, `harga_perkilo`, `total_harga`, `ket`) VALUES
(11, 1, 'karyawan', 'Ardhi', 'Jl. Pari 9 No 103 BPPK Pabean Udik Indramayu', '19-12-2015', '20-12-2015', 'Cuci Kering', '1', 5800, 5800, 'Sudah Diambil'),
(12, 2, 'ardhi', 'Tantowi', 'Tambi Lor', '20-12-2015', '21-12-2015', 'Setrika', '7', 6000, 42000, 'Sudah Diambil'),
(13, 3, 'tajul', 'Ade', 'Sindang', '21-12-2015', '22-12-2015', 'Setrika', '4', 6000, 24000, 'Belum Diambil'),
(14, 3, 'karyawan', 'habi', 'sindang', '24-12-2015', '25-12-2015', 'Cuci Kering', '1', 5800, 5800, 'Belum Diambil'),
(15, 5, 'tajul', 'Eko', 'Kostan Celeng', '30-12-2015', '31-12-2015', 'Cuci Kering + Setrika', '3', 7200, 21600, 'Sudah Diambil'),
(16, 5, 'karyawan', 'hartono', 'LIMPAS CITY', '10-01-2016', '11-01-2016', 'Cuci Kering + Setrika', '11', 7200, 31680, 'Sudah Diambil'),
(17, 10, 'karyawan', 'coba', 'pabean', '11-01-2016', '12-01-2016', 'Cuci Kering', '3', 5800, 17400, 'Sudah Diambil'),
(18, 5, 'tajul', 'yusuf', 'gabus wetan', '11-01-2016', '12-01-2016', 'Cuci Kering + Setrika', '0.5', 7200, 3600, 'Belum Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `cucisatuan`
--

CREATE TABLE `cucisatuan` (
  `id` int(5) NOT NULL,
  `no_rak` int(3) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_masuk` varchar(25) NOT NULL,
  `tanggal_keluar` varchar(25) NOT NULL,
  `jenis_cucian` varchar(50) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `ket` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cucisatuan`
--

INSERT INTO `cucisatuan` (`id`, `no_rak`, `nama_karyawan`, `nama_pelanggan`, `alamat`, `tanggal_masuk`, `tanggal_keluar`, `jenis_cucian`, `harga_satuan`, `qty`, `total_harga`, `ket`) VALUES
(1, 1, 'karyawan', 'ardhi', 'pabean udik', '09-01-2016', '10-01-2016', 'Ambal', 18000, 2, 36000, 'Sudah Diambil'),
(2, 1, 'ardhi', 'Dodi Septo', 'Pabean', '09-01-2016', '10-01-2016', 'Bantal Sedang', 11000, 2, 22000, 'Belum Diambil'),
(3, 4, 'karyawan', 'imo', 'rumah', '09-01-2016', '10-01-2016', 'Baju Muslim Setelan', 28000, 1, 28000, 'Sudah Diambil'),
(4, 30, 'karyawan', 'ahmad', 'Jalan menuju kemakmuran', '11-01-2016', '12-01-2016', 'Bantal Besar', 15000, 10, 150000, 'Sudah Diambil'),
(5, 20, 'karyawan', 'ibu darsih', 'indramayu', '11-01-2016', '12-01-2016', 'Gendongan Bayi', 12500, 2, 25000, 'Sudah Diambil'),
(6, 2, 'muflik12', 'Fai', 'Ds. Nunuk', '11-01-2016', '12-01-2016', 'Boneka Kecil', 12000, 2, 24000, 'Belum Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `detailcucikilo`
--

CREATE TABLE `detailcucikilo` (
  `id` int(11) NOT NULL,
  `id_cucikilo` int(11) NOT NULL,
  `no` int(3) NOT NULL,
  `jenis_cucian` varchar(50) NOT NULL,
  `qty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailcucikilo`
--

INSERT INTO `detailcucikilo` (`id`, `id_cucikilo`, `no`, `jenis_cucian`, `qty`) VALUES
(17, 11, 1, 'Kaos', '2'),
(18, 11, 2, 'Kemeja', '1'),
(19, 12, 1, 'Kaos Bola', '2'),
(20, 12, 2, 'Karpet Masjid', '3'),
(21, 13, 1, 'Dasi', '2'),
(22, 13, 2, 'Karpet', '4'),
(23, 14, 1, 'kaos', '1'),
(24, 14, 2, 'kemeja', '2'),
(25, 15, 1, 'Kaos', '5'),
(26, 15, 2, 'Celana Jeans', '3'),
(27, 15, 3, 'Pakaian Dalam', '12'),
(28, 15, 4, 'Kaos Kaki', '2'),
(29, 16, 1, 'SEMPAK', '2'),
(30, 16, 2, 'Karpet Masjid', '1'),
(31, 17, 1, 'handuk', '2'),
(32, 17, 2, 'sprei', '2'),
(33, 18, 1, 'Kemeja Kotak', '2'),
(34, 18, 2, 'Handuk', '1');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` varchar(5) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `harga_satuan` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `harga_satuan`) VALUES
('I0001', 'Ambal', 18000),
('I0002', 'Baju Anak', 8500),
('I0003', 'Baju Anak Setelan', 13500),
('I0004', 'Baju Badut', 35000),
('I0005', 'Baju Balap', 22500),
('I0006', 'Baju Drumband', 17000),
('I0007', 'Baju Ikhrom', 13000),
('I0008', 'Baju Karate', 22500),
('I0009', 'Baju Koko', 13000),
('I0010', 'Baju Koko Setelan', 22500),
('I0011', 'Baju Muslim', 18500),
('I0012', 'Baju Muslim Setelan', 28000),
('I0013', 'Baju Olahraga Setelan', 23000),
('I0014', 'Baju Renang', 11000),
('I0015', 'Baju Tidur Setelan', 15000),
('I0016', 'Bantal Besar', 15000),
('I0017', 'Bantal Bulu Angsa', 22500),
('I0018', 'Bantal Kecil', 8000),
('I0019', 'Bantal Sedang', 11000),
('I0020', 'Batik Setelan', 20000),
('I0021', 'Bed Cover King ', 23000),
('I0022', 'Bed Cover Single', 17000),
('I0023', 'Bed Cover Sedang', 19000),
('I0024', 'Bendera Besar', 7000),
('I0025', 'Bendera Kecil', 6000),
('I0026', 'Blazer', 19000),
('I0027', 'Bloes Panjang', 18500),
('I0028', 'Blues', 13500),
('I0029', 'Boneka Besar ', 23000),
('I0030', 'Boneka Kecil', 12000),
('I0031', 'Box Bayi', 20000),
('I0032', 'Box Bayi Besar', 35000),
('I0033', 'Celana Dalam', 2500),
('I0034', 'Celana Jeans', 15000),
('I0035', 'Celana Panjang', 13000),
('I0036', 'Celana Pendek', 11000),
('I0037', 'Cover Bedcover ', 25000),
('I0038', 'Cover Mobil', 35000),
('I0039', 'Cover Springbed', 35000),
('I0040', 'Cuci+Kering (KG)', 5800),
('I0041', 'Cuci-Dry-Setrika', 7200),
('I0042', 'Daleman Kebaya', 8000),
('I0043', 'Dasi', 5000),
('I0044', 'Dompet', 10000),
('I0045', 'Gamis', 19500),
('I0046', 'Gaun Anak', 13000),
('I0047', 'Gaun Panjang', 20000),
('I0048', 'Gaun Pendek', 20000),
('I0049', 'Gaun Pengantin', 75000),
('I0050', 'Gaun Variasi', 25000),
('I0051', 'Gendongan Bayi', 12500);

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id_admin` int(2) NOT NULL,
  `user_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id_admin`, `user_admin`, `pass_admin`) VALUES
(1, 'admin', 'admin'),
(2, 'ipan', 'ipan'),
(3, 'towi', 'towi');

-- --------------------------------------------------------

--
-- Table structure for table `login_karyawan`
--

CREATE TABLE `login_karyawan` (
  `id_karyawan` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_karyawan` varchar(50) NOT NULL,
  `pass_karyawan` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_karyawan`
--

INSERT INTO `login_karyawan` (`id_karyawan`, `nama`, `user_karyawan`, `pass_karyawan`, `alamat`, `no_hp`) VALUES
(1, 'Ardhi Irfan Sya''bani', 'ardhi', 'ardhi', 'Pabean Udik, Indramayu', '085724232478'),
(2, 'Karyawan', 'karyawan', 'karyawan', 'karyawan street wowow', '024348728728'),
(4, 'tajul', 'tajul', 'tajul', 'tajul street 10', '0820810'),
(5, 'Muflik', 'muflik12', 'muflik12', 'Desa Jatinegara', '0899999999999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cucikilo`
--
ALTER TABLE `cucikilo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cucisatuan`
--
ALTER TABLE `cucisatuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailcucikilo`
--
ALTER TABLE `detailcucikilo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `login_karyawan`
--
ALTER TABLE `login_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cucikilo`
--
ALTER TABLE `cucikilo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cucisatuan`
--
ALTER TABLE `cucisatuan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detailcucikilo`
--
ALTER TABLE `detailcucikilo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `login_karyawan`
--
ALTER TABLE `login_karyawan`
  MODIFY `id_karyawan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
