DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `employees` */

insert  into `employees`(`id`,`name`,`address`,`gender`,`age`) values 
(1,'Clara Gilliam','63 Woodridge Lane\r\nMemphis, TN 38138','Female',24),
(2,'Barbra K. Hurley','1241 Canis Heights Drive\r\nLos Angeles, CA 90017','Female',26),
(3,'Antonio J. Forbes','403 Snyder Avenue\r\nCharlotte, NC 28208','Male',32),
(4,'Charles D. Horst','1636 Walnut Hill Drive\r\nCincinnati, OH 45202','Male',29),
(5,'Martha B. Tomlinson','4005 Bird Spring Lane, Houston, TX 77002','Female',38),
(6,'Jarrod D. Jones','3827 Bingamon Road, Garfield Heights, OH 44125','Male',64),
(7,'Kimberly J. Ellis','4905 Holt Street\r\nFort Lauderdale, FL 33301','Male',24),
(8,'Louis C. Charmis','1462 Juniper Drive\r\nBreckenridge, MI 48612','Male',40);