-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 04:06 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atomic_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `atomic_project`
--

CREATE TABLE `atomic_project` (
  `id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `is_trashed` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atomic_project`
--

INSERT INTO `atomic_project` (`id`, `book_title`, `author_name`, `is_trashed`) VALUES
(69, 'Dorjar Opashe2', 'Humayun Ahmed', 'No'),
(70, 'Harry Potter', 'J. K. Rowling', 'No'),
(71, 'Bulbul', 'Jafar Iqbal', 'No'),
(72, 'Computer Programming', 'Shahriar subeen', 'No'),
(73, 'Shuvro ', 'Humayun Ahmed', 'No'),
(74, 'Himu', 'Humayun Ahmed', 'No'),
(75, 'bolod to boss', 'jankar mahbub', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `birthday_table`
--

CREATE TABLE `birthday_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `is_trashed` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birthday_table`
--

INSERT INTO `birthday_table` (`id`, `name`, `birthday`, `is_trashed`) VALUES
(4, 'Mohammed Ali', '1994-05-15', 'No'),
(5, 'daf', '1992-05-12', '2017-06-08 19:03:29'),
(6, 'daf', '1992-05-12', '2017-06-08 13:50:11'),
(9, 'daffer donkey', '1992-05-12', '2017-06-08 18:23:07'),
(13, 'adfsasf', '1992-05-12', '2017-06-09 18:05:05'),
(14, 'jayed akbar new', '1994-09-16', 'No'),
(15, 'jayed akbar new', '1994-09-16', 'No'),
(16, 'adfasd', '1992-05-12', 'No'),
(17, 'afad', '1994-09-16', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `is_trashed` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `city_name`, `is_trashed`) VALUES
(5, 'adfas', 'Chittagong', 'No'),
(8, 'adfasdf', 'Chittagong', 'No'),
(9, '', 'Dhaka', 'No'),
(10, 'adfasd', 'Dhaka', 'No'),
(11, '', 'Dhaka', 'No'),
(12, 'Najifa Anjum', 'Dhaka', 'No'),
(13, 'Akib Chowdhury', 'Sylhet', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `is_trashed` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `gender`, `is_trashed`) VALUES
(8, 'aadfa', 'male', '2017-06-08 20:14:59'),
(9, 'aadfa', 'male', '2017-06-08 20:06:57'),
(10, 'aadfa', 'Female', 'No'),
(11, 'aadfa', 'Female', 'No'),
(12, 'M Moin Udding Abir', 'Male', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hobbies` varchar(1000) NOT NULL,
  `is_trashed` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `hobbies`, `is_trashed`) VALUES
(4, 'Saifullah Mansoor', 'Gardening, Reading, Bike Ridding, Travelling, Singing', 'No'),
(5, 'Najifa Anjum', 'Gardening, Travelling, Singing', 'No'),
(6, 'Mohammed Rasel', 'Gardening, Reading, Bike Ridding', 'No'),
(7, 'Mohammed Ridwan', 'Gardening, Reading', 'No'),
(8, 'Jashim Uddin', 'Gardening', 'No'),
(9, 'hello', 'Gardening, Reading, Bike Ridding, Travelling', 'No'),
(10, '', 'Gardening, Reading', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `organization_summary`
--

CREATE TABLE `organization_summary` (
  `id` int(11) NOT NULL,
  `orga_name` varchar(100) NOT NULL,
  `summary` varchar(1000) NOT NULL,
  `is_trashed` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_summary`
--

INSERT INTO `organization_summary` (`id`, `orga_name`, `summary`, `is_trashed`) VALUES
(3, 'a', 'x', '2017-06-09 00:20:01'),
(4, 'v', 'v', 'No'),
(5, 'SUMON AKBAR', '                            try to find data in google instead of giving up                        ', 'No'),
(6, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', '2017-06-09 19:28:00'),
(7, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', 'No'),
(8, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', 'No'),
(9, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', 'No'),
(10, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', 'No'),
(11, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', '2017-06-08 23:43:20'),
(12, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', '2017-06-08 23:43:20'),
(13, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', '2017-06-08 23:53:38'),
(14, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', '2017-06-08 23:53:38'),
(15, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', 'No'),
(16, 'fdfgsdfg', 'sdgfsdfgsdfgdsfgds', 'No'),
(17, 'BBC', 'British Broadcasting Corporation', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pictures`
--

CREATE TABLE `profile_pictures` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `is_trashed` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pictures`
--

INSERT INTO `profile_pictures` (`id`, `name`, `profile_picture`, `is_trashed`) VALUES
(1, 'jayedkbar', '149669128073.jpg', 'No'),
(3, 'bike3dd', '149669129407MRD (126).jpg', 'No'),
(5, 'BMW', '1496686141BMW.jpg', 'No'),
(10, 'dadfa', '1496911486LOTUS.JPG', 'No'),
(11, 'dadfaafdadf', '149694548448.jpg', 'No'),
(12, 'dadfa', '1496911490LOTUS.JPG', 'No'),
(13, 'dadfa', '1496911493LOTUS.JPG', 'No'),
(15, 'Marcedez Z21x0', '14969454130028.JPG', 'No'),
(17, '555', '150325489321februry.jpg', '2017-08-21 00:49:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atomic_project`
--
ALTER TABLE `atomic_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday_table`
--
ALTER TABLE `birthday_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_summary`
--
ALTER TABLE `organization_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_pictures`
--
ALTER TABLE `profile_pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atomic_project`
--
ALTER TABLE `atomic_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `birthday_table`
--
ALTER TABLE `birthday_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `organization_summary`
--
ALTER TABLE `organization_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `profile_pictures`
--
ALTER TABLE `profile_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
