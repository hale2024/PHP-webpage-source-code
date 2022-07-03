DROP DATABASE IF EXISTS `profiles`;
CREATE DATABASE `profiles` DEFAULT CHARACTER SET utf8mb4;
USE `profiles`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` char(64) NOT NULL UNIQUE,
  `user_password` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` char(64) NOT NULL,
  `profile_name` char(64) NOT NULL DEFAULT '',
  `profile_bio` char(255) NOT NULL DEFAULT '',
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
