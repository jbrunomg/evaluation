/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 5.7.31 : Database - evaluation
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`evaluation` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `idPermissions` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `permissions` text,
  `situation` tinyint(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idPermissions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `permissions` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(30) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` enum('Male','Female','Prefer not to say') DEFAULT NULL,
  `dateRegistre` date NOT NULL,
  `terms` int(11) NOT NULL DEFAULT '0',
  `newsletter` int(11) DEFAULT '0',
  `level` enum('Inactive','Active') NOT NULL DEFAULT 'Active',
  `permissions_id` int(11) NOT NULL,
  `dateOperation` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last update date',
  PRIMARY KEY (`idUsers`),
  KEY `fk_users_permissions_idx` (`permissions_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`idUsers`,`firstname`,`lastname`,`mobile`,`city`,`state`,`zip`,`email`,`password`,`gender`,`dateRegistre`,`terms`,`newsletter`,`level`,`permissions_id`,`dateOperation`) values 
(2,'Magnata','Guimaraes','',NULL,NULL,NULL,'bruno@wdmtecnologia.com.br','19130832ca9e411a746cda1f4d135012',NULL,'2021-11-02',1,0,'Active',0,'2021-11-02 20:21:02');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
