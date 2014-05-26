-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.8 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4766
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_city: ~2 rows (approximately)
DELETE FROM `dir_city`;
/*!40000 ALTER TABLE `dir_city` DISABLE KEYS */;
INSERT INTO `dir_city` (`city_id`, `state_id`, `city_name`) VALUES
	(1, 3, 'Kochi'),
	(2, 3, 'Thrissur');
/*!40000 ALTER TABLE `dir_city` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_country
CREATE TABLE IF NOT EXISTS `dir_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `iso` char(2) NOT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_country: ~239 rows (approximately)
DELETE FROM `dir_country`;
/*!40000 ALTER TABLE `dir_country` DISABLE KEYS */;
INSERT INTO `dir_country` (`id`, `name`, `iso`, `phonecode`) VALUES
	(1, 'AFGHANISTAN', 'AF', 93),
	(2, 'ALBANIA', 'AL', 355),
	(3, 'ALGERIA', 'DZ', 213),
	(4, 'AMERICAN SAMOA', 'AS', 1684),
	(5, 'ANDORRA', 'AD', 376),
	(6, 'ANGOLA', 'AO', 244),
	(7, 'ANGUILLA', 'AI', 1264),
	(8, 'ANTARCTICA', 'AQ', 0),
	(9, 'ANTIGUA AND BARBUDA', 'AG', 1268),
	(10, 'ARGENTINA', 'AR', 54),
	(11, 'ARMENIA', 'AM', 374),
	(12, 'ARUBA', 'AW', 297),
	(13, 'AUSTRALIA', 'AU', 61),
	(14, 'AUSTRIA', 'AT', 43),
	(15, 'AZERBAIJAN', 'AZ', 994),
	(16, 'BAHAMAS', 'BS', 1242),
	(17, 'BAHRAIN', 'BH', 973),
	(18, 'BANGLADESH', 'BD', 880),
	(19, 'BARBADOS', 'BB', 1246),
	(20, 'BELARUS', 'BY', 375),
	(21, 'BELGIUM', 'BE', 32),
	(22, 'BELIZE', 'BZ', 501),
	(23, 'BENIN', 'BJ', 229),
	(24, 'BERMUDA', 'BM', 1441),
	(25, 'BHUTAN', 'BT', 975),
	(26, 'BOLIVIA', 'BO', 591),
	(27, 'BOSNIA AND HERZEGOVINA', 'BA', 387),
	(28, 'BOTSWANA', 'BW', 267),
	(29, 'BOUVET ISLAND', 'BV', 0),
	(30, 'BRAZIL', 'BR', 55),
	(31, 'BRITISH INDIAN OCEAN TERRITORY', 'IO', 246),
	(32, 'BRUNEI DARUSSALAM', 'BN', 673),
	(33, 'BULGARIA', 'BG', 359),
	(34, 'BURKINA FASO', 'BF', 226),
	(35, 'BURUNDI', 'BI', 257),
	(36, 'CAMBODIA', 'KH', 855),
	(37, 'CAMEROON', 'CM', 237),
	(38, 'CANADA', 'CA', 1),
	(39, 'CAPE VERDE', 'CV', 238),
	(40, 'CAYMAN ISLANDS', 'KY', 1345),
	(41, 'CENTRAL AFRICAN REPUBLIC', 'CF', 236),
	(42, 'CHAD', 'TD', 235),
	(43, 'CHILE', 'CL', 56),
	(44, 'CHINA', 'CN', 86),
	(45, 'CHRISTMAS ISLAND', 'CX', 61),
	(46, 'COCOS (KEELING) ISLANDS', 'CC', 672),
	(47, 'COLOMBIA', 'CO', 57),
	(48, 'COMOROS', 'KM', 269),
	(49, 'CONGO', 'CG', 242),
	(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'CD', 242),
	(51, 'COOK ISLANDS', 'CK', 682),
	(52, 'COSTA RICA', 'CR', 506),
	(53, 'COTE D\'IVOIRE', 'CI', 225),
	(54, 'CROATIA', 'HR', 385),
	(55, 'CUBA', 'CU', 53),
	(56, 'CYPRUS', 'CY', 357),
	(57, 'CZECH REPUBLIC', 'CZ', 420),
	(58, 'DENMARK', 'DK', 45),
	(59, 'DJIBOUTI', 'DJ', 253),
	(60, 'DOMINICA', 'DM', 1767),
	(61, 'DOMINICAN REPUBLIC', 'DO', 1809),
	(62, 'ECUADOR', 'EC', 593),
	(63, 'EGYPT', 'EG', 20),
	(64, 'EL SALVADOR', 'SV', 503),
	(65, 'EQUATORIAL GUINEA', 'GQ', 240),
	(66, 'ERITREA', 'ER', 291),
	(67, 'ESTONIA', 'EE', 372),
	(68, 'ETHIOPIA', 'ET', 251),
	(69, 'FALKLAND ISLANDS (MALVINAS)', 'FK', 500),
	(70, 'FAROE ISLANDS', 'FO', 298),
	(71, 'FIJI', 'FJ', 679),
	(72, 'FINLAND', 'FI', 358),
	(73, 'FRANCE', 'FR', 33),
	(74, 'FRENCH GUIANA', 'GF', 594),
	(75, 'FRENCH POLYNESIA', 'PF', 689),
	(76, 'FRENCH SOUTHERN TERRITORIES', 'TF', 0),
	(77, 'GABON', 'GA', 241),
	(78, 'GAMBIA', 'GM', 220),
	(79, 'GEORGIA', 'GE', 995),
	(80, 'GERMANY', 'DE', 49),
	(81, 'GHANA', 'GH', 233),
	(82, 'GIBRALTAR', 'GI', 350),
	(83, 'GREECE', 'GR', 30),
	(84, 'GREENLAND', 'GL', 299),
	(85, 'GRENADA', 'GD', 1473),
	(86, 'GUADELOUPE', 'GP', 590),
	(87, 'GUAM', 'GU', 1671),
	(88, 'GUATEMALA', 'GT', 502),
	(89, 'GUINEA', 'GN', 224),
	(90, 'GUINEA-BISSAU', 'GW', 245),
	(91, 'GUYANA', 'GY', 592),
	(92, 'HAITI', 'HT', 509),
	(93, 'HEARD ISLAND AND MCDONALD ISLANDS', 'HM', 0),
	(94, 'HOLY SEE (VATICAN CITY STATE)', 'VA', 39),
	(95, 'HONDURAS', 'HN', 504),
	(96, 'HONG KONG', 'HK', 852),
	(97, 'HUNGARY', 'HU', 36),
	(98, 'ICELAND', 'IS', 354),
	(99, 'INDIA', 'IN', 91),
	(100, 'INDONESIA', 'ID', 62),
	(101, 'IRAN, ISLAMIC REPUBLIC OF', 'IR', 98),
	(102, 'IRAQ', 'IQ', 964),
	(103, 'IRELAND', 'IE', 353),
	(104, 'ISRAEL', 'IL', 972),
	(105, 'ITALY', 'IT', 39),
	(106, 'JAMAICA', 'JM', 1876),
	(107, 'JAPAN', 'JP', 81),
	(108, 'JORDAN', 'JO', 962),
	(109, 'KAZAKHSTAN', 'KZ', 7),
	(110, 'KENYA', 'KE', 254),
	(111, 'KIRIBATI', 'KI', 686),
	(112, 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'KP', 850),
	(113, 'KOREA, REPUBLIC OF', 'KR', 82),
	(114, 'KUWAIT', 'KW', 965),
	(115, 'KYRGYZSTAN', 'KG', 996),
	(116, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'LA', 856),
	(117, 'LATVIA', 'LV', 371),
	(118, 'LEBANON', 'LB', 961),
	(119, 'LESOTHO', 'LS', 266),
	(120, 'LIBERIA', 'LR', 231),
	(121, 'LIBYAN ARAB JAMAHIRIYA', 'LY', 218),
	(122, 'LIECHTENSTEIN', 'LI', 423),
	(123, 'LITHUANIA', 'LT', 370),
	(124, 'LUXEMBOURG', 'LU', 352),
	(125, 'MACAO', 'MO', 853),
	(126, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'MK', 389),
	(127, 'MADAGASCAR', 'MG', 261),
	(128, 'MALAWI', 'MW', 265),
	(129, 'MALAYSIA', 'MY', 60),
	(130, 'MALDIVES', 'MV', 960),
	(131, 'MALI', 'ML', 223),
	(132, 'MALTA', 'MT', 356),
	(133, 'MARSHALL ISLANDS', 'MH', 692),
	(134, 'MARTINIQUE', 'MQ', 596),
	(135, 'MAURITANIA', 'MR', 222),
	(136, 'MAURITIUS', 'MU', 230),
	(137, 'MAYOTTE', 'YT', 269),
	(138, 'MEXICO', 'MX', 52),
	(139, 'MICRONESIA, FEDERATED STATES OF', 'FM', 691),
	(140, 'MOLDOVA, REPUBLIC OF', 'MD', 373),
	(141, 'MONACO', 'MC', 377),
	(142, 'MONGOLIA', 'MN', 976),
	(143, 'MONTSERRAT', 'MS', 1664),
	(144, 'MOROCCO', 'MA', 212),
	(145, 'MOZAMBIQUE', 'MZ', 258),
	(146, 'MYANMAR', 'MM', 95),
	(147, 'NAMIBIA', 'NA', 264),
	(148, 'NAURU', 'NR', 674),
	(149, 'NEPAL', 'NP', 977),
	(150, 'NETHERLANDS', 'NL', 31),
	(151, 'NETHERLANDS ANTILLES', 'AN', 599),
	(152, 'NEW CALEDONIA', 'NC', 687),
	(153, 'NEW ZEALAND', 'NZ', 64),
	(154, 'NICARAGUA', 'NI', 505),
	(155, 'NIGER', 'NE', 227),
	(156, 'NIGERIA', 'NG', 234),
	(157, 'NIUE', 'NU', 683),
	(158, 'NORFOLK ISLAND', 'NF', 672),
	(159, 'NORTHERN MARIANA ISLANDS', 'MP', 1670),
	(160, 'NORWAY', 'NO', 47),
	(161, 'OMAN', 'OM', 968),
	(162, 'PAKISTAN', 'PK', 92),
	(163, 'PALAU', 'PW', 680),
	(164, 'PALESTINIAN TERRITORY, OCCUPIED', 'PS', 970),
	(165, 'PANAMA', 'PA', 507),
	(166, 'PAPUA NEW GUINEA', 'PG', 675),
	(167, 'PARAGUAY', 'PY', 595),
	(168, 'PERU', 'PE', 51),
	(169, 'PHILIPPINES', 'PH', 63),
	(170, 'PITCAIRN', 'PN', 0),
	(171, 'POLAND', 'PL', 48),
	(172, 'PORTUGAL', 'PT', 351),
	(173, 'PUERTO RICO', 'PR', 1787),
	(174, 'QATAR', 'QA', 974),
	(175, 'REUNION', 'RE', 262),
	(176, 'ROMANIA', 'RO', 40),
	(177, 'RUSSIAN FEDERATION', 'RU', 70),
	(178, 'RWANDA', 'RW', 250),
	(179, 'SAINT HELENA', 'SH', 290),
	(180, 'SAINT KITTS AND NEVIS', 'KN', 1869),
	(181, 'SAINT LUCIA', 'LC', 1758),
	(182, 'SAINT PIERRE AND MIQUELON', 'PM', 508),
	(183, 'SAINT VINCENT AND THE GRENADINES', 'VC', 1784),
	(184, 'SAMOA', 'WS', 684),
	(185, 'SAN MARINO', 'SM', 378),
	(186, 'SAO TOME AND PRINCIPE', 'ST', 239),
	(187, 'SAUDI ARABIA', 'SA', 966),
	(188, 'SENEGAL', 'SN', 221),
	(189, 'SERBIA AND MONTENEGRO', 'CS', 381),
	(190, 'SEYCHELLES', 'SC', 248),
	(191, 'SIERRA LEONE', 'SL', 232),
	(192, 'SINGAPORE', 'SG', 65),
	(193, 'SLOVAKIA', 'SK', 421),
	(194, 'SLOVENIA', 'SI', 386),
	(195, 'SOLOMON ISLANDS', 'SB', 677),
	(196, 'SOMALIA', 'SO', 252),
	(197, 'SOUTH AFRICA', 'ZA', 27),
	(198, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'GS', 0),
	(199, 'SPAIN', 'ES', 34),
	(200, 'SRI LANKA', 'LK', 94),
	(201, 'SUDAN', 'SD', 249),
	(202, 'SURINAME', 'SR', 597),
	(203, 'SVALBARD AND JAN MAYEN', 'SJ', 47),
	(204, 'SWAZILAND', 'SZ', 268),
	(205, 'SWEDEN', 'SE', 46),
	(206, 'SWITZERLAND', 'CH', 41),
	(207, 'SYRIAN ARAB REPUBLIC', 'SY', 963),
	(208, 'TAIWAN, PROVINCE OF CHINA', 'TW', 886),
	(209, 'TAJIKISTAN', 'TJ', 992),
	(210, 'TANZANIA, UNITED REPUBLIC OF', 'TZ', 255),
	(211, 'THAILAND', 'TH', 66),
	(212, 'TIMOR-LESTE', 'TL', 670),
	(213, 'TOGO', 'TG', 228),
	(214, 'TOKELAU', 'TK', 690),
	(215, 'TONGA', 'TO', 676),
	(216, 'TRINIDAD AND TOBAGO', 'TT', 1868),
	(217, 'TUNISIA', 'TN', 216),
	(218, 'TURKEY', 'TR', 90),
	(219, 'TURKMENISTAN', 'TM', 7370),
	(220, 'TURKS AND CAICOS ISLANDS', 'TC', 1649),
	(221, 'TUVALU', 'TV', 688),
	(222, 'UGANDA', 'UG', 256),
	(223, 'UKRAINE', 'UA', 380),
	(224, 'UNITED ARAB EMIRATES', 'AE', 971),
	(225, 'UNITED KINGDOM', 'GB', 44),
	(226, 'UNITED STATES', 'US', 1),
	(227, 'UNITED STATES MINOR OUTLYING ISLANDS', 'UM', 1),
	(228, 'URUGUAY', 'UY', 598),
	(229, 'UZBEKISTAN', 'UZ', 998),
	(230, 'VANUATU', 'VU', 678),
	(231, 'VENEZUELA', 'VE', 58),
	(232, 'VIET NAM', 'VN', 84),
	(233, 'VIRGIN ISLANDS, BRITISH', 'VG', 1284),
	(234, 'VIRGIN ISLANDS, U.S.', 'VI', 1340),
	(235, 'WALLIS AND FUTUNA', 'WF', 681),
	(236, 'WESTERN SAHARA', 'EH', 212),
	(237, 'YEMEN', 'YE', 967),
	(238, 'ZAMBIA', 'ZM', 260),
	(239, 'ZIMBABWE', 'ZW', 263);
