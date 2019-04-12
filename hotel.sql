-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2019 at 02:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `restro_name` varchar(50) NOT NULL,
  `restro_add` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`restro_name`, `restro_add`) VALUES
('The Park Hotel', '17, Park St, Taltala, Kolkata, West Bengal'),
('The Arsalan', '27, Park St, Kolkata, West Bengal 700077'),
('Shimla Biryani', '17, VIP Nagar, Kolkata, West Bengal'),
('Veggi Corner', '28/1 Liluah, Kolkata . WB'),
('Krunchy Hut', 'Liluah, Howrah, Kolkata'),
('Desi Kitchen', 'Belur Math, Howrah. WB'),
('Tandoor House', 'Kalighat, Kolkata. WB'),
('Aminia', 'Kolkata, WB, India'),
('National Dhaba', 'Chennai, India'),
('Biryani Love', ' Mirsahibpet, Royapettah, Chennai'),
('Hunger Kya', 'Greams Road, Chennai'),
('JW Marriot', 'Church Road, Opp to Uzhavar Sandhai'),
('Peerless INN', 'kutchery road, Mylapore, Chennai'),
('Taj Hotel', 'Nungambakkam, Chennai, Tamil Nadu '),
('Preeti Kitchen', 'Kaliamman Koil St, L & T Colony Phase II'),
('Moonlight', 'Valluvar Kottam High Rd, Nungambakkam'),
('Shere Punjab', 'Langford Gardens, Bengaluru'),
('The Hindu Hotel', 'Ashok Nagar, Bengaluru'),
('Alishan', 'Next to CM Guest House, Bengaluru'),
('Shuham Kitchen', ' Ashok Nagar, Bengaluru, Karnataka'),
('Biryani House', 'hanthala Nagar, Ashok Nagar, Bengaluru'),
('Hunger House', 'Mahatma Gandhi Road, Bengaluru'),
('BBQ', 'Manjunath Nagar, Rajaji Nagar, Bengaluru'),
('Saiii Maa', 'Adjoining KGA Golf Course, HAL Old Airport'),
('Alok\'s Kitchen', 'TPL Road, Opp. Graphite India, Bengaluru');

-- --------------------------------------------------------

--
-- Table structure for table `restro`
--

CREATE TABLE `restro` (
  `restro_name` varchar(50) NOT NULL,
  `restro_loc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restro`
--

INSERT INTO `restro` (`restro_name`, `restro_loc`) VALUES
('The Park Hotel', 'Kolkata'),
('The Arsalan', 'Kolkata'),
('Shimla Biryani', 'Kolkata'),
('Veggi Corner', 'Kolkata'),
('Krunchy Hut', 'Kolkata'),
('Desi Kitchen', 'Kolkata'),
('Tandoor House', 'Kolkata'),
('Aminia', 'Kolkata'),
('National Dhaba', 'Chennai'),
('Biryani Love', 'Chennai'),
('Hunger Kya', 'Chennai'),
('JW Marriot', 'Chennai'),
('Peerless INN', 'Chennai'),
('Taj Hotel', 'Chennai'),
('Preeti Kitchen', 'Chennai'),
('Moonlight', 'Chennai'),
('Shere Punjab', 'Bangalore'),
('The Hindu Hotel', 'Bangalore'),
('Alishan', 'Bangalore'),
('Shuham Kitchen', 'Bangalore'),
('Biryani House', 'Bangalore'),
('Hunger House', 'Bangalore'),
('BBQ ', 'Bangalore'),
('Saiii Maa', 'Bangalore'),
('Alok\'s Kitchen', 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `name` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `msg` varchar(50) NOT NULL,
  `restro_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`name`, `u_id`, `rate`, `msg`, `restro_name`) VALUES
('Vinay', 'vinay@gmail.com', '4', 'The food here is delicious.', 'Biryani Love'),
('alok', 'alokr417@gmail.com', '5', 'Testing Features', 'Shere Punjab'),
('Alok', 'alokr417@gmail.com', '5', 'Delicious', 'BBQ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_name` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_name`, `u_id`) VALUES
('Alok Raj', 'alokr417@gmail.com'),
('Alok Raj', 'alokr41@gmail.com'),
('Ankit Raj', 'ankit@gmail.com'),
('Ashish Raj', 'ashish@gmail.com'),
('Harshita Kumari', 'harshita@gmail.com'),
('Satya Prakash', 'styprk@gmail.com'),
('vinay kumar', 'vinay@gmail.com'),
('Vishal Kumar', 'vishal@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
