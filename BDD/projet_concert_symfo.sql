-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 12 déc. 2020 à 16:58
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_concert_symfo`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `band`
--

INSERT INTO `band` (`id`, `name`, `style`, `picture`, `year_of_creation`, `last_album_name`) VALUES
(1, 'Led Zeppelin', 'Rock', 'led-zeppelin.jpg', '1968-12-11', 'Coda');

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
(1, 'concert_hall1', 1600, 'Présentation de concert_hall', 'Montpellier', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `name`, `first_name`, `job`, `birth_date`, `picture`, `band_id`) VALUES
(1, 'Jimmy', 'Page', 'Guitariste', '1944-01-09', 'jimmy-page.jpg', 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `show_concert`
--

INSERT INTO `show_concert` (`id`, `date`, `tour_name`, `band_id`, `hall_id`) VALUES
(1, '2022-01-26', 'ZeppTour', 1, 1);

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
