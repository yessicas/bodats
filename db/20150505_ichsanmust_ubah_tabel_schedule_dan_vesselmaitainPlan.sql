ALTER TABLE  `schedule` ADD  `id_vessel_maintenance_plan` BIGINT( 20 ) NOT NULL AFTER  `id_so_offhired_order`;
ALTER TABLE  `vessel_maintenance_plan` ADD  `repair_no` VARCHAR( 50 ) NOT NULL AFTER  `id_vessel_maintenance_plan`;
ALTER TABLE  `vessel_maintenance_plan` ADD  `No` INT( 11 ) NOT NULL AFTER  `repair_no`;
ALTER TABLE  `vessel_maintenance_plan` ADD  `NoMonth` INT( 2 ) NOT NULL AFTER  `No`;
ALTER TABLE  `vessel_maintenance_plan` ADD  `NoYear` INT( 4 ) NOT NULL AFTER  `NoMonth`