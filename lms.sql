-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 08:20 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_book`
--

CREATE TABLE `add_book` (
  `id` int(5) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_image` varchar(500) NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `books_publication_name` varchar(50) NOT NULL,
  `books_purchase_date` varchar(20) NOT NULL,
  `books_price` varchar(20) NOT NULL,
  `books_qty` varchar(20) NOT NULL,
  `availble_qty` varchar(20) NOT NULL,
  `librarian_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_book`
--

INSERT INTO `add_book` (`id`, `books_name`, `books_image`, `books_author_name`, `books_publication_name`, `books_purchase_date`, `books_price`, `books_qty`, `availble_qty`, `librarian_username`) VALUES
(4, 'php ', 'books_image/ec833119c6c9d0b779eaa0146b892adc2.png', 'shubham', 'ram', '3-3-2017', '22.5', '12', '4', ''),
(7, 'html ', 'books_image/ef4108803cba7f9986e8381b807b564ehtml .jpeg', 'abhishek', 'shubham', '26-june', '225', '225', '224', ''),
(9, 'go ', 'books_image/0c67056a02b4804533156dcd3b0e31e8go.jpg', 'jack', 'shubham', '5-may', '5500', '600', '599', ''),
(10, 'dart ', 'books_image/28f0fb4e1db70f12d3d68c983ec02606dart.jpeg', 'jam', 'shubh', '5-5-18', '800', '40', '40', '');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_enrollment` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_sem` varchar(50) NOT NULL,
  `student_contact` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_issue_date` varchar(50) NOT NULL,
  `books_return_date` varchar(50) NOT NULL,
  `student_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_enrollment`, `student_name`, `student_sem`, `student_contact`, `student_email`, `books_name`, `books_issue_date`, `books_return_date`, `student_username`) VALUES
(12, '2315003 ', 'Shubham gupta', '6', '8684015857', 'sg19897.3sg@gmail.com', 'php', '23-06-2018', '24-06-2018', 'abc@gmail.com'),
(13, '2915001 ', 'shub gupta', '7', '9695068089', 'sg19897.3sg@gmail.com', 'php', '23-06-2018', '24-06-2018', 'sg'),
(14, '2315003 ', 'Shubham gupta', '6', '8684015857', 'sg19897.3sg@gmail.com', 'php', '24-06-2018', '', 'abc@gmail.com'),
(15, '2315003 ', 'Shubham gupta', '6', '8684015857', 'sg19897.3sg@gmail.com', 'php', '24-06-2018', '', 'abc@gmail.com'),
(16, '2315003 ', 'Shubham gupta', '6', '8684015857', 'sg19897.3sg@gmail.com', 'php', '24-06-2018', '24-06-2018', 'abc@gmail.com'),
(17, '2315003 ', 'Shubham gupta', '6', '8684015857', 'sg19897.3sg@gmail.com', 'html', '24-06-2018', '', 'abc@gmail.com'),
(18, '2315003 ', 'Shubham gupta', '6', '8684015857', 'sg19897.3sg@gmail.com', 'php', '25-06-2018', '', 'abc@gmail.com'),
(19, '2315003 ', 'Shubham gupta', '6', '8684015857', 'sg19897.3sg@gmail.com', 'go', '25-06-2018', '', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `librarian_registration`
--

CREATE TABLE `librarian_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian_registration`
--

INSERT INTO `librarian_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES
(1, 'Shubham', 'gupta', '123456', '123', 'sg19897.sg@gmail.com', '8684015857');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `susername` varchar(100) NOT NULL,
  `dusername` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `read1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `susername`, `dusername`, `title`, `msg`, `read1`) VALUES
(8, 'Shubham', 'abc@gmail.com', 'new message', '                     please check details                       \r\n                                        ', 'y '),
(9, '123456', 'abc@gmail.com', 'shubham', '                                            get this\r\n                                        ', 'y '),
(10, '123456', 'abc@gmail.com', 'shubham', '                                            get this\r\n                                        ', 'y '),
(11, '123456', 'abc@gmail.com', 'shubham', '                                            get this\r\n                                        ', 'y '),
(12, '123456', 'abc@gmail.com', 'shubham', '                                            get this\r\n                                        ', 'y ');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `enrollment` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `sem`, `enrollment`, `status`) VALUES
(1, 'Shubham', 'gupta', 'abc@gmail.com', 'aswd', 'sg19897.3sg@gmail.com', '8684015857', '6', '2315003', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_book`
--
ALTER TABLE `add_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_book`
--
ALTER TABLE `add_book`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
