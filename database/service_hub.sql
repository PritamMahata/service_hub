-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 08:02 PM
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
-- Database: `service_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `apwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `aemail`, `apwd`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456'),
(2, 'Rahul', 'rahul@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `arrival_date` varchar(255) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `happy_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `order_id`, `user_id`, `provider_id`, `service_id`, `arrival_date`, `booking_date`, `status`, `happy_code`) VALUES
(30, 'TIE6Q7W3UAI', 8, 1, 4, '21st Sep,3:00 PM - 5:00 PM', '2024-09-16 11:25:15', 'confirmed', 799530),
(45, '3YW31JT2EAV', 18, 1, 1, '17th Sep,9:00 AM - 12:00 PM', '2024-09-16 15:28:05', 'pending', 258792);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'Home Services'),
(2, 'Beauty & Wellness'),
(3, 'Automotive'),
(4, 'Electronics Repair'),
(5, 'Cleaning Services'),
(6, 'Fitness & Training'),
(7, 'Health Care'),
(8, 'Pet Services'),
(9, 'Event Planning'),
(10, 'Gardening'),
(11, 'Home Improvement'),
(12, 'IT Support'),
(13, 'Education & Tutoring'),
(14, 'Personal Shopping'),
(15, 'Real Estate Services');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `pid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `con_num` bigint(20) NOT NULL,
  `alt_num` bigint(20) DEFAULT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `pan_card` varchar(20) NOT NULL,
  `acc_num` bigint(20) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `aadhaar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `is_banned` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`pid`, `fname`, `mname`, `lname`, `gender`, `age`, `email`, `con_num`, `alt_num`, `address`, `password`, `pan_card`, `acc_num`, `ifsc`, `experience`, `photo`, `certificate`, `aadhaar`, `created_at`, `updated_at`, `is_deleted`, `is_verified`, `is_banned`) VALUES
