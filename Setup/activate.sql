

CREATE TABLE IF NOT EXISTS `ip_Currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency` varchar(3) NOT NULL,
  `ratio` DOUBLE NOT NULL,
  `priority` DOUBLE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


