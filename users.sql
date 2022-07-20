-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 08:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `generateBarcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `date`) VALUES
(35, 'Lenovo', '2022-04-20 14:32:04'),
(37, 'hp', '2022-04-21 07:35:39'),
(38, 'samsung', '2022-05-09 17:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `ccredit`
--

CREATE TABLE `ccredit` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref` int(12) NOT NULL,
  `document` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `id_no` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `ccredit` varchar(20) NOT NULL,
  `credit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE `condition` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`id`, `conditions`, `date`) VALUES
(7, 'Used', '2022-04-24 19:20:56'),
(9, 'Refurb', '2022-04-24 19:21:35'),
(10, 'New', '2022-04-24 19:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` int(20) NOT NULL,
  `cpu` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `cpu`, `date`) VALUES
(36, 'intel core i5', '2022-04-22 09:38:16'),
(37, '', '2022-05-18 12:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(12) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `random`, `username`, `id_no`) VALUES
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 0, 'Jackss', '56841584'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 65815, 'Jacks', '11684578'),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 0, 'kirubi', '11684578'),
(15, 'jane', 'feon', 898989, 'shamahoho', 'feon@gmail.com', '2022-05-18 15:33:35', 0, 'jane', '88989');

-- --------------------------------------------------------

--
-- Table structure for table `customer1`
--

CREATE TABLE `customer1` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `id` int(11) NOT NULL,
  `assetid` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `warranty` varchar(20) NOT NULL,
  `wnote` text NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer2`
--

CREATE TABLE `customer2` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref` int(12) NOT NULL,
  `document` int(12) NOT NULL,
  `assetid` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `warranty` varchar(20) NOT NULL,
  `wnote` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer2`
--

INSERT INTO `customer2` (`id`, `fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `random`, `date`, `ref`, `document`, `assetid`, `username`, `id_no`, `warranty`, `wnote`, `user_name`) VALUES
(6, 'james ', 'bengi', 520768623, 'Kisumu', 'test@test.com', '2022-04-22 15:27:07', 56735, '2022-04-25 10:09:23', 0, 0, 419130, '', '', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 56735, '2022-04-25 10:18:42', 0, 0, 0, '', '', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'Kisumu', 'test@test.com', '2022-04-22 15:27:07', 56735, '2022-04-25 10:36:03', 0, 0, 419130, '', '', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'Kisumu', 'test@test.com', '2022-04-22 15:27:07', 56735, '2022-04-25 11:20:23', 0, 0, 419130, '', '', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 56735, '2022-04-25 11:23:04', 0, 0, 0, '', '', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 56735, '2022-04-26 06:28:36', 0, 0, 0, '', '', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 56735, '2022-04-27 06:58:19', 0, 0, 0, '', '', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 56735, '2022-04-27 06:59:10', 0, 0, 0, '', '', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 56735, '2022-05-03 12:57:23', 0, 0, 0, '', '', '', '', ''),
(9, 'henry', 'wannyama', 2147483647, 'New york', 'henry@test.com', '2022-04-25 10:55:02', 56735, '2022-05-04 12:50:46', 0, 0, 0, '', '', '', '', ''),
(9, 'henry', 'wannyama', 2147483647, 'New york', 'henry@test.com', '2022-04-25 10:55:02', 56735, '2022-05-04 12:52:30', 0, 0, 0, '', '', '', '', ''),
(9, 'henry', 'wannyama', 2147483647, 'New york', 'henry@test.com', '2022-04-25 10:55:02', 56735, '2022-05-04 12:53:18', 0, 0, 0, '', '', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 56735, '2022-05-04 12:54:17', 0, 0, 0, '', '', '', '', ''),
(9, 'henry', 'wannyama', 2147483647, 'New york', 'henry@test.com', '2022-04-25 10:55:02', 56735, '2022-05-04 12:54:57', 0, 0, 0, '', '', '', '', ''),
(11, 'joy', 'Wesanza', 2147483647, 'Kiambu', 'joooh179@gmail.com', '2022-05-03 16:44:33', 56735, '2022-05-04 13:03:17', 0, 0, 0, '', '', '', '', ''),
(9, 'henry', 'wannyama', 2147483647, 'New york', 'henry@test.com', '2022-04-25 10:55:02', 56735, '2022-05-05 07:44:39', 0, 0, 0, '', '', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 56735, '2022-05-05 07:45:19', 0, 0, 0, '', '', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 56735, '2022-05-05 09:44:35', 0, 0, 0, '', '', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 56735, '2022-05-05 11:02:11', 0, 0, 0, '', '', '', '', ''),
(11, 'joy', 'Wesanza', 2147483647, 'Kiambu', 'joooh179@gmail.com', '2022-05-03 16:44:33', 56735, '2022-05-05 18:04:02', 0, 0, 0, '', '', '', '', ''),
(9, 'henry', 'wannyama', 2147483647, 'New york', 'henry@test.com', '2022-04-25 10:55:02', 0, '2022-05-05 18:07:47', 0, 0, 0, '', '', '', '', ''),
(11, 'joy', 'Wesanza', 2147483647, 'Kiambu', 'joooh179@gmail.com', '2022-05-03 16:44:33', 41155, '2022-05-05 18:30:40', 0, 0, 0, '', '', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 51912, '2022-05-07 06:49:37', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 21030, '2022-05-07 09:23:18', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 21030, '2022-05-07 09:24:44', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 88094, '2022-05-07 09:30:53', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 10058, '2022-05-10 06:19:09', 0, 0, 0, 'Jackss', '56841584', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 73341, '2022-05-10 06:24:49', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 35703, '2022-05-10 06:25:08', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 71733, '2022-05-10 09:46:16', 0, 0, 0, 'Jackss', '56841584', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 10443, '2022-05-10 19:21:21', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 50654, '2022-05-10 19:24:52', 0, 0, 0, 'Jackss', '56841584', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 77592, '2022-05-10 19:27:47', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 94616, '2022-05-10 19:31:50', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 73418, '2022-05-10 20:17:32', 0, 0, 0, 'Jackss', '56841584', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 69869, '2022-05-11 07:46:03', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 90088, '2022-05-11 10:45:15', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 65020, '2022-05-11 10:47:46', 0, 0, 0, 'Jackss', '56841584', '', '', ''),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 87629, '2022-05-11 10:50:52', 0, 0, 0, 'feon', '99899889', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 40738, '2022-05-11 10:51:36', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 22217, '2022-05-11 10:58:30', 0, 0, 0, 'Jackss', '56841584', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 65217, '2022-05-11 20:59:10', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 35506, '2022-05-11 21:39:04', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 17456, '2022-05-12 08:17:03', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 81528, '2022-05-12 09:49:50', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 91605, '2022-05-12 10:01:54', 0, 0, 0, 'Jacks', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 86138, '2022-05-12 12:01:52', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 41615, '2022-05-12 12:31:26', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 52342, '2022-05-12 13:22:00', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 40820, '2022-05-13 05:51:40', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 43461, '2022-05-13 05:53:41', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 14189, '2022-05-13 07:48:08', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 15185, '2022-05-13 08:01:15', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 52096, '2022-05-13 09:29:05', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA00', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 82413, '2022-05-13 09:34:15', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 29339, '2022-05-13 09:37:14', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 76049, '2022-05-13 10:29:12', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 35420, '2022-05-13 10:30:19', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 94773, '2022-05-13 10:32:45', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 51618, '2022-05-13 10:33:55', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 66289, '2022-05-13 10:39:26', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 19177, '2022-05-13 10:42:45', 0, 0, 0, 'kirubi', '11684578', '!234', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 11540, '2022-05-13 10:52:01', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA00', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 21063, '2022-05-13 10:54:00', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA00', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 80869, '2022-05-13 10:55:48', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA01', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 19037, '2022-05-13 10:57:25', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA01', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 11972, '2022-05-13 10:59:46', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA11', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 35375, '2022-05-13 11:00:32', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA11', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 44421, '2022-05-13 11:04:37', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA21', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 24196, '2022-05-13 11:05:54', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA31', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 69846, '2022-05-13 11:13:27', 0, 0, 0, 'kirubi', '11684578', '', '', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 31620, '2022-05-13 11:16:17', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA00', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 17732, '2022-05-13 11:16:53', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA01', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 64411, '2022-05-13 11:17:43', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA01', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 26810, '2022-05-13 11:19:24', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA00', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 67692, '2022-05-13 11:20:12', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA01', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 90326, '2022-05-13 11:20:35', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA02', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 52743, '2022-05-13 11:43:41', 0, 0, 0, 'kirubi', '11684578', '!234', 'AAA00', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 60129, '2022-05-13 11:46:08', 0, 0, 0, 'kirubi', '11684578', '!234', 'AA000', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 32150, '2022-05-13 11:46:27', 0, 0, 0, 'kirubi', '11684578', '!234', 'AA001', ''),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 90173, '2022-05-13 15:25:04', 0, 0, 0, 'feon', '99899889', '!234', 'AA000', ''),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 14862, '2022-05-13 15:27:43', 0, 0, 0, 'feon', '99899889', '!234', 'AA001', ''),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 12745, '2022-05-13 20:05:18', 0, 0, 0, 'feon', '99899889', '!234', 'W000', 'admin'),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 68790, '0000-00-00 00:00:00', 0, 0, 0, 'feon', '99899889', '!234', 'W000', 'admin'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 31202, '0000-00-00 00:00:00', 0, 0, 0, 'Jackss', '56841584', '!234', 'W000', 'admin'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 64558, '0000-00-00 00:00:00', 0, 0, 0, 'Jackss', '56841584', '!234', 'W002', 'admin'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 91281, '0000-00-00 00:00:00', 0, 0, 0, 'Jackss', '56841584', '!234', 'W003', 'admin'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 48052, '0000-00-00 00:00:00', 0, 0, 0, 'Jackss', '56841584', '!234', 'W001', 'admin'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 44589, '0000-00-00 00:00:00', 0, 0, 0, 'Jackss', '56841584', '!234', 'W004', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer3`
--

CREATE TABLE `customer3` (
  `id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `customerjob` varchar(20) NOT NULL,
  `unitprice` int(255) NOT NULL,
  `total` int(30) NOT NULL,
  `phone` int(12) NOT NULL,
  `random` int(12) NOT NULL,
  `vendor` varchar(244) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `lname` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL,
  `delvno` varchar(20) NOT NULL,
  `wnote` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `warranty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customerfo`
--

CREATE TABLE `customerfo` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `faulty` varchar(20) NOT NULL,
  `faultyn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerfo`
--

INSERT INTO `customerfo` (`id`, `fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `random`, `username`, `id_no`, `faulty`, `faultyn`) VALUES
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 33845, 'Jackss', '56841584', '000oi', 'F000');

-- --------------------------------------------------------

--
-- Table structure for table `customerin`
--

CREATE TABLE `customerin` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `invoice` varchar(12) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `invno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customerinv`
--

CREATE TABLE `customerinv` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `invoice` varchar(12) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `invno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerinv`
--

