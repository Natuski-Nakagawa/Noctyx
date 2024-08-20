-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 05:22 AM
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
-- Database: `noctyx`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `content` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `date`, `content`, `user_id`) VALUES
(48, 'adf', '2024-08-20 01:59:52.023791', 'fdsafd', 7),
(51, 'edit done', '2024-08-20 02:15:33.527674', 'tapos ko na edit na to. talaga', 7),
(52, 'Notes ni Euroboyassir', '2024-08-20 02:14:58.476861', 'wargh awrgh wawrghesf', 7),
(53, 'geng geng', '2024-08-20 02:39:56.093803', 'pow pow pow', 6),
(55, 'adfdf', '2024-08-20 02:48:32.205460', 'fdfafsfd', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(6, 'Euro', 'Boss', 'euroboya', 'jerrualen@gmail.com', '$2y$10$SZCkIF5Ol7quAXZPSyN3P.ws902/Iyfo3ep/ag9WtWYKSkSfyMIMa'),
(7, 'Ronald', 'Kupal', 'kupalako', 'ronald@gmail.com', '$2y$10$W5.kPQjec9hT/t5rVHxMWujW1PaujnxOQ/Dg3M3cOcltV1LuHxT8i'),
(8, 'Mariane', 'Rilles', 'mriane', 'mariane@gmail.com', '$2y$10$4iZfyNtniUtfyLDIVmwyPeId43ismrSoIRz5XLRkeSMqh9klfGMZG'),
(12, 'kahit', 'ano', 'nalang', 'kahitanonalang@gmail.com', '$2y$10$F42CjiHmbceP3vsQMt0iz.C6wh36S4CZpDzewaauDNDyDbyulfeUu'),
(60, 'kunwari', 'testing', 'tignanmo', 'emerut@gmail.com', '$2y$10$j8Kd9FCBi/n9H5rffrMUvuI9SIKiZjQ5V9ZusssvM0AEiBuTCPnWe'),
(61, 'qweqe', 'adasd', '12345', 'summer@gmail.com', '$2y$10$kcqxh4NCxAcZquj7lDhLi.UPtBdkLava37fFuqiS7meOlkqWO37.K'),
(63, 'beybs', '213', 'another', 'okay@gmail.com', '$2y$10$pFjhQGvz2hNPImW16mMsze50W/fyx4mpDUBWUCxgZTOkm/cYN/91a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
