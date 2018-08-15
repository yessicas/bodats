INSERT INTO `setting_invoice_report` (`id_setting_quotation_report`, `field_name`, `field_value`) VALUES ('4', 'Default Invoice Number', '2300000000');

ALTER TABLE `invoice_voyage` ADD `InvoiceNumberInt` BIGINT NOT NULL AFTER `InvoiceNumber` ;

CREATE TABLE IF NOT EXISTS `numbering_invoice` (
  `id_numbering` bigint(20) NOT NULL AUTO_INCREMENT,
  `number` bigint(20) NOT NULL,
  `status` set('NOT TAKEN','MANUAL TAKE','AUTOMATIC TAKE') NOT NULL DEFAULT 'NOT TAKEN',
  `notes` varchar(250) DEFAULT NULL,
  `is_initial` int(1) NOT NULL DEFAULT '0',
  `id_invoice_voyage` bigint(20) DEFAULT NULL,
  `taken_date` datetime NOT NULL,
  `user_taken` varchar(45) NOT NULL,
  `ip_user_taken` varchar(50) NOT NULL,
  KEY `id_numbering_invoice` (`id_numbering`),
  KEY `invoice_number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `numbering_faktur` (
  `id_numbering_faktur` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_number` varchar(150) NOT NULL,
  `last_number` bigint(20) NOT NULL,
  `status` set('NOT TAKEN','TAKE') NOT NULL DEFAULT 'NOT TAKEN',
  `notes` varchar(250) DEFAULT NULL,
  `taken_date` datetime NOT NULL,
  `user_taken` varchar(45) NOT NULL,
  `ip_user_taken` varchar(50) NOT NULL,
  KEY `id_numbering_faktur` (`id_numbering_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `numbering_faktur_firstnumber` (
  `id_numbering_faktur_first` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_number` varchar(150) NOT NULL,
  `last_number` bigint(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `user_create` varchar(45) NOT NULL,
  `ip_user_create` varchar(50) NOT NULL,
  KEY `id_numbering_faktur_first` (`id_numbering_faktur_first`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE  `numbering_invoice` CHANGE  `number`  `number_invoice` BIGINT( 20 ) NOT NULL;

ALTER TABLE  `numbering_invoice` ADD  `number_invoice_complete` VARCHAR( 150 ) NOT NULL AFTER  `number_invoice`


CREATE TABLE IF NOT EXISTS `numbering_faktur_allocation` (
  `id_numbering_faktur_allocation` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `first_number` varchar(100) NOT NULL,
  `last_number` varchar(100) NOT NULL,
  `prefix_number` varchar(100) NOT NULL,
  `first_number_int` int(11) NOT NULL,
  `last_number_int` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `user_create` varchar(45) NOT NULL,
  `ip_user_create` varchar(50) NOT NULL,
  KEY `id_numbering_faktur_allocation` (`id_numbering_faktur_allocation`)
 )
 
 ALTER TABLE `numbering_faktur_allocation` ADD `allocation_date` DATE NOT NULL AFTER `id_numbering_faktur_allocation`;
 
 ALTER TABLE  `numbering_faktur` ADD  `id_numbering_faktur_allocation` BIGINT NOT NULL AFTER  `id_numbering_faktur`;
 
 ALTER TABLE  `numbering_faktur` ADD INDEX (  `id_numbering_faktur_allocation` ) ;
 
 ALTER TABLE  `numbering_faktur` CHANGE  `status`  `status` SET(  'NOT TAKEN',  'TAKE',  'RESERVE',  'USED' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT  'NOT TAKEN'

 ALTER TABLE  `numbering_faktur` ADD  `number_faktur_complete` VARCHAR( 150 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER  `status`