-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 nov. 2022 à 10:22
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
  `trigger_event` json NOT NULL,
  `trigger_url` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`goal_id`),
  KEY `variation_id` (`variation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `goal`
--

INSERT INTO `goal` (`goal_id`, `variation_id`, `trigger_event`, `trigger_url`, `created_at`) VALUES
(2, 1, '[\"{[]}\"]', '/fen/lan/06/', '2022-10-03'),
(3, 2, '[\"{[]}\"]', '/fen/lan/06/', '2022-10-03'),
(4, 2, '[\"{[]}\"]', '/fen/lan/06/', '2022-10-03'),
(5, 3, '\"{[]}\"', '/fen/lan/06/', '2022-10-03');

-- --------------------------------------------------------

--
-- Structure de la table `goal_log`
--

DROP TABLE IF EXISTS `goal_log`;
CREATE TABLE IF NOT EXISTS `goal_log` (
  `goal_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `session_id` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`goal_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` timestamp NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `filters` json NOT NULL,
  `tracking_vars` json NOT NULL,
  `discovery_rate` float NOT NULL,
  `options` json NOT NULL,
  `statut` enum('on','off','pending') COLLATE utf8_unicode_ci NOT NULL,
  `uri_regex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`test_id`, `start_date`, `name`, `description`, `filters`, `tracking_vars`, `discovery_rate`, `options`, `statut`, `uri_regex`) VALUES
(4, '2022-10-25 08:15:22', 'new name = test n°4', 'This is a test for test', '[{\"id\": \"6357a5ddb99dc6a0c666c17e\", \"email\": \"holly_dejesus@centree.bl\", \"roles\": [\"guest\"], \"apiKey\": \"db661a2e-31a2-45f6-af92-f3954c506a15\", \"profile\": {\"dob\": \"1988-11-20\", \"name\": \"Holly Dejesus\", \"about\": \"Elit officia sit pariatur aliquip officia officia et id voluptate minim qui aliqua. Non exercitation reprehenderit consequat commodo officia ex sint mollit duis.\", \"address\": \"55 Plaza Street, Hamilton, New Mexico\", \"company\": \"Centree\", \"location\": {\"lat\": 71.368893, \"long\": 2.591018}}, \"username\": \"holly88\", \"createdAt\": \"2012-08-19T09:17:07.510Z\", \"updatedAt\": \"2012-08-20T09:17:07.510Z\"}]', '{\"name\": \"test\"}', 0.2, '{\"name\": \"test\"}', 'on', '\"fen/lan/99\"'),
(7, '2022-10-25 08:15:22', 'test n°5', 'This is a test for test', '[{\"id\": \"6357a5ddb99dc6a0c666c17e\", \"email\": \"holqzdqzdqzdly_dejesus@centree.bl\", \"roles\": [\"guest\"], \"apiKey\": \"db661a2e-31a2-45f6-af92-f3954c506a15\", \"profile\": {\"dob\": \"1988-11-20\", \"name\": \"Holly Dejesus\", \"about\": \"Elit officia sit pariatur aliquip officia officia et id voluptate minim qui aliqua. Non exercitation reprehenderit consequat commodo officia ex sint mollit duis.\", \"address\": \"55 Plaza Street, Hamilton, New Mexico\", \"company\": \"Centree\", \"location\": {\"lat\": 71.368893, \"long\": 2.591018}}, \"username\": \"holly88\", \"createdAt\": \"2012-08-19T09:17:07.510Z\", \"updatedAt\": \"2012-08-20T09:17:07.510Z\"}]', '{\"tracking_var\": \"test\"}', 0.2, '{\"option\": \"test\"}', 'on', '\"fen/lan/00\"');

-- --------------------------------------------------------

--
-- Structure de la table `variation`
--

DROP TABLE IF EXISTS `variation`;
CREATE TABLE IF NOT EXISTS `variation` (
  `variation_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `uri_regex` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `parameters` json NOT NULL,
  `statut` enum('off','on','pending','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  PRIMARY KEY (`variation_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `variation`
--

INSERT INTO `variation` (`variation_id`, `test_id`, `name`, `description`, `uri_regex`, `parameters`, `statut`) VALUES
(1, 4, 'variation1°', 'new variation', '/fen/lan/07/', '[[]]', 'on'),
(2, 4, 'variation°2', 'new variation', '/fen/lan/07/', '[[]]', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `visit_log`
--

DROP TABLE IF EXISTS `visit_log`;
CREATE TABLE IF NOT EXISTS `visit_log` (
  `visit_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `variation_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `device` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `visit_information` json NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`visit_log_id`),
  KEY `variation_id` (`variation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `visit_log`
--

INSERT INTO `visit_log` (`visit_log_id`, `variation_id`, `session_id`, `device`, `visit_information`, `date`) VALUES
(1, '1', 'session1', 'computer', '{}', '2022-10-03'),
(2, '1', 'session1', 'computer', '{}', '2022-10-03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
