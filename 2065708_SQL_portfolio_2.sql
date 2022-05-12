-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 03:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weatherapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `weatherdata`
--

CREATE TABLE `weatherdata` (
  `id` int(10) NOT NULL,
  `weather_description` varchar(20) NOT NULL,
  `weather_temperature` float NOT NULL,
  `weather_wind` float NOT NULL,
  `weather_datetimes` datetime NOT NULL,
  `weather_city` varchar(30) NOT NULL,
  `weather_maxtemp` float NOT NULL,
  `weather_mintemp` float NOT NULL,
  `weather_speed` float NOT NULL,
  `weather_humidity` int(20) NOT NULL,
  `weather_icon` varchar(20) NOT NULL,
  `weather_pressure` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weatherdata`
--

INSERT INTO `weatherdata` (`id`, `weather_description`, `weather_temperature`, `weather_wind`, `weather_datetimes`, `weather_city`, `weather_maxtemp`, `weather_mintemp`, `weather_speed`, `weather_humidity`, `weather_icon`, `weather_pressure`) VALUES
(6, 'haze', -1.24, 1.54, '2022-01-13 14:16:08', 'Minneapolis', 0.16, -3.02, 1.54, 85, '50n', 1013),
(7, 'few clouds', 11.12, 2.57, '2022-01-13 14:16:18', 'Kathmandu', 11.12, 11.12, 2.57, 76, '02n', 1018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weatherdata`
--
ALTER TABLE `weatherdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weatherdata`
--
ALTER TABLE `weatherdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
