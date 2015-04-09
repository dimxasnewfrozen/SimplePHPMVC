DROP TABLE IF EXISTS `database`.`dc_members`;
CREATE TABLE  `database`.`dc_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `addedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fname` varchar(75) NOT NULL,
  `lname` varchar(75) NOT NULL,
  `email_hash` varchar(75) NOT NULL,
  `status` int(1) unsigned NOT NULL,
  `active` int(1) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;