/*!40000 ALTER TABLE `dir_country` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_images
CREATE TABLE IF NOT EXISTS `dir_images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(300) NOT NULL,
  `alt` varchar(300) DEFAULT NULL,
  `imgof` int(11) NOT NULL,
  PRIMARY KEY (`img_id`),
  KEY `imgref` (`imgof`),
  CONSTRAINT `imgref` FOREIGN KEY (`imgof`) REFERENCES `dir_matter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_images: ~1 rows (approximately)
DELETE FROM `dir_images`;
/*!40000 ALTER TABLE `dir_images` DISABLE KEYS */;
INSERT INTO `dir_images` (`img_id`, `img_url`, `alt`, `imgof`) VALUES
	(1, 'images/default.jpg', 'default', 1);
/*!40000 ALTER TABLE `dir_images` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_matter
CREATE TABLE IF NOT EXISTS `dir_matter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `degrees` varchar(200) DEFAULT NULL,
  `desc` varchar(1000) DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `dir_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`dir_type`),
  KEY `userid` (`addedby`),
  CONSTRAINT `userid` FOREIGN KEY (`addedby`) REFERENCES `dir_users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `type` FOREIGN KEY (`dir_type`) REFERENCES `dir_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_matter: ~7 rows (approximately)
DELETE FROM `dir_matter`;
/*!40000 ALTER TABLE `dir_matter` DISABLE KEYS */;
INSERT INTO `dir_matter` (`id`, `name`, `degrees`, `desc`, `addedby`, `dir_type`) VALUES
	(1, 'Aswanth', '', '', 1, 1),
	(9, 'Aswanth', '', '', 1, 1),
	(10, 'Aswanth', '', '', 1, 1),
	(11, 'Aswanth', '', '', 1, 1),
	(12, 'Aswanth', '', '', 1, 1),
	(13, 'Aswanth', 'Btech', 'situated in infopark', 1, 1),
	(14, 'Aswanth', 'btech', 'test', 1, 1);
