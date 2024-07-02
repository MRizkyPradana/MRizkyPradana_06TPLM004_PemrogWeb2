-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 11:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `jurusan`) VALUES
('180001', 'Andi Setiawan', 'Jl. Merdeka No. 10', 'Informatika'),
('180002', 'Budi Santoso', 'Jl. Sudirman No. 5', 'Sistem Informasi'),
('180003', 'Citra Dewi', 'Jl. Gatot Subroto No. 12', 'Informatika'),
('180004', 'Dewi Sartika', 'Jl. Diponegoro No. 9', 'Teknik Elektro'),
('180005', 'Eka Putra', 'Jl. Ahmad Yani No. 3', 'Teknik Mesin'),
('180006', 'Fajar Nugraha', 'Jl. Imam Bonjol No. 2', 'Informatika'),
('180007', 'Gita Pertiwi', 'Jl. Kartini No. 7', 'Teknik Industri'),
('180008', 'Hari Wibowo', 'Jl. MT Haryono No. 1', 'Sistem Informasi'),
('180009', 'Intan Sari', 'Jl. Pemuda No. 4', 'Teknik Kimia'),
('180010', 'Joko Prasetyo', 'Jl. Raya No. 8', 'Informatika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
