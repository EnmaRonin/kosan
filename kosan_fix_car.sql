-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 04:29 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_kosan_exp` ()  NO SQL
UPDATE `kosan` SET `publish` = 'N' WHERE `kosan`.`expired_at` = CURRENT_DATE()$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(30) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `alamat` text,
  `verify` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `password`, `email`, `tlp`, `jk`, `alamat`, `verify`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'admin@mail.com', '0812312334411', 'P', 'Bogor', 'Y');

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
(3, 'Mandiri', 'Umild', '08123442221', 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `id_kontrakan` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `sub_total` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` enum('kosan','iklan') DEFAULT NULL,
  `payment` enum('DP','FULL') NOT NULL,
  `status` enum('p','y','n') NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_kamar`, `id_kontrakan`, `invoice`, `sub_total`, `id_user`, `type`, `payment`, `status`, `created_at`) VALUES
(19, 0, 32, 'INV.1902200326', '500000', 2, 'iklan', 'FULL', 'y', '2020-02-19'),
(20, 35, 32, 'INV.1902200316', '450000', 3, 'kosan', 'DP', 'y', '2020-02-19'),
(21, 35, 32, 'INV.1902200316', '450000', 3, 'kosan', 'FULL', 'y', '2020-02-19');

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
(12, '5e798fa05dbc755da7c75b817d61169b.jpg', 6),
(15, '3b6f3629f44eb6efbbf65d5e1e30117a.jpg', 34),
(16, 'e9c9d0ab31cebdb7d7c25549ec90bbae.jpeg', 34),
(17, '845a7cf3c64e3aa86b9253a5d89997be.jpeg', 34),
(18, '1f32fbf0567ee87193416ae65586f5b4.jpg', 34),
(19, 'de55c29532016a957a47df639033ce9e.jpg', 35),
(20, 'bd1087bd7983c4c1c4084313a9ba694f.jpg', 35);

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
(6, 'baru_1.jpg', 3),
(34, '073424800_1429960385-321.jpeg', 31),
(35, '074525100_1429960385-1021.jpg', 31),
(36, 'baru21.jpg', 31),
(37, '073424800_1429960385-3110.jpeg', 32),
(38, 'baru_12.jpg', 32);

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
(1, 1, '["2","3","4","5"]', '001', '300000', '<p>Kamar Nya Para Jones</p>', '5000 x 4000 cm', '5000 x 4000 cm', 'terisi'),
(2, 1, '["2","4","6","10"]', '002', '400000', '<p>Kosan Rapih Dan Nyaman Untuk Para Ladies</p>', '5000 x 9000 cm', '5000 x 9000 cm', 'terisi'),
(3, 2, '["2","15"]', '001', '600000', '<p>Kosan Bintang Kehidupan Yang kencanggg</p>', '8000 x 10000 cm', '8000 x 10000 cm', 'terisi'),
(4, 2, '["2","10"]', '002', '700000', '<p>Malamm Malamm Aku Sendiriiiiiiiiiiii</p>', '7000 x 11000 cm', '7000 x 11000 cm', 'terisi'),
(5, 3, '["2","10","12","14"]', '001', '800000', '<p>Kamar Pernah Di Isi Istrinya Bruno Mars</p>', '5000 x 4000 cm', '7000 x 4000 cm', 'kosong'),
(6, 3, '["2","3","7","8","4"]', '002', '1400000', '<p>Kamar Kameraman nya bruno mars</p>', '8000 x 10000 cm', '5000 x 4000 cm', 'kosong'),
(34, 31, '["2","7","11","14"]', '001', '800000', '<p>Kamar Kameraman nya bruno mars</p>', '5000 x 4000 cm', '7000 x 4000 cm', 'kosong'),
(35, 32, '["4","7","11"]', '001', '900000', '<p>Kamar Mantull</p>', '5000 x 4000 cm', '7000 x 4000 cm', 'terisi');

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
  `lat` varchar(50) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` date DEFAULT NULL,
  `expired_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kosan`
--

