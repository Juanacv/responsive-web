CREATE DATABASE `users`
CREATE TABLE `login_information` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL DEFAULT '0',
	`pass` VARCHAR(50) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
INSERT INTO `users`.`login_information` (`name`) VALUES ('test_user');
INSERT INTO `users`.`login_information` (`pass`) VALUES ('test_password');