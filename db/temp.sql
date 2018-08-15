
CREATE TABLE IF NOT EXISTS `damage_report_repair` (
  `id_damage_report_repair` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_damage_report` int(11) NOT NULL,
  `id_request_for_schedule` bigint(20) NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `StartRepair` date NOT NULL,
  `EndRepair` date NOT NULL,
  `DamageReportNumber` varchar(250) NOT NULL,
  `NoReport` int(11) NOT NULL,
  `NoMonth` int(2) NOT NULL,
  `NoYear` int(4) NOT NULL,
  `Description` text NOT NULL,
  `PIC` varchar(256) NOT NULL,
  `Status` set('OPEN','REPAIRING','CLOSED') NOT NULL DEFAULT 'OPEN',
  `CausedDamage` text NOT NULL,
  `RepairPhoto1` varchar(250) NOT NULL,
  `RepairPhoto2` varchar(250) NOT NULL,
  `RepairPhoto3` varchar(250) NOT NULL,
  `Master` varchar(256) NOT NULL,
  `ChiefEngineer` varchar(256) NOT NULL,
  PRIMARY KEY (`id_damage_report_repair`),
  KEY `id_vessel` (`id_vessel`),
  KEY `id_damage_report` (`id_damage_report`),
  KEY `id_request_for_schedule` (`id_request_for_schedule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 09. Februari 2015 jam 14:36
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fleet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `good_issue`
--

CREATE TABLE IF NOT EXISTS `good_issue` (
  `id_good_issue` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_purchase_order` bigint(20) NOT NULL,
  `id_purchase_order_detail` bigint(20) NOT NULL,
  `id_po_category` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `receive_by` varchar(250) NOT NULL,
  `condition` varchar(250) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `purchase_item_table` varchar(200) NOT NULL,
  `id_item` bigint(20) NOT NULL,
  `item_add_info` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `metric` varchar(20) NOT NULL,
  `receive_number` int(3) NOT NULL,
  `status_receive` set('PARTIAL','FINAL') NOT NULL,
  `dedicated_to` set('VESSEL','VOYAGE','OTHERS') NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `id_voyage_order` bigint(20) NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `created_date` datetime NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_good_issue`),
  KEY `id_purchase_order` (`id_purchase_order`),
  KEY `id_item` (`id_item`),
  KEY `id_po_category` (`id_po_category`),
  KEY `id_purchase_order_detail` (`id_purchase_order_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
