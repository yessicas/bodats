ALTER TABLE  `quotation` ADD  `is_lumpsump` INT( 1 ) NOT NULL AFTER  `spal_created`;
ALTER TABLE  `quotation` ADD  `total_price` DOUBLE( 20, 2 ) NOT NULL AFTER  `is_lumpsump`;