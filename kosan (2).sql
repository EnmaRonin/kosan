-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2020 at 12:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `nama_bank`, `atas_nama`, `no_rek`, `user_id`) VALUES
(1, 'BCA', 'udin', '678622443332', 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_kontrakan` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `sub_total` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` enum('kosan','iklan') DEFAULT NULL,
  `payment` enum('DP','FULL') NOT NULL,
  `status` enum('p','y','n') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_kamar`, `id_kontrakan`, `invoice`, `sub_total`, `id_user`, `type`, `payment`, `status`, `created_at`) VALUES
(7, 3, 2, 'INV.2701201048', '300000', 3, 'kosan', 'DP', 'y', '2020-01-27 09:15:48'),
(9, 2, 1, 'INV.2701201129', '200000', 3, 'kosan', 'DP', 'p', '2020-01-27 10:51:29'),
(10, 3, 2, 'INV.2901201137', '300000', 3, 'kosan', 'FULL', 'y', '2020-01-29 10:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `fasilitas` varchar(20) NOT NULL,
  `icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `fasilitas`, `icon`) VALUES
(2, 'AC', 'air-conditioner.png'),
(3, 'Kamar Mandi', 'bath.png'),
(4, 'Kasur', 'bed.png'),
(5, 'Matras', 'blanket.png'),
(6, 'Lemari Pakaian', 'wardrobe.png'),
(7, 'Water Heater', 'heater.png'),
(8, 'Dapur Pribadi', 'kitchen.png'),
(9, 'Kipas Angin', 'fan.png'),
(10, 'TV Kabel', 'tv.png'),
(11, 'Sofa', 'sofa.png'),
(12, 'Laundry', 'washing-machine.png'),
(13, 'Meja Belajar', 'books.png'),
(14, 'Wifi', 'wifi.png'),
(15, 'Teras', 'wooden-chair.png'),
(16, 'Meja Rias', 'mirror.png'),
(17, 'Kulkas', 'refrigerator.png'),
(18, 'Tempat Jemuran', 'rack.png'),
(19, 'Kursi Belajar', 'office-chair.png');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_kamar`
--

CREATE TABLE `gallery_kamar` (
  `id` int(11) NOT NULL,
  `file_url` varchar(50) NOT NULL,
  `kamar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_kamar`
--

INSERT INTO `gallery_kamar` (`id`, `file_url`, `kamar_id`) VALUES
(1, '864c527e50d5b4f3a60ad2e08d0cca58.jpeg', 1),
(2, '6cbbd48a66cffbc76d5259666d6de2c3.jpg', 1),
(3, '0df7f0a592a9b326c89aecd15a9b986a.jpg', 2),
(4, '5b60ad4504b91e0615f0773d7e040cac.jpeg', 2),
(5, '81c7274c23fb95d37080f4ecc5238a7c.jpeg', 3),
(6, 'cb3340f29c5a6333a884e44066b10044.jpg', 3),
(7, '5709c95b2069a86ed9c465b6c836c438.jpeg', 4),
(8, 'c7505391e8a9ce48138c36eb61d722cd.jpg', 4),
(9, '33152b7ece2f434c615d38d2a9cc5d00.jpg', 5),
(10, '526b08dacd0e1f9ef4f12f890ff57823.jpg', 5),
(11, 'f9a9d95829b5b1bf0dbc107ba7c6600c.jpg', 6),
(12, '5e798fa05dbc755da7c75b817d61169b.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_kosan`
--

