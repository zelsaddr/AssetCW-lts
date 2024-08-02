-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 12:00 PM
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

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id`, `nomor_invoice`, `kode_aset`, `barang_id`, `identitas_barang`, `tanggal_barang_datang`, `foto_barang_path`, `pengguna_id`, `satuan_id`, `kondisi`, `lokasi_aset_id`, `nilai_perolehan`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, NULL, 'CW-19001.27.04.2015', 9, NULL, '2015-04-27', 'assets/aset-berwujud/F8vCu7zFReoH7Ku8K459Kpj1JQzQo5X8QNs8idZ8.jpg', 6, 1, 'Baik', 7, 0, 'ok', '2024-08-02 01:33:13', '2024-08-02 01:33:13'),
(9, NULL, 'CW-19002.27.04.2015', 10, NULL, '2015-04-27', 'assets/aset-berwujud/2CYiUWh5w8RzNOK1yjG6GljRFxFLujMOtbvKXZY7.jpg', 6, 1, 'Baik', 7, 0, 'ok', '2024-08-02 01:33:57', '2024-08-02 01:33:57'),
(10, NULL, 'CW-19003.27.04.2015', 11, NULL, '2015-04-27', 'assets/aset-berwujud/bgNMzZFw6jvqNYlKeaTKS4YNTRrvNoz8AFkXdaqD.jpg', 6, 1, 'Baik', 7, 0, 'ok', '2024-08-02 01:35:07', '2024-08-02 01:35:07'),
(11, NULL, 'CW-19004.14.06.2015', 14, NULL, '2015-06-14', 'assets/aset-berwujud/J8uZoXqlzUZVHPBmjE5Q8kKX2AA6nuAWhbtHqnLG.jpg', 7, 1, 'Baik', 7, 0, 'ok', '2024-08-02 01:38:24', '2024-08-02 01:38:24');

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
  `foto_tampak_depan_path` varchar(255) NOT NULL,
  `foto_tampak_samping_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kategori_id`, `nama_barang`, `merk_barang`, `tahun_perolehan`, `foto_tampak_depan_path`, `foto_tampak_samping_path`, `created_at`, `updated_at`) VALUES
(9, 51, 'TERIOS TX - ADVENTURE A/T - B 2320 SFI', 'Daihatsu', 2015, 'public/foto_tampak_depan/WIhugLpEgXnvwmFzm81ITmd91kWXa6nEdfKGLh14.jpg', 'public/foto_tampak_samping/jDnYEC7k6JNQ1EbqR5LZWNJ3n9UU9S7XpVEtFhTn.jpg', '2024-08-02 00:56:57', '2024-08-02 00:56:57'),
(10, 51, 'TERIOS TX - ADVENTURE A/T - B 2313 SFI', 'Daihatsu', 2015, 'public/foto_tampak_depan/6KJb0dtG30jnA2zYD6P8IldaSg0V8bn45C4ocCky.jpg', 'public/foto_tampak_samping/aJXR7aWv7t7D1NAS2VnuHSLGE0LoUjfc3zaUdDGw.jpg', '2024-08-02 00:57:43', '2024-08-02 00:57:43'),
(11, 51, 'LUXIO - B 2308 SFI', 'Daihatsu', 2015, 'public/foto_tampak_depan/uItHCFz3Vw87ILX1NGpLSxpX8MWKROYrkRPLlZ0P.jpg', 'public/foto_tampak_samping/SygoifNxRLuRJRLKIfVvaCGNXmC1V2SwpiZQKh0M.jpg', '2024-08-02 00:59:33', '2024-08-02 00:59:33'),
(14, 51, 'TERIOS TX - ADVENTURE A/T - B 2752 SFN', 'Daihatsu', 2015, 'public/foto_tampak_depan/YNkfcldQwkLCPkZ08v0LWyMkCKKshLxow2ordCS4.jpg', 'public/foto_tampak_samping/yNacikXRhUEVQmJVFl3EVbyMsjWbNGdnmOJBeqqi.jpg', '2024-08-02 01:01:03', '2024-08-02 01:01:03'),
(15, 51, 'Avanza 1.3 E MT  - B 3 NDA', 'Toyota', 2024, 'public/foto_tampak_depan/yolr4q6LQvqsuAMTNymgzDFawxpYbZCdllSB695T.jpg', 'public/foto_tampak_samping/ZOWtLSH96bP12b0pUHMwGk2XXEltNQxgMRyusz9h.jpg', '2024-08-02 01:03:01', '2024-08-02 01:08:16'),
(16, 51, 'Toyota Avanza 1.3 E MT - B 2433 UZM', 'Toyota', 2024, 'public/foto_tampak_depan/HK9rz0v5Odu66y6Bf7zWlYKj53oSt8n5eDi995bA.jpg', 'public/foto_tampak_samping/aZYsY2JA2T1NZ4jHmPJGKRvmQ4o60ulxftO9O6YN.jpg', '2024-08-02 01:03:28', '2024-08-02 01:08:29');

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
(6, 'Andara', '2024-07-31 20:05:13', '2024-07-31 20:05:13'),
(7, 'Mandala', '2024-07-31 20:10:32', '2024-07-31 20:10:32');

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
(4, 'Emily Davis', 'Staff', 'HR Department', '2024-07-18 03:56:37', '2024-07-18 03:56:37'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
