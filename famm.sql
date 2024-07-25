-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 07 juil. 2024 à 23:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `famm`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nomfam` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `datenaiss` date NOT NULL,
  `lieunaiss` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `numtel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idpar` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `nomfam`, `mdp`, `code`, `sexe`, `datenaiss`, `lieunaiss`, `numtel`, `idpar`) VALUES
(1, 'Dichama', 'Prosper', 'Dichama', 'Azerty', 'aqzsedrftg', 'M', '0000-00-00', 'Douala', '600000000', 0),
(4, 'Kamgaing', 'Siméon', 'Kamgaing', 'azerty', 'qsdfgh', 'm', '2024-05-10', 'Douala', '694187594', 1),
(5, 'Kadem', 'Michel', '', NULL, 'wxcvbn', 'M', '2024-07-03', 'Douala', '698585540', 1),
(6, 'Pouemeugne', 'Ivan', NULL, NULL, '', 'M', '2002-07-29', 'Douala', '693758476', 4),
(9, 'Kanmi', 'Céleste', NULL, NULL, '', 'F', '2004-08-21', 'Douala', '656155356', 4),
(10, 'Feukam', 'Dan', NULL, NULL, '', 'M', '2002-07-29', 'Douala', '698585547', 4),
(11, 'Feumegne', 'Arthur', NULL, NULL, '', 'M', '2007-12-16', 'Douala', '693545667', 4),
(12, 'Kamgang', 'Bubiane', NULL, NULL, '', 'F', '1972-06-04', 'Ngounso', '699905456', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
