# DROP DATABASE IF EXISTS `lipton`;
#
# CREATE DATABASE `lipton` DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
#
# CREATE TABLE `users` (
#   `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
#   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
#   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
# #   `enabled` tinyint(1) NOT NULL DEFAULT '0',
#   PRIMARY KEY (`id`)
# ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
#
# INSERT INTO `users` (name, email) VALUES ('Admin', `admin@lipton.test`),('Test', `test@lipton.test`);
