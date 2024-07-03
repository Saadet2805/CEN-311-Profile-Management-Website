-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 11:46 AM
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
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `age`, `gender`, `email`, `password`) VALUES
(22, 'Saadet', 'Yilmaz', 19, 'Female', 'syilmaz@gmail.com', '0'),
(24, 'Selen', 'Balaban', 76, 'Male', 'syilma@mail.com', '0'),
(26, 'Mehmet Akif', 'Ersoy', 51, 'Male', 'mersoy@gmail.com', '3'),
(27, 'Arda', 'Turan', 40, 'Male', 'aturan@mail.com', '0'),
(28, 'Beyazit', 'Ozturk', 50, 'Do not want to speci', 'bozturk@mail.com', '0'),
(29, 'Saadet', 'Yilmaz', 20, 'Female', 'syilmaz22@epoka.edu.al', '4'),
(31, 'asjffs', 'safd', 20, 'Female', 'syilmaz12@mail.com', '4'),
(32, 'Yasemin', 'Sakallioglu', 120, 'Female', 'ysakal@gmail.com', '4a519c46b840e1a5588c42e08f9bc17f'),
(33, 'Emrah', 'Toprak', 20, 'Male', 'etoprak@gmail.com', 'b8c5ed91a709025f73cf35326cdd1c51'),
(34, 'sdg', 'dsg', 12, 'Do not want to speci', 'dfshx@mfklds.com', 'a40e6ca2e584711dbfbe8f8f2b5605b2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
