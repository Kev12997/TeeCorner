-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 12:00 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teecorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `shirt_id` int(16) NOT NULL,
  `order_id` int(16) NOT NULL,
  `usr_id` int(16) NOT NULL,
  `quantity` int(16) NOT NULL,
  `size` varchar(10) NOT NULL,
  `shirt_price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`shirt_id`, `order_id`, `usr_id`, `quantity`, `size`, `shirt_price`) VALUES
(99999888, 688069975, 15, 1, 'small', '40.00'),
(978346752, 940952133, 15, 2, 'large', '50.00'),
(10101010, 940952133, 15, 1, 'xlarge', '30.00'),
(89775434, 286265554, 16, 1, 'medium', '30.00'),
(748356387, 869806216, 16, 3, 'medium', '50.00'),
(999987676, 869806216, 16, 1, 'small', '45.00'),
(1086741366, 869806216, 16, 1, 'small', '15.00'),
(1071396010, 417032608, 17, 1, 'small', '25.00'),
(99999888, 417032608, 17, 1, 'medium', '40.00'),
(1096163869, 182184296, 17, 1, 'large', '50.00'),
(555661156, 313636497, 16, 1, 'medium', '55.00'),
(649334073, 313636497, 16, 1, 'large', '30.00'),
(1078628742, 334994972, 20, 1, 'small', '45.00'),
(2147483647, 437953589, 18, 2, 'medium', '40.00'),
(649334073, 437953589, 18, 1, 'small', '30.00'),
(555661156, 795035373, 18, 1, 'small', '55.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(16) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ship_date` date NOT NULL,
  `total_order` decimal(9,2) NOT NULL,
  `revenue` decimal(9,2) NOT NULL,
  `payment_method` varchar(256) NOT NULL,
  `order_status` varchar(256) NOT NULL,
  `shipping_cost` decimal(9,2) DEFAULT NULL,
  `ship_address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `usr_id`, `order_date`, `ship_date`, `total_order`, `revenue`, `payment_method`, `order_status`, `shipping_cost`, `ship_address`) VALUES
(182184296, 17, '2018-05-18 03:54:32', '2018-05-18', '55.00', '10.00', 'Visa', 'SHIPPED', '5.00', 'Calle Holanda PR #8 Manati 00674'),
(286265554, 16, '2018-05-18 03:54:41', '2018-05-18', '33.00', '20.00', 'MasterCard', 'SHIPPED', '3.00', 'Calle Holanda PR #44 Manati 00674'),
(313636497, 16, '2018-05-18 03:54:29', '2018-05-18', '93.50', '20.00', 'Visa', 'SHIPPED', '8.50', 'Calle Holanda PR #44 Manati 00674'),
(334994972, 20, '2018-05-18 03:54:25', '2018-05-18', '49.50', '15.00', 'MasterCard', 'SHIPPED', '4.50', 'El Coto PR #33 Arecibo 00986'),
(417032608, 17, '2018-05-18 03:54:34', '2018-05-18', '71.50', '40.00', 'Visa', 'SHIPPED', '6.50', 'Calle Holanda PR #8 Manati 00674'),
(437953589, 18, '2018-05-18 03:54:18', '2018-05-18', '121.00', '25.00', 'Visa', 'SHIPPED', '11.00', 'Calle Asia PR #33 Vega Baja 00646'),
(688069975, 15, '2018-05-18 03:54:11', '2018-05-18', '44.00', '30.00', 'Visa', 'SHIPPED', '4.00', 'Calle Holanda PR #8 Manati 00674'),
(795035373, 18, '2018-05-18 03:54:14', '2018-05-18', '60.50', '15.00', 'Visa', 'SHIPPED', '5.50', 'Calle Asia PR #33 Vega Baja 00646'),
(869806216, 16, '2018-05-18 03:54:38', '2018-05-18', '231.00', '47.00', 'Visa', 'SHIPPED', '21.00', 'Calle Holanda PR #44 Manati 00674'),
(940952133, 15, '2018-05-18 03:54:01', '2018-05-18', '143.00', '50.00', 'Visa', 'SHIPPED', '13.00', 'Calle Holanda PR #8 Manati 00674');

-- --------------------------------------------------------

--
-- Table structure for table `shirt`
--

CREATE TABLE `shirt` (
  `shirt_id` int(16) NOT NULL,
  `shirt_status` varchar(30) NOT NULL DEFAULT 'ACTIVE',
  `name_shirt` varchar(256) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `cost` decimal(9,2) NOT NULL,
  `stock` int(9) NOT NULL,
  `neck_style` varchar(256) NOT NULL,
  `sleeve_style` varchar(256) NOT NULL,
  `color` varchar(256) NOT NULL,
  `brand` varchar(256) NOT NULL,
  `shirt_material` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt`
