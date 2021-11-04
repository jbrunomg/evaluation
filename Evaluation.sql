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

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `idCustomers` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(30) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `gender` enum('Male','Female','Prefer not to say') DEFAULT NULL,
  `dateRegistre` date NOT NULL,
  `dateOperation` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last update date',
  PRIMARY KEY (`idCustomers`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`idCustomers`,`firstname`,`lastname`,`mobile`,`city`,`state`,`zip`,`email`,`gender`,`dateRegistre`,`dateOperation`) values 
(1,'Padro','Paulo','34391266','Olinda','Michigan','50050350','bruno@wdmtecnologia.com.br','Female','0000-00-00','2021-11-03 22:55:43');

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

/*Table structure for table `subordinate` */

DROP TABLE IF EXISTS `subordinate`;

CREATE TABLE `subordinate` (
  `idSubordinate` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `gender` enum('Male','Female','Prefer not to say') DEFAULT NULL,
  `dateRegistre` date NOT NULL,
  `customers_id` int(11) NOT NULL,
  `dateOperation` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last update date',
  PRIMARY KEY (`idSubordinate`),
  KEY `fk_subordinate_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subordinate` */

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
  `dateOperation` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last update date',
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`idUsers`,`firstname`,`lastname`,`mobile`,`city`,`state`,`zip`,`email`,`password`,`gender`,`dateRegistre`,`terms`,`newsletter`,`level`,`dateOperation`) values 
(2,'Magnata','Magnata','8134391266','Olinda','Oklahoma','53025120','bruno@wdmtecnologia.com.br','de88bb541bba145feec56d3c34f9c506','Male','2021-11-02',1,NULL,'Active','2021-11-03 20:59:13'),
(3,'fsfs','fsf','656565','SAO PAULO','Michigan','03.658-000','bruno@gmail.com','d41d8cd98f00b204e9800998ecf8427e','Male','0000-00-00',0,1,'Active','2021-11-03 20:38:15'),
(4,'Jadiel','Jadiel','81997724000','Olinda','New York','53025120','jbrunomg@hotmail.com','d41d8cd98f00b204e9800998ecf8427e','Male','0000-00-00',0,1,'Active','2021-11-03 20:48:57');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
