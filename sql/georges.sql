-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 19 sep. 2022 à 07:58
-- Version du serveur : 5.7.36
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
-- Structure de la table `goal`
--

DROP TABLE IF EXISTS `goal`;
CREATE TABLE IF NOT EXISTS `goal` (
  `goal_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `variation_id` varchar(55) NOT NULL,
  `goal_date` timestamp NOT NULL,
  `device_detected` varchar(55) NOT NULL,
  `goal_ip` varchar(55) NOT NULL,
  PRIMARY KEY (`goal_id`),
  KEY `test_id` (`test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `goal`
--

INSERT INTO `goal` (`goal_id`, `test_id`, `variation_id`, `goal_date`, `device_detected`, `goal_ip`) VALUES
(1, 1, 'test_lan01', '2022-09-18 22:00:00', 'computer', '198.201.45.231');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`test_id`, `start_date`, `name`, `description`, `filters`, `tracking_vars`, `discovery_rate`, `options`, `statut`, `variations`, `uri_regex`) VALUES
(1, '2022-09-15 09:51:37', 'test', 'new', '[\"mobile\", \"computer\"]', '{\"device\": \"mobile\"}', 0.2, '[]', 'on', '{\"uri\": \"test.php\"}', '\"/fen/lan/11/\"'),
(2, '2022-09-16 08:05:37', 'test2', 'new', '[\"mobile\", \"computer\"]', '{\"device\": \"mobile\"}', 0.2, '[]', 'on', '{\"uri\": \"test.php\"}', '\"/fen/lan/11/\"');

-- --------------------------------------------------------

--
-- Structure de la table `visit`
--

DROP TABLE IF EXISTS `visit`;
CREATE TABLE IF NOT EXISTS `visit` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `variation_id` varchar(55) NOT NULL,
  `visit_date` timestamp NOT NULL,
  `device_detected` varchar(55) NOT NULL,
  `visit_ip` varchar(55) NOT NULL,
  PRIMARY KEY (`visit_id`),
  KEY `test_id` (`test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visit`
--

INSERT INTO `visit` (`visit_id`, `test_id`, `variation_id`, `visit_date`, `device_detected`, `visit_ip`) VALUES
(1, 1, 'test_lan_08', '2022-09-19 07:48:53', 'computer', '198.02.155.13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
