

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) DEFAULT '0',
  `active` enum('0','1') DEFAULT '0',
  `url` varchar(128) DEFAULT NULL,
  `date` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

@@@
CREATE TABLE IF NOT EXISTS `@@news@@` (
  `news_id` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `body_m` varchar(256) NOT NULL,
  `body` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
@@@1
