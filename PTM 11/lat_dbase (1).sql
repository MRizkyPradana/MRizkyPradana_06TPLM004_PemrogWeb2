-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 08:18 AM
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
-- Database: `lat_dbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmhs`
--

CREATE TABLE `tblmhs` (
  `Nim` int(9) NOT NULL,
  `NamaAwal` varchar(20) NOT NULL,
  `NamaAkhir` varchar(30) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Umur` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmhs`
--

INSERT INTO `tblmhs` (`Nim`, `NamaAwal`, `NamaAkhir`, `TanggalLahir`, `Umur`) VALUES
(1, 'Andi', 'Setiawan', '1998-05-21', 32),
(2, 'Budi', 'Budiarto', '1999-07-13', 24),
(3, 'Citra', 'Puspita', '1990-01-01', 23),
(4, 'Dewi', 'Lestari', '1997-11-30', 26),
(5, 'Eka', 'Pratama', '2001-03-25', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `mhsID` int(11) NOT NULL,
  `FirstName` varchar(15) DEFAULT NULL,
  `LastName` varchar(15) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `nim` varchar(9) NOT NULL,
  `nama_mhs` varchar(30) DEFAULT NULL,
  `matakuliah` varchar(20) DEFAULT NULL,
  `uts` float(5,2) DEFAULT NULL,
  `uas` float(5,2) DEFAULT NULL,
  `tugas` float(5,2) DEFAULT NULL,
  `jmlhadir` int(2) DEFAULT NULL,
  `nilai_akhir` float(5,2) DEFAULT NULL,
  `grade` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`nim`, `nama_mhs`, `matakuliah`, `uts`, `uas`, `tugas`, `jmlhadir`, `nilai_akhir`, `grade`) VALUES
('211', 'Budi', 'Infomatika', 80.00, 70.00, 85.00, 11, 77.50, 'B'),
('211400', 'Raden ', 'Infomatika', 80.00, 70.00, 85.00, 14, 77.50, 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmhs`
--
ALTER TABLE `tblmhs`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`mhsID`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmhs`
--
ALTER TABLE `tblmhs`
  MODIFY `Nim` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `mhsID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
