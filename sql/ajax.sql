-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2026 at 01:08 PM
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
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`) VALUES
(1, 'Aman', 'Sharma'),
(2, 'Rohit', 'Kumar'),
(3, 'Arjun', 'Singh'),
(4, 'Rahul', 'Verma'),
(5, 'Vikas', 'Kumar'),
(6, 'Neeraj', 'Sharma'),
(7, 'Karan', 'Singh'),
(8, 'Manish', 'Gupta'),
(9, 'Sandeep', 'Kaur'),
(10, 'Puneet', 'Singh'),
(11, 'Ankit', 'Sharma'),
(12, 'Varun', 'Mehta'),
(13, 'Harpreet', 'Singh'),
(14, 'Gurpreet', 'Kaur'),
(15, 'Jaspreet', 'Singh'),
(16, 'Navdeep', 'Kaur'),
(17, 'Simran', 'Kaur'),
(18, 'Ravinder', 'Singh'),
(19, 'Mandeep', 'Kumar'),
(20, 'Deepak', 'Verma'),
(21, 'Nikhil', 'Sharma'),
(22, 'Mohit', 'Gupta'),
(23, 'Akash', 'Kumar'),
(24, 'Vivek', 'Singh'),
(25, 'Sumit', 'Sharma'),
(26, 'Abhishek', 'Verma'),
(27, 'Ravi', 'Kumar'),
(28, 'Amit', 'Sharma'),
(29, 'Tarun', 'Gupta'),
(30, 'Gaurav', 'Singh'),
(31, 'Pankaj', 'Verma'),
(32, 'Yuvraj', 'Singh'),
(33, 'Raman', 'Kaur'),
(34, 'Harman', 'Singh'),
(35, 'Jatin', 'Sharma'),
(36, 'Sachin', 'Kumar'),
(37, 'Rakesh', 'Verma'),
(38, 'Naveen', 'Gupta'),
(39, 'Ashish', 'Singh'),
(40, 'Kamal', 'Kumar'),
(41, 'Rajat', 'Sharma'),
(42, 'Dinesh', 'Verma'),
(43, 'Varinder', 'Singh'),
(44, 'Amardeep', 'Kaur'),
(45, 'Gagandeep', 'Singh'),
(46, 'Manpreet', 'Kaur'),
(47, 'Lovepreet', 'Singh'),
(48, 'Amandeep', 'Kaur'),
(49, 'Jaskaran', 'Singh'),
(50, 'Karanbir', 'Singh'),
(51, 'Jaswinder', 'Kaur');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
