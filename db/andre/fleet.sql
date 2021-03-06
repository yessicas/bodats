-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 12:15 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fleet`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp_standard_fuel`
--

CREATE TABLE IF NOT EXISTS `sp_standard_fuel` (
  `id_sp_standard_fuel` bigint(20) NOT NULL,
  `type_set_power` int(11) NOT NULL,
  `type_set_feet` int(11) NOT NULL,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `typeway` set('one way','pp') NOT NULL,
  `loaded` set('loaded','ballast') NOT NULL,
  `jarak` int(11) NOT NULL,
  `speed_standard` double(20,2) NOT NULL,
  `target_sailing_time` double(6,2) NOT NULL,
  `lay_time` double(6,2) NOT NULL,
  `sailing_time` double(6,2) NOT NULL,
  `cycle_time` double(6,2) NOT NULL,
  `me_old` double(20,2) NOT NULL,
  `me_new` double(20,2) NOT NULL,
  `ae_old` double(20,2) NOT NULL,
  `ae_new` double(20,2) NOT NULL,
  `shift_old` double(20,2) NOT NULL,
  `shift_new` double(20,2) NOT NULL,
  `outbond_old` double(20,2) NOT NULL,
  `outbond_new` double(20,2) NOT NULL,
  `total_bbm` double(20,2) NOT NULL,
  `total_bbm_new` double(20,2) NOT NULL,
  `agency_rate` int(11) NOT NULL,
  `agency_rate_id_currency` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_standard_fuel`
--

INSERT INTO `sp_standard_fuel` (`id_sp_standard_fuel`, `type_set_power`, `type_set_feet`, `JettyIdStart`, `JettyIdEnd`, `typeway`, `loaded`, `jarak`, `speed_standard`, `target_sailing_time`, `lay_time`, `sailing_time`, `cycle_time`, `me_old`, `me_new`, `ae_old`, `ae_new`, `shift_old`, `shift_new`, `outbond_old`, `outbond_new`, `total_bbm`, `total_bbm_new`, `agency_rate`, `agency_rate_id_currency`, `type`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1600, 300, 200005, 200001, '', '', 0, 0.00, 0.00, 0.00, 0.00, 9.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 30000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(2, 1600, 300, 160002, 200001, '', '', 0, 0.00, 0.00, 0.00, 0.00, 9.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 17500.00, 45000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(3, 1600, 300, 40001, 200001, '', '', 0, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 30000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(4, 1600, 300, 190006, 20006, '', '', 0, 0.00, 0.00, 0.00, 0.00, 12.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 31000.00, 60000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(5, 1600, 300, 190012, 20005, '', '', 0, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9500.00, 55000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(6, 1600, 300, 190006, 70002, '', '', 0, 0.00, 0.00, 0.00, 0.00, 15.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 24000.00, 55000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(7, 0, 300, 20004, 190007, '', '', 0, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 18000.00, 55000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(8, 1600, 300, 20006, 70002, '', '', 0, 0.00, 0.00, 0.00, 0.00, 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 19500.00, 50000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(9, 1600, 300, 190006, 20007, '', '', 0, 0.00, 0.00, 0.00, 0.00, 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 32000.00, 65000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(10, 1600, 300, 20003, 110003, '', '', 0, 0.00, 0.00, 0.00, 0.00, 13.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 14000.00, 30000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(11, 1600, 300, 190006, 110003, '', '', 0, 0.00, 0.00, 0.00, 0.00, 13.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 23000.00, 40000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(12, 2200, 300, 130008, 130007, '', '', 0, 0.00, 0.00, 0.00, 0.00, 13.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 52000.00, 60000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(13, 1600, 240, 160002, 200005, '', '', 0, 0.00, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 7800.00, 15000000, 0, 0, '0000-00-00 00:00:00', '', ''),
(14, 1600, 240, 200011, 130003, '', '', 0, 0.00, 0.00, 0.00, 0.00, 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 14000.00, 40000000, 0, 0, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sp_standard_vessel_cost`
--

CREATE TABLE IF NOT EXISTS `sp_standard_vessel_cost` (
  `id_sp_standard_vessel_cost` bigint(20) NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `depreciation_cost` double(20,2) NOT NULL,
  `rent_cost` double(20,2) NOT NULL,
  `crew_own_cost` double(20,2) NOT NULL,
  `crew_subcont_cost` double(20,2) NOT NULL,
  `insurance` double(20,2) NOT NULL,
  `repair` double(20,2) NOT NULL,
  `docking` double(20,2) NOT NULL,
  `brokerage_fee` double(20,2) NOT NULL,
  `others` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_standard_vessel_cost`
--

INSERT INTO `sp_standard_vessel_cost` (`id_sp_standard_vessel_cost`, `id_vessel`, `month`, `year`, `depreciation_cost`, `rent_cost`, `crew_own_cost`, `crew_subcont_cost`, `insurance`, `repair`, `docking`, `brokerage_fee`, `others`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1802011, 0, 0, 72148904.00, 0.00, 88136937.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(2, 1770003, 0, 0, 58142946.00, 0.00, 87185125.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(3, 1802003, 0, 0, 92759505.00, 0.00, 87453385.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(4, 1770002, 0, 0, 59746545.00, 0.00, 79137665.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(5, 1802005, 0, 0, 62820643.00, 0.00, 87079113.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(6, 1770003, 0, 0, 62145387.00, 0.00, 88354309.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(7, 1802011, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(8, 7731188, 0, 0, 0.00, 330000000.00, 0.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(9, 7731189, 0, 0, 0.00, 330000000.00, 0.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(10, 7760010, 0, 0, 0.00, 300000000.00, 0.00, 26936996.22, 14400000.00, 32750000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(11, 7762011, 0, 0, 0.00, 300000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(12, 6760000, 0, 0, 0.00, 300000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(13, 7731178, 0, 0, 0.00, 330000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(14, 6705001, 0, 0, 0.00, 330000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(15, 1770008, 0, 0, 75767083.00, 0.00, 88136937.00, 26936996.22, 14400000.00, 26200000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(16, 1802009, 0, 0, 79122319.00, 0.00, 88136937.00, 26936996.22, 14400000.00, 26200000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(17, 1802015, 0, 0, 0.00, 0.00, 88136937.00, 26936996.22, 14400000.00, 26200000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(18, 1770001, 0, 0, 79033264.00, 0.00, 88136937.00, 26936996.22, 14400000.00, 26200000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(19, 1802010, 0, 0, 98820696.00, 0.00, 88136937.00, 26936996.22, 14400000.00, 26200000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(20, 1770006, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(21, 1770011, 0, 0, 98820696.00, 0.00, 88136937.00, 26936996.22, 14400000.00, 26200000.00, 82477600.00, 0.00, 13100000.00, '0000-00-00 00:00:00', '', ''),
(22, 1802007, 0, 0, 60200360.00, 0.00, 86793061.00, 25000000.00, 14400000.00, 26200000.00, 36391800.00, 0.00, 19650000.00, '0000-00-00 00:00:00', '', ''),
(23, 1770010, 0, 0, 67203933.00, 0.00, 84501328.00, 25000000.00, 14400000.00, 26200000.00, 82477600.00, 0.00, 19650000.00, '0000-00-00 00:00:00', '', ''),
(24, 1770005, 0, 0, 41298087.00, 0.00, 88113703.00, 25000000.00, 14400000.00, 26200000.00, 82477600.00, 0.00, 19650000.00, '0000-00-00 00:00:00', '', ''),
(25, 1802006, 0, 0, 41298087.00, 0.00, 84285598.00, 25000000.00, 14400000.00, 26200000.00, 82477600.00, 0.00, 19650000.00, '0000-00-00 00:00:00', '', ''),
(26, 1802001, 0, 0, 41298087.00, 0.00, 80709656.00, 25000000.00, 14400000.00, 26200000.00, 82477600.00, 0.00, 19650000.00, '0000-00-00 00:00:00', '', ''),
(27, 6751002, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(28, 7718001, 0, 0, 0.00, 320000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(29, 1802005, 0, 0, 75622248.00, 275100000.00, 88136937.00, 26933600.00, 14400000.00, 26200000.00, 131000000.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(30, 1770008, 0, 0, 79307932.00, 275100000.00, 88136937.00, 26933600.00, 14400000.00, 26200000.00, 131000000.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(31, 1770007, 0, 0, 79207765.00, 275100000.00, 88136937.00, 26933600.00, 14400000.00, 26200000.00, 131000000.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(32, 1802008, 0, 0, 82017613.00, 275100000.00, 88136937.00, 26933600.00, 14400000.00, 26200000.00, 131000000.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(33, 1802002, 0, 0, 74800274.00, 275100000.00, 88136937.00, 26933600.00, 14400000.00, 26200000.00, 131000000.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(34, 1802010, 0, 0, 80818718.00, 275100000.00, 88136937.00, 26933600.00, 14400000.00, 26200000.00, 131000000.00, 0.00, 9825000.00, '0000-00-00 00:00:00', '', ''),
(35, 1601008, 0, 0, 92759505.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(36, 1610102, 0, 0, 98264873.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(37, 1601007, 0, 0, 84381195.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(38, 1601005, 0, 0, 81737044.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(39, 1601006, 0, 0, 92566506.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(40, 1601004, 0, 0, 95681017.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(41, 7661003, 0, 0, 0.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(42, 7661005, 0, 0, 0.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(43, 7629301, 0, 0, 0.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(44, 5645016, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(45, 6601021, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(46, 7661002, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(47, 7661001, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(48, 1903010, 0, 0, 106656235.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(49, 1903009, 0, 0, 106653020.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(50, 1903011, 0, 0, 114754429.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(51, 1903003, 0, 0, 95777860.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(52, 1903015, 0, 0, 126693181.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(53, 1903012, 0, 0, 126693181.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(54, 6601023, 0, 0, 41021875.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(55, 1601001, 0, 0, 42382820.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(56, 1601003, 0, 0, 46262270.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(57, 6601022, 0, 0, 46262270.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(58, 6601020, 0, 0, 46262270.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(59, 7652002, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(60, 6652001, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(61, 1903001, 0, 0, 72171301.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(62, 1903002, 0, 0, 72183596.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(63, 1903007, 0, 0, 80459056.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(64, 1903008, 0, 0, 79570530.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(65, 1903005, 0, 0, 78804392.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(66, 1903006, 0, 0, 78145246.00, 0.00, 0.00, 0.00, 13971000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_standard_fuel`
--
ALTER TABLE `sp_standard_fuel`
  ADD PRIMARY KEY (`id_sp_standard_fuel`), ADD KEY `type_set_power` (`type_set_power`), ADD KEY `type_set_feet` (`type_set_feet`), ADD KEY `JettyIdStart` (`JettyIdStart`), ADD KEY `JettyIdEnd` (`JettyIdEnd`);

--
-- Indexes for table `sp_standard_vessel_cost`
--
ALTER TABLE `sp_standard_vessel_cost`
  ADD PRIMARY KEY (`id_sp_standard_vessel_cost`), ADD KEY `id_vessel` (`id_vessel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp_standard_fuel`
--
ALTER TABLE `sp_standard_fuel`
  MODIFY `id_sp_standard_fuel` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sp_standard_vessel_cost`
--
ALTER TABLE `sp_standard_vessel_cost`
  MODIFY `id_sp_standard_vessel_cost` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
