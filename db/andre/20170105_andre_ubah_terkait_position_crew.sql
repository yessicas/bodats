INSERT INTO `fleetclone`.`crew_position` (`id_crew_position` ,`crew_position` ,`is_important` ,`minimum_req` ,`description`)
VALUES ('6', '3nd off ', '1', '0', 'Third Enginner Off');

INSERT INTO `fleetclone`.`crew_position` (`id_crew_position` ,`crew_position` ,`is_important` ,`minimum_req` ,`description`)
VALUES ('10', 'A/B 3', '1', '0', 'Crew Kapal 3');


UPDATE `fleetclone`.`crew_position` SET `id_crew_position` = '7' WHERE `crew_position`.`id_crew_position` =6;

UPDATE `fleetclone`.`crew_position` SET `id_crew_position` = '8' WHERE `crew_position`.`id_crew_position` =7;

UPDATE `fleetclone`.`crew_position` SET `id_crew_position` = '9' WHERE `crew_position`.`id_crew_position` =8;

UPDATE `fleetclone`.`crew_position` SET `id_crew_position` = '20' WHERE `crew_position`.`id_crew_position` =9;

INSERT INTO `fleetclone`.`crew_position` (
`id_crew_position` ,
`crew_position` ,
`is_important` ,
`minimum_req` ,
`description`
)
VALUES (
'10', 'A/B 3', '1', '0', 'Crew Kapal 3'
);

