ALTER TABLE  `purchase_request` ADD  `approval_level` INT( 2 ) NOT NULL DEFAULT  '0' AFTER  `Status`;

ALTER TABLE  `purchase_request` ADD  `is_approved` INT( 1 ) NOT NULL DEFAULT  '0' AFTER  `approval_level`;

ALTER TABLE  `purchase_request` ADD `is_approved2` int(1) NOT NULL DEFAULT '0' AFTER  `approval_notes`;
ALTER TABLE  `purchase_request` ADD  `approved_user2` varchar(45) NOT NULL AFTER  `is_approved2`;
ALTER TABLE  `purchase_request` ADD  `approval_date2` datetime NOT NULL AFTER  `approved_user2`;
ALTER TABLE  `purchase_request` ADD `ip_user_approved2` varchar(50) NOT NULL AFTER  `approval_date2`;
ALTER TABLE  `purchase_request` ADD `approval_notes2` varchar(250) NOT NULL AFTER  `ip_user_approved2`;

ALTER TABLE  `purchase_request` ADD `is_approved3` int(1) NOT NULL DEFAULT '0' AFTER  `approval_notes2`;
ALTER TABLE  `purchase_request` ADD  `approved_user3` varchar(45) NOT NULL AFTER  `is_approved3`;
ALTER TABLE  `purchase_request` ADD  `approval_date3` datetime NOT NULL AFTER  `approved_user3`;
ALTER TABLE  `purchase_request` ADD `ip_user_approved3` varchar(50) NOT NULL AFTER  `approval_date3`;
ALTER TABLE  `purchase_request` ADD `approval_notes3` varchar(250) NOT NULL AFTER  `ip_user_approved3`;

INSERT INTO  `authitem` (
`name` ,
`type` ,
`description` ,
`bizrule` ,
`data`
)
VALUES (
'DRO',  '',  'Operational Director', NULL , NULL
), (
'GMO',  '',  'General Manager Operation', NULL , NULL
);