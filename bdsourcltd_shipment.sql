-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2019 at 01:08 PM
-- Server version: 10.1.41-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdsourcltd_shipment`
--

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(13) NOT NULL,
  `buying_house_email` varchar(180) NOT NULL,
  `factory_md_email` varchar(180) NOT NULL,
  `factory_gm_email` varchar(180) NOT NULL,
  `buyer_house_email` varchar(180) NOT NULL,
  `md_house_email` varchar(180) NOT NULL,
  `item` varchar(255) NOT NULL,
  `pd_no` int(13) NOT NULL,
  `knitting` date NOT NULL,
  `ap_date` date NOT NULL,
  `qty` int(13) NOT NULL,
  `dyeing` date NOT NULL,
  `sewing` date NOT NULL,
  `cutting` date NOT NULL,
  `finishing` date NOT NULL,
  `ship_date` date NOT NULL,
  `inline_date` date NOT NULL,
  `final_date` date NOT NULL,
  `eta` varchar(255) NOT NULL,
  `alert_date` date NOT NULL,
  `shipment_status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `buying_house_email`, `factory_md_email`, `factory_gm_email`, `buyer_house_email`, `md_house_email`, `item`, `pd_no`, `knitting`, `ap_date`, `qty`, `dyeing`, `sewing`, `cutting`, `finishing`, `ship_date`, `inline_date`, `final_date`, `eta`, `alert_date`, `shipment_status`, `image`, `created_at`) VALUES
(17, 'jafrul.sojol@northsouth.edu', 'sojol@bdsourceltd.com', 'jafrul.sojol@gmail.com', '', '', 'tshirt', 3333, '0000-00-00', '2019-08-30', 444, '0000-00-00', '2022-10-19', '0000-00-00', '0000-00-00', '2020-01-31', '2019-12-27', '2020-01-16', 'rrfffgf', '2020-01-26', 'half done', 'images/store/1566810464Capture(1).png', '2019-08-26 19:07:44'),
(21, '', '', '', '', '', 'tshirt', 666666, '2019-10-24', '2019-10-31', 777777, '2019-10-30', '2019-10-03', '2019-09-26', '2019-09-30', '2019-11-01', '2019-10-31', '2019-10-24', 'jjjjj', '2019-10-27', 'half done', 'images/store/1567331757Capture(1).png', '2019-09-01 19:55:58'),
(27, 'asif@bdsourceltd.com', 'asif@bdsourceltd.com', 'asif@bdsourceltd.com', 'asif@bdsourceltd.com', 'asif@bdsourceltd.com', 'BAXX', 1919, '2019-09-11', '2019-09-02', 2000, '2019-09-17', '2019-09-24', '2019-09-21', '2019-10-05', '2019-10-06', '2019-09-28', '2019-10-05', '15/12/2019', '2019-10-01', '', '', '2019-09-02 21:13:48'),
(29, 'salman.auvi@gmail.com', 'salman.auvi@northsouth.edu', '', '', '', 'Pizza', 1, '0000-00-00', '0000-00-00', 2, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2019-09-12', '0000-00-00', '0000-00-00', '', '2019-09-07', '', 'images/store/1567789638accounting-banking-calculator-938965.jpg', '2019-09-07 03:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(13) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'info@bdsourceltd.com', 'f6ace6e0f22d6196ec4d3a889a5d235e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
