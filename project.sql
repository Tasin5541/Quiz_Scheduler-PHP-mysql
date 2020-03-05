-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 04:07 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `topic`, `message`, `datetime`, `status`) VALUES
(1, 'miftaul mannan', 'tasinmiftaulmannan@gmail.com', 'QUIZ', 'cant attend', '2018-07-22 20:15:07', 1),
(2, 'Mahfuzul Mannan', 'mmannan55@gmail.com', 'OTHER', 'testing 2', '2018-07-22 20:16:00', 1),
(3, 'pok', 'pok@gmail.com', 'UNIVERSITY', 'how can i get into the waver program?', '2018-07-25 20:06:09', 1),
(4, 'pok', 'pok@gmail.com', 'UNIVERSITY', 'cant pay tuition fee', '2018-07-25 20:22:18', 1),
(5, 'chanting', 'chanting@hotmail.com', 'OTHER', 'ruhgjbgjr regbu iregbe fvuyef jef yf ueyfuefwrvwurf uyrfeuefrwuer uyewrg iuehuiurgk  gretet t tg4tguew4 47gwiewugb iegtiertughe irgti reutgeugt itgigufewg iukfuegeug', '2018-07-26 20:46:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `topic` varchar(50) NOT NULL,
  `brief` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `topic`, `brief`) VALUES
(1, '2018-07-24', 'Blood Donation Camp at AUST', 'A daylong Blood Donation Program, jointly organized by Ahsanullah University of Science and Technology (AUST) and Bangladesh Thalassemia Foundation, Dhaka was held on 18th July, 2018 from 10.00 AM to 05.00 PM at the Boy\'s Common Room ground of AUST. Total 92 bags of whole blood were donated in this program. Out of those 92 donors, 56 were male students and 36 were female students'),
(2, '2018-07-25', 'Project Management - Breaking The Ice, seminar org', 'Dr. Khurshid Almeher is the founder and CEO of Kaymonto and Partners, which is one of the earliest project management establishment in Bangladesh. After completing his Ph.D and a few years of professional experience from Japan, Dr. Khurshid returned to Bangladesh and started his own consultancy firm. He enlightened the insight of project management for the emerging professionals, teachers and students'),
(3, '2018-08-01', 'Class Closed Till Further Notice', 'Due to heavy rainfall and blockage on the road the council has stopped all activities inside the University premises until further notice');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `subject` varchar(50) NOT NULL,
  `quizNo` varchar(50) NOT NULL,
  `syllabus` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `department`, `year`, `semester`, `section`, `date`, `time`, `subject`, `quizNo`, `syllabus`) VALUES
