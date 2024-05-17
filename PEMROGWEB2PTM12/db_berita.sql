-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 02:46 PM
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
-- Database: `db_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `idberita` int(5) NOT NULL,
  `idkategori` int(5) NOT NULL,
  `judulberita` varchar(100) NOT NULL,
  `isiberita` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tgldipublish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`idberita`, `idkategori`, `judulberita`, `isiberita`, `penulis`, `tgldipublish`) VALUES
(1, 1, 'Dampak Pandemi Covid-19 terhadap Pembelajaran Tematik di Sekolah Dasar', 'Tujuan dari penelitian ini adalah untuk mengidentifikasi serta mendapatkan informasi mengenai dampak', 'Rizki Ananda,Fadhilaturrahmi Fadhilaturrahmi,Imam Hanafi', '2021-10-07'),
(2, 2, 'Artikel Metode e-Health”Malaria dan Kehamilan”', 'Malaria merupakan salah satu penyakit tropis dan menjadi masalah kesehatan di Provinsi Nusa Tenggara', 'Meiyeriance Kapitan,Mariana Oni Beta,Pius Selasa,', '2023-04-25'),
(3, 3, 'PENERAPAN NILAI PANCASILA DALAM MENGATASI KRISIS MORALITAS GENERASI Z', 'Generation Z is a young generation who is connected to technology, intelligent, independent, confide', 'Nisa Wening Asih Sutrisno, Inggar Saputra', '2024-04-01'),
(4, 4, 'Edukasi dampak dari bahaya internet pada siswa siswi smp 1926', 'Internet menurut Purbo (dalam Prihatna, 2005) adalah suatu media yang dipakai untuk mengefisiensikan', 'Muhammad Rizky Pradana', '2023-04-03'),
(5, 5, 'Kepakaan Generasi Z Pada keberlangsungan Pancasila ', 'Dengan pancasila diterapkan dalam kehidupan maka generasi Z ini dapat menyaring pengaruh derasnya ar', 'Dana', '2024-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idkategori` int(5) NOT NULL,
  `namakategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idkategori`, `namakategori`) VALUES
(1, 'sosial'),
(2, 'budaya'),
(3, 'teknologi'),
(4, 'sosial'),
(5, 'budaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`idberita`),
  ADD KEY `FORIGEN KEY` (`idkategori`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD CONSTRAINT `FORIGEN KEY` FOREIGN KEY (`idkategori`) REFERENCES `tbl_kategori` (`idkategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
