-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 24, 2019 at 06:37 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportsplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `starthour` time NOT NULL,
  `endhour` time NOT NULL,
  `location_id` int(11) NOT NULL,
  `intensity` enum('light','medium','hard','') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `sport_id`, `date`, `starthour`, `endhour`, `location_id`, `intensity`, `timestamp`) VALUES
(1, 1, '2019-11-22', '10:00:00', '11:00:00', 2, 'light', '2019-11-20 13:33:27'),
(2, 5, '2019-11-30', '12:00:00', '12:40:00', 5, 'light', '2019-11-20 20:34:23'),
(3, 2, '2019-11-26', '14:45:00', '16:00:00', 4, 'hard', '2019-11-24 16:23:52'),
(4, 6, '2019-11-28', '19:30:00', '20:30:00', 5, 'medium', '2019-11-24 16:24:49'),
(5, 4, '2019-11-30', '16:15:00', '18:30:00', 1, 'medium', '2019-11-24 16:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `activities_have_focuses`
--

CREATE TABLE `activities_have_focuses` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `focus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities_have_focuses`
--

INSERT INTO `activities_have_focuses` (`id`, `activity_id`, `focus_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 4),
(4, 2, 1),
(5, 2, 2),
(6, 3, 2),
(7, 4, 1),
(8, 4, 4),
(9, 5, 3),
(10, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `focuses`
--

CREATE TABLE `focuses` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `focuses`
--

INSERT INTO `focuses` (`id`, `name`) VALUES
(1, 'flexibility'),
(2, 'endurance'),
(3, 'coordination'),
(4, 'strength');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `firstname`, `activity_id`) VALUES
(1, 'Lien', 1),
(2, 'Sarah', 3),
(3, 'Lieselot', 4),
(4, 'Mathias', 2),
(5, 'mama', 5),
(6, 'papa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(45) NOT NULL,
  `icon-location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `icon-location`) VALUES
(1, 'sports hall', ''),
(2, 'swimming pool', ''),
(3, 'home', './assets/img/home.svg'),
(4, 'outside', './assets/img/outside.svg'),
(5, 'gym', './assets/img/gym.svg');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `sport` varchar(45) NOT NULL,
  `type_id` int(11) NOT NULL,
  `icon-sport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `sport`, `type_id`, `icon-sport`) VALUES
(1, 'football', 2, './assets/img/football.svg'),
(2, 'rugby', 2, './assets/img/rugby.svg'),
(3, 'tennis', 2, './assets/img/tennis.svg'),
(4, 'volleyball', 2, './assets/img/volleyball.svg'),
(5, 'ping pong', 2, './assets/img/pingpong.svg'),
(6, 'kickbox', 1, './assets/img/kickbox.svg');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'extreme sport'),
(2, 'ball sports');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities_have_focuses`
--
ALTER TABLE `activities_have_focuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `focuses`
--
ALTER TABLE `focuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activities_have_focuses`
--
ALTER TABLE `activities_have_focuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `focuses`
--
ALTER TABLE `focuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
