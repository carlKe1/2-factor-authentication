CREATE TABLE `test`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `username` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(255) NOT NULL ,
    `password` VARCHAR(255) NOT NULL ,
    `otp` VARCHAR(6) NOT NULL ,
    `otp_expiry` TIMESTAMP(6) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;