CREATE DATABASE `comments`;

use `comments`;

CREATE TABLE `comments`.`comments` (
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`nick` VARCHAR( 40 ) NOT NULL ,
	`content` TEXT NOT NULL 
) ENGINE = MYISAM ;
