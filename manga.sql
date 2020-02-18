-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 fév. 2020 à 14:13
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `locations`
--

INSERT INTO `locations` (`id`, `tome`, `customersID`, `borrowingDate`, `returnDate`, `serieID`, `returnBool`) VALUES
(1, 2, 11, '2020-02-14', '2020-01-16', 2, 'y'),
(2, 4, 14, '2020-02-15', '2020-02-29', 2, 'y'),
(3, 3, 11, '2020-02-18', '2020-03-03', 2, 'y'),
(4, 1, 11, '2020-02-18', '2020-03-03', 1, 'y'),
(5, 1, 11, '2020-02-18', '2020-03-03', 1, 'n');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `name`, `releaseDate`, `author`, `picture`) VALUES
(1, 'One Piece', '1997-07-22', 'Eichiro Oda', 'onepiece.jpg'),
(2, 'Naruto', '1999-09-20', 'Masashi Kishimoto', 'none'),
(3, 'Berserk', '1989-02-24', 'Kentaro Miura', 'none');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tome`
--

INSERT INTO `tome` (`id`, `tome`, `stock`, `serieID`) VALUES
(1, 1, 1, 1),
(2, 1, 20, 2),
(3, 2, 10, 2),
(4, 3, 3, 2),
(5, 4, 3, 2),
(6, 5, 0, 2),
(9, 78, 24, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `password`, `admin`, `name`, `firstname`, `email`, `number`) VALUES
(11, '$2y$10$RLW.tbhS8678XBpmgXSKcegwh0jzC1/ecw7OZVD1WtNl5GmfqYjlu', 'y', 'meillat', 'tristan', 'tristan.meillat@sfr.fr', '0621474836'),
(14, '$2y$10$l2xST7Zx/A3ZzVck8UoGVuYfkEn3oql53UQRFfedHtqg7M87BgD7O', 'n', 'Burt', 'Alex', 'alexbeurthe@gmail.com', '606060606'),
(15, '$2y$10$CeUDzRe/zoDB7beL1V4guuvbpq63FIK.kgi4JCLjpFEXAJez1xDe.', 'n', 'Quillet', 'Olivier', 'olivierquillet@gmail.com', '652545856'),
(17, '$2y$10$YIB4urOr/Z7VXARqChKIHeFX5GmpxUJyv6JxUNC/uBLRNsWml2Rt.', 'y', 'Niel', 'Kevin', 'kevinniel@gmail.com', '606060606'),
(18, '$2y$10$Hs4PhRLlEVl0J9pCAlkRnOFLrJPeIVMJWIXopgb9Ojb0HjCLtO1/6', 'n', 'Monnier', 'Jean-Louis', 'jean-louis.monnier@students.campus.academy', '780376830');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
