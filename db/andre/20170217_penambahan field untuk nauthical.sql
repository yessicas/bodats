ALTER TABLE  `sailing_order` ADD  `NauticalMilIncentive` BIGINT NOT NULL AFTER  `LayTime`;

INSERT INTO `fleet`.`setting_general` (`id_setting_general`, `field_name`, `field_value`) VALUES ('20', 'STANDARD INCENTIVE NAUTICAL', '10000');