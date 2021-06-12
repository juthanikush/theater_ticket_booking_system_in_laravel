-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 09:50 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theater`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'eyJpdiI6ImpiZVZBampPRnFjeU1nVjRjbUJSc1E9PSIsInZhbHVlIjoiOE5FalFGYWU1SFB6cVdCUUhrL1dmQT09IiwibWFjIjoiZTBkZmFlYWM5M2IyZTRjNWVkNjdlODYyMWViOTBlZjBiZWIzNjQxZWNkNzc2NDM1OGYwZDZiMTdiZTk3MTc3NiJ9');

-- --------------------------------------------------------

--
-- Table structure for table `baner`
--

CREATE TABLE `baner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baner`
--

INSERT INTO `baner` (`id`, `image`, `status`, `added_on`) VALUES
(1, '12916.jpg', 1, '2021-06-04 10:43:01'),
(2, '72092.jpg', 1, '2021-06-04 10:43:20'),
(3, '11892.jpg', 1, '2021-06-04 10:43:35'),
(4, '39220.jpg', 1, '2021-06-04 10:43:49'),
(5, '66529.jpg', 1, '2021-06-04 10:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `movie_id` varchar(200) NOT NULL,
  `balcony_set` int(11) DEFAULT NULL,
  `mezzanine_set` int(11) DEFAULT NULL,
  `orchestra_set` int(11) DEFAULT NULL,
  `payment_status` varchar(150) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `u_id`, `movie_id`, `balcony_set`, `mezzanine_set`, `orchestra_set`, `payment_status`, `total_amt`, `added_on`) VALUES
(1, 1, '1', 5, NULL, NULL, 'Success', 1500, '2021-06-08 06:39:40'),
(2, 1, '1', 5, NULL, NULL, 'Success', 1500, '2021-06-08 06:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `show_name` varchar(55) NOT NULL,
  `theater_id` varchar(55) NOT NULL,
  `start_time` varchar(8) NOT NULL,
  `start_time_sloat` varchar(2) NOT NULL,
  `end_time` varchar(8) NOT NULL,
  `end_time_sloat` varchar(2) NOT NULL,
  `balcony_price` int(11) NOT NULL,
  `mezzanine_price` int(11) NOT NULL,
  `orchestra_price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `show_name`, `theater_id`, `start_time`, `start_time_sloat`, `end_time`, `end_time_sloat`, `balcony_price`, `mezzanine_price`, `orchestra_price`, `image`, `status`, `added_on`) VALUES
(1, 'lucifer', '1', '9:30', 'AM', '11:30', 'AM', 300, 200, 100, '75179.jpg', 1, '2021-05-30 10:07:05'),
(2, 'master', '2', '12:30', 'AM', '2:30', 'PM', 600, 300, 150, '31468.jpg', 1, '2021-06-04 01:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `theater_room`
--

CREATE TABLE `theater_room` (
  `id` int(11) NOT NULL,
  `theater_name` varchar(50) NOT NULL,
  `balcony_sets` varchar(50) NOT NULL,
  `mezzanine_sets` varchar(50) NOT NULL,
  `orchestra_sets` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theater_room`
--

INSERT INTO `theater_room` (`id`, `theater_name`, `balcony_sets`, `mezzanine_sets`, `orchestra_sets`, `status`, `added_on`) VALUES
(1, 'red', '150', '150', '200', 1, '2021-05-27 05:41:17'),
(2, 'blue', '200', '200', '200', 1, '2021-05-27 06:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `status`, `added_on`) VALUES
(1, 'kushjuthani', 'eyJpdiI6InZrQ1VKOGdlNVlXQzJsc1FkL0dJMWc9PSIsInZhbHVlIjoiTnEraUV3TzhrVkFRWHJkRzgvbElFUT09IiwibWFjIjoiNjc5OWIzYWI3MTAzNDIzM2UwNTczMmVhNjg5YmZkNTdmMWVhYTUzOTk0MmRjNjk4MDdkYjkzZmVjMzMxNWY3YSJ9', 'juthanikush18@gmail.com', 1, '2021-06-05 07:55:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baner`
--
ALTER TABLE `baner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater_room`
--
ALTER TABLE `theater_room`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `baner`
--
ALTER TABLE `baner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `theater_room`
--
ALTER TABLE `theater_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
