-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 06:24 AM
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
-- Database: `plant_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `name`, `stock`, `description`) VALUES
(1, 'Anggrek Dendrobium Subulatum', 20, 'Spesies ini memiliki ciri-ciri warna bunga berwarna putih dan kuning pada kelopaknya. Ciri tanamannya kecil mungil dan memiliki daun yang banyak.'),
(2, 'Anggrek Dendrobium Macrophyllum Jawa', 15, 'spesies yang ini sering disebut juga dengan nama anggrek jamrud. Disebut dengan anggrek jamrud karena memiliki warna hijau pucat. '),
(3, 'Anggrek Dendrobium Faciferum', 12, 'Spesies ini memiliki warna bunga merah merona dengan karakteristik tumbuh menjuntai ke atas dan berbunga rimbun. Ukuran bunganya mungil tapi begitu eksotik.'),
(4, 'Anggrek Dendrobium Leporinum', 40, 'Spesies ini berasal dari Jailolo, Maluku di mana anggrek ini senang dengan sinar matahari secara langsung, mampu hidup di dataran rendah, dan mekar bunganya bisa bertahan selama 2 bulan. Bisa dilihat pada gambar berikut dimana bunganya berwarna putih dan sedikit berwarna ungu.'),
(5, 'Anggrek Dendrobium Nobile', 40, 'Spesies ini memiliki ciri-ciri berbatang lunak, bunganya berwarna putih, pink dan ungu.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'user', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