INSERT INTO `kosan` (`id`, `user_id`, `nama`, `alamat`, `jenis`, `umur_bangunan`, `jam_bertemu`, `binatang`, `deskripsi`, `provinsi`, `kota_kab`, `kecamatan`, `kode_pos`, `lat`, `lang`, `publish`, `created_at`, `expired_at`) VALUES
(1, 2, 'Kosan Mantap', 'JL E.Sumawijaya no.18', 'Campur', '', 'Bebas', 'N', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus velit eu rutrum blandit. Vestibulum nibh justo, tincidunt ut eros vitae, maximus suscipit urna. Ut efficitur sagittis ante, sed fermentum nibh tincidunt in. Vivamus congue neque ac consequat dictum. Vestibulum fermentum molestie dictum. Duis posuere, nunc ut rhoncus suscipit, neque elit pretium velit, ullamcorper posuere lacus libero at metus. Sed gravida sem urna, eget cursus elit egestas quis. Phasellus hendrerit, dolor ac hendrerit finibus, dolor magna euismod enim, ut condimentum neque felis eget nisi. Fusce semper consectetur sem, quis vestibulum tellus finibus pulvinar. Sed tristique auctor cursus.</p>', 'Jawa Barat', 'Bogor', 'Tamansari', '16610', '-6.59444', '106.7891693', 'Y', '2020-02-01', '2020-03-01'),
(2, 2, 'Kosan Cucunguk', 'Jln E.Sumawijaya', 'Putra', '', 'Bebas', 'Y', '<p>Kosan Mantapp Bor</p>', 'Jawa Barat', 'Bandung', 'Majalengka', '18820', NULL, NULL, 'Y', '2020-02-01', '2020-03-01'),
(3, 2, 'kosan bruno mars', 'Jln E.Sumawijaya', 'Putri', '', 'Bebas', 'N', '<p>Kosan Ini Pernah Di Pake Bruno Mars</p>', 'Jawa Barat', 'Bogor', 'Tamansari', '16610', NULL, NULL, 'Y', '2020-02-03', '2020-03-03'),
(31, 2, 'test kosan', 'JL E.Sumawijaya', 'Campur', '', 'Bebas', 'Y', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus velit eu rutrum blandit. Vestibulum nibh justo, tincidunt ut eros vitae, maximus suscipit urna. Ut efficitur sagittis ante, sed fermentum nibh tincidunt in. Vivamus congue neque ac consequat dictum. Vestibulum fermentum molestie dictum. Duis posuere, nunc ut rhoncus suscipit, neque elit pretium velit, ullamcorper posuere lacus libero at metus. Sed gravida sem urna, eget cursus elit egestas quis. Phasellus hendrerit, dolor ac hendrerit finibus, dolor magna euismod enim, ut condimentum neque felis eget nisi. Fusce semper consectetur sem, quis vestibulum tellus finibus pulvinar. Sed tristique auctor cursus.</p>', 'Jawa Barat', 'Bogor', 'Tamansari', '16610', '-6.5973014', '106.7743918', 'Y', '2020-02-17', '2020-03-17'),
(32, 2, 'tralalal', 'Jl Ciomas no.17', 'Putra', '', 'Bebas', 'Y', '<p>Tralalalalallaall</p>', 'Jawa Barat', 'Bogor', 'ciomas', '15510', '-6.624740590858332', '106.74419403076173', 'Y', '2020-02-19', '2020-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `sub_total` varchar(20) DEFAULT NULL,
  `file_url` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `invoice`, `sub_total`, `file_url`, `created_at`) VALUES
(6, 'INV.1902200326', '500000', 'booking_pencari_kost1.png', '2020-02-19 14:33:26'),
(7, 'INV.1902200316', '450000', 'bukti_tf2.png', '2020-02-19 14:41:16'),
(8, 'INV.1902200316', '450000', 'bukti_tf11.png', '2020-02-19 14:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kos`
--

CREATE TABLE `pemilik_kos` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(30) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `alamat` text,
  `verify` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik_kos`
--

INSERT INTO `pemilik_kos` (`id`, `nama`, `password`, `email`, `tlp`, `jk`, `alamat`, `verify`) VALUES
(1, 'udin', '25d55ad283aa400af464c76d713c07ad', 'coderijv@gmail.com', '6285156949416', 'L', 'Bogor', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pencari_kos`
--

CREATE TABLE `pencari_kos` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(30) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `alamat` text,
  `verify` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencari_kos`
--

INSERT INTO `pencari_kos` (`id`, `nama`, `password`, `email`, `tlp`, `jk`, `alamat`, `verify`) VALUES
(1, 'hujan', '25d55ad283aa400af464c76d713c07ad', 'jepewd@gmail.com', '08123456789', 'l', 'Bogor', 'Y'),
(4, 'septian ardi wijaya', '25d55ad283aa400af464c76d713c07ad', 'septianardiwijaya9@gmail.com', '6285156949416', NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `premium` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pengguna_id`, `level`, `premium`, `created_at`) VALUES
(1, 1, 0, 'N', '2020-02-12 08:07:24'),
(2, 1, 1, 'Y', '2020-02-12 08:07:24'),
(3, 1, 2, 'N', '2020-02-12 08:07:24'),
(5, 2, 1, 'N', '2020-02-12 08:07:24'),
(7, 3, 2, 'N', '2020-02-12 08:07:24'),
(14, 4, 2, 'N', '2020-02-13 11:10:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencari_kos`
--
ALTER TABLE `pencari_kos`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `gallery_kamar`
--
ALTER TABLE `gallery_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `gallery_kosan`
--
ALTER TABLE `gallery_kosan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `kosan`
--
ALTER TABLE `kosan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pencari_kos`
--
ALTER TABLE `pencari_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
