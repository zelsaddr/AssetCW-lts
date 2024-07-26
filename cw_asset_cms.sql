-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 11:55 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tahun_perolehan` int(11) NOT NULL,
  `foto_tampak_depan_path` varchar(255) NOT NULL,
  `foto_tampak_samping_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kategori_id`, `nama_barang`, `tahun_perolehan`, `foto_tampak_depan_path`, `foto_tampak_samping_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laptop ASUS', 2020, '/path/to/foto_depan_laptop.jpg', '/path/to/foto_samping_laptop.jpg', '2024-07-18 03:55:47', '2024-07-18 03:55:47'),
(2, 2, 'Meja Direktur', 2018, '/path/to/foto_depan_meja.jpg', '/path/to/foto_samping_meja.jpg', '2024-07-18 03:55:47', '2024-07-18 03:55:47'),
(3, 3, 'Mobil Toyota Avanza', 2019, '/path/to/foto_depan_avanza.jpg', '/path/to/foto_samping_avanza.jpg', '2024-07-18 03:55:47', '2024-07-18 03:55:47'),
(4, 4, 'Excavator CAT', 2015, '/path/to/foto_depan_excavator.jpg', '/path/to/foto_samping_excavator.jpg', '2024-07-18 03:55:47', '2024-07-18 03:55:47'),
(5, 5, 'Printer HP LaserJet', 2021, '/path/to/foto_depan_printer.jpg', '/path/to/foto_samping_printer.jpg', '2024-07-18 03:55:47', '2024-07-18 03:55:47');

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
(1, 'ACW-3A000', 'CPU', '2024-07-18', '2024-07-18'),
(2, 'ACW-3C000', 'Laptop', '2024-07-18', '2024-07-18'),
(3, 'CW-1E000', 'Kursi Hadap', '2024-07-18', '2024-07-18'),
(4, 'CW-1F000', 'Sofa Single', '2024-07-18', '2024-07-18'),
(5, 'CW-1G000', 'Bench 2 Seat', '2024-07-18', '2024-07-18'),
(6, 'ACW-4A000', 'Monitor', '2024-07-18', '2024-07-18'),
(7, 'CW-1B000', 'Kursi Hadap Meeting', '2024-07-18', '2024-07-18'),
(8, 'CW-1A000', 'Kursi Direksi', '2024-07-18', '2024-07-18'),
(9, 'CW-1C000', 'Kursi Ergomatic Coklat', '2024-07-18', '2024-07-18'),
(10, 'CW-1D000', 'Kursi Ergomatic Hitam', '2024-07-18', '2024-07-18'),
(11, 'CW-1H000', 'Sofa 3 Seat', '2024-07-18', '2024-07-18'),
(12, 'CW-2A000', 'Meja Kerja Dir', '2024-07-18', '2024-07-18'),
(13, 'CW-2B000', 'Meja Kerja Manajer', '2024-07-18', '2024-07-18'),
(14, 'CW-2C000', 'Meja Kerja Partisi', '2024-07-18', '2024-07-18'),
(15, 'ACW-2D000', 'Meja Kerja / Partisi', '2024-07-18', '2024-07-18'),
(16, 'CW-2E000', 'Meja Lain-Lain', '2024-07-18', '2024-07-18'),
(17, 'CW-2F000', 'Meja Kaca', '2024-07-18', '2024-07-18'),
(18, 'CW-2G000', 'Meja Rapat', '2024-07-18', '2024-07-18'),
(19, 'CW-2H000', 'Meja Granit', '2024-07-18', '2024-07-18'),
(20, 'CW-2I000', 'Meja Marmer', '2024-07-18', '2024-07-18'),
(21, 'ACW-3B000', 'Server', '2024-07-18', '2024-07-18'),
(22, 'CW-5A000', 'Smart TV', '2024-07-18', '2024-07-18'),
(23, 'ACW-6A000', 'Printer', '2024-07-18', '2024-07-18'),
(24, 'CW-7A000', 'Proyektor', '2024-07-18', '2024-07-18'),
(25, 'CW-8A000', 'Motorized System', '2024-07-18', '2024-07-18'),
(26, 'CW-9A000', 'AC Casset', '2024-07-18', '2024-07-18'),
(27, 'CW-9B000', 'AC Split', '2024-07-18', '2024-07-18'),
(28, 'CW-10A000', 'Credenza Coklat', '2024-07-18', '2024-07-18'),
(29, 'CW-10B000', 'Credenza Hitam', '2024-07-18', '2024-07-18'),
(31, 'CW-10D000', 'Loker', '2024-07-18', '2024-07-18'),
(32, 'ACW-19A000', 'Lemari Kaca', '2024-07-18', '2024-07-18'),
(33, 'CW-11A000', 'Rak TV', '2024-07-18', '2024-07-18'),
(34, 'CW-12A000', 'Lampu Gantung', '2024-07-18', '2024-07-18'),
(37, 'CW-15A000', 'Clip Board', '2024-07-18', '2024-07-18'),
(38, 'ACW-16A000', 'Perlengkapan', '2024-07-18', '2024-07-18'),
(39, 'CW-17A000', 'Karpet', '2024-07-18', '2024-07-18'),
(40, 'CW-18A000', 'Tanaman Hias', '2024-07-18', '2024-07-18'),
(41, 'CW-20A000', 'Lukisan', '2024-07-18', '2024-07-18'),
(42, 'CW-21A000', 'APAR & APAB', '2024-07-18', '2024-07-18'),
(43, 'CW-22A000', 'Gordyn', '2024-07-18', '2024-07-18'),
(44, 'CW-23A000', 'Repeater', '2024-07-18', '2024-07-18'),
(45, 'CW-24A000', 'HT', '2024-07-18', '2024-07-18'),
(46, 'CW-25A000', 'CCTV', '2024-07-18', '2024-07-18'),
(47, 'CW-26A000', 'PABX', '2024-07-18', '2024-07-18'),
(48, 'CW-27A000', 'Panel Listrik', '2024-07-18', '2024-07-18'),
(49, 'CW-28A000', 'Genset', '2024-07-18', '2024-07-18'),
(50, 'CW-29A000', 'Mesin', '2024-07-18', '2024-07-18'),
(51, 'CW-19000', 'Mobil', '2024-07-18', '2024-07-18'),
(52, 'ACW-30A000', 'Ketel Listrik', '2024-07-18', '2024-07-18'),
(53, 'ACW-31A000', 'Dispenser Denpoo', '2024-07-18', '2024-07-18'),
(54, 'ACW-32A000', 'Kendi Keramik Galon', '2024-07-18', '2024-07-18'),
(55, 'ACW-33A000', 'Stand Kendi Keramik', '2024-07-18', '2024-07-18'),
(56, 'ACW-34A000', 'Kamera', '2024-07-18', '2024-07-18'),
(57, 'ACW-35A000', 'Mesin Absen', '2024-07-18', '2024-07-18'),
(58, 'ACW-37A000', 'Hardisk External', '2024-07-18', '2024-07-18');

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
(1, 'Gudang A', '2024-07-18 03:56:21', '2024-07-18 03:56:21'),
(2, 'Kantor Utama', '2024-07-18 03:56:21', '2024-07-18 03:56:21'),
(3, 'Pabrik 1', '2024-07-18 03:56:21', '2024-07-18 03:56:21'),
(4, 'Ruang Server', '2024-07-18 03:56:21', '2024-07-18 03:56:21'),
(5, 'Kantor Cabang Jakarta', '2024-07-18 03:56:21', '2024-07-18 03:56:21');

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
(1, 'John Doe', 'Manager', 'IT Department', '2024-07-18 03:56:37', '2024-07-18 03:56:37'),
(2, 'Jane Smith', 'Supervisor', 'Finance Department', '2024-07-18 03:56:37', '2024-07-18 03:56:37'),
(3, 'Michael Brown', 'Engineer', 'Maintenance Department', '2024-07-18 03:56:37', '2024-07-18 03:56:37'),
(4, 'Emily Davis', 'Staff', 'HR Department', '2024-07-18 03:56:37', '2024-07-18 03:56:37'),
(5, 'David Wilson', 'Director', 'Operations Department', '2024-07-18 03:56:37', '2024-07-18 03:56:37');

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
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna_aset`
--
ALTER TABLE `pengguna_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
