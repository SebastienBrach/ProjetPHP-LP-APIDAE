-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 déc. 2020 à 10:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_concert_symfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `band`
--

DROP TABLE IF EXISTS `band`;
CREATE TABLE IF NOT EXISTS `band` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_creation` date NOT NULL,
  `last_album_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `band`
--

INSERT INTO `band` (`id`, `name`, `style`, `picture`, `year_of_creation`, `last_album_name`) VALUES
(1, 'Led Zeppelin', 'Rock', 'led-zeppelin.jpg', '1968-12-11', 'Coda'),
(9, 'Slipknot', 'Métal', 'slipknot.jpg', '1995-01-01', 'We Are Not Your Kind');

-- --------------------------------------------------------

--
-- Structure de la table `concert_hall`
--

DROP TABLE IF EXISTS `concert_hall`;
CREATE TABLE IF NOT EXISTS `concert_hall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_places` int(11) NOT NULL,
  `presentation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hall_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BE329CF852AFCFD6` (`hall_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `concert_hall`
--

INSERT INTO `concert_hall` (`id`, `name`, `total_places`, `presentation`, `city`, `hall_id`) VALUES
(1, 'Salle1', 1500, 'Présentation de Salle1', 'Montpellier - Comédie', 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201212171008', '2020-12-12 17:10:24', 129),
('DoctrineMigrations\\Version20201212171948', '2020-12-12 17:19:55', 142),
('DoctrineMigrations\\Version20201213151545', '2020-12-13 15:15:51', 79);

-- --------------------------------------------------------

--
-- Structure de la table `hall`
--

DROP TABLE IF EXISTS `hall`;
CREATE TABLE IF NOT EXISTS `hall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hall`
--

INSERT INTO `hall` (`id`, `name`, `capacity`, `available`) VALUES
(1, 'Salle1', 1500, 1);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `band_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_70E4FA7849ABEB17` (`band_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `name`, `first_name`, `job`, `birth_date`, `picture`, `band_id`) VALUES
(1, 'Jimmy', 'Page', 'Guitariste', '2015-01-09', 'jimmy-page.jpg', 1),
(2, 'John', 'Bonham', 'Batteur', '1948-05-31', 'john-bonham.jpg', 1),
(3, 'John Paul', 'Jones', 'Guitariste', '1946-01-03', 'john-paul-jones.jpg', 1),
(4, 'Robert', 'Plant', 'Chanteur', '1948-08-10', 'robert-plant.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `show_concert`
--

DROP TABLE IF EXISTS `show_concert`;
CREATE TABLE IF NOT EXISTS `show_concert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `tour_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `band_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B22E2F3149ABEB17` (`band_id`),
  KEY `IDX_B22E2F3152AFCFD6` (`hall_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `show_concert`
--

INSERT INTO `show_concert` (`id`, `date`, `tour_name`, `band_id`, `hall_id`) VALUES
(19, '2022-01-06', 'Tournée 2022', 1, 1),
(21, '2023-08-05', 'Slipknot Tour 2023', 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649A9D1C132` (`first_name`),
  UNIQUE KEY `UNIQ_8D93D649C808BA5A` (`last_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concert_hall`
--
ALTER TABLE `concert_hall`
  ADD CONSTRAINT `FK_BE329CF852AFCFD6` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`);

--
-- Contraintes pour la table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_70E4FA7849ABEB17` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`);

--
-- Contraintes pour la table `show_concert`
--
ALTER TABLE `show_concert`
  ADD CONSTRAINT `FK_B22E2F3149ABEB17` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`),
  ADD CONSTRAINT `FK_B22E2F3152AFCFD6` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
