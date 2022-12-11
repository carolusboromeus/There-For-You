-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tfudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama`, `poin`) VALUES
(1, 'Mug', 120),
(2, 'Buku Catatan', 500),
(3, 'Kaos', 1000),
(4, 'Buku', 800);

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `pesan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `nama`, `nomor_telepon`, `pesan`) VALUES
(1, 'Juan Astra', '085614123417', 'Halo min, Saya mau nanya bagaiman cara memesan konseling?'),
(2, 'Veronica Angela', '081235889540', 'Bagaimana cara membatalkan konseling?'),
(3, 'Juan Astra', '085614123417', 'Halo min, mau tanya bagaiman cara untuk menjadi psikolog?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konseling`
--

CREATE TABLE `tb_konseling` (
  `id` int(11) NOT NULL,
  `topik` varchar(100) NOT NULL,
  `paket` char(1) NOT NULL,
  `psikolog` varchar(200) NOT NULL,
  `jadwal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konseling`
--

INSERT INTO `tb_konseling` (`id`, `topik`, `paket`, `psikolog`, `jadwal`, `jam`, `id_user`) VALUES
(4, 'Keluarga', 'A', 'Danang Saputra', '2022-01-23', '15:30:00', 1),
(5, 'Keluarga', 'B', 'Angela Veronica', '2021-12-28', '11:35:00', 1),
(6, 'Keuangan', 'A', 'Danang Saputra', '2021-12-31', '05:52:00', 1),
(7, 'Percintaan', 'B', 'Danang Saputra', '2021-12-30', '10:17:00', 1),
(8, 'Percintaan', 'C', 'Danang Saputra', '2022-01-07', '00:52:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `keterangan` mediumtext NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id`, `nama`, `nomor_telepon`, `alamat`, `keterangan`, `id_user`, `id_barang`) VALUES
(1, 'Budi Fernando', '083257481523', 'Jalan Sunter Danau Nomor.16 RT.12 RW.01', 'Di samping danau', 1, 2),
(2, 'Budi Fernando', '083257481523', 'Jalan Sunter Danau Nomor.16 RT.12 RW.01', '', 1, 3),
(3, 'Angela Veronica', '085591691639', 'Jl. Gajah Mada, RT.2/RW.1, Petojo Utara, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10130', '', 1, 1),
(4, 'Angela Veronica', '085591691639', '11, Jl. Rajawali Selatan Raya No.1b RT.11 RW.6', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `nomor_telepon`, `alamat`, `password`, `poin`) VALUES
(1, 'Budi Fernando', '2001-02-18', 'Laki-Laki', '083257481523', 'Jalan Sunter Danau Nomor.16 RT.12 RW.01', '$2y$10$GzKEdYFWE60m3grTASXnPeS7HO3BwblbaUQp8LVwbNX53ZaH27/8m', 260),
(3, 'Angela Veronica', '1996-10-20', 'Perempuan', '085600521322', 'Jl. Rajawali Selatan Raya No.1b RT.11 RW.10', '$2y$10$Gzru7quaqQqjUiiuiKsX6u7fJdSAJroOfeLzIgfob3KHgb2JSo5ea', 0),
(4, 'Jenifer', '2022-01-07', 'Lainnya', '085591691639', 'Jalan Gunung Sahari', '$2y$10$Oi4boEZsiaq.xVUv8QSsxOO9jBWnK3T1rHzKxRtecuS4z6F5MZmtu', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_konseling`
--
ALTER TABLE `tb_konseling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_konseling_ibfk_1` (`id_user`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_konseling`
--
ALTER TABLE `tb_konseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_konseling`
--
ALTER TABLE `tb_konseling`
  ADD CONSTRAINT `tb_konseling_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD CONSTRAINT `tb_pengiriman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_pengiriman_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