/*!40000 ALTER TABLE `dir_matter` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_phone
CREATE TABLE IF NOT EXISTS `dir_phone` (
  `ph_id` int(11) NOT NULL AUTO_INCREMENT,
  `phno` varchar(25) NOT NULL,
  `sub_fil_id` int(11) NOT NULL,
  PRIMARY KEY (`ph_id`),
  UNIQUE KEY `phno_unique` (`phno`,`sub_fil_id`),
  KEY `filref` (`sub_fil_id`),
  CONSTRAINT `filref` FOREIGN KEY (`sub_fil_id`) REFERENCES `dir_singlefill` (`matfil_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_phone: ~3 rows (approximately)
DELETE FROM `dir_phone`;
/*!40000 ALTER TABLE `dir_phone` DISABLE KEYS */;
INSERT INTO `dir_phone` (`ph_id`, `phno`, `sub_fil_id`) VALUES
	(4, '4545', 16),
	(1, '980989', 16),
	(3, '98989', 16);
/*!40000 ALTER TABLE `dir_phone` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_singlefill
CREATE TABLE IF NOT EXISTS `dir_singlefill` (
  `matfil_id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `pro_pic` int(11) DEFAULT '1',
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_singlefill: ~4 rows (approximately)
DELETE FROM `dir_singlefill`;
/*!40000 ALTER TABLE `dir_singlefill` DISABLE KEYS */;
INSERT INTO `dir_singlefill` (`matfil_id`, `mat_id`, `city_id`, `state_id`, `pro_pic`, `address`, `pin`, `status`) VALUES
	(13, 13, 1, 3, 1, 'ashokam', '683580', 0),
	(14, 14, 1, 3, 1, 'test', '683522', 0),
	(15, 14, 1, 3, 1, 'test', '683522', 0),
	(16, 14, 1, 3, 1, 'test', '683522', 0);
