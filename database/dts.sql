-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 02:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dts`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `administrator_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `levels` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`administrator_id`, `name`, `username`, `password`, `levels`) VALUES
(1, 'Puput', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '0');

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `ale_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `rank` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`ale_id`, `name`, `mhs_id`, `rank`) VALUES
(21, 'A1', 22, 0),
(22, 'A2', 24, 0.379),
(23, 'A3', 29, 0.2528);

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `criteria_id` int(11) NOT NULL,
  `code_criteria` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `weight` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`criteria_id`, `code_criteria`, `name`, `weight`) VALUES
(25, 'C1', 'Stress', 41),
(26, 'C2', 'Cemas', 25);

-- --------------------------------------------------------

--
-- Table structure for table `instrumen`
--

CREATE TABLE `instrumen` (
  `instrumen_id` int(5) NOT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instrumen`
--

INSERT INTO `instrumen` (`instrumen_id`, `criteria_id`, `name`) VALUES
(127, 25, 'I found it hard to wind down'),
(128, 25, 'I tended to over-react to situations'),
(129, 25, 'I felt that I was using a lot of nervous energy'),
(130, 25, 'I found myself getting agitated '),
(131, 25, 'I found it difficult to relax'),
(132, 25, 'I was intolerant of anything that kept me from getting on with what I was doing '),
(133, 25, 'I felt that I was rather touchy'),
(134, 26, 'I was aware of dryness of my mouth '),
(135, 26, 'I experienced breathing difficulty (e.g. excessively rapid breathing, breathlessness in the absence of physical exertion) '),
(136, 26, 'I experienced trembling (e.g. in the hands)'),
(137, 26, 'I was worried about situations in which I might panic and make a fool of myself'),
(138, 26, 'I felt I was close to panic'),
(139, 26, 'I was aware of the action of my heart in the absence of physical exertion (e.g. sense of heart rate increase, heart missing a beat) '),
(140, 26, 'I felt scared without any good reason');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `mhs_id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `levels` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`mhs_id`, `nim`, `name`, `username`, `password`, `image`, `gender`, `phone`, `levels`) VALUES
(22, '854635324', 'Hudiah', 'buts', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'perempuan', '0812345678', 2),
(24, '8346525', 'Ari lumba lumba', 'ari', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'laki-laki', '0812367463', 2),
(26, '0734534535', 'Mayang sari', 'maya', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'perempuan', '08564346723', 2),
(27, '073516234516', 'Satrio', 'tio', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'laki-laki', '08324176123', 2),
(28, '071231763', 'Bounce', 'tes', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'laki-laki', '082345678', 2),
(29, '40324230847', 'sksfhs', 'uti', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'laki-laki', '08498439', 2),
(30, '87649323867', 'Mona Lisa', 'mona', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'perempuan', '0813763512', 2),
(31, '928473564239', 'Putet Put', 'putet', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'perempuan', '92649325423', 2),
(32, '67561235137', 'Siti Hajar', 'itik', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'perempuan', '08123456789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `val_alternatives`
--

CREATE TABLE `val_alternatives` (
  `vae_id` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `ale_id` int(11) NOT NULL,
  `instrumen_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `val_alternatives`
--

INSERT INTO `val_alternatives` (`vae_id`, `weight`, `ale_id`, `instrumen_id`) VALUES
(178, 1, 21, 127),
(179, 1, 21, 128),
(180, 2, 21, 129),
(181, 2, 21, 130),
(182, 2, 21, 131),
(183, 2, 21, 132),
(184, 1, 21, 133),
(185, 1, 21, 134),
(186, 2, 21, 135),
(187, 2, 21, 136),
(188, 2, 21, 137),
(189, 2, 21, 138),
(190, 3, 21, 139),
(191, 3, 21, 140),
(192, 0, 22, 127),
(193, 0, 22, 128),
(194, 1, 22, 129),
(195, 1, 22, 130),
(196, 3, 22, 131),
(197, 3, 22, 132),
(198, 3, 22, 133),
(199, 2, 22, 134),
(200, 2, 22, 135),
(201, 3, 22, 136),
(202, 2, 22, 137),
(203, 3, 22, 138),
(204, 3, 22, 139),
(205, 3, 22, 140),
(206, 2, 23, 127),
(207, 2, 23, 128),
(208, 1, 23, 129),
(209, 1, 23, 130),
(210, 1, 23, 131),
(211, 2, 23, 132),
(212, 2, 23, 133),
(213, 2, 23, 134),
(214, 2, 23, 135),
(215, 3, 23, 136),
(216, 3, 23, 137),
(217, 3, 23, 138),
(218, 2, 23, 139),
(219, 2, 23, 140);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`ale_id`),
  ADD KEY `member_id` (`mhs_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indexes for table `instrumen`
--
ALTER TABLE `instrumen`
  ADD PRIMARY KEY (`instrumen_id`),
  ADD KEY `id_kriteria` (`criteria_id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`mhs_id`);

--
-- Indexes for table `val_alternatives`
--
ALTER TABLE `val_alternatives`
  ADD PRIMARY KEY (`vae_id`),
  ADD KEY `ale_id` (`ale_id`),
  ADD KEY `criteria_id` (`instrumen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `ale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `instrumen`
--
ALTER TABLE `instrumen`
  MODIFY `instrumen_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `val_alternatives`
--
ALTER TABLE `val_alternatives`
  MODIFY `vae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_ibfk_1` FOREIGN KEY (`mhs_id`) REFERENCES `mhs` (`mhs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instrumen`
--
ALTER TABLE `instrumen`
  ADD CONSTRAINT `instrumen_ibfk_1` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`criteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `val_alternatives`
--
ALTER TABLE `val_alternatives`
  ADD CONSTRAINT `val_alternatives_ibfk_1` FOREIGN KEY (`ale_id`) REFERENCES `alternatives` (`ale_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `val_alternatives_ibfk_2` FOREIGN KEY (`instrumen_id`) REFERENCES `instrumen` (`instrumen_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
