CREATE DATABASE `chat` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
CREATE TABLE `users` (
  `user_unique_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `img` varchar(400) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`user_unique_id`,`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;



CREATE TABLE `messages` (
  `msg_id` int NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` varchar(10000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=utf8;