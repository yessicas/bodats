ALTER TABLE  `purchase_order` ADD  `Status_approval` INT( 1 ) NOT NULL AFTER  `Status`;
ALTER TABLE  `purchase_order` ADD  `approved_user` VARCHAR( 45 ) NOT NULL AFTER  `Status_approval`;
ALTER TABLE  `purchase_order` ADD  `approval_date` DATETIME NOT NULL AFTER  `approved_user`;
ALTER TABLE  `purchase_order` ADD  `ip_user_approved` VARCHAR( 50 ) NOT NULL AFTER  `approval_date`;
ALTER TABLE  `purchase_order` ADD  `approval_notes` VARCHAR( 250 ) NOT NULL AFTER  `ip_user_approved`;