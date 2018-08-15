-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 24. Februari 2015 jam 02:02
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `account_coa`
--

CREATE TABLE IF NOT EXISTS `account_coa` (
  `id_account_coa` bigint(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(250) NOT NULL,
  `account_name_id` varchar(250) NOT NULL,
  `id_account_coa_parent` bigint(20) NOT NULL,
  `level` int(3) NOT NULL,
  PRIMARY KEY (`id_account_coa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70227 ;

--
-- Dumping data untuk tabel `account_coa`
--

INSERT INTO `account_coa` (`id_account_coa`, `account_name`, `account_name_id`, `id_account_coa_parent`, `level`) VALUES
(1, 'Harta', 'Assets', 0, 1),
(2, 'Hutang', 'Liabilities', 0, 1),
(3, 'Modal', 'Equity', 0, 1),
(4, 'Pendapatan', 'Revenue', 0, 1),
(6, 'Beban Pokok Penjualan', 'Cost of Sales', 0, 1),
(7, 'Beban Usaha', 'Operating expense', 0, 1),
(601, 'Biaya Operasi', 'Operation Cost', 6, 2),
(602, 'Biaya Running', 'Running Cost', 6, 2),
(701, 'Beban Penjualan', 'Selling expense', 7, 2),
(702, 'Administrasi Umum', 'General administrative', 7, 2),
(60101, 'Sewa', 'Rent', 601, 3),
(60102, 'Biaya Bahan Bakar', 'Bunker Fuel', 601, 3),
(60103, 'Biaya Depresiasi', 'Depreciation', 601, 3),
(60104, 'Biaya Agensi', 'Agent Charge', 601, 3),
(60105, 'Biaya Subkontrak', 'Subcontracting', 601, 3),
(60106, 'Biaya Manajemen', 'Management Fee', 601, 3),
(60107, 'Biaya Lain', 'Others', 601, 3),
(60201, 'Biaya Awak Kapal', 'Crews Cost', 602, 3),
(60202, 'Biaya Docking', 'Dry Docking Year', 602, 3),
(60203, 'Biaya Perbaikan Kapal', 'Repair & Maintenance', 602, 3),
(60204, 'Biaya Asuransi', 'Insurance', 602, 3),
(70101, 'Hiburan', 'Entertainment', 701, 3),
(70102, 'Transportasi dan perjalanan', 'Transportation and travelling', 701, 3),
(70103, 'Iklan dan promosi', 'Advertising and promotion', 701, 3),
(70104, 'Telepon, teleks & fax', 'Telephone, telex & fax', 701, 3),
(70201, 'Kompensasi karyawan', 'Employee compensation', 702, 3),
(70202, 'Kesejahteraan karyawan', 'Employee welfare', 702, 3),
(70203, 'Hiburan', 'Entertainment', 702, 3),
(70204, 'Transportasi dan perjalanan', 'Transportation and travelling', 702, 3),
(70205, 'Pelatihan & Pendidikan', 'Training & Education', 702, 3),
(70206, 'Rekrutmen', 'Recruitment', 702, 3),
(70207, 'Perbaikan & Pemeliharaan', 'Repairs & Maintenance', 702, 3),
(70208, 'Bahan Bakar dan Pelumas', 'Fuel and Lubricant', 702, 3),
(70209, 'Alat dan peralatan', 'Tools and  equipment', 702, 3),
(70210, 'Seragam', 'Uniform', 702, 3),
(70211, 'Penyusutan', 'Depreciation', 702, 3),
(70212, 'Amortisasi', 'Amortization', 702, 3),
(70213, 'Telepon, teleks & fax', 'Telephone, telex & fax', 702, 3),
(70214, 'Biaya Perkantoran', 'Office expenses', 702, 3),
(70215, 'Donasi/Sumbangan', 'Donations', 702, 3),
(70216, 'Jasa profesional', 'Professional fees', 702, 3),
(70217, 'Pajak & lisensi', 'Taxes & licenses', 702, 3),
(70218, 'Biaya Sewa', 'Rent expenses', 702, 3),
(70219, 'Biaya Bank', 'Bank Charges', 702, 3),
(70220, 'Beban Rekening doubtfull', 'Doubtfull Account Expenses', 702, 3),
(70221, 'Asuransi', 'Insurance', 702, 3),
(70222, 'Layanan Purna Jual', 'After sales services', 702, 3),
(70223, 'Jasa Keamanan', 'Security services', 702, 3),
(70224, 'Emloyee Benefit - Kepmen 150 Kas', 'Emloyee Benefit - Kepmen 150 Cash', 702, 3),
(70225, 'Emloyee Benefit - Kepmen 150 Non cash', 'Emloyee Benefit - Kepmen 150 Non cash', 702, 3),
(70226, 'Macam-macam yang lain', 'Miscellanous', 702, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `account_gl`
--

CREATE TABLE IF NOT EXISTS `account_gl` (
  `id_account_gl` bigint(20) NOT NULL AUTO_INCREMENT,
  `coa_level1` int(11) NOT NULL,
  `coa_level2` int(11) NOT NULL,
  `coa_level3` int(11) NOT NULL,
  `gl_number` bigint(20) NOT NULL,
  `gl_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id_account_gl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7970000101 ;

--
-- Dumping data untuk tabel `account_gl`
--

INSERT INTO `account_gl` (`id_account_gl`, `coa_level1`, `coa_level2`, `coa_level3`, `gl_number`, `gl_name`) VALUES
(1010121010, 1, 0, 0, 1010121010, 'Cash on Hand HO - IDR'),
(1010121050, 1, 0, 0, 1010121050, 'Cash on Hand Banjarmasin - IDR'),
(1010122010, 1, 0, 0, 1010122010, 'Cash on Hand HO - USD'),
(1010123010, 1, 0, 0, 1010123010, 'Cash on Hand HO - EUR'),
(1010124010, 1, 0, 0, 1010124010, 'Cash on Hand HO - JPY'),
(1010125010, 1, 0, 0, 1010125010, 'Cash on Hand HO - SGD'),
(1010126010, 1, 0, 0, 1010126010, 'Cash on Hand HO - HKD'),
(1010127010, 1, 0, 0, 1010127010, 'Cash on Hand HO - GBP'),
(1010128010, 1, 0, 0, 1010128010, 'Cash on Hand HO - AUD'),
(1010131020, 1, 0, 0, 1010131020, 'Cash in Bank IDR Permata 0.701225.392'),
(1010131021, 1, 0, 0, 1010131021, 'Cash in Bank IDR Permata 0.701225.392 - in'),
(1010131022, 1, 0, 0, 1010131022, 'Cash in Bank IDR Permata 0.701225.392 - out'),
(1010131090, 1, 0, 0, 1010131090, 'Cash in Bank IDR SCB 306.0826.3300'),
(1010131091, 1, 0, 0, 1010131091, 'Cash in Bank IDR SCB 306.0826.3300 - in'),
(1010131092, 1, 0, 0, 1010131092, 'Cash in Bank IDR SCB 306.0826.3300 - out'),
(1010131100, 1, 0, 0, 1010131100, 'Cash in Bank IDR Danamon 0093447563'),
(1010131101, 1, 0, 0, 1010131101, 'Cash in Bank IDR Danamon 0093447563 - in'),
(1010131102, 1, 0, 0, 1010131102, 'Cash in Bank IDR Danamon 0093447563 - out'),
(1010131110, 1, 0, 0, 1010131110, 'Cash in Bank IDR DBS 3320009638'),
(1010131111, 1, 0, 0, 1010131111, 'Cash in Bank IDR DBS 3320009638 in'),
(1010131112, 1, 0, 0, 1010131112, 'Cash in Bank IDR DBS 3320009638 out'),
(1010131500, 1, 0, 0, 1010131500, 'Cash in Bank IDR Permata 1218949777'),
(1010131501, 1, 0, 0, 1010131501, 'Cash in Bank IDR Permata 1218949777 - in'),
(1010131502, 1, 0, 0, 1010131502, 'Cash in Bank IDR Permata 1218949777 - out'),
(1010131700, 1, 0, 0, 1010131700, 'Cash in Bank IDR Mandiri 156-00-0704240-3'),
(1010131701, 1, 0, 0, 1010131701, 'Cash in Bank IDR Mandiri 156-00-0704240-3 in'),
(1010131702, 1, 0, 0, 1010131702, 'Cash in Bank IDR Mandiri 156-00-0704240-3 - out'),
(1010132040, 1, 0, 0, 1010132040, 'Cash in Bank USD DBS 3320009645'),
(1010132041, 1, 0, 0, 1010132041, 'Cash in Bank USD DBS 3320009645 in'),
(1010132042, 1, 0, 0, 1010132042, 'Cash in Bank USD DBS 3320009645 out'),
(1010132090, 1, 0, 0, 1010132090, 'Cash in Bank USD SCB 306.07193201'),
(1010132091, 1, 0, 0, 1010132091, 'Cash in Bank USD SCB 306.07193201 - in'),
(1010132092, 1, 0, 0, 1010132092, 'Cash in Bank USD SCB 306.07193201 - out'),
(1010132110, 1, 0, 0, 1010132110, 'Cash in Bank USD Permata 0701807022'),
(1010132111, 1, 0, 0, 1010132111, 'Cash in Bank USD Permata 0701807022 - in'),
(1010132112, 1, 0, 0, 1010132112, 'Cash in Bank USD Permata 0701807022 - out'),
(1010132200, 1, 0, 0, 1010132200, 'Cash in Bank USD Danamon 3561652458'),
(1010132201, 1, 0, 0, 1010132201, 'Cash in Bank USD Danamon 3561652458 - in'),
(1010132202, 1, 0, 0, 1010132202, 'Cash in Bank USD Danamon 3561652458 - out'),
(1010134010, 1, 0, 0, 1010134010, 'Cash in Bank SGD Permata 1.215865.874'),
(1010134011, 1, 0, 0, 1010134011, 'Cash in Bank SGD Permata 1.215865.874 - in'),
(1010134012, 1, 0, 0, 1010134012, 'Cash in Bank SGD Permata 1.215865.874 - out'),
(1020141000, 1, 0, 0, 1020141000, 'Time Deposit IDR'),
(1020141990, 1, 0, 0, 1020141990, 'Valuation for Time Deposit IDR'),
(1020142000, 1, 0, 0, 1020142000, 'Time Deposit USD'),
(1020142990, 1, 0, 0, 1020142990, 'Valuation for Time Deposit USD'),
(1020143000, 1, 0, 0, 1020143000, 'Time Deposit EUR'),
(1020143990, 1, 0, 0, 1020143990, 'Valuation for Time Deposit EUR'),
(1020144000, 1, 0, 0, 1020144000, 'Time Deposit SGD'),
(1020144990, 1, 0, 0, 1020144990, 'Valuation for Time Deposit SGD'),
(1020145000, 1, 0, 0, 1020145000, 'Time Deposit JPY'),
(1020145990, 1, 0, 0, 1020145990, 'Valuation for Time Deposit JPY'),
(1050110401, 1, 0, 0, 1050110401, 'AR Trade - Affco Relpar - Tonnage'),
(1050110402, 1, 0, 0, 1050110402, 'AR Trade - 3rd Parties - Tonnage'),
(1050110501, 1, 0, 0, 1050110501, 'AR Trade - Affco Relpar - Time Charter'),
(1050110502, 1, 0, 0, 1050110502, 'AR Trade - 3rd Parties - Time Charter'),
(1050110601, 1, 0, 0, 1050110601, 'AR Trade - Affco Relpar - Transhipment'),
(1050110602, 1, 0, 0, 1050110602, 'AR Trade - 3rd Parties - Transhipment'),
(1050110701, 1, 0, 0, 1050110701, 'AR Trade - Affco Relpar - Coal Terminal'),
(1050110702, 1, 0, 0, 1050110702, 'AR Trade - 3rd Parties - Coal Terminal'),
(1050110901, 1, 0, 0, 1050110901, 'AR Trade - Affco Relpar - Others'),
(1050110902, 1, 0, 0, 1050110902, 'AR Trade - 3rd Parties - Others'),
(1050119991, 1, 0, 0, 1050119991, 'Valuation for AR Trade Affco Relpar'),
(1050119992, 1, 0, 0, 1050119992, 'Valuation for AR Trade 3rd Parties'),
(1050120002, 1, 0, 0, 1050120002, 'Allow.For AR Trade - 3rd Parties'),
(1120111201, 1, 0, 0, 1120111201, 'AR Non Trade - Affco Relpar'),
(1120111202, 1, 0, 0, 1120111202, 'AR Non Trade - 3rd Parties'),
(1120111291, 1, 0, 0, 1120111291, 'Valuation for AR Non Trade - Affco Relpar'),
(1120111292, 1, 0, 0, 1120111292, 'Valuation for AR Non Trade - 3rd Parties'),
(1120121202, 1, 0, 0, 1120121202, 'Allow.For AR Non Trade - 3rd Parties'),
(1150150020, 1, 0, 0, 1150150020, 'Inventory - Consumables Fuel'),
(1150150030, 1, 0, 0, 1150150030, 'Inventory - Consumables Lube & Oil'),
(1150261320, 1, 0, 0, 1150261320, 'Inventory Allow for Obs - FU Other'),
(1150261500, 1, 0, 0, 1150261500, 'Inventory Allow for Obs - Consumables'),
(1160110000, 1, 0, 0, 1160110000, 'Prepaid Tax - Art 4 (2)'),
(1160120010, 1, 0, 0, 1160120010, 'Prepaid Tax - Art 22 - Import'),
(1160120020, 1, 0, 0, 1160120020, 'Prepaid Tax - Art 22 - Local'),
(1160130000, 1, 0, 0, 1160130000, 'Prepaid Tax - Art 23'),
(1160140000, 1, 0, 0, 1160140000, 'Prepaid Tax - Art 24'),
(1160150010, 1, 0, 0, 1160150010, 'Prepaid Tax - Art 25 - Masa'),
(1160160000, 1, 0, 0, 1160160000, 'Prepaid Tax - Art 26'),
(1160170000, 1, 0, 0, 1160170000, 'Prepaid Tax - VAT In'),
(1160180000, 1, 0, 0, 1160180000, 'Prepaid Tax - Art 21'),
(1170111100, 1, 0, 0, 1170111100, 'Claim For Tax Refund - Art 22'),
(1170111200, 1, 0, 0, 1170111200, 'Claim For Tax Refund - Art 23'),
(1170111300, 1, 0, 0, 1170111300, 'Claim For Tax Refund - Art 24'),
(1170111400, 1, 0, 0, 1170111400, 'Claim For Tax Refund - Art 25'),
(1170111500, 1, 0, 0, 1170111500, 'Claim For Tax Refund - Art 26'),
(1170111600, 1, 0, 0, 1170111600, 'Claim For Tax Refund - Art 21'),
(1170120000, 1, 0, 0, 1170120000, 'Claim For Tax Refund - Value Added Tax'),
(1170130000, 1, 0, 0, 1170130000, 'Claim For Tax Refund - Luxury Tax'),
(1170150000, 1, 0, 0, 1170150000, 'Claim For Tax Refund - Other'),
(1180110001, 1, 0, 0, 1180110001, 'Prepaid Rent Expense - Affco & Relpar'),
(1180110002, 1, 0, 0, 1180110002, 'Prepaid Rent Expense - 3rd Parties'),
(1180110011, 1, 0, 0, 1180110011, 'Prepaid Rent Expense Land & Building Affco&Relpar'),
(1180110012, 1, 0, 0, 1180110012, 'Prepaid Rent Expense Land & Building 3rd Parties'),
(1180110021, 1, 0, 0, 1180110021, 'Prepaid Rent Expense Transportation Affco&Relpar'),
(1180110022, 1, 0, 0, 1180110022, 'Prepaid Rent Expense Transportation 3rd Parties'),
(1180110031, 1, 0, 0, 1180110031, 'Prepaid Rent Expense - Office Eqp - Affco & Relpar'),
(1180110032, 1, 0, 0, 1180110032, 'Prepaid Rent Expense - Office Eqp - 3rd Parties'),
(1180110991, 1, 0, 0, 1180110991, 'Prepaid Rent Expense - Others - Affco & Relpar'),
(1180110992, 1, 0, 0, 1180110992, 'Prepaid Rent Expense - Others - 3rd Parties'),
(1180120001, 1, 0, 0, 1180120001, 'Prepaid Insurance Expense - Affco & Relpar'),
(1180120002, 1, 0, 0, 1180120002, 'Prepaid Insurance Expense - 3rd Parties'),
(1180200001, 1, 0, 0, 1180200001, 'Prepaid Expense - Other - Affco & Relpar'),
(1180200002, 1, 0, 0, 1180200002, 'Prepaid Expense - Other  - 3rd Parties'),
(1180200101, 1, 0, 0, 1180200101, 'Prepaid Expense - Other - Agency Fee Affco&Relpar'),
(1180200102, 1, 0, 0, 1180200102, 'Prepaid Expense - Other - Agency Fee- 3rd Parties'),
(1180200201, 1, 0, 0, 1180200201, 'Prepaid Expense - Other - Port Chargs Affco&Relpar'),
(1180200202, 1, 0, 0, 1180200202, 'Prepaid Expense - Other - Port Charges 3rd Parties'),
(1180209901, 1, 0, 0, 1180209901, 'Prepaid Expense - Other - Others - Affco & Relpar'),
(1180209902, 1, 0, 0, 1180209902, 'Prepaid Expense - Other - Others - 3rd Parties'),
(1200110001, 1, 0, 0, 1200110001, 'Adv FA othr thn Land,EFL&Concessn Rgt Affco&Relpr'),
(1200110002, 1, 0, 0, 1200110002, 'Adv FA othr thn Land,EFL&Concessn Rgt 3rd Parties'),
(1200111101, 1, 0, 0, 1200111101, 'Adv. For Land - Affco & Relpar'),
(1200111102, 1, 0, 0, 1200111102, 'Adv. For Land - 3rd Parties'),
(1200120001, 1, 0, 0, 1200120001, 'Adv. For Inventory- Affco & Relpar'),
(1200120002, 1, 0, 0, 1200120002, 'Adv. For Inventory- 3rd Parties'),
(1200200001, 1, 0, 0, 1200200001, 'Adv. For Others- Affco & Relpar'),
(1200200002, 1, 0, 0, 1200200002, 'Adv. For Others- 3rd Parties'),
(1320000100, 1, 0, 0, 1320000100, 'Loan to Employee - Car Loan - Current'),
(1320000200, 1, 0, 0, 1320000200, 'Loan to Employee - Company Loan - Current'),
(1320000300, 1, 0, 0, 1320000300, 'Loan to Employee - Car Insurance Loan - Current'),
(1320000400, 1, 0, 0, 1320000400, 'Loan to Employee - House Loan - Current'),
(1320000500, 1, 0, 0, 1320000500, 'Loan to Employee - Others Loan - Current'),
(1480000000, 1, 0, 0, 1480000000, 'OTHER CURRENT ASSETS'),
(1620171100, 1, 0, 0, 1620171100, 'DTA Fr FA - Excess of commercial over fiscal depr'),
(1630000000, 1, 0, 0, 1630000000, 'Invstmnt in Assocts, Subs and Joint Contrlld Entts'),
(1660110001, 1, 0, 0, 1660110001, 'Advance For Share of Stock - Affco & Relpar'),
(1660120001, 1, 0, 0, 1660120001, 'Allow.For Advance For Share of Stock-Affco & Relpa'),
(1700111100, 1, 0, 0, 1700111100, 'PPE (Cost) - Land'),
(1700111500, 1, 0, 0, 1700111500, 'PPE (Cost) - Building'),
(1700112110, 1, 0, 0, 1700112110, 'PPE (Cost) - Machinery and Equipment - Machines'),
(1700112200, 1, 0, 0, 1700112200, 'PPE (Cost) - Transportation Equipment'),
(1700112300, 1, 0, 0, 1700112300, 'PPE (Cost) - Office Equipment'),
(1700112500, 1, 0, 0, 1700112500, 'PPE (Cost) - Furniture and Fixtures'),
(1700113310, 1, 0, 0, 1700113310, 'PPE (Cost) - Vessel and Equipment - WT Fleet'),
(1700113320, 1, 0, 0, 1700113320, 'PPE (Cost) - Vessel and Equipment - WT Equipment'),
(1700121500, 1, 0, 0, 1700121500, 'Accum.Depr PPE - Building'),
(1700122110, 1, 0, 0, 1700122110, 'Accm Depr PPE - Machinery and Equipment - Machines'),
(1700122200, 1, 0, 0, 1700122200, 'Accum.Depr PPE - Transportation Equipment'),
(1700122300, 1, 0, 0, 1700122300, 'Accum.Depr PPE - Office Equipment'),
(1700122500, 1, 0, 0, 1700122500, 'Accum.Depr PPE - Furniture and Fixtures'),
(1700123310, 1, 0, 0, 1700123310, 'Accum.Depr PPE - Vessel and Equipment - WT Fleet'),
(1700123320, 1, 0, 0, 1700123320, 'Accm.Depr PPE - Vessel and Equipment - WT Equipmnt'),
(1750111100, 1, 0, 0, 1750111100, 'CIP - Building - Determined for own use'),
(1750111200, 1, 0, 0, 1750111200, 'CIP - Investment Properties'),
(1750140000, 1, 0, 0, 1750140000, 'CIP - Machinery and Equipment - Machines'),
(1750203300, 1, 0, 0, 1750203300, 'CIP - Water Transportation Fleet'),
(1770113310, 1, 0, 0, 1770113310, 'Assets Under Capital Lease (Cost)-Vessel&Eq-WT Flt'),
(1770123310, 1, 0, 0, 1770123310, 'Accm Depr Assets Undr Captl Lease-Vessel&Eq-WT Flt'),
(1780141100, 1, 0, 0, 1780141100, 'Def.Land Cost - Gross (Non Current)'),
(1780141200, 1, 0, 0, 1780141200, 'Accum.Amort of Def.Land Cost (Non Current)'),
(1780181100, 1, 0, 0, 1780181100, 'Software Acquired 2007 Onwards - Gross'),
(1780181200, 1, 0, 0, 1780181200, 'Accum.Amort of Software Acquired 2007 Onwards'),
(1780251100, 1, 0, 0, 1780251100, 'Def.Other Cost - Gross (Non Current)'),
(1780251110, 1, 0, 0, 1780251110, 'Def Other Cost - Service Cost'),
(1780251120, 1, 0, 0, 1780251120, 'Def Other Cost - Ship Maintenance'),
(1780251130, 1, 0, 0, 1780251130, 'Def Other Cost - Fuel'),
(1780251140, 1, 0, 0, 1780251140, 'Def Other Cost - Rent'),
(1780251150, 1, 0, 0, 1780251150, 'Def Other Cost - VAT Difference'),
(1780251200, 1, 0, 0, 1780251200, 'Accum.Amort of Def.Other Cost (Non Current)'),
(1780251210, 1, 0, 0, 1780251210, 'Accum.Amort of Def.Other Cost - Service Cost'),
(1780251220, 1, 0, 0, 1780251220, 'Accum.Amort of Def.Other Cost - Ship Maintenance'),
(1780251230, 1, 0, 0, 1780251230, 'Accum.Amort of Def.Other Cost - Fuel'),
(1780251240, 1, 0, 0, 1780251240, 'Accum.Amort of Def.Other Cost - Rent'),
(1805110000, 1, 0, 0, 1805110000, 'Intangible Asset - Joint Operation (Cost) - Gross'),
(1805120000, 1, 0, 0, 1805120000, 'Accum.Amort of Intangible Asset - Joint Operation'),
(1820000100, 1, 0, 0, 1820000100, 'Loan to Employee - Car Loan'),
(1820000300, 1, 0, 0, 1820000300, 'Loan to Employee - Car Insurance Loan'),
(1820000400, 1, 0, 0, 1820000400, 'Loan to Employee - House Loan'),
(1820000900, 1, 0, 0, 1820000900, 'Loan to Employee - Others Loan'),
(2010110000, 2, 0, 0, 2010110000, 'Short Term Bank Loans'),
(2010110099, 2, 0, 0, 2010110099, 'Valuation for Short Term Bank Loans'),
(2010110100, 2, 0, 0, 2010110100, 'Short Term Non Bank Loans - Non Bank,Affco&Relpar'),
(2010110199, 2, 0, 0, 2010110199, 'Valuation for Short Term Non Bank Loans'),
(2020000001, 2, 0, 0, 2020000001, 'AP Trade - Affco & Relpar'),
(2020000002, 2, 0, 0, 2020000002, 'AP Trade - 3rd Parties'),
(2020000991, 2, 0, 0, 2020000991, 'Valuation for AP Trade - Affco Relpar'),
(2020000992, 2, 0, 0, 2020000992, 'Valuation for AP Trade - 3rd Parties'),
(2020003002, 2, 0, 0, 2020003002, 'AP - Not Invoiced Yet'),
(2120200001, 2, 0, 0, 2120200001, 'AP Non Trade - Others - Affco & Relpar'),
(2120200002, 2, 0, 0, 2120200002, 'AP Non Trade - Others - 3rd Parties'),
(2120200402, 2, 0, 0, 2120200402, 'AP Non Trade - Others - Returned Vendor Payment'),
(2120200502, 2, 0, 0, 2120200502, 'AP Non Trade - Others - Returned Payment'),
(2120200901, 2, 0, 0, 2120200901, 'Valuation for AP Non Trade - Affco Relpar'),
(2120200902, 2, 0, 0, 2120200902, 'Valuation for AP Non Trade - 3rd Parties'),
(2130000001, 2, 0, 0, 2130000001, 'Dividend Payable - Affco & Relpar'),
(2160000000, 2, 0, 0, 2160000000, 'Customer Deposit - Titipan'),
(2170001001, 2, 0, 0, 2170001001, 'Customer Advance -Down Payment - Affco & Relpar'),
(2170001002, 2, 0, 0, 2170001002, 'Customer Advance -Down Payment - 3rd Parties'),
(2170001991, 2, 0, 0, 2170001991, 'Valuation for Customer Advance - Down Payment Aff'),
(2170001992, 2, 0, 0, 2170001992, 'Valuation for Customer Advance - Down Payment 3rd'),
(2170002001, 2, 0, 0, 2170002001, 'Customer Advance -Deposit - Affco & Relpar'),
(2170002002, 2, 0, 0, 2170002002, 'Customer Advance -Deposit - 3rd Parties'),
(2180111111, 2, 0, 0, 2180111111, 'Accrued expense interest - Bank'),
(2180111112, 2, 0, 0, 2180111112, 'Accrued expense interest - STL - 3rd parties'),
(2180111121, 2, 0, 0, 2180111121, 'Accrued expense interest - STL -  Affco & Relpar'),
(2180111122, 2, 0, 0, 2180111122, 'Accrued expense interest - LTD - 3rd parties'),
(2180111131, 2, 0, 0, 2180111131, 'Accrued expense interest - LTD -  Affco & Relpar'),
(2180130000, 2, 0, 0, 2180130000, 'Accrued expense salary & bonus'),
(2180140000, 2, 0, 0, 2180140000, 'Accrued expense pension'),
(2180150000, 2, 0, 0, 2180150000, 'Accrued expense advertising & promotion'),
(2180160000, 2, 0, 0, 2180160000, 'Accrued expense royalty'),
(2180180000, 2, 0, 0, 2180180000, 'Accrued expense utilities'),
(2180180010, 2, 0, 0, 2180180010, 'Accrued expense utilities - Telephone'),
(2180180020, 2, 0, 0, 2180180020, 'Accrued expense utilities - Electric'),
(2180180030, 2, 0, 0, 2180180030, 'Accrued expense utilities - PAM'),
(2180190000, 2, 0, 0, 2180190000, 'Accrued expense professional fees'),
(2180230000, 2, 0, 0, 2180230000, 'Accrued expense repairs & maintenance'),
(2180250000, 2, 0, 0, 2180250000, 'Accrued expense astek&personal accident insurance'),
(2180260001, 2, 0, 0, 2180260001, 'Accrued expense Rent - Affco & Relpar'),
(2180260002, 2, 0, 0, 2180260002, 'Accrued expense Rent - 3rd parties'),
(2180270000, 2, 0, 0, 2180270000, 'Accrued expense after sales service'),
(2180300020, 2, 0, 0, 2180300020, 'Accrued expense production cost - Fuel'),
(2180300030, 2, 0, 0, 2180300030, 'Accrued expense production cost - Agency Charges'),
(2180300040, 2, 0, 0, 2180300040, 'Accrued expense production cost - Rent'),
(2180350080, 2, 0, 0, 2180350080, 'Accrued expense others - Gratuity'),
(2190110010, 2, 0, 0, 2190110010, 'Tax Payable - Art 21 - Employee'),
(2190110020, 2, 0, 0, 2190110020, 'Tax Payable - Art 21 - Non Employee'),
(2190120000, 2, 0, 0, 2190120000, 'Tax Payable - Art 22'),
(2190130000, 2, 0, 0, 2190130000, 'Tax Payable - Art 23'),
(2190140000, 2, 0, 0, 2190140000, 'Tax Payable - Art 25'),
(2190150000, 2, 0, 0, 2190150000, 'Tax Payable - Art 26'),
(2190160000, 2, 0, 0, 2190160000, 'Tax Payable - Art 29'),
(2190170000, 2, 0, 0, 2190170000, 'Tax Payable - VAT Out'),
(2190180000, 2, 0, 0, 2190180000, 'Value Added Tax-In/Out-Centralized'),
(2190200000, 2, 0, 0, 2190200000, 'Tax Payable - Art 4(2)'),
(2190500100, 2, 0, 0, 2190500100, 'Tax Payable - Others - Art 15'),
(2190500200, 2, 0, 0, 2190500200, 'Tax Payable - Others - Art 15 Centralized'),
(2240200000, 2, 0, 0, 2240200000, 'Estimated Liab - Others'),
(2250110000, 2, 0, 0, 2250110000, 'CM of LT Bank Loan'),
(2250120000, 2, 0, 0, 2250120000, 'CM of LT Obligation u/ Cap.Lease'),
(2250200001, 2, 0, 0, 2250200001, 'CM of LT Due To - Affco & Relpar'),
(2250200002, 2, 0, 0, 2250200002, 'CM of LT Due To - 3rd Parties'),
(2260000000, 2, 0, 0, 2260000000, 'CONSOLIDATION SUSPENSE'),
(2540200001, 2, 0, 0, 2540200001, 'LT Due To - Affco & Relpar'),
(2540200991, 2, 0, 0, 2540200991, 'Valuation for LT Due To - Affco & Relpar'),
(2570120000, 2, 0, 0, 2570120000, 'Intercompany pooling'),
(2580111100, 2, 0, 0, 2580111100, 'Estimated Liab - Employee Benefit - Pension'),
(2580111200, 2, 0, 0, 2580111200, 'Estimated Liab - Employee Benefit - Non Pension'),
(2600300000, 2, 0, 0, 2600300000, 'DTL From Other'),
(2910120001, 2, 0, 0, 2910120001, 'Common Stock - Affco & Relpar'),
(2910120002, 2, 0, 0, 2910120002, 'Common Stock - 3rd Parties'),
(2938110000, 2, 0, 0, 2938110000, 'Actuarial GL on pension plans - Gross'),
(2938120000, 2, 0, 0, 2938120000, 'Actuarial GL on pension plans - Tax Effect'),
(2945000000, 2, 0, 0, 2945000000, 'Exchange Diff.Due To Fin.Stat Translation'),
(2950000001, 2, 0, 0, 2950000001, 'Deposit Future Stock Subscribe - Affco & Relpar'),
(2950000002, 2, 0, 0, 2950000002, 'Deposit Future Stock Subscribe - 3rd Parties'),
(2980110000, 2, 0, 0, 2980110000, 'Appropriated Retained Earnings'),
(2980110010, 2, 0, 0, 2980110010, 'Appropriated Retained Earnings - Last Year'),
(2980110020, 2, 0, 0, 2980110020, 'Appropriated Retained Earnings - Current Year'),
(2980120000, 2, 0, 0, 2980120000, 'Unappropriated Retained Earnings'),
(2980151100, 2, 0, 0, 2980151100, 'Dividend Declared - Cash Dividend'),
(2980151200, 2, 0, 0, 2980151200, 'Dividend Declared - Stock Dividend'),
(2980151300, 2, 0, 0, 2980151300, 'Dividend Declared - Script Dividend'),
(3090000011, 4, 0, 0, 3090000011, 'Rev From Service - Tonnage -Affco & Rel'),
(3090000012, 4, 0, 0, 3090000012, 'Rev From Service - Tonnage - 3rd Partie'),
(3090000022, 4, 0, 0, 3090000022, 'Rev From Service - Time Charter - 3rd P'),
(3090000031, 4, 0, 0, 3090000031, 'Rev From Service - Floating Crane -Affc'),
(6101010100, 6, 601, 60102, 6101010100, 'COSO Bunker Fuel - Fuel'),
(6101020100, 6, 601, 60102, 6101020100, 'COSO Lube & Oil'),
(6101020200, 6, 601, 60107, 6101020200, 'COSO Fresh Water'),
(6101030100, 6, 601, 60104, 6101030100, 'COSO Agency Charge - Port Clearing'),
(6101030200, 6, 601, 60104, 6101030200, 'COSO Agency Charge - Vessel Agency'),
(6101030300, 6, 601, 60104, 6101030300, 'COSO Agency Charge - Document'),
(6101030400, 6, 601, 60104, 6101030400, 'COSO Agency Charge - Crew Agency'),
(6101030500, 6, 601, 60104, 6101030500, 'COSO Agency Charge - Fee'),
(6101040200, 6, 601, 60101, 6101040200, 'COSO Rent - Tug'),
(6101040300, 6, 601, 60101, 6101040300, 'COSO Rent - Barge'),
(6101040400, 6, 601, 60101, 6101040400, 'COSO Rent - Crane'),
(6101040700, 6, 601, 60101, 6101040700, 'COSO Rent - Others'),
(6101050800, 6, 601, 60104, 6101050800, 'COSO Port Charge - Harbour Due'),
(6101051000, 6, 601, 60104, 6101051000, 'COSO Port Charge - Pilotage Due'),
(6101051100, 6, 601, 60104, 6101051100, 'COSO Port Charge - Light Due'),
(6101051200, 6, 601, 60104, 6101051200, 'COSO Port Charge - Assist Tug'),
(6101051300, 6, 601, 60104, 6101051300, 'COSO Port Charge - Mooring & Unmooring'),
(6101051400, 6, 601, 60104, 6101051400, 'COSO Port Charge - Overdraft Compensati'),
(6101051600, 6, 601, 60104, 6101051600, 'COSO Port Charge - Detention'),
(6101051700, 6, 601, 60104, 6101051700, 'COSO Port Charge - Demurage'),
(6101051800, 6, 601, 60104, 6101051800, 'COSO Port Charge - Stevedoring'),
(6101051900, 6, 601, 60104, 6101051900, 'COSO Port Charge - Canal'),
(6101052000, 6, 601, 60104, 6101052000, 'COSO Port Charge - Others'),
(6101062500, 6, 601, 60105, 6101062500, 'COSO IDL Cost - Subcontractor'),
(6101070400, 6, 602, 60201, 6101070400, 'COSO IDL Welfare - Medical & Glasses'),
(6101070500, 6, 602, 60201, 6101070500, 'COSO IDL Welfare - Hospital'),
(6101070700, 6, 602, 60201, 6101070700, 'COSO IDL Welfare - Meal'),
(6101080100, 6, 601, 60107, 6101080100, 'COSO Office Expense - Photocopy'),
(6101080200, 6, 601, 60107, 6101080200, 'COSO Office Expense - Stationary'),
(6101080300, 6, 601, 60107, 6101080300, 'COSO Office Expense - Printing Material'),
(6101080400, 6, 601, 60107, 6101080400, 'COSO Office Expense - Computer Supplies'),
(6101090100, 6, 601, 60103, 6101090100, 'COSO Depreciation'),
(6101100100, 6, 601, 60107, 6101100100, 'COSO Uniform & Safety'),
(6101100400, 6, 601, 60107, 6101100400, 'COSO General Consumable'),
(6101100500, 6, 601, 60104, 6101100500, 'COSO Security'),
(6101100600, 6, 601, 60106, 6101100600, 'COSO Management Fee'),
(6102010100, 6, 602, 60201, 6102010100, 'COSR Crew Cost - Wages'),
(6102010200, 6, 602, 60201, 6102010200, 'COSR Crew Cost - Allowance'),
(6102010300, 6, 602, 60201, 6102010300, 'COSR Crew Cost - THR'),
(6102020100, 6, 602, 60201, 6102020100, 'COSR Crew Welfare - Insurance'),
(6102020200, 6, 602, 60201, 6102020200, 'COSR Crew Welfare - Labor Safety/P2K3'),
(6102020400, 6, 602, 60201, 6102020400, 'COSR Crew Welfare - Medical & Glasses'),
(6102020500, 6, 602, 60201, 6102020500, 'COSR Crew Welfare - Hospital'),
(6102020700, 6, 602, 60201, 6102020700, 'COSR Crew Welfare - Meal'),
(6102030100, 6, 601, 60105, 6102030100, 'COSR Direct Labor Cost - Subcontractor'),
(6102040100, 6, 602, 60203, 6102040100, 'COSR Repair & Maintenance - Vessel Repa'),
(6102040200, 6, 602, 60203, 6102040200, 'COSR Repair & Maintenance - Store'),
(6102040300, 6, 602, 60203, 6102040300, 'COSR Repair & Maintenance - Sparepart'),
(6102050100, 6, 602, 60202, 6102050100, 'COSR Dry Docking Yearly Deferred Up - B'),
(6102050200, 6, 602, 60202, 6102050200, 'COSR Dry Docking Yearly Deferred Up - S'),
(6102060100, 6, 601, 60107, 6102060100, 'COSR Survey - Class&Flag Annual Survey'),
(6102060200, 6, 601, 60107, 6102060200, 'COSR Survey - Special Survey'),
(6102060400, 6, 601, 60107, 6102060400, 'COSR Survey - On/Off Hire Survey'),
(6102070100, 6, 601, 60104, 6102070100, 'COSR Tax&Licences - Ship Documentation'),
(6102070200, 6, 601, 60107, 6102070200, 'COSR Communication - Internet'),
(6102070300, 6, 601, 60107, 6102070300, 'COSR Communication - Phones'),
(6102070400, 6, 602, 60204, 6102070400, 'COSR Insurance - H&M'),
(6102070500, 6, 602, 60204, 6102070500, 'COSR Insurance - P&I'),
(6102070600, 6, 601, 60107, 6102070600, 'COSR Travelling - Ticket & Travel Docum'),
(6102070700, 6, 601, 60107, 6102070700, 'COSR Travelling - Hotel'),
(6102070800, 6, 601, 60107, 6102070800, 'COSR Travelling - Others'),
(6102070900, 6, 601, 60107, 6102070900, 'COSR Train.&Education - Training'),
(6102071000, 6, 601, 60107, 6102071000, 'COSR Train.&Education - Meeting'),
(6102071100, 6, 601, 60107, 6102071100, 'COSR Train.&Education - Book,Magazine,N'),
(7000020100, 7, 702, 70201, 7000020100, 'G. Employee Compensation Wages'),
(7000020300, 7, 702, 70201, 7000020300, 'G. Employee Compensation THR'),
(7000020400, 7, 702, 70201, 7000020400, 'G. Employee Compensation Bonus'),
(7000020500, 7, 702, 70201, 7000020500, 'G. Employee Compensation Severance'),
(7000020700, 7, 702, 70201, 7000020700, 'G. Employee Compensation Subcont'),
(7010020200, 7, 702, 70202, 7010020200, 'G. Welfare Labor Insurance'),
(7010020400, 7, 702, 70202, 7010020400, 'G. Welfare Sport'),
(7010020500, 7, 702, 70202, 7010020500, 'G. Welfare Celebration'),
(7010020600, 7, 702, 70202, 7010020600, 'G. Welfare Medical'),
(7010020700, 7, 702, 70202, 7010020700, 'G. Welfare Hospital'),
(7010020800, 7, 702, 70202, 7010020800, 'G. Welfare Solidarity and Condolence'),
(7010020900, 7, 702, 70202, 7010020900, 'G. Welfare Labor Meal'),
(7010021000, 7, 702, 70202, 7010021000, 'G. Welfare Non Labor Meal'),
(7010029900, 7, 702, 70202, 7010029900, 'G. Welfare Others'),
(7020000000, 7, 702, 70210, 7020000000, 'G. Uniform'),
(7030000000, 7, 702, 70205, 7030000000, 'G. Training and Education'),
(7040000000, 7, 702, 70202, 7040000000, 'Astek'),
(7040020100, 7, 702, 70202, 7040020100, 'G. Jamsostek'),
(7050000000, 7, 702, 70206, 7050000000, 'G. Recruitment'),
(7060000000, 7, 702, 70215, 7060000000, 'G. Donations'),
(7080010100, 7, 701, 70101, 7080010100, 'S. Representation'),
(7080020100, 7, 702, 70101, 7080020100, 'G. Representation'),
(7090010100, 7, 701, 70101, 7090010100, 'S. Entertainment'),
(7090020100, 7, 702, 70101, 7090020100, 'G. Entertainment'),
(7100010100, 7, 701, 70102, 7100010100, 'S. Travelling - Ticket and Transportati'),
(7100010200, 7, 701, 70102, 7100010200, 'S. Travelling - Hotel'),
(7100010300, 7, 701, 70102, 7100010300, 'S. Travelling - UPD'),
(7100020100, 7, 702, 70102, 7100020100, 'G. Travelling - Ticket and Transportati'),
(7100020200, 7, 702, 70102, 7100020200, 'G. Travelling - Hotel'),
(7100020300, 7, 702, 70102, 7100020300, 'G. Travelling - UPD'),
(7120010100, 7, 701, 70103, 7120010100, 'S. Promotion - Material and Gift'),
(7120010200, 7, 701, 70103, 7120010200, 'S. Promotion Exhibition'),
(7120010300, 7, 701, 70103, 7120010300, 'S. Promotion Advertisement'),
(7120010400, 7, 701, 70103, 7120010400, 'S. Promotion Sponsorship'),
(7120010500, 7, 701, 70103, 7120010500, 'S. Promotion Others'),
(7120010600, 7, 701, 70103, 7120010600, 'S. Membership'),
(7130020100, 7, 702, 70207, 7130020100, 'G. RM Building'),
(7130020500, 7, 702, 70207, 7130020500, 'G. RM Office IT'),
(7140000000, 7, 702, 70208, 7140000000, 'G. Fuel and Lubricant'),
(7140000100, 7, 702, 70208, 7140000100, 'G. Tol & Park'),
(7150000000, 7, 702, 70209, 7150000000, 'Tools and Equipment Expenses'),
(7160000000, 7, 702, 60103, 7160000000, 'Depreciation of Fixed Assets'),
(7170110000, 7, 702, 70212, 7170110000, 'Amortizations of Software Acquired Before 2007'),
(7170120000, 7, 702, 70212, 7170120000, 'Amortizations of Def. Land Cost'),
(7170160000, 7, 702, 70212, 7170160000, 'Amortizations of Software Acquired 2007 Onwards'),
(7170170000, 7, 702, 70212, 7170170000, 'Amortizations Other'),
(7200010100, 7, 701, 70104, 7200010100, 'S. Comm. Telephone'),
(7200020100, 7, 702, 70104, 7200020100, 'G. Comm Telephone'),
(7200020200, 7, 702, 70104, 7200020200, 'G. Comm Post Office'),
(7200020300, 7, 702, 70104, 7200020300, 'G. Comm Internet Modem'),
(7210000100, 7, 702, 70214, 7210000100, 'G. Stationary Photocopy'),
(7210000200, 7, 702, 70214, 7210000200, 'G. Stationary ATK'),
(7210000300, 7, 702, 70214, 7210000300, 'G. Stationary Printing'),
(7210000400, 7, 702, 70214, 7210000400, 'G. Stationary Magazine'),
(7210000500, 7, 702, 70214, 7210000500, 'G. Stationary Tech Drawing'),
(7210000600, 7, 702, 70214, 7210000600, 'G. Stationary Others'),
(7230000001, 7, 702, 70216, 7230000001, 'Professional Fees - Affco'),
(7230000002, 7, 702, 70216, 7230000002, 'G. Professional Fees - 3rd Parties'),
(7270110100, 7, 702, 70217, 7270110100, 'G. Taxes & Licences - PBB & Pjk'),
(7270110200, 7, 702, 70217, 7270110200, 'G. Taxes & Licences - STNK'),
(7270110300, 7, 702, 70217, 7270110300, 'G. Taxes & Licences - Import'),
(7270120400, 7, 702, 70217, 7270120400, 'G. Taxes & Licences - Others'),
(7280000000, 7, 702, 70219, 7280000000, 'G. Bank Charges - Bank Transfer'),
(7290000001, 7, 702, 70218, 7290000001, 'Rent Expense - Affco'),
(7290000002, 7, 702, 70218, 7290000002, 'Rent Expense - 3rd Parties'),
(7300000101, 7, 702, 60204, 7300000101, 'Insurance  Inventory - Affco & Relpar'),
(7300000102, 7, 702, 60204, 7300000102, 'Insurance  Inventory - 3rd Parties'),
(7300000201, 7, 702, 60204, 7300000201, 'Insurance Building - Affco & Relpar'),
(7300000202, 7, 702, 60204, 7300000202, 'G. Insurance Building - 3rd Parties'),
(7300000301, 7, 702, 60204, 7300000301, 'Insurance Transport Eqp - Affco & Relpar'),
(7300000302, 7, 702, 60204, 7300000302, 'G. Insurance Transport Eqp - 3rd Parties'),
(7310000000, 7, 702, 70223, 7310000000, 'G. Security Services'),
(7330000100, 7, 702, 70222, 7330000100, 'After Sales Service - Travelling'),
(7330000200, 7, 702, 70222, 7330000200, 'After Sales Service - Warranty'),
(7330000300, 7, 702, 70222, 7330000300, 'After Sales Service - Shipping'),
(7340110000, 7, 702, 70220, 7340110000, 'Prov.For Doubtful Account - Trade - Addition'),
(7340120000, 7, 702, 70220, 7340120000, 'Prov.For Doubtful Account - Trade - Recovery'),
(7400110000, 7, 702, 70224, 7400110000, 'Pension Fund - Defined Benefit Plan'),
(7400120000, 7, 702, 70224, 7400120000, 'Pension Fund - Defined Contribution Plan'),
(7430120000, 7, 702, 70225, 7430120000, 'Employee Benefit Non Cash - Pension'),
(7970000100, 7, 702, 70226, 7970000100, 'G. Meeting Expenses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `account_gl_posting`
--

CREATE TABLE IF NOT EXISTS `account_gl_posting` (
  `id_gl_posting` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_account_gl` bigint(20) NOT NULL,
  `pair_number` int(11) NOT NULL,
  `posting_date` date NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `drcr` set('Dr','Cr') NOT NULL,
  `ref` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gl_posting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agency_item`
--

CREATE TABLE IF NOT EXISTS `agency_item` (
  `id_agency_item` int(11) NOT NULL AUTO_INCREMENT,
  `agency_item` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `id_po_category` int(11) NOT NULL,
  `id_account_gl` int(11) NOT NULL,
  PRIMARY KEY (`id_agency_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `agency_item`
--

INSERT INTO `agency_item` (`id_agency_item`, `agency_item`, `description`, `id_po_category`, `id_account_gl`) VALUES
(1, 'SK Perwira', '', 0, 2147483647),
(2, 'Kesehatan Karantina & Syahbandar', '', 0, 2147483647),
(3, 'Pemeriksaan Fisik Kapal Syarat Penerbitan SPB', '', 0, 2147483647),
(4, 'Antar Dokumen & Pengecekan TB/BG', '', 0, 2147483647),
(5, 'SBNP/Uang Rambu', '', 0, 2147483647),
(6, 'PUP', '', 0, 2147483647),
(7, 'Perhitungan & Nota Tagihan Jasa Kapal', '', 0, 2147483647),
(8, 'Kompensasi Overdraft', '', 0, 2147483647),
(9, 'Dokumen Crew', 'Sijil On/Off, Sign On/Off, PKL', 0, 2147483647),
(10, 'Disp Sertifikat', '', 0, 2147483647),
(11, 'Operasional Syahbandar', '', 0, 2147483647),
(12, 'Nota PELINDO', '', 0, 2147483647),
(13, 'Premi Pandu Alam', '', 0, 2147483647),
(14, 'Pengawalan Alur PAM Swakarsa', '', 0, 2147483647),
(15, 'Biaya Lepas Tambat ', '', 0, 2147483647),
(16, 'Biaya Jaga TB/BG', '', 0, 2147483647),
(17, 'Assist Tug', '', 0, 2147483647),
(18, 'Jasa Layanan Keagenan', '', 0, 2147483647),
(19, 'Persetujuan Pergerakan Kapal DI Port Loading', '', 0, 2147483647),
(20, 'Persetujuan Pergerakan Kapal DI Port Unloading', '', 0, 2147483647),
(21, 'Surat Ijin pemuatan&keberangkatan', '', 0, 2147483647),
(22, 'Biaya Mooring DI Port Loading', '', 0, 2147483647),
(23, 'Biaya Mooring DI Port Unloading', '', 0, 2147483647),
(24, 'PNBP', '', 0, 2147483647),
(25, 'Izin Bongkar', '', 0, 2147483647),
(26, 'Izin Bongkar Muat Barang Khusus', '', 0, 2147483647),
(27, 'SPB', '', 0, 2147483647),
(28, 'Izin shifting', '', 0, 2147483647),
(29, 'Izin Perwira', '', 0, 2147483647),
(30, 'Tersus', '', 0, 2147483647),
(31, 'PUP & Administrasi SK Perwira', '', 0, 2147483647),
(32, 'Taktis Operasional Kelaikan Kapal', '', 0, 2147483647),
(33, 'Inspeksi Karantina ke Kapal', '', 0, 2147483647),
(34, 'Surat Izin Berlayar Sungai & Danau', '', 0, 2147483647),
(35, 'Surat bukti Kapal Laut Masuk Pedalaman', '', 0, 2147483647),
(36, ' SIB Kapal', '', 0, 2147483647),
(37, 'Surat Izin Menunda', '', 0, 2147483647),
(38, 'Surat Keterangan Perwira', '', 0, 2147483647),
(39, 'Keamanan Lepas tambat', '', 0, 2147483647),
(40, 'Daftar Penumpang', '', 0, 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('ADM', 'admin', '', ''),
('ADM', 'adminbandung', '', ''),
('ADM', 'adminpml', '', ''),
('ADM', 'sinung', '', ''),
('CCT', 'costcontroltester', '', ''),
('CUS', 'megasuryauser', '', ''),
('CUS', 'pttuah_user', '', ''),
('HOPR', 'headoperationtester', '', ''),
('MKT', 'marketingtest', '', ''),
('NAU', 'nauticaltester', '', ''),
('VPC', 'vpctester', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('ADM', 0, 'Administrator', '', ''),
('CCT', 0, 'Cost Control', NULL, ''),
('CRS', 0, 'Crewing', NULL, ''),
('CUS', 0, 'Customer User', NULL, NULL),
('FCT', 0, 'Fuel Control', NULL, ''),
('FIC', 0, 'Finance ', NULL, ''),
('HEA', 0, 'Board of Leaders', NULL, ''),
('HOPR', 0, 'Operational Dept.Head', NULL, ''),
('MKT', 0, 'Marketing', NULL, ''),
('NAU', 0, 'Nautical', NULL, ''),
('PRO', 0, 'Procurement', NULL, ''),
('SOA', 0, 'Site OPR Adm', NULL, ''),
('TEC', 0, 'Technical', NULL, ''),
('VPC', 0, 'Voyage Planning Control', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_account`
--

CREATE TABLE IF NOT EXISTS `bank_account` (
  `id_bank_account` int(11) NOT NULL AUTO_INCREMENT,
  `BankName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BranchAddress` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BankCity` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountNumber` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `Currency` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `id_currency` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_bank_account`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bom`
--

CREATE TABLE IF NOT EXISTS `bom` (
  `id_bom` int(11) NOT NULL AUTO_INCREMENT,
  `bom_name` varchar(250) DEFAULT NULL,
  `description` text NOT NULL,
  `id_part_root` bigint(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `brokerage_item`
--

CREATE TABLE IF NOT EXISTS `brokerage_item` (
  `id_brokerage_item` int(11) NOT NULL AUTO_INCREMENT,
  `brokerage_item` varchar(250) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_brokerage_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `brokerage_item`
--

INSERT INTO `brokerage_item` (`id_brokerage_item`, `brokerage_item`, `description`) VALUES
(1, 'Commission Fee', ''),
(2, 'Legal Fee', ''),
(3, 'Vehicle Fee', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bussiness_type_order`
--

CREATE TABLE IF NOT EXISTS `bussiness_type_order` (
  `id_bussiness_type_order` int(11) NOT NULL,
  `bussiness_type_order` varchar(100) NOT NULL,
  `visible` int(1) NOT NULL,
  PRIMARY KEY (`id_bussiness_type_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bussiness_type_order`
--

INSERT INTO `bussiness_type_order` (`id_bussiness_type_order`, `bussiness_type_order`, `visible`) VALUES
(100, 'BARGING-PORT TO PORT', 1),
(200, 'BARGING-TRANSHIPMENT', 1),
(300, 'TIME CHARTER', 1),
(400, 'OIL AND GAS', 0),
(500, 'CEMENT', 0),
(600, 'NON COAL', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `certificate_level`
--

CREATE TABLE IF NOT EXISTS `certificate_level` (
  `id_certificate` int(11) NOT NULL AUTO_INCREMENT,
  `certiface_level` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  PRIMARY KEY (`id_certificate`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `certificate_level`
--

INSERT INTO `certificate_level` (`id_certificate`, `certiface_level`, `keterangan`) VALUES
(11, 'ATT I', 'Technical Level I'),
(12, 'ATT II', 'Technical Level III'),
(13, 'ATT III', 'Technical Level III'),
(14, 'ATT IV', 'Technical Level IV'),
(15, 'ATT V', 'Technical Level V'),
(16, 'ATT D', 'Technical Level Dasar'),
(21, 'ANT I', 'Nautical Level I'),
(22, 'ANT II', 'Nautical Level III'),
(23, 'ANT III', 'Nautical Level III'),
(24, 'ANT IV', 'Nautical Level IV'),
(25, 'ANT V', 'Nautical Level V'),
(26, 'ANT D', 'Nautical Level Dasar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `consumable_stock_item`
--

CREATE TABLE IF NOT EXISTS `consumable_stock_item` (
  `id_consumable_stock_item` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_po_category` int(11) NOT NULL,
  `consumable_stock_category` set('ENGINE','DECK','EHS') NOT NULL,
  `consumable_stock_item` varchar(250) NOT NULL,
  `parent_level1` varchar(250) NOT NULL,
  `parent_level2` varchar(250) NOT NULL,
  `parent_level3` varchar(250) NOT NULL,
  `serial_number` varchar(150) NOT NULL,
  `description` varchar(800) NOT NULL,
  `estimated_unit_price` double(20,2) NOT NULL,
  `metric` varchar(20) NOT NULL,
  `category` set('PART','CS','ASSET') NOT NULL,
  `impa` varchar(200) NOT NULL,
  PRIMARY KEY (`id_consumable_stock_item`),
  KEY `id_po_category` (`id_po_category`),
  KEY `consumable_stock_category` (`consumable_stock_category`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=300014 ;

--
-- Dumping data untuk tabel `consumable_stock_item`
--

INSERT INTO `consumable_stock_item` (`id_consumable_stock_item`, `id_po_category`, `consumable_stock_category`, `consumable_stock_item`, `parent_level1`, `parent_level2`, `parent_level3`, `serial_number`, `description`, `estimated_unit_price`, `metric`, `category`, `impa`) VALUES
(100001, 10401, 'ENGINE', 'Cooler', 'Main Engine', 'FW Cooling System', '', '748660-44801', 'sd', 0.00, 'set', 'CS', 'as'),
(100002, 10401, 'ENGINE', 'FW Cooling Pump', 'Main Engine', 'FW Cooling System', '', '748660-43010', 'asda', 0.00, 'set', 'CS', ''),
(100003, 10401, 'ENGINE', 'SW Cooling Pump', 'Main Engine', 'SW Cooling System', '', '748660-42011', '', 0.00, 'set', 'CS', ''),
(100004, 10401, 'ENGINE', 'V belt', 'Main Engine', 'SW Cooling System', '', '', '', 0.00, 'set', 'CS', ''),
(100005, 10401, 'ENGINE', 'Zinc Anode', 'Main Engine', 'SW Cooling System', '', '', '', 0.00, 'set', 'CS', ''),
(100006, 10401, 'ENGINE', 'Impeller Rubber', 'Main Engine', 'SW Cooling System', '', '148018-42030', '', 0.00, 'set', 'CS', ''),
(100007, 10401, 'ENGINE', 'LO Filter', 'Main Engine', 'Lub System', '', 'Donaldson P502081', '', 0.00, 'set', 'CS', ''),
(100008, 10401, 'ENGINE', 'LO Pump', 'Main Engine', 'Lub System', '', '', '', 0.00, 'set', 'CS', ''),
(100009, 10401, 'ENGINE', 'Racor Filter', 'Main Engine', 'Fuel System', '', '', '', 0.00, 'set', 'CS', ''),
(100010, 10401, 'ENGINE', 'Fuel Filter', 'Main Engine', 'Fuel System', '', 'Trust 41650-5501140', '', 0.00, 'set', 'CS', ''),
(100011, 10401, 'ENGINE', 'Fuel Strainer', 'Main Engine', 'Fuel System', '', '', '', 0.00, 'set', 'CS', ''),
(100012, 10401, 'ENGINE', 'Fuel Injection Pump', 'Main Engine', 'Fuel System', '', '748691-51300', '', 0.00, 'set', 'CS', ''),
(100013, 10401, 'ENGINE', 'Injector Nozzle ', 'Main Engine', 'Fuel System', '', '148691-53000', '', 0.00, 'set', 'CS', ''),
(100014, 10401, 'ENGINE', 'Quick Closing Valve', 'Main Engine', 'Fuel System', '', '', '', 0.00, 'set', 'CS', ''),
(100015, 10401, 'ENGINE', 'Turbin', 'Main Engine', 'Turbocharger', '', '', '', 0.00, 'set', 'CS', ''),
(100016, 10401, 'ENGINE', 'Accu 200A', 'Main Engine', 'Starting system', '', '', '', 0.00, 'set', 'CS', ''),
(100017, 10401, 'ENGINE', 'Starting Motor', 'Main Engine', 'Starting system', '', '148620-77020', '', 0.00, 'set', 'CS', ''),
(100018, 10401, 'ENGINE', 'Exhaust Manifold', 'Main Engine', 'Exhaust System', '', '', '', 0.00, 'set', 'CS', ''),
(100019, 10401, 'ENGINE', 'Silencer', 'Main Engine', 'Exhaust System', '', '', '', 0.00, 'set', 'CS', ''),
(100020, 10401, 'ENGINE', 'Cooler', 'Generator', 'Cooling system', '', '', '', 0.00, 'set', 'CS', ''),
(100021, 10401, 'ENGINE', 'Water Coolant', 'Generator', 'Cooling system', '', '', '', 0.00, 'set', 'CS', ''),
(100022, 10401, 'ENGINE', 'Temperature Indicator', 'Generator', 'Cooling system', '', '', '', 0.00, 'set', 'CS', ''),
(100023, 10401, 'ENGINE', 'Temperature Sensor', 'Generator', 'Cooling system', '', 'C3967250', '', 0.00, 'set', 'CS', ''),
(100024, 10401, 'ENGINE', 'LO filter', 'Generator', 'Lub System', '', 'Fleetguard LF 3345', '', 0.00, 'set', 'CS', ''),
(100025, 10401, 'ENGINE', 'LO pressure Indicator', 'Generator', 'Lub System', '', '', '', 0.00, 'set', 'CS', ''),
(100026, 10401, 'ENGINE', 'LO pressure sensor', 'Generator', 'Lub System', '', 'C3967251', '', 0.00, 'set', 'CS', ''),
(100027, 10401, 'ENGINE', 'Fuel Strainer', 'Generator', 'Fuel System', '', 'Fleetguard FS 1260', '', 0.00, 'set', 'CS', ''),
(100028, 10401, 'ENGINE', 'Fuel Filter', 'Generator', 'Fuel System', '', 'Fleetguard  FF 5052', '', 0.00, 'set', 'CS', ''),
(100029, 10401, 'ENGINE', 'Fuel Injection Pump', 'Generator', 'Fuel System', '', 'C4939772', '', 0.00, 'set', 'CS', ''),
(100030, 10401, 'ENGINE', 'Speed Sensor', 'Generator', 'Fuel System', '', 'Z3900354', '', 0.00, 'set', 'CS', ''),
(100031, 10401, 'ENGINE', 'Accu 150A', 'Generator', 'Starting system', '', '', '', 0.00, 'set', 'CS', ''),
(100032, 10401, 'ENGINE', 'Dinamo Stater ', 'Generator', 'Starting system', '', '', '', 0.00, 'set', 'CS', ''),
(100033, 10401, 'ENGINE', 'Exhaust system', 'Generator', '', '', '', '', 0.00, 'set', 'CS', ''),
(100034, 10401, 'ENGINE', 'Ballast Pumps', 'Pumps ', '', '', '', '', 0.00, 'set', 'CS', ''),
(100035, 10401, 'ENGINE', 'Bilge Pumps', 'Pumps ', '', '', '', '', 0.00, 'set', 'CS', ''),
(100036, 10401, 'ENGINE', 'Fire Pump', 'Pumps ', '', '', '', '', 0.00, 'set', 'CS', ''),
(100037, 10401, 'ENGINE', 'Emergency pump', 'Pumps ', '', '', '', '', 0.00, 'set', 'CS', ''),
(100038, 10401, 'ENGINE', 'FW domestic pump', 'Pumps ', '', '', '', '', 0.00, 'set', 'CS', ''),
(100039, 10401, 'ENGINE', 'FO transfer Pump', 'Pumps ', '', '', '', '', 0.00, 'set', 'CS', ''),
(100040, 10401, 'ENGINE', 'General Service Pump', 'Pumps ', '', '', '', '', 0.00, 'set', 'CS', ''),
(100041, 10401, 'ENGINE', 'Main Switch Board', 'Others', '', '', '', '', 0.00, 'set', 'CS', ''),
(100042, 10401, 'ENGINE', 'Fuse 2A  ceramic', 'Others', 'Main Switch Board', '', '', '', 0.00, 'set', 'CS', ''),
(100043, 10401, 'ENGINE', 'Fuse 10A ceramic', 'Others', 'Main Switch Board', '', '', '', 0.00, 'set', 'CS', ''),
(100044, 10401, 'ENGINE', 'Voltmeter', 'Others', 'Main Switch Board', '', '', '', 0.00, 'set', 'CS', ''),
(100045, 10401, 'ENGINE', 'Oily Water Separator', 'Others', '', '', '', '', 0.00, 'set', 'CS', ''),
(200001, 10402, 'DECK', 'STOCKLESS ANCHOR ', 'ANCHOR HANDLING SYSTEM', '', '', '090102, 090152', 'TYPE OF MARKING : WH09P00227_19, WH09P00272_30', 0.00, 'set', 'CS', ''),
(200002, 10402, 'DECK', 'ANCHOR CHAIN (GRADE U2)', 'ANCHOR HANDLING SYSTEM', '', '', '', 'MODEL:19 mm | SWL (KN) PROOF LOAD (KN):150 KN | QUANTITY :10 LENGTHS', 0.00, 'set', 'CS', ''),
(200003, 10402, 'DECK', 'HYDRAULIC ANCHOR WINDLASS', 'ANCHOR HANDLING SYSTEM', '', '', 'AWD-HY 8786', 'MODEL:HY AWD 480 | GYSY:19.0 MM U2 | NOMINAL PUUL :2.0 TONS (19.6 KN) | OVERLOAD PULL:2.6 TONS (25.5 KN) | POWER PACK:7.5 HP (5.6 KW), SINGLE ELECTRIC MOTOR', 0.00, 'set', 'CS', ''),
(200004, 10402, 'DECK', 'LAMPU NAVIGASI', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200005, 10402, 'DECK', 'SEARCH LIGHT', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200006, 10402, 'DECK', 'DAIKO TABLE MAGNETIC COMPASS', 'NAVIGASI DAN KOMUNIKASI', '', '', '5743', 'MODEL : T-150B', 0.00, 'set', 'CS', ''),
(200007, 10402, 'DECK', 'ICOM SSB RADIO IC-M710', 'NAVIGASI DAN KOMUNIKASI', '', '', '2115060', '', 0.00, 'set', 'CS', ''),
(200008, 10402, 'DECK', 'ICOM VHF RADIO IC-M304', 'NAVIGASI DAN KOMUNIKASI', '', '', '135977', '', 0.00, 'set', 'CS', ''),
(200009, 10402, 'DECK', 'FURUNO GPS NAVIGATOR GP-32', 'NAVIGASI DAN KOMUNIKASI', '', '', '135977', '', 0.00, 'set', 'CS', ''),
(200010, 10402, 'DECK', 'FURUNO RADAR 1715MKII (24NM)', 'NAVIGASI DAN KOMUNIKASI', '', '', '4361-2666', '', 0.00, 'set', 'CS', ''),
(200011, 10402, 'DECK', 'FURUNO ECHO SOUNDER FCV-620', 'NAVIGASI DAN KOMUNIKASI', '', '', '8062-9678', '', 0.00, 'set', 'CS', ''),
(200012, 10402, 'DECK', 'PUBLIC ADDRES', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200013, 10402, 'DECK', 'ICOM WALKIE TALKIE IC-M34', 'NAVIGASI DAN KOMUNIKASI', '', '', '0222734, 0222735', '', 0.00, 'set', 'CS', ''),
(200014, 10402, 'DECK', 'INCLINOMETER', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200015, 10402, 'DECK', 'INTERCOM', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200016, 10402, 'DECK', 'SAMYUNG EPIRB SEP-406', 'NAVIGASI DAN KOMUNIKASI', '', '', '9C00265', '', 0.00, 'set', 'CS', ''),
(200017, 10402, 'DECK', 'MARCO AIM HORN MODEL 5423', 'NAVIGASI DAN KOMUNIKASI', '', '', '7P3784', '', 0.00, 'set', 'CS', ''),
(200018, 10402, 'DECK', 'EMERGENCY LIGHT', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200019, 10402, 'DECK', 'AUTONICS SHAFT TACHOMETER C/W SENSORS', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200020, 10402, 'DECK', 'TOKYO SPARE COMPASS 970-C', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200021, 10402, 'DECK', 'BAROMETER', 'NAVIGASI DAN KOMUNIKASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200022, 10402, 'DECK', 'CABIN CREW', 'AKOMODASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200023, 10402, 'DECK', 'MESS ROOM', 'AKOMODASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200024, 10402, 'DECK', 'PANTRY', 'AKOMODASI', '', '', '', '', 0.00, 'set', 'CS', ''),
(200025, 10402, 'DECK', 'TOWING HOOK', 'TOWING SYSTEM', '', '', 'K25 - 090495', 'MODEL : KS - 25T', 0.00, 'set', 'CS', ''),
(200026, 10402, 'DECK', 'ANTIFOULING', 'LAMBUNG', '', '', '', 'MERK:SIGMA | JENIS:SIGMA ECOFLEET 238', 0.00, 'set', 'CS', ''),
(300001, 10403, 'EHS', 'HYDROSTATIC RELASE UNITS', 'SAFETY EQUIPMENT', '', '', '', '', 0.00, 'set', 'CS', ''),
(300002, 10403, 'EHS', 'LIFE SAVING APPLIANCES', 'SAFETY EQUIPMENT', '', '', '', '', 0.00, 'set', 'CS', ''),
(300003, 10403, 'EHS', 'INFLATABLE LIFERAFT', 'SAFETY EQUIPMENT', '', '', '3798, 3764', 'MODEL: KHA-10 | NO. of APPROVAL:SH06T00045_02', 0.00, 'set', 'CS', ''),
(300004, 10403, 'EHS', 'PASSIVE PRESSURE FIRE AIR BREATHER', 'SAFETY EQUIPMENT', '', '', '106151-106290.', '', 0.00, 'set', 'CS', ''),
(300005, 10403, 'EHS', 'LIFEBUOY SELF IGNITING LIGHT AND SELF ACTIVATING SMOKE SIGNAL', 'SAFETY EQUIPMENT', '', '', '', '', 0.00, 'set', 'CS', ''),
(300006, 10403, 'EHS', 'HAND FLARES', 'SAFETY EQUIPMENT', '', '', '', '', 0.00, 'set', 'CS', ''),
(300007, 10403, 'EHS', 'PROTECTIVE CLOTHING', 'SAFETY EQUIPMENT', '', '', '', '', 0.00, 'set', 'CS', ''),
(300008, 10403, 'EHS', 'WORK LIFE JACKET FOR SHIP', 'SAFETY EQUIPMENT', '', '', '', '', 0.00, 'set', 'CS', ''),
(300009, 10403, 'EHS', 'ROCKET PARACHUTE FLARES', 'SAFETY EQUIPMENT', '', '', '', '', 0.00, 'set', 'CS', ''),
(300010, 10403, 'EHS', 'FIRE EXTINGUISHER', 'SAFETY EQUIPMENT', '', '', '', '', 0.00, 'set', 'CS', ''),
(300011, 0, 'ENGINE', 'Bla Bla', '', '', '', '4000', 'Bagus', 4500000.00, '12', 'CS', ''),
(300012, 0, 'ENGINE', 'asd', '', '', '', 'a', 'asda', 12.00, 'set', 'CS', ''),
(300013, 0, 'ENGINE', 'asd', '', '', '', 'asdas', 'asdasdasdas', 12.00, '12', 'CS', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost_item_actual`
--

CREATE TABLE IF NOT EXISTS `cost_item_actual` (
  `id_cost_item_actual` int(11) NOT NULL AUTO_INCREMENT,
  `id_cost_item_standard` int(11) NOT NULL,
  `cost_item` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id_cost_item_actual`),
  KEY `id_cost_item_standard` (`id_cost_item_standard`),
  KEY `cost_item` (`cost_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73056 ;

--
-- Dumping data untuk tabel `cost_item_actual`
--

INSERT INTO `cost_item_actual` (`id_cost_item_actual`, `id_cost_item_standard`, `cost_item`, `is_active`) VALUES
(1010, 1010, 'Fuel Cost', 1),
(1020, 1020, 'Agency Cost', 1),
(1030, 1030, 'Crew Cost', 1),
(1040, 1040, 'Crew Subcont Cost', 1),
(1070, 1040, 'Fuel Incentive', 1),
(1080, 1040, 'EHS Incentive', 1),
(2010, 2010, 'Depreciation Cost', 1),
(2020, 2020, 'Rent Cost', 1),
(2030, 2030, 'Insurance Cost', 1),
(2040, 2040, 'Repair Cost', 1),
(2050, 2050, 'Docking Cost', 1),
(2060, 2060, 'Brokerage Cost', 1),
(3050, 3010, 'Consumable Stock', 1),
(3080, 3010, 'Fresh Water', 1),
(9001, 9001, 'Cycle Time', 1),
(9002, 9002, 'Fuel Consumpt', 1),
(71020, 1020, 'S - Agency Cost Standard', 1),
(71030, 1030, 'S - Daily Crew Cost Standard', 1),
(71040, 1040, 'S - Daily Crew Subcont Cost Standard', 1),
(72010, 2010, 'S - Depreciation Cost', 1),
(72020, 2020, 'S - Rent Cost', 1),
(72030, 2030, 'S - Insurance Cost', 1),
(72050, 2050, 'S - Docking Cost', 1),
(73055, 9001, 'S - Cycle Time', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost_item_standard`
--

CREATE TABLE IF NOT EXISTS `cost_item_standard` (
  `id_cost_item_standard` int(11) NOT NULL AUTO_INCREMENT,
  `cost_item` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cost_item_standard`),
  KEY `cost_item` (`cost_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3011 ;

--
-- Dumping data untuk tabel `cost_item_standard`
--

INSERT INTO `cost_item_standard` (`id_cost_item_standard`, `cost_item`, `is_active`) VALUES
(1, 'Cycle Time', 1),
(2, 'Fuel Consumpt', 1),
(3, 'Fuel Price', 1),
(4, 'USD Change Rate', 1),
(5, 'SGD Change Rate', 1),
(1010, 'Fuel Actual Cost', 1),
(1020, 'Agency Cost', 1),
(1030, 'Crew Cost', 1),
(1040, 'Crew Subcont Cost', 1),
(2010, 'Depreciation Cost', 1),
(2020, 'Rent Cost', 1),
(2030, 'Insurance Cost', 1),
(2040, 'Repair Cost', 1),
(2050, 'Docking Cost', 1),
(2060, 'Brokerage Cost', 1),
(3010, 'Other Cost', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpanel_leftmenu`
--

CREATE TABLE IF NOT EXISTS `cpanel_leftmenu` (
  `id_leftmenu` int(11) NOT NULL,
  `id_parent_leftmenu` int(11) NOT NULL,
  `has_child` int(1) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `value_indo` varchar(250) NOT NULL,
  `value_eng` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `auth` text NOT NULL,
  PRIMARY KEY (`id_leftmenu`),
  KEY `visible` (`visible`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cpanel_leftmenu`
--

INSERT INTO `cpanel_leftmenu` (`id_leftmenu`, `id_parent_leftmenu`, `has_child`, `menu_name`, `menu_icon`, `value_indo`, `value_eng`, `url`, `visible`, `auth`) VALUES
(10000, 0, 1, 'Master Data', 'db', 'Data Master', 'Master Data', 'master', 1, 'ADM'),
(10001, 10000, 0, 'User', 'user', 'Pengguna', 'User', 'master/masusers', 1, 'ADM'),
(10002, 10000, 0, 'User Level Access', 'posisi', 'Level Akses', 'User Level Access', 'master/maslev', 1, 'ADM'),
(11000, 0, 1, 'Entity', 'retweet', 'Entitas', 'Entity', 'entity', 1, 'ADM, MKT, OPR, VPC'),
(11001, 11000, 0, 'Vessel', 'vessel', 'Vessel', 'Vessel', 'entity/entivess', 1, 'ADM, MKT, OPR, VPC'),
(11002, 11000, 0, 'MotherVessel', 'mother', 'MotherVessel', 'MotherVessel', 'entity/entimother', 1, 'ADM, MKT, OPR, VPC'),
(11003, 11000, 0, 'Port', 'jetty', 'Port', 'Port', 'entity/entijet', 1, 'ADM, MKT, OPR, VPC'),
(12000, 0, 1, 'Customer, Vendor', 'vendor', 'Customer & Vendor', 'Customer, Vendor', 'custvend', 1, 'ADM, MKT, OPR'),
(12001, 12000, 0, 'Customer', 'user', 'Customer', 'Customer', 'custvend/cust', 1, 'ADM, MKT, OPR'),
(12002, 12000, 0, 'Vendor', 'build', 'Vendor', 'Vendor', 'custvend/vend', 1, 'ADM, MKT, OPR'),
(12003, 12000, 0, 'Vendor Classification', 'retweet', 'Klasifikasi Vendor', 'Vendor Classification', 'custvend/klas', 1, 'ADM, MKT, OPR'),
(13000, 0, 1, 'Customer Zone', 'flag', 'Zona Pelanggan', 'Customer Zone', 'zone', 1, 'ADM, CUS, MKT'),
(13001, 13000, 0, 'Reservation Inquiry', 'list-alt', 'Cek Ketersediaan', 'Reservation Inquiry', 'reservationinquiry/checkavailable', 1, 'CUS'),
(13002, 13000, 0, 'Freight Calculator', 'chart', 'Kalkulator Biaya', 'Freight Calculator', 'demand/caculat', 1, 'CUS'),
(13003, 13000, 0, 'Customer Voice', 'comment', 'Kritik & Saran', 'Customer Voice', 'customerVoice/createcustomer', 1, 'CUS'),
(13004, 13000, 0, 'Order Tracking', 'stat', 'Monitoring Order', 'Order Tracking', 'customerzone/customerordertracking', 1, 'CUS'),
(13005, 13000, 0, 'Manage Customer Voice', 'bullhorn', 'Kelola Kritik & Saran', 'Manage Customer Voice', 'zone/voice', 1, 'ADM, MKT'),
(13006, 13000, 0, 'User Of Customer', 'vendor', 'Pengguna Pelanggan', 'User Of Customer', 'zone/masuserof', 1, 'ADM, MKT'),
(13007, 10000, 0, 'Currency', 'euro', 'Mata Uang', 'Currency', 'master/mascurr', 1, 'ADM'),
(13008, 10000, 0, 'Departement', 'build', 'Departemen', 'Departement', 'master/masdept', 1, 'ADM'),
(13009, 10000, 0, 'Vessel Document', '2file', 'Dokumen Vessel', 'Vessel Document', 'master/masdoc', 1, 'ADM'),
(13010, 10000, 0, 'Certification Level', 'bookmark', 'Certificate Level', 'Certification Level', 'master/mascer', 1, 'ADM'),
(13011, 10000, 0, 'PO Category', 'book', 'PO Kategori', 'PO Category', 'master/maspo', 1, 'ADM'),
(13012, 10000, 0, 'Type of Order', 'list-alt', 'Type Pesanan', 'Type of Order', 'master/mastype', 1, 'ADM'),
(13013, 10000, 0, 'Voyage Activity', 'plane', 'Aktivitas Voyage', 'Voyage Activity', 'master/masvoy', 1, 'ADM'),
(13014, 10000, 0, 'Crew Position', 'useradd', 'Posisi Kru', 'Crew Position', 'master/mascrew', 1, 'ADM'),
(13015, 10000, 0, 'Metric', 'align-left', 'Matrik', 'Metric', 'master/mastric', 1, 'ADM'),
(13016, 10000, 0, 'Metric PR', 'align-right', 'Matrik PR', 'Metric PR', 'master/maspr', 1, 'ADM'),
(13017, 10000, 0, 'Voyage Document', 'file', 'Master Voyage Dokumen', 'Voyage Document', 'master/voydoc', 1, 'ADM'),
(13018, 10000, 0, 'Fuel Transaction Type', 'oil', 'Tipe Transaksi Fuel', 'Fuel Transaction Type', 'master/masfuel', 1, 'ADM'),
(13019, 10000, 0, 'Agency Item', 'order', 'Agen Barang', 'Agency Item', 'master/agen', 1, 'ADM'),
(13020, 10000, 0, 'Brokerage Item', 'posisi', 'Perantara Barang', 'Brokerage Item', 'master/masbrok', 1, 'ADM'),
(13021, 10000, 0, 'Survey Item', 'calendar', 'Survey Item', 'Survey Item', 'master/surveyItem', 1, 'ADM'),
(13022, 10000, 0, 'Rent Item', 'calendar', 'Rent Item', 'Rent Item', 'master/rentItem', 1, 'ADM'),
(13023, 10000, 0, 'Payroll Item', 'share-alt', 'Pembayaran Barang', 'Payroll Item', 'master/masrol', 1, 'ADM'),
(13024, 10000, 0, 'Left Menu', 'list-alt', 'Left Menu', 'Left Menu', 'master/masleft', 1, 'ADM'),
(13025, 10000, 0, 'Vessel Document Validality', '2file', 'Vessel Dokumen Validasi', 'Vessel Document Validality', 'master/valid', 1, 'ADM'),
(13026, 10000, 0, 'Timesheet Summary', 'clock', 'Timesheet Summary', 'Timesheet Summary', 'master/times', 1, 'ADM'),
(13027, 10000, 0, 'Debit Note Category', 'calendar', 'Debit Note Category', 'Debit Note Category', 'master/debit', 1, 'ADM'),
(14000, 0, 1, 'Crew', 'useradd', 'Kru', 'Crew', 'cre', 1, 'ADM, FIC, OPR, CRW'),
(14001, 14000, 0, 'Crew List', 'useradd', 'Daftar Kru', 'Crew List', 'cre/crew', 1, 'ADM, FIC, OPR, CRW'),
(14002, 14000, 0, 'Crew Assignment', 'bookmark', 'Penugasan Kru', 'Crew Assignment', 'cre/listofvessel/mode/sign', 1, 'ADM, CRW'),
(14003, 14000, 0, 'PR Crew', 'book', 'PR Kru', 'PR Crew', '', 0, 'ADM, CRW'),
(21000, 0, 1, 'Manage Demand', 'th-large', 'Kelola Demand', 'Manage Demand', 'demand', 1, 'ADM, MKT'),
(21001, 21000, 0, 'Sales Planning', 'file', 'Perencanaan Master Sales', 'Sales Planning', 'demand/salesplan', 1, 'ADM, MKT'),
(21002, 21000, 0, 'Sales Outlook', 'book', 'Perancanaan Sales Quartal', 'Sales Outlook', 'salesplan/outlook', 1, 'ADM, MKT'),
(21003, 21000, 0, 'Sales Plan Monthly', 'calendar', 'Perencanaan Actual Sales', 'Sales Plan Monthly', 'salesplan/monthly', 1, 'ADM, MKT'),
(21004, 21000, 0, 'Cost Plan Calculator', 'chart', 'Kalkulator Perhitungan Biaya', 'Cost Plan Calculator', 'demand/caculat', 1, 'ADM, MKT'),
(21005, 21000, 0, 'CP Calculator History', 'dollar', 'Standard Harga Penjualan', 'CP Calculator History', 'demand/salescost', 1, 'ADM, MKT'),
(21006, 21000, 0, 'Quotation', 'align-left', 'Penawaran', 'Quotation', 'demand/quo', 1, 'ADM, MKT'),
(21007, 21000, 0, 'Agreement Document', 'certificate', 'Dokumen Kesepakatan', 'Agreement Document', 'spal/admin', 1, 'ADM, MKT'),
(21008, 21000, 0, 'Shipping order', 'order', 'Shipping order', 'Shipping order', 'so/admin', 1, 'ADM, MKT'),
(21009, 21000, 0, 'Customer Rating', 'star', 'Peringkat Customer', 'Customer Rating', 'demand/rating', 1, 'ADM,MKT'),
(22000, 0, 1, 'Vessel Operation Planning', 'random', 'Perencanaan Operasi Vessel', 'Vessel Operation Planning', 'vesopr', 1, 'ADM, OPR, VPC'),
(22001, 22000, 0, 'Master Schedule Plot', 'clock', 'Jadwal Operasi', 'Master Schedule Plot', 'masterschedule/master', 1, 'ADM, OPR, VPC'),
(22002, 22000, 0, 'Voyage order (VO)', 'sign', 'Voyage order', 'Voyage order (VO)', 'voyageorder/propose', 1, 'ADM, OPR'),
(22003, 22000, 0, 'Set Pair', 'plane', 'Set Pasangan Kapal', 'Set Pair', 'settypetugbarge/adminsetpair', 1, 'ADM, OPR, VPC'),
(22004, 22000, 0, 'PR - Rent vessel', 'file', 'Rent vessel requirement', 'PR - Rent vessel', 'purchaserequest/prvessel/mode/rent_vessel', 1, 'ADM, OPR, VPC'),
(22005, 22000, 0, 'Report - Utilization & Availability', 'book', 'Report - Utilization & Availability', 'Report - Utilization & Availability', '', 0, 'ADM, OPR, VPC'),
(22006, 22000, 0, 'Report - Set Pair', '2file', 'Report - Set Pair', 'Report - Set Pair', 'reportsetpair/reportpair', 0, 'ADM, OPR, VPC'),
(22007, 22000, 0, 'On-hire Certificate', 'certificate', 'Penyewaan Kapal', 'On-hire Certificate', '', 0, 'ADM, OPR, VPC'),
(22008, 22000, 0, 'Off-hire', 'book', 'Off Hire', 'Off-hire', 'vesopr/schedule', 0, 'ADM, OPR, VPC'),
(22500, 0, 1, 'Schedule', 'calendar', 'Jadwal Operasi', 'Schedule', 'vesopr', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT'),
(22501, 22500, 0, 'Schedule Viewer', 'clock', 'Jadwal Operasi', 'Schedule Viewer', 'masterschedule/masterviewer', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT'),
(23000, 0, 1, 'Standard Operation', 'tags', 'Standard Operation', 'Standard Operation', '', 1, 'ADM, OPR, CCT'),
(23001, 23000, 0, 'Standard Fuel', 'oil', 'Bahan Bakar Standar', 'Standard Fuel', 'standardfuel/admin', 1, 'ADM, OPR, CCT'),
(23002, 23000, 0, 'Standard Agency', 'plane', 'Agency Standar', 'Standard Agency', 'standardagency/admin', 1, 'ADM, OPR, CCT'),
(23003, 23000, 0, 'Standard Fixed Cost', 'dollar', 'Standard Biaya Kapal', 'Standard Fixed Cost', 'standardvesselcost/admin', 1, 'ADM, OPR, CCT'),
(24000, 0, 1, 'Vessel Preparation', 'bookmark', 'Vessel Preparation', 'Vessel Preparation', '', 1, 'ADM, NAU, CCT, TEC'),
(24001, 24000, 0, 'Crew Readiness', 'book', 'Kesiapan Crew', 'Crew Readiness', 'cre/listofvessel/mode/readiness', 1, 'ADM, NAU'),
(24002, 24000, 0, 'Crew Assignment', 'sign', 'Crew Sign On-Sign Off', 'Crew Assignment', 'cre/listofvessel/mode/sign', 1, 'ADM, NAU'),
(24003, 24000, 0, 'Document Readiness', '2file', 'Kesiapan Dokumen Kapal', 'Document Readiness', 'documentreadines/listofvessel', 1, 'ADM, NAU'),
(24004, 24000, 0, 'PR Fresh Water', 'oil', 'PR Fresh Water', 'PR Fresh Water', 'purchaserequest/prvessel/mode/fresh_water', 1, 'ADM, NAU, CCT'),
(24005, 24000, 0, 'IM Crew Mobilization', 'tong', 'IM Crew Mobilization', 'IM Crew Mobilization', 'purchaserequest/prvessel/mode/crew_mobilization', 1, 'ADM, NAU, CCT'),
(24006, 24000, 0, 'Consumable Stock Item', 'tong', 'Item Keperluan Kapal', 'Consumable Stock Item', 'consumablestockitem/admin', 1, 'ADM, NAU, CCT'),
(24007, 24000, 0, 'PR Cons.Stock, Part, Asset', 'tong', 'PR Cons.Stock, Part, Asset', 'PR Cons.Stock, Part, Asset', 'purchaserequest/prvessel/mode/consumable_stock', 1, 'ADM,  CCT, TEC'),
(24008, 24000, 0, 'GR/GI Cons. Stock', 'wrench', 'Good Receive Cons. Stock', 'GR/GI Cons. Stock', 'goodReceive/admingrcs', 1, 'ADM, TEC'),
(24009, 24000, 0, 'Warehouse', 'tong', 'Warehouse', 'Warehouse', 'warehouse/admin', 1, 'ADM, TEC'),
(25000, 0, 1, 'Voyage Preparation', 'sign', 'Persiapaan Vessel', 'Voyage Preparation', '', 1, 'ADM, NAU, CCT, FCT'),
(25001, 25000, 0, 'VO Standard Cost', 'dollar', 'Cost plan', 'VO Standard Cost', 'vesopr', 0, 'ADM, OPR'),
(25002, 25000, 0, 'PR Agency', 'th-list', 'PR Agency', 'PR Agency', 'voyageorder/prvoyage/mode/agency', 1, 'ADM, CCT'),
(25003, 25000, 0, 'PR Survey Bunker', 'th-list', 'PR Survey Bunker', 'PR Survey Bunker', 'purchaserequest/prvessel/mode/survey_bunker', 1, 'ADM, NAU, FCT'),
(25004, 25000, 0, 'PR Bunkering', 'th-list', 'PR Bunkering', 'PR Bunkering', 'purchaserequest/prvessel/mode/bunkering', 1, 'ADM, NAU, FCT'),
(25005, 25000, 0, 'GR/GI Fuel', 'oil', 'Good Receive Bunkering', 'GR/GI Fuel', 'goodReceive/admingrfuel', 1, 'ADM, NAU, FCT'),
(25006, 25000, 0, 'Sailing Order', 'plane', 'Sailing Order', 'Sailing Order', 'voyageorder/voyageorderlist', 1, 'ADM, NAU'),
(26000, 0, 1, 'Voyage Operation', 'stat', 'Vessel Operation', 'Voyage Operation', '', 1, 'ADM, NAU, FCT, SOA, CCT'),
(26001, 26000, 0, 'Cost Standard & Cost Control', 'stat', 'Pengendalian Biaya', 'Cost Standard & Cost Control', 'costcontrol/adminvo', 1, 'ADM, CCT'),
(26002, 26000, 0, 'Update PR Agency', 'th-list', 'Purchase Requirement', 'Update PR Agency', 'voyageorder/prvoyage/mode/agency', 1, 'ADM, CCT'),
(26003, 26000, 0, 'Fuel ROB', 'oil', 'Fuel Consumption Daily', 'Fuel ROB', 'fuelconsumptiondaily/vesselfuel', 1, 'ADM, FCT'),
(26004, 26000, 0, 'Fuel Consumption Monitoring', 'chart', 'Fuel Consumption Monitoring', 'Fuel Consumption Monitoring', '', 0, 'ADM, FCT'),
(26005, 26000, 0, 'Daily Activity', 'book', 'Aktivitas Harian', 'Daily Activity', 'voyageorder/voyage_timesheet', 1, 'ADM, NAU, SOA'),
(26006, 26000, 0, 'Voyage Closing', 'remove', 'Voyage Closing', 'Voyage Closing', 'voyageorder/close_voyage', 1, 'ADM, NAU, SOA, CCT'),
(27000, 0, 1, 'Purchase Request Approval', 'ok', 'Purchase Request Approval', 'Purchase Request Approval', 'proc', 1, 'ADM, HEA, HOPR'),
(27001, 27000, 0, 'PR Approval Fuel', 'download-alt', 'PR Approval Fuel', 'PR Approval Fuel', 'purchaserequest/adminapproval/mode/fuel', 1, 'ADM, HEA, HOPR '),
(27002, 27000, 0, 'PR Approval Fresh Water', 'download-alt', 'PR Approval Fresh Water', 'PR Approval Fresh Water', 'purchaserequest/adminapproval/mode/fresh_water', 1, 'ADM, HEA, HOPR '),
(27003, 27000, 0, 'PR Approval Agency', 'download-alt', 'PR Approval Agency', 'PR Approval Agency', 'purchaserequest/adminapproval/mode/agency', 1, 'ADM, HEA, HOPR '),
(27004, 27000, 0, 'PR Approval CS, Part, Asset', 'download-alt', 'PR Approval CS, Part, Asset', 'PR Approval CS, Part, Asset', 'purchaserequest/adminapproval/mode/cs_part_asset', 1, 'ADM, HEA, HOPR '),
(27005, 27000, 0, 'PR Approval Survey', 'download-alt', 'PR Approval Survey', 'PR Approval Survey', 'purchaserequest/adminapproval/mode/survey', 1, 'ADM, HEA, HOPR '),
(27006, 27000, 0, 'PR Approval Rent Vessel', 'download-alt', 'PR Approval Rent Vessel', 'PR Approval Rent Vessel', 'purchaserequest/adminapproval/mode/rent', 1, 'ADM, HEA, HOPR '),
(28000, 0, 1, 'Manage Procurement', 'th-large', 'Manage Procurement', 'Manage Procurement', 'proc', 1, 'ADM, HEA, HOPR, PRO'),
(28001, 28000, 0, 'PO Fuel', 'random', 'PO Fuel', 'PO Fuel', 'purchaseorder/manageposingle/mode/fuel', 1, 'ADM, PRO'),
(28002, 28000, 0, 'PO Fresh Water', 'random', 'PO Fresh Water', 'PO Fresh Water', 'purchaseorder/manageposingle/mode/fresh_water', 1, 'ADM, PRO'),
(28003, 28000, 0, 'PO Agency', 'random', 'PO Agency', 'PO Agency', 'purchaseorder/manageposingle/mode/agency', 1, 'ADM, PRO'),
(28004, 28000, 0, 'PO Cons.Stock, Part, Asset', 'random', 'PO Cons.Stock, Part, Asset', 'PO Cons.Stock, Part, Asset', 'purchaseorder/managepritem', 1, 'ADM, PRO'),
(28005, 28000, 0, 'PO Survey', 'random', 'PO Survey', 'PO Survey', 'purchaseorder/manageposingle/mode/survey_class', 1, 'ADM, PRO'),
(28006, 28000, 0, 'PO Rent Vessel', 'random', 'PO Rent Vessel', 'PO Rent Vessel', 'purchaseorder/manageposingle/mode/rent_vessel', 1, 'ADM, PRO'),
(28007, 28000, 0, 'PR Approval - Lead Time', 'calendar', 'Monitoring Keterlambatan', 'PR Approval - Lead Time', 'purchaserequest/prapprovalmonitoring', 1, 'ADM, HEA, HOPR, PRO'),
(28008, 28000, 0, 'PR to PO - Lead Time', 'stat', 'Status Monitoring PO', 'PR to PO - Lead Time', 'purchaserequest/prtopomonitoring', 1, 'ADM, HEA, HOPR, PRO'),
(28009, 28000, 0, 'PR to PO - PICA', 'book', 'PICA untuk PO', 'PR to PO - PICA', 'purchaserequest/adminprpica', 1, 'ADM, HEA, HOPR, PRO'),
(31000, 0, 1, 'Manage Sales', 'tasks', 'Manage Sales', 'Manage Sales', '', 1, 'ADM, MKT, HEA, FIC'),
(31001, 31000, 0, 'Invoice', 'bullhorn', 'Invoice', 'Invoice', 'voyageorder/finishvoyage', 1, 'ADM, MKT'),
(31002, 31000, 0, 'Customer Payment', 'users', 'Customer Payment', 'Customer Payment', 'invoicevoyage/invoicepayment', 1, 'ADM, MKT, FIC'),
(31003, 31000, 0, 'Payment Monitoring', 'stat', 'Monitoring Pembayaran', 'Payment Monitoring', 'invoicevoyage/paymentmonitoring', 1, 'ADM, MKT, HEA, FIC'),
(31004, 31000, 0, 'Actual Sales', 'route', 'Penjualan Aktual', 'Actual Sales', '', 0, 'ADM, MKT'),
(31005, 31000, 0, 'Sales Plan vs Actual Sales', 'sign', 'Rencana vs Aktual Penjualan', 'Sales Plan vs Actual Sales', '', 0, 'ADM, MKT'),
(31006, 31000, 0, 'Customer Performance Report', '2file', 'Laporan Kinerja Customer', 'Customer Performance Report', '', 0, 'ADM, MKT'),
(32000, 0, 1, 'Manage Repair & Maintenance', 'wrench', 'Manage Repair & Maintenance', 'Manage Repair & Maintenance', 'repair', 1, 'ADM, TEC'),
(32001, 32000, 0, 'Damage Report', 'chart', 'Laporan Kerusakan', 'Damage Report', 'repair/listofvessel/mode/DAMAGE', 1, 'ADM, OPR, TEC'),
(32002, 32000, 0, 'Finding Report', 'stat', 'Temuan', 'Finding Report', 'repair/listofvessel/mode/FINDING', 1, 'ADM, OPR, TEC'),
(32003, 32000, 0, 'Unshceduled Maintenance', 'wrench', 'Perbaikan Tidak Terjadwal', 'Unshceduled Maintenance', '', 0, 'ADM, OPR, TEC'),
(32004, 32000, 0, 'Scheduled Maintenance', 'calendar', 'Perbaikan Terjadwal', 'Scheduled Maintenance', 'repair/plan', 1, 'ADM, OPR, TEC'),
(32005, 32000, 0, 'Request For Repair', 'wrench', 'Permintaan Jadwal Perbaikan', 'Request For Repair', 'requestForSchedule/create/mode/REPAIR', 1, 'ADM, OPR, TEC'),
(32006, 32000, 0, 'Request For Docking', 'cog', 'Permintaan Jadwal Docking', 'Request For Docking', 'requestForSchedule/create/mode/DOCKING', 1, 'ADM, OPR, TEC'),
(32007, 32000, 0, 'PR Survey', 'share-alt', 'PR vendor for repair', 'PR Survey', 'purchaserequest/prvessel/mode/survey_class', 1, 'ADM, OPR, TEC'),
(32008, 32000, 0, 'PR Cons.Stock, Part, Asset', 'tong', 'PR Cons.Stock, Part, Asset', 'PR Cons.Stock, Part, Asset', 'purchaserequest/prvessel/mode/consumable_stock', 1, 'ADM,  OPR, TEC'),
(32009, 32000, 0, 'Repair / maintenance document', 'file', 'Repair / maintenance document', 'Repair / maintenance document', '', 0, 'ADM, OPR, TEC'),
(32010, 32000, 0, 'Equipment trial', 'order', 'Equipment trial', 'Equipment trial', '', 0, 'ADM, OPR, TEC'),
(32011, 32000, 0, 'Repair / Maintenance report', '2file', 'Repair / Maintenance report', 'Repair / Maintenance report', '', 0, 'ADM, OPR, TEC'),
(32012, 32000, 0, 'Availability status', 'heart', 'availability status', 'Availability status', '', 0, 'ADM, OPR, TEC'),
(33000, 0, 1, 'Part', 'order', 'Part', 'Part', 'repair', 1, 'ADM, TEC'),
(33001, 33000, 0, 'Part', 'order', 'Part', 'Part', 'part/admin', 1, 'ADM, OPR'),
(33002, 33000, 0, 'Part Level', 'align-left', 'Part Level', 'Part Level', 'partlevel/admin', 0, 'ADM, OPR'),
(33003, 33000, 0, 'Part Structure (BOM)', 'align-right', 'BOM', 'Part Structure (BOM)', 'partstructure/admin', 0, 'ADM, OPR'),
(33004, 33000, 0, 'Part BOM', 'cog', 'Part BOM', 'Part BOM', 'partbom/admin', 0, 'ADM, OPR, TEC'),
(33005, 33000, 0, 'BOM', 'sign', 'BOM 2', 'BOM', 'bom/admin', 1, 'ADM, OPR, TEC'),
(40000, 0, 1, 'Financial Data Master', 'db', 'Data Master Keuangan', 'Financial Data Master', '', 1, 'ADM, FIC'),
(40001, 40000, 0, 'Code of Accounting', 'random', 'Kode Akun', 'Code of Accounting', 'accountcoa/admin', 1, 'ADM, FIC'),
(40002, 40000, 0, 'GL Account', 'book', 'GL Account', 'GL Account', 'accountgl/admin', 1, 'ADM, FIC'),
(40003, 40000, 0, 'GL Posting', 'file', 'GL Posting', 'GL Posting', 'accountglposting/admin', 1, 'ADM, FIC'),
(40004, 40000, 0, 'Bank Account', 'euro', 'Akun Bank', 'Bank Account', 'bankaccount/admin', 1, 'ADM,FIC'),
(41000, 0, 1, 'Manage Financial', 'euro', 'Manage Financial', 'Manage Financial', '', 1, 'ADM, FIC'),
(41001, 41000, 0, 'Master Budget', 'dollar', 'MB', 'Master Budget', 'masterbudget/budget', 1, 'ADM, FIC'),
(41002, 41000, 0, 'Outlook', 'book', 'Outlook', 'Outlook', 'masterbudget/outlook', 1, 'ADM, FIC'),
(41003, 41000, 0, 'Report Actual Sales', '2file', 'Actual Sales Report', 'Report Actual Sales', 'actualsalesreport/actualsales', 1, 'ADM, FIC'),
(41004, 41000, 0, 'Report per Voyage', 'book', 'Laporan per Voyage', 'Report per Voyage', 'actualsalesreport/actualpervoyage', 1, 'ADM, FIC'),
(41005, 41000, 0, 'Vessel Depreciation', 'book', 'Vessel Depreciation', 'Vessel Depreciation', 'vesselDepreciation/index', 1, 'ADM, FIC'),
(41006, 41000, 0, 'Insurance Accrual of Vessel', 'book', 'Insurance Accrual of Vessel', 'Insurance Accrual of Vessel', 'vesselInsuranceAccrual/index', 1, 'ADM, FIC'),
(41007, 41000, 0, 'Crew Payroll', 'book', 'Gaji Crew Tetap', 'Crew Payroll', 'crewPayroll/list', 1, 'ADM, FIC'),
(41008, 41000, 0, 'Monthly Crew Payroll', 'book', 'Gaji Crew Bulanan', 'Monthly Crew Payroll', 'crewPayroll/listmonthly', 0, 'ADM, FIC'),
(41009, 41000, 0, 'Cashflow', 'book', 'Cashflow', 'Cashflow', '', 0, 'ADM, FIC'),
(41010, 41000, 0, 'Plan vs Actual', 'book', 'Plan vs Actual', 'Plan vs Actual', '', 0, 'ADM, FIC'),
(41011, 41000, 0, 'Report per Vessel', 'book', 'Laporan per Vessel', 'Report per Vessel', '', 0, 'ADM, FIC'),
(51000, 0, 1, 'Monitoring & Dashboard', 'cog', 'Monitoring', 'Monitoring & Dashboard', 'monitoring', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT, FCT, SOA, HEA, HOPR, PRO, TEC'),
(51001, 51000, 0, 'Monitoring Voyage Order', 'order', 'Monitoring VO', 'Monitoring Voyage Order', 'voyageorder/monitoring', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT, FCT, SOA, HEA, HOPR, PRO, TEC'),
(51002, 51000, 0, 'View PR Part, Cons.Stock, Asset', 'file', 'View PR Part, Cons.Stock, Asset', 'View PR Part, Cons.Stock, Asset', 'purchaserequest/prpartmonitoring', 1, 'ADM, TEC, NAU'),
(71000, 0, 1, 'Setting', 'cog', 'Konfigurasi', 'Setting', 'setting', 1, 'ADM, MKT'),
(71001, 71000, 0, 'General Setting', 'wrench', 'Setting Umum', 'General Setting', 'setting/general', 1, 'ADM, MKT'),
(71002, 71000, 0, 'Quotation Report Setting', '2file', 'Setting Laporan Quotation', 'Quotation Report Setting', 'setting/quot', 1, 'ADM, MKT'),
(71003, 71000, 0, 'SPAL Report Setting', 'file', 'Setting SPAL', 'SPAL Report Setting', 'setting/spal', 1, 'ADM, MKT'),
(71004, 71000, 0, 'Invoice Setting', 'bullhorn', 'Setting invoice', 'Invoice Setting', 'setting/invo', 1, 'ADM, MKT'),
(71005, 71000, 0, 'Setting Tax Report', '2file', 'Setting Laporan Pajak', 'Setting Tax Report', 'setting/mastax', 1, 'ADM, MKT'),
(81000, 0, 1, 'Message', 'envelope', 'Pesan', 'Message', '', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT, FCT, SOA, HEA, HOPR, PRO'),
(81001, 81000, 0, 'Inbox', 'inbox', 'Pesan Masuk', 'Inbox', 'messageinbox/admin', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT, FCT, SOA, HEA, HOPR, PRO'),
(81002, 81000, 0, 'Outbox', 'share-alt', 'Pesan Keluar', 'Outbox', 'messageoutbox/admin', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT, FCT, SOA, HEA, HOPR, PRO'),
(81003, 81000, 0, 'New Message', 'envelope', 'Pesan Baru', 'New Message', 'messageoutbox/create', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT, FCT, SOA, HEA, HOPR, PRO'),
(1000000, 0, 0, 'Logout ', 'off', 'Keluar', 'Logout ', 'site/logout', 1, 'ADM, FIC, NAU, CRW, VPC, MKT, CCT, FCT, SOA, HEA, HOPR, PRO, CUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crew`
--

CREATE TABLE IF NOT EXISTS `crew` (
  `CrewId` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CrewName` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `DateOfBirth` date NOT NULL,
  `PlaceOfBirth` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `Address` text COLLATE latin1_general_ci NOT NULL,
  `PhoneNumber` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `MobileNumber` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Email` text COLLATE latin1_general_ci NOT NULL,
  `CurrentResidence` text COLLATE latin1_general_ci NOT NULL,
  `Status` set('candidate','crew','retired') COLLATE latin1_general_ci NOT NULL,
  `Profession` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `id_crew_position` int(11) NOT NULL,
  `MaritalStatus` set('SINGLE','MARRIED','DIVORCE') COLLATE latin1_general_ci NOT NULL,
  `NameOfSpouse` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `NameOfChildren` text COLLATE latin1_general_ci NOT NULL,
  `BankAccountNumber` text COLLATE latin1_general_ci NOT NULL,
  `BankName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountHolder` text COLLATE latin1_general_ci NOT NULL,
  `GovernmentFileTaxNumber` text COLLATE latin1_general_ci NOT NULL,
  `EmployeeRegisteredNumber` text COLLATE latin1_general_ci NOT NULL,
  `AuditTime` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AuditActivity` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `StatusRelief` set('Relief','Non Relief') COLLATE latin1_general_ci NOT NULL,
  `StatusOwn` set('OWN','OUTSOURCE') COLLATE latin1_general_ci NOT NULL,
  `CertificateLevel` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `FotoSertifikat` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `FotoIjazah` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `Notes` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Photo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `LastCertificateLevel` int(11) NOT NULL,
  `LastCertificateValidDate` date NOT NULL,
  `LastMutationId` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `LastIDVessel` int(11) NOT NULL,
  `LastSignOnDate` int(11) NOT NULL,
  `LastSignOffDate` int(11) NOT NULL,
  `CurrentStatus` set('ON','OFF') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`CrewId`),
  KEY `Status` (`Status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1770011013 ;

--
-- Dumping data untuk tabel `crew`
--

INSERT INTO `crew` (`CrewId`, `NIP`, `CrewName`, `DateOfBirth`, `PlaceOfBirth`, `Address`, `PhoneNumber`, `MobileNumber`, `Email`, `CurrentResidence`, `Status`, `Profession`, `id_crew_position`, `MaritalStatus`, `NameOfSpouse`, `NameOfChildren`, `BankAccountNumber`, `BankName`, `AccountHolder`, `GovernmentFileTaxNumber`, `EmployeeRegisteredNumber`, `AuditTime`, `AuditActivity`, `StatusRelief`, `StatusOwn`, `CertificateLevel`, `FotoSertifikat`, `FotoIjazah`, `Notes`, `Photo`, `LastCertificateLevel`, `LastCertificateValidDate`, `LastMutationId`, `LastIDVessel`, `LastSignOnDate`, `LastSignOffDate`, `CurrentStatus`) VALUES
(1770001001, 'NIP', 'Alex Widodo Pardomuan', '0000-00-00', 'Notset', '-', '-', '082157593810', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001002, 'NIP', 'Jethro Johannes', '0000-00-00', 'Notset', '-', '-', '081348459991', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001003, 'NIP', 'Tri Yanto', '0000-00-00', 'Notset', '-', '-', '081253565314', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001004, 'NIP', 'Arief Wijaya', '0000-00-00', 'Notset', '-', '-', '085347632345', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001005, 'NIP', 'Christian Pareba', '0000-00-00', 'Notset', '-', '-', '081348898097', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001006, 'NIP', 'Taufik Rahman ', '0000-00-00', 'Notset', '-', '-', '081352086749', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001007, 'NIP', 'Paulus Tega I', '0000-00-00', 'Notset', '-', '-', '081340686778', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001008, 'NIP', 'Deny Yufrizal', '0000-00-00', 'Notset', '-', '-', '081364035300', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001009, 'NIP', 'Imam Nurcholis', '0000-00-00', 'Notset', '-', '-', '081252903042', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001010, 'NIP', 'Suparno', '0000-00-00', 'Notset', '-', '-', '081351204634', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'ON'),
(1770001011, 'NIP', 'Saiful Hendri', '0000-00-00', 'Notset', '-', '-', '082147688211', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', '', 1770001, 0, 0, 'OFF'),
(1770002001, 'NIP', 'Aris Nuryanto', '0000-00-00', 'Notset', '-', '-', '081346483989', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002002, 'NIP', 'Akri Mado', '0000-00-00', 'Notset', '-', '-', '081230472639', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002003, 'NIP', 'Halim Amirullah', '0000-00-00', 'Notset', '-', '-', '085651032587', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002004, 'NIP', 'Jemmi', '0000-00-00', 'Notset', '-', '-', '082122437915', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002005, 'NIP', 'Asryal', '0000-00-00', 'Notset', '-', '-', '081345647791', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002006, 'NIP', 'Rohmani', '0000-00-00', 'Notset', '-', '-', '081397656099', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002007, 'NIP', 'Ismail Harun', '0000-00-00', 'Notset', '-', '-', '082156529155', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002008, 'NIP', 'Tri Witjatmoko', '0000-00-00', 'Notset', '-', '-', '081348898097', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002009, 'NIP', 'M. Syarkani', '0000-00-00', 'Notset', '-', '-', '082169880770', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002010, 'NIP', 'Budi Utomo', '0000-00-00', 'Notset', '-', '-', '085252823334', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'ON'),
(1770002011, 'NIP', 'Kaswanto', '0000-00-00', 'Notset', '-', '-', '081348898097', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'OFF'),
(1770002012, 'NIP', 'Mulyono', '0000-00-00', 'Notset', '-', '-', '085248212466', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'OFF'),
(1770002013, 'NIP', 'David Yasri', '0000-00-00', 'Notset', '-', '-', '081345361559', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770002, 0, 0, 'OFF'),
(1770003001, 'NIP', 'Yusuf', '0000-00-00', 'Notset', '-', '-', '081251394549', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003002, 'NIP', 'Iwan Budianto', '0000-00-00', 'Notset', '-', '-', '081268005004', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003003, 'NIP', 'Abdul Rasyid', '0000-00-00', 'Notset', '-', '-', '085349535656', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003004, 'NIP', 'Acep Sutrisna', '0000-00-00', 'Notset', '-', '-', '08128984695', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003005, 'NIP', 'Abdul Karim', '0000-00-00', 'Notset', '-', '-', '087806854555', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003006, 'NIP', 'Aludin Latukau', '0000-00-00', 'Notset', '-', '-', '081218724103', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003007, 'NIP', 'Paulus Dode', '0000-00-00', 'Notset', '-', '-', '082343367921', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003008, 'NIP', 'Beri Ferdian', '0000-00-00', 'Notset', '-', '-', '081251252553', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003009, 'NIP', 'Safruddin', '0000-00-00', 'Notset', '-', '-', '085348535888', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003010, 'NIP', 'Antonio ArdiLeo', '0000-00-00', 'Notset', '-', '-', '082134166785', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'ON'),
(1770003011, 'NIP', 'Dambau Patalong', '0000-00-00', 'Notset', '-', '-', '081349300479', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'OFF'),
(1770003012, 'NIP', 'Joni', '0000-00-00', 'Notset', '-', '-', '081349327626', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770003, 0, 0, 'OFF'),
(1770004001, 'NIP', 'Muhammad Nasir A.', '0000-00-00', 'Notset', '-', '-', '082357389551', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004002, 'NIP', 'Dasman', '0000-00-00', 'Notset', '-', '-', '081270766299', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004003, 'NIP', 'Najamuddin', '0000-00-00', 'Notset', '-', '-', '08125007967', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004004, 'NIP', 'Bagoes Irfan Asyari', '0000-00-00', 'Notset', '-', '-', '082153906860', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004005, 'NIP', 'Eko Septian Putra', '0000-00-00', 'Notset', '-', '-', '081348898097', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004006, 'NIP', 'Moch Arif Arfan', '0000-00-00', 'Notset', '-', '-', '081361646760', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004007, 'NIP', 'Sugiannor', '0000-00-00', 'Notset', '-', '-', '081253241333', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004008, 'NIP', 'Joko Susilo', '0000-00-00', 'Notset', '-', '-', '08137798790', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004009, 'NIP', 'Andi Suwito', '0000-00-00', 'Notset', '-', '-', '082143455819', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004010, 'NIP', 'Siful', '0000-00-00', 'Notset', '-', '-', '082169112669', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'ON'),
(1770004011, 'NIP', 'M Jamaluddin', '0000-00-00', 'Notset', '-', '-', '082113626004', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'OFF'),
(1770004012, 'NIP', 'Hariyanto', '0000-00-00', 'Notset', '-', '-', '081331008788', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770004, 0, 0, 'OFF'),
(1770005001, 'NIP', 'Jacob Wuisan', '0000-00-00', 'Notset', '-', '-', '082148869688', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005002, 'NIP', 'Dwi Nur Cahyo', '0000-00-00', 'Notset', '-', '-', '081349430318', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005003, 'NIP', 'Rudy Rawang', '0000-00-00', 'Notset', '-', '-', '085251820000', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005004, 'NIP', 'Syamsul Bahri', '0000-00-00', 'Notset', '-', '-', '081348035501', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005005, 'NIP', 'Devies Yohanes', '0000-00-00', 'Notset', '-', '-', '085376057576', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005006, 'NIP', 'Sukatman', '0000-00-00', 'Notset', '-', '-', '081210072514', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005007, 'NIP', 'Walidi', '0000-00-00', 'Notset', '-', '-', '081392705769', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005008, 'NIP', 'Ismail Harun', '0000-00-00', 'Notset', '-', '-', '082156529155', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005009, 'NIP', 'Bayu Okta', '0000-00-00', 'Notset', '-', '-', '081345647791', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005010, 'NIP', 'Sugteng Priyadi', '0000-00-00', 'Notset', '-', '-', '081345647791', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'ON'),
(1770005011, 'NIP', 'Agus Sulis Nurhadi', '0000-00-00', 'Notset', '-', '-', '', '-', '-', 'crew', '', 20, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770005, 0, 0, 'OFF'),
(1770006001, 'NIP', 'Widson Dedi Isdaryono', '0000-00-00', 'Notset', '-', '-', '081348343182', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006002, 'NIP', 'Minton Mondealu', '0000-00-00', 'Notset', '-', '-', '081356688855', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006003, 'NIP', 'Jamal', '0000-00-00', 'Notset', '-', '-', '081351234379', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006004, 'NIP', 'Syahdianto', '0000-00-00', 'Notset', '-', '-', '085246487855', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006005, 'NIP', 'Lukmanul Hakim', '0000-00-00', 'Notset', '-', '-', '081219915941', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006006, 'NIP', 'Heri Prasetyo', '0000-00-00', 'Notset', '-', '-', '085266371234', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006007, 'NIP', 'Setyawan', '0000-00-00', 'Notset', '-', '-', '082149994948', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006008, 'NIP', 'Benson', '0000-00-00', 'Notset', '-', '-', '081351204634', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006009, 'NIP', 'Zainuddin', '0000-00-00', 'Notset', '-', '-', '081349689244', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770006010, 'NIP', 'Brian Tompunu', '0000-00-00', 'Notset', '-', '-', '085231651278', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770006, 0, 0, 'ON'),
(1770007001, 'NIP', 'Mukhammad', '0000-00-00', 'Notset', '-', '-', '081319341778', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007002, 'NIP', 'Maskun Sako', '0000-00-00', 'Notset', '-', '-', '085235156639', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007003, 'NIP', 'Deden Eddy Hermawan', '0000-00-00', 'Notset', '-', '-', '081349423335', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007004, 'NIP', 'Ahmad Jaelani', '0000-00-00', 'Notset', '-', '-', '08128795302', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007005, 'NIP', 'Darwis Hasiholan sinambela', '0000-00-00', 'Notset', '-', '-', '081389731514', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007006, 'NIP', 'Mulyadi', '0000-00-00', 'Notset', '-', '-', '082151713072', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007007, 'NIP', 'Wasis Sujono', '0000-00-00', 'Notset', '-', '-', '085232229573', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007008, 'NIP', 'Mohammad Nurul Anwar', '0000-00-00', 'Notset', '-', '-', '0813335120670', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007009, 'NIP', 'Wiranto', '0000-00-00', 'Notset', '-', '-', '085396302426', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007010, 'NIP', 'Noridi', '0000-00-00', 'Notset', '-', '-', '085246747379', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'ON'),
(1770007011, 'NIP', 'Dwi Andi R.', '0000-00-00', 'Notset', '-', '-', '081347451387', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'OFF'),
(1770007012, 'NIP', 'Joko Satriyo', '0000-00-00', 'Notset', '-', '-', '081228204440', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770007, 0, 0, 'OFF'),
(1770008001, 'NIP', 'Ismail Malawat', '0000-00-00', 'Notset', '-', '-', '085248038600', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008002, 'NIP', 'Husairi', '0000-00-00', 'Notset', '-', '-', '081279456899', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008003, 'NIP', 'Suprapto', '0000-00-00', 'Notset', '-', '-', '08125067827', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008004, 'NIP', 'Sandi Wahyuni', '0000-00-00', 'Notset', '-', '-', '082153523989', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008005, 'NIP', 'Joni', '0000-00-00', 'Notset', '-', '-', '', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008006, 'NIP', 'Rudi', '0000-00-00', 'Notset', '-', '-', '081268244780', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008007, 'NIP', 'Rudi Harfiadi', '0000-00-00', 'Notset', '-', '-', '082113626004', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008008, 'NIP', 'Gajali Rahman', '0000-00-00', 'Notset', '-', '-', '082153733331', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008009, 'NIP', 'Tahir', '0000-00-00', 'Notset', '-', '-', '08125870062', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008010, 'NIP', 'Sutridar', '0000-00-00', 'Notset', '-', '-', '081241513943', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'ON'),
(1770008011, 'NIP', 'Ferdinandos', '0000-00-00', 'Notset', '-', '-', '082149995391', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'OFF'),
(1770008012, 'NIP', 'Yanuar Hari Astanta', '0000-00-00', 'Notset', '-', '-', '082134446640', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770008, 0, 0, 'OFF'),
(1770009001, 'NIP', 'Deddy Albert', '0000-00-00', 'Notset', '-', '-', '081348721414', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009002, 'NIP', 'Valentino', '0000-00-00', 'Notset', '-', '-', '081332835671', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009003, 'NIP', 'Fredirikus Nusa ', '0000-00-00', 'Notset', '-', '-', '081346373171', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009004, 'NIP', 'Subur', '0000-00-00', 'Notset', '-', '-', '081349394890', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009005, 'NIP', 'Jabarudin', '0000-00-00', 'Notset', '-', '-', '082171678865', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009006, 'NIP', 'Simon Siampa Dalame', '0000-00-00', 'Notset', '-', '-', '081252330773', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009007, 'NIP', 'Riyadis Solikin', '0000-00-00', 'Notset', '-', '-', '085326622286', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009008, 'NIP', 'Gito Sugiarto Dalame', '0000-00-00', 'Notset', '-', '-', '081242500403', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009009, 'NIP', 'La Edi', '0000-00-00', 'Notset', '-', '-', '085251610835', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009010, 'NIP', 'Samsul Haruna', '0000-00-00', 'Notset', '-', '-', '085251675778', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'ON'),
(1770009011, 'NIP', 'Tri Alfa', '0000-00-00', 'Notset', '-', '-', '', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770009, 0, 0, 'OFF'),
(1770010001, 'NIP', 'Ichal Z', '0000-00-00', 'Notset', '-', '-', '081346614150', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010002, 'NIP', 'Tri Alfa', '0000-00-00', 'Notset', '-', '-', '', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010003, 'NIP', 'Budi Siswanto', '0000-00-00', 'Notset', '-', '-', '081351758386', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010004, 'NIP', 'Irwan', '0000-00-00', 'Notset', '-', '-', '081348622033', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010005, 'NIP', 'Mahyuni', '0000-00-00', 'Notset', '-', '-', '081386244331', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010006, 'NIP', 'Aldino Fajar Giantoro', '0000-00-00', 'Notset', '-', '-', '081349781779', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010007, 'NIP', 'Muh. Fauzi', '0000-00-00', 'Notset', '-', '-', '085350075824', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010008, 'NIP', 'Risal Patta', '0000-00-00', 'Notset', '-', '-', '', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010009, 'NIP', 'Rudi Arianto', '0000-00-00', 'Notset', '-', '-', '085246678661', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010010, 'NIP', 'Yuli Dony Maifal', '0000-00-00', 'Notset', '-', '-', '085350075825', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'ON'),
(1770010011, 'NIP', 'Lukman Hakim', '0000-00-00', 'Notset', '-', '-', '081340214032', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'OFF'),
(1770010012, 'NIP', 'Christoforus Muga S', '0000-00-00', 'Notset', '-', '-', '081351812444', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'OFF'),
(1770010013, 'NIP', 'Indra Raharjo', '0000-00-00', 'Notset', '-', '-', '081213438599', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'OFF'),
(1770010014, 'NIP', 'Ichsan Hidayat', '0000-00-00', 'Notset', '-', '-', '085248449588', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'OFF'),
(1770010015, 'NIP', 'Ruben Batan Pulu', '0000-00-00', 'Notset', '-', '-', '082331090707', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770010, 0, 0, 'OFF'),
(1770011001, 'NIP', 'Aris Saepudin', '0000-00-00', 'Notset', '-', '-', '081213928668', '-', '-', 'crew', '', 1, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011002, 'NIP', 'Iskandar Bin Djaja', '0000-00-00', 'Notset', '-', '-', '081340771388', '-', '-', 'crew', '', 2, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011003, 'NIP', 'Eko Yuli Ardianto', '0000-00-00', 'Notset', '-', '-', '082131369898', '-', '-', 'crew', '', 3, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011004, 'NIP', 'Ahmad Bisri', '0000-00-00', 'Notset', '-', '-', '085646036322', '-', '-', 'crew', '', 4, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OWN', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011005, 'NIP', 'Hari Witjaksono', '0000-00-00', 'Notset', '-', '-', '081349689244', '-', '-', 'crew', '', 5, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011006, 'NIP', 'Buyamin Moni', '0000-00-00', 'Notset', '-', '-', '085389261454', '-', '-', 'crew', '', 6, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011007, 'NIP', 'Dadan Ramdani', '0000-00-00', 'Notset', '-', '-', '081383390355', '-', '-', 'crew', '', 8, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011008, 'NIP', 'A Rafid', '0000-00-00', 'Notset', '-', '-', '082149628412', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011009, 'NIP', 'Budiyono', '0000-00-00', 'Notset', '-', '-', '085248851881', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011010, 'NIP', 'Mukhammad', '0000-00-00', 'Notset', '-', '-', '082134166785', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'ON'),
(1770011011, 'NIP', 'Oktian Mandajo', '0000-00-00', 'Notset', '-', '-', '081348020848', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'OFF'),
(1770011012, 'NIP', 'Puryoto', '0000-00-00', 'Notset', '-', '-', '081318505063', '-', '-', 'crew', '', 7, 'MARRIED', '', '', '', '', '', '', '', '', '', 'Non Relief', 'OUTSOURCE', '', '', '', '', '', 0, '0000-00-00', '', 1770011, 0, 0, 'OFF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crew_assignment`
--

CREATE TABLE IF NOT EXISTS `crew_assignment` (
  `id_crew_assignment` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_crew_signon` bigint(20) NOT NULL,
  `vessel_id` int(11) NOT NULL,
  `CrewId` int(11) NOT NULL,
  `id_crew_position` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `status_active` int(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_crew_assignment`),
  KEY `vessel_id` (`vessel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data untuk tabel `crew_assignment`
--

INSERT INTO `crew_assignment` (`id_crew_assignment`, `id_crew_signon`, `vessel_id`, `CrewId`, `id_crew_position`, `start_date`, `expired_date`, `status_active`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 0, 1770001, 1770001001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(2, 0, 1770001, 1770001002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(3, 0, 1770001, 1770001003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(4, 0, 1770001, 1770001004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(5, 0, 1770001, 1770001005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(6, 0, 1770001, 1770001006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(7, 0, 1770001, 1770001007, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(8, 0, 1770001, 1770001008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(9, 0, 1770001, 1770001009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(10, 0, 1770001, 1770001010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(11, 0, 1770001, 1770001011, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(12, 0, 1770002, 1770002001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(13, 0, 1770002, 1770002002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(14, 0, 1770002, 1770002003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(15, 0, 1770002, 1770002004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(16, 0, 1770002, 1770002005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(17, 0, 1770002, 1770002006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(18, 0, 1770002, 1770002007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(19, 0, 1770002, 1770002008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(20, 0, 1770002, 1770002009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(21, 0, 1770002, 1770002010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(22, 0, 1770002, 1770002011, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(23, 0, 1770002, 1770002012, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(24, 0, 1770002, 1770002013, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(25, 0, 1770003, 1770003001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(26, 0, 1770003, 1770003002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(27, 0, 1770003, 1770003003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(28, 0, 1770003, 1770003004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(29, 0, 1770003, 1770003005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(30, 0, 1770003, 1770003006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(31, 0, 1770003, 1770003007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(32, 0, 1770003, 1770003008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(33, 0, 1770003, 1770003009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(34, 0, 1770003, 1770003010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(35, 0, 1770003, 1770003011, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(36, 0, 1770003, 1770003012, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(37, 0, 1770004, 1770004001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(38, 0, 1770004, 1770004002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(39, 0, 1770004, 1770004003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(40, 0, 1770004, 1770004004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(41, 0, 1770004, 1770004005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(42, 0, 1770004, 1770004006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(43, 0, 1770004, 1770004007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(44, 0, 1770004, 1770004008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(45, 0, 1770004, 1770004009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(46, 0, 1770004, 1770004010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(47, 0, 1770004, 1770004011, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(48, 0, 1770004, 1770004012, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(49, 0, 1770005, 1770005001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(50, 0, 1770005, 1770005002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(51, 0, 1770005, 1770005003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(52, 0, 1770005, 1770005004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(53, 0, 1770005, 1770005005, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(54, 0, 1770005, 1770005006, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(55, 0, 1770005, 1770005007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(56, 0, 1770005, 1770005008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(57, 0, 1770005, 1770005009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(58, 0, 1770005, 1770005010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(59, 0, 1770005, 1770005011, 20, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(60, 0, 1770006, 1770006001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(61, 0, 1770006, 1770006002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(62, 0, 1770006, 1770006003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(63, 0, 1770006, 1770006004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(64, 0, 1770006, 1770006005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(65, 0, 1770006, 1770006006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(66, 0, 1770006, 1770006007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(67, 0, 1770006, 1770006008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(68, 0, 1770006, 1770006009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(69, 0, 1770006, 1770006010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(70, 0, 1770007, 1770007001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(71, 0, 1770007, 1770007002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(72, 0, 1770007, 1770007003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(73, 0, 1770007, 1770007004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(74, 0, 1770007, 1770007005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(75, 0, 1770007, 1770007006, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(76, 0, 1770007, 1770007007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(77, 0, 1770007, 1770007008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(78, 0, 1770007, 1770007009, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(79, 0, 1770007, 1770007010, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(80, 0, 1770007, 1770007011, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(81, 0, 1770007, 1770007012, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(82, 0, 1770008, 1770008001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(83, 0, 1770008, 1770008002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(84, 0, 1770008, 1770008003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(85, 0, 1770008, 1770008004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(86, 0, 1770008, 1770008005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(87, 0, 1770008, 1770008006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(88, 0, 1770008, 1770008007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(89, 0, 1770008, 1770008008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(90, 0, 1770008, 1770008009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(91, 0, 1770008, 1770008010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(92, 0, 1770008, 1770008011, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(93, 0, 1770008, 1770008012, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(94, 0, 1770009, 1770009001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(95, 0, 1770009, 1770009002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(96, 0, 1770009, 1770009003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(97, 0, 1770009, 1770009004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(98, 0, 1770009, 1770009005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(99, 0, 1770009, 1770009006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(100, 0, 1770009, 1770009007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(101, 0, 1770009, 1770009008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(102, 0, 1770009, 1770009009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(103, 0, 1770009, 1770009010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(104, 0, 1770009, 1770009011, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(105, 0, 1770010, 1770010001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(106, 0, 1770010, 1770010002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(107, 0, 1770010, 1770010003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(108, 0, 1770010, 1770010004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(109, 0, 1770010, 1770010005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(110, 0, 1770010, 1770010006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(111, 0, 1770010, 1770010007, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(112, 0, 1770010, 1770010008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(113, 0, 1770010, 1770010009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(114, 0, 1770010, 1770010010, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(115, 0, 1770010, 1770010011, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(116, 0, 1770010, 1770010012, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(117, 0, 1770010, 1770010013, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(118, 0, 1770010, 1770010014, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(119, 0, 1770010, 1770010015, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(120, 0, 1770011, 1770011001, 1, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(121, 0, 1770011, 1770011002, 2, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(122, 0, 1770011, 1770011003, 3, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(123, 0, 1770011, 1770011004, 4, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(124, 0, 1770011, 1770011005, 5, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(125, 0, 1770011, 1770011006, 6, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(126, 0, 1770011, 1770011007, 8, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(127, 0, 1770011, 1770011008, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(128, 0, 1770011, 1770011009, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(129, 0, 1770011, 1770011010, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(130, 0, 1770011, 1770011011, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', ''),
(131, 0, 1770011, 1770011012, 7, '2014-01-01', '2015-01-01', 1, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crew_payroll`
--

CREATE TABLE IF NOT EXISTS `crew_payroll` (
  `id_crew_payroll` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_crew_payroll_history` bigint(20) NOT NULL,
  `CrewId` int(11) NOT NULL,
  `id_payroll_item` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `effective_date` date NOT NULL,
  `legal_document` varchar(250) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_crew_payroll`),
  KEY `CrewId` (`CrewId`),
  KEY `id_payroll_item` (`id_payroll_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `crew_payroll`
--

INSERT INTO `crew_payroll` (`id_crew_payroll`, `id_crew_payroll_history`, `CrewId`, `id_payroll_item`, `amount`, `effective_date`, `legal_document`, `id_currency`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 0, 1770004004, 1, 165000.00, '2015-01-21', '', 1, '2015-01-27 05:57:54', 'admin', '::1'),
(2, 0, 1770004004, 2, 125000.00, '2015-01-21', '', 1, '2015-01-27 05:57:54', 'admin', '::1'),
(3, 0, 1770004004, 3, 950000.00, '2015-01-21', '', 1, '2015-01-27 05:57:54', 'admin', '::1'),
(4, 0, 1770011004, 1, 1750000.00, '2014-11-27', 'SK Menteri', 1, '2014-11-22 10:31:13', 'admin', '::1'),
(5, 0, 1770011004, 2, 190000.00, '2014-11-27', 'SK Menteri', 1, '2014-11-22 10:31:13', 'admin', '::1'),
(6, 0, 1770011004, 3, 250000.00, '2014-11-27', 'SK Menteri', 1, '2014-11-22 10:31:13', 'admin', '::1'),
(7, 0, 1770002002, 1, 18500000.00, '2014-11-25', 'as', 1, '2014-11-23 07:52:27', 'admin', '::1'),
(8, 0, 1770002002, 2, 6500000.00, '2014-11-25', 'as', 1, '2014-11-23 07:52:27', 'admin', '::1'),
(9, 0, 1770002002, 3, 2300000.00, '2014-11-25', 'as', 1, '2014-11-23 07:52:27', 'admin', '::1'),
(10, 0, 1770002005, 1, 650000.00, '2015-01-14', '', 1, '2015-01-27 06:01:12', 'admin', '::1'),
(11, 0, 1770002005, 2, 1250000.00, '2015-01-14', '', 1, '2015-01-27 06:01:12', 'admin', '::1'),
(12, 0, 1770002005, 3, 0.00, '2015-01-14', '', 1, '2015-01-27 06:01:12', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crew_payroll_history`
--

CREATE TABLE IF NOT EXISTS `crew_payroll_history` (
  `id_crew_payroll_history` bigint(20) NOT NULL AUTO_INCREMENT,
  `CrewId` int(11) NOT NULL,
  `id_payroll_item` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `effective_date` date NOT NULL,
  `legal_document` varchar(250) NOT NULL,
  `notes` text NOT NULL,
  `id_currency` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_crew_payroll_history`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crew_payroll_monthly`
--

CREATE TABLE IF NOT EXISTS `crew_payroll_monthly` (
  `id_crew_payroll_monthly` bigint(20) NOT NULL AUTO_INCREMENT,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `CrewId` int(11) NOT NULL,
  `id_payroll_item` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `transfer_date` date NOT NULL,
  `transfer_type` set('CASH','BANK TRANSFER') NOT NULL,
  `id_currency` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_crew_payroll_monthly`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crew_position`
--

CREATE TABLE IF NOT EXISTS `crew_position` (
  `id_crew_position` int(11) NOT NULL AUTO_INCREMENT,
  `crew_position` varchar(100) NOT NULL,
  `is_important` int(1) NOT NULL DEFAULT '1',
  `minimum_req` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id_crew_position`),
  KEY `is_important` (`is_important`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `crew_position`
--

INSERT INTO `crew_position` (`id_crew_position`, `crew_position`, `is_important`, `minimum_req`, `description`) VALUES
(1, 'Master', 1, 0, 'Kapten Kapal'),
(2, 'C/O', 1, 0, 'Chief Officer'),
(3, 'C/E', 1, 0, 'Chief Engineer'),
(4, '2nd Eng', 1, 0, 'Second Engineer'),
(5, '2nd off', 1, 0, 'Second Engineer Off'),
(6, '3rd eng', 1, 0, 'Third Enginner'),
(7, 'A/B', 1, 0, 'Crew Kapal'),
(8, 'koki', 1, 0, 'Cooking'),
(20, 'KKM', 1, 0, 'KKM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crew_signon`
--

CREATE TABLE IF NOT EXISTS `crew_signon` (
  `id_crew_signon` bigint(20) NOT NULL AUTO_INCREMENT,
  `vessel_id` int(11) NOT NULL,
  `CrewId` int(11) NOT NULL,
  `id_crew_position` int(11) NOT NULL,
  `sign_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `status_sign` set('SIGN ON','SIGN OFF') NOT NULL,
  `notes` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_crew_signon`),
  KEY `vessel_id` (`vessel_id`),
  KEY `CrewId` (`CrewId`),
  KEY `id_crew_position` (`id_crew_position`),
  KEY `sign_date` (`sign_date`),
  KEY `status_sign` (`status_sign`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `crew_signon`
--

INSERT INTO `crew_signon` (`id_crew_signon`, `vessel_id`, `CrewId`, `id_crew_position`, `sign_date`, `expired_date`, `status_sign`, `notes`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1710006, 1770003003, 1, '2014-01-01', '2014-06-01', 'SIGN ON', '', '2014-11-21 10:35:04', 'admin', '::1'),
(2, 1710006, 1770003003, 1, '2014-06-01', '0000-00-00', 'SIGN OFF', '', '2014-11-21 10:55:05', 'admin', '::1'),
(3, 1710006, 1770004004, 1, '2014-06-28', '2015-01-29', 'SIGN ON', '', '2014-11-21 17:02:13', 'admin', '::1'),
(4, 1710006, 1770011004, 2, '2014-11-11', '2014-11-28', 'SIGN ON', '', '2014-11-21 14:43:31', 'admin', '::1'),
(5, 1710006, 1770002002, 6, '2014-11-04', '2014-11-27', 'SIGN ON', '', '2014-11-21 14:43:45', 'admin', '::1'),
(6, 1710006, 1770002005, 3, '2014-11-28', '2014-11-27', 'SIGN ON', '', '2014-11-21 16:59:14', 'admin', '::1'),
(7, 1760002, 1770011008, 1, '2014-12-10', '2014-12-12', 'SIGN ON', '', '2014-12-04 15:59:29', 'nauticaltester', '::1'),
(8, 1760002, 1770011008, 1, '2014-12-12', '0000-00-00', 'SIGN OFF', '', '2014-12-04 15:59:58', 'nauticaltester', '::1'),
(9, 1760002, 1770004009, 1, '2014-12-24', '2014-12-24', 'SIGN ON', '', '2014-12-04 15:59:58', 'nauticaltester', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id_currency` int(11) NOT NULL AUTO_INCREMENT,
  `currency` varchar(100) NOT NULL,
  `currency_type` varchar(5) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `SK` varchar(200) DEFAULT NULL,
  `change_rate_updated` datetime NOT NULL,
  `change_rate_updated_by` varchar(64) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `currency`
--

INSERT INTO `currency` (`id_currency`, `currency`, `currency_type`, `change_rate`, `SK`, `change_rate_updated`, `change_rate_updated_by`, `ip_user_updated`) VALUES
(1, 'IDR', 'IDR', 1.00, NULL, '0000-00-00 00:00:00', '', ''),
(2, 'USD', 'USD', 12500.00, NULL, '2014-09-19 21:00:57', 'admin', ''),
(3, 'SGD', 'SGD', 9500.00, NULL, '2014-09-19 21:01:08', 'admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `currency_change_history`
--

CREATE TABLE IF NOT EXISTS `currency_change_history` (
  `id_currency_change_hist` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `SK` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  KEY `id_currency_change_hist` (`id_currency_change_hist`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `currency_change_history`
--

INSERT INTO `currency_change_history` (`id_currency_change_hist`, `id_currency`, `change_rate`, `SK`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 2, 12500.00, '', '2014-09-19 21:00:57', 'admin', '::1'),
(2, 3, 9500.00, '', '2014-09-19 21:01:08', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` bigint(20) NOT NULL AUTO_INCREMENT,
  `CustomerCode` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `CompanyName` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `Acronym` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ContactName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `Address` text COLLATE latin1_general_ci NOT NULL,
  `Address2` text COLLATE latin1_general_ci NOT NULL,
  `City` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `address_line1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `address_line2` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `GroupCategory` set('GROUP','NON-GROUP') COLLATE latin1_general_ci NOT NULL,
  `TypeCategory` set('COAL','NON-COAL') COLLATE latin1_general_ci NOT NULL,
  `NPWP` text COLLATE latin1_general_ci NOT NULL,
  `foto_customer` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `Telephone` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `Email` text COLLATE latin1_general_ci NOT NULL,
  `PostalCode` int(11) NOT NULL,
  `Street` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `FaxNumber` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `VATreg` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `id_payment_top` int(32) NOT NULL,
  `TermOfPayment` int(3) NOT NULL,
  `BankName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BranchAddress` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BankCity` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountNumber` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `id_currency` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_customer`),
  KEY `id_payment_top` (`id_payment_top`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2300000011 ;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `CustomerCode`, `CompanyName`, `Acronym`, `ContactName`, `Address`, `Address2`, `City`, `address_line1`, `address_line2`, `GroupCategory`, `TypeCategory`, `NPWP`, `foto_customer`, `Telephone`, `Email`, `PostalCode`, `Street`, `FaxNumber`, `VATreg`, `id_payment_top`, `TermOfPayment`, `BankName`, `BranchAddress`, `BankCity`, `AccountName`, `AccountNumber`, `id_currency`) VALUES
(30387, '30387', 'PT MEGA SURYA ERATAMA', 'MSE', '', 'Dsn Jasem, Kelurahan Jasem', 'Kecamatan Ngoro Kab. Mojokerto', 'Jawa Timur', '', '', 'NON-GROUP', 'COAL', '02.525.581.1.641.000', '', '', '', 0, '', '', '', 0, 4, '', '', '', '', '', 1),
(30390, '30390', 'PT. PELAYARAN NASIONAL TANJUNGRIAU SERVIS', 'PNTS', '', 'Wisma Pondok Indah 2 Lt. 2 Suite 201', 'Jl Sultan Iskandar Muda Kav V - TA, Pondok Indah', 'Kebayoran Lama, Jakarta Selatan ', '', '', 'NON-GROUP', 'COAL', '01.768.550.4-062.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30525, '30525', 'PT. KWAN SAMUDERA MANDIRI', 'KSM', '', 'Jl. Bandengan Selatan No 43', 'Puri Delta Mas Blok C Kav No 10', 'Pejagalan - Penjaringan, Jakarta Utara', '', '', 'NON-GROUP', 'COAL', '03.040.353.9-041.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30527, '30527', 'PT. ANDALAN SAMUDRA', 'AS', '', 'Jl. Ramin I No. 25 RT 006 RW 008', 'Pemurus Dalam Banjarmasin Selatan', 'Banjarmasin', '', '', 'NON-GROUP', 'COAL', '02.537.716.9-731.001', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30529, '30529', 'PT. PANCA PRIMA PRAKARSA', 'PPP', '', 'Jl. Pramuka Komplek Mitra Mas', 'Blok C1 No 301', 'Banjarmasin - Kalimantan Selatan', '', '', 'NON-GROUP', 'COAL', '02.303.466.3-731.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30530, '30530', 'PT. ARUNG SAMUDERA SEJATI', 'ASS', '', 'Komp. Putra Jaya Bintan', 'Blok N No 26', 'Batam', '', '', 'NON-GROUP', 'COAL', '02.045.414.6-215.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30545, '30545', 'PT. PELAYARAN BERKALA PRIMA', 'PBP', '', 'Jl. Rijali No 63', 'Rijali, Sirimau', 'Ambon Maluku', '', '', 'NON-GROUP', 'COAL', '01.778.857.1-941.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30553, '30553', 'PT. TRIKARSA WIRA SAMUDERA', 'TWS', '', 'Jl. Dahlia II No. 57 RT.34 ', 'Kel. Telawang Kec. Banjarmasin', 'Kalimantan Selatan ', '', '', 'NON-GROUP', 'COAL', '03.063.312.7-731.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30567, '30567', 'PT PRIMA ENERGI MULTI TRADING', 'PEMT', '', 'Jl. Jend. A. Yani Km. 12,2 RT.02', 'Kel. Gambut Barat, Kec. Gambut, Kab. Banjar', 'Kalimantan Selatan', '', '', 'NON-GROUP', 'COAL', '02.531.429.5.732.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30570, '30570', 'PT MITRA JAYA KALIMANTAN BERSINAR', 'MJKB', '', 'Jl. Nelayan RT.01 No. 5', 'Desa Hilir Muara, Kec. Pulau Laut Utara, Kotabaru', 'Kalimantan Selatan', '', '', 'NON-GROUP', 'COAL', '01.719.317.8-732.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30575, '30575', 'PT BINTANG CAKRA BINASAMUDRA', 'BCB', '', 'Jl. Kartika Alam III / 16, RT. 08 / 016', 'Pondok Pinang', 'Jakarta', '', '', 'NON-GROUP', 'COAL', '1.340.856.2-022', '', '', '', 12310, '', '', '', 0, 7, '', '', '', '', '', 1),
(30600, '30600', 'PT TRANS ENERGY INDONESIA', 'TEI', '', 'Jl. Jend. Sudirman Kav. 3-4 PRINCE CENTRE BUILDING', 'Lt. 15 Unit 1505, Karet Tengsin - Tanah Abang', 'Jakarta Pusat - DKI Jakarta', '', '', 'NON-GROUP', 'COAL', '02.505.803.3-022.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30610, '30610', 'PT BORNEO SAMUDRA PERKASA', 'BSP', '', 'Pantai Mentari Blok B - 3', 'Kenjeran - Bulak', 'Surabaya', '', '', 'NON-GROUP', 'COAL', '02.355.573.3-619.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30611, '30611', 'PT PELAYARAN GLORA PERSADA MANDIRI', 'PGPM', '', 'Ruko Palais De Paris Blok I No. 21', 'Kota Deltamas, Sukamahi - Cikarang Pusat', 'Bekasi - Jawa Barat', '', '', 'NON-GROUP', 'COAL', '01.696.411.6-413.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(30618, '30618', 'PT HASNUR INTERNASIONAL SHIPPING', 'HIS', '', 'Wisma 77 Lt. 7. Jl. Letjen S. Parman Kav. 77', 'Slipi - Palmerah', 'Jakarta Barat', '', '', 'NON-GROUP', 'COAL', '02.900.072.6-038.000', '', '', '', 0, '', '', '', 0, 15, '', '', '', '', '', 1),
(30644, '30644', 'PT SIGUR ROS INDONESIA', 'SRI', '', 'Menara Bidakara II Lt. 16 Unit 5 & 6', 'Jl. Jend. Gatot Subroto Kav. 71 - 73', 'Menteng Dalam - Jakarta Selatan', '', '', 'NON-GROUP', 'COAL', '03.178.242.8-015.000', '', '', '', 12870, '', '', '', 0, 30, '', '', '', '', '', 1),
(2100000000, '2100000000', 'GLENCORE INTERNATIONAL, AG', 'GI', '-', 'BAAREEMATTSTRASSE 3, CH-6341', 'BAAR, SWITZERLAND', '', '', '', 'NON-GROUP', 'COAL', '00.000.000.0-000.000', '', '', '', 0, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000001, '2100000001', 'PT. ASMIN KOALINDO TUHUP', 'AKT', '-', 'Gedung Menara Danamon Lt.5', 'Jl. Prof. DR. Satrio Kav. EIV/16, Kuningan Timur - Setiabudi', 'Jakarta Selatan', '', '', 'NON-GROUP', 'COAL', '01.596.051.1-063.000', '', '', '', 12950, '', '', '', 0, 30, '', '', '', '', '', 1),
(2100000002, '2100000002', 'PT BARAMULTI SUGIH SENTOSA', 'BSS', '-', 'The Landmark Center Tower B Lantai 8', 'Jl. Jend Sudirman No. 1 ', 'Jakarta ', '', '', 'NON-GROUP', 'COAL', '01.962.042.6-091.000', '', '', '', 12910, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000003, '2100000003', 'PT MASADA JAYA LINES', 'MJL', '-', 'JL. AHMAD YANI KM 4.2 GG. IAIN', 'KEBUN BUNGA', 'BANJARMASIN', '', '', 'NON-GROUP', 'COAL', '02.303.501.7-731.000', '', '', '', 0, '', '', '', 0, 14, '', '', '', '', '', 1),
(2100000005, '2100000005', 'PT EMKL SUMBER ARTA SAMUDRA JAYA', 'ESASJ', '', 'JL.KINIBALU NO 7 RT 067', 'TELUK DALAM', 'BANJARMASIN TENGAH', '', '', 'NON-GROUP', 'COAL', '03.025.651.5-731.000', '', '', '', 0, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000006, '2100000006', 'PT BINTANG SUKSES MAKMUR', 'BSM', '', 'GD PLAZA ASIA/ABDA ZONE D LT.15', 'Jl. Jend Sudirman Kav 59 Kebayoran Baru', 'Jakarta Selatan', '', '', 'NON-GROUP', 'COAL', '02.914.147.0-012.000', '', '', '', 12910, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000009, '2100000009', 'PT HASIL BUMI KALIMANTAN', 'HBK', 'Helmi', 'Jl. H. Hasan Basri Komp. Pondok Metro Indah Kav.14', 'Alalak Utara', 'Banjarmasin', '', '', 'NON-GROUP', 'COAL', '02.361.855.6-731.000', '', '', '', 0, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000010, '2100000010', 'PT SOLID BLACK GOLD', 'SBG', '', 'Gedung Permata Kuningan Lt. 08', 'Jl. Kuningan Mulia Kav 9C, Guntur - Setiabudi', 'Jakarta Selatan', '', '', 'NON-GROUP', 'COAL', '02.414.725.8-018.000', '', '', '', 12980, '', '', '', 0, 1, '', '', '', '', '', 1),
(2100000013, '2100000013', 'PT ANTANG GUNUNG MERATUS', 'AGM', '', 'The Landmark Center Tower B Lantai 8', 'Jl. Jend Sudirman No. 1 ', 'Jakarta ', '', '', 'NON-GROUP', 'COAL', '01.534.382.5-091.000', '', '', '', 12910, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000014, '2100000014', 'PT SUMBER KURNIA BUANA', 'SKB', '', 'Jl. Suryo Pranoto 2', 'Komplek Harmoni Plaza Blok A-8 , Gambir', 'Jakarta Pusat', '', '', 'NON-GROUP', 'COAL', '01.804.074.1-038.000', '', '', '', 10130, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000021, '2100000021', 'PT PINANG SERVICES INDONESIA', 'PSI', '', 'Wisma Pondok Indah 2 Lt. 2 Suite 201', 'Jl Sultan Iskandar Muda Kav V - TA, Pondok Indah', 'Jakarta Selatan', '', '', 'NON-GROUP', 'COAL', '02.624.391.5-058.000', '', '', '', 12310, '', '', '', 0, 5, '', '', '', '', '', 1),
(2100000022, '2100000022', 'PT PADANGBARA SUKSES MAKMUR', 'PSM', '', 'The East Building Lt. 19, ', 'JL. DR IDE ANAK AGUNG GDE AGUNG KAV. E.3.2 NO.1, KUNINGAN TIMUR - SETIABUDI', 'Jakarta Selatan', '', '', 'NON-GROUP', 'COAL', '02.004.224.8-062.000', '', '', '', 12950, '', '', '', 0, 7, '', '', '', '', '', 1),
(2100000027, '2100000027', 'PT CITRA SAMUDERA RAYA', 'CSR', '', 'GEDUNG RIFA LANTAI 2', 'JL. PROF. DR SATRIO BLOK C-4 KAV 6-7 KUNINGAN', 'Jakarta', '', '', 'NON-GROUP', 'COAL', '00.000.000.0-000.000', '', '', '', 12950, '', '', '', 0, 7, '', '', '', '', '', 1),
(2100000030, '2100000030', 'PT PELITA SAMUDERA SHIPPING', 'PSS', '', 'MENARA CITICON Lt. 19 Unit A, B, Dan C', 'Jl. Letjen S. Parman Kav. 72 RT. 004 RW. 003, Palmerah', 'Jakarta Barat, DKI Jakarta Raya', '', '', 'NON-GROUP', 'COAL', '02.596.644.1-062.000', '', '', '', 0, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000035, '2100000035', 'PT BUNGA TERATAI', 'BT', '', 'GEDUNG RIFA LANTAI 2', 'JL. PROF. DR SATRIO BLOK C-4 KAV 6-7 KUNINGAN', 'Jakarta', '', '', 'NON-GROUP', 'COAL', '00.000.000.0-000.000', '', '', '', 12950, '', '', '', 0, 7, '', '', '', '', '', 1),
(2100000036, '2100000036', 'PT SUMBER REZEKI SAMUDRA JAYA', 'SRSJ', '', 'Jl Katelia Raya AS 1 , No 8', 'Jati Sampurna', 'Bekasi', '', '', 'NON-GROUP', 'COAL', '21.141.824.9-432.000', '', '', '', 17433, '', '', '', 0, 7, '', '', '', '', '', 1),
(2100000037, '2100000037', 'PT LINTAS BENUA HARAPAN INDONESIA', 'LBHI', '', 'Menara Ravindo 10th Floor, Jl. Kebon Sirih Raya Kav. 75', 'Kel. Kebon Sirih Kec. Menteng', 'Jakarta Pusat', '', '', 'NON-GROUP', 'COAL', '21.031.244.3-021.000', '', '', '', 10340, '', '', '', 0, 7, '', '', '', '', '', 1),
(2100000040, '2100000040', 'PT SUMBER GEMA MARINA', 'SGM', '', 'Jl. Purna Sakti Komplek Permatasari Nomor 16 A', 'Banjarmasin', 'Kalimantan Selatan', '', '', 'NON-GROUP', 'COAL', '01.801.820.0-721.000', '', '', '', 70241, '', '', '', 0, 4, '', '', '', '', '', 1),
(2100000042, '2100000042', 'PT. MULTI CARGO ENERGI', 'MCE', '', 'Jl. A. Yani', 'Komp. Bunyamin Permai II Raya V No 7', 'Banjarmasin - Kalsel', '', '', 'NON-GROUP', 'COAL', '02.941.983.5-731.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(2100000045, '2100000045', 'PT. KHARISMA MEGATAMA LINES', 'KML', '', 'RUKU ENGGANO MEGAH BLOK 9-Q RT 000 RW 000', 'KEL. TANJUNG PRIUK KEC. TANJUNG PRIOK', 'JAKARTA UTARA', '', '', 'NON-GROUP', 'COAL', '21.057.079.2-042.000', '', '', '', 0, '', '', '', 0, 7, '', '', '', '', '', 1),
(2300000000, '2300000000', 'PT KALIMANTAN PRIMA PERSADA', 'KPP', '-', 'KOMP. CITRA RAYA ANGKASA BLOK B No. 28-29', 'RT 023 RW 005', 'LANDASAN ULIN TIMUR - BANJARBARU', '', '', 'NON-GROUP', 'COAL', '02.215.531.1-732.000', '', '', '', 70724, '', '', '', 0, 30, '', '', '', '', '', 1),
(2300000001, '2300000001', 'PT PRIMA MULTI MINERAL', 'PMM', '-', 'JL RAWA GELAM I/9 KIP JATINEGARA', 'CAKUNG', 'JAKARTA TIMUR', '', '', 'NON-GROUP', 'COAL', '02.406.252.3-091.000', '', '', '', 13930, '', '', '', 0, 30, '', '', '', '', '', 1),
(2300000002, '2300000002', 'PT TELEN ORBIT PRIMA', 'TOP', '', 'JL. RAYA BEKASI KM 22', 'CAKUNG', 'JAKARTA', '', '', 'NON-GROUP', 'COAL', '01.936.376.1-007.000', '', '', '', 13910, '', '', '', 0, 30, '', '', '', '', '', 1),
(2300000006, '2300000006', 'PT KADYA CARAKA MULIA', 'KCM', '', 'KOMP. CITRA RAYA ANGKASA BLOK A No. 8', 'RT 022 RW 005', 'LANDANSAN ULIN TIMUR - BANJARBARU', '', '', 'NON-GROUP', 'COAL', '01.330.521.4.732.000', '', '', '', 70724, '', '', '', 0, 30, '', '', '', '', '', 1),
(2300000007, '2300000007', 'PT. TUAH TURANGGA AGUNG', 'TTA', '', 'JL. RAYA BEKASI KM 22', 'CAKUNG BARAT - CAKUNG', 'JAKARTA', '', '', 'NON-GROUP', 'COAL', '02.545.603.9-006.000', '', '', '', 13910, '', '', '', 0, 30, '', '', '', '', '', 1),
(2300000008, '2300000008', 'PT ASMIN BARA BRONANG', 'ABB', '', 'Gedung Setiabudi Atrium Lt. 6 Suite 606-608', 'Jl. HR RASUNA SAID KAV. 62', 'KARET - SETIABUDI, JAKSEL', '', '', 'NON-GROUP', 'COAL', '01.596.052.9-011.000', '', '', '', 0, '', '', '', 0, 15, '', '', '', '', '', 1),
(2300000009, '2300000009', 'PT.DNC', 'DNC', '', '', '', '', '', '', '', 'COAL', '', '', '', '', 0, '', '', '', 0, 0, '', '', '', '', '', 1),
(2300000010, '2300000010', 'PT.DN', 'DN', '', '', '', '', '', '', '', 'COAL', '', '', '', '', 0, '', '', '', 0, 0, '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_bank_acc`
--

CREATE TABLE IF NOT EXISTS `customer_bank_acc` (
  `id_customer_bank_acc` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_customer` bigint(20) NOT NULL,
  `BankName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BranchAddress` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BankCity` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountNumber` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `id_currency` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_customer_bank_acc`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_users`
--

CREATE TABLE IF NOT EXISTS `customer_users` (
  `id_customer_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `userid` varchar(45) NOT NULL,
  PRIMARY KEY (`id_customer_user`),
  KEY `id_customer` (`id_customer`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `customer_users`
--

INSERT INTO `customer_users` (`id_customer_user`, `id_customer`, `userid`) VALUES
(1, 450, 'pttuah_user'),
(2, 30387, 'megasuryauser');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_voice`
--

CREATE TABLE IF NOT EXISTS `customer_voice` (
  `id_customor_voice` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_customer` bigint(20) NOT NULL,
  `userid` varchar(45) NOT NULL,
  `voyage_number` varchar(50) NOT NULL,
  `id_voyage_order` bigint(20) NOT NULL,
  `voice` text NOT NULL,
  `is_view` int(1) NOT NULL,
  `is_reply` int(1) NOT NULL,
  `reply` text NOT NULL,
  `status` set('APPROVED','REJECT') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  `replied_date` datetime NOT NULL,
  `replied_user` varchar(45) NOT NULL,
  `ip_user_replied` varchar(50) NOT NULL,
  PRIMARY KEY (`id_customor_voice`),
  KEY `id_customer` (`id_customer`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `customer_voice`
--

INSERT INTO `customer_voice` (`id_customor_voice`, `id_customer`, `userid`, `voyage_number`, `id_voyage_order`, `voice`, `is_view`, `is_reply`, `reply`, `status`, `created_date`, `created_user`, `ip_user_updated`, `replied_date`, `replied_user`, `ip_user_replied`) VALUES
(1, 450, 'admin', '', 0, 'Perusahaan ini sepertinya semakin baik saja di hari-hari ke depan', 0, 0, '', '', '2014-09-23 10:09:56', 'admin', '::1', '0000-00-00 00:00:00', '', ''),
(6, 450, 'pttuah_user', '', 0, 'Perusahaan PML sepertinya bagus untuk diajak kerjasama. Terima kasih untuk kerjasamanya', 0, 0, '', '', '2014-10-14 16:58:33', 'pttuah_user', '::1', '0000-00-00 00:00:00', '', ''),
(7, 450, 'pttuah_user', '', 0, 'Perusahaan ini diajak kerjasama ke depan.', 0, 0, '', '', '2014-10-14 17:01:36', 'pttuah_user', '::1', '0000-00-00 00:00:00', '', ''),
(8, 450, 'pttuah_user', '', 0, 'Pekerjaan sudah bagus. Tinggalkan tolong tingkatkan lebih baik lagi.', 0, 0, '', '', '2014-10-14 19:28:15', 'pttuah_user', '::1', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `damage_report`
--

CREATE TABLE IF NOT EXISTS `damage_report` (
  `id_damage_report` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel` int(11) NOT NULL,
  `id_request_for_schedule` bigint(20) NOT NULL,
  `DamageReportNumber` varchar(250) NOT NULL,
  `NoReport` int(11) NOT NULL,
  `NoMonth` int(2) NOT NULL,
  `NoYear` int(4) NOT NULL,
  `Date` date NOT NULL,
  `Description` text NOT NULL,
  `PIC` varchar(256) NOT NULL,
  `Status` set('OPEN','REPAIRING','CLOSED') NOT NULL DEFAULT 'OPEN',
  `DamageTime` date NOT NULL,
  `CausedDamage` text NOT NULL,
  `DamagePhoto` varchar(256) NOT NULL,
  `Suggestion` text NOT NULL,
  `Master` varchar(256) NOT NULL,
  `ChiefEngineer` varchar(256) NOT NULL,
  PRIMARY KEY (`id_damage_report`),
  KEY `id_vessel` (`id_vessel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `damage_report`
--

INSERT INTO `damage_report` (`id_damage_report`, `id_vessel`, `id_request_for_schedule`, `DamageReportNumber`, `NoReport`, `NoMonth`, `NoYear`, `Date`, `Description`, `PIC`, `Status`, `DamageTime`, `CausedDamage`, `DamagePhoto`, `Suggestion`, `Master`, `ChiefEngineer`) VALUES
(1, 1601001, 0, '', 0, 0, 0, '2014-12-25', 'ADARA nabrak karang', 'Bpk. Andi', 'OPEN', '2014-12-10', 'Kurang hati-hati', 'damagephoto_20141209153646_1.jpg', 'Segera diperbaiki', 'Master Fu', 'CE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `damage_report_repair`
--

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `debit_note`
--

CREATE TABLE IF NOT EXISTS `debit_note` (
  `id_debit_note` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `transaction_date` date NOT NULL,
  `amount` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `id_debit_note_category` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `omitted_status` set('NONE','PROCEED','OMIT') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_debit_note`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `omiited_status` (`omitted_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `demurage_cost`
--

CREATE TABLE IF NOT EXISTS `demurage_cost` (
  `id_demurage_cost` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `transaction_date` date NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `is_invoice_created` int(1) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `id_invoice_voyage` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_demurage_cost`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `omiited_status` (`amount`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `demurage_cost`
--

INSERT INTO `demurage_cost` (`id_demurage_cost`, `id_voyage_order`, `transaction_date`, `description`, `amount`, `is_invoice_created`, `invoice_number`, `id_invoice_voyage`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 2, '2014-10-10', 'Demurage Cost karena keterlambatan yang disebabkan oleh user', 250000.00, 0, '', 0, '2015-01-22 15:10:00', 'admin', '::1'),
(2, 2, '2014-10-10', 'as', 250000.00, 0, '', 0, '2015-01-19 06:09:08', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `finding_report`
--

CREATE TABLE IF NOT EXISTS `finding_report` (
  `id_finding_report` bigint(20) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `FindingReportNumber` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `TypeSurvey` set('ANNUAL','REGULAR') COLLATE latin1_general_ci NOT NULL,
  `NoReport` int(11) NOT NULL,
  `NoMonth` int(2) NOT NULL,
  `NoYear` int(4) NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `Status` set('OPEN','PARTIALLY REPAIRED','FULL REPAIRED','UNREPAIRED') COLLATE latin1_general_ci NOT NULL DEFAULT 'OPEN',
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_finding_report`),
  KEY `id_vessel` (`id_vessel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `finding_report`
--

INSERT INTO `finding_report` (`id_finding_report`, `Date`, `FindingReportNumber`, `TypeSurvey`, `NoReport`, `NoMonth`, `NoYear`, `id_vessel`, `Status`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, '2014-12-10', '', '', 0, 0, 0, 1601001, 'OPEN', '2014-12-09 15:37:18', 'admin', '::1'),
(2, '2014-12-19', '', '', 0, 0, 0, 1601003, 'OPEN', '2014-12-12 13:23:08', 'admin', '::1'),
(3, '2014-12-18', '', '', 0, 0, 0, 1601006, 'OPEN', '2014-12-12 16:17:51', 'admin', '::1'),
(4, '2015-02-05', '', '', 0, 0, 0, 1601001, 'OPEN', '2015-02-03 15:20:39', 'admin', '::1'),
(5, '2015-02-05', '', '', 0, 0, 0, 6609002, 'OPEN', '2015-02-03 15:23:19', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `finding_report_detail`
--

CREATE TABLE IF NOT EXISTS `finding_report_detail` (
  `id_finding_report_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_finding_report` bigint(20) NOT NULL,
  `id_part` int(11) NOT NULL,
  `ProblemIdentification` text COLLATE latin1_general_ci NOT NULL,
  `Location` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `ImageLink` text COLLATE latin1_general_ci NOT NULL,
  `PIC` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `CorrectiveAction` text COLLATE latin1_general_ci NOT NULL,
  `DueDate` date NOT NULL,
  `Status` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `PreventiveAction` text COLLATE latin1_general_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_finding_report_detail`),
  KEY `id_finding_report` (`id_finding_report`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuel`
--

CREATE TABLE IF NOT EXISTS `fuel` (
  `id_fuel` int(11) NOT NULL AUTO_INCREMENT,
  `fuel` varchar(100) NOT NULL,
  `fuel_price` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `SK` varchar(200) NOT NULL,
  `fuel_price_updated` datetime NOT NULL,
  `fuel_price_updated_by` varchar(64) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fuel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `fuel`
--

INSERT INTO `fuel` (`id_fuel`, `fuel`, `fuel_price`, `id_currency`, `SK`, `fuel_price_updated`, `fuel_price_updated_by`, `ip_user_updated`) VALUES
(1, 'HSD Solar', 7500.00, 1, '', '2015-01-29 06:13:59', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuel_consumption_daily`
--

CREATE TABLE IF NOT EXISTS `fuel_consumption_daily` (
  `id_fuel_consumption_daily` bigint(20) NOT NULL AUTO_INCREMENT,
  `log_date` datetime NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `last_fuel_remain` double(20,2) NOT NULL,
  `status_remain` set('ROB','BUNKERING','TRANSFER IN','TRANSFER OUT') NOT NULL,
  `pic` varchar(250) NOT NULL,
  `last_longitude` varchar(30) NOT NULL,
  `last_latitude` varchar(30) NOT NULL,
  `NearestJettyId` int(11) NOT NULL,
  `NearestDistancePoint` double(20,2) NOT NULL COMMENT 'km',
  `status_voyage` set('IDLE','VOYAGE') NOT NULL,
  `id_voyage_order` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fuel_consumption_daily`),
  KEY `month` (`month`),
  KEY `year` (`year`),
  KEY `id_voyage_order` (`id_voyage_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data untuk tabel `fuel_consumption_daily`
--

INSERT INTO `fuel_consumption_daily` (`id_fuel_consumption_daily`, `log_date`, `month`, `year`, `id_vessel`, `last_fuel_remain`, `status_remain`, `pic`, `last_longitude`, `last_latitude`, `NearestJettyId`, `NearestDistancePoint`, `status_voyage`, `id_voyage_order`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, '2015-01-30 00:00:00', 1, 2015, 1770001, 6500.00, 'ROB', '', '', '', 20001, 500.00, '', 0, '2015-01-30 21:39:18', 'admin', '::1'),
(2, '2015-01-28 00:00:00', 1, 2015, 1770001, 7000.00, 'ROB', '', '', '', 20001, 34.00, '', 0, '2015-01-30 21:39:51', 'admin', '::1'),
(3, '2015-01-22 00:00:00', 1, 2015, 1770001, 3500.00, 'ROB', '', '', '', 20004, 560.00, '', 0, '2015-01-30 21:41:14', 'admin', '::1'),
(4, '2015-01-31 00:00:00', 1, 2015, 1770001, 7000.00, 'ROB', '', '', '', 110004, 600.00, '', 0, '2015-01-30 21:41:40', 'admin', '::1'),
(5, '2015-01-23 00:00:00', 1, 2015, 1770001, 4500.00, 'ROB', '', '', '', 110001, 200.00, '', 0, '2015-01-31 07:54:18', 'admin', '::1'),
(6, '2015-01-30 00:00:00', 1, 2015, 1770001, 6400.00, 'ROB', '', '', '', 110003, 450.00, '', 0, '2015-01-31 07:55:23', 'admin', '::1'),
(7, '2015-01-24 00:00:00', 1, 2015, 1770001, 6500.00, 'ROB', 'Andrian Patahilah', '', '', 20001, 12.00, '', 0, '2015-01-31 07:58:16', 'admin', '::1'),
(8, '2015-01-29 17:27:00', 1, 2015, 1770001, 44455.00, 'ROB', 'dgd', '', '', 20001, 34.00, '', 0, '2015-01-31 08:03:37', 'admin', '::1'),
(9, '2015-01-25 00:00:00', 1, 2015, 1770001, 4500.00, 'ROB', 'gsds', '', '', 110001, 34.00, '', 0, '2015-01-31 08:04:45', 'admin', '::1'),
(13, '2015-01-29 07:23:00', 1, 2015, 1770001, 1200.00, 'ROB', 'asd', '', '', 110002, 12.00, '', 0, '2015-01-31 09:11:27', 'admin', '::1'),
(27, '2015-01-16 00:00:00', 1, 2015, 1770001, 4500.00, 'ROB', 'dsd', '', '', 20001, 25.00, '', 0, '2015-01-31 10:08:26', 'admin', '::1'),
(31, '2015-01-29 07:23:00', 1, 2015, 1770001, 1200.00, 'ROB', 'asd', '', '', 110002, 12.00, '', 0, '2015-01-31 10:12:04', 'admin', '::1'),
(32, '2015-01-22 00:00:00', 1, 2015, 1770001, 4500.00, 'ROB', 'Badalah', '', '', 110003, 12.00, '', 0, '2015-01-31 11:25:34', 'admin', '::1'),
(33, '2015-01-22 00:00:00', 1, 2015, 1770001, 4500.00, 'ROB', 'Badalah', '', '', 110003, 12.00, '', 0, '2015-01-31 11:25:48', 'admin', '::1'),
(34, '2015-01-22 00:00:00', 1, 2015, 1770001, 4500.00, 'ROB', 'Badalah', '', '', 110003, 12.00, '', 0, '2015-01-31 11:27:13', 'admin', '::1'),
(35, '2015-01-31 09:21:00', 1, 2015, 1770001, 67.00, 'ROB', 'tyrtyrt', '', '', 20001, 0.00, '', 0, '2015-01-31 11:30:10', 'admin', '::1'),
(36, '2015-01-31 09:21:00', 1, 2015, 1770001, 67.00, 'ROB', 'tyrtyrt', '', '', 20001, 0.00, '', 0, '2015-01-31 11:40:42', 'admin', '::1'),
(37, '2015-02-14 06:00:00', 2, 2015, 1770002, 45000.00, 'ROB', 'Saya', '', '', 20001, 0.00, '', 0, '2015-02-05 11:59:37', 'admin', '::1'),
(38, '2015-02-04 00:00:00', 2, 2015, 1802010, 4000.00, 'ROB', 'sda', '', '', 20001, 0.00, '', 0, '2015-02-05 15:33:18', 'admin', '::1'),
(39, '2015-02-05 00:00:00', 2, 2015, 1802010, 3777.00, 'ROB', 'as', '', '', 20001, 0.00, '', 0, '2015-02-05 15:34:03', 'admin', '::1'),
(40, '2015-02-03 00:00:00', 2, 2015, 1710006, 2750.00, 'ROB', 'Badalah', '', '', 20001, 0.00, '', 0, '2015-02-05 15:36:30', 'admin', '::1'),
(41, '2015-02-01 09:00:00', 2, 2015, 1770007, 5600.00, 'ROB', 'Bayu', '', '', 20001, 0.00, '', 0, '2015-02-05 16:02:05', 'admin', '::1'),
(42, '2015-02-02 08:29:00', 2, 2015, 1770007, 4443.00, 'ROB', 'Nandang', '', '', 20001, 0.00, '', 0, '2015-02-05 16:02:25', 'admin', '::1'),
(43, '2015-02-04 00:00:00', 2, 2015, 1770007, 6500.00, 'ROB', 'a', '', '', 20001, 0.00, '', 0, '2015-02-05 16:02:46', 'admin', '::1'),
(44, '2015-02-04 15:00:00', 2, 2015, 1770007, 7777.00, 'ROB', 'dsd', '', '', 20001, 0.00, '', 0, '2015-02-05 16:03:04', 'admin', '::1'),
(45, '2015-01-30 13:21:00', 1, 2015, 1770007, 3488.00, 'ROB', 'Badung', '', '', 20001, 0.00, '', 0, '2015-02-05 16:03:27', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuel_price_history`
--

CREATE TABLE IF NOT EXISTS `fuel_price_history` (
  `id_fuel_price_history` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_currency` int(11) NOT NULL,
  `fuel_price` double(20,2) NOT NULL,
  `SK` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fuel_price_history`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `fuel_price_history`
--

INSERT INTO `fuel_price_history` (`id_fuel_price_history`, `id_currency`, `fuel_price`, `SK`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1, 12500.00, '', '2014-09-19 21:01:19', 'admin', '::1'),
(2, 1, 11250.00, '', '2015-01-16 06:02:28', 'admin', '::1'),
(3, 1, 7500.00, '', '2015-01-29 06:13:59', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuel_transaction_type`
--

CREATE TABLE IF NOT EXISTS `fuel_transaction_type` (
  `id_fuel_transaction_type` int(11) NOT NULL,
  `fuel_transaction_type` varchar(200) NOT NULL,
  `category` set('+','-') NOT NULL,
  PRIMARY KEY (`id_fuel_transaction_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fuel_transaction_type`
--

INSERT INTO `fuel_transaction_type` (`id_fuel_transaction_type`, `fuel_transaction_type`, `category`) VALUES
(1, 'bunkering', '+'),
(2, 'consumpt', '-'),
(11, 'transfer in', '+'),
(12, 'transfer out', '-');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `good_issue`
--

INSERT INTO `good_issue` (`id_good_issue`, `id_purchase_order`, `id_purchase_order_detail`, `id_po_category`, `received_date`, `receive_by`, `condition`, `notes`, `amount`, `purchase_item_table`, `id_item`, `item_add_info`, `quantity`, `metric`, `receive_number`, `status_receive`, `dedicated_to`, `id_vessel`, `id_voyage_order`, `created_user`, `created_date`, `ip_user_updated`) VALUES
(3, 0, 2, 0, '2015-02-11', 'Saya', 'Bagus', 'Ok', 0.00, '', 0, '', 12, 'LTR', 1, '', '', 1601003, 0, 'admin', '2015-02-03 02:46:02', '::1'),
(5, 0, 7, 0, '2015-02-10', 'as', 'as', 'asdas', 0.00, '', 0, '', 12, 'unit', 1, '', '', 1903003, 0, 'admin', '2015-02-03 04:12:29', '::1'),
(6, 0, 7, 0, '2015-02-13', 'as', 'a', 'as', 0.00, '', 0, '', 12, 'lot', 1, '', '', 1601001, 0, 'admin', '2015-02-03 04:13:20', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `good_receive`
--

CREATE TABLE IF NOT EXISTS `good_receive` (
  `id_good_receive` bigint(20) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_good_receive`),
  KEY `id_purchase_order` (`id_purchase_order`),
  KEY `id_item` (`id_item`),
  KEY `id_po_category` (`id_po_category`),
  KEY `id_purchase_order_detail` (`id_purchase_order_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `good_receive`
--

INSERT INTO `good_receive` (`id_good_receive`, `id_purchase_order`, `id_purchase_order_detail`, `id_po_category`, `received_date`, `receive_by`, `condition`, `notes`, `amount`, `purchase_item_table`, `id_item`, `item_add_info`, `quantity`, `metric`, `receive_number`, `status_receive`, `dedicated_to`, `id_vessel`, `id_voyage_order`, `created_user`, `created_date`, `ip_user_updated`) VALUES
(1, 0, 2, 0, '2015-02-03', 'test', '23', 'test', 0.00, '', 0, '', 12, 'MT', 1, 'PARTIAL', '', 1601008, 0, 'admin', '2015-02-03 01:36:45', '::1'),
(4, 0, 2, 0, '2015-02-11', 'asd', 'a', 'as', 0.00, '', 0, '', 12, 'LTR', 1, 'PARTIAL', '', 1710006, 0, 'admin', '2015-02-03 02:54:44', '::1'),
(7, 0, 7, 0, '2015-02-11', 'Armand', 'Bagus', 'as', 0.00, '', 0, '', 15, 'unit', 1, 'PARTIAL', '', 0, 0, 'admin', '2015-02-03 04:03:28', '::1'),
(8, 0, 7, 0, '2015-02-11', 's', 'a', 'a', 0.00, '', 0, '', 12, 'lot', 1, 'PARTIAL', '', 0, 0, 'admin', '2015-02-03 04:03:48', '::1'),
(9, 0, 4, 0, '2015-02-18', 'Saya', 'Baugs', 'bas', 0.00, '', 0, '', 500, 'LTR', 12, 'PARTIAL', '', 1770001, 0, 'admin', '2015-02-17 09:40:47', '::1'),
(10, 0, 4, 0, '2015-02-18', 'asd', 'da', 'Diterima ke yang kedua', 0.00, '', 0, '', 450, 'LTR', 2, 'PARTIAL', '', 1770002, 0, 'admin', '2015-02-17 09:41:44', '127.0.0.1'),
(11, 0, 4, 0, '2015-02-16', 's', 'bagus', 'Next tanggal', 0.00, '', 0, '', 300, 'LTR', 3, 'PARTIAL', '', 1770003, 0, 'admin', '2015-02-17 09:43:07', '::1'),
(12, 0, 4, 0, '2015-02-19', 'Dadang', 'Bagus Sekali', 'Bunkering Lagi Boss', 0.00, '', 0, '', 250, 'LTR', 4, 'PARTIAL', '', 1770001, 0, 'admin', '2015-02-17 10:10:46', '::1'),
(13, 0, 4, 0, '2015-02-19', 'Dadang', 'Bagus Sekali', 'Bunkering Lagi Boss', 0.00, '', 0, '', 250, 'LTR', 4, 'PARTIAL', '', 1770001, 0, 'admin', '2015-02-17 10:12:15', '::1'),
(14, 0, 4, 0, '2015-02-19', 'Dadang', 'Bagus Sekali', 'Bunkering Lagi Boss', 0.00, '', 0, '', 250, 'LTR', 4, 'PARTIAL', '', 1770001, 0, 'admin', '2015-02-17 10:12:38', '::1'),
(15, 0, 4, 0, '2015-02-19', 'Dadang', 'Bagus Sekali', 'Bunkering Lagi Boss', 0.00, '', 0, '', 250, 'LTR', 4, 'PARTIAL', '', 1770001, 0, 'admin', '2015-02-17 10:13:04', '::1'),
(16, 0, 4, 0, '2015-02-19', 'Dadang', 'Bagus Sekali', 'Bunkering Lagi Boss', 0.00, '', 0, '', 250, 'LTR', 4, 'PARTIAL', '', 1770001, 0, 'admin', '2015-02-17 10:15:03', '::1'),
(17, 0, 4, 0, '2015-02-19', 'Dadang', 'Bagus Sekali', 'Bunkering Lagi Boss', 0.00, '', 0, '', 250, 'LTR', 4, 'PARTIAL', '', 1770001, 0, 'admin', '2015-02-17 10:15:06', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_part`
--

CREATE TABLE IF NOT EXISTS `inventory_part` (
  `inventory_part` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_part` bigint(20) NOT NULL,
  `dedicated_to` set('WAREHOUSE','VESSEL') NOT NULL,
  `id_warehouse` int(11) NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `last_stock` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`inventory_part`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_voyage`
--

CREATE TABLE IF NOT EXISTS `invoice_voyage` (
  `id_invoice_voyage` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `InvoiceNumber` varchar(50) NOT NULL,
  `print_CompanyName` text NOT NULL,
  `print_ShippingAddress` text NOT NULL,
  `print_NPWP` varchar(150) NOT NULL,
  `print_NoFakturPajak` varchar(50) NOT NULL,
  `print_top` int(11) NOT NULL,
  `print_slot1` date NOT NULL,
  `print_slot2` date NOT NULL,
  `sales_code` varchar(50) NOT NULL,
  `print_CustomerCode` varchar(150) NOT NULL,
  `invoice_description` text NOT NULL,
  `invoice_marks` text NOT NULL,
  `invoice_termdelivery` varchar(150) NOT NULL,
  `invoice_duedate` date NOT NULL,
  `VoyageNumber` varchar(100) NOT NULL,
  `VoyageOrderNumber` varchar(200) NOT NULL,
  `VONo` int(11) NOT NULL,
  `VOMonth` int(2) NOT NULL,
  `VOYear` int(4) NOT NULL,
  `id_quotation` bigint(20) NOT NULL,
  `id_so` bigint(20) NOT NULL,
  `bussiness_type_order` int(11) NOT NULL,
  `BargingVesselTug` int(11) NOT NULL,
  `BargingVesselBarge` int(11) NOT NULL,
  `BargeSize` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `TugPower` int(11) NOT NULL,
  `BargingJettyIdStart` int(11) NOT NULL,
  `BargingJettyIdEnd` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `ActualStartDate` datetime NOT NULL,
  `ActualEndDate` datetime NOT NULL,
  `period_year` int(4) NOT NULL,
  `period_month` int(2) NOT NULL,
  `period_quartal` int(1) NOT NULL,
  `Price` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `fuel_price` double(20,2) NOT NULL,
  `PaymentStatus` set('UNPAID','PAID') NOT NULL,
  `PaymentAmount` double(20,2) NOT NULL,
  `PaymentBankAccountID` int(11) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentLate` int(11) NOT NULL,
  `print_sign_name` varchar(250) NOT NULL,
  `print_sign_position` varchar(150) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_invoice_voyage`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `invoice_voyage`
--

INSERT INTO `invoice_voyage` (`id_invoice_voyage`, `id_voyage_order`, `id_customer`, `InvoiceDate`, `InvoiceNumber`, `print_CompanyName`, `print_ShippingAddress`, `print_NPWP`, `print_NoFakturPajak`, `print_top`, `print_slot1`, `print_slot2`, `sales_code`, `print_CustomerCode`, `invoice_description`, `invoice_marks`, `invoice_termdelivery`, `invoice_duedate`, `VoyageNumber`, `VoyageOrderNumber`, `VONo`, `VOMonth`, `VOYear`, `id_quotation`, `id_so`, `bussiness_type_order`, `BargingVesselTug`, `BargingVesselBarge`, `BargeSize`, `Capacity`, `TugPower`, `BargingJettyIdStart`, `BargingJettyIdEnd`, `StartDate`, `EndDate`, `ActualStartDate`, `ActualEndDate`, `period_year`, `period_month`, `period_quartal`, `Price`, `id_currency`, `change_rate`, `fuel_price`, `PaymentStatus`, `PaymentAmount`, `PaymentBankAccountID`, `PaymentDate`, `PaymentLate`, `print_sign_name`, `print_sign_position`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1, 450, '2015-01-11', '1234', 'PT. TUAH TURANGGA AGUNG', 'JL. RAYA BEKASI KM 22', '02.545.603.9-006.000', '11', 30, '0000-00-00', '0000-00-00', '2300000002', '450', '1', '1', '1', '2015-02-10', '12', 'PML/VO/1/XII/2014', 1, 12, 2014, 1, 1, 100, 1770007, 1601001, 240, 5000, 1600, 20001, 20003, '2014-12-25', '2014-12-31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 6000.00, 1, 1.00, 12500.00, 'UNPAID', 0.00, 0, '0000-00-00', 0, '', '', '2015-01-11 21:16:27', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jetty`
--

CREATE TABLE IF NOT EXISTS `jetty` (
  `JettyId` int(11) NOT NULL AUTO_INCREMENT,
  `JettyName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `JettyPosition` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `Acronym` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `Longitude` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Latitude` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Status` set('ACTIVE','INACTIVE') COLLATE latin1_general_ci NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`JettyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=200010 ;

--
-- Dumping data untuk tabel `jetty`
--

INSERT INTO `jetty` (`JettyId`, `JettyName`, `JettyPosition`, `Acronym`, `Longitude`, `Latitude`, `Status`) VALUES
(20001, 'BATU LICIN', 'BATU LICIN', 'BTL', '', '', 'ACTIVE'),
(20002, 'BINTANG NINGGI', 'BINTANG NINGGI', 'BNG', '', '', 'ACTIVE'),
(20003, 'BOJONEGARA', 'BOJONEGARA', '', '', '', 'ACTIVE'),
(20004, 'BUNATI', 'BUNATI', 'BNT', '', '', 'ACTIVE'),
(20010, 'BENGKUANG', 'BENGKUANG', '', '', '', 'ACTIVE'),
(30001, 'CENKO', 'CENKO', 'CNK', '', '', 'ACTIVE'),
(30002, 'CIREBON', 'CIREBON', '', '', '', 'ACTIVE'),
(30003, 'CIGADING', 'CIGADING', '', '', '', 'ACTIVE'),
(30004, 'CIWANDAN', 'CIWANDAN', '', '', '', 'ACTIVE'),
(70001, 'GARONGKONG ', 'GARONGKONG ', '', '', '', 'ACTIVE'),
(70002, 'GRESIK', 'GRESIK', '', '', '', 'ACTIVE'),
(100001, 'JETTY WAHAP', 'JETTY WAHAP', 'SPP', '', '', 'ACTIVE'),
(110001, 'KELANIS', 'KELANIS', 'KLN', '', '', 'ACTIVE'),
(110002, 'KINTAP', 'KINTAP', 'KTP', '', '', 'ACTIVE'),
(110003, 'KUMAI', 'KUMAI', 'KMI', '', '', 'ACTIVE'),
(110004, 'KLANIS', 'KLANIS', '', '', '', 'ACTIVE'),
(120001, 'LAMONGAN', 'LAMONGAN', 'LAM', '', '', 'ACTIVE'),
(120002, 'LEMO', 'LEMO', '', '', '', 'ACTIVE'),
(130001, 'MAKASAR', 'MAKASAR', '', '', '', 'ACTIVE'),
(130002, 'MARABAHAN', 'MARABAHAN', 'MBH', '', '', 'ACTIVE'),
(130003, 'MERAK', 'MERAK', '', '', '', 'ACTIVE'),
(130004, 'MTU', 'MTU', 'MTU', '', '', 'ACTIVE'),
(130005, 'MUARABAKAH', 'MUARABAKAH', 'MBK', '', '', 'ACTIVE'),
(130006, 'MUARASATUI', 'MUARASATUI', '', '', '', 'ACTIVE'),
(130007, 'MERUNDA', 'MERUNDA', '', '', '', 'ACTIVE'),
(130008, 'MITRA BARITO', 'MITRA BARITO', '', '', '', 'ACTIVE'),
(160001, 'PAITON', 'PAITON', 'PTN', '', '', 'ACTIVE'),
(160002, 'PARING LAHUNG', 'PARING LAHUNG', 'PLG', '', '', 'ACTIVE'),
(160003, 'PEMANCINGAN', 'PEMANCINGAN', '', '', '', 'ACTIVE'),
(160004, 'PRIOK', 'PRIOK', '', '', '', 'ACTIVE'),
(160005, 'PELABUHAN SAMPIT', 'PELABUHAN SAMPIT', '', '', '', 'ACTIVE'),
(190001, 'SAMPIT', 'SAMPIT', '', '', '', 'ACTIVE'),
(190002, 'SERONGGA', 'SERONGGA', 'SRG', '', '', 'ACTIVE'),
(190003, 'SUDAN', 'SUDAN', '', '', '', 'ACTIVE'),
(190004, 'SUNGAI DANAU', 'SUNGAI DANAU', 'SDN', '', '', 'ACTIVE'),
(190005, 'SUNGAI DURIAN', 'SUNGAI DURIAN', 'SDR', '', '', 'ACTIVE'),
(190006, 'SUNGAI PUTING', 'SUNGAI PUTING', 'SPT', '', '', 'ACTIVE'),
(190007, 'SATUI', 'SATUI', '', '', '', 'ACTIVE'),
(190011, 'SALAT BARU', 'SALAT BARU', '', '', '', 'ACTIVE'),
(200001, 'TABONEO', 'TABONEO', 'TBN', '', '', 'ACTIVE'),
(200002, 'TALIO', 'TALIO', 'TLO', '', '', 'ACTIVE'),
(200003, 'TARJUN', 'TARJUN', '', '', '', 'ACTIVE'),
(200004, 'TELANG BARU', 'TELANG BARU', 'TLB', '', '', 'ACTIVE'),
(200005, 'TELUK TIMBAU', 'TELUK TIMBAU', 'TTB', '', '', 'ACTIVE'),
(200006, 'TRISAKTI', 'TRISAKTI', '', '', '', 'ACTIVE'),
(200007, 'TUBAN', 'TUBAN', '', '', '', 'ACTIVE'),
(200008, 'TANJUNG PRIOK', 'TANJUNG PRIOK', '', '', '', 'ACTIVE'),
(200009, 'TALENTA', 'TALENTA', '', '', '', 'ACTIVE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_inbox`
--

CREATE TABLE IF NOT EXISTS `message_inbox` (
  `id_inbox` bigint(20) NOT NULL AUTO_INCREMENT,
  `code_id` varchar(100) NOT NULL,
  `to_inbox` varchar(32) NOT NULL,
  `from_inbox` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `status` set('in','read','new') NOT NULL,
  PRIMARY KEY (`id_inbox`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data untuk tabel `message_inbox`
--

INSERT INTO `message_inbox` (`id_inbox`, `code_id`, `to_inbox`, `from_inbox`, `title`, `message`, `date`, `status`) VALUES
(24, '1ff1de774005f8da13f42943881c655f', 'reno', 'ichsanmust', 'Tugas', 'Ren hayu urang ulin', '2014-06-20 09:41:26', 'read'),
(25, '8e296a067a37563370ded05f5a3bf3ec', 'ichsanmust', 'reno', 'Re : Tugas', 'tugas ulin haha', '2014-06-20 09:42:51', 'read'),
(26, '4e732ced3463d06de0ca9a15b6153677', 'sinung', 'admin', 'Hallo Kenalan ya', 'Hallo test. Ini saya admin mau kenalan ke anda apakah boleh atau tidak?', '2014-07-10 09:12:56', 'read'),
(29, '6ea9ab1baa0efb9e19094440c317e21b', 'sinung', 'admin', 'Re : Re : Hallo Kenalan ya', 'Apaan sih....', '2014-07-11 09:19:50', 'read'),
(30, '34173cb38f07f89ddbebc2ac9128303f', 'admin', 'sinung', 'Tolong di filter lagi lah ya...', 'Post message ', '2014-07-11 09:40:10', 'read'),
(31, 'c16a5320fa475530d9583c34fd356ef5', 'admin', 'sinung', 'Re : Hallo Kenalan ya', 'Yeah..nama saya andi. Kamu sapa?', '2014-08-13 08:57:52', 'read'),
(32, '6364d3f0f495b6ab9dcf8d3b5c6e0b01', 'admin', 'admin', 'Test ke saya sendiri', 'Ini hanya untuk test saja', '2014-10-31 08:55:34', 'read'),
(33, '182be0c5cdcd5072bb1864cdee4d3d6e', 'admin', 'admin', 'Re : Test ke saya sendiri', 'Wow sudah direpy', '2014-10-31 08:56:08', 'read'),
(34, 'e369853df766fa44e1ed0ff613f563bd', 'admin', 'headoperationtester', 'Hallo', 'Hallo Admin\r\n\r\nIni kenapa sistem saya jadi seperti ini ya?\r\nMohon diperbaiki dong. Jangan dibuat seperti ini terus hehe...', '2014-12-30 11:03:45', 'read');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_outbox`
--

CREATE TABLE IF NOT EXISTS `message_outbox` (
  `id_outbox` bigint(20) NOT NULL AUTO_INCREMENT,
  `code_id` varchar(100) NOT NULL,
  `to_outbox` varchar(32) NOT NULL,
  `from_outbox` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `status` set('draft','sent') NOT NULL,
  PRIMARY KEY (`id_outbox`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data untuk tabel `message_outbox`
--

INSERT INTO `message_outbox` (`id_outbox`, `code_id`, `to_outbox`, `from_outbox`, `title`, `message`, `date`, `status`) VALUES
(24, '1ff1de774005f8da13f42943881c655f', 'reno', 'ichsanmust', 'Tugas', 'Ren hayu urang ulin', '2014-06-20 09:41:26', 'sent'),
(25, '8e296a067a37563370ded05f5a3bf3ec', 'ichsanmust', 'reno', 'Re : Tugas', 'tugas ulin haha', '2014-06-20 09:42:51', 'sent'),
(26, '4e732ced3463d06de0ca9a15b6153677', 'sinung', 'admin', 'Hallo Kenalan ya', 'Hallo test. Ini saya admin mau kenalan ke anda apakah boleh atau tidak?', '2014-07-10 09:12:56', 'sent'),
(27, '02e74f10e0327ad868d138f2b4fdd6f0', 'admin', 'sinung', 'Re : Hallo Kenalan ya', 'Yeah... Siap-siap saja kalau saya sih...\r\nMakanya readinya saja dikirim', '2014-07-10 09:19:13', 'sent'),
(29, '6ea9ab1baa0efb9e19094440c317e21b', 'sinung', 'admin', 'Re : Re : Hallo Kenalan ya', 'Apaan sih....', '2014-07-11 09:19:50', 'sent'),
(30, '34173cb38f07f89ddbebc2ac9128303f', 'admin', 'sinung', 'Tolong di filter lagi lah ya...', 'Post message ', '2014-07-11 09:40:10', 'sent'),
(31, 'c16a5320fa475530d9583c34fd356ef5', 'admin', 'sinung', 'Re : Hallo Kenalan ya', 'Yeah..nama saya andi. Kamu sapa?', '2014-08-13 08:57:52', 'sent'),
(32, '6364d3f0f495b6ab9dcf8d3b5c6e0b01', 'admin', 'admin', 'Test ke saya sendiri', 'Ini hanya untuk test saja', '2014-10-31 08:55:34', 'sent'),
(33, '182be0c5cdcd5072bb1864cdee4d3d6e', 'admin', 'admin', 'Re : Test ke saya sendiri', 'Wow sudah direpy', '2014-10-31 08:56:08', 'sent'),
(34, 'e369853df766fa44e1ed0ff613f563bd', 'admin', 'headoperationtester', 'Hallo', 'Hallo Admin\r\n\r\nIni kenapa sistem saya jadi seperti ini ya?\r\nMohon diperbaiki dong. Jangan dibuat seperti ini terus hehe...', '2014-12-30 11:03:45', 'sent');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mothervessel`
--

CREATE TABLE IF NOT EXISTS `mothervessel` (
  `id_mothervessel` int(11) NOT NULL AUTO_INCREMENT,
  `MotherVesselCode` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `MV_Name` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `MV_Type` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `MV_Route` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_mothervessel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `mothervessel`
--

INSERT INTO `mothervessel` (`id_mothervessel`, `MotherVesselCode`, `MV_Name`, `MV_Type`, `MV_Route`) VALUES
(1, 'MV1', 'Grand Elga', 'Minimax', 'Taboneo'),
(2, 'MV2', 'None', 'None', 'None'),
(3, 'MV3', 'Da Tong', '-', '-'),
(4, 'MV4', 'Alimar', '-', '-'),
(5, 'MV5', 'Palini', '-', '-'),
(6, 'MV6', 'HOUYO', '-', '-'),
(7, 'MV7', 'SPAR HYDRA', '-', '-'),
(8, 'MV8', 'Collosus', '-', '-'),
(9, 'MV9', 'LUYANG STAR', 'Gear less', '-'),
(10, 'MV10', 'TORM ATLANTIC', 'Gear Less', '-'),
(11, 'MV11', 'MAIZURU DAIKOKU', 'Gear Less', '-'),
(13, 'MV13', 'Blue Marline 1', 'Gear Less', '-'),
(14, 'MV14', 'Pasific Emeral', 'Gear Less', '-'),
(15, 'MV15', 'SVENNER', 'Gear Less', '-'),
(16, 'MV16', 'HUA HONG', 'Gear Less', '-'),
(23, 'MV', 'Grand Alma', 'Panamax', 'Taboneo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_debit_note_category`
--

CREATE TABLE IF NOT EXISTS `mst_debit_note_category` (
  `id_debit_note_category` int(11) NOT NULL AUTO_INCREMENT,
  `debit_note_category` varchar(200) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id_debit_note_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `mst_debit_note_category`
--

INSERT INTO `mst_debit_note_category` (`id_debit_note_category`, `debit_note_category`, `is_active`) VALUES
(1, 'DN Agency', 0),
(2, 'DN Fuel', 0),
(3, 'DN Rent', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_department`
--

CREATE TABLE IF NOT EXISTS `mst_department` (
  `DepartmentId` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `DepartmentName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`DepartmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `mst_department`
--

INSERT INTO `mst_department` (`DepartmentId`, `DepartmentName`) VALUES
('dept1', 'Marketing'),
('dept10', 'Voyage Planning Control'),
('dept11', 'Technical'),
('dept12', 'Nautical'),
('dept13', 'Administration'),
('dept14', 'Cost Control'),
('dept15', 'Budget'),
('dept16', 'HCGA'),
('dept17', 'MSIT'),
('dept2', 'Operation'),
('dept3', 'Procurement'),
('dept4', 'Maintenance'),
('dept5', 'Inventory'),
('dept6', 'Human Capital'),
('dept7', 'Finance'),
('dept8', 'commercial'),
('dept9', 'ITS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_maintenance_type`
--

CREATE TABLE IF NOT EXISTS `mst_maintenance_type` (
  `id_maintenance_type` int(11) NOT NULL,
  `MaintenanceTypeName` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_maintenance_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `mst_maintenance_type`
--

INSERT INTO `mst_maintenance_type` (`id_maintenance_type`, `MaintenanceTypeName`) VALUES
(1, 'Schedular'),
(2, 'Visit'),
(3, 'Replacement');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_metric`
--

CREATE TABLE IF NOT EXISTS `mst_metric` (
  `metric` varchar(20) NOT NULL,
  `metric_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`metric`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_metric`
--

INSERT INTO `mst_metric` (`metric`, `metric_name`, `description`) VALUES
('MT', 'Metric Ton', 'Satuan untuk ukuran Coal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_metric_pr`
--

CREATE TABLE IF NOT EXISTS `mst_metric_pr` (
  `metric` varchar(20) NOT NULL,
  `metric_name` varchar(250) NOT NULL,
  `id_po_category` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`metric`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_metric_pr`
--

INSERT INTO `mst_metric_pr` (`metric`, `metric_name`, `id_po_category`, `description`) VALUES
('days', 'days', 0, ''),
('lot', 'lot', 0, ''),
('LTR', 'Liter', 0, 'HSD Solar'),
('packet', 'packet', 0, ''),
('pcs', 'Pieces', 0, ''),
('person', 'person', 0, ''),
('trip', 'trip', 0, ''),
('unit', 'unit', 0, ''),
('voy', 'voy', 0, 'voyage');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_timesheet_summary`
--

CREATE TABLE IF NOT EXISTS `mst_timesheet_summary` (
  `id_mst_timesheet_summary` int(11) NOT NULL AUTO_INCREMENT,
  `timesheet_summary` varchar(200) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id_mst_timesheet_summary`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `mst_timesheet_summary`
--

INSERT INTO `mst_timesheet_summary` (`id_mst_timesheet_summary`, `timesheet_summary`, `is_active`) VALUES
(1, 'Sailing On Ballast Conditions', 1),
(2, 'Sailing On Loaded Conditions', 1),
(3, 'Waiting at Loading Port', 1),
(4, 'Waiting at Trisakti Ballast', 1),
(5, 'Waiting at Discharging Port', 1),
(6, 'Loading Time', 1),
(7, 'Discharging Time', 1),
(8, 'Loading Rate', 1),
(9, 'Discharging Rate', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_vessel_document`
--

CREATE TABLE IF NOT EXISTS `mst_vessel_document` (
  `id_vessel_document` int(11) NOT NULL AUTO_INCREMENT,
  `VesselDocumentName` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `VesselDocumentNameEng` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `Dasar` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `VesselType` set('TUG','BARGE') COLLATE latin1_general_ci NOT NULL,
  `Information` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `Status` int(2) NOT NULL DEFAULT '1' COMMENT 'Ini Status Dipakai Atau Tidak',
  PRIMARY KEY (`id_vessel_document`),
  KEY `VesselType` (`VesselType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2008 ;

--
-- Dumping data untuk tabel `mst_vessel_document`
--

INSERT INTO `mst_vessel_document` (`id_vessel_document`, `VesselDocumentName`, `VesselDocumentNameEng`, `Dasar`, `VesselType`, `Information`, `Status`) VALUES
(1001, 'Surat Laut', 'Certificates of Nationality', 'UU 17/2008', 'TUG', '', 1),
(1002, 'Sertifikat Keselamatan Radio Kapal Barang', 'Cargo Ship Safety Radio Certificate', 'UU 17/2008', 'TUG', '', 1),
(1003, 'Surat Ukur International (1969)', 'International Tonnage Certificate (1969)', 'TMS 1969', 'TUG', '', 1),
(1004, 'Sertifikat Keselamatan', 'Certificate of Seaworthiness', 'PP 51', 'TUG', '', 0),
(1005, 'Sertifikat Keselamatan Kontruksi Kapal barang', 'Cargo Ship Safety Construction Certificate', 'SOLAS', 'TUG', '', 1),
(1006, 'Sertifikat Keselamatan Perlengkapan kapal Barang', 'Cargo Ship Safety Equipment Certificate', 'SOLAS', 'TUG', '', 1),
(1007, 'Sertifikat Bebas Tindakan Sanitasi Kapal', 'Ship Sanitation Control Exemption Certificates', 'SOLAS', 'TUG', '', 1),
(1008, 'Sertifikat Pengawakan', 'Safe Manning Certificates', 'STCW 78/95', 'TUG', '', 0),
(1009, 'Sertifikat Nasional Pencegahan Pencemaran oleh Minyak dari Kapal', 'National oil Polution Prevention', 'MARPOL 73/78', 'TUG', '', 1),
(1010, 'Buku Catatan Minyak', 'Oil Record Book', 'MARPOL 73/78', 'TUG', '', 0),
(1011, 'Sertifikast Klasifikasi Lambung', 'Certificates of Classification for Hull', 'CLASS', 'TUG', '', 1),
(1012, 'Sertifikast Klasifikasi Mesin', 'Certificates of Classification for Machinery', 'CLASS', 'TUG', '', 1),
(1013, 'Sertifikat Garis Muat International (1966)', 'International Load Line Certificates (1966)', 'CLASS', 'TUG', '', 1),
(1014, 'Sertifikat Life raft', 'Life raft Certificates', 'FFA/ LSA', 'TUG', '', 1),
(1015, 'Sertifikat Pemadam Kebakaran', 'Fire Extinguisher Certificates', 'FFA/ LSA', 'TUG', '', 1),
(1016, 'Izin Stasiun Radio Kapal Laut', 'Cargo Ship Safety Radio Certificate', 'UU 36 Thn 1999', 'TUG', '', 0),
(1017, 'Setifikat Pengawasan PPPK Kapal', 'Certificate of Medicines Medical Store an Appliances', 'ILO / WHO', 'TUG', '', 1),
(1018, 'Pola Operasi Kapal', 'PPKA/PKKA/RPT/DSB', 'KM 33 Th 2001', 'TUG', '', 1),
(2001, 'Surat Laut', 'Certificates of Nationality', 'UU 17/2008', 'BARGE', '', 1),
(2002, 'Surat Ukur International (1969)', 'International Tonnage Certificate (1969)', 'TMS 1969', 'BARGE', '', 1),
(2003, 'Sertifikat Keselamatan', 'Certificate of Seaworthiness', 'PP 51', 'BARGE', '', 1),
(2004, 'Sertifikat Klasifikasi Lambung', 'Certificates of Classification for Hull', 'CLASS', 'BARGE', '', 1),
(2005, 'Sertifikat Garis Muat International (1966)', 'International Load Line Certificates (1966)', 'CLASS', 'BARGE', '', 1),
(2006, 'Pola Operasi Kapal', 'PPKA/PKKA/RPT/DSB', 'KM 33 Th 2001', 'BARGE', '', 1),
(2007, 'Sertifikat Bebas Tindakan Sanitasi Kapal', 'Ship Sanitation Control Exemption Certificates', 'SOLAS', 'BARGE', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_vessel_document_validity`
--

CREATE TABLE IF NOT EXISTS `mst_vessel_document_validity` (
  `id_vessel_document_validity` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `vessel_document_validity` varchar(250) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id_vessel_document_validity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `mst_vessel_document_validity`
--

INSERT INTO `mst_vessel_document_validity` (`id_vessel_document_validity`, `no`, `vessel_document_validity`, `color`) VALUES
(1, 1, 'Warna Hijau Menunjukan Sertifikat Masih Berlaku', '#49DE45'),
(2, 2, 'Warna Kuning Menunjukan Sertifikat Harus Diperpanjang dalam waktu 15 hari', 'yellow'),
(3, 3, 'Warna Merah Menunjukan Sertifikat Sudah Mati & Tidak Berlaku lagi ( Harus dihidari dan tidak boleh ada )', '#BF3120'),
(4, 4, 'Warna Abu-abu Menunjukan Permanent berarti sekali dikeluarkan sertifikat akan berlaku selamanya, kalau tidak ada perubahan kontruksi kapal dan nama Pemilik', '#8D9696'),
(5, 5, 'Tidak Dipakai', '#9BD1F3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_voyage_document`
--

CREATE TABLE IF NOT EXISTS `mst_voyage_document` (
  `IdVoyageDocument` int(11) NOT NULL,
  `DocumentName` text COLLATE latin1_general_ci NOT NULL,
  `IsClosedVoyageDocument` int(11) NOT NULL,
  PRIMARY KEY (`IdVoyageDocument`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `mst_voyage_document`
--

INSERT INTO `mst_voyage_document` (`IdVoyageDocument`, `DocumentName`, `IsClosedVoyageDocument`) VALUES
(1, 'SKAB', 0),
(2, 'Bill of Lading', 1),
(4, 'Shipping Instruction', 0),
(3, 'Draft Survey', 1),
(5, 'Clearance Document', 0),
(6, 'SPAL', 0),
(7, 'Cargo Manifest', 0),
(8, 'Timesheet', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id_node` int(11) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(200) NOT NULL,
  `node_acronym` varchar(10) NOT NULL,
  PRIMARY KEY (`id_node`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `node`
--

INSERT INTO `node` (`id_node`, `node_name`, `node_acronym`) VALUES
(1, 'Batu Licin', 'BTL'),
(2, 'Bintang Ninggi', 'BNG'),
(3, 'Biringkasi', 'BRKS'),
(4, 'Bojonegara', 'BJN'),
(5, 'Bunati', 'BNT'),
(6, 'Cenko', 'CNK'),
(7, 'Cigading', 'CGD'),
(8, 'Cirebon', 'CRB'),
(9, 'Ciwandan', 'CWD'),
(10, 'Gresik', 'GSK'),
(11, 'Indonesia Bulk Terminal', 'IBT'),
(12, 'Kelanis', 'KLN'),
(13, 'Kintap', 'KTP'),
(14, 'Kupang', 'KPG'),
(15, 'Lamongan', 'LAM'),
(16, 'Marabahan', 'MRBH'),
(17, 'Marabakah', 'MBK'),
(18, 'Merakmas', 'MRK'),
(19, 'Muara Bunati', 'Mr BNT'),
(20, 'Muara Satui', 'Mr STI'),
(21, 'Muarabakah', 'MBK'),
(22, 'Paiton', 'PTN'),
(23, 'Paring Lahung', 'PLG'),
(24, 'Satui', 'STI'),
(25, 'Semarang', 'SMG'),
(26, 'Sepapah', 'SPP'),
(27, 'Serongga', 'SRG'),
(28, 'Sungai Danau', 'SDN'),
(29, 'Sungai Durian', 'SDR'),
(30, 'Sungai Puting', 'SPT'),
(31, 'Taboneo', 'TBN'),
(32, 'Talio', 'TLO'),
(33, 'Tanjung Pemancingan', 'TJP'),
(34, 'Tanjung Priok', 'PRK'),
(35, 'Telang Baru', 'TLB'),
(36, 'Teluk Timbau', 'TTB'),
(37, 'Tuban', 'TUB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` bigint(20) NOT NULL AUTO_INCREMENT,
  `code_id` varchar(100) NOT NULL,
  `userid` varchar(45) NOT NULL,
  `fromuserid` varchar(45) NOT NULL,
  `notif_date` datetime NOT NULL,
  `notif_message` varchar(1000) NOT NULL,
  `notif_tittle` varchar(250) NOT NULL,
  `notif_status` set('READ','UNREAD','NEW') NOT NULL,
  `grade` varchar(250) NOT NULL,
  PRIMARY KEY (`id_notification`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id_notification`, `code_id`, `userid`, `fromuserid`, `notif_date`, `notif_message`, `notif_tittle`, `notif_status`, `grade`) VALUES
(1, '', 'costcontroltester', 'headoperationtester', '2014-12-30 16:26:32', 'Your PR No.PML/Purchase Request/4/XII/2014 has been approved. YOur PR with detail bla bla has been approved.', 'Your PR No.PML/Purchase Request/4/XII/2014 has been approved.', 'READ', ''),
(6, 'ca673e63d957b1ede3334357ac79d63c', 'costcontroltester', 'headoperationtester', '2015-01-02 09:48:39', 'PR.Number : PML/Purchase Request/4/XII/2014\r\nPR.Date : 2014-12-09\r\nPR.Category : Jasa Survey-Fuel Validasi, Bunker Survey\r\nQuantity : 17 packet\r\n\r\nRelated To : \r\nVessel : FUEL-001\r\n\r\nNotes : \r\nIni yang diedit loh ya.... packet\r\n\r\nRequested By : costcontroltester (Cost Control Tester) at 2014-12-09 20:00:53\r\n', 'Your PR No.PML/Purchase Request/4/XII/2014 has been approved.', 'NEW', ''),
(7, '7e111e8c1be531c47d17aa494995ee28', 'admin', 'headoperationtester', '2015-01-02 09:51:43', 'Your PR No.PML/Purchase Request/7/XII/2014 has been .approved\r\n\r\nPR.Number : PML/Purchase Request/7/XII/2014\r\nPR.Date : 2014-12-12\r\nPR.Category : Jasa Survey-Fuel Validasi, Bunker Survey\r\nQuantity : 1 packet\r\n\r\nRelated To : \r\nVessel : PATRIA 10\r\n\r\nNotes : \r\nad packet\r\n\r\nRequested By : admin (Administrator) at 2014-12-12 16:40:31\r\n', 'Your PR No.PML/Purchase Request/7/XII/2014 has been .approved', 'READ', ''),
(8, 'c98a72649c9bfdcd28da1129d24e419b', 'admin', 'headoperationtester', '2015-01-02 09:51:47', 'Your PR No.PML/Purchase Request/10/XII/2014 has been .rejected\r\n\r\nPR.Number : PML/Purchase Request/10/XII/2014\r\nPR.Date : 2014-12-12\r\nPR.Category : Jasa Survey-Fuel Validasi, Bunker Survey\r\nQuantity : 1 packet\r\n\r\nRelated To : \r\nVessel : PATRIA 8\r\n\r\nNotes : \r\nwow packet\r\n\r\nRequested By : admin (Administrator) at 2014-12-12 16:29:33\r\n', 'Your PR No.PML/Purchase Request/10/XII/2014 has been .rejected', 'READ', ''),
(9, '646cef71d188ffa301a813b3d36bb937', 'adminbandung', 'headoperationtester', '2015-01-02 09:51:51', 'Your PR No.PML/Purchase Request/18/XII/2014 has been .approved\r\n\r\nPR.Number : PML/Purchase Request/18/XII/2014\r\nPR.Date : 2014-12-29\r\nPR.Category : Spare Part & Consumable-Engine\r\nQuantity : 1 packet\r\n\r\nRelated To : \r\nVessel : PATRIA 12\r\n\r\nNotes : \r\nPat12 packet\r\n\r\nRequested By : adminbandung (Adminstrator Bandung) at 2014-12-29 19:29:23\r\n', 'Your PR No.PML/Purchase Request/18/XII/2014 has been .approved', 'NEW', ''),
(10, 'ddacd5bdefdf87994e56f116275ee05b', 'admin', 'admin', '2015-01-10 06:40:32', 'Your Purchase Request No.PML/Purchase Request/1/I/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/1/I/2015\r\nPR.Date : 2015-01-10\r\nPR.Category : SPARE PART / CONSUMABLE\r\n\r\nRelated To : \r\nVessel : INTAN MEGAH 22\r\n\r\nDetail Item : \r\n1). EMERGENCY LIGHT - 12 packet\r\n2). ANTIFOULING - 12 LTR\r\n\r\nNotes : \r\nadasdas packet\r\n\r\nRequested By : admin (Administrator) at 2015-01-10 06:35:02\r\n', 'Your Purchase Request No.PML/Purchase Request/1/I/2015 has been approved', 'READ', ''),
(11, '8c8a5c79d0b6ddf7175a22bb695b81a3', 'admin', 'admin', '2015-01-10 06:40:36', 'Your Purchase Request No.PML/Purchase Request/3/I/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/3/I/2015\r\nPR.Date : 2015-01-10\r\nPR.Category : SPARE PART / CONSUMABLE\r\n\r\nRelated To : \r\nVessel : PATRIA 5\r\n\r\nDetail Item : \r\n1). BAROMETER - 1 packet\r\n2). LO Filter - 34 packet\r\n3). Speed Sensor - 2 packet\r\n\r\nNotes : \r\nas packet\r\n\r\nRequested By : admin (Administrator) at 2015-01-10 05:59:36\r\n', 'Your Purchase Request No.PML/Purchase Request/3/I/2015 has been approved', 'READ', ''),
(12, '2cf2df3c9c416ef9b67cb24fbad99675', 'admin', 'admin', '2015-01-13 15:52:09', 'Your Purchase Request No.PML/Purchase Request/7/I/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/7/I/2015\r\nPR.Date : 2015-01-13\r\nPR.Category : HSD Solar\r\nQuantity : 400 Liter\r\n\r\nRelated To : \r\nVessel : PATRIA 1\r\n\r\nNotes : \r\ns Liter\r\n\r\nRequested By : admin (Administrator) at 2015-01-13 15:51:51\r\n', 'Your Purchase Request No.PML/Purchase Request/7/I/2015 has been approved', 'NEW', ''),
(13, 'f3a462bc2ebdfa4aad1f8e3573081fab', 'admin', 'admin', '2015-01-21 13:40:56', 'Your Request For Schedule REPAIR PATRIA 3 has been rejected\r\n\r\n\r\n		Vessel Tug : PATRIA 3\r\n		Vessel Barge : ALMAK\r\n		Proposed Start Date  : Jan 22, 2015\r\n		End Date : Jan 26, 2015\r\n		Notes : --', 'Your Request For Schedule REPAIR PATRIA 3 has been rejected', 'NEW', ''),
(14, 'ca0dc8088006ee5b919e7232f72f68ce', 'admin', 'admin', '2015-02-03 03:27:30', 'Your Purchase Request No.PML/Purchase Request/1/II/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/1/II/2015\r\nPR.Date : February 3, 2015\r\nPR.Category : SPARE PART / CONSUMABLE\r\n\r\nRelated To : \r\nVessel : INTAN MEGAH 06\r\n\r\nDetail Item : \r\n1). EMERGENCY LIGHT - 21 lot\r\n2). TOWING HOOK - 20 packet\r\n3). Oily Water Separator - 5 packet\r\n\r\nNotes : \r\nKebutuhan Kapal Intan Megah packet\r\n\r\nRequested By : admin (Administrator) at February 3, 2015 3:12:42 AM\r\n', 'Your Purchase Request No.PML/Purchase Request/1/II/2015 has been approved', 'NEW', ''),
(15, '055879c25047a21148f4b6860b69f1a8', 'admin', 'admin', '2015-02-05 04:17:34', 'Your Purchase Request No.PML/Purchase Request/1/II/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/1/II/2015\r\nPR.Date : February 3, 2015\r\nPR.Category : HSD Solar\r\nQuantity : 4000 Liter\r\n\r\nRelated To : \r\nVessel : PATRIA 1\r\n\r\nNotes : \r\nPerlu segera bunker Liter\r\n\r\nRequested By : admin (Administrator) at February 3, 2015 2:57:09 PM\r\n', 'Your Purchase Request No.PML/Purchase Request/1/II/2015 has been approved', 'NEW', ''),
(16, 'f675bef2770874cfa955e2ffeac70d51', 'admin', 'admin', '2015-02-05 04:19:33', 'Your Purchase Request No.PML/Purchase Request/3/II/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/3/II/2015\r\nPR.Date : February 3, 2015\r\nPR.Category : Fresh Water\r\nQuantity : 1 packet\r\n\r\nRelated To : \r\nVessel : PATRIA 3\r\n\r\nNotes : \r\nMinta fresh Water lagi dong packet\r\n\r\nRequested By : admin (Administrator) at February 3, 2015 3:05:25 PM\r\n', 'Your Purchase Request No.PML/Purchase Request/3/II/2015 has been approved', 'NEW', ''),
(17, 'c6216867f7addb5fdc780c8743d27186', 'admin', 'admin', '2015-02-05 04:23:08', 'Your Purchase Request No.PML/Purchase Request/4/II/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/4/II/2015\r\nPR.Date : February 3, 2015\r\nPR.Category : JASA AGENT\r\n\r\nRelated To : \r\nVoyage Number : 12\r\nVessel : PATRIA 7-ADARA\r\nRoute : TELUK TIMBAU-TABONEO\r\nCustomer : PT. TUAH TURANGGA AGUNG\r\nLoading Date : Dec 25, 2014\r\nQuantity : 5,000 MT\r\nStatus : VOYAGE ORDER\r\n\r\nDetail Item : \r\n1). Kesehatan Karantina & Syahbandar - 1 lot\r\n2). Pemeriksaan Fisik Kapal Syarat Penerbitan SPB - 0 lot\r\n3). SBNP/Uang Rambu - 1 lot\r\n4). PUP - 1 lot\r\n5). Kompensasi Overdraft - 0 lot\r\n6). Nota PELINDO - 1 lot\r\n7). Pengawalan Alur PAM Swakarsa - 1 lot\r\n8). Biaya Lepas Tambat  - 1 lot\r\n9). Assist Tug - 1 lot\r\n10). Jasa Layanan Keagenan - 1 lot\r\n11). Persetujuan Pergerakan Kapal DI Port Loading - 1 lot\r\n12). Biaya Mooring DI Port Unloading - 1 lot\r\n13). PNBP - 1 lot\r\n14). Izin Bongkar - 1 lot\r\n15). SPB - 1 lot\r\n16). Taktis Operasional Kelaikan Kapal - 1 lot\r\n17). Inspeksi Karantina ke Kapal - 1 lot\r\n1', 'Your Purchase Request No.PML/Purchase Request/4/II/2015 has been approved', 'NEW', ''),
(18, '9462dc629dfbac748ccbafc86ee9213d', 'admin', 'admin', '2015-02-20 14:54:04', 'Your Purchase Request No.PML/Purchase Request/7/II/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/7/II/2015\r\nPR.Date : 5 Februari 2015\r\nPR.Category : RENT\r\nQuantity : 30 days\r\n\r\nRelated To : \r\nVessel : INTAN MEGAH 14\r\n\r\nNotes : \r\nasdas days\r\n\r\nRequested By : admin (Administrator) at 5 Februari 2015 04:15:40\r\n', 'Your Purchase Request No.PML/Purchase Request/7/II/2015 has been approved', 'NEW', ''),
(19, '665982a7927e3c2fb3ad60b7b62181e9', 'admin', 'admin', '2015-02-20 14:56:19', 'Your Purchase Request No.PML/Purchase Request/2/II/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/2/II/2015\r\nPR.Date : 3 Februari 2015\r\nPR.Category : HSD Solar\r\nQuantity : 3500 Liter\r\n\r\nRelated To : \r\nVessel : PATRIA 2\r\n\r\nNotes : \r\nPerlu untuk PATRIA 2 Liter\r\n\r\nRequested By : admin (Administrator) at 3 Februari 2015 14:57:25\r\n', 'Your Purchase Request No.PML/Purchase Request/2/II/2015 has been approved', 'NEW', ''),
(20, '333afce3c8acb80a37ffd29c5bc10d9a', 'admin', 'admin', '2015-02-20 15:27:13', 'Your Purchase Request No.PML/Purchase Request/6/II/2015 has been approved\r\n\r\nPR.Number : PML/Purchase Request/6/II/2015\r\nPR.Date : 5 Februari 2015\r\nPR.Category : Jasa Survey-Survey Class\r\nQuantity : 1 packet\r\n\r\nRelated To : \r\nVessel : GONAYA II\r\n\r\nNotes : \r\nas packet\r\n\r\nRequested By : admin (Administrator) at 5 Februari 2015 04:13:47\r\n', 'Your Purchase Request No.PML/Purchase Request/6/II/2015 has been approved', 'NEW', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `part`
--

CREATE TABLE IF NOT EXISTS `part` (
  `id_part` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel` int(11) NOT NULL,
  `id_part_structure` bigint(20) NOT NULL,
  `PartNumber` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `PartName` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `impa` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `LifeTime` float NOT NULL,
  `UsageTime` float NOT NULL,
  `MinStock` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `metric` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ReplaceSchedule` int(11) NOT NULL COMMENT 'days',
  `LastReplacementDate` date NOT NULL,
  `ReplaceLeadtime` int(11) NOT NULL COMMENT 'days',
  `StandardPriceUnit` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  PRIMARY KEY (`id_part`),
  KEY `id_vessel` (`id_vessel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `part_bom`
--

CREATE TABLE IF NOT EXISTS `part_bom` (
  `id_part_bom` bigint(20) NOT NULL AUTO_INCREMENT,
  `alias_name` varchar(250) NOT NULL,
  `code` varchar(150) NOT NULL,
  `id_bom` int(11) NOT NULL,
  `id_part` bigint(20) NOT NULL,
  `id_part_parent` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `metric` varchar(20) NOT NULL,
  PRIMARY KEY (`id_part_bom`),
  KEY `id_bom` (`id_bom`),
  KEY `id_part` (`id_part`),
  KEY `id_part_parent` (`id_part_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `part_category`
--

CREATE TABLE IF NOT EXISTS `part_category` (
  `id_part_category` int(11) NOT NULL AUTO_INCREMENT,
  `PartCategoryName` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `PartDescription` varchar(250) NOT NULL,
  PRIMARY KEY (`id_part_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `part_category`
--

INSERT INTO `part_category` (`id_part_category`, `PartCategoryName`, `PartDescription`) VALUES
(2, 'ENGINE', ''),
(5, 'DECK', ''),
(8, 'TUG', ''),
(9, 'BARGE', ''),
(10, 'RENT', ''),
(11, 'FRESHWATER', ''),
(12, 'TRANSSHIPMENT', ''),
(13, 'HSD', ''),
(14, 'AGENCY', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `part_level`
--

CREATE TABLE IF NOT EXISTS `part_level` (
  `id_part_level` int(11) NOT NULL,
  `part_level_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id_part_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `part_level`
--

INSERT INTO `part_level` (`id_part_level`, `part_level_name`) VALUES
(1, 'plant'),
(2, 'system'),
(3, 'sub system'),
(4, 'part');

-- --------------------------------------------------------

--
-- Struktur dari tabel `part_structure`
--

CREATE TABLE IF NOT EXISTS `part_structure` (
  `id_part_structure` bigint(20) NOT NULL AUTO_INCREMENT,
  `code_number` varchar(100) NOT NULL,
  `structure_name` varchar(250) NOT NULL,
  `id_part_structure_parent` bigint(20) NOT NULL,
  `id_level` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_part_structure`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9010305 ;

--
-- Dumping data untuk tabel `part_structure`
--

INSERT INTO `part_structure` (`id_part_structure`, `code_number`, `structure_name`, `id_part_structure_parent`, `id_level`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(9, '9', 'Deck Machinery System', 0, 1, '0000-00-00 00:00:00', '', ''),
(10, '10', 'Hull Machinery System', 0, 1, '0000-00-00 00:00:00', '', ''),
(901, '9.1', 'Hydraulic System For Anchor Windlass', 9, 2, '0000-00-00 00:00:00', '', ''),
(90101, '9.1.1', 'Hidrolik System', 901, 3, '0000-00-00 00:00:00', '', ''),
(90102, '9.1.2', 'Pompa Hidrolik', 901, 3, '0000-00-00 00:00:00', '', ''),
(90103, '9.1.3', 'Motor Pompa', 901, 3, '0000-00-00 00:00:00', '', ''),
(9010101, '9.1.1.1', 'Sambungan & Glands', 90101, 4, '0000-00-00 00:00:00', '', ''),
(9010102, '9.1.1.2', 'Hidrolik Pump', 90101, 4, '0000-00-00 00:00:00', '', ''),
(9010103, '9.1.1.3', 'Kopling', 90101, 4, '0000-00-00 00:00:00', '', ''),
(9010104, '9.1.1.4', 'Mur-Baut', 90101, 4, '0000-00-00 00:00:00', '', ''),
(9010105, '9.1.1.5', 'Emergency Steering', 90101, 4, '0000-00-00 00:00:00', '', ''),
(9010201, '9.1.2.1', 'Pompa', 90102, 4, '0000-00-00 00:00:00', '', ''),
(9010202, '9.1.2.2', 'Seal & flange', 90102, 4, '0000-00-00 00:00:00', '', ''),
(9010301, '9.1.3.1', 'Terminal & Gland', 90103, 4, '0000-00-00 00:00:00', '', ''),
(9010302, '9.1.3.2', 'Motor', 90103, 4, '0000-00-00 00:00:00', '', ''),
(9010303, '9.1.3.3', 'Starter Panel', 90103, 4, '0000-00-00 00:00:00', '', ''),
(9010304, '9.1.3.4', 'Alarm Device', 90103, 4, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_top`
--

CREATE TABLE IF NOT EXISTS `payment_top` (
  `id_payment_top` int(11) NOT NULL,
  `payment_top` varchar(32) NOT NULL,
  PRIMARY KEY (`id_payment_top`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment_top`
--

INSERT INTO `payment_top` (`id_payment_top`, `payment_top`) VALUES
(0, 'Cash'),
(7, '7 days'),
(14, '14 days'),
(30, '30 days');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payroll_item`
--

CREATE TABLE IF NOT EXISTS `payroll_item` (
  `id_payroll_item` int(11) NOT NULL AUTO_INCREMENT,
  `payroll_item` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `type` set('fix','variable') NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_payroll_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `payroll_item`
--

INSERT INTO `payroll_item` (`id_payroll_item`, `payroll_item`, `is_active`, `type`, `description`) VALUES
(1, 'Wages', 1, 'fix', ''),
(2, 'Allowance', 1, 'fix', ''),
(3, 'THR', 1, 'fix', ''),
(4, 'Fuel Incentive', 1, 'variable', ''),
(5, 'EHR Incentive', 1, 'variable', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poinvoice`
--

CREATE TABLE IF NOT EXISTS `poinvoice` (
  `poinv_ID` int(11) NOT NULL AUTO_INCREMENT,
  `poinv_datetime` datetime NOT NULL,
  `poinv_po_ID` int(11) NOT NULL,
  `poinv_number` varchar(64) NOT NULL,
  `poinv_invoice_date` date NOT NULL,
  `poinv_receive_date` date NOT NULL,
  `poinv_parking` varchar(128) NOT NULL,
  `poinv_validation_date` date NOT NULL,
  `poinv_posting` varchar(128) NOT NULL,
  `poinv_acct_receive_date` date NOT NULL,
  PRIMARY KEY (`poinv_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_category`
--

CREATE TABLE IF NOT EXISTS `po_category` (
  `id_po_category` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `category` set('BARANG','JASA','RENT') NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `is_end_node` int(1) NOT NULL,
  `level1` int(11) NOT NULL,
  `level2` int(11) NOT NULL,
  `level3` int(11) NOT NULL,
  `num_level` int(11) NOT NULL,
  `auth` varchar(250) NOT NULL,
  `type_good_issue` set('MANUAL','AUTO') NOT NULL,
  `dedicated_to` set('VOYAGE','VESSEL') NOT NULL,
  `lead_time_from_approval` int(11) NOT NULL,
  `request_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id_po_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po_category`
--

INSERT INTO `po_category` (`id_po_category`, `code`, `category`, `category_name`, `id_parent`, `is_end_node`, `level1`, `level2`, `level3`, `num_level`, `auth`, `type_good_issue`, `dedicated_to`, `lead_time_from_approval`, `request_by`) VALUES
(10000, '1', 'BARANG', 'BARANG', 0, 0, 1, 0, 0, 1, '', '', '', 0, ''),
(10100, '1.1', 'BARANG', 'HSD Solar', 10000, 1, 1, 1, 0, 2, 'NAU', 'MANUAL', 'VESSEL', 0, ''),
(10200, '1.2', 'BARANG', 'Fresh Water', 10000, 1, 1, 2, 0, 2, 'NAU', 'MANUAL', 'VESSEL', 0, ''),
(10300, '1.3', 'BARANG', 'ASSET', 10000, 0, 1, 3, 0, 2, '', '', '', 0, ''),
(10301, '1.3.1', 'BARANG', 'Asset-Pembelian Kapal', 10300, 1, 1, 3, 1, 3, 'VPC', 'MANUAL', 'VESSEL', 0, ''),
(10302, '1.3.2', 'BARANG', 'Asset-Pembelian Asset Operasional Kapal', 10300, 1, 1, 3, 2, 3, 'VPC', 'MANUAL', 'VESSEL', 0, ''),
(10400, '1.4', 'BARANG', 'SPARE PART / CONSUMABLE', 10000, 0, 1, 4, 0, 2, '', '', '', 0, ''),
(10401, '1.4.1', 'BARANG', 'Spare Part & Consumable-Engine', 10400, 1, 1, 4, 1, 3, 'TEC', 'MANUAL', 'VESSEL', 0, ''),
(10402, '1.4.2', 'BARANG', 'Spare Part & Consumable-Deck', 10400, 1, 1, 4, 2, 3, 'TEC', 'MANUAL', 'VESSEL', 0, ''),
(10403, '1.4.3', 'BARANG', 'Spare Part & Consumable-EHS', 10400, 1, 1, 4, 3, 3, 'TEC', 'MANUAL', 'VESSEL', 0, ''),
(20000, '2', 'JASA', 'JASA', 0, 0, 2, 0, 0, 1, '', '', '', 0, ''),
(20100, '2.1', 'JASA', 'JASA AGENT', 20000, 0, 2, 1, 0, 2, '', '', '', 0, ''),
(20101, '2.1.1', 'JASA', 'Jasa Agent-Agency Fixed Cost', 20100, 1, 2, 1, 1, 3, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(20102, '2.1.2', 'JASA', 'Jasa Agent-Agency Variable Cost', 20100, 1, 2, 1, 2, 3, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(20200, '2.2', 'JASA', 'JASA SURVEY', 20000, 0, 2, 2, 0, 2, '', '', '', 0, ''),
(20201, '2.2.1', 'JASA', 'Jasa Survey-Survey Class', 20200, 1, 2, 2, 1, 3, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(20202, '2.2.2', 'JASA', 'Jasa Survey-Fuel Validasi, Bunker Survey', 20200, 1, 2, 2, 2, 3, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(20203, '2.2.3', 'JASA', 'Jasa Survey-Pendampingan & Mobilisasi Crew', 20200, 1, 2, 2, 3, 3, 'NAU', 'AUTO', 'VESSEL', 0, ''),
(20204, '2.2.4', 'JASA', 'Jasa Survey-Warehouse Shipping (Courier to Ship)', 20200, 1, 2, 2, 4, 3, 'NAU', 'AUTO', 'VESSEL', 0, ''),
(20205, '2.2.5', 'JASA', 'Jasa Survey-On / Of Hired Survey', 20200, 1, 2, 2, 5, 3, 'VPC', 'AUTO', 'VESSEL', 0, ''),
(20300, '2.3', 'JASA', 'Surat Kapal', 20000, 1, 2, 3, 0, 2, 'NAU', 'AUTO', 'VESSEL', 0, ''),
(20400, '2.4', 'JASA', 'Repair / Maintenance', 20000, 1, 2, 4, 0, 2, 'TEC', 'AUTO', 'VESSEL', 0, ''),
(20500, '2.5', 'JASA', 'Docking', 20000, 1, 2, 5, 0, 2, 'TEC', 'AUTO', 'VESSEL', 0, ''),
(20600, '2.6', 'JASA', 'Pengawalan Kargo', 20000, 1, 2, 6, 0, 2, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(20700, '2.7', 'JASA', 'Pengamanan Kargo Tipe 1', 20000, 1, 2, 7, 0, 2, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(20800, '2.8', 'JASA', 'Pengamanan Kargo Tipe 2', 20000, 1, 2, 8, 0, 2, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(20900, '2.9', 'JASA', 'Fuel Incentive', 20000, 1, 2, 9, 0, 2, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(21000, '2.10', 'JASA', 'EHS Incentive', 20000, 1, 2, 10, 0, 2, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(21100, '2.11', 'JASA', 'Gaji Crew', 20000, 1, 2, 11, 0, 2, 'NAU', 'AUTO', 'VESSEL', 0, ''),
(21200, '2.12', 'JASA', 'Assist Tug', 20000, 1, 2, 12, 0, 2, 'NAU', 'AUTO', 'VOYAGE', 0, ''),
(30000, '3', 'RENT', 'RENT', 0, 0, 3, 0, 0, 1, '', '', '', 0, ''),
(30100, '3.1', 'RENT', 'Time Charter', 30000, 1, 3, 1, 0, 2, 'VPC', 'AUTO', 'VESSEL', 0, ''),
(30200, '3.2', 'RENT', 'Spot Charter', 30000, 1, 3, 2, 0, 2, 'VPC', 'AUTO', 'VESSEL', 0, ''),
(30300, '3.3', 'RENT', 'Bare Boat Charter', 30000, 1, 3, 3, 0, 2, 'VPC', 'AUTO', 'VESSEL', 0, ''),
(30400, '3.4', 'RENT', 'Floating Crane', 30000, 1, 3, 4, 0, 2, 'VPC', 'AUTO', 'VESSEL', 0, ''),
(30500, '3.5', 'RENT', 'Bare Boat Charter Hired Purchase', 30000, 1, 3, 5, 0, 2, 'VPC', 'AUTO', 'VESSEL', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id_purchase_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_purchase_request` bigint(20) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `up` varchar(200) NOT NULL,
  `PONumber` varchar(250) NOT NULL,
  `PODate` date NOT NULL,
  `PONo` int(11) NOT NULL,
  `POMonth` int(2) NOT NULL,
  `POYear` int(4) NOT NULL,
  `RevisionNumber` int(11) NOT NULL,
  `TermOfPayment` int(11) NOT NULL,
  `id_po_category` int(11) NOT NULL,
  `discount` int(3) NOT NULL COMMENT '%',
  `ppn` int(3) NOT NULL COMMENT '%',
  `pph15` int(3) NOT NULL COMMENT '%',
  `pph23` int(3) NOT NULL COMMENT '%',
  `pbbkb` int(3) NOT NULL,
  `others` int(3) NOT NULL COMMENT '%',
  `notes` text NOT NULL,
  `DeliveryDateRangeStart` date NOT NULL,
  `DeliveryPlace` varchar(250) NOT NULL,
  `DeliveryDateRangeEnd` date NOT NULL,
  `is_mutliple_item` int(1) NOT NULL DEFAULT '0',
  `SignName` varchar(200) NOT NULL,
  `PONotes` text NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `created_date` datetime NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  `Status` set('PO','GOOD RECEIVE','PARK','PAYMENT') NOT NULL,
  PRIMARY KEY (`id_purchase_order`),
  KEY `id_purchase_request` (`id_purchase_request`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `purchase_order`
--

INSERT INTO `purchase_order` (`id_purchase_order`, `id_purchase_request`, `id_vendor`, `up`, `PONumber`, `PODate`, `PONo`, `POMonth`, `POYear`, `RevisionNumber`, `TermOfPayment`, `id_po_category`, `discount`, `ppn`, `pph15`, `pph23`, `pbbkb`, `others`, `notes`, `DeliveryDateRangeStart`, `DeliveryPlace`, `DeliveryDateRangeEnd`, `is_mutliple_item`, `SignName`, `PONotes`, `created_user`, `created_date`, `ip_user_updated`, `Status`) VALUES
(1, 37, 19000100, 'ba', 'PML/PR/1/II/2015', '2015-02-05', 1, 2, 2015, 0, 30, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-05', 'Banjar', '2015-02-05', 0, 'Banjar', '-', 'admin', '2015-02-05 05:04:45', '::1', 'PO'),
(2, 37, 4000034, 'ba', 'PML/PR/2/II/2015', '2015-02-05', 2, 2, 2015, 0, 14, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-05', 'Banjar', '2015-02-05', 0, 'Banjar', '-', 'admin', '2015-02-05 05:50:31', '::1', 'PO'),
(6, 37, 2000019, 's', 'PML/PR/3/II/2015', '2015-02-05', 3, 2, 2015, 0, 15, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-05', 's', '2015-02-05', 0, 'as', '-', 'admin', '2015-02-05 05:58:14', '::1', 'PO'),
(7, 37, 2000019, 's', 'PML/PR/4/II/2015', '2015-02-05', 4, 2, 2015, 0, 15, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-05', 's', '2015-02-05', 0, 'as', '-', 'admin', '2015-02-05 05:58:59', '::1', 'PO'),
(8, 37, 2000019, 's', 'PML/PR/5/II/2015', '2015-02-05', 5, 2, 2015, 0, 15, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-05', 's', '2015-02-05', 0, 'as', '-', 'admin', '2015-02-05 05:59:21', '::1', 'PO'),
(9, 37, 2000019, 's', 'PML/PR/6/II/2015', '2015-02-05', 6, 2, 2015, 0, 15, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-05', 's', '2015-02-05', 0, 'as', '-', 'admin', '2015-02-05 06:00:00', '::1', 'PO'),
(10, 37, 2000019, 's', 'PML/PR/7/II/2015', '2015-02-05', 7, 2, 2015, 0, 15, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-05', 's', '2015-02-05', 0, 'as', '-', 'admin', '2015-02-05 06:00:09', '::1', 'PO'),
(11, 37, 2000019, 's', 'PML/PR/8/II/2015', '2015-02-05', 8, 2, 2015, 0, 15, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-05', 's', '2015-02-05', 0, 'as', '-', 'admin', '2015-02-05 06:00:25', '::1', 'PO'),
(12, 1, 22000124, 'sa', 'PML/PR/9/II/2015', '2015-02-17', 9, 2, 2015, 0, 14, 0, 0, 0, 0, 0, 0, 0, '', '2015-02-17', 'as', '2015-02-17', 0, 'sdas', '-', 'admin', '2015-02-17 09:24:22', '::1', 'PO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_detail`
--

CREATE TABLE IF NOT EXISTS `purchase_order_detail` (
  `id_purchase_order_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_purchase_order` bigint(20) NOT NULL,
  `id_purchase_request` bigint(20) NOT NULL,
  `id_purchase_request_detail` bigint(20) NOT NULL,
  `id_po_category` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `purchase_item_table` varchar(200) NOT NULL,
  `id_item` bigint(20) NOT NULL,
  `item_add_info` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `metric` varchar(20) NOT NULL,
  `price_unit` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `ppn` int(3) NOT NULL COMMENT '%',
  `pph15` int(3) NOT NULL COMMENT '%',
  `pph23` int(3) NOT NULL COMMENT '%',
  `others` int(3) NOT NULL COMMENT '%',
  `notes` text NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `created_date` datetime NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_purchase_order_detail`),
  KEY `id_purchase_order` (`id_purchase_order`),
  KEY `id_purchase_request_detail` (`id_purchase_request_detail`),
  KEY `id_item` (`id_item`),
  KEY `id_po_category` (`id_po_category`),
  KEY `id_purchase_request` (`id_purchase_request`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`id_purchase_order_detail`, `id_purchase_order`, `id_purchase_request`, `id_purchase_request_detail`, `id_po_category`, `amount`, `purchase_item_table`, `id_item`, `item_add_info`, `quantity`, `metric`, `price_unit`, `id_currency`, `ppn`, `pph15`, `pph23`, `others`, `notes`, `created_user`, `created_date`, `ip_user_updated`) VALUES
(1, 11, 37, 37, 10400, 0.00, 'ConsumableStockItem', 200022, '', 20, 'packet', 0.00, 1, 10, 0, 0, 0, '', 'admin', '2015-02-05 06:00:25', '::1'),
(2, 11, 39, 39, 10400, 0.00, 'ConsumableStockItem', 200022, '', 15, 'packet', 0.00, 1, 10, 0, 0, 0, '', 'admin', '2015-02-05 06:00:25', '::1'),
(3, 11, 40, 40, 10400, 0.00, 'ConsumableStockItem', 100037, '', 20, 'packet', 0.00, 1, 10, 0, 0, 0, '', 'admin', '2015-02-05 06:00:25', '::1'),
(4, 12, 1, 0, 10100, 0.00, 'single', 0, '', 4000, 'LTR', 65000.00, 1, 10, 0, 0, 0, '', 'admin', '2015-02-17 09:24:23', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_old`
--

CREATE TABLE IF NOT EXISTS `purchase_order_old` (
  `id_purchase_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_purchase_request` bigint(20) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `up` varchar(200) NOT NULL,
  `PONumber` varchar(250) NOT NULL,
  `PODate` date NOT NULL,
  `PONo` int(11) NOT NULL,
  `POMonth` int(2) NOT NULL,
  `POYear` int(4) NOT NULL,
  `RevisionNumber` int(11) NOT NULL,
  `TermOfPayment` int(11) NOT NULL,
  `id_po_category` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `metric` varchar(20) NOT NULL,
  `PriceUnit` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `ppn` int(3) NOT NULL COMMENT '%',
  `pph15` int(3) NOT NULL COMMENT '%',
  `pph23` int(3) NOT NULL COMMENT '%',
  `others` int(3) NOT NULL COMMENT '%',
  `dedicated_to` set('VESSEL','VOYAGE','OTHERS') NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `id_voyage_order` int(11) NOT NULL,
  `notes` text NOT NULL,
  `DeliveryDateRangeStart` date NOT NULL,
  `DeliveryPlace` varchar(250) NOT NULL,
  `DeliveryDateRangeEnd` date NOT NULL,
  `is_mutliple_item` int(1) NOT NULL DEFAULT '0',
  `SignName` varchar(200) NOT NULL,
  `PONotes` text NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `created_date` datetime NOT NULL,
  `ip_user_created` varchar(50) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  `Status` set('PO','GOOD RECEIVE','PARK','PAYMENT') NOT NULL,
  PRIMARY KEY (`id_purchase_order`),
  KEY `id_purchase_request` (`id_purchase_request`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `purchase_order_old`
--

INSERT INTO `purchase_order_old` (`id_purchase_order`, `id_purchase_request`, `id_vendor`, `up`, `PONumber`, `PODate`, `PONo`, `POMonth`, `POYear`, `RevisionNumber`, `TermOfPayment`, `id_po_category`, `amount`, `metric`, `PriceUnit`, `id_currency`, `ppn`, `pph15`, `pph23`, `others`, `dedicated_to`, `id_vessel`, `id_voyage_order`, `notes`, `DeliveryDateRangeStart`, `DeliveryPlace`, `DeliveryDateRangeEnd`, `is_mutliple_item`, `SignName`, `PONotes`, `created_user`, `created_date`, `ip_user_created`, `ip_user_updated`, `Status`) VALUES
(1, 9, 1000001, 's', 'PML/Purchase Request Order/1/I/2015', '2015-01-06', 1, 1, 2015, 1, 7, 20202, 3, 'packet', 10000.00, 1, 1, 1, 1, 1, 'VESSEL', 1790999, 0, 'Ini yang direject', '2015-01-06', 'as', '2015-01-06', 0, 'as', 'asd', 'admin', '2015-01-06 05:10:41', '::1', '', 'PO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_pica`
--

CREATE TABLE IF NOT EXISTS `purchase_order_pica` (
  `id_purchase_order_pica` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_purchase_order` bigint(20) NOT NULL,
  `problem` varchar(250) NOT NULL,
  `corrective_action` text NOT NULL,
  `PIC` varchar(250) NOT NULL,
  `status_corrective` set('UNSOLVED','SOLVED') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_purchase_order_pica`),
  KEY `id_purchase_order` (`id_purchase_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_request`
--

CREATE TABLE IF NOT EXISTS `purchase_request` (
  `id_purchase_request` bigint(20) NOT NULL AUTO_INCREMENT,
  `PRNumber` varchar(250) NOT NULL,
  `PRDate` date NOT NULL,
  `PRNo` int(11) NOT NULL,
  `PRMonth` int(2) NOT NULL,
  `PRYear` int(4) NOT NULL,
  `TypePR` set('PR','IM') NOT NULL DEFAULT 'PR',
  `id_po_category` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `metric` varchar(20) NOT NULL,
  `estimated_unit_price` double(20,2) NOT NULL,
  `estimated_total_price` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `dedicated_to` set('VESSEL','VOYAGE','OTHERS') NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `id_voyage_order` bigint(11) NOT NULL,
  `notes` text NOT NULL,
  `is_mutliple_item` int(1) NOT NULL DEFAULT '0',
  `requested_user` varchar(45) NOT NULL,
  `requested_date` datetime NOT NULL,
  `ip_user_requested` varchar(50) NOT NULL,
  `Status` set('PR','PR REJECTED','PR APPROVED','PO','GOOD RECEIVE') NOT NULL,
  `approved_user` varchar(45) NOT NULL,
  `approval_date` datetime NOT NULL,
  `ip_user_approved` varchar(50) NOT NULL,
  `approval_notes` varchar(250) NOT NULL,
  `id_purchase_order` bigint(20) NOT NULL,
  PRIMARY KEY (`id_purchase_request`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `id_po_category` (`id_po_category`),
  KEY `id_vessel` (`id_vessel`),
  KEY `dedicated_to` (`dedicated_to`),
  KEY `Status` (`Status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `purchase_request`
--

INSERT INTO `purchase_request` (`id_purchase_request`, `PRNumber`, `PRDate`, `PRNo`, `PRMonth`, `PRYear`, `TypePR`, `id_po_category`, `amount`, `metric`, `estimated_unit_price`, `estimated_total_price`, `id_currency`, `dedicated_to`, `id_vessel`, `id_voyage_order`, `notes`, `is_mutliple_item`, `requested_user`, `requested_date`, `ip_user_requested`, `Status`, `approved_user`, `approval_date`, `ip_user_approved`, `approval_notes`, `id_purchase_order`) VALUES
(1, 'PML/Purchase Request/1/II/2015', '2015-02-03', 1, 2, 2015, 'PR', 10100, 4000, 'LTR', 0.00, 0.00, 0, 'VESSEL', 1770001, 0, 'Perlu segera bunker', 0, 'admin', '2015-02-03 14:57:09', '::1', 'PO', 'admin', '2015-02-05 04:17:34', '::1', '', 12),
(2, 'PML/Purchase Request/2/II/2015', '2015-02-03', 2, 2, 2015, 'PR', 10100, 3500, 'LTR', 0.00, 0.00, 0, 'VESSEL', 1770002, 0, 'Perlu untuk PATRIA 2', 0, 'admin', '2015-02-03 14:57:25', '127.0.0.1', 'PR APPROVED', 'admin', '2015-02-20 14:56:18', '::1', '', 0),
(3, 'PML/Purchase Request/3/II/2015', '2015-02-03', 3, 2, 2015, 'PR', 10200, 1, 'packet', 0.00, 0.00, 0, 'VESSEL', 1770003, 0, 'Minta fresh Water lagi dong', 0, 'admin', '2015-02-03 15:05:25', '::1', 'PR APPROVED', 'admin', '2015-02-05 04:19:33', '::1', '', 0),
(4, 'PML/Purchase Request/4/II/2015', '2015-02-03', 4, 2, 2015, 'PR', 20100, 1, 'packet', 0.00, 0.00, 0, 'VOYAGE', 0, 1, 'Agent', 1, 'admin', '2015-02-03 16:34:06', '::1', 'PR APPROVED', 'admin', '2015-02-05 04:23:07', '::1', '', 0),
(5, 'PML/Purchase Request/5/II/2015', '2015-02-05', 5, 2, 2015, 'PR', 10400, 1, 'packet', 0.00, 0.00, 0, 'VESSEL', 1710022, 0, 'sss', 1, 'admin', '2015-02-05 03:52:21', '::1', 'PR', '', '0000-00-00 00:00:00', '', '', 0),
(6, 'PML/Purchase Request/6/II/2015', '2015-02-05', 6, 2, 2015, 'PR', 20201, 1, 'packet', 0.00, 0.00, 0, 'VESSEL', 1760002, 0, 'as', 0, 'admin', '2015-02-05 04:13:47', '::1', 'PR APPROVED', 'admin', '2015-02-20 15:27:13', '::1', '', 0),
(7, 'PML/Purchase Request/7/II/2015', '2015-02-05', 7, 2, 2015, 'PR', 30000, 30, 'days', 0.00, 0.00, 0, 'VESSEL', 1710014, 0, 'asdas', 0, 'admin', '2015-02-05 04:15:40', '::1', 'PR APPROVED', 'admin', '2015-02-20 14:54:04', '::1', '', 0),
(8, 'PML/Purchase Request/8/II/2015', '2015-02-05', 8, 2, 2015, 'PR', 10400, 1, 'packet', 0.00, 0.00, 0, 'VESSEL', 1770006, 0, 'Tex', 1, 'admin', '2015-02-05 05:01:45', '::1', 'PR', '', '0000-00-00 00:00:00', '', '', 0),
(9, 'PML/Purchase Request/9/II/2015', '2015-02-20', 9, 2, 2015, 'PR', 20201, 1, 'packet', 0.00, 0.00, 0, 'VESSEL', 1710014, 0, 'asdasdas', 0, 'admin', '2015-02-20 10:41:47', '::1', 'PR', '', '0000-00-00 00:00:00', '', '', 0),
(10, 'PML/Purchase Request/10/II/2015', '2015-02-20', 10, 2, 2015, 'PR', 10400, 1, 'packet', 0.00, 0.00, 0, 'VESSEL', 1710014, 0, 'asd', 1, 'admin', '2015-02-20 10:42:12', '::1', 'PR', '', '0000-00-00 00:00:00', '', '', 0),
(11, 'PML/Purchase Request/11/II/2015', '2015-02-20', 11, 2, 2015, 'PR', 20201, 1, 'packet', 0.00, 0.00, 0, 'VESSEL', 1710022, 0, 'sasdas', 1, 'admin', '2015-02-20 10:45:34', '::1', 'PR', '', '0000-00-00 00:00:00', '', '', 0),
(12, 'PML/Purchase Request/12/II/2015', '2015-02-20', 12, 2, 2015, 'PR', 30000, 30, 'days', 0.00, 0.00, 0, 'VESSEL', 1770003, 0, 'zxcz', 0, 'admin', '2015-02-20 14:52:26', '::1', 'PR', '', '0000-00-00 00:00:00', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_request_detail`
--

CREATE TABLE IF NOT EXISTS `purchase_request_detail` (
  `id_purchase_request_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_purchase_request` bigint(20) NOT NULL,
  `purchase_item_table` varchar(200) NOT NULL,
  `id_po_category` int(11) NOT NULL,
  `id_item` bigint(20) NOT NULL,
  `item_add_info` varchar(150) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `metric` varchar(20) NOT NULL,
  `dedicated_to` set('VESSEL','VOYAGE','OTHERS') NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `id_voyage_order` int(11) NOT NULL,
  `notes` text NOT NULL,
  `requested_user` varchar(45) NOT NULL,
  `requested_date` datetime NOT NULL,
  `ip_user_requested` varchar(50) NOT NULL,
  `status` set('PR','PR APPROVED','PO','GOOD RECEIVE') NOT NULL,
  `id_purchase_order_detail` bigint(20) NOT NULL,
  `approved_user` varchar(45) NOT NULL,
  `approval_date` datetime NOT NULL,
  `ip_user_approved` varchar(50) NOT NULL,
  PRIMARY KEY (`id_purchase_request_detail`),
  KEY `id_purchase_request` (`id_purchase_request`),
  KEY `id_item` (`id_item`),
  KEY `dedicated_to` (`dedicated_to`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `id_vessel` (`id_vessel`),
  KEY `id_purchase_order_detail` (`id_purchase_order_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `purchase_request_detail`
--

INSERT INTO `purchase_request_detail` (`id_purchase_request_detail`, `id_purchase_request`, `purchase_item_table`, `id_po_category`, `id_item`, `item_add_info`, `quantity`, `metric`, `dedicated_to`, `id_vessel`, `id_voyage_order`, `notes`, `requested_user`, `requested_date`, `ip_user_requested`, `status`, `id_purchase_order_detail`, `approved_user`, `approval_date`, `ip_user_approved`) VALUES
(1, 1, 'bunkering', 10100, 0, '', 4000, 'LTR', 'VESSEL', 1770001, 0, 'Perlu segera bunker', 'admin', '2015-02-03 14:57:09', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(2, 2, 'bunkering', 10100, 0, '', 3500, 'LTR', 'VESSEL', 1770002, 0, 'Perlu untuk PATRIA 2', 'admin', '2015-02-03 14:57:25', '127.0.0.1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(3, 3, 'fresh_water', 10200, 0, '', 1, 'packet', 'VESSEL', 1770003, 0, 'Minta fresh Water lagi dong', 'admin', '2015-02-03 15:05:25', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(4, 4, 'AgencyItem', 0, 2, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:06', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(5, 4, 'AgencyItem', 0, 3, '', 0, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(6, 4, 'AgencyItem', 0, 5, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(7, 4, 'AgencyItem', 0, 6, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(8, 4, 'AgencyItem', 0, 8, '', 0, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(9, 4, 'AgencyItem', 0, 12, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(10, 4, 'AgencyItem', 0, 14, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(11, 4, 'AgencyItem', 0, 15, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(12, 4, 'AgencyItem', 0, 17, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(13, 4, 'AgencyItem', 0, 18, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(14, 4, 'AgencyItem', 0, 19, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(15, 4, 'AgencyItem', 0, 23, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(16, 4, 'AgencyItem', 0, 24, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(17, 4, 'AgencyItem', 0, 25, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(18, 4, 'AgencyItem', 0, 27, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(19, 4, 'AgencyItem', 0, 32, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(20, 4, 'AgencyItem', 0, 33, '', 1, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(21, 4, 'AgencyItem', 0, 39, '', 2, 'lot', 'VOYAGE', 0, 1, '', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(22, 4, 'AgencyItem', 0, 1, '', 1, 'lot', 'VOYAGE', 0, 1, 'Ranggailung', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(23, 4, 'AgencyItem', 0, 1, '', 1, 'lot', 'VOYAGE', 0, 1, 'BJM', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(24, 4, 'AgencyItem', 0, 4, '', 1, 'lot', 'VOYAGE', 0, 1, 'Ranggailung', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(25, 4, 'AgencyItem', 0, 4, '', 1, 'lot', 'VOYAGE', 0, 1, 'BJM', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(26, 4, 'AgencyItem', 0, 11, '', 1, 'lot', 'VOYAGE', 0, 1, 'Ranggailung', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(27, 4, 'AgencyItem', 0, 11, '', 1, 'lot', 'VOYAGE', 0, 1, 'BJM', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(28, 4, 'AgencyItem', 0, 13, '', 1, 'lot', 'VOYAGE', 0, 1, 'BJM', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(29, 4, 'AgencyItem', 0, 13, '', 0, 'lot', 'VOYAGE', 0, 1, 'TTB', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(30, 4, 'AgencyItem', 0, 28, '', 1, 'lot', 'VOYAGE', 0, 1, 'R ilung -TTB-R ilung', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(31, 4, 'AgencyItem', 0, 40, '', 1, 'lot', 'VOYAGE', 0, 1, 'Ranggailung', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(32, 4, 'AgencyItem', 0, 40, '', 1, 'lot', 'VOYAGE', 0, 1, 'BJM', 'admin', '2015-02-03 16:34:07', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(37, 5, 'ConsumableStockItem', 10400, 200022, '', 20, 'packet', 'VESSEL', 0, 0, 's', 'admin', '2015-02-05 04:01:51', '::1', 'PO', 1, '', '0000-00-00 00:00:00', ''),
(38, 5, 'ConsumableStockItem', 10400, 100032, '', 20, 'packet', 'VESSEL', 0, 0, 's', 'admin', '2015-02-05 04:02:03', '::1', 'PR APPROVED', 0, '', '0000-00-00 00:00:00', ''),
(39, 8, 'ConsumableStockItem', 10400, 200022, '', 15, 'packet', 'VESSEL', 0, 0, 'a', 'admin', '2015-02-05 05:01:56', '::1', 'PO', 2, '', '0000-00-00 00:00:00', ''),
(40, 8, 'ConsumableStockItem', 10400, 100037, '', 20, 'packet', 'VESSEL', 0, 0, 'as', 'admin', '2015-02-05 05:02:07', '::1', 'PO', 3, '', '0000-00-00 00:00:00', ''),
(41, 8, 'ConsumableStockItem', 10400, 100033, '', 20, 'packet', 'VESSEL', 0, 0, 'as', 'admin', '2015-02-05 05:02:20', '::1', 'PR APPROVED', 0, '', '0000-00-00 00:00:00', ''),
(42, 11, 'SurveyItem', 20201, 1, '', 12, 'packet', 'VESSEL', 0, 0, 'a', 'admin', '2015-02-20 14:01:35', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(43, 11, 'SurveyItem', 20201, 2, '', 1, 'packet', 'VESSEL', 0, 0, 'sdf', 'admin', '2015-02-20 14:23:44', '::1', 'PR', 0, '', '0000-00-00 00:00:00', ''),
(44, 11, 'SurveyItem', 20201, 4, '', 2, 'packet', 'VESSEL', 0, 0, 'as', 'admin', '2015-02-20 14:23:58', '::1', 'PR', 0, '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_request_pica`
--

CREATE TABLE IF NOT EXISTS `purchase_request_pica` (
  `id_purchase_request_pica` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_purchase_request` bigint(20) NOT NULL,
  `problem` varchar(250) NOT NULL,
  `corrective_action` text NOT NULL,
  `PIC` varchar(250) NOT NULL,
  `status_corrective` set('UNSOLVED','SOLVED') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_purchase_request_pica`),
  KEY `id_purchase_request` (`id_purchase_request`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `purchase_request_pica`
--

INSERT INTO `purchase_request_pica` (`id_purchase_request_pica`, `id_purchase_request`, `problem`, `corrective_action`, `PIC`, `status_corrective`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(3, 9, 'as', 'as', 'as', '', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
  `id_quotation` bigint(20) NOT NULL AUTO_INCREMENT,
  `QuotationNumber` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `RevisionNumber` int(3) NOT NULL,
  `id_bussiness_type_order` int(11) NOT NULL DEFAULT '100',
  `NoOrder` int(11) NOT NULL,
  `NoMonth` int(2) NOT NULL,
  `NoYear` int(4) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `attn` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `QuotationDate` date NOT NULL,
  `period_year` int(4) NOT NULL,
  `period_month` int(2) NOT NULL,
  `period_quartal` int(1) NOT NULL,
  `BargingJettyIdStart` int(11) NOT NULL,
  `BargingJettyIdEnd` int(11) NOT NULL,
  `BargingVesselTug` int(11) NOT NULL,
  `BargingVesselBarge` int(11) NOT NULL,
  `TranshipmentMotherVesselID` int(11) NOT NULL,
  `IsSingleRoute` int(1) NOT NULL DEFAULT '1',
  `QuantityPrice` double(20,2) NOT NULL,
  `QuantityPriceCurency` int(11) NOT NULL,
  `LoadingDate` date NOT NULL,
  `TotalQuantity` double(20,4) NOT NULL,
  `QuantityUnit` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `TCStartDate` date NOT NULL,
  `TCEndDate` date NOT NULL,
  `TCPrice` double(20,2) NOT NULL,
  `SignName` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `SignPosition` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `Status` set('QUOTATION','SHIPPING ORDER','VO CREATE','VO SAILING','VO FINISH','VO DOC COMPLETE','INVOICE','PAY') COLLATE latin1_general_ci NOT NULL DEFAULT 'QUOTATION',
  `Category` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `StatusDescription` text COLLATE latin1_general_ci NOT NULL,
  `attachment` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `spal_created` int(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_quotation`),
  KEY `id_customer` (`id_customer`),
  KEY `id_bussiness_type_ops` (`id_bussiness_type_order`),
  KEY `BargingJettyIdStart` (`BargingJettyIdStart`),
  KEY `BargingJettyIdEnd` (`BargingJettyIdEnd`),
  KEY `BargingVesselTug` (`BargingVesselTug`),
  KEY `BargingVesselBarge` (`BargingVesselBarge`),
  KEY `period_year` (`period_year`),
  KEY `period_month` (`period_month`),
  KEY `period_quartal` (`period_quartal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `quotation`
--

INSERT INTO `quotation` (`id_quotation`, `QuotationNumber`, `RevisionNumber`, `id_bussiness_type_order`, `NoOrder`, `NoMonth`, `NoYear`, `id_customer`, `attn`, `QuotationDate`, `period_year`, `period_month`, `period_quartal`, `BargingJettyIdStart`, `BargingJettyIdEnd`, `BargingVesselTug`, `BargingVesselBarge`, `TranshipmentMotherVesselID`, `IsSingleRoute`, `QuantityPrice`, `QuantityPriceCurency`, `LoadingDate`, `TotalQuantity`, `QuantityUnit`, `TCStartDate`, `TCEndDate`, `TCPrice`, `SignName`, `SignPosition`, `Status`, `Category`, `StatusDescription`, `attachment`, `spal_created`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 'PML/MKT/1/XII/2014', 0, 100, 1, 12, 2014, 2300000007, 'Bpk. Budi Santosa', '2014-12-24', 0, 0, 0, 20001, 20003, 1770007, 1601001, 0, 1, 6000.00, 1, '2014-12-23', 5000.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, 'Bpk. Joko', 'Head Marketing', 'VO FINISH', '', '-', '', 0, '2014-12-22 15:21:24', 'adminbandung', '::1'),
(2, 'PML/MKT/2/XII/2014', 0, 300, 2, 12, 2014, 2300000007, 'iii', '2014-12-23', 0, 0, 0, 0, 0, 1770001, 1601008, 0, 1, 0.00, 0, '0000-00-00', 0.0000, '', '2014-12-10', '2014-12-23', 8000.00, 'i', 'ii', 'SHIPPING ORDER', '', '', '', 0, '2014-12-22 15:26:14', 'adminbandung', '::1'),
(3, 'PML/MKT/3/XII/2014', 0, 200, 3, 12, 2014, 30387, 'oppp', '2014-12-24', 0, 0, 0, 30002, 110003, 1770002, 1601006, 9, 1, 7500.00, 1, '2014-12-24', 9000.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, 'pas', 'sda', 'QUOTATION', '', '-', '', 0, '2014-12-22 15:26:59', 'adminbandung', '::1'),
(4, 'PML/MKT/4/XII/2014', 0, 400, 4, 12, 2014, 2300000007, 'asda', '2014-12-23', 0, 0, 0, 110002, 110001, 1770006, 6601023, 0, 1, 9000.00, 1, '2014-12-24', 7000.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, 'as', 'asd', 'QUOTATION', '', 'iiiii', '', 1, '2014-12-22 15:28:47', 'adminbandung', '::1'),
(5, '', 0, 100, 0, 0, 0, 2300000007, 'sd', '0000-00-00', 0, 0, 0, 70002, 100001, 1770009, 1610102, 0, 1, 9000.00, 1, '2014-12-23', 6700.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, '', '', 'VO CREATE', '', 'dd', '', 0, '2014-12-22 16:43:55', 'adminbandung', '::1'),
(6, '', 0, 200, 0, 0, 0, 30387, 'oppp', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0.00, 0, '0000-00-00', 0.0000, '', '0000-00-00', '0000-00-00', 0.00, '', '', 'QUOTATION', '', '', '', 0, '2014-12-27 19:56:13', 'adminbandung', '::1'),
(7, '', 0, 100, 0, 0, 0, 30525, 'oppp', '0000-00-00', 0, 0, 0, 100001, 30003, 1770001, 1601008, 0, 1, 9000.00, 1, '2014-12-27', 9000.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, '', '', 'VO SAILING', '', '-', '', 0, '2014-12-27 19:56:50', 'adminbandung', '::1'),
(8, 'PML/MKT/5/XII/2014', 0, 100, 5, 12, 2014, 2100000002, 'ttt', '2014-12-25', 0, 0, 0, 20001, 20003, 0, 0, 0, 0, 0.00, 0, '0000-00-00', 9000.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, 'ttt', 'ttttt', 'QUOTATION', '', 'sss', '', 0, '2014-12-28 11:08:30', 'adminbandung', '::1'),
(9, '', 0, 100, 0, 0, 0, 2300000007, 'as', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0.00, 0, '0000-00-00', 0.0000, '', '0000-00-00', '0000-00-00', 0.00, '', '', 'QUOTATION', '', '', '', 0, '2015-01-23 11:25:16', 'admin', '::1'),
(10, '', 0, 100, 0, 0, 0, 30525, 'Bpk. Budi Santosa', '0000-00-00', 0, 0, 0, 20001, 20001, 1770003, 1601004, 0, 1, 65000.00, 1, '2015-01-23', 5000.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, '', '', 'QUOTATION', '', 'sa', '', 1, '2015-01-23 13:36:25', 'admin', '::1'),
(11, 'PML/MKT/1/I/2015', 0, 300, 1, 1, 2015, 30387, 'ss', '2015-01-27', 0, 0, 0, 0, 0, 1770001, 1601008, 0, 1, 0.00, 0, '0000-00-00', 0.0000, '', '2015-01-28', '2015-01-31', 45000.00, 'ss', 'ss', 'QUOTATION', '', '', '', 0, '2015-01-26 10:22:08', 'admin', '::1'),
(12, 'PML/MKT/2/I/2015', 0, 100, 2, 1, 2015, 30575, 'Bpk. Budi Santosa', '2015-01-09', 0, 0, 0, 200005, 200001, 1770002, 1601007, 0, 1, 800.00, 2, '2015-01-17', 4500.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, 'ss', 's', 'QUOTATION', '', 'Barang Bagus', '', 0, '2015-01-31 12:46:37', 'admin', '::1'),
(13, '', 0, 200, 0, 0, 0, 30390, 'a', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0.00, 0, '0000-00-00', 0.0000, '', '0000-00-00', '0000-00-00', 0.00, '', '', 'QUOTATION', '', '', '', 0, '2015-02-11 12:20:35', 'admin', '::1'),
(14, '', 0, 100, 0, 0, 0, 30390, 'asda', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0.00, 0, '0000-00-00', 0.0000, '', '0000-00-00', '0000-00-00', 0.00, '', '', 'QUOTATION', '', '', '', 0, '2015-02-11 12:21:19', 'marketingtest', '::1'),
(15, '', 0, 100, 0, 0, 0, 30390, 'as', '0000-00-00', 0, 0, 0, 110004, 110003, 1770007, 1601003, 0, 1, 6700.00, 1, '2015-02-24', 3600.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, '', '', 'SHIPPING ORDER', '', 'asdas', '', 0, '2015-02-23 20:10:53', 'admin', '::1'),
(16, '', 0, 100, 0, 0, 0, 30575, 'as', '0000-00-00', 0, 0, 0, 20002, 20002, 1770002, 1601007, 0, 1, 7500.00, 1, '2015-02-25', 3500.0000, 'MT', '0000-00-00', '0000-00-00', 0.00, '', '', 'SHIPPING ORDER', '', 'asd', '', 0, '2015-02-23 20:17:50', 'admin', '::1'),
(17, '', 0, 300, 0, 0, 0, 30387, 'oop', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0.00, 0, '0000-00-00', 0.0000, '', '0000-00-00', '0000-00-00', 0.00, '', '', 'QUOTATION', '', '', '', 0, '2015-02-24 07:52:00', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotation_detail_vessel`
--

CREATE TABLE IF NOT EXISTS `quotation_detail_vessel` (
  `id_quotation_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_quotation` bigint(20) NOT NULL,
  `IdJettyOrigin` int(11) NOT NULL,
  `IdJettyDestination` int(11) NOT NULL,
  `BargingVesselTug` int(11) NOT NULL,
  `BargingVesselBarge` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `BargeSize` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Price` double(14,4) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `fuel_price` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_quotation_detail`),
  KEY `id_quotation` (`id_quotation`),
  KEY `id_currency` (`id_currency`),
  KEY `IdJettyOrigin` (`IdJettyOrigin`,`IdJettyDestination`),
  KEY `IdJettyDestination` (`IdJettyDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `quotation_detail_vessel`
--

INSERT INTO `quotation_detail_vessel` (`id_quotation_detail`, `id_quotation`, `IdJettyOrigin`, `IdJettyDestination`, `BargingVesselTug`, `BargingVesselBarge`, `StartDate`, `BargeSize`, `Capacity`, `Price`, `id_currency`, `change_rate`, `fuel_price`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(2, 1, 20001, 20003, 1770007, 1601001, '2014-12-23', 240, 5000, 6000.0000, 1, 1.00, 12500.00, '2014-12-22 15:21:24', 'adminbandung', '::1'),
(3, 3, 30002, 110003, 1770002, 1601006, '2014-12-24', 300, 9000, 7500.0000, 1, 1.00, 12500.00, '2014-12-22 15:26:59', 'adminbandung', '::1'),
(5, 4, 110002, 110001, 1770006, 6601023, '2014-12-24', 230, 7000, 9000.0000, 1, 1.00, 12500.00, '2014-12-22 15:28:48', 'adminbandung', '::1'),
(6, 5, 70002, 100001, 1770009, 1610102, '2014-12-23', 300, 6700, 9000.0000, 1, 1.00, 12500.00, '2014-12-22 16:43:55', 'adminbandung', '::1'),
(7, 7, 100001, 30003, 1770001, 1601008, '2014-12-27', 300, 9000, 9000.0000, 1, 1.00, 12500.00, '2014-12-27 19:56:50', 'adminbandung', '::1'),
(8, 10, 20001, 20001, 1770003, 1601004, '2015-01-23', 300, 5000, 65000.0000, 1, 1.00, 11250.00, '2015-01-23 13:36:25', 'admin', '::1'),
(9, 12, 200005, 200001, 1770002, 1601007, '2015-01-17', 300, 4500, 800.0000, 2, 12500.00, 7500.00, '2015-01-31 12:46:37', 'admin', '::1'),
(10, 15, 110004, 110003, 1770007, 1601003, '2015-02-24', 240, 3600, 6700.0000, 1, 1.00, 7500.00, '2015-02-23 20:10:53', 'admin', '::1'),
(11, 16, 20002, 20002, 1770002, 1601007, '2015-02-25', 300, 3500, 7500.0000, 1, 1.00, 7500.00, '2015-02-23 20:17:50', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rent_item`
--

CREATE TABLE IF NOT EXISTS `rent_item` (
  `id_rent_item` int(11) NOT NULL AUTO_INCREMENT,
  `rent_item_name` varchar(250) NOT NULL,
  `rent_item_code` varchar(40) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id_rent_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `rent_item`
--

INSERT INTO `rent_item` (`id_rent_item`, `rent_item_name`, `rent_item_code`, `category`) VALUES
(1, 'Time Charter Tug/Barge', 'R-TC1001', 1),
(2, 'Time Charter Tug', 'R-TC1002', 1),
(3, 'Time Charter Barge', 'R-TC1003', 1),
(4, 'Bare Boat Charter Tug/Barge', 'R-TC2001', 2),
(5, 'Bare Boat Charter Tug', 'R-TC2002', 2),
(6, 'Bare Boat Charter Barge', 'R-TC2003', 2),
(7, 'Spot Charter Tug/Barge', 'R-TC3001', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_for_schedule`
--

CREATE TABLE IF NOT EXISTS `request_for_schedule` (
  `id_request_for_schedule` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel` int(11) NOT NULL,
  `id_vessel_status` int(11) NOT NULL,
  `status_rfs` set('APPROVED','REJECTED','NONE') NOT NULL DEFAULT 'NONE',
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `notes` varchar(250) NOT NULL,
  `id_schedule` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  `TypeSchedule` set('UNSCHEDULED','SCHEDULED') NOT NULL,
  `TypeBreakdown` set('BREAKDOWN','UNBREAKDOWN') NOT NULL,
  `forced_plot_to_schedule` set('NO','YES') NOT NULL,
  `approved_user` varchar(64) NOT NULL,
  `approval_date` datetime NOT NULL,
  `ip_user_approved` varchar(64) NOT NULL,
  PRIMARY KEY (`id_request_for_schedule`),
  KEY `StartDate` (`StartDate`),
  KEY `EndDate` (`EndDate`),
  KEY `VesselTugId` (`id_vessel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `request_for_schedule`
--

INSERT INTO `request_for_schedule` (`id_request_for_schedule`, `id_vessel`, `id_vessel_status`, `status_rfs`, `StartDate`, `EndDate`, `notes`, `id_schedule`, `created_date`, `created_user`, `ip_user_updated`, `TypeSchedule`, `TypeBreakdown`, `forced_plot_to_schedule`, `approved_user`, `approval_date`, `ip_user_approved`) VALUES
(1, 1601003, 20, 'NONE', '2014-12-10', '2014-12-18', 'Mohon segera dijadwalkan untuk repair kapal tersebut', 0, '2014-12-08 08:11:27', 'vpctester', '::1', '', '', '', '', '0000-00-00 00:00:00', ''),
(2, 1770003, 20, 'REJECTED', '2015-01-22', '2015-01-26', '--', 0, '2015-01-21 13:40:29', 'admin', '::1', 'UNSCHEDULED', 'UNBREAKDOWN', '', 'admin', '2015-01-21 13:40:56', '::1'),
(3, 1601003, 20, 'NONE', '2015-02-11', '2015-02-19', 'qw', 0, '2015-02-03 15:54:09', 'admin', '::1', 'UNSCHEDULED', 'UNBREAKDOWN', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `revenue_item_actual`
--

CREATE TABLE IF NOT EXISTS `revenue_item_actual` (
  `id_revenue_item_actual` int(11) NOT NULL AUTO_INCREMENT,
  `revenue_item` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id_revenue_item_actual`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3022 ;

--
-- Dumping data untuk tabel `revenue_item_actual`
--

INSERT INTO `revenue_item_actual` (`id_revenue_item_actual`, `revenue_item`, `is_active`) VALUES
(3020, 'Income - Demurage Cost', 1),
(3021, 'Income - Debit Note', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfq_vendor`
--

CREATE TABLE IF NOT EXISTS `rfq_vendor` (
  `id_rfq_vendor` bigint(20) NOT NULL AUTO_INCREMENT,
  `RFQNumber` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `NoOrder` int(11) NOT NULL,
  `NoMonth` int(2) NOT NULL,
  `NoYear` int(4) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `From` varchar(64) COLLATE latin1_general_ci NOT NULL DEFAULT 'Patria Maritim',
  `QuotationDate` date NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_rfq_vendor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `rfq_vendor`
--

INSERT INTO `rfq_vendor` (`id_rfq_vendor`, `RFQNumber`, `NoOrder`, `NoMonth`, `NoYear`, `id_vendor`, `From`, `QuotationDate`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 'RFQ/1/PML/I/2013', 0, 0, 0, 0, 'Patria Maritim', '2013-01-24', '0000-00-00 00:00:00', '', ''),
(2, 'RFQ/2/PML/I/2013', 0, 0, 0, 0, 'Patria Maritim', '2013-01-09', '0000-00-00 00:00:00', '', ''),
(3, 'RFQ/3/PML/I/2013', 0, 0, 0, 0, 'Patria Maritim', '2013-01-31', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfq_vendor_detail`
--

CREATE TABLE IF NOT EXISTS `rfq_vendor_detail` (
  `id_rfq_vendor_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_rfq_vendor` bigint(20) NOT NULL,
  `id_part` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rfq_vendor_detail`),
  KEY `id_rfq_vendor` (`id_rfq_vendor`),
  KEY `id_part` (`id_part`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `RouteId` bigint(21) NOT NULL AUTO_INCREMENT,
  `Place_first` text COLLATE latin1_general_ci NOT NULL,
  `Place_second` text COLLATE latin1_general_ci NOT NULL,
  `Acronym` varchar(32) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`RouteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=50 ;

--
-- Dumping data untuk tabel `route`
--

INSERT INTO `route` (`RouteId`, `Place_first`, `Place_second`, `Acronym`) VALUES
(1, 'Muarabakah', 'Teluk Timbau', 'MBK-TTB'),
(2, 'Sungai Puting', 'Taboneo', 'SPT-TBN'),
(3, 'Teluk Timbau', 'Taboneo', 'TTB-TBN'),
(4, 'Paring Lahung', 'Teluk Timbau', 'PLG-TTB'),
(5, 'TALIO', 'Taboneo', 'TLO-TBN'),
(6, 'Sungai Puting', 'Tuban', 'SPT-TUB'),
(7, 'BINTANG NINGGI', 'INDONESIA BULK TERMINAL', 'BNG-IBT'),
(8, 'Sungai Danau', 'Paiton', 'SDN-PTN'),
(9, 'Kelanis', 'Cirebon', 'KLN-CRB'),
(10, 'Marabakah', 'TUTUI', 'MBK-TTI'),
(11, 'BINTANG NINGGI', 'Cirebon', 'BNG-CRB'),
(12, 'MTU', 'Taboneo', 'MTU-TBN'),
(13, 'Paiton', 'Tuban', 'PTN-TUB'),
(14, 'LAMONGAN', 'TARJUN', 'LAM-TAR'),
(15, 'Sungai Puting', 'Cirebon', 'SPT-CRB'),
(16, 'KINTAP', 'Tuban', 'KTP-TUB'),
(17, 'BATU LICIN', 'SEMARANG', 'BTL-SMG'),
(18, 'KINTAP', 'Taboneo', 'KTP-TBN'),
(19, 'BATU LICIN', 'KUPANG', 'BTL-KPG'),
(20, 'CENKO', 'GRESIK', 'CNK-GSK'),
(21, 'BINTANG NINGGI', 'Tanjung Priok', 'BNG-PRK'),
(22, 'BATU LICIN', 'TANJUNG PEMANCINGAN', 'BTL-TJP'),
(23, 'Kelanis', 'GRESIK', 'KLN-GSK'),
(24, 'BINTANG NINGGI', 'Teluk Timbau', 'BNG-TTB'),
(25, 'Sungai Puting', 'Teluk Timbau', 'SPT-TTB'),
(26, 'Sungai Danau', 'Cirebon', 'SDN-CRB'),
(27, 'Sungai Puting', 'GRESIK', 'SPT-GSK'),
(28, 'Sungai Danau', 'Tuban', 'SDN-TUB'),
(29, 'Batu Licin', 'Taboneo', 'BTLC-TBN'),
(30, 'Bintang Ninggi', 'Taboneo', 'BNG-TBN'),
(31, 'Sungai Puting', 'Merakmas', 'SPT-MRK'),
(32, 'Sungai Puting ', 'Bojonegara', 'SPT-BJN'),
(33, 'Sungai Durian', 'Tanjung Pemancingan', 'SDR-TJP'),
(34, 'Paring Lahung', 'Taboneo', 'PLG-TBN'),
(35, 'Serongga', 'Cigading', 'SRG-CGD'),
(36, 'Bunati', 'Muara Bunati', 'BNT-Mr BNT'),
(37, 'Marabahan', 'Gresik', 'MRBH-GSK'),
(38, 'Batu Licin', 'Muara Satui', 'BTLC-Mr STI'),
(39, 'Sungai Puting', 'Tuban', 'SPT-TUB'),
(40, 'Batu Licin', 'Biringkasi', 'BTLC-BRKS'),
(41, 'PARING LAHUNG', 'SATUI', 'PLG-STI'),
(42, 'SEPAPAH', 'GRESIK', 'SPP-GSK'),
(43, 'Sungai Danau', 'Satui', 'SDN-STI'),
(44, 'KINTAP', 'SATUI', 'BNT-STI'),
(45, 'Bunati', 'Tuban', 'BNT-TUB'),
(46, 'Sungai Danau', 'Gresik', 'SDN-GSK'),
(47, 'Telang Baru', 'Taboneo', 'TLB-TBN'),
(48, 'Sungai Danau', 'Taboneo', 'SDN-TBN'),
(49, 'Sungai Puting', 'Ciwandan', 'SPT-CWD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sailing_order`
--

CREATE TABLE IF NOT EXISTS `sailing_order` (
  `id_sailing_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `SailingOrderNumber` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `SailingOrderStatus` set('VO SAILING','VO FINISH','VO DOC COMPLETE','INVOICE','PAY') COLLATE latin1_general_ci NOT NULL,
  `SailingOrderNo` int(11) NOT NULL,
  `SailingOrderMonth` int(2) NOT NULL,
  `SailingOrderYear` int(4) NOT NULL,
  `id_voyage_order` bigint(20) NOT NULL,
  `CrewIdMaster` int(11) NOT NULL,
  `Date` date NOT NULL COMMENT 'days',
  `StartDate` datetime NOT NULL,
  `StandardFuel` double(20,2) NOT NULL,
  `LayTime` int(11) NOT NULL,
  `Insentif` double(20,2) NOT NULL,
  `LastFuelStock` double(20,2) NOT NULL,
  `Remark` text COLLATE latin1_general_ci NOT NULL,
  `Nautical` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `NauticalHead` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_sailing_order`),
  KEY `id_quotation` (`id_voyage_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `sailing_order`
--

INSERT INTO `sailing_order` (`id_sailing_order`, `SailingOrderNumber`, `SailingOrderStatus`, `SailingOrderNo`, `SailingOrderMonth`, `SailingOrderYear`, `id_voyage_order`, `CrewIdMaster`, `Date`, `StartDate`, `StandardFuel`, `LayTime`, `Insentif`, `LastFuelStock`, `Remark`, `Nautical`, `NauticalHead`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 'PML/SailingOrder/1/XII/2014', 'VO FINISH', 1, 12, 2014, 1, 1770007001, '2014-12-29', '2014-12-25 00:00:00', 12.00, 12, 12.00, 12.00, '12222', 'Yogi Prasetyo', 'JULKIFLI', '2014-12-29 21:10:58', 'adminbandung', '::1'),
(2, 'PML/SailingOrder/1/I/2015', 'VO SAILING', 1, 1, 2015, 4, 1770001001, '2015-01-30', '2014-12-30 10:00:00', 0.00, 0, 500000.00, 70000.00, '-', 'Yogi Prasetyo', 'JULKIFLI', '2015-01-30 15:52:10', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_cost`
--

CREATE TABLE IF NOT EXISTS `sales_cost` (
  `id_sales_cost` bigint(20) NOT NULL AUTO_INCREMENT,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `BargeSize` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `TotalQuantity` double(20,2) NOT NULL,
  `QuantityUnit` varchar(10) NOT NULL,
  `PriceUnit` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `FuelLtr` double(20,2) NOT NULL,
  `FuelCost` double(20,2) NOT NULL,
  `AgencyCost` double(20,2) NOT NULL,
  `DepreciationCost` double(20,2) NOT NULL,
  `CrewCost` double(20,2) NOT NULL,
  `SubconCost` double(20,2) NOT NULL,
  `IncuranceCost` double(20,2) NOT NULL,
  `RepairCost` double(20,2) NOT NULL,
  `DockingCost` double(20,2) NOT NULL,
  `BrokerageCost` double(20,2) NOT NULL,
  `OthersCost` double(20,2) NOT NULL,
  `GP_COGM` double(8,1) NOT NULL,
  `MarginFuelCost` double(8,1) NOT NULL,
  `MarginAgencyCost` double(8,1) NOT NULL,
  `MarginDepreciationCost` double(8,1) NOT NULL,
  `MarginCrewCost` double(8,1) NOT NULL,
  `MarginSubconCost` double(8,1) NOT NULL,
  `MarginIncuranceCost` double(8,1) NOT NULL,
  `MarginRepairCost` double(8,1) NOT NULL,
  `MarginDockingCost` double(8,1) NOT NULL,
  `MarginBrokerageCost` double(8,1) NOT NULL,
  `MarginOthersCost` double(8,1) NOT NULL,
  `GP_COGS` double(8,1) NOT NULL,
  `TotalRevenue` double(20,2) NOT NULL,
  `TotalStandardCost` double(20,2) NOT NULL,
  `TotalSalesCost` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sales_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_master`
--

CREATE TABLE IF NOT EXISTS `sales_master` (
  `id_sales_master` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel_tug` int(11) NOT NULL,
  `id_vessel_barge` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `month` set('MASTER','Q1','Q2','Q3') NOT NULL,
  `VoyageName` varchar(50) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `voyage_no` int(3) NOT NULL,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `TotalQuantity` double(20,2) NOT NULL,
  `QuantityUnit` varchar(10) NOT NULL,
  `PriceUnit` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `FuelLtr` double(20,2) NOT NULL,
  `FuelCost` double(20,2) NOT NULL,
  `AgencyCost` double(20,2) NOT NULL,
  `DepreciationCost` double(20,2) NOT NULL,
  `CrewCost` double(20,2) NOT NULL,
  `Rent` double(20,2) NOT NULL,
  `SubconCost` double(20,2) NOT NULL,
  `IncuranceCost` double(20,2) NOT NULL,
  `RepairCost` double(20,2) NOT NULL,
  `DockingCost` double(20,2) NOT NULL,
  `BrokerageCost` double(20,2) NOT NULL,
  `OthersCost` double(20,2) NOT NULL,
  `GP_COGM` double(8,2) NOT NULL,
  `MarginFuelCost` double(8,2) NOT NULL,
  `MarginAgencyCost` double(8,2) NOT NULL,
  `MarginDepreciationCost` double(8,2) NOT NULL,
  `MarginCrewCost` double(8,2) NOT NULL,
  `MarginRent` double(8,2) NOT NULL,
  `MarginSubconCost` double(8,2) NOT NULL,
  `MarginIncuranceCost` double(8,2) NOT NULL,
  `MarginRepairCost` double(8,2) NOT NULL,
  `MarginDockingCost` double(8,2) NOT NULL,
  `MarginBrokerageCost` double(8,2) NOT NULL,
  `MarginOthersCost` double(8,2) NOT NULL,
  `GP_COGS` double(8,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sales_master`),
  KEY `id_vessel_tug` (`id_vessel_tug`),
  KEY `id_vessel_barge` (`id_vessel_barge`),
  KEY `month` (`month`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_plan`
--

CREATE TABLE IF NOT EXISTS `sales_plan` (
  `id_sales_plan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel_tug` int(11) NOT NULL,
  `id_vessel_barge` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `status` set('UNLOCKED','LOCKED') NOT NULL,
  `VoyageName` varchar(50) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `voyage_no` int(3) NOT NULL,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `TotalQuantity` double(20,2) NOT NULL,
  `QuantityUnit` varchar(10) NOT NULL,
  `PriceUnit` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `FuelLtr` double(20,2) NOT NULL,
  `FuelCost` double(20,2) NOT NULL,
  `AgencyCost` double(20,2) NOT NULL,
  `DepreciationCost` double(20,2) NOT NULL,
  `CrewCost` double(20,2) NOT NULL,
  `Rent` double(20,2) NOT NULL,
  `SubconCost` double(20,2) NOT NULL,
  `IncuranceCost` double(20,2) NOT NULL,
  `RepairCost` double(20,2) NOT NULL,
  `DockingCost` double(20,2) NOT NULL,
  `BrokerageCost` double(20,2) NOT NULL,
  `OthersCost` double(20,2) NOT NULL,
  `GP_COGM` double(8,1) NOT NULL,
  `MarginFuelCost` double(8,1) NOT NULL,
  `MarginAgencyCost` double(8,1) NOT NULL,
  `MarginDepreciationCost` double(8,1) NOT NULL,
  `MarginCrewCost` double(8,1) NOT NULL,
  `MarginRent` double(8,1) NOT NULL,
  `MarginSubconCost` double(8,1) NOT NULL,
  `MarginIncuranceCost` double(8,1) NOT NULL,
  `MarginRepairCost` double(8,1) NOT NULL,
  `MarginDockingCost` double(8,1) NOT NULL,
  `MarginBrokerageCost` double(8,1) NOT NULL,
  `MarginOthersCost` double(8,1) NOT NULL,
  `GP_COGS` double(8,1) NOT NULL,
  `TotalRevenue` double(20,2) NOT NULL,
  `TotalStandardCost` double(20,2) NOT NULL,
  `TotalSalesCost` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sales_plan`),
  KEY `id_vessel_tug` (`id_vessel_tug`),
  KEY `id_vessel_barge` (`id_vessel_barge`),
  KEY `month` (`month`),
  KEY `year` (`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data untuk tabel `sales_plan`
--

INSERT INTO `sales_plan` (`id_sales_plan`, `id_vessel_tug`, `id_vessel_barge`, `year`, `month`, `status`, `VoyageName`, `id_customer`, `voyage_no`, `JettyIdStart`, `JettyIdEnd`, `TotalQuantity`, `QuantityUnit`, `PriceUnit`, `id_currency`, `change_rate`, `FuelLtr`, `FuelCost`, `AgencyCost`, `DepreciationCost`, `CrewCost`, `Rent`, `SubconCost`, `IncuranceCost`, `RepairCost`, `DockingCost`, `BrokerageCost`, `OthersCost`, `GP_COGM`, `MarginFuelCost`, `MarginAgencyCost`, `MarginDepreciationCost`, `MarginCrewCost`, `MarginRent`, `MarginSubconCost`, `MarginIncuranceCost`, `MarginRepairCost`, `MarginDockingCost`, `MarginBrokerageCost`, `MarginOthersCost`, `GP_COGS`, `TotalRevenue`, `TotalStandardCost`, `TotalSalesCost`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(16, 1760002, 7645020, 2015, 1, '', '', 30618, 0, 190006, 200001, 7601.00, 'MT', 3166.24, 1, 1.00, 0.00, 0.00, 22079458.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9.0, 9.0, 9.0, 9.0, 9.0, 0.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 9.0, 24066609.22, 24066609.22, 24066609.22, '2015-01-29 10:33:40', 'admin', '::1'),
(17, 1760002, 7645020, 2015, 1, '', '', 30618, 0, 190006, 200001, 7845.00, 'MT', 3152.20, 1, 1.00, 0.00, 0.00, 22079458.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12.0, 12.0, 12.0, 12.0, 12.0, 0.0, 12.0, 12.0, 12.0, 12.0, 12.0, 12.0, 12.0, 24728992.96, 24728992.96, 24728992.96, '2015-01-29 10:34:16', 'admin', '::1'),
(18, 1760002, 7645020, 2015, 1, '', '', 2300000008, 0, 200005, 200001, 7704.00, 'MT', 3856.73, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 36.0, 36.0, 36.0, 36.0, 36.0, 0.0, 36.0, 36.0, 36.0, 36.0, 36.0, 36.0, 36.0, 29712209.68, 29712209.68, 29712209.68, '2015-01-29 10:34:39', 'admin', '::1'),
(22, 1802001, 1601008, 2015, 1, '', '', 2100000030, 0, 20010, 200001, 7503.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(23, 1802001, 1601008, 2015, 1, '', '', 2100000036, 0, 20002, 130007, 7514.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(24, 1770001, 1601004, 2015, 1, '', '', 30618, 1, 190006, 200001, 7700.00, 'MT', 28001.04, 1, 1.00, 0.00, 55500000.00, 22079458.00, 38204875.60, 5236000.00, 0.00, 4687400.00, 8096900.00, 20000000.00, 13333333.33, 0.00, 0.00, 29.0, 29.0, 29.0, 29.0, 29.0, 0.0, 29.0, 29.0, 29.0, 29.0, 29.0, 29.0, 29.0, 215607977.34, 215607977.34, 215607977.34, '2015-01-29 09:43:42', 'admin', '::1'),
(25, 1770001, 1601004, 2015, 1, '', '', 2300000008, 2, 160002, 200001, 7537.00, 'MT', 4477.35, 1, 1.00, 0.00, 0.00, 22497213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 50.0, 50.0, 50.0, 50.0, 50.0, 0.0, 50.0, 50.0, 50.0, 50.0, 50.0, 50.0, 50.0, 33745819.50, 33745819.50, 33745819.50, '2015-01-29 09:46:05', 'admin', '::1'),
(26, 1770001, 1601004, 2015, 1, '', '', 2300000007, 3, 200005, 200001, 7574.00, 'MT', 43723.62, 1, 1.00, 0.00, 82500000.00, 21847213.00, 50939834.13, 6981333.33, 0.00, 6249866.67, 10795866.67, 26666666.67, 17777777.78, 0.00, 0.00, 48.0, 48.0, 48.0, 48.0, 48.0, 0.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 331162666.20, 331162666.20, 331162666.20, '2015-01-29 09:49:03', 'admin', '::1'),
(27, 1770001, 1601004, 2015, 1, '', '', 2300000007, 4, 200005, 200001, 7548.00, 'MT', 43874.23, 1, 1.00, 0.00, 82500000.00, 21847213.00, 50939834.13, 6981333.33, 0.00, 6249866.67, 10795866.67, 26666666.67, 17777777.78, 0.00, 0.00, 48.0, 48.0, 48.0, 48.0, 48.0, 0.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 331162666.20, 331162666.20, 331162666.20, '2015-01-29 09:50:20', 'admin', '::1'),
(28, 1770002, 1601007, 2015, 1, '', '', 2300000001, 1, 190006, 200001, 7500.00, 'MT', 3709.35, 1, 1.00, 0.00, 0.00, 22079458.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 26.0, 26.0, 26.0, 26.0, 26.0, 0.0, 26.0, 26.0, 26.0, 26.0, 26.0, 26.0, 26.0, 27820117.08, 27820117.08, 27820117.08, '2015-01-29 09:51:50', 'admin', '::1'),
(29, 1770003, 1601005, 2015, 1, '', '', 2300000007, 1, 200005, 200001, 7528.00, 'MT', 39596.43, 1, 1.00, 0.00, 72000000.00, 21847213.00, 37301330.93, 8103664.52, 0.00, 7846676.70, 9863400.00, 26666666.67, 17777777.78, 0.00, 0.00, 48.0, 48.0, 48.0, 48.0, 48.0, 0.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 298081959.80, 298081959.80, 298081959.80, '2015-01-29 09:54:14', 'admin', '::1'),
(30, 1770003, 1601005, 2015, 1, '', '', 2100000030, 0, 20010, 200001, 7507.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(31, 1770003, 1601005, 2015, 1, '', '', 2300000001, 3, 190006, 200001, 7529.00, 'MT', 25277.11, 1, 1.00, 0.00, 49500000.00, 22079458.00, 27975998.20, 6077748.39, 0.00, 5885007.53, 7397550.00, 20000000.00, 13333333.33, 0.00, 0.00, 25.0, 25.0, 25.0, 25.0, 25.0, 0.0, 25.0, 25.0, 25.0, 25.0, 25.0, 25.0, 25.0, 190311369.31, 190311369.31, 190311369.31, '2015-01-29 09:59:07', 'admin', '::1'),
(34, 1770010, 1610102, 2015, 1, '', '', 2300000001, 1, 190006, 200001, 7500.00, 'MT', 26007.98, 1, 1.00, 0.00, 49500000.00, 22079458.00, 32576990.00, 6897096.77, 0.00, 5518723.87, 7400740.00, 20000000.00, 13333333.33, 0.00, 0.00, 24.0, 24.0, 24.0, 24.0, 24.0, 0.0, 24.0, 24.0, 24.0, 24.0, 24.0, 24.0, 24.0, 195059864.05, 195059864.05, 195059864.05, '2015-01-29 10:21:00', 'admin', '::1'),
(35, 7731188, 7661003, 2015, 1, '', '', 2300000007, 1, 200005, 200001, 7482.00, 'MT', 47838.09, 1, 1.00, 0.00, 72000000.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 41.0, 41.0, 41.0, 41.0, 41.0, 0.0, 41.0, 41.0, 41.0, 41.0, 41.0, 41.0, -47.9, 357924570.33, 357924570.33, 132324570.33, '2015-01-29 10:25:05', 'admin', '::1'),
(36, 7731188, 7661003, 2015, 1, '', '', 2300000001, 2, 190006, 200001, 7503.00, 'MT', 30385.12, 1, 1.00, 0.00, 49500000.00, 22079458.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 19.0, 19.0, 19.0, 19.0, 19.0, 0.0, 19.0, 19.0, 19.0, 19.0, 19.0, 19.0, -55.5, 227979555.02, 227979555.02, 85179555.02, '2015-01-29 10:26:25', 'admin', '::1'),
(37, 7731188, 7661003, 2015, 1, '', '', 2300000007, 3, 200005, 200001, 7450.00, 'MT', 49065.77, 1, 1.00, 0.00, 72000000.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 44.0, 44.0, 44.0, 44.0, 44.0, 0.0, 44.0, 44.0, 44.0, 44.0, 44.0, 44.0, -46.8, 365539986.72, 365539986.72, 135139986.72, '2015-01-29 10:27:44', 'admin', '::1'),
(38, 7731189, 7661005, 2015, 1, '', '', 2300000008, 1, 160002, 200001, 7520.00, 'MT', 4756.72, 1, 1.00, 0.00, 0.00, 22497213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 59.0, 59.0, 59.0, 59.0, 59.0, 0.0, 59.0, 59.0, 59.0, 59.0, 59.0, 59.0, 59.0, 35770568.67, 35770568.67, 35770568.67, '2015-01-29 10:29:32', 'admin', '::1'),
(39, 7731189, 7661005, 2015, 1, '', '', 2300000007, 2, 200005, 200001, 7532.00, 'MT', 40600.31, 1, 1.00, 0.00, 72000000.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 43.0, 43.0, 43.0, 43.0, 43.0, 0.0, 43.0, 43.0, 43.0, 43.0, 43.0, 43.0, -37.2, 305801514.59, 305801514.59, 134201514.59, '2015-01-29 10:30:48', 'admin', '::1'),
(40, 7731189, 7661005, 2015, 1, '', '', 2300000007, 3, 200005, 200001, 7550.00, 'MT', 40503.51, 1, 1.00, 0.00, 72000000.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 43.0, 43.0, 43.0, 43.0, 43.0, 0.0, 43.0, 43.0, 43.0, 43.0, 43.0, 43.0, -37.2, 305801514.59, 305801514.59, 134201514.59, '2015-01-29 10:31:56', 'admin', '::1'),
(41, 6764001, 5645016, 2015, 1, '', '', 2100000030, 0, 20010, 200001, 7501.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(42, 6764001, 5645016, 2015, 1, '', '', 2300000001, 2, 190006, 200001, 7500.00, 'MT', 3091.12, 1, 1.00, 0.00, 0.00, 22079458.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5.0, 5.0, 5.0, 5.0, 5.0, 0.0, 5.0, 5.0, 5.0, 5.0, 5.0, 5.0, 5.0, 23183430.90, 23183430.90, 23183430.90, '2015-01-29 10:37:46', 'admin', '::1'),
(43, 6764001, 5645016, 2015, 1, '', '', 2300000001, 3, 190006, 200001, 7524.00, 'MT', 3081.26, 1, 1.00, 0.00, 0.00, 22079458.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5.0, 5.0, 5.0, 5.0, 5.0, 0.0, 5.0, 5.0, 5.0, 5.0, 5.0, 5.0, 5.0, 23183430.90, 23183430.90, 23183430.90, '2015-01-29 10:38:57', 'admin', '::1'),
(44, 6764001, 5645016, 2015, 1, '', '', 2300000007, 4, 200005, 200001, 7450.00, 'MT', 3958.89, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 35.0, 35.0, 35.0, 35.0, 35.0, 0.0, 35.0, 35.0, 35.0, 35.0, 35.0, 35.0, 35.0, 29493737.55, 29493737.55, 29493737.55, '2015-01-29 10:40:03', 'admin', '::1'),
(45, 6760000, 7645018, 2015, 1, '', '', 30618, 0, 190006, 200001, 7624.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(46, 6760000, 7645018, 2015, 1, '', '', 2300000001, 0, 190006, 200001, 7502.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(47, 7760012, 7639301, 2015, 1, '', '', 2300000008, 1, 160002, 200001, 7507.00, 'MT', 4285.47, 1, 1.00, 0.00, 0.00, 22497213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 43.0, 43.0, 43.0, 43.0, 43.0, 0.0, 43.0, 43.0, 43.0, 43.0, 43.0, 43.0, 43.0, 32171014.59, 32171014.59, 32171014.59, '2015-01-29 10:46:02', 'admin', '::1'),
(48, 7760012, 7639301, 2015, 1, '', '', 2300000008, 2, 200005, 200001, 8027.00, 'MT', 43957.60, 1, 1.00, 0.00, 72000000.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 39.0, 39.0, 39.0, 39.0, 39.0, 0.0, 39.0, 39.0, 39.0, 39.0, 39.0, 39.0, -48.6, 352847626.07, 352847626.07, 130447626.07, '2015-01-29 10:47:13', 'admin', '::1'),
(49, 7760012, 7639301, 2015, 1, '', '', 2300000007, 3, 200005, 200001, 7562.00, 'MT', 45653.56, 1, 1.00, 0.00, 72000000.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 36.0, 36.0, 36.0, 36.0, 36.0, 0.0, 36.0, 36.0, 36.0, 36.0, 36.0, 36.0, -49.7, 345232209.68, 345232209.68, 127632209.68, '2015-01-29 10:48:21', 'admin', '::1'),
(50, 7760005, 6645008, 2015, 1, '', '', 2300000007, 0, 200005, 200001, 7504.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(51, 7760005, 6645008, 2015, 1, '', '', 2100000030, 0, 20010, 200001, 7501.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(53, 1802003, 1903010, 2015, 1, '', '', 30390, 0, 190011, 200001, 7520.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(54, 1802003, 1903010, 2015, 1, '', '', 2300000008, 2, 200005, 200001, 7500.00, 'MT', 3903.37, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 34.0, 34.0, 34.0, 34.0, 34.0, 0.0, 34.0, 34.0, 34.0, 34.0, 34.0, 34.0, 34.0, 29275265.42, 29275265.42, 29275265.42, '2015-01-29 11:10:01', 'admin', '::1'),
(55, 1802009, 1903009, 2015, 1, '', '', 2300000008, 1, 160002, 200001, 7510.00, 'MT', 4343.67, 1, 1.00, 0.00, 0.00, 22497213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 45.0, 45.0, 45.0, 45.0, 45.0, 0.0, 45.0, 45.0, 45.0, 45.0, 45.0, 45.0, 45.0, 32620958.85, 32620958.85, 32620958.85, '2015-01-29 11:11:42', 'admin', '::1'),
(56, 1802009, 1903009, 2015, 1, '', '', 30390, 0, 190011, 200001, 7509.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(57, 1802009, 1903009, 2015, 1, '', '', 2300000007, 3, 200005, 200001, 7500.00, 'MT', 4049.02, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 39.0, 39.0, 39.0, 39.0, 39.0, 0.0, 39.0, 39.0, 39.0, 39.0, 39.0, 39.0, 39.0, 30367626.07, 30367626.07, 30367626.07, '2015-01-29 11:13:03', 'admin', '::1'),
(58, 1770004, 1903011, 2015, 1, '', '', 2300000001, 1, 190006, 200001, 7859.00, 'MT', 3174.68, 1, 1.00, 0.00, 0.00, 22079458.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13.0, 13.0, 13.0, 13.0, 13.0, 0.0, 13.0, 13.0, 13.0, 13.0, 13.0, 13.0, 13.0, 24949787.54, 24949787.54, 24949787.54, '2015-01-29 11:14:16', 'admin', '::1'),
(59, 1770004, 1903011, 2015, 1, '', '', 30618, 2, 190006, 200001, 9059.00, 'MT', 3022.25, 1, 1.00, 0.00, 0.00, 22079458.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 24.0, 24.0, 24.0, 24.0, 24.0, 0.0, 24.0, 24.0, 24.0, 24.0, 24.0, 24.0, 24.0, 27378527.92, 27378527.92, 27378527.92, '2015-01-29 11:15:11', 'admin', '::1'),
(60, 1770004, 1903011, 2015, 1, '', '', 2300000007, 3, 200005, 200001, 8704.00, 'MT', 3438.73, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 37.0, 37.0, 37.0, 37.0, 37.0, 0.0, 37.0, 37.0, 37.0, 37.0, 37.0, 37.0, 37.0, 29930681.81, 29930681.81, 29930681.81, '2015-01-29 11:15:54', 'admin', '::1'),
(61, 1802011, 1903003, 2015, 1, '', '', 2300000008, 1, 160002, 200001, 7546.00, 'MT', 4322.95, 1, 1.00, 0.00, 0.00, 22497213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 45.0, 45.0, 45.0, 45.0, 45.0, 0.0, 45.0, 45.0, 45.0, 45.0, 45.0, 45.0, 45.0, 32620958.85, 32620958.85, 32620958.85, '2015-01-29 11:17:19', 'admin', '::1'),
(62, 1802011, 1903003, 2015, 1, '', '', 2300000008, 2, 200005, 200001, 7576.00, 'MT', 3691.19, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 28.0, 28.0, 28.0, 28.0, 28.0, 0.0, 28.0, 28.0, 28.0, 28.0, 28.0, 28.0, 28.0, 27964432.64, 27964432.64, 27964432.64, '2015-01-29 11:19:38', 'admin', '::1'),
(63, 1770009, 6601023, 2015, 1, '', '', 2300000008, 1, 160002, 200005, 4349.00, 'MT', 6187.08, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 49.0, 49.0, 49.0, 49.0, 49.0, 0.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 26907597.10, 26907597.10, 26907597.10, '2015-01-29 11:21:39', 'admin', '::1'),
(64, 1770009, 6601023, 2015, 1, '', '', 2300000008, 2, 160002, 200005, 4232.00, 'MT', 6315.46, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 48.0, 48.0, 48.0, 48.0, 48.0, 0.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 26727009.20, 26727009.20, 26727009.20, '2015-01-29 11:22:55', 'admin', '::1'),
(65, 1770009, 6601023, 2015, 1, '', '', 2300000008, 3, 160002, 200005, 3739.00, 'MT', 6810.08, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 41.0, 41.0, 41.0, 41.0, 41.0, 0.0, 41.0, 41.0, 41.0, 41.0, 41.0, 41.0, 41.0, 25462893.90, 25462893.90, 25462893.90, '2015-01-29 11:23:43', 'admin', '::1'),
(66, 1770009, 6601023, 2015, 1, '', '', 2300000008, 4, 160002, 200005, 3500.00, 'MT', 6759.15, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 31.0, 31.0, 31.0, 31.0, 31.0, 0.0, 31.0, 31.0, 31.0, 31.0, 31.0, 31.0, 31.0, 23657014.90, 23657014.90, 23657014.90, '2015-01-29 11:24:28', 'admin', '::1'),
(67, 1770011, 6601022, 2015, 1, '', '', 2300000010, 1, 130005, 200005, 3775.00, 'MT', 65131.04, 1, 1.00, 0.00, 68250000.00, 19550000.00, 22883203.00, 5212000.00, 0.00, 6188454.19, 5282140.00, 20000000.00, 13333333.33, 0.00, 0.00, 53.0, 53.0, 53.0, 53.0, 53.0, 0.0, 53.0, 53.0, 53.0, 53.0, 53.0, 53.0, 53.0, 245869669.70, 245869669.70, 245869669.70, '2015-01-29 11:29:41', 'admin', '::1'),
(68, 1770011, 6601022, 2015, 1, '', '', 2300000010, 2, 130005, 200005, 3500.00, 'MT', 68411.92, 1, 1.00, 0.00, 68250000.00, 19550000.00, 22883203.00, 5212000.00, 0.00, 6188454.19, 5282140.00, 20000000.00, 13333333.33, 0.00, 0.00, 49.0, 49.0, 49.0, 49.0, 49.0, 0.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 239441704.48, 239441704.48, 239441704.48, '2015-01-29 11:30:34', 'admin', '::1'),
(69, 1770008, 6601020, 2015, 1, '', '', 2300000010, 1, 130005, 200005, 3740.00, 'MT', 65714.00, 1, 1.00, 0.00, 68250000.00, 19550000.00, 21026373.60, 5272000.00, 0.00, 4970670.97, 5142716.00, 20000000.00, 13333333.33, 0.00, 0.00, 56.0, 56.0, 56.0, 56.0, 56.0, 0.0, 56.0, 56.0, 56.0, 56.0, 56.0, 56.0, 56.0, 245770346.48, 245770346.48, 245770346.48, '2015-01-29 11:32:13', 'admin', '::1'),
(70, 1770008, 6601020, 2015, 1, '', '', 2300000010, 0, 130005, 200005, 3500.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(71, 1770008, 6601020, 2015, 1, '', '', 2300000010, 3, 130005, 200005, 3500.00, 'MT', 68869.71, 1, 1.00, 0.00, 68250000.00, 19550000.00, 21026373.60, 5272000.00, 0.00, 4970670.97, 5142716.00, 20000000.00, 13333333.33, 0.00, 0.00, 53.0, 53.0, 53.0, 53.0, 53.0, 0.0, 53.0, 53.0, 53.0, 53.0, 53.0, 53.0, 53.0, 241043993.67, 241043993.67, 241043993.67, '2015-01-29 11:33:03', 'admin', '::1'),
(72, 1770007, 1601003, 2015, 1, '', '', 2300000010, 1, 130005, 200005, 3629.00, 'MT', 66340.51, 1, 1.00, 0.00, 68250000.00, 19550000.00, 21816582.80, 6885451.61, 0.00, 4646000.00, 4955516.00, 20000000.00, 13333333.33, 0.00, 0.00, 51.0, 51.0, 51.0, 51.0, 51.0, 0.0, 51.0, 51.0, 51.0, 51.0, 51.0, 51.0, 51.0, 240749694.45, 240749694.45, 240749694.45, '2015-01-29 11:34:28', 'admin', '::1'),
(73, 1770007, 1601003, 2015, 1, '', '', 2300000010, 2, 130005, 200005, 3500.00, 'MT', 67874.56, 1, 1.00, 0.00, 68250000.00, 19550000.00, 21816582.80, 6885451.61, 0.00, 4646000.00, 4955516.00, 20000000.00, 13333333.33, 0.00, 0.00, 49.0, 49.0, 49.0, 49.0, 49.0, 0.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 237560956.78, 237560956.78, 237560956.78, '2015-01-29 11:35:23', 'admin', '::1'),
(74, 1770005, 1601001, 2015, 1, '', '', 2300000008, 1, 160002, 200005, 3748.00, 'MT', 45177.51, 1, 1.00, 0.00, 47250000.00, 18058790.00, 13946817.67, 4318333.33, 0.00, 3611127.78, 3446458.33, 16666666.67, 11111111.11, 0.00, 0.00, 43.0, 43.0, 43.0, 43.0, 43.0, 0.0, 43.0, 43.0, 43.0, 43.0, 43.0, 43.0, 43.0, 169325305.99, 169325305.99, 169325305.99, '2015-01-29 11:36:46', 'admin', '::1'),
(75, 1770005, 1601001, 2015, 1, '', '', 2300000008, 2, 160002, 200005, 3500.00, 'MT', 47025.41, 1, 1.00, 0.00, 47250000.00, 18058790.00, 13946817.67, 4318333.33, 0.00, 3611127.78, 3446458.33, 16666666.67, 11111111.11, 0.00, 0.00, 39.0, 39.0, 39.0, 39.0, 39.0, 0.0, 39.0, 39.0, 39.0, 39.0, 39.0, 39.0, 39.0, 164588933.79, 164588933.79, 164588933.79, '2015-01-29 11:37:27', 'admin', '::1'),
(76, 6751002, 6652001, 2015, 1, '', '', 2300000007, 1, 160002, 200005, 5408.00, 'MT', 4875.34, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 46.0, 46.0, 46.0, 46.0, 46.0, 0.0, 46.0, 46.0, 46.0, 46.0, 46.0, 46.0, 46.0, 26365833.40, 26365833.40, 26365833.40, '2015-01-29 11:39:10', 'admin', '::1'),
(77, 6751002, 6652001, 2015, 1, '', '', 2300000007, 2, 200005, 200001, 5025.00, 'MT', 6695.46, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 54.0, 54.0, 54.0, 54.0, 54.0, 0.0, 54.0, 54.0, 54.0, 54.0, 54.0, 54.0, 54.0, 33644708.02, 33644708.02, 33644708.02, '2015-01-29 11:40:03', 'admin', '::1'),
(78, 6751002, 6652001, 2015, 1, '', '', 2300000007, 3, 160002, 200005, 5065.00, 'MT', 5062.88, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 42.0, 42.0, 42.0, 42.0, 42.0, 0.0, 42.0, 42.0, 42.0, 42.0, 42.0, 42.0, 42.0, 25643481.80, 25643481.80, 25643481.80, '2015-01-29 11:40:55', 'admin', '::1'),
(79, 7762021, 6681002, 2015, 1, '', '', 2300000007, 1, 200005, 200001, 5066.00, 'MT', 63702.10, 1, 1.00, 0.00, 64500000.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 31.0, 31.0, 31.0, 31.0, 31.0, 0.0, 31.0, 31.0, 31.0, 31.0, 31.0, 31.0, -54.1, 322714849.03, 322714849.03, 113114849.03, '2015-01-29 11:42:13', 'admin', '::1'),
(80, 7762021, 6681002, 2015, 1, '', '', 2300000007, 2, 200005, 200001, 1967.00, 'MT', 132754.47, 1, 1.00, 0.00, 64500000.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 6.0, 6.0, 6.0, 6.0, 6.0, 0.0, 6.0, 6.0, 6.0, 6.0, 6.0, 6.0, -62.8, 261128045.78, 261128045.78, 91528045.78, '2015-01-29 11:43:29', 'admin', '::1'),
(81, 7718001, 7652002, 2015, 1, '', '', 2300000007, 1, 200005, 200001, 5680.00, 'MT', 5731.05, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 49.0, 49.0, 49.0, 49.0, 49.0, 0.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 32552347.37, 32552347.37, 32552347.37, '2015-01-29 11:46:20', 'admin', '::1'),
(82, 7718001, 7652002, 2015, 1, '', '', 2300000007, 2, 200005, 200001, 5000.00, 'MT', 6204.61, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 42.0, 42.0, 42.0, 42.0, 42.0, 0.0, 42.0, 42.0, 42.0, 42.0, 42.0, 42.0, 42.0, 31023042.46, 31023042.46, 31023042.46, '2015-01-29 11:47:13', 'admin', '::1'),
(83, 7709009, 7609007, 2015, 1, '', '', 2300000008, 1, 160002, 200005, 4955.00, 'MT', 5284.61, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 45.0, 45.0, 45.0, 45.0, 45.0, 0.0, 45.0, 45.0, 45.0, 45.0, 45.0, 45.0, 45.0, 26185245.50, 26185245.50, 26185245.50, '2015-01-29 12:47:40', 'admin', '::1'),
(84, 7709009, 7609007, 2015, 1, '', '', 2300000008, 2, 160002, 200005, 4300.00, 'MT', 5711.62, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 36.0, 36.0, 36.0, 36.0, 36.0, 0.0, 36.0, 36.0, 36.0, 36.0, 36.0, 36.0, 36.0, 24559954.40, 24559954.40, 24559954.40, '2015-01-29 12:57:27', 'admin', '::1'),
(85, 7709011, 7609008, 2015, 1, '', '', 2300000008, 1, 160002, 200005, 5187.00, 'MT', 5117.88, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 47.0, 47.0, 47.0, 47.0, 47.0, 0.0, 47.0, 47.0, 47.0, 47.0, 47.0, 47.0, 47.0, 26546421.30, 26546421.30, 26546421.30, '2015-01-29 12:59:08', 'admin', '::1'),
(86, 7709011, 7609008, 2015, 1, '', '', 2300000008, 2, 160002, 200005, 4300.00, 'MT', 5711.62, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 36.0, 36.0, 36.0, 36.0, 36.0, 0.0, 36.0, 36.0, 36.0, 36.0, 36.0, 36.0, 36.0, 24559954.40, 24559954.40, 24559954.40, '2015-01-29 12:59:58', 'admin', '::1'),
(87, 1802005, 1903001, 2015, 1, '', '', 2300000007, 1, 160002, 200005, 5147.00, 'MT', 5227.82, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 49.0, 49.0, 49.0, 49.0, 49.0, 0.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 26907597.10, 26907597.10, 26907597.10, '2015-01-29 13:01:40', 'admin', '::1'),
(88, 1802005, 1903001, 2015, 1, '', '', 2300000007, 2, 160002, 200005, 5798.00, 'MT', 4703.13, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 51.0, 51.0, 51.0, 51.0, 51.0, 0.0, 51.0, 51.0, 51.0, 51.0, 51.0, 51.0, 51.0, 27268772.90, 27268772.90, 27268772.90, '2015-01-29 13:03:07', 'admin', '::1'),
(89, 1802005, 1903001, 2015, 1, '', '', 2300000007, 3, 160002, 200005, 5000.00, 'MT', 5200.93, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 44.0, 44.0, 44.0, 44.0, 44.0, 0.0, 44.0, 44.0, 44.0, 44.0, 44.0, 44.0, 44.0, 26004657.60, 26004657.60, 26004657.60, '2015-01-29 13:03:58', 'admin', '::1'),
(90, 1802006, 1903002, 2015, 1, '', '', 2300000007, 1, 160002, 200005, 4919.00, 'MT', 5249.86, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 43.0, 43.0, 43.0, 43.0, 43.0, 0.0, 43.0, 43.0, 43.0, 43.0, 43.0, 43.0, 43.0, 25824069.70, 25824069.70, 25824069.70, '2015-01-29 13:05:56', 'admin', '::1'),
(91, 1802006, 1903002, 2015, 1, '', '', 2300000007, 2, 160002, 200005, 5000.00, 'MT', 5200.93, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 44.0, 44.0, 44.0, 44.0, 44.0, 0.0, 44.0, 44.0, 44.0, 44.0, 44.0, 44.0, 44.0, 26004657.60, 26004657.60, 26004657.60, '2015-01-29 13:06:58', 'admin', '::1'),
(92, 1802007, 1903007, 2015, 1, '', '', 2300000007, 1, 160002, 200005, 5447.00, 'MT', 5039.35, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 52.0, 52.0, 52.0, 52.0, 52.0, 0.0, 52.0, 52.0, 52.0, 52.0, 52.0, 52.0, 52.0, 27449360.80, 27449360.80, 27449360.80, '2015-01-29 13:08:39', 'admin', '::1'),
(93, 1802007, 1903007, 2015, 1, '', '', 2300000007, 2, 160002, 200005, 5532.00, 'MT', 4863.99, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 49.0, 49.0, 49.0, 49.0, 49.0, 0.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 49.0, 26907597.10, 26907597.10, 26907597.10, '2015-01-29 13:09:41', 'admin', '::1'),
(94, 1802008, 1903008, 2015, 1, '', '', 2300000007, 1, 160002, 200005, 4135.00, 'MT', 5983.20, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 37.0, 37.0, 37.0, 37.0, 37.0, 0.0, 37.0, 37.0, 37.0, 37.0, 37.0, 37.0, 37.0, 24740542.30, 24740542.30, 24740542.30, '2015-01-29 13:11:16', 'admin', '::1'),
(95, 1802008, 1903008, 2015, 1, '', '', 2300000007, 2, 160002, 200005, 3960.00, 'MT', 5882.79, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 29.0, 29.0, 29.0, 29.0, 29.0, 0.0, 29.0, 29.0, 29.0, 29.0, 29.0, 29.0, 29.0, 23295839.10, 23295839.10, 23295839.10, '2015-01-29 13:12:10', 'admin', '::1'),
(96, 1802002, 1903005, 2015, 1, '', '', 2300000007, 1, 160002, 200005, 5248.00, 'MT', 5023.98, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 46.0, 46.0, 46.0, 46.0, 46.0, 0.0, 46.0, 46.0, 46.0, 46.0, 46.0, 46.0, 46.0, 26365833.40, 26365833.40, 26365833.40, '2015-01-29 13:13:21', 'admin', '::1'),
(97, 1802002, 1903005, 2015, 1, '', '', 2300000007, 2, 160002, 200005, 5000.00, 'MT', 5200.93, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 44.0, 44.0, 44.0, 44.0, 44.0, 0.0, 44.0, 44.0, 44.0, 44.0, 44.0, 44.0, 44.0, 26004657.60, 26004657.60, 26004657.60, '2015-01-29 13:14:19', 'admin', '::1'),
(98, 1802010, 1903006, 2015, 1, '', '', 2300000007, 1, 160002, 200005, 5446.00, 'MT', 4907.64, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 48.0, 48.0, 48.0, 48.0, 48.0, 0.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 26727009.20, 26727009.20, 26727009.20, '2015-01-29 13:36:53', 'admin', '::1'),
(99, 1802010, 1903006, 2015, 1, '', '', 2300000007, 2, 160002, 200005, 5371.00, 'MT', 4976.17, 1, 1.00, 0.00, 0.00, 18058790.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 48.0, 48.0, 48.0, 48.0, 48.0, 0.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 48.0, 26727009.20, 26727009.20, 26727009.20, '2015-01-29 13:38:23', 'admin', '::1'),
(100, 1802010, 1903006, 2015, 1, '', '', 2300000007, 3, 200005, 200001, 5378.00, 'MT', 6459.11, 1, 1.00, 0.00, 0.00, 21847213.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 59.0, 59.0, 59.0, 59.0, 59.0, 0.0, 59.0, 59.0, 59.0, 59.0, 59.0, 59.0, 59.0, 34737068.67, 34737068.67, 34737068.67, '2015-01-29 13:39:18', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_plan_month`
--

CREATE TABLE IF NOT EXISTS `sales_plan_month` (
  `id_sales_plan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel_tug` int(11) NOT NULL,
  `id_vessel_barge` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `status` set('UNLOCKED','LOCKED') NOT NULL,
  `VoyageName` varchar(50) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `voyage_no` int(3) NOT NULL,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `TotalQuantity` double(20,2) NOT NULL,
  `QuantityUnit` varchar(10) NOT NULL,
  `PriceUnit` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `FuelLtr` double(20,2) NOT NULL,
  `FuelCost` double(20,2) NOT NULL,
  `AgencyCost` double(20,2) NOT NULL,
  `DepreciationCost` double(20,2) NOT NULL,
  `CrewCost` double(20,2) NOT NULL,
  `Rent` double(20,2) NOT NULL,
  `SubconCost` double(20,2) NOT NULL,
  `IncuranceCost` double(20,2) NOT NULL,
  `RepairCost` double(20,2) NOT NULL,
  `DockingCost` double(20,2) NOT NULL,
  `BrokerageCost` double(20,2) NOT NULL,
  `OthersCost` double(20,2) NOT NULL,
  `GP_COGM` double(8,1) NOT NULL,
  `MarginFuelCost` double(8,1) NOT NULL,
  `MarginAgencyCost` double(8,1) NOT NULL,
  `MarginDepreciationCost` double(8,1) NOT NULL,
  `MarginCrewCost` double(8,1) NOT NULL,
  `MarginRent` double(8,1) NOT NULL,
  `MarginSubconCost` double(8,1) NOT NULL,
  `MarginIncuranceCost` double(8,1) NOT NULL,
  `MarginRepairCost` double(8,1) NOT NULL,
  `MarginDockingCost` double(8,1) NOT NULL,
  `MarginBrokerageCost` double(8,1) NOT NULL,
  `MarginOthersCost` double(8,1) NOT NULL,
  `GP_COGS` double(8,1) NOT NULL,
  `TotalRevenue` double(20,2) NOT NULL,
  `TotalStandardCost` double(20,2) NOT NULL,
  `TotalSalesCost` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sales_plan`),
  KEY `id_vessel_tug` (`id_vessel_tug`),
  KEY `id_vessel_barge` (`id_vessel_barge`),
  KEY `month` (`month`),
  KEY `year` (`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `sales_plan_month`
--

INSERT INTO `sales_plan_month` (`id_sales_plan`, `id_vessel_tug`, `id_vessel_barge`, `year`, `month`, `status`, `VoyageName`, `id_customer`, `voyage_no`, `JettyIdStart`, `JettyIdEnd`, `TotalQuantity`, `QuantityUnit`, `PriceUnit`, `id_currency`, `change_rate`, `FuelLtr`, `FuelCost`, `AgencyCost`, `DepreciationCost`, `CrewCost`, `Rent`, `SubconCost`, `IncuranceCost`, `RepairCost`, `DockingCost`, `BrokerageCost`, `OthersCost`, `GP_COGM`, `MarginFuelCost`, `MarginAgencyCost`, `MarginDepreciationCost`, `MarginCrewCost`, `MarginRent`, `MarginSubconCost`, `MarginIncuranceCost`, `MarginRepairCost`, `MarginDockingCost`, `MarginBrokerageCost`, `MarginOthersCost`, `GP_COGS`, `TotalRevenue`, `TotalStandardCost`, `TotalSalesCost`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(10, 1770003, 1601004, 2015, 1, '', '', 2100000000, 0, 20001, 110001, 9000.00, 'MT', 6000.00, 1, 1.00, 0.00, 0.00, 0.00, 156407819.00, 0.01, 0.00, 0.02, 37752.75, 0.00, 28333320.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 54000000.00, 184778891.78, 184778891.78, '2015-01-15 14:53:13', 'admin', '::1'),
(11, 1760002, 7645020, 2015, 1, '', '', 463, 0, 20002, 110002, 6500.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(12, 1760002, 7645020, 2015, 1, '', '', 2100000013, 0, 20010, 120001, 0.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(13, 1760002, 7645020, 2015, 1, '', '', 2100000002, 0, 20002, 70001, 65000.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_plan_outlook`
--

CREATE TABLE IF NOT EXISTS `sales_plan_outlook` (
  `id_sales_plan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel_tug` int(11) NOT NULL,
  `id_vessel_barge` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `outlook` int(1) NOT NULL,
  `status` set('UNLOCKED','LOCKED') NOT NULL,
  `VoyageName` varchar(50) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `voyage_no` int(3) NOT NULL,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `TotalQuantity` double(20,2) NOT NULL,
  `QuantityUnit` varchar(10) NOT NULL,
  `PriceUnit` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `FuelLtr` double(20,2) NOT NULL,
  `FuelCost` double(20,2) NOT NULL,
  `AgencyCost` double(20,2) NOT NULL,
  `DepreciationCost` double(20,2) NOT NULL,
  `CrewCost` double(20,2) NOT NULL,
  `Rent` double(20,2) NOT NULL,
  `SubconCost` double(20,2) NOT NULL,
  `IncuranceCost` double(20,2) NOT NULL,
  `RepairCost` double(20,2) NOT NULL,
  `DockingCost` double(20,2) NOT NULL,
  `BrokerageCost` double(20,2) NOT NULL,
  `OthersCost` double(20,2) NOT NULL,
  `GP_COGM` double(8,1) NOT NULL,
  `MarginFuelCost` double(8,1) NOT NULL,
  `MarginAgencyCost` double(8,1) NOT NULL,
  `MarginDepreciationCost` double(8,1) NOT NULL,
  `MarginCrewCost` double(8,1) NOT NULL,
  `MarginRent` double(8,1) NOT NULL,
  `MarginSubconCost` double(8,1) NOT NULL,
  `MarginIncuranceCost` double(8,1) NOT NULL,
  `MarginRepairCost` double(8,1) NOT NULL,
  `MarginDockingCost` double(8,1) NOT NULL,
  `MarginBrokerageCost` double(8,1) NOT NULL,
  `MarginOthersCost` double(8,1) NOT NULL,
  `GP_COGS` double(8,1) NOT NULL,
  `TotalRevenue` double(20,2) NOT NULL,
  `TotalStandardCost` double(20,2) NOT NULL,
  `TotalSalesCost` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sales_plan`),
  KEY `id_vessel_tug` (`id_vessel_tug`),
  KEY `id_vessel_barge` (`id_vessel_barge`),
  KEY `month` (`month`),
  KEY `year` (`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `sales_plan_outlook`
--

INSERT INTO `sales_plan_outlook` (`id_sales_plan`, `id_vessel_tug`, `id_vessel_barge`, `year`, `month`, `outlook`, `status`, `VoyageName`, `id_customer`, `voyage_no`, `JettyIdStart`, `JettyIdEnd`, `TotalQuantity`, `QuantityUnit`, `PriceUnit`, `id_currency`, `change_rate`, `FuelLtr`, `FuelCost`, `AgencyCost`, `DepreciationCost`, `CrewCost`, `Rent`, `SubconCost`, `IncuranceCost`, `RepairCost`, `DockingCost`, `BrokerageCost`, `OthersCost`, `GP_COGM`, `MarginFuelCost`, `MarginAgencyCost`, `MarginDepreciationCost`, `MarginCrewCost`, `MarginRent`, `MarginSubconCost`, `MarginIncuranceCost`, `MarginRepairCost`, `MarginDockingCost`, `MarginBrokerageCost`, `MarginOthersCost`, `GP_COGS`, `TotalRevenue`, `TotalStandardCost`, `TotalSalesCost`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1760002, 7645020, 2015, 1, 0, '', '', 2100000000, 0, 30004, 30003, 5555.00, 'MT', 2300.00, 1, 1.00, 0.00, 0.00, 0.00, 720000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 5.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 12776500.00, 720000000.00, 720000000.00, '2015-01-15 14:27:38', 'admin', '::1'),
(2, 1760002, 7645020, 2015, 1, 0, '', '', 2100000000, 0, 20002, 20004, 4500.00, 'MT', 4500.00, 1, 1.00, 0.00, 0.00, 0.00, 720000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 20250000.00, 720000000.00, 720000000.00, '2015-01-15 14:33:55', 'admin', '::1'),
(3, 1760002, 7645020, 2015, 1, 0, '', '', 2100000000, 0, 20002, 20002, 5555.00, 'MT', 12000.00, 1, 1.00, 0.00, 0.00, 0.00, 720000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 66660000.00, 720000000.00, 720000000.00, '2015-01-15 14:38:19', 'admin', '::1'),
(4, 1760002, 7645020, 2015, 1, 0, '', '', 2100000013, 0, 20002, 120001, 4500.00, 'MT', 15000.00, 1, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(5, 1760002, 7645020, 2015, 1, 0, '', '', 463, 0, 20002, 70001, 6500.00, 'MT', 12.00, 1, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(6, 1770002, 1601006, 2015, 1, 0, '', '', 2100000013, 0, 20004, 110004, 4500.00, 'MT', 7777.00, 1, 1.00, 0.00, 0.00, 0.00, 152313050.00, 0.00, 0.00, 0.00, 38617.75, 0.00, 28333320.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 34996500.00, 180684987.75, 180684987.75, '2015-01-15 14:42:46', 'admin', '::1'),
(7, 6745009, 7645018, 2015, 1, 0, '', '', 463, 0, 100001, 110001, 6500.00, 'MT', 0.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_plan_summary`
--

CREATE TABLE IF NOT EXISTS `sales_plan_summary` (
  `id_sales_plan_summary` bigint(20) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `TotalVoyage` int(8) NOT NULL,
  `TotalRevenue` double(20,2) NOT NULL,
  `TotalCost` double(20,2) NOT NULL,
  `GP_COGM` double(20,2) NOT NULL,
  `GP_COGS` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sales_plan_summary`),
  KEY `month` (`month`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id_schedule` bigint(20) NOT NULL AUTO_INCREMENT,
  `VesselTugId` int(11) NOT NULL,
  `VesselBargeId` int(11) NOT NULL,
  `id_vessel_status` int(11) NOT NULL,
  `status_plan` set('PLAN','RUN') NOT NULL DEFAULT 'PLAN',
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `is_changed_onrunning` int(1) NOT NULL DEFAULT '0',
  `ChangedEndDate` date NOT NULL,
  `is_voyage` int(1) NOT NULL DEFAULT '0',
  `id_voyage_order` bigint(20) NOT NULL,
  `is_off_hired` int(1) NOT NULL,
  `id_so_offhired_order` bigint(20) NOT NULL,
  `status_pair` set('PAIR','SINGLE') NOT NULL DEFAULT 'PAIR',
  `status_breakdown` set('BREAKDOWN','UNBREAKDOWN') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_schedule`),
  KEY `StartDate` (`StartDate`),
  KEY `EndDate` (`EndDate`),
  KEY `VesselTugId` (`VesselTugId`),
  KEY `VesselBargeId` (`VesselBargeId`),
  KEY `id_voyage_order` (`id_voyage_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `VesselTugId`, `VesselBargeId`, `id_vessel_status`, `status_plan`, `StartDate`, `EndDate`, `is_changed_onrunning`, `ChangedEndDate`, `is_voyage`, `id_voyage_order`, `is_off_hired`, `id_so_offhired_order`, `status_pair`, `status_breakdown`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(3, 1760002, 7645020, 20, '', '2014-12-11', '2014-12-27', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-04 04:45:01', 'vpctester', '::1'),
(4, 1760002, 7645020, 30, '', '2014-12-05', '2014-12-09', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-04 04:51:49', 'vpctester', '::1'),
(5, 1760002, 7645020, 20, '', '2015-01-18', '2015-01-25', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-22 04:24:51', 'admin', '::1'),
(6, 1760002, 7645020, 20, 'PLAN', '2014-11-10', '2014-11-20', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-04 05:45:15', 'vpctester', '::1'),
(7, 1760002, 7645020, 20, 'PLAN', '2014-11-28', '2014-12-03', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-04 05:45:56', 'vpctester', '::1'),
(9, 1760002, 7645020, 20, 'PLAN', '2014-09-19', '2014-09-17', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-04 05:52:44', 'vpctester', '::1'),
(10, 1770001, 1601007, 20, 'PLAN', '2014-12-10', '2014-12-18', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-07 19:02:26', 'vpctester', '::1'),
(13, 1770002, 1601006, 20, 'PLAN', '2014-12-11', '2014-12-19', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-09 15:16:00', 'admin', '::1'),
(14, 1770003, 1601004, 20, 'PLAN', '2014-12-11', '2014-12-15', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-10 08:55:24', 'admin', '::1'),
(15, 1770003, 1601004, 30, 'PLAN', '2014-12-17', '2014-12-20', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-10 08:55:40', 'admin', '::1'),
(16, 1770003, 1601004, 20, 'PLAN', '2014-12-10', '2014-12-20', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2014-12-10 08:55:56', 'admin', '::1'),
(18, 1770007, 1601001, 10, 'PLAN', '2014-12-20', '2014-12-31', 0, '0000-00-00', 1, 1, 0, 0, 'PAIR', '', '2014-12-24 16:18:01', 'adminbandung', '::1'),
(19, 1770009, 1610102, 10, 'PLAN', '2014-12-04', '2014-12-26', 0, '0000-00-00', 1, 2, 0, 0, 'PAIR', '', '2014-12-29 10:16:03', 'adminbandung', '::1'),
(20, 1770001, 1601008, 10, 'PLAN', '2014-12-23', '2014-12-31', 0, '0000-00-00', 1, 3, 0, 0, 'PAIR', '', '2014-12-29 20:01:35', 'adminbandung', '::1'),
(21, 1710006, 0, 20, 'PLAN', '2015-01-24', '2015-01-26', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-20 16:12:08', 'admin', '::1'),
(22, 0, 1615005, 20, 'PLAN', '2015-01-27', '2015-01-30', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-20 16:13:05', 'admin', '::1'),
(24, 1710014, 0, 30, 'PLAN', '2015-01-14', '2015-01-23', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-20 20:18:07', 'admin', '::1'),
(25, 1710014, 0, 20, 'PLAN', '2015-01-01', '2015-01-08', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-20 20:22:13', 'admin', '::1'),
(27, 1770002, 1601006, 40, 'PLAN', '2015-01-07', '2015-01-22', 0, '0000-00-00', 1, 3, 0, 0, 'PAIR', '', '2015-01-21 04:31:40', 'admin', '::1'),
(29, 1770001, 0, 20, 'PLAN', '2015-01-22', '2015-01-23', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-21 11:15:21', 'admin', '::1'),
(30, 0, 1601008, 20, 'PLAN', '2015-01-12', '2015-01-20', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-21 11:23:21', 'admin', '::1'),
(34, 1770002, 0, 20, 'PLAN', '2015-02-11', '2015-01-29', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-21 11:58:01', 'admin', '::1'),
(35, 1770004, 0, 20, 'PLAN', '2015-01-23', '2015-01-27', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-21 11:58:22', 'admin', '::1'),
(42, 1770001, 0, 20, 'PLAN', '2015-01-01', '2015-01-06', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', 'BREAKDOWN', '2015-01-21 13:25:39', 'admin', '::1'),
(43, 1770001, 0, 20, 'PLAN', '2015-01-01', '2015-01-06', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', 'BREAKDOWN', '2015-01-21 13:25:53', 'admin', '::1'),
(44, 1770002, 0, 20, 'PLAN', '2015-01-24', '2015-01-28', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', 'BREAKDOWN', '2015-01-21 13:27:22', 'admin', '::1'),
(45, 1760002, 0, 20, 'PLAN', '2015-03-08', '2015-03-14', 0, '0000-00-00', 0, 0, 0, 0, 'PAIR', '', '2015-01-21 13:48:10', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_general`
--

CREATE TABLE IF NOT EXISTS `setting_general` (
  `id_setting_general` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(200) NOT NULL,
  `field_value` text NOT NULL,
  PRIMARY KEY (`id_setting_general`),
  KEY `field_name` (`field_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `setting_general`
--

INSERT INTO `setting_general` (`id_setting_general`, `field_name`, `field_value`) VALUES
(1, 'Office Address', 'PT PATRIA MARITIME LINES\r\nJl. Jababeka XI Blok H30-40\r\nKawasan Industri Cikarang\r\nBekasi 17530\r\nPhone : 021 8935016, 021\r\n8936353 ext 1315\r\nFax : 021 8936023'),
(2, 'General Logo', 'repository/logo/defaultlogo.jpg'),
(3, 'Mail Address', 'PT PATRIA MARITIME LINES\r\nJl. Jababeka XI Blok H30 - 40\r\nKawasan Industri Cikarang, Bekasi 17530\r\nTel / Fax : 021 8935016 / 021 8936023'),
(4, 'Bank Account', 'PT. Patria Maritime Lines\r\nBank Permata Cab. Kelapa Gading\r\nA/C No. 0701 225 392 (IDR)'),
(5, 'Official Signature', 'PT. PATRIA MARITIME LINES		\r\n'),
(6, 'Marketing Head', 'SUSILAHADI		\r\nMARKETING DEPT. HEAD)		\r\n'),
(7, 'Invoice Header', 'PT PATRIA MARITIME LINES\r\nJl. Jababeka XI Blok H30-40\r\nKawasan Industri Cikarang\r\nBekasi 17530 - Indonesia\r\nPhone : +62-21-8935016, Fax : +62-21 8936023\r\nNPWP : 21.051.195.-401.000'),
(8, 'Payment Info', 'PT. PATRIA MARITIME LINES\r\nStandard Chartered Bank - Jakarta - Sudirman\r\nA/C No.0701 225 392\r\nA/C Currency : IDR'),
(9, 'Invoice Signature', 'Demetrius Denny\r\nDirector'),
(10, 'Company Name', 'PT PATRIA MARITIME LINES'),
(11, 'Office NPWP', '2 1 0 5 1 1 9 5 2 4 3 1 0 0 0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_invoice_report`
--

CREATE TABLE IF NOT EXISTS `setting_invoice_report` (
  `id_setting_quotation_report` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(200) NOT NULL,
  `field_value` text NOT NULL,
  PRIMARY KEY (`id_setting_quotation_report`),
  KEY `field_name` (`field_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `setting_invoice_report`
--

INSERT INTO `setting_invoice_report` (`id_setting_quotation_report`, `field_name`, `field_value`) VALUES
(1, 'Sales Code', '2300000002'),
(2, 'Invoice Signature', 'Demetrius Denny\r\nDirector'),
(3, 'KMK Faktur', 'Berdasarkan KMK No.39/KM.11/2014 tanggal 09 - 09 - 2014');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_quotation_report`
--

CREATE TABLE IF NOT EXISTS `setting_quotation_report` (
  `id_setting_quotation_report` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(200) NOT NULL,
  `fiel_value` text NOT NULL,
  PRIMARY KEY (`id_setting_quotation_report`),
  KEY `field_name` (`field_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `setting_quotation_report`
--

INSERT INTO `setting_quotation_report` (`id_setting_quotation_report`, `field_name`, `fiel_value`) VALUES
(1, 'channel fee', 'USD 0.3 / MT'),
(2, 'VAT Base Freight', '10%'),
(3, 'Payment Term ', '3 days'),
(4, 'Laytime', '5 days'),
(5, 'Validity of Quotation ', '30 days'),
(6, 'Contact', 'Contact Person : Fuad Afif\r\nMobile : +6282110588338\r\nemail: fuadafif@pml.co.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_spal_report`
--

CREATE TABLE IF NOT EXISTS `setting_spal_report` (
  `id_setting_spal_report` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(200) NOT NULL,
  `field_value` text NOT NULL,
  PRIMARY KEY (`id_setting_spal_report`),
  KEY `field_name` (`field_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `setting_spal_report`
--

INSERT INTO `setting_spal_report` (`id_setting_spal_report`, `field_name`, `field_value`) VALUES
(1, 'Jenis Muatan', 'Batubara'),
(2, 'Max.Jumlah Muatan', '(Max. 7500 MT/Tropical Fresh Water due to safe barge capacity)		\r\n'),
(3, 'Kondisi Angkutan', 'Fiost'),
(4, 'Pengiriman Barang', 'Sesuai Order'),
(5, 'Keagenan Kapal', 'Ditanggung Pemilik Kapal'),
(6, 'Asuransi Kapal', 'Ditanggung Pemilik Kapal'),
(7, 'Asuransi Barang', 'Ditanggung Pemilik Barang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_tax_report`
--

CREATE TABLE IF NOT EXISTS `setting_tax_report` (
  `id_setting_tax_report` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(200) NOT NULL,
  `field_value` text NOT NULL,
  PRIMARY KEY (`id_setting_tax_report`),
  KEY `field_name` (`field_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `setting_tax_report`
--

INSERT INTO `setting_tax_report` (`id_setting_tax_report`, `field_name`, `field_value`) VALUES
(1, 'PPN Value', '10'),
(2, 'KMK', 'Berdasarkan KMK No.39/KM.11/2014 tanggal 09-09-2014'),
(3, 'Lembar 1', 'Kantor Pajak'),
(4, 'Lembar 2', 'Wajib Pajak'),
(5, 'Lembar 3', 'Copy Arsip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_voyage_report`
--

CREATE TABLE IF NOT EXISTS `setting_voyage_report` (
  `id_setting_tax_report` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(200) NOT NULL,
  `field_value` text NOT NULL,
  PRIMARY KEY (`id_setting_tax_report`),
  KEY `field_name` (`field_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `setting_voyage_report`
--

INSERT INTO `setting_voyage_report` (`id_setting_tax_report`, `field_name`, `field_value`) VALUES
(1, 'Voyage Close Report To', 'Nautical Section Head\r\nNautical Staff\r\nOperation Dept. PML Banjarmasin'),
(2, 'PIC Nautical', 'Yogi Prasetyo'),
(3, 'Nautical Section Head', 'JULKIFLI\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settype_tugbarge`
--

CREATE TABLE IF NOT EXISTS `settype_tugbarge` (
  `id_settype_tugbarge` bigint(20) NOT NULL AUTO_INCREMENT,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `first_date` date NOT NULL,
  `tug` int(11) NOT NULL,
  `barge` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `tug_power` int(11) NOT NULL,
  `barge_capacity` int(11) NOT NULL,
  `settype_name` varchar(250) NOT NULL,
  `voyage_number` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_settype_tugbarge`),
  KEY `tug` (`tug`),
  KEY `barge` (`barge`),
  KEY `tug_power` (`tug_power`),
  KEY `barge_capacity` (`barge_capacity`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data untuk tabel `settype_tugbarge`
--

INSERT INTO `settype_tugbarge` (`id_settype_tugbarge`, `month`, `year`, `first_date`, `tug`, `barge`, `is_active`, `tug_power`, `barge_capacity`, `settype_name`, `voyage_number`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 9, 2014, '0000-00-00', 7789001, 76872702, 0, 1400, 270, '1400,270ft', '', '2015-01-29 09:33:44', 'admin', '::1'),
(2, 9, 2014, '0000-00-00', 7720080, 7652002, 0, 1600, 270, '1600,270ft', '', '2015-01-29 09:34:46', 'admin', '::1'),
(3, 1, 2015, '2015-01-01', 7762021, 6681002, 1, 1600, 270, '1600,270ft', '', '2015-01-29 11:41:13', 'admin', '::1'),
(4, 9, 2014, '0000-00-00', 7763002, 5645010, 0, 1600, 300, '1600,300ft', '', '2015-01-29 09:34:26', 'admin', '::1'),
(5, 1, 2015, '2015-01-01', 1760002, 7645020, 1, 0, 0, '0,0ft', '', '2015-01-29 10:32:21', 'admin', '::1'),
(6, 9, 2014, '0000-00-00', 6760004, 5645010, 0, 1600, 300, '1600,300ft', '', '2015-01-29 09:34:51', 'admin', '::1'),
(7, 1, 2015, '2015-01-01', 7760012, 7639301, 1, 1600, 300, '1600,300ft', '', '2015-01-29 10:44:43', 'admin', '::1'),
(8, 9, 2014, '0000-00-00', 6751002, 6601020, 0, 1000, 240, '1000,240ft', '', '2015-01-29 09:34:39', 'admin', '::1'),
(9, 1, 2015, '2015-01-01', 7731188, 7661003, 1, 1600, 300, '1600,300ft', '', '2015-01-29 10:21:35', 'admin', '::1'),
(10, 1, 2015, '2015-01-01', 7731189, 7661005, 1, 1600, 300, '1600,300ft', '', '2015-01-29 10:28:29', 'admin', '::1'),
(11, 9, 2014, '0000-00-00', 6745009, 7645018, 0, 1600, 300, '1600,300ft', '', '2015-01-29 09:34:30', 'admin', '::1'),
(12, 9, 2014, '0000-00-00', 1770001, 1601008, 0, 2200, 300, '2200,300ft', '', '2015-01-21 13:25:39', 'admin', '::1'),
(13, 9, 2014, '0000-00-00', 1770010, 1601007, 0, 1600, 300, '1600,300ft', '', '2015-01-29 09:25:47', 'admin', '::1'),
(14, 1, 2015, '2015-01-01', 1770011, 6601022, 1, 1600, 240, '1600,240ft', '', '2015-01-29 11:24:49', 'admin', '::1'),
(15, 9, 2014, '0000-00-00', 1770002, 1601006, 0, 1600, 300, '1600,300ft', '', '2015-01-21 13:27:22', 'admin', '::1'),
(16, 9, 2014, '0000-00-00', 1770003, 1601004, 0, 1600, 300, '1600,300ft', '', '2015-01-29 09:14:37', 'admin', '::1'),
(17, 9, 2014, '0000-00-00', 1770004, 1601005, 0, 2200, 300, '2200,300ft', '', '2015-01-29 09:33:49', 'admin', '::1'),
(18, 9, 2014, '0000-00-00', 1770005, 1601003, 0, 1000, 240, '1000,240ft', '', '2015-01-29 09:33:54', 'admin', '::1'),
(19, 9, 2014, '0000-00-00', 1770006, 6601023, 0, 1600, 230, '1600,230ft', '', '2015-01-29 09:33:51', 'admin', '::1'),
(20, 9, 2014, '0000-00-00', 1770007, 1601001, 0, 1600, 240, '1600,240ft', '', '2015-01-29 09:34:14', 'admin', '::1'),
(21, 9, 2014, '0000-00-00', 1770008, 6652001, 0, 1600, 270, '1600,270ft', '', '2015-01-29 09:34:12', 'admin', '::1'),
(22, 9, 2014, '0000-00-00', 1770009, 1610102, 0, 1600, 300, '1600,300ft', '', '2015-01-29 09:34:10', 'admin', '::1'),
(23, 9, 2014, '0000-00-00', 7709012, 76862785, 0, 1400, 270, '1400,270ft', '', '2015-01-29 09:34:23', 'admin', '::1'),
(24, 1, 2015, '2015-01-01', 6764001, 5645016, 1, 1600, 310, '1600,310ft', '', '2015-01-29 10:35:33', 'admin', '::1'),
(28, 1, 2015, '2015-01-01', 6720050, 6620079, 0, 0, 300, '0,300ft', '', '2015-01-29 09:34:33', 'admin', '::1'),
(31, 1, 2015, '2015-01-01', 6709003, 6609002, 0, 0, 300, '0,300ft', '', '2015-01-29 09:34:17', 'admin', '::1'),
(32, 1, 2015, '2015-01-01', 1802001, 1601008, 1, 1600, 300, '1600,300ft', '', '2015-01-29 13:31:57', 'admin', '::1'),
(33, 1, 2015, '2015-01-01', 1770001, 1601004, 1, 2200, 300, '2200,300ft', '', '2015-01-29 09:42:35', 'admin', '::1'),
(34, 1, 2015, '2015-01-01', 1770002, 1601007, 1, 0, 300, '0,300ft', '', '2015-01-29 09:50:37', 'admin', '::1'),
(35, 1, 2015, '2015-01-01', 1770003, 1601005, 1, 1600, 300, '1600,300ft', '', '2015-01-29 09:52:56', 'admin', '::1'),
(36, 1, 2015, '2015-01-01', 1802010, 1601006, 0, 0, 300, '0,300ft', '', '2015-01-29 13:29:14', 'admin', '::1'),
(37, 1, 2015, '2015-01-01', 1770010, 1610102, 1, 1600, 300, '1600,300ft', '', '2015-01-29 10:19:27', 'admin', '::1'),
(38, 1, 2015, '2015-01-01', 6760000, 7645018, 1, 0, 0, '0,0ft', '', '2015-01-29 10:40:38', 'admin', '::1'),
(39, 1, 2015, '2015-01-01', 7760005, 6645008, 1, 1, 300, '1,300ft', '', '2015-01-29 10:51:57', 'admin', '::1'),
(40, 1, 2015, '2015-01-01', 1802003, 1903010, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:32:31', 'admin', '::1'),
(41, 1, 2015, '2015-01-01', 1802009, 1903009, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:33:53', 'admin', '::1'),
(42, 1, 2015, '2015-01-01', 1770004, 1903011, 1, 2200, 320, '2200,320ft', '', '2015-01-29 13:34:54', 'admin', '::1'),
(43, 1, 2015, '2015-01-01', 1802011, 1903003, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:34:25', 'admin', '::1'),
(44, 1, 2015, '2015-01-01', 1770009, 6601023, 1, 1600, 230, '1600,230ft', '', '2015-01-29 11:20:05', 'admin', '::1'),
(45, 1, 2015, '2015-01-01', 1770008, 6601020, 1, 1600, 240, '1600,240ft', '', '2015-01-29 11:31:01', 'admin', '::1'),
(46, 1, 2015, '2015-01-01', 1770007, 1601003, 1, 1600, 240, '1600,240ft', '', '2015-01-29 11:33:24', 'admin', '::1'),
(47, 1, 2015, '2015-01-01', 1770005, 1601001, 1, 1000, 240, '1000,240ft', '', '2015-01-29 11:35:43', 'admin', '::1'),
(48, 1, 2015, '2015-01-01', 6751002, 6652001, 1, 1000, 270, '1000,270ft', '', '2015-01-29 11:38:11', 'admin', '::1'),
(49, 1, 2015, '2015-01-01', 7718001, 7652002, 1, 0, 0, '0,0ft', '', '2015-01-29 11:45:31', 'admin', '::1'),
(50, 1, 2015, '2015-01-01', 7709009, 7609007, 1, 0, 0, '0,0ft', '', '2015-01-29 12:32:53', 'admin', '::1'),
(51, 1, 2015, '2015-01-01', 7709011, 7609008, 1, 0, 0, '0,0ft', '', '2015-01-29 12:58:05', 'admin', '::1'),
(52, 1, 2015, '2015-01-01', 1802005, 1903001, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:32:49', 'admin', '::1'),
(53, 1, 2015, '2015-01-01', 1802006, 1903002, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:33:09', 'admin', '::1'),
(54, 1, 2015, '2015-01-01', 1802007, 1903007, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:33:22', 'admin', '::1'),
(55, 1, 2015, '2015-01-01', 1802008, 1903008, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:33:45', 'admin', '::1'),
(56, 1, 2015, '2015-01-01', 1802002, 1903005, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:32:16', 'admin', '::1'),
(57, 1, 2015, '2015-01-01', 1802010, 1903006, 1, 1600, 320, '1600,320ft', '', '2015-01-29 13:34:09', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settype_tugbarge_break`
--

CREATE TABLE IF NOT EXISTS `settype_tugbarge_break` (
  `id_settype_tugbarge_break` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_settype_tugbarge` bigint(20) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_settype_tugbarge_break`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settype_tugbarge_history`
--

CREATE TABLE IF NOT EXISTS `settype_tugbarge_history` (
  `id_settype_tugbarge` bigint(20) NOT NULL AUTO_INCREMENT,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `tug` int(11) NOT NULL,
  `barge` int(11) NOT NULL,
  `tug_power` int(11) NOT NULL,
  `barge_capacity` int(11) NOT NULL,
  `settype_name` varchar(250) NOT NULL,
  `voyage_number` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_settype_tugbarge`),
  KEY `tug` (`tug`),
  KEY `barge` (`barge`),
  KEY `tug_power` (`tug_power`),
  KEY `barge_capacity` (`barge_capacity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `settype_tugbarge_history`
--

INSERT INTO `settype_tugbarge_history` (`id_settype_tugbarge`, `month`, `year`, `tug`, `barge`, `tug_power`, `barge_capacity`, `settype_name`, `voyage_number`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 9, 2014, 7789001, 76872702, 1400, 270, '1400,270ft', '', '0000-00-00 00:00:00', '', ''),
(2, 9, 2014, 7720080, 7652002, 1600, 270, '1600,270ft', '', '0000-00-00 00:00:00', '', ''),
(3, 9, 2014, 7762021, 6681002, 1600, 270, '1600,270ft', '', '0000-00-00 00:00:00', '', ''),
(4, 9, 2014, 7763002, 5645010, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(5, 9, 2014, 1760002, 7645020, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(6, 9, 2014, 6760004, 5645010, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(7, 9, 2014, 7760012, 7639301, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(8, 9, 2014, 6751002, 6601020, 1000, 240, '1000,240ft', '', '0000-00-00 00:00:00', '', ''),
(9, 9, 2014, 7731188, 7661003, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(10, 9, 2014, 7731189, 7661005, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(11, 9, 2014, 6745009, 7645018, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(12, 9, 2014, 1770001, 1601008, 2200, 300, '2200,300ft', '', '0000-00-00 00:00:00', '', ''),
(13, 9, 2014, 1770010, 1601007, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(14, 9, 2014, 1770011, 6601022, 1600, 240, '1600,240ft', '', '0000-00-00 00:00:00', '', ''),
(15, 9, 2014, 1770002, 1601006, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(16, 9, 2014, 1770003, 1601004, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(17, 9, 2014, 1770004, 1601005, 2200, 300, '2200,300ft', '', '0000-00-00 00:00:00', '', ''),
(18, 9, 2014, 1770005, 1601003, 1000, 240, '1000,240ft', '', '0000-00-00 00:00:00', '', ''),
(19, 9, 2014, 1770006, 6601023, 1600, 230, '1600,230ft', '', '0000-00-00 00:00:00', '', ''),
(20, 9, 2014, 1770007, 1601001, 1600, 240, '1600,240ft', '', '0000-00-00 00:00:00', '', ''),
(21, 9, 2014, 1770008, 6652001, 1600, 270, '1600,270ft', '', '0000-00-00 00:00:00', '', ''),
(22, 9, 2014, 1770009, 1610102, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', ''),
(23, 9, 2014, 7709012, 76862785, 1400, 270, '1400,270ft', '', '0000-00-00 00:00:00', '', ''),
(24, 9, 2014, 6764001, 5645016, 1600, 300, '1600,300ft', '', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping_order_detail`
--

CREATE TABLE IF NOT EXISTS `shipping_order_detail` (
  `id_shipping_order_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_shipping_order` bigint(20) NOT NULL,
  `id_vessel_tug` int(11) NOT NULL,
  `id_vessel_barge` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `IdJettyOrigin` int(11) NOT NULL,
  `IdJettyDestination` int(11) NOT NULL,
  `BargeSize` int(11) NOT NULL,
  `Capacity` double(20,4) NOT NULL,
  `Price` double(14,4) NOT NULL COMMENT 'Per MT',
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_shipping_order_detail`),
  KEY `id_quotation` (`id_shipping_order`),
  KEY `id_currency` (`id_currency`),
  KEY `IdJettyOrigin` (`IdJettyOrigin`,`IdJettyDestination`),
  KEY `IdJettyDestination` (`IdJettyDestination`),
  KEY `id_vessel_tug` (`id_vessel_tug`),
  KEY `id_vessel_barge` (`id_vessel_barge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `so`
--

CREATE TABLE IF NOT EXISTS `so` (
  `id_so` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_quotation` bigint(20) NOT NULL,
  `id_sales_plan` bigint(20) NOT NULL,
  `ShippingOrderNumber` varchar(100) NOT NULL,
  `SONo` int(11) NOT NULL,
  `SOMonth` int(2) NOT NULL,
  `SOYear` int(4) NOT NULL,
  `SODate` int(11) NOT NULL,
  `period_year` int(4) NOT NULL,
  `period_month` int(2) NOT NULL,
  `period_quartal` int(1) NOT NULL,
  `VoyageDate` date NOT NULL,
  `SOQuartal` int(1) NOT NULL,
  `SI_Number` varchar(200) NOT NULL,
  `SI_Attachment` varchar(250) NOT NULL,
  `SI_is_attach` int(1) NOT NULL,
  `Consignee` varchar(250) NOT NULL,
  `NotifyAddress` text NOT NULL,
  `Marks` text NOT NULL,
  `DocumentsRequired` text NOT NULL,
  PRIMARY KEY (`id_so`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `so`
--

INSERT INTO `so` (`id_so`, `id_quotation`, `id_sales_plan`, `ShippingOrderNumber`, `SONo`, `SOMonth`, `SOYear`, `SODate`, `period_year`, `period_month`, `period_quartal`, `VoyageDate`, `SOQuartal`, `SI_Number`, `SI_Attachment`, `SI_is_attach`, `Consignee`, `NotifyAddress`, `Marks`, `DocumentsRequired`) VALUES
(1, 1, 0, 'PML/SO/1/XII/2014', 1, 12, 2014, 2014, 0, 0, 0, '0000-00-00', 0, 'asd', 'cb0bdf3e5f0549e9d10b98031dd2a70020141222163514.pdf', 1, 'as', 'asd', 'asd', 'asdas'),
(2, 2, 0, 'PML/SO/2/XII/2014', 2, 12, 2014, 2014, 0, 0, 0, '0000-00-00', 0, 'sd', 'f57e271e7f17dc95adef3170553bbef620141222163921.pdf', 1, 'asd', 'asd', 'asd', 'asd'),
(3, 5, 0, 'PML/SO/3/XII/2014', 3, 12, 2014, 2014, 0, 0, 0, '0000-00-00', 0, 'asd', '6f298853fea53156897ee0dbe906b9e620141222164427.pdf', 1, 'sd', 'sd', 'sd', 'sdfsd'),
(4, 7, 0, 'PML/SO/4/XII/2014', 4, 12, 2014, 2014, 0, 0, 0, '0000-00-00', 0, '900000', '', 1, 'asd', 'asd', 'asda', 'as'),
(5, 15, 13, 'PML/SO/1/II/2015', 1, 2, 2015, 2015, 0, 0, 0, '0000-00-00', 0, 'as', 'd41d8cd98f00b204e9800998ecf8427e20150223201157.pdf', 1, 'asdas', 'asd', 'as', 'asdas'),
(6, 16, 12, 'PML/SO/2/II/2015', 2, 2, 2015, 2015, 0, 0, 0, '0000-00-00', 0, 'asd', 'd41d8cd98f00b204e9800998ecf8427e20150223201834.pdf', 1, 'asd', 'asd', 'sa', 'as');

-- --------------------------------------------------------

--
-- Struktur dari tabel `so_offhired_order`
--

CREATE TABLE IF NOT EXISTS `so_offhired_order` (
  `id_so_offhired_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_quotation` bigint(20) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `VesselTug` int(11) NOT NULL,
  `VesselBarge` int(11) NOT NULL,
  `OffhiredOrderNumber` varchar(100) NOT NULL,
  `SONo` int(11) NOT NULL,
  `SOMonth` int(2) NOT NULL,
  `SOYear` int(4) NOT NULL,
  `SODate` date NOT NULL,
  `period_year` int(4) NOT NULL,
  `period_month` int(2) NOT NULL,
  `period_quartal` int(1) NOT NULL,
  `TCStartDate` date NOT NULL,
  `TCEndDate` date NOT NULL,
  `TCPrice` double(20,2) NOT NULL,
  `SOQuartal` int(1) NOT NULL,
  `Marks` text NOT NULL,
  `status` set('APPROVED','REJECTED','NONE') NOT NULL,
  PRIMARY KEY (`id_so_offhired_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spal`
--

CREATE TABLE IF NOT EXISTS `spal` (
  `id_spal` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_quotation` int(11) NOT NULL,
  `SpalNumber` varchar(64) NOT NULL,
  `SpalNo` int(11) NOT NULL,
  `SpalMonth` int(2) NOT NULL,
  `SpalYear` int(4) NOT NULL,
  `SpalDate` date NOT NULL,
  `JenisMuatan` varchar(250) NOT NULL,
  `LoadingDate1` date NOT NULL,
  `LoadingDate2` date NOT NULL,
  `TotalMaxMuatan` varchar(250) NOT NULL,
  `PosisiKapal` varchar(200) NOT NULL,
  `KondisiAngkutan` varchar(250) NOT NULL,
  `PengirimanBarang` varchar(250) NOT NULL,
  `UangTambang` double(20,2) NOT NULL,
  `id_currency_uang_tambang` int(11) NOT NULL,
  `DemurageCost` double(20,2) NOT NULL,
  `id_currency_demurage_cost` int(11) NOT NULL,
  `KeagenanKapal` varchar(250) NOT NULL,
  `AsuransiKapal` varchar(250) NOT NULL,
  `AsuransiBarang` varchar(250) NOT NULL,
  `LamaHariBongkarMuat` int(4) NOT NULL,
  `PihakKedua1` varchar(250) NOT NULL,
  `PihakKedua2` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_spal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `spal`
--

INSERT INTO `spal` (`id_spal`, `id_quotation`, `SpalNumber`, `SpalNo`, `SpalMonth`, `SpalYear`, `SpalDate`, `JenisMuatan`, `LoadingDate1`, `LoadingDate2`, `TotalMaxMuatan`, `PosisiKapal`, `KondisiAngkutan`, `PengirimanBarang`, `UangTambang`, `id_currency_uang_tambang`, `DemurageCost`, `id_currency_demurage_cost`, `KeagenanKapal`, `AsuransiKapal`, `AsuransiBarang`, `LamaHariBongkarMuat`, `PihakKedua1`, `PihakKedua2`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 4, 'PML/SPAL/1/XII/2014', 1, 12, 2014, '2014-12-22', 'Oil and Gas', '0000-00-00', '0000-00-00', '(Max. 7500 MT/Tropical Fresh Water due to safe barge capacity)		\r\n', 'Th', 'Fiost', 'Sesuai Order', 9000.00, 0, 9312312.00, 0, 'Ditanggung Pemilik Kapal', 'Ditanggung Pemilik Kapal', 'Ditanggung Pemilik Barang', 12, 'Siapa Saja', 'Ya Ini Juga Siapa Saja', '2014-12-22 15:51:09', 'adminbandung', '::1'),
(2, 10, 'PML/SPAL/1/I/2015', 1, 1, 2015, '2015-01-23', 'Batubara', '2015-01-23', '2015-01-26', '(Max. 7500 MT/Tropical Fresh Water due to safe barge capacity)		\r\n', 'as', 'Fiost', 'Sesuai Order', 12345.00, 1, 450000.00, 1, 'Ditanggung Pemilik Kapal', 'Ditanggung Pemilik Kapal', 'Ditanggung Pemilik Barang', 12, 'as', 'asdasda', '2015-01-23 13:46:24', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standard_agency`
--

CREATE TABLE IF NOT EXISTS `standard_agency` (
  `id_standard_agency` int(11) NOT NULL AUTO_INCREMENT,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `agency_fix_cost` double(20,2) NOT NULL,
  `agency_var_cost` double(20,2) NOT NULL,
  `rent` double(20,2) NOT NULL,
  `other` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_standard_agency`),
  KEY `JettyIdStart` (`JettyIdStart`),
  KEY `JettyIdEnd` (`JettyIdEnd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data untuk tabel `standard_agency`
--

INSERT INTO `standard_agency` (`id_standard_agency`, `JettyIdStart`, `JettyIdEnd`, `agency_fix_cost`, `agency_var_cost`, `rent`, `other`, `id_currency`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(10, 160002, 200005, 10500000.00, 7558790.00, 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20, 190006, 200001, 7275000.00, 14804458.00, 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30, 160002, 200001, 6100000.00, 16397213.00, 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40, 130005, 200005, 10200000.00, 9350000.00, 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50, 200005, 200001, 6100000.00, 15747213.00, 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60, 130005, 200001, 7275000.00, 14163200.00, 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70, 130005, 110003, 7275000.00, 14163200.00, 0.00, 0.00, 1, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standard_agency_history`
--

CREATE TABLE IF NOT EXISTS `standard_agency_history` (
  `id_standard_agency_history` int(11) NOT NULL AUTO_INCREMENT,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `field` varchar(200) NOT NULL,
  `value` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_standard_agency_history`),
  KEY `JettyIdStart` (`JettyIdStart`),
  KEY `JettyIdEnd` (`JettyIdEnd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `standard_agency_item`
--

CREATE TABLE IF NOT EXISTS `standard_agency_item` (
  `id_standard_agency_item` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_standard_agency` int(11) NOT NULL,
  `id_agency_item` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `unit_price` double(20,2) NOT NULL,
  `type` set('FIX','VARIABLE') NOT NULL,
  `quantity` int(11) NOT NULL,
  `metric` varchar(20) NOT NULL,
  `agency_fix_cost` double(20,2) NOT NULL,
  `agency_var_cost` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_standard_agency_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7003604 ;

--
-- Dumping data untuk tabel `standard_agency_item`
--

INSERT INTO `standard_agency_item` (`id_standard_agency_item`, `id_standard_agency`, `id_agency_item`, `description`, `unit_price`, `type`, `quantity`, `metric`, `agency_fix_cost`, `agency_var_cost`, `id_currency`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(10001, 10, 1, '', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10002, 10, 2, '', 145000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10005, 10, 5, '', 1000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10013, 10, 13, '', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10014, 10, 14, '', 4000000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10018, 10, 18, '', 1500000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10019, 10, 19, '', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10020, 10, 20, '', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10021, 10, 21, '', 800000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10022, 10, 22, '', 1500000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10023, 10, 23, '', 1500000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10024, 10, 24, '', 43790.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10027, 10, 27, '', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10028, 10, 28, '', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10029, 10, 29, '', 350000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10031, 10, 31, '', 20000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10032, 10, 32, '', 1000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10033, 10, 33, '', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(10034, 10, 34, '', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20001, 20, 1, '', 350000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20003, 20, 3, '', 300000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20007, 20, 7, '', 156900.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20008, 20, 8, '', 0.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20011, 20, 11, '', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20012, 20, 12, '', 1513408.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20017, 20, 17, '', 3000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20018, 20, 18, '', 5000000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20020, 20, 20, '', 125000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20023, 20, 23, '', 650000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20025, 20, 25, '', 150000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20026, 20, 26, '', 450000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20030, 20, 30, '', 13200.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20031, 20, 31, '', 74400.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20035, 20, 35, '', 200000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20036, 20, 36, '', 100000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20037, 20, 37, '', 150000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(20038, 20, 38, '', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30002, 30, 2, '', 145000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30003, 30, 3, '', 0.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30005, 30, 5, '', 828250.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30006, 30, 6, '', 20000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30008, 30, 8, '', 0.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30012, 30, 12, '', 1513408.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30014, 30, 14, '', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30015, 30, 15, '', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30017, 30, 17, '', 3000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30018, 30, 18, '', 5000000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30019, 30, 19, '', 100000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30023, 30, 23, '', 1500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30024, 30, 24, '', 1040555.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30025, 30, 25, '', 150000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30027, 30, 27, '', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30032, 30, 32, '', 1000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30033, 30, 33, '', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(30039, 30, 39, '', 400000.00, 'VARIABLE', 2, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40013, 40, 13, '', 750000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40015, 40, 15, '', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40016, 40, 16, '', 250000.00, 'VARIABLE', 3, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40017, 40, 17, '', 7250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40018, 40, 18, '', 1500000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40019, 40, 19, '', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40020, 40, 20, '', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40021, 40, 21, '', 1000000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40023, 40, 23, '', 1500000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40024, 40, 24, '', 43790.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40028, 40, 28, '', 250000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40029, 40, 29, '', 350000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40032, 40, 32, '', 1000000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40033, 40, 33, '', 500000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40034, 40, 34, '', 250000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(40040, 40, 40, '', 500000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50002, 50, 2, '', 145000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50003, 50, 3, '', 0.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50005, 50, 5, '', 828250.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50006, 50, 6, '', 20000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50008, 50, 8, '', 0.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50012, 50, 12, '', 1513408.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50014, 50, 14, '', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50015, 50, 15, '', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50017, 50, 17, '', 3000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50018, 50, 18, '', 5000000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50019, 50, 19, '', 100000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50023, 50, 23, '', 1500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50024, 50, 24, '', 1040555.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50025, 50, 25, '', 150000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50027, 50, 27, '', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50032, 50, 32, '', 1000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50033, 50, 33, '', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(50039, 50, 39, '', 200000.00, 'VARIABLE', 2, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60003, 60, 3, '', 300000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60005, 60, 5, '', 1000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60006, 60, 6, '', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60007, 60, 7, '', 200000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60011, 60, 11, '', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60012, 60, 12, '', 1500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60013, 60, 13, '', 850000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60017, 60, 17, '', 3000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60018, 60, 18, '', 5000000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60019, 60, 19, '', 100000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60025, 60, 25, '', 150000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60026, 60, 26, '', 450000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60030, 60, 30, '', 13200.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60035, 60, 35, '', 200000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60036, 60, 36, '', 125000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(60037, 60, 37, '', 150000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70003, 70, 3, '', 300000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70005, 70, 5, '', 1000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70006, 70, 6, '', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70007, 70, 7, '', 200000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70011, 70, 11, '', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70012, 70, 12, '', 1500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70013, 70, 13, '', 850000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70017, 70, 17, '', 3000000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70018, 70, 18, '', 5000000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70019, 70, 19, '', 100000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70025, 70, 25, '', 150000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70026, 70, 26, '', 450000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70030, 70, 30, '', 13200.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70035, 70, 35, '', 200000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(70037, 70, 37, '', 150000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(1000401, 10, 4, '', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(1000402, 10, 4, 'Ranggailung', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(1001501, 10, 15, 'BG', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(1001502, 10, 15, 'BUNTOK/TTB', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(1001601, 10, 16, '', 250000.00, 'VARIABLE', 3, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(1021602, 10, 16, '', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2000201, 20, 2, 'SPT', 405000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2000202, 20, 2, 'BJM', 145000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2000401, 20, 4, 'SPT', 200000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2000402, 20, 4, 'BJM', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2000501, 20, 5, 'SPT', 818300.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2000502, 20, 5, 'BJM', 828250.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2001301, 20, 13, 'SPT', 2500000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2001302, 20, 13, 'BJM', 850000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2001401, 20, 14, 'SPT', 1250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2001402, 20, 14, 'Pbakut-Muara S negara', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2001501, 20, 15, 'S Salai/Keladan', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2001502, 20, 15, 'BJM', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2003901, 20, 39, 'S Salai/Keladan', 300000.00, 'VARIABLE', 3, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2003902, 20, 39, 'BJM', 300000.00, 'VARIABLE', 3, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2012701, 20, 27, 'BJM-SPT', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(2012702, 20, 27, 'SPT-BJM', 500000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3000101, 30, 1, 'Ranggailung', 350000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3000102, 30, 1, 'BJM', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3000401, 30, 4, 'Ranggailung', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3000402, 30, 4, 'BJM', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3001101, 30, 11, 'Ranggailung', 1750000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3001102, 30, 11, 'BJM', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3001301, 30, 13, 'BJM', 850000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3001302, 30, 13, 'TTB', 2500000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3002801, 30, 28, 'R ilung -TTB-R ilun', 250000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3002802, 30, 28, 'ranggailung', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3004001, 30, 40, 'TTB', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(3004002, 30, 40, 'BJM', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(4000401, 40, 4, '', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(4000402, 40, 4, '', 400000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(4001401, 40, 14, '', 5000000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(4001402, 40, 14, 'BJM-TTB-TBN-BJM', 1750000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5000101, 50, 1, 'Ranggailung', 350000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5000102, 50, 1, 'BJM', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5000401, 50, 4, 'Ranggailung', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5000402, 50, 4, 'BJM', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5001101, 50, 11, 'Ranggailung', 1750000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5001102, 50, 11, 'BJM', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5001301, 50, 13, 'BJM', 850000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5001302, 50, 13, 'TTB', 2500000.00, 'VARIABLE', 0, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5002801, 50, 28, 'R ilung -TTB-R ilung', 250000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5004001, 50, 40, 'Ranggailung', 500000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(5004002, 50, 40, 'BJM', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000101, 60, 1, 'SPT', 350000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000102, 60, 1, 'BJM', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000201, 60, 2, 'SPT', 405000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000202, 60, 2, 'BJM', 145000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000401, 60, 4, 'SPT', 200000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000402, 60, 4, 'BJM', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000801, 60, 8, 'SPT', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000802, 60, 8, 'BJM', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000901, 60, 9, 'SPT', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6000902, 60, 9, 'BJM', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6001001, 60, 10, 'SPT', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6001002, 60, 10, 'BJM', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6001401, 60, 14, 'SPT', 1250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6001402, 60, 14, ' P. Bakut - Muara Sungai Negara', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6001501, 60, 15, 'BJM', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6001502, 60, 15, 'TTB', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6001601, 60, 16, 'BJM', 400000.00, 'VARIABLE', 3, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6001602, 60, 16, 'TTB', 400000.00, 'VARIABLE', 3, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6002701, 60, 27, 'BJM-SPT', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(6002702, 60, 27, 'SPT-BJM', 500000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000101, 70, 1, 'SPT', 350000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000102, 70, 1, 'BJM', 400000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000201, 70, 2, 'SPT', 405000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000202, 70, 2, 'BJM', 145000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000401, 70, 4, 'SPT', 200000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000402, 70, 4, 'BJM', 100000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000801, 70, 8, 'SPT', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000802, 70, 8, 'BJM', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000901, 70, 9, 'SPT', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7000902, 70, 9, 'BJM', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7001001, 70, 10, 'SPT', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7001002, 70, 10, 'BJM', 0.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7001401, 70, 14, 'SPT', 1250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7001402, 70, 14, 'P. Bakut - Muara Sungai Negara', 250000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7001501, 70, 15, 'BJM', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7001502, 70, 15, 'TTB', 600000.00, 'VARIABLE', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7001601, 70, 16, 'BJM', 400000.00, 'VARIABLE', 3, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7001602, 70, 16, 'TTB', 400000.00, 'VARIABLE', 3, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7002701, 70, 27, 'BJM-SPT', 600000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7002702, 70, 27, 'SPT-BJM', 500000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', ''),
(7003603, 70, 36, 'SPT', 125000.00, 'FIX', 1, 'lot', 0.00, 0.00, 1, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standard_fuel`
--

CREATE TABLE IF NOT EXISTS `standard_fuel` (
  `id_standard_fuel` bigint(20) NOT NULL AUTO_INCREMENT,
  `type_set_power` int(11) NOT NULL,
  `type_set_feet` int(11) NOT NULL,
  `JettyIdStart` int(11) NOT NULL,
  `JettyIdEnd` int(11) NOT NULL,
  `typeway` set('one way','pp') NOT NULL,
  `loaded` set('loaded','ballast') NOT NULL,
  `jarak` int(11) NOT NULL,
  `speed_standard` int(11) NOT NULL,
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
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_standard_fuel`),
  KEY `type_set_power` (`type_set_power`),
  KEY `type_set_feet` (`type_set_feet`),
  KEY `JettyIdStart` (`JettyIdStart`),
  KEY `JettyIdEnd` (`JettyIdEnd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data untuk tabel `standard_fuel`
--

INSERT INTO `standard_fuel` (`id_standard_fuel`, `type_set_power`, `type_set_feet`, `JettyIdStart`, `JettyIdEnd`, `typeway`, `loaded`, `jarak`, `speed_standard`, `target_sailing_time`, `lay_time`, `sailing_time`, `cycle_time`, `me_old`, `me_new`, `ae_old`, `ae_new`, `shift_old`, `shift_new`, `outbond_old`, `outbond_new`, `total_bbm`, `total_bbm_new`, `agency_rate`, `agency_rate_id_currency`, `type`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1600, 240, 160002, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8500.00, 6500.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(2, 1600, 270, 160002, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8700.00, 6900.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(3, 1000, 240, 160002, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8000.00, 6300.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(4, 1200, 240, 160002, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8100.00, 6400.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(5, 1200, 270, 160002, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8200.00, 6600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(6, 1000, 240, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8500.00, 7100.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(7, 1200, 240, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8600.00, 7200.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(8, 1200, 270, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8700.00, 7300.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(9, 1600, 240, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9500.00, 8100.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(10, 1600, 240, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8200.00, 7100.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(11, 1600, 270, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10100.00, 8600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(12, 1600, 300, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 11100.00, 9600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(13, 2000, 300, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12500.00, 11000.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(14, 2200, 300, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12500.00, 11000.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(15, 1600, 240, 130005, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 11816.67, 9100.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(16, 1600, 270, 130005, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12283.33, 9100.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(17, 1200, 240, 130005, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10878.00, 8200.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(18, 1200, 270, 130005, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 11500.00, 8750.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(19, 1000, 240, 130005, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 11300.00, 8600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(20, 1600, 240, 130005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 19969.44, 15400.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(21, 1600, 270, 130005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 21280.00, 16000.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(22, 1200, 240, 130005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 19487.00, 14600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(23, 1200, 270, 130005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 19500.00, 15150.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(24, 1600, 300, 190006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8500.00, 6600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(25, 2000, 300, 190006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9000.00, 7400.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(26, 2200, 300, 190006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9000.00, 7400.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(27, 1600, 300, 200006, 20002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10200.00, 7500.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(28, 1600, 300, 200006, 20002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9100.00, 7500.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(29, 1600, 300, 200006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2600.00, 1800.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(30, 1600, 300, 200006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2600.00, 1800.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(31, 1600, 300, 20002, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 24500.00, 18600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(32, 1600, 300, 130008, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 22500.00, 17600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(33, 2000, 300, 200006, 20002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10900.00, 8500.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(34, 2200, 300, 200006, 20002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10900.00, 8500.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(35, 2000, 300, 200006, 20002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9800.00, 7500.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(36, 2200, 300, 200006, 20002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9800.00, 7500.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(37, 2000, 300, 200006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2800.00, 1900.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(38, 2200, 300, 200006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2800.00, 1900.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(39, 2000, 300, 200006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2800.00, 1900.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(40, 2200, 300, 200006, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2800.00, 1900.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(41, 2000, 300, 20002, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 26300.00, 19800.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(42, 2200, 300, 20002, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 26300.00, 19800.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(43, 2000, 300, 130008, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 23000.00, 18100.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(44, 2200, 300, 130008, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 23000.00, 18100.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(45, 1600, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 15200.00, 10500.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(46, 1600, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 15900.00, 11000.21, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(47, 1600, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 11.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 31100.00, 21500.21, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(48, 2000, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 16350.00, 12700.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(49, 2200, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 16350.00, 12700.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(50, 2000, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 17100.00, 13300.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(51, 2200, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 17100.00, 13300.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(52, 2000, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 11.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 33450.00, 26000.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(53, 2200, 300, 200006, 30002, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 11.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 33450.00, 26000.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(54, 1600, 300, 110002, 190007, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 0.04, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 665.00, 490.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(55, 2000, 300, 110002, 190007, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 0.04, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 725.00, 550.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(56, 2200, 300, 110002, 190007, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 1.04, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 725.00, 550.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(57, 1446, 270, 160002, 200005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 5.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8700.00, 7300.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(58, 1446, 270, 200005, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10100.00, 8600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(59, 1446, 270, 200005, 130005, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 11350.00, 8900.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(60, 1600, 300, 200009, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 7700.00, 4800.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(61, 2000, 300, 200009, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8200.00, 6600.00, 0, 0, 0, '0000-00-00 00:00:00', '', ''),
(62, 2200, 300, 200009, 200001, 'one way', 'loaded', 0, 0, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8200.00, 6600.00, 0, 0, 0, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standard_vessel_brokerage`
--

CREATE TABLE IF NOT EXISTS `standard_vessel_brokerage` (
  `id_standard_vessel_brokerage` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_standard_vessel_cost` bigint(20) NOT NULL,
  `id_brokerage_item` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_standard_vessel_brokerage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `standard_vessel_cost`
--

CREATE TABLE IF NOT EXISTS `standard_vessel_cost` (
  `id_standard_vessel_cost` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_standard_vessel_cost`),
  KEY `id_vessel` (`id_vessel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data untuk tabel `standard_vessel_cost`
--

INSERT INTO `standard_vessel_cost` (`id_standard_vessel_cost`, `id_vessel`, `month`, `year`, `depreciation_cost`, `rent_cost`, `crew_own_cost`, `crew_subcont_cost`, `insurance`, `repair`, `docking`, `brokerage_fee`, `others`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1770001, 0, 0, 92759505.00, 0.00, 26180000.00, 23437000.00, 18651750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(2, 1770002, 0, 0, 59746544.00, 0.00, 25366666.67, 24004024.19, 15912000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(3, 1770003, 0, 0, 58142946.00, 0.00, 30388741.94, 29425037.63, 15920000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(4, 1770004, 0, 0, 68681537.00, 0.00, 25880000.00, 26795408.06, 17791750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(5, 1770005, 0, 0, 41298086.00, 0.00, 25910000.00, 21666766.67, 8503000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(6, 1770006, 0, 0, 60200359.00, 0.00, 26180000.00, 26225131.72, 14843350.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(7, 1770007, 0, 0, 62820643.00, 0.00, 34427258.06, 23230000.00, 13537830.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(8, 1770008, 0, 0, 64109993.00, 0.00, 26360000.00, 24853354.84, 13537830.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(9, 1770009, 0, 0, 62145386.00, 0.00, 26000000.00, 23230000.00, 11738820.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(10, 1770010, 0, 0, 67203933.00, 0.00, 34485483.87, 27593619.35, 15170950.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(11, 1770011, 0, 0, 68086037.00, 0.00, 26060000.00, 30942270.97, 15170950.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(12, 6745009, 0, 0, 0.00, 600000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(13, 6764001, 0, 0, 0.00, 600000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(14, 6760004, 0, 0, 0.00, 600000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(15, 6720028, 0, 0, 0.00, 240000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(16, 6720032, 0, 0, 0.00, 240000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(17, 7731188, 0, 0, 0.00, 600000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(18, 6751002, 0, 0, 0.00, 252000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(19, 1601007, 0, 0, 84381197.00, 0.00, 0.00, 0.00, 21067750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(20, 7709009, 0, 0, 0.00, 240000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(21, 1601004, 0, 0, 98264873.00, 0.00, 0.00, 0.00, 21832750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(22, 6620077, 0, 0, 0.00, 240000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(23, 1601003, 0, 0, 46262271.00, 0.00, 0.00, 0.00, 11239750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(24, 1601006, 0, 0, 92566506.00, 0.00, 0.00, 0.00, 22705750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(25, 1601001, 0, 0, 42382820.00, 0.00, 0.00, 0.00, 12175750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(26, 6652001, 0, 0, 0.00, 372000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(27, 1610102, 0, 0, 95681017.00, 0.00, 0.00, 0.00, 21832750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(28, 1601005, 0, 0, 81737045.00, 0.00, 0.00, 0.00, 21067750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(29, 1601008, 0, 0, 92759505.00, 0.00, 0.00, 0.00, 17860000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(30, 6645008, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(31, 6609002, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(32, 66117505, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(33, 6601023, 0, 0, 44379630.00, 0.00, 0.00, 0.00, 12926000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(34, 6601022, 0, 0, 46329978.00, 0.00, 0.00, 0.00, 11239750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(35, 7661003, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(36, 6601020, 0, 0, 41021875.00, 0.00, 0.00, 0.00, 12175750.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(37, 7731189, 0, 0, 0.00, 450000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(38, 7661005, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(39, 7720080, 0, 0, 0.00, 240000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(40, 7652002, 0, 0, 0.00, 372000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(41, 7762021, 0, 0, 0.00, 600000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(42, 6681002, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(43, 7645018, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(44, 7760012, 0, 0, 0.00, 600000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(45, 7639301, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(46, 7763111, 0, 0, 0.00, 540000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(47, 5645010, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(48, 7709012, 0, 0, 0.00, 540000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(49, 7763001, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(50, 7789001, 0, 0, 0.00, 540000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(51, 76872702, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(52, 5645016, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(53, 1760002, 0, 0, 0.00, 600000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(54, 7645020, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(55, 7718001, 0, 0, 0.00, 270000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(56, 7609007, 0, 0, 0.00, 270000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(57, 7709103, 0, 0, 0.00, 270000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(58, 7709011, 0, 0, 0.00, 270000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(59, 7609008, 0, 0, 0.00, 270000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(60, 7709555, 0, 0, 0.00, 270000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(61, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(62, 1802001, 0, 0, 75516000.00, 0.00, 0.00, 45563526.88, 10497600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(63, 1802002, 0, 0, 75876000.00, 0.00, 0.00, 45143908.60, 10497600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(64, 1802003, 0, 0, 76992000.00, 0.00, 0.00, 32447166.67, 10497600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(65, 1802005, 0, 0, 76824000.00, 0.00, 0.00, 12789500.00, 10497600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(66, 1802006, 0, 0, 80448000.00, 0.00, 0.00, 15060500.00, 10497600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(67, 1802007, 0, 0, 81000000.00, 0.00, 0.00, 32689166.67, 10497600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(68, 1802008, 0, 0, 78876000.00, 0.00, 0.00, 26156833.33, 10497600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(69, 1802009, 0, 0, 78396000.00, 0.00, 0.00, 32553166.67, 10497600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(70, 1802010, 0, 0, 82800000.00, 0.00, 0.00, 58955483.87, 11340000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(71, 1802011, 0, 0, 82632000.00, 0.00, 0.00, 50000000.00, 11340000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(72, 1903001, 0, 0, 72384000.00, 0.00, 0.00, 0.00, 10125000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(73, 1903002, 0, 0, 72384000.00, 0.00, 0.00, 0.00, 10125000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(74, 1903003, 0, 0, 93516000.00, 0.00, 0.00, 0.00, 10983600.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(75, 1903005, 0, 0, 80088000.00, 0.00, 0.00, 0.00, 11534400.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(76, 1903006, 0, 0, 79320000.00, 0.00, 0.00, 0.00, 11534400.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(77, 1903007, 0, 0, 81696000.00, 0.00, 0.00, 0.00, 11988000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(78, 1903008, 0, 0, 84888000.00, 0.00, 0.00, 0.00, 11988000.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(79, 1903009, 0, 0, 104724000.00, 0.00, 0.00, 0.00, 15487200.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(80, 1903010, 0, 0, 104736000.00, 0.00, 0.00, 0.00, 15487200.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(81, 1903011, 0, 0, 111960000.00, 0.00, 0.00, 0.00, 15487200.00, 50000000.00, 33333333.33, 0.00, 0.00, '0000-00-00 00:00:00', '', ''),
(82, 1111111, 0, 0, 927276000.00, 0.00, 0.00, 0.00, 113400000.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey_item`
--

CREATE TABLE IF NOT EXISTS `survey_item` (
  `id_survey_item` int(11) NOT NULL AUTO_INCREMENT,
  `survey_item_name` varchar(250) NOT NULL,
  `survey_item_code` varchar(40) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id_survey_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `survey_item`
--

INSERT INTO `survey_item` (`id_survey_item`, `survey_item_name`, `survey_item_code`, `category`) VALUES
(1, 'Annual survey', 'J-SV1001', 1),
(2, 'Load Line Survey', 'J-SV1002', 1),
(3, 'Docking -Intermediate Survey', 'J-SV1003', 1),
(4, 'Docking - Special Survey', 'J-SV1004', 1),
(5, 'Undewater Survey', 'J-SV1005', 1),
(6, 'Occasional survey', 'J-SV1006', 1),
(7, 'Pembaruan Klass Survey', 'J-SV1007', 1),
(8, 'Fuel Survey', 'J-SV2001', 2),
(9, 'On Hire Survey', 'J-SV3001', 3),
(10, 'Off Hire Survey', 'J-SV3002', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `timeline_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `timeline_name` varchar(255) NOT NULL,
  `timeline_desc` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `background_color` varchar(10) NOT NULL,
  `foreground_color` varchar(10) NOT NULL,
  PRIMARY KEY (`timeline_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=748 ;

--
-- Dumping data untuk tabel `timeline`
--

INSERT INTO `timeline` (`timeline_id`, `event_id`, `timeline_name`, `timeline_desc`, `start_date`, `end_date`, `background_color`, `foreground_color`) VALUES
(135, 37, 'asd', 'asd', '2012-01-25', '2012-01-25', '#000', '#fff'),
(136, 38, 'as', 'dasd', '2012-01-25', '2012-01-25', '#000', '#fff'),
(137, 42, 'taboneo - puting', '', '2012-01-18', '2012-01-18', '#0000', '#ffff'),
(138, 43, 'taboneo - puting', '', '2012-01-18', '2012-01-18', '#0000', '#ffff'),
(295, 92, 'REPAIRED PROPELLER', 'Repaired Propeller Patria 4', '2012-05-01', '2012-05-10', '#f79b08', '#000000'),
(289, 91, 'Loading', 'Loading at S.Puting (PMM)', '2012-04-30', '2012-04-30', '#85ff69', '#000000'),
(288, 91, 'Ballast', 'Sailing Ballast to S. Puting', '2012-04-29', '2012-04-29', '#055af7', '#fff'),
(287, 90, 'Ballast', 'Ballast to Trisakti', '2012-05-03', '2012-05-03', '#055af7', '#ffffff'),
(151, 45, 'taboneo - puting', '', '2012-02-02', '2012-02-02', '#0000', '#ffff'),
(152, 46, 'taboneo - puting', '', '2012-02-02', '2012-02-02', '#0000', '#ffff'),
(286, 90, 'Discharge', 'Discharge at Taboneo', '2012-05-02', '2012-05-02', '#ed15ed', '#000000'),
(285, 90, 'Sailinng Loaded', 'Saiing Loaded to Taboneo', '2012-05-01', '2012-05-01', '#0407b3', '#fff'),
(284, 90, 'Waiting Document', 'Waiting SKAB', '2012-04-30', '2012-04-30', '#f0fc83', '#000000'),
(283, 90, 'Loading', 'Loading at S.Puting (PMM)', '2012-04-29', '2012-04-29', '#85ff69', '#000000'),
(282, 90, 'Ballast', 'Sailing Ballast To S. Puting', '2012-04-28', '2012-04-28', '#055af7', '#fff'),
(281, 91, 'Ballast', 'Ballast To Trisakti', '2012-04-28', '2012-04-28', '#055af7', '#fff'),
(280, 91, 'Discharge', 'Discharge at Taboneo', '2012-04-27', '2012-04-27', '#ed15ed', '#000000'),
(171, 50, '321', '', '2012-02-15', '2012-02-15', '#ffff00', '#0000'),
(172, 50, '321', '', '2012-06-14', '2012-06-14', '#ffff00', '#0000'),
(173, 50, '321', '', '2012-10-12', '2012-10-12', '#ffff00', '#0000'),
(174, 51, 'aaa', '', '2012-02-15', '2012-02-15', '#ffff00', '#0000'),
(175, 51, 'aaa', '', '2012-06-14', '2012-06-14', '#ffff00', '#0000'),
(176, 51, 'aaa', '', '2012-10-12', '2012-10-12', '#ffff00', '#0000'),
(279, 91, 'Sailing Loaded', 'Sailing Loaded To Trisakti', '2012-04-26', '2012-04-26', '#0407b3', '#fff'),
(278, 91, 'Waiting Document', 'Waiting SKAB', '2012-04-23', '2012-04-25', '#f0fc83', '#000000'),
(277, 91, 'Loading', 'Loading at S. Puting', '2012-04-22', '2012-04-22', '#85ff69', '#000000'),
(184, 54, 'taboneo - puting', '', '2012-03-08', '2012-03-08', '#0000', '#ffff'),
(185, 55, 'taboneo - puting', '', '2012-03-08', '2012-03-08', '#0000', '#ffff'),
(186, 56, 'Jakarta - Banjarmasin', '', '2012-03-09', '2012-03-09', '#0000', '#ffff'),
(187, 57, 'Jakarta - Banjarmasin', '', '2012-03-09', '2012-03-09', '#0000', '#ffff'),
(188, 58, 'taboneo - puting', '', '2012-03-09', '2012-03-09', '#0000', '#ffff'),
(189, 59, 'taboneo - puting', '', '2012-03-09', '2012-03-09', '#0000', '#ffff'),
(190, 60, 'taboneo - puting', '', '2012-03-26', '2012-03-26', '#0000', '#ffff'),
(191, 61, 'taboneo - puting', '', '2012-03-26', '2012-03-26', '#0000', '#ffff'),
(293, 91, 'Ballast', 'Ballast to Trisakti', '2012-05-03', '2012-05-03', '#055af7', '#fff'),
(291, 91, 'Sailing Loaded', 'Sailing Loaded to Taboneo', '2012-05-01', '2012-05-01', '#0407b3', '#fff'),
(276, 91, 'Ballast', 'Sailing Ballast to S. Puting', '2012-04-21', '2012-04-21', '#055af7', '#fff'),
(275, 90, 'Ballast', 'Ballast To Trisakti', '2012-04-27', '2012-04-27', '#055af7', '#fff'),
(274, 90, 'Discharge', 'Discharge at Taboneo On MV Luyang Star', '2012-04-26', '2012-04-26', '#ed15ed', '#000000'),
(273, 90, 'Sailing Loaded', 'Sailing Loaded to Trisakti', '2012-04-25', '2012-04-25', '#0406b3', '#fff'),
(272, 90, 'Waiting Document', 'Waiting SKAB', '2012-04-22', '2012-04-24', '#f0fc83', '#020203'),
(271, 90, 'Loading', 'Loading at S.Puting', '2012-04-21', '2012-04-21', '#85ff69', '#000000'),
(270, 90, 'Ballast', 'sailing ballast to S.Puting', '2012-04-20', '2012-04-20', '#055af7', '#fff'),
(294, 88, 'REPAIRED PROPELLER', 'Repaired propeller Patria 4', '2012-05-01', '2012-05-09', '#f79b08', '#000000'),
(266, 62, 'Balast to ....', 'XXX', '2012-04-23', '2012-04-24', '#e823e8', '#fff'),
(265, 86, 'visit', '', '2012-12-20', '2012-12-20', '#00ffff', '#0000'),
(264, 86, 'visit', '', '2012-10-21', '2012-10-21', '#00ffff', '#0000'),
(263, 86, 'visit', '', '2012-08-22', '2012-08-22', '#00ffff', '#0000'),
(262, 86, 'visit', '', '2012-06-23', '2012-06-23', '#00ffff', '#0000'),
(261, 86, 'visit', '', '2012-04-24', '2012-04-24', '#00ffff', '#0000'),
(260, 85, 'visit', '', '2012-12-15', '2012-12-15', '#00ffff', '#0000'),
(259, 85, 'visit', '', '2012-10-16', '2012-10-16', '#00ffff', '#0000'),
(258, 85, 'visit', '', '2012-08-17', '2012-08-17', '#00ffff', '#0000'),
(257, 85, 'visit', '', '2012-06-18', '2012-06-18', '#00ffff', '#0000'),
(256, 85, 'visit', '', '2012-04-19', '2012-04-19', '#00ffff', '#0000'),
(255, 84, 'Paring Lahung - Teluk Timbau', '', '2011-09-16', '2011-09-19', '#0000', '#ffff'),
(254, 83, 'Paring Lahung - Teluk Timbau', '', '2011-09-16', '2011-09-19', '#0000', '#ffff'),
(253, 82, 'Sungai Puting - Taboneo', '', '2012-01-10', '2012-01-11', '#0000', '#ffff'),
(252, 81, 'Sungai Puting - Taboneo', '', '2012-01-10', '2012-01-11', '#0000', '#ffff'),
(251, 62, 'Monthly Inspection', 'Monthly Inspection', '2012-04-20', '2012-04-21', '#ff0303', '#fff'),
(250, 63, 'Weekly Inspection', 'Weekly Inspection', '2012-04-18', '2012-04-20', '#0546ed', '#fff'),
(247, 80, 'Sungai Danau - Paiton', '', '2011-09-10', '2011-09-14', '#0000', '#ffff'),
(245, 78, 'Teluk Timbau - Taboneo', '', '2012-04-16', '2012-04-28', '#0000', '#ffff'),
(246, 79, 'Sungai Danau - Paiton', '', '2011-09-10', '2011-09-14', '#0000', '#ffff'),
(242, 67, 'Jakarta - Banjarmasin', '', '2011-12-16', '2011-12-16', '#0000', '#ffff'),
(243, 68, 'Jakarta - Banjarmasin', '', '2011-12-16', '2011-12-16', '#0000', '#ffff'),
(296, 88, 'SLOT KOSONG', 'Slot kosong Transhipment ', '2012-05-10', '2012-05-17', '#f7f308', '#000000'),
(292, 91, 'Discharge', 'Discharge at Taboneo', '2012-05-02', '2012-05-02', '#ed15ed', '#000000'),
(317, 77, 'SLOT KOSONG', 'Slot kosong Transhipment', '2012-05-08', '2012-05-15', '#f7f308', '#000000'),
(297, 92, 'ALY11/KML - CLOSED', 'Bunati - Muara Satui', '2012-05-11', '2012-05-16', '#f3f578', '#000000'),
(298, 88, 'SLOT KOSONG', 'Slot kosong Transhipment', '2012-06-14', '2012-06-14', '#f7f308', '#000000'),
(299, 88, 'SLOT KOSONG', 'Slot kosong Transhipment', '2012-05-18', '2012-05-25', '#f7f308', '#000000'),
(300, 92, 'UNUTILIZED', 'Waiting SI', '2012-05-17', '2012-05-17', '#f50e12', '#000000'),
(301, 92, 'ALY12/KML - CLOSED', 'Bunati - Muara Satui', '2012-05-18', '2012-05-24', '#f3f578', '#000000'),
(302, 88, 'SLOT KOSONG', 'Slot kosong Transhipment', '2012-05-26', '2012-06-02', '#f7f308', '#000000'),
(303, 92, 'ALY13/KML - CLOSED', 'Bunati - Muara Satui', '2012-05-25', '2012-06-01', '#f3f578', '#000000'),
(304, 93, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-02', '2012-05-05', '#5cf033', '#000000'),
(305, 93, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-06', '2012-05-09', '#5cf033', '#000000'),
(306, 93, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-10', '2012-05-13', '#5cf033', '#000000'),
(307, 93, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-14', '2012-05-17', '#5cf033', '#000000'),
(308, 93, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-18', '2012-05-21', '#5cf033', '#000000'),
(309, 93, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-22', '2012-05-25', '#5cf033', '#000000'),
(310, 93, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-26', '2012-05-29', '#5cf033', '#000000'),
(311, 94, 'TOP CLOSED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-03', '2012-05-08', '#f3f578', '#000000'),
(312, 94, 'TOP CLOSED', 'PARING LAHUNG - TELUK TIMBAU', '2012-06-14', '2012-06-14', '#f3f578', '#000000'),
(313, 94, 'TOP CLOSED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-09', '2012-05-13', '#f3f578', '#000000'),
(314, 94, 'LOW WATER LEVEL', 'Low water water level at P.Lahung - T.Timbau', '2012-05-14', '2012-05-29', '#33f2e5', '#000000'),
(316, 77, 'SLOT KOSONG', 'Slot kosong S.Danau - Tuban', '2012-04-24', '2012-05-07', '#f7f308', '#000000'),
(318, 77, 'SLOT KOSONG', 'Slot kosong S.Danau - Paiton', '2012-05-16', '2012-05-30', '#f7f308', '#000000'),
(319, 95, 'AUR09/CSR-CLOSED', 'S.Danau - Tuban', '2012-04-24', '2012-05-06', '#f3f578', '#000000'),
(320, 95, 'AUR10/TOP - CLOSED', 'TELUK TIMBAU - TABONEO (MV MAIZURU DAIKOKU)', '2012-05-07', '2012-05-10', '#f3f578', '#000000'),
(321, 95, 'REPAIRED', 'Repaired Aura akibat tabrakan dengan Bandar manis di Gresik', '2012-05-11', '2012-05-14', '#f79b08', '#000000'),
(322, 95, 'AUR11/LBHI - CLOSED', 'S.Danau - Tuban', '2012-05-15', '2012-06-01', '#f3f578', '#000000'),
(323, 63, 'SLOT KOSONG', 'Slot kosong S.Puting - Tuban', '2012-04-28', '2012-05-09', '#f7f308', '#000000'),
(324, 63, 'SLOT KOSONG', 'slot kosong Transhipment', '2012-05-10', '2012-05-17', '#f7f308', '#000000'),
(325, 63, 'SLOT KOSONG', 'Slot kosong Transhipment', '2012-05-18', '2012-05-25', '#f7f308', '#000000'),
(326, 63, 'SLOT KOSONG', 'Slot kosong Transhipment', '2012-05-26', '2012-06-04', '#f7f308', '#000000'),
(327, 98, 'AUG06/BRM - CLOSED', 'S.PUTING - TUBAN', '2012-04-28', '2012-05-12', '#f3f578', '#000000'),
(328, 98, 'REPAIRED', 'Repaired', '2012-05-13', '2012-05-13', '#f79b08', '#000000'),
(329, 98, 'AUG07/MCE - CLOSED', 'BUNATI - MUARA SATUI (MV LAN HAI LAN)', '2012-05-14', '2012-05-21', '#f3f578', '#000000'),
(330, 98, 'AUG08/KML - CLOSED', 'BUNATI - MUARA SATUI', '2012-05-22', '2012-05-31', '#f3f578', '#000000'),
(331, 99, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-01', '2012-05-04', '#5cf033', '#000000'),
(332, 99, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-05', '2012-05-08', '#5cf033', '#000000'),
(333, 99, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-09', '2012-05-12', '#5cf033', '#000000'),
(334, 99, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-13', '2012-05-16', '#5cf033', '#000000'),
(335, 99, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-17', '2012-05-20', '#5cf033', '#000000'),
(336, 99, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-21', '2012-05-24', '#5cf033', '#000000'),
(337, 99, 'TOP DEDICATED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-25', '2012-05-28', '#5cf033', '#000000'),
(338, 100, 'TOP - CLOSED', 'PARING LAHUNG TELUK TIMBAU', '2012-05-03', '2012-05-07', '#f3f578', '#000000'),
(339, 100, 'TOP - CLOSED', 'PARING LAHUNG - TELUK TIMBAU', '2012-05-08', '2012-05-12', '#f3f578', '#000000'),
(340, 120, 'Sungai Puting - Taboneo', '', '2012-05-26', '2012-05-26', '#0000', '#ffff'),
(341, 121, 'Sungai Puting - Taboneo', '', '2012-05-26', '2012-05-26', '#0000', '#ffff'),
(342, 122, 'Teluk Timbau - Taboneo', '', '2012-05-03', '2012-05-05', '#0000', '#ffff'),
(343, 123, 'Teluk Timbau - Taboneo', '', '2012-05-03', '2012-05-05', '#0000', '#ffff'),
(344, 124, 'Sungai Puting - Taboneo', '', '2012-04-19', '2012-04-19', '#0000', '#ffff'),
(345, 125, 'Sungai Puting - Taboneo', '', '2012-04-19', '2012-04-19', '#0000', '#ffff'),
(346, 126, 'Teluk Timbau - Taboneo', '', '2012-05-09', '2012-05-09', '#0000', '#ffff'),
(347, 127, 'Teluk Timbau - Taboneo', '', '2012-05-09', '2012-05-09', '#0000', '#ffff'),
(348, 128, 'Sungai Puting - Taboneo', '', '2012-04-27', '2012-04-27', '#0000', '#ffff'),
(349, 129, 'Sungai Puting - Taboneo', '', '2012-04-27', '2012-04-27', '#0000', '#ffff'),
(350, 130, 'Sungai Puting - Tuban', '', '2012-04-27', '2012-04-28', '#0000', '#ffff'),
(351, 131, 'Sungai Puting - Tuban', '', '2012-04-27', '2012-04-28', '#0000', '#ffff'),
(352, 132, 'Sungai Puting - Taboneo', '', '2012-04-26', '2012-04-26', '#0000', '#ffff'),
(353, 133, 'Sungai Puting - Taboneo', '', '2012-04-26', '2012-04-26', '#0000', '#ffff'),
(354, 134, 'Paring Lahung - Teluk Timbau', '', '2012-05-01', '2012-05-01', '#0000', '#ffff'),
(355, 135, 'Paring Lahung - Teluk Timbau', '', '2012-05-01', '2012-05-01', '#0000', '#ffff'),
(356, 136, 'Teluk Timbau - Taboneo', '', '2012-05-05', '2012-05-15', '#0000', '#ffff'),
(357, 137, 'Teluk Timbau - Taboneo', '', '2012-05-05', '2012-05-15', '#0000', '#ffff'),
(358, 138, 'Paring Lahung - Teluk Timbau', '', '2012-05-06', '2012-05-06', '#0000', '#ffff'),
(359, 139, 'Paring Lahung - Teluk Timbau', '', '2012-05-06', '2012-05-06', '#0000', '#ffff'),
(360, 140, 'Paring Lahung - Teluk Timbau', '', '2012-04-24', '2012-04-28', '#0000', '#ffff'),
(361, 141, 'Paring Lahung - Teluk Timbau', '', '2012-04-24', '2012-04-28', '#0000', '#ffff'),
(362, 142, 'Paring Lahung - Teluk Timbau', '', '2012-04-28', '2012-04-28', '#0000', '#ffff'),
(363, 143, 'Paring Lahung - Teluk Timbau', '', '2012-04-28', '2012-04-28', '#0000', '#ffff'),
(364, 144, 'Paring Lahung - Teluk Timbau', '', '2012-05-21', '2012-05-25', '#0000', '#ffff'),
(365, 145, 'Paring Lahung - Teluk Timbau', '', '2012-05-21', '2012-05-25', '#0000', '#ffff'),
(366, 146, 'Paring Lahung - Teluk Timbau', '', '2012-05-17', '2012-05-20', '#0000', '#ffff'),
(367, 147, 'Paring Lahung - Teluk Timbau', '', '2012-05-17', '2012-05-20', '#0000', '#ffff'),
(368, 148, 'Paring Lahung - Teluk Timbau', '', '2012-05-13', '2012-05-16', '#0000', '#ffff'),
(369, 149, 'Paring Lahung - Teluk Timbau', '', '2012-05-13', '2012-05-16', '#0000', '#ffff'),
(370, 150, 'Paring Lahung - Teluk Timbau', '', '2012-04-28', '2012-05-02', '#0000', '#ffff'),
(371, 151, 'Paring Lahung - Teluk Timbau', '', '2012-04-28', '2012-05-02', '#0000', '#ffff'),
(372, 152, 'Paring Lahung - Teluk Timbau', '', '2012-05-23', '2012-05-27', '#0000', '#ffff'),
(373, 153, 'Paring Lahung - Teluk Timbau', '', '2012-05-23', '2012-05-27', '#0000', '#ffff'),
(374, 154, 'Paring Lahung - Teluk Timbau', '', '2012-05-03', '2012-05-05', '#0000', '#ffff'),
(375, 155, 'Paring Lahung - Teluk Timbau', '', '2012-05-03', '2012-05-05', '#0000', '#ffff'),
(376, 156, 'Paring Lahung - Teluk Timbau', '', '2012-04-29', '2012-05-02', '#0000', '#ffff'),
(377, 157, 'Paring Lahung - Teluk Timbau', '', '2012-04-29', '2012-05-02', '#0000', '#ffff'),
(378, 158, 'Paring Lahung - Teluk Timbau', '', '2012-04-21', '2012-04-24', '#0000', '#ffff'),
(379, 159, 'Paring Lahung - Teluk Timbau', '', '2012-04-21', '2012-04-24', '#0000', '#ffff'),
(380, 160, 'Teluk Timbau - Taboneo', '', '2012-05-03', '2012-05-06', '#0000', '#ffff'),
(381, 161, 'Teluk Timbau - Taboneo', '', '2012-05-03', '2012-05-06', '#0000', '#ffff'),
(382, 162, 'Teluk Timbau - Taboneo', '', '2012-05-05', '2012-05-06', '#0000', '#ffff'),
(383, 163, 'Teluk Timbau - Taboneo', '', '2012-05-05', '2012-05-06', '#0000', '#ffff'),
(384, 164, 'Teluk Timbau - Taboneo', '', '2012-05-06', '2012-05-08', '#0000', '#ffff'),
(385, 165, 'Teluk Timbau - Taboneo', '', '2012-05-06', '2012-05-08', '#0000', '#ffff'),
(386, 166, 'Teluk Timbau - Taboneo', '', '2012-05-07', '2012-05-09', '#0000', '#ffff'),
(387, 167, 'Teluk Timbau - Taboneo', '', '2012-05-07', '2012-05-09', '#0000', '#ffff'),
(388, 168, 'Paring Lahung - Teluk Timbau', '', '2012-05-03', '2012-05-05', '#0000', '#ffff'),
(389, 169, 'Paring Lahung - Teluk Timbau', '', '2012-05-03', '2012-05-05', '#0000', '#ffff'),
(390, 170, 'Paring Lahung - Teluk Timbau', '', '2012-05-03', '2012-05-05', '#0000', '#ffff'),
(391, 171, 'Paring Lahung - Teluk Timbau', '', '2012-05-03', '2012-05-05', '#0000', '#ffff'),
(392, 172, 'Paring Lahung - Teluk Timbau', '', '2012-04-23', '2012-04-25', '#0000', '#ffff'),
(393, 173, 'Paring Lahung - Teluk Timbau', '', '2012-04-23', '2012-04-25', '#0000', '#ffff'),
(394, 174, 'Paring Lahung - Teluk Timbau', '', '2012-05-07', '2012-05-09', '#0000', '#ffff'),
(395, 175, 'Paring Lahung - Teluk Timbau', '', '2012-05-07', '2012-05-09', '#0000', '#ffff'),
(396, 176, 'Paring Lahung - Teluk Timbau', '', '2012-04-28', '2012-04-30', '#0000', '#ffff'),
(397, 177, 'Paring Lahung - Teluk Timbau', '', '2012-04-28', '2012-04-30', '#0000', '#ffff'),
(398, 178, 'Sungai Danau - Tuban', '', '2012-04-27', '2012-04-27', '#0000', '#ffff'),
(399, 179, 'Sungai Danau - Tuban', '', '2012-04-27', '2012-04-27', '#0000', '#ffff'),
(400, 180, 'Paring Lahung - Teluk Timbau', '', '2012-04-23', '2012-04-25', '#0000', '#ffff'),
(401, 181, 'Paring Lahung - Teluk Timbau', '', '2012-04-23', '2012-04-25', '#0000', '#ffff'),
(402, 182, 'Paring Lahung - Teluk Timbau', '', '2012-04-26', '2012-04-28', '#0000', '#ffff'),
(403, 183, 'Paring Lahung - Teluk Timbau', '', '2012-04-26', '2012-04-28', '#0000', '#ffff'),
(404, 184, 'Teluk Timbau - Taboneo', '', '2012-05-03', '2012-05-06', '#0000', '#ffff'),
(405, 185, 'Teluk Timbau - Taboneo', '', '2012-05-03', '2012-05-06', '#0000', '#ffff'),
(406, 186, 'Sungai Danau - Tuban', '', '2012-06-16', '2012-06-24', '#0000', '#ffff'),
(407, 187, 'Sungai Danau - Tuban', '', '2012-06-16', '2012-06-24', '#0000', '#ffff'),
(408, 188, 'Teluk Timbau - Taboneo', '', '2012-05-25', '2012-05-28', '#0000', '#ffff'),
(409, 189, 'Teluk Timbau - Taboneo', '', '2012-05-25', '2012-05-28', '#0000', '#ffff'),
(410, 190, 'Teluk Timbau - Taboneo', '', '2012-06-05', '2012-06-08', '#0000', '#ffff'),
(411, 191, 'Teluk Timbau - Taboneo', '', '2012-06-05', '2012-06-08', '#0000', '#ffff'),
(412, 192, 'Sungai Danau - Satui', '', '2012-05-26', '2012-06-05', '#0000', '#ffff'),
(413, 193, 'Sungai Danau - Satui', '', '2012-05-26', '2012-06-05', '#0000', '#ffff'),
(414, 194, 'Sungai Danau - Satui', '', '2012-06-05', '2012-06-10', '#0000', '#ffff'),
(415, 195, 'Sungai Danau - Satui', '', '2012-06-05', '2012-06-10', '#0000', '#ffff'),
(416, 196, 'Sungai Danau - Satui', '', '2012-05-25', '2012-06-04', '#0000', '#ffff'),
(417, 197, 'Sungai Danau - Satui', '', '2012-05-25', '2012-06-04', '#0000', '#ffff'),
(418, 198, 'KINTAP - SATUI', '', '2012-05-28', '2012-06-09', '#0000', '#ffff'),
(419, 199, 'KINTAP - SATUI', '', '2012-05-28', '2012-06-09', '#0000', '#ffff'),
(420, 200, 'Sungai Danau - Satui', '', '2012-06-02', '2012-06-15', '#0000', '#ffff'),
(421, 201, 'Sungai Danau - Satui', '', '2012-06-02', '2012-06-15', '#0000', '#ffff'),
(422, 202, 'Teluk Timbau - Taboneo', '', '2012-06-03', '2012-06-05', '#0000', '#ffff'),
(423, 203, 'Teluk Timbau - Taboneo', '', '2012-06-03', '2012-06-05', '#0000', '#ffff'),
(424, 204, 'Teluk Timbau - Taboneo', '', '2012-06-02', '2012-06-08', '#0000', '#ffff'),
(425, 205, 'Teluk Timbau - Taboneo', '', '2012-06-02', '2012-06-08', '#0000', '#ffff'),
(426, 206, 'Sungai Puting - Taboneo', '', '2012-05-27', '2012-05-31', '#0000', '#ffff'),
(427, 207, 'Sungai Puting - Taboneo', '', '2012-05-27', '2012-05-31', '#0000', '#ffff'),
(428, 208, 'Sungai Puting - Taboneo', '', '2012-05-17', '2012-05-22', '#0000', '#ffff'),
(429, 209, 'Sungai Puting - Taboneo', '', '2012-05-17', '2012-05-22', '#0000', '#ffff'),
(430, 210, '', '', '2012-05-23', '2012-05-26', '#0000', '#ffff'),
(431, 211, '', '', '2012-05-23', '2012-05-26', '#0000', '#ffff'),
(432, 212, 'Sungai Puting - Taboneo', '', '2012-05-14', '2012-05-20', '#0000', '#ffff'),
(433, 213, 'Sungai Puting - Taboneo', '', '2012-05-14', '2012-05-20', '#0000', '#ffff'),
(434, 214, 'Paring Lahung - Teluk Timbau', '', '2012-06-10', '2012-06-11', '#0000', '#ffff'),
(435, 215, 'Paring Lahung - Teluk Timbau', '', '2012-06-10', '2012-06-11', '#0000', '#ffff'),
(436, 216, 'Paring Lahung - Teluk Timbau', '', '2012-06-06', '2012-06-08', '#0000', '#ffff'),
(437, 217, 'Paring Lahung - Teluk Timbau', '', '2012-06-06', '2012-06-08', '#0000', '#ffff'),
(438, 218, 'Paring Lahung - Teluk Timbau', '', '2012-05-17', '2012-06-04', '#0000', '#ffff'),
(439, 219, 'Paring Lahung - Teluk Timbau', '', '2012-05-17', '2012-06-04', '#0000', '#ffff'),
(440, 220, 'Paring Lahung - Teluk Timbau', '', '2012-06-06', '2012-06-08', '#0000', '#ffff'),
(441, 221, 'Paring Lahung - Teluk Timbau', '', '2012-06-06', '2012-06-08', '#0000', '#ffff'),
(442, 222, 'Paring Lahung - Teluk Timbau', '', '2012-06-02', '2012-06-04', '#0000', '#ffff'),
(443, 223, 'Paring Lahung - Teluk Timbau', '', '2012-06-02', '2012-06-04', '#0000', '#ffff'),
(444, 224, 'Paring Lahung - Teluk Timbau', '', '2012-05-15', '2012-05-31', '#0000', '#ffff'),
(445, 225, 'Paring Lahung - Teluk Timbau', '', '2012-05-15', '2012-05-31', '#0000', '#ffff'),
(446, 226, 'Paring Lahung - Teluk Timbau', '', '2012-05-17', '2012-06-03', '#0000', '#ffff'),
(447, 227, 'Paring Lahung - Teluk Timbau', '', '2012-05-17', '2012-06-03', '#0000', '#ffff'),
(448, 228, 'Paring Lahung - Teluk Timbau', '', '2012-06-10', '2012-06-11', '#0000', '#ffff'),
(449, 229, 'Paring Lahung - Teluk Timbau', '', '2012-06-10', '2012-06-11', '#0000', '#ffff'),
(450, 230, 'Paring Lahung - Teluk Timbau', '', '2012-06-06', '2012-06-08', '#0000', '#ffff'),
(451, 231, 'Paring Lahung - Teluk Timbau', '', '2012-06-06', '2012-06-08', '#0000', '#ffff'),
(452, 232, 'Paring Lahung - Teluk Timbau', '', '2012-06-02', '2012-06-04', '#0000', '#ffff'),
(453, 233, 'Paring Lahung - Teluk Timbau', '', '2012-06-02', '2012-06-04', '#0000', '#ffff'),
(454, 234, 'Paring Lahung - Teluk Timbau', '', '2012-05-14', '2012-05-16', '#0000', '#ffff'),
(455, 235, 'Paring Lahung - Teluk Timbau', '', '2012-05-14', '2012-05-16', '#0000', '#ffff'),
(456, 236, 'Paring Lahung - Teluk Timbau', '', '2012-06-13', '2012-06-15', '#0000', '#ffff'),
(457, 237, 'Paring Lahung - Teluk Timbau', '', '2012-06-13', '2012-06-15', '#0000', '#ffff'),
(458, 238, 'Paring Lahung - Teluk Timbau', '', '2012-06-04', '2012-06-07', '#0000', '#ffff'),
(459, 239, 'Paring Lahung - Teluk Timbau', '', '2012-06-04', '2012-06-07', '#0000', '#ffff'),
(460, 240, 'Paring Lahung - Teluk Timbau', '', '2012-05-16', '2012-06-01', '#0000', '#ffff'),
(461, 241, 'Paring Lahung - Teluk Timbau', '', '2012-05-16', '2012-06-01', '#0000', '#ffff'),
(462, 242, 'Paring Lahung - Teluk Timbau', '', '2012-06-05', '2012-06-07', '#0000', '#ffff'),
(463, 243, 'Paring Lahung - Teluk Timbau', '', '2012-06-05', '2012-06-07', '#0000', '#ffff'),
(464, 244, 'Paring Lahung - Teluk Timbau', '', '2012-05-17', '2012-06-02', '#0000', '#ffff'),
(465, 245, 'Paring Lahung - Teluk Timbau', '', '2012-05-17', '2012-06-02', '#0000', '#ffff'),
(466, 246, 'Paring Lahung - Teluk Timbau', '', '2012-05-15', '2012-05-30', '#0000', '#ffff'),
(467, 247, 'Paring Lahung - Teluk Timbau', '', '2012-05-15', '2012-05-30', '#0000', '#ffff'),
(468, 248, 'visit', '', '2012-07-03', '2012-07-03', '#00ffff', '#0000'),
(469, 248, 'visit', '', '2012-10-01', '2012-10-01', '#00ffff', '#0000'),
(470, 248, 'visit', '', '2012-12-30', '2012-12-30', '#00ffff', '#0000'),
(471, 249, 'Paring Lahung - Teluk Timbau', '', '2012-06-13', '2012-06-15', '#0000', '#ffff'),
(472, 250, 'Paring Lahung - Teluk Timbau', '', '2012-06-13', '2012-06-15', '#0000', '#ffff'),
(473, 251, 'Paring Lahung - Teluk Timbau', '', '2012-06-10', '2012-06-13', '#0000', '#ffff'),
(474, 252, 'Paring Lahung - Teluk Timbau', '', '2012-06-10', '2012-06-13', '#0000', '#ffff'),
(475, 253, 'Teluk Timbau - Taboneo', '', '2012-06-09', '2012-06-11', '#0000', '#ffff'),
(476, 254, 'Teluk Timbau - Taboneo', '', '2012-06-09', '2012-06-11', '#0000', '#ffff'),
(477, 255, 'Paring Lahung - Teluk Timbau', '', '2012-06-05', '2012-06-07', '#0000', '#ffff'),
(478, 256, 'Paring Lahung - Teluk Timbau', '', '2012-06-05', '2012-06-07', '#0000', '#ffff'),
(479, 257, 'Paring Lahung - Teluk Timbau', '', '2012-06-09', '2012-06-11', '#0000', '#ffff'),
(480, 258, 'Paring Lahung - Teluk Timbau', '', '2012-06-09', '2012-06-11', '#0000', '#ffff'),
(481, 259, 'Paring Lahung - Teluk Timbau', '', '2012-06-09', '2012-06-11', '#0000', '#ffff'),
(482, 260, 'Paring Lahung - Teluk Timbau', '', '2012-06-09', '2012-06-11', '#0000', '#ffff'),
(483, 261, 'Sungai Danau - Satui', '', '2012-07-08', '2012-07-13', '#0000', '#ffff'),
(484, 262, 'Sungai Danau - Satui', '', '2012-07-08', '2012-07-13', '#0000', '#ffff'),
(485, 263, 'Sungai Danau - Satui', '', '2012-07-07', '2012-07-12', '#0000', '#ffff'),
(486, 264, 'Sungai Danau - Satui', '', '2012-07-07', '2012-07-12', '#0000', '#ffff'),
(487, 265, 'Sungai Danau - Gresik', '', '2012-06-29', '2012-07-07', '#0000', '#ffff'),
(488, 266, 'Sungai Danau - Gresik', '', '2012-06-29', '2012-07-07', '#0000', '#ffff'),
(489, 267, 'Telang Baru - Taboneo', '', '2012-06-19', '2012-06-23', '#0000', '#ffff'),
(490, 268, 'Telang Baru - Taboneo', '', '2012-06-19', '2012-06-23', '#0000', '#ffff'),
(491, 269, 'Bunati - Tuban', '', '2012-06-27', '2012-07-06', '#0000', '#ffff'),
(492, 270, 'Bunati - Tuban', '', '2012-06-27', '2012-07-06', '#0000', '#ffff'),
(493, 271, 'Teluk Timbau - Taboneo', '', '2012-06-29', '2012-07-03', '#0000', '#ffff'),
(494, 272, 'Teluk Timbau - Taboneo', '', '2012-06-29', '2012-07-03', '#0000', '#ffff'),
(495, 273, 'Teluk Timbau - Taboneo', '', '2012-06-29', '2012-07-03', '#0000', '#ffff'),
(496, 274, 'Teluk Timbau - Taboneo', '', '2012-06-29', '2012-07-03', '#0000', '#ffff'),
(497, 275, 'Paring Lahung - Teluk Timbau', '', '2012-07-14', '2012-07-19', '#0000', '#ffff'),
(498, 276, 'Paring Lahung - Teluk Timbau', '', '2012-07-14', '2012-07-19', '#0000', '#ffff'),
(499, 277, 'Paring Lahung - Teluk Timbau', '', '2012-07-09', '2012-07-12', '#0000', '#ffff'),
(500, 278, 'Paring Lahung - Teluk Timbau', '', '2012-07-09', '2012-07-12', '#0000', '#ffff'),
(501, 279, 'Sungai Danau - Satui', '', '2012-07-09', '2012-07-17', '#0000', '#ffff'),
(502, 280, 'Sungai Danau - Satui', '', '2012-07-09', '2012-07-17', '#0000', '#ffff'),
(503, 281, 'Sungai Danau - Taboneo', '', '2012-06-17', '2012-06-25', '#0000', '#ffff'),
(504, 282, 'Sungai Danau - Taboneo', '', '2012-06-17', '2012-06-25', '#0000', '#ffff'),
(505, 283, 'Sungai Puting - Taboneo', '', '2012-06-27', '2012-07-02', '#0000', '#ffff'),
(506, 284, 'Sungai Puting - Taboneo', '', '2012-06-27', '2012-07-02', '#0000', '#ffff'),
(507, 285, 'Teluk Timbau - Taboneo', '', '2012-06-30', '2012-07-03', '#0000', '#ffff'),
(508, 286, 'Teluk Timbau - Taboneo', '', '2012-06-30', '2012-07-03', '#0000', '#ffff'),
(509, 287, 'Teluk Timbau - Taboneo', '', '2012-07-01', '2012-07-04', '#0000', '#ffff'),
(510, 288, 'Teluk Timbau - Taboneo', '', '2012-07-01', '2012-07-04', '#0000', '#ffff'),
(511, 289, 'Sungai Danau - Tuban', '', '2012-06-30', '2012-07-16', '#0000', '#ffff'),
(512, 290, 'Sungai Danau - Tuban', '', '2012-06-30', '2012-07-16', '#0000', '#ffff'),
(513, 291, 'Teluk Timbau - Taboneo', '', '2012-06-29', '2012-07-02', '#0000', '#ffff'),
(514, 292, 'Teluk Timbau - Taboneo', '', '2012-06-29', '2012-07-02', '#0000', '#ffff'),
(515, 293, 'Teluk Timbau - Taboneo', '', '2012-06-29', '2012-07-01', '#0000', '#ffff'),
(516, 294, 'Teluk Timbau - Taboneo', '', '2012-06-29', '2012-07-01', '#0000', '#ffff'),
(517, 295, 'KINTAP - SATUI', '', '2012-07-13', '2012-07-16', '#0000', '#ffff'),
(518, 296, 'KINTAP - SATUI', '', '2012-07-13', '2012-07-16', '#0000', '#ffff'),
(519, 297, 'KINTAP - SATUI', '', '2012-07-16', '2012-07-17', '#0000', '#ffff'),
(520, 298, 'KINTAP - SATUI', '', '2012-07-16', '2012-07-17', '#0000', '#ffff'),
(521, 299, 'Sungai Puting - Taboneo', '', '2012-07-07', '2012-07-14', '#0000', '#ffff'),
(522, 300, 'Sungai Puting - Taboneo', '', '2012-07-07', '2012-07-14', '#0000', '#ffff'),
(523, 301, 'Sungai Danau - Tuban', '', '2012-07-08', '2012-08-05', '#0000', '#ffff'),
(524, 302, 'Sungai Danau - Tuban', '', '2012-07-08', '2012-08-05', '#0000', '#ffff'),
(525, 303, 'Sungai Danau - Tuban', '', '2012-07-18', '2012-07-29', '#0000', '#ffff'),
(526, 304, 'Sungai Danau - Tuban', '', '2012-07-18', '2012-07-29', '#0000', '#ffff'),
(527, 305, 'LAMONGAN - TARJUN', '', '2012-07-21', '2012-07-28', '#0000', '#ffff'),
(528, 306, 'LAMONGAN - TARJUN', '', '2012-07-21', '2012-07-28', '#0000', '#ffff'),
(529, 307, 'Sungai Puting - Tuban', '', '2012-07-08', '2012-07-14', '#0000', '#ffff'),
(530, 308, 'Sungai Puting - Tuban', '', '2012-07-08', '2012-07-14', '#0000', '#ffff'),
(689, 386, 'visit', '', '2012-11-23', '2012-11-23', '#00ffff', '#0000'),
(688, 386, 'visit', '', '2012-09-24', '2012-09-24', '#00ffff', '#0000'),
(594, 383, 'Sungai Danau - Tuban', '', '2012-09-18', '2012-09-19', '#0000', '#ffff'),
(593, 382, 'Sungai Danau - Tuban', '', '2012-09-18', '2012-09-19', '#0000', '#ffff'),
(590, 379, 'Sungai Danau - Tuban', '', '2012-09-11', '2012-09-12', '#0000', '#ffff'),
(591, 380, 'Sungai Puting - Taboneo', '', '2012-09-21', '2012-09-21', '#0000', '#ffff'),
(592, 381, 'Sungai Puting - Taboneo', '', '2012-09-21', '2012-09-21', '#0000', '#ffff'),
(589, 378, 'Sungai Danau - Tuban', '', '2012-09-11', '2012-09-12', '#0000', '#ffff'),
(588, 377, 'Sungai Puting - Taboneo', '', '2012-09-21', '2012-09-21', '#0000', '#ffff'),
(587, 376, 'Sungai Puting - Taboneo', '', '2012-09-21', '2012-09-21', '#0000', '#ffff'),
(583, 372, 'Sungai Danau - Tuban', '', '2012-09-20', '2012-09-20', '#0000', '#ffff'),
(584, 373, 'Sungai Danau - Tuban', '', '2012-09-20', '2012-09-20', '#0000', '#ffff'),
(585, 374, 'Sungai Puting - Ciwandan', '', '2012-09-13', '2012-09-14', '#0000', '#ffff'),
(586, 375, 'Sungai Puting - Ciwandan', '', '2012-09-13', '2012-09-14', '#0000', '#ffff'),
(582, 371, 'Teluk Timbau - Taboneo', '', '2012-09-05', '2012-09-05', '#0000', '#ffff'),
(581, 370, 'Teluk Timbau - Taboneo', '', '2012-09-05', '2012-09-05', '#0000', '#ffff'),
(573, 362, 'Teluk Timbau - Taboneo', '', '2012-09-02', '2012-09-02', '#0000', '#ffff'),
(574, 363, 'Teluk Timbau - Taboneo', '', '2012-09-02', '2012-09-02', '#0000', '#ffff'),
(575, 364, 'Teluk Timbau - Taboneo', '', '2012-09-03', '2012-09-03', '#0000', '#ffff'),
(576, 365, 'Teluk Timbau - Taboneo', '', '2012-09-03', '2012-09-03', '#0000', '#ffff'),
(596, 385, 'Teluk Timbau - Taboneo', '', '2012-09-05', '2012-09-05', '#0000', '#ffff'),
(595, 384, 'Teluk Timbau - Taboneo', '', '2012-09-05', '2012-09-05', '#0000', '#ffff'),
(579, 368, 'Teluk Timbau - Taboneo', '', '2012-09-04', '2012-09-04', '#0000', '#ffff'),
(580, 369, 'Teluk Timbau - Taboneo', '', '2012-09-04', '2012-09-04', '#0000', '#ffff'),
(572, 361, 'Teluk Timbau - Taboneo', '', '2012-09-01', '2012-09-01', '#0000', '#ffff'),
(571, 360, 'Teluk Timbau - Taboneo', '', '2012-09-01', '2012-09-01', '#0000', '#ffff'),
(567, 356, 'Paring Lahung - Teluk Timbau', '', '2012-09-01', '2012-09-02', '#0000', '#ffff'),
(568, 357, 'Paring Lahung - Teluk Timbau', '', '2012-09-01', '2012-09-02', '#0000', '#ffff'),
(569, 358, 'Paring Lahung - Teluk Timbau', '', '2012-08-31', '2012-09-01', '#0000', '#ffff'),
(570, 359, 'Paring Lahung - Teluk Timbau', '', '2012-08-31', '2012-09-01', '#0000', '#ffff'),
(566, 355, 'Teluk Timbau - Taboneo', '', '2012-09-07', '2012-09-07', '#0000', '#ffff'),
(565, 354, 'Teluk Timbau - Taboneo', '', '2012-09-07', '2012-09-07', '#0000', '#ffff'),
(560, 349, 'Paring Lahung - Teluk Timbau', '', '2012-09-02', '2012-09-03', '#0000', '#ffff'),
(561, 350, 'Paring Lahung - Teluk Timbau', '', '2012-09-02', '2012-09-03', '#0000', '#ffff'),
(564, 353, 'Paring Lahung - Teluk Timbau', '', '2012-09-01', '2012-09-02', '#0000', '#ffff'),
(563, 352, 'Paring Lahung - Teluk Timbau', '', '2012-09-01', '2012-09-02', '#0000', '#ffff'),
(562, 351, 'Paring Lahung - Teluk Timbau', '', '2012-09-02', '2012-09-03', '#0000', '#ffff'),
(559, 348, 'Paring Lahung - Teluk Timbau', '', '2012-09-02', '2012-09-03', '#0000', '#ffff'),
(558, 347, 'Paring Lahung - Teluk Timbau', '', '2012-09-06', '2012-09-07', '#0000', '#ffff'),
(554, 343, 'Paring Lahung - Teluk Timbau', '', '2012-09-06', '2012-09-06', '#0000', '#ffff'),
(555, 344, 'Paring Lahung - Teluk Timbau', '', '2012-08-30', '2012-08-31', '#0000', '#ffff'),
(557, 346, 'Paring Lahung - Teluk Timbau', '', '2012-09-06', '2012-09-07', '#0000', '#ffff'),
(556, 345, 'Paring Lahung - Teluk Timbau', '', '2012-08-30', '2012-08-31', '#0000', '#ffff'),
(553, 342, 'Paring Lahung - Teluk Timbau', '', '2012-09-06', '2012-09-06', '#0000', '#ffff'),
(552, 341, 'Paring Lahung - Teluk Timbau', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(550, 339, 'Sungai Danau - Tuban', '', '2012-09-07', '2012-09-07', '#0000', '#ffff'),
(546, 335, 'Sungai Danau - Tuban', '', '2012-09-07', '2012-09-07', '#0000', '#ffff'),
(547, 336, 'Teluk Timbau - Taboneo', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(551, 340, 'Paring Lahung - Teluk Timbau', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(549, 338, 'Sungai Danau - Tuban', '', '2012-09-07', '2012-09-07', '#0000', '#ffff'),
(548, 337, 'Teluk Timbau - Taboneo', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(545, 334, 'Sungai Danau - Tuban', '', '2012-09-07', '2012-09-07', '#0000', '#ffff'),
(544, 333, 'Teluk Timbau - Taboneo', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(543, 332, 'Teluk Timbau - Taboneo', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(539, 328, 'Teluk Timbau - Taboneo', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(540, 329, 'Teluk Timbau - Taboneo', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(541, 330, 'Sungai Puting - Taboneo', '', '2012-09-08', '2012-09-09', '#0000', '#ffff'),
(542, 331, 'Sungai Puting - Taboneo', '', '2012-09-08', '2012-09-09', '#0000', '#ffff'),
(531, 320, 'LAMONGAN - TARJUN', '', '2012-05-28', '2012-05-28', '#0000', '#ffff'),
(532, 321, 'LAMONGAN - TARJUN', '', '2012-05-28', '2012-05-28', '#0000', '#ffff'),
(533, 322, 'Sungai Danau - Tuban', '', '2012-09-05', '2012-09-06', '#0000', '#ffff'),
(534, 323, 'Sungai Danau - Tuban', '', '2012-09-05', '2012-09-06', '#0000', '#ffff'),
(535, 324, 'Teluk Timbau - Taboneo', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(536, 325, 'Teluk Timbau - Taboneo', '', '2012-08-31', '2012-08-31', '#0000', '#ffff'),
(537, 326, 'Sungai Puting - Taboneo', '', '2012-09-07', '2012-09-08', '#0000', '#ffff'),
(538, 327, 'Sungai Puting - Taboneo', '', '2012-09-07', '2012-09-08', '#0000', '#ffff'),
(690, 63, 'Docking', '-', '2012-09-04', '2012-09-05', '#cf43cf', '#fff'),
(691, 387, 'Sungai Danau - Tuban', '', '2012-11-07', '2012-11-10', '#0000', '#ffff'),
(692, 388, 'Sungai Danau - Tuban', '', '2012-11-07', '2012-11-10', '#0000', '#ffff'),
(693, 389, 'Sungai Danau - Tuban', '', '2012-11-20', '2012-11-20', '#0000', '#ffff'),
(694, 390, 'Sungai Danau - Tuban', '', '2012-11-20', '2012-11-20', '#0000', '#ffff'),
(695, 391, 'LAMONGAN - TARJUN', '', '2012-11-11', '2012-11-11', '#0000', '#ffff'),
(696, 392, 'LAMONGAN - TARJUN', '', '2012-11-11', '2012-11-11', '#0000', '#ffff'),
(697, 393, 'Sungai Puting - Merakmas', '', '2012-11-08', '2012-11-06', '#0000', '#ffff'),
(698, 394, 'Sungai Puting - Merakmas', '', '2012-11-08', '2012-11-06', '#0000', '#ffff'),
(699, 395, 'Sungai Puting  - Bojonegara', '', '2012-11-01', '2012-11-02', '#0000', '#ffff'),
(700, 396, 'Sungai Puting  - Bojonegara', '', '2012-11-01', '2012-11-02', '#0000', '#ffff'),
(701, 397, 'Bintang Ninggi - Taboneo', '', '2012-11-25', '2012-11-27', '#0000', '#ffff'),
(702, 398, 'Bintang Ninggi - Taboneo', '', '2012-11-25', '2012-11-27', '#0000', '#ffff'),
(703, 399, 'Telang Baru - Taboneo', '', '2012-11-24', '2012-11-28', '#0000', '#ffff'),
(704, 400, 'Telang Baru - Taboneo', '', '2012-11-24', '2012-11-28', '#0000', '#ffff'),
(705, 401, 'Sungai Danau - Taboneo', '', '2012-11-27', '2012-12-02', '#0000', '#ffff'),
(706, 402, 'Sungai Danau - Taboneo', '', '2012-11-27', '2012-12-02', '#0000', '#ffff'),
(707, 403, 'Bintang Ninggi - Taboneo', '', '2012-11-21', '2012-11-25', '#0000', '#ffff'),
(708, 404, 'Bintang Ninggi - Taboneo', '', '2012-11-21', '2012-11-25', '#0000', '#ffff'),
(709, 405, 'Paring Lahung - Taboneo', '', '2012-12-06', '2012-12-06', '#0000', '#ffff'),
(710, 406, 'Paring Lahung - Taboneo', '', '2012-12-06', '2012-12-06', '#0000', '#ffff'),
(711, 407, 'Sungai Durian - Tanjung Pemancingan', '', '2012-12-03', '2012-12-02', '#0000', '#ffff'),
(712, 408, 'Sungai Durian - Tanjung Pemancingan', '', '2012-12-03', '2012-12-02', '#0000', '#ffff'),
(713, 409, 'Serongga - Cigading', '', '2012-12-15', '2012-12-13', '#0000', '#ffff'),
(714, 410, 'Serongga - Cigading', '', '2012-12-15', '2012-12-13', '#0000', '#ffff'),
(715, 411, 'Paring Lahung - Taboneo', '', '2012-12-06', '2012-12-06', '#0000', '#ffff'),
(716, 412, 'Paring Lahung - Taboneo', '', '2012-12-06', '2012-12-06', '#0000', '#ffff'),
(717, 413, 'Sungai Durian - Tanjung Pemancingan', '', '2012-12-10', '2012-12-10', '#0000', '#ffff'),
(718, 414, 'Sungai Durian - Tanjung Pemancingan', '', '2012-12-10', '2012-12-10', '#0000', '#ffff'),
(719, 415, 'Sungai Danau - Tuban', '', '2012-12-13', '2012-12-14', '#0000', '#ffff'),
(720, 416, 'Sungai Danau - Tuban', '', '2012-12-13', '2012-12-14', '#0000', '#ffff'),
(721, 417, 'Bunati - Muara Bunati', '', '2012-12-18', '2012-12-16', '#0000', '#ffff'),
(722, 418, 'Bunati - Muara Bunati', '', '2012-12-18', '2012-12-16', '#0000', '#ffff'),
(723, 419, 'Teluk Timbau - Taboneo', '', '2012-12-14', '2012-12-14', '#0000', '#ffff'),
(724, 420, 'Teluk Timbau - Taboneo', '', '2012-12-14', '2012-12-14', '#0000', '#ffff'),
(725, 421, 'Sungai Danau - Tuban', '', '2012-12-16', '2012-12-17', '#0000', '#ffff'),
(726, 422, 'Sungai Danau - Tuban', '', '2012-12-16', '2012-12-17', '#0000', '#ffff'),
(727, 423, 'Bintang Ninggi - Taboneo', '', '2012-12-17', '2012-12-17', '#0000', '#ffff'),
(728, 424, 'Bintang Ninggi - Taboneo', '', '2012-12-17', '2012-12-17', '#0000', '#ffff'),
(729, 425, 'Bintang Ninggi - Taboneo', '', '2012-12-18', '2012-12-18', '#0000', '#ffff'),
(730, 426, 'Bintang Ninggi - Taboneo', '', '2012-12-18', '2012-12-18', '#0000', '#ffff'),
(731, 427, 'Sungai Puting - Tuban', '', '2012-12-15', '2012-12-15', '#0000', '#ffff'),
(732, 428, 'Sungai Puting - Tuban', '', '2012-12-15', '2012-12-15', '#0000', '#ffff'),
(733, 429, 'Muarabahan - Gresik', '', '2012-12-14', '2012-12-16', '#0000', '#ffff'),
(734, 430, 'Muarabahan - Gresik', '', '2012-12-14', '2012-12-16', '#0000', '#ffff'),
(735, 431, 'KINTAP - Taboneo', '', '2012-12-14', '2012-12-15', '#0000', '#ffff'),
(736, 432, 'KINTAP - Taboneo', '', '2012-12-14', '2012-12-15', '#0000', '#ffff'),
(737, 433, 'Batu Licin - Muara Satui', '', '2012-12-12', '2012-12-12', '#0000', '#ffff'),
(738, 434, 'Batu Licin - Muara Satui', '', '2012-12-12', '2012-12-12', '#0000', '#ffff'),
(739, 435, 'Sungai Puting - GRESIK', '', '2013-10-23', '2013-10-24', '#0000', '#ffff'),
(740, 436, 'Sungai Puting - GRESIK', '', '2013-10-23', '2013-10-24', '#0000', '#ffff'),
(741, 437, 'Sungai Puting - Taboneo', '', '2013-10-23', '2013-10-24', '#0000', '#ffff'),
(742, 438, 'Sungai Puting - Taboneo', '', '2013-10-23', '2013-10-24', '#0000', '#ffff'),
(743, 439, 'Sungai Puting - Taboneo', '', '0000-00-00', '0000-00-00', '#0000', '#ffff'),
(744, 440, 'Sungai Puting - Taboneo', '', '0000-00-00', '0000-00-00', '#0000', '#ffff'),
(745, 441, 'Teluk Timbau - Taboneo', '', '0000-00-00', '0000-00-00', '#0000', '#ffff'),
(746, 442, 'Teluk Timbau - Taboneo', '', '0000-00-00', '0000-00-00', '#0000', '#ffff'),
(747, 63, 'test1', 'test1', '2014-02-20', '2014-02-20', '#000', '#fff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timesheet`
--

CREATE TABLE IF NOT EXISTS `timesheet` (
  `id_timesheet` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `id_voyage_activity` int(11) NOT NULL,
  `Activity` varchar(250) NOT NULL,
  `id_mst_timesheet_summary` int(11) NOT NULL,
  `StartDate` datetime NOT NULL,
  `Duration` double(8,2) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `JettyId` int(11) NOT NULL,
  `PortCategory` set('PARK','START','END') NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_timesheet`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `id_voyage_activity` (`id_voyage_activity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `timesheet`
--

INSERT INTO `timesheet` (`id_timesheet`, `id_voyage_order`, `id_voyage_activity`, `Activity`, `id_mst_timesheet_summary`, `StartDate`, `Duration`, `Remarks`, `JettyId`, `PortCategory`, `updated_date`, `updated_user`, `ip_user_updated`) VALUES
(1, 4, 9, '-', 3, '2015-01-30 10:00:00', 0.00, '-', 20003, '', '2015-01-30 10:15:19', 'admin', '::1'),
(2, 4, 1, '--', 3, '2015-01-30 17:00:00', 7.00, '--', 20001, '', '2015-01-30 10:15:52', 'admin', '::1'),
(3, 4, 2, '-', 6, '2015-01-31 02:00:00', 9.00, '-', 20001, '', '2015-01-30 10:20:24', 'admin', '::1'),
(4, 4, 4, 'sda', 2, '2015-02-02 00:00:00', 46.00, 'a', 20001, '', '2015-01-30 10:24:07', 'admin', '::1'),
(5, 4, 6, 'sda', 1, '2015-02-04 00:00:00', 48.00, 's', 100001, '', '2015-01-30 14:08:47', 'admin', '::1'),
(6, 1, 9, 'sda', 1, '2015-01-30 00:00:00', 0.00, 'ss', 100001, '', '2015-01-30 14:31:20', 'admin', '::1'),
(7, 1, 3, 'sda', 1, '2015-01-30 14:00:00', 14.00, 'ss', 190001, '', '2015-01-30 14:31:47', 'admin', '::1'),
(8, 4, 6, 'sdas', 1, '2015-02-06 00:00:00', 48.00, 'as', 30004, '', '2015-01-30 16:53:54', 'admin', '::1'),
(9, 4, 2, 'sda', 5, '2015-02-09 09:00:00', 81.00, 'ss', 200007, '', '2015-01-30 16:55:41', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timesheet_plan`
--

CREATE TABLE IF NOT EXISTS `timesheet_plan` (
  `id_timesheet` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `id_voyage_activity` int(11) NOT NULL,
  `Activity` varchar(250) NOT NULL,
  `StartDate` datetime NOT NULL,
  `Duration` double(8,2) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `JettyId` int(11) NOT NULL,
  `PortCategory` set('PARK','START','END') NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_timesheet`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `id_voyage_activity` (`id_voyage_activity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `timesheet_plan`
--

INSERT INTO `timesheet_plan` (`id_timesheet`, `id_voyage_order`, `id_voyage_activity`, `Activity`, `StartDate`, `Duration`, `Remarks`, `JettyId`, `PortCategory`, `updated_date`, `updated_user`, `ip_user_updated`) VALUES
(1, 1, 7, 'Load Barang', '2015-01-24 00:00:00', 0.00, '-', 0, 'PARK', '2015-01-08 16:01:44', 'admin', '::1'),
(2, 1, 12, 'Tunggu Dokumen Ijin SPT', '2015-01-25 00:00:00', 14.00, 'Ternyata Telat', 0, 'PARK', '2015-01-08 16:04:48', 'admin', '::1'),
(3, 1, 11, 'Ambil Dokumen', '2015-01-25 12:00:00', 12.00, '-', 0, 'PARK', '2015-01-15 17:30:01', 'admin', '::1'),
(4, 1, 3, 'Mancing', '2015-01-24 10:00:00', 10.00, 'Test', 0, 'PARK', '2015-01-15 17:30:44', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timesheet_summary`
--

CREATE TABLE IF NOT EXISTS `timesheet_summary` (
  `id_timesheet_summary` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `id_mst_timesheet_summary` int(11) NOT NULL,
  `value` double(20,2) NOT NULL,
  PRIMARY KEY (`id_timesheet_summary`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `id_mst_timesheet_summary` (`id_mst_timesheet_summary`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `timesheet_summary`
--

INSERT INTO `timesheet_summary` (`id_timesheet_summary`, `id_voyage_order`, `id_mst_timesheet_summary`, `value`) VALUES
(1, 4, 1, 14.00),
(2, 4, 2, 0.00),
(3, 4, 3, 0.00),
(4, 4, 4, 0.00),
(5, 4, 5, 0.00),
(6, 4, 6, 0.00),
(7, 4, 7, 0.00),
(8, 4, 8, 0.00),
(9, 4, 9, 0.00),
(10, 1, 1, 14.00),
(11, 1, 2, 0.00),
(12, 1, 3, 0.00),
(13, 1, 4, 0.00),
(14, 1, 5, 0.00),
(15, 1, 6, 0.00),
(16, 1, 7, 0.00),
(17, 1, 8, 0.00),
(18, 1, 9, 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(45) NOT NULL,
  `code_id` varchar(100) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `CompanyName` int(50) NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT 'NoName',
  `password` varchar(150) DEFAULT NULL,
  `security_code` varchar(200) NOT NULL,
  `secret_question` text NOT NULL,
  `answer_secret_question` varchar(250) NOT NULL,
  `is_reset` int(1) NOT NULL,
  `reset_code` varchar(20) NOT NULL,
  `status_activated` int(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `ip_addr_created` varchar(64) NOT NULL,
  `hit_count` bigint(11) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `last_logout` datetime NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userid`, `code_id`, `type`, `full_name`, `CompanyName`, `email`, `password`, `security_code`, `secret_question`, `answer_secret_question`, `is_reset`, `reset_code`, `status_activated`, `created_date`, `ip_addr_created`, `hit_count`, `last_login`, `last_logout`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'ADM', 'Administrator', 0, 'admin@pml.com', '591cda68c6c711b0e7f9a48f2e67705d', 'c3284d0f94606de1fd2af172aba15bf3', '', '', 0, '', 1, '0000-00-00 00:00:00', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('adminbandung', 'a44b2ef2674b51ee418bd34f4ac08fda', 'ADM', 'Adminstrator Bandung', 0, 'adminbandung@aerocomm.com', '21d23bc6c836b84b1c44ad458af55b4f', '2ef505f4e6149ca5c739f88d760070f8', '', '', 0, '', 0, '2014-12-08 08:27:30', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('adminpml', 'af8d759cc64941e787a0d4475dceffe0', 'ADM', 'Admin PML', 0, 'admin@pml.co.id', 'd82652f0b65630d515c3f11840eadb63', '114a99ca5da5ddd08398a06c51093c06', '', '', 0, '', 0, '2014-12-08 08:27:07', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('costcontroltester', 'f43664091853cc550a2559b5963a1b34', 'CCT', 'Cost Control Tester', 0, 'cct@aerocomm.com', '2e311237fb3c848111af045ebf9568d8', 'eb128f1863a0211dac561268a2ad0186', '', '', 0, '', 0, '2014-12-09 15:25:49', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('headoperationtester', '38130335d4996a04b37902919de9ef80', 'HOPR', 'Head Operation Tester', 0, 'headoperatointester@gmail.com', 'f9f5793c45259678b3ef9880ccc1aed9', '50a89d2ac1c9379f0595d2204f684d5b', '', '', 0, '', 0, '2014-12-30 10:30:27', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('marketingtest', '77c000b8801c226dd7006216d3d7b209', 'MKT', 'Marketing Test', 0, 'marketing.pml@gmail.com', 'a15a0c40314bb4dd5723f19f8ff8a797', 'cbc0e1b7ad9e4d4281b8f4e0321d03e3', '', '', 0, '', 0, '2014-10-14 16:16:07', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('megasuryauser', 'a04dff4c569e372d1f7f45e4e2a69e48', 'CUS', 'User PT Mega Surya', 30387, 'megasurya@gmail.com', 'ab88c35af195e3ad326a8c2411498d2d', '69e5beb2fb86d515c66715542bee099b', '', '', 0, '', 0, '2015-01-13 10:02:57', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('nauticaltester', 'a4706d031c99531f996424db4111bd11', 'NAU', 'Nautical Tester', 0, 'nautical@pml.co.id', 'b916dbeb98c40033fdd9b21992ed6495', '28e1329ee9774d4f1b9a328cf76ab920', '', '', 0, '', 0, '2014-12-04 15:48:20', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('pttuah_user', 'd667c7d09ffb5e982e0f5854958a42c9', 'CUS', 'User PT Tuah', 0, 'user@pttuah.com', '9e4bca2acf3b1047db4eaadb26bfc90a', '353080cae46966e2bb0d7accbcfe8d82', '', '', 0, '', 0, '2014-10-14 16:25:03', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('sinung', 'b57baccee869e24344ee89189d71c98c', 'ADM', 'Sinung Suakanto', 0, 'sinung@ithb.ac.id', 'febfeb9982d391eabc43020cd04e2e80', '445ca1d00b605c3c9c2aa44ef97d071e', '', '', 0, '', 1, '2014-07-08 11:40:58', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('vpctester', '239331bde6b7f6d55e0a856ff2c8f9ad', 'VPC', 'vpc', 0, 'vpc@tester.com', '1125a22c2d2c8b2b916acbe2750e7541', '7bc5ea4e927f0dd62c4d59d531d9ca7f', '', '', 0, '', 0, '2014-12-02 11:24:33', '::1', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `id_vendor` int(11) NOT NULL AUTO_INCREMENT,
  `VendorName` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `Address` text COLLATE latin1_general_ci NOT NULL,
  `foto_vendor` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `NPWP` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `CompanyType` set('PT','CV','OTHERS') COLLATE latin1_general_ci NOT NULL,
  `Status` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Telephone` text COLLATE latin1_general_ci NOT NULL,
  `Telephone2` text COLLATE latin1_general_ci NOT NULL,
  `fax_number` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `Email` text COLLATE latin1_general_ci NOT NULL,
  `ContactName` text COLLATE latin1_general_ci NOT NULL,
  `MobilePhone` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `City` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `PostalCode` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `VendorCode` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `VendorNumber` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `vatReg` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `term_of_payment` int(11) NOT NULL,
  `BankName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BranchAddress` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BankCity` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountNumber` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `Currency` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `id_currency` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_vendor`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23000131 ;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `VendorName`, `Address`, `foto_vendor`, `NPWP`, `CompanyType`, `Status`, `Telephone`, `Telephone2`, `fax_number`, `Email`, `ContactName`, `MobilePhone`, `City`, `PostalCode`, `VendorCode`, `VendorNumber`, `vatReg`, `term_of_payment`, `BankName`, `BranchAddress`, `BankCity`, `AccountName`, `AccountNumber`, `Currency`, `id_currency`) VALUES
(1000001, 'ADAM JAYA BASTARI, PT', 'Jl. Brigjend H. Hasan Basri No 1 Rt 28 Banjarmasin Telp: 0511-330-4993 Fax: 0511-330-4993', '', '02.613.942.8-731.000', 'PT', 'A', '(0511) 330-4993', '(0511) 330-4993', '', 'ajb.adamgroup@gmail.com/yani_59@ymail.com', 'Rusnaniah/Farida/Yani', '081351081666/081351047111/085251158500', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(1000002, 'ADHIGUNA PUTERA CAB PAITON, PT', 'Jl. Mawar no 3 Besuki Situbondo Jawa Timur 68356 Telp: (0338)891-381 Fax: (0338)891-304', '', '01.061.033.5-051.000', 'PT', 'A', '(0338) 891381', '(0338) 891304', '', 'financepaiton@adhigunaputera.com/opspaiton@..../suhenda75@yahoo.co.id', 'Suhenda', '081336099865', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(1000003, 'ADHIGUNA PUTRA CAB GRESIK, PT', 'Jl. Panglima Sudirman No 72 Telp: (031) 398-1361 Fax: (031) 398-1639', '', '01.061.033.5-051.000', 'PT', 'A', '031-3981361', '031-3981639', '', '', '', '', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(1000004, 'ADHIGUNA PUTRA CAB KOTABARU, PT', 'Jl. Veteran No 193 Kotabaru Pulau l Telp: (0518) 21255 Fax: (0518)21257', '', '01.061.033.5-051.000', 'PT', '', '0518-21255', '0518-21257', '', '', '', '', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(1000005, 'AGUNG JAYA TEKNIK', 'Jl. Ir. PM. Noor Gg. Damai Rt 35 No 40 Banjamasin Telp : 081349621736', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(1000006, 'ANDALAN MULTI KENCANA, PT', 'Jl. A. Yani Km 17,9 Landasan Ulin Barat Liang Anggang Banjarmasin Telp: 0511-6730014', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(1000007, 'ANUGERAH SANTAN SAMUDERA, PT', 'Jl. Rwa Binangun VIII No 18 Rt12/08 Rawa Badak Jak-ut Telp: (021) 4373103', '', '', 'PT', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(1000008, 'ANUGRAH LAUTAN LUAS, PT', 'Jl.Pahlawan Seribu,Golden Boulevard 2 Blok O no-W BSD City Serpong 15321', '', '21.069.185.3.411.000', 'PT', '', '(021) 531-6438', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(1000009, 'AQUAMARINE DIVINDO INSPECTION, PT', 'Jl Abdul Rohman Bonosari No 75A Sedati Sidoarjo Telp: (031) 8690099 Fax: (031) 8690079', '', '02.596.351.3-643.000', 'PT', 'A', '(031) 8690099', '(031) 8690079', '', 'inspection@aquamarinedivindo.com', 'Irma Susanty', '', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(1000010, 'ARGATAMA ANDIKA JAYA.PT', 'Jl.Angkasa Kav.B-6 Kota Bandar Bayu Kemayoran -Jakarta Pusat 10610 Tlp.021-33304799 Fax.021-29371035', '', '', 'PT', '', '(021) 33304799', '(021) 29371035', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(1000011, 'ARMADA INDONESIA MANDIRI, PT', 'GRHA Baramulti 3rd Floor Jl Suryopranoto 2 Blok A/No 8A jakarta 10130', '', '21.088.356.7-029.000', 'PT', 'A', '(021) 63852863 ', '(021) 63852823', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(1000012, 'ASOKA PRAKARSA TUNGGAL MANDIRI, PT', 'Grand Ancol Center Blok B no 37, Jln RE Martadinata Jakarta Telp: (021) 6910749 Fax: (021) 6910742', '', '01.957.184.3-075.000', 'PT', 'A', '(021) 691-0749', '(021) 691-0742', '', 'aptm@centrin.net.id/erick@asokaptm.com', 'Erick', '08161422699', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(1000013, 'ASTRA GRAPHIA INFORMATION TECHNOLOGY', 'ANZ Tower 22nd Floor Jl. Jend Sudirman Kav 33A Jakarta 10220', '', '02.426.495.4-056.000', 'PT', 'A', '(021) 572-1177', '(021) 572-1170', '', 'denny.gunawan@ag-it.com', 'Denny Ardijat Gunawan', '0811199883', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(1000015, 'ADHIGUNA PUTRA cab MAKASSAR', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(1000016, 'ADHIGUNA PUTRA cab SAMPIT', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(1000017, 'ADHIGUNA PUTRA cab SURABAYA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(2000014, 'BAHARI SANDI PRATAMA, PT', 'Jl. MS Sutoyo S No 5 (Sei Kerokan) Banjarmasin  Telp : 0511-3359386', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(2000018, 'BASUNI, CV', 'Jl.Cempaka Besar Kaca Piring 1 No.05 ', '', '', 'CV', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(2000019, 'BENGKALIS DAYA SYARIKAT, PT', 'Gading Bukit Indah Blok D no 10 Kelapa Gading Barat Jakarta 14240', '', '02.906.630.5-006.000', 'PT', 'A', '(021) 46342531', '(021) 8350627', '', 'bengkalisds@gmail.com', 'Endang Jauhari', '081385397280', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(2000020, 'BENGKEL DALAM AIR', 'Jl. H.P.M Noor Rt 32 No 22 Banjarmasin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(2000021, 'BENGKEL ELECTRIC AAA', 'Jl. Sutoyo S komp. Imam Bonjol No 59 Rt 18 Rw 02 Teluk Dalam Banjarmasin ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(2000022, 'BERKAT ANUGERAH WIDJAJA, CV', 'Jl.Labu No.1 Jakarta Barat 11180 Telp.021-70073399 Fax.021-6251246', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(2000023, 'BINTANG SAMUDRA UTAMA, PT', 'Jl. Raya Merak KM 116 No 25 Tg Gerem-Merak, Banten 42438', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(2000024, 'BIRO KLASIFIKASI INDONESIA, PT', 'Jl. Skip Lama No 19 Banjarmasin 70117 (0511) 3350983 Fax: (0511) 3350175', '', '01.000.489.3-051.000', 'PT', 'A', '(0511) 335-0983', '(0511) 335-0175', '', '', 'Dadang', '085248519423', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(2000025, 'BORNEO SAMUDERA PERKASA, PT', 'Jl. Cempaka XIII No 6B Rt 7 Banjarmasin Telp: 0511-335 2328', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(2000026, 'BUDI MULYA, TK', 'Jl. Hasanudin HM no 26-28 Banjarmasin (0511) 3352991 Fax: (0511) 3352991', '', '', '', 'A', '(0511) 335-2991', '(0511) 335-2991', '', 'yennygunawan@rocketmail.com', 'Yenny', '0815248167878', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(2000027, 'BUNKER ENERGI SAMUDERA TRANS, PT', 'Jl. Fort Barat No 33 Keb Barat Tanjung Priok Jakarta Utara Telp : 021-43903243/9650 Fax: 021-4393-3153', '', '', 'PT', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(3000028, 'CAKRA BHUANA SURALAYA, PT', 'Gd. Gajah Unit ABC Lt. 3 Jl. Dr. Saharjo No 111 Jak Sel 12810 Telp: 021-83705654', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(3000029, 'CAKRAWALA MULTI PART,PT', 'Jl. A Yani Km 9 Kertak Hanyar Kab Banjar Kalsel', '', ' 21.051.195.2-431.000', '', '', '(0511) 428-1670', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(3000030, 'CARAKA GUNA, PT', 'jl.J.A.Yani NO:130 KM1,5 Banjarmasin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(3000031, 'CHANDRA TIRTA UTAMA MANDIRI, PT', 'Jl Kp Tendean No 174 RT 17 Lt II Banjarmasin Telp: (0511) 3268280 Fax: (0511) 3268174', '', '01.879.058.4-731.000', 'PT', 'A', '(0511) 326-8280', '(0511) 326-8174', '', 'sadpbjm@indo.net.id', 'Wiwin', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(3000032, 'CITRA SAMUDERA RAYA, PT', 'Gd Rifa Lt 2 Jl. Prof. Dr. Satria Blok C4 Kav 6-7 kuningan Jakarta 12950', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(4000033, 'DELTA POWER88', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(4000034, 'DEWA RUCI AGUNG, PT', 'Jl.Nilam Barat NO.20 A Surabaya 60165 Tlp.031-3291276 Fax.031.3291275', '', '21.051.195.2-431.000', 'PT', '', '(031) 329-1276', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(4000035, 'DUTABAHARI MENARA LINE, PT', 'Jl.K.P Tendean no.174 LT II RT 17 Banjarmasin-70231 tlp.0511-3261257', '', '21.051.195.2-431.000', 'PT', '', '(0511) 3261257', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(5000036, 'ELMER INTI UTAMA, CV', 'Jl Kebon kosong 1 No.14A Rt 015 Rw 01 Kemayoran JakPus 10630', '', '', 'CV', '', '', '', '', 'eltima12@gmail.com', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(7000037, 'GLOBAL TRANS ENERGY INTERNATIONAL, PT', 'Harmoni Building 1st Floor, Jl. Suryapranoto 2 blok A-8 Jak Pus 10130', '', '', '', '', '', '', '', '', 'Kevin', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(7000038, 'GOLDEN RAMA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(7000039, 'GROUP SELAM BANJAR RAYA', 'JL. IP. H. PM. NOOR, GANG 88 RT.32 NO. 22, BANJARMASIN', '', '', '', '', '', '', '', '', 'Marsyam', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(8000040, 'HAKA TECHNIK', 'Jl.Cempaka Raya No.107 Rt 22 Telaga Biru Banjarmasin Kalsel', '', '21.051.195.2-431.000', 'CV', '', '(0511) 442-1242', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(8000041, 'HALIM RAYA SAMUDRA, PT', 'Jl. AMD Projakal KM 5,5 RT. 31 Kariangau Trade Center No. 18 Balikpapan 76126-Kaltim Telp: (0542) 861843 Fax: (0542) 861653', '', '01.970.007.9-075.000', 'PT', 'A', '(0542) 861-843', '(0542) 861-653', '', 'irawan.adhiechandra@halimrayasamudra.com', 'Irawan', '0811531588', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(8000042, 'HELLADIUS MULYA HALIM, PT', 'Perkantoran Enggano Megah NO. 9Q Lantai 4 Tanjung Priok - Jakarta Utara Telp. 021 4301610', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(8000132, 'HASNUR INTERNATIONAL SHIPPING, PT', 'Jl. Senopati Raya No 8 Office Lt 7 Kebayoran Baru Jak Sel Telp : 021-536 2778', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(9000043, 'IMANI PRIMA, PT', 'Jl. Ampera Raya No.11 RT.001 RW.002 Ragunan Pasar Minggu Jakarta Selatan Telp : 021-7801848', '', '', 'PT', '', '021-7801848', '', '', 'Wahyun <wahyun@imaniprima.com>', 'Bp Wahyun', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(9000044, 'INDO DHARMA TRANSPORT, PT', 'Jl Jafri Zam Zam no 18/19 Rt 38 Telp: (0511) 442 4551 Fax: (0511) 442 4571', '', '', 'PT', 'A', '0511-4424551', '0511-4424571', '', 'idt-sudan@idt-shipping.co.id', 'Kurnia', '0811-505-337', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(9000045, 'INDO PRIMA SOLUSI, PT', 'Gd. Fortuna Lt 3 Jl. Mampang Prapatan No 96 Jaksel 12790', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(9000046, 'INTI GLOBAL SENTOSA, PT', 'Jl. Cempaka Raya no 91 Banjar Barat Banjarmasin 70119 Telp: (0511) 442 0747 Fax: (0511) 442 0747', '', '', 'CV', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(9000047, 'INTI GLOBAL SERVICES, CV', 'Jl. Cempaka Raya no 91 Banjar Barat Banjarmasin 70119 Telp: (0511) 442 0747 Fax: (0511) 442 0747', '', '02.941.673.2-731.000', 'CV', 'A', '(0511) 442-0747', '(0511) 442-0747', '', 'igs.borneo@gmail.com/ismu.globalgroup@..../pipit.globalgroup@....', 'Ismu Alam/Pipit Wijaya', '08125538908/08115010839', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(9000048, 'INTI UTAMA', 'Jl. Mawar Indah II no 3 Bekasi ', '', '02.379.824.2-086.000', 'CV', 'A', '(021) 425-2432', '(021) 425-2432', '', '', 'Merry', '(021) 3233-0701', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(10000049, 'JAYA MAKMUR, PD', 'Pertokoan Glodok Jaya Lt III Block A no 45-46 Jakarta Barat Telp :021-6200-0049 Fax : 021-6220-0207', '', '', '', 'A', '(021) 6220-0049', '(021) 6220-0207', '', '', 'Jack/Hendrik', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(10000050, 'JOTUN INDONESIA, PT', 'Kawasan Industri MM2100 Blok KK-1 Cikarang Barat Telp: (021) 89982657 Fax: (021) 89982658', '', '01.071.174.5-052.000', 'PT', 'A', '(021) 8998-2657', '(021) 8998-2658', '', 'csd.id@jotun.com/yurike.rumika@jotun.com', 'Yurike Rumika', '081908448902', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(11000051, 'KALIANDA GOLDEN BUNKER, PT', 'Jl Kp Tendean No 174 RT 17 Lt II Banjarmasin Telp: (0511) 3268280 Fax: (0511) 3268174', '', '02.303.401.0-731.000', 'PT', 'A', '(0511) 326-8280', '(0511) 326-8174', '', 'sadpbjm@indo.net.id/anief.farida@gmail.com', 'Anief', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(11000052, 'KARYA AMAL REKA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(11000053, 'KARYA INDAH TEKNIK, CV', 'Jl. Kuin Selatan No 19 Rt 02 Rw 06 Kuin Banjarmasin 70129 Telp: 0511-3350951', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(11000054, 'KARYA TEKNIK UTAMA, PT', 'Jl Kali Besar Barat no 37 Jakarta Barat 11230 Telp: (021) 6910382 Fax: (021) 6916268', '', '', 'PT', 'A', '(021) 691-0382', '(021) 691-6268', '', '', 'Ricky Sanjaya', '0816939595', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(11000055, 'KENCANA BAYU SEJAHTERA, PT', 'Jl. Laksamana Bintan Blok III no 46 Sei Panas Batam Telp: (0778) 452527 Fax: (0778) 452528', '', '', 'PT', 'A', '(0778) 452-527', '(0778) 452-528', '', '', 'Slamet', '0811698556', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(11000056, 'KOPERASI BANDAR BARITO', 'Kantor Adpel Kelas I BJM, Jl Pel I Trisakti BJM Telp: (0511) 3352640', '', '', 'PT', 'A', '(0511) 335-2640', '', '', '', 'Mustakim', '', '', '', '', '', '', 15, '', '', '', '', '', '', 1),
(12000057, 'LAMBANG JAYA BARITO, PT', 'JL. KP Tandean no 78 Banjarmasin ', '', '01.424.615.1-731.000', 'PT', 'A', '(0511) 325-1744/5', '(0511) 327-4215', '', '', 'Hotman Manurung', '0811511869', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(12000058, 'LANDASINDO SAHU BARUNA JAYA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(13000059, 'MARINA JAYA ELECTRONIC, CV', 'Komp. Mutiara Jl. Sutoyo S rt 21 Rw 02 No 9b Telaga Biru Banjarmasin 70119 Telp: 0813 4806 3354', '', '', 'CV', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(13000060, 'MARINE TEKNIK ELECTRIC', 'Jl. Garuda II Blok VIIb no 23 Perumnas Bumi Lingkar Basirih Banjarmasin Kalsel 70246', '', '03.063.129.5-731.000', 'CV', 'A', '(0511) 4225-262', '(0511) 7105-879', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(13000061, 'MARITEL BAHTERA ABADI', 'Jl. Untung Surapati Perum Carpotex Blok SS no 13 S Kunjang Samarinda Kaltim', '', '03.072.763.0-722.000', 'PT', 'A', '(0541) 274-159', '(0541) 271-607', '', 'herni.widiyastuti@maritel.co.id', 'Herni Widiastuti', '08125825218', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(13000062, 'MARITIME POWER', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(13000063, 'MASADA JAYA LINES, PT', 'Jl. KP Tendean No 174 Banjarmasin 70231', '', '02.303.501.7-731.000', 'PT', 'A', '(0511) 326-1257', '(0511) 326-1267', '', 'rachmat.masada@gmail.com / lina@masada.com / adm@...', 'Rachmat/Lina/Rahma', '081351555792/081251101099/05116470654', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(13000064, 'MAYOGA MARINE ENGINEERING, CV', 'Jl. Barito Hulu no 19 Banjarmasin Kalimantan Selatan ', '', '02.941.505.6-731.000', 'CV', 'A', '(0511) 763-6343', '(0511) 330-6812', '', 'mayoga_batam@yahoo.co.id', 'Joko Listyanto', '081349673700', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(13000065, 'MEGA MITRA JAYA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(13000066, 'MENARA AGUNG, CV', 'Jl. Perdagangan Komplek Bumi Indah Lestari II Jalur IV No.110 Telp : 0511 - 7434790 / 4316091', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(13000067, 'MERANTI NUSA BAHARI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(13000068, 'MULTI GUNA MARITIM', '', '', '', 'PT', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(13000069, 'MULTICO MILLENIUM PERSADA, PT', 'Jl. Kelapa Gading Boulevard Blok DB1/no 1 Kelapa Gading Permai. Jakarta Utara 14240 Telp: 021-453-0332 Fax : 021-4585-5095', '', '01.823.648.9-059.000', 'PT', 'A', '(021) 453-0332', '(021) 4585-5095', '', 'multicojakarta@mmp.multico.co.id / haryono-hs@....', 'Haryono/Stefano', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(14000070, 'NIPPON KAIJI KYOKAI INDONESIA', 'Menara Cakrawala 17th Floor Jl. MH Thamrin no 9 Jakarta 10340', '', '01.957.912.7-058.000', 'PT', 'A', '(021) 314-2138', '(021) 310-2012', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(14000071, 'NURINDA TRAVEL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(16000072, 'PANCA PRIMA PRAKARSA, PT', 'Perumnas Semayap Blok B No 40 Rt 14/02 P. Laut Utara Kotabaru 72117', '', '', 'PT', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000073, 'PANCA TUNGGAL ABADI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000074, 'PANCARAN HALUAN SAMUDERA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000075, 'PATRIA MARITIM PERKASA, PT', 'Kav 20 Dapur 12 Sungai Lekop Sagulung batam Telp: 0778 7367111 Fax: 0778 7367112', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000076, 'PATRIA MARITIME INDUSTRY, PT', 'Jl. Jababeka XI Blok H30-40 Kawasan Industri Cikarang Bekasi 17530', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(16000077, 'PELANGI DWI WARNA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(16000078, 'PELAYARAN DUTABAHARI MENARA LINE, PT', 'Jl. KP Tendean No 174 Lt II Rt 17 Banjarmasin Telp: 0511-3261257', '', '', 'PT', '', '-511', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000079, 'PELAYARAN JASA SAMUDERA SHIPPING, PT', 'Jl Gatot Subroto No 14B Pekanbaru ', '', '02.201.359.3-218.000', 'PT', 'A', '(0761) 36-900', ' (0761) 25-611', '', 'jasa.samudera@gmail.com/ptjssconfi@.../doc.pjss@gmail.com', 'Yulianti/Yoan/Asmah', '082172488012', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000080, 'PELAYARAN NASIONAL TANJUNGRIAU SERVIS, PT', 'Wisma Pdk Indah 2 Lt. 2 Suite 201 Jl. Sultan Iskandar Muda Kav V-TA Kebayoran Lama Jak-Sel 12310 ', '', '080.000.100.0-000.056', 'PT', 'A', '(021) 769-7464', '(021) 769-7462', '', 'priyono@thisisnoble.com / morrison@pinangcoal.com', 'Priyono/Morison', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(16000081, 'PELAYARAN NUSA TENGGARA cab KUPANG', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000082, 'PELAYARAN SAYUSAN BAHARI, PT', 'Jl. Rawamangun VIII no 18 Rawa Badak Jakarta Utara Telp: (021) 4373103', '', '', 'PT', 'A', '(021)4373103', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000083, 'PELITA BATULICIN BERSUJUD', 'Jl. Transmigrasi Gg. Sabar Subut No 137-139 Rt02 Kel Baroqah Simpang Empat Tanah Bumbu 72171', '', '02.243.255.5-734.000', 'PT', 'A', '(0518) 71981', '(0518) 75241', '', 'mba_pbb@yahoo.co.id / marketing@pbb-shipping.com', 'Darmawi/Myla', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(16000084, 'PELITA SAMUDERA SHIPPING, PT', 'Menara Citicon.Lt.19 jl.Letjen.S.Parman kav 72 Jakarta 11410', '', '21.051.195.2.431.000', 'PT', '', '(021) 2930-8801', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(16000085, 'PELNI CABANG KUMAI/PANGKALAN BUN, PT', 'Jl. Sudirman SH No. 16 Pangkalan bun Kalteng 74111 Telp: (0532) 24420 Fax: (0532) 24073', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000086, 'PELNI CABANG SAMPIT, PT', 'Jl. Ahmad Yani No 70 Sampit Telp: (0531) 22006 Fax: (0531) 24502', '', '', 'PT', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000087, 'PELNI SHIPPING AGENCIES', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000088, 'PERKASA SULU GEMILANG', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(16000089, 'PETRO ANUGERAH SEMESTA', 'Komp. Center Park Blok I no 17 Batam', '', '', 'CV', 'A', '(0778) 783-3855', '(0778) 460-855', '', '', 'Evaliana', '(0778) 783-3855', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(16000090, 'PRIMA KARYA MARITIM', 'Jl. Cempaka Sari III Jalur 1 Rt 38 No 25 Basirih Banjarmasin  ', '', '01.463.445.5-731.000', 'PT', 'A', '(0511) 442-5358', '(0511) 442-5358', '', 'pkm.pelayaran@yahoo.com', 'Ali Sobhirin', '08115009489 / 085387935533', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(16000091, 'PRIMA MANDIRI LINES, PT', 'Jl. Achmad Yani Km 11, Komp Pesona Modern Blok D/7 Banjarmasin Kalimantan Selatan', '', '03.062.669.1-731.000', 'PT', 'A', '(0511) 7222-2338', '', '', 'primamandirilines@gmail.com / rois_pml@ymail.com', 'M Rois', '081351333944/085272067062', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000092, 'PRIMA NUSANTARA LOGISTIK, PT', 'Graha Arteri Mas Kav.49 Jl. Raya Panjang no 68 Kedoya JakBar Telp: 021 5830 4588', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000093, 'PT UNITED TRACTORS Tbk', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(16000094, 'PUGE cab BANTEN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000131, 'PEL. MITRABAHARI SENTOSA, PT', 'Jl. Telaga Biru Trisakti Banjarmasin 70245 Telp : 0511-442 0839', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(16000133, 'POOL SAMUDERA ENERGY, PT', 'Jl. Plumpang B/1 Rt 007/05 Rawabadak Selatan Koja, Jak Ut Telp : 021- 439 31492', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(18000095, 'RACHMAT, CV', 'Jl. Kuin Selatan Rt10 No 103 Banjarmasin ', '', '01.585.434.2-731.000', 'CV', 'A', '(0511) 3354507', '(0511) 3354507', '', 'rahmat_cv@yahoo.co.id', 'Haji Juandi / Elly', '0811518484', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(18000096, 'RADITYA TEKNIK, CV', 'Komp Mantuil Raya Blok I No 79 Rt 30 Banjarmasin Telp: 0511-7552284', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(18000097, 'REDFORD MARITIME Pte.Ltd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(18000098, 'RINA INDONESIA, PT', 'Midplaza 2 17th Floor  Jl. Jend Sudirman Kav 10-11 Jakarta 10220 ', '', '', 'PT', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(19000099, 'SAGAMAS ASIA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(19000100, 'SAHUINDO MARINO JAYA, PT', 'Jl. Pasar Kembang 23 Surabaya 60263 Telp : 031-5467848/Fax : 031-5453059', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(19000101, 'SAMUDERA BAHARI, PT', 'Jl. Dayung Terusan No 8A Rt 001 Rw 01  Kel. Rawa Badak Utara Kec. Koja Jakarta Utara', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(19000102, 'SAMUGARA ARTA JAYA', '', '', '', 'PT', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(19000103, 'SAMURA RAYA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(19000104, 'SANDFIRDEN TECHNICS', '1779 GS Den Oever Holland', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(19000105, 'SARANA LINTAS BAHARI, PT', 'Jl. Raya Surabaya - Situbondo Km 140, Ds Krajan Rt 006 Rw 003 Bhinor Paiton, Probolinggo Telp: 0335-774412', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(19000106, 'SATU TUJUH MANDIRI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(19000107, 'SCHOTTEL FAR EAST PTE. LTD', '23 Gul Drive Singapore 629471', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(19000108, 'SEJAHTERA UD', 'Jl. Veteran Soetoyo S no 76 Banjarmasin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(19000109, 'SINAR ABADI PRIMA, PT', 'Jl. H Hasan Basri No 29B Banjarmasin Kalimantan Selatan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(19000110, 'SIRIUS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(19000111, 'SISFO INDONESIA', 'Perkantoran Grand Bintaro Blok A9,Jl Bintaro Permai Raya Kav 1 Pesanggrahan Jakarta 12330', '', '', 'PT', 'A', '(021) 7388-5285', '(021) 7388-0387', '', '', 'Adi Prakooso', '081398660688', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(19000112, 'STARINDO CAPRICORN SHIPPING Pte.Ltd.', 'No 6 Eu Tong Sen Street,#12-11 Singapore 059817 ', '', '', '', 'A', '(65) 6227-7705', '(65) 6227-7706', '', '', 'Joy Stephany Lau', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(19000113, 'SUCOFINDO', 'Jl. A Yani Km 7, 800 No 21A Banjarmasin Kalsel Telp: 0511-3271091', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(19000114, 'SUFIE BAHARI LINES, PT', 'Jl. Bendahara Komp. Pelabuhan Panglima Utara Kumai Telp: 0532 62138', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(19000115, 'SURYA INDAH JAYA, PT', 'Sungai Mahakam Jl. Mangkupalas Samarinda Kaltim Telp : 0541-260607', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(20000116, 'TELADAN MAKMUR JAYA, PT', 'Jl.HKSN no.1 Rt.08 Banjarmasin', '', '21.051.195.2-431.000', 'PT', '', '(0511) 431-3228', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(20000117, 'TENAGA SATU TUJUH, PT', 'Komp Bunyamin Permai I Raya III blok B No 146 Banjarmasin 70654', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(20000118, 'TIGA PUTRI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(20000119, 'TONASA LINES', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(20000120, 'TRAKTOR NUSANTARA, PT', 'Jl. A. Yani Km 11,4 Gambut Banjarmasin 70652 Telp: 0511-4220330', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(20000121, 'TRANS ENERGY INDONESIA, PT', 'Jl. Brigjen H. Hasan Basri Rt 20 No 30B Banjarmasin Telp: 0511- 3300482', '', '', 'PT', 'A', '(0511) 330-0482', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(20000122, 'TRANS PASIFIC JAYA, PT', 'Menara gracia lt08 Jl. Rasuna said kav C07 jakarta ', '', '02.433.160.5-011.000', 'PT', 'P', '(021) 520-8386', '(021) 526-0303', '', '', 'Priyono', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(20000123, 'TRIKARYA ALAM', 'Bintang Industrial Park II Lot B 601 Tanjung Uncang Batam 39421 Telp: 0778-395155/395255', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(22000124, 'VARIA USAHA LINTAS SEGARA', 'Jl. Veteran no 171A Gresik 61123 Jawa Timur ', '', '01.721.918.9-641.000', 'PT', 'A', '(031) 397-8204', '(031) 397-5280', '', 'vuls@variausaha.com / enirovita@variausaha.com', 'Eni', '085732910777', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(22000125, 'VINICI INTI LINES cab PAITON', 'Jl. Bali no 3 Pelabuhan Cirebon Indonesia', '', '01.983.342.5-426.001', 'PT', 'A', '(0231) 209-491', '(0231) 209-432', '', 'vilcirebon@gmail.com / ekavinici@gmail.com', 'Eka Priyatna', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(22000126, 'VINICI INTI LINES cab CILEGON', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(22000127, 'VINICI INTI LINES cab JAKARTA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 14, '', '', '', '', '', '', 1),
(23000128, 'WAHANA YASA INTERNATIONAL SHIPPING, PT', 'Harmony Building 4st Floor Blok A-8 Jl. Suryopranoto 2 JakPus 10130', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1),
(23000129, 'WARNA TANJUNG RAYA, PT', 'Jl. Haryono MT no 12-14 Rt 06 Banjarmasin Telp: 0511-3362552 Fax: 0511-4369920', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '', '', '', '', '', '', 1),
(23000130, 'WIYONO PARTNERSHIP', 'Cyber 2 Tower 7th Floor, Jl. HR Rasuna Said Blok X-5 Kav 13 Jakarta 12950 Telp : 021 290 212 88', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_bank_acc`
--

CREATE TABLE IF NOT EXISTS `vendor_bank_acc` (
  `id_vendor_bank_acc` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vendor` int(11) NOT NULL,
  `BankName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BranchAddress` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `BankCity` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `AccountNumber` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `Currency` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `id_currency` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_vendor_bank_acc`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_category`
--

CREATE TABLE IF NOT EXISTS `vendor_category` (
  `id_vendor_category` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vendor` int(11) NOT NULL,
  `id_po_category` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id_vendor_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=310 ;

--
-- Dumping data untuk tabel `vendor_category`
--

INSERT INTO `vendor_category` (`id_vendor_category`, `id_vendor`, `id_po_category`, `description`) VALUES
(1, 1000001, 10100, ''),
(2, 1000002, 20000, ''),
(3, 1000003, 20000, ''),
(4, 1000004, 20000, ''),
(5, 1000015, 20101, ''),
(6, 1000015, 20102, ''),
(7, 1000016, 20101, ''),
(8, 1000016, 20102, ''),
(9, 1000017, 20101, ''),
(10, 1000017, 20102, ''),
(11, 1000005, 20400, ''),
(12, 1000006, 10401, ''),
(13, 1000006, 10402, ''),
(14, 1000006, 10403, ''),
(15, 1000007, 20101, ''),
(16, 1000007, 20102, ''),
(17, 1000007, 20201, ''),
(18, 1000007, 20202, ''),
(19, 1000007, 20203, ''),
(20, 1000007, 20204, ''),
(21, 1000007, 20205, ''),
(22, 1000007, 20300, ''),
(23, 1000007, 20400, ''),
(24, 1000007, 20500, ''),
(25, 1000007, 20600, ''),
(26, 1000007, 20700, ''),
(27, 1000007, 20800, ''),
(28, 1000007, 20900, ''),
(29, 1000007, 21000, ''),
(30, 1000007, 21100, ''),
(31, 1000007, 21200, ''),
(32, 1000008, 30400, ''),
(33, 1000009, 20201, ''),
(34, 1000009, 20202, ''),
(35, 1000009, 20203, ''),
(36, 1000009, 20204, ''),
(37, 1000009, 20205, ''),
(38, 1000010, 10401, ''),
(39, 1000010, 10402, ''),
(40, 1000010, 10403, ''),
(41, 1000011, 30400, ''),
(42, 1000012, 10401, ''),
(43, 1000012, 10402, ''),
(44, 1000012, 10403, ''),
(45, 1000013, 10302, ''),
(46, 1000013, 10401, ''),
(47, 1000013, 10402, ''),
(48, 1000013, 10403, ''),
(49, 2000014, 20101, ''),
(50, 2000014, 20102, ''),
(51, 2000018, 10200, ''),
(52, 2000019, 30100, ''),
(53, 2000020, 20400, ''),
(54, 2000021, 20400, ''),
(55, 2000022, 10401, ''),
(56, 2000022, 10402, ''),
(57, 2000022, 10403, ''),
(58, 2000023, 0, ''),
(59, 2000024, 20201, ''),
(60, 2000024, 20202, ''),
(61, 2000024, 20203, ''),
(62, 2000024, 20204, ''),
(63, 2000024, 20205, ''),
(64, 2000025, 30100, ''),
(65, 2000026, 10401, ''),
(66, 2000026, 10402, ''),
(67, 2000026, 10403, ''),
(68, 2000027, 10100, ''),
(69, 3000028, 20201, ''),
(70, 3000028, 20202, ''),
(71, 3000028, 20203, ''),
(72, 3000028, 20204, ''),
(73, 3000028, 20205, ''),
(74, 3000029, 10401, ''),
(75, 3000029, 10402, ''),
(76, 3000029, 10403, ''),
(77, 3000030, 10401, ''),
(78, 3000030, 10402, ''),
(79, 3000030, 10403, ''),
(80, 3000031, 10200, ''),
(81, 3000032, 30200, ''),
(82, 4000033, 10401, ''),
(83, 4000033, 10402, ''),
(84, 4000033, 10403, ''),
(85, 4000034, 20201, ''),
(86, 4000034, 20202, ''),
(87, 4000034, 20203, ''),
(88, 4000034, 20204, ''),
(89, 4000034, 20205, ''),
(90, 4000035, 0, ''),
(91, 5000036, 10401, ''),
(92, 5000036, 10402, ''),
(93, 5000036, 10403, ''),
(94, 7000037, 30200, ''),
(95, 7000038, 20201, ''),
(96, 7000038, 20202, ''),
(97, 7000038, 20203, ''),
(98, 7000038, 20204, ''),
(99, 7000038, 20205, ''),
(100, 7000039, 20400, ''),
(101, 8000040, 20400, ''),
(102, 8000041, 10401, ''),
(103, 8000041, 10402, ''),
(104, 8000041, 10403, ''),
(105, 8000132, 30200, ''),
(106, 8000042, 20101, ''),
(107, 8000042, 20102, ''),
(108, 9000043, 10302, ''),
(109, 9000043, 10401, ''),
(110, 9000043, 10402, ''),
(111, 9000043, 10403, ''),
(112, 9000044, 20101, ''),
(113, 9000044, 20102, ''),
(114, 9000045, 20201, ''),
(115, 9000045, 20202, ''),
(116, 9000045, 20203, ''),
(117, 9000045, 20204, ''),
(118, 9000045, 20205, ''),
(119, 9000046, 20400, ''),
(120, 9000046, 10401, ''),
(121, 9000046, 10402, ''),
(122, 9000046, 10403, ''),
(123, 9000047, 0, ''),
(124, 9000048, 0, ''),
(125, 10000049, 10401, ''),
(126, 10000049, 10402, ''),
(127, 10000049, 10403, ''),
(128, 10000050, 10401, ''),
(129, 10000050, 10402, ''),
(130, 10000050, 10403, ''),
(131, 11000051, 10100, ''),
(132, 11000052, 20201, ''),
(133, 11000052, 20202, ''),
(134, 11000052, 20203, ''),
(135, 11000052, 20204, ''),
(136, 11000052, 20205, ''),
(137, 11000053, 20400, ''),
(138, 11000054, 10301, ''),
(139, 11000055, 20101, ''),
(140, 11000055, 20102, ''),
(141, 11000056, 20300, ''),
(142, 12000057, 30400, ''),
(143, 12000058, 10100, ''),
(144, 13000059, 20400, ''),
(145, 13000060, 20400, ''),
(146, 13000061, 20101, ''),
(147, 13000061, 20102, ''),
(148, 13000062, 30200, ''),
(149, 13000063, 30100, ''),
(150, 13000063, 20101, ''),
(151, 13000063, 20102, ''),
(152, 13000064, 20400, ''),
(153, 13000065, 10401, ''),
(154, 13000065, 10402, ''),
(155, 13000065, 10403, ''),
(156, 13000066, 20400, ''),
(157, 13000067, 10301, ''),
(158, 13000068, 30400, ''),
(159, 13000069, 20400, ''),
(160, 13000069, 10401, ''),
(161, 13000069, 10402, ''),
(162, 13000069, 10403, ''),
(163, 14000070, 20201, ''),
(164, 14000070, 20202, ''),
(165, 14000070, 20203, ''),
(166, 14000070, 20204, ''),
(167, 14000070, 20205, ''),
(168, 14000071, 20201, ''),
(169, 14000071, 20202, ''),
(170, 14000071, 20203, ''),
(171, 14000071, 20204, ''),
(172, 14000071, 20205, ''),
(173, 16000072, 20101, ''),
(174, 16000072, 20102, ''),
(175, 16000073, 0, ''),
(176, 16000074, 30200, ''),
(177, 16000075, 20400, ''),
(178, 16000075, 10301, ''),
(179, 16000075, 10302, ''),
(180, 16000076, 20400, ''),
(181, 16000076, 10401, ''),
(182, 16000076, 10402, ''),
(183, 16000076, 10403, ''),
(184, 16000131, 30200, ''),
(185, 16000077, 10302, ''),
(186, 16000077, 10401, ''),
(187, 16000077, 10402, ''),
(188, 16000077, 10403, ''),
(189, 16000078, 30200, ''),
(190, 16000079, 30100, ''),
(191, 16000080, 30200, ''),
(192, 16000080, 30400, ''),
(193, 16000081, 20101, ''),
(194, 16000081, 20102, ''),
(195, 16000082, 20201, ''),
(196, 16000082, 20202, ''),
(197, 16000082, 20203, ''),
(198, 16000082, 20204, ''),
(199, 16000082, 20205, ''),
(200, 16000083, 0, ''),
(201, 16000084, 30200, ''),
(202, 16000085, 20101, ''),
(203, 16000085, 20102, ''),
(204, 16000086, 20101, ''),
(205, 16000086, 20102, ''),
(206, 16000087, 20101, ''),
(207, 16000087, 20102, ''),
(208, 16000088, 0, ''),
(209, 16000089, 20101, ''),
(210, 16000089, 20102, ''),
(211, 16000133, 10100, ''),
(212, 16000090, 10401, ''),
(213, 16000090, 10402, ''),
(214, 16000090, 10403, ''),
(215, 16000091, 30100, ''),
(216, 16000091, 30200, ''),
(217, 16000092, 20101, ''),
(218, 16000093, 10401, ''),
(219, 16000093, 10402, ''),
(220, 16000093, 10403, ''),
(221, 16000094, 20101, ''),
(222, 16000094, 20102, ''),
(223, 18000095, 10401, ''),
(224, 18000095, 10402, ''),
(225, 18000095, 10403, ''),
(226, 18000096, 20400, ''),
(227, 18000097, 10301, ''),
(228, 18000098, 20201, ''),
(229, 18000098, 20202, ''),
(230, 18000098, 20203, ''),
(231, 18000098, 20204, ''),
(232, 18000098, 20205, ''),
(233, 19000099, 0, ''),
(234, 19000100, 30100, ''),
(235, 19000101, 20300, ''),
(236, 19000101, 20201, ''),
(237, 19000101, 20202, ''),
(238, 19000101, 20203, ''),
(239, 19000101, 20204, ''),
(240, 19000101, 20205, ''),
(241, 19000102, 10100, ''),
(242, 19000103, 20101, ''),
(243, 19000103, 20102, ''),
(244, 19000104, 20201, ''),
(245, 19000104, 20202, ''),
(246, 19000104, 20203, ''),
(247, 19000104, 20204, ''),
(248, 19000104, 20205, ''),
(249, 19000105, 20101, ''),
(250, 19000105, 20102, ''),
(251, 19000106, 0, ''),
(252, 19000107, 20201, ''),
(253, 19000107, 20202, ''),
(254, 19000107, 20203, ''),
(255, 19000107, 20204, ''),
(256, 19000107, 20205, ''),
(257, 19000108, 10401, ''),
(258, 19000108, 10402, ''),
(259, 19000108, 10403, ''),
(260, 19000109, 10401, ''),
(261, 19000109, 10402, ''),
(262, 19000109, 10403, ''),
(263, 19000110, 20201, ''),
(264, 19000110, 20202, ''),
(265, 19000110, 20203, ''),
(266, 19000110, 20204, ''),
(267, 19000110, 20205, ''),
(268, 19000111, 10302, ''),
(269, 19000111, 10401, ''),
(270, 19000111, 10402, ''),
(271, 19000111, 10403, ''),
(272, 19000112, 10301, ''),
(273, 19000113, 20201, ''),
(274, 19000113, 20202, ''),
(275, 19000113, 20203, ''),
(276, 19000113, 20204, ''),
(277, 19000113, 20205, ''),
(278, 19000114, 20101, ''),
(279, 19000114, 20101, ''),
(280, 19000115, 30100, ''),
(281, 20000116, 10100, ''),
(282, 20000117, 30400, ''),
(283, 20000118, 10200, ''),
(284, 20000119, 20101, ''),
(285, 20000119, 20102, ''),
(286, 20000120, 10401, ''),
(287, 20000120, 10402, ''),
(288, 20000120, 10403, ''),
(289, 20000121, 20101, ''),
(290, 20000121, 20102, ''),
(291, 20000122, 30200, ''),
(292, 20000123, 10301, ''),
(293, 22000124, 20101, ''),
(294, 22000124, 20102, ''),
(295, 22000126, 20101, ''),
(296, 22000126, 20102, ''),
(297, 22000127, 20101, ''),
(298, 22000127, 20102, ''),
(299, 22000125, 20101, ''),
(300, 22000125, 20102, ''),
(301, 23000128, 30200, ''),
(302, 23000129, 10401, ''),
(303, 23000129, 10402, ''),
(304, 23000129, 10403, ''),
(305, 23000130, 20201, ''),
(306, 23000130, 20202, ''),
(307, 23000130, 20203, ''),
(308, 23000130, 20204, ''),
(309, 23000130, 20205, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_classification`
--

CREATE TABLE IF NOT EXISTS `vendor_classification` (
  `id_vendor_classification` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendor` int(11) NOT NULL,
  `type` set('AGENCY','PRODUCT') NOT NULL,
  PRIMARY KEY (`id_vendor_classification`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `vendor_classification`
--

INSERT INTO `vendor_classification` (`id_vendor_classification`, `id_vendor`, `type`) VALUES
(1, 1000001, 'AGENCY'),
(2, 1000002, 'PRODUCT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel`
--

CREATE TABLE IF NOT EXISTS `vessel` (
  `id_vessel` int(11) NOT NULL AUTO_INCREMENT,
  `VesselName` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Status` set('OWN','TC','SPOT','ANCHOR','FUEL','UNSET') COLLATE latin1_general_ci NOT NULL,
  `StatusRent` set('ON-HIRED','OFF-HIRED','RUNNING') COLLATE latin1_general_ci NOT NULL,
  `VesselType` set('TUG','BARGE','TRANSLOADER') COLLATE latin1_general_ci NOT NULL,
  `BargeSize` int(11) NOT NULL COMMENT 'ft',
  `Capacity` int(11) NOT NULL COMMENT 'MT',
  `Power` int(11) NOT NULL COMMENT 'hp',
  `VesselDate` date NOT NULL,
  `IsActive` int(1) NOT NULL DEFAULT '1',
  `foto_vessel` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `RunningHour` int(11) NOT NULL,
  `LastDateMaintenance` date NOT NULL,
  `LastRHMaintenance` int(11) NOT NULL,
  `inventoryid` int(11) NOT NULL DEFAULT '0',
  `BuyingPrice` double NOT NULL,
  `BuyingDate` date NOT NULL,
  `CurrentPrice` double NOT NULL,
  `VesselChecklist` text COLLATE latin1_general_ci NOT NULL,
  `IsCrewComplete` int(1) NOT NULL,
  `IsDocumentComplete` int(1) NOT NULL,
  `LastROBValue` double(20,2) NOT NULL,
  `LastROBDate` datetime NOT NULL,
  `NumberOfDamage` int(11) NOT NULL,
  `LastDateofDamage` date NOT NULL,
  `NumberOfFinding` int(11) NOT NULL,
  `LastDateofFinding` date NOT NULL,
  PRIMARY KEY (`id_vessel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=76872703 ;

--
-- Dumping data untuk tabel `vessel`
--

INSERT INTO `vessel` (`id_vessel`, `VesselName`, `Status`, `StatusRent`, `VesselType`, `BargeSize`, `Capacity`, `Power`, `VesselDate`, `IsActive`, `foto_vessel`, `RunningHour`, `LastDateMaintenance`, `LastRHMaintenance`, `inventoryid`, `BuyingPrice`, `BuyingDate`, `CurrentPrice`, `VesselChecklist`, `IsCrewComplete`, `IsDocumentComplete`, `LastROBValue`, `LastROBDate`, `NumberOfDamage`, `LastDateofDamage`, `NumberOfFinding`, `LastDateofFinding`) VALUES
(1111111, 'Patria Galaxy', 'OWN', 'RUNNING', 'BARGE', 0, 0, 0, '2015-01-01', 1, '', 2628, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1601001, 'ADARA', 'OWN', 'RUNNING', 'BARGE', 240, 3600, 0, '2012-03-18', 1, '', 21, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1601003, 'ALHENA', 'OWN', 'RUNNING', 'BARGE', 240, 3600, 0, '2012-03-18', 1, '', 23, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1601004, 'ALMAK', 'OWN', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-07-04', 1, '', 277, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1601005, 'ALYA', 'OWN', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 22, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1601006, 'ARGO', 'OWN', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-07-04', 1, '', 278, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1601007, 'AURA', 'OWN', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 20, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1601008, 'AURIGA', 'OWN', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 19, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1610102, 'AIN', 'OWN', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-07-04', 1, '', 273, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1615005, 'INTAN KELANA 5', 'OWN', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-07-25', 1, '', 462, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1615009, 'INTAN KELANA 9', 'OWN', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-07-25', 1, '', 463, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1710006, 'INTAN MEGAH 06', 'OWN', 'RUNNING', 'TUG', 0, 0, 0, '2012-08-31', 1, '', 608, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 2750.00, '2015-02-03 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1710009, 'INTAN MEGAH 9', 'OWN', 'RUNNING', 'TUG', 0, 0, 0, '2012-07-25', 1, '', 464, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1710014, 'INTAN MEGAH 14', 'OWN', 'RUNNING', 'TUG', 0, 0, 0, '2012-08-31', 1, '', 609, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1710022, 'INTAN MEGAH 22', 'OWN', 'RUNNING', 'TUG', 0, 0, 0, '2012-08-31', 1, '', 610, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1760002, 'GONAYA II', 'OWN', 'RUNNING', 'TUG', 0, 0, 0, '2012-08-31', 1, '', 611, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770001, 'PATRIA 1', 'OWN', 'RUNNING', 'TUG', 0, 0, 2200, '2012-03-18', 1, '', 14, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 6500.00, '2015-01-31 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770002, 'PATRIA 2', 'OWN', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 15, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770003, 'PATRIA 3', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2012-03-18', 1, '', 16, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770004, 'PATRIA 4', 'OWN', 'RUNNING', 'TUG', 0, 0, 2200, '2012-03-18', 1, '', 17, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770005, 'PATRIA 5', 'OWN', 'RUNNING', 'TUG', 0, 0, 1000, '2012-03-18', 1, '', 18, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770006, 'PATRIA 6', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2012-03-18', 1, '', 51, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770007, 'PATRIA 7', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2012-07-04', 1, '', 260, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 5600.00, '2015-02-04 15:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770008, 'PATRIA 8', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2012-07-04', 1, '', 261, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770009, 'PATRIA 9', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2012-07-04', 1, '', 262, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770010, 'PATRIA 10', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2012-07-03', 1, '', 259, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770011, 'PATRIA 11', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2012-07-04', 1, '', 263, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1770012, 'PATRIA 12', 'OWN', 'RUNNING', 'TUG', 0, 0, 0, '2012-07-04', 1, '', 264, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1790001, 'Anchor Handling System', 'ANCHOR', 'RUNNING', 'TUG', 300, 0, 9000, '2012-04-17', 1, '', 76, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1790999, 'FUEL-001', 'FUEL', 'RUNNING', 'TUG', 100, 0, 100, '2012-08-30', 1, '', 601, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802001, 'BRAHMA 1', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2608, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802002, 'BRAHMA 2', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2609, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802003, 'BRAHMA 3', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2610, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802005, 'BRAHMA 5', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2611, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802006, 'BRAHMA 6', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2612, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802007, 'BRAHMA 7', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2613, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802008, 'BRAHMA 8', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2614, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802009, 'BRAHMA 9', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2615, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802010, 'BRAHMA 10', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2616, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 4000.00, '2015-02-05 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1802011, 'BRAHMA 11', 'OWN', 'RUNNING', 'TUG', 0, 0, 1600, '2015-01-01', 1, '', 2617, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903001, 'ANAND 1', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2618, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903002, 'ANAND 2', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2619, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903003, 'ANAND 3', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2620, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903005, 'ANAND 5', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2621, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903006, 'ANAND 6', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2622, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903007, 'ANAND 7', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2623, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903008, 'ANAND 8', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2624, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903009, 'ANAND 9', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2625, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903010, 'ANAND 10', 'OWN', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2626, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(1903011, 'ANAND 11', 'TC', 'RUNNING', 'BARGE', 320, 9000, 0, '2015-01-01', 1, '', 2627, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5615011, 'INTAN KELANA 11', 'SPOT', 'RUNNING', 'BARGE', 300, 0, 0, '2012-08-31', 1, '', 615, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5615012, 'INTAN KELANA 12', 'SPOT', 'RUNNING', 'BARGE', 300, 0, 0, '2012-05-01', 1, '', 256, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5615017, 'INTAN KELANA 17', 'SPOT', 'RUNNING', 'BARGE', 300, 0, 0, '2012-08-31', 1, '', 612, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5615018, 'INTAN KELANA 18', 'SPOT', 'RUNNING', 'BARGE', 300, 0, 0, '2012-08-31', 1, '', 613, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5615027, 'INTAN KELANA 27', 'SPOT', 'RUNNING', 'BARGE', 300, 0, 0, '2012-08-31', 1, '', 614, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5634327, 'GOLD TRANS 327', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-05-01', 1, '', 253, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5635852, 'PEC 852', 'SPOT', 'RUNNING', 'BARGE', 350, 8900, 0, '2012-03-18', 1, '', 53, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5645010, 'MASADA 10', 'SPOT', 'RUNNING', 'BARGE', 310, 8000, 0, '2012-08-31', 1, '', 616, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5645016, 'MASADA 16', 'SPOT', 'RUNNING', 'BARGE', 310, 8000, 0, '2012-05-01', 1, '', 254, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5645017, 'MASADA 16', 'SPOT', 'RUNNING', 'BARGE', 310, 8000, 0, '2012-08-31', 1, '', 617, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5653153, 'BAL 153', 'SPOT', 'RUNNING', 'BARGE', 330, 8900, 0, '2012-03-18', 1, '', 55, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5656002, 'TERANG 02', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 61, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5656006, 'TERANG 06', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 57, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5656305, 'TERANG 305', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 65, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5656310, 'TERANG 310', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 7500, '2012-03-18', 1, '', 71, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5656311, 'TERANG 311', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-05-01', 1, '', 251, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5656315, 'TERANG 315', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 69, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5657002, 'PELITA 02', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 67, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5657006, 'PELITA 06', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 59, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5709001, 'PANGKALIMA', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 54, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5710002, 'INTAN MEGAH 2', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-09-20', 1, '', 618, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5710010, 'INTAN MEGAH 10', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-05-01', 1, '', 255, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5710013, 'INTAN MEGAH 13', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-05-01', 1, '', 257, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5717218, 'DELTA AYU 218', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 58, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5730005, 'TRANSPASIFIC 05', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 66, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5730006, 'TRANSPASIFIC 06', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 56, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5730206, 'TRANSPASIFIC 206', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-05-01', 1, '', 250, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5737003, 'NELLY III', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 64, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5738243, 'TRANSPOWER 243', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-05-01', 1, '', 252, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5754002, 'BAMARA 2 VO', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 62, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5754008, 'BAMARA 8', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 52, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5755002, 'PRIMA POWER 02', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 68, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5755005, 'PRIMA POWER 05', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 60, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(5755009, 'PRIMA POWER 09', 'SPOT', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 70, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6601020, 'AGENA', 'TC', 'RUNNING', 'BARGE', 240, 3600, 0, '2012-03-18', 1, '', 47, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6601021, 'ALMANAR', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 33, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6601022, 'ALUDRA', 'TC', 'RUNNING', 'BARGE', 240, 3600, 0, '2012-03-18', 1, '', 49, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6601023, 'AQUILA', 'TC', 'RUNNING', 'BARGE', 230, 3600, 0, '2012-03-18', 1, '', 45, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6609002, 'SALWA', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 29, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6620077, 'CAPRICORN 77', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-09-20', 1, '', 619, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6620079, 'CAPRICORN 79', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-09-20', 1, '', 620, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6645008, 'MASADA 08', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 37, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6652001, 'DAYA 001', 'TC', 'RUNNING', 'BARGE', 270, 5000, 0, '2012-03-18', 1, '', 43, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6681002, 'PM 2', 'TC', 'RUNNING', 'BARGE', 270, 5000, 0, '2012-03-18', 1, '', 41, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6702001, 'BINTARO', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 38, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6702003, 'BOMAS GENIUS', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 24, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6709003, 'KAYU MANIS', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-07-25', 1, '', 460, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6709004, 'MANGGALA', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-12-21', 1, '', 2053, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6709005, 'MIRSHAD', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 50, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6709006, 'SALMA', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 40, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6720028, 'CAPRICORN 28', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 44, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6720032, 'CAPRICORN 32', 'TC', 'RUNNING', 'TUG', 240, 0, 0, '2012-03-18', 1, '', 46, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6720050, 'CAPRICORN 50', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 42, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6745009, 'MASADA 09', 'TC', 'RUNNING', 'TUG', 0, 0, 1600, '2012-03-18', 1, '', 36, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6751002, 'KARYA ABADI 2', 'TC', 'RUNNING', 'TUG', 0, 0, 1000, '2012-03-18', 1, '', 48, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6753036, 'TB. SYUKUR 36', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-05-01', 1, '', 248, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6760000, 'GONAYA', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 30, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6760004, 'GONAYA IV', 'TC', 'RUNNING', 'TUG', 300, 0, 1600, '2013-01-11', 1, '', 2054, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6764001, 'VINCENT 1', 'TC', 'RUNNING', 'TUG', 0, 0, 1600, '2012-03-18', 1, '', 28, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6781202, 'PM 202', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 26, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6784025, 'SADP XXV', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 32, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(6785007, 'TIRTA VII', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2012-03-18', 1, '', 34, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7609007, 'MANDIRI ANGGREK', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '0000-00-00', 1, '', 2644, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7609008, 'MANDIRI AZALEA', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '0000-00-00', 1, '', 2643, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7615001, 'INTAN KELANA 1', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-08', 1, '', 2611, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7615021, 'INTAN KELANA 21', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-08', 1, '', 2612, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7615022, 'INTAN KELANA 22', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-08', 1, '', 2613, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7632268, 'MBS 268', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-08', 1, '', 2628, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7632311, 'MBS 311', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-05-08', 1, '', 2634, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7632352, 'MBS 352', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-06-13', 1, '', 2646, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7639301, 'MJL 301', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2014-04-08', 1, '', 2602, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7644238, 'SUNWIN 238', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-05-08', 1, '', 2630, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7644328, 'SUNWIN 328', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-06-02', 1, '', 2640, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7645018, 'MASADA 18', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-08', 1, '', 2601, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7645020, 'MASADA 20', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-08', 1, '', 2610, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7652002, 'DAYA 002', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-22', 1, '', 2623, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7653002, 'SYUKUR 02', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-05-08', 1, '', 2632, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7653037, 'SYUKUR 37', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-08', 1, '', 2604, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7658255, 'INTERINDO 255', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-08', 1, '', 2638, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7661003, 'PEGASUS 3', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2014-04-08', 1, '', 2614, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7661005, 'PEGASUS 5', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2014-04-22', 1, '', 2622, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7680307, 'HASNUR 307', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-06-02', 1, '', 2636, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7709009, 'KARUNIA SAMUDRA', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-05-08', 1, '', 2626, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7709010, 'MANGALA', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-04-08', 1, '', 2599, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7709011, 'PRIMA HARIMAU', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-06-10', 1, '', 2641, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7709012, 'PRIMA RAJAWALI', 'TC', 'RUNNING', 'TUG', 0, 0, 1400, '2014-04-22', 1, '', 2619, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7709103, 'KS3', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2015-01-01', 1, '', 2606, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7709555, 'REMBROSS', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2015-01-01', 1, '', 2607, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7710016, 'INTAN MEGAH 16', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-04-08', 1, '', 2608, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7710018, 'INTAN MEGAH 18', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-04-08', 1, '', 2607, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7710025, 'INTAN MEGAH 25', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-04-08', 1, '', 2606, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7718001, 'BENGKALIS 1', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-06-10', 1, '', 2642, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7720080, 'CAPRICORN 80', 'TC', 'RUNNING', 'TUG', 0, 0, 1600, '2014-04-22', 1, '', 2617, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7731188, 'MARINO 188', 'TC', 'RUNNING', 'TUG', 0, 0, 1600, '2014-04-08', 1, '', 2609, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7731189, 'MARINO 189', 'TC', 'RUNNING', 'TUG', 0, 0, 1600, '2014-04-22', 1, '', 2615, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7732022, 'MBS 22', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-05-08', 1, '', 2633, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7732037, 'MBS 37', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-06-02', 1, '', 2637, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7732057, 'MBS 57', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-06-02', 1, '', 2639, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7732081, 'MBS 81', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-05-08', 1, '', 2627, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7732173, 'MBS 173', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-05-08', 1, '', 2629, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7732199, 'MBS 199', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-06-13', 1, '', 2645, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7753034, 'SYUKUR 34', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-05-08', 1, '', 2631, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7753036, 'SYUKUR 36', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-04-08', 1, '', 2603, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7760005, 'GONAYA V', 'TC', 'RUNNING', 'TUG', 0, 0, 1, '2016-01-01', 1, '', 2604, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7760012, 'GONAYA XII', 'TC', 'RUNNING', 'TUG', 0, 0, 1600, '2014-04-08', 1, '', 2600, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7762021, 'FERRY XXI', 'TC', 'RUNNING', 'TUG', 0, 0, 1600, '2014-04-22', 1, '', 2598, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7763001, 'BAIDURI', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2015-01-01', 1, '', 2605, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7763002, 'FRANSISCUS 2', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-04-22', 1, '', 2616, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7763111, 'FRANSISCUS', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2015-01-01', 1, '', 2604, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7780007, 'HASNUR 07', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-06-02', 1, '', 2635, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7789001, 'BSP 01', 'TC', 'RUNNING', 'TUG', 0, 0, 1400, '2014-04-22', 1, '', 2621, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(7789004, 'BSP 04', 'TC', 'RUNNING', 'TUG', 0, 0, 0, '2014-04-22', 1, '', 2620, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(56358511, 'PEC 8511', 'SPOT', 'RUNNING', 'BARGE', 330, 8900, 0, '2012-03-18', 1, '', 63, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(56363881, 'RT 3881', 'SPOT', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-07-25', 1, '', 461, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(66117505, 'INTAN 7505', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 31, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(66333881, 'BAL 3881', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 39, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(66393889, 'TB 3889', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 27, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(66823007, 'PULAU TIGA 3007', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 25, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(66833009, 'SENTOSA JAYA 3009', 'TC', 'RUNNING', 'BARGE', 300, 7500, 0, '2012-03-18', 1, '', 35, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(76862785, 'BAIDURI 2785', 'TC', 'RUNNING', 'BARGE', 0, 0, 0, '2014-04-22', 1, '', 2624, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00'),
(76872702, 'BORNEO 2702', 'TC', 'RUNNING', 'BARGE', 270, 5000, 0, '2014-04-22', 1, '', 2625, '0000-00-00', 0, 0, 0, '0000-00-00', 0, '', 0, 0, 0.00, '0000-00-00 00:00:00', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_depreciation`
--

CREATE TABLE IF NOT EXISTS `vessel_depreciation` (
  `id_vessel_depreciation` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  `temp` double(20,2) NOT NULL,
  PRIMARY KEY (`id_vessel_depreciation`),
  KEY `year` (`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data untuk tabel `vessel_depreciation`
--

INSERT INTO `vessel_depreciation` (`id_vessel_depreciation`, `id_vessel`, `year`, `amount`, `created_date`, `created_user`, `ip_user_updated`, `temp`) VALUES
(1, 1770001, 2015, 1113114060.00, '2015-01-29 00:00:00', '', '', 0.00),
(2, 1770002, 2015, 716958528.00, '2015-01-29 00:00:00', '', '', 0.00),
(3, 1770003, 2015, 697715352.00, '2015-01-29 00:00:00', '', '', 0.00),
(4, 1770004, 2015, 824178444.00, '2015-01-29 00:00:00', '', '', 0.00),
(5, 1770005, 2015, 495577032.00, '2015-01-29 00:00:00', '', '', 0.00),
(6, 1770006, 2015, 722404308.00, '2015-01-29 00:00:00', '', '', 0.00),
(7, 1770007, 2015, 753847716.00, '2015-01-29 00:00:00', '', '', 0.00),
(8, 1770008, 2015, 769319916.00, '2015-01-29 00:00:00', '', '', 0.00),
(9, 1770009, 2015, 745744632.00, '2015-01-29 00:00:00', '', '', 0.00),
(10, 1770010, 2015, 806447196.00, '2015-01-29 00:00:00', '', '', 0.00),
(11, 1770011, 2015, 817032444.00, '2015-01-29 00:00:00', '', '', 0.00),
(12, 6745009, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(13, 6764001, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(14, 6760004, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(15, 6720028, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(16, 6720032, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(17, 7731188, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(18, 6751002, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(19, 1601007, 2015, 1012574364.00, '2015-01-29 00:00:00', '', '', 0.00),
(20, 7709009, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(21, 1601004, 2015, 1179178476.00, '2015-01-29 00:00:00', '', '', 0.00),
(22, 6620077, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(23, 1601003, 2015, 555147252.00, '2015-01-29 00:00:00', '', '', 0.00),
(24, 1601006, 2015, 1110798072.00, '2015-01-29 00:00:00', '', '', 0.00),
(25, 1601001, 2015, 508593840.00, '2015-01-29 00:00:00', '', '', 0.00),
(26, 6652001, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(27, 1610102, 2015, 1148172204.00, '2015-01-29 00:00:00', '', '', 0.00),
(28, 1601005, 2015, 980844540.00, '2015-01-29 00:00:00', '', '', 0.00),
(29, 1601008, 2015, 1113114060.00, '2015-01-29 00:00:00', '', '', 0.00),
(30, 6645008, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(31, 6609002, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(32, 66117505, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(33, 6601023, 2015, 532555560.00, '2015-01-29 00:00:00', '', '', 0.00),
(34, 6601022, 2015, 555959736.00, '2015-01-29 00:00:00', '', '', 0.00),
(35, 7661003, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(36, 6601020, 2015, 492262500.00, '2015-01-29 00:00:00', '', '', 0.00),
(37, 7731189, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(38, 7661005, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(39, 7720080, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(40, 7652002, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(41, 7762021, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(42, 6681002, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(43, 7645018, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(44, 7760012, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(45, 7639301, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(46, 7763111, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(47, 5645010, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(48, 7709012, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(49, 7763001, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(50, 7789001, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(51, 76872702, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(52, 5645016, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(53, 1760002, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(54, 7645020, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(55, 7718001, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(56, 7609007, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(57, 7709103, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(58, 7709011, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(59, 7609008, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(60, 7709555, 2015, 0.00, '2015-01-29 00:00:00', '', '', 0.00),
(62, 1802001, 2015, 906192000.00, '2015-01-29 00:00:00', '', '', 0.00),
(63, 1802002, 2015, 910512000.00, '2015-01-29 00:00:00', '', '', 0.00),
(64, 1802003, 2015, 923904000.00, '2015-01-29 00:00:00', '', '', 0.00),
(65, 1802005, 2015, 921888000.00, '2015-01-29 00:00:00', '', '', 0.00),
(66, 1802006, 2015, 965376000.00, '2015-01-29 00:00:00', '', '', 0.00),
(67, 1802007, 2015, 972000000.00, '2015-01-29 00:00:00', '', '', 0.00),
(68, 1802008, 2015, 946512000.00, '2015-01-29 00:00:00', '', '', 0.00),
(69, 1802009, 2015, 940752000.00, '2015-01-29 00:00:00', '', '', 0.00),
(70, 1802010, 2015, 993600000.00, '2015-01-29 00:00:00', '', '', 0.00),
(71, 1802011, 2015, 991584000.00, '2015-01-29 00:00:00', '', '', 0.00),
(72, 1903001, 2015, 868608000.00, '2015-01-29 00:00:00', '', '', 0.00),
(73, 1903002, 2015, 868608000.00, '2015-01-29 00:00:00', '', '', 0.00),
(74, 1903003, 2015, 1122192000.00, '2015-01-29 00:00:00', '', '', 0.00),
(75, 1903005, 2015, 961056000.00, '2015-01-29 00:00:00', '', '', 0.00),
(76, 1903006, 2015, 951840000.00, '2015-01-29 00:00:00', '', '', 0.00),
(77, 1903007, 2015, 980352000.00, '2015-01-29 00:00:00', '', '', 0.00),
(78, 1903008, 2015, 1018656000.00, '2015-01-29 00:00:00', '', '', 0.00),
(79, 1903009, 2015, 1256688000.00, '2015-01-29 00:00:00', '', '', 0.00),
(80, 1903010, 2015, 1256832000.00, '2015-01-29 00:00:00', '', '', 0.00),
(81, 1903011, 2015, 1343520000.00, '2015-01-29 00:00:00', '', '', 0.00),
(82, 1111111, 2015, 11127312000.00, '2015-01-29 00:00:00', '', '', 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_document_info`
--

CREATE TABLE IF NOT EXISTS `vessel_document_info` (
  `id_vessel_document_info` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel` int(11) NOT NULL,
  `DateCreated` date NOT NULL,
  `PlaceCreated` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `IsPermanen` int(1) NOT NULL DEFAULT '0',
  `ValidUntil` date NOT NULL,
  `id_vessel_document` int(11) NOT NULL,
  `Attachment` text COLLATE latin1_general_ci,
  `Check1` date DEFAULT NULL,
  `Check2` date DEFAULT NULL,
  `Check3` date DEFAULT NULL,
  `Check4` date DEFAULT NULL,
  `Check5` date DEFAULT NULL,
  `Check6` date DEFAULT NULL,
  `Status` set('ACTIVE','INACTIVE') COLLATE latin1_general_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_vessel_document_info`),
  KEY `id_vessel` (`id_vessel`),
  KEY `id_vessel_document` (`id_vessel_document`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=253 ;

--
-- Dumping data untuk tabel `vessel_document_info`
--

INSERT INTO `vessel_document_info` (`id_vessel_document_info`, `id_vessel`, `DateCreated`, `PlaceCreated`, `IsPermanen`, `ValidUntil`, `id_vessel_document`, `Attachment`, `Check1`, `Check2`, `Check3`, `Check4`, `Check5`, `Check6`, `Status`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1770001, '0000-00-00', 'Jakarta', 1, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(2, 1770001, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(3, 1770001, '0000-00-00', 'Sunda Kelapa', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(4, 1770001, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(5, 1770001, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(6, 1770001, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(7, 1770001, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(8, 1770001, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(9, 1770001, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(10, 1770001, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(11, 1770001, '0000-00-00', 'Banjarmasin', 0, '2042-07-03', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(12, 1770001, '0000-00-00', 'Banjarmasin', 0, '2042-07-03', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(13, 1770001, '0000-00-00', 'Banjarmasin', 0, '2042-07-03', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(14, 1770001, '0000-00-00', 'Banjarmasin', 0, '2042-05-02', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(15, 1770001, '0000-00-00', 'Banjarmasin', 0, '2042-05-02', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(16, 1770001, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(17, 1770001, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(18, 1770001, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(19, 1770002, '0000-00-00', 'Jakarta', 1, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(20, 1770002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(21, 1770002, '0000-00-00', 'Dumai', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(22, 1770002, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(23, 1770002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(24, 1770002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(25, 1770002, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(26, 1770002, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(27, 1770002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(28, 1770002, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(29, 1770002, '0000-00-00', 'Tokyo', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(30, 1770002, '0000-00-00', 'Tokyo', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(31, 1770002, '0000-00-00', 'Tokyo', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(32, 1770002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(33, 1770002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(34, 1770002, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(35, 1770002, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(36, 1770002, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(37, 1770003, '0000-00-00', 'Jakarta', 1, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(38, 1770003, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(39, 1770003, '0000-00-00', 'Sunda Kelapa', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(40, 1770003, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(41, 1770003, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(42, 1770003, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(43, 1770003, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(44, 1770003, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(45, 1770003, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(46, 1770003, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(47, 1770003, '0000-00-00', 'Tokyo', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(48, 1770003, '0000-00-00', 'Tokyo', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(49, 1770003, '0000-00-00', 'Tokyo', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(50, 1770003, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(51, 1770003, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(52, 1770003, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(53, 1770003, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(54, 1770003, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(55, 1770004, '0000-00-00', 'Jakarta', 1, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(56, 1770004, '0000-00-00', 'Tj Priok', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(57, 1770004, '0000-00-00', 'Balikpapan', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(58, 1770004, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(59, 1770004, '0000-00-00', 'Tj Priok', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(60, 1770004, '0000-00-00', 'Tj Priok', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(61, 1770004, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(62, 1770004, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(63, 1770004, '0000-00-00', 'Tj Priok', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(64, 1770004, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(65, 1770004, '0000-00-00', 'Jakarta', 0, '2041-03-03', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(66, 1770004, '0000-00-00', 'Jakarta', 0, '2041-03-03', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(67, 1770004, '0000-00-00', 'Jakarta', 0, '2041-03-03', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(68, 1770004, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(69, 1770004, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(70, 1770004, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(71, 1770004, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(72, 1770004, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(73, 1770005, '0000-00-00', 'Banjarmasin', 0, '2042-03-03', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(74, 1770005, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(75, 1770005, '0000-00-00', 'Sunda Kelapa', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(76, 1770005, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(77, 1770005, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(78, 1770005, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(79, 1770005, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(80, 1770005, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(81, 1770005, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(82, 1770005, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(83, 1770005, '2041-03-03', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(84, 1770005, '2041-03-03', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(85, 1770005, '2041-03-03', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(86, 1770005, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(87, 1770005, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(88, 1770005, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(89, 1770005, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(90, 1770005, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(91, 1770006, '0000-00-00', 'Banjarmasin', 0, '2042-06-09', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(92, 1770006, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(93, 1770006, '0000-00-00', 'Pekanbaru', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(94, 1770006, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(95, 1770006, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(96, 1770006, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(97, 1770006, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(98, 1770006, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(99, 1770006, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(100, 1770006, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(101, 1770006, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(102, 1770006, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(103, 1770006, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(104, 1770006, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(105, 1770006, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(106, 1770006, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(107, 1770006, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(108, 1770006, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(109, 1770007, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(110, 1770007, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(111, 1770007, '2041-05-07', 'Sunda kelapa', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(112, 1770007, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(113, 1770007, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(114, 1770007, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(115, 1770007, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(116, 1770007, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(117, 1770007, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(118, 1770007, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(119, 1770007, '2041-09-05', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(120, 1770007, '2041-09-05', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(121, 1770007, '2041-09-05', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(122, 1770007, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(123, 1770007, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(124, 1770007, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(125, 1770007, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(126, 1770007, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(127, 1770008, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(128, 1770008, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(129, 1770008, '2041-05-07', 'Sunda Kelapa', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(130, 1770008, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(131, 1770008, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(132, 1770008, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(133, 1770008, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(134, 1770008, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(135, 1770008, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(136, 1770008, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(137, 1770008, '2041-12-04', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(138, 1770008, '2041-12-04', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(139, 1770008, '2041-12-04', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(140, 1770008, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(141, 1770008, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(142, 1770008, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(143, 1770008, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(144, 1770008, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(145, 1770009, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(146, 1770009, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(147, 1770009, '2041-04-09', 'Sunda Kelapa', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(148, 1770009, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(149, 1770009, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(150, 1770009, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(151, 1770009, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(152, 1770009, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(153, 1770009, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(154, 1770009, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(155, 1770009, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(156, 1770009, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(157, 1770009, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(158, 1770009, '2041-12-03', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(159, 1770009, '2041-12-03', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(160, 1770009, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(161, 1770009, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(162, 1770009, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(163, 1770010, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(164, 1770010, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(165, 1770010, '2041-06-05', 'Jakarta', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(166, 1770010, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(167, 1770010, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(168, 1770010, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(169, 1770010, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(170, 1770010, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(171, 1770010, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(172, 1770010, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(173, 1770010, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(174, 1770010, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(175, 1770010, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(176, 1770010, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(177, 1770010, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(178, 1770010, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(179, 1770010, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(180, 1770010, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(181, 1770011, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(182, 1770011, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(183, 1770011, '2041-05-07', 'Sunda Kelapa', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(184, 1770011, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(185, 1770011, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(186, 1770011, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(187, 1770011, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(188, 1770011, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(189, 1770011, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(190, 1770011, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(191, 1770011, '2041-12-03', 'Banjarmasin', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(192, 1770011, '2041-12-03', 'Banjarmasin', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(193, 1770011, '2041-12-03', 'Banjarmasin', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(194, 1770011, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(195, 1770011, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(196, 1770011, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(197, 1770011, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(198, 1770011, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(199, 6751002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(200, 6751002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(201, 6751002, '0000-00-00', 'Samarinda', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(202, 6751002, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(203, 6751002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(204, 6751002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(205, 6751002, '0000-00-00', '', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(206, 6751002, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(207, 6751002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(208, 6751002, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(209, 6751002, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(210, 6751002, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(211, 6751002, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(212, 6751002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(213, 6751002, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(214, 6751002, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(215, 6751002, '0000-00-00', '', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(216, 6751002, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(217, 6720028, '0000-00-00', 'Pekan baru', 0, '0000-00-00', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(218, 6720028, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(219, 6720028, '0000-00-00', 'Dumai', 0, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(220, 6720028, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(221, 6720028, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(222, 6720028, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(223, 6720028, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(224, 6720028, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(225, 6720028, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(226, 6720028, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(227, 6720028, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(228, 6720028, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(229, 6720028, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(230, 6720028, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(231, 6720028, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(232, 6720028, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(233, 6720028, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(234, 6720028, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(235, 6720032, '0000-00-00', 'Banjarmasin', 0, '2041-02-08', 1001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(236, 6720032, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(237, 6720032, '0000-00-00', 'Dumai', 1, '0000-00-00', 1003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(238, 6720032, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(239, 6720032, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(240, 6720032, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(241, 6720032, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(242, 6720032, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(243, 6720032, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(244, 6720032, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(245, 6720032, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(246, 6720032, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(247, 6720032, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(248, 6720032, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(249, 6720032, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(250, 6720032, '0000-00-00', 'tidak pakai', 0, '0000-00-00', 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', '0000-00-00 00:00:00', '', ''),
(251, 6720032, '0000-00-00', 'Banjarmasin', 0, '0000-00-00', 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', ''),
(252, 6720032, '0000-00-00', 'Jakarta', 0, '0000-00-00', 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVE', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_document_info_hist`
--

CREATE TABLE IF NOT EXISTS `vessel_document_info_hist` (
  `id_vessel_document_info_hist` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel_document_info` bigint(20) NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `DateCreated` date NOT NULL,
  `PlaceCreated` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `IsPermanen` int(1) NOT NULL DEFAULT '0',
  `ValidUntil` date NOT NULL,
  `id_vessel_document` int(11) NOT NULL,
  `Attachment` text COLLATE latin1_general_ci NOT NULL,
  `Check1` date DEFAULT NULL,
  `Check2` date DEFAULT NULL,
  `Check3` date DEFAULT NULL,
  `Check4` date DEFAULT NULL,
  `Check5` date DEFAULT NULL,
  `Check6` date DEFAULT NULL,
  `Status` set('ACTIVE','INACTIVE') COLLATE latin1_general_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_vessel_document_info_hist`),
  KEY `id_vessel` (`id_vessel`),
  KEY `id_vessel_document` (`id_vessel_document`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `vessel_document_info_hist`
--

INSERT INTO `vessel_document_info_hist` (`id_vessel_document_info_hist`, `id_vessel_document_info`, `id_vessel`, `DateCreated`, `PlaceCreated`, `IsPermanen`, `ValidUntil`, `id_vessel_document`, `Attachment`, `Check1`, `Check2`, `Check3`, `Check4`, `Check5`, `Check6`, `Status`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1, 1770010, '2014-12-18', 'Bandungoy', 1, '2014-12-26', 1001, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-12-05 10:27:01', 'nauticaltester', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_insurance_accrual`
--

CREATE TABLE IF NOT EXISTS `vessel_insurance_accrual` (
  `id_vessel_insurance_accrual` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_vessel_insurance_accrual`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data untuk tabel `vessel_insurance_accrual`
--

INSERT INTO `vessel_insurance_accrual` (`id_vessel_insurance_accrual`, `id_vessel`, `year`, `amount`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1770001, 2015, 223821000.00, '2015-01-29 00:00:00', '', ''),
(2, 1770002, 2015, 190944000.00, '2015-01-29 00:00:00', '', ''),
(3, 1770003, 2015, 191040000.00, '2015-01-29 00:00:00', '', ''),
(4, 1770004, 2015, 213501000.00, '2015-01-29 00:00:00', '', ''),
(5, 1770005, 2015, 102036000.00, '2015-01-29 00:00:00', '', ''),
(6, 1770006, 2015, 178120200.00, '2015-01-29 00:00:00', '', ''),
(7, 1770007, 2015, 162453960.00, '2015-01-29 00:00:00', '', ''),
(8, 1770008, 2015, 162453960.00, '2015-01-29 00:00:00', '', ''),
(9, 1770009, 2015, 140865840.00, '2015-01-29 00:00:00', '', ''),
(10, 1770010, 2015, 182051400.00, '2015-01-29 00:00:00', '', ''),
(11, 1770011, 2015, 182051400.00, '2015-01-29 00:00:00', '', ''),
(12, 6745009, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(13, 6764001, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(14, 6760004, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(15, 6720028, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(16, 6720032, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(17, 7731188, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(18, 6751002, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(19, 1601007, 2015, 252813000.00, '2015-01-29 00:00:00', '', ''),
(20, 7709009, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(21, 1601004, 2015, 261993000.00, '2015-01-29 00:00:00', '', ''),
(22, 6620077, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(23, 1601003, 2015, 134877000.00, '2015-01-29 00:00:00', '', ''),
(24, 1601006, 2015, 272469000.00, '2015-01-29 00:00:00', '', ''),
(25, 1601001, 2015, 146109000.00, '2015-01-29 00:00:00', '', ''),
(26, 6652001, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(27, 1610102, 2015, 261993000.00, '2015-01-29 00:00:00', '', ''),
(28, 1601005, 2015, 252813000.00, '2015-01-29 00:00:00', '', ''),
(29, 1601008, 2015, 214320000.00, '2015-01-29 00:00:00', '', ''),
(30, 6645008, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(31, 6609002, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(32, 66117505, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(33, 6601023, 2015, 155112000.00, '2015-01-29 00:00:00', '', ''),
(34, 6601022, 2015, 134877000.00, '2015-01-29 00:00:00', '', ''),
(35, 7661003, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(36, 6601020, 2015, 146109000.00, '2015-01-29 00:00:00', '', ''),
(37, 7731189, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(38, 7661005, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(39, 7720080, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(40, 7652002, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(41, 7762021, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(42, 6681002, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(43, 7645018, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(44, 7760012, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(45, 7639301, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(46, 7763111, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(47, 5645010, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(48, 7709012, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(49, 7763001, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(50, 7789001, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(51, 76872702, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(52, 5645016, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(53, 1760002, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(54, 7645020, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(55, 7718001, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(56, 7609007, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(57, 7709103, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(58, 7709011, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(59, 7609008, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(60, 7709555, 2015, 0.00, '2015-01-29 00:00:00', '', ''),
(62, 1802001, 2015, 125971200.00, '2015-01-29 00:00:00', '', ''),
(63, 1802002, 2015, 125971200.00, '2015-01-29 00:00:00', '', ''),
(64, 1802003, 2015, 125971200.00, '2015-01-29 00:00:00', '', ''),
(65, 1802005, 2015, 125971200.00, '2015-01-29 00:00:00', '', ''),
(66, 1802006, 2015, 125971200.00, '2015-01-29 00:00:00', '', ''),
(67, 1802007, 2015, 125971200.00, '2015-01-29 00:00:00', '', ''),
(68, 1802008, 2015, 125971200.00, '2015-01-29 00:00:00', '', ''),
(69, 1802009, 2015, 125971200.00, '2015-01-29 00:00:00', '', ''),
(70, 1802010, 2015, 136080000.00, '2015-01-29 00:00:00', '', ''),
(71, 1802011, 2015, 136080000.00, '2015-01-29 00:00:00', '', ''),
(72, 1903001, 2015, 121500000.00, '2015-01-29 00:00:00', '', ''),
(73, 1903002, 2015, 121500000.00, '2015-01-29 00:00:00', '', ''),
(74, 1903003, 2015, 131803200.00, '2015-01-29 00:00:00', '', ''),
(75, 1903005, 2015, 138412800.00, '2015-01-29 00:00:00', '', ''),
(76, 1903006, 2015, 138412800.00, '2015-01-29 00:00:00', '', ''),
(77, 1903007, 2015, 143856000.00, '2015-01-29 00:00:00', '', ''),
(78, 1903008, 2015, 143856000.00, '2015-01-29 00:00:00', '', ''),
(79, 1903009, 2015, 185846400.00, '2015-01-29 00:00:00', '', ''),
(80, 1903010, 2015, 185846400.00, '2015-01-29 00:00:00', '', ''),
(81, 1903011, 2015, 185846400.00, '2015-01-29 00:00:00', '', ''),
(82, 1111111, 2015, 1360800000.00, '2015-01-29 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_maintenance_plan`
--

CREATE TABLE IF NOT EXISTS `vessel_maintenance_plan` (
  `id_vessel_maintenance_plan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_maintenance_type` int(11) NOT NULL,
  `id_vessel` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `Duration` int(10) NOT NULL,
  `Description` text COLLATE latin1_general_ci NOT NULL,
  `RunningHour` float NOT NULL,
  `MaintenanceName` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `TypeBreakdown` set('BREAKDOWN','UNBREAKDOWN') COLLATE latin1_general_ci NOT NULL,
  `TypeSchedule` set('UNSCHEDULED','SCHEDULED') COLLATE latin1_general_ci NOT NULL,
  `RepeatCount` int(11) NOT NULL,
  `RepeatUnit` set('days','months') COLLATE latin1_general_ci NOT NULL,
  `status` set('APPROVED','REJECTED','NONE') COLLATE latin1_general_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `approved_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `approval_date` datetime NOT NULL,
  `ip_user_approved` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_vessel_maintenance_plan`),
  KEY `id_maintenance_type` (`id_maintenance_type`),
  KEY `id_vessel` (`id_vessel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_part`
--

CREATE TABLE IF NOT EXISTS `vessel_part` (
  `id_vessel_part` bigint(20) NOT NULL AUTO_INCREMENT,
  `PartName` int(250) NOT NULL,
  `PartNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`id_vessel_part`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_schedule`
--

CREATE TABLE IF NOT EXISTS `vessel_schedule` (
  `id_vessel_schedule` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_vessel` int(11) NOT NULL,
  `id_vessel_pair` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `status_run` set('PLAN','RUN') NOT NULL,
  `id_vessel_status` int(11) NOT NULL,
  `id_shipping_order_detail` bigint(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_vessel_schedule`),
  KEY `id_vessel` (`id_vessel`),
  KEY `id_vessel_status` (`id_vessel_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `vessel_schedule`
--

INSERT INTO `vessel_schedule` (`id_vessel_schedule`, `id_vessel`, `id_vessel_pair`, `date`, `day`, `month`, `year`, `status_run`, `id_vessel_status`, `id_shipping_order_detail`, `description`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1760002, 7645020, '2014-12-05', 5, 12, 2014, 'PLAN', 10, 0, '', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_status`
--

CREATE TABLE IF NOT EXISTS `vessel_status` (
  `id_vessel_status` int(11) NOT NULL,
  `vessel_status` varchar(100) NOT NULL,
  `color_scheme` varchar(15) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_vessel_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vessel_status`
--

INSERT INTO `vessel_status` (`id_vessel_status`, `vessel_status`, `color_scheme`, `icon`, `description`) VALUES
(10, 'VOYAGE ORDER', '#BAF2F5', '', ''),
(20, 'REPAIR', '#F88028', '', ''),
(30, 'DOCKING', '#F9C89F', '', ''),
(40, 'VOYAGE PLAN', '#ffcc33', '', ''),
(50, 'OFF HIRED', '#94E961', '', ''),
(60, 'MAINTENANCE', '#336699', '', ''),
(70, 'BLOCKING', '#66ccff', '', 'Ini untuk blocking jadwal dalam keadaan-keadaan tertentu seperti: WATER LEVEL, dll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_close`
--

CREATE TABLE IF NOT EXISTS `voyage_close` (
  `id_voyage_close` bigint(20) NOT NULL AUTO_INCREMENT,
  `CloseVoyageNumber` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `CloseVoyageStatus` set('VO FINISH','VO DOC COMPLETE','INVOICE','PAY') COLLATE latin1_general_ci NOT NULL,
  `CloseVoyageNo` int(11) NOT NULL,
  `CloseVoyageMonth` int(2) NOT NULL,
  `CloseVoyageYear` int(4) NOT NULL,
  `ReportTo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `id_voyage_order` bigint(20) NOT NULL,
  `id_sailing_order` bigint(20) NOT NULL,
  `ActualRoute` text COLLATE latin1_general_ci NOT NULL,
  `CrewIdMaster` int(11) NOT NULL,
  `CloseVoyageReportDate` date NOT NULL COMMENT 'days',
  `ActualStartDate` datetime NOT NULL,
  `ActualEndDate` datetime NOT NULL,
  `StandardFuel` double(20,2) NOT NULL,
  `StandardLayTime` int(11) NOT NULL,
  `ActualFuel` double(20,2) NOT NULL,
  `ActualLayTime` double(20,2) NOT NULL,
  `StartFuelStock` double(20,2) NOT NULL,
  `Bunker` double(20,2) NOT NULL,
  `LastFuelStock` double(20,2) NOT NULL,
  `ConsumptFuel` double(20,2) NOT NULL,
  `AE_Over` double(20,2) NOT NULL,
  `Deviation` double(20,2) NOT NULL,
  `Remark` text COLLATE latin1_general_ci NOT NULL,
  `Nautical` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `NauticalHead` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip_user_updated` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_voyage_close`),
  KEY `id_quotation` (`id_voyage_order`),
  KEY `id_voyage_order` (`id_voyage_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `voyage_close`
--

INSERT INTO `voyage_close` (`id_voyage_close`, `CloseVoyageNumber`, `CloseVoyageStatus`, `CloseVoyageNo`, `CloseVoyageMonth`, `CloseVoyageYear`, `ReportTo`, `id_voyage_order`, `id_sailing_order`, `ActualRoute`, `CrewIdMaster`, `CloseVoyageReportDate`, `ActualStartDate`, `ActualEndDate`, `StandardFuel`, `StandardLayTime`, `ActualFuel`, `ActualLayTime`, `StartFuelStock`, `Bunker`, `LastFuelStock`, `ConsumptFuel`, `AE_Over`, `Deviation`, `Remark`, `Nautical`, `NauticalHead`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(2, '', 'VO FINISH', 0, 0, 0, '', 1, 1, '', 0, '0000-00-00', '2014-12-25 00:00:00', '2015-01-22 00:00:00', 0.00, 0, 0.00, 40320.00, 12.00, 0.00, 1.00, 11.00, 0.00, 0.00, '', '', '', '2015-01-09 09:30:04', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_close_document`
--

CREATE TABLE IF NOT EXISTS `voyage_close_document` (
  `id_voyage_close_document` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `IdVoyageDocument` int(11) NOT NULL,
  `VoyageDocumentName` varchar(240) NOT NULL,
  `uploaded_date` datetime NOT NULL,
  `uploaded_user` varchar(45) NOT NULL,
  `ip_user_uploaded` varchar(50) NOT NULL,
  PRIMARY KEY (`id_voyage_close_document`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `voyage_close_document`
--

INSERT INTO `voyage_close_document` (`id_voyage_close_document`, `id_voyage_order`, `IdVoyageDocument`, `VoyageDocumentName`, `uploaded_date`, `uploaded_user`, `ip_user_uploaded`) VALUES
(1, 1, 2, '98c6f2c2287f4c73cea3d40ae7ec3ff220150108155335.pdf', '2015-01-08 15:53:35', 'admin', '::1'),
(2, 1, 3, '13cee27a2bd93915479f049378cffdd320150108155506.pdf', '2015-01-08 15:55:06', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_cost_actual`
--

CREATE TABLE IF NOT EXISTS `voyage_cost_actual` (
  `id_voyage_cost_actual` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `id_cost_item_actual` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_voyage_cost_actual`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `id_cost_item_standard` (`id_cost_item_actual`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `voyage_cost_actual`
--

INSERT INTO `voyage_cost_actual` (`id_voyage_cost_actual`, `id_voyage_order`, `id_cost_item_actual`, `amount`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1, 71020, 21847213.00, '2015-01-30 14:41:13', 'admin', '::1'),
(2, 1, 71030, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(3, 1, 71040, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(4, 1, 72010, 3393660.10, '2015-01-30 14:41:13', 'admin', '::1'),
(5, 1, 72030, 829470.32, '2015-01-30 14:41:13', 'admin', '::1'),
(6, 1, 72050, 2150537.63, '2015-01-30 14:41:13', 'admin', '::1'),
(7, 1, 72020, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(8, 1, 9001, 0.58, '2015-01-30 14:41:13', 'admin', '::1'),
(9, 1, 9002, 40.00, '2015-01-30 14:41:13', 'admin', '::1'),
(10, 1, 1010, 490000.00, '2015-01-30 14:41:13', 'admin', '::1'),
(11, 1, 73055, 8.00, '2015-01-30 14:41:13', 'admin', '::1'),
(12, 1, 1020, 1593025.95, '2015-01-30 14:41:13', 'admin', '::1'),
(13, 1, 1030, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(14, 1, 1040, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(15, 1, 1070, 6500000.00, '2015-01-30 14:41:13', 'admin', '::1'),
(16, 1, 1080, 3500000.00, '2015-01-30 14:41:13', 'admin', '::1'),
(17, 1, 2010, 1979635.06, '2015-01-30 14:41:13', 'admin', '::1'),
(18, 1, 2030, 483857.69, '2015-01-30 14:41:13', 'admin', '::1'),
(19, 1, 2040, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(20, 1, 2050, 1254480.28, '2015-01-30 14:41:13', 'admin', '::1'),
(21, 1, 3050, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(22, 1, 3080, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(23, 4, 71020, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(24, 4, 73055, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(25, 4, 71030, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(26, 4, 71040, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(27, 4, 72010, 3393660.10, '2015-01-30 14:30:34', 'admin', '::1'),
(28, 4, 72020, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(29, 4, 72030, 829470.32, '2015-01-30 14:30:34', 'admin', '::1'),
(30, 4, 72050, 2150537.63, '2015-01-30 14:30:34', 'admin', '::1'),
(31, 4, 9001, 4.58, '2015-01-30 14:30:34', 'admin', '::1'),
(32, 4, 9002, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(33, 4, 1010, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(34, 4, 1020, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(35, 4, 1030, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(36, 4, 1040, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(37, 4, 1070, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(38, 4, 1080, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(39, 4, 2010, 15554275.46, '2015-01-30 14:30:34', 'admin', '::1'),
(40, 4, 2030, 3801738.97, '2015-01-30 14:30:34', 'admin', '::1'),
(41, 4, 2040, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(42, 4, 2050, 9856630.80, '2015-01-30 14:30:34', 'admin', '::1'),
(43, 4, 3050, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(44, 4, 3080, 0.00, '2015-01-30 14:30:34', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_cost_standard`
--

CREATE TABLE IF NOT EXISTS `voyage_cost_standard` (
  `id_voyage_cost_standard` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `id_cost_item_standard` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_voyage_cost_standard`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `id_cost_item_actual` (`id_cost_item_standard`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data untuk tabel `voyage_cost_standard`
--

INSERT INTO `voyage_cost_standard` (`id_voyage_cost_standard`, `id_voyage_order`, `id_cost_item_standard`, `amount`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1, 1, 8.00, '2015-01-30 14:41:13', 'admin', '::1'),
(2, 1, 2, 8100.00, '2015-01-30 14:41:13', 'admin', '::1'),
(3, 1, 3, 12250.00, '2015-01-30 14:41:13', 'admin', '::1'),
(4, 1, 1010, 99225000.00, '2015-01-30 14:41:13', 'admin', '::1'),
(5, 1, 1020, 21847213.00, '2015-01-30 14:41:13', 'admin', '::1'),
(6, 1, 1030, 9180602.15, '2015-01-30 14:41:13', 'admin', '::1'),
(7, 1, 1040, 6194666.67, '2015-01-30 14:41:13', 'admin', '::1'),
(8, 1, 2020, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(9, 1, 2010, 28054256.80, '2015-01-30 14:41:13', 'admin', '::1'),
(10, 1, 2030, 6856954.67, '2015-01-30 14:41:13', 'admin', '::1'),
(11, 1, 2040, 26666666.67, '2015-01-30 14:41:13', 'admin', '::1'),
(12, 1, 2050, 17777777.78, '2015-01-30 14:41:13', 'admin', '::1'),
(13, 1, 2060, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(14, 1, 3010, 0.00, '2015-01-30 14:41:13', 'admin', '::1'),
(15, 4, 1, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(16, 4, 2, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(17, 4, 3, 12500.00, '2015-01-30 14:30:34', 'admin', '::1'),
(18, 4, 1010, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(19, 4, 1020, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(20, 4, 1030, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(21, 4, 1040, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(22, 4, 2020, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(23, 4, 2010, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(24, 4, 2030, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(25, 4, 2040, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(26, 4, 2050, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(27, 4, 2060, 0.00, '2015-01-30 14:30:34', 'admin', '::1'),
(28, 4, 3010, 0.00, '2015-01-30 14:30:34', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_incentive`
--

CREATE TABLE IF NOT EXISTS `voyage_incentive` (
  `id_voyage_incentive` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_order` bigint(20) NOT NULL,
  `incentive_date` date NOT NULL,
  `type_incentive` set('FUEL','EHS') NOT NULL,
  `amount` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_voyage_incentive`),
  KEY `id_voyage_order` (`id_voyage_order`),
  KEY `type_incentive` (`type_incentive`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `voyage_incentive`
--

INSERT INTO `voyage_incentive` (`id_voyage_incentive`, `id_voyage_order`, `incentive_date`, `type_incentive`, `amount`, `id_currency`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, 1, '2015-01-26', 'FUEL', 6500000.00, 0, '0000-00-00 00:00:00', '', ''),
(2, 1, '2015-01-26', 'EHS', 3500000.00, 0, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_incentive_crew`
--

CREATE TABLE IF NOT EXISTS `voyage_incentive_crew` (
  `id_voyage_incentive_crew` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voyage_incentive` bigint(20) NOT NULL,
  `CrewId` int(11) NOT NULL,
  `incentive_date` date NOT NULL,
  `type_incentive` set('FUEL','EHS') NOT NULL,
  `percentage` int(3) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_voyage_incentive_crew`),
  KEY `id_voyage_incentive` (`id_voyage_incentive`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_mst_activity`
--

CREATE TABLE IF NOT EXISTS `voyage_mst_activity` (
  `id_voyage_activity` int(11) NOT NULL,
  `voyage_activity` varchar(20) NOT NULL,
  `voyage_activity_desc` varchar(200) NOT NULL,
  `category` set('WAITING BALLAST','WAITING LOADING','WAITING UNLOADING','LOADING','UNLOADING','SAILING BALLAST','SAILING LOADING','REPAIR','DOCKING') NOT NULL,
  `type` set('POINT','DURATION') NOT NULL DEFAULT 'DURATION',
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id_voyage_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voyage_mst_activity`
--

INSERT INTO `voyage_mst_activity` (`id_voyage_activity`, `voyage_activity`, `voyage_activity_desc`, `category`, `type`, `color`) VALUES
(1, 'WL', 'Waiting Loading at Loading Port', '', 'DURATION', '#6699ff'),
(2, 'LP', 'Loading Process', '', 'DURATION', '#cccccc'),
(3, 'WD', 'Waiting Document', '', 'DURATION', '#ffff66'),
(4, 'SL', 'Sailing Loaded', '', 'DURATION', '#ccffff'),
(5, 'SB', 'Sailing Balast', '', 'DURATION', ''),
(6, 'WDC', 'Waiting Discharge', '', 'DURATION', '#ff9900'),
(7, 'DP', 'Discharge Process', '', 'DURATION', '#ffcc99'),
(8, 'CO', 'Cast Off', '', 'POINT', '#33ff00'),
(9, 'ARL', 'Arrived at Loading Port', '', 'POINT', '#ffffff'),
(10, 'ARD', 'Arrived at Discharge Port', '', 'POINT', ''),
(11, 'SLW', 'Stand By Low Water Level', '', 'DURATION', ''),
(12, 'WPs', 'Waiting Passing', '', 'DURATION', ''),
(13, 'GR', 'Grounded', '', 'DURATION', ''),
(14, 'WCl', 'Waiting Clearence', '', 'DURATION', ''),
(15, 'WBr', 'Waiting Bunker', '', 'DURATION', ''),
(16, 'WDk', 'Waiting Docking', '', 'DURATION', ''),
(17, 'Dk', 'Docking', '', 'DURATION', ''),
(18, 'UNT', 'Unutilized', '', 'DURATION', ''),
(19, 'WRp', 'Waiting Repair', '', 'DURATION', ''),
(20, 'Rp', 'Repair', '', 'DURATION', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_order`
--

CREATE TABLE IF NOT EXISTS `voyage_order` (
  `id_voyage_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `VoyageNumber` varchar(100) NOT NULL,
  `VoyageOrderNumber` varchar(200) NOT NULL,
  `VONo` int(11) NOT NULL,
  `VOMonth` int(2) NOT NULL,
  `VOYear` int(4) NOT NULL,
  `id_quotation` bigint(20) NOT NULL,
  `id_so` bigint(20) NOT NULL,
  `id_voyage_order_plan` bigint(20) NOT NULL,
  `status` set('SHIPPING ORDER','VO CREATE','VO SAILING','VO FINISH','VO DOC COMPLETE','INVOICE','PAY') NOT NULL,
  `invoice_created` int(1) NOT NULL,
  `bussiness_type_order` int(11) NOT NULL,
  `BargingVesselTug` int(11) NOT NULL,
  `BargingVesselBarge` int(11) NOT NULL,
  `id_settype_tugbarge` bigint(20) NOT NULL,
  `BargeSize` int(11) NOT NULL,
  `Capacity` double(20,4) NOT NULL,
  `ActualCapacity` double(20,4) NOT NULL,
  `TugPower` int(11) NOT NULL,
  `BargingJettyIdStart` int(11) NOT NULL,
  `BargingJettyIdEnd` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `ActualStartDate` datetime NOT NULL,
  `ActualEndDate` datetime NOT NULL,
  `period_year` int(4) NOT NULL,
  `period_month` int(2) NOT NULL,
  `period_quartal` int(1) NOT NULL,
  `Price` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `change_rate` double(20,2) NOT NULL,
  `fuel_price` double(20,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  `status_schedule` set('NONE','APPROVED','REJECTED') NOT NULL DEFAULT 'NONE',
  `cc_std_duration` double(20,2) NOT NULL,
  `cc_std_fuel` double(20,2) NOT NULL,
  `cc_act_duration` double(20,2) NOT NULL,
  `cc_act_fuel_start` double(20,2) NOT NULL,
  `cc_act_fuel` double(20,2) NOT NULL,
  `cc_std_cost` double(20,2) NOT NULL,
  `cc_std_margin` int(11) NOT NULL,
  `cc_act_cost` double(20,2) NOT NULL,
  `cc_act_margin` int(11) NOT NULL,
  `approved_date` datetime NOT NULL,
  `approved_user` varchar(45) NOT NULL,
  `ip_user_approved` varchar(50) NOT NULL,
  PRIMARY KEY (`id_voyage_order`),
  KEY `id_quotation` (`id_quotation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `voyage_order`
--

INSERT INTO `voyage_order` (`id_voyage_order`, `VoyageNumber`, `VoyageOrderNumber`, `VONo`, `VOMonth`, `VOYear`, `id_quotation`, `id_so`, `id_voyage_order_plan`, `status`, `invoice_created`, `bussiness_type_order`, `BargingVesselTug`, `BargingVesselBarge`, `id_settype_tugbarge`, `BargeSize`, `Capacity`, `ActualCapacity`, `TugPower`, `BargingJettyIdStart`, `BargingJettyIdEnd`, `StartDate`, `EndDate`, `ActualStartDate`, `ActualEndDate`, `period_year`, `period_month`, `period_quartal`, `Price`, `id_currency`, `change_rate`, `fuel_price`, `created_date`, `created_user`, `ip_user_updated`, `status_schedule`, `cc_std_duration`, `cc_std_fuel`, `cc_act_duration`, `cc_act_fuel_start`, `cc_act_fuel`, `cc_std_cost`, `cc_std_margin`, `cc_act_cost`, `cc_act_margin`, `approved_date`, `approved_user`, `ip_user_approved`) VALUES
(1, '12', 'PML/VO/1/XII/2014', 1, 12, 2014, 1, 1, 0, 'VO CREATE', 1, 100, 1770007, 1601001, 0, 240, 5000.0000, 0.0000, 1600, 200005, 200001, '2014-12-25', '2015-01-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 6000.00, 2, 11250.00, 12250.00, '2014-12-22 16:35:14', 'adminbandung', '::1', '', 0.00, 0.00, 0.00, 0.00, 40.00, 0.00, 0, 0.00, 0, '0000-00-00 00:00:00', 'adminbandung', '::1'),
(2, '23', 'PML/VO/1/XII/2014', 1, 12, 2014, 5, 3, 0, 'VO FINISH', 0, 100, 1770009, 1610102, 0, 300, 6700.0000, 0.0000, 1600, 70002, 100001, '2014-12-04', '2014-12-26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 9000.00, 1, 1.00, 12500.00, '2014-12-22 16:44:27', 'adminbandung', '::1', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0, '0000-00-00 00:00:00', 'adminbandung', '::1'),
(3, '12', 'PML/VO/1/XII/2014', 1, 12, 2014, 7, 4, 0, 'VO SAILING', 0, 100, 1770001, 1601008, 0, 300, 9000.0000, 0.0000, 2200, 100001, 30003, '2014-12-30', '2014-12-31', '2014-12-30 10:00:00', '0000-00-00 00:00:00', 0, 0, 0, 9000.00, 1, 1.00, 12500.00, '2014-12-27 19:57:49', 'adminbandung', '::1', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0, '0000-00-00 00:00:00', 'adminbandung', '::1'),
(4, '12', 'PML/VO/1/XII/2014', 1, 12, 2014, 1, 1, 0, 'VO SAILING', 1, 100, 1770007, 1601001, 0, 240, 5000.0000, 0.0000, 1600, 20001, 20003, '2015-01-05', '2015-01-12', '2015-01-30 10:00:00', '2015-02-09 09:00:00', 0, 0, 0, 6000.00, 2, 11250.00, 12500.00, '2014-12-22 16:35:14', 'adminbandung', '::1', '', 0.00, 0.00, 9.96, 0.00, 0.00, 0.00, 0, 0.00, 0, '0000-00-00 00:00:00', 'adminbandung', '::1'),
(5, '', '', 0, 0, 0, 15, 5, 0, 'SHIPPING ORDER', 0, 100, 1770007, 1601003, 0, 240, 3600.0000, 0.0000, 1600, 110004, 110003, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 6700.00, 1, 1.00, 7500.00, '2015-02-23 20:11:57', 'admin', '::1', 'NONE', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0, '0000-00-00 00:00:00', '', ''),
(11, '', '', 0, 0, 0, 16, 6, 0, 'SHIPPING ORDER', 0, 100, 1770002, 1601007, 0, 300, 3500.0000, 0.0000, 0, 20002, 20002, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 7500.00, 1, 1.00, 7500.00, '2015-02-24 08:01:51', 'admin', '::1', 'NONE', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyage_order_plan`
--

CREATE TABLE IF NOT EXISTS `voyage_order_plan` (
  `id_voyage_order_plan` bigint(20) NOT NULL AUTO_INCREMENT,
  `VoyageNumber` varchar(100) NOT NULL,
  `id_bussiness_type_order` int(11) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `BargingVesselTug` int(11) NOT NULL,
  `BargingVesselBarge` int(11) NOT NULL,
  `BargeSize` int(11) NOT NULL,
  `Capacity` double(20,4) NOT NULL,
  `TugPower` int(11) NOT NULL,
  `BargingJettyIdStart` int(11) NOT NULL,
  `BargingJettyIdEnd` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `TotalQuantity` double(20,4) NOT NULL,
  `QuantityUnit` varchar(10) NOT NULL,
  `Price` double(20,2) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `fuel_price` double(20,2) NOT NULL,
  `status` set('SHOW','HIDE') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`id_voyage_order_plan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `voyage_order_plan`
--

INSERT INTO `voyage_order_plan` (`id_voyage_order_plan`, `VoyageNumber`, `id_bussiness_type_order`, `id_customer`, `BargingVesselTug`, `BargingVesselBarge`, `BargeSize`, `Capacity`, `TugPower`, `BargingJettyIdStart`, `BargingJettyIdEnd`, `StartDate`, `EndDate`, `TotalQuantity`, `QuantityUnit`, `Price`, `id_currency`, `fuel_price`, `status`, `created_date`, `created_user`, `ip_user_updated`) VALUES
(1, '12', 100, 30387, 1770001, 1601008, 0, 0.0000, 0, 20001, 30004, '2015-01-16', '2015-01-20', 9000.0000, 'MT', 0.00, 0, 0.00, 'HIDE', '2015-01-20 20:15:55', 'admin', '::1'),
(3, '12', 100, 2100000013, 1770002, 1601006, 0, 0.0000, 0, 20003, 110001, '2015-01-07', '2015-01-22', 6500.0000, 'MT', 0.00, 0, 0.00, 'SHOW', '2015-01-21 04:31:40', 'admin', '::1'),
(4, '77', 100, 463, 1770003, 1601004, 0, 0.0000, 0, 20003, 120001, '2015-01-01', '2015-01-17', 6500.0000, 'MT', 0.00, 0, 0.00, 'HIDE', '2015-01-21 04:32:15', 'admin', '::1'),
(5, '12', 100, 2100000002, 1770007, 1601001, 0, 0.0000, 0, 20001, 70002, '2015-01-01', '2015-01-07', 4500.0000, 'MT', 0.00, 0, 0.00, 'HIDE', '2015-01-21 11:39:00', 'admin', '::1'),
(6, '11', 100, 2100000006, 1770001, 1601008, 0, 0.0000, 0, 20002, 70002, '2015-03-11', '2015-03-20', 7500.0000, 'MT', 0.00, 0, 0.00, 'SHOW', '2015-01-21 12:56:20', 'admin', '::1'),
(7, '2', 100, 2100000013, 1770003, 1601004, 0, 0.0000, 0, 20001, 120001, '2015-02-10', '2015-02-19', 5000.0000, 'MT', 0.00, 0, 0.00, 'HIDE', '2015-01-22 04:23:24', 'admin', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `id_warehouse` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id_warehouse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `warehouse`
--

INSERT INTO `warehouse` (`id_warehouse`, `warehouse_name`, `address`, `is_active`) VALUES
(1, 'Gudang 1 - PAMI', 'Banjar', 1),
(2, 'Gudang 2 - PAMI', 'Banjar', 1),
(3, 'Gudang 3 - PAMI', 'Banjar', 1);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `currency_change_history`
--
ALTER TABLE `currency_change_history`
  ADD CONSTRAINT `currency_change_history_ibfk_1` FOREIGN KEY (`id_currency`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_currency`) REFERENCES `currency` (`id_currency`);

--
-- Ketidakleluasaan untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`id_currency`) REFERENCES `currency` (`id_currency`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
