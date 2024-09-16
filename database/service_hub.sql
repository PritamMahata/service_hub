-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 12:28 PM
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
-- Database: `php36`
--
CREATE DATABASE IF NOT EXISTS `php36` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `php36`;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `spwd` varchar(255) NOT NULL,
  `sgender` varchar(255) NOT NULL,
  `slang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `semail`, `spwd`, `sgender`, `slang`) VALUES
(1, 'pritam', 'pritam@gmail.com', '@kfsdkfskfsdkf', 'Male', 'C,PHP'),
(4, 'pritam', 'hello@gmail.com', '@kfsdkfskfsdkf', 'Male', 'C,PHP'),
(5, 'pritam', 'hello@gmail.com', '@kfsdkfskfsdkf', 'Male', 'C,PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

--
-- Dumping data for table `pma__central_columns`
--

INSERT INTO `pma__central_columns` (`db_name`, `col_name`, `col_type`, `col_length`, `col_collation`, `col_isNull`, `col_extra`, `col_default`) VALUES
('service_hub', 'email_id', 'varchar', '100', 'utf8mb4_general_ci', 0, ',', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"relation_lines\":\"true\",\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"service_hub\",\"table\":\"bookings\"},{\"db\":\"service_hub\",\"table\":\"users\"},{\"db\":\"service_hub\",\"table\":\"services\"},{\"db\":\"service_hub\",\"table\":\"provider\"},{\"db\":\"service_hub\",\"table\":\"admin\"},{\"db\":\"service_hub\",\"table\":\"category\"},{\"db\":\"service_hub\",\"table\":\"roles\"},{\"db\":\"service_hub\",\"table\":\"sub_category\"},{\"db\":\"productdb\",\"table\":\"producttb\"},{\"db\":\"php36\",\"table\":\"student\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'service_hub', 'providers', '{\"CREATE_TIME\":\"2024-08-31 19:55:11\"}', '2024-09-04 05:13:01'),
('root', 'service_hub', 'sub_category', '{\"sorted_col\":\"`sub_category`.`subcat` ASC\"}', '2024-09-09 06:36:48'),
('root', 'test', 'usr', '{\"CREATE_TIME\":\"2024-03-04 22:34:13\",\"sorted_col\":\"`usr`.`id` ASC\"}', '2024-03-04 17:09:07'),
('root', 'trip', 'contacts', '{\"sorted_col\":\"`contacts`.`concern` ASC\"}', '2024-07-09 15:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-09-16 10:24:24', '{\"Console\\/Mode\":\"collapse\",\"ThemeDefault\":\"pmahomme\",\"DefaultConnectionCollation\":\"utf8mb4_nopad_bin\",\"Console\\/Height\":250.95499999999998,\"NavigationWidth\":187}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `productdb`
--
CREATE DATABASE IF NOT EXISTS `productdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `productdb`;

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`id`, `product_name`, `product_price`, `product_image`) VALUES
(1, 'Apple MacBook Pro', 1799, './upload/product1.png'),
(2, 'Sony E7 Headphones', 147, './upload/product2.png'),
(3, 'Sony Xperia Z4', 459, './upload/product3.png'),
(4, 'Samsung Galaxy A50', 278, './upload/product4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `service_hub`
--
CREATE DATABASE IF NOT EXISTS `service_hub` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `service_hub`;

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
(40, 'AF363FI45G8', 8, 1, 6, '19th Sep,12:00 PM - 3:00 PM', '2024-09-16 12:51:46', 'pending', 162728),
(43, 'TPQ1BT8B3HB', 8, 1, 1, '19th Sep,12:00 PM - 3:00 PM', '2024-09-16 12:57:40', 'pending', 471968),
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
(1, 'Basic Car Wash', 4, 500, '1 hr', 'A quick and thorough car wash.', 'Exterior Hand Wash,Rinse and Dry,Wheel and Tire Cleaning,Window and Mirror Cleaning,Exterior Wax Application,Quick Interior Vacuum', 3, 'assets\\images\\services\\img_1.jpg', 'discount', 10, '2024-09-01 01:00:00', 1, 1),
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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
