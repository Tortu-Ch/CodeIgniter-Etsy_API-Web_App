/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.7.24 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `productitem` (
	`id` int (11),
	`reservationId` int (11),
	`category_id` int (11),
	`category_name` text ,
	`listing_id` int (11),
	`title` text ,
	`price` text ,
	`currency_code` text ,
	`url` text 
); 
