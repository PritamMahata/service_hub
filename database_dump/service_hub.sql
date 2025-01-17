-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 02:39 AM
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
  `issue` varchar(255) NOT NULL,
  `baddress` varchar(255) NOT NULL,
  `bphone` bigint(20) NOT NULL,
  `arrival_date` varchar(255) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `happy_code` int(11) NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `order_id`, `user_id`, `provider_id`, `service_id`, `issue`, `baddress`, `bphone`, `arrival_date`, `booking_date`, `status`, `happy_code`, `is_done`) VALUES
(81, 'Z071VSJ7', 1, 2, 2, 'JKH KH', 'HJG G JH JK K', 7898776666, '12th Jan,9:00 AM - 12:00 PM', '2025-01-10 19:10:43', 'cancelled', 230074, 1);

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
  `provider_category_id` int(11) DEFAULT 0,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
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
  `aadhaar` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `is_banned` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`pid`, `provider_category_id`, `fname`, `mname`, `lname`, `gender`, `age`, `email`, `con_num`, `alt_num`, `address`, `password`, `pan_card`, `acc_num`, `ifsc`, `experience`, `photo`, `certificate`, `aadhaar`, `created_at`, `updated_at`, `is_deleted`, `is_verified`, `is_banned`) VALUES
(1, 1, 'John', 'A.', 'Doe', 'Male', 35, 'john.doe@tech.com', 9876543210, 9123456789, '123 Tech Street', '123', 'ABCD1234P', 987654321012, 'IFSC1234567', '10 years', 'photo1.jpg', 'cert1.pdf', 1234567890, '2024-09-20 10:18:20', '2024-09-27 11:05:27', 0, 0, 0),
(2, 2, 'Sarah', 'B.', 'Johnson', 'Female', 29, 'sarah.j@health.com', 8765432109, 9987654321, '456 Health Ave', '123', 'BCDE2345Q', 876543210987, 'IFSC9876543', '5 years', 'photo2.jpg', 'cert2.pdf', 2345678901, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0),
(3, 3, 'Michael', 'C.', 'Smith', 'Male', 42, 'mike.smith@edu.com', 7654321098, 9765432108, '789 Education Blvd', '123', 'CDEF3456R', 765432109876, 'IFSC5432189', '15 years', 'photo3.jpg', 'cert3.pdf', 3456789012, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0),
(4, 4, 'Patricia', 'D.', 'Lee', 'Female', 38, 'pat.lee@finance.com', 6543210987, 8654321097, '101 Finance Road', '123', 'DEFG4567S', 654321098765, 'IFSC4321987', '12 years', 'photo4.jpg', 'cert4.pdf', 4567890123, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0),
(5, 5, 'David', 'E.', 'Martinez', 'Male', 33, 'dave.m@trans.com', 5432109876, 7543210986, '202 Transport Lane', '123', 'EFGH5678T', 543210987654, 'IFSC3210876', '7 years', 'photo5.jpg', 'cert5.pdf', 5678901234, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0),
(6, 6, 'Emily', 'F.', 'Davis', 'Female', 28, 'emily.d@techworld.com', 9321456789, 9456789123, '789 Tech Park', '123', 'FGHI6789U', 932145678945, 'IFSC6789123', '3 years', 'photo6.jpg', 'cert6.pdf', 6789012345, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0),
(7, 7, 'Robert', 'G.', 'Wilson', 'Male', 47, 'robert.w@medicenter.com', 9213457890, 9356789012, '567 Healthway', '123', 'GHIJ7890V', 921345789012, 'IFSC7890234', '20 years', 'photo7.jpg', 'cert7.pdf', 7890123456, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0),
(8, 8, 'Sophia', 'H.', 'Brown', 'Female', 31, 'sophia.b@schoolwise.com', 9102345678, 9234567891, '123 Academy Lane', '123', 'HIJK8901W', 910234567891, 'IFSC8901345', '6 years', 'photo8.jpg', 'cert8.pdf', 8901234567, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0),
(9, 9, 'James', 'I.', 'Taylor', 'Male', 36, 'james.t@finwise.com', 9012345678, 9123456789, '456 Money Ave', '123', 'IJKL9012X', 901234567890, 'IFSC9012456', '9 years', 'photo9.jpg', 'cert9.pdf', 9012345678, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0),
(10, 10, 'Linda', 'J.', 'Anderson', 'Female', 40, 'linda.a@transitlink.com', 8901234567, 8976543210, '789 Roadway Blvd', '123', 'JKLM0123Y', 890123456789, 'IFSC0123567', '12 years', 'photo10.jpg', 'cert10.pdf', 9123456789, '2024-09-20 10:18:20', '2024-09-20 10:18:20', 0, 1, 0);

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
(1, 'Car wash', 4, 900, '2 hr', 'Basic Car Wash', 'Special Car wash, Using high quality product', 3, 'assets/images/services/img_11.jpg', 'discount', 5, '2024-09-01 01:00:00', 1, 1),
(2, 'House Cleaning - Standard', 3, 1000, '4 hr', 'Basic cleaning for your home.', 'Vacuuming carpets and rugs to remove dust and debris, Spot cleaning of smudges or stains on walls or doors.', 5, 'assets/images/services/img_2.jpg', NULL, 5, '2024-09-01 01:00:00', 2, 2),
(3, 'Men\'s Haircut', 5, 500, '30 min', 'Classic and modern men\'s haircuts.', '', 2, 'assets\\images\\services\\img_7.jpg', 'bestseller', 0, '2024-09-01 03:00:00', 3, 3),
(4, 'Women\'s Haircut', 4, 800, '1 hr', 'Stylish women\'s haircuts for all hair types.', '', 2, 'assets\\images\\services\\img_8.jpg', 'new', 10, '2024-09-02 03:00:00', 4, 4),
(5, 'Bridal Makeup', 5, 5000, '2 hr', 'Complete bridal makeup with hairstyling.', '', 2, 'assets\\images\\services\\img_9.jpg', 'exclusive', 15, '2024-09-03 01:00:00', 5, 5),
(6, 'Party Makeup', 4, 1500, '1 hr', 'Glamorous makeup for parties and events.', '', 2, 'assets\\images\\services\\img_10.jpg', NULL, 10, '2024-09-04 02:00:00', 6, 6),
(7, 'Deluxe Car Wash', 5, 800, '2 hr', 'Includes wax and tire shine.', '', 3, 'assets\\images\\services\\img_13.jpg', 'sale', 20, '2024-09-02 01:00:00', 7, 7),
(8, 'Deep House Cleaning', 4, 2500, '6 hr', 'Comprehensive deep cleaning for your home.', '', 5, 'assets/images/services/img_17.jpg', 'sale', 15, '2024-09-05 01:00:00', 8, 8),
(9, 'Full Body Massage', 5, 2000, '1.5 hr', 'Relaxing full-body massage with essential oils.', '', 4, 'assets/images/services/img_12.jpg', 'popular', 10, '2024-09-06 01:00:00', 9, 9),
(10, 'Facial Treatment', 4, 1200, '1 hr', 'Rejuvenating facial for all skin types.', '', 4, 'assets/images/services/img_13.jpg', NULL, 5, '2024-09-07 01:00:00', 10, 10);

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
(1, 'Pritam', '', 'Mahata', 'test@gmail.com', '$2y$10$fobeFSw5qKH4dptGo7d68.vIVZIM.U.Kel82DGD97JzmYEELBXhNK', 9654325678, NULL, '43/A, Sonarpur, Ghasiara', 1, 0, '2024-09-26 16:47:57', 'f138c66bf86f285a11e6f89de5847de2'),
(2, 'Pritam', '', 'Mahata', 'pritammahata20@gmail.com', '$2y$10$gSnTUpngtRn.qIreNyD.XOx2tAdD9BdVk0UBJpKTWs.BSZkqrfazC', 1234567890, 1234567890, 'wrhewherh', 1, 0, '2024-09-06 12:56:29', 'f138c66bf86f285a11e6f89de5847de2'),
(13, 'Pritam', '', 'Mahata', 'pritammahata12@gmail.com', '$2y$10$GvA3MMAfurbBev2yLVwjKO/Z.aRe2/nXNPaGYNL6XCGi4B4S1V982', 9876543218, 0, 'jkas dklsadjlaksj dlkas dad ', 0, 0, '2024-09-27 13:07:20', 'd243a9f7b5d2c2ff4501e643d153e321'),
(14, 'Pritam', '', 'Mahata', 'temptoken.co@gmail.com', '$2y$10$Fzqlqn.NxnuM.YqSYJbf..wx/VW7MK7cJCf74vzaajCwyCsyApTK6', 1234567890, 0, 'asa\\r\\nsdf\\r\\nas\\r\\nf\\r\\nas\\r\\nf', 0, 0, '2024-12-26 11:10:48', 'a9d74264cb2d4a1c459e6cbfaa9ce66f'),
(15, '234234rwerwerwe', '', '', 'temp.token.co@gmail.com', '$2y$10$Pr3OQJF7DQxQNDkvp3p.v.U7fmp/T9BUvbE/k1K3zyEZCmap2xivy', 56754667745674575, 56456456456456456, 'sdfjsf\\r\\nasf\\r\\nas\\r\\nfas\\r\\ndf', 1, 0, '2024-12-26 11:19:31', '5fb5ad6dc37166eaf166d306b1184827');

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
  ADD KEY `bookings_ibfk_1` (`user_id`),
  ADD KEY `bookings_ibfk_2` (`provider_id`),
  ADD KEY `bookings_ibfk_3` (`service_id`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_provider_category` (`provider_category_id`);

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `fk_provider_category` FOREIGN KEY (`provider_category_id`) REFERENCES `category` (`cid`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
