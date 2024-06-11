-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 05:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `cr_no` int(11) DEFAULT NULL,
  `task_no` varchar(50) DEFAULT NULL,
  `empid` int(255) NOT NULL,
  `due_date` date DEFAULT NULL,
  `present_date` date DEFAULT NULL,
  `person_name` varchar(100) DEFAULT NULL,
  `body` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `cr_no`, `task_no`, `empid`, `due_date`, `present_date`, `person_name`, `body`, `cc`, `email`, `phone`) VALUES
(15, 1, '2', 3, '2023-08-22', '2023-08-29', 'kiran', 'dfsdf', 'vbndgf', ' Kirantu8618@gmail.com', '08618863119'),
(18, 0, '84', 0, '0000-00-00', '0000-00-00', '', '', '', ' Kirantu8618@gmail.com', '08618863119'),
(19, 12, '123', 123, '2023-08-22', '2023-08-21', 'asd', 'asd', 'kirantu9972@gmail.com', ' kirantu8618@gmail.com', '1234567'),
(20, 123, '23', 45, '2023-08-30', '2023-08-28', 'kiran', 'kiran', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(21, 12, '34', 53, '2023-08-29', '2023-08-31', 'sdf', 'sdf', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(22, 213, '657', 0, '0000-00-00', '0000-00-00', '', '', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(23, 21, '121', 123, NULL, NULL, 'werty', 'dfsdf', 'vbndgf', ' Kira8@gmail.com', '08618863119'),
(24, 12, '234', 234, '2023-08-22', '2023-08-22', 'varun', 'uwuir', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(25, 2, '21', 123, '2023-08-17', '2023-08-01', 'kiran', 'dfsdf', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(26, 12, '31', 23, '2023-08-14', '2023-08-17', 'varunalala', 'uwuir', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(27, 2, '3', 23, '2023-08-29', '2023-08-30', 'kiran', 'qwer', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(28, 34, '32', 34, '2023-08-31', '2023-08-30', '234', 'sda', 'ddf@gmailcom', ' Kira8@gmail.com', '08618863119'),
(29, 23, '33', 123, '2023-09-05', '2023-08-30', '32', 'nb', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(30, 34, '545', 43, '2023-08-31', '2023-08-30', '34', '43', 'retgm@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(31, 21, '76', 3435, '2023-08-29', '2023-08-30', 'kiran', 'kiran', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(32, 23, '43', 21, NULL, NULL, 'fgdhjjw', 'ssx', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(37, 12, '122', 233, NULL, NULL, 'werty', 'dfsdf', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119'),
(40, 345, '5', 67, '2023-08-16', '2023-08-31', 'VIKAS', 'uwuir', 'kirantu9972@gmail.com', ' Kirantu8618@gmail.com', '08618863119');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
DELIMITER //
CREATE EVENT UpdatePresentDateEvent
ON SCHEDULE EVERY 1 MINUTE
STARTS CURRENT_TIMESTAMP
DO
BEGIN
  UPDATE `tasks` SET `present_date` = NOW() WHERE `present_date` IS NOT NULL;
END;
//
DELIMITER ;


