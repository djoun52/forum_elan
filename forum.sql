-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 juin 2020 à 08:36
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(17, 'test cat'),
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
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `texte`, `datedecreation`, `topics_id`, `user_id`) VALUES
(66, 'test 2', '2020-05-30 13:02:22', 20, 6),
(83, 'salut', '2020-06-03 10:32:38', 23, 6),
(18, 'je nâ€™arrÃªte pas de chasser', '2020-05-29 17:37:44', 14, 6),
(20, 'les combo de fujin sont trop dur', '2020-05-29 17:40:05', 15, 6),
(21, 'attention', '2020-05-29 17:48:56', 16, 6),
(79, 'aaze', '2020-06-03 00:58:46', 22, 6);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `resolue` tinyint(1) DEFAULT NULL,
  `cloture` tinyint(1) DEFAULT NULL,
  `datedecreation` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `categorie_id` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `titre`, `resolue`, `cloture`, `datedecreation`, `user_id`, `categorie_id`) VALUES
(14, 'red dead redemption c&#39;est ouf ', 1, NULL, '2020-05-29 17:37:44', 6, '10'),
(15, 'mortal  kombat combo ', NULL, 1, '2020-05-29 17:40:05', 6, '10'),
(22, 'test', NULL, NULL, '2020-06-03 00:58:46', 6, '9'),
(23, 'azerty', NULL, NULL, '2020-06-03 10:32:38', 6, '17');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `email`, `statut`, `datedecreation`) VALUES
(6, 'djoun', '$argon2i$v=19$m=65536,t=4,p=1$Y3REMkhuWUpneHhDdHJJdQ$DsEVKRn7oisKyCAmS7Ce28061DdipNQuyNLpwV+UVlM', 'simon.rioux.trv@gmail.com', NULL, '2020-05-29 13:53:11'),
(5, 'djoun52', '$argon2i$v=19$m=65536,t=4,p=1$TklRL3VLYUh2TlJ4TEU2SA$U4irq9atMZo3jzMDbBR9dTxRsXVvAN1ibpW5joxinB0', 'altahit07@gmail.com', NULL, '2020-05-29 13:11:51'),
(7, 'srioux', '$argon2i$v=19$m=65536,t=4,p=1$bDdJRzZvZkVMeGRvU1FIRw$AdYB1rVjJ0/9guzVZY1QdCxaS8/GLL4kvZHtRnvBfE0', 'srioux', NULL, '2020-06-03 09:37:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
