-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 12:58 PM
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
-- Database: `db_latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_dosen`
--

CREATE TABLE `tabel_dosen` (
  `kode_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_dosen`
--

INSERT INTO `tabel_dosen` (`kode_dosen`, `nama_dosen`, `jenis_kelamin`, `alamat`, `telepon`) VALUES
(1001, 'Muhammad Rizky Pradana, S.kom', 'L', 'Jl.Wijaya Kusuma No 2, Tangerang Selatan', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jadwal`
--

CREATE TABLE `tabel_jadwal` (
  `id` int(11) NOT NULL,
  `kode_matakuliah` int(11) NOT NULL,
  `kode_dosen` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_jadwal`
--

INSERT INTO `tabel_jadwal` (`id`, `kode_matakuliah`, `kode_dosen`, `hari`, `jam`) VALUES
(1, 2001, 1001, 'Senin', '07.00 - 09.00 W');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_krs`
--

CREATE TABLE `tabel_krs` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `kode_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_krs`
--

INSERT INTO `tabel_krs` (`id`, `nim`, `id_jadwal`, `kode_semester`) VALUES
(1, 3001, 1, 20241);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `jurusan` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`nim`, `nama_mahasiswa`, `jenis_kelamin`, `alamat`, `jurusan`) VALUES
(3001, 'M.R.Pradana', 'L', 'Jl. Anggrek No. 12 Jakarta Selatan', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_matakuliah`
--

CREATE TABLE `tabel_matakuliah` (
  `kode_matakuliah` int(11) NOT NULL,
  `nama_matakuliah` varchar(20) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_matakuliah`
--

INSERT INTO `tabel_matakuliah` (`kode_matakuliah`, `nama_matakuliah`, `sks`) VALUES
(2001, 'Pemrograman Web 2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_semester`
--

CREATE TABLE `tabel_semester` (
  `kode_semester` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_semester`
--

INSERT INTO `tabel_semester` (`kode_semester`, `semester`, `status`) VALUES
(20241, 'Ganjil 2023/2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user.`
--

CREATE TABLE `tb_user.` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user.`
--

INSERT INTO `tb_user.` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  ADD PRIMARY KEY (`kode_dosen`);

--
-- Indexes for table `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FORIGEN KEY` (`kode_matakuliah`),
  ADD KEY `kode_dosen` (`kode_dosen`);

--
-- Indexes for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_semester` (`kode_semester`);

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tabel_matakuliah`
--
ALTER TABLE `tabel_matakuliah`
  ADD PRIMARY KEY (`kode_matakuliah`);

--
-- Indexes for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  ADD PRIMARY KEY (`kode_semester`);

--
-- Indexes for table `tb_user.`
--
ALTER TABLE `tb_user.`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  MODIFY `kode_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3002;

--
-- AUTO_INCREMENT for table `tabel_matakuliah`
--
ALTER TABLE `tabel_matakuliah`
  MODIFY `kode_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2003;

--
-- AUTO_INCREMENT for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  MODIFY `kode_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20242;

--
-- AUTO_INCREMENT for table `tb_user.`
--
ALTER TABLE `tb_user.`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  ADD CONSTRAINT `FORIGEN KEY` FOREIGN KEY (`kode_matakuliah`) REFERENCES `tabel_matakuliah` (`kode_matakuliah`),
  ADD CONSTRAINT `tabel_jadwal_ibfk_1` FOREIGN KEY (`kode_dosen`) REFERENCES `tabel_dosen` (`kode_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  ADD CONSTRAINT `tabel_krs_ibfk_1` FOREIGN KEY (`kode_semester`) REFERENCES `tabel_semester` (`kode_semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_krs_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `tabel_jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_krs_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `tabel_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
