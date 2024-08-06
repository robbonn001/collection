-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.8.4-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.7.0.6907
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных collection
CREATE DATABASE IF NOT EXISTS `collection` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `collection`;

-- Дамп структуры для таблица collection.folder
CREATE TABLE IF NOT EXISTS `folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы collection.folder: ~2 rows (приблизительно)
INSERT INTO `folder` (`id`, `name`) VALUES
	(1, ' '),
	(2, ' '),
	(3, 'test'),
	(4, 'test'),
	(5, 'не придумал'),
	(6, 'test'),
	(7, 'new');

-- Дамп структуры для таблица collection.folderlink
CREATE TABLE IF NOT EXISTS `folderlink` (
  `parent_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  KEY `FK_folderlink_folder` (`parent_id`),
  KEY `FK_folderlink_folder_2` (`child_id`),
  CONSTRAINT `FK_folderlink_folder` FOREIGN KEY (`parent_id`) REFERENCES `folder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_folderlink_folder_2` FOREIGN KEY (`child_id`) REFERENCES `folder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы collection.folderlink: ~1 rows (приблизительно)
INSERT INTO `folderlink` (`parent_id`, `child_id`) VALUES
	(2, 3),
	(3, 4),
	(4, 5),
	(1, 6),
	(1, 7);

-- Дамп структуры для таблица collection.folder_image
CREATE TABLE IF NOT EXISTS `folder_image` (
  `folder_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  KEY `FK_folder_image_folder` (`folder_id`),
  KEY `FK_folder_image_image` (`image_id`),
  CONSTRAINT `FK_folder_image_folder` FOREIGN KEY (`folder_id`) REFERENCES `folder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_folder_image_image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы collection.folder_image: ~4 rows (приблизительно)
INSERT INTO `folder_image` (`folder_id`, `image_id`) VALUES
	(2, 1),
	(2, 2),
	(2, 3),
	(2, 4),
	(3, 5),
	(3, 6),
	(4, 7),
	(4, 8),
	(1, 9),
	(1, 10),
	(6, 11);

-- Дамп структуры для таблица collection.image
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/',
  `hash` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы collection.image: ~1 rows (приблизительно)
INSERT INTO `image` (`id`, `path`, `hash`, `extension`) VALUES
	(1, 'images/', '9a13f5544464c7565f47533d440a735d', '.png'),
	(2, 'images/', '774a13583e6e536ad764d9199828abb2', '.png'),
	(3, 'images/', 'a6545e39c4db4d50a15d156472b9f3cd', '.png'),
	(4, 'images/', '525caabce3d139a0fee0c7d2b220c869', '.jpg'),
	(5, 'images/', '614d28458bc70a3f297eae9d9ba62810', '.png'),
	(6, 'images/', '3692d5c9af6b6171e36382b5520c46ea', '.jpg'),
	(7, 'images/', '5fe5f133d30ab0420d01990cdacf86f2', '.jpg'),
	(8, 'images/', '355587ec6163244eb7e9192527a1e834', '.jpg'),
	(9, 'images/', '4d632f6bd3bbe7dd25656ef78252fd5b', '.png'),
	(10, 'images/', 'd563ddf6d90d8dabe7548146797cf9ac', '.jpg'),
	(11, 'images/', '131de938b9031d350f7ee75d35947783', '.jpg');

-- Дамп структуры для таблица collection.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_folder` (`folder_id`),
  CONSTRAINT `FK_user_folder` FOREIGN KEY (`folder_id`) REFERENCES `folder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы collection.user: ~2 rows (приблизительно)
INSERT INTO `user` (`id`, `login`, `password`, `folder_id`) VALUES
	(1, 'Igor', '79853b2cb27007fc3cee533f4420b9ad', 1),
	(2, 'Test', '59cdd9c8e1afb336f8718e6559e8e15a', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
