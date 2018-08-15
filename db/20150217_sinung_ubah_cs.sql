ALTER TABLE  `consumable_stock_item` ADD  `category` SET(  'PART',  'CS',  'ASSET' ) NOT NULL ,
ADD  `impa` VARCHAR( 200 ) NOT NULL;
ALTER TABLE  `consumable_stock_item` ADD INDEX (  `category` ) ;

UPDATE `consumable_stock_item` SET `category` = 'CS';

UPDATE  `cpanel_leftmenu` SET  `url` =  'consumablestockitem/admin' WHERE  `cpanel_leftmenu`.`id_leftmenu` =33001;