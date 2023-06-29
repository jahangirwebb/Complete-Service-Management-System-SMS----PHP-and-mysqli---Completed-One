-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 08:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `admin_id` int(11) NOT NULL,
  `a_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `a_email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `a_password` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`admin_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Admin', 'admin@sms.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `product_dop` date NOT NULL,
  `product_avail` int(11) NOT NULL,
  `product_total` int(11) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`product_id`, `product_name`, `product_dop`, `product_avail`, `product_total`, `product_cost`, `sell_price`) VALUES
(1, 'Wireless Keyboard', '2020-08-26', 7, 10, 300, 400),
(2, 'Petium 4', '2020-08-30', 8, 20, 4000, 5000),
(3, 'GTX 1050ti', '2020-08-31', 5, 5, 10000, 12000),
(4, 'Mouse', '2020-08-28', 15, 20, 200, 300),
(5, 'Surface Pro 7', '2020-09-06', 15, 15, 2500, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8mb4_bin NOT NULL,
  `request_desc` text COLLATE utf8mb4_bin NOT NULL,
  `request_name` varchar(80) COLLATE utf8mb4_bin NOT NULL,
  `addressline1` text COLLATE utf8mb4_bin NOT NULL,
  `addressline2` text COLLATE utf8mb4_bin NOT NULL,
  `city` varchar(80) COLLATE utf8mb4_bin NOT NULL,
  `state` varchar(80) COLLATE utf8mb4_bin NOT NULL,
  `zip` int(11) NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_bin NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `assigntechnician` varchar(80) COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `request_name`, `addressline1`, `addressline2`, `city`, `state`, `zip`, `email`, `mobile`, `assigntechnician`, `date`) VALUES
(3, 9, 'Laptop hard disk fault', 'Laptop hard disk life power is only 9%.', 'Farooqali', 'misrial ', 'Rawalpindi ', 'Rawalpindi ', 'Punjab ', 46000, 'farooq@mail.com', 3115099877, 'abdul', '2020-06-28'),
(4, 10, 'Table is Not confortable.', 'My Computer table is not confortable.', 'Jahangir', 'Mirial ', 'Chor Chouwk ', 'Rawalpindi ', 'Punjab ', 46000, 'jahangir@mail.com', 3185099877, 'chappa', '2020-06-28'),
(5, 9, 'Laptop hard disk fault', 'Laptop hard disk life power is only 9%.', 'Farooqali', 'misrial ', 'Rawalpindi ', 'Rawalpindi ', 'Punjab ', 46000, 'farooq@mail.com', 3115099877, 'Jhon', '2020-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `customer_add` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_each` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `sell_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`customer_id`, `customer_name`, `customer_add`, `product_name`, `quantity`, `price_each`, `price_total`, `sell_date`) VALUES
(1, 'Jahangir', 'Misrial Chowk', 'Wireless Keyboard', 3, 300, 900, '2020-09-07'),
(2, 'Farooq', 'Peoples Colony', 'Petium 4', 2, 4000, 8000, '2020-09-07'),
(3, 'Abdullah', 'chakra Road', 'Mouse', 5, 200, 1000, '2020-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `requester_info` text COLLATE utf8mb4_bin NOT NULL,
  `requester_desc` text COLLATE utf8mb4_bin NOT NULL,
  `requester_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `requester_add1` text COLLATE utf8mb4_bin NOT NULL,
  `requester_add2` text COLLATE utf8mb4_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `requester_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `requester_info`, `requester_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `requester_date`) VALUES
(9, 'Laptop hard disk fault', 'Laptop hard disk life power is only 9%.', 'Farooqali', 'misrial', 'Rawalpindi', 'Rawalpindi', 'Punjab', 46000, 'farooq@mail.com', 3115099877, '2020-06-28'),
(10, 'Table is Not confortable.', 'My Computer table is not confortable.', 'Jahangir', 'Mirial', 'Chor Chouwk', 'Rawalpindi', 'Punjab', 46000, 'jahangir@mail.com', 3185099877, '2020-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `t_city` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `t_mobile` bigint(20) NOT NULL,
  `t_email` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`t_id`, `t_name`, `t_city`, `t_mobile`, `t_email`) VALUES
(1, 'jahangir', 'Rawalpindi', 3185099877, 'jahangir@mail.com'),
(5, 'Malik', 'Multan', 3130910758, 'malik@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin_tb`
--

CREATE TABLE `userlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(155) COLLATE utf8mb4_bin NOT NULL,
  `r_email` varchar(155) COLLATE utf8mb4_bin NOT NULL,
  `r_password` varchar(155) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `userlogin_tb`
--

INSERT INTO `userlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(1, 'jahangirDon', 'khanDon@gmail.com', 'hello'),
(4, 'zubair Khan', 'zubair@gmail.com', 'khan123'),
(7, 'Farooq Ali', 'farooq@gmail.com', 'password'),
(9, 'Jahangir Khan', 'project@sms.com', 'password'),
(10, 'Roman Raj', 'user@sms.com', 'password'),
(11, 'jahangir khan', 'jahangir@mail.com', 'pass'),
(13, 'manibaba', 'manibaba@mail.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `userlogin_tb`
--
ALTER TABLE `userlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlogin_tb`
--
ALTER TABLE `userlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
