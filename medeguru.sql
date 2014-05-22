-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for medeguru_db
CREATE DATABASE IF NOT EXISTS `medeguru_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `medeguru_db`;


-- Dumping structure for table medeguru_db.dir_city
CREATE TABLE IF NOT EXISTS `dir_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `city_name` varchar(200) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_id` (`state_id`),
  KEY `cityuniqu` (`city_name`,`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.dir_country
CREATE TABLE IF NOT EXISTS `dir_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `iso` char(2) NOT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.dir_images
CREATE TABLE IF NOT EXISTS `dir_images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(300) NOT NULL,
  `alt` varchar(300) DEFAULT NULL,
  `imgof` int(11) NOT NULL,
  PRIMARY KEY (`img_id`),
  KEY `imgref` (`imgof`),
  CONSTRAINT `imgref` FOREIGN KEY (`imgof`) REFERENCES `dir_singlefill` (`matfil_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.dir_matter
CREATE TABLE IF NOT EXISTS `dir_matter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `desc` varchar(1000) DEFAULT NULL,
  `dir_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`dir_type`),
  CONSTRAINT `type` FOREIGN KEY (`dir_type`) REFERENCES `dir_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.dir_phone
CREATE TABLE IF NOT EXISTS `dir_phone` (
  `ph_id` int(11) NOT NULL AUTO_INCREMENT,
  `phno` varchar(25) NOT NULL,
  `sub_fil_id` int(11) NOT NULL,
  PRIMARY KEY (`ph_id`),
  KEY `filref` (`sub_fil_id`),
  CONSTRAINT `filref` FOREIGN KEY (`sub_fil_id`) REFERENCES `dir_singlefill` (`matfil_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.dir_singlefill
CREATE TABLE IF NOT EXISTS `dir_singlefill` (
  `matfil_id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `pro_pic` int(11) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `pin` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`matfil_id`),
  KEY `propic` (`pro_pic`),
  KEY `mainsub` (`mat_id`),
  KEY `state` (`state_id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `mainsub` FOREIGN KEY (`mat_id`) REFERENCES `dir_matter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `propic` FOREIGN KEY (`pro_pic`) REFERENCES `dir_images` (`img_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `state` FOREIGN KEY (`state_id`) REFERENCES `dir_state` (`state_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.dir_specilist
CREATE TABLE IF NOT EXISTS `dir_specilist` (
  `spid` int(11) NOT NULL AUTO_INCREMENT,
  `sp_name` varchar(200) NOT NULL,
  PRIMARY KEY (`spid`),
  UNIQUE KEY `sp_name` (`sp_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.dir_state
CREATE TABLE IF NOT EXISTS `dir_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL DEFAULT '99',
  `state_name` char(150) NOT NULL,
  PRIMARY KEY (`state_id`),
  UNIQUE KEY `contrystate` (`country_id`,`state_name`),
  CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `dir_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.dir_type
CREATE TABLE IF NOT EXISTS `dir_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table medeguru_db.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
