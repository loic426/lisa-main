-- Adminer 4.8.1 MySQL 8.0.32 dump



DROP TABLE IF EXISTS `eleve`;
CREATE TABLE `eleve` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_promotion` int NOT NULL,
  `id_photo` int DEFAULT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mdp` varchar(80) DEFAULT NULL,
  `actif` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_promotion` (`id_promotion`),
  CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `eleve` (`id`, `id_promotion`, `id_photo`, `nom`, `prenom`, `email`, `mdp`, `actif`) VALUES
(2,	1,	1,	'CONVERT',	'Loïc',	'btss21lconve@eleve-irup.com',	'c27e859e337878a5177e431c59eec454',	1),
(3,	1,	5,	'coco',	'coco',	'coco@gmail.com',	'12',	0),
(56,	1,	4,	'Caba',	'Sara',	'sara@hotmail.com',	'sara',	NULL),
(57,	1,	5,	'test',	'Test',	'test@gmail.com',	'test',	NULL);

