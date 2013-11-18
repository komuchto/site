-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.1.71-community-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.0.0.4494
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных komuchto
CREATE DATABASE IF NOT EXISTS `komuchto` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `komuchto`;


-- Дамп структуры для таблица komuchto.act
DROP TABLE IF EXISTS `act`;
CREATE TABLE IF NOT EXISTS `act` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) unsigned DEFAULT '0',
  `name` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.act: ~5 rows (приблизительно)
DELETE FROM `act`;
/*!40000 ALTER TABLE `act` DISABLE KEYS */;
INSERT INTO `act` (`id`, `type`, `name`) VALUES
	(1, 0, 'Продаю'),
	(2, 0, 'Куплю'),
	(3, 0, 'Сдаю'),
	(4, 0, 'Сниму'),
	(5, 0, 'Меняю');
/*!40000 ALTER TABLE `act` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.adverts
DROP TABLE IF EXISTS `adverts`;
CREATE TABLE IF NOT EXISTS `adverts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(11) unsigned NOT NULL DEFAULT '0',
  `act_id` int(11) unsigned NOT NULL DEFAULT '0',
  `rub_id` int(11) unsigned DEFAULT NULL,
  `sub_id` int(11) unsigned DEFAULT NULL,
  `user` int(11) unsigned DEFAULT NULL,
  `phone` bigint(11) unsigned DEFAULT NULL,
  `text` text,
  `img` varchar(500) DEFAULT NULL,
  `img1` varchar(500) DEFAULT NULL,
  `img2` varchar(500) DEFAULT NULL,
  `img3` varchar(500) DEFAULT NULL,
  `img4` varchar(500) DEFAULT NULL,
  `marka` int(11) unsigned DEFAULT NULL,
  `model` int(11) unsigned DEFAULT NULL,
  `body_type` int(11) unsigned DEFAULT NULL,
  `transmission` int(11) unsigned DEFAULT NULL,
  `year` int(11) unsigned DEFAULT NULL,
  `probeg` int(11) unsigned DEFAULT NULL,
  `etazh` int(11) unsigned DEFAULT NULL,
  `komnaty_count` int(11) unsigned DEFAULT NULL,
  `etazh_count` int(11) unsigned DEFAULT NULL,
  `etazh_build` int(11) unsigned DEFAULT NULL,
  `vid_object` int(11) unsigned DEFAULT NULL,
  `type_object` int(11) unsigned DEFAULT NULL,
  `plosch` int(11) unsigned DEFAULT NULL,
  `price` int(11) unsigned DEFAULT '0',
  `moderate` enum('0','1') DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adverts_act` (`act_id`),
  KEY `FK_adverts_city` (`city_id`),
  KEY `FK_adverts_rub` (`rub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.adverts: 2 rows
DELETE FROM `adverts`;
/*!40000 ALTER TABLE `adverts` DISABLE KEYS */;
INSERT INTO `adverts` (`id`, `city_id`, `act_id`, `rub_id`, `sub_id`, `user`, `phone`, `text`, `img`, `img1`, `img2`, `img3`, `img4`, `marka`, `model`, `body_type`, `transmission`, `year`, `probeg`, `etazh`, `komnaty_count`, `etazh_count`, `etazh_build`, `vid_object`, `type_object`, `plosch`, `price`, `moderate`, `created`, `updated`) VALUES
	(1, 1, 1, 1, 1, 3, 89173238930, 'Продам таз', '20131118102905_3.jpg,thumb/min_20131118102905_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50000, '0', '2013-11-18 10:29:05', '2013-11-18 10:29:05'),
	(3, 1, 1, 1, 2, 3, 89173238930, 'текст', '20131118153411_3.jpg,thumb/min_20131118153411_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '2013-11-18 15:34:11', '2013-11-18 15:34:11');
/*!40000 ALTER TABLE `adverts` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.AuthAssignment
DROP TABLE IF EXISTS `AuthAssignment`;
CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.AuthAssignment: ~0 rows (приблизительно)
DELETE FROM `AuthAssignment`;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.AuthItem
DROP TABLE IF EXISTS `AuthItem`;
CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.AuthItem: ~4 rows (приблизительно)
DELETE FROM `AuthItem`;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
	('admin', 2, 'администратор', 'return (isset(Yii::app()->user->permission) && Yii::app()->user->permission == 2);', 'N;'),
	('guest', 2, 'Гость', 'return Yii::app()->user->isGuest;', 'N;'),
	('moderator', 2, 'Модератор', 'return (isset(Yii::app()->user->permission) && Yii::app()->user->permission == 1);', 'N;'),
	('user', 2, 'Пользователь', 'return (isset(Yii::app()->user->permission) && Yii::app()->user->permission == 0);', 'N;');
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.AuthItemChild
DROP TABLE IF EXISTS `AuthItemChild`;
CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.AuthItemChild: ~0 rows (приблизительно)
DELETE FROM `AuthItemChild`;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.city
DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `region` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.city: ~2 rows (приблизительно)
DELETE FROM `city`;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `region`, `name`) VALUES
	(1, NULL, 'Саратов'),
	(2, NULL, 'Энгельс');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.favorits
DROP TABLE IF EXISTS `favorits`;
CREATE TABLE IF NOT EXISTS `favorits` (
  `user` int(11) unsigned NOT NULL DEFAULT '0',
  `advert` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`advert`,`user`),
  UNIQUE KEY `Индекс 1` (`user`,`advert`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.favorits: 2 rows
DELETE FROM `favorits`;
/*!40000 ALTER TABLE `favorits` DISABLE KEYS */;
INSERT INTO `favorits` (`user`, `advert`) VALUES
	(3, 5),
	(3, 6);
/*!40000 ALTER TABLE `favorits` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.params
DROP TABLE IF EXISTS `params`;
CREATE TABLE IF NOT EXISTS `params` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sub_other` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.params: 0 rows
DELETE FROM `params`;
/*!40000 ALTER TABLE `params` DISABLE KEYS */;
/*!40000 ALTER TABLE `params` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.rub
DROP TABLE IF EXISTS `rub`;
CREATE TABLE IF NOT EXISTS `rub` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.rub: ~4 rows (приблизительно)
DELETE FROM `rub`;
/*!40000 ALTER TABLE `rub` DISABLE KEYS */;
INSERT INTO `rub` (`id`, `name`) VALUES
	(1, 'Транспорт'),
	(2, 'Недвижимость'),
	(3, 'Работа'),
	(4, 'Услуги');
/*!40000 ALTER TABLE `rub` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.search
DROP TABLE IF EXISTS `search`;
CREATE TABLE IF NOT EXISTS `search` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `query` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000017 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.search: 1 rows
DELETE FROM `search`;
/*!40000 ALTER TABLE `search` DISABLE KEYS */;
INSERT INTO `search` (`id`, `query`) VALUES
	(10000000, 'Array'),
	(10000001, 'Adverts%5Brub%5D=1&Adverts%5Bact%5D=1&Adverts%5Bcity%5D=1&Adverts%5Bminprice%5D=&Adverts%5Bmaxprice%5D=50000sub%5B%5D%3D1'),
	(10000002, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000sub[]=1'),
	(10000003, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000'),
	(10000004, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000sub[]=2&sub[0]=1'),
	(10000005, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&sub[0]=1'),
	(10000006, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000'),
	(10000007, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000sub[]=2'),
	(10000008, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&sub[0]=2'),
	(10000009, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&sub[0]=1&sub[1]=2'),
	(10000010, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&Adverts[sub][0]=1'),
	(10000011, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&Adverts[sub][0]=2&Adverts[sub][1]=1'),
	(10000012, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&Adverts[sub][0]=2'),
	(10000013, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=12000&Adverts[maxprice]=50000'),
	(10000014, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=6000&Adverts[maxprice]=50000'),
	(10000015, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=5000&Adverts[maxprice]=50000&Adverts[sub][0]=1'),
	(10000016, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=50000');
/*!40000 ALTER TABLE `search` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.sub
DROP TABLE IF EXISTS `sub`;
CREATE TABLE IF NOT EXISTS `sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rub` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.sub: ~6 rows (приблизительно)
DELETE FROM `sub`;
/*!40000 ALTER TABLE `sub` DISABLE KEYS */;
INSERT INTO `sub` (`id`, `rub`, `name`) VALUES
	(1, 1, 'Автомобили с пробегом'),
	(2, 1, 'Новые автомобили'),
	(3, 2, 'Квартиры'),
	(4, 2, 'Комнаты'),
	(5, 2, 'Дома'),
	(6, 2, 'Дачи');
/*!40000 ALTER TABLE `sub` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.sub_other
DROP TABLE IF EXISTS `sub_other`;
CREATE TABLE IF NOT EXISTS `sub_other` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.sub_other: ~0 rows (приблизительно)
DELETE FROM `sub_other`;
/*!40000 ALTER TABLE `sub_other` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_other` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL DEFAULT 'undefined',
  `ip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `permission` enum('0','1','2') NOT NULL DEFAULT '0',
  `identity` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `lastvisited` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.users: 2 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `service`, `ip`, `city`, `permission`, `identity`, `email`, `name`, `created`, `lastvisited`) VALUES
	(3, 'undefined', '127.0.0.1', '', '2', 'https://www.google.com/accounts/o8/id?id=AItOawn6rLF6HkD0GnV1w8t626mS5Z99WkX30kc', 'admin@garyk.ru', 'Игорь', '2013-11-04 10:34:51', '2013-11-18 15:30:48'),
	(4, 'undefined', '', '', '0', 'http://openid.yandex.ru/s0ber89/', NULL, 's0ber89', '2013-11-06 09:37:04', '2013-11-06 09:37:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
