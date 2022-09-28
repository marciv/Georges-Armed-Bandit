-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 sep. 2022 à 08:17
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
  `variation_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `trigger_event` json NOT NULL,
  `trigger_url` varchar(55) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`goal_id`),
  KEY `variation_id` (`variation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `uri_regex` varchar(255) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`test_id`, `start_date`, `name`, `description`, `filters`, `tracking_vars`, `discovery_rate`, `options`, `statut`, `uri_regex`) VALUES
(4, '2022-09-27 07:01:39', 'test', 'new', '[]', '[]', 0.2, '[]', 'on', '/fen/lan/06/');

-- --------------------------------------------------------

--
-- Structure de la table `variation`
--

DROP TABLE IF EXISTS `variation`;
CREATE TABLE IF NOT EXISTS `variation` (
  `variation_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `uri_regex` varchar(55) NOT NULL,
  `parameters` json NOT NULL,
  `statut` enum('off','on','pending','') NOT NULL DEFAULT 'on',
  PRIMARY KEY (`variation_id`),
  KEY `test_id` (`test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `variation`
--

INSERT INTO `variation` (`variation_id`, `test_id`, `name`, `description`, `uri_regex`, `parameters`, `statut`) VALUES
(1, 3, 'variation1°', 'new variation', '/fen/lan/07/', '[{}]', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `visit`
--

DROP TABLE IF EXISTS `visit`;
CREATE TABLE IF NOT EXISTS `visit` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `variation_id` varchar(55) NOT NULL,
  `session_id` text NOT NULL,
  `device` varchar(55) NOT NULL,
  `visit_information` json NOT NULL,
  PRIMARY KEY (`visit_id`),
  KEY `variation_id` (`variation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