CREATE TABLE `gallery_kosan` (
  `id` int(11) NOT NULL,
  `file_url` varchar(50) NOT NULL,
  `kontrakan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_kosan`
--

INSERT INTO `gallery_kosan` (`id`, `file_url`, `kontrakan_id`) VALUES
(1, '073424800_1429960385-3.jpeg', 1),
(2, '074525100_1429960385-10.jpg', 1),
(3, 'ssssss.jpg', 2),
(4, 'ssssssss.jpg', 2),
(5, 'baru.jpg', 3),
(6, 'baru_1.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `id_kontrakan` int(11) NOT NULL,
  `id_fasilitas` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `deskripsi_kamar` text NOT NULL,
  `u_kamar` varchar(20) NOT NULL,
  `l_kamar` varchar(20) NOT NULL,
  `status` enum('terisi','kosong') NOT NULL DEFAULT 'kosong'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `id_kontrakan`, `id_fasilitas`, `nomor`, `harga`, `deskripsi_kamar`, `u_kamar`, `l_kamar`, `status`) VALUES
(1, 1, '[\"2\",\"3\",\"4\",\"5\"]', '001', '300000', '<p>Kamar Nya Para Jones</p>', '5000 x 4000 cm', '5000 x 4000 cm', 'kosong'),
(2, 1, '[\"2\",\"4\",\"6\",\"10\"]', '002', '400000', '<p>Kosan Rapih Dan Nyaman Untuk Para Ladies</p>', '5000 x 9000 cm', '5000 x 9000 cm', 'kosong'),
(3, 2, '[\"2\",\"15\"]', '001', '600000', '<p>Kosan Bintang Kehidupan Yang kencanggg</p>', '8000 x 10000 cm', '8000 x 10000 cm', 'kosong'),
(4, 2, '[\"2\",\"10\"]', '002', '700000', '<p>Malamm Malamm Aku Sendiriiiiiiiiiiii</p>', '7000 x 11000 cm', '7000 x 11000 cm', 'terisi'),
(5, 3, '[\"2\",\"10\",\"12\",\"14\"]', '001', '800000', '<p>Kamar Pernah Di Isi Istrinya Bruno Mars</p>', '5000 x 4000 cm', '7000 x 4000 cm', 'kosong'),
(6, 3, '[\"2\",\"3\",\"7\",\"8\",\"14\"]', '002', '1400000', '<p>Kamar Kameraman nya bruno mars</p>', '8000 x 10000 cm', '5000 x 4000 cm', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `kosan`
--

CREATE TABLE `kosan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis` enum('Campur','Putra','Putri') NOT NULL DEFAULT 'Campur',
  `umur_bangunan` varchar(20) NOT NULL,
  `jam_bertemu` varchar(20) NOT NULL,
  `binatang` enum('Y','N') NOT NULL DEFAULT 'N',
  `deskripsi` text NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota_kab` varchar(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `lat` varchar(10) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` date DEFAULT NULL,
  `expired_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kosan`
--

INSERT INTO `kosan` (`id`, `user_id`, `nama`, `alamat`, `jenis`, `umur_bangunan`, `jam_bertemu`, `binatang`, `deskripsi`, `provinsi`, `kota_kab`, `kecamatan`, `kode_pos`, `lat`, `lang`, `publish`, `created_at`, `expired_at`) VALUES
(1, 3, 'Kosan Mantap', 'JL E.Sumawijaya no.18', 'Campur', '', 'Bebas', 'N', '<p>Kosan Mantap Dan Bersih Tralalalala</p>', 'Jawa Barat', 'Bogor', 'Tamansari', '16610', NULL, NULL, 'Y', '2020-01-30', NULL),
(2, 3, 'Kosan Cucunguk', 'Jln E.Sumawijaya', 'Campur', '', 'Bebas', 'Y', '<p>Kosan Mantapp Bor</p>', 'Jawa Barat', 'Bandung', 'Majalengka', '18820', NULL, NULL, 'Y', '2020-01-30', NULL),
(3, 2, 'kosan bruno mars', 'Jln E.Sumawijaya', 'Campur', '', 'Bebas', 'N', '<p>Kosan Ini Pernah Di Pake Bruno Mars</p>', 'Jawa Barat', 'Bogor', 'Tamansari', '16610', NULL, NULL, 'Y', '2020-01-23', '2020-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `sub_total` varchar(20) DEFAULT NULL,
  `file_url` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `invoice`, `sub_total`, `file_url`, `created_at`) VALUES
(1, 'INV.2701201048', NULL, 'Screenshot_from_2019-12-26_17-33-43.png', '2020-01-27 09:15:48'),
(2, 'INV.2701201129', NULL, 'LRS.png', '2020-01-27 10:51:29'),
(3, 'INV.2901201137', NULL, 'Screenshot_from_2019-12-25_13-19-09.png', '2020-01-29 10:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(30) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` int(1) NOT NULL,
  `premium` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `email`, `tlp`, `jk`, `alamat`, `level`, `premium`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'admin@mail.com', '0812312334411', 'P', 'Bogor', 0, 'N'),
(2, 'udin', '25d55ad283aa400af464c76d713c07ad', 'coderijv@gmail.com', '08123221122', 'L', 'Bogor', 1, 'N'),
(3, 'hujan', '25d55ad283aa400af464c76d713c07ad', 'jepewd@gmail.com', '08123456789', 'l', 'Bogor', 2, 'N'),
(4, 'test', '25d55ad283aa400af464c76d713c07ad', 'test@mail.com', '081234422441', 'L', 'tralala', 2, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_kamar`
--
ALTER TABLE `gallery_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_kosan`
--
ALTER TABLE `gallery_kosan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kosan`
--
ALTER TABLE `kosan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gallery_kamar`
--
ALTER TABLE `gallery_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery_kosan`
--
ALTER TABLE `gallery_kosan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kosan`
--
ALTER TABLE `kosan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
