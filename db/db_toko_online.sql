-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 03:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(10) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kategori` text NOT NULL,
  `harga` int(9) NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar_brg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar_brg`) VALUES
(9, 'Sendal', 'Mulus', 'Pakaian Wanita', 20000, 23, 'Screenshot_(79).png'),
(10, 'Bola', 'ya', 'Elektronik', 20000, 24, 'Screenshot_(66).png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(13, 'Rigin', 'Jln. Juanda', '2020-11-01 14:49:38', '2020-11-02 14:49:38'),
(14, 'Joko', 'w', '2020-11-01 14:50:03', '2020-11-02 14:50:03'),
(15, 'x', 'x', '2020-11-01 14:56:46', '2020-11-02 14:56:46'),
(16, 'xxx', 'xxx', '2020-11-01 15:02:09', '2020-11-02 15:02:09'),
(17, 'AAAAAAAAAAAAAAAAAAAAAAAA', 'AAAAAAAAA', '2020-11-04 12:18:23', '2020-11-05 12:18:23'),
(18, '2', '2', '2020-11-04 14:43:26', '2020-11-05 14:43:26'),
(19, '2', '2', '2020-11-04 14:43:43', '2020-11-05 14:43:43'),
(20, 'Rigin', 'Jln. Juanda', '2020-11-04 21:12:17', '2020-11-05 21:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(10) NOT NULL,
  `id_invoice` int(10) NOT NULL,
  `id_brg` int(10) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(9) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(26, 11, 1, 'Baju', 1, 79000, ''),
(27, 11, 2, 'Sandal Casual', 1, 35000, ''),
(28, 11, 3, 'Topi', 1, 80000, ''),
(29, 12, 1, 'Baju', 1, 79000, ''),
(30, 12, 2, 'Sandal Casual', 1, 35000, ''),
(31, 13, 9, 'Sendal', 1, 20000, ''),
(32, 14, 9, 'Sendal', 2, 20000, ''),
(33, 15, 9, 'Sendal', 1, 20000, ''),
(34, 16, 9, 'Sendal', 1, 20000, ''),
(35, 17, 9, 'Sendal', 1, 20000, ''),
(36, 19, 9, 'Sendal', 3, 20000, ''),
(37, 20, 10, 'Bola', 1, 20000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin@gmail.com', 'password', 1),
(13, 'user', 'user@gmail.com', 'password', 2),
(14, 'owner', 'owner@gmail.com', 'password', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