/*!40000 ALTER TABLE `dir_singlefill` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_specilist
CREATE TABLE IF NOT EXISTS `dir_specilist` (
  `spid` int(11) NOT NULL AUTO_INCREMENT,
  `sp_name` varchar(200) NOT NULL,
  PRIMARY KEY (`spid`),
  UNIQUE KEY `sp_name` (`sp_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_specilist: ~3 rows (approximately)
DELETE FROM `dir_specilist`;
/*!40000 ALTER TABLE `dir_specilist` DISABLE KEYS */;
INSERT INTO `dir_specilist` (`spid`, `sp_name`) VALUES
	(2, 'Ent'),
	(1, 'Eye'),
	(3, 'Heart');
/*!40000 ALTER TABLE `dir_specilist` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_specilistdr
CREATE TABLE IF NOT EXISTS `dir_specilistdr` (
  `drspid` int(11) NOT NULL AUTO_INCREMENT,
  `dr_id` int(11) NOT NULL,
  `specilist_id` int(11) NOT NULL,
  PRIMARY KEY (`drspid`),
  UNIQUE KEY `specilist` (`dr_id`,`specilist_id`),
  KEY `FK_dir_specilistdr_dir_specilist` (`specilist_id`),
  CONSTRAINT `FK_dir_specilistdr_dir_singlefill` FOREIGN KEY (`dr_id`) REFERENCES `dir_singlefill` (`matfil_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dir_specilistdr_dir_specilist` FOREIGN KEY (`specilist_id`) REFERENCES `dir_specilist` (`spid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_specilistdr: ~3 rows (approximately)
DELETE FROM `dir_specilistdr`;
/*!40000 ALTER TABLE `dir_specilistdr` DISABLE KEYS */;
INSERT INTO `dir_specilistdr` (`drspid`, `dr_id`, `specilist_id`) VALUES
	(9, 13, 2),
	(7, 16, 1),
	(8, 16, 2);