(1, 'John', 'M', 'Doe', 'Male', 35, 'john.doe@example.com', 9876543210, 9876543210, '123 Main St, Springfield', 'hashed_password', 'ABCDE1234F', 123456789012, 'SBIN0001234', '5 years as a plumber', 'john_photo.jpg', 'plumber_certificate.jpg', 'john_aadhaar.jpg', '2024-09-01 04:30:00', '2024-09-09 10:13:25', 0, 0, 0),
(2, 'Jane', 'A', 'Smith', 'Female', 29, 'jane.smith@example.com', 9876543211, NULL, '456 Market St, Springfield', 'hashed_password', 'XYZDE5678K', 123456789013, 'HDFC0005678', '3 years as a hairstylist', 'jane_photo.jpg', 'stylist_certificate.jpg', 'jane_aadhaar.jpg', '2024-09-01 05:30:00', '2024-09-01 05:30:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `providertask`
--

CREATE TABLE `providertask` (
  `pt_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `providertask`
--

INSERT INTO `providertask` (`pt_id`, `provider_id`, `sub_category_id`, `date`) VALUES
(1, 1, 1, '2024-09-05 09:00:00'),
(2, 2, 2, '2024-09-06 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `srating` int(11) NOT NULL,
  `sprice` int(11) NOT NULL,
  `sduration` varchar(10) NOT NULL,
  `sdes` varchar(255) NOT NULL,
  `sfeatures` varchar(255) NOT NULL,
  `scategory` int(11) NOT NULL,
  `simage` varchar(255) NOT NULL,
  `sattraction` varchar(255) DEFAULT NULL,
  `sdiscount` int(11) DEFAULT NULL,
  `screate` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `sname`, `srating`, `sprice`, `sduration`, `sdes`, `sfeatures`, `scategory`, `simage`, `sattraction`, `sdiscount`, `screate`, `created_by`, `updated_by`) VALUES
(1, 'Car wash', 4, 900, '2 hr', 'Basic Car Wash', '                    Special Car wash, Using high quality product                    ', 7, 'assets\\images\\services\\img_1.jpg', 'discount', 5, '2024-09-01 01:00:00', 1, 1),
(2, 'House Cleaning - Standard', 3, 1000, '4 hr', 'Basic cleaning for your home.', '', 5, 'assets\\images\\services\\img_2.jpg', NULL, 5, '2024-09-01 01:00:00', 2, 2),
(3, 'Pipe Leak Repair', 4, 1500, '2 hr', 'Fixing and replacing leaking pipes.', '', 1, 'assets\\images\\services\\img_3.jpg', 'discount', 15, '2024-09-01 04:00:00', 1, 1),
(4, 'Drain Cleaning', 5, 1200, '1 hr', 'Professional cleaning of clogged drains.', '', 1, 'assets\\images\\services\\img_4.jpg', NULL, 10, '2024-09-01 23:00:00', 1, 1),
(5, 'Light Fixture Installation', 4, 1000, '1.5 hr', 'Installation of new light fixtures.', '', 1, 'assets\\images\\services\\img_5.jpg', 'new', 5, '2024-09-01 01:00:00', 1, 1),
(6, 'Circuit Breaker Repair', 5, 2000, '3 hr', 'Repair and replacement of circuit breakers.', '', 1, 'assets\\images\\services\\img_6.jpg', 'popular', 20, '2024-09-03 00:00:00', 1, 1),
(7, 'Men\'s Haircut', 5, 500, '30 min', 'Classic and modern men\'s haircuts.', '', 2, 'assets\\images\\services\\img_7.jpg', 'bestseller', 0, '2024-09-01 03:00:00', 2, 2),
(8, 'Women\'s Haircut', 4, 800, '1 hr', 'Stylish women\'s haircuts for all hair types.', '', 2, 'assets\\images\\services\\img_8.jpg', 'new', 10, '2024-09-02 03:00:00', 2, 2),
(9, 'Bridal Makeup', 5, 5000, '2 hr', 'Complete bridal makeup with hairstyling.', '', 2, 'assets\\images\\services\\img_9.jpg', 'exclusive', 15, '2024-09-03 01:00:00', 2, 2),
(10, 'Party Makeup', 4, 1500, '1 hr', 'Glamorous makeup for parties and events.', '', 2, 'assets\\images\\services\\img_10.jpg', NULL, 10, '2024-09-04 02:00:00', 2, 2),
(11, 'Express Car Wash', 4, 300, '30 min', 'Quick exterior wash for your car.', '', 3, 'assets\\images\\services\\img_11.jpg', 'popular', 5, '2024-09-01 01:00:00', 1, 2),
(12, 'Interior Detailing', 5, 1200, '1.5 hr', 'Comprehensive interior cleaning and detailing.', '', 3, 'assets\\images\\services\\img_12.jpg', 'new', 20, '2024-09-01 23:00:00', 1, 2),
(13, 'Deluxe Car Wash', 5, 800, '2 hr', 'Includes wax and tire shine.', '', 3, 'assets\\images\\services\\img_13.jpg', 'sale', 20, '2024-09-02 01:00:00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subcat` int(11) NOT NULL,
  `subcatname` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subcat`, `subcatname`, `category_id`) VALUES
(1, 'Plumbing', 1),
(2, 'Haircut', 2),
(3, 'Car Wash', 3),
(4, 'Laptop Repair', 4),
(5, 'House Cleaning', 5),
(6, 'Personal Training', 6),
(7, 'Yoga Classes', 6),
(8, 'Nutrition Consultation', 7),
(9, 'Elderly Care', 7),
(10, 'Dog Walking', 8),
(11, 'Pet Grooming', 8),
(12, 'Wedding Planning', 9),
(13, 'Birthday Party Planning', 9),
(14, 'Lawn Mowing', 10),
(15, 'Garden Design', 10),
(16, 'Painting', 11),
(17, 'Carpentry', 11),
(18, 'Computer Repair', 12),
(19, 'Network Setup', 12),
(20, 'Math Tutoring', 13),
(21, 'Language Tutoring', 13),
(22, 'Fashion Consultation', 14),
(23, 'Grocery Shopping', 14),
(24, 'Property Management', 15),
(25, 'Home Staging', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `con_num` bigint(20) NOT NULL,
  `alt_num` bigint(20) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `isverified` int(10) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) DEFAULT 0,
  `ucreate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `v_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `mname`, `lname`, `email`, `password`, `con_num`, `alt_num`, `address`, `isverified`, `is_deleted`, `ucreate`, `v_code`) VALUES
(8, 'Pritam', NULL, 'Mahata', 'test@gmail.com', '$2y$10$xBh05JMX.BzOfwz7gGgHuOrQB/X5keE4C59t41L26Jpx4Lm4Ro2bC', 312312313, 123123123, 'qweqweds asd as', 1, 0, '2024-09-15 22:10:34', 'f138c66bf86f285a11e6f89de5847de2'),
(17, 'Pritam', '', 'Mahata', 'pritammahata20@gmail.com', '$2y$10$gSnTUpngtRn.qIreNyD.XOx2tAdD9BdVk0UBJpKTWs.BSZkqrfazC', 1234567890, 1234567890, 'wrhewherh', 1, 0, '2024-09-06 12:56:29', 'f138c66bf86f285a11e6f89de5847de2'),
(18, 'qwe', 'qwe', 'qwe', 'temp.token.co@gmail.com', '$2y$10$yvrNT1XOMdlehJNBmZHyzujyG3QDyZAaHRfxUPZE7gMYt8EfgQoTm', 123, 123, 'Earth', 1, 0, '2024-09-09 10:37:37', 'a26f1c1b5d7ee822a48e6b494949b4c2'),
(19, '123', '123', '123', 'pritammahata12@gmail.com', '$2y$10$5JgYcooUkiR/hufqeGN8ROmMdCtSzzEm7sUEKUALmbFL7EoqfwBRW', 123, 123, '1231313131', 1, 0, '2024-09-09 10:43:47', '4e5e750155da623ce65359985e4f9600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `provider_id` (`provider_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `providertask`
--
ALTER TABLE `providertask`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `provider_id` (`provider_id`),
  ADD KEY `sub_category_id` (`sub_category_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subcat`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `providertask`
--
ALTER TABLE `providertask`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`pid`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `services` (`sid`);

--
-- Constraints for table `providertask`
--
ALTER TABLE `providertask`
  ADD CONSTRAINT `providertask_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`pid`),
  ADD CONSTRAINT `providertask_ibfk_2` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`subcat`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
