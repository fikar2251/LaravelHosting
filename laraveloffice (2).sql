-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 10:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveloffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` time DEFAULT NULL,
  `keluar` time DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('telat','tidak telat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `langitude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidik_jari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `tanggal`, `masuk`, `keluar`, `pegawai_id`, `tipe`, `langitude`, `longitude`, `foto`, `sidik_jari`, `created_at`, `updated_at`) VALUES
(1, '2021-12-03', '14:11:00', NULL, 1, 'telat', NULL, NULL, NULL, NULL, '2021-12-03 06:53:46', '2021-12-03 07:11:33'),
(2, '2021-12-03', '13:54:54', NULL, 3, 'telat', NULL, NULL, NULL, NULL, '2021-12-03 06:54:56', '2021-12-03 06:54:56'),
(3, '2021-12-03', '15:10:31', NULL, 2, 'telat', NULL, NULL, NULL, NULL, '2021-12-03 08:10:31', '2021-12-03 08:10:31'),
(4, '2021-12-06', '09:10:13', NULL, 1, 'tidak telat', NULL, NULL, NULL, NULL, '2021-12-06 02:10:13', '2021-12-06 02:10:13'),
(5, '2021-12-06', '09:12:39', NULL, 2, 'tidak telat', NULL, NULL, NULL, NULL, '2021-12-06 02:12:40', '2021-12-06 02:12:40'),
(6, '2021-12-06', '09:13:46', NULL, 3, 'tidak telat', NULL, NULL, NULL, NULL, '2021-12-06 02:13:47', '2021-12-06 02:13:47'),
(7, '2021-12-06', '09:13:55', NULL, 4, 'tidak telat', NULL, NULL, NULL, NULL, '2021-12-06 02:13:56', '2021-12-06 02:13:56'),
(8, '2021-12-06', '09:15:10', NULL, 5, 'telat', NULL, NULL, NULL, NULL, '2021-12-06 02:15:12', '2021-12-06 02:15:12'),
(11, '2022-01-12', '12:36:02', NULL, 1, 'telat', NULL, NULL, NULL, NULL, '2022-01-12 05:36:03', '2022-01-12 05:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Islam', 1, '2021-11-16 04:01:25', '2021-11-16 04:01:25'),
(2, 'Katolik', 1, '2021-11-16 04:01:34', '2021-11-16 04:01:34'),
(3, 'Protestan', 1, '2021-11-16 04:01:45', '2021-11-16 04:01:45'),
(4, 'Hindu', 1, '2021-11-16 04:01:55', '2021-11-16 04:01:55'),
(5, 'Buddha', 1, '2021-11-16 04:02:09', '2021-11-16 04:02:09'),
(6, 'Konghucu', 1, '2021-11-16 04:02:21', '2021-11-16 04:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `applies`
--

CREATE TABLE `applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_generate` date NOT NULL,
  `tanggal_kenaikan` date NOT NULL,
  `tanggal_accept` date DEFAULT NULL,
  `tipe` int(11) NOT NULL,
  `golongan_terakhir` int(11) NOT NULL,
  `aktifya` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applies`
--

INSERT INTO `applies` (`id`, `kode`, `tanggal_generate`, `tanggal_kenaikan`, `tanggal_accept`, `tipe`, `golongan_terakhir`, `aktifya`, `keterangan`, `pegawai_id`, `created_at`, `updated_at`) VALUES
(4, '1924979050', '2017-11-19', '2017-11-26', NULL, 1, 1, 1, NULL, 1, '2021-11-19 03:05:50', '2021-11-19 03:05:50'),
(5, '96210903', '2021-11-19', '2021-11-26', NULL, 1, 1, 1, NULL, 4, '2021-11-19 03:05:53', '2021-11-19 03:05:53'),
(6, '1043032344', '2021-11-19', '2021-11-26', NULL, 2, 1, 1, NULL, 2, '2021-11-19 03:05:59', '2021-11-19 03:05:59'),
(7, '1980338125', '2021-11-19', '2021-11-26', NULL, 2, 1, 1, NULL, 3, '2021-11-19 03:06:02', '2021-11-19 03:06:02'),
(9, '388354922', '2017-11-19', '2017-11-26', NULL, 2, 1, 1, NULL, 1, '2021-11-19 07:22:30', '2021-11-19 07:22:30'),
(10, '1152198860', '2019-11-19', '2019-11-26', NULL, 1, 1, 1, NULL, 1, '2021-11-19 07:39:31', '2021-11-19 07:39:31'),
(11, '626971783', '2021-11-19', '2021-11-26', NULL, 1, 1, 1, NULL, 1, '2021-11-19 07:43:01', '2021-11-19 07:43:01'),
(15, '2040492901', '2021-11-19', '2021-11-26', NULL, 2, 1, 1, NULL, 1, '2021-11-19 08:04:37', '2021-11-19 08:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktifya` int(11) NOT NULL,
  `kategori_artikel_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `isi`, `tanggal`, `foto`, `file`, `aktifya`, `kategori_artikel_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'pengumuman cpns', 'Kelulusan CPNS', '2021-11-19', 'informasi/foto//20211119101208_prudential-main-logo-id.png', 'informasi/file/20211119101209_6035.pdf', 1, 2, 1, '2021-11-19 03:12:09', '2021-11-19 03:12:09'),
