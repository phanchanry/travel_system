/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.27 : Database - travel_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`travel_system` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `travel_system`;

/*Table structure for table `ts_location` */

DROP TABLE IF EXISTS `ts_location`;

CREATE TABLE `ts_location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `ts_location_title` varchar(45) NOT NULL,
  `ts_location_description` text NOT NULL,
  `ts_lat` decimal(10,6) NOT NULL,
  `ts_lon` decimal(10,6) NOT NULL,
  `ts_location_photo` varchar(150) NOT NULL,
  `ts_trip_key` int(11) NOT NULL DEFAULT '-1',
  `ts_location_type` char(1) NOT NULL DEFAULT '1' COMMENT '1:place category location, 2: plan trip location',
  `ts_created_time` varchar(19) NOT NULL,
  `ts_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `ts_location` */

insert  into `ts_location`(`location_id`,`category_id`,`ts_location_title`,`ts_location_description`,`ts_lat`,`ts_lon`,`ts_location_photo`,`ts_trip_key`,`ts_location_type`,`ts_created_time`,`ts_updated_time`) values (1,0,'Manchester, United Kingdom','','53.480759','-2.242631','',168566671,'2','2015-02-17 16:48:41','2015-02-17 16:48:41'),(2,0,'Leeds, United Kingdom','','53.800755','-1.549077','',168566671,'2','2015-02-17 16:48:55','2015-02-17 16:48:55'),(3,0,'Manchester, United Kingdom','','53.480759','-2.242631','',926255333,'2','2015-02-17 19:52:43','2015-02-17 19:52:43'),(4,0,'Leeds, United Kingdom','','53.800755','-1.549077','',926255333,'2','2015-02-17 19:52:47','2015-02-17 19:52:47'),(5,0,'Tamil Nadu, India','','11.127123','78.656894','',388118576,'2','2015-03-04 23:52:50','2015-03-04 23:52:50'),(6,0,'Ariyalur, Tamil Nadu, India','','11.151111','79.076111','',388118576,'2','2015-03-04 23:53:12','2015-03-04 23:53:12'),(7,0,'ATM, National Highway 1, Phnom Penh, Cambodia','','11.531408','104.939455','',418797479,'2','2015-04-02 14:30:16','2015-04-02 14:30:16'),(8,0,'Tamil Nadu, India','','11.127123','78.656894','',528418297,'2','2015-04-03 02:03:24','2015-04-03 02:03:24');

/*Table structure for table `ts_place_category` */

DROP TABLE IF EXISTS `ts_place_category`;

CREATE TABLE `ts_place_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ts_category_title` varchar(100) NOT NULL,
  `ts_category_marker` varchar(200) NOT NULL,
  `ts_category_image` varchar(200) NOT NULL,
  `ts_created_time` varchar(19) NOT NULL,
  `ts_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ts_place_category` */

insert  into `ts_place_category`(`category_id`,`user_id`,`ts_category_title`,`ts_category_marker`,`ts_category_image`,`ts_created_time`,`ts_updated_time`) values (1,3,'test1 category','http://travel_system.loc/assets/upload/category_image/KG6SDa1_1427816325.jpg','http://travel_system.loc/assets/upload/marker_image/kce4wR4_1427816327.jpg','2015-03-31 22:38:48','2015-03-31 22:38:48');

/*Table structure for table `ts_plan_trip` */

DROP TABLE IF EXISTS `ts_plan_trip`;

CREATE TABLE `ts_plan_trip` (
  `trip_id` int(11) NOT NULL,
  `ts_created_time` varchar(19) NOT NULL,
  `ts_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ts_plan_trip` */

/*Table structure for table `ts_trip_location` */

DROP TABLE IF EXISTS `ts_trip_location`;

CREATE TABLE `ts_trip_location` (
  `trip_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `ts_created_time` varchar(19) NOT NULL,
  `ts_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`trip_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ts_trip_location` */

/*Table structure for table `ts_user` */

DROP TABLE IF EXISTS `ts_user`;

CREATE TABLE `ts_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `ts_name` varchar(45) NOT NULL,
  `ts_email` varchar(45) NOT NULL,
  `ts_password` varchar(150) NOT NULL,
  `ts_salt` varchar(25) NOT NULL,
  `ts_is_admin` char(1) NOT NULL DEFAULT 'N' COMMENT 'N: general user,Y: admin',
  `ts_created_time` varchar(19) NOT NULL,
  `ts_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `ts_user` */

insert  into `ts_user`(`user_id`,`ts_name`,`ts_email`,`ts_password`,`ts_salt`,`ts_is_admin`,`ts_created_time`,`ts_updated_time`) values (1,'laura','laura_pretty0@hotmail.com','5dbef45cb3bb567f8d753e7cb4cad3a1','qso35rdaC','N','2015-02-17 20:16:46','2015-02-17 20:16:46'),(2,'a','a@hotmail.com','5e546b03220ebdeafc1315e3b7409cac','3OdMQpOCi','N','2015-02-22 19:27:47','2015-02-22 19:27:47'),(3,'admin','admin@gmail.com','40035100b1a818ffafe8438364a1977e','fc66OWwLX','Y','2015-03-05 00:04:57','2015-03-05 00:04:57'),(4,'test1','test11@gmail.com','e5910e6285a695675bdf70f8b10025fe','zM6emrKTO','N','2015-03-05 00:06:31','2015-03-05 00:06:31'),(5,'asd','test2@gmail.com','8dacef796feceefcf96d621396386ebb','759bbLDZe','N','2015-03-05 04:39:20','2015-03-05 04:39:20'),(6,'asdf','tea@asdf.com','97758afb5f1b0621a4834dd86c9066ca','yRjIQgIty','N','2015-03-05 09:17:16','2015-03-05 09:17:16'),(7,'test123','test123@gmail.com','51eee957e60e5f1504509eeb7ff7132f','ckx69OksM','Y','2015-03-31 20:39:56','2015-03-31 20:39:56');

/*Table structure for table `ts_user_trip` */

DROP TABLE IF EXISTS `ts_user_trip`;

CREATE TABLE `ts_user_trip` (
  `user_trip_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trip_key` int(11) NOT NULL,
  `ts_trip_title` varchar(128) NOT NULL,
  `ts_description` text,
  `ts_page_title` varchar(256) NOT NULL,
  `ts_created_time` varchar(19) NOT NULL,
  `ts_updated_time` varchar(19) NOT NULL,
  PRIMARY KEY (`user_trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ts_user_trip` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
