-- Adminer 4.8.1 MySQL 8.0.32 dump


DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `promotion` (`id`, `nom`) VALUES
(1,	'BTSSN21'),
(4,	'BTSSN22'),
(12,	'BTSCIEL23');
