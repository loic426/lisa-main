-- Adminer 4.8.1 MySQL 8.0.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3'),
(2,	'lisa',	'5884866838e3d2bff9b2b41c21647a61'),
(3,	'maintenance',	'maintenance'),
(4,	'loic',	'573deb8b889a38b32dbe535e3dc0affb');

DROP TABLE IF EXISTS `cours`;
CREATE TABLE `cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_intervenant` int NOT NULL,
  `id_promotion` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `salle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_intervenant` (`id_intervenant`),
  KEY `id_promotion` (`id_promotion`),
  CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_intervenant`) REFERENCES `intervenant` (`id`),
  CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


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
(54,	1,	NULL,	'PLOMB',	'Titouan',	'tplomb@gmail.com',	'9bc52898ba2e575442747f4669ebcfb4',	NULL),
(55,	1,	5,	'Caballero',	'Sara',	'sara@gmail.com',	'sara',	NULL),
(56,	1,	4,	'Caba',	'Sara',	'sara@hotmail.com',	'sara',	NULL),
(57,	1,	5,	'test',	'Test',	'test@gmail.com',	'test',	NULL);

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE `evenement` (
  `titre` varchar(30) DEFAULT NULL,
  `evenement` varchar(80) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `salle` varchar(30) DEFAULT NULL,
  `lieu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `groupe`;
CREATE TABLE `groupe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_promotion` int NOT NULL,
  `groupe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_promotion` (`id_promotion`),
  CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `intervenant`;
CREATE TABLE `intervenant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_photo` int DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


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

-- 2023-04-20 14:05:17