/*!40000 ALTER TABLE `dir_specilistdr` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_state
CREATE TABLE IF NOT EXISTS `dir_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL DEFAULT '99',
  `state_name` char(150) NOT NULL,
  PRIMARY KEY (`state_id`),
  UNIQUE KEY `contrystate` (`country_id`,`state_name`),
  CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `dir_country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_state: ~2 rows (approximately)
DELETE FROM `dir_state`;
/*!40000 ALTER TABLE `dir_state` DISABLE KEYS */;
INSERT INTO `dir_state` (`state_id`, `country_id`, `state_name`) VALUES
	(3, 99, 'Kerala'),
	(4, 99, 'Tamilnadu');
/*!40000 ALTER TABLE `dir_state` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_type
CREATE TABLE IF NOT EXISTS `dir_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_type: ~2 rows (approximately)
DELETE FROM `dir_type`;
/*!40000 ALTER TABLE `dir_type` DISABLE KEYS */;
INSERT INTO `dir_type` (`type_id`, `name`) VALUES
	(1, 'Doctor'),
	(2, 'Hospital');
/*!40000 ALTER TABLE `dir_type` ENABLE KEYS */;


-- Dumping structure for table medeguru_db.dir_users
CREATE TABLE IF NOT EXISTS `dir_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` smallint(6) NOT NULL DEFAULT '1',
  `verify` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table medeguru_db.dir_users: ~2 rows (approximately)
DELETE FROM `dir_users`;
/*!40000 ALTER TABLE `dir_users` DISABLE KEYS */;
INSERT INTO `dir_users` (`uid`, `first_name`, `last_name`, `email`, `password`, `user_type`, `verify`) VALUES
	(1, 'Aswanth', 'kumar', 'aswanth@bizinduce.com', 'admin', 1, '0'),
	(2, 'Krishnakumar', 'ku', 'kri@gmail.com', 'three', 2, '0');
/*!40000 ALTER TABLE `dir_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
