ALTER TABLE  `purchase_request_detail` ADD  `attachment` VARCHAR( 250 ) NOT NULL AFTER  `requested_user`;

ALTER TABLE  `timesheet` ADD  `timesheet_desc` VARCHAR( 150 ) NOT NULL AFTER  `id_mst_timesheet_summary`;