--

INSERT INTO `shirt` (`shirt_id`, `shirt_status`, `name_shirt`, `gender`, `price`, `cost`, `stock`, `neck_style`, `sleeve_style`, `color`, `brand`, `shirt_material`) VALUES
(10101010, 'ACTIVE', 'MINKPINK Golden Girl', 'female', '30.00', '20.00', 49, 'regular', 'short', 'Pale Pink', 'MINKPINK', 'Cotton'),
(34189168, 'ACTIVE', 'Nike Dry Academy Soccer Tank', 'female', '50.00', '30.00', 25, 'regular', 'no sleeve', 'black', 'Nike', 'polyester'),
(55555555, 'ACTIVE', 'Nike Court Dry Tennis Top', 'female', '45.00', '30.00', 50, 'regular', 'long', 'White', 'Nike', 'Spandex'),
(77768459, 'ACTIVE', 'Hurley Tropics Tank Top', 'female', '50.00', '40.00', 50, 'regular', 'no sleeve', 'Celurean Heather', 'Hurley', 'Polyester'),
(89775434, 'ACTIVE', 'Nike Breathe Running Tank', 'male', '30.00', '10.00', 48, 'regular', 'no sleeve', 'blue', 'Nike', 'Polyester'),
(99999888, 'ACTIVE', 'Moc-o-doc Vintage Slub Raw Edge V-Neck Pullover', 'female', '40.00', '10.00', 47, 'vneck', 'long', 'Navy', 'Moc-o-doc', 'Cotton'),
(332332333, 'ACTIVE', 'Project Social T American Charm', 'female', '57.00', '35.00', 50, 'regular', 'no sleeve', 'Blue Slate', 'Project Social T', 'Siro Rayon'),
(393217990, 'ACTIVE', 'Puma T-shirt', 'female', '20.00', '15.00', 28, 'regular', 'short', 'pink', 'Puma', 'cotton'),
(555661156, 'ACTIVE', 'Graphic Tee Puma', 'male', '55.00', '40.00', 27, 'regular', 'short', 'white', 'Puma', 'cotton'),
(649334073, 'ACTIVE', 'Sports Puma Shirt', 'male', '30.00', '25.00', 27, 'regular', 'short', 'blue', 'Puma', 'cotton'),
(748356387, 'ACTIVE', 'US POLO ASSN Double Ringer', 'male', '50.00', '40.00', 46, 'vneck', 'short', 'Pallete Green', 'US POLO ASSN', 'Polyester'),
(978346752, 'ACTIVE', 'Rip Curl Wet Suits', 'male', '50.00', '30.00', 48, 'regular', 'long', 'Black', 'Rip Curl', 'Cotton'),
(999987676, 'ACTIVE', 'Vivienne Westwood Ikat Shirt', 'male', '45.00', '33.00', 46, 'regular', 'short', 'Red Multi', 'Vivienne Westwood', 'Silk'),
(1071396010, 'ACTIVE', 'Oversized V-neck ', 'female', '25.00', '15.00', 29, 'vneck', 'short', 'pink', 'American Eagle', 'Rayon'),
(1078628742, 'ACTIVE', 'Sports Long Sleeves', 'male', '45.00', '30.00', 29, 'regular', 'long', 'white', 'Rebook', 'linen'),
(1086741366, 'ACTIVE', 'AE SLUB V-NECK T-SHIRT', 'male', '15.00', '10.00', 48, 'vneck', 'short', 'green', 'American Eagle', 'cotton'),
(1096163869, 'ACTIVE', 'LACE UP SLEEVE TOP', 'female', '50.00', '40.00', 22, 'regular', 'long', 'white', 'American Eagle', 'Rayon'),
(2147483647, 'ACTIVE', 'Adidas FDTN Tank Top', 'male', '40.00', '30.00', 44, 'regular', 'no sleeve', 'black', 'Adidas', 'Polyester');

-- --------------------------------------------------------

--
-- Table structure for table `shirt_image`
--