(1, 'CSE', '3rd', '1st', 'C', '2018-08-02', '11:20:00', 'HUM 3115', '3', 'Market'),
(2, 'CSE', '1st', '1st', 'A', '2018-07-30', '10:07:00', 'HUM 3115', '1', 'something'),
(3, 'CSE', '1st', '1st', 'A', '2018-08-01', '10:30:00', 'CSE 2108', '2', 'something'),
(4, 'CSE', '3rd', '1st', 'B', '2018-08-03', '10:30:00', 'CSE 31108', '4', 'will be told in the class'),
(5, 'CSE', '3rd', '1st', 'C', '2018-08-29', '11:20:00', 'CSE 3102', '4', 'Up until last class'),
(6, 'CSE', '3rd', '1st', 'B', '2018-08-30', '10:30:00', 'HUM 3115', '4', 'Market'),
(7, 'CSE', '1st', '1st', 'A', '2018-08-31', '12:10:00', 'CSE 1102', '3', '1.SDRHGN\r\n2.SKLDRING'),
(8, 'CSE', '1st', '1st', 'A', '2018-08-30', '11:20:00', 'HUM 1115', '4', 'FDHLYTGIHK'),
(9, 'CSE', '1st', '1st', 'B', '2018-08-29', '22:30:00', 'CSE 1103', '4', 'TEHKJLHGJMF'),
(10, 'CSE', '1st', '1st', 'B', '2018-09-29', '13:50:00', 'CSE 1104', '4', 'SGFERG'),
(11, 'CSE', '1st', '1st', 'C', '2018-09-30', '10:30:00', 'HUM 1103', '3', 'FDGFDHED'),
(12, 'CSE', '1st', '1st', 'C', '2018-09-29', '11:20:00', 'CSE 1108', '4', 'KFGHD'),
(13, 'CSE', '1st', '2nd', 'A', '2018-09-29', '12:10:00', 'CSE 1203', '4', 'FDKXRFY'),
(14, 'CSE', '1st', '2nd', 'A', '2018-09-29', '22:30:00', 'CSE 1205', '4', 'UFDTF'),
(15, 'CSE', '1st', '2nd', 'B', '2018-07-30', '10:30:00', 'CSE 1204', '3', 'DSKYFGJ'),
(16, 'CSE', '1st', '2nd', 'B', '2018-09-29', '12:10:00', 'CSE 2108', '4', 'FYLFUY'),
(17, 'CSE', '1st', '2nd', 'C', '2018-09-28', '13:50:00', 'CSE 2108', '4', 'DTYKIU'),
(18, 'CSE', '1st', '2nd', 'C', '2018-08-30', '13:50:00', 'HUM 1204', '3', 'DTYDYT'),
(19, 'EEE', '2nd', '1st', 'A', '2018-09-29', '10:30:00', 'CSE 2108', '3', 'STJYG'),
(20, 'CSE', '2nd', '1st', 'A', '2018-09-27', '13:50:00', 'CSE 2108', '4', 'FDJNHFTGN'),
(21, 'CSE', '2nd', '2nd', 'A', '2018-09-28', '13:50:00', 'HUM 2104', '4', 'DSTJHF'),
(22, 'CSE', '2nd', '1st', 'B', '2018-09-30', '13:50:00', 'CSE 2108', '4', 'JFDDJY'),
(23, 'CSE', '2nd', '1st', 'A', '2018-07-30', '10:30:00', 'CSE 2104', '4', 'DJRTFU'),
(24, 'CSE', '2nd', '1st', 'B', '2018-09-27', '11:20:00', 'CSE 2115', '4', 'FGJDJ'),
(25, 'CSE', '2nd', '1st', 'C', '2018-09-29', '22:30:00', 'CSE 2113', '4', 'FGJFDGJ'),
(26, 'CSE', '2nd', '1st', 'C', '2018-09-30', '10:30:00', 'HUM 2102', '3', 'DFSHJ'),
(27, 'CSE', '2nd', '1st', 'A', '2018-09-29', '10:30:00', 'CSE 2112', '4', 'FDGKG'),
(28, 'CSE', '2nd', '2nd', 'A', '2018-09-29', '11:20:00', 'HUM 2112', '3', 'SFJFUJ'),
(29, 'CSE', '2nd', '2nd', 'B', '2018-09-29', '12:10:00', 'CSE 2208', '4', 'DFJFT'),
(30, 'CSE', '2nd', '2nd', 'B', '2018-09-30', '10:30:00', 'CSE 2204', '4', 'DYTFJY'),
(31, 'CSE', '2nd', '2nd', 'C', '2018-09-29', '22:30:00', 'CSE 2201', '4', 'DUTYUJ'),
(32, 'CSE', '2nd', '2nd', 'C', '2018-09-30', '11:20:00', 'CSE 2224', '4', 'FGYJY'),
(33, 'CSE', '3rd', '1st', 'A', '2018-09-29', '11:20:00', 'CSE 3104', '4', 'DFHFDH'),
(34, 'CSE', '3rd', '1st', 'A', '2018-09-27', '12:10:00', 'CSE 3108', '3', 'DTFJY'),
(35, 'CSE', '3rd', '1st', 'B', '2018-09-30', '22:30:00', 'CSE 3103', '3', 'RDTFJUY'),
(36, 'CSE', '3rd', '1st', 'C', '2018-09-29', '10:30:00', 'CSE 3100', '4', 'REDYHR'),
(37, 'CSE', '3rd', '2nd', 'A', '2018-09-29', '10:30:00', 'CSE 3200', '3', 'DZFHD'),
(38, 'CSE', '3rd', '2nd', 'A', '2018-09-29', '22:30:00', 'CSE 3204', '2', 'SDHDD'),
(39, 'CSE', '3rd', '2nd', 'B', '2018-09-27', '11:20:00', 'CSE 3208', '3', 'REDSZY'),
(40, 'CSE', '3rd', '2nd', 'B', '2018-09-29', '10:30:00', 'CSE 3201', '3', 'DRTFYH'),
(41, 'CSE', '3rd', '2nd', 'C', '2018-09-27', '10:30:00', 'CSE 3207', '4', 'ESRTR'),
(42, 'CSE', '3rd', '2nd', 'C', '2018-09-29', '10:30:00', 'CSE 3200', '4', 'RDHYR'),
(43, 'CSE', '4th', '1st', 'A', '2018-09-29', '10:30:00', 'CSE 4100', '4', 'DXJHTF'),
(44, 'CSE', '4th', '1st', 'A', '2018-09-30', '22:30:00', 'CSE 4104', '3', 'GFCYY'),
(45, 'CSE', '4th', '1st', 'B', '2018-09-27', '13:50:00', 'CSE 4108', '2', 'SZEDR'),
(46, 'CSE', '4th', '1st', 'B', '2018-09-27', '11:20:00', 'CSE 4107', '4', 'ESDTES'),
(47, 'CSE', '4th', '1st', 'C', '2018-09-29', '10:30:00', 'CSE 4105', '4', 'WERTE'),
(48, 'CSE', '4th', '1st', 'C', '2018-09-29', '13:50:00', 'CSE 4100', '4', 'SERDYH'),
(49, 'CSE', '4th', '2nd', 'A', '2018-09-29', '10:30:00', 'CSE 4204', '3', 'SERYY'),
(50, 'CSE', '4th', '2nd', 'A', '2018-09-27', '13:50:00', 'CSE 4201', '3', 'RTUE5'),
(51, 'CSE', '4th', '2nd', 'B', '2018-09-29', '22:30:00', 'CSE 4208', '4', 'SGTE'),
(52, 'CSE', '4th', '2nd', 'C', '2018-09-30', '12:10:00', 'CSE 4200', '4', 'SREDGT'),
(53, 'CSE', '4th', '2nd', 'B', '2018-09-27', '11:20:00', 'CSE 4201', '4', 'ESRTU'),
(54, 'CSE', '4th', '2nd', 'C', '2018-09-29', '10:30:00', 'CSE 4214', '4', 'ERYE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `u_id` varchar(40) DEFAULT NULL,
  `depertment` varchar(50) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `semester` varchar(40) DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `u_id`, `depertment`, `year`, `semester`, `admin`) VALUES
(1, 'Miftaul Mannan', 'Tasin', 'tasin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, 1),
(2, 'Deepak', 'Deb Naath', 'pok@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '16-01-04-150', 'CSE', '3rd', '1st', 0),
(6, 'Miftaul Mannan', 'Tasin', 't@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '16-01-04-149', 'CSE', '3rd', '1st', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
