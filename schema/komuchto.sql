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

-- Дамп структуры для таблица komuchto.act
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
CREATE TABLE IF NOT EXISTS `adverts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL DEFAULT '0',
  `act_id` int(11) NOT NULL DEFAULT '0',
  `rub_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=1000019 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.adverts: 17 rows
DELETE FROM `adverts`;
/*!40000 ALTER TABLE `adverts` DISABLE KEYS */;
INSERT INTO `adverts` (`id`, `city_id`, `act_id`, `rub_id`, `sub_id`, `user_id`, `phone`, `text`, `img`, `img1`, `img2`, `img3`, `img4`, `marka`, `model`, `body_type`, `transmission`, `year`, `probeg`, `etazh`, `komnaty_count`, `etazh_count`, `etazh_build`, `vid_object`, `type_object`, `plosch`, `price`, `moderate`, `created`, `updated`) VALUES
	(1000001, 1, 1, 1, 1, 3, 89173238930, 'Продам таз', '20131118102905_3.jpg,thumb/min_20131118102905_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50000, '1', '2013-11-18 10:29:05', '2013-11-18 10:29:05'),
	(1000003, 1, 1, 1, 2, 3, 89173238930, 'текст', '20131118153411_3.jpg,thumb/min_20131118153411_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', '2013-11-18 15:34:11', '2013-11-18 15:34:11'),
	(1000004, 1, 1, 1, 1, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122094510_3.jpg,thumb/min_20131122094510_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 150000, '1', '2013-11-22 09:45:10', '2013-11-22 09:45:10'),
	(1000005, 1, 1, 1, 1, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122094528_3.jpg,thumb/min_20131122094528_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200000, '1', '2013-11-22 09:45:28', '2013-11-22 09:45:28'),
	(1000006, 1, 1, 1, 2, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122094542_3.jpg,thumb/min_20131122094542_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500000, '1', '2013-11-22 09:45:42', '2013-11-22 09:45:42'),
	(1000007, 1, 1, 1, 2, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122094613_3.jpg,thumb/min_20131122094613_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500000, '1', '2013-11-22 09:46:13', '2013-11-22 09:46:13'),
	(1000008, 1, 1, 1, 2, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122094624_3.jpg,thumb/min_20131122094624_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1500000, '1', '2013-11-22 09:46:25', '2013-11-22 09:46:25'),
	(1000009, 1, 1, 1, 2, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122095551_3.jpg,thumb/min_20131122095551_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25000, '1', '2013-11-22 09:55:51', '2013-11-22 09:55:51'),
	(1000010, 1, 1, 1, 2, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122095623_3.jpg,thumb/min_20131122095623_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 225000, '1', '2013-11-22 09:56:23', '2013-11-22 09:56:23'),
	(1000011, 1, 1, 1, 2, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122095635_3.jpg,thumb/min_20131122095635_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 240250, '1', '2013-11-22 09:56:35', '2013-11-22 09:56:35'),
	(1000012, 1, 1, 1, 1, 3, 89173238930, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20131122095646_3.jpg,thumb/min_20131122095646_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 240250, '1', '2013-11-22 09:56:46', '2013-11-22 09:56:46'),
	(1000013, 1, 1, 1, 1, 3, 89173238930, 'Какой-то текст', '20131126160926_3.jpg,thumb/min_20131126160926_3.jpg', '201311261609261_3.jpg,thumb/min_201311261609261_3.jpg', '201311261609262_3.jpg,thumb/min_201311261609262_3.jpg', '201311261609273_3.jpg,thumb/min_201311261609273_3.jpg', '201311261609274_3.jpg,thumb/min_201311261609274_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 102000, '1', '2013-11-26 16:09:27', '2013-11-26 16:09:27'),
	(1000014, 2, 1, 1, 1, 3, 89173238930, 'Срочно', '20131202140030_3.jpg,thumb/min_20131202140030_3.jpg', '201312021400311_3.jpg,thumb/min_201312021400311_3.jpg', '201312021400312_3.jpg,thumb/min_201312021400312_3.jpg', '201312021400313_3.jpg,thumb/min_201312021400313_3.jpg', '201312021400314_3.jpg,thumb/min_201312021400314_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 170000, '1', '2013-12-02 14:00:32', '2013-12-02 14:00:32'),
	(1000015, 1, 1, 1, 1, 3, 89173238930, 'Текст', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200000, '1', '2013-12-02 14:18:28', '2013-12-02 14:18:28'),
	(1000016, 2, 1, 2, 3, 3, 89173238930, 'Квартира', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1100000, '1', '2013-12-02 14:28:53', '2013-12-02 14:28:53'),
	(1000017, 2, 1, 2, 3, 3, 89173238930, 'Квартира', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1100000, '1', '2013-12-02 14:35:18', '2013-12-02 14:35:18'),
	(1000018, 2, 1, 2, 3, 3, 89173238930, 'Квартира', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1100000, '1', '2013-12-02 14:36:02', '2013-12-02 14:36:02');
/*!40000 ALTER TABLE `adverts` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.AuthAssignment
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
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.city: ~3 rows (приблизительно)
DELETE FROM `city`;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `region`, `name`) VALUES
	(-1, NULL, 'Не выбрано'),
	(1, NULL, 'Саратов'),
	(2, NULL, 'Энгельс');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.favorits
CREATE TABLE IF NOT EXISTS `favorits` (
  `user` int(11) unsigned NOT NULL DEFAULT '0',
  `advert` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`advert`,`user`),
  UNIQUE KEY `Индекс 1` (`user`,`advert`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.favorits: 4 rows
DELETE FROM `favorits`;
/*!40000 ALTER TABLE `favorits` DISABLE KEYS */;
INSERT INTO `favorits` (`user`, `advert`) VALUES
	(3, 5),
	(3, 6),
	(3, 1000010),
	(3, 1000012);
/*!40000 ALTER TABLE `favorits` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.page
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(500) DEFAULT NULL,
  `text` text,
  `visible` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.page: ~0 rows (приблизительно)
DELETE FROM `page`;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
/*!40000 ALTER TABLE `page` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.params
CREATE TABLE IF NOT EXISTS `params` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rub_id` int(11) unsigned DEFAULT NULL,
  `params_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.params: 0 rows
DELETE FROM `params`;
/*!40000 ALTER TABLE `params` DISABLE KEYS */;
/*!40000 ALTER TABLE `params` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.rub
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
CREATE TABLE IF NOT EXISTS `search` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `query` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000136 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.search: 136 rows
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
	(10000016, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=50000'),
	(10000017, 'Adverts[rub]=3&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=50000'),
	(10000018, 'Adverts[rub]=3&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=50000&Adverts[sub][0]=1'),
	(10000019, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&Adverts[transmission]=2'),
	(10000020, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&Adverts[transmission]=1'),
	(10000021, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&Adverts[transmission]=1'),
	(10000022, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&Adverts[type_object]=2'),
	(10000023, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=50000&Adverts[transmission]=1&Adverts[sub][0]=2'),
	(10000024, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=50000&Adverts[transmission]=1'),
	(10000025, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=50000&Adverts[transmission]=1&Adverts[sub][0]=1'),
	(10000026, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=50000&Adverts[sub][0]=1'),
	(10000027, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[sub][1]=1'),
	(10000028, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=2&Adverts[sub][1]=1&Adverts[sub][2]=1'),
	(10000029, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=2'),
	(10000030, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[transmission]=2&Adverts[sub][0]=1'),
	(10000031, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=1'),
	(10000032, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=1'),
	(10000033, 'Adverts[rub]=1&Adverts[act]=2&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1'),
	(10000034, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1'),
	(10000035, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000'),
	(10000036, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[search]=Автозапчасти'),
	(10000037, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[search]=Продаю'),
	(10000038, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[search]=Lorem'),
	(10000039, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[search]='),
	(10000040, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[search]=текст'),
	(10000041, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=3'),
	(10000042, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=2'),
	(10000043, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[transmission]=3'),
	(10000044, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[sub][1]=2'),
	(10000045, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sort]=created'),
	(10000046, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[sort]=price.desc'),
	(10000047, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=2&Adverts[sub][1]=1&Adverts[sort]=price.desc'),
	(10000048, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=2&Adverts[sort]=price.desc'),
	(10000049, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sort]=price'),
	(10000050, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[sort]=price'),
	(10000051, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=2&Adverts[sub][1]=1&Adverts[sort]=price'),
	(10000052, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000'),
	(10000053, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=3&Adverts[sub][1]=4'),
	(10000054, 'Adverts[rub]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=4'),
	(10000055, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=3&Adverts[sub][1]=4'),
	(10000056, 'Adverts[rub]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=2&Adverts[sub][1]=1'),
	(10000057, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=&Adverts[sub][0]=3'),
	(10000058, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]='),
	(10000059, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000'),
	(10000060, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000&Adverts[sub][0]=1'),
	(10000061, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000'),
	(10000062, 'Adverts[rub_id]=2&Adverts[act]=2&Adverts[city]=1&Adverts[minprice]=&Adverts[maxprice]=24025000'),
	(10000063, 'Adverts[rub_id]=2&Adverts[act]=2&Adverts[city]=2&Adverts[minprice]=&Adverts[maxprice]=24025000'),
	(10000064, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000'),
	(10000065, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000'),
	(10000066, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1'),
	(10000067, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=2&Adverts[sub][1]=1'),
	(10000068, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=2'),
	(10000069, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sort]=price.desc'),
	(10000070, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=2&Adverts[sort]=price.desc'),
	(10000071, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[sort]=price.desc'),
	(10000072, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[sort]=price.desc'),
	(10000073, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7860000&Adverts[maxprice]=24025000'),
	(10000074, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7860000&Adverts[maxprice]=20614000'),
	(10000075, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7712000&Adverts[maxprice]=24025000'),
	(10000076, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=3019000&Adverts[maxprice]=24025000'),
	(10000077, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=14000&Adverts[maxprice]=24025000'),
	(10000078, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0'),
	(10000079, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7860000&Adverts[sub][0]=1'),
	(10000080, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=6080000&Adverts[maxprice]=24025000'),
	(10000081, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7415000&Adverts[maxprice]=24025000'),
	(10000082, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7415000&Adverts[maxprice]=16906000'),
	(10000083, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7267000&Adverts[maxprice]=24025000'),
	(10000084, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7267000&Adverts[maxprice]=15868000'),
	(10000085, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=8305000&Adverts[maxprice]=24025000'),
	(10000086, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=8305000&Adverts[maxprice]=16313000'),
	(10000087, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7267000&Adverts[maxprice]=12754000'),
	(10000088, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7267000&Adverts[maxprice]=14376000'),
	(10000089, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=14376000'),
	(10000090, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=702000'),
	(10000091, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=5439000'),
	(10000092, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7712000&Adverts[maxprice]=10974000'),
	(10000093, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=7193000&Adverts[maxprice]=24025000'),
	(10000094, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=15572000'),
	(10000095, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=18494000'),
	(10000096, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=9343000&Adverts[maxprice]=24025000'),
	(10000097, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=8157000&Adverts[maxprice]=24025000'),
	(10000098, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[page]=2'),
	(10000099, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[page]=1'),
	(10000100, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[page]=undefined'),
	(10000101, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[page]='),
	(10000102, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[page]='),
	(10000103, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[page]=1'),
	(10000104, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[page]=2'),
	(10000105, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=3263000&Adverts[maxprice]=24025000&Adverts[page]=2'),
	(10000106, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=4894000&Adverts[maxprice]=24025000&Adverts[page]='),
	(10000107, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[search]='),
	(10000108, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000'),
	(10000109, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=2&Adverts[minprice]=0&Adverts[maxprice]=24025000'),
	(10000110, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000'),
	(10000111, 'Adverts[rub_id]=3&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000'),
	(10000112, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1'),
	(10000113, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[search]=таз&Adverts[sub][0]=1'),
	(10000114, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[search]=lorem'),
	(10000115, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[search]=lorem&Adverts[sub][0]=1'),
	(10000116, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[search]='),
	(10000117, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[search]=Lorem'),
	(10000118, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[search]='),
	(10000119, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=2&Adverts[search]='),
	(10000120, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[search]='),
	(10000121, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[search]=g'),
	(10000122, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[sub][0]=1&Adverts[search]=g'),
	(10000123, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=24025000&Adverts[transmission]=3'),
	(10000124, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=8898000&Adverts[maxprice]=24025000&Adverts[transmission]=0'),
	(10000125, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=8898000&Adverts[maxprice]=24025000&Adverts[sub][0]=1'),
	(10000126, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=16165000'),
	(10000127, 'Adverts[rub_id]=2&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=95000'),
	(10000128, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=11864000'),
	(10000129, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=1500000'),
	(10000130, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=1500000&Adverts[sub][0]=1'),
	(10000131, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=1500000&Adverts[sub][0]=2&Adverts[sub][1]=1'),
	(10000132, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=1500000&Adverts[sub][0]=2'),
	(10000133, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=0&Adverts[maxprice]=1074000&Adverts[transmission]=0'),
	(10000134, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=417000&Adverts[maxprice]=1074000&Adverts[transmission]=0'),
	(10000135, 'Adverts[rub_id]=1&Adverts[act]=1&Adverts[city]=-1&Adverts[minprice]=97000&Adverts[maxprice]=1074000&Adverts[transmission]=0');
/*!40000 ALTER TABLE `search` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.session: ~1 rows (приблизительно)
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` (`id`, `expire`, `data`) VALUES
	('e9jq4scfkshpa0egh582hk5kf1', 1385988381, _binary '');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.sub
CREATE TABLE IF NOT EXISTS `sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rub` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.sub: ~7 rows (приблизительно)
DELETE FROM `sub`;
/*!40000 ALTER TABLE `sub` DISABLE KEYS */;
INSERT INTO `sub` (`id`, `rub`, `name`) VALUES
	(-1, 0, 'Не выбрано'),
	(1, 1, 'С пробегом'),
	(2, 1, 'Новые автомобили'),
	(3, 2, 'Квартиры'),
	(4, 2, 'Комнаты'),
	(5, 2, 'Дома'),
	(6, 2, 'Дачи');
/*!40000 ALTER TABLE `sub` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.sub_other
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


-- Дамп структуры для таблица komuchto.transmission
CREATE TABLE IF NOT EXISTS `transmission` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.transmission: ~3 rows (приблизительно)
DELETE FROM `transmission`;
/*!40000 ALTER TABLE `transmission` DISABLE KEYS */;
INSERT INTO `transmission` (`id`, `name`) VALUES
	(0, 'Не выбрано'),
	(1, 'Ручная'),
	(2, 'Автоматическая');
/*!40000 ALTER TABLE `transmission` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.type_object
CREATE TABLE IF NOT EXISTS `type_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы komuchto.type_object: ~4 rows (приблизительно)
DELETE FROM `type_object`;
/*!40000 ALTER TABLE `type_object` DISABLE KEYS */;
INSERT INTO `type_object` (`id`, `name`) VALUES
	(-1, 'Не выбрано'),
	(1, 'Кирпичный'),
	(2, 'Панельный'),
	(3, 'Блочный');
/*!40000 ALTER TABLE `type_object` ENABLE KEYS */;


-- Дамп структуры для таблица komuchto.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL DEFAULT 'undefined',
  `ip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
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
	(3, 'undefined', '127.0.0.1', NULL, '2', 'https://www.google.com/accounts/o8/id?id=AItOawn6rLF6HkD0GnV1w8t626mS5Z99WkX30kc', 'admin@garyk.ru', 'Игорь', '2013-11-04 10:34:51', '2013-12-02 15:32:34'),
	(4, 'undefined', '', '', '0', 'http://openid.yandex.ru/s0ber89/', NULL, 's0ber89', '2013-11-06 09:37:04', '2013-11-06 09:37:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
