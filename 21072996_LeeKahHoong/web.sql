-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2022 at 09:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `AdminID` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user database';

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`AdminID`, `First_name`, `Last_name`, `Username`, `Dob`, `Gender`, `Email`, `Phone`, `Pwd`) VALUES
(2, 'Gary', 'Lee', 'admin', '2002-05-23', 'M', 'mr.gary@outlook.my', '0125056536', '$2y$10$E3ygwjutWgaLNNva/UeY1uL6oIpVsx.0/6pqHJb7u9J/hk7WBAYji');

-- --------------------------------------------------------

--
-- Table structure for table `cust_info`
--

CREATE TABLE `cust_info` (
  `CustID` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user database';

--
-- Dumping data for table `cust_info`
--

INSERT INTO `cust_info` (`CustID`, `First_name`, `Last_name`, `Username`, `Dob`, `Gender`, `Email`, `Phone`, `Pwd`) VALUES
(1, 'John', 'Lee', 'johnlee', '2000-06-13', 'M', 'john@gmail.com', '0183647382', '$2y$10$enQeVQnGDXpjxNkDl5tabOjFQ6JGUxJMyyMCVBVleFUU2iUHrRQAu');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `qty` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `qty`, `img`, `date_added`) VALUES
(1, 'Hanging Planters', '<p>Sustainable hanging plant pot, made of recycled plastic and jute.</p>\r\n<h3>Highlights</h3>\r\n<ul>\r\n<li>Materials: recycled plastic, natural jute</li>\r\n<li>Width: 16 centimetres</li>\r\n<li>Height: 60 centimetres</li>\r\n<li>Depth: 16 centimetres</li>\r\n</ul>', '19.90', '0.00', 23, '1hangingplanters.jpg', '2022-10-12 13:58:12'),
(2, 'Red Wreath', '<p>Amazing Christmas door wreath, made of recycled plastic bottles.</p>\r\n<h3>Highlights</h3>\r\n<ul>\r\n<li>Materials: recycled plastic, bell decorations</li>\r\n<li>Diameter: 30 centimetres</li>\r\n</ul>', '15.00', '20.00', 37, '1wreaths.jpeg', '2022-10-13 14:23:46'),
(3, 'Spoon Desk Lamp', '<p>Recycling plastic spoon lamp, made of recycled plastic spoons.</p>\r\n<h3>Highlights</h3>\r\n<ul>\r\n<li>Materials: waste plastic spoon, led light bulb</li>\r\n<li>Diameter: 13 centimetres</li>\r\n<li>Height: 25 centimetres</li>\r\n<li>Light Bulb: LED bulb with E14 ending that is 3W is recommended</li>\r\n</ul>', '20.00', '30.00', 19, '1sdesklamp.jpg', '2022-10-13 16:34:39'),
(4, 'Pangolin Lantern', '<p>Pendant lamp, made of upcycled plastic spoons.</p>\r\n<h3>Highlights</h3>\r\n<ul>\r\n<li>Materials: waste plastic spoon, LED light bulb</li>\r\n<li>Diameter: 25 centimetres</li>\r\n<li>Height: 45 centimetres</li>\r\n<li>Light Bulb: Requires LED bulb with E27 ending that is maximum 20W</li>\r\n</ul>', '50.00', '60.00', 23, '1slamp.jpg', '2022-10-13 16:35:40'),
(5, 'Paper Mache Lamp', '<p>Pendant light, made of old newspaper.</p>\r\n<h3>Highlights</h3>\r\n<ul>\r\n<li>Materials: old newspaper, glue, gold spray paint, led light bulb</li>\r\n<li>Diameter: 42 centimetres</li>\r\n<li>Height: 39 centimetres</li>\r\n<li>Light Bulb: Requires LED bulb with E27 ending that is maximum 20W</li>\r\n</ul>', '49.00', '0.00', 9, '1newslamp.jpeg', '2022-10-13 16:36:14'),
(6, 'Candle Holder', '<p>Amazing candle holder, made of recycled tin.</p>\r\n<h3>Highlights</h3>\r\n<ul>\r\n<li>Materials: recycled tins, glue, paint</li>\r\n<li>Diameter: 10 centimetres</li>\r\n<li>Height: 3.5 centimetres</li>\r\n</ul>', '8.00', '0.00', 33, 'candleh.jpg', '2022-10-13 16:37:27'),
(7, 'Light Bulb Vase', '<p>Flower vase, made of upcycled light bulb.</p>\r\n<h3>Highlights</h3>\r\n<ul>\r\n<li>Materials: recycled light bulb, glue, jute twine</li>\r\n<li>Width: 6 centimetres</li>\r\n<li>Height: 11 centimetres</li>\r\n</ul>', '10.00', '0.00', 21, 'bulb.jpg', '2022-10-14 13:00:23'),
(8, 'Pen Holder', '<p>Galaxy painted recycled pen holder, made of recycled can.</p>\r\n<h3>Highlights</h3>\r\n<ul>\r\n<li>Materials: recycled can, paint</li>\r\n<li>Diameter: 7 centimetres</li>\r\n<li>Height: 10 centimetres</li>\r\n</ul>', '5.00', '0.00', 38, '1penholder.jpg', '2022-10-14 13:10:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `cust_info`
--
ALTER TABLE `cust_info`
  ADD PRIMARY KEY (`CustID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cust_info`
--
ALTER TABLE `cust_info`
  MODIFY `CustID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
