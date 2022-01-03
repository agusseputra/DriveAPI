-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 08:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id_folder` int(11) NOT NULL,
  `nama_folder` varchar(45) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `id_prodi` tinyint(1) DEFAULT NULL,
  `permalink` varchar(45) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_drive` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id_folder`, `nama_folder`, `parent`, `id_prodi`, `permalink`, `path`, `file`, `id_user`, `id_drive`, `created_at`, `updated_at`) VALUES
(2, 'TestFolder', NULL, 3, 'testfolder', 'media/testfolder', '[\"web vue.png\"]', 3, '1WaXBgzGYV_gH8nVwJIgs-Ql06hVz3O20', '2022-01-03 07:48:48', '2022-01-03 07:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` int(11) NOT NULL,
  `nama_prodi` varchar(45) DEFAULT NULL,
  `permalink` varchar(45) DEFAULT NULL,
  `versi` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`idprodi`, `nama_prodi`, `permalink`, `versi`) VALUES
(1, 'Pendidikan Kesejahteraan Keluarga', 'pkk', '2.0'),
(2, 'Pendidikan Teknik Informatika', 'pti', '2.0'),
(3, 'Manajemen informatika', 'mi', '3.0');

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
  `id_prodi` int(11) DEFAULT NULL,
  `cookie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_prodi`, `cookie`) VALUES
(1, 'agusseputra', 'agus.seputra@undiksha.ac.id', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 3, 'e1815302440e84b3c5b93f46872a1acdd5b901be'),
(2, 'Wayan Marti', 'd3informatika@undiksha.ac.id', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 3, '47ee90248a6a5a716abb9d92b13f6d62020fcd8f'),
(3, 'S1TerPal', 'ternak', NULL, '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, 3, 'e4fccd056ddca6f6064b552b232afba340b86526');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id_folder`),
  ADD KEY `id` (`parent`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id_folder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `idprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `folder`
--
ALTER TABLE `folder`
  ADD CONSTRAINT `id` FOREIGN KEY (`parent`) REFERENCES `folder` (`id_folder`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
