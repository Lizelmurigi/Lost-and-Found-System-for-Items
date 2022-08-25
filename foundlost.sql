-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 07:52 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foundlost`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `place` varchar(40) NOT NULL,
  `place_detail` varchar(50) NOT NULL,
  `item_details` varchar(80) NOT NULL,
  `pub_date` date NOT NULL,
  `pic_related` blob,
  `contact` varchar(80) NOT NULL,
  `user_id` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `place`, `place_detail`, `item_details`, `pub_date`, `pic_related`, `contact`, `user_id`) VALUES
(1, 'Rolex Watch', 'School', 'Got found at the school main gate', 'it is black in color. silver coated.', '2019-10-09', NULL, '07038449766', '1'),
(2, 'gucci grace', 'School main', 'around tc 07 and cafeteria', 'blackin color, golden stripe', '2019-10-09', NULL, '08437594382', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE IF NOT EXISTS `lost` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `place_details` text NOT NULL,
  `item_details` varchar(100) NOT NULL,
  `lost_date` date NOT NULL,
  `contact` varchar(100) NOT NULL,
  `image` blob,
  `user_id` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`id`, `name`, `place`, `place_details`, `item_details`, `lost_date`, `contact`, `image`, `user_id`) VALUES
(1, 'Samsung S8+', 'School main', 'ertyuin yuguybjbh ftgh', 'it is black in color. No cracks on screen or hind cover. single sim. lion wall paper on lock screen.', '2019-10-16', '079843793', '', '1'),
(2, 'gucci grace', 'School', 'ertyuin yuguybjbh ftgh', 'blackin color, golden stripe', '2019-10-16', '08437594382', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `recaptcha` varchar(5) NOT NULL,
  `theme` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `timezone`, `recaptcha`, `theme`) VALUES
(1, 'Lost and Found', 'Africa/Nairobi', 'no', 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(1, 'b1cef8b740dc9d8c38034207d9adde', 2, '2019-10-03'),
(2, '7129692ed4d86dfe959d365839aa2f', 3, '2019-10-03'),
(3, '5e525e7171126a4e14444350fd523c', 4, '2019-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `banned_users` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `role`, `password`, `last_login`, `status`, `banned_users`) VALUES
(1, 'admin@gmail.com', 'Admin', 'Admin', '1', 'sha256:1000:UJxHaaFpM44Bj1ka7U58GiSHUx3zRWid:Hq86/PHYj0utJLz2ciHzSehsidHAZX+A', '2019-10-23 03:26:49 PM', 'approved', 'unban'),
(2, 'lizel@gmail.com', 'Njeri', 'Lizel', '2', 'sha256:1000:JDJ5JDEwJFJ3aW1pNDlqVGwuVGpZLnhQSy5TemUzdWdXOUJQWThHSmR4MU05SUp1d3NzZDROdE1ONDZ5:y81rMqnrhMcSVFrH+Eu86edgv4ZuJNyU', '', 'approved', ''),
(3, 'mish@mail.com', 'Mish', 'Mishi', '2', 'sha256:1000:JDJ5JDEwJHVhS1psNEVMNS9uUlZWdW5uY1NGaWVyc09QNVAvMjRGWTh6TlpHaDlkTWl3aXZwUVExUC95:X0jNFOK8nUik9JA17UMhBPxZ4c4IpHDM', '', 'approved', ''),
(4, 'testo@gmail.com', 'Test', 'Train', '2', 'sha256:1000:JDJ5JDEwJFM2TjB4REJKRGh5by9ELlRRbnRFYk94ZjdOTDhxaFhqeUdIVEN4dEF2aDJ3M0V3c3RucG11:L7ks5XT+wM4YuPrWGOL1yRWU4JLMUWLM', '2019-10-23 03:42:39 PM', 'approved', ''),
(5, 'train@mail.com', 'Testing', 'test', '1', 'sha256:1000:JDJ5JDEwJFc0VEtpU25KOXhmY3RFNHF5OHJ0WC5NUEN0bW5MYjJodGphYjZ1MlJKUzQzTEtlNUlQRHR1:C5RiB7ehpgd/fatdajMhH1uoel9WeWox', '2019-10-16 03:34:56 PM', 'approved', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
