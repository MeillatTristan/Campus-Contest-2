-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 fév. 2020 à 14:53
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
(17, '$2y$10$YIB4urOr/Z7VXARqChKIHeFX5GmpxUJyv6JxUNC/uBLRNsWml2Rt.', 'y', 'Niel', 'Kevin', 'kevinniel@gmail.com', '606060606'),
(18, '$2y$10$pc8YrKM6ZjR7pPP0bo.kRurdSbN7SY17CHYMK6qZ7ZeXwfe/Hpf6G', 'y', 'Quillet', 'Olivier', 'olivierquillet@gmail.com', '606060606');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
