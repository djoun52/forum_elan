-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 30 mai 2020 à 07:36
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(13, 'test redirection'),
(12, 'cosmologie'),
(15, 'tset'),
(10, 'jeux video'),
(9, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texte` text COLLATE utf8_bin NOT NULL,
  `datedecreation` datetime NOT NULL DEFAULT current_timestamp(),
  `topics_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sujet` (`topics_id`),
  KEY `id_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `texte`, `datedecreation`, `topics_id`, `user_id`) VALUES
(18, 'je nâ€™arrÃªte pas de chasser', '2020-05-29 17:37:44', 14, 6),
(20, 'les combo de fujin sont trop dur', '2020-05-29 17:40:05', 15, 6),
(21, 'attention', '2020-05-29 17:48:56', 16, 6),
(63, 'aze', '2020-05-30 08:22:47', 19, 6);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `statut` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `datedecreation` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `categorie_id` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `titre`, `statut`, `datedecreation`, `user_id`, `categorie_id`) VALUES
(14, 'red dead redemption c&#39;est ouf ', NULL, '2020-05-29 17:37:44', 6, '10'),
(15, 'mortal  kombat combo ', NULL, '2020-05-29 17:40:05', 6, '10'),
(19, 'test', NULL, '2020-05-29 22:56:03', 6, '15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `statut` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `datedecreation` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `email`, `statut`, `datedecreation`) VALUES
(6, 'djoun', '$argon2i$v=19$m=65536,t=4,p=1$Y3REMkhuWUpneHhDdHJJdQ$DsEVKRn7oisKyCAmS7Ce28061DdipNQuyNLpwV+UVlM', 'simon.rioux.trv@gmail.com', NULL, '2020-05-29 13:53:11'),
(5, 'djoun52', '$argon2i$v=19$m=65536,t=4,p=1$TklRL3VLYUh2TlJ4TEU2SA$U4irq9atMZo3jzMDbBR9dTxRsXVvAN1ibpW5joxinB0', 'altahit07@gmail.com', NULL, '2020-05-29 13:11:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
