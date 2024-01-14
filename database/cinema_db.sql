-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 10:29 AM
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
-- Database: `cinema_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`) VALUES
(1, '123@email.com', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `bookingID` int(11) NOT NULL,
  `movieID` int(11) DEFAULT NULL,
  `bookingTheatre` varchar(100) NOT NULL,
  `bookingType` varchar(100) DEFAULT NULL,
  `bookingDate` varchar(50) NOT NULL,
  `bookingTime` varchar(50) NOT NULL,
  `bookingFName` varchar(100) NOT NULL,
  `bookingPNumber` varchar(12) NOT NULL,
  `bookingEmail` varchar(255) NOT NULL,
  `DATE-TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`bookingID`, `movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingPNumber`, `bookingEmail`, `DATE-TIME`) VALUES
(80, 69, 'vip-hall', '2d', '16-01-24', '15-00', '123', '1234567890', '123@email.com', '2024-01-14 14:08:11'),
(81, 69, 'vip-hall', '2d', '16-01-24', '15-00', '123', '1234567890', '123@email.com', '2024-01-14 14:08:47'),
(82, 75, 'vip-hall', '2d', '15-01-24', '09-00', '123', '1234567890', '123@email.com', '2024-01-14 14:10:29'),
(85, 70, 'main-hall', '2d', '17-01-24', '12-00', '123', '123', '123@email.com', '2024-01-14 14:25:07'),
(86, 70, 'vip-hall', '2d', '15-01-24', '24-00', '123', '13135', '123@email.com', '2024-01-14 14:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `msgID` int(12) NOT NULL,
  `senderfName` varchar(50) NOT NULL,
  `senderlName` varchar(50) DEFAULT NULL,
  `sendereMail` varchar(100) NOT NULL,
  `senderfeedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

CREATE TABLE `movietable` (
  `movieID` int(11) NOT NULL,
  `movieImg` varchar(150) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieActors` varchar(150) NOT NULL,
  `you_tube_link` varchar(300) NOT NULL,
  `moviedetails` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieActors`, `you_tube_link`, `moviedetails`) VALUES
(69, 'img/jawaan.jpg', 'Jawaan', 'Drama', 169, 'Shah Rukh Khan, Nayanthara, Priyamani, Sanya Malhotra, Yogi Babu, Sunil Grover, Simarjeet Singh Nagra, Azzy Bagria, Manahar Kumar', '', ''),
(70, 'img/The_Black_Phone.jpg', 'The Black Phone', 'Horror, Mystery, Thriller', 102, 'Sarah Domeier Lindo,  Terri Taylor', 'https://youtu.be/3eGP6im8AZA?si=WT9ohBVaPH4TWx-X', 'desc'),
(71, 'img/the privilege.jpg', 'The Privilege', 'Horror, Mystery, Thriller', 107, 'Lise Risom Olsen, Caroline Hartig, Lea van Acken, Roman Knizka, Nadeshda Brennicke', 'https://youtu.be/WLBn_2SmTWU?si=JLeHlti6hsJJWDJz', 'de'),
(72, 'img/secret-obsession.jpg', 'Secret Obsession', 'Thriller, Mystery', 97, 'Brenda Song, Jennifer Williams, Mike Vogel, Russell, Dennis Haysbert, Detective Frank Page, Ashley Scott, Nurse Masters, Paul Sloan, Jim Kahn', 'https://youtu.be/NXICfwO2aw4?si=Hc-CwroAQqd7okez', 'd'),
(73, 'img/bird box.jpg', 'Bird Box', 'Horror, Sci-fi', 124, 'Sandra Bullock, Trevante Rhodes, John Malkovich, Sarah Paulson, Jacki Weaver', 'https://youtu.be/o2AsIXSh2xo?si=4FtKqqbTk40_Yd82', 'd'),
(75, 'img/turbo.jpg', 'Turbo', 'Sport, Comedy', 96, 'Ryan Reynolds, Paul Giamatti, Michael Peña, Samuel L. Jackson, Luis Guzmán, Bill Hader, Snoop Dogg, Maya Rudolph', 'https://youtu.be/VlRtm8Gh9PQ?si=PVrusuSi1gSqg5_e', 'd'),
(76, 'img/stand-by-me-doraemon-2014-poster.jpg', 'Stand by Me Doraemon 2', 'Sci-fi, Comedy', 96, 'Wasabi Mizuta, Megumi ?hara, Yumi Kakazu, Subaru Kimura, Tomokazu Seki, Kotono Mitsuishi, Yasunori Matsumoto', 'https://youtu.be/A0wg3Zkxq1c?si=vILfrJQTUSl9wycK', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, '123@email.com', '123', '123'),
(15, 'h@email.com', 'h', 'h');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `foreign_key_movieID` (`movieID`);

--
-- Indexes for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`msgID`),
  ADD UNIQUE KEY `msgID` (`msgID`);

--
-- Indexes for table `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `msgID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movietable`
--
ALTER TABLE `movietable`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD CONSTRAINT `foreign_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movietable` (`movieID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
