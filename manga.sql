-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 fév. 2020 à 12:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `manga++`
--

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tome` int(11) NOT NULL,
  `customersID` int(11) NOT NULL,
  `borrowingDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `serieID` int(11) NOT NULL,
  `returnBool` varchar(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`),
  KEY `serieID` (`serieID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `locations`
--

INSERT INTO `locations` (`id`, `tome`, `customersID`, `borrowingDate`, `returnDate`, `serieID`, `returnBool`) VALUES
(4, 1, 11, '2020-02-18', '2020-03-03', 1, 'y'),
(5, 1, 11, '2020-02-18', '2020-03-03', 1, 'n'),
(6, 1, 11, '2020-02-18', '2020-03-03', 1, 'y'),
(7, 78, 11, '2020-02-18', '2020-03-03', 1, 'n'),
(8, 78, 11, '2020-02-18', '2020-03-03', 1, 'y'),
(9, 78, 11, '2020-02-18', '2020-03-03', 1, 'y'),
(10, 78, 11, '2020-02-18', '2020-03-03', 1, 'y');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `releaseDate` date NOT NULL,
  `author` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `name`, `releaseDate`, `author`, `picture`) VALUES
(1, 'One Piece', '1997-07-22', 'Eichiro Oda', 'onepiece.png'),
(8, 'Dragon Ball', '1984-07-13', 'Akira Toriyama', 'Dragon_Ball.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tome`
--

DROP TABLE IF EXISTS `tome`;
CREATE TABLE IF NOT EXISTS `tome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tome` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `serieID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `serieID` (`serieID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tome`
--

INSERT INTO `tome` (`id`, `tome`, `stock`, `serieID`) VALUES
(1, 1, 0, 1),
(9, 78, 21, 1),
(10, 23, 4, 1),
(11, 1, 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `password`, `admin`, `name`, `firstname`, `email`, `number`) VALUES
(11, '$2y$10$RLW.tbhS8678XBpmgXSKcegwh0jzC1/ecw7OZVD1WtNl5GmfqYjlu', 'y', 'meillat', 'tristan', 'tristan.meillat@sfr.fr', '0621474836'),
(17, '$2y$10$YIB4urOr/Z7VXARqChKIHeFX5GmpxUJyv6JxUNC/uBLRNsWml2Rt.', 'y', 'Niel', 'Kevin', 'kevinniel@gmail.com', '606060606');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
