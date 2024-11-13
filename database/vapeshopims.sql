-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 02:25 PM
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
-- Database: `vapeshopims`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `product_id`, `quantity`, `price`, `datetime`) VALUES
(6, 1, 3, 2700, '2024-11-04 16:21:16'),
(7, 2, 2, 3200, '2024-11-04 16:21:16'),
(8, 1, 2, 1200, '2024-11-04 16:31:27'),
(9, 1, 3, 2700, '2024-11-04 16:38:40'),
(10, 1, 2, 1200, '2024-11-04 20:07:03'),
(11, 1, 3, 2700, '2024-11-05 18:31:25'),
(12, 2, 2, 3200, '2024-11-05 18:31:25'),
(15, 1, 2, 600, '2024-11-05 18:33:49'),
(16, 2, 1, 800, '2024-11-05 18:33:49'),
(17, 1, 2, 600, '2024-11-06 21:15:41'),
(18, 2, 1, 800, '2024-11-06 21:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `text`, `datetime`) VALUES
(1, 1, 6, 'Hi hello guys', '2024-11-03 04:21:13'),
(2, 6, 1, 'Heyllooss', '2024-11-03 04:50:01'),
(8, 1, 7, 'hello po', '2024-11-03 14:16:20'),
(9, 1, 7, 'test chat', '2024-11-03 14:16:30'),
(10, 1, 6, 'hui alexis', '2024-11-03 14:16:39'),
(11, 1, 6, 'what if nagchat ako ng marami hah ilalagay mo parin b at asdjasdano ba hahahhaah', '2024-11-03 14:41:04'),
(12, 7, 1, 'haluh sino ka pu', '2024-11-03 14:45:01'),
(13, 6, 1, 'what if mapuno', '2024-11-03 14:50:04'),
(14, 6, 1, 'na yung chat', '2024-11-03 14:50:10'),
(15, 6, 1, 'maguumpisa sya sa taas pababa lol', '2024-11-03 14:50:21'),
(16, 6, 7, 'hay bohai', '2024-11-03 15:49:08'),
(17, 7, 6, 'bakit', '2024-11-05 16:03:09'),
(18, 1, 6, 'adsadasdas', '2024-11-06 21:13:16'),
(19, 1, 6, 'sadasd', '2024-11-06 21:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `product_name`, `price`, `stock`, `archived`) VALUES
(1, 123, 'Vape Juice', 300, 201, 0),
(2, 456, 'Hi HEKLko', 800, 145, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `header`, `body`, `user`, `created_at`) VALUES
(1, 'Hi hello', 'I dont know how but they found me', 'admin', '2024-09-03 01:57:01'),
(2, 'Wohooiiii', 'Vape Juice na marami is low at 10. Restock needed.', 'admin', '2024-09-03 01:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `user`, `products`, `status`, `datetime`) VALUES
(5, 'Admin', '[{\"product_id\":\"2\",\"name\":\"Hi HEKLko\",\"quantity\":\"20\"},{\"product_id\":\"1\",\"name\":\"Vape Juice\",\"quantity\":\"80\"}]', 'completed', '2024-11-05 14:41:03'),
(6, 'Admin', '[{\"product_id\":\"2\",\"name\":\"Hi HEKLko\",\"quantity\":\"10\"},{\"product_id\":\"1\",\"name\":\"Vape Juice\",\"quantity\":\"20\"}]', 'completed', '2024-11-05 17:19:22'),
(7, 'Admin', '[{\"product_id\":\"1\",\"name\":\"Vape Juice\",\"quantity\":\"30\"},{\"product_id\":\"2\",\"name\":\"Hi HEKLko\",\"quantity\":\"100\"}]', 'completed', '2024-11-06 21:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL,
  `archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `type`, `archived`) VALUES
(1, 'Admin', 'admin', 'yUxL7vBo0Zs7Sn67yG4NwE1URXZDV215bjhqZEQzNGVabWcxbVE9PQ==', 'admin', 0),
(6, 'Alexis Eleserio', 'alexis', 'yUxL7vBo0Zs7Sn67yG4NwE1URXZDV215bjhqZEQzNGVabWcxbVE9PQ==', 'employee', 0),
(7, 'Gwyneth Hagos', 'gwen', 'yUxL7vBo0Zs7Sn67yG4NwE1URXZDV215bjhqZEQzNGVabWcxbVE9PQ==', 'supplier', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
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
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