INSERT INTO `customerinv` (`id`, `fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `random`, `username`, `id_no`, `invoice`, `user_name`, `invno`) VALUES
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 26279, 'Jacks', '11684578', 'APTech123', 'admin', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 26157, 'kirubi', '11684578', 'APTech123', 'admin', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 21900, 'kirubi', '11684578', 'APTech123', 'admin', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 58518, 'Jacks', '11684578', 'APTech123', 'admin', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 77842, 'kirubi', '11684578', 'APTech123', 'admin', 'AA005'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 96586, 'Jacks', '11684578', 'APTech123', 'admin', 'AA007'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 21718, 'Jackss', '56841584', 'APTech123', 'admin', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 55247, 'kirubi', '11684578', 'APTech123', 'admin', 'AA008'),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 55257, 'kirubi', '11684578', 'APTech123', 'admin', 'AA004'),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 97885, 'feon', '99899889', 'APTech123', 'admin', 'AA005'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 87080, 'Jackss', '56841584', 'APTech123', 'admin', 'AA006'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 65656, 'Jacks', '11684578', 'APTech123', 'admin', 'AA007'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 84199, 'Jackss', '56841584', 'APTech123', 'admin', 'AA008'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 59650, 'Jackss', '56841584', 'APTech123', 'admin', 'AA009'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 78617, 'Jacks', '11684578', 'APTech123', 'admin', 'AA000'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 83613, 'Jacks', '11684578', 'APTech123', 'admin', 'AA002'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 89703, 'Jacks', '11684578', 'APTech123', 'admin', 'AA003'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 89191, 'Jackss', '56841584', 'APTech123', 'admin', 'AA001'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 42139, 'Jackss', '56841584', 'APTech123', 'admin', 'AA003'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 16927, 'Jackss', '56841584', 'APTech123', 'admin', 'AA010'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 39185, 'Jackss', '56841584', 'APTech123', 'admin', 'AA004'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 44525, 'Jackss', '56841584', 'APTech123', 'admin', 'AA002'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 86714, 'Jackss', '56841584', 'APTech123', 'admin', 'AA011'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 99760, 'Jacks', '11684578', 'APTech123', 'admin', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 68889, 'kirubi', '11684578', 'APTech123', 'admin', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 75734, 'Jackss', '56841584', 'APTech123', 'admin', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 22248, 'Jackss', '56841584', 'APTech123', 'admin', 'AA000'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 85965, 'Jackss', '56841584', 'APTech123', 'admin', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 42214, 'Jacks', '11684578', '6789', 'admin', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 81417, 'Jacks', '11684578', 'APTech123', 'admin', 'AA000'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 47989, 'Jacks', '11684578', 'APTech123', 'admin', 'AA002'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 70871, 'Jackss', '56841584', 'APTech123', 'admin', 'AA003'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 26943, 'Jackss', '56841584', 'APTech123', 'admin', 'AA001'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 91525, 'Jacks', '11684578', 'APTech123', 'admin', 'AA004'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 38283, 'Jacks', '11684578', 'APTech123', 'admin', 'AA002'),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 20523, 'kirubi', '11684578', 'APTech123', 'admin', 'AA005'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 26923, 'Jackss', '56841584', 'APTech123', 'admin', ''),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 73254, 'Jacks', '11684578', 'APTech123', 'admin', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 29387, 'kirubi', '11684578', 'APTech123', 'admin', 'AA000'),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 28887, 'feon', '99899889', 'APTech123', 'admin', ''),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 67810, 'kirubi', '11684578', 'APTech123', 'admin', 'AA000'),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 29000, 'kirubi', '11684578', 'APTech123', 'admin', '1'),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 17831, 'kirubi', '11684578', 'APTech123', 'admin', '1'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 54741, 'Jacks', '11684578', 'APTech123', 'admin', '1'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 94830, 'Jacks', '11684578', 'APTech123', 'admin', 'AA002'),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 55889, 'kirubi', '11684578', 'APTech123', 'admin', 'AA001'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 10316, 'Jacks', '11684578', 'APTech123', 'admin', 'AA000'),
(12, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 42063, 'kirubi', '11684578', 'APTech123', 'admin', 'AA001'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 44613, 'Jacks', '11684578', 'APTech123', 'admin', 'AA002'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 71873, 'Jacks', '11684578', 'APTech123', 'admin', 'AA003'),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 28617, 'feon', '99899889', 'jjpojpojpo', 'mike', 'AA000'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 50394, 'Jackss', '56841584', 'APTech123', 'mainuser', 'AA000');

-- --------------------------------------------------------

--
-- Table structure for table `dcustomer`
--

CREATE TABLE `dcustomer` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `id` int(11) NOT NULL,
  `assetid` int(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `delvnote` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `address` int(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debit`
--

INSERT INTO `debit` (`id`, `conditions`, `type`, `assetid`, `gen`, `brand`, `serialno`, `part`, `modelid`, `model`, `cpu`, `speed`, `ram`, `hdd`, `odd`, `screen`, `comment`, `price`, `daterecieved`, `datedelivered`, `customer`, `vendor`, `list`, `status`, `qty`, `total`, `barcodes`, `terms`, `del`, `random`, `time`, `tbl`, `tqty`) VALUES
(4788, 'Refurb', 'printer', '43432479', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '2022/05/19', '', 'jane', '', '', 1, 0, '', '', 307172, 72833, '11:43:10', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown`
--

CREATE TABLE `dropdown` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `part` varchar(20) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `comment` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dropdown`
--

INSERT INTO `dropdown` (`id`, `conditions`, `type`, `assetid`, `gen`, `brand`, `ram`, `screen`, `part`, `serialno`, `model`, `modelid`, `cpu`, `speed`, `price`, `odd`, `comment`, `hdd`, `daterecieved`, `datedelivered`, `customer`, `list`, `status`, `qty`, `total`, `barcodes`, `terms`, `del`) VALUES
(19, 'used', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:42:17', '', '', '', '', 1, 0, '', '', 0),
(21, '', '', '', '', '', '', '14\"', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:43:27', '', '', '', '', 1, 0, '', '', 0),
(23, 'furbished', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:44:34', '', '', '', '', 1, 0, '', '', 0),
(24, '', 'Desktop', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:44:40', '', '', '', '', 1, 0, '', '', 0),
(25, '', 'Laptop', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:44:45', '', '', '', '', 1, 0, '', '', 0),
(26, '', '', '', '', 'Hp', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:44:49', '', '', '', '', 1, 0, '', '', 0),
(27, '', '', '', '1st generation', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:44:55', '', '', '', '', 1, 0, '', '', 0),
(28, '', '', '', '', '', '', '', '', '', '', '', 'i5 ', '', '', '', '', '', '2022-04-20 11:45:00', '', '', '', '', 1, 0, '', '', 0),
(29, '', '', '', '', '', '', '', '', '', '', '', '', '4ghz', '', '', '', '', '2022-04-20 11:45:05', '', '', '', '', 1, 0, '', '', 0),
(30, '', '', '', '', '', '4gb', '', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:45:10', '', '', '', '', 1, 0, '', '', 0),
(31, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '500ssd', '2022-04-20 11:45:14', '', '', '', '', 1, 0, '', '', 0),
(32, '', '', '', '', '', '', '15\"', '', '', '', '', '', '', '', '', '', '', '2022-04-20 11:45:19', '', '', '', '', 1, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `id` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `export`
--

INSERT INTO `export` (`id`, `date`, `ref`) VALUES
(12, '2022-04-27 11:21:14', 8656),
(13, '2022-04-27 11:21:22', 7181),
(14, '2022-04-27 11:26:30', 4404),
(15, '2022-04-27 11:27:05', 1170),
(16, '2022-04-27 11:28:37', 8064),
(17, '2022-04-27 11:28:44', 3564),
(18, '2022-04-27 11:28:47', 4494),
(19, '2022-04-27 11:38:23', 4773),
(20, '2022-04-27 11:39:38', 6654),
(21, '2022-04-27 11:40:39', 4102),
(22, '2022-04-27 11:43:10', 9979),
(23, '2022-04-27 11:44:16', 4879),
(24, '2022-04-27 12:05:52', 2491),
(25, '2022-04-27 12:52:08', 1730),
(26, '2022-04-27 19:08:22', 8521),
(27, '2022-04-29 13:57:22', 3414),
(28, '2022-04-29 13:58:35', 2996),
(29, '2022-04-29 14:03:29', 2613),
(30, '2022-04-29 14:03:59', 5645),
(31, '2022-04-29 14:05:40', 8887),
(32, '2022-04-29 17:55:13', 4892),
(33, '2022-05-01 09:00:29', 9620),
(34, '2022-05-01 09:16:59', 6847),
(35, '2022-05-03 12:27:14', 2407),
(36, '2022-05-03 12:37:39', 4661),
(37, '2022-05-04 06:18:11', 6095),
(38, '2022-05-04 06:18:11', 7775),
(39, '2022-05-04 06:20:10', 5966),
(40, '2022-05-04 06:20:24', 9254),
(41, '2022-05-04 06:21:16', 1575),
(42, '2022-05-04 06:47:09', 9801),
(43, '2022-05-04 06:50:26', 8595),
(44, '2022-05-04 11:40:31', 3211),
(45, '2022-05-04 11:46:24', 7034),
(46, '2022-05-04 11:49:42', 3796),
(47, '2022-05-04 11:51:09', 6861),
(48, '2022-05-04 11:52:24', 2784),
(49, '2022-05-04 11:52:33', 9414),
(50, '2022-05-04 11:52:48', 7730),
(51, '2022-05-04 11:53:02', 6180),
(52, '2022-05-05 10:04:34', 2352),
(53, '2022-05-05 20:13:10', 7030),
(54, '2022-05-05 20:22:57', 9352),
(55, '2022-05-05 20:29:01', 1231),
(56, '2022-05-05 20:34:25', 5920),
(57, '2022-05-05 20:37:10', 4354),
(58, '2022-05-05 20:42:38', 9719),
(59, '2022-05-06 05:48:36', 5227),
(60, '2022-05-06 09:07:22', 5375),
(61, '2022-05-06 09:24:47', 5067),
(62, '2022-05-06 09:29:17', 9641),
(63, '2022-05-06 11:11:46', 2046),
(64, '2022-05-06 13:26:09', 2558),
(65, '2022-05-07 09:57:15', 4959),
(66, '2022-05-07 10:04:24', 2226),
(67, '2022-05-07 10:48:22', 9426),
(68, '2022-05-07 11:30:14', 3763),
(69, '2022-05-07 17:45:20', 3207),
(70, '2022-05-07 17:52:33', 1869),
(71, '2022-05-07 17:56:14', 6817),
(72, '2022-05-07 18:01:32', 7810),
(73, '2022-05-07 18:16:27', 7574),
(74, '2022-05-08 18:35:56', 1359),
(75, '2022-05-08 19:21:06', 4771),
(76, '2022-05-09 05:43:39', 9552),
(77, '2022-05-09 07:56:37', 5856),
(78, '2022-05-09 08:04:02', 8582),
(79, '2022-05-09 08:04:20', 6627),
(80, '2022-05-09 08:04:36', 7980),
(81, '2022-05-09 08:12:03', 5141),
(82, '2022-05-09 08:22:27', 9875),
(83, '2022-05-09 08:24:51', 7396),
(84, '2022-05-09 08:25:25', 5495),
(85, '2022-05-09 08:25:31', 8710),
(86, '2022-05-09 08:29:39', 1754),
(87, '2022-05-09 08:31:12', 4908),
(88, '2022-05-09 08:32:14', 3124),
(89, '2022-05-09 10:56:44', 4199),
(90, '2022-05-09 10:57:13', 8056),
(91, '2022-05-09 13:48:56', 4099),
(92, '2022-05-09 13:49:15', 7942),
(93, '2022-05-10 06:51:21', 3682),
(94, '2022-05-10 07:29:23', 1094),
(95, '2022-05-10 07:29:44', 5933),
(96, '2022-05-10 07:46:26', 5743),
(97, '2022-05-10 07:59:08', 8035),
(98, '2022-05-10 08:29:45', 6412),
(99, '2022-05-10 08:30:13', 8015),
(100, '2022-05-10 08:54:03', 7276),
(101, '2022-05-10 08:58:13', 3220),
(102, '2022-05-10 11:07:10', 6210),
(103, '2022-05-10 11:10:03', 2679),
(104, '2022-05-10 11:10:11', 2705),
(105, '2022-05-10 11:10:15', 6597),
(106, '2022-05-10 11:10:52', 4539),
(107, '2022-05-10 11:13:45', 2234),
(108, '2022-05-10 11:58:43', 7135),
(109, '2022-05-10 14:00:18', 7113),
(110, '2022-05-10 14:02:56', 1661),
(111, '2022-05-10 14:13:43', 8423),
(112, '2022-05-10 14:17:31', 1101),
(113, '2022-05-10 14:21:19', 6999),
(114, '2022-05-10 14:24:01', 7287),
(115, '2022-05-10 14:32:37', 9396),
(116, '2022-05-10 14:40:00', 6029),
(117, '2022-05-10 19:02:22', 5449),
(118, '2022-05-10 19:03:51', 2987),
(119, '2022-05-10 19:16:47', 5796),
(120, '2022-05-10 20:10:02', 1038),
(121, '2022-05-10 20:23:59', 2507),
(122, '2022-05-10 20:24:05', 1936),
(123, '2022-05-10 20:24:31', 4854),
(124, '2022-05-11 07:46:34', 1912),
(125, '2022-05-11 07:47:31', 6487),
(126, '2022-05-11 07:50:40', 8751),
(127, '2022-05-11 07:54:39', 4309),
(128, '2022-05-11 07:58:08', 3967),
(129, '2022-05-11 08:32:03', 8154),
(130, '2022-05-11 08:34:01', 3379),
(131, '2022-05-11 08:36:00', 4864),
(132, '2022-05-11 08:43:48', 5936),
(133, '2022-05-11 09:56:10', 7039),
(134, '2022-05-11 09:57:18', 6840),
(135, '2022-05-11 10:32:47', 8135),
(136, '2022-05-11 10:33:12', 6795),
(137, '2022-05-11 10:47:53', 8809),
(138, '2022-05-11 10:50:54', 3456),
(139, '2022-05-11 10:51:53', 8501),
(140, '2022-05-11 10:59:23', 1879),
(141, '2022-05-11 10:59:42', 2411),
(142, '2022-05-11 11:01:01', 6257),
(143, '2022-05-11 11:06:24', 8010),
(144, '2022-05-11 11:14:05', 5069),
(145, '2022-05-11 11:45:10', 8835),
(146, '2022-05-11 11:46:36', 5282),
(147, '2022-05-11 12:48:34', 5235),
(148, '2022-05-11 12:53:53', 1217),
(149, '2022-05-11 12:57:09', 4103),
(150, '2022-05-11 12:58:28', 5993),
(151, '2022-05-11 13:57:57', 2039),
(152, '2022-05-11 14:01:06', 1590),
(153, '2022-05-11 14:02:26', 1773),
(154, '2022-05-11 20:59:26', 5643),
(155, '2022-05-11 20:59:40', 4457),
(156, '2022-05-12 06:12:28', 3899),
(157, '2022-05-13 13:04:09', 1265),
(158, '2022-05-13 14:44:10', 4717),
(159, '2022-05-13 14:44:29', 9951),
(160, '2022-05-13 20:52:31', 3637),
(161, '2022-05-13 20:52:45', 2808),
(162, '2022-05-14 10:23:06', 4763),
(163, '2022-05-14 10:23:17', 9243),
(164, '2022-05-14 10:50:40', 1733),
(165, '2022-05-16 10:59:13', 7594),
(166, '2022-05-16 11:06:06', 9636),
(167, '2022-05-16 11:22:34', 8578),
(168, '2022-05-16 11:31:14', 8882),
(169, '2022-05-16 13:24:37', 7230),
(170, '2022-05-16 13:28:01', 5246),
(171, '2022-05-16 13:28:48', 3513),
(172, '2022-05-16 13:29:39', 7220),
(173, '2022-05-16 13:40:08', 3319),
(174, '2022-05-18 11:30:05', 2888),
(175, '2022-05-18 11:32:44', 2955),
(176, '2022-05-18 11:33:03', 1717),
(177, '2022-05-18 11:37:29', 4517),
(178, '2022-05-18 11:41:10', 1606),
(179, '2022-05-18 11:52:38', 5134),
(180, '2022-05-18 12:29:42', 5484),
(181, '2022-05-19 07:40:16', 1814),
(182, '2022-05-19 07:41:04', 8970),
(183, '2022-05-19 07:45:08', 4723);

-- --------------------------------------------------------

--
-- Table structure for table `faulty`
--

CREATE TABLE `faulty` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faulty`
--

INSERT INTO `faulty` (`id`, `conditions`, `type`, `assetid`, `gen`, `brand`, `serialno`, `part`, `modelid`, `model`, `cpu`, `speed`, `ram`, `hdd`, `odd`, `screen`, `comment`, `price`, `daterecieved`, `datedelivered`, `customer`, `vendor`, `list`, `status`, `qty`, `total`, `barcodes`, `terms`, `del`, `random`, `time`, `tbl`, `tqty`) VALUES
(4793, 'Refurb', 'printer', '99150848', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-18 11:19:10', '', '', '', '', 'spoiled', 1, 0, '', '', 157174, 0, '14:19:10', '', ''),
(4807, 'Refurb', 'allinone', '17432819', '10 th', 'Lenovo', 'SP0468', 'CPU', '37498', 'HP Desktop Hightower', 'intel core i5', '4ghz', '16 gb', '500', 'yes', '15', 'stored', '10000', '2022-05-18 11:23:39', '', 'anthony', '', 'New', 'wip', 1, 0, '', '', 39747492, 0, '14:23:39', '', ''),
(4808, 'Refurb', 'allinone', '30436853', '10 th', 'Lenovo', 'SP0468', 'CPU', '37498', 'HP Desktop Hightower', 'intel core i5', '4ghz', '16 gb', '500', 'yes', '15', 'stored', '10000', '2022-05-18 11:23:39', '', 'anthony', '', 'New', '', 1, 0, '', '', 39747492, 81962, '14:23:39', 'faulty', ''),
(12393, 'Used', 'laptop', '366416', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '2022-05-17 0', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 31202, '09:34:18', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `faultyc`
--

CREATE TABLE `faultyc` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref` int(12) NOT NULL,
  `document` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `faultyn` varchar(20) NOT NULL,
  `faulty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faultyout`
--

CREATE TABLE `faultyout` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gen`
--

CREATE TABLE `gen` (
  `id` int(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gen`
--

INSERT INTO `gen` (`id`, `gen`, `date`) VALUES
(2, '10 th', '2022-04-21 07:35:52'),
(3, '6 th', '2022-04-21 07:36:03'),
(4, '7 th', '2022-04-21 07:36:06'),
(5, '8 th', '2022-04-21 07:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `hdd`
--

CREATE TABLE `hdd` (
  `id` int(20) NOT NULL,
  `hdd` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hdd`
--

INSERT INTO `hdd` (`id`, `hdd`, `date`) VALUES
(33, '500', '2022-04-21 07:37:58'),
(34, '256', '2022-04-21 07:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `hospitalnum` int(10) NOT NULL,
  `date` int(6) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoicecreate`
--

CREATE TABLE `invoicecreate` (
  `id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ref` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `customerjob` varchar(20) NOT NULL,
  `unitprice` int(255) NOT NULL,
  `total` int(30) NOT NULL,
  `phone` int(12) NOT NULL,
  `random` int(12) NOT NULL,
  `vendor` varchar(244) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `lname` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `invno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoicecreate`
--

INSERT INTO `invoicecreate` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `vendor`, `fname`, `location`, `time`, `lname`, `id_no`, `email`, `username`, `user_name`, `invno`) VALUES
(104, '', '', '2022-05-18 21:00:00', '50394', 'Jackss50394.pdf', 0, '', 0, 0, 2147483647, 0, '', 'Jackson', ' Navakholo', '11:09:38', 'Wesanza', '56841584', 'jackwise179@gmail.co', 'Jackss', 'mainuser', 'AA000');

-- --------------------------------------------------------

--
-- Table structure for table `jobc`
--

CREATE TABLE `jobc` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobcard`
--

CREATE TABLE `jobcard` (
  `id` int(12) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `document` varchar(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `masterlist`
--

CREATE TABLE `masterlist` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(12) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masterlist`
--

INSERT INTO `masterlist` (`id`, `conditions`, `type`, `assetid`, `gen`, `brand`, `serialno`, `part`, `modelid`, `model`, `cpu`, `speed`, `ram`, `hdd`, `odd`, `screen`, `comment`, `price`, `daterecieved`, `datedelivered`, `customer`, `vendor`, `list`, `status`, `qty`, `total`, `barcodes`, `terms`, `del`, `random`, `time`, `tbl`, `tqty`) VALUES
(4787, 'Refurb', 'printer', '34398912', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4789, 'Refurb', 'printer', '67605559', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4790, 'Refurb', 'printer', '51725472', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4791, 'Refurb', 'printer', '65182235', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4792, 'Refurb', 'printer', '77101772', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4793, 'Refurb', 'printer', '99150848', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4794, 'Refurb', 'printer', '89242781', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4795, 'Refurb', 'printer', '64986647', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4796, 'Refurb', 'printer', '21707342', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4797, 'Refurb', 'printer', '61140075', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4798, 'Refurb', 'printer', '26780469', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4799, 'Refurb', 'printer', '15507309', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4800, 'Refurb', 'printer', '83796272', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4802, 'Refurb', 'printer', '66454414', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4803, 'Refurb', 'printer', '60719374', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4804, 'Refurb', 'printer', '41616592', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4805, 'Refurb', 'printer', '16666736', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', ''),
(4806, 'Refurb', 'printer', '75475322', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 08:43:10', '', '', 'jane', '', '', 1, 0, '', '', 307172, 0, '11:43:10', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `vendor` varchar(255) NOT NULL COMMENT 'name',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'sell',
  `random` int(30) NOT NULL COMMENT 'created at',
  `ref` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `document` varchar(255) NOT NULL,
  `fname` varchar(17) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `assetid` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `delvnote` varchar(20) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Atomic database';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `vendor`, `date`, `random`, `ref`, `address`, `phone`, `document`, `fname`, `lname`, `location`, `email`, `user_created_at`, `assetid`, `username`, `id_no`, `delvnote`, `user_name`) VALUES
(4, '', '2022-05-16 07:54:53', 61907, '', '0', 2147483647, '', 'Jackson', 'Wesanza', 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 0, 'Jackss', '56841584', 'AA000', 'admin'),
(6, '', '2022-05-16 11:17:08', 89224, '', '0', 520768623, '', 'james ', 'bengi', 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 0, 'Jacks', '11684578', 'AA001', 'admin'),
(4, '', '2022-05-17 08:53:16', 46585, '', '0', 2147483647, '', 'Jackson', 'Wesanza', 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 0, 'Jackss', '56841584', 'AA003', 'admin'),
(6, '', '2022-05-17 08:53:00', 35072, '', '0', 520768623, '', 'james ', 'bengi', 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 0, 'Jacks', '11684578', 'AA002', 'admin'),
(4, '', '2022-05-17 08:56:55', 66555, '', '0', 2147483647, '', 'Jackson', 'Wesanza', 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 0, 'Jackss', '56841584', 'AA004', 'admin'),
(4, '', '2022-05-17 10:01:01', 90994, '', '0', 2147483647, '', 'Jackson', 'Wesanza', 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 0, 'Jackss', '56841584', 'DD999', 'admin'),
(13, '', '2022-05-17 10:01:33', 74645, '', '0', 238668932, '', 'jane', 'feon', 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 0, 'feon', '99899889', 'DE000', 'admin'),
(12, '', '2022-05-18 11:40:37', 94841, '', '0', 790038900, '', 'chris', 'kirubi', 'Nairobi', 'chriskirubi@gmail.co', '2022-05-06 09:10:15', 0, 'kirubi', '11684578', 'DD000', 'nyamwea');

-- --------------------------------------------------------

--
-- Table structure for table `product2`
--

CREATE TABLE `product2` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `vendor` varchar(255) NOT NULL COMMENT 'name',
  `random` int(30) NOT NULL COMMENT 'created at',
  `ref` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `document` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `delvnote` varchar(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Atomic database';

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` int(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `ram`, `date`) VALUES
(33, '4 gb', '2022-04-21 07:37:30'),
(34, '8 gb', '2022-04-21 07:37:34'),
(35, '16 gb', '2022-04-21 07:37:37'),
(36, '12 gb', '2022-04-21 07:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `recycle`
--

CREATE TABLE `recycle` (
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(12) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(12) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recycle`
--

INSERT INTO `recycle` (`conditions`, `type`, `assetid`, `gen`, `brand`, `serialno`, `part`, `modelid`, `model`, `cpu`, `speed`, `ram`, `hdd`, `odd`, `screen`, `comment`, `price`, `daterecieved`, `datedelivered`, `customer`, `vendor`, `list`, `status`, `qty`, `total`, `barcodes`, `terms`, `del`, `random`, `time`, `tbl`, `tqty`, `id`) VALUES
('Refurb', 'printer', '34398912', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 06:05:12', '', 'Jacks', '', '', '', 1, 0, '', '', 572480, 0, '09:05:15', '', '', 0),
('Refurb', 'printer', '43432479', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-19 06:05:12', '', 'Jacks', '', '', '', 1, 0, '', '', 572480, 0, '09:05:15', '', '', 0),
('Refurb', 'printer', '67605559', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30.00', '2022-05-16 10:52:41', '2022-05-17 0', 'feon', 'kamau', '323232New', '', 1, 0, '', '', 36299941, 74645, '13:52:41', '', '', 0),
('Used', 'laptop', '762537', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '2022-05-17 0', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 48052, '09:34:18', '', '', 0),
('Used', 'laptop', '897234', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '2022-05-17 0', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 64558, '09:34:18', '', '', 0),
('Used', 'laptop', '452457', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '2022-05-17 0', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 91281, '09:34:18', '', '', 0),
('Used', 'laptop', '335890', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '152737', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '884032', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '229885', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '351359', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '214394', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '476229', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '770257', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '352300', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '424430', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '184664', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '577430', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '661502', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('Used', 'laptop', '470546', '10 th', 'hp', '', '', '', '', 'intel core i5', '4ghz', '4 gb', '500', 'yes', '15', '', '10000', '2022-05-16 06:34:15', '', 'Jackss', '', 'New', '', 1, 0, '', '', 98639, 98639, '09:34:18', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:16:26', '', '', '', '', '', 1, 0, '', '', 157174, 0, '09:16:26', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:25', '', '', '', '', '', 1, 0, '', '', 39747492, 0, '09:17:25', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:17:50', '', '', '', '', '', 1, 0, '', '', 747607, 0, '09:17:50', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:18:47', '', '', '', '', '', 1, 0, '', '', 215780, 0, '09:18:47', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-19 06:58:55', '', '', '', '', '', 1, 0, '', '', 786594, 0, '09:58:55', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `id` int(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`id`, `screen`, `date`) VALUES
(1, '14\"', '2022-04-21 07:39:54'),
(2, '15\"', '2022-04-21 07:39:58'),
(3, '13\"', '2022-04-21 07:40:07'),
(4, '12', '2022-05-16 11:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `action` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `fname`, `lname`, `designation`, `action`, `time`) VALUES
(1, 'admin', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-09 06:20:41'),
(2, 'henry', 'henry', 'technician', 'Deleted a batch in warranty in', '2022-05-09 06:39:01'),
(3, 'admin', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-09 07:40:06'),
(4, 'admin', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-09 07:41:47'),
(5, 'admin', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-09 07:43:59'),
(6, 'admin', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-09 07:45:38'),
(7, 'admin', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-09 07:46:39'),
(8, 'admin', 'admin', 'admin', 'Added new batch in master list', '2022-05-09 08:45:23'),
(9, 'admin', 'admin', 'admin', 'Added new batch in master list', '2022-05-09 08:47:31'),
(10, 'admin', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-09 09:58:08'),
(11, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 06:56:25'),
(12, 'james ', 'admin', 'admin', 'Deleted batch937383in masterlist', '2022-05-10 06:56:38'),
(13, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 06:57:13'),
(14, 'james ', 'admin', 'admin', 'Deleted batch440634in masterlist', '2022-05-10 06:57:59'),
(15, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 06:58:36'),
(16, 'james ', 'admin', 'admin', 'Deleted batch583291in masterlist', '2022-05-10 06:58:51'),
(17, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 07:01:05'),
(18, 'james ', 'admin', 'admin', 'Deleted batch13490670in masterlist', '2022-05-10 07:01:18'),
(19, 'james ', 'admin', 'admin', 'Deleted batch101510in masterlist', '2022-05-10 07:08:05'),
(20, 'james ', 'admin', 'admin', 'Deleted batch101510in masterlist', '2022-05-10 07:10:55'),
(21, 'james ', 'admin', 'admin', 'Deleted batch13490670in faulty ', '2022-05-10 07:12:27'),
(22, 'james ', 'admin', 'admin', 'Deleted batch80899in faulty ', '2022-05-10 07:13:41'),
(23, 'james ', 'admin', 'admin', 'Deleted batch21093061in faulty ', '2022-05-10 07:13:42'),
(24, 'james ', 'admin', 'admin', 'Deleted batch21093061in faulty ', '2022-05-10 07:13:42'),
(25, 'james ', 'admin', 'admin', 'Deleted batch21093061in faulty ', '2022-05-10 07:13:43'),
(26, 'james ', 'admin', 'admin', 'Deleted batch101510in faulty ', '2022-05-10 07:19:28'),
(27, 'james ', 'admin', 'admin', 'Deleted batch101510in masterlist', '2022-05-10 07:19:34'),
(28, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 07:19:47'),
(29, 'james ', 'admin', 'admin', 'Deleted batch149824in masterlist', '2022-05-10 07:19:54'),
(30, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 07:20:07'),
(31, 'Jackson', 'admin', 'admin', 'Deleted batch13490670in masterlist', '2022-05-10 08:21:33'),
(32, 'Jackson', 'admin', 'admin', 'Deleted batch604352in masterlist', '2022-05-10 08:21:56'),
(33, 'Jackson', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-10 08:22:14'),
(34, 'Jackson', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 08:29:05'),
(35, 'Jackson', 'admin', 'admin', 'Deleted batch326717in masterlist', '2022-05-10 09:26:19'),
(36, 'Jackson', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-10 09:27:14'),
(37, 'Jackson', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-10 09:41:16'),
(38, 'Jackson', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-10 09:43:27'),
(39, 'Jackson', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-10 10:31:11'),
(40, 'Jackson', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-10 11:02:36'),
(41, 'Jackson', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-10 11:06:05'),
(42, 'Jackson', 'admin', 'admin', 'Deleted batch153187in faulty ', '2022-05-10 11:06:25'),
(43, 'Jackson', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-10 11:06:47'),
(44, 'Jackson', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-10 11:16:01'),
(45, 'Jackson', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-10 11:16:03'),
(46, 'Jackson', 'admin', 'admin', 'Deleted batch965077in faulty ', '2022-05-10 11:16:14'),
(47, 'Jackson', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 11:18:17'),
(48, 'chris', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-10 11:47:27'),
(49, 'chris', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 12:11:39'),
(50, 'chris', 'admin', 'admin', 'Deleted batch96782409in masterlist', '2022-05-10 12:11:59'),
(51, 'chris', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 12:13:18'),
(52, 'chris', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-10 13:31:08'),
(53, 'chris', 'admin', 'admin', 'Deleted batch81073348in masterlist', '2022-05-10 13:49:28'),
(54, 'chris', 'admin', 'admin', 'Deleted batch494224in masterlist', '2022-05-10 13:51:12'),
(55, 'chris', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-10 13:51:29'),
(56, 'chris', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-10 13:51:31'),
(57, 'chris', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-10 13:55:00'),
(58, 'chris', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 13:55:27'),
(59, 'chris', 'admin', 'admin', 'Deleted batch174331in faulty ', '2022-05-10 13:56:18'),
(60, 'chris', 'admin', 'admin', 'Deleted batch495962in masterlist', '2022-05-10 13:56:25'),
(61, 'chris', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 13:58:05'),
(62, 'james ', 'admin', 'admin', 'Deleted batch355110in faulty ', '2022-05-10 14:19:21'),
(63, 'james ', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-10 14:38:45'),
(64, 'admin', 'admin', 'admin', 'Added new batch in master list', '2022-05-10 18:51:55'),
(65, 'admin', 'admin', 'admin', 'Deleted batch743149in masterlist', '2022-05-11 07:00:18'),
(66, 'admin', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 07:00:24'),
(67, 'admin', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 07:10:48'),
(68, 'admin', 'admin', 'admin', 'Deleted batch355110in masterlist', '2022-05-11 07:11:37'),
(69, 'admin', 'admin', 'admin', 'Deleted batch743149in masterlist', '2022-05-11 07:11:39'),
(70, 'admin', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-11 07:12:51'),
(71, 'admin', 'admin', 'admin', 'Deleted batch805465in faulty ', '2022-05-11 07:13:03'),
(72, 'admin', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-11 07:14:39'),
(73, 'chris', 'admin', 'admin', 'Deleted batch203930in faulty ', '2022-05-11 07:20:16'),
(74, 'chris', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-11 07:22:10'),
(75, 'chris', 'admin', 'admin', 'Deleted batch315790in faulty ', '2022-05-11 07:25:58'),
(76, 'chris', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-11 07:26:13'),
(77, 'chris', 'admin', 'admin', 'Deleted batch835275in faulty ', '2022-05-11 07:44:17'),
(78, 'chris', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 07:45:27'),
(79, 'chris', 'admin', 'admin', 'Deleted batch125846in masterlist', '2022-05-11 08:28:16'),
(80, 'chris', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 08:28:49'),
(81, 'chris', 'admin', 'admin', 'Added new batch in master list', '2022-05-11 08:29:31'),
(82, 'chris', 'admin', 'admin', 'Deleted batch905983in faulty ', '2022-05-11 08:35:10'),
(83, 'chris', 'admin', 'admin', 'Deleted batch905983in masterlist', '2022-05-11 08:35:20'),
(84, 'chris', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-11 08:35:47'),
(85, 'chris', 'admin', 'admin', 'Deleted batch809088in faulty ', '2022-05-11 08:36:28'),
(86, 'chris', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-11 08:39:01'),
(87, 'chris', 'admin', 'admin', 'Deleted batch535077in faulty ', '2022-05-11 08:40:48'),
(88, 'chris', 'admin', 'admin', 'Deleted batch535077in masterlist', '2022-05-11 08:40:58'),
(89, 'chris', 'admin', 'admin', 'Added new batch in master list', '2022-05-11 08:41:22'),
(90, 'chris', 'admin', 'admin', 'Deleted batch315168in masterlist', '2022-05-11 09:03:12'),
(91, 'chris', 'admin', 'admin', 'Deleted batch315168in faulty ', '2022-05-11 09:03:42'),
(92, 'chris', 'admin', 'admin', 'Deleted batch315168in masterlist', '2022-05-11 09:04:11'),
(93, 'chris', 'admin', 'admin', 'Deleted batch315168in masterlist', '2022-05-11 09:08:56'),
(94, 'chris', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 09:13:52'),
(95, 'chris', 'admin', 'admin', 'Deleted batch160133in masterlist', '2022-05-11 10:35:05'),
(96, 'chris', 'admin', 'admin', 'Deleted batch160133in faulty ', '2022-05-11 10:35:17'),
(97, 'chris', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 10:36:16'),
(98, 'chris', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 10:38:17'),
(99, 'chris', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 10:52:41'),
(100, 'chris', 'admin', 'admin', 'Added new batch in master list', '2022-05-11 10:52:59'),
(101, 'chris', 'admin', 'admin', 'Deleted batch380007in faulty ', '2022-05-11 10:57:18'),
(102, 'chris', 'admin', 'admin', 'Deleted batch380007in masterlist', '2022-05-11 10:57:27'),
(103, 'chris', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 10:57:56'),
(104, 'chris', 'admin', 'admin', 'Added new batch in master list', '2022-05-11 11:07:18'),
(105, 'chris', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 11:07:54'),
(106, 'chris', 'admin', 'admin', 'Deleted batch962047in masterlist', '2022-05-11 11:08:02'),
(107, 'chris', 'admin', 'admin', 'Deleted batch962047in faulty ', '2022-05-11 11:08:08'),
(108, 'chris', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-11 11:08:24'),
(109, 'james ', 'admin', 'admin', 'Deleted batch886964in faulty ', '2022-05-11 11:36:54'),
(110, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-11 11:37:12'),
(111, 'james ', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 12:53:45'),
(112, 'james ', 'admin', 'admin', 'Deleted batch464071in faulty ', '2022-05-11 13:25:48'),
(113, 'james ', 'admin', 'admin', 'Deleted batch464071in masterlist', '2022-05-11 13:25:55'),
(114, 'james ', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 13:26:02'),
(115, 'james ', 'admin', 'admin', 'Deleted batch886964in faulty ', '2022-05-11 13:27:48'),
(116, 'james ', 'admin', 'admin', 'Deleted batch464071in masterlist', '2022-05-11 13:27:54'),
(117, 'james ', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 13:28:01'),
(118, 'james ', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 13:28:02'),
(119, 'james ', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-11 13:28:20'),
(120, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-11 13:28:37'),
(121, 'james ', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 13:28:51'),
(122, 'james ', 'admin', 'admin', 'Deleted batch526088in masterlist', '2022-05-11 13:30:04'),
(123, 'james ', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 13:51:15'),
(124, 'james ', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 13:51:33'),
(125, 'james ', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 13:54:29'),
(126, 'james ', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 13:54:42'),
(127, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-11 13:59:33'),
(128, 'james ', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 14:30:46'),
(129, 'james ', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 14:40:50'),
(130, 'admin', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-11 19:38:45'),
(131, 'admin', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 19:39:58'),
(132, 'admin', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-11 21:34:56'),
(133, 'admin', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-12 08:33:46'),
(134, 'admin', 'admin', 'admin', 'Deleted batch513766in masterlist', '2022-05-12 12:46:32'),
(135, 'admin', 'admin', 'admin', 'Added new batch in master list', '2022-05-12 12:48:19'),
(136, 'chris', 'admin', 'admin', 'Deleted batch513766in masterlist', '2022-05-13 08:16:38'),
(137, 'chris', 'admin', 'admin', 'Deleted batch236680in masterlist', '2022-05-13 08:17:00'),
(138, 'chris', 'admin', 'admin', 'Deleted batch236680in masterlist', '2022-05-13 08:17:56'),
(139, 'chris', 'admin', 'admin', 'Deleted batch327672in faulty ', '2022-05-13 08:20:18'),
(140, 'chris', 'admin', 'admin', 'Deleted batch236680in faulty ', '2022-05-13 08:51:45'),
(141, 'chris', 'admin', 'admin', 'Deleted batch526088in faulty ', '2022-05-13 08:51:47'),
(142, 'chris', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-13 09:30:06'),
(143, 'chris', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-13 12:09:05'),
(144, 'chris', 'admin', 'admin', 'Added new batch in Faulty in', '2022-05-13 12:34:59'),
(145, 'james ', 'admin', 'admin', 'Added new batch in master list', '2022-05-13 13:03:25'),
(146, 'jane', 'admin', 'admin', 'Added new batch in master list', '2022-05-14 10:54:47'),
(147, 'jane', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-16 06:34:18'),
(148, 'admin', 'admin', 'admin', 'Added new batch in master list', '2022-05-16 10:53:08'),
(149, 'admin', 'admin', 'admin', 'Deleted batch58239in faulty ', '2022-05-18 11:11:37'),
(150, 'admin', 'admin', 'admin', 'Deleted batch236680in faulty ', '2022-05-18 11:12:06'),
(151, 'admin', 'admin', 'admin', 'Deleted batch58239in faulty ', '2022-05-18 11:12:43'),
(152, 'admin', 'admin', 'admin', 'Deleted batch36299941in masterlist', '2022-05-18 11:12:58'),
(153, 'admin', 'admin', 'admin', 'Deleted batch146533in masterlist', '2022-05-18 11:13:02'),
(154, 'admin', 'admin', 'admin', 'Deleted batch96449045in masterlist', '2022-05-18 11:13:05'),
(155, 'admin', 'admin', 'admin', 'Deleted batch36299941in masterlist', '2022-05-18 11:15:33'),
(156, 'admin', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-18 11:17:06'),
(157, 'leakey', 'nyamwea', 'nyamwea', 'Added new batch in master list', '2022-05-18 11:26:29'),
(158, 'henry', 'henry', 'technician', 'Added new batch in Faulty in', '2022-05-18 12:09:41'),
(159, 'henry', 'henry', 'technician', 'Added new batch in Faulty in', '2022-05-18 12:09:59'),
(160, 'admin', 'admin', 'admin', 'Added new batch in warranty in', '2022-05-19 06:05:15'),
(161, 'admin', 'admin', 'admin', 'Deleted batch157174in masterlist', '2022-05-19 06:16:26'),
(162, 'admin', 'admin', 'admin', 'Deleted batch39747492in masterlist', '2022-05-19 06:17:25'),
(163, 'admin', 'admin', 'admin', 'Added new batch in master list', '2022-05-19 06:17:43'),
(164, 'admin', 'admin', 'admin', 'Deleted batch747607in masterlist', '2022-05-19 06:17:50'),
(165, 'admin', 'admin', 'admin', 'Added new batch in master list', '2022-05-19 06:18:37'),
(166, 'admin', 'admin', 'admin', 'Deleted batch215780in masterlist', '2022-05-19 06:18:47'),
(167, 'admin', 'admin', 'admin', 'Added new batch in master list', '2022-05-19 06:58:44'),
(168, 'admin', 'admin', 'admin', 'Deleted batch786594in masterlist', '2022-05-19 06:58:55'),
(169, 'admin', 'admin', 'admin', 'Deleted a batch in warranty in', '2022-05-19 07:22:38'),
(170, 'leakey', 'nyamwea', 'nyamwea', 'Added new batch in master list', '2022-05-19 08:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `spares`
--

CREATE TABLE `spares` (
  `id` int(20) NOT NULL,
  `mouse` varchar(20) NOT NULL,
  `keyboard` varchar(20) NOT NULL,
  `battery` varchar(20) NOT NULL,
  `hdd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `cpu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sparesused`
--

CREATE TABLE `sparesused` (
  `id` int(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `keboard` varchar(20) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `mouse` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `speed`
--

CREATE TABLE `speed` (
  `id` int(20) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speed`
--

INSERT INTO `speed` (`id`, `speed`, `date`) VALUES
(33, '4ghz', '2022-04-21 07:37:09'),
(34, '1.1', '2022-04-21 07:37:15'),
(35, '2.4gh', '2022-05-18 12:45:53'),
(36, '8888888888888', '2022-05-18 12:46:02'),
(37, '', '2022-05-18 12:46:05'),
(38, '', '2022-05-18 12:46:09'),
(39, '', '2022-05-18 12:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sublist`
--

CREATE TABLE `sublist` (
  `id` int(20) NOT NULL,
  `list` varchar(20) NOT NULL,
  `part` varchar(20) NOT NULL,
  `serialnumber` varchar(20) NOT NULL,
  `modelid` varchar(20) NOT NULL,
  `cpu` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `customer` varchar(20) NOT NULL,
  `assetId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tcredit`
--

CREATE TABLE `tcredit` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tcustomer`
--

CREATE TABLE `tcustomer` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref` int(12) NOT NULL,
  `document` int(12) NOT NULL,
  `assetid` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `ccredit` varchar(20) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tcustomer`
--

INSERT INTO `tcustomer` (`id`, `fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `random`, `date`, `ref`, `document`, `assetid`, `username`, `id_no`, `ccredit`, `credit`, `user_name`) VALUES
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 0, '2022-05-04 12:33:21', 0, 0, 0, '', '', '', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 83551, '2022-05-16 06:48:30', 0, 0, 0, 'Jackss', '56841584', 'AA000', 'Ki123', ''),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 59442, '2022-05-17 09:09:38', 0, 0, 0, 'feon', '99899889', 'C000', '', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 18864, '2022-05-17 09:17:01', 0, 0, 0, 'Jackss', '56841584', 'C002', 'Ki123', ''),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 73674, '2022-05-17 09:11:05', 0, 0, 0, 'feon', '99899889', 'C001', 'Ki123', ''),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 61518, '2022-05-17 09:18:24', 0, 0, 0, 'Jackss', '56841584', 'C003', 'Ki123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tcustomer4`
--

CREATE TABLE `tcustomer4` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref` int(12) NOT NULL,
  `document` int(12) NOT NULL,
  `assetid` int(12) NOT NULL,
  `id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `credit` varchar(20) NOT NULL,
  `ccredit` varchar(20) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tcustomerfo`
--

CREATE TABLE `tcustomerfo` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `faulty` varchar(20) NOT NULL,
  `faultyn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tcustomerfo`
--

INSERT INTO `tcustomerfo` (`fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `random`, `id`, `username`, `id_no`, `faulty`, `faultyn`) VALUES
('james ', 'bengi', 520768623, 'Kisumu', 'test@test.com', '2022-04-22 15:27:07', 73012, 0, '', '', '', ''),
('Mike', 'willies', 798969800, 'Nairobi', 'mikewillies@gmail.co', '2022-04-11 10:19:40', 73012, 0, '', '', '', ''),
('Mike', 'willies', 798969800, 'Nairobi', 'mikewillies@gmail.co', '2022-04-11 10:19:40', 73012, 1, '', '', '', ''),
('Mike', 'willies', 798969800, 'Nairobi', 'mikewillies@gmail.co', '2022-04-11 10:19:40', 73012, 1, '', '', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 73012, 4, '', '', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:25:50', 73012, 5, '', '', '', ''),
('james ', 'bengi', 520768623, 'Kisumu', 'test@test.com', '2022-04-22 15:27:07', 73012, 6, '', '', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 11645, 12, 'kirubi', '11684578', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 22573, 4, 'Jackss', '56841584', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 64314, 6, 'Jacks', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 23317, 6, 'Jacks', '11684578', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 67027, 12, 'kirubi', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 57940, 6, 'Jacks', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 18115, 6, 'Jacks', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 32228, 6, 'Jacks', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 29239, 6, 'Jacks', '11684578', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 74701, 4, 'Jackss', '56841584', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 50435, 6, 'Jacks', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 73076, 6, 'Jacks', '11684578', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 21687, 4, 'Jackss', '56841584', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 88853, 6, 'Jacks', '11684578', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 75168, 12, 'kirubi', '11684578', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 37253, 4, 'Jackss', '56841584', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 54057, 4, 'Jackss', '56841584', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 58326, 6, 'Jacks', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 79836, 6, 'Jacks', '11684578', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 23142, 4, 'Jackss', '56841584', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 30577, 4, 'Jackss', '56841584', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 18740, 4, 'Jackss', '56841584', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 68396, 4, 'Jackss', '56841584', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 25791, 4, 'Jackss', '56841584', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 32133, 4, 'Jackss', '56841584', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 82809, 12, 'kirubi', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 17255, 6, 'Jacks', '11684578', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 71646, 4, 'Jackss', '56841584', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 90534, 4, 'Jackss', '56841584', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 42820, 6, 'Jacks', '11684578', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 47177, 12, 'kirubi', '11684578', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 19968, 12, 'kirubi', '11684578', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 14759, 12, 'kirubi', '11684578', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 16427, 12, 'kirubi', '11684578', '', ''),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 54756, 4, 'Jackss', '56841584', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 99403, 6, 'Jacks', '11684578', '', ''),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 94211, 6, 'Jacks', '11684578', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 87898, 12, 'kirubi', '11684578', '', ''),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 58767, 12, 'kirubi', '11684578', 'A123', 'AA001'),
('james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 89376, 6, 'Jacks', '11684578', 'A123', 'AA002'),
('chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 56718, 12, 'kirubi', '11684578', 'A123', 'AA003'),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 26765, 4, 'Jackss', '56841584', 'A123', 'C000'),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 53808, 4, 'Jackss', '56841584', 'A123', 'C002'),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 28196, 4, 'Jackss', '56841584', 'eyye', 'C001'),
('jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 59448, 13, 'feon', '99899889', 'A123', 'C003'),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 56576, 4, 'Jackss', '56841584', 'A123', 'F000'),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 57858, 4, 'Jackss', '56841584', 'A123', 'F001'),
('Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 71114, 4, 'Jackss', '56841584', 'eyye', 'F002');

-- --------------------------------------------------------

--
-- Table structure for table `tdebit`
--

CREATE TABLE `tdebit` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technican`
--

CREATE TABLE `technican` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempinsert`
--

CREATE TABLE `tempinsert` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempinvoice`
--

CREATE TABLE `tempinvoice` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `templist`
--

CREATE TABLE `templist` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tfaulty`
--

CREATE TABLE `tfaulty` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tfaultyout`
--

CREATE TABLE `tfaultyout` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tfaultyout`
--

INSERT INTO `tfaultyout` (`id`, `conditions`, `type`, `assetid`, `gen`, `brand`, `serialno`, `part`, `modelid`, `model`, `cpu`, `speed`, `ram`, `hdd`, `odd`, `screen`, `comment`, `price`, `daterecieved`, `datedelivered`, `customer`, `vendor`, `list`, `status`, `qty`, `total`, `barcodes`, `terms`, `del`, `random`, `time`, `tbl`, `tqty`) VALUES
(4789, 'Refurb', 'printer', '67605559', '6 th', 'hp', 'SP046401', 'screen', '2435425', 'HP Desktop Hightower', 'intel core i5', '4ghz', '4 gb', '256', 'yes', '14', 'stored', '30', '2022-05-18 11:19:10', '2022/05/18', 'Jackss', '', '', 'fixed', 1, 0, '', '', 157174, 33845, '14:19:10', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tinvoicecreate`
--

CREATE TABLE `tinvoicecreate` (
  `id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ref` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL DEFAULT 1,
  `customerjob` varchar(20) NOT NULL,
  `unitprice` int(255) NOT NULL,
  `total` int(30) NOT NULL,
  `phone` int(12) NOT NULL,
  `random` int(12) NOT NULL,
  `assetid` int(12) NOT NULL,
  `del` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tinvoicecreate1`
--

CREATE TABLE `tinvoicecreate1` (
  `id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ref` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL DEFAULT 1,
  `customerjob` varchar(20) NOT NULL,
  `unitprice` int(255) NOT NULL,
  `total` int(30) NOT NULL,
  `phone` int(12) NOT NULL,
  `random` int(12) NOT NULL,
  `assetid` int(12) NOT NULL,
  `del` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinvoicecreate1`
--

INSERT INTO `tinvoicecreate1` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `assetid`, `del`, `time`) VALUES
(1483, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:24:00', '', '', 2, '', 567, 1134, 0, 17731, 39835775, 45644255, '16:36:55'),
(1485, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 14:45:40', '', '', 2, '', 456, 912, 0, 72194, 97013369, 17151894, '16:38:00'),
(1536, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 66052537, 39075347, '17:23:47'),
(1537, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 68214497, 39075347, '17:23:47'),
(1538, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 62016268, 39075347, '17:23:47'),
(1539, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 79146744, 39075347, '17:23:47'),
(1540, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 53235335, 39075347, '17:23:47'),
(1541, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 53171131, 39075347, '17:23:47'),
(1542, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 36964582, 39075347, '17:23:47'),
(1543, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 60423344, 39075347, '17:23:47'),
(1544, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 91841257, 39075347, '17:23:47'),
(1545, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 66689292, 39075347, '17:23:47'),
(1546, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 60928201, 39075347, '17:23:47'),
(1547, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 25912193, 39075347, '17:23:47'),
(1548, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 78055830, 39075347, '17:23:47'),
(1549, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 42685057, 39075347, '17:23:47'),
(1550, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 12191657, 39075347, '17:23:47'),
(1551, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 29407590, 39075347, '17:23:47'),
(1552, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 13680290, 39075347, '17:23:47'),
(1553, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 18620579, 39075347, '17:23:47'),
(1554, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 20214851, 39075347, '17:23:47'),
(1555, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 41873950, 39075347, '17:23:47'),
(1556, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 56106477, 39075347, '17:23:47'),
(1557, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 27307841, 39075347, '17:23:47'),
(1558, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 24529239, 39075347, '17:23:47'),
(1559, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 54869086, 39075347, '17:23:47'),
(1560, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 83791986, 39075347, '17:23:47'),
(1561, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 54976765, 39075347, '17:23:47'),
(1562, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 60206495, 39075347, '17:23:47'),
(1563, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 22205800, 39075347, '17:23:47'),
(1564, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 17116827, 39075347, '17:23:47'),
(1565, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 75433148, 39075347, '17:23:47'),
(1566, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 66379816, 39075347, '17:23:47'),
(1567, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 39669254, 39075347, '17:23:47'),
(1568, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 24020248, 39075347, '17:23:47'),
(1569, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 53337590, 39075347, '17:23:47'),
(1570, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 79356121, 39075347, '17:23:47'),
(1571, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 28621500, 39075347, '17:23:47'),
(1572, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 95183230, 39075347, '17:23:47'),
(1573, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 35275732, 39075347, '17:23:47'),
(1574, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 34913723, 39075347, '17:23:47'),
(1575, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 33068916, 39075347, '17:23:47'),
(1576, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 81932919, 39075347, '17:23:47'),
(1577, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 34595361, 39075347, '17:23:47'),
(1578, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 51019723, 39075347, '17:23:47'),
(1579, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 93908945, 39075347, '17:23:47'),
(1580, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 88874517, 39075347, '17:23:47'),
(1581, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 78115961, 39075347, '17:23:47'),
(1582, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 15118476, 39075347, '17:23:47'),
(1583, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 67225295, 39075347, '17:23:47'),
(1584, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 33812453, 39075347, '17:23:47'),
(1585, 'desktop, silver', '', '2022-05-13 14:24:00', '', '', 50, '', 345, 17250, 0, 17731, 64794299, 39075347, '17:23:47'),
(1586, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 25904891, 58601150, '17:45:08'),
(1587, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 92036461, 58601150, '17:45:08'),
(1588, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 76584781, 58601150, '17:45:08'),
(1589, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 14070878, 58601150, '17:45:08'),
(1590, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 28075334, 58601150, '17:45:08'),
(1591, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 55838103, 58601150, '17:45:08'),
(1592, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 64096734, 58601150, '17:45:08'),
(1593, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 88024995, 58601150, '17:45:08'),
(1594, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 65331485, 58601150, '17:45:08'),
(1595, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 42883701, 58601150, '17:45:08'),
(1596, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 60074467, 58601150, '17:45:08'),
(1597, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 74415801, 58601150, '17:45:08'),
(1598, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 99113207, 58601150, '17:45:08'),
(1599, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 98050366, 58601150, '17:45:08'),
(1600, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 61184990, 58601150, '17:45:08'),
(1601, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 42810590, 58601150, '17:45:08'),
(1602, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 93509517, 58601150, '17:45:08'),
(1603, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 10698760, 58601150, '17:45:08'),
(1604, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 57154357, 58601150, '17:45:08'),
(1605, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 43002008, 58601150, '17:45:08'),
(1606, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 49203988, 58601150, '17:45:08'),
(1607, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 41442959, 58601150, '17:45:08'),
(1608, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 63836264, 58601150, '17:45:08'),
(1609, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 42987461, 58601150, '17:45:08'),
(1610, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 79070447, 58601150, '17:45:08'),
(1611, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 83036196, 58601150, '17:45:08'),
(1612, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 14830262, 58601150, '17:45:08'),
(1613, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 43693539, 58601150, '17:45:08'),
(1614, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 31930045, 58601150, '17:45:08'),
(1615, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 13076549, 58601150, '17:45:08'),
(1616, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 78842389, 58601150, '17:45:08'),
(1617, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 64326924, 58601150, '17:45:08'),
(1618, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 20997275, 58601150, '17:45:08'),
(1619, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 74283864, 58601150, '17:45:08'),
(1620, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 75453344, 58601150, '17:45:08'),
(1621, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 61771333, 58601150, '17:45:08'),
(1622, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 89219514, 58601150, '17:45:08'),
(1623, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 70696857, 58601150, '17:45:08'),
(1624, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 50003407, 58601150, '17:45:08'),
(1625, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 44026841, 58601150, '17:45:08'),
(1626, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 41892072, 58601150, '17:45:08'),
(1627, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 24100715, 58601150, '17:45:08'),
(1628, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 90400179, 58601150, '17:45:08'),
(1629, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 24088093, 58601150, '17:45:08'),
(1630, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 64848504, 58601150, '17:45:08'),
(1631, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 60428523, 58601150, '17:45:08'),
(1632, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 84481550, 58601150, '17:45:08'),
(1633, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 63406135, 58601150, '17:45:08'),
(1634, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 56585919, 58601150, '17:45:08'),
(1635, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:45:40', '', '', 50, '', 567, 28350, 0, 72194, 74892771, 58601150, '17:45:08'),
(1636, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 33271658, 20163804, '17:51:40'),
(1637, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 24076729, 20163804, '17:51:40'),
(1638, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 42377741, 20163804, '17:51:40'),
(1639, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 97179420, 20163804, '17:51:40'),
(1640, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 39304587, 20163804, '17:51:40'),
(1641, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 75673451, 20163804, '17:51:40'),
(1642, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 17776834, 20163804, '17:51:40'),
(1643, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 88726642, 20163804, '17:51:40'),
(1644, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 78172763, 20163804, '17:51:40'),
(1645, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 86166241, 20163804, '17:51:40'),
(1646, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 15267428, 20163804, '17:51:40'),
(1647, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 18918509, 20163804, '17:51:40'),
(1648, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 62896372, 20163804, '17:51:40'),
(1649, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 31154280, 20163804, '17:51:40'),
(1650, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 63057468, 20163804, '17:51:40'),
(1651, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 97133508, 20163804, '17:51:40'),
(1652, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 61296296, 20163804, '17:51:40'),
(1653, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 93948972, 20163804, '17:51:40'),
(1654, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 27237973, 20163804, '17:51:40'),
(1655, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 47498191, 20163804, '17:51:40'),
(1656, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 27417037, 20163804, '17:51:40'),
(1657, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 71437183, 20163804, '17:51:40'),
(1658, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 52266358, 20163804, '17:51:40'),
(1659, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 14169193, 20163804, '17:51:40'),
(1660, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 57391718, 20163804, '17:51:40'),
(1661, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 72905796, 20163804, '17:51:40'),
(1662, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 44777283, 20163804, '17:51:40'),
(1663, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 15318741, 20163804, '17:51:40'),
(1664, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 67941407, 20163804, '17:51:40'),
(1665, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 25783024, 20163804, '17:51:40'),
(1666, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 18063820, 20163804, '17:51:40'),
(1667, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 96929701, 20163804, '17:51:40'),
(1668, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 55303408, 20163804, '17:51:40'),
(1669, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 39849170, 20163804, '17:51:40'),
(1670, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 78487714, 20163804, '17:51:40'),
(1671, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 17637854, 20163804, '17:51:40'),
(1672, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 84877188, 20163804, '17:51:40'),
(1673, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 15177348, 20163804, '17:51:40'),
(1674, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 60720345, 20163804, '17:51:40'),
(1675, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 19241423, 20163804, '17:51:40'),
(1676, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 28752508, 20163804, '17:51:40'),
(1677, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 22484754, 20163804, '17:51:40'),
(1678, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 34071154, 20163804, '17:51:40'),
(1679, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 84576188, 20163804, '17:51:40'),
(1680, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 84626219, 20163804, '17:51:40'),
(1681, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 94989009, 20163804, '17:51:40'),
(1682, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 11243375, 20163804, '17:51:40'),
(1683, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 49976043, 20163804, '17:51:40'),
(1684, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 96628453, 20163804, '17:51:40'),
(1685, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:51:42', '', '', 50, '', 67, 3350, 0, 54765, 83030760, 20163804, '17:51:40'),
(1686, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 92324704, 83185022, '17:52:24'),
(1687, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 89850966, 83185022, '17:52:24'),
(1688, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 87056039, 83185022, '17:52:24'),
(1689, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 36214822, 83185022, '17:52:24'),
(1690, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 32686621, 83185022, '17:52:24'),
(1691, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 17445610, 83185022, '17:52:24'),
(1692, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 51807786, 83185022, '17:52:24'),
(1693, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 36589864, 83185022, '17:52:24'),
(1694, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 77498117, 83185022, '17:52:24'),
(1695, 'desktop, silver', '', '2022-05-13 14:52:26', '', '', 10, '', 67, 670, 0, 12117, 83294149, 83185022, '17:52:24'),
(1696, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 44555735, 74558465, '17:53:31'),
(1697, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 66638244, 74558465, '17:53:31'),
(1698, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 50900310, 74558465, '17:53:31'),
(1699, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 78084090, 74558465, '17:53:31'),
(1700, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 46340165, 74558465, '17:53:31'),
(1701, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 11144426, 74558465, '17:53:31'),
(1702, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 47797703, 74558465, '17:53:31'),
(1703, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 93509078, 74558465, '17:53:31'),
(1704, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 69639202, 74558465, '17:53:31'),
(1705, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 97075755, 74558465, '17:53:31'),
(1706, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 97481743, 74558465, '17:53:31'),
(1707, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 91724871, 74558465, '17:53:31'),
(1708, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 54943001, 74558465, '17:53:31'),
(1709, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 46254468, 74558465, '17:53:31'),
(1710, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 17160285, 74558465, '17:53:31'),
(1711, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 30979166, 74558465, '17:53:31'),
(1712, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 41604672, 74558465, '17:53:31'),
(1713, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 34555439, 74558465, '17:53:31'),
(1714, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 66189163, 74558465, '17:53:31'),
(1715, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 90667362, 74558465, '17:53:31'),
(1716, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 30559967, 74558465, '17:53:31'),
(1717, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 12725147, 74558465, '17:53:31'),
(1718, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 43572809, 74558465, '17:53:31'),
(1719, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 21594721, 74558465, '17:53:31'),
(1720, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 67543941, 74558465, '17:53:31'),
(1721, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 88514716, 74558465, '17:53:31'),
(1722, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 28059651, 74558465, '17:53:31'),
(1723, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 53618588, 74558465, '17:53:31'),
(1724, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 67344692, 74558465, '17:53:31'),
(1725, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 96063461, 74558465, '17:53:31'),
(1726, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 51512779, 74558465, '17:53:31'),
(1727, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 68892207, 74558465, '17:53:31'),
(1728, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 94558435, 74558465, '17:53:31'),
(1729, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 71959062, 74558465, '17:53:31'),
(1730, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 59980353, 74558465, '17:53:31'),
(1731, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 29123024, 74558465, '17:53:31'),
(1732, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 55334423, 74558465, '17:53:31'),
(1733, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 80488654, 74558465, '17:53:31'),
(1734, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 80393230, 74558465, '17:53:31'),
(1735, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 53764860, 74558465, '17:53:31'),
(1736, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 36617261, 74558465, '17:53:31'),
(1737, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 88890665, 74558465, '17:53:31'),
(1738, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 54962433, 74558465, '17:53:31'),
(1739, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 62825184, 74558465, '17:53:31'),
(1740, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 89478218, 74558465, '17:53:31'),
(1741, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 81120129, 74558465, '17:53:31'),
(1742, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 17930461, 74558465, '17:53:31'),
(1743, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 60748260, 74558465, '17:53:31'),
(1744, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 94951007, 74558465, '17:53:31'),
(1745, 'laptop, grey', '', '2022-05-13 14:53:32', '', '', 50, '', 567, 28350, 0, 51863, 10031436, 74558465, '17:53:31'),
(1746, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 86840231, 10311757, '17:54:49'),
(1747, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 33584410, 10311757, '17:54:49'),
(1748, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 20562267, 10311757, '17:54:49'),
(1749, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 52448474, 10311757, '17:54:49'),
(1750, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 43453760, 10311757, '17:54:49'),
(1751, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 76037879, 10311757, '17:54:49'),
(1752, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 18506469, 10311757, '17:54:49'),
(1753, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 14788804, 10311757, '17:54:49'),
(1754, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 79013800, 10311757, '17:54:49'),
(1755, 'desktop, silver', '', '2022-05-13 14:54:50', '', '', 10, '', 456, 4560, 0, 13055, 12419994, 10311757, '17:54:49'),
(1756, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 24601973, 35888522, '17:56:33'),
(1757, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 13170970, 35888522, '17:56:33'),
(1758, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 46070005, 35888522, '17:56:33'),
(1759, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 27858866, 35888522, '17:56:33'),
(1760, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 74983823, 35888522, '17:56:33'),
(1761, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 70538724, 35888522, '17:56:33'),
(1762, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 72087703, 35888522, '17:56:33'),
(1763, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 67817995, 35888522, '17:56:33'),
(1764, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 25837361, 35888522, '17:56:33'),
(1765, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 75802659, 35888522, '17:56:33'),
(1766, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 16922424, 35888522, '17:56:33'),
(1767, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 92990878, 35888522, '17:56:33'),
(1768, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 99583305, 35888522, '17:56:33'),
(1769, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 33487755, 35888522, '17:56:33'),
(1770, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 42291027, 35888522, '17:56:33'),
(1771, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 70340795, 35888522, '17:56:33'),
(1772, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 25587665, 35888522, '17:56:33'),
(1773, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 46004293, 35888522, '17:56:33'),
(1774, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 93650437, 35888522, '17:56:33'),
(1775, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 90499048, 35888522, '17:56:33'),
(1776, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 33291709, 35888522, '17:56:33'),
(1777, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 25832969, 35888522, '17:56:33'),
(1778, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 62839492, 35888522, '17:56:33'),
(1779, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 78793278, 35888522, '17:56:33'),
(1780, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 55207187, 35888522, '17:56:33'),
(1781, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 50087919, 35888522, '17:56:33'),
(1782, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 39669017, 35888522, '17:56:33'),
(1783, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 88020590, 35888522, '17:56:33'),
(1784, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 47392842, 35888522, '17:56:33'),
(1785, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 55243979, 35888522, '17:56:33'),
(1786, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 65428410, 35888522, '17:56:33'),
(1787, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 14521746, 35888522, '17:56:33'),
(1788, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 80228179, 35888522, '17:56:33'),
(1789, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 92477198, 35888522, '17:56:33'),
(1790, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 55253918, 35888522, '17:56:33'),
(1791, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 53032904, 35888522, '17:56:33'),
(1792, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 22930492, 35888522, '17:56:33'),
(1793, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 77149836, 35888522, '17:56:33'),
(1794, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 84846908, 35888522, '17:56:33'),
(1795, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 22238268, 35888522, '17:56:33'),
(1796, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 42993637, 35888522, '17:56:33'),
(1797, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 43793677, 35888522, '17:56:33'),
(1798, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 60748584, 35888522, '17:56:33'),
(1799, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 58489870, 35888522, '17:56:33'),
(1800, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 23641556, 35888522, '17:56:33'),
(1801, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 87945281, 35888522, '17:56:33'),
(1802, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 86785074, 35888522, '17:56:33'),
(1803, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 37398907, 35888522, '17:56:33'),
(1804, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 30097049, 35888522, '17:56:33'),
(1805, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 14:56:35', '', '', 50, '', 567, 28350, 0, 22417, 10910868, 35888522, '17:56:33'),
(1806, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 84589119, 36542937, '17:59:16'),
(1807, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 91502699, 36542937, '17:59:16'),
(1808, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 36409274, 36542937, '17:59:16'),
(1809, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 53206628, 36542937, '17:59:16'),
(1810, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 48594946, 36542937, '17:59:16'),
(1811, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 74558861, 36542937, '17:59:16'),
(1812, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 23412278, 36542937, '17:59:16'),
(1813, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 47964195, 36542937, '17:59:16'),
(1814, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 14557746, 36542937, '17:59:16'),
(1815, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 81859493, 36542937, '17:59:16'),
(1816, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 12543625, 36542937, '17:59:16'),
(1817, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 19315377, 36542937, '17:59:16'),
(1818, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 96342354, 36542937, '17:59:16'),
(1819, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 27239858, 36542937, '17:59:16'),
(1820, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 57543165, 36542937, '17:59:16'),
(1821, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 23471083, 36542937, '17:59:16'),
(1822, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 60179864, 36542937, '17:59:16'),
(1823, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 88968038, 36542937, '17:59:16'),
(1824, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 42468971, 36542937, '17:59:16'),
(1825, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 61979370, 36542937, '17:59:16'),
(1826, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 78902313, 36542937, '17:59:16'),
(1827, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 13846984, 36542937, '17:59:16'),
(1828, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 36278942, 36542937, '17:59:16'),
(1829, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 76894753, 36542937, '17:59:16'),
(1830, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 86659973, 36542937, '17:59:16'),
(1831, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 37632773, 36542937, '17:59:16'),
(1832, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 26760575, 36542937, '17:59:16'),
(1833, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 35459118, 36542937, '17:59:16'),
(1834, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 50909836, 36542937, '17:59:16'),
(1835, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 72720453, 36542937, '17:59:16'),
(1836, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 99167664, 36542937, '17:59:16'),
(1837, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 60471585, 36542937, '17:59:16'),
(1838, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 25414191, 36542937, '17:59:16'),
(1839, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 60387523, 36542937, '17:59:16'),
(1840, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 95162097, 36542937, '17:59:16'),
(1841, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 11475821, 36542937, '17:59:16'),
(1842, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 47556663, 36542937, '17:59:16'),
(1843, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 42729748, 36542937, '17:59:16'),
(1844, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 10912827, 36542937, '17:59:16'),
(1845, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 25845470, 36542937, '17:59:16'),
(1846, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 58750800, 36542937, '17:59:16'),
(1847, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 41997351, 36542937, '17:59:16'),
(1848, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 75981657, 36542937, '17:59:16'),
(1849, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 74930026, 36542937, '17:59:16'),
(1850, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 86477608, 36542937, '17:59:16'),
(1851, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 60805702, 36542937, '17:59:16'),
(1852, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 82992263, 36542937, '17:59:16'),
(1853, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 26029063, 36542937, '17:59:16'),
(1854, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 48467056, 36542937, '17:59:16'),
(1855, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 14:59:17', '', '', 50, '', 67, 3350, 0, 20716, 83399668, 36542937, '17:59:16'),
(1856, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 75225738, 79357569, '18:00:35'),
(1857, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 44943157, 79357569, '18:00:35'),
(1858, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 44706335, 79357569, '18:00:35'),
(1859, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 11825087, 79357569, '18:00:35'),
(1860, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 33738501, 79357569, '18:00:35'),
(1861, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 83521959, 79357569, '18:00:35'),
(1862, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 37138359, 79357569, '18:00:35'),
(1863, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 19400648, 79357569, '18:00:35'),
(1864, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 79509723, 79357569, '18:00:35'),
(1865, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 56081751, 79357569, '18:00:35'),
(1866, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 75202794, 79357569, '18:00:35'),
(1867, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 12735368, 79357569, '18:00:35'),
(1868, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 86160003, 79357569, '18:00:35'),
(1869, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 37994376, 79357569, '18:00:35'),
(1870, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 34039837, 79357569, '18:00:35'),
(1871, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 63479038, 79357569, '18:00:35'),
(1872, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 70834731, 79357569, '18:00:35'),
(1873, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 86262693, 79357569, '18:00:35'),
(1874, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 36162657, 79357569, '18:00:35'),
(1875, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 41462673, 79357569, '18:00:35'),
(1876, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 67785750, 79357569, '18:00:35'),
(1877, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 28153905, 79357569, '18:00:35'),
(1878, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 35794181, 79357569, '18:00:35'),
(1879, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 42165427, 79357569, '18:00:35'),
(1880, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 81171934, 79357569, '18:00:35'),
(1881, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 73107570, 79357569, '18:00:35'),
(1882, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 80705499, 79357569, '18:00:35'),
(1883, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 15163024, 79357569, '18:00:35'),
(1884, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 46320895, 79357569, '18:00:35'),
(1885, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 57860924, 79357569, '18:00:35'),
(1886, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 67593315, 79357569, '18:00:35'),
(1887, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 44012986, 79357569, '18:00:35'),
(1888, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 68623299, 79357569, '18:00:35'),
(1889, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 78976302, 79357569, '18:00:35'),
(1890, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 39043327, 79357569, '18:00:35'),
(1891, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 92830831, 79357569, '18:00:35'),
(1892, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 25321026, 79357569, '18:00:35'),
(1893, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 74634237, 79357569, '18:00:35'),
(1894, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 59089422, 79357569, '18:00:35'),
(1895, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 91868765, 79357569, '18:00:35'),
(1896, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 88695052, 79357569, '18:00:35'),
(1897, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 84132610, 79357569, '18:00:35'),
(1898, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 23443938, 79357569, '18:00:35'),
(1899, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 80079964, 79357569, '18:00:35'),
(1900, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 78738288, 79357569, '18:00:35'),
(1901, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 93370298, 79357569, '18:00:35'),
(1902, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 57122345, 79357569, '18:00:35'),
(1903, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 73082074, 79357569, '18:00:35'),
(1904, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 74926128, 79357569, '18:00:35'),
(1905, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:00:36', '', '', 50, '', 567, 28350, 0, 67421, 86437409, 79357569, '18:00:35'),
(11906, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 19905377, 39526369, '18:02:39'),
(11907, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 34312221, 39526369, '18:02:39'),
(11908, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 18345267, 39526369, '18:02:39'),
(11909, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 84797006, 39526369, '18:02:39'),
(11910, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 52490882, 39526369, '18:02:39'),
(11911, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 21465823, 39526369, '18:02:39'),
(11912, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 26858906, 39526369, '18:02:39'),
(11913, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 53221658, 39526369, '18:02:39'),
(11914, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 15247029, 39526369, '18:02:39'),
(11915, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 87661102, 39526369, '18:02:39'),
(11916, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 21936088, 39526369, '18:02:39'),
(11917, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 15123349, 39526369, '18:02:39'),
(11918, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 16163123, 39526369, '18:02:39'),
(11919, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 17083030, 39526369, '18:02:39'),
(11920, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 46156800, 39526369, '18:02:39'),
(11921, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 19694522, 39526369, '18:02:39'),
(11922, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 65951031, 39526369, '18:02:39');
INSERT INTO `tinvoicecreate1` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `assetid`, `del`, `time`) VALUES
(11923, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 25178931, 39526369, '18:02:39'),
(11924, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 87159817, 39526369, '18:02:39'),
(11925, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 48865272, 39526369, '18:02:39'),
(11926, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 98755175, 39526369, '18:02:39'),
(11927, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 85784915, 39526369, '18:02:39'),
(11928, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 38941036, 39526369, '18:02:39'),
(11929, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 31117622, 39526369, '18:02:39'),
(11930, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 51001641, 39526369, '18:02:39'),
(11931, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 29289217, 39526369, '18:02:39'),
(11932, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 42238454, 39526369, '18:02:39'),
(11933, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 55399180, 39526369, '18:02:39'),
(11934, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 77438366, 39526369, '18:02:39'),
(11935, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 75928248, 39526369, '18:02:39'),
(11936, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 83099293, 39526369, '18:02:39'),
(11937, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 24798749, 39526369, '18:02:39'),
(11938, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 90828087, 39526369, '18:02:39'),
(11939, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 94199143, 39526369, '18:02:39'),
(11940, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 58547839, 39526369, '18:02:39'),
(11941, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 43917258, 39526369, '18:02:39'),
(11942, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 57859994, 39526369, '18:02:39'),
(11943, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 74739431, 39526369, '18:02:39'),
(11944, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 13751326, 39526369, '18:02:39'),
(11945, 'desktop, silver', '', '2022-05-13 15:02:41', '', '', 40, '', 456, 18240, 0, 80722, 29174437, 39526369, '18:02:39'),
(11946, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 58186698, 47574872, '18:03:33'),
(11947, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 10195112, 47574872, '18:03:33'),
(11948, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 90520036, 47574872, '18:03:33'),
(11949, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 87460006, 47574872, '18:03:33'),
(11950, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 64705809, 47574872, '18:03:33'),
(11951, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 59202435, 47574872, '18:03:33'),
(11952, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 30254143, 47574872, '18:03:33'),
(11953, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 10846517, 47574872, '18:03:33'),
(11954, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 37160058, 47574872, '18:03:33'),
(11955, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 30790508, 47574872, '18:03:33'),
(11956, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 56828377, 47574872, '18:03:33'),
(11957, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 84241217, 47574872, '18:03:33'),
(11958, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 13062446, 47574872, '18:03:33'),
(11959, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 13405478, 47574872, '18:03:33'),
(11960, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 31364908, 47574872, '18:03:33'),
(11961, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 64797496, 47574872, '18:03:33'),
(11962, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 75942400, 47574872, '18:03:33'),
(11963, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 50711582, 47574872, '18:03:33'),
(11964, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 23715955, 47574872, '18:03:33'),
(11965, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 48072948, 47574872, '18:03:33'),
(11966, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 81389004, 47574872, '18:03:33'),
(11967, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 70419385, 47574872, '18:03:33'),
(11968, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 99814915, 47574872, '18:03:33'),
(11969, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 48265202, 47574872, '18:03:33'),
(11970, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 84064290, 47574872, '18:03:33'),
(11971, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 45245122, 47574872, '18:03:33'),
(11972, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 24136121, 47574872, '18:03:33'),
(11973, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 36310547, 47574872, '18:03:33'),
(11974, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 82075368, 47574872, '18:03:33'),
(11975, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 40524401, 47574872, '18:03:33'),
(11976, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 31337961, 47574872, '18:03:33'),
(11977, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 64317320, 47574872, '18:03:33'),
(11978, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 86680931, 47574872, '18:03:33'),
(11979, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 21721890, 47574872, '18:03:33'),
(11980, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 66020581, 47574872, '18:03:33'),
(11981, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 76244563, 47574872, '18:03:33'),
(11982, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 97665702, 47574872, '18:03:33'),
(11983, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 25520104, 47574872, '18:03:33'),
(11984, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 26482353, 47574872, '18:03:33'),
(11985, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 21692614, 47574872, '18:03:33'),
(11986, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 45608714, 47574872, '18:03:33'),
(11987, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 25562118, 47574872, '18:03:33'),
(11988, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 54661107, 47574872, '18:03:33'),
(11989, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 40065169, 47574872, '18:03:33'),
(11990, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 58345038, 47574872, '18:03:33'),
(11991, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 63096529, 47574872, '18:03:33'),
(11992, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 67811547, 47574872, '18:03:33'),
(11993, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 60532087, 47574872, '18:03:33'),
(11994, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 10282912, 47574872, '18:03:33'),
(11995, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:03:34', '', '', 50, '', 567, 28350, 0, 65507, 19466217, 47574872, '18:03:33'),
(11996, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 53647409, 25870856, '18:04:59'),
(11997, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 53052028, 25870856, '18:04:59'),
(11998, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 75374815, 25870856, '18:04:59'),
(11999, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 94467450, 25870856, '18:04:59'),
(12000, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 31874124, 25870856, '18:04:59'),
(12001, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 68374820, 25870856, '18:04:59'),
(12002, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 83213425, 25870856, '18:04:59'),
(12003, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 92024340, 25870856, '18:04:59'),
(12004, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 63620454, 25870856, '18:04:59'),
(12005, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 37715537, 25870856, '18:04:59'),
(12006, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 70300053, 25870856, '18:04:59'),
(12007, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 38360109, 25870856, '18:04:59'),
(12008, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 32401134, 25870856, '18:04:59'),
(12009, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 30698190, 25870856, '18:04:59'),
(12010, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 63904068, 25870856, '18:04:59'),
(12011, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 62448343, 25870856, '18:04:59'),
(12012, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 34936574, 25870856, '18:04:59'),
(12013, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 75905668, 25870856, '18:04:59'),
(12014, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 96513100, 25870856, '18:04:59'),
(12015, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 35743643, 25870856, '18:04:59'),
(12016, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 87439646, 25870856, '18:04:59'),
(12017, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 51288492, 25870856, '18:04:59'),
(12018, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 73059285, 25870856, '18:04:59'),
(12019, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 26370400, 25870856, '18:04:59'),
(12020, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 53318600, 25870856, '18:04:59'),
(12021, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 40582558, 25870856, '18:04:59'),
(12022, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 54584912, 25870856, '18:04:59'),
(12023, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 67361686, 25870856, '18:04:59'),
(12024, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 75648879, 25870856, '18:04:59'),
(12025, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 29866206, 25870856, '18:04:59'),
(12026, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 78330742, 25870856, '18:04:59'),
(12027, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 14859958, 25870856, '18:04:59'),
(12028, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 65244132, 25870856, '18:04:59'),
(12029, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 55343685, 25870856, '18:04:59'),
(12030, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 49386096, 25870856, '18:04:59'),
(12031, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 84226758, 25870856, '18:04:59'),
(12032, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 70056904, 25870856, '18:04:59'),
(12033, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 12314913, 25870856, '18:04:59'),
(12034, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 96148092, 25870856, '18:04:59'),
(12035, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 78642050, 25870856, '18:04:59'),
(12036, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 90407976, 25870856, '18:04:59'),
(12037, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 53840399, 25870856, '18:04:59'),
(12038, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 82109031, 25870856, '18:04:59'),
(12039, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 16680483, 25870856, '18:04:59'),
(12040, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 60639552, 25870856, '18:04:59'),
(12041, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 76113374, 25870856, '18:04:59'),
(12042, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 71403125, 25870856, '18:04:59'),
(12043, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 91410986, 25870856, '18:04:59'),
(12044, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 71345075, 25870856, '18:04:59'),
(12045, 'Hp deksotp 800 g3 i5 ', '', '2022-05-13 15:05:01', '', '', 50, '', 456, 22800, 0, 12197, 24936129, 25870856, '18:04:59'),
(12046, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 21924721, 46874223, '18:08:40'),
(12047, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 48439276, 46874223, '18:08:40'),
(12048, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 45052908, 46874223, '18:08:40'),
(12049, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 46720888, 46874223, '18:08:40'),
(12050, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 65336520, 46874223, '18:08:40'),
(12051, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 54192634, 46874223, '18:08:40'),
(12052, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 28749077, 46874223, '18:08:40'),
(12053, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 42582771, 46874223, '18:08:40'),
(12054, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 60847155, 46874223, '18:08:40'),
(12055, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 81644001, 46874223, '18:08:40'),
(12056, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 33832158, 46874223, '18:08:40'),
(12057, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 90359187, 46874223, '18:08:40'),
(12058, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 13989942, 46874223, '18:08:40'),
(12059, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 65301617, 46874223, '18:08:40'),
(12060, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 45206445, 46874223, '18:08:40'),
(12061, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 54451964, 46874223, '18:08:40'),
(12062, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 66217283, 46874223, '18:08:40'),
(12063, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 33757586, 46874223, '18:08:40'),
(12064, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 24412453, 46874223, '18:08:40'),
(12065, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 61804105, 46874223, '18:08:40'),
(12066, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 61301367, 46874223, '18:08:40'),
(12067, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 70793058, 46874223, '18:08:40'),
(12068, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 93987622, 46874223, '18:08:40'),
(12069, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 85989463, 46874223, '18:08:40'),
(12070, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 21882969, 46874223, '18:08:40'),
(12071, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 63948702, 46874223, '18:08:40'),
(12072, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 17745990, 46874223, '18:08:40'),
(12073, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 99046491, 46874223, '18:08:40'),
(12074, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 67772486, 46874223, '18:08:40'),
(12075, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 71307329, 46874223, '18:08:40'),
(12076, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 87503321, 46874223, '18:08:40'),
(12077, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 65920731, 46874223, '18:08:40'),
(12078, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 92772493, 46874223, '18:08:40'),
(12079, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 16962330, 46874223, '18:08:40'),
(12080, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 51816896, 46874223, '18:08:40'),
(12081, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 87258520, 46874223, '18:08:40'),
(12082, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 20487380, 46874223, '18:08:40'),
(12083, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 37814765, 46874223, '18:08:40'),
(12084, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 44102293, 46874223, '18:08:40'),
(12085, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 60096332, 46874223, '18:08:40'),
(12086, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 65599805, 46874223, '18:08:40'),
(12087, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 20520241, 46874223, '18:08:40'),
(12088, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 72529421, 46874223, '18:08:40'),
(12089, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 12113621, 46874223, '18:08:40'),
(12090, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 90836832, 46874223, '18:08:40'),
(12091, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 18269364, 46874223, '18:08:40'),
(12092, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 95915655, 46874223, '18:08:40'),
(12093, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 40219218, 46874223, '18:08:40'),
(12094, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 72352279, 46874223, '18:08:40'),
(12095, 'laptop, grey', '', '2022-05-13 15:08:42', '', '', 50, '', 67, 3350, 0, 89318, 58088297, 46874223, '18:08:40'),
(12096, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:10:04', '', '', 1, '', 456, 456, 0, 11464, 30506100, 44034159, '18:10:03'),
(12097, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 22419777, 34501553, '18:11:31'),
(12098, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 13136454, 34501553, '18:11:31'),
(12099, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 60096666, 34501553, '18:11:31'),
(12100, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 12756363, 34501553, '18:11:31'),
(12101, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 38150843, 34501553, '18:11:31'),
(12102, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 55176595, 34501553, '18:11:31'),
(12103, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 64087565, 34501553, '18:11:31'),
(12104, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 46836512, 34501553, '18:11:31'),
(12105, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 43275021, 34501553, '18:11:31'),
(12106, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 18080383, 34501553, '18:11:31'),
(12107, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 97232196, 34501553, '18:11:31'),
(12108, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 93606956, 34501553, '18:11:31'),
(12109, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 52581463, 34501553, '18:11:31'),
(12110, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 54189427, 34501553, '18:11:31'),
(12111, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 21081652, 34501553, '18:11:31'),
(12112, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 60224907, 34501553, '18:11:31'),
(12113, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 97521440, 34501553, '18:11:31'),
(12114, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 26491778, 34501553, '18:11:31'),
(12115, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 58226662, 34501553, '18:11:31'),
(12116, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 32120949, 34501553, '18:11:31'),
(12117, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 28168976, 34501553, '18:11:31'),
(12118, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 29323583, 34501553, '18:11:31'),
(12119, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 98193379, 34501553, '18:11:31'),
(12120, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 54581407, 34501553, '18:11:31'),
(12121, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 35373561, 34501553, '18:11:31'),
(12122, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 20322512, 34501553, '18:11:31'),
(12123, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 37213178, 34501553, '18:11:31'),
(12124, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 72428616, 34501553, '18:11:31'),
(12125, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 22447174, 34501553, '18:11:31'),
(12126, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 73138610, 34501553, '18:11:31'),
(12127, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 95897414, 34501553, '18:11:31'),
(12128, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 25307949, 34501553, '18:11:31'),
(12129, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 14302596, 34501553, '18:11:31'),
(12130, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 75675510, 34501553, '18:11:31'),
(12131, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 32029426, 34501553, '18:11:31'),
(12132, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 80063935, 34501553, '18:11:31'),
(12133, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 72105491, 34501553, '18:11:31'),
(12134, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 38881200, 34501553, '18:11:31'),
(12135, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 88533631, 34501553, '18:11:31'),
(12136, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 86366528, 34501553, '18:11:31'),
(12137, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 78985685, 34501553, '18:11:31'),
(12138, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 55407219, 34501553, '18:11:31'),
(12139, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 97892900, 34501553, '18:11:31'),
(12140, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 59450878, 34501553, '18:11:31'),
(12141, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 80556453, 34501553, '18:11:31'),
(12142, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 95789590, 34501553, '18:11:31'),
(12143, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 59912215, 34501553, '18:11:31'),
(12144, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 52747203, 34501553, '18:11:31'),
(12145, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 95124943, 34501553, '18:11:31'),
(12146, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:11:32', '', '', 50, '', 56, 2800, 0, 32587, 76293883, 34501553, '18:11:31'),
(12147, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 70927772, 65994484, '18:12:10'),
(12148, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 46830414, 65994484, '18:12:10'),
(12149, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 91435524, 65994484, '18:12:10'),
(12150, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 76218115, 65994484, '18:12:10'),
(12151, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 54953696, 65994484, '18:12:10'),
(12152, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 83668272, 65994484, '18:12:10'),
(12153, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 22160987, 65994484, '18:12:10'),
(12154, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 69680586, 65994484, '18:12:10'),
(12155, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 35047190, 65994484, '18:12:10'),
(12156, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:12:12', '', '', 10, '', 456, 4560, 0, 25483, 53778077, 65994484, '18:12:10'),
(12157, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 17126180, 93757687, '18:16:26'),
(12158, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 79923779, 93757687, '18:16:26'),
(12159, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 62627839, 93757687, '18:16:26'),
(12160, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 35813428, 93757687, '18:16:26'),
(12161, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 71833713, 93757687, '18:16:26'),
(12162, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 79664418, 93757687, '18:16:26'),
(12163, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 29604723, 93757687, '18:16:26'),
(12164, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 82835115, 93757687, '18:16:26'),
(12165, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 11147248, 93757687, '18:16:26'),
(12166, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:16:28', '', '', 10, '', 67, 670, 0, 68075, 21031974, 93757687, '18:16:26'),
(12167, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 96892755, 94344058, '18:17:49'),
(12168, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 23792861, 94344058, '18:17:49'),
(12169, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 71869915, 94344058, '18:17:49'),
(12170, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 16042067, 94344058, '18:17:49'),
(12171, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 70200262, 94344058, '18:17:49'),
(12172, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 81983360, 94344058, '18:17:49'),
(12173, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 31637190, 94344058, '18:17:49'),
(12174, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 49560207, 94344058, '18:17:49'),
(12175, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 44921313, 94344058, '18:17:49'),
(12176, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 15:17:50', '', '', 10, '', 56, 560, 0, 71144, 87669663, 94344058, '18:17:49'),
(12186, 'Hp laptop 800 g3 i5 ', '', '2022-05-13 19:30:24', '', '', 10, '', 67, 670, 0, 31672, 35235855, 71914181, '18:18:41'),
(12236, 'laptop, grey', '', '2022-05-13 19:38:00', '', '', 50, '', 678, 33900, 0, 46756, 90834794, 25623298, '22:33:29'),
(12336, 'desktop, silver', '', '2022-05-13 19:49:28', '', '', 50, '', 678, 33900, 0, 82802, 54845687, 31859966, '22:46:13'),
(12337, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 66210855, 15822797, '22:51:04'),
(12338, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 41419782, 15822797, '22:51:04'),
(12339, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 52767222, 15822797, '22:51:04'),
(12340, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 71059024, 15822797, '22:51:04'),
(12341, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 77891414, 15822797, '22:51:04'),
(12342, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 16058868, 15822797, '22:51:04'),
(12343, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 76071123, 15822797, '22:51:04'),
(12344, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 40621967, 15822797, '22:51:04'),
(12345, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 12101339, 15822797, '22:51:04'),
(12346, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-13 19:51:06', '', '', 10, '', 567, 5670, 0, 28688, 20810926, 15822797, '22:51:04'),
(12356, 'desktop, silver', '', '2022-05-14 09:08:04', '', '', 10, '', 67, 670, 0, 52883, 98108066, 97353123, '22:51:55'),
(12357, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 86377671, 82800410, '11:55:34'),
(12358, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 72002518, 82800410, '11:55:34'),
(12359, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 98970230, 82800410, '11:55:34'),
(12360, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 23439240, 82800410, '11:55:34'),
(12361, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 31105213, 82800410, '11:55:34'),
(12362, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 61785845, 82800410, '11:55:34'),
(12363, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 91498331, 82800410, '11:55:34'),
(12364, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 67569507, 82800410, '11:55:34'),
(12365, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 96019838, 82800410, '11:55:34'),
(12366, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 75362552, 82800410, '11:55:34'),
(12367, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 68786531, 82800410, '11:55:34'),
(12368, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 48491328, 82800410, '11:55:34'),
(12369, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 80635587, 82800410, '11:55:34'),
(12370, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 49857353, 82800410, '11:55:34'),
(12371, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 18077274, 82800410, '11:55:34'),
(12372, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 33535783, 82800410, '11:55:34'),
(12373, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 39052986, 82800410, '11:55:34'),
(12374, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 82802364, 82800410, '11:55:34'),
(12375, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 59830947, 82800410, '11:55:34'),
(12376, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 60165716, 82800410, '11:55:34'),
(12377, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 61848866, 82800410, '11:55:34'),
(12378, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 68976059, 82800410, '11:55:34'),
(12379, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 23887362, 82800410, '11:55:34'),
(12380, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 78779341, 82800410, '11:55:34'),
(12381, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 33996389, 82800410, '11:55:34'),
(12382, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 95541783, 82800410, '11:55:34'),
(12383, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 86355081, 82800410, '11:55:34'),
(12384, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 80581652, 82800410, '11:55:34'),
(12385, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 88712619, 82800410, '11:55:34'),
(12386, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 87506400, 82800410, '11:55:34'),
(12387, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 80037513, 82800410, '11:55:34'),
(12388, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 31539871, 82800410, '11:55:34'),
(12389, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 22470813, 82800410, '11:55:34'),
(12390, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 68138584, 82800410, '11:55:34'),
(12391, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 71717353, 82800410, '11:55:34'),
(12392, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 34030208, 82800410, '11:55:34'),
(12393, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 39780747, 82800410, '11:55:34'),
(12394, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 99172978, 82800410, '11:55:34'),
(12395, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 53559660, 82800410, '11:55:34'),
(12396, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 89440065, 82800410, '11:55:34'),
(12397, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 88928335, 82800410, '11:55:34'),
(12398, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 44852833, 82800410, '11:55:34'),
(12399, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 97856313, 82800410, '11:55:34'),
(12400, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 49012552, 82800410, '11:55:34'),
(12401, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 97694690, 82800410, '11:55:34'),
(12402, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 66575085, 82800410, '11:55:34'),
(12403, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 78443804, 82800410, '11:55:34'),
(12404, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 12695893, 82800410, '11:55:34'),
(12405, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 54281103, 82800410, '11:55:34'),
(12406, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:55:36', '', '', 50, '', 67, 3350, 0, 41838, 23596243, 82800410, '11:55:34'),
(12407, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 86646643, 24925755, '11:57:28'),
(12408, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 60462102, 24925755, '11:57:28'),
(12409, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 92509211, 24925755, '11:57:28'),
(12410, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 88465231, 24925755, '11:57:28'),
(12411, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 58090621, 24925755, '11:57:28'),
(12412, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 58843241, 24925755, '11:57:28'),
(12413, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 25687127, 24925755, '11:57:28'),
(12414, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 35918926, 24925755, '11:57:28'),
(12415, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 38925866, 24925755, '11:57:28'),
(12416, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 92023163, 24925755, '11:57:28'),
(12417, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 19800048, 24925755, '11:57:28'),
(12418, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 55307657, 24925755, '11:57:28'),
(12419, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 12440115, 24925755, '11:57:28'),
(12420, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 22769369, 24925755, '11:57:28'),
(12421, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 32261626, 24925755, '11:57:28'),
(12422, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 63692564, 24925755, '11:57:28'),
(12423, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 37400695, 24925755, '11:57:28'),
(12424, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 95146014, 24925755, '11:57:28'),
(12425, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 14412999, 24925755, '11:57:28'),
(12426, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 32937822, 24925755, '11:57:28'),
(12427, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 16162728, 24925755, '11:57:28'),
(12428, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 21754353, 24925755, '11:57:28'),
(12429, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 60745278, 24925755, '11:57:28'),
(12430, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 60788509, 24925755, '11:57:28'),
(12431, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 36240976, 24925755, '11:57:28'),
(12432, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 12036708, 24925755, '11:57:28'),
(12433, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 29354630, 24925755, '11:57:28'),
(12434, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 14510893, 24925755, '11:57:28'),
(12435, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 47464346, 24925755, '11:57:28'),
(12436, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 98912906, 24925755, '11:57:28'),
(12437, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 46810323, 24925755, '11:57:28'),
(12438, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 97171104, 24925755, '11:57:28'),
(12439, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 79485597, 24925755, '11:57:28'),
(12440, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 45207879, 24925755, '11:57:28'),
(12441, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 43039402, 24925755, '11:57:28'),
(12442, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 95791493, 24925755, '11:57:28'),
(12443, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 50226855, 24925755, '11:57:28'),
(12444, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 49333648, 24925755, '11:57:28'),
(12445, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 15569155, 24925755, '11:57:28'),
(12446, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 34361143, 24925755, '11:57:28'),
(12447, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 57958405, 24925755, '11:57:28'),
(12448, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 12640365, 24925755, '11:57:28'),
(12449, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 50897476, 24925755, '11:57:28'),
(12450, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 75318782, 24925755, '11:57:28'),
(12451, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 94802381, 24925755, '11:57:28'),
(12452, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 80680266, 24925755, '11:57:28'),
(12453, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 64452730, 24925755, '11:57:28'),
(12454, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 26889385, 24925755, '11:57:28'),
(12455, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 56628491, 24925755, '11:57:28'),
(12456, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 08:58:11', '', '', 50, '', 67, 3350, 0, 56040, 41657285, 24925755, '11:57:28'),
(12457, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 11738612, 95395207, '11:59:10'),
(12458, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 61471524, 95395207, '11:59:10'),
(12459, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 73050668, 95395207, '11:59:10'),
(12460, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 25866855, 95395207, '11:59:10'),
(12461, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 26681803, 95395207, '11:59:10'),
(12462, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 90682260, 95395207, '11:59:10'),
(12463, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 68382663, 95395207, '11:59:10'),
(12464, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 10960936, 95395207, '11:59:10'),
(12465, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 45733526, 95395207, '11:59:10'),
(12466, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-14 09:06:50', '', '', 10, '', 5678, 56780, 0, 36665, 97930793, 95395207, '11:59:10'),
(12536, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:18:12', '', '', 50, '', 678, 33900, 0, 74652, 39777986, 99737315, '12:12:28'),
(12537, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 42870311, 58089611, '12:18:37'),
(12538, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 47881784, 58089611, '12:18:38'),
(12539, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 83516444, 58089611, '12:18:38'),
(12540, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 60053995, 58089611, '12:18:38'),
(12541, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 71048446, 58089611, '12:18:38');
INSERT INTO `tinvoicecreate1` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `assetid`, `del`, `time`) VALUES
(12542, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 26368370, 58089611, '12:18:38'),
(12543, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 92637093, 58089611, '12:18:38'),
(12544, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 13966420, 58089611, '12:18:38'),
(12545, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 45076476, 58089611, '12:18:39'),
(12546, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 29001254, 58089611, '12:18:39'),
(12547, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 39891176, 58089611, '12:18:39'),
(12548, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 10794391, 58089611, '12:18:39'),
(12549, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 81653341, 58089611, '12:18:39'),
(12550, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 51402303, 58089611, '12:18:39'),
(12551, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 35574508, 58089611, '12:18:39'),
(12552, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 70403706, 58089611, '12:18:39'),
(12553, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 59526748, 58089611, '12:18:39'),
(12554, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 57371649, 58089611, '12:18:39'),
(12555, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 85120565, 58089611, '12:18:39'),
(12556, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 15213220, 58089611, '12:18:39'),
(12557, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 79002325, 58089611, '12:18:39'),
(12558, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 41045451, 58089611, '12:18:39'),
(12559, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 11980532, 58089611, '12:18:39'),
(12560, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 77514429, 58089611, '12:18:39'),
(12561, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 76522112, 58089611, '12:18:39'),
(12562, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 41041661, 58089611, '12:18:39'),
(12563, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 20192958, 58089611, '12:18:39'),
(12564, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 88103530, 58089611, '12:18:39'),
(12565, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 97589735, 58089611, '12:18:39'),
(12566, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 67454338, 58089611, '12:18:39'),
(12567, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 80420499, 58089611, '12:18:39'),
(12568, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 17183847, 58089611, '12:18:39'),
(12569, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 64896623, 58089611, '12:18:39'),
(12570, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 24018693, 58089611, '12:18:39'),
(12571, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 85141877, 58089611, '12:18:39'),
(12572, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 79405576, 58089611, '12:18:39'),
(12573, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 36119806, 58089611, '12:18:39'),
(12574, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 23521618, 58089611, '12:18:39'),
(12575, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 58282872, 58089611, '12:18:39'),
(12576, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 26348495, 58089611, '12:18:39'),
(12577, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 72685278, 58089611, '12:18:39'),
(12578, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 79607946, 58089611, '12:18:39'),
(12579, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 87416163, 58089611, '12:18:39'),
(12580, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 96471340, 58089611, '12:18:39'),
(12581, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 90651926, 58089611, '12:18:39'),
(12582, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 27739935, 58089611, '12:18:39'),
(12583, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 39711270, 58089611, '12:18:39'),
(12584, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 82015044, 58089611, '12:18:39'),
(12585, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 48624271, 58089611, '12:18:39'),
(12586, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:18:42', '', '', 50, '', 4567, 228350, 0, 72751, 96430420, 58089611, '12:18:39'),
(12587, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 11:00:19', '', '', 1, '', 78, 78, 0, 54071, 28082138, 45858201, '12:21:28'),
(12687, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:31:51', '', '', 50, '', 567, 28350, 0, 75605, 83693504, 49718836, '12:30:31'),
(12688, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 68656327, 86495904, '12:31:27'),
(12689, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 10411349, 86495904, '12:31:27'),
(12690, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 89648593, 86495904, '12:31:27'),
(12691, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 61048270, 86495904, '12:31:27'),
(12692, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 28776742, 86495904, '12:31:27'),
(12693, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 31262653, 86495904, '12:31:27'),
(12694, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 40551263, 86495904, '12:31:27'),
(12695, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 45149241, 86495904, '12:31:27'),
(12696, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 12265245, 86495904, '12:31:27'),
(12697, 'laptop, grey', '', '2022-05-14 09:31:28', '', '', 10, '', 567, 5670, 0, 81033, 13880741, 86495904, '12:31:27'),
(12698, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 85139721, 32349930, '12:32:17'),
(12699, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 94688713, 32349930, '12:32:17'),
(12700, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 44481669, 32349930, '12:32:17'),
(12701, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 65222037, 32349930, '12:32:17'),
(12702, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 84658038, 32349930, '12:32:17'),
(12703, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 89487322, 32349930, '12:32:17'),
(12704, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 73226116, 32349930, '12:32:17'),
(12705, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 83119622, 32349930, '12:32:17'),
(12706, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 97457604, 32349930, '12:32:17'),
(12707, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 34188538, 32349930, '12:32:17'),
(12708, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 26255193, 32349930, '12:32:17'),
(12709, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 86543076, 32349930, '12:32:17'),
(12710, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 45720884, 32349930, '12:32:17'),
(12711, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 85393431, 32349930, '12:32:17'),
(12712, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 87601832, 32349930, '12:32:17'),
(12713, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 32541477, 32349930, '12:32:17'),
(12714, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 40861927, 32349930, '12:32:17'),
(12715, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 33321215, 32349930, '12:32:17'),
(12716, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 16738847, 32349930, '12:32:17'),
(12717, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 47632129, 32349930, '12:32:17'),
(12718, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 29422397, 32349930, '12:32:17'),
(12719, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 33253411, 32349930, '12:32:17'),
(12720, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 15647527, 32349930, '12:32:17'),
(12721, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 66024932, 32349930, '12:32:17'),
(12722, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 16258656, 32349930, '12:32:17'),
(12723, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 26441261, 32349930, '12:32:17'),
(12724, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 76069513, 32349930, '12:32:17'),
(12725, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 35893911, 32349930, '12:32:17'),
(12726, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 37522245, 32349930, '12:32:17'),
(12727, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 93986410, 32349930, '12:32:17'),
(12728, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 10947048, 32349930, '12:32:17'),
(12729, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 57823762, 32349930, '12:32:17'),
(12730, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 59746828, 32349930, '12:32:17'),
(12731, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 39228883, 32349930, '12:32:17'),
(12732, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 75468652, 32349930, '12:32:17'),
(12733, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 94749939, 32349930, '12:32:17'),
(12734, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 45277117, 32349930, '12:32:17'),
(12735, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 10142825, 32349930, '12:32:17'),
(12736, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 28691623, 32349930, '12:32:17'),
(12737, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 54706215, 32349930, '12:32:17'),
(12738, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 45502590, 32349930, '12:32:17'),
(12739, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 92304950, 32349930, '12:32:17'),
(12740, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 44898757, 32349930, '12:32:17'),
(12741, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 18872203, 32349930, '12:32:17'),
(12742, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 72798923, 32349930, '12:32:17'),
(12743, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 82197216, 32349930, '12:32:17'),
(12744, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 48261357, 32349930, '12:32:17'),
(12745, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 73787863, 32349930, '12:32:17'),
(12746, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 64223460, 32349930, '12:32:17'),
(12747, 'Hp deksotp 800 g3 i5 ', '', '2022-05-14 09:32:19', '', '', 50, '', 567, 28350, 0, 71332, 16356055, 32349930, '12:32:17'),
(12748, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 25194821, 78205585, '12:49:49'),
(12749, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 26958636, 78205585, '12:49:49'),
(12750, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 22281176, 78205585, '12:49:49'),
(12751, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 40032676, 78205585, '12:49:49'),
(12752, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 33882989, 78205585, '12:49:49'),
(12753, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 13604031, 78205585, '12:49:49'),
(12754, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 65054814, 78205585, '12:49:49'),
(12755, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 22613383, 78205585, '12:49:49'),
(12756, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 37468345, 78205585, '12:49:49'),
(12757, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 74708608, 78205585, '12:49:49'),
(12758, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 79450369, 78205585, '12:49:49'),
(12759, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 91653737, 78205585, '12:49:49'),
(12760, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 11503097, 78205585, '12:49:49'),
(12761, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 25752445, 78205585, '12:49:49'),
(12762, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 21740581, 78205585, '12:49:49'),
(12763, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 73274603, 78205585, '12:49:49'),
(12764, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 75596200, 78205585, '12:49:49'),
(12765, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 44553874, 78205585, '12:49:49'),
(12766, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 92655917, 78205585, '12:49:49'),
(12767, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 91108345, 78205585, '12:49:49'),
(12768, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 37195014, 78205585, '12:49:49'),
(12769, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 72041317, 78205585, '12:49:49'),
(12770, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 52530499, 78205585, '12:49:49'),
(12771, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 46008967, 78205585, '12:49:49'),
(12772, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 30306432, 78205585, '12:49:49'),
(12773, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 89930265, 78205585, '12:49:49'),
(12774, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 15344376, 78205585, '12:49:49'),
(12775, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 29104747, 78205585, '12:49:49'),
(12776, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 36810990, 78205585, '12:49:49'),
(12777, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 37665475, 78205585, '12:49:49'),
(12778, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 69614801, 78205585, '12:49:49'),
(12779, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 42329686, 78205585, '12:49:49'),
(12780, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 40021236, 78205585, '12:49:49'),
(12781, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 34096614, 78205585, '12:49:49'),
(12782, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 43013541, 78205585, '12:49:49'),
(12783, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 31383525, 78205585, '12:49:49'),
(12784, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 53725424, 78205585, '12:49:49'),
(12785, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 70242613, 78205585, '12:49:49'),
(12786, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 37555379, 78205585, '12:49:49'),
(12787, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 43393074, 78205585, '12:49:49'),
(12788, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 55087581, 78205585, '12:49:49'),
(12789, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 78352463, 78205585, '12:49:49'),
(12790, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 81218347, 78205585, '12:49:49'),
(12791, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 56160027, 78205585, '12:49:49'),
(12792, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 10916372, 78205585, '12:49:49'),
(12793, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 87803235, 78205585, '12:49:49'),
(12794, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 51855058, 78205585, '12:49:49'),
(12795, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 24490111, 78205585, '12:49:49'),
(12796, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 87633115, 78205585, '12:49:49'),
(12797, 'desktop, silver', '', '2022-05-14 09:50:03', '', '', 50, '', 76789, 3839450, 0, 95418, 77362286, 78205585, '12:49:49'),
(12798, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 38757025, 40561229, '12:50:00'),
(12799, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 24817797, 40561229, '12:50:00'),
(12800, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 72169534, 40561229, '12:50:00'),
(12801, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 28748930, 40561229, '12:50:00'),
(12802, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 45469621, 40561229, '12:50:00'),
(12803, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 43726653, 40561229, '12:50:00'),
(12804, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 79229815, 40561229, '12:50:00'),
(12805, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 94774346, 40561229, '12:50:00'),
(12806, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 37090807, 40561229, '12:50:00'),
(12807, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 09:50:03', '', '', 10, '', 899, 8990, 0, 95418, 32030418, 40561229, '12:50:00'),
(12808, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 11:00:19', '', '', 2, '', 78, 156, 0, 54071, 66475956, 79843989, '13:59:46'),
(12809, 'Hp laptop 800 g3 i5 ', '', '2022-05-14 11:00:19', '', '', 2, '', 78, 156, 0, 54071, 66130805, 79843989, '13:59:46'),
(12828, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:18:56', '', '', 19, '', 1000, 19000, 0, 78617, 26453006, 95018306, '14:00:57'),
(12838, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:54:35', '', '', 10, '', 59000, 590000, 0, 77842, 84303305, 23850680, '08:11:11'),
(12839, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 75083147, 96767862, '08:32:37'),
(12840, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 66704432, 96767862, '08:32:37'),
(12841, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 68974117, 96767862, '08:32:37'),
(12842, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 15724862, 96767862, '08:32:37'),
(12843, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 36653807, 96767862, '08:32:37'),
(12844, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 50166788, 96767862, '08:32:37'),
(12845, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 83545946, 96767862, '08:32:37'),
(12846, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 44683585, 96767862, '08:32:37'),
(12847, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 33344669, 96767862, '08:32:37'),
(12848, 'desktop, silver', '', '2022-05-17 05:32:39', '', '', 10, '', 567, 5670, 0, 26279, 34429183, 96767862, '08:32:37'),
(12849, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 59671846, 35595735, '08:33:45'),
(12850, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 25382050, 35595735, '08:33:45'),
(12851, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 43760995, 35595735, '08:33:45'),
(12852, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 84995161, 35595735, '08:33:45'),
(12853, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 83764577, 35595735, '08:33:45'),
(12854, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 70415661, 35595735, '08:33:45'),
(12855, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 54126019, 35595735, '08:33:45'),
(12856, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 61343334, 35595735, '08:33:45'),
(12857, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 83239633, 35595735, '08:33:45'),
(12858, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 33374497, 35595735, '08:33:45'),
(12859, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 70317450, 35595735, '08:33:45'),
(12860, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 23085419, 35595735, '08:33:45'),
(12861, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 21671676, 35595735, '08:33:45'),
(12862, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 73048205, 35595735, '08:33:45'),
(12863, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 71439386, 35595735, '08:33:45'),
(12864, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 40655929, 35595735, '08:33:45'),
(12865, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 33467624, 35595735, '08:33:45'),
(12866, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 39199845, 35595735, '08:33:45'),
(12867, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 78322713, 35595735, '08:33:45'),
(12868, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 24743939, 35595735, '08:33:45'),
(12869, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 48201899, 35595735, '08:33:45'),
(12870, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 20590332, 35595735, '08:33:45'),
(12871, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 94461109, 35595735, '08:33:45'),
(12872, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 33753321, 35595735, '08:33:45'),
(12873, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 56406620, 35595735, '08:33:45'),
(12874, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 63309111, 35595735, '08:33:45'),
(12875, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 66721022, 35595735, '08:33:45'),
(12876, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 54017087, 35595735, '08:33:45'),
(12877, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 91083507, 35595735, '08:33:45'),
(12878, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 37728683, 35595735, '08:33:45'),
(12879, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 44512684, 35595735, '08:33:45'),
(12880, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 57063725, 35595735, '08:33:45'),
(12881, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 58121017, 35595735, '08:33:45'),
(12882, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 41823870, 35595735, '08:33:45'),
(12883, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 28633096, 35595735, '08:33:45'),
(12884, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 47358113, 35595735, '08:33:45'),
(12885, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 12721750, 35595735, '08:33:45'),
(12886, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 36659665, 35595735, '08:33:45'),
(12887, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 48771599, 35595735, '08:33:45'),
(12888, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 87458897, 35595735, '08:33:45'),
(12889, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 47420924, 35595735, '08:33:45'),
(12890, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 10170717, 35595735, '08:33:45'),
(12891, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 41300623, 35595735, '08:33:45'),
(12892, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 45094947, 35595735, '08:33:45'),
(12893, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 81830306, 35595735, '08:33:45'),
(12894, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 67379421, 35595735, '08:33:45'),
(12895, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 82181954, 35595735, '08:33:45'),
(12896, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 99434358, 35595735, '08:33:45'),
(12897, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 90001827, 35595735, '08:33:45'),
(12898, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:35:25', '', '', 50, '', 4567, 228350, 0, 26157, 64566237, 35595735, '08:33:45'),
(12899, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 48372443, 54281293, '08:36:28'),
(12900, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 29699666, 54281293, '08:36:28'),
(12901, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 28622415, 54281293, '08:36:28'),
(12902, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 27948420, 54281293, '08:36:28'),
(12903, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 93445526, 54281293, '08:36:28'),
(12904, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 99935280, 54281293, '08:36:28'),
(12905, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 55977724, 54281293, '08:36:28'),
(12906, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 54491231, 54281293, '08:36:28'),
(12907, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 56235065, 54281293, '08:36:28'),
(12908, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 05:38:28', '', '', 10, '', 678, 6780, 0, 21900, 79025912, 54281293, '08:36:28'),
(12909, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 98813835, 68156468, '08:41:15'),
(12910, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 66777468, 68156468, '08:41:15'),
(12911, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 84905689, 68156468, '08:41:15'),
(12912, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 49855352, 68156468, '08:41:15'),
(12913, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 95727089, 68156468, '08:41:15'),
(12914, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 58900941, 68156468, '08:41:15'),
(12915, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 27020354, 68156468, '08:41:15'),
(12916, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 83451847, 68156468, '08:41:15'),
(12917, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 17437640, 68156468, '08:41:15'),
(12918, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 05:48:42', '', '', 10, '', 5678, 56780, 0, 58518, 21171803, 68156468, '08:41:15'),
(12968, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:12:01', '', '', 50, '', 67, 3350, 0, 55257, 15685097, 54279855, '08:49:47'),
(13018, 'desktop, silver', '', '2022-05-17 05:55:08', '', '', 50, '', 678, 33900, 0, 96586, 20882919, 28747797, '08:53:13'),
(13068, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:01:20', '', '', 50, '', 56, 2800, 0, 55247, 34671356, 12314924, '08:54:55'),
(13069, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 77893956, 85564864, '08:56:12'),
(13070, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 70217976, 85564864, '08:56:12'),
(13071, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 25049116, 85564864, '08:56:12'),
(13072, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 84167683, 85564864, '08:56:12'),
(13073, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 63027980, 85564864, '08:56:12'),
(13074, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 33354841, 85564864, '08:56:12'),
(13075, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 81466433, 85564864, '08:56:12'),
(13076, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 33814276, 85564864, '08:56:12'),
(13077, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 86126005, 85564864, '08:56:12'),
(13078, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 50784151, 85564864, '08:56:12'),
(13079, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 20778315, 85564864, '08:56:12'),
(13080, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 97415167, 85564864, '08:56:12'),
(13081, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 54315914, 85564864, '08:56:12'),
(13082, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 69577534, 85564864, '08:56:12'),
(13083, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 33538649, 85564864, '08:56:12'),
(13084, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 69942550, 85564864, '08:56:12'),
(13085, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 15545792, 85564864, '08:56:12'),
(13086, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 24817077, 85564864, '08:56:12'),
(13087, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 66169934, 85564864, '08:56:12'),
(13088, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 66873634, 85564864, '08:56:12'),
(13089, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 11908184, 85564864, '08:56:12'),
(13090, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 41246602, 85564864, '08:56:12'),
(13091, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 44778232, 85564864, '08:56:12'),
(13092, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 54352226, 85564864, '08:56:12'),
(13093, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 21827089, 85564864, '08:56:12'),
(13094, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 56582757, 85564864, '08:56:12'),
(13095, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 98072378, 85564864, '08:56:12'),
(13096, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 20404497, 85564864, '08:56:12'),
(13097, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 53379891, 85564864, '08:56:12'),
(13098, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 17301854, 85564864, '08:56:12'),
(13099, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 52043002, 85564864, '08:56:12'),
(13100, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 61504894, 85564864, '08:56:12'),
(13101, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 56474730, 85564864, '08:56:12'),
(13102, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 31017565, 85564864, '08:56:12'),
(13103, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 45607350, 85564864, '08:56:12'),
(13104, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 42869981, 85564864, '08:56:12'),
(13105, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 13828149, 85564864, '08:56:12'),
(13106, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 94139176, 85564864, '08:56:12'),
(13107, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 60656393, 85564864, '08:56:12'),
(13108, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 11431196, 85564864, '08:56:12'),
(13109, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 92565905, 85564864, '08:56:12'),
(13110, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 56229264, 85564864, '08:56:12'),
(13111, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 27100931, 85564864, '08:56:12'),
(13112, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 72507193, 85564864, '08:56:12'),
(13113, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 60147697, 85564864, '08:56:12'),
(13114, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 38784146, 85564864, '08:56:12'),
(13115, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 57378007, 85564864, '08:56:12'),
(13116, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 11212086, 85564864, '08:56:12'),
(13117, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 89216709, 85564864, '08:56:12'),
(13118, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 05:56:14', '', '', 50, '', 4567, 228350, 0, 21718, 85843026, 85564864, '08:56:12'),
(13119, 'printer ', '', '2022-05-17 06:01:20', '', '', 1, '', 7675, 7675, 0, 55247, 46528610, 17913055, '09:01:15'),
(13120, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 77448811, 47000007, '09:12:52'),
(13121, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 85256444, 47000007, '09:12:52'),
(13122, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94011563, 47000007, '09:12:52'),
(13123, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 47337172, 47000007, '09:12:52'),
(13124, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 69483699, 47000007, '09:12:52'),
(13125, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76245180, 47000007, '09:12:52'),
(13126, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 23133617, 47000007, '09:12:52'),
(13127, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 40286589, 47000007, '09:12:52'),
(13128, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 89100559, 47000007, '09:12:52'),
(13129, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 22559843, 47000007, '09:12:52'),
(13130, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 26964132, 47000007, '09:12:52'),
(13131, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84929480, 47000007, '09:12:52'),
(13132, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 86465862, 47000007, '09:12:52'),
(13133, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 55095567, 47000007, '09:12:52'),
(13134, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 99694134, 47000007, '09:12:52'),
(13135, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 16860979, 47000007, '09:12:52'),
(13136, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29758692, 47000007, '09:12:52'),
(13137, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95930144, 47000007, '09:12:52'),
(13138, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11612592, 47000007, '09:12:52'),
(13139, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24896224, 47000007, '09:12:52'),
(13140, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 78191542, 47000007, '09:12:52'),
(13141, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70785659, 47000007, '09:12:52'),
(13142, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 86771169, 47000007, '09:12:52'),
(13143, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 33717733, 47000007, '09:12:52'),
(13144, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 43440522, 47000007, '09:12:52'),
(13145, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61299167, 47000007, '09:12:52'),
(13146, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 35414353, 47000007, '09:12:52'),
(13147, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37691064, 47000007, '09:12:52'),
(13148, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 88255060, 47000007, '09:12:52'),
(13149, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84343977, 47000007, '09:12:52'),
(13150, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94247967, 47000007, '09:12:52'),
(13151, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 69186423, 47000007, '09:12:52'),
(13152, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 50815470, 47000007, '09:12:52'),
(13153, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75884015, 47000007, '09:12:52'),
(13154, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 45215889, 47000007, '09:12:52'),
(13155, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95763407, 47000007, '09:12:52'),
(13156, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 46247868, 47000007, '09:12:52'),
(13157, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 62725196, 47000007, '09:12:52'),
(13158, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82579383, 47000007, '09:12:52'),
(13159, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 10062644, 47000007, '09:12:52'),
(13160, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19539973, 47000007, '09:12:52'),
(13161, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 66207028, 47000007, '09:12:52'),
(13162, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 79609737, 47000007, '09:12:52'),
(13163, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 55820353, 47000007, '09:12:52'),
(13164, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76462197, 47000007, '09:12:52'),
(13165, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19779654, 47000007, '09:12:52'),
(13166, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 36764691, 47000007, '09:12:52'),
(13167, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 32487702, 47000007, '09:12:52'),
(13168, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 23156074, 47000007, '09:12:52'),
(13169, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 89519879, 47000007, '09:12:52'),
(13170, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 17976818, 47000007, '09:12:52'),
(13171, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70122098, 47000007, '09:12:52'),
(13172, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 96467915, 47000007, '09:12:52'),
(13173, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11203278, 47000007, '09:12:52'),
(13174, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 32773119, 47000007, '09:12:52'),
(13175, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 32808237, 47000007, '09:12:52'),
(13176, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 25428338, 47000007, '09:12:52'),
(13177, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95414912, 47000007, '09:12:52'),
(13178, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19804845, 47000007, '09:12:52'),
(13179, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 46078349, 47000007, '09:12:52'),
(13180, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37737516, 47000007, '09:12:52'),
(13181, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 67868645, 47000007, '09:12:52'),
(13182, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21465265, 47000007, '09:12:52'),
(13183, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 51873157, 47000007, '09:12:52'),
(13184, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 55231652, 47000007, '09:12:52'),
(13185, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19051549, 47000007, '09:12:52'),
(13186, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 12475277, 47000007, '09:12:52'),
(13187, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82048654, 47000007, '09:12:52'),
(13188, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95853865, 47000007, '09:12:52'),
(13189, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 51804199, 47000007, '09:12:52'),
(13190, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 91507930, 47000007, '09:12:52'),
(13191, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 17753520, 47000007, '09:12:52'),
(13192, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75239537, 47000007, '09:12:52'),
(13193, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 48716649, 47000007, '09:12:52'),
(13194, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 74968950, 47000007, '09:12:52'),
(13195, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82206060, 47000007, '09:12:52'),
(13196, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82256010, 47000007, '09:12:52'),
(13197, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84502260, 47000007, '09:12:52'),
(13198, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 89006241, 47000007, '09:12:52'),
(13199, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 35868332, 47000007, '09:12:52'),
(13200, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75982706, 47000007, '09:12:52'),
(13201, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 32075676, 47000007, '09:12:52');
INSERT INTO `tinvoicecreate1` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `assetid`, `del`, `time`) VALUES
(13202, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 15249013, 47000007, '09:12:52'),
(13203, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 55541796, 47000007, '09:12:52'),
(13204, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 66688865, 47000007, '09:12:52'),
(13205, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 39806773, 47000007, '09:12:52'),
(13206, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 55141200, 47000007, '09:12:53'),
(13207, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 20931047, 47000007, '09:12:53'),
(13208, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 30950591, 47000007, '09:12:53'),
(13209, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 51032061, 47000007, '09:12:53'),
(13210, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61802624, 47000007, '09:12:53'),
(13211, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 65522992, 47000007, '09:12:53'),
(13212, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 35162578, 47000007, '09:12:53'),
(13213, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 67721382, 47000007, '09:12:53'),
(13214, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 57339768, 47000007, '09:12:53'),
(13215, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63058908, 47000007, '09:12:53'),
(13216, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 41678698, 47000007, '09:12:53'),
(13217, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29379983, 47000007, '09:12:53'),
(13218, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 98248772, 47000007, '09:12:53'),
(13219, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 57878932, 47000007, '09:12:53'),
(13220, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 13093103, 47000007, '09:12:53'),
(13221, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 42144467, 47000007, '09:12:53'),
(13222, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 56935511, 47000007, '09:12:53'),
(13223, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 87830339, 47000007, '09:12:53'),
(13224, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 28238082, 47000007, '09:12:53'),
(13225, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 33787099, 47000007, '09:12:53'),
(13226, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 31120569, 47000007, '09:12:53'),
(13227, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 22257296, 47000007, '09:12:53'),
(13228, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 28104855, 47000007, '09:12:53'),
(13229, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95223279, 47000007, '09:12:53'),
(13230, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 49157575, 47000007, '09:12:53'),
(13231, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21518867, 47000007, '09:12:53'),
(13232, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61694077, 47000007, '09:12:53'),
(13233, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 13895814, 47000007, '09:12:53'),
(13234, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 89133638, 47000007, '09:12:53'),
(13235, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 90816379, 47000007, '09:12:53'),
(13236, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37318709, 47000007, '09:12:53'),
(13237, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 59872754, 47000007, '09:12:53'),
(13238, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 31224464, 47000007, '09:12:53'),
(13239, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 58684560, 47000007, '09:12:53'),
(13240, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 38128086, 47000007, '09:12:53'),
(13241, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 86391650, 47000007, '09:12:53'),
(13242, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 87372630, 47000007, '09:12:53'),
(13243, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76499569, 47000007, '09:12:53'),
(13244, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 40075937, 47000007, '09:12:53'),
(13245, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 15241106, 47000007, '09:12:53'),
(13246, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 78776424, 47000007, '09:12:53'),
(13247, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29789491, 47000007, '09:12:53'),
(13248, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 68248520, 47000007, '09:12:53'),
(13249, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24774371, 47000007, '09:12:53'),
(13250, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 53216648, 47000007, '09:12:53'),
(13251, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 72979655, 47000007, '09:12:53'),
(13252, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 92823170, 47000007, '09:12:53'),
(13253, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27393619, 47000007, '09:12:53'),
(13254, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 44357497, 47000007, '09:12:53'),
(13255, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 67696367, 47000007, '09:12:53'),
(13256, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 65805329, 47000007, '09:12:53'),
(13257, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76257479, 47000007, '09:12:53'),
(13258, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 30486167, 47000007, '09:12:53'),
(13259, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 33208006, 47000007, '09:12:53'),
(13260, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 49508451, 47000007, '09:12:53'),
(13261, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 88875773, 47000007, '09:12:53'),
(13262, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 77524229, 47000007, '09:12:53'),
(13263, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 28367624, 47000007, '09:12:53'),
(13264, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 55818524, 47000007, '09:12:53'),
(13265, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61136806, 47000007, '09:12:53'),
(13266, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95577283, 47000007, '09:12:53'),
(13267, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 38797311, 47000007, '09:12:53'),
(13268, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 50620191, 47000007, '09:12:53'),
(13269, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 72773725, 47000007, '09:12:53'),
(13270, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27116970, 47000007, '09:12:53'),
(13271, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 73894577, 47000007, '09:12:53'),
(13272, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 60394673, 47000007, '09:12:53'),
(13273, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37582821, 47000007, '09:12:53'),
(13274, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 46173751, 47000007, '09:12:53'),
(13275, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 31694871, 47000007, '09:12:53'),
(13276, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 34953473, 47000007, '09:12:53'),
(13277, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19407423, 47000007, '09:12:53'),
(13278, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 81175058, 47000007, '09:12:53'),
(13279, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 90116240, 47000007, '09:12:53'),
(13280, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19321238, 47000007, '09:12:53'),
(13281, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 22606093, 47000007, '09:12:53'),
(13282, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37167418, 47000007, '09:12:53'),
(13283, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61576089, 47000007, '09:12:53'),
(13284, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95466186, 47000007, '09:12:53'),
(13285, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37680651, 47000007, '09:12:53'),
(13286, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 56566486, 47000007, '09:12:53'),
(13287, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 74997603, 47000007, '09:12:53'),
(13288, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 66264437, 47000007, '09:12:53'),
(13289, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 77651337, 47000007, '09:12:53'),
(13290, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61120482, 47000007, '09:12:53'),
(13291, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29855673, 47000007, '09:12:53'),
(13292, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 67371872, 47000007, '09:12:53'),
(13293, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 52809008, 47000007, '09:12:53'),
(13294, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63069374, 47000007, '09:12:53'),
(13295, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 62227310, 47000007, '09:12:53'),
(13296, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27962116, 47000007, '09:12:53'),
(13297, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 91316934, 47000007, '09:12:53'),
(13298, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 80663589, 47000007, '09:12:53'),
(13299, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 57215310, 47000007, '09:12:53'),
(13300, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 71417212, 47000007, '09:12:53'),
(13301, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21453876, 47000007, '09:12:53'),
(13302, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 87658401, 47000007, '09:12:53'),
(13303, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 83877365, 47000007, '09:12:53'),
(13304, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11341164, 47000007, '09:12:53'),
(13305, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 35992953, 47000007, '09:12:53'),
(13306, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 13646189, 47000007, '09:12:53'),
(13307, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 69951894, 47000007, '09:12:53'),
(13308, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 93020976, 47000007, '09:12:53'),
(13309, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82584620, 47000007, '09:12:53'),
(13310, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 88155194, 47000007, '09:12:53'),
(13311, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 48631435, 47000007, '09:12:53'),
(13312, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 32145514, 47000007, '09:12:53'),
(13313, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24763570, 47000007, '09:12:53'),
(13314, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27349492, 47000007, '09:12:53'),
(13315, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 79682661, 47000007, '09:12:53'),
(13316, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76166717, 47000007, '09:12:53'),
(13317, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19901222, 47000007, '09:12:53'),
(13318, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 58301257, 47000007, '09:12:53'),
(13319, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 52363223, 47000007, '09:12:53'),
(13320, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 42506544, 47000007, '09:12:53'),
(13321, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 41424055, 47000007, '09:12:53'),
(13322, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 96527726, 47000007, '09:12:53'),
(13323, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 92107091, 47000007, '09:12:53'),
(13324, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 65494436, 47000007, '09:12:53'),
(13325, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 39580161, 47000007, '09:12:53'),
(13326, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63747943, 47000007, '09:12:53'),
(13327, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27935499, 47000007, '09:12:53'),
(13328, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37113293, 47000007, '09:12:53'),
(13329, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 49493291, 47000007, '09:12:53'),
(13330, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 69566184, 47000007, '09:12:53'),
(13331, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 43906583, 47000007, '09:12:53'),
(13332, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 20045536, 47000007, '09:12:53'),
(13333, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 62393691, 47000007, '09:12:53'),
(13334, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 48037493, 47000007, '09:12:53'),
(13335, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18388730, 47000007, '09:12:53'),
(13336, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 98053564, 47000007, '09:12:53'),
(13337, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 88829055, 47000007, '09:12:53'),
(13338, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 59517193, 47000007, '09:12:53'),
(13339, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37670872, 47000007, '09:12:53'),
(13340, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 20740968, 47000007, '09:12:53'),
(13341, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 86412561, 47000007, '09:12:53'),
(13342, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70067249, 47000007, '09:12:53'),
(13343, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 39457550, 47000007, '09:12:53'),
(13344, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61729426, 47000007, '09:12:53'),
(13345, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 87856060, 47000007, '09:12:53'),
(13346, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 17426311, 47000007, '09:12:53'),
(13347, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 60302070, 47000007, '09:12:53'),
(13348, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 73273037, 47000007, '09:12:53'),
(13349, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61489454, 47000007, '09:12:53'),
(13350, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18426890, 47000007, '09:12:53'),
(13351, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 83160306, 47000007, '09:12:53'),
(13352, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 72692427, 47000007, '09:12:53'),
(13353, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27623828, 47000007, '09:12:53'),
(13354, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 80729972, 47000007, '09:12:53'),
(13355, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 58186409, 47000007, '09:12:53'),
(13356, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 49488943, 47000007, '09:12:53'),
(13357, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 52573345, 47000007, '09:12:53'),
(13358, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 91106242, 47000007, '09:12:53'),
(13359, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 59770005, 47000007, '09:12:53'),
(13360, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 33023190, 47000007, '09:12:53'),
(13361, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 53667876, 47000007, '09:12:53'),
(13362, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 32249271, 47000007, '09:12:53'),
(13363, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 72143090, 47000007, '09:12:53'),
(13364, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 87161335, 47000007, '09:12:53'),
(13365, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 45748549, 47000007, '09:12:53'),
(13366, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76680051, 47000007, '09:12:53'),
(13367, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 28741240, 47000007, '09:12:53'),
(13368, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 36051928, 47000007, '09:12:53'),
(13369, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 68334477, 47000007, '09:12:53'),
(13370, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 92863028, 47000007, '09:12:53'),
(13371, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 14833123, 47000007, '09:12:53'),
(13372, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 71459719, 47000007, '09:12:53'),
(13373, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70542055, 47000007, '09:12:53'),
(13374, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 49158572, 47000007, '09:12:53'),
(13375, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 83475684, 47000007, '09:12:53'),
(13376, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 43087561, 47000007, '09:12:53'),
(13377, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 68442524, 47000007, '09:12:53'),
(13378, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 30798117, 47000007, '09:12:53'),
(13379, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 92217353, 47000007, '09:12:53'),
(13380, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61999349, 47000007, '09:12:53'),
(13381, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84154140, 47000007, '09:12:53'),
(13382, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29902252, 47000007, '09:12:53'),
(13383, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 51987648, 47000007, '09:12:53'),
(13384, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27023090, 47000007, '09:12:53'),
(13385, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 47864357, 47000007, '09:12:53'),
(13386, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 83130148, 47000007, '09:12:53'),
(13387, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70758991, 47000007, '09:12:53'),
(13388, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 54810958, 47000007, '09:12:53'),
(13389, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 80796543, 47000007, '09:12:53'),
(13390, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 77518333, 47000007, '09:12:53'),
(13391, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84341510, 47000007, '09:12:53'),
(13392, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 48013225, 47000007, '09:12:53'),
(13393, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70274930, 47000007, '09:12:53'),
(13394, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75801949, 47000007, '09:12:53'),
(13395, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 42844605, 47000007, '09:12:53'),
(13396, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 48876933, 47000007, '09:12:53'),
(13397, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 88197181, 47000007, '09:12:53'),
(13398, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 58212406, 47000007, '09:12:53'),
(13399, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 87035962, 47000007, '09:12:53'),
(13400, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 40221772, 47000007, '09:12:53'),
(13401, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 28431791, 47000007, '09:12:53'),
(13402, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 15927686, 47000007, '09:12:53'),
(13403, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 20388183, 47000007, '09:12:53'),
(13404, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 45381746, 47000007, '09:12:53'),
(13405, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 74804353, 47000007, '09:12:53'),
(13406, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24099467, 47000007, '09:12:53'),
(13407, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18548008, 47000007, '09:12:53'),
(13408, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70660100, 47000007, '09:12:53'),
(13409, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 91338757, 47000007, '09:12:53'),
(13410, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70469251, 47000007, '09:12:53'),
(13411, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 55307943, 47000007, '09:12:53'),
(13412, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95175151, 47000007, '09:12:53'),
(13413, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 22928413, 47000007, '09:12:53'),
(13414, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 92008557, 47000007, '09:12:53'),
(13415, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 23571008, 47000007, '09:12:53'),
(13416, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24746435, 47000007, '09:12:53'),
(13417, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 86928027, 47000007, '09:12:53'),
(13418, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 50359290, 47000007, '09:12:53'),
(13419, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 50405435, 47000007, '09:12:53'),
(13420, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 57813742, 47000007, '09:12:53'),
(13421, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 43561859, 47000007, '09:12:53'),
(13422, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 78553884, 47000007, '09:12:53'),
(13423, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 13725368, 47000007, '09:12:53'),
(13424, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63876026, 47000007, '09:12:53'),
(13425, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 96244394, 47000007, '09:12:53'),
(13426, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 20883227, 47000007, '09:12:53'),
(13427, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 26040347, 47000007, '09:12:53'),
(13428, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 20762507, 47000007, '09:12:53'),
(13429, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21503272, 47000007, '09:12:53'),
(13430, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11301096, 47000007, '09:12:53'),
(13431, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 57421224, 47000007, '09:12:53'),
(13432, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 86503155, 47000007, '09:12:53'),
(13433, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 16823578, 47000007, '09:12:53'),
(13434, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 50010202, 47000007, '09:12:53'),
(13435, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 23963628, 47000007, '09:12:53'),
(13436, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21836055, 47000007, '09:12:53'),
(13437, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 31097787, 47000007, '09:12:53'),
(13438, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75693593, 47000007, '09:12:53'),
(13439, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 14416829, 47000007, '09:12:53'),
(13440, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 78190775, 47000007, '09:12:53'),
(13441, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 36519090, 47000007, '09:12:53'),
(13442, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18749828, 47000007, '09:12:53'),
(13443, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 15783527, 47000007, '09:12:53'),
(13444, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 74463430, 47000007, '09:12:53'),
(13445, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 42497147, 47000007, '09:12:53'),
(13446, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 69801942, 47000007, '09:12:53'),
(13447, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 23532301, 47000007, '09:12:53'),
(13448, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24846650, 47000007, '09:12:53'),
(13449, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 26475511, 47000007, '09:12:53'),
(13450, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 96534202, 47000007, '09:12:53'),
(13451, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 83492334, 47000007, '09:12:53'),
(13452, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18758751, 47000007, '09:12:53'),
(13453, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 25581052, 47000007, '09:12:53'),
(13454, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 34880488, 47000007, '09:12:53'),
(13455, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 66448506, 47000007, '09:12:53'),
(13456, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 58082072, 47000007, '09:12:53'),
(13457, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 65342513, 47000007, '09:12:53'),
(13458, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 28992788, 47000007, '09:12:53'),
(13459, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29779461, 47000007, '09:12:53'),
(13460, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 59639936, 47000007, '09:12:53'),
(13461, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18229278, 47000007, '09:12:53'),
(13462, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 49014792, 47000007, '09:12:53'),
(13463, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63297379, 47000007, '09:12:53'),
(13464, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75893332, 47000007, '09:12:53'),
(13465, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 97081927, 47000007, '09:12:53'),
(13466, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82407011, 47000007, '09:12:53'),
(13467, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84336696, 47000007, '09:12:53'),
(13468, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 89431050, 47000007, '09:12:53'),
(13469, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 78664806, 47000007, '09:12:53'),
(13470, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29670747, 47000007, '09:12:53'),
(13471, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 34589010, 47000007, '09:12:53'),
(13472, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 22236464, 47000007, '09:12:53'),
(13473, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 99060531, 47000007, '09:12:53'),
(13474, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 22558318, 47000007, '09:12:53'),
(13475, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19811384, 47000007, '09:12:53'),
(13476, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 56879518, 47000007, '09:12:53'),
(13477, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 66733811, 47000007, '09:12:53'),
(13478, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24367162, 47000007, '09:12:53'),
(13479, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 46780751, 47000007, '09:12:53'),
(13480, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 35236088, 47000007, '09:12:53'),
(13481, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 25032313, 47000007, '09:12:53'),
(13482, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94171406, 47000007, '09:12:53'),
(13483, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 92368721, 47000007, '09:12:53'),
(13484, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 16042218, 47000007, '09:12:53'),
(13485, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 98450564, 47000007, '09:12:53'),
(13486, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24579808, 47000007, '09:12:53'),
(13487, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 90934467, 47000007, '09:12:53'),
(13488, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 41877245, 47000007, '09:12:53'),
(13489, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 39051206, 47000007, '09:12:53'),
(13490, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 16095073, 47000007, '09:12:53'),
(13491, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 45614658, 47000007, '09:12:53'),
(13492, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 33543217, 47000007, '09:12:53'),
(13493, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 22219736, 47000007, '09:12:53'),
(13494, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 77500596, 47000007, '09:12:53'),
(13495, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24324304, 47000007, '09:12:53'),
(13496, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 73470293, 47000007, '09:12:53'),
(13497, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94577336, 47000007, '09:12:53'),
(13498, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 71502340, 47000007, '09:12:53'),
(13499, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 72402974, 47000007, '09:12:53'),
(13500, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37267341, 47000007, '09:12:53'),
(13501, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75283074, 47000007, '09:12:53'),
(13502, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27002812, 47000007, '09:12:53'),
(13503, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 93811673, 47000007, '09:12:53'),
(13504, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 62962708, 47000007, '09:12:53'),
(13505, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63621816, 47000007, '09:12:53'),
(13506, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 48132119, 47000007, '09:12:53'),
(13507, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61177661, 47000007, '09:12:53'),
(13508, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 74867161, 47000007, '09:12:53'),
(13509, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 57975625, 47000007, '09:12:53'),
(13510, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 39706156, 47000007, '09:12:53'),
(13511, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 49478800, 47000007, '09:12:53'),
(13512, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 89518192, 47000007, '09:12:53'),
(13513, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 38602464, 47000007, '09:12:53'),
(13514, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 88062330, 47000007, '09:12:53'),
(13515, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 62466469, 47000007, '09:12:53'),
(13516, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 10367261, 47000007, '09:12:53'),
(13517, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63827638, 47000007, '09:12:53'),
(13518, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 43258174, 47000007, '09:12:53'),
(13519, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 32409465, 47000007, '09:12:53'),
(13520, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27754071, 47000007, '09:12:53'),
(13521, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 97551448, 47000007, '09:12:53'),
(13522, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 93471762, 47000007, '09:12:53'),
(13523, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 23563034, 47000007, '09:12:53'),
(13524, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 69570801, 47000007, '09:12:53'),
(13525, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 64313937, 47000007, '09:12:53'),
(13526, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 99164430, 47000007, '09:12:53'),
(13527, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 85094084, 47000007, '09:12:53'),
(13528, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 97901149, 47000007, '09:12:53'),
(13529, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 70698377, 47000007, '09:12:53'),
(13530, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76660117, 47000007, '09:12:53'),
(13531, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24756021, 47000007, '09:12:53'),
(13532, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 91244454, 47000007, '09:12:53'),
(13533, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18321826, 47000007, '09:12:53'),
(13534, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 15114510, 47000007, '09:12:53'),
(13535, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 22113679, 47000007, '09:12:53'),
(13536, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84163263, 47000007, '09:12:53'),
(13537, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75528788, 47000007, '09:12:53'),
(13538, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 95130318, 47000007, '09:12:53'),
(13539, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 14179524, 47000007, '09:12:53'),
(13540, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75211474, 47000007, '09:12:53'),
(13541, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 46271967, 47000007, '09:12:53'),
(13542, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 77162765, 47000007, '09:12:53'),
(13543, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94126058, 47000007, '09:12:53'),
(13544, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 54000357, 47000007, '09:12:53'),
(13545, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 91762712, 47000007, '09:12:53'),
(13546, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11482309, 47000007, '09:12:53'),
(13547, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 74219610, 47000007, '09:12:53'),
(13548, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 87933459, 47000007, '09:12:53'),
(13549, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 89817416, 47000007, '09:12:53'),
(13550, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 44304531, 47000007, '09:12:53'),
(13551, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 40986981, 47000007, '09:12:53'),
(13552, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 34769546, 47000007, '09:12:53'),
(13553, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 85794582, 47000007, '09:12:53'),
(13554, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24637722, 47000007, '09:12:53'),
(13555, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 78415691, 47000007, '09:12:53'),
(13556, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 52454413, 47000007, '09:12:53'),
(13557, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 52479864, 47000007, '09:12:53'),
(13558, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 42272056, 47000007, '09:12:53'),
(13559, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 53875287, 47000007, '09:12:53'),
(13560, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11812691, 47000007, '09:12:53'),
(13561, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24899421, 47000007, '09:12:53'),
(13562, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94235099, 47000007, '09:12:53'),
(13563, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21262234, 47000007, '09:12:53'),
(13564, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 90403528, 47000007, '09:12:53'),
(13565, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84281560, 47000007, '09:12:53'),
(13566, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18342674, 47000007, '09:12:53'),
(13567, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19384358, 47000007, '09:12:53'),
(13568, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 73537632, 47000007, '09:12:53'),
(13569, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 80251311, 47000007, '09:12:53'),
(13570, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 77625327, 47000007, '09:12:53'),
(13571, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 83849222, 47000007, '09:12:53'),
(13572, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 35595072, 47000007, '09:12:53'),
(13573, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82240243, 47000007, '09:12:53'),
(13574, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84705923, 47000007, '09:12:53'),
(13575, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 77557243, 47000007, '09:12:53'),
(13576, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94649518, 47000007, '09:12:53'),
(13577, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29625314, 47000007, '09:12:53'),
(13578, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75563134, 47000007, '09:12:53'),
(13579, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21068935, 47000007, '09:12:53'),
(13580, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 68904949, 47000007, '09:12:53'),
(13581, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 45694981, 47000007, '09:12:53'),
(13582, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19919229, 47000007, '09:12:53'),
(13583, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 17900728, 47000007, '09:12:53'),
(13584, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 65234886, 47000007, '09:12:53'),
(13585, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 16486895, 47000007, '09:12:53'),
(13586, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21849999, 47000007, '09:12:53'),
(13587, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82692914, 47000007, '09:12:53'),
(13588, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 53930844, 47000007, '09:12:53'),
(13589, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 69263885, 47000007, '09:12:53'),
(13590, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 59750772, 47000007, '09:12:53'),
(13591, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19350412, 47000007, '09:12:53'),
(13592, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 49456698, 47000007, '09:12:53'),
(13593, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 10338926, 47000007, '09:12:53'),
(13594, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 41755488, 47000007, '09:12:53'),
(13595, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94508962, 47000007, '09:12:53'),
(13596, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 62955576, 47000007, '09:12:53'),
(13597, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 31314414, 47000007, '09:12:53'),
(13598, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63539274, 47000007, '09:12:53'),
(13599, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 83300403, 47000007, '09:12:53'),
(13600, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 69394853, 47000007, '09:12:53'),
(13601, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29417320, 47000007, '09:12:53'),
(13602, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 56119207, 47000007, '09:12:53'),
(13603, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 52786562, 47000007, '09:12:53'),
(13604, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 84993731, 47000007, '09:12:53'),
(13605, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 36343849, 47000007, '09:12:53'),
(13606, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 60825566, 47000007, '09:12:53'),
(13607, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 79647163, 47000007, '09:12:53'),
(13608, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94525169, 47000007, '09:12:53'),
(13609, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 31084765, 47000007, '09:12:53'),
(13610, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 31434822, 47000007, '09:12:53'),
(13611, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37739801, 47000007, '09:12:53'),
(13612, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 52086712, 47000007, '09:12:53'),
(13613, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 48779637, 47000007, '09:12:53'),
(13614, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37444487, 47000007, '09:12:53'),
(13615, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 28439518, 47000007, '09:12:53'),
(13616, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 19476133, 47000007, '09:12:53');
INSERT INTO `tinvoicecreate1` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `assetid`, `del`, `time`) VALUES
(13617, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 44241133, 47000007, '09:12:53'),
(13618, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29906079, 47000007, '09:12:53'),
(13619, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63551331, 47000007, '09:12:53'),
(13620, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76625528, 47000007, '09:12:53'),
(13621, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 41139392, 47000007, '09:12:53'),
(13622, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 36788261, 47000007, '09:12:53'),
(13623, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 50039208, 47000007, '09:12:53'),
(13624, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61929230, 47000007, '09:12:53'),
(13625, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29419496, 47000007, '09:12:53'),
(13626, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 60962633, 47000007, '09:12:53'),
(13627, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 96894932, 47000007, '09:12:53'),
(13628, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 41780649, 47000007, '09:12:53'),
(13629, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 34290570, 47000007, '09:12:53'),
(13630, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 67654740, 47000007, '09:12:53'),
(13631, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 97011946, 47000007, '09:12:53'),
(13632, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 88356435, 47000007, '09:12:53'),
(13633, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 17237700, 47000007, '09:12:53'),
(13634, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 82422667, 47000007, '09:12:53'),
(13635, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75414598, 47000007, '09:12:53'),
(13636, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 23129963, 47000007, '09:12:53'),
(13637, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 21524034, 47000007, '09:12:53'),
(13638, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 46616457, 47000007, '09:12:53'),
(13639, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 36314469, 47000007, '09:12:53'),
(13640, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 39111588, 47000007, '09:12:53'),
(13641, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 98018659, 47000007, '09:12:53'),
(13642, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 97733141, 47000007, '09:12:53'),
(13643, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 16245298, 47000007, '09:12:53'),
(13644, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 29538474, 47000007, '09:12:53'),
(13645, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 99667090, 47000007, '09:12:53'),
(13646, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 94021849, 47000007, '09:12:53'),
(13647, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75697014, 47000007, '09:12:53'),
(13648, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 86463836, 47000007, '09:12:53'),
(13649, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 31516792, 47000007, '09:12:53'),
(13650, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 45505606, 47000007, '09:12:53'),
(13651, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 25366442, 47000007, '09:12:53'),
(13652, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 26008398, 47000007, '09:12:53'),
(13653, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 67553243, 47000007, '09:12:53'),
(13654, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18829064, 47000007, '09:12:53'),
(13655, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 62162501, 47000007, '09:12:53'),
(13656, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 63131387, 47000007, '09:12:53'),
(13657, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 58613118, 47000007, '09:12:53'),
(13658, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 90095113, 47000007, '09:12:53'),
(13659, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 96335322, 47000007, '09:12:53'),
(13660, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11045128, 47000007, '09:12:53'),
(13661, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 56126208, 47000007, '09:12:53'),
(13662, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75038643, 47000007, '09:12:53'),
(13663, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 27657892, 47000007, '09:12:53'),
(13664, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 75388577, 47000007, '09:12:53'),
(13665, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 99496976, 47000007, '09:12:53'),
(13666, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 81288333, 47000007, '09:12:53'),
(13667, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 64451905, 47000007, '09:12:53'),
(13668, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 36814857, 47000007, '09:12:53'),
(13669, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18957070, 47000007, '09:12:53'),
(13670, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 88080350, 47000007, '09:12:53'),
(13671, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 41803811, 47000007, '09:12:53'),
(13672, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 87836846, 47000007, '09:12:53'),
(13673, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 34936995, 47000007, '09:12:53'),
(13674, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 15473874, 47000007, '09:12:53'),
(13675, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 30426164, 47000007, '09:12:53'),
(13676, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11310702, 47000007, '09:12:53'),
(13677, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 48092082, 47000007, '09:12:53'),
(13678, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 24599376, 47000007, '09:12:53'),
(13679, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 37359106, 47000007, '09:12:53'),
(13680, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 43094991, 47000007, '09:12:53'),
(13681, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 61111666, 47000007, '09:12:53'),
(13682, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 11400491, 47000007, '09:12:53'),
(13683, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 18233449, 47000007, '09:12:53'),
(13684, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 57109131, 47000007, '09:12:53'),
(13685, 'laptop, grey', '', '2022-05-17 06:12:57', '', '', 566, '', 67, 37922, 0, 97885, 76186678, 47000007, '09:12:53'),
(13686, 'desktop, silver', '', '2022-05-17 06:13:34', '', '', 2, '', 456, 912, 0, 87080, 66301037, 53428554, '09:13:32'),
(13687, 'desktop, silver', '', '2022-05-17 06:13:34', '', '', 2, '', 456, 912, 0, 87080, 40263024, 53428554, '09:13:32'),
(13688, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 43127524, 53958897, '09:14:18'),
(13689, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 20573027, 53958897, '09:14:18'),
(13690, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 53260172, 53958897, '09:14:18'),
(13691, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 59880844, 53958897, '09:14:18'),
(13692, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 23119544, 53958897, '09:14:18'),
(13693, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 41652455, 53958897, '09:14:18'),
(13694, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 55857131, 53958897, '09:14:18'),
(13695, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 42804842, 53958897, '09:14:18'),
(13696, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 50357214, 53958897, '09:14:18'),
(13697, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:14:19', '', '', 10, '', 567, 5670, 0, 65656, 46989271, 53958897, '09:14:18'),
(13698, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 43476982, 68103232, '09:14:52'),
(13699, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 61107103, 68103232, '09:14:52'),
(13700, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 80401286, 68103232, '09:14:52'),
(13701, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 64104041, 68103232, '09:14:52'),
(13702, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 95672934, 68103232, '09:14:52'),
(13703, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 99376570, 68103232, '09:14:52'),
(13704, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 64769896, 68103232, '09:14:52'),
(13705, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 88236602, 68103232, '09:14:52'),
(13706, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 68900652, 68103232, '09:14:52'),
(13707, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 78712283, 68103232, '09:14:52'),
(13708, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 99726975, 68103232, '09:14:52'),
(13709, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 33419323, 68103232, '09:14:52'),
(13710, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 38817440, 68103232, '09:14:52'),
(13711, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 99146859, 68103232, '09:14:52'),
(13712, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 15555132, 68103232, '09:14:52'),
(13713, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 28930280, 68103232, '09:14:52'),
(13714, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 81336649, 68103232, '09:14:52'),
(13715, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 78274532, 68103232, '09:14:52'),
(13716, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 61574643, 68103232, '09:14:52'),
(13717, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 59029524, 68103232, '09:14:52'),
(13718, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 93005726, 68103232, '09:14:52'),
(13719, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 54770416, 68103232, '09:14:52'),
(13720, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 33851910, 68103232, '09:14:52'),
(13721, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 99720191, 68103232, '09:14:52'),
(13722, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 37586424, 68103232, '09:14:52'),
(13723, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 95955437, 68103232, '09:14:52'),
(13724, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 11480440, 68103232, '09:14:52'),
(13725, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 19244474, 68103232, '09:14:52'),
(13726, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 71581863, 68103232, '09:14:52'),
(13727, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 24058830, 68103232, '09:14:52'),
(13728, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 13707328, 68103232, '09:14:52'),
(13729, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 18150785, 68103232, '09:14:52'),
(13730, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 34933669, 68103232, '09:14:52'),
(13731, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 86260901, 68103232, '09:14:52'),
(13732, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 34188983, 68103232, '09:14:52'),
(13733, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 46959441, 68103232, '09:14:52'),
(13734, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 87095824, 68103232, '09:14:52'),
(13735, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 89329903, 68103232, '09:14:52'),
(13736, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 13920105, 68103232, '09:14:52'),
(13737, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 16014245, 68103232, '09:14:52'),
(13738, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 56900792, 68103232, '09:14:52'),
(13739, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 78342482, 68103232, '09:14:52'),
(13740, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 88614281, 68103232, '09:14:52'),
(13741, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 56873909, 68103232, '09:14:52'),
(13742, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 51096757, 68103232, '09:14:52'),
(13743, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 18195344, 68103232, '09:14:52'),
(13744, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 81914402, 68103232, '09:14:52'),
(13745, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 24102261, 68103232, '09:14:52'),
(13746, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 26504943, 68103232, '09:14:52'),
(13747, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 06:14:54', '', '', 50, '', 567, 28350, 0, 84199, 71526532, 68103232, '09:14:52'),
(13797, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:18:45', '', '', 50, '', 4567, 228350, 0, 59650, 42889516, 11932637, '09:15:33'),
(13798, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:33:05', '', '', 1, '', 456, 456, 0, 89191, 72093795, 38420361, '09:19:17'),
(13808, 'desktop, silver', '', '2022-05-17 06:55:09', '', '', 10, '', 456, 4560, 0, 44525, 72482338, 70083806, '09:28:53'),
(13809, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 14939315, 88901738, '09:29:27'),
(13810, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 34045301, 88901738, '09:29:27'),
(13811, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 64962580, 88901738, '09:29:27'),
(13812, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 93947131, 88901738, '09:29:27'),
(13813, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 50573053, 88901738, '09:29:27'),
(13814, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 10185888, 88901738, '09:29:27'),
(13815, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 24819598, 88901738, '09:29:27'),
(13816, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 23466516, 88901738, '09:29:27'),
(13817, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 99933056, 88901738, '09:29:27'),
(13818, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:29:29', '', '', 10, '', 4666, 46660, 0, 83613, 56151534, 88901738, '09:29:27'),
(13819, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 34828250, 49255150, '09:30:55'),
(13820, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 70658886, 49255150, '09:30:55'),
(13821, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 58616258, 49255150, '09:30:55'),
(13822, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 76894213, 49255150, '09:30:55'),
(13823, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 95557883, 49255150, '09:30:55'),
(13824, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 34752949, 49255150, '09:30:55'),
(13825, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 77902525, 49255150, '09:30:55'),
(13826, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 34627258, 49255150, '09:30:55'),
(13827, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 61156318, 49255150, '09:30:55'),
(13828, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:32:47', '', '', 10, '', 456, 4560, 0, 89703, 75382384, 49255150, '09:30:55'),
(13829, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 28260284, 62980740, '09:33:23'),
(13830, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 74279832, 62980740, '09:33:23'),
(13831, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 43588705, 62980740, '09:33:23'),
(13832, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 14057138, 62980740, '09:33:23'),
(13833, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 96372481, 62980740, '09:33:23'),
(13834, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 71010430, 62980740, '09:33:23'),
(13835, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 11489439, 62980740, '09:33:23'),
(13836, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 80546868, 62980740, '09:33:23'),
(13837, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 46507995, 62980740, '09:33:23'),
(13838, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 70224863, 62980740, '09:33:23'),
(13839, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 27668539, 62980740, '09:33:23'),
(13840, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 58667783, 62980740, '09:33:23'),
(13841, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 43384332, 62980740, '09:33:23'),
(13842, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 16251881, 62980740, '09:33:23'),
(13843, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 32906768, 62980740, '09:33:23'),
(13844, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 28758311, 62980740, '09:33:23'),
(13845, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 72157664, 62980740, '09:33:23'),
(13846, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 49483897, 62980740, '09:33:23'),
(13847, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 54814229, 62980740, '09:33:23'),
(13848, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 44387679, 62980740, '09:33:23'),
(13849, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 38101419, 62980740, '09:33:23'),
(13850, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 11634520, 62980740, '09:33:23'),
(13851, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 37254891, 62980740, '09:33:23'),
(13852, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 35175491, 62980740, '09:33:23'),
(13853, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 43436489, 62980740, '09:33:23'),
(13854, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 21749906, 62980740, '09:33:23'),
(13855, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 15489374, 62980740, '09:33:23'),
(13856, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 14323431, 62980740, '09:33:23'),
(13857, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 34797613, 62980740, '09:33:23'),
(13858, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 79068530, 62980740, '09:33:23'),
(13859, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 82801371, 62980740, '09:33:23'),
(13860, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 59152491, 62980740, '09:33:23'),
(13861, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 42277363, 62980740, '09:33:23'),
(13862, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 11352437, 62980740, '09:33:23'),
(13863, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 85570254, 62980740, '09:33:23'),
(13864, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 22345400, 62980740, '09:33:23'),
(13865, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 16681166, 62980740, '09:33:23'),
(13866, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 63419883, 62980740, '09:33:23'),
(13867, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 15638107, 62980740, '09:33:23'),
(13868, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 59977881, 62980740, '09:33:23'),
(13869, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 22546404, 62980740, '09:33:23'),
(13870, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 81410638, 62980740, '09:33:23'),
(13871, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 76266918, 62980740, '09:33:23'),
(13872, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 45001211, 62980740, '09:33:23'),
(13873, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 86435507, 62980740, '09:33:23'),
(13874, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 90150111, 62980740, '09:33:23'),
(13875, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 74177519, 62980740, '09:33:23'),
(13876, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 65720736, 62980740, '09:33:23'),
(13877, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 85695581, 62980740, '09:33:23'),
(13878, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:33:29', '', '', 50, '', 456, 22800, 0, 42139, 99347213, 62980740, '09:33:23'),
(13888, 'desktop, silver', '', '2022-05-17 06:54:44', '', '', 10, '', 5678, 56780, 0, 39185, 56997217, 48838101, '09:48:39'),
(13889, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 06:54:31', '', '', 1, '', 567, 567, 0, 16927, 43145889, 86570324, '09:54:03'),
(13890, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 47920838, 72911458, '09:55:33'),
(13891, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 96340682, 72911458, '09:55:33'),
(13892, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 71250331, 72911458, '09:55:33'),
(13893, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 44922047, 72911458, '09:55:33'),
(13894, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 28003699, 72911458, '09:55:33'),
(13895, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 32505347, 72911458, '09:55:33'),
(13896, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 24617574, 72911458, '09:55:33'),
(13897, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 95379513, 72911458, '09:55:33'),
(13898, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 65738291, 72911458, '09:55:33'),
(13899, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 06:55:35', '', '', 10, '', 54, 540, 0, 86714, 20251770, 72911458, '09:55:33'),
(13900, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 43584365, 98979598, '10:19:49'),
(13901, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 63194480, 98979598, '10:19:49'),
(13902, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 89008355, 98979598, '10:19:49'),
(13903, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 30008601, 98979598, '10:19:49'),
(13904, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 65585276, 98979598, '10:19:49'),
(13905, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 84693558, 98979598, '10:19:49'),
(13906, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 53108968, 98979598, '10:19:49'),
(13907, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 49111267, 98979598, '10:19:49'),
(13908, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 88439533, 98979598, '10:19:49'),
(13909, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:19:51', '', '', 10, '', 56, 560, 0, 99760, 92669789, 98979598, '10:19:49'),
(13910, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 14443221, 17625872, '10:21:02'),
(13911, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 80746998, 17625872, '10:21:02'),
(13912, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 37681214, 17625872, '10:21:02'),
(13913, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 94681964, 17625872, '10:21:02'),
(13914, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 28300452, 17625872, '10:21:02'),
(13915, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 21670811, 17625872, '10:21:02'),
(13916, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 14190691, 17625872, '10:21:02'),
(13917, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 51826913, 17625872, '10:21:02'),
(13918, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 31168515, 17625872, '10:21:02'),
(13919, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:21:04', '', '', 10, '', 678, 6780, 0, 68889, 79478403, 17625872, '10:21:02'),
(13920, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 72713137, 87570636, '10:22:29'),
(13921, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 15629277, 87570636, '10:22:29'),
(13922, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 27941099, 87570636, '10:22:29'),
(13923, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 20890466, 87570636, '10:22:29'),
(13924, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 16221915, 87570636, '10:22:29'),
(13925, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 27318028, 87570636, '10:22:29'),
(13926, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 62008734, 87570636, '10:22:29'),
(13927, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 63484046, 87570636, '10:22:29'),
(13928, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 71779448, 87570636, '10:22:29'),
(13929, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 20431933, 87570636, '10:22:29'),
(13930, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 66061335, 87570636, '10:22:29'),
(13931, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 21285952, 87570636, '10:22:29'),
(13932, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 96927062, 87570636, '10:22:29'),
(13933, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 48055182, 87570636, '10:22:29'),
(13934, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 47239171, 87570636, '10:22:29'),
(13935, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 33614288, 87570636, '10:22:29'),
(13936, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 37491888, 87570636, '10:22:29'),
(13937, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 20493560, 87570636, '10:22:29'),
(13938, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 37517301, 87570636, '10:22:29'),
(13939, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 78259473, 87570636, '10:22:29'),
(13940, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 60861625, 87570636, '10:22:29'),
(13941, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 58076802, 87570636, '10:22:29'),
(13942, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 97700438, 87570636, '10:22:29'),
(13943, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 18668087, 87570636, '10:22:29'),
(13944, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 47529074, 87570636, '10:22:29'),
(13945, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 74548009, 87570636, '10:22:29'),
(13946, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 31079432, 87570636, '10:22:29'),
(13947, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 49042623, 87570636, '10:22:29'),
(13948, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 59601572, 87570636, '10:22:29'),
(13949, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 95886199, 87570636, '10:22:29'),
(13950, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 43308498, 87570636, '10:22:29'),
(13951, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 77543517, 87570636, '10:22:29'),
(13952, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 88617609, 87570636, '10:22:29'),
(13953, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 16401301, 87570636, '10:22:29'),
(13954, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 50570375, 87570636, '10:22:29'),
(13955, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 55847883, 87570636, '10:22:29'),
(13956, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 47709551, 87570636, '10:22:29'),
(13957, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 11257166, 87570636, '10:22:29'),
(13958, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 87253170, 87570636, '10:22:29'),
(13959, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 90830469, 87570636, '10:22:29'),
(13960, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 71178415, 87570636, '10:22:29'),
(13961, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 14349574, 87570636, '10:22:29'),
(13962, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 28214582, 87570636, '10:22:29'),
(13963, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 43904518, 87570636, '10:22:29'),
(13964, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 18109811, 87570636, '10:22:29'),
(13965, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 75578431, 87570636, '10:22:29'),
(13966, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 30884625, 87570636, '10:22:29'),
(13967, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 30594852, 87570636, '10:22:29'),
(13968, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 28525007, 87570636, '10:22:29'),
(13969, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:23:44', '', '', 50, '', 56, 2800, 0, 75734, 30326098, 87570636, '10:22:29'),
(13970, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 74486877, 65740107, '10:24:45'),
(13971, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 77843423, 65740107, '10:24:45'),
(13972, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 93402798, 65740107, '10:24:45'),
(13973, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 12937861, 65740107, '10:24:45'),
(13974, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 82653839, 65740107, '10:24:45'),
(13975, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 34318582, 65740107, '10:24:45'),
(13976, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 65207412, 65740107, '10:24:45'),
(13977, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 69459885, 65740107, '10:24:45'),
(13978, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 76988391, 65740107, '10:24:45'),
(13979, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 58102165, 65740107, '10:24:45'),
(13980, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 11102009, 65740107, '10:24:45'),
(13981, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 51855987, 65740107, '10:24:45'),
(13982, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 39627425, 65740107, '10:24:45'),
(13983, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 78767998, 65740107, '10:24:45'),
(13984, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 77273348, 65740107, '10:24:45'),
(13985, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 32208660, 65740107, '10:24:45'),
(13986, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 98692193, 65740107, '10:24:45'),
(13987, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 77519758, 65740107, '10:24:45'),
(13988, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 47358613, 65740107, '10:24:45'),
(13989, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:44:57', '', '', 20, '', 678, 13560, 0, 22248, 37507285, 65740107, '10:24:45'),
(13990, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 32512769, 92626370, '10:45:30'),
(13991, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 93493149, 92626370, '10:45:30'),
(13992, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 52674300, 92626370, '10:45:30'),
(13993, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 26058958, 92626370, '10:45:30'),
(13994, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 73603566, 92626370, '10:45:30'),
(13995, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 17049095, 92626370, '10:45:30'),
(13996, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 57436632, 92626370, '10:45:30'),
(13997, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 39359483, 92626370, '10:45:30'),
(13998, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 21439247, 92626370, '10:45:30'),
(13999, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 55988791, 92626370, '10:45:30'),
(14000, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 97232917, 92626370, '10:45:30'),
(14001, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 46910481, 92626370, '10:45:30'),
(14002, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 56972086, 92626370, '10:45:30'),
(14003, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 19174334, 92626370, '10:45:30'),
(14004, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 82128550, 92626370, '10:45:30'),
(14005, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 35897760, 92626370, '10:45:30'),
(14006, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 67770849, 92626370, '10:45:30'),
(14007, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 48268179, 92626370, '10:45:30'),
(14008, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 43095092, 92626370, '10:45:30'),
(14009, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 35151405, 92626370, '10:45:30'),
(14010, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 12700440, 92626370, '10:45:30'),
(14011, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 53003147, 92626370, '10:45:30'),
(14012, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 13973004, 92626370, '10:45:30'),
(14013, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 94812298, 92626370, '10:45:30'),
(14014, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 84972786, 92626370, '10:45:30'),
(14015, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 79625750, 92626370, '10:45:30'),
(14016, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 60234428, 92626370, '10:45:30'),
(14017, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 76642040, 92626370, '10:45:30'),
(14018, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 21877634, 92626370, '10:45:30'),
(14019, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 19519747, 92626370, '10:45:30'),
(14020, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 66476093, 92626370, '10:45:30'),
(14021, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 24031997, 92626370, '10:45:30'),
(14022, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 75405154, 92626370, '10:45:30'),
(14023, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 37745587, 92626370, '10:45:30'),
(14024, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 74156009, 92626370, '10:45:30'),
(14025, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 25526283, 92626370, '10:45:30'),
(14026, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 10919723, 92626370, '10:45:30'),
(14027, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 75683815, 92626370, '10:45:30'),
(14028, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 95279096, 92626370, '10:45:30'),
(14029, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 16663992, 92626370, '10:45:30'),
(14030, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 75865229, 92626370, '10:45:30'),
(14031, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 38149793, 92626370, '10:45:30'),
(14032, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 59868901, 92626370, '10:45:30'),
(14033, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 99025248, 92626370, '10:45:30'),
(14034, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 95456790, 92626370, '10:45:30'),
(14035, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 55181573, 92626370, '10:45:30'),
(14036, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 45405840, 92626370, '10:45:30'),
(14037, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 90674321, 92626370, '10:45:30'),
(14038, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 43010609, 92626370, '10:45:30'),
(14039, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 07:47:30', '', '', 50, '', 78, 3900, 0, 85965, 56524523, 92626370, '10:45:30'),
(14040, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 94041582, 86193048, '10:48:03'),
(14041, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 70206046, 86193048, '10:48:03'),
(14042, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 84034733, 86193048, '10:48:03'),
(14043, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 85325201, 86193048, '10:48:03'),
(14044, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 48381075, 86193048, '10:48:03'),
(14045, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 99894608, 86193048, '10:48:03'),
(14046, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 44886950, 86193048, '10:48:03'),
(14047, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 93542106, 86193048, '10:48:03'),
(14048, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 13954336, 86193048, '10:48:03'),
(14049, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 33644573, 86193048, '10:48:03'),
(14050, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 22986017, 86193048, '10:48:03'),
(14051, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 62020119, 86193048, '10:48:03'),
(14052, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 73916887, 86193048, '10:48:03'),
(14053, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 11376365, 86193048, '10:48:03'),
(14054, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 12461336, 86193048, '10:48:03'),
(14055, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 20189899, 86193048, '10:48:03'),
(14056, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 78913816, 86193048, '10:48:03'),
(14057, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 95477516, 86193048, '10:48:03'),
(14058, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 56390029, 86193048, '10:48:03'),
(14059, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 94097260, 86193048, '10:48:03'),
(14060, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 14491066, 86193048, '10:48:03'),
(14061, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 42696013, 86193048, '10:48:03'),
(14062, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 25443492, 86193048, '10:48:03'),
(14063, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 19264713, 86193048, '10:48:03');
INSERT INTO `tinvoicecreate1` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `assetid`, `del`, `time`) VALUES
(14064, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 92040867, 86193048, '10:48:03'),
(14065, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 62246372, 86193048, '10:48:03'),
(14066, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 94893135, 86193048, '10:48:03'),
(14067, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 19556685, 86193048, '10:48:03'),
(14068, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 57497204, 86193048, '10:48:03'),
(14069, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 62767329, 86193048, '10:48:03'),
(14070, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 25025290, 86193048, '10:48:03'),
(14071, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 39290799, 86193048, '10:48:03'),
(14072, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 14399062, 86193048, '10:48:03'),
(14073, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 77114070, 86193048, '10:48:03'),
(14074, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 91268948, 86193048, '10:48:03'),
(14075, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 18222983, 86193048, '10:48:03'),
(14076, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 32307992, 86193048, '10:48:03'),
(14077, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 28217295, 86193048, '10:48:03'),
(14078, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 27176129, 86193048, '10:48:03'),
(14079, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 64050382, 86193048, '10:48:03'),
(14080, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 71855855, 86193048, '10:48:03'),
(14081, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 87348118, 86193048, '10:48:03'),
(14082, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 69304791, 86193048, '10:48:03'),
(14083, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 91231336, 86193048, '10:48:03'),
(14084, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 23583320, 86193048, '10:48:03'),
(14085, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 80058113, 86193048, '10:48:03'),
(14086, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 57163878, 86193048, '10:48:03'),
(14087, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 50873893, 86193048, '10:48:03'),
(14088, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 49745874, 86193048, '10:48:03'),
(14089, 'laptop, grey', '', '2022-05-17 07:48:05', '', '', 50, '', 678, 33900, 0, 42214, 45487694, 86193048, '10:48:03'),
(14090, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 28125734, 27247195, '10:48:51'),
(14091, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 87801279, 27247195, '10:48:51'),
(14092, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 34312673, 27247195, '10:48:51'),
(14093, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 75777596, 27247195, '10:48:51'),
(14094, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 44513957, 27247195, '10:48:51'),
(14095, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 51898837, 27247195, '10:48:51'),
(14096, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 69717190, 27247195, '10:48:51'),
(14097, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 95640159, 27247195, '10:48:51'),
(14098, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 29212977, 27247195, '10:48:51'),
(14099, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 30013595, 27247195, '10:48:51'),
(14100, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 13054280, 27247195, '10:48:51'),
(14101, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 56069580, 27247195, '10:48:51'),
(14102, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 49597771, 27247195, '10:48:51'),
(14103, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 22594229, 27247195, '10:48:51'),
(14104, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 12407853, 27247195, '10:48:51'),
(14105, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 97618995, 27247195, '10:48:51'),
(14106, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 76652737, 27247195, '10:48:51'),
(14107, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 94370655, 27247195, '10:48:51'),
(14108, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 26398000, 27247195, '10:48:51'),
(14109, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 50081301, 27247195, '10:48:51'),
(14110, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 81053393, 27247195, '10:48:51'),
(14111, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 40389951, 27247195, '10:48:51'),
(14112, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 94581493, 27247195, '10:48:51'),
(14113, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 39434343, 27247195, '10:48:51'),
(14114, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 26309120, 27247195, '10:48:51'),
(14115, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 71842527, 27247195, '10:48:51'),
(14116, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 83262917, 27247195, '10:48:51'),
(14117, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 28235897, 27247195, '10:48:51'),
(14118, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 78913843, 27247195, '10:48:51'),
(14119, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 41904403, 27247195, '10:48:51'),
(14120, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 42488886, 27247195, '10:48:51'),
(14121, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 98159519, 27247195, '10:48:51'),
(14122, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 78850569, 27247195, '10:48:51'),
(14123, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 78366673, 27247195, '10:48:51'),
(14124, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 43042604, 27247195, '10:48:51'),
(14125, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 99974136, 27247195, '10:48:51'),
(14126, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 72591028, 27247195, '10:48:51'),
(14127, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 92634464, 27247195, '10:48:51'),
(14128, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 97096356, 27247195, '10:48:51'),
(14129, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 17763397, 27247195, '10:48:51'),
(14130, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 70950147, 27247195, '10:48:51'),
(14131, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 17650996, 27247195, '10:48:51'),
(14132, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 14193886, 27247195, '10:48:51'),
(14133, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 57001735, 27247195, '10:48:51'),
(14134, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 90169756, 27247195, '10:48:51'),
(14135, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 53705224, 27247195, '10:48:51'),
(14136, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 37746980, 27247195, '10:48:51'),
(14137, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 23994129, 27247195, '10:48:51'),
(14138, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 18242284, 27247195, '10:48:51'),
(14139, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 07:48:53', '', '', 50, '', 678, 33900, 0, 81417, 89659779, 27247195, '10:48:51'),
(14189, 'laptop, grey', '', '2022-05-17 08:00:24', '', '', 50, '', 67, 3350, 0, 26943, 95134036, 73604131, '10:49:24'),
(14190, 'desktop, silver', '', '2022-05-17 07:49:48', '', '', 2, '', 678, 1356, 0, 47989, 61720367, 34893851, '10:49:46'),
(14191, 'desktop, silver', '', '2022-05-17 07:49:48', '', '', 2, '', 678, 1356, 0, 47989, 41670749, 34893851, '10:49:46'),
(14201, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:01:07', '', '', 10, '', 67, 670, 0, 38283, 93238945, 72797887, '10:50:27'),
(14202, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 58365003, 29408446, '10:57:46'),
(14203, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 18069569, 29408446, '10:57:46'),
(14204, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 82826106, 29408446, '10:57:46'),
(14205, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 87456920, 29408446, '10:57:46'),
(14206, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 96516857, 29408446, '10:57:46'),
(14207, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 91939320, 29408446, '10:57:46'),
(14208, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 18077407, 29408446, '10:57:46'),
(14209, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 86878878, 29408446, '10:57:46'),
(14210, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 27221155, 29408446, '10:57:46'),
(14211, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 50274874, 29408446, '10:57:46'),
(14212, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 41852227, 29408446, '10:57:46'),
(14213, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 43181935, 29408446, '10:57:46'),
(14214, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 26129912, 29408446, '10:57:46'),
(14215, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 66169976, 29408446, '10:57:46'),
(14216, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 56985613, 29408446, '10:57:46'),
(14217, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 78321862, 29408446, '10:57:46'),
(14218, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 62001616, 29408446, '10:57:46'),
(14219, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 66678410, 29408446, '10:57:46'),
(14220, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 45159843, 29408446, '10:57:46'),
(14221, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 12482810, 29408446, '10:57:46'),
(14222, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 56413471, 29408446, '10:57:46'),
(14223, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 33765599, 29408446, '10:57:46'),
(14224, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 76864338, 29408446, '10:57:46'),
(14225, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 54626718, 29408446, '10:57:46'),
(14226, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 21597250, 29408446, '10:57:46'),
(14227, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 26015748, 29408446, '10:57:46'),
(14228, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 92064664, 29408446, '10:57:46'),
(14229, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 33874906, 29408446, '10:57:46'),
(14230, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 61611477, 29408446, '10:57:46'),
(14231, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 64338421, 29408446, '10:57:46'),
(14232, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 36224637, 29408446, '10:57:46'),
(14233, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 19349372, 29408446, '10:57:46'),
(14234, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 94733786, 29408446, '10:57:46'),
(14235, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 44639012, 29408446, '10:57:46'),
(14236, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 24976785, 29408446, '10:57:46'),
(14237, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 63836628, 29408446, '10:57:46'),
(14238, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 82160078, 29408446, '10:57:46'),
(14239, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 57423053, 29408446, '10:57:46'),
(14240, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 87920063, 29408446, '10:57:46'),
(14241, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 19466209, 29408446, '10:57:46'),
(14242, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 91920373, 29408446, '10:57:46'),
(14243, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 43432230, 29408446, '10:57:46'),
(14244, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 11421734, 29408446, '10:57:46'),
(14245, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 97316619, 29408446, '10:57:46'),
(14246, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 22361693, 29408446, '10:57:46'),
(14247, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 98271270, 29408446, '10:57:46'),
(14248, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 76990780, 29408446, '10:57:46'),
(14249, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 52444536, 29408446, '10:57:46'),
(14250, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 39580510, 29408446, '10:57:46'),
(14251, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 07:57:48', '', '', 50, '', 678, 33900, 0, 70871, 47180831, 29408446, '10:57:46'),
(14252, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 96812318, 49219361, '11:00:44'),
(14253, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 95322377, 49219361, '11:00:44'),
(14254, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 94441636, 49219361, '11:00:44'),
(14255, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 55839015, 49219361, '11:00:44'),
(14256, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 64198071, 49219361, '11:00:44'),
(14257, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 53393377, 49219361, '11:00:44'),
(14258, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 48239145, 49219361, '11:00:44'),
(14259, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 82010438, 49219361, '11:00:44'),
(14260, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 59926792, 49219361, '11:00:44'),
(14261, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:00:47', '', '', 10, '', 67, 670, 0, 91525, 84074291, 49219361, '11:00:44'),
(14262, 'desktop, silver', '', '2022-05-17 08:01:27', '', '', 1, '', 67, 67, 0, 20523, 44664825, 95350453, '11:01:26'),
(14263, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 24502103, 35237526, '11:34:52'),
(14264, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 63466631, 35237526, '11:34:52'),
(14265, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 25516072, 35237526, '11:34:52'),
(14266, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 16086668, 35237526, '11:34:52'),
(14267, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 85305533, 35237526, '11:34:52'),
(14268, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 94934949, 35237526, '11:34:52'),
(14269, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 77887503, 35237526, '11:34:52'),
(14270, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 51623978, 35237526, '11:34:52'),
(14271, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 39306030, 35237526, '11:34:52'),
(14272, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 46912132, 35237526, '11:34:52'),
(14273, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 28803398, 35237526, '11:34:52'),
(14274, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 35966932, 35237526, '11:34:52'),
(14275, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 74914251, 35237526, '11:34:52'),
(14276, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 13256979, 35237526, '11:34:52'),
(14277, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 45638165, 35237526, '11:34:52'),
(14278, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 90297424, 35237526, '11:34:52'),
(14279, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 11370749, 35237526, '11:34:52'),
(14280, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 60127326, 35237526, '11:34:52'),
(14281, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 45170961, 35237526, '11:34:52'),
(14282, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 47338969, 35237526, '11:34:52'),
(14283, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 68532907, 35237526, '11:34:52'),
(14284, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 51173629, 35237526, '11:34:52'),
(14285, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 79413696, 35237526, '11:34:52'),
(14286, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 16411323, 35237526, '11:34:52'),
(14287, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 64622920, 35237526, '11:34:52'),
(14288, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 45084227, 35237526, '11:34:52'),
(14289, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 78154664, 35237526, '11:34:52'),
(14290, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 77848912, 35237526, '11:34:52'),
(14291, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 87554673, 35237526, '11:34:52'),
(14292, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 33989192, 35237526, '11:34:52'),
(14293, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 91351802, 35237526, '11:34:52'),
(14294, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 20285366, 35237526, '11:34:52'),
(14295, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 86716993, 35237526, '11:34:52'),
(14296, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 62142817, 35237526, '11:34:52'),
(14297, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 93868449, 35237526, '11:34:52'),
(14298, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 39124889, 35237526, '11:34:52'),
(14299, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 23554183, 35237526, '11:34:52'),
(14300, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 47427932, 35237526, '11:34:52'),
(14301, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 22538202, 35237526, '11:34:52'),
(14302, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 96547537, 35237526, '11:34:52'),
(14303, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 73863311, 35237526, '11:34:52'),
(14304, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 38052229, 35237526, '11:34:52'),
(14305, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 66847815, 35237526, '11:34:52'),
(14306, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 84410122, 35237526, '11:34:52'),
(14307, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 62498999, 35237526, '11:34:52'),
(14308, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 27815490, 35237526, '11:34:52'),
(14309, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 38345808, 35237526, '11:34:52'),
(14310, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 37581645, 35237526, '11:34:52'),
(14311, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 16689585, 35237526, '11:34:52'),
(14312, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:34:54', '', '', 50, '', 44567, 2228350, 0, 26923, 74547914, 35237526, '11:34:52'),
(14313, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 47726725, 88979230, '11:36:52'),
(14314, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 62595027, 88979230, '11:36:52'),
(14315, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 27013038, 88979230, '11:36:52'),
(14316, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 67850523, 88979230, '11:36:52'),
(14317, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 38396079, 88979230, '11:36:52'),
(14318, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 86593661, 88979230, '11:36:52'),
(14319, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 27998291, 88979230, '11:36:52'),
(14320, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 31838591, 88979230, '11:36:52'),
(14321, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 96172044, 88979230, '11:36:52'),
(14322, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 30500711, 88979230, '11:36:52'),
(14323, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 14530358, 88979230, '11:36:52'),
(14324, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 28771738, 88979230, '11:36:52'),
(14325, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 21940630, 88979230, '11:36:52'),
(14326, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 52472359, 88979230, '11:36:52'),
(14327, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 46849475, 88979230, '11:36:52'),
(14328, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 60583816, 88979230, '11:36:52'),
(14329, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 93149708, 88979230, '11:36:52'),
(14330, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 91027373, 88979230, '11:36:52'),
(14331, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 53835274, 88979230, '11:36:52'),
(14332, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 54079802, 88979230, '11:36:52'),
(14333, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 98704472, 88979230, '11:36:52'),
(14334, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 78562647, 88979230, '11:36:52'),
(14335, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 65994990, 88979230, '11:36:52'),
(14336, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 11999924, 88979230, '11:36:52'),
(14337, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 79124724, 88979230, '11:36:52'),
(14338, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 62679329, 88979230, '11:36:52'),
(14339, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 52445841, 88979230, '11:36:52'),
(14340, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 10772209, 88979230, '11:36:52'),
(14341, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 58947603, 88979230, '11:36:52'),
(14342, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 55597238, 88979230, '11:36:52'),
(14343, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 81454971, 88979230, '11:36:52'),
(14344, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 99819922, 88979230, '11:36:52'),
(14345, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 81952947, 88979230, '11:36:52'),
(14346, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 95182283, 88979230, '11:36:52'),
(14347, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 15600109, 88979230, '11:36:52'),
(14348, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 87102846, 88979230, '11:36:52'),
(14349, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 58458377, 88979230, '11:36:52'),
(14350, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 86407158, 88979230, '11:36:52'),
(14351, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 10835391, 88979230, '11:36:52'),
(14352, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 43727857, 88979230, '11:36:52'),
(14353, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 64303313, 88979230, '11:36:52'),
(14354, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 44014287, 88979230, '11:36:52'),
(14355, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 53977468, 88979230, '11:36:52'),
(14356, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 84382870, 88979230, '11:36:52'),
(14357, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 84316770, 88979230, '11:36:52'),
(14358, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 50706145, 88979230, '11:36:52'),
(14359, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 79821255, 88979230, '11:36:53'),
(14360, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 85043908, 88979230, '11:36:53'),
(14361, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 65564364, 88979230, '11:36:53'),
(14362, 'desktop, silver', '', '2022-05-17 08:36:54', '', '', 50, '', 67, 3350, 0, 73254, 37290097, 88979230, '11:36:53'),
(14363, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:39:07', '', '', 1, '', 67, 67, 0, 29387, 10571116, 68788490, '11:39:05'),
(14364, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:40:02', '', '', 5, '', 78, 390, 0, 28887, 53677982, 13233293, '11:40:01'),
(14365, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:40:02', '', '', 5, '', 78, 390, 0, 28887, 87910787, 13233293, '11:40:01'),
(14366, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:40:02', '', '', 5, '', 78, 390, 0, 28887, 42010783, 13233293, '11:40:01'),
(14367, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:40:02', '', '', 5, '', 78, 390, 0, 28887, 15575128, 13233293, '11:40:01'),
(14368, 'Hp laptop 800 g3 i5 ', '', '2022-05-17 08:40:02', '', '', 5, '', 78, 390, 0, 28887, 98094125, 13233293, '11:40:01'),
(14369, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 47938616, 72487979, '11:40:38'),
(14370, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 32950447, 72487979, '11:40:38'),
(14371, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 86851736, 72487979, '11:40:38'),
(14372, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 70116928, 72487979, '11:40:38'),
(14373, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 22119617, 72487979, '11:40:38'),
(14374, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 10102084, 72487979, '11:40:38'),
(14375, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 73196244, 72487979, '11:40:38'),
(14376, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 16534048, 72487979, '11:40:38'),
(14377, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 38074483, 72487979, '11:40:38'),
(14378, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 75595084, 72487979, '11:40:38'),
(14379, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 24395707, 72487979, '11:40:38'),
(14380, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 90890422, 72487979, '11:40:38'),
(14381, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 68083816, 72487979, '11:40:38'),
(14382, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 95572905, 72487979, '11:40:38'),
(14383, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 96571198, 72487979, '11:40:38'),
(14384, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 36231170, 72487979, '11:40:38'),
(14385, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 88652104, 72487979, '11:40:38'),
(14386, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 32002862, 72487979, '11:40:38'),
(14387, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 77345245, 72487979, '11:40:38'),
(14388, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 44921309, 72487979, '11:40:38'),
(14389, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 39906331, 72487979, '11:40:38'),
(14390, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 60081303, 72487979, '11:40:38'),
(14391, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 28079187, 72487979, '11:40:38'),
(14392, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 95967577, 72487979, '11:40:38'),
(14393, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 40617968, 72487979, '11:40:38'),
(14394, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 47299331, 72487979, '11:40:38'),
(14395, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 41995577, 72487979, '11:40:38'),
(14396, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 78198441, 72487979, '11:40:38'),
(14397, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 76887376, 72487979, '11:40:38'),
(14398, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 14462016, 72487979, '11:40:38'),
(14399, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 63526999, 72487979, '11:40:38'),
(14400, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 55893574, 72487979, '11:40:38'),
(14401, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 86447852, 72487979, '11:40:38'),
(14402, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 98211754, 72487979, '11:40:38'),
(14403, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 43715682, 72487979, '11:40:38'),
(14404, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 11868110, 72487979, '11:40:38'),
(14405, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 76234999, 72487979, '11:40:38'),
(14406, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 23873831, 72487979, '11:40:38'),
(14407, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 64299473, 72487979, '11:40:38'),
(14408, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 74322654, 72487979, '11:40:38'),
(14409, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 41796557, 72487979, '11:40:38'),
(14410, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 59171293, 72487979, '11:40:38'),
(14411, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 85193438, 72487979, '11:40:38'),
(14412, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 78326772, 72487979, '11:40:38'),
(14413, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 27451296, 72487979, '11:40:38'),
(14414, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 74689005, 72487979, '11:40:38'),
(14415, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 36407360, 72487979, '11:40:38'),
(14416, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 99107332, 72487979, '11:40:38'),
(14417, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 24347076, 72487979, '11:40:38'),
(14418, 'laptop, grey', '', '2022-05-17 08:40:39', '', '', 50, '', 67, 3350, 0, 67810, 83917941, 72487979, '11:40:38'),
(14419, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 69760249, 83370574, '11:41:00'),
(14420, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 25629283, 83370574, '11:41:00'),
(14421, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 36335519, 83370574, '11:41:00'),
(14422, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 97595865, 83370574, '11:41:00'),
(14423, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 83999083, 83370574, '11:41:00'),
(14424, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 34407198, 83370574, '11:41:00'),
(14425, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 18797574, 83370574, '11:41:00'),
(14426, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 11751603, 83370574, '11:41:00'),
(14427, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 33930977, 83370574, '11:41:00'),
(14428, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-17 08:41:57', '', '', 10, '', 67, 670, 0, 29000, 66396686, 83370574, '11:41:00'),
(14429, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 10987449, 21904830, '11:43:06'),
(14430, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 17012538, 21904830, '11:43:06'),
(14431, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 95914302, 21904830, '11:43:06'),
(14432, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 26842391, 21904830, '11:43:06'),
(14433, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 19519662, 21904830, '11:43:06'),
(14434, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 66867067, 21904830, '11:43:06'),
(14435, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 61523066, 21904830, '11:43:06'),
(14436, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 54026827, 21904830, '11:43:06'),
(14437, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 91595378, 21904830, '11:43:06'),
(14438, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 17856761, 21904830, '11:43:06'),
(14439, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 36928888, 21904830, '11:43:06'),
(14440, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 41058611, 21904830, '11:43:06'),
(14441, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 50747763, 21904830, '11:43:06'),
(14442, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 33288553, 21904830, '11:43:06'),
(14443, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 70131573, 21904830, '11:43:06'),
(14444, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 19225897, 21904830, '11:43:06'),
(14445, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 74821981, 21904830, '11:43:06'),
(14446, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 35879281, 21904830, '11:43:06'),
(14447, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 97046376, 21904830, '11:43:06'),
(14448, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 53191394, 21904830, '11:43:06'),
(14449, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 37443629, 21904830, '11:43:06'),
(14450, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 72749376, 21904830, '11:43:06'),
(14451, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 97100895, 21904830, '11:43:06'),
(14452, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 65017593, 21904830, '11:43:06'),
(14453, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 71279849, 21904830, '11:43:06'),
(14454, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 54715243, 21904830, '11:43:06'),
(14455, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 98709476, 21904830, '11:43:06'),
(14456, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 73110024, 21904830, '11:43:06'),
(14457, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 87804956, 21904830, '11:43:06'),
(14458, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 95146964, 21904830, '11:43:06'),
(14459, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 14147920, 21904830, '11:43:06'),
(14460, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 24677051, 21904830, '11:43:06'),
(14461, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 55242228, 21904830, '11:43:06'),
(14462, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 54462880, 21904830, '11:43:06'),
(14463, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 11142816, 21904830, '11:43:06'),
(14464, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 47553376, 21904830, '11:43:06'),
(14465, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 61022650, 21904830, '11:43:06'),
(14466, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 63090073, 21904830, '11:43:06'),
(14467, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 22223287, 21904830, '11:43:06'),
(14468, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 97870343, 21904830, '11:43:06'),
(14469, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 46125239, 21904830, '11:43:06'),
(14470, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 86444677, 21904830, '11:43:06'),
(14471, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 62955669, 21904830, '11:43:06'),
(14472, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 73804492, 21904830, '11:43:06'),
(14473, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 92726179, 21904830, '11:43:06'),
(14474, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 19079133, 21904830, '11:43:06'),
(14475, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 33320671, 21904830, '11:43:06'),
(14476, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 51676163, 21904830, '11:43:06'),
(14477, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 46815459, 21904830, '11:43:06'),
(14478, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:43:08', '', '', 50, '', 67, 3350, 0, 17831, 21606220, 21904830, '11:43:06'),
(14479, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 71871997, 90294697, '11:43:24'),
(14480, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 18785920, 90294697, '11:43:24'),
(14481, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 71920035, 90294697, '11:43:24'),
(14482, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 17472328, 90294697, '11:43:24'),
(14483, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 73406823, 90294697, '11:43:24'),
(14484, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 96406242, 90294697, '11:43:24'),
(14485, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 32325795, 90294697, '11:43:24'),
(14486, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 39477125, 90294697, '11:43:24'),
(14487, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 31115245, 90294697, '11:43:24'),
(14488, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 91211551, 90294697, '11:43:24'),
(14489, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 19772679, 90294697, '11:43:24'),
(14490, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 14799803, 90294697, '11:43:24'),
(14491, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 26472857, 90294697, '11:43:24'),
(14492, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 29324183, 90294697, '11:43:24'),
(14493, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 35959524, 90294697, '11:43:24'),
(14494, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 13834970, 90294697, '11:43:24'),
(14495, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 83937404, 90294697, '11:43:24'),
(14496, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 70604881, 90294697, '11:43:24'),
(14497, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 80863807, 90294697, '11:43:24'),
(14498, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 84292080, 90294697, '11:43:24'),
(14499, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 71618586, 90294697, '11:43:24'),
(14500, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 12816052, 90294697, '11:43:24'),
(14501, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 57404778, 90294697, '11:43:24'),
(14502, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 50813483, 90294697, '11:43:24'),
(14503, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 13824659, 90294697, '11:43:24'),
(14504, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 34882295, 90294697, '11:43:24'),
(14505, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 34366295, 90294697, '11:43:24'),
(14506, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 65115876, 90294697, '11:43:24'),
(14507, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 82152230, 90294697, '11:43:24'),
(14508, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 84334464, 90294697, '11:43:24'),
(14509, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 92854258, 90294697, '11:43:24'),
(14510, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 59366435, 90294697, '11:43:24'),
(14511, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 83223014, 90294697, '11:43:24'),
(14512, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 98791864, 90294697, '11:43:24'),
(14513, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 37807787, 90294697, '11:43:24'),
(14514, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 16328299, 90294697, '11:43:24');
INSERT INTO `tinvoicecreate1` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `assetid`, `del`, `time`) VALUES
(14515, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 69687532, 90294697, '11:43:24'),
(14516, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 44998206, 90294697, '11:43:24'),
(14517, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 85428186, 90294697, '11:43:24'),
(14518, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 60530359, 90294697, '11:43:24'),
(14519, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 52078127, 90294697, '11:43:24'),
(14520, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 44599643, 90294697, '11:43:24'),
(14521, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 20720777, 90294697, '11:43:24'),
(14522, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 27012903, 90294697, '11:43:24'),
(14523, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 50876934, 90294697, '11:43:24'),
(14524, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 98389985, 90294697, '11:43:24'),
(14525, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 94780683, 90294697, '11:43:24'),
(14526, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 18234332, 90294697, '11:43:24'),
(14527, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 81253956, 90294697, '11:43:24'),
(14528, 'laptop, grey', '', '2022-05-17 08:43:26', '', '', 50, '', 567, 28350, 0, 54741, 58105389, 90294697, '11:43:24'),
(14538, 'laptop, grey', '', '2022-05-17 08:45:01', '', '', 10, '', 67, 670, 0, 55889, 21947084, 28032979, '11:44:34'),
(14539, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 35067129, 71854486, '11:44:55'),
(14540, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 23210750, 71854486, '11:44:55'),
(14541, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 79930403, 71854486, '11:44:55'),
(14542, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 18173045, 71854486, '11:44:55'),
(14543, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 22744003, 71854486, '11:44:55'),
(14544, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 45636968, 71854486, '11:44:55'),
(14545, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 85234639, 71854486, '11:44:55'),
(14546, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 24977088, 71854486, '11:44:55'),
(14547, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 69212318, 71854486, '11:44:55'),
(14548, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 74848865, 71854486, '11:44:55'),
(14549, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 52206827, 71854486, '11:44:55'),
(14550, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 82714312, 71854486, '11:44:55'),
(14551, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 92434566, 71854486, '11:44:55'),
(14552, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 88361930, 71854486, '11:44:55'),
(14553, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 66780639, 71854486, '11:44:55'),
(14554, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 34143884, 71854486, '11:44:55'),
(14555, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 94907560, 71854486, '11:44:55'),
(14556, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 96929778, 71854486, '11:44:55'),
(14557, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 11014185, 71854486, '11:44:55'),
(14558, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 21602471, 71854486, '11:44:55'),
(14559, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 22290845, 71854486, '11:44:55'),
(14560, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 58714854, 71854486, '11:44:55'),
(14561, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 79344495, 71854486, '11:44:55'),
(14562, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 47584258, 71854486, '11:44:55'),
(14563, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 32388610, 71854486, '11:44:55'),
(14564, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 82044142, 71854486, '11:44:55'),
(14565, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 13893449, 71854486, '11:44:55'),
(14566, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 55262017, 71854486, '11:44:55'),
(14567, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 35446425, 71854486, '11:44:55'),
(14568, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 61476306, 71854486, '11:44:55'),
(14569, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 48914660, 71854486, '11:44:55'),
(14570, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 94833376, 71854486, '11:44:55'),
(14571, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 75374057, 71854486, '11:44:55'),
(14572, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 43338190, 71854486, '11:44:55'),
(14573, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 46887000, 71854486, '11:44:55'),
(14574, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 52840442, 71854486, '11:44:55'),
(14575, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 71798386, 71854486, '11:44:55'),
(14576, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 13784494, 71854486, '11:44:55'),
(14577, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 53221767, 71854486, '11:44:55'),
(14578, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 85464411, 71854486, '11:44:55'),
(14579, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 19756436, 71854486, '11:44:55'),
(14580, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 83441358, 71854486, '11:44:55'),
(14581, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 41653897, 71854486, '11:44:55'),
(14582, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 26461470, 71854486, '11:44:55'),
(14583, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 88449800, 71854486, '11:44:55'),
(14584, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 13669469, 71854486, '11:44:55'),
(14585, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 64436611, 71854486, '11:44:55'),
(14586, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 66896504, 71854486, '11:44:55'),
(14587, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 85353811, 71854486, '11:44:55'),
(14588, 'desktop, silver', '', '2022-05-17 08:44:56', '', '', 50, '', 567, 28350, 0, 94830, 64822586, 71854486, '11:44:55'),
(14589, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 66124170, 73010491, '11:46:06'),
(14590, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 81533457, 73010491, '11:46:06'),
(14591, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 56140489, 73010491, '11:46:06'),
(14592, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 64058962, 73010491, '11:46:06'),
(14593, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 61998567, 73010491, '11:46:06'),
(14594, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 47008226, 73010491, '11:46:06'),
(14595, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 73687735, 73010491, '11:46:06'),
(14596, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 71746708, 73010491, '11:46:06'),
(14597, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 37922621, 73010491, '11:46:06'),
(14598, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 66161434, 73010491, '11:46:06'),
(14599, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 19137255, 73010491, '11:46:07'),
(14600, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 97023336, 73010491, '11:46:07'),
(14601, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 87345966, 73010491, '11:46:07'),
(14602, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 75422674, 73010491, '11:46:07'),
(14603, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 87500973, 73010491, '11:46:07'),
(14604, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 48272319, 73010491, '11:46:07'),
(14605, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 21797455, 73010491, '11:46:07'),
(14606, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 84728759, 73010491, '11:46:07'),
(14607, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 53067194, 73010491, '11:46:07'),
(14608, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 35222331, 73010491, '11:46:07'),
(14609, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 38005324, 73010491, '11:46:07'),
(14610, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 82040117, 73010491, '11:46:07'),
(14611, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 41997501, 73010491, '11:46:07'),
(14612, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 11839992, 73010491, '11:46:07'),
(14613, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 76870806, 73010491, '11:46:07'),
(14614, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 54082655, 73010491, '11:46:07'),
(14615, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 48999436, 73010491, '11:46:07'),
(14616, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 61561858, 73010491, '11:46:07'),
(14617, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 37140036, 73010491, '11:46:07'),
(14618, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 25958520, 73010491, '11:46:07'),
(14619, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 38745755, 73010491, '11:46:07'),
(14620, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 20429424, 73010491, '11:46:07'),
(14621, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 39257488, 73010491, '11:46:07'),
(14622, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 60753936, 73010491, '11:46:07'),
(14623, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 63840700, 73010491, '11:46:07'),
(14624, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 76352421, 73010491, '11:46:07'),
(14625, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 78814366, 73010491, '11:46:07'),
(14626, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 49206153, 73010491, '11:46:07'),
(14627, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 80134698, 73010491, '11:46:07'),
(14628, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 15858318, 73010491, '11:46:07'),
(14629, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 18808599, 73010491, '11:46:07'),
(14630, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 10119601, 73010491, '11:46:07'),
(14631, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 38885321, 73010491, '11:46:07'),
(14632, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 73291381, 73010491, '11:46:07'),
(14633, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 83159978, 73010491, '11:46:07'),
(14634, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 40166443, 73010491, '11:46:07'),
(14635, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 77272882, 73010491, '11:46:07'),
(14636, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 36020845, 73010491, '11:46:07'),
(14637, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 92196781, 73010491, '11:46:07'),
(14638, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:08', '', '', 50, '', 678, 33900, 0, 10316, 69240837, 73010491, '11:46:07'),
(14639, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 44527094, 52265191, '11:46:26'),
(14640, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 77875483, 52265191, '11:46:26'),
(14641, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 37089381, 52265191, '11:46:26'),
(14642, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 41431085, 52265191, '11:46:26'),
(14643, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 55166758, 52265191, '11:46:26'),
(14644, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 43746180, 52265191, '11:46:26'),
(14645, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 33960571, 52265191, '11:46:26'),
(14646, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 13790259, 52265191, '11:46:26'),
(14647, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 74224002, 52265191, '11:46:26'),
(14648, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 53949772, 52265191, '11:46:26'),
(14649, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 96379705, 52265191, '11:46:26'),
(14650, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 31620311, 52265191, '11:46:26'),
(14651, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 83546407, 52265191, '11:46:26'),
(14652, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 97080109, 52265191, '11:46:26'),
(14653, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 12683335, 52265191, '11:46:26'),
(14654, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 39613575, 52265191, '11:46:26'),
(14655, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 86465145, 52265191, '11:46:26'),
(14656, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 25910172, 52265191, '11:46:26'),
(14657, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 50618050, 52265191, '11:46:26'),
(14658, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 86485097, 52265191, '11:46:26'),
(14659, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 36436386, 52265191, '11:46:26'),
(14660, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 14452438, 52265191, '11:46:26'),
(14661, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 89040453, 52265191, '11:46:26'),
(14662, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 53159916, 52265191, '11:46:26'),
(14663, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 71776296, 52265191, '11:46:26'),
(14664, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 44997391, 52265191, '11:46:26'),
(14665, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 94293977, 52265191, '11:46:26'),
(14666, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 41082809, 52265191, '11:46:26'),
(14667, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 44625631, 52265191, '11:46:26'),
(14668, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 51255786, 52265191, '11:46:26'),
(14669, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 45058032, 52265191, '11:46:26'),
(14670, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 25318955, 52265191, '11:46:26'),
(14671, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 28785387, 52265191, '11:46:26'),
(14672, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 21808388, 52265191, '11:46:26'),
(14673, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 30551803, 52265191, '11:46:26'),
(14674, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 29758196, 52265191, '11:46:26'),
(14675, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 98869682, 52265191, '11:46:26'),
(14676, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 92539410, 52265191, '11:46:26'),
(14677, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 56455034, 52265191, '11:46:26'),
(14678, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 94979214, 52265191, '11:46:26'),
(14679, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 86623811, 52265191, '11:46:26'),
(14680, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 32838920, 52265191, '11:46:26'),
(14681, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 57945334, 52265191, '11:46:26'),
(14682, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 13255821, 52265191, '11:46:26'),
(14683, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 33069626, 52265191, '11:46:26'),
(14684, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 38980365, 52265191, '11:46:26'),
(14685, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 82700749, 52265191, '11:46:26'),
(14686, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 98636662, 52265191, '11:46:26'),
(14687, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 71907668, 52265191, '11:46:26'),
(14688, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:29', '', '', 50, '', 678, 33900, 0, 42063, 64965763, 52265191, '11:46:26'),
(14689, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 36947114, 42042328, '11:46:45'),
(14690, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 63773541, 42042328, '11:46:45'),
(14691, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 73992980, 42042328, '11:46:45'),
(14692, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 82878637, 42042328, '11:46:45'),
(14693, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 55364229, 42042328, '11:46:45'),
(14694, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 39684053, 42042328, '11:46:45'),
(14695, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 79192176, 42042328, '11:46:45'),
(14696, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 48951297, 42042328, '11:46:45'),
(14697, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 43283503, 42042328, '11:46:45'),
(14698, 'Hp deksotp 800 g3 i5 ', '', '2022-05-17 08:46:48', '', '', 10, '', 678, 6780, 0, 44613, 28109856, 42042328, '11:46:45'),
(14699, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 70011033, 41491823, '11:47:13'),
(14700, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 39454584, 41491823, '11:47:13'),
(14701, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 38219484, 41491823, '11:47:13'),
(14702, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 77770464, 41491823, '11:47:13'),
(14703, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 60268006, 41491823, '11:47:13'),
(14704, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 42771343, 41491823, '11:47:13'),
(14705, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 91838273, 41491823, '11:47:13'),
(14706, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 40149108, 41491823, '11:47:13'),
(14707, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 63129474, 41491823, '11:47:13'),
(14708, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 37854898, 41491823, '11:47:13'),
(14709, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 71741219, 41491823, '11:47:13'),
(14710, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 19621438, 41491823, '11:47:13'),
(14711, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 16691913, 41491823, '11:47:13'),
(14712, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 38671629, 41491823, '11:47:13'),
(14713, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 90674050, 41491823, '11:47:13'),
(14714, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 76571179, 41491823, '11:47:13'),
(14715, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 38278170, 41491823, '11:47:13'),
(14716, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 60072902, 41491823, '11:47:13'),
(14717, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 75853264, 41491823, '11:47:13'),
(14718, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 12070624, 41491823, '11:47:13'),
(14719, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 54192511, 41491823, '11:47:13'),
(14720, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 29777567, 41491823, '11:47:13'),
(14721, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 96775050, 41491823, '11:47:13'),
(14722, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 47279713, 41491823, '11:47:13'),
(14723, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 44449546, 41491823, '11:47:13'),
(14724, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 89482026, 41491823, '11:47:13'),
(14725, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 27562948, 41491823, '11:47:13'),
(14726, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 69246356, 41491823, '11:47:13'),
(14727, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 76052600, 41491823, '11:47:13'),
(14728, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 20066551, 41491823, '11:47:13'),
(14729, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 96353241, 41491823, '11:47:13'),
(14730, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 49615750, 41491823, '11:47:13'),
(14731, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 94019020, 41491823, '11:47:13'),
(14732, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 41612471, 41491823, '11:47:13'),
(14733, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 32361615, 41491823, '11:47:13'),
(14734, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 84145255, 41491823, '11:47:13'),
(14735, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 50034043, 41491823, '11:47:13'),
(14736, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 26121430, 41491823, '11:47:13'),
(14737, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 89819562, 41491823, '11:47:13'),
(14738, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 92215232, 41491823, '11:47:13'),
(14739, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 27173284, 41491823, '11:47:13'),
(14740, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 93485084, 41491823, '11:47:13'),
(14741, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 91249305, 41491823, '11:47:13'),
(14742, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 83906110, 41491823, '11:47:13'),
(14743, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 24433449, 41491823, '11:47:13'),
(14744, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 22234795, 41491823, '11:47:13'),
(14745, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 53912064, 41491823, '11:47:13'),
(14746, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 17444562, 41491823, '11:47:13'),
(14747, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 81603989, 41491823, '11:47:13'),
(14748, 'desktop, silver', '', '2022-05-17 08:47:15', '', '', 50, '', 567, 28350, 0, 71873, 68965951, 41491823, '11:47:13'),
(14749, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 47019621, 14386561, '15:18:41'),
(14750, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 35416942, 14386561, '15:18:41'),
(14751, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 41214632, 14386561, '15:18:41'),
(14752, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 26113481, 14386561, '15:18:41'),
(14753, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 43014786, 14386561, '15:18:41'),
(14754, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 57911829, 14386561, '15:18:41'),
(14755, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 51662309, 14386561, '15:18:41'),
(14756, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 10130960, 14386561, '15:18:41'),
(14757, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 48349270, 14386561, '15:18:41'),
(14758, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 21687053, 14386561, '15:18:41'),
(14759, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 74343868, 14386561, '15:18:41'),
(14760, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 51591279, 14386561, '15:18:41'),
(14761, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 66869141, 14386561, '15:18:41'),
(14762, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 13297684, 14386561, '15:18:41'),
(14763, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 59231439, 14386561, '15:18:41'),
(14764, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 10471659, 14386561, '15:18:41'),
(14765, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 45069289, 14386561, '15:18:41'),
(14766, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 39268462, 14386561, '15:18:41'),
(14767, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 59571724, 14386561, '15:18:41'),
(14768, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 44131939, 14386561, '15:18:41'),
(14769, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 82148290, 14386561, '15:18:41'),
(14770, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 36246820, 14386561, '15:18:41'),
(14771, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 51477006, 14386561, '15:18:41'),
(14772, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 93212803, 14386561, '15:18:41'),
(14773, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 14818812, 14386561, '15:18:41'),
(14774, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 58968413, 14386561, '15:18:41'),
(14775, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 90355786, 14386561, '15:18:41'),
(14776, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 74020144, 14386561, '15:18:41'),
(14777, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 56716423, 14386561, '15:18:41'),
(14778, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 86335407, 14386561, '15:18:41'),
(14779, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 64534142, 14386561, '15:18:41'),
(14780, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 58355197, 14386561, '15:18:41'),
(14781, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 56239325, 14386561, '15:18:41'),
(14782, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 89536810, 14386561, '15:18:41'),
(14783, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 66669646, 14386561, '15:18:41'),
(14784, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 84021523, 14386561, '15:18:41'),
(14785, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 82948503, 14386561, '15:18:41'),
(14786, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 81507209, 14386561, '15:18:41'),
(14787, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 25444573, 14386561, '15:18:41'),
(14788, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 58339262, 14386561, '15:18:41'),
(14789, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 95761032, 14386561, '15:18:41'),
(14790, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 50176006, 14386561, '15:18:41'),
(14791, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 61602176, 14386561, '15:18:41'),
(14792, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 30829254, 14386561, '15:18:41'),
(14793, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 61929093, 14386561, '15:18:41'),
(14794, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 74828341, 14386561, '15:18:41'),
(14795, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 44069498, 14386561, '15:18:41'),
(14796, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 20234794, 14386561, '15:18:41'),
(14797, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 29962294, 14386561, '15:18:41'),
(14798, 'laptop, grey', '', '2022-05-18 12:20:58', '', '', 50, '', -999999999, -2147483648, 0, 28617, 87475511, 14386561, '15:18:41'),
(14799, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 37292361, 94518581, '15:20:54'),
(14800, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 52584573, 94518581, '15:20:54'),
(14801, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 71341374, 94518581, '15:20:54'),
(14802, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 31873006, 94518581, '15:20:54'),
(14803, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 81615502, 94518581, '15:20:54'),
(14804, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 67705003, 94518581, '15:20:54'),
(14805, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 74691724, 94518581, '15:20:54'),
(14806, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 10836829, 94518581, '15:20:54'),
(14807, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 33094688, 94518581, '15:20:54'),
(14808, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 76688385, 94518581, '15:20:54'),
(14809, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 21365964, 94518581, '15:20:54'),
(14810, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 25054205, 94518581, '15:20:54'),
(14811, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 90227619, 94518581, '15:20:54'),
(14812, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 31879561, 94518581, '15:20:54'),
(14813, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 66488095, 94518581, '15:20:54'),
(14814, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 11520631, 94518581, '15:20:54'),
(14815, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 12499492, 94518581, '15:20:54'),
(14816, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 76682397, 94518581, '15:20:54'),
(14817, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 28648775, 94518581, '15:20:54'),
(14818, 'hp chromebook 11 x360 cdc 4gb 500', '', '2022-05-18 12:20:58', '', '', 20, '', 66666, 1333320, 0, 28617, 40607419, 94518581, '15:20:54'),
(14819, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 82740704, 47985624, '11:09:35'),
(14820, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 81904166, 47985624, '11:09:35'),
(14821, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 20105005, 47985624, '11:09:35'),
(14822, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 85242630, 47985624, '11:09:35'),
(14823, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 30009328, 47985624, '11:09:35'),
(14824, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 54145910, 47985624, '11:09:35'),
(14825, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 92126771, 47985624, '11:09:35'),
(14826, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 68721280, 47985624, '11:09:35'),
(14827, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 41434391, 47985624, '11:09:35'),
(14828, 'Hp deksotp 800 g3 i5 ', '', '2022-05-19 08:09:38', '', '', 10, '', 567, 5670, 0, 50394, 12884180, 47985624, '11:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `tvendors`
--

CREATE TABLE `tvendors` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `debit` varchar(20) NOT NULL,
  `debitno` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tvendors1`
--

CREATE TABLE `tvendors1` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `debitno` varchar(20) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tvendors1`
--

INSERT INTO `tvendors1` (`id`, `fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `random`, `username`, `id_no`, `debitno`, `debit`, `user_name`) VALUES
(8, 'Jackson', 'Wesanza', 42352255, 'kakakkakkakkak', 'jackwise179@gmail.co', '2022-05-03 20:40:43', 10481, 'Jackss', '', '', '', ''),
(10, 'jane', 'jane', 2147483647, 'Nairobi', 'janejane@gmail.com', '2022-05-06 10:06:21', 64266, 'jane', '12680129689', 'AA000', 'i8u8uuyj', ''),
(10, 'jane', 'jane', 2147483647, 'Nairobi', 'janejane@gmail.com', '2022-05-06 10:06:21', 72833, 'jane', '12680129689', 'AAA000', 'A243', '');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`, `date`) VALUES
(2, 'desktop', '2022-04-21 07:34:39'),
(3, 'laptop', '2022-04-21 07:34:46'),
(4, 'allinone', '2022-04-21 07:34:57'),
(5, 'printer', '2022-04-21 07:35:02'),
(6, 'hdd', '2022-04-21 07:35:07'),
(7, 'ssd', '2022-04-21 07:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `use`
--

CREATE TABLE `use` (
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fname` varchar(12) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `created_at`, `fname`, `lname`, `designation`) VALUES
(22, 'admin', 'admin@admin.com', '$2y$10$XoJmr5065F3yzLuxtPIi7ODeW1VuDOAMbgDhvgAUPdiAUwjjD0Ug6', '2022-04-14 07:29:30', 'admin', 'admin', 'admin'),
(23, 'mike', 'mike@gmail.com', '$2y$10$tzGWWSctOtnpAJW2kpcM/eiA7LUg3lrHdPFPou7zL.Hplz5xSvdFG', '2022-04-14 07:30:28', 'james', 'mwangi', 'sales'),
(24, 'technician', 'technician@gmail.com', '$2y$10$KfBb4OpHCgmYjMesp9cH/uiSL.hwUrpzaYe6rh5DAJByJsPZCKnn2', '2022-04-14 07:38:50', 'henry', 'henry', 'technician'),
(25, 'mainuser', 'mainuser@gmail.com', '$2y$10$PBXNeZ0um0SEI3ocWgXwFuWpLJd8wEVM.KVDJDc9WBtwKaGT392ma', '2022-04-28 11:23:28', 'main', 'user', 'sales'),
(28, 'nyamwea', 'leakey@gmail.com', '$2y$10$fg6lX8muYcTlHvMU7YrnC.v/O5N59HQw6tv9C3m4OLsTtYjYm.KM.', '2022-05-18 11:06:10', 'leakey', 'nyamwea', 'manager'),
(29, 'jamo', 'jamo@gmail.com', '$2y$10$iJqslDdukNOe.o5MlWYGGObG2HJZL5zU0bN8JeRMYdVHq.a1fYISC', '2022-05-18 12:40:31', 'jamo', 'jamo', 'technician');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ref` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `customerjob` varchar(20) NOT NULL,
  `unitprice` int(255) NOT NULL,
  `total` int(30) NOT NULL,
  `phone` int(12) NOT NULL,
  `random` int(12) NOT NULL,
  `vendor` varchar(244) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `lname` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `debitno` varchar(20) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `description`, `address`, `date`, `ref`, `document`, `qty`, `customerjob`, `unitprice`, `total`, `phone`, `random`, `vendor`, `fname`, `location`, `time`, `lname`, `id_no`, `email`, `username`, `debitno`, `user_name`) VALUES
(185, '', '', '2022-05-19 08:43:53', '72833', '72833.pdf', 0, '', 0, 0, 2147483647, 0, '', 'jane', ' Nairobi', '11:43:53', 'jane', '12680129689', 'janejane@gmail.com', 'jane', 'AAA000', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `username`, `id_no`) VALUES
(10, 'jane', 'jane', 2147483647, 'Nairobi', 'janejane@gmail.com', '2022-05-06 10:06:21', 'jane', '12680129689'),
(11, 'anthony', 'kamau', 3866921, 'nairobi', 'kmaus@gmail.com', '2022-05-06 10:07:29', 'kama', '2310872');

-- --------------------------------------------------------

--
-- Table structure for table `verified`
--

CREATE TABLE `verified` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `part` varchar(20) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `comment` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verified`
--

INSERT INTO `verified` (`id`, `conditions`, `type`, `brand`, `assetid`, `gen`, `ram`, `screen`, `part`, `serialno`, `model`, `modelid`, `cpu`, `speed`, `price`, `odd`, `comment`, `hdd`, `daterecieved`, `datedelivered`, `customer`, `vendor`, `list`, `status`, `qty`, `total`, `barcodes`, `terms`, `del`, `random`, `time`, `tbl`, `tqty`) VALUES
(12580, 'new', 'desktop', 'Lenovo', '12021091', '10 th', '4 gb', '14', 'CPU', '595470', 'Hp ProBook 430 G7', '37498', '500 ssd', '4ghz', '10000', 'yes', 'silver', '256', '2022-04-21 12:10:46', '', 'Kanono', '', 'New', '', 1, 0, '', '', 22481035, 25833, '2022-05-07 09:37:21', '', ''),
(12580, 'new', 'desktop', 'Lenovo', '12021091', '10 th', '4 gb', '14', 'CPU', '595470', 'Hp ProBook 430 G7', '37498', '500 ssd', '4ghz', '10000', 'yes', 'silver', '256', '2022-04-21 12:10:46', '', 'Kanono', '', 'New', '', 1, 0, '', '', 22481035, 31107, '2022-05-07 09:37:21', '', ''),
(12559, 'new', 'allinone', 'Lenovo', '62570277', '10 th', '4 gb', '14', 'CPU', '595470', 'HP Desktop Hightower', '37498', '500 ssd', '4ghz', '10000', 'no', 'stored', '500', '2022-04-21 11:47:49', '', 'Kanono', '', 'New', '', 1, 0, '', '', 90619220, 31107, '2022-05-07 09:37:21', '', ''),
(12559, 'new', 'allinone', 'Lenovo', '62570277', '10 th', '4 gb', '14', 'CPU', '595470', 'HP Desktop Hightower', '37498', '500 ssd', '4ghz', '10000', 'no', 'stored', '500', '2022-04-21 11:47:49', '', 'Kanono', '', 'New', '', 1, 0, '', '', 90619220, 45518, '2022-05-07 09:37:21', '', ''),
(12560, 'new', 'allinone', 'Lenovo', '71289782', '10 th', '4 gb', '14', 'CPU', '595470', 'HP Desktop Hightower', '37498', '500 ssd', '4ghz', '10000', 'no', 'stored', '500', '2022-04-21 11:47:49', '', 'Kanono', '', 'New', '', 1, 0, '', '', 90619220, 45518, '2022-05-07 09:37:21', '', ''),
(12559, 'new', 'allinone', 'Lenovo', '62570277', '10 th', '4 gb', '14', 'CPU', '595470', 'HP Desktop Hightower', '37498', '500 ssd', '4ghz', '10000', 'no', 'stored', '500', '2022-04-21 11:47:49', '', 'Kanono', '', 'New', '', 1, 0, '', '', 90619220, 97594, '2022-05-07 09:37:21', '', ''),
(12559, 'new', 'allinone', 'Lenovo', '62570277', '10 th', '4 gb', '14', 'CPU', '595470', 'HP Desktop Hightower', '37498', '500 ssd', '4ghz', '10000', 'no', 'stored', '500', '2022-04-21 11:47:49', '', 'Kanono', '', 'New', '', 1, 0, '', '', 90619220, 36081, '2022-05-07 09:37:21', '', ''),
(12688, 'new', 'desktop', 'hp', '39051740', '10 th', '16 gb', '15', 'CPU', '595470', 'HP Desktop Hightower', '37498', 'intel core i5', '4ghz', '10000', 'yes', 'stored', '500', '2022-04-22 10:02:11', '', 'Kanono', '', 'New', '', 1, 0, '', '', 96649430, 79349, '2022-05-07 09:37:21', '', ''),
(14061, '4713', '', '', 'KSC009637', '8th Generation', 'Dell Latitude 7400', 'Intel Core i7', '2', '8192', '', '256', '14\\\'\\\'', '0', 'Silver/Tou', '', '', '', '2022-04-23 07:22:29', '', '', '', '', '', 1, 0, '', '', 0, 79349, '2022-05-07 09:37:21', '', ''),
(15436, '4713', '', '', 'KSC009637', '8th Generation', 'Dell Latitude 7400', 'Intel Core i7', '2', '8192', '', '256', '14\\\'\\\'', '0', 'Silver/Tou', '', '', '', '2022-04-23 07:23:18', '', '', '', '', '', 1, 0, '', '', 0, 79349, '2022-05-07 09:37:21', '', ''),
(2775, '', '', '', 'TRG-115527864', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-25 12:34:41', '', '', '', '', '', 1, 0, '', '', 559104, 79349, '2022-05-07 09:37:21', '', ''),
(3, 'Used', 'desktop', '', '828393', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 79349, '2022-05-07 09:37:21', '', ''),
(4, 'Used', 'desktop', '', '481976', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 79349, '2022-05-07 09:37:21', '', ''),
(3, 'Used', 'desktop', '', '828393', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 12341, '2022-05-07 09:37:21', '', ''),
(4, 'Used', 'desktop', '', '481976', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 12341, '2022-05-07 09:37:21', '', ''),
(4, 'Used', 'desktop', '', '481976', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 12341, '2022-05-07 09:37:21', '', ''),
(2774, 'New', 'desktop', '', 'TRG-114125594', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 12341, '2022-05-07 09:37:21', '', ''),
(2774, 'New', 'desktop', '', 'TRG-114125594', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 12341, '2022-05-07 09:37:21', '', ''),
(2797, 'New', 'desktop', '', 'TRG-112403016', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 12341, '2022-05-07 09:37:21', '', ''),
(2797, 'New', 'desktop', '', 'TRG-112403016', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 12341, '2022-05-07 09:37:21', '', ''),
(2799, '', '', '', 'TRG-110892835', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 12341, '2022-05-07 09:37:21', '', ''),
(2799, '', '', '', 'TRG-110892835', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 12341, '2022-05-07 09:37:21', '', ''),
(2775, 'New', 'desktop', '', 'TRG-115527864', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 57677, '2022-05-07 09:37:21', '', ''),
(2775, 'New', 'desktop', '', 'TRG-115527864', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 57677, '2022-05-07 09:37:21', '', ''),
(2776, 'New', 'desktop', '', 'TRG-117765234', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 57677, '2022-05-07 09:37:21', '', ''),
(2776, 'New', 'desktop', '', 'TRG-117765234', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 57677, '2022-05-07 09:37:21', '', ''),
(2798, 'New', 'desktop', '', 'TRG-116125571', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 30470, '2022-05-07 09:37:21', '', ''),
(2798, 'New', 'desktop', '', 'TRG-116125571', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 30470, '2022-05-07 09:37:21', '', ''),
(2799, '', '', '', 'TRG-110892835', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 55550, '2022-05-07 09:37:21', '', ''),
(2799, '', '', '', 'TRG-110892835', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 55550, '2022-05-07 09:37:21', '', ''),
(2800, '', '', '', 'TRG-115557679', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 57513, '2022-05-07 09:37:21', '', ''),
(2800, '', '', '', 'TRG-115557679', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 57513, '2022-05-07 09:37:21', '', ''),
(2801, '', '', '', 'TRG-116544186', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 07:19:25', '', '', '', '', '', 1, 0, '', '', 212866, 22642, '2022-05-07 09:37:21', '', ''),
(2801, '', '', '', 'TRG-116544186', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '2022-04-26 09:21:07', '', 'Jayden', '', '', '', 1, 0, '', '', 887560, 22642, '2022-05-07 09:37:21', '', ''),
(3, 'Used', 'desktop', '', '828393', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 68576, '2022-05-07 09:37:21', '', ''),
(4, 'Used', 'desktop', '', '481976', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 68576, '2022-05-07 09:37:21', '', ''),
(12, 'Used', 'desktop', '', '185817', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 80956, '2022-05-07 09:37:21', '', ''),
(13, 'Used', 'desktop', '', '596666', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 83874, '2022-05-07 09:37:21', '', ''),
(14, 'Used', 'desktop', '', '156477', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 74517, '2022-05-07 09:37:21', '', ''),
(15, 'Used', 'desktop', '', '631092', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 51323, '2022-05-07 09:37:21', '', ''),
(15609, 'Used', 'desktop', 'Lenovo', '11527259', '10 th', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-25 20:52:27', '', '', '', 'New', '', 1, 0, '', '', 91256632, 53472, '2022-05-07 09:37:21', '', ''),
(16, 'Used', 'desktop', '', '596185', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 53472, '2022-05-07 09:37:21', '', ''),
(15, 'Used', 'desktop', '', '631092', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 63499, '2022-05-07 09:37:21', '', ''),
(14, 'Used', 'desktop', '', '156477', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 63499, '2022-05-07 09:37:21', '', ''),
(12, 'Used', 'desktop', '', '185817', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 63499, '2022-05-07 09:37:21', '', ''),
(12, 'Used', 'desktop', '', '185817', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 87249, '2022-05-07 09:37:21', '', ''),
(13, 'Used', 'desktop', '', '596666', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 87249, '2022-05-07 09:37:21', '', ''),
(14, 'Used', 'desktop', '', '156477', '8th', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', 'james ', '', 'New', '', 1, 0, '', '', 55074, 87249, '2022-05-07 09:37:21', '', ''),
(12163, 'New', 'laptop', 'HP', '689126', '6th', '12 gb', '', 'CPU', '595470', 'HP Desktop Hightower', '37498', 'intel core i5', '4ghz', '', '', '', '500ssd', '2022-04-29 10:42:28', '', '', '', 'New', 'spoiled', 1, 0, '', '', 54292, 92331, '0000-00-00 00:00:00', 'warrantyout', ''),
(12152, 'New', 'laptop', 'HP', '607921', '6th', '12 gb', '', 'CPU', '595470', 'HP Desktop Hightower', '37498', 'intel core i5', '4ghz', '', '', '', '500ssd', '2022-04-29 10:42:28', '', '', '', 'New', '', 1, 0, '', '', 54292, 92331, '0000-00-00 00:00:00', 'faulty', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 14539, '0000-00-00 00:00:00', 'masterlist', ''),
(15680, 'Refurb', 'laptop', '', '67996973', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 59158, '0000-00-00 00:00:00', 'masterlist', ''),
(15679, 'Refurb', 'laptop', '', '20057617', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 59158, '0000-00-00 00:00:00', 'masterlist', ''),
(15680, 'Refurb', 'laptop', '', '67996973', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 59158, '0000-00-00 00:00:00', 'masterlist', ''),
(15679, 'Refurb', 'laptop', '', '20057617', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 59158, '0000-00-00 00:00:00', 'masterlist', ''),
(15680, 'Refurb', 'laptop', '', '67996973', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 59158, '0000-00-00 00:00:00', 'masterlist', ''),
(15679, 'Refurb', 'laptop', '', '20057617', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 59158, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 69199, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 69199, '0000-00-00 00:00:00', 'masterlist', ''),
(15679, 'Refurb', 'laptop', '', '20057617', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 64343, '0000-00-00 00:00:00', 'masterlist', ''),
(12192, 'Refurb', 'hdd', '', '947146', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-03 12:51:33', '', '', '', '323232New', 'Spoiled', 1, 0, '', '', 15485, 64343, '2013-07-24 21:00:00', 'warrantyin', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 44291, '0000-00-00 00:00:00', 'masterlist', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 42553, '0000-00-00 00:00:00', 'masterlist', ''),
(15679, 'Refurb', 'laptop', '', '20057617', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 42553, '0000-00-00 00:00:00', 'masterlist', ''),
(12209, 'Used', 'desktop', '', '772887', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 10:35:13', '', '', '', '', '', 1, 0, '', '', 42040, 42553, '0000-00-00 00:00:00', 'warrantyin', ''),
(2777, 'New', 'desktop', '', 'TRG-117284310', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '0000-00-00 00:00:00', '', '', '', '455', '', 0, 0, '', '', 212866, 42553, '0000-00-00 00:00:00', 'faulty', ''),
(2778, 'New', 'desktop', '', 'TRG-117284310', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '0000-00-00 00:00:00', '', '', '', '455', '', 0, 0, '', '', 212866, 42553, '0000-00-00 00:00:00', 'faulty', ''),
(15678, 'Refurb', 'laptop', '', '69830750', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 42553, '0000-00-00 00:00:00', 'masterlist', ''),
(15679, 'Refurb', 'laptop', '', '20057617', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 42553, '0000-00-00 00:00:00', 'masterlist', ''),
(12209, 'Used', 'desktop', '', '772887', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 10:35:13', '', '', '', '', '', 1, 0, '', '', 42040, 42553, '0000-00-00 00:00:00', 'warrantyin', ''),
(2777, 'New', 'desktop', '', 'TRG-117284310', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '0000-00-00 00:00:00', '', '', '', '455', '', 0, 0, '', '', 212866, 42553, '0000-00-00 00:00:00', 'faulty', ''),
(2778, 'New', 'desktop', '', 'TRG-117284310', '10th Generation', '', '', '', '', 'Gateway 15', '', 'Intel Core i5', '2', '', '', '', '256', '0000-00-00 00:00:00', '', '', '', '455', '', 0, 0, '', '', 212866, 42553, '0000-00-00 00:00:00', 'faulty', ''),
(15679, 'Refurb', 'laptop', '', '20057617', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-07 09:38:42', '', '', '', '78', '', 1, 0, '', '', 39997075, 96278, '0000-00-00 00:00:00', 'masterlist', ''),
(4780, 'Used', 'laptop', '', '864794', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-27 13:40:51', '', '', '', 'New', '', 1, 0, '', '', 91284, 96278, '0000-00-00 00:00:00', 'faulty', ''),
(4782, 'Used', 'laptop', '', '155024', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-27 13:40:51', '', '', '', 'New', '', 1, 0, '', '', 91284, 96367, '0000-00-00 00:00:00', 'faulty', ''),
(4782, 'Used', 'laptop', '', '155024', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-04-27 13:40:51', '', '', '', 'New', '', 1, 0, '', '', 91284, 96367, '0000-00-00 00:00:00', 'faulty', ''),
(4821, 'Refurb', 'desktop', 'Lenovo', '539697', '10 th', '4 gb', '14', 'CPU', '595470', 'HP Desktop Hightower', '37498', 'intel core i5', '4ghz', '10000', 'yes', 'silver', '256', '2022-04-28 10:39:30', '', 'james', '', 'New', '', 1, 0, '', '', 43721, 96367, '0000-00-00 00:00:00', 'faulty', ''),
(4821, 'Refurb', 'desktop', 'Lenovo', '539697', '10 th', '4 gb', '14', 'CPU', '595470', 'HP Desktop Hightower', '37498', 'intel core i5', '4ghz', '10000', 'yes', 'silver', '256', '2022-04-28 10:39:30', '', 'james', '', 'New', '', 1, 0, '', '', 43721, 96367, '0000-00-00 00:00:00', 'faulty', ''),
(15719, 'Used', 'allinone', 'Lenovo', '74616130', '10 th', '', '', '', '', '', '', '', '', '', '', '', '', '2022-05-09 08:47:29', '', '', '', '', '', 1, 0, '', '', 21093061, 74057, '0000-00-00 00:00:00', 'faulty', ''),
(13, 'used', 'laptop', 'apple', 'SP046808', '7Y32', '8192', '12\"', 'A1534', 'SP046808', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 57512, '0000-00-00 00:00:00', 'masterlist', ''),
(12, 'used', 'laptop', 'apple', 'SP046816', '7Y54', '8192', '12\"', 'A1534', 'SP046816', 'A1534', 'A1534', 'Intel Core i5', '1.3', '30000', '-', '', '512', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 57512, '0000-00-00 00:00:00', 'masterlist', ''),
(11, 'used', 'laptop', 'apple', 'SP046820', '6Y30', '8192', '12\"', 'A1534', 'SP046820', 'A1534', 'A1534', 'Intel Core M3', '1.1', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 57512, '0000-00-00 00:00:00', 'masterlist', ''),
(10, 'used', 'laptop', 'apple', 'SP046821', '7Y32', '8192', '12\"', 'A1534', 'SP046821', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', 'Body Dent', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 57512, '0000-00-00 00:00:00', 'masterlist', ''),
(13, 'used', 'laptop', 'apple', 'SP046808', '7Y32', '8192', '12\"', 'A1534', 'SP046808', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 71405, '0000-00-00 00:00:00', 'masterlist', ''),
(10, 'used', 'laptop', 'apple', 'SP046821', '7Y32', '8192', '12\"', 'A1534', 'SP046821', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', 'Body Dent', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 71405, '0000-00-00 00:00:00', 'masterlist', ''),
(11, 'used', 'laptop', 'apple', 'SP046820', '6Y30', '8192', '12\"', 'A1534', 'SP046820', 'A1534', 'A1534', 'Intel Core M3', '1.1', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 71405, '0000-00-00 00:00:00', 'masterlist', ''),
(12, 'used', 'laptop', 'apple', 'SP046816', '7Y54', '8192', '12\"', 'A1534', 'SP046816', 'A1534', 'A1534', 'Intel Core i5', '1.3', '30000', '-', '', '512', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 71405, '0000-00-00 00:00:00', 'masterlist', ''),
(5, 'used', 'laptop', 'apple', 'SP046831', '7Y32', '8192', '12\"', 'A1534', 'SP046831', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(6, 'used', 'laptop', 'apple', 'SP046844', '7Y32', '8192', '12\"', 'A1534', 'SP046844', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', 'Body Scratch', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(7, 'used', 'laptop', 'apple', 'SP046841', '5Y31', '8192', '12\"', 'A1534', 'SP046841', 'A1534', 'A1534', 'Intel Core M', '1.1', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(8, 'used', 'laptop', 'apple', 'SP046840', '5Y31', '8192', '12\"', 'A1534', 'SP046840', 'A1534', 'A1534', 'Intel Core M', '1.1', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(1, 'used', 'laptop', 'apple', 'SP046364', '5th', '8192', '13.3\"', 'A1466', 'SP046364', 'A1466', 'A1466', 'Intel Core i5', '1.8', '30000', '-', '', '128 ssd', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(3, 'used', 'laptop', 'apple', 'SP046838', '5Y31', '8192', '12\"', 'A1534', 'SP046838', 'A1534', 'A1534', 'Intel Core M', '1.1', '30000', '-', 'Body Scratch', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(10, 'used', 'laptop', 'apple', 'SP046821', '7Y32', '8192', '12\"', 'A1534', 'SP046821', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', 'Body Dent', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(11, 'used', 'laptop', 'apple', 'SP046820', '6Y30', '8192', '12\"', 'A1534', 'SP046820', 'A1534', 'A1534', 'Intel Core M3', '1.1', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(12, 'used', 'laptop', 'apple', 'SP046816', '7Y54', '8192', '12\"', 'A1534', 'SP046816', 'A1534', 'A1534', 'Intel Core i5', '1.3', '30000', '-', '', '512', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(13, 'used', 'laptop', 'apple', 'SP046808', '7Y32', '8192', '12\"', 'A1534', 'SP046808', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 79543, '0000-00-00 00:00:00', 'masterlist', ''),
(13, 'used', 'laptop', 'apple', 'SP046808', '7Y32', '8192', '12\"', 'A1534', 'SP046808', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 77637, '0000-00-00 00:00:00', 'faulty', ''),
(12, 'used', 'laptop', 'apple', 'SP046816', '7Y54', '8192', '12\"', 'A1534', 'SP046816', 'A1534', 'A1534', 'Intel Core i5', '1.3', '30000', '-', '', '512', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 77637, '0000-00-00 00:00:00', 'faulty', ''),
(11, 'used', 'laptop', 'apple', 'SP046820', '6Y30', '8192', '12\"', 'A1534', 'SP046820', 'A1534', 'A1534', 'Intel Core M3', '1.1', '30000', '-', '', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 77637, '0000-00-00 00:00:00', 'faulty', ''),
(10, 'used', 'laptop', 'apple', 'SP046821', '7Y32', '8192', '12\"', 'A1534', 'SP046821', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', 'Body Dent', '256', '2022-05-10 08:29:03', '', 'jane', '', '', '', 1, 0, '', '', 326717, 77637, '0000-00-00 00:00:00', 'faulty', ''),
(1, 'used', 'laptop', 'apple', 'SP046364', '5th', '8192', '13.3\"', 'A1466', 'SP046364', 'A1466', 'A1466', 'Intel Core i5', '1.8', '30000', '-', '', '128 ssd', '2022-05-10 09:43:14', '', 'bengi', '', '', '', 1, 0, '', '', 764478, 61427, '0000-00-00 00:00:00', 'warrantyin', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-10 09:43:14', '', 'bengi', '', '', '', 1, 0, '', '', 764478, 61427, '0000-00-00 00:00:00', 'warrantyin', ''),
(3, 'used', 'laptop', 'apple', 'SP046838', '5Y31', '8192', '12\"', 'A1534', 'SP046838', 'A1534', 'A1534', 'Intel Core M', '1.1', '30000', '-', 'Body Scratch', '256', '2022-05-10 09:43:14', '', 'bengi', '', '', '', 1, 0, '', '', 764478, 61427, '0000-00-00 00:00:00', 'warrantyin', ''),
(1, 'used', 'laptop', 'apple', 'SP046364', '5th', '8192', '13.3\"', 'A1466', 'SP046364', 'A1466', 'A1466', 'Intel Core i5', '1.8', '30000', '-', '', '128 ssd', '2022-05-10 09:43:14', '', 'bengi', '', '', '', 1, 0, '', '', 764478, 13658, '0000-00-00 00:00:00', 'warrantyin', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-10 09:43:14', '', 'bengi', '', '', '', 1, 0, '', '', 764478, 13658, '0000-00-00 00:00:00', 'warrantyin', ''),
(3, 'used', 'laptop', 'apple', 'SP046838', '5Y31', '8192', '12\"', 'A1534', 'SP046838', 'A1534', 'A1534', 'Intel Core M', '1.1', '30000', '-', 'Body Scratch', '256', '2022-05-10 09:43:14', '', 'bengi', '', '', '', 1, 0, '', '', 764478, 13658, '0000-00-00 00:00:00', 'warrantyin', ''),
(5, 'used', 'laptop', 'apple', 'SP046831', '7Y32', '8192', '12\"', 'A1534', 'SP046831', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', '', '256', '2022-05-10 11:18:12', '', '', '', '', '', 1, 0, '', '', 494224, 18867, '0000-00-00 00:00:00', 'masterlist', ''),
(6, 'used', 'laptop', 'apple', 'SP046844', '7Y32', '8192', '12\"', 'A1534', 'SP046844', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', 'Body Scratch', '256', '2022-05-10 11:18:12', '', '', '', '', '', 1, 0, '', '', 494224, 18867, '0000-00-00 00:00:00', 'masterlist', ''),
(7, 'used', 'laptop', 'apple', 'SP046841', '5Y31', '8192', '12\"', 'A1534', 'SP046841', 'A1534', 'A1534', 'Intel Core M', '1.1', '30000', '-', '', '256', '2022-05-10 11:18:12', '', 'anthony ', '', '', '', 1, 0, '', '', 494224, 18867, '0000-00-00 00:00:00', 'masterlist', ''),
(3, 'used', 'laptop', 'apple', 'SP046838', '5Y31', '8192', '12\"', 'A1534', 'SP046838', 'A1534', 'A1534', 'Intel Core M', '1.1', '30000', '-', 'Body Scratch', '256', '2022-05-10 18:44:31', '', '', 'jane', '', '', 1, 0, '', '', 743149, 39381, '0000-00-00 00:00:00', 'warrantyin', ''),
(3, 'used', 'laptop', 'apple', 'SP046838', '5Y31', '8192', '12\"', 'A1534', 'SP046838', 'A1534', 'A1534', 'Intel Core M', '1.1', '30000', '-', 'Body Scratch', '256', '2022-05-10 14:37:46', '', 'Jackson', '', '', '', 1, 0, '', '', 206431, 39381, '0000-00-00 00:00:00', 'warrantyin', ''),
(13, 'used', 'laptop', 'apple', 'SP046808', '7Y32', '8192', '12\"', 'A1534', 'SP046808', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', '', '256', '2022-05-11 08:29:28', '', '', 'jane', '', '', 1, 0, '', '', 905983, 52262, '0000-00-00 00:00:00', 'masterlist', ''),
(12, 'used', 'laptop', 'apple', 'SP046816', '7Y54', '8192', '12\"', 'A1534', 'SP046816', 'A1534', 'A1534', 'Intel Core i5', '1.3', '30000', '-', '', '512', '2022-05-11 08:29:28', '', '', 'jane', '', '', 1, 0, '', '', 905983, 52262, '0000-00-00 00:00:00', 'masterlist', ''),
(11, 'used', 'laptop', 'apple', 'SP046820', '6Y30', '8192', '12\"', 'A1534', 'SP046820', 'A1534', 'A1534', 'Intel Core M3', '1.1', '30000', '-', '', '256', '2022-05-11 08:29:28', '', '', 'jane', '', '', 1, 0, '', '', 905983, 52262, '0000-00-00 00:00:00', 'masterlist', ''),
(10, 'used', 'laptop', 'apple', 'SP046821', '7Y32', '8192', '12\"', 'A1534', 'SP046821', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', 'Body Dent', '256', '2022-05-11 08:29:28', '', '', 'jane', '', '', 1, 0, '', '', 905983, 52262, '0000-00-00 00:00:00', 'masterlist', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-11 09:13:49', '', 'chris', '', '', '', 1, 0, '', '', 160133, 26862, '0000-00-00 00:00:00', 'warrantyin', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-11 09:13:49', '', 'chris', '', '', '', 1, 0, '', '', 160133, 35750, '0000-00-00 00:00:00', 'warrantyin', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-11 09:13:49', '', 'chris', '', '', '', 1, 0, '', '', 160133, 93223, '0000-00-00 00:00:00', 'warrantyin', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-11 09:13:49', '', 'chris', '', '', '', 1, 0, '', '', 160133, 93223, '0000-00-00 00:00:00', 'warrantyin', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-11 09:13:49', '', 'chris', '', '', '', 1, 0, '', '', 160133, 54891, '0000-00-00 00:00:00', 'warrantyin', ''),
(4, 'used', 'laptop', 'apple', 'SP046842', '7Y32', '8192', '12\"', 'A1534', 'SP046842', 'A1534', 'A1534', 'Intel Core M3', '1.2', '30000', '-', '', '256', '2022-05-11 09:13:49', '', 'chris', '', '', '', 1, 0, '', '', 160133, 89077, '0000-00-00 00:00:00', 'warrantyin', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-11 09:13:49', '', 'chris', '', '', '', 1, 0, '', '', 160133, 97975, '0000-00-00 00:00:00', 'warrantyin', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-11 13:28:49', '', 'james ', '', '', '', 1, 0, '', '', 866842, 47458, '0000-00-00 00:00:00', 'faulty', ''),
(2, 'used', 'laptop', 'apple', 'SP046401', '7th', '16384', '15.4\"', 'A1707', 'SP046401', 'A1707', 'A1707', 'Intel Core i7', '3.1', '30000', '-', '', '1000', '2022-05-11 13:28:14', '', '', 'jane', '', '', 1, 0, '', '', 327672, 47458, '0000-00-00 00:00:00', 'faulty', ''),
(4808, 'Refurb', 'allinone', 'Lenovo', '30436853', '10 th', '16 gb', '15', 'CPU', 'SP0468', 'HP Desktop Hightower', '37498', 'intel core i5', '4ghz', '10000', 'yes', 'stored', '500', '2022-05-18 11:23:39', '', 'anthony', '', 'New', '', 1, 0, '', '', 39747492, 29856, '0000-00-00 00:00:00', 'faulty', '');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `part` varchar(20) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `comment` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(20) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL,
  `tqty` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vproduct`
--

CREATE TABLE `vproduct` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `vendor` varchar(255) NOT NULL COMMENT 'name',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'sell',
  `random` int(30) NOT NULL COMMENT 'created at',
  `ref` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `document` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Atomic database';

--
-- Dumping data for table `vproduct`
--

INSERT INTO `vproduct` (`id`, `vendor`, `date`, `random`, `ref`, `address`, `phone`, `document`, `id_no`) VALUES
(0, '', '2022-05-11 13:57:12', 0, '47458', '', 0, 'summary - 47458.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `warrantyi`
--

CREATE TABLE `warrantyi` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `part` varchar(20) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `comment` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warrantyin`
--

CREATE TABLE `warrantyin` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warrantyout`
--

CREATE TABLE `warrantyout` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(1) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `random` int(12) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tbl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wicustomer`
--

CREATE TABLE `wicustomer` (
  `id` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `random` int(12) NOT NULL,
  `assetid` int(12) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wicustomer`
--

INSERT INTO `wicustomer` (`id`, `fname`, `lname`, `phone`, `location`, `email`, `user_created_at`, `random`, `assetid`, `id_no`, `username`) VALUES
(0, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 572480, 0, '11684578', 'Jacks'),
(0, 'chris', 'kirubi', 790038900, 'Nairobi', 'chriskirubi@gmail.com', '2022-05-06 09:10:15', 806128, 0, '11684578', 'kirubi'),
(0, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 28273, 0, '99899889', 'feon'),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 28273, 0, '99899889', 'feon'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 572480, 0, '11684578', 'Jacks'),
(6, 'james ', 'bengi', 520768623, 'kakamega', 'test@test.com', '2022-04-22 15:27:07', 572480, 0, '11684578', 'Jacks'),
(13, 'jane', 'feon', 238668932, 'nairobi', 'janejane@gmail.com', '2022-05-06 09:34:24', 28273, 0, '99899889', 'feon'),
(4, 'Jackson', 'Wesanza', 2147483647, 'Navakholo', 'jackwise179@gmail.co', '2022-04-22 15:24:51', 98639, 0, '56841584', 'Jackss');

-- --------------------------------------------------------

--
-- Table structure for table `wtemplist`
--

CREATE TABLE `wtemplist` (
  `id` int(20) NOT NULL,
  `conditions` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `part` varchar(20) NOT NULL,
  `serialno` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `modelid` varchar(30) NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `odd` varchar(20) NOT NULL,
  `comment` varchar(20) NOT NULL,
  `hdd` varchar(12) NOT NULL,
  `daterecieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `datedelivered` varchar(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `barcodes` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `del` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `random` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ccredit`
--
ALTER TABLE `ccredit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer3`
--
ALTER TABLE `customer3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerin`
--
ALTER TABLE `customerin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown`
--
ALTER TABLE `dropdown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faulty`
--
ALTER TABLE `faulty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faultyout`
--
ALTER TABLE `faultyout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gen`
--
ALTER TABLE `gen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hdd`
--
ALTER TABLE `hdd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicecreate`
--
ALTER TABLE `invoicecreate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobc`
--
ALTER TABLE `jobc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterlist`
--
ALTER TABLE `masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speed`
--
ALTER TABLE `speed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sublist`
--
ALTER TABLE `sublist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tcredit`
--
ALTER TABLE `tcredit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdebit`
--
ALTER TABLE `tdebit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technican`
--
ALTER TABLE `technican`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempinsert`
--
ALTER TABLE `tempinsert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempinvoice`
--
ALTER TABLE `tempinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templist`
--
ALTER TABLE `templist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tfaulty`
--
ALTER TABLE `tfaulty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tfaultyout`
--
ALTER TABLE `tfaultyout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinvoicecreate`
--
ALTER TABLE `tinvoicecreate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinvoicecreate1`
--
ALTER TABLE `tinvoicecreate1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvendors`
--
ALTER TABLE `tvendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warrantyi`
--
ALTER TABLE `warrantyi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warrantyin`
--
ALTER TABLE `warrantyin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warrantyout`
--
ALTER TABLE `warrantyout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wtemplist`
--
ALTER TABLE `wtemplist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ccredit`
--
ALTER TABLE `ccredit`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer3`
--
ALTER TABLE `customer3`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customerin`
--
ALTER TABLE `customerin`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `debit`
--
ALTER TABLE `debit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4821;

--
-- AUTO_INCREMENT for table `dropdown`
--
ALTER TABLE `dropdown`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `faulty`
--
ALTER TABLE `faulty`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12394;

--
-- AUTO_INCREMENT for table `faultyout`
--
ALTER TABLE `faultyout`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4790;

--
-- AUTO_INCREMENT for table `gen`
--
ALTER TABLE `gen`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hdd`
--
ALTER TABLE `hdd`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicecreate`
--
ALTER TABLE `invoicecreate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `jobc`
--
ALTER TABLE `jobc`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `masterlist`
--
ALTER TABLE `masterlist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12394;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `speed`
--
ALTER TABLE `speed`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4802;

--
-- AUTO_INCREMENT for table `sublist`
--
ALTER TABLE `sublist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tcredit`
--
ALTER TABLE `tcredit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12399;

--
-- AUTO_INCREMENT for table `tdebit`
--
ALTER TABLE `tdebit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15719;

--
-- AUTO_INCREMENT for table `technican`
--
ALTER TABLE `technican`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tempinsert`
--
ALTER TABLE `tempinsert`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15718;

--
-- AUTO_INCREMENT for table `tempinvoice`
--
ALTER TABLE `tempinvoice`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `templist`
--
ALTER TABLE `templist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4827;

--
-- AUTO_INCREMENT for table `tfaulty`
--
ALTER TABLE `tfaulty`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tfaultyout`
--
ALTER TABLE `tfaultyout`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15721;

--
-- AUTO_INCREMENT for table `tinvoicecreate`
--
ALTER TABLE `tinvoicecreate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14829;

--
-- AUTO_INCREMENT for table `tinvoicecreate1`
--
ALTER TABLE `tinvoicecreate1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14829;

--
-- AUTO_INCREMENT for table `tvendors`
--
ALTER TABLE `tvendors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warrantyi`
--
ALTER TABLE `warrantyi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12399;

--
-- AUTO_INCREMENT for table `warrantyin`
--
ALTER TABLE `warrantyin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12413;

--
-- AUTO_INCREMENT for table `warrantyout`
--
ALTER TABLE `warrantyout`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wtemplist`
--
ALTER TABLE `wtemplist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12413;
COMMIT;
