-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table crud.products
CREATE TABLE IF NOT EXISTS `products` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `sku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `price` float NOT NULL,
    `type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
    `size` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `value` enum('MB','Kg','HxWxL') COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`) USING BTREE,
    UNIQUE KEY `sku` (`sku`) USING BTREE
    ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table crud.products: ~8 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `sku`, `name`, `price`, `type`, `size`, `value`) VALUES
   (1, '123', '1', 123, '1', '30', 'Kg'),
   (2, '1231241231231', 'asdasd', 123, '3', '50', 'MB'),
   (3, 'fasdfasd', 'fasdasd', 12, '1', 'fsad', 'Kg'),
   (8, '1234', 'fasdasd', 12, '1', 'fsad', 'Kg'),
   (9, '1', '2', 3, '1', '30', 'Kg'),
   (13, '123454324234', '2', 3, '1', '30', 'Kg'),
   (14, 'asdafsasd', '2', 3, '1', '30', 'Kg'),
   (16, '12356456456465', '2', 3, '1', '30', 'Kg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
