

CREATE TABLE IF NOT EXISTS `ip_currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency` varchar(3) NOT NULL,
  `rate` DOUBLE NOT NULL,
  `priority` DOUBLE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


