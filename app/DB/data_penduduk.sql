-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 04:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_penduduk`
--
CREATE DATABASE IF NOT EXISTS `data_penduduk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `data_penduduk`;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `no_kk` varchar(16) NOT NULL,
  `nik_kepala_kk` varchar(16) DEFAULT NULL,
  `alamat_kk` varchar(300) DEFAULT NULL,
  `kecamatan_kk` varchar(300) DEFAULT NULL,
  `kelurahan_kk` varchar(300) DEFAULT NULL,
  `no_rw_kk` int(10) DEFAULT NULL,
  `no_rt_kk` int(10) DEFAULT NULL,
  `id_adder` int(10) DEFAULT NULL,
  `id_updater` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`no_kk`),
  KEY `id_user_adder` (`id_adder`),
  KEY `id_user_updater` (`id_updater`),
  KEY `nik_kk` (`nik_kepala_kk`),
  KEY `no_rw_kk` (`no_rw_kk`),
  KEY `no_rt_kk` (`no_rt_kk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`no_kk`, `nik_kepala_kk`, `alamat_kk`, `kecamatan_kk`, `kelurahan_kk`, `no_rw_kk`, `no_rt_kk`, `id_adder`, `id_updater`, `created_at`, `updated_at`) VALUES
('3273051231201200', '3273051231201004', 'Bangung Kulon', 'Ciburuy Lama', 'Cibunyut', 1, 1, 2, 2, '2023-06-28 01:49:05', '2023-06-28 02:42:33'),
('3273051231201234', '3273051231201001', 'Dunguscariang', 'Andir', 'Ciroyom', 1, 1, 1, 1, '2023-06-27 22:31:21', '2023-06-27 22:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_kesehatan`
--

CREATE TABLE IF NOT EXISTS `layanan_kesehatan` (
  `id_layanan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(300) DEFAULT NULL,
  `jenis_layanan` varchar(30) DEFAULT NULL,
  `no_rw` int(10) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `alamat_tempat` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_layanan`),
  KEY `no_rw` (`no_rw`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan_kesehatan`
--

INSERT INTO `layanan_kesehatan` (`id_layanan`, `nama_layanan`, `jenis_layanan`, `no_rw`, `kontak`, `alamat_tempat`, `created_at`, `updated_at`) VALUES
(4, 'Dr. Bernard', 'Praktek', 1, '0226018554', 'Cingkung Karak', '2023-06-27 04:09:16', '2023-06-27 04:09:19'),
(5, 'Hasan Sadikin', 'Rumah Sakit', 1, '0222018554', 'Sukajadi Timur', '2023-06-27 05:14:21', '0000-00-00 00:00:00'),
(7, 'Bidan Leny ', 'Bidan', 2, '0867228465', 'Rajawali Barat', '2023-06-27 05:46:59', '2023-06-26 18:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_penyakit_warga`
--

CREATE TABLE IF NOT EXISTS `riwayat_penyakit_warga` (
  `id_riwayat_penyakit` int(10) NOT NULL AUTO_INCREMENT,
  `nik_warga` varchar(16) NOT NULL,
  `nama penyakit` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_riwayat_penyakit`),
  KEY `id_riwayat_penyakit` (`id_riwayat_penyakit`),
  KEY `nik_warga` (`nik_warga`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE IF NOT EXISTS `rt` (
  `id_rt` int(1) NOT NULL AUTO_INCREMENT,
  `no_rt` int(10) NOT NULL,
  `no_rw` int(10) DEFAULT NULL,
  `nik_ketua_rt` varchar(16) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`no_rt`,`id_rt`),
  KEY `no_rw` (`no_rw`),
  KEY `id_rt` (`id_rt`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`id_rt`, `no_rt`, `no_rw`, `nik_ketua_rt`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '3273051231201002', '2023-06-26 22:15:26', '2023-06-26 22:53:00'),
(5, 2, 1, '3273051231201002', '2023-06-26 23:18:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rw`
--

CREATE TABLE IF NOT EXISTS `rw` (
  `no_rw` int(10) NOT NULL,
  `nik_ketua_rw` varchar(16) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`no_rw`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rw`
--

INSERT INTO `rw` (`no_rw`, `nik_ketua_rw`, `created_at`, `updated_at`) VALUES
(1, '3273051231201002', '2023-06-26 18:49:30', '2023-06-26 22:35:22'),
(2, '3273051231201002', '2023-06-27 05:01:35', '2023-06-27 05:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `level_user` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `level_user`, `jabatan`, `nama_lengkap`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'RT', 'Ketua RT 1', 'Rudy Boy', 'RT1', 'rt1', '2023-06-27 09:36:14', '2023-06-27 01:05:56'),
(2, 'Admin', 'Admin', 'Thomas', 'admin', 'admin12', '2023-06-27 09:36:14', '2023-06-27 01:09:04'),
(3, 'RW', 'Ketua RW 5', 'Maman Abdul Somad', 'RW5', 'laksjdlkj', '2023-06-27 09:36:14', '2023-06-27 01:06:11'),
(4, 'RT', 'Ketua RT 5', 'Uston Nawawi', 'uston', 'uston133', '2023-06-27 00:06:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE IF NOT EXISTS `warga` (
  `nik_warga` varchar(16) NOT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `status_kk` varchar(50) DEFAULT NULL,
  `nama_warga` varchar(300) DEFAULT NULL,
  `tempat_lahir` varchar(300) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_ktp` varchar(300) DEFAULT NULL,
  `alamat_tinggal` varchar(300) DEFAULT NULL,
  `no_rt` int(10) DEFAULT NULL,
  `no_rw` int(10) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pendidikan_terakhir` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(200) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `status_perkawinan` varchar(15) DEFAULT NULL,
  `status_warga` varchar(10) DEFAULT NULL,
  `status_kehidupan` varchar(10) DEFAULT NULL,
  `kewarganegaraan` varchar(10) DEFAULT NULL,
  `gol_darah` char(2) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `id_adder` int(10) DEFAULT NULL,
  `id_updater` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`nik_warga`),
  KEY `no_rt` (`no_rt`),
  KEY `no_rw` (`no_rw`),
  KEY `no_kk` (`no_kk`),
  KEY `id_adder` (`id_adder`),
  KEY `id_updater` (`id_updater`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`nik_warga`, `no_kk`, `status_kk`, `nama_warga`, `tempat_lahir`, `tanggal_lahir`, `alamat_ktp`, `alamat_tinggal`, `no_rt`, `no_rw`, `agama`, `pendidikan_terakhir`, `pekerjaan`, `jenis_kelamin`, `status_perkawinan`, `status_warga`, `status_kehidupan`, `kewarganegaraan`, `gol_darah`, `kontak`, `id_adder`, `id_updater`, `created_at`, `updated_at`) VALUES
('3273051231201001', '3273051231201234', 'Kepala Keluarga', 'Febri', 'Bandung', '2001-06-27', 'Singkawang Timur', 'Singkawang Barat', 1, 1, 'Kristen', 'SMA', 'Pemulung Bersedih', 'L', 'Kawin', 'Tetap', 'Hidup', 'WNI', 'AB', '081222672843', 1, NULL, '2023-06-27 17:20:18', '2023-06-27 17:19:27'),
('3273051231201002', '3273051231201200', 'Anak', 'Achmad Juliarman', 'Bandung', '2002-06-27', 'Singkawang Timur', 'Singkawang Barat', 1, 1, 'Islam', 'SMA', 'Pemulung Handal', 'L', 'Belum Kawin', 'Kontrak', 'Hidup', 'WNI', 'O', '081222672843', 1, 2, '2023-06-26 22:22:38', '2023-06-28 02:42:23'),
('3273051231201003', '3273051231201234', 'Istri', 'Mauli Rohmah', 'Bandung', '2002-02-21', 'Singkawang Timur', 'Singkawang Barat', 1, 1, 'Islam', 'D1', 'Guru', 'P', 'Kawin', 'Tetap', 'Hidup', 'WNI', 'A', '081222672841', 2, NULL, '2023-06-27 22:54:15', '2023-06-27 22:54:30'),
('3273051231201004', '3273051231201200', 'Kepala Keluarga', 'Diski', 'Bandung', '2003-06-24', 'Singkawang Timur', 'Singkawang Barat', 1, 1, 'Islam', 'S1', 'Freelancer', 'L', 'Belum Kawin', 'Tetap', 'Hidup', 'WNI', 'B', '081222672842', 2, 2, '2023-06-27 23:06:30', '2023-06-28 01:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `warga_mutasi`
--

CREATE TABLE IF NOT EXISTS `warga_mutasi` (
  `id_mutasi` int(10) NOT NULL AUTO_INCREMENT,
  `nik_warga_mutasi` varchar(16) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_mutasi`),
  KEY `nik_warga_mutasi` (`nik_warga_mutasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`nik_kepala_kk`) REFERENCES `warga` (`nik_warga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keluarga_ibfk_2` FOREIGN KEY (`no_rw_kk`) REFERENCES `rw` (`no_rw`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keluarga_ibfk_3` FOREIGN KEY (`no_rt_kk`) REFERENCES `rt` (`no_rt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layanan_kesehatan`
--
ALTER TABLE `layanan_kesehatan`
  ADD CONSTRAINT `layanan_kesehatan_ibfk_1` FOREIGN KEY (`no_rw`) REFERENCES `rw` (`no_rw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_penyakit_warga`
--
ALTER TABLE `riwayat_penyakit_warga`
  ADD CONSTRAINT `riwayat_penyakit_warga_ibfk_1` FOREIGN KEY (`nik_warga`) REFERENCES `warga` (`nik_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rt`
--
ALTER TABLE `rt`
  ADD CONSTRAINT `rt_ibfk_1` FOREIGN KEY (`no_rw`) REFERENCES `rw` (`no_rw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`no_rt`) REFERENCES `rt` (`no_rt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warga_ibfk_2` FOREIGN KEY (`no_rw`) REFERENCES `rw` (`no_rw`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warga_ibfk_3` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warga_mutasi`
--
ALTER TABLE `warga_mutasi`
  ADD CONSTRAINT `warga_mutasi_ibfk_1` FOREIGN KEY (`nik_warga_mutasi`) REFERENCES `warga` (`nik_warga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
