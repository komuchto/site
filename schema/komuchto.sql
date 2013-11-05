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
DROP DATABASE IF EXISTS `komuchto`;
CREATE DATABASE IF NOT EXISTS `komuchto` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `komuchto`;


-- Дамп структуры для таблица komuchto.adverts
DROP TABLE IF EXISTS `adverts`;
CREATE TABLE IF NOT EXISTS `adverts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rub` int(11) unsigned DEFAULT NULL,
  `sub` int(11) unsigned DEFAULT NULL,
  `user` int(11) unsigned DEFAULT NULL,
  `phone` bigint(11) unsigned DEFAULT NULL,
  `text` text,
  `img` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.adverts: 1 rows
DELETE FROM `adverts`;
/*!40000 ALTER TABLE `adverts` DISABLE KEYS */;
INSERT INTO `adverts` (`id`, `rub`, `sub`, `user`, `phone`, `text`, `img`, `created`, `updated`) VALUES
	(5, 1, 1, 3, 89173238930, 'рап', '20131105141010_3.jpg,thumb/min_20131105141010_3.jpg', '2013-11-05 14:10:11', '2013-11-05 15:10:11'),
	(4, 1, 2, 3, 89173238930, 'Ауди 80', '20131105110235_3.jpg,thumb/min_20131105110235_3.jpg', '2013-11-05 11:02:36', '2013-11-05 12:02:36'),
	(6, 1, 1, 3, 89173238930, 'Тазик', '20131105141353_3.jpg,thumb/min_20131105141353_3.jpg', '2013-11-05 14:13:54', '2013-11-05 15:13:54');
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


-- Дамп структуры для таблица komuchto.rub
DROP TABLE IF EXISTS `rub`;
CREATE TABLE IF NOT EXISTS `rub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.rub: 2 rows
DELETE FROM `rub`;
/*!40000 ALTER TABLE `rub` DISABLE KEYS */;
INSERT INTO `rub` (`id`, `name`) VALUES
	(1, 'Транспорт'),
	(2, 'Недвижимость');
/*!40000 ALTER TABLE `rub` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.sub
DROP TABLE IF EXISTS `sub`;
CREATE TABLE IF NOT EXISTS `sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rub` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.sub: ~3 rows (приблизительно)
DELETE FROM `sub`;
/*!40000 ALTER TABLE `sub` DISABLE KEYS */;
INSERT INTO `sub` (`id`, `rub`, `name`) VALUES
	(1, 1, 'ВАЗ'),
	(2, 1, 'AUDI'),
	(3, 2, '1-комнатные');
/*!40000 ALTER TABLE `sub` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `permission` enum('0','1','2') NOT NULL DEFAULT '0',
  `identity` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `lastvisited` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `service`, `permission`, `identity`, `email`, `name`, `created`, `lastvisited`) VALUES
	(3, '', '2', 'https://www.google.com/accounts/o8/id?id=AItOawn6rLF6HkD0GnV1w8t626mS5Z99WkX30kc', NULL, 'Игорь', NULL, '2013-11-05 10:59:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
