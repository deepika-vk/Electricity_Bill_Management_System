-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 05:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electicity_bill_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `msg_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `name`, `phone`, `address`, `message`, `msg_status`) VALUES
(2, 'sayem', '01788793504', 'Barisal, Barisal, Barisal', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuri', 0),
(3, 'Rafi', '01788793500', 'Barisal, Barisal, Barisal', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuri', 0),
(4, 'Rahat', '01788793502', 'Barisal, Barisal, Barisal', 'I need a new connection', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `meter_id` int(11) NOT NULL,
  `total_unit` int(11) NOT NULL,
  `total_bill` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `meter_id`, `total_unit`, `total_bill`, `Date`) VALUES
(1, 3, 105, 0, '2022-01-04 16:59:48'),
(3, 3, 200, 0, '2022-01-07 04:21:04'),
(6, 3, 300, 0, '2022-01-07 04:23:30'),
(7, 3, 40, 197, '2022-01-07 04:25:42'),
(15, 5, 250, 600, '2022-01-07 18:27:58'),
(20, 6, 400, 1783, '2022-01-07 18:42:40'),
(22, 5, 340, 1468, '2022-01-07 18:47:27'),
(24, 6, 300, 1258, '2022-01-08 13:08:37'),
(29, 9, 400, 0, '2022-01-08 13:29:58'),
(31, 6, 300, 0, '2022-01-08 13:37:01'),
(32, 3, 400, 0, '2022-01-08 16:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `complain` text NOT NULL,
  `reaply_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `complain`, `reaply_status`) VALUES
(1, 3, 'Sayem Hossen', 'sayem.cse5.bu@gmail.com', '', '', 'i have a problem.', 0),
(3, 7, 'Anis', 'anis.cse5.bu@gmail.com', '01883949348', 'mathbaria,pirojpur', 'compalin complain complain.', 0),
(6, 3, '', 'sayem.cse5.bu@gmail.com', '', '', 'we will solve', 0),
(7, 7, '', 'anis.cse5.bu@gmail.com', '', '', 'reaply reaply reaply', 0),
(8, 3, '', 'sayem.cse5.bu@gmail.com', '', '', 'we will solve', 0),
(9, 7, '', 'anis.cse5.bu@gmail.com', '', '', 'reaply reaply reaply', 0),
(10, 3, 'Sayem Hossen', 'sayem.cse5.bu@gmail.com', '013234342134', 'Mathbaria, pirojpur', 'i have some complain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meters`
--

CREATE TABLE `meters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meter_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meters`
--

INSERT INTO `meters` (`id`, `user_id`, `meter_name`) VALUES
(3, 3, 'meter1'),
(5, 7, 'metter07'),
(6, 9, 'metter09'),
(9, 12, 'meter12');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 1,
  `billing_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `bill_id`, `payment_status`, `billing_date`, `payment_time`) VALUES
(1, 1, 0, '2022-01-07 16:39:40', '2022-01-07 11:19:50'),
(3, 3, 0, '2022-01-07 16:29:48', '2022-01-07 11:20:11'),
(6, 6, 0, '2022-01-07 16:12:17', '2022-01-07 11:20:42'),
(7, 7, 1, '2022-01-07 11:20:42', '2022-01-07 11:20:42'),
(9, 20, 1, '2022-01-07 18:42:40', '2022-01-07 18:42:40'),
(11, 22, 1, '2022-01-07 18:47:27', '2022-01-07 18:47:27'),
(12, 24, 1, '2022-01-08 13:08:37', '2022-01-08 13:08:37'),
(14, 29, 0, '2022-01-08 14:49:56', '2022-01-08 13:29:58'),
(16, 31, 0, '2022-01-08 14:48:08', '2022-01-08 13:37:01'),
(17, 32, 0, '2022-01-08 16:38:06', '2022-01-08 16:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `types` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `email`, `password`, `types`) VALUES
(1, 'Tarikul', 'Barisal, Barisal', '01899997979', 'tarikul.cse5.bu@gmail.com', '12345', 'admin'),
(2, 'Rahat', 'Vola', '01788473647', 'rahat.cse5.bu@gmail.com', '12345', 'biller'),
(3, 'Sayem Hossen', 'Mathbaria, pirojpur', '013234342134', 'sayem.cse5.bu@gmail.com', '12345', 'consumer'),
(4, 'sobuj', 'Faridput, Dhaka.', '01788937823', 'sobuj.cse5.bu@gmail.com', '12345', 'manager'),
(7, 'Anis', 'mathbaria,pirojpur', '01883949348', 'anis.cse5.bu@gmail.com', '12345', 'consumer'),
(9, 'Fadil', 'Safa,Mathbaia', '01745378374', 'fadil.cse5.bu@gmail.com', '12345', 'consumer'),
(10, 'Tonmoy', 'Sorupkathi, Barisal.', '01876346782', 'tonmoy.cse5.bu@gmail.com', '12345', 'manager'),
(12, 'Johan', 'Barisal , University', '01423981238', 'johan.cse5.bu@gmail.com', '12345', 'consumer'),
(13, '', '', '', 'saikat.cse5.bu@gmail.com', '12345', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_details_ibfk_1` (`meter_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `meters`
--
ALTER TABLE `meters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meters_ibfk_1` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_ibfk_2` (`bill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `meters`
--
ALTER TABLE `meters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_ibfk_1` FOREIGN KEY (`meter_id`) REFERENCES `meters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `meters`
--
ALTER TABLE `meters`
  ADD CONSTRAINT `meters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `bill_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
