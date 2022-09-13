-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 sep. 2022 à 10:39
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `georges`
--

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int NOT NULL AUTO_INCREMENT,
  `start_date` timestamp NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `filters` json NOT NULL,
  `tracking_vars` json NOT NULL,
  `discovery_rate` float NOT NULL,
  `options` json NOT NULL,
  `statut` enum('on','off','pending') NOT NULL,
  `variations` json NOT NULL,
  `uri_regex` varchar(255) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`test_id`, `start_date`, `name`, `description`, `filters`, `tracking_vars`, `discovery_rate`, `options`, `statut`, `variations`, `uri_regex`) VALUES
(1, '2022-09-15 11:51:37', 'test', 'new', '[\"mobile\", \"computer\"]', '{\"device\": \"mobile\"}', 0.2, '[]', 'on', '{\"uri\": \"test.php\"}', '\"/fen/lan/11/\"');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
