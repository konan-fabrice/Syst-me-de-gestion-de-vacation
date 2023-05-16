-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 mai 2023 à 18:40
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vacation`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `Idclasse` varchar(11) NOT NULL,
  `libclasse` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Idclasse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`Idclasse`, `libclasse`) VALUES
('BIHAR', 'Big Data Intelligence for Human Augmented Reality'),
('MDSI', 'Management Digital et Systèmes d\'Information'),
('MBDS', 'Mobiquité, Big Data et Systèmes'),
('SIGL', 'Systèmes Informatiques et Génie Logiciel'),
('RTEL', 'Réseaux et Télécommunications'),
('SRIT', 'Systèmes, Réseaux Informatiques et Télécommunications'),
('TWIN', 'Technologies du Web et Images Numériques'),
('DASI', 'Developpement d\'Applications et Systèmes d\'Information');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `Idens` int(11) NOT NULL AUTO_INCREMENT,
  `nomens` varchar(50) DEFAULT NULL,
  `prenomens` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cptebanque` varchar(50) DEFAULT NULL,
  `idspecialite` varchar(11) NOT NULL,
  `idniveau` varchar(11) NOT NULL,
  `idsexe` varchar(11) NOT NULL,
  `matr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Idens`),
  KEY `idspecialite` (`idspecialite`),
  KEY `idniveau` (`idniveau`),
  KEY `idsexe` (`idsexe`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`Idens`, `nomens`, `prenomens`, `tel`, `email`, `cptebanque`, `idspecialite`, `idniveau`, `idsexe`, `matr`) VALUES
(1, 'Kouassi', 'Alphonse', '2250123456789', 'alphonsekouassi89@gmail.com', '1234567890', 'SEC', 'LIC', 'M', NULL),
(2, 'Touré', 'Fousseyni', '2250923450709', 'tourefousseyni21@gmail.com', '123891030', 'BigD', 'MAST', 'M', NULL),
(3, 'Koné', 'Fatim', '2250123456789', 'fatimkone2022@gmail.com', '12345122290', 'AUD', 'BTS', 'F', NULL),
(4, 'Atta', 'Grace', '2250593456789', 'graceattabb@gmail.com', '12156867890', 'IA', 'DOC', 'F', NULL),
(5, 'Ollo', 'Kpatcha', '225014451689', 'empereurollo@gmail.com', '1234567890', 'ROB', 'ING', 'M', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

DROP TABLE IF EXISTS `enseigner`;
CREATE TABLE IF NOT EXISTS `enseigner` (
  `Idens` varchar(11) NOT NULL,
  `IdUE` varchar(11) NOT NULL,
  `Idclasse` varchar(11) NOT NULL,
  `datecours` date DEFAULT NULL,
  `debutcours` time DEFAULT NULL,
  `fincours` time DEFAULT NULL,
  `volcours` int(11) DEFAULT NULL,
  `contenucours` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Idens`,`IdUE`,`Idclasse`),
  KEY `IdUE` (`IdUE`),
  KEY `Idclasse` (`Idclasse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseigner`
--

INSERT INTO `enseigner` (`Idens`, `IdUE`, `Idclasse`, `datecours`, `debutcours`, `fincours`, `volcours`, `contenucours`) VALUES
('4', 'UE001', 'MBDS', '2022-02-28', '14:15:00', '00:15:00', 2, '\r\n            Cours de mise a niveau'),
('3', 'UE001', 'MBDS', '2022-02-28', '14:15:00', '00:15:00', 2, '\r\n            Cours de mise a niveau'),
('1', 'UE002', 'TWIN', '2020-02-02', '20:16:00', '00:13:00', 2, '\r\n           salut '),
('1', 'UE002', 'RTEL', '2020-02-02', '20:16:00', '00:13:00', 2, '\r\n           salut '),
('', '', '', '2020-12-11', '00:30:00', '15:39:00', 4, 'salut\r\n            '),
('1', 'UE001', 'BIHAR', '2022-12-31', '12:13:00', '14:13:00', 4, 'salut'),
('2', 'UE002', 'BIHAR', '2020-02-10', '12:30:00', '14:50:00', 3, 'Apprentissage automatique\r\n            '),
('1', 'UE001', 'SIGL', '2021-02-22', '00:34:00', '13:43:00', 3, 'AZ\r\n            '),
('1', 'UE004', 'MDSI', '2022-12-14', '12:15:00', '13:14:00', 3, 'relatif\r\n            '),
('5', 'UE004', 'MDSI', '2022-12-14', '12:15:00', '13:14:00', 3, 'relatif\r\n            '),
('2', 'UE005', 'TWIN', '2012-12-31', '11:23:00', '13:15:00', 3, 'Intro\r\n            ');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `idniveau` varchar(11) NOT NULL,
  `libniveau` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idniveau`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`idniveau`, `libniveau`) VALUES
('BTS', 'Brevet de Technicien Superieur'),
('LIC', 'Licence'),
('MAST', 'Master'),
('DOC', 'Doctorat'),
('ING', 'Ingénieur');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `idsexe` varchar(11) NOT NULL,
  `libsexe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idsexe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`idsexe`, `libsexe`) VALUES
('M', 'Masculin'),
('F', 'Feminin');

-- --------------------------------------------------------

--
-- Structure de la table `specialité`
--

DROP TABLE IF EXISTS `specialité`;
CREATE TABLE IF NOT EXISTS `specialité` (
  `idspecialite` varchar(11) NOT NULL,
  `libspecialite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idspecialite`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialité`
--

INSERT INTO `specialité` (`idspecialite`, `libspecialite`) VALUES
('SEC', 'Sécurité'),
('BD', 'Base de Données'),
('RIT', 'Réseau'),
('IA', 'Intelligence Artificielle'),
('DEV', 'Developpement'),
('SI', 'Système d\'Information'),
('RB', 'Robotique'),
('AUD', 'Audit'),
('BigD', 'Big Data');

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

DROP TABLE IF EXISTS `ue`;
CREATE TABLE IF NOT EXISTS `ue` (
  `IdUE` varchar(11) NOT NULL,
  `libUe` varchar(50) DEFAULT NULL,
  `volUE` varchar(50) DEFAULT NULL,
  `creditUE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdUE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ue`
--

INSERT INTO `ue` (`IdUE`, `libUe`, `volUE`, `creditUE`) VALUES
('UE001', 'Optimisation', '24', '2'),
('UE002', 'Analyse de données', '24', '2'),
('UE003', 'Francais', '18', '2'),
('UE004', 'Bases de données', '20', '2'),
('UE005', 'Developpement Personnel', '13', '2');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `emailusers` varchar(256) NOT NULL,
  `passwordusers` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`emailusers`, `passwordusers`) VALUES
('admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
