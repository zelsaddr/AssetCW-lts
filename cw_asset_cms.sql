-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 11:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cw_asset_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id` int(11) NOT NULL,
  `nomor_invoice` varchar(255) DEFAULT NULL,
  `kode_aset` varchar(100) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `identitas_barang` int(11) DEFAULT NULL,
  `tanggal_barang_datang` date NOT NULL,
  `volume` int(11) NOT NULL,
  `foto_barang_path` varchar(255) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `lokasi_aset_id` int(11) NOT NULL,
  `nilai_perolehan` bigint(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk_barang` varchar(255) NOT NULL,
  `tahun_perolehan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kategori_id`, `nama_barang`, `merk_barang`, `tahun_perolehan`, `created_at`, `updated_at`) VALUES
(19, 78, 'kursi direksi', 'indachi', 2018, '2024-09-23 18:47:47', '2024-09-23 18:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `dokumen_uploaded_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(78, 'CW-1A000', 'Kursi Direksi', '2024-09-09', '2024-09-09'),
(79, 'ACW-1A000', 'Kursi Direksi', '2024-09-09', '2024-09-09'),
(80, 'CW-1B000', 'Kursi Hadap Meeting', '2024-09-09', '2024-09-09'),
(81, 'ACW-1B000', 'Kursi Hadap Meeting', '2024-09-09', '2024-09-09'),
(82, 'CW-1C000', 'Kursi Ergomatic Coklat', '2024-09-09', '2024-09-09'),
(83, 'ACW-1C000', 'Kursi Ergomatic Coklat', '2024-09-09', '2024-09-09'),
(84, 'CW-1D000', 'Kursi Ergomatic Hitam', '2024-09-09', '2024-09-09'),
(85, 'ACW-1D000', 'Kursi Ergomatic Hitam', '2024-09-09', '2024-09-09'),
(86, 'CW-1E000', 'Kursi Hadap', '2024-09-09', '2024-09-09'),
(87, 'ACW-1E000', 'Kursi Hadap', '2024-09-09', '2024-09-09'),
(88, 'CW-1F000', 'Sofa Single', '2024-09-09', '2024-09-09'),
(89, 'ACW-1F000', 'Sofa Single', '2024-09-09', '2024-09-09'),
(90, 'CW-1G000', 'Bench 2 Seat', '2024-09-09', '2024-09-09'),
(91, 'ACW-1G000', 'Bench 2 Seat', '2024-09-09', '2024-09-09'),
(92, 'CW-1H000', 'Sofa 3 Seat', '2024-09-09', '2024-09-09'),
(93, 'ACW-1H000', 'Sofa 3 Seat', '2024-09-09', '2024-09-09'),
(94, 'CW-2A000', 'Meja Kerja Dir', '2024-09-09', '2024-09-09'),
(95, 'ACW-2A000', 'Meja Kerja Dir', '2024-09-09', '2024-09-09'),
(96, 'CW-2B000', 'Meja Kerja Manajer', '2024-09-09', '2024-09-09'),
(97, 'ACW-2B000', 'Meja Kerja Manajer', '2024-09-09', '2024-09-09'),
(98, 'CW-2C000', 'Meja Kerja Partisi', '2024-09-09', '2024-09-09'),
(99, 'ACW-2C000', 'Meja Kerja Partisi', '2024-09-09', '2024-09-09'),
(100, 'CW-2D000', 'Meja Kerja / Partisi', '2024-09-09', '2024-09-09'),
(101, 'ACW-2D000', 'Meja Kerja / Partisi', '2024-09-09', '2024-09-09'),
(102, 'CW-2E000', 'Meja Lain-Lain', '2024-09-09', '2024-09-09'),
(103, 'ACW-2E000', 'Meja Lain-Lain', '2024-09-09', '2024-09-09'),
(104, 'CW-2F000', 'Meja Kaca', '2024-09-09', '2024-09-09'),
(105, 'ACW-2F000', 'Meja Kaca', '2024-09-09', '2024-09-09'),
(106, 'CW-2G000', 'Meja Rapat', '2024-09-09', '2024-09-09'),
(107, 'ACW-2G000', 'Meja Rapat', '2024-09-09', '2024-09-09'),
(108, 'CW-2H000', 'Meja Granit', '2024-09-09', '2024-09-09'),
(109, 'ACW-2H000', 'Meja Granit', '2024-09-09', '2024-09-09'),
(110, 'CW-2I000', 'Meja Marmer', '2024-09-09', '2024-09-09'),
(111, 'ACW-2I000', 'Meja Marmer', '2024-09-09', '2024-09-09'),
(112, 'CW-3A000', 'CPU', '2024-09-09', '2024-09-09'),
(113, 'ACW-3A000', 'CPU', '2024-09-09', '2024-09-09'),
(114, 'CW-3B000', 'Server', '2024-09-09', '2024-09-09'),
(115, 'ACW-3B000', 'Server', '2024-09-09', '2024-09-09'),
(116, 'CW-3C000', 'Laptop', '2024-09-09', '2024-09-09'),
(117, 'ACW-3C000', 'Laptop', '2024-09-09', '2024-09-09'),
(118, 'CW-4A000', 'Monitor', '2024-09-09', '2024-09-09'),
(119, 'ACW-4A000', 'Monitor', '2024-09-09', '2024-09-09'),
(120, 'CW-5A000', 'Smart TV', '2024-09-09', '2024-09-09'),
(121, 'ACW-5A000', 'Smart TV', '2024-09-09', '2024-09-09'),
(122, 'CW-6A000', 'Printer', '2024-09-09', '2024-09-09'),
(123, 'ACW-6A000', 'Printer', '2024-09-09', '2024-09-09'),
(124, 'CW-7A000', 'Proyektor', '2024-09-09', '2024-09-09'),
(125, 'ACW-7A000', 'Proyektor', '2024-09-09', '2024-09-09'),
(126, 'CW-8A000', 'Motorized System', '2024-09-09', '2024-09-09'),
(127, 'ACW-8A000', 'Motorized System', '2024-09-09', '2024-09-09'),
(128, 'CW-9A000', 'AC Casset', '2024-09-09', '2024-09-09'),
(129, 'ACW-9A000', 'AC Casset', '2024-09-09', '2024-09-09'),
(130, 'CW-9B000', 'AC Split', '2024-09-09', '2024-09-09'),
(131, 'ACW-9B000', 'AC Split', '2024-09-09', '2024-09-09'),
(132, 'CW-10A000', 'Credenza Coklat', '2024-09-09', '2024-09-09'),
(133, 'ACW-10A000', 'Credenza Coklat', '2024-09-09', '2024-09-09'),
(134, 'CW-10B000', 'Credenza Hitam', '2024-09-09', '2024-09-09'),
(135, 'ACW-10B000', 'Credenza Hitam', '2024-09-09', '2024-09-09'),
(136, 'CW-10C000', 'Filing Cabinet', '2024-09-09', '2024-09-09'),
(137, 'ACW-10C000', 'Filing Cabinet', '2024-09-09', '2024-09-09'),
(138, 'CW-10D000', 'Loker', '2024-09-09', '2024-09-09'),
(139, 'ACW-10D000', 'Loker', '2024-09-09', '2024-09-09'),
(140, 'CW-19A000', 'Lemari Kaca', '2024-09-09', '2024-09-09'),
(141, 'ACW-19A000', 'Lemari Kaca', '2024-09-09', '2024-09-09'),
(142, 'CW-11A000', 'Rak TV', '2024-09-09', '2024-09-09'),
(143, 'ACW-11A000', 'Rak TV', '2024-09-09', '2024-09-09'),
(144, 'CW-12A000', 'Lampu Gantung', '2024-09-09', '2024-09-09'),
(145, 'ACW-12A000', 'Lampu Gantung', '2024-09-09', '2024-09-09'),
(146, 'CW-13A000', 'Pesawat Telepon', '2024-09-09', '2024-09-09'),
(147, 'ACW-13A000', 'Pesawat Telepon', '2024-09-09', '2024-09-09'),
(148, 'CW-14A000', 'Brangkas', '2024-09-09', '2024-09-09'),
(149, 'ACW-14A000', 'Brangkas', '2024-09-09', '2024-09-09'),
(150, 'CW-15A000', 'Clip Board', '2024-09-09', '2024-09-09'),
(151, 'ACW-15A000', 'Clip Board', '2024-09-09', '2024-09-09'),
(152, 'CW-16A000', 'Perlengkapan', '2024-09-09', '2024-09-09'),
(153, 'ACW-16A000', 'Perlengkapan', '2024-09-09', '2024-09-09'),
(154, 'CW-17A000', 'Karpet', '2024-09-09', '2024-09-09'),
(155, 'ACW-17A000', 'Karpet', '2024-09-09', '2024-09-09'),
(156, 'CW-18A000', 'Tanaman Hias', '2024-09-09', '2024-09-09'),
(157, 'ACW-18A000', 'Tanaman Hias', '2024-09-09', '2024-09-09'),
(158, 'CW-20A000', 'Lukisan', '2024-09-09', '2024-09-09'),
(159, 'ACW-20A000', 'Lukisan', '2024-09-09', '2024-09-09'),
(160, 'CW-21A000', 'APAR & APAB', '2024-09-09', '2024-09-09'),
(161, 'ACW-21A000', 'APAR & APAB', '2024-09-09', '2024-09-09'),
(162, 'CW-22A000', 'Gordyn', '2024-09-09', '2024-09-09'),
(163, 'ACW-22A000', 'Gordyn', '2024-09-09', '2024-09-09'),
(164, 'CW-23A000', 'Repeater', '2024-09-09', '2024-09-09'),
(165, 'ACW-23A000', 'Repeater', '2024-09-09', '2024-09-09'),
(166, 'CW-24A000', 'HT', '2024-09-09', '2024-09-09'),
(167, 'ACW-24A000', 'HT', '2024-09-09', '2024-09-09'),
(168, 'CW-25A000', 'CCTV', '2024-09-09', '2024-09-09'),
(169, 'ACW-25A000', 'CCTV', '2024-09-09', '2024-09-09'),
(170, 'CW-26A000', 'PABX', '2024-09-09', '2024-09-09'),
(171, 'ACW-26A000', 'PABX', '2024-09-09', '2024-09-09'),
(172, 'CW-27A000', 'Panel Listrik', '2024-09-09', '2024-09-09'),
(173, 'ACW-27A000', 'Panel Listrik', '2024-09-09', '2024-09-09'),
(174, 'CW-28A000', 'Genset', '2024-09-09', '2024-09-09'),
(175, 'ACW-28A000', 'Genset', '2024-09-09', '2024-09-09'),
(176, 'CW-29A000', 'Mesin', '2024-09-09', '2024-09-09'),
(177, 'ACW-29A000', 'Mesin', '2024-09-09', '2024-09-09'),
(178, 'CW-19A000', 'Mobil', '2024-09-09', '2024-09-09'),
(179, 'ACW-19A000', 'Mobil', '2024-09-09', '2024-09-09'),
(180, 'CW-30A000', 'Ketel Listrik', '2024-09-09', '2024-09-09'),
(181, 'ACW-30A000', 'Ketel Listrik', '2024-09-09', '2024-09-09'),
(182, 'CW-31A000', 'Dispenser Denpoo', '2024-09-09', '2024-09-09'),
(183, 'ACW-31A000', 'Dispenser Denpoo', '2024-09-09', '2024-09-09'),
(184, 'CW-32A000', 'Kendi Keramik Galon', '2024-09-09', '2024-09-09'),
(185, 'ACW-32A000', 'Kendi Keramik Galon', '2024-09-09', '2024-09-09'),
(186, 'CW-33A000', 'Stand Kendi Keramik', '2024-09-09', '2024-09-09'),
(187, 'ACW-33A000', 'Stand Kendi Keramik', '2024-09-09', '2024-09-09'),
(188, 'CW-34A000', 'Kamera', '2024-09-09', '2024-09-09'),
(189, 'ACW-34A000', 'Kamera', '2024-09-09', '2024-09-09'),
(190, 'CW-35A000', 'Mesin Absen', '2024-09-09', '2024-09-09'),
(191, 'ACW-35A000', 'Mesin Absen', '2024-09-09', '2024-09-09'),
(192, 'CW-36A000', 'Mesin Absen', '2024-09-09', '2024-09-09'),
(193, 'ACW-36A000', 'Mesin Absen', '2024-09-09', '2024-09-09'),
(194, 'CW-37A000', 'Harddisk External', '2024-09-09', '2024-09-09'),
(195, 'ACW-37A000', 'Harddisk External', '2024-09-09', '2024-09-09'),
(196, 'CW-38A000', 'RAK Arsip', '2024-09-09', '2024-09-09'),
(197, 'ACW-38A000', 'RAK Arsip', '2024-09-09', '2024-09-09'),
(198, 'CW-39A000', 'RAK Server', '2024-09-09', '2024-09-09'),
(199, 'ACW-39A000', 'RAK Server', '2024-09-09', '2024-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_aset`
--

CREATE TABLE `lokasi_aset` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_aset`
--

INSERT INTO `lokasi_aset` (`id`, `nama_lokasi`, `created_at`, `updated_at`) VALUES
(294, 'Ruang Direktur Utama', '2024-09-08 19:15:37', '2024-09-08 19:15:37'),
(295, 'Ruang Direktur Keuangan', '2024-09-08 19:15:38', '2024-09-08 19:15:38'),
(296, 'Ruang Direktur SDM', '2024-09-08 19:15:39', '2024-09-08 19:15:39'),
(297, 'Ruang Rapat Lt.3', '2024-09-08 19:15:39', '2024-09-08 19:15:39'),
(298, 'Ruang Rapat Lt.2', '2024-09-08 19:15:40', '2024-09-08 19:15:40'),
(299, 'Ruang Asisten USDM', '2024-09-08 19:15:41', '2024-09-08 19:15:41'),
(300, 'Ruang Manajer Hukum', '2024-09-08 19:15:41', '2024-09-08 19:15:41'),
(301, 'Ruang Manajer Keuangan', '2024-09-08 19:15:42', '2024-09-08 19:15:42'),
(302, 'Ruang Manajer Operasi', '2024-09-08 19:15:43', '2024-09-08 19:15:43'),
(303, 'Ruang Sekdir', '2024-09-08 19:15:44', '2024-09-08 19:15:44'),
(304, 'Tangga', '2024-09-08 19:15:44', '2024-09-08 19:15:44'),
(305, 'Divisi Operasi', '2024-09-08 19:15:45', '2024-09-08 19:15:45'),
(306, 'Manajer USDM', '2024-09-08 19:15:46', '2024-09-08 19:15:46'),
(307, 'Divisi Hukum', '2024-09-08 19:15:46', '2024-09-08 19:15:46'),
(308, 'Divisi Keuangan', '2024-09-08 19:15:47', '2024-09-08 19:15:47'),
(309, 'Ruang sekdir', '2024-09-08 19:15:48', '2024-09-08 19:15:48'),
(310, 'Divisi SDM', '2024-09-08 19:15:48', '2024-09-08 19:15:48'),
(311, 'Asman USDM', '2024-09-08 19:15:49', '2024-09-08 19:15:49'),
(312, 'Senkom', '2024-09-08 19:15:50', '2024-09-08 19:15:50'),
(313, 'Sekper', '2024-09-08 19:15:51', '2024-09-08 19:15:51'),
(314, 'Transaksi', '2024-09-08 19:15:51', '2024-09-08 19:15:51'),
(315, 'Latol', '2024-09-08 19:15:52', '2024-09-08 19:15:52'),
(316, 'Recepsionist', '2024-09-08 19:15:53', '2024-09-08 19:15:53'),
(317, 'Ruang PJR', '2024-09-08 19:15:53', '2024-09-08 19:15:53'),
(318, 'PML Andara', '2024-09-08 19:15:54', '2024-09-08 19:15:54'),
(319, 'Ruang Manajer SDM', '2024-09-08 19:15:55', '2024-09-08 19:15:55'),
(320, 'Ruang MGT', '2024-09-08 19:15:56', '2024-09-08 19:15:56'),
(321, 'Ruang Loker', '2024-09-08 19:15:56', '2024-09-08 19:15:56'),
(322, 'Resepsionis', '2024-09-08 19:15:57', '2024-09-08 19:15:57'),
(323, 'Ruang Direktur SDM Lt.3', '2024-09-08 19:15:58', '2024-09-08 19:15:58'),
(324, 'Ruang Direktur Keu Lt.3', '2024-09-08 19:15:58', '2024-09-08 19:15:58'),
(325, 'Ruang Sekdir Lt.3', '2024-09-08 19:16:00', '2024-09-08 19:16:00'),
(326, 'Ruang Koridor Lt.3', '2024-09-08 19:16:00', '2024-09-08 19:16:00'),
(327, 'Ruang Rapat Lt.3', '2024-09-08 19:16:01', '2024-09-08 19:16:01'),
(328, 'Ruang Lobby Utama Lt.1', '2024-09-08 19:16:02', '2024-09-08 19:16:02'),
(329, 'Ruang Dirut Lt.3.', '2024-09-08 19:16:02', '2024-09-08 19:16:02'),
(330, 'Ruang Koridor Lt.2', '2024-09-08 19:16:03', '2024-09-08 19:16:03'),
(331, 'Ruang Sekper Lt.3', '2024-09-08 19:16:04', '2024-09-08 19:16:04'),
(332, 'Ruang Latol', '2024-09-08 19:16:07', '2024-09-08 19:16:07'),
(333, 'Ruang Sekper', '2024-09-08 19:16:09', '2024-09-08 19:16:09'),
(334, 'Ruang Lobby Utama', '2024-09-08 19:16:11', '2024-09-08 19:16:11'),
(335, 'Ruang Asisten Manajer', '2024-09-08 19:16:14', '2024-09-08 19:16:14'),
(336, 'Divisi Umum', '2024-09-08 19:16:16', '2024-09-08 19:16:16'),
(337, 'Ruang Kerja Lt.2', '2024-09-08 19:16:19', '2024-09-08 19:16:19'),
(338, 'Ruang Senkom', '2024-09-08 19:16:20', '2024-09-08 19:16:20'),
(339, 'Ruang Komisaris', '2024-09-08 19:16:22', '2024-09-08 19:16:22'),
(340, 'PJR', '2024-09-08 19:16:24', '2024-09-08 19:16:24'),
(341, 'Keuangan', '2024-09-08 19:16:26', '2024-09-08 19:16:26'),
(342, 'Divisi Keuangan', '2024-09-08 19:16:28', '2024-09-08 19:16:28'),
(343, 'Div. Umum', '2024-09-08 19:16:30', '2024-09-08 19:16:30'),
(344, 'SDM', '2024-09-08 19:16:31', '2024-09-08 19:16:31'),
(345, 'PM', '2024-09-08 19:16:32', '2024-09-08 19:16:32'),
(346, 'Divisi PML & Pelayanan', '2024-09-08 19:16:33', '2024-09-08 19:16:33'),
(347, 'Legal', '2024-09-08 19:16:34', '2024-09-08 19:16:34'),
(348, 'Umum', '2024-09-08 19:16:35', '2024-09-08 19:16:35'),
(349, 'Divisi Umum SDM', '2024-09-08 19:16:36', '2024-09-08 19:16:36'),
(350, 'Divisi Pemeliharaan', '2024-09-08 19:16:37', '2024-09-08 19:16:37'),
(351, 'Divisi keuangan', '2024-09-08 19:16:38', '2024-09-08 19:16:38'),
(352, 'Ruang Mushola', '2024-09-08 19:16:39', '2024-09-08 19:16:39'),
(353, 'Ruang Asisten Manajer Lt.2', '2024-09-08 19:16:40', '2024-09-08 19:16:40'),
(354, 'Ruang Lattol', '2024-09-08 19:16:41', '2024-09-08 19:16:41'),
(355, 'Ruang Div Operasi PML Lt.1', '2024-09-08 19:16:42', '2024-09-08 19:16:42'),
(356, 'Ruang Server Lt.1', '2024-09-08 19:16:43', '2024-09-08 19:16:43'),
(357, 'Ruang Gudang Lt.4', '2024-09-08 19:16:44', '2024-09-08 19:16:44'),
(358, 'R. Kanit PJR', '2024-09-08 19:16:44', '2024-09-08 19:16:44'),
(359, 'R. Office PJR', '2024-09-08 19:16:45', '2024-09-08 19:16:45'),
(360, 'Masjid', '2024-09-08 19:16:46', '2024-09-08 19:16:46'),
(361, 'R. Dirut', '2024-09-08 19:16:47', '2024-09-08 19:16:47'),
(362, 'R. Komisaris', '2024-09-08 19:16:48', '2024-09-08 19:16:48'),
(363, 'Unit Kerja PJR', '2024-09-08 19:16:50', '2024-09-08 19:16:50'),
(364, 'MGT', '2024-09-08 19:16:50', '2024-09-08 19:16:50'),
(365, 'Ruang Manajer USDM', '2024-09-08 19:16:51', '2024-09-08 19:16:51'),
(366, 'Ruang Divisi Operasi', '2024-09-08 19:16:52', '2024-09-08 19:16:52'),
(367, 'Ruang SDM Lt.2', '2024-09-08 19:16:53', '2024-09-08 19:16:53'),
(368, 'Ruang Keuangan', '2024-09-08 19:16:54', '2024-09-08 19:16:54'),
(369, 'Ruang Legal', '2024-09-08 19:16:54', '2024-09-08 19:16:54'),
(370, 'Pantry Lt.2', '2024-09-08 19:16:55', '2024-09-08 19:16:55'),
(371, 'Staff CPI', '2024-09-08 19:16:56', '2024-09-08 19:16:56'),
(372, 'Ruang Rapat Lantai 3', '2024-09-08 19:16:57', '2024-09-08 19:16:57'),
(373, 'Pantry Lt.1', '2024-09-08 19:16:58', '2024-09-08 19:16:58'),
(374, 'Ruang PML', '2024-09-08 19:16:59', '2024-09-08 19:16:59'),
(375, 'Ruang Div Operasi', '2024-09-08 19:16:59', '2024-09-08 19:16:59'),
(376, 'ME', '2024-09-08 19:17:00', '2024-09-08 19:17:00'),
(377, 'Rizky dan Rio', '2024-09-08 19:17:01', '2024-09-08 19:17:01'),
(378, 'Ruang USDM', '2024-09-08 19:17:01', '2024-09-08 19:17:01'),
(379, 'Ruang Dirut', '2024-09-08 19:17:02', '2024-09-08 19:17:02'),
(380, 'Ruang Kooridor Lt.3', '2024-09-08 19:17:03', '2024-09-08 19:17:03'),
(381, 'Ruang Kooridor Lt.2', '2024-09-08 19:17:04', '2024-09-08 19:17:04'),
(382, 'Ruang Manajer USDM Lt.2', '2024-09-08 19:17:04', '2024-09-08 19:17:04'),
(383, 'Ruang Dir Operasi', '2024-09-08 19:17:05', '2024-09-08 19:17:05'),
(384, 'Ruang Tangga Lt.2', '2024-09-08 19:17:06', '2024-09-08 19:17:06'),
(385, 'Gedung', '2024-09-08 19:17:07', '2024-09-08 19:17:07'),
(386, 'Ruang Genset', '2024-09-08 19:17:07', '2024-09-08 19:17:07'),
(387, 'Pojok Halal', '2024-09-08 19:17:08', '2024-09-08 19:17:08'),
(388, 'Pos Ciper', '2024-09-08 19:17:09', '2024-09-08 19:17:09'),
(389, 'Ruang Direktur Utama Lt.3', '2024-09-08 19:17:09', '2024-09-08 19:17:09'),
(390, 'Ruang Direktur Keuangan Lt.3', '2024-09-08 19:17:10', '2024-09-08 19:17:10'),
(391, 'Ruang Direktur USDM Lt.3', '2024-09-08 19:17:11', '2024-09-08 19:17:11'),
(392, 'Ruang Kerja LT.2 SDM', '2024-09-08 19:17:12', '2024-09-08 19:17:12'),
(393, 'Ruang Kerja LT.2 Keuangan', '2024-09-08 19:17:12', '2024-09-08 19:17:12'),
(394, 'Ruang Asisten Manajer LT.2', '2024-09-08 19:17:13', '2024-09-08 19:17:13'),
(395, 'Ruang Manajer Keuangan LT.2', '2024-09-08 19:17:14', '2024-09-08 19:17:14'),
(396, 'Ruang Manajer Hukum LT.2', '2024-09-08 19:17:14', '2024-09-08 19:17:14'),
(397, 'Ruang Musholla LT.2', '2024-09-08 19:17:15', '2024-09-08 19:17:15'),
(398, 'Gedung', '2024-09-08 19:17:16', '2024-09-08 19:17:16'),
(399, 'GT. Cilut 1', '2024-09-08 19:17:16', '2024-09-08 19:17:16'),
(400, 'GT. Cilut 2', '2024-09-08 19:17:17', '2024-09-08 19:17:17'),
(401, 'GT. Satelit', '2024-09-08 19:17:18', '2024-09-08 19:17:18'),
(402, 'GT. Krukut 1', '2024-09-08 19:17:18', '2024-09-08 19:17:18'),
(403, 'GT. Krukut 4', '2024-09-08 19:17:19', '2024-09-08 19:17:19'),
(404, 'GT. Sawangan 1', '2024-09-08 19:17:20', '2024-09-08 19:17:20'),
(405, 'GT. Sawangan 4', '2024-09-08 19:17:20', '2024-09-08 19:17:20'),
(406, 'Cadangan', '2024-09-08 19:17:21', '2024-09-08 19:17:21'),
(407, 'Pantry Lantai 1', '2024-09-08 19:17:22', '2024-09-08 19:17:22'),
(408, 'Pantry Lantai 2', '2024-09-08 19:17:22', '2024-09-08 19:17:22'),
(409, 'Pantry Lantai 3', '2024-09-08 19:17:23', '2024-09-08 19:17:23'),
(410, 'Ciper', '2024-09-08 19:17:24', '2024-09-08 19:17:24'),
(411, 'GT. Brigif 1', '2024-09-08 19:17:24', '2024-09-08 19:17:24'),
(412, 'GT. Brigif 4', '2024-09-08 19:17:26', '2024-09-08 19:17:26'),
(413, 'GT. Andara 1', '2024-09-08 19:17:26', '2024-09-08 19:17:26'),
(414, 'GT. Andara 2', '2024-09-08 19:17:27', '2024-09-08 19:17:27'),
(415, 'Pemeliharaan', '2024-09-08 19:17:28', '2024-09-08 19:17:28'),
(416, 'Hukum', '2024-09-08 19:17:29', '2024-09-08 19:17:29'),
(417, 'PM - Sawangan', '2024-09-08 19:17:29', '2024-09-08 19:17:29'),
(418, 'Kemayoran Lt. 2', '2024-09-08 19:17:30', '2024-09-08 19:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_aset`
--

CREATE TABLE `pengguna_aset` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `posisi_pengguna` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna_aset`
--

INSERT INTO `pengguna_aset` (`id`, `nama_pengguna`, `jabatan`, `posisi_pengguna`, `created_at`, `updated_at`) VALUES
(6, 'Div. Umum', 'Pengelola', 'Lt. 3', '2024-08-02 01:16:40', '2024-08-02 01:16:40'),
(7, 'Budianto', 'Senior Officer Spv P&P', 'Lt. 1', '2024-08-02 01:36:41', '2024-08-02 01:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(1, 'Unit', '2024-07-18 03:56:08', '2024-07-18 03:56:08'),
(2, 'Buah', '2024-07-18 03:56:08', '2024-07-26 00:11:17'),
(3, 'Meter', '2024-07-18 03:56:08', '2024-07-18 03:56:08'),
(4, 'Liter', '2024-07-18 03:56:08', '2024-07-18 03:56:08'),
(5, 'Kg', '2024-07-18 03:56:08', '2024-07-18 03:56:08'),
(6, 'Roll', '2024-07-26 00:24:20', '2024-07-26 00:24:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `lokasi_aset_id` (`lokasi_aset_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aset_id` (`aset_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna_aset`
--
ALTER TABLE `pengguna_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT for table `pengguna_aset`
--
ALTER TABLE `pengguna_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aset_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna_aset` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aset_ibfk_3` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aset_ibfk_4` FOREIGN KEY (`lokasi_aset_id`) REFERENCES `lokasi_aset` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`aset_id`) REFERENCES `aset` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
