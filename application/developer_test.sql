-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 11:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developer_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `surname` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `surname`, `email`, `username`, `password`) VALUES
(1, 'Joe', 'Soap', 'joe@example.com', 'joe', 'joespass'),
(2, 'Bob', 'Jones', 'bob@example.com', 'bob', 'bobspass'),
(3, 'Bill', 'Adams', 'bill@example.com', 'bill', 'billspass'),
(4, 'Jenny', 'Watson', 'jenny@example.com', 'jenny', 'jennyspass'),
(5, 'Angela', 'Bell', 'angela@example.com', 'angela', 'angelaspass'),
(109, 'gugu', 'sihlangu', 'eunice@gmail.com', 'nomsa', 'f6e8de88807006538cd9be5fd3ba51c1'),
(18, 'Nomsa', 'Masilela', 'dfdf@ss.com', 'Eunice', '81dc9bdb52d04dc20036dbd8313ed055'),
(19, 'gugu', 'Van Rebek', 'eunice@gmail.com', 'Eunice', '81dc9bdb52d04dc20036dbd8313ed055'),
(20, 'gugu', 'skhosana', 'ntomi@web.com', 'Eunice', '81dc9bdb52d04dc20036dbd8313ed055'),
(121, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', '37693cfc748049e45d87b8c7d8b9aacd'),
(120, 'Ntombizodwa', 'Masilela', 'dfdf@ss.com', 'gugu', '81b073de9370ea873f548e31b8adc081'),
(119, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', 'c8ffe9a587b126f152ed3d89a146b445'),
(41, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', '81dc9bdb52d04dc20036dbd8313ed055'),
(42, 'Nomsa', 'Masilela', 'dfdf@ss.com', 'Eunice', '81dc9bdb52d04dc20036dbd8313ed055'),
(118, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', 'b59c67bf196a4758191e42f76670ceba'),
(106, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', 'd41d8cd98f00b204e9800998ecf8427e'),
(108, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', '79d886010186eb60e3611cd4a5d0bcae'),
(107, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', '79d886010186eb60e3611cd4a5d0bcae'),
(105, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', 'd41d8cd98f00b204e9800998ecf8427e'),
(104, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', '1a09a1f048354ae7570bf137f30abd21'),
(103, 'Nomsa', 'Masilela', 'ymasilela@yahoo.com', 'Eunice', '6074c6aa3488f3c2dddff2a7ca821aab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
