DROP DATABASE IF EXISTS `cakeshop`;
CREATE DATABASE `cakeshop`;
GRANT ALL ON cakeshop.* TO cakeshop@localhost IDENTIFIED BY 'cakeshop';
USE cakeshop;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `number` int(11) NOT NULL
);
INSERT INTO posts VALUES (1, 'KOPER', 6000);
INSERT INTO posts VALUES (2, 'PTUJ', 2250);
INSERT INTO posts VALUES (3, 'KOZINA', 6240);
INSERT INTO posts VALUES (4, 'BITOLA', 7000);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `emso` varchar(13) COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `role` varchar(20)  COLLATE utf8_slovenian_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_slovenian_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,    
  `phone` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,  
  `post_id` int(11),
  `active` BOOLEAN NOT NULL
);
INSERT INTO `users` 
VALUES (1, 'Sale', 'Man', '1000', 'salesman', '02a2e4d5c3b0eece95c5573144c3c5884984dc26', 'salesman', '2012-01-01', '2012-01-01', '','','','',NULL, TRUE);
INSERT INTO `users` VALUES (2, 'Admin', 'Man', '2000', 'admin', '77331e03b611712b5c0017a2f87f88550188d558', 'admin', '2012-01-01', '2012-01-01', '','','','',NULL, TRUE);
INSERT INTO `users` VALUES (3, 'Client', 'Best', '', 'client', 'ff269f8e9777f074c3465cba20154fa176e16e37', 'client', '2012-02-02 18:04:23', '2012-02-02 18:04:23','client@cakeshop.com','Soncni vrh 7','Kranj','060666666',0, TRUE);

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(128) COLLATE utf8_slovenian_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `published` BOOLEAN NOT NULL
);

INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('1','Zamora','dignissim lacus.','186','46','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('2','Barron','imperdiet','353','98','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('3','Riggs','ipsum','348','56','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('4','Giles','diam.','377','2','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('5','Watkins','odio','311','78','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('6','Dennis','sodales purus,','235','24','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('7','Roberts','vitae','149','16','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('8','Vincent','Phasellus in','197','80','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('9','Rogers','nonummy.','219','8','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('10','Ford','purus','297','81','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('11','Mullen','sapien.','51','63','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('12','Bell','malesuada','76','78','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('13','Finley','montes, nascetur','191','20','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('14','Dale','cursus in,','176','54','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('15','Norris','velit. Aliquam','70','58','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('16','Horne','eu','196','36','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('17','Richardson','ipsum','130','60','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('18','Barrett','Nunc pulvinar','277','37','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('19','Campbell','Vestibulum ante','289','2','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('20','Hansen','consectetuer, cursus','30','87','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('21','Marshall','ornare','39','80','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('22','Drake','id, mollis','326','90','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('23','Carver','tincidunt dui','79','63','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('24','Holt','id magna','265','49','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('25','Hester','sapien imperdiet','2','94','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('26','Cervantes','amet, faucibus','216','60','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('27','Erickson','mauris a','165','67','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('28','Carroll','dolor, tempus','309','2','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('29','Ray','Etiam','126','12','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('30','Sykes','nisi. Mauris','65','54','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('31','Foley','In at','299','24','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('32','Wyatt','per inceptos','322','92','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('33','Kline','auctor,','57','84','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('34','Haynes','facilisi. Sed','170','91','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('35','Velez','neque sed','120','96','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('36','Mcneil','interdum','170','100','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('37','Shelton','ac mi','42','80','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('38','Banks','eu','314','45','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('39','Lowery','primis in','304','27','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('40','Bowers','tincidunt,','379','50','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('41','Gibson','semper.','169','53','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('42','Preston','Donec','225','47','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('43','Flynn','dui nec','40','29','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('44','Powell','risus. Donec','386','60','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('45','Bradford','vitae, aliquet','7','63','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('46','Tate','magna. Nam','10','39','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('47','Casey','enim','111','69','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('48','Conley','tempor bibendum.','165','9','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('49','Blackwell','ipsum cursus','234','79','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('50','Green','lorem. Donec','135','90','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('51','Rutledge','facilisis non,','153','81','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('52','Joyner','velit justo','382','24','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('53','Tanner','Nullam','134','85','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('54','Bentley','purus ac','251','51','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('55','Robertson','turpis vitae','247','20','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('56','Blair','lorem','199','39','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('57','Fowler','tellus faucibus','94','83','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('58','Simpson','In faucibus.','179','6','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('59','Burton','eu','250','74','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('60','Townsend','Nulla tincidunt,','25','14','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('61','Browning','lobortis','376','71','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('62','Mccall','sed','73','25','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('63','Atkins','velit.','118','54','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('64','Hensley','magna et','179','29','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('65','Wolfe','ac','154','25','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('66','Wolfe','blandit','236','30','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('67','Mayo','mi tempor','174','6','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('68','Bullock','urna','205','38','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('69','West','Phasellus dolor','209','23','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('70','Savage','lacus,','257','60','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('71','Mcguire','rutrum urna,','305','17','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('72','Moody','lorem fringilla','208','18','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('73','Morton','Duis','348','81','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('74','Middleton','lobortis quis,','18','29','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('75','Ramos','porttitor','256','75','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('76','Robbins','magna','109','11','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('77','Benson','dui. Fusce','291','26','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('78','House','vulputate, posuere','98','78','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('79','Henson','rutrum','145','45','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('80','Little','et,','371','84','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('81','Trevino','non, vestibulum','187','89','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('82','Compton','eget varius','265','68','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('83','Fox','laoreet','97','37','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('84','Witt','a, aliquet','195','14','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('85','Evans','purus mauris','68','60','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('86','Salas','Sed molestie.','316','98','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('87','Stevens','aliquam','280','83','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('88','Rodriguez','amet','312','37','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('89','Lucas','aliquam','288','84','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('90','Gibbs','pede.','59','29','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('91','Roman','Nunc','18','88','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('92','Clemons','mauris, aliquam','104','46','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('93','Alston','Integer','354','2','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('94','Bullock','ante ipsum','49','28','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('95','Elliott','Curabitur vel','32','77','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('96','Kelley','a, scelerisque','164','60','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('97','Flynn','lorem, sit','141','4','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('98','Day','euismod','94','94','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('99','Mcneil','nec','135','17','1');
INSERT INTO `items` (`id`,`name`,`description`,`price`,`quantity`,`published`) VALUES ('100','Thomas','varius','229','52','1');


DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `state` int(2) NOT NULL);

DROP TABLE IF EXISTS `items_orders`;
CREATE TABLE `items_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL);

DROP TABLE IF EXISTS `items_users_ratings`;
CREATE TABLE `items_users_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL);

DROP TABLE IF EXISTS `item_images`;
CREATE TABLE `item_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `item_id` int(11) NOT NULL,
  `default` BOOLEAN NOT NULL,
  `image_url` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
);
