-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 08:43 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `author_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbm` char(9) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `document_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bor_transaction`
--

CREATE TABLE `bor_transaction` (
  `bor_number` int(11) NOT NULL,
  `reader_id` char(3) DEFAULT NULL,
  `document_id` char(5) DEFAULT NULL,
  `copy_num` int(2) NOT NULL,
  `lib_id` char(3) DEFAULT NULL,
  `bor_date_time` datetime DEFAULT NULL,
  `ret_date_time` datetime DEFAULT NULL,
  `due_date` char(11) DEFAULT NULL,
  `fineamount` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `no` int(1) NOT NULL,
  `lib_id` char(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `location` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chief_editor`
--

CREATE TABLE `chief_editor` (
  `editor_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `editor_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `copy`
--

CREATE TABLE `copy` (
  `copy_no` int(2) DEFAULT NULL,
  `document_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `c_position` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `descriptor`
--

CREATE TABLE `descriptor` (
  `document_id` char(5) NOT NULL,
  `descriptor` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `num_copy` int(2) NOT NULL,
  `document_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lib_id` char(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `publisher_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `publication_date` char(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ieditor`
--

CREATE TABLE `ieditor` (
  `editor_name` varchar(30) DEFAULT NULL,
  `issue_no` int(2) DEFAULT NULL,
  `volume_no` int(2) DEFAULT NULL,
  `document_id` char(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journal_issue`
--

CREATE TABLE `journal_issue` (
  `issue_no` int(2) DEFAULT NULL,
  `volume_no` int(2) DEFAULT NULL,
  `document_id` char(5) DEFAULT NULL,
  `scope` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journal_volume`
--

CREATE TABLE `journal_volume` (
  `document_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `volume_no` int(2) NOT NULL,
  `editor_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proceedings`
--

CREATE TABLE `proceedings` (
  `cdate` char(20) DEFAULT NULL,
  `clocation` varchar(20) DEFAULT NULL,
  `cspeaker` varchar(30) DEFAULT NULL,
  `document_id` char(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` char(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `publisher_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `publisher_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `reader_id` char(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `reader_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ph_num` int(11) NOT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `num_br_books` int(2) NOT NULL,
  `num_res_books` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `res_number` char(6) NOT NULL,
  `res_date_time` datetime DEFAULT NULL,
  `res_status` varchar(8) DEFAULT NULL,
  `document_id` char(5) DEFAULT NULL,
  `lib_id` char(3) DEFAULT NULL,
  `copy_no` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `author_id` char(5) DEFAULT NULL,
  `document_id` char(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbm`),
  ADD UNIQUE KEY `document_id` (`document_id`);

--
-- Indexes for table `bor_transaction`
--
ALTER TABLE `bor_transaction`
  ADD PRIMARY KEY (`bor_number`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`lib_id`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `chief_editor`
--
ALTER TABLE `chief_editor`
  ADD PRIMARY KEY (`editor_id`);

--
-- Indexes for table `copy`
--
ALTER TABLE `copy`
  ADD UNIQUE KEY `c_position` (`c_position`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `proceedings`
--
ALTER TABLE `proceedings`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`reader_id`),
  ADD UNIQUE KEY `ph_num` (`ph_num`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`res_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bor_transaction`
--
ALTER TABLE `bor_transaction`
  MODIFY `bor_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