CREATE TABLE `shirt_image` (
  `shirt_id` int(16) NOT NULL,
  `imgfront` varchar(256) NOT NULL,
  `imgdesc` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt_image`
--

INSERT INTO `shirt_image` (`shirt_id`, `imgfront`, `imgdesc`) VALUES
(555661156, 'puma_shirt1.png', 'puma_shirt1Back.jpeg'),
(649334073, 'puma_shirt2.jpeg', 'puma_shirt2Back.jpeg'),
(393217990, 'puma_shirt1Woman.jpeg', 'puma_shirt1WomanBack.jpeg'),
(34189168, 'nike_woman_shirt1.jpg', 'nike_woman_shirt1Back.jpg'),
(1078628742, 'Reebok1.jpg', 'Reebok1Back.jpg'),
(1086741366, 'americanEagle1.jpg', 'americanEagle1Back.jpg'),
(1071396010, 'americanEagle2.jpg', 'americanEagle2Back.jpg'),
(1096163869, 'americanEagle3.jpg', 'americanEagle3Back.jpg'),
(2147483647, 'adidasFDTNTankTopFront.png', 'adidasFDTNTankTopBack.png'),
(89775434, 'NikeBreatheRunningTankFront.png', 'NikeBreatheRunningTankBack.png'),
(978346752, 'RipCurlWetSuitsFront.png', 'RipCurlWetSuitsBack.png'),
(748356387, 'USPOLOASSNDoubleRingerFront.png', 'USPOLOASSNDoubleRingerBack.png'),
(999987676, 'VIvienneWestwoodIkatFront.png', 'VIvienneWestwoodIkatBack.png'),
(77768459, 'HurleyTropicsTankTopFront.png', 'HurleyTropicsTankTopBack.png'),
(10101010, 'MINKPINKGolderGrilFront.png', 'MINKPINKGolderGrilBack.png'),
(99999888, 'Moc-o-dosVintageSlubRwEdgerVNeckPulloverFront.png', 'Moc-o-dosVintageSlubRwEdgerVNeckPulloverBack.png'),
(55555555, 'NikeCourtDryTennisTopFront.png', 'NikeCourtDryTennisTopBack.png'),
(332332333, 'ProjectSocialTAmericanCharmFront.png', 'ProjectSocialTAmericanCharmBack.png');

-- --------------------------------------------------------

--
-- Table structure for table `shirt_size`
--

CREATE TABLE `shirt_size` (
  `shirt_id` int(16) NOT NULL,
  `small` int(16) DEFAULT NULL,
  `medium` int(16) DEFAULT NULL,
  `large` int(16) DEFAULT NULL,
  `xlarge` int(16) DEFAULT NULL,
  `xxlarge` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt_size`
--

INSERT INTO `shirt_size` (`shirt_id`, `small`, `medium`, `large`, `xlarge`, `xxlarge`) VALUES
(34189168, 4, 2, 4, 5, 10),
(393217990, 10, 10, 3, 4, 1),
(555661156, 8, 9, 5, 4, 1),
(649334073, 3, 5, 4, 5, 10),
(1078628742, 4, 5, 5, 10, 5),
(1086741366, 19, 5, 4, 10, 10),
(1071396010, 14, 5, 5, 4, 1),
(1096163869, 4, 10, 3, 4, 1),
(2147483647, 9, 6, 9, 10, 10),
(89775434, 10, 9, 10, 10, 9),
(978346752, 10, 10, 8, 10, 10),
(748356387, 10, 7, 10, 9, 10),
(999987676, 9, 10, 7, 10, 10),
(77768459, 10, 10, 10, 10, 10),
(10101010, 10, 10, 10, 9, 10),
(99999888, 9, 8, 10, 10, 10),
(55555555, 10, 10, 10, 10, 10),
(332332333, 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `usr_status` varchar(30) NOT NULL DEFAULT 'ACTIVE',
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `permission` varchar(256) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_status`, `first_name`, `last_name`, `email`, `pwd`, `permission`, `date_of_birth`, `age`) VALUES
(15, 'ACTIVE', 'Kevin', 'Rodriguez', 'kevin@gmail.com', '$2y$10$ybtoWGkfHn9k/EWxA4qoE.FzbBfwRrd8Is5Sp.IKRyOgqLD/M5Lra', 'ADMIN', '1997-01-29', 21),
(16, 'ACTIVE', 'Edgardo', 'Perez', 'Edgardo@upr.edu', '$2y$10$8Sby3A3BKN2..XzWWbnSQedcIjdXUeLq4A451BWFTSKdUE3UIb/46', 'ADMIN', '1997-03-11', 21),
(17, 'ACTIVE', 'Lidmary', 'Rodriguez', 'lidmary@gmail.com', '$2y$10$CjmcZ0bPUFZBYyi9RluTuuKR4tSMsrpYHaG/eGr.FymMsi6ubXisq', 'CUSTOMER', '1998-09-11', 19),
(18, 'ACTIVE', 'Gabriel', 'Birriel', 'Gabriel@upr.edu', '$2y$10$618pJ4cKMVWiV1mTH.9xzebLMUEB6XhPW9ihfJzCfyQghTo9udi0u', 'CUSTOMER', '1995-05-06', 23),
(19, 'ACTIVE', 'Zaida', 'Rivera', 'Zaida@upr.edu', '$2y$10$w.oDPgrW4A5a5lW/gvoeA.b2V6V7md5SKZC739UDFkD.BpJzBGMrm', 'CUSTOMER', '1980-03-11', 38),
(20, 'ACTIVE', 'Ivan', 'Mojica', 'Ivan@upr.edu', '$2y$10$G9FTAeoaUDTjFWZWO47EHOCfueYHZeCQmTjZqlXC9fubDuBb8ZnEy', 'CUSTOMER', '1997-09-16', 20),
(21, 'ACTIVE', 'Carmen', 'Rivera', 'Carmen@gmail.com', '$2y$10$ZLkP.OhpeQp4h9nXa59GBuvyjGwKzyBLKtDZc7DH4XSTp2GwnVDQi', 'CUSTOMER', '1970-08-28', 47),
(22, 'ACTIVE', 'Ernesto', 'Rivera', 'Ernesto@gmail.com', '$2y$10$KHAK2tWQ1TknM42bn1tdAOhLseNie3ZOeiXeYlUUbvN1Po3FdWFAq', 'CUSTOMER', '1960-01-30', 58),
(23, 'ACTIVE', 'Raymond', 'Hernandez', 'Raymond@gmail.com', '$2y$10$m7YsNpzyIj/6OhHtmqRRjeeNi/in6vXflFZ1B2RS1MTTIs83pgVmq', 'CUSTOMER', '1997-10-11', 20),
(24, 'ACTIVE', 'Xavier', 'Laureano', 'Xavier@upr.edu', '$2y$10$wSVFmSb4VLrfW3tRf1uQzuK5Q3JHw7RZ8BNnP2hJwE7Sw9WXsJGyG', 'CUSTOMER', '1997-07-16', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `usr_id` int(11) NOT NULL,
  `addresses` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`usr_id`, `addresses`) VALUES
(15, 'Calle Holanda\nPR\n#8\nManati\n00674'),
(16, 'Calle Holanda\nPR\n#44\nManati\n00674'),
(17, 'Calle Holanda\nPR\n#8\nManati\n00674'),
(18, 'Calle Asia\nPR\n#33\nVega Baja\n00646'),
(19, 'Calle Holanda\nPR\n#8\nManati\n00674'),
(20, 'El Coto\nPR\n#33\nArecibo\n00986'),
(21, 'Calle Holanda\nPR\n#44\nManati\n00674'),
(22, 'Calle Vieja\nPR\n#5\nCiales\n00985'),
(23, 'Calle Escondida\nPR\n#90\nBarceloneta\n00345'),
(24, 'Calle Osaca\nPR\n6#\nBarceloneta\n00986'),
(17, 'Calle Holanda\nPR\n#44\nManati\n00674');

-- --------------------------------------------------------

--
-- Table structure for table `user_returns`
--

CREATE TABLE `user_returns` (
  `order_id` int(16) NOT NULL,
  `shirt_id` int(16) NOT NULL,
  `return_status` varchar(254) NOT NULL,
  `request_date` date NOT NULL,
  `issue` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_returns`
--

INSERT INTO `user_returns` (`order_id`, `shirt_id`, `return_status`, `request_date`, `issue`) VALUES
(795035373, 555661156, 'PENDING', '2018-05-18', 'Shirt did not fit'),
(688069975, 99999888, 'APPROVED', '2018-05-18', 'Did Not Fit'),
(182184296, 1096163869, 'DENIED', '2018-05-18', 'Shirt was ugly'),
(334994972, 1078628742, 'PENDING', '2018-05-18', 'Shirt was dirty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `shirt_id` (`shirt_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `shirt`
--
ALTER TABLE `shirt`
  ADD PRIMARY KEY (`shirt_id`);

--
-- Indexes for table `shirt_image`
--
ALTER TABLE `shirt_image`
  ADD KEY `shirt_id` (`shirt_id`);

--
-- Indexes for table `shirt_size`
--
ALTER TABLE `shirt_size`
  ADD KEY `shirt_id` (`shirt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `user_returns`
--
ALTER TABLE `user_returns`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `shirt_id` (`shirt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`shirt_id`) REFERENCES `shirt` (`shirt_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `shirt_image`
--
ALTER TABLE `shirt_image`
  ADD CONSTRAINT `shirt_image_ibfk_1` FOREIGN KEY (`shirt_id`) REFERENCES `shirt` (`shirt_id`);

--
-- Constraints for table `shirt_size`
--
ALTER TABLE `shirt_size`
  ADD CONSTRAINT `shirt_size_ibfk_1` FOREIGN KEY (`shirt_id`) REFERENCES `shirt` (`shirt_id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `user_returns`
--
ALTER TABLE `user_returns`
  ADD CONSTRAINT `user_returns_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `user_returns_ibfk_2` FOREIGN KEY (`shirt_id`) REFERENCES `shirt` (`shirt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
