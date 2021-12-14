-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2021 at 07:35 AM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `idsinhvien` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `password`, `isAdmin`, `idsinhvien`) VALUES
('17021204', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 0, '17021204'),
('17021345', '*4264A63AF9DB6B1D2839E745DBD9297A06700919', 0, '17021345'),
('17021357', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 0, '17021357'),
('17023456', '*A674691EB6BD51FF0FB11C6939B7AE6FCD961072', 0, '17023456'),
('admin', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 1, NULL),
('user', '*2A032F7C5BA932872F0F045E0CF6B53CF702F2C5', 0, '17026457');

-- --------------------------------------------------------

--
-- Table structure for table `monthi`
--

CREATE TABLE `monthi` (
  `idsv` varchar(225) NOT NULL,
  `tenmonthi` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'tmp_name',
  `Flag` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthi`
--

INSERT INTO `monthi` (`idsv`, `tenmonthi`, `Flag`) VALUES
('115251097', 'poi', '0'),
('124962663', 'poi', '0'),
('127016023', 'poi', '0'),
('136577658', 'pen', '0'),
('143839083', 'qwe', '0'),
('158735991', 'rty', '0'),
('162082248', 'pen', '0'),
('166282655', 'rty', '0'),
('168475641', 'xyz', '0'),
('17021357', 'munghere', '1'),
('56668549', 'pen', '0'),
('60235849', 'poi', '0'),
('60737209', 'poi', '0'),
('72512004', 'xyz', '0'),
('76787544', 'qwe', '0'),
('87824283', 'xyz', '0'),
('88466500', 'pen', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` varchar(20) NOT NULL,
  `hodem` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ngaysinh` char(255) DEFAULT NULL,
  `dudieukienduthi` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `hodem`, `ten`, `ngaysinh`, `dudieukienduthi`) VALUES
('17021204', 'Nguyễn Việt', 'An', '1999-04-01', '0'),
('17021311', 'Cao Minh', 'Nhật', '1999-06-10', '0'),
('17021345', 'Nguyễn Công Trường ', 'Giang', '1999-10-01', '0'),
('17021357', 'Trần Quang', 'Vinh', '1999-05-11', '1'),
('17023456', 'Lê Đình', 'Thiện', '1999-07-03', '0'),
('17025286', 'Nguyễn Đình Nhật', 'Minh', '1999-05-03', '0'),
('17026168', 'Cao Minh', 'Vinh', '1999-05-11', '0'),
('17026457', 'Nguyễn Đình Nhật', 'Minh', '1999-04-03', '0'),
('17028392', 'Trần Quang', 'Minh', '1999-05-11', '0'),
('17029733', 'Cao Minh', 'Thiện', '1999-10-01', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsinhvien` (`idsinhvien`);

--
-- Indexes for table `monthi`
--
ALTER TABLE `monthi`
  ADD PRIMARY KEY (`idsv`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`idsinhvien`) REFERENCES `sinhvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
