-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2020 pada 11.58
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_kosan_exp` ()  NO SQL
UPDATE `kosan` SET `publish` = 'N' WHERE `kosan`.`expired_at` = CURRENT_DATE()$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(30) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `verify` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `password`, `email`, `tlp`, `jk`, `alamat`, `verify`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'admin@mail.com', '0812312334411', 'P', 'Bogor', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank_account`
--

INSERT INTO `bank_account` (`id`, `nama_bank`, `atas_nama`, `no_rek`, `user_id`) VALUES
(3, 'Mandiri', 'Umild', '08123442221', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
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
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `id_kamar`, `id_kontrakan`, `invoice`, `sub_total`, `id_user`, `type`, `payment`, `status`, `created_at`) VALUES
(19, 0, 32, 'INV.1902200326', '500000', 2, 'iklan', 'FULL', 'y', '2020-02-19'),
(20, 35, 32, 'INV.1902200316', '450000', 3, 'kosan', 'DP', 'y', '2020-02-19'),
(21, 35, 32, 'INV.1902200316', '450000', 3, 'kosan', 'FULL', 'y', '2020-02-19'),
(22, 5, 3, 'INV.2302200314', '400000', 14, 'kosan', 'DP', 'y', '2020-02-23'),
(23, 5, 3, 'INV.2302200314', '400000', 14, 'kosan', 'FULL', 'y', '2020-02-23'),
(25, 5, 3, 'INV.2602200530', '400000', 14, 'kosan', 'DP', 'y', '2020-02-26'),
(26, 5, 3, 'INV.2602200530', '400000', 14, 'kosan', 'FULL', 'y', '0000-00-00'),
(27, 34, 31, 'INV.2602200830', '800000', 14, 'kosan', 'FULL', 'y', '2020-02-26'),
(28, 36, 36, 'INV.0803200200', '500000', 18, 'iklan', 'FULL', 'y', '2020-03-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `fasilitas` varchar(20) NOT NULL,
  `icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
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
-- Struktur dari tabel `gallery_kamar`
--

CREATE TABLE `gallery_kamar` (
  `id` int(11) NOT NULL,
  `file_url` varchar(50) NOT NULL,
  `kamar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery_kamar`
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
(20, 'bd1087bd7983c4c1c4084313a9ba694f.jpg', 35),
(21, '45df731ba34b9c8d7f6a9cf14cce88b3.jpg', 36),
(22, 'ca8fe6a8c36b15df492a8e0e45b28b48.png', 36),
(23, 'd57ac2e991875ec0ec8954ac23386fb2.jpg', 38),
(24, 'ed6aa44d9503926453669d8b523d9c00.PNG', 38),
(25, 'ba8caf56534b6c213230b93829be77ad.jpg', 38);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_kosan`
--

CREATE TABLE `gallery_kosan` (
  `id` int(11) NOT NULL,
  `file_url` varchar(50) NOT NULL,
  `kontrakan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery_kosan`
--

INSERT INTO `gallery_kosan` (`id`, `file_url`, `kontrakan_id`) VALUES
(42, 'Screenshot_2020-01-06-14-30-15.png', 36),
(43, 'YOGIIII.jpg', 36),
(44, 'yuva.PNG', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
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
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `id_kontrakan`, `id_fasilitas`, `nomor`, `harga`, `deskripsi_kamar`, `u_kamar`, `l_kamar`, `status`) VALUES
(37, 34, '[\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"1', '01', '300000', '<p>Milenial Banget</p>', '3x5 M', '3x5 M', 'kosong'),
(38, 36, '[\"6\",\"7\",\"8\",\"9\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\"]', '01', '300000', '<p>Milenial Banget</p>', '300x100', '300x100', 'kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kosan`
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
-- Dumping data untuk tabel `kosan`
--

INSERT INTO `kosan` (`id`, `user_id`, `nama`, `alamat`, `jenis`, `umur_bangunan`, `jam_bertemu`, `binatang`, `deskripsi`, `provinsi`, `kota_kab`, `kecamatan`, `kode_pos`, `lat`, `lang`, `publish`, `created_at`, `expired_at`) VALUES
(36, 18, 'Kosan Milenial', 'Jalan Asia Aprika', 'Putri', '', 'Di Batasi', 'Y', '<p>Milenial Banget</p>', 'Jawa Barat', 'Bogor', 'Ciomas', '16610', '-6.645766798046277', '106.81732177734376', 'Y', '2020-03-08', '2020-04-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `sub_total` varchar(20) DEFAULT NULL,
  `file_url` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `invoice`, `sub_total`, `file_url`, `created_at`) VALUES
(6, 'INV.1902200326', '500000', 'booking_pencari_kost1.png', '2020-02-19 14:33:26'),
(7, 'INV.1902200316', '450000', 'bukti_tf2.png', '2020-02-19 14:41:16'),
(8, 'INV.1902200316', '450000', 'bukti_tf11.png', '2020-02-19 14:43:25'),
(9, 'INV.2302200314', '400000', 'Akademi-Manajemen-Informatika-Dan-Komputer-Bogor1.', '2020-02-23 14:14:14'),
(10, 'INV.2302200314', '400000', 'pico_forwrd1.png', '2020-02-23 14:17:06'),
(12, 'INV.2602200530', '400000', '53546068_159997264953076_4254005938279476_n1.jp', '2020-02-26 04:07:31'),
(13, 'INV.2602200530', '400000', '53548_159997264953076_4254017005938279476_n2.jp', '2020-02-26 04:14:18'),
(14, 'INV.2602200830', '800000', '53546068997264953076_4254017005938279476_n3.jp', '2020-02-26 07:02:30'),
(15, 'INV.0803200200', '500000', 'images.jpg', '2020-03-08 01:44:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_kos`
--

CREATE TABLE `pemilik_kos` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(30) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `verify` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik_kos`
--

INSERT INTO `pemilik_kos` (`id`, `nama`, `password`, `email`, `tlp`, `jk`, `alamat`, `verify`) VALUES
(3, 'Andi', '25d55ad283aa400af464c76d713c07ad', 'andi@gmaill.com', '0856789888765', 'L', 'Jalan Asia Afrika', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencari_kos`
--

CREATE TABLE `pencari_kos` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(30) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `verify` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pencari_kos`
--

INSERT INTO `pencari_kos` (`id`, `nama`, `password`, `email`, `tlp`, `jk`, `alamat`, `verify`) VALUES
(4, 'Muhamad Yogi Firdaus', '25d55ad283aa400af464c76d713c07ad', 'yogifirdaus512@gmail.com', '6285156949416', 'L', 'Ciomas', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `premium` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `pengguna_id`, `level`, `premium`, `created_at`) VALUES
(1, 1, 0, 'N', '2020-02-12 08:07:24'),
(7, 3, 2, 'N', '2020-02-12 08:07:24'),
(14, 4, 2, 'N', '2020-02-13 11:10:05'),
(15, 2, 1, 'N', '2020-02-23 14:39:10'),
(18, 3, 1, 'Y', '2020-03-08 01:38:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery_kamar`
--
ALTER TABLE `gallery_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery_kosan`
--
ALTER TABLE `gallery_kosan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kosan`
--
ALTER TABLE `kosan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pencari_kos`
--
ALTER TABLE `pencari_kos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `gallery_kamar`
--
ALTER TABLE `gallery_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `gallery_kosan`
--
ALTER TABLE `gallery_kosan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `kosan`
--
ALTER TABLE `kosan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pencari_kos`
--
ALTER TABLE `pencari_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
