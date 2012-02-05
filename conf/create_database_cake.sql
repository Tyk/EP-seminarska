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

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(128) COLLATE utf8_slovenian_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `published` BOOLEAN NOT NULL
);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `state` varchar(20) COLLATE utf8_slovenian_ci NOT NULL);

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

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `item_id` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
);