(2, 'Pegawai Di Indonesia', 'Pegawai Di Indonesia sedang Bersedih', '2021-11-19', 'informasi/foto//20211119101358_download.png', 'informasi/file/20211119101358_DataTables example - PDF - page size and orientation - Copy.pdf', 1, 3, 1, '2021-11-19 03:13:58', '2021-11-19 03:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `child_strukturs`
--

CREATE TABLE `child_strukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_struktur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_strukturs`
--

INSERT INTO `child_strukturs` (`id`, `name`, `parent_struktur_id`, `created_at`, `updated_at`) VALUES
(35, 'direktur keuangan', 26, '2021-11-16 03:12:40', '2021-11-16 03:12:40'),
(36, 'direktur', 26, '2021-11-16 03:12:40', '2021-11-16 03:12:40'),
(44, 'direktur personalia', 27, '2021-11-16 03:24:55', '2021-11-16 03:24:55'),
(45, 'manager', 27, '2021-11-16 03:24:55', '2021-11-16 03:24:55'),
(46, 'manager personal', 27, '2021-11-16 03:24:55', '2021-11-16 03:24:55'),
(47, 'manager pemasar', 27, '2021-11-16 03:24:55', '2021-11-16 03:24:55'),
(48, 'manager pabrik', 27, '2021-11-16 03:24:55', '2021-11-16 03:24:55'),
(49, 'admin & gudang', 27, '2021-11-16 03:24:55', '2021-11-16 03:24:55'),
(50, 'divisi', 28, '2021-11-16 03:31:46', '2021-11-16 03:31:46'),
(51, 'divisi', 29, '2021-11-16 03:32:06', '2021-11-16 03:32:06'),
(52, 'divisi', 30, '2021-11-16 03:32:25', '2021-11-16 03:32:25'),
(53, 'divisi', 31, '2021-11-16 03:34:33', '2021-11-16 03:34:33'),
(54, 'divisi', 32, '2021-11-16 03:35:02', '2021-11-16 03:35:02'),
(57, 'akunting', 33, '2021-11-18 04:10:01', '2021-11-18 04:10:01'),
(58, 'akunting magang', 33, '2021-11-18 04:10:01', '2021-11-18 04:10:01'),
(60, 'divisi personalia', 35, '2021-11-18 05:51:40', '2021-11-18 05:51:40'),
(61, 'ob', 35, '2021-11-18 05:51:40', '2021-11-18 05:51:40'),
(64, 'direktur utama', 25, '2021-11-19 07:08:11', '2021-11-19 07:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `file_pegawai_id`, `pegawai_id`, `created_at`, `updated_at`) VALUES
(1, 'terima kasih bang', 5, 1, '2021-11-16 06:07:04', '2021-11-16 06:07:04'),
(2, 'Oke', 5, 2, '2021-11-16 06:07:15', '2021-11-16 06:07:15'),
(4, 'Oke Bang', 15, 1, '2021-11-18 08:37:22', '2021-11-18 08:37:22'),
(5, 'Makasih', 15, 3, '2021-11-18 08:38:12', '2021-11-18 08:38:12'),
(7, 'what is password', 1, 1, '2021-11-19 07:27:33', '2021-11-19 07:27:33'),
(8, 'Ngab', 19, 5, '2021-11-22 02:41:49', '2021-11-22 02:41:49'),
(9, 'tesyt', 19, 1, '2021-11-22 02:42:17', '2021-11-22 02:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `cutis`
--

CREATE TABLE `cutis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_cuti_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `approve_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cutis`
--

INSERT INTO `cutis` (`id`, `tanggal_mulai`, `tanggal_akhir`, `status`, `keterangan`, `kategori_cuti_id`, `pegawai_id`, `approve_by_id`, `created_at`, `updated_at`) VALUES
(8, '2021-11-22', '2021-11-25', '2', 'Izin', 4, 1, 1, '2021-11-17 10:08:01', '2021-11-17 10:08:47'),
(9, '2021-12-05', '2021-12-25', '0', 'mau healing dlu', 1, 1, NULL, '2021-12-03 07:23:07', '2021-12-03 07:23:07'),
(10, '2021-12-30', '2022-01-15', '0', 'mau tahun baruan', 1, 3, NULL, '2021-12-03 08:04:15', '2021-12-03 08:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `diklats`
--

CREATE TABLE `diklats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` year(4) NOT NULL,
  `tahun_diklat` year(4) NOT NULL,
  `nomor_diklat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_sttpp` date NOT NULL,
  `sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disposisis`
--

CREATE TABLE `disposisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('Biasa','Penting','Segera','Rahasia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `surat_masuk_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposisis`
--

INSERT INTO `disposisis` (`id`, `tujuan`, `isi`, `batas_waktu`, `catatan`, `tipe`, `is_read`, `surat_masuk_id`, `pegawai_id`, `created_at`, `updated_at`) VALUES
(1, 'Ichsan Arrizqi', 'Halo Pak Ichsan', '2021-11-18', 'test', 'Biasa', 1, 3, 1, '2021-11-18 08:22:24', '2021-12-28 06:06:08'),
(2, 'James', 'Halo James', '2021-11-18', 'james', 'Biasa', 1, 3, 3, '2021-11-18 09:47:23', '2021-11-18 09:50:17'),
(3, 'Ichsan Arrizqi', 'San', '2021-11-19', 'Halo', 'Penting', 1, 4, 1, '2021-11-19 03:26:41', '2021-12-28 06:06:08'),
(4, 'Ichsan Arrizqi', 'Isi Test', '2021-11-30', 'sad', 'Penting', 1, 5, 1, '2021-11-19 03:28:43', '2021-12-28 06:06:08'),
(5, 'Iqbal', 'bal', '2020-12-12', 'balik', 'Biasa', 0, 5, 5, '2021-12-09 09:55:55', '2021-12-09 09:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumens`
--

INSERT INTO `dokumens` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KK', 1, '2021-11-16 04:03:00', '2021-11-16 04:03:00'),
(2, 'KTP', 1, '2021-11-16 04:03:11', '2021-11-16 04:03:11'),
(3, 'lainnya', 1, '2021-11-16 04:03:22', '2021-11-16 04:03:22'),
(4, 'SK Kenaikan Berkala Terakhir', 1, '2021-11-16 04:03:34', '2021-11-16 04:03:34'),
(5, 'SK Kenaikan Pangkat Terakhir', 1, '2021-11-16 04:03:44', '2021-11-16 04:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_pegawais`
--

CREATE TABLE `file_pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fake` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `aktifya` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` enum('public','private') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_pegawais`
--

INSERT INTO `file_pegawais` (`id`, `name`, `file`, `fake`, `original`, `date`, `pegawai_id`, `aktifya`, `password`, `access`, `created_at`, `updated_at`) VALUES
(1, 'FIle Ichsan', '/pegawai/file_pegawai/2141881452_20211116_vektor-art-soeharto.rda', '2141881452_20211116_vektor-art-soeharto.rda', 'vektor-art-soeharto.jpg', '2021-11-16 06:04:16', 1, 1, 'password', 'public', '2021-11-16 04:34:36', '2021-11-16 06:04:16'),
(2, 'FIle Ichsan', '/pegawai/file_pegawai/1138032115_20211116_menangis.rda', '1138032115_20211116_menangis.rda', 'menangis.jpg', '2021-11-16 04:33:48', 1, 1, 'password', 'public', '2021-11-16 04:34:36', '2021-11-16 04:34:36'),
(3, 'FIle Ichsan', '/pegawai/file_pegawai/768288383_20211116_381-3812277_ville-de-saint-etienne-png-download-gambar-icon.rda', '768288383_20211116_381-3812277_ville-de-saint-etienne-png-download-gambar-icon.rda', '381-3812277_ville-de-saint-etienne-png-download-gambar-icon.png', '2021-11-16 04:33:48', 1, 1, 'password', 'public', '2021-11-16 04:34:36', '2021-11-16 04:34:36'),
(4, 'File Budi', '/pegawai/file_pegawai/1601836812_20211116_Document (4).rda', '1601836812_20211116_Document (4).rda', 'Document (4).pdf', '2021-11-16 06:38:13', 2, 1, NULL, 'public', '2021-11-16 05:13:35', '2021-11-16 06:38:13'),
(5, 'File Budi', '/pegawai/file_pegawai/159083168_20211116_20211025134649_20211022103200_SK_12102021 (1).rda', '159083168_20211116_20211025134649_20211022103200_SK_12102021 (1).rda', '20211025134649_20211022103200_SK_12102021 (1).docx', '2021-11-16 06:07:50', 2, 1, NULL, 'public', '2021-11-16 05:13:35', '2021-11-16 06:07:50'),
(6, 'File Budi', '/pegawai/file_pegawai/495073549_20211116_20211028135245_20211022104602_20211022103200_SK_12102021.rda', '495073549_20211116_20211028135245_20211022104602_20211022103200_SK_12102021.rda', '20211028135245_20211022104602_20211022103200_SK_12102021.docx', '2021-11-16 05:13:19', 2, 1, NULL, 'public', '2021-11-16 05:13:35', '2021-11-16 05:13:35'),
(7, 'File Budi', '/pegawai/file_pegawai/861729565_20211116_logs (1).rda', '861729565_20211116_logs (1).rda', 'logs (1).sql', '2021-11-16 06:04:07', 2, 1, NULL, 'public', '2021-11-16 05:13:35', '2021-11-16 06:04:07'),
(12, 'File Alyssa', '/pegawai/file_pegawai/1745172518_20211116_6035.rda', '1745172518_20211116_6035.rda', '6035.pdf', '2021-11-16 06:16:09', 4, 1, 'password', 'public', '2021-11-16 06:16:37', '2021-11-16 06:16:37'),
(13, 'File Alyssa', '/pegawai/file_pegawai/1850058644_20211116_8077 3639-JAK #FLYL1 (1).rda', '1850058644_20211116_8077 3639-JAK #FLYL1 (1).rda', '8077 3639-JAK #FLYL1 (1).pdf', '2021-11-16 06:16:09', 4, 1, 'password', 'public', '2021-11-16 06:16:37', '2021-11-16 06:16:37'),
(14, 'File Alyssa', '/pegawai/file_pegawai/1872329755_20211116_Document.rda', '1872329755_20211116_Document.rda', 'Document.pdf', '2021-11-16 06:16:09', 4, 1, 'password', 'public', '2021-11-16 06:16:37', '2021-11-16 06:16:37'),
(15, 'KTP', '/pegawai/file_pegawai/1905529959_20211118_download.rda', '1905529959_20211118_download.rda', 'download.png', '2021-11-18 08:38:25', 1, 1, NULL, 'public', '2021-11-18 08:35:15', '2021-11-18 08:38:25'),
(16, 'File Budi 1036', '/pegawai/file_pegawai/2059280446_20211119_fee_baseds.rda', '2059280446_20211119_fee_baseds.rda', 'fee_baseds.sql', '2021-11-19 03:35:46', 2, 1, NULL, 'public', '2021-11-19 03:36:26', '2021-11-19 03:36:26'),
(17, 'File Budi 1036', '/pegawai/file_pegawai/734027276_20211119_incidents.rda', '734027276_20211119_incidents.rda', 'incidents.sql', '2021-11-19 03:35:46', 2, 1, NULL, 'public', '2021-11-19 03:36:26', '2021-11-19 03:36:26'),
(18, 'File Budi 1036', '/pegawai/file_pegawai/1727018534_20211119_policies.rda', '1727018534_20211119_policies.rda', 'policies.sql', '2021-11-19 03:35:46', 2, 1, NULL, 'public', '2021-11-19 03:36:26', '2021-11-19 03:36:26'),
(19, 'contoh', '/pegawai/file_pegawai/647234165_20211122_19112021 part 3.rda', '647234165_20211122_19112021 part 3.rda', '19112021 part 3.docx', '2021-11-22 02:42:06', 5, 1, NULL, 'public', '2021-11-22 02:40:51', '2021-11-22 02:42:06'),
(20, 'test foto untuk api', '/pegawai/file_pegawai/652793074_20211201_247-3264x2168.rda', '652793074_20211201_247-3264x2168.rda', '247-3264x2168.jpg', '2021-12-01 09:37:12', 1, 1, 'password', 'public', '2021-12-01 09:40:22', '2021-12-01 09:40:22'),
(21, 'test foto untuk api', '/pegawai/file_pegawai/595503003_20211201_527-1500x600.rda', '595503003_20211201_527-1500x600.rda', '527-1500x600.jpg', '2021-12-01 09:37:12', 1, 1, 'password', 'public', '2021-12-01 09:40:22', '2021-12-01 09:40:22'),
(22, 'foto pemandangan', '/pegawai/file_pegawai/1224512963_20211201_884-1500x600.rda', '1224512963_20211201_884-1500x600.rda', '884-1500x600.jpg', '2021-12-01 09:37:12', 1, 1, NULL, 'public', '2021-12-01 09:42:06', '2021-12-01 09:42:06'),
(23, 'foto pemandangan', '/pegawai/file_pegawai/532237199_20211201_71-750x500.rda', '532237199_20211201_71-750x500.rda', '71-750x500.jpg', '2021-12-01 09:37:12', 1, 1, NULL, 'public', '2021-12-01 09:42:06', '2021-12-01 09:42:06'),
(24, 'pdf ngab', '/pegawai/file_pegawai/1175173336_20211210_8077 3639-JAK #FLYL1 (1).rda', '1175173336_20211210_8077 3639-JAK #FLYL1 (1).rda', '8077 3639-JAK #FLYL1 (1).pdf', '2021-12-10 07:19:24', 1, 1, NULL, 'public', '2021-12-10 07:21:08', '2021-12-10 07:21:08'),
(25, 'tugas desember', '/pegawai/file_pegawai/955700422_20211210_SK_09122021.rda', '955700422_20211210_SK_09122021.rda', 'SK_09122021.docx', '2021-12-10 07:19:24', 1, 1, NULL, 'public', '2021-12-10 07:21:45', '2021-12-10 07:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `file_rapats`
--

CREATE TABLE `file_rapats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rapat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_rapats`
--

INSERT INTO `file_rapats` (`id`, `path`, `rapat_id`, `created_at`, `updated_at`) VALUES
(8, 'rapat//20211209160441_10bears.mp3', 3, '2021-12-09 09:04:41', '2021-12-09 09:04:41'),
(9, 'rapat//20211209160441_(DownloadLagu321.Net) MAMANG KESBOR AMER (128kpbs).mp3', 3, '2021-12-09 09:04:41', '2021-12-09 09:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `golongans`
--

CREATE TABLE `golongans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktifya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongans`
--

INSERT INTO `golongans` (`id`, `nama`, `pangkat`, `ruang`, `aktifya`, `created_at`, `updated_at`) VALUES
(1, 'IV', 'Pembina Utama', 'e', 1, '2021-11-16 04:06:37', '2021-11-16 04:06:37'),
(2, 'IV', 'Pembina Utama Madya', 'd', 1, '2021-11-19 02:59:44', '2021-11-19 02:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Seksi Pelaksanaan Penataan Ruang', 1, '2021-11-16 04:00:11', '2021-11-16 04:00:11'),
(2, 'Kepala Seksi Pengawasan dan Pengendalian Pemanfaatan Ruang', 1, '2021-11-16 04:00:23', '2021-11-16 04:00:23'),
(3, 'Analis Laporan Realisasi Anggaran', 1, '2021-11-16 04:00:34', '2021-11-16 04:00:34'),
(4, 'Analisis Tata Ruang', 1, '2021-11-16 04:00:45', '2021-11-16 04:00:45'),
(5, 'Kepala Dinas', 1, '2021-11-16 04:00:55', '2021-11-16 04:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `jams`
--

CREATE TABLE `jams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jams`
--

INSERT INTO `jams` (`id`, `keterangan`, `mulai`, `selesai`, `created_at`, `updated_at`) VALUES
(1, 'Masuk', '09:00:00', '09:15:00', '2021-12-03 06:53:35', '2021-12-03 06:53:35'),
(2, 'Pulang', '17:00:00', '17:15:00', '2021-12-03 06:53:35', '2021-12-03 06:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikels`
--

CREATE TABLE `kategori_artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `inggris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_artikels`
--

INSERT INTO `kategori_artikels` (`id`, `deskripsi`, `status`, `inggris`, `created_at`, `updated_at`) VALUES
(2, 'CPNS', 1, 'CPNS', '2021-11-19 03:09:28', '2021-11-19 03:09:28'),
(3, 'KEPEGAWAIAN', 1, 'KEPEGAWAIAN', '2021-11-19 03:09:42', '2021-11-19 03:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_cutis`
--

CREATE TABLE `kategori_cutis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_cutis`
--

INSERT INTO `kategori_cutis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Khitanan', '2021-11-17 03:38:41', '2021-11-17 03:38:41'),
(3, 'Sakit', '2021-11-17 03:38:59', '2021-11-17 03:38:59'),
(4, 'Izin', '2021-11-17 03:39:08', '2021-11-17 03:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_sppds`
--

CREATE TABLE `kategori_sppds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Dalam Negeri','Luar Negeri') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harian` int(11) NOT NULL,
  `penginapan` int(11) NOT NULL,
  `transportasi` int(11) NOT NULL,
  `dll` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_sppds`
--

INSERT INTO `kategori_sppds` (`id`, `tujuan`, `jenis`, `harian`, `penginapan`, `transportasi`, `dll`, `created_at`, `updated_at`) VALUES
(1, 'Cirebon', 'Dalam Negeri', 250000, 500000, 200000, 30000, '2021-11-19 08:49:36', '2021-11-19 08:52:27'),
(4, 'Sorong', 'Dalam Negeri', 1000000, 10000000, 10000000, 10000000, '2021-12-28 07:41:18', '2021-12-28 07:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `keahlians`
--

CREATE TABLE `keahlians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keahlians`
--

INSERT INTO `keahlians` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Inggris', 1, '2021-11-16 04:07:04', '2021-11-16 04:07:04'),
(2, 'Bahasa Mandarin', 1, '2021-11-16 04:07:10', '2021-11-16 04:07:10'),
(3, 'Public Speaking', 1, '2021-11-16 04:07:19', '2021-11-16 04:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasis`
--

CREATE TABLE `klasifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klasifikasis`
--

INSERT INTO `klasifikasis` (`id`, `kode`, `nama`, `uraian`, `created_at`, `updated_at`) VALUES
(1, '010', 'Surat Masuk', 'Surat Masuk', '2021-11-17 10:11:55', '2021-11-17 10:11:55'),
(2, '020', 'Surat Keluar', 'Surat Keluar', '2021-11-17 10:12:33', '2021-11-17 10:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('database') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `type`, `title`, `description`, `datetime`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'database', 'export', 'export to sql', '2021-11-18 06:37:00', 1, '2021-11-18 06:37:00', '2021-11-18 06:37:00'),
(2, 'database', 'export', 'export to sql', '2021-12-10 07:31:51', 1, '2021-12-10 07:31:51', '2021-12-10 07:31:51'),
(3, 'database', 'export', 'export to sql', '2021-12-28 05:49:38', 1, '2021-12-28 05:49:38', '2021-12-28 05:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_26_015708_create_permission_tables', 1),
(6, '2021_10_26_020731_create_jabatans_table', 1),
(7, '2021_10_26_020745_create_agamas_table', 1),
(8, '2021_10_26_020808_create_dokumens_table', 1),
(9, '2021_10_26_020824_create_status_pernikahans_table', 1),
(10, '2021_10_26_020836_create_pendidikans_table', 1),
(11, '2021_10_26_020850_create_golongans_table', 1),
(12, '2021_10_26_020859_create_keahlians_table', 1),
(13, '2021_10_26_020900_create_pegawais_table', 1),
(14, '2021_10_27_074924_create_riwayat_pendidikans_table', 1),
(15, '2021_11_01_090317_add_deleted_at_to_users_table', 1),
(16, '2021_11_01_090337_add_deleted_at_to_pegawais_table', 1),
(17, '2021_11_02_042600_create_settings_table', 1),
(18, '2021_11_02_063722_create_file_pegawais_table', 1),
(19, '2021_11_02_063747_create_diklats_table', 1),
(20, '2021_11_02_063920_create_mutasis_table', 1),
(21, '2021_11_03_021023_create_kategori_artikels_table', 1),
(22, '2021_11_03_021124_create_artikels_table', 1),
(23, '2021_11_03_055557_create_applies_table', 1),
(24, '2021_11_04_023730_create_logs_table', 1),
(25, '2021_11_04_161714_create_klasifikasis_table', 1),
(26, '2021_11_04_161820_create_surat_masuks_table', 1),
(27, '2021_11_04_161828_create_surat_keluars_table', 1),
(28, '2021_11_08_101739_create_disposisis_table', 1),
(29, '2021_11_09_103535_create_responses_table', 1),
(30, '2021_11_09_103543_create_comments_table', 1),
(31, '2021_11_09_115601_add_password_to_file_pegawais_table', 1),
(32, '2021_11_10_085357_create_accesses_table', 1),
(33, '2021_11_11_125730_add_access_to_file_pegawais_table', 1),
(34, '2021_11_12_125551_add_fake_and_original_to_file_pegawais_table', 1),
(35, '2021_11_12_164749_create_units_table', 1),
(36, '2021_11_12_165123_add_is_read_to_disposisis_table', 1),
(37, '2021_11_15_143058_add_unit_id_to_pegawais_table', 1),
(40, '2021_11_15_145325_create_parent_strukturs_table', 2),
(41, '2021_11_15_145339_create_child_strukturs_table', 2),
(42, '2021_11_16_111412_add_organisasi_to_pegawais_table', 3),
(45, '2021_11_17_094046_create_kategori_cutis_table', 4),
(46, '2021_11_17_094055_create_cutis_table', 4),
(47, '2021_11_19_152528_create_kategori_sppds_table', 5),
(48, '2021_11_19_152533_create_sppds_table', 5),
(55, '2021_12_02_110230_create_absensis_table', 6),
(56, '2021_12_02_110253_create_jams_table', 6),
(58, '2021_12_03_162327_change_and_add_logo_to_settings_table', 7),
(59, '2021_12_06_141001_create_rapats_table', 8),
(60, '2021_12_06_141041_create_peserta_rapats_table', 8),
(61, '2021_12_06_141048_create_file_rapats_table', 8),
(66, '2021_12_07_094512_create_mst_penerimaans_table', 9),
(67, '2021_12_07_094519_create_mst_potongans_table', 9),
(68, '2021_12_07_095030_create_penggajians_table', 9),
(69, '2021_12_07_095050_create_rincian_gajis_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `mst_penerimaans`
--

CREATE TABLE `mst_penerimaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_penerimaans`
--

INSERT INTO `mst_penerimaans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'gaji pokok', '2021-12-07 07:44:13', '2021-12-07 07:44:13'),
(2, 'tujangan', '2021-12-07 07:44:13', '2021-12-07 07:44:13'),
(3, 'lembur', '2021-12-07 07:44:13', '2021-12-07 07:44:13'),
(4, 'transport', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(5, 'uang makan', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(6, 'bonus', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(7, 'infaq', '2021-12-08 03:03:05', '2021-12-08 03:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `mst_potongans`
--

CREATE TABLE `mst_potongans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_potongans`
--

INSERT INTO `mst_potongans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'tunjangan jabatan', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(2, 'BPJS', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(3, 'JHT', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(4, 'JKK', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(5, 'JPN', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(6, 'PPN', '2021-12-07 07:44:14', '2021-12-07 07:44:14'),
(7, 'infaq dan sadaqoh', '2021-12-08 03:09:13', '2021-12-08 03:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `mutasis`
--

CREATE TABLE `mutasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_sk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_strukturs`
--

CREATE TABLE `parent_strukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_strukturs`
--

INSERT INTO `parent_strukturs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(25, 'direksi', '2021-11-16 03:12:14', '2021-11-16 03:12:14'),
(26, 'direktur utama', '2021-11-16 03:12:40', '2021-11-16 03:12:40'),
(27, 'direktur', '2021-11-16 03:13:01', '2021-11-16 03:13:01'),
(28, 'manager', '2021-11-16 03:31:46', '2021-11-16 03:31:46'),
(29, 'manager personal', '2021-11-16 03:32:06', '2021-11-16 03:32:06'),
(30, 'manager pemasar', '2021-11-16 03:32:25', '2021-11-16 03:32:25'),
(31, 'manager pabrik', '2021-11-16 03:34:33', '2021-11-16 03:34:33'),
(32, 'admin & gudang', '2021-11-16 03:35:02', '2021-11-16 03:35:02'),
(33, 'direktur keuangan', '2021-11-18 03:59:16', '2021-11-18 03:59:16'),
(35, 'direktur personalia', '2021-11-18 05:50:54', '2021-11-18 05:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmt` date NOT NULL,
  `tanggal_kenaikan_berkala_terakhir` date NOT NULL,
  `tanggal_kenaikan_pangkat_terakhir` date NOT NULL,
  `status_pns` int(11) NOT NULL,
  `status_user` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_perkawinan_id` bigint(20) UNSIGNED NOT NULL,
  `agama_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `pendidikan_id` bigint(20) UNSIGNED NOT NULL,
  `golongan_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `organisasi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nip`, `nama`, `nik`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `jenis_kelamin`, `no_hp`, `foto`, `facebook`, `instagram`, `tmt`, `tanggal_kenaikan_berkala_terakhir`, `tanggal_kenaikan_pangkat_terakhir`, `status_pns`, `status_user`, `user_id`, `status_perkawinan_id`, `agama_id`, `jabatan_id`, `pendidikan_id`, `golongan_id`, `unit_id`, `organisasi_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11806634', 'Ichsan Arrizqi', '6634', '2000-11-02', 'Bogor', 'Bojonggede', 'Laki Laki', '081296031743', 'pegawai/foto/20211116112147_orang.jpg', 'https://facebook.com/', 'https://instagram.com/', '2017-11-26', '2021-11-16', '2021-11-16', 1, 1, 4, 4, 6, 5, 3, 1, 3, 46, '2021-11-16 04:21:47', '2021-12-01 07:32:17', NULL),
(2, '839201', 'budi', '12321', '2021-11-17', 'Jakarta', 'dsa', 'Laki Laki', '123', 'pegawai/foto/06102021162408-AIG.png', 'https://facebook.com/', 'https://instagram.com/', '2017-11-26', '2021-11-16', '2021-11-16', 1, 1, 5, 4, 6, 5, 10, 2, 3, 64, '2021-11-16 04:41:45', '2022-01-28 07:57:21', NULL),
(3, '123123', 'James', '132312', '1999-11-16', 'Depok', 'Depok', 'Laki Laki', '1232131', 'pegawai/foto/20211116131206_1924756943_20211111_michele-caliani-iLAAT1E-H_8-unsplash.jpg', 'https://facebook.com/', 'https://instagram.com/', '2017-11-26', '2021-11-16', '2021-11-16', 1, 1, 6, 1, 3, 2, 6, 1, 1, 49, '2021-11-16 06:12:06', '2021-11-16 06:12:06', NULL),
(4, '123908', 'Alyssa', '1298309', '1999-06-17', 'Tanggerang', 'Tanggerang', 'Prempuan', '213098709123', 'pegawai/foto/20211116131343_menangis.jpg', 'https://facebook.com/', 'https://instagram.com/', '2019-11-26', '2021-11-16', '2021-11-16', 1, 1, 7, 1, 2, 4, 7, 1, 1, 35, '2021-11-16 06:13:43', '2021-11-16 06:13:43', NULL),
(5, '123989', 'iqbal', '1290830', '2007-03-22', 'Jakarta', 'Jakarta', 'Laki Laki', '1239213', 'pegawai/foto/20211122093458_06102021162408-381-3812277_ville-de-saint-etienne-png-download-gambar-icon.png', 'https://facebook.com/', 'https://instagram.com/', '2019-11-29', '2021-11-22', '2021-11-22', 1, 1, 8, 1, 1, 1, 3, 2, 3, 49, '2021-11-22 02:34:59', '2021-11-22 02:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikans`
--

INSERT INTO `pendidikans` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SD / MI', 1, '2021-11-16 04:04:57', '2021-11-16 04:04:57'),
(2, 'SMP / MTS', 1, '2021-11-16 04:05:03', '2021-11-16 04:05:03'),
(3, 'SMA / MA / SMK', 1, '2021-11-16 04:05:10', '2021-11-16 04:05:10'),
(4, 'D1', 1, '2021-11-16 04:05:17', '2021-11-16 04:05:17'),
(5, 'D2', 1, '2021-11-16 04:05:24', '2021-11-16 04:05:24'),
(6, 'D4', 1, '2021-11-16 04:05:31', '2021-11-16 04:05:31'),
(7, 'S1', 1, '2021-11-16 04:05:37', '2021-11-16 04:05:37'),
(8, 'S2', 1, '2021-11-16 04:05:44', '2021-11-16 04:05:44'),
(9, 'S3', 1, '2021-11-16 04:05:51', '2021-11-16 04:05:51'),
(10, 'D3', 1, '2021-11-16 04:05:58', '2021-11-16 04:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `penggajians`
--

CREATE TABLE `penggajians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `gaji_pokok` bigint(20) NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggajians`
--

INSERT INTO `penggajians` (`id`, `pegawai_id`, `tanggal`, `gaji_pokok`, `jabatan`, `golongan`, `admin`, `created_at`, `updated_at`) VALUES
(4, 1, '2021-12-06', 5000000, 'Kepala Dinas', 'IV', 'admin', '2021-12-07 07:54:31', '2021-12-08 10:00:28'),
(5, 5, '2021-12-02', 4500000, 'Kepala Seksi Pelaksanaan Penataan Ruang', 'IV', 'admin', '2021-12-08 02:35:05', '2021-12-08 08:36:03'),
(6, 3, '2021-12-08', 1000000, 'Kepala Seksi Pengawasan dan Pengendalian Pemanfaatan Ruang', 'IV', 'admin', '2021-12-08 06:34:06', '2021-12-08 06:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin-access', 'web', '2021-11-15 07:36:42', '2021-11-15 07:36:42'),
(2, 'pegawai-access', 'web', '2021-11-15 07:36:42', '2021-11-15 07:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(28, 'App\\Models\\User', 4, 'auth_token', 'c97a66b7c71c1f9d20cdb1cdb19643da33f3d394eea42fe8d87c466e2d8fcab9', '[\"*\"]', NULL, '2021-12-10 03:51:36', '2021-12-10 03:51:36'),
(29, 'App\\Models\\User', 4, 'auth_token', '03a85d833bfabe55659ff16a15989517c8a462055808a5884b9eb5f6aa94bd9c', '[\"*\"]', NULL, '2021-12-10 03:56:03', '2021-12-10 03:56:03'),
(30, 'App\\Models\\User', 4, 'auth_token', 'ff4eb7740da8eb584334d684ddcd1e1b587a91ad488dabaa3d6bc0f6fc91b038', '[\"*\"]', NULL, '2021-12-10 03:58:47', '2021-12-10 03:58:47'),
(31, 'App\\Models\\User', 4, 'auth_token', '6f029d9fc4826b06cc11648d20519729831e4533087c8ae49a79f57b18ca6f7a', '[\"*\"]', NULL, '2021-12-10 03:59:53', '2021-12-10 03:59:53'),
(32, 'App\\Models\\User', 4, 'auth_token', 'e5fd0c34e3747094990ee7d3844578a42f351c9b332443ca59c622411a37808b', '[\"*\"]', NULL, '2021-12-10 04:00:11', '2021-12-10 04:00:11'),
(33, 'App\\Models\\User', 4, 'auth_token', 'ec07f2bdcdbb27d5714abd708affa7d342d1c63c548a7cfec5644c0c47f6ff5f', '[\"*\"]', NULL, '2021-12-10 04:02:21', '2021-12-10 04:02:21'),
(34, 'App\\Models\\User', 4, 'auth_token', '122d36905f75b0965bc63e4e84207fe176be44c3a0d3f8bfecb0e7a39f39c430', '[\"*\"]', '2021-12-10 09:44:17', '2021-12-10 04:05:16', '2021-12-10 09:44:17'),
(35, 'App\\Models\\User', 4, 'auth_token', '612a9d78504beb5c4c907469e4461b8783e78025ade363811257fb2ae0f2ab30', '[\"*\"]', '2021-12-10 04:16:02', '2021-12-10 04:15:00', '2021-12-10 04:16:02'),
(36, 'App\\Models\\User', 4, 'auth_token', '09397683bbca6019a39f1672d4ce1ef000ae2da2a74daa8460bcc14e0b483c58', '[\"*\"]', '2021-12-10 04:16:17', '2021-12-10 04:16:14', '2021-12-10 04:16:17'),
(37, 'App\\Models\\User', 4, 'auth_token', 'a6263a4d9470a6ddf82abb31a4b0a4b3d4b0176dbc4a18e5597fa02e303e0e6a', '[\"*\"]', '2021-12-10 04:16:56', '2021-12-10 04:16:52', '2021-12-10 04:16:56'),
(38, 'App\\Models\\User', 4, 'auth_token', 'a6707f730511fdfe85d9f3bfe7576f32e1691971e709b1260feaf0abd6c53abc', '[\"*\"]', '2021-12-10 04:20:06', '2021-12-10 04:17:13', '2021-12-10 04:20:06'),
(39, 'App\\Models\\User', 4, 'auth_token', 'ce6f629ffee311014989a3915631efaf200aacff4681fec4a5f7ad3d00b31334', '[\"*\"]', '2021-12-10 04:28:58', '2021-12-10 04:28:55', '2021-12-10 04:28:58'),
(40, 'App\\Models\\User', 4, 'auth_token', 'fb4f8c790d91b25465d41e0edd9e3af46f7f9a5530863299e82c71bc59ca6e5d', '[\"*\"]', '2021-12-10 04:38:43', '2021-12-10 04:32:09', '2021-12-10 04:38:43'),
(41, 'App\\Models\\User', 4, 'auth_token', '438c721d517c034f39908ada3cdaafc0f99c4f47660dc13fe4ae438dee83fce7', '[\"*\"]', '2021-12-10 04:42:24', '2021-12-10 04:38:55', '2021-12-10 04:42:24'),
(42, 'App\\Models\\User', 4, 'auth_token', '693e5cecf79f1cf490ee48b1b33fdfa11583f13d6a0ecc6907381046f2baf234', '[\"*\"]', '2021-12-10 04:45:23', '2021-12-10 04:42:49', '2021-12-10 04:45:23'),
(43, 'App\\Models\\User', 4, 'auth_token', '2a49be6792ba814c8a90ce95e30084d2e7e379730a1af1adfd03d9948558ce26', '[\"*\"]', '2021-12-10 04:54:43', '2021-12-10 04:45:31', '2021-12-10 04:54:43'),
(44, 'App\\Models\\User', 4, 'auth_token', '1b7765f5814d2c0dec5b656487d3db5dcb91cfcddff52e72ea1dfb63bfea246f', '[\"*\"]', '2021-12-10 06:25:17', '2021-12-10 06:22:31', '2021-12-10 06:25:17'),
(45, 'App\\Models\\User', 4, 'auth_token', 'd5bf7aa35f33d7b7275fc46d90a98fd386ec53ad0efadbf3c8d1d27eeceb4d71', '[\"*\"]', '2021-12-10 06:33:23', '2021-12-10 06:25:28', '2021-12-10 06:33:23'),
(46, 'App\\Models\\User', 4, 'auth_token', '949da715bf59749eca7ef926ed4e142afc25e4a186a545d463750392a9c168d0', '[\"*\"]', '2021-12-10 06:49:19', '2021-12-10 06:37:22', '2021-12-10 06:49:19'),
(47, 'App\\Models\\User', 4, 'auth_token', '6c9155edd3c04de51ee2ba4a53eea70b48b2ea536234ceb2eeb9e25a1f043e8f', '[\"*\"]', '2021-12-10 07:13:43', '2021-12-10 06:49:44', '2021-12-10 07:13:43'),
(48, 'App\\Models\\User', 4, 'auth_token', '255cfba674a777927c326f0e9b408a266e91a42c0463709772b30e552a85a4c3', '[\"*\"]', '2021-12-10 07:16:38', '2021-12-10 07:14:10', '2021-12-10 07:16:38'),
(50, 'App\\Models\\User', 5, 'auth_token', '55a4cfcbc37afe65a540caa73123da7889cf2a94a33fa9ff9e2248aaa8d78fe9', '[\"*\"]', '2021-12-10 09:27:48', '2021-12-10 09:25:29', '2021-12-10 09:27:48'),
(51, 'App\\Models\\User', 4, 'auth_token', '735a1e985c4eda0e245e2490cad111a11cc2cdab5c70220c8e8abe72410deda5', '[\"*\"]', '2021-12-10 09:29:14', '2021-12-10 09:28:52', '2021-12-10 09:29:14'),
(52, 'App\\Models\\User', 4, 'auth_token', 'f5249c7f33ce297c91a751d3f9ee8eec6bd1f1b05880ebf209f5921732b6c8cc', '[\"*\"]', '2021-12-10 09:30:34', '2021-12-10 09:29:45', '2021-12-10 09:30:34'),
(53, 'App\\Models\\User', 4, 'auth_token', 'd278150ba7b75c04622e5f0485519712aa3640ac7ec75baea3c5202648fc63a3', '[\"*\"]', '2021-12-10 09:33:20', '2021-12-10 09:31:09', '2021-12-10 09:33:20'),
(54, 'App\\Models\\User', 4, 'auth_token', 'c5d910ff628e390c9c953984eb01bcfd835630f23a35e251b3006360ca648512', '[\"*\"]', '2021-12-10 09:33:57', '2021-12-10 09:33:33', '2021-12-10 09:33:57'),
(55, 'App\\Models\\User', 4, 'auth_token', '830b3ecfa4d687e2bef08082ca1ba32d3749c45d827597d9c2090a3083e78bc0', '[\"*\"]', '2021-12-10 09:34:45', '2021-12-10 09:34:32', '2021-12-10 09:34:45'),
(56, 'App\\Models\\User', 4, 'auth_token', '965bc3924165d3f0e37b9473af5f388baadd66b638f1f4ca83ed1ffe5eb681fd', '[\"*\"]', '2021-12-10 09:35:01', '2021-12-10 09:34:58', '2021-12-10 09:35:01'),
(57, 'App\\Models\\User', 4, 'auth_token', 'e9bfd4576d6e3d822b64e077d86bd7b89a3eeff78abaf42ef936670897b0224f', '[\"*\"]', '2021-12-10 09:43:05', '2021-12-10 09:37:33', '2021-12-10 09:43:05'),
(58, 'App\\Models\\User', 4, 'auth_token', '591012e117c70044616c36ca0115c15f386706c279829a8b93512632adff78c1', '[\"*\"]', '2021-12-10 09:43:18', '2021-12-10 09:43:15', '2021-12-10 09:43:18'),
(59, 'App\\Models\\User', 4, 'auth_token', '7d55a54f391bab5bce336f6143e2e931528ade6164387bc5fea36e3ef7d3361e', '[\"*\"]', '2021-12-10 09:43:53', '2021-12-10 09:43:50', '2021-12-10 09:43:53'),
(60, 'App\\Models\\User', 4, 'auth_token', 'e7133556c9fc0ae41ab9e5ead13cd5dd3ad32ac6f2776a4f6023324df799ed60', '[\"*\"]', '2021-12-10 09:44:28', '2021-12-10 09:44:25', '2021-12-10 09:44:28'),
(61, 'App\\Models\\User', 4, 'auth_token', 'ee3068b17308e53391be28df2da0d754968a0abab65f58066d5202ee454a7477', '[\"*\"]', '2021-12-10 09:44:46', '2021-12-10 09:44:43', '2021-12-10 09:44:46'),
(62, 'App\\Models\\User', 4, 'auth_token', 'aa3432a554b713bf037548ce10f6c0b34a09a5803e90ed8e366474d99982b5f7', '[\"*\"]', '2021-12-10 09:45:29', '2021-12-10 09:45:26', '2021-12-10 09:45:29'),
(63, 'App\\Models\\User', 4, 'auth_token', '3fbbff41d041028849cbeb33083010b6d356d4882763df72c1166fb4a2cb6fb3', '[\"*\"]', '2021-12-10 09:46:18', '2021-12-10 09:46:15', '2021-12-10 09:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_rapats`
--

CREATE TABLE `peserta_rapats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `rapat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peserta_rapats`
--

INSERT INTO `peserta_rapats` (`id`, `pegawai_id`, `rapat_id`, `created_at`, `updated_at`) VALUES
(17, 1, 3, '2021-12-09 09:04:41', '2021-12-09 09:04:41'),
(18, 2, 3, '2021-12-09 09:04:41', '2021-12-09 09:04:41'),
(19, 5, 3, '2021-12-09 09:04:41', '2021-12-09 09:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `rapats`
--

CREATE TABLE `rapats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agenda` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rapats`
--

INSERT INTO `rapats` (`id`, `tanggal`, `mulai`, `selesai`, `tempat`, `agenda`, `created_at`, `updated_at`) VALUES
(3, '2021-12-06', '16:03:00', '17:03:00', 'qsindo', 'cerita 25 nabi dan rasul', '2021-12-06 09:04:30', '2021-12-06 09:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `response`, `disposisi_id`, `pegawai_id`, `created_at`, `updated_at`) VALUES
(1, 'Halo Juga Pak', 1, 1, '2021-11-18 08:23:09', '2021-11-18 08:23:09'),
(2, 'Baik', 2, 3, '2021-11-18 09:47:44', '2021-11-18 09:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_gajis`
--

CREATE TABLE `rincian_gajis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penggajian_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('penerimaan','potongan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rincian_gajis`
--

INSERT INTO `rincian_gajis` (`id`, `penggajian_id`, `nama`, `tipe`, `nominal`, `created_at`, `updated_at`) VALUES
(99, 6, 'gaji pokok', 'penerimaan', 1000000, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(100, 6, 'tujangan', 'penerimaan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(101, 6, 'lembur', 'penerimaan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(102, 6, 'transport', 'penerimaan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(103, 6, 'uang makan', 'penerimaan', 500000, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(104, 6, 'bonus', 'penerimaan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(105, 6, 'infaq', 'penerimaan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(106, 6, 'tunjangan jabatan', 'potongan', 50000, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(107, 6, 'BPJS', 'potongan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(108, 6, 'JHT', 'potongan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(109, 6, 'JKK', 'potongan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(110, 6, 'JPN', 'potongan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(111, 6, 'PPN', 'potongan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(112, 6, 'infaq dan sadaqoh', 'potongan', 0, '2021-12-08 08:10:45', '2021-12-08 08:10:45'),
(113, 5, 'gaji pokok', 'penerimaan', 4500000, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(114, 5, 'tujangan', 'penerimaan', 500000, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(115, 5, 'lembur', 'penerimaan', 0, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(116, 5, 'transport', 'penerimaan', 300000, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(117, 5, 'uang makan', 'penerimaan', 200000, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(118, 5, 'bonus', 'penerimaan', 500000, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(119, 5, 'tunjangan jabatan', 'potongan', 200000, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(120, 5, 'BPJS', 'potongan', 100000, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(121, 5, 'JHT', 'potongan', 0, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(122, 5, 'JKK', 'potongan', 0, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(123, 5, 'JPN', 'potongan', 0, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(124, 5, 'PPN', 'potongan', 0, '2021-12-08 08:36:03', '2021-12-08 08:36:03'),
(125, 4, 'gaji pokok', 'penerimaan', 5000000, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(126, 4, 'tujangan', 'penerimaan', 500000, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(127, 4, 'lembur', 'penerimaan', 0, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(128, 4, 'transport', 'penerimaan', 300000, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(129, 4, 'uang makan', 'penerimaan', 200000, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(130, 4, 'bonus', 'penerimaan', 500000, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(131, 4, 'tunjangan jabatan', 'potongan', 200000, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(132, 4, 'BPJS', 'potongan', 100000, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(133, 4, 'JHT', 'potongan', 0, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(134, 4, 'JKK', 'potongan', 0, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(135, 4, 'JPN', 'potongan', 0, '2021-12-08 10:00:28', '2021-12-08 10:00:28'),
(136, 4, 'PPN', 'potongan', 0, '2021-12-08 10:00:28', '2021-12-08 10:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikans`
--

CREATE TABLE `riwayat_pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `pendidikan_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_ijazah` date NOT NULL,
  `nama_kepsek_rektor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pendidikans`
--

INSERT INTO `riwayat_pendidikans` (`id`, `pegawai_id`, `pendidikan_id`, `nama`, `lokasi`, `jurusan`, `nomor_ijazah`, `tanggal_ijazah`, `nama_kepsek_rektor`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'SDN 1', 'Bojonggede', '-', '12093809', '2013-11-22', 'Rosmiyati', 1, '2021-12-03 03:08:47', '2021-12-03 03:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-11-15 07:36:42', '2021-11-15 07:36:42'),
(2, 'pegawai', 'web', '2021-11-15 07:36:42', '2021-11-15 07:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo_admin`, `logo_pegawai`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Q office', 'setting/logo_admin_logo_admin.png', 'setting/logo_pegawai_logo_qoffice (COLOR).png', 'selamat datang di qoffice', '2021-11-16 02:04:33', '2021-12-03 09:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `sppds`
--

CREATE TABLE `sppds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `pemberi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_sppd_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sppds`
--

INSERT INTO `sppds` (`id`, `nomor`, `asal`, `tanggal_surat`, `tanggal_berangkat`, `tanggal_kembali`, `pemberi`, `pegawai_id`, `kategori_sppd_id`, `created_at`, `updated_at`) VALUES
(1, 'KOMINFO_2021', 'Jakarta', '2021-11-19', '2021-11-22', '2021-11-26', 'Pak Ahmad', 1, 1, '2021-11-19 09:10:21', '2021-11-19 09:10:21'),
(2, 'ADMIN_2021', 'Budi', '2021-11-19', '2021-11-29', '2021-12-04', 'Pak Ahmad', 2, 1, '2021-11-19 09:10:45', '2021-11-19 09:10:45'),
(3, '1293809', 'Depok', '2021-11-19', '2021-11-23', '2021-11-25', 'Pak Ahmad', 3, 1, '2021-11-19 09:17:06', '2021-11-19 09:17:06'),
(4, '667767676', 'Jakarta', '2021-12-29', '2021-12-23', '2021-12-30', 'Pak Ahmad', 1, 1, '2021-12-28 05:32:52', '2021-12-28 05:32:52'),
(5, 'SPPD/01/02', 'Jakarta', '2021-12-15', '2021-12-14', '2021-12-17', 'mas dawuh', 1, 4, '2021-12-28 07:45:00', '2021-12-28 07:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `status_pernikahans`
--

CREATE TABLE `status_pernikahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktifya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_pernikahans`
--

INSERT INTO `status_pernikahans` (`id`, `nama`, `aktifya`, `created_at`, `updated_at`) VALUES
(1, 'Belum Kawin', 1, '2021-11-16 04:04:12', '2021-11-16 04:04:12'),
(2, 'Cerai Hidup', 1, '2021-11-16 04:04:26', '2021-11-16 04:04:26'),
(3, 'Cerai Mati', 1, '2021-11-16 04:04:32', '2021-11-16 04:04:32'),
(4, 'Kawin', 1, '2021-11-16 04:04:40', '2021-11-16 04:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluars`
--

CREATE TABLE `surat_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluars`
--

INSERT INTO `surat_keluars` (`id`, `tujuan`, `nomor`, `ringkas`, `tanggal`, `keterangan`, `file`, `klasifikasi_id`, `created_at`, `updated_at`) VALUES
(1, 'Pegawai', 'PEGAWAI_2021', 'Pegawai', '2021-11-18', 'Untuk Semua Pegawai', 'surat/keluar/20211118133637_DataTables example - PDF - page size and orientation - Copy.pdf', 2, '2021-11-18 06:36:37', '2021-11-18 06:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuks`
--

CREATE TABLE `surat_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_masuks`
--

INSERT INTO `surat_masuks` (`id`, `asal`, `nomor`, `ringkas`, `index`, `tanggal`, `keterangan`, `file`, `klasifikasi_id`, `created_at`, `updated_at`) VALUES
(3, 'Dinas kominfo', 'KOMINFO_2021', 'Surat agak penting', '1', '2021-11-18', 'Halo Kami dari kominfo', 'surat/masuk/20211118133440_Nixlot - HTML5 Bootstrap Admin Template.pdf', 1, '2021-11-18 06:34:40', '2021-11-18 06:34:40'),
(4, 'CNN Indonesia', 'CNN_2021', 'Pembenahan Ruangan', '2', '2021-11-03', 'Pembenahan Ruangan', 'surat/masuk/20211118133541_SK_03112021.docx', 1, '2021-11-18 06:35:41', '2021-11-19 03:25:56'),
(5, 'Mentri Kelautan', '213980', 'Pencemaran Laut', '3', '2021-11-12', 'Pencemaran Laut', 'surat/masuk/20211118164635_20211025134649_20211022103200_SK_12102021.docx', 1, '2021-11-18 09:46:35', '2021-11-18 09:46:35'),
(6, 'Gubernur Jakarta', '912083lkj', 'Gaji Programmer', '1', '2021-11-25', 'Jadi gini', 'surat/masuk/20211209165406_Web capture_8-12-2021_134117_localhost.jpeg', 1, '2021-12-09 09:54:06', '2021-12-09 09:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Keuangan', '2021-11-16 04:07:39', '2021-11-16 04:07:39'),
(2, 'Administrator', '2021-11-16 04:08:29', '2021-11-16 04:08:29'),
(3, 'Gedung', '2021-11-16 04:08:41', '2021-11-16 04:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$otvVHEmomhstT9biQdbm5.GZtkVYrSiqyDr/CAg2T/h.bdomrg076', NULL, '2021-11-15 07:36:42', '2021-11-15 07:36:42', NULL),
(4, 'Ichsan Arrizqi', 'ichsanarrizqi090@gmail.com', NULL, '$2y$10$q4585Y4svFDjjyTUPVVAAumZ3QwnSAv4NBROshPoaei0546jiIp66', NULL, '2021-11-16 04:21:47', '2021-12-28 05:28:49', NULL),
(5, 'budi', 'budi@gmail.com', NULL, '$2y$10$3293dt9lIsujfsBTqn5MzeIXZxrzkrmA4zRTWTuhNu3Ox1kZSBOdi', NULL, '2021-11-16 04:41:45', '2022-01-28 07:57:21', NULL),
(6, 'James', 'james@gmail.com', NULL, '$2y$10$XheJiY0awRb.ZWtx2zK6m.A4SZvmb8adMAYVFtDhgCzBCY1bz7y1O', NULL, '2021-11-16 06:12:06', '2021-11-16 06:12:06', NULL),
(7, 'Alyssa', 'alyssa@gmail.com', NULL, '$2y$10$vMqlu6.RwHp2/.e865pmDOZKCkXCcQZ.LWhAuIOGjE5qvwXqDrICa', NULL, '2021-11-16 06:13:43', '2021-11-16 06:13:43', NULL),
(8, 'iqbal', 'iqbal@gmail.com', NULL, '$2y$10$551BXRTFHoNzKXkKd5IlH.fn4sHPjU0Brbh4N65ApwI/1NVKBjIHu', NULL, '2021-11-22 02:34:58', '2021-11-22 02:34:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accesses_file_pegawai_id_foreign` (`file_pegawai_id`),
  ADD KEY `accesses_user_id_foreign` (`user_id`);

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applies_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_kategori_artikel_id_foreign` (`kategori_artikel_id`),
  ADD KEY `artikels_user_id_foreign` (`user_id`);

--
-- Indexes for table `child_strukturs`
--
ALTER TABLE `child_strukturs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_strukturs_parent_struktur_id_foreign` (`parent_struktur_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_file_pegawai_id_foreign` (`file_pegawai_id`),
  ADD KEY `comments_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `cutis`
--
ALTER TABLE `cutis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cutis_kategori_cuti_id_foreign` (`kategori_cuti_id`),
  ADD KEY `cutis_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `diklats`
--
ALTER TABLE `diklats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diklats_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `disposisis`
--
ALTER TABLE `disposisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisis_surat_masuk_id_foreign` (`surat_masuk_id`),
  ADD KEY `disposisis_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_pegawais`
--
ALTER TABLE `file_pegawais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_pegawais_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `file_rapats`
--
ALTER TABLE `file_rapats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_rapats_rapat_id_foreign` (`rapat_id`);

--
-- Indexes for table `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jams`
--
ALTER TABLE `jams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_artikels`
--
ALTER TABLE `kategori_artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_cutis`
--
ALTER TABLE `kategori_cutis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_sppds`
--
ALTER TABLE `kategori_sppds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keahlians`
--
ALTER TABLE `keahlians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasis`
--
ALTER TABLE `klasifikasis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `klasifikasis_kode_unique` (`kode`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mst_penerimaans`
--
ALTER TABLE `mst_penerimaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_potongans`
--
ALTER TABLE `mst_potongans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasis`
--
ALTER TABLE `mutasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutasis_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `parent_strukturs`
--
ALTER TABLE `parent_strukturs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawais_user_id_foreign` (`user_id`),
  ADD KEY `pegawais_status_perkawinan_id_foreign` (`status_perkawinan_id`),
  ADD KEY `pegawais_agama_id_foreign` (`agama_id`),
  ADD KEY `pegawais_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `pegawais_pendidikan_id_foreign` (`pendidikan_id`),
  ADD KEY `pegawais_golongan_id_foreign` (`golongan_id`),
  ADD KEY `pegawais_unit_id_foreign` (`unit_id`),
  ADD KEY `pegawais_organisasi_id_foreign` (`organisasi_id`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggajians`
--
ALTER TABLE `penggajians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penggajians_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `peserta_rapats`
--
ALTER TABLE `peserta_rapats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_rapats_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `peserta_rapats_rapat_id_foreign` (`rapat_id`);

--
-- Indexes for table `rapats`
--
ALTER TABLE `rapats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responses_disposisi_id_foreign` (`disposisi_id`),
  ADD KEY `responses_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `rincian_gajis`
--
ALTER TABLE `rincian_gajis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rincian_gajis_penggajian_id_foreign` (`penggajian_id`);

--
-- Indexes for table `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_pendidikans_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `riwayat_pendidikans_pendidikan_id_foreign` (`pendidikan_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sppds`
--
ALTER TABLE `sppds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sppds_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `sppds_kategori_sppd_id_foreign` (`kategori_sppd_id`);

--
-- Indexes for table `status_pernikahans`
--
ALTER TABLE `status_pernikahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_keluars_klasifikasi_id_foreign` (`klasifikasi_id`);

--
-- Indexes for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_masuks_klasifikasi_id_foreign` (`klasifikasi_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applies`
--
ALTER TABLE `applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `child_strukturs`
--
ALTER TABLE `child_strukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cutis`
--
ALTER TABLE `cutis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diklats`
--
ALTER TABLE `diklats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disposisis`
--
ALTER TABLE `disposisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_pegawais`
--
ALTER TABLE `file_pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `file_rapats`
--
ALTER TABLE `file_rapats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jams`
--
ALTER TABLE `jams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_artikels`
--
ALTER TABLE `kategori_artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_cutis`
--
ALTER TABLE `kategori_cutis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_sppds`
--
ALTER TABLE `kategori_sppds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keahlians`
--
ALTER TABLE `keahlians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `klasifikasis`
--
ALTER TABLE `klasifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `mst_penerimaans`
--
ALTER TABLE `mst_penerimaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mst_potongans`
--
ALTER TABLE `mst_potongans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mutasis`
--
ALTER TABLE `mutasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_strukturs`
--
ALTER TABLE `parent_strukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penggajians`
--
ALTER TABLE `penggajians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `peserta_rapats`
--
ALTER TABLE `peserta_rapats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rapats`
--
ALTER TABLE `rapats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rincian_gajis`
--
ALTER TABLE `rincian_gajis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sppds`
--
ALTER TABLE `sppds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_pernikahans`
--
ALTER TABLE `status_pernikahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `accesses`
--
ALTER TABLE `accesses`
  ADD CONSTRAINT `accesses_file_pegawai_id_foreign` FOREIGN KEY (`file_pegawai_id`) REFERENCES `file_pegawais` (`id`),
  ADD CONSTRAINT `accesses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `applies`
--
ALTER TABLE `applies`
  ADD CONSTRAINT `applies_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_kategori_artikel_id_foreign` FOREIGN KEY (`kategori_artikel_id`) REFERENCES `kategori_artikels` (`id`),
  ADD CONSTRAINT `artikels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `child_strukturs`
--
ALTER TABLE `child_strukturs`
  ADD CONSTRAINT `child_strukturs_parent_struktur_id_foreign` FOREIGN KEY (`parent_struktur_id`) REFERENCES `parent_strukturs` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_file_pegawai_id_foreign` FOREIGN KEY (`file_pegawai_id`) REFERENCES `file_pegawais` (`id`),
  ADD CONSTRAINT `comments_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `cutis`
--
ALTER TABLE `cutis`
  ADD CONSTRAINT `cutis_kategori_cuti_id_foreign` FOREIGN KEY (`kategori_cuti_id`) REFERENCES `kategori_cutis` (`id`),
  ADD CONSTRAINT `cutis_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `diklats`
--
ALTER TABLE `diklats`
  ADD CONSTRAINT `diklats_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `disposisis`
--
ALTER TABLE `disposisis`
  ADD CONSTRAINT `disposisis_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`),
  ADD CONSTRAINT `disposisis_surat_masuk_id_foreign` FOREIGN KEY (`surat_masuk_id`) REFERENCES `surat_masuks` (`id`);

--
-- Constraints for table `file_pegawais`
--
ALTER TABLE `file_pegawais`
  ADD CONSTRAINT `file_pegawais_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `file_rapats`
--
ALTER TABLE `file_rapats`
  ADD CONSTRAINT `file_rapats_rapat_id_foreign` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mutasis`
--
ALTER TABLE `mutasis`
  ADD CONSTRAINT `mutasis_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `agamas` (`id`),
  ADD CONSTRAINT `pegawais_golongan_id_foreign` FOREIGN KEY (`golongan_id`) REFERENCES `golongans` (`id`),
  ADD CONSTRAINT `pegawais_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`),
  ADD CONSTRAINT `pegawais_organisasi_id_foreign` FOREIGN KEY (`organisasi_id`) REFERENCES `child_strukturs` (`id`),
  ADD CONSTRAINT `pegawais_pendidikan_id_foreign` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikans` (`id`),
  ADD CONSTRAINT `pegawais_status_perkawinan_id_foreign` FOREIGN KEY (`status_perkawinan_id`) REFERENCES `status_pernikahans` (`id`),
  ADD CONSTRAINT `pegawais_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `pegawais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `penggajians`
--
ALTER TABLE `penggajians`
  ADD CONSTRAINT `penggajians_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `peserta_rapats`
--
ALTER TABLE `peserta_rapats`
  ADD CONSTRAINT `peserta_rapats_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`),
  ADD CONSTRAINT `peserta_rapats_rapat_id_foreign` FOREIGN KEY (`rapat_id`) REFERENCES `rapats` (`id`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_disposisi_id_foreign` FOREIGN KEY (`disposisi_id`) REFERENCES `disposisis` (`id`),
  ADD CONSTRAINT `responses_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `rincian_gajis`
--
ALTER TABLE `rincian_gajis`
  ADD CONSTRAINT `rincian_gajis_penggajian_id_foreign` FOREIGN KEY (`penggajian_id`) REFERENCES `penggajians` (`id`);

--
-- Constraints for table `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  ADD CONSTRAINT `riwayat_pendidikans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`),
  ADD CONSTRAINT `riwayat_pendidikans_pendidikan_id_foreign` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikans` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sppds`
--
ALTER TABLE `sppds`
  ADD CONSTRAINT `sppds_kategori_sppd_id_foreign` FOREIGN KEY (`kategori_sppd_id`) REFERENCES `kategori_sppds` (`id`),
  ADD CONSTRAINT `sppds_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  ADD CONSTRAINT `surat_keluars_klasifikasi_id_foreign` FOREIGN KEY (`klasifikasi_id`) REFERENCES `klasifikasis` (`id`);

--
-- Constraints for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD CONSTRAINT `surat_masuks_klasifikasi_id_foreign` FOREIGN KEY (`klasifikasi_id`) REFERENCES `klasifikasis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
