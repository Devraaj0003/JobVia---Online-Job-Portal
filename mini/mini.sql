-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2023 at 03:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `job_id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateofwork` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `job_desc` varchar(255) DEFAULT NULL,
  `dateofpost` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`job_id`, `name`, `email`, `dateofwork`, `phone`, `place`, `job_desc`, `dateofpost`, `status`, `field`, `receiver`) VALUES
('JO3356', 'Arun K', 'Arun@123', '2023-10-09', '9945612399', 'kaloor', 'good job.', '2023-10-24', 'applied', 'coconut', 'Varun@123'),
('JO4312', 'Newbi', 'Newbi@123', '2023-11-28', '998877445544', 'paravoor', 'Need a good electrician.', '2023-11-06', 'applied', 'Electrician', ''),
('JO7812', 'Newbi', 'Newbi@123', '2023-11-23', '998877445544', 'paravoor', 'Good Gardener.', '2023-11-06', 'pending', 'gardener', ''),
('JO8711', 'Arun K', 'Arun@123', '2023-10-25', '9945612399', 'kaloor', 'gooo server needed', '2023-10-24', 'pending', 'plumber', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `member_no` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL DEFAULT '-',
  `state` varchar(255) NOT NULL DEFAULT '-',
  `phone` varchar(255) NOT NULL DEFAULT '-',
  `last_login` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT '-',
  `passwrd` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `about` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`member_no`, `name`, `email`, `town`, `state`, `phone`, `last_login`, `role`, `gender`, `passwrd`, `service`, `about`) VALUES
('SE3124', 'new', 'Newer@123', 'Aluva', 'kerala', '08899456456', '13-10-2023 05:02:27pm ', 'seeker', 'female', 'Newer@123', '', ''),
('SE3928', 'Arun K', 'Arun@123', 'kaloor', 'kerala', '9945612399', '31-10-2023 08:01:17am ', 'seeker', 'male', 'Arun@123', 'sweeper', 'Well expirenced plumber .'),
('SE4343', 'Newbi', 'Newbi@123', 'paravoor', 'kerala', '998877445544', '06-11-2023 10:45:09am ', 'seeker', 'female', 'Newbi@123', 'none', 'nice to meet you'),
('SE5013', 'Yedhu', 'Yedhu@123', 'paravoor', 'kerala', '998877445544', '13-10-2023 04:56:18pm ', 'seeker', 'male', 'Yedhu@123', '', ''),
('SE6589', 'Alex', 'Alex@123', 'Ernakulam', 'Kerala', '07594900620', '05-11-2023 05:35:42am AM', 'seeker', 'male', 'Alex@123', '', ''),
('WO3825', 'varun', 'Varun@123', 'aluva', 'Kerala', '07594900620', '06-11-2023 10:50:11am AM', 'worker', 'female', 'Varun@123', 'developer', 'good programmer.'),
('WO5911', 'hari', 'Hari@123', 'Ernakulam', 'Kerala', '07594900620', '04-11-2023 08:43:13pm ', 'worker', 'male', 'Hari@123', 'cleaner', 'good service'),
('WO6830', 'Aliya@123', 'Aliya@123', 'north', 'Kerala', '07594900620', '30-10-2023 01:30:04pm PM', 'worker', 'female', 'Aliya@123', 'developer', 'Hard Worker'),
('WO7455', 'Asha', 'Asha@123', 'ernakulam', 'kerala', '9998774561', '05-11-2023 05:38:00am AM', 'worker', 'female', 'Asha@123', '', ''),
('WO8993', 'Kevin Paul', 'Kevin@123', 'Aluva', 'kerala', '8899456456', '30-10-2023 01:50:52pm ', 'worker', 'male', 'Kevin@123', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`member_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
