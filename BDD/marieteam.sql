-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 02 nov. 2020 à 16:10
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
-- Base de données :  `marieteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
CREATE TABLE IF NOT EXISTS `bateau` (
  `NomBateau` varchar(50) NOT NULL,
  `IdBateau` varchar(50) NOT NULL,
  `CapacitéMax` int(50) NOT NULL,
  PRIMARY KEY (`IdBateau`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`NomBateau`, `IdBateau`, `CapacitéMax`) VALUES
('Maria', '1', 300),
('Abe', '2', 50),
('Mercury', '3', 150);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `lettre` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`lettre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`lettre`, `libelle`) VALUES
('A1', 'Transport léger '),
('A2', 'Transport Moyen');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `NomClient` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `NumIdentifiant` varchar(50) NOT NULL,
  `nbrPoints` varchar(50) NOT NULL,
  PRIMARY KEY (`NumIdentifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`NomClient`, `Mail`, `NumIdentifiant`, `nbrPoints`) VALUES
('BERTHA', 'greta.bertha@mail.com', 'B1', '0'),
('GENERIKAN', 'rico.generikan@mail.com', 'G1', '4');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `Mail` varchar(50) NOT NULL,
  `NumIdentifiant` varchar(50) NOT NULL,
  `MotPasse` varchar(50) NOT NULL,
  PRIMARY KEY (`Mail`),
  UNIQUE KEY `NumIdentifiant` (`NumIdentifiant`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `lettreCategorie` varchar(50) NOT NULL,
  `idBateau` int(11) NOT NULL,
  `CapacitéMax` int(11) NOT NULL,
  UNIQUE KEY `ParametreContenir` (`lettreCategorie`,`idBateau`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`lettreCategorie`, `idBateau`, `CapacitéMax`) VALUES
('A1', 1, 300),
('A2', 2, 150);

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
CREATE TABLE IF NOT EXISTS `liaison` (
  `idLiaison` varchar(50) NOT NULL,
  `Miles` varchar(50) NOT NULL,
  `PortDepart` varchar(50) NOT NULL,
  `PortArrive` varchar(50) NOT NULL,
  `NumIdentifiant` varchar(50) NOT NULL,
  `TypeTarif` varchar(50) NOT NULL,
  `codeTraverse` varchar(50) NOT NULL,
  PRIMARY KEY (`idLiaison`),
  UNIQUE KEY `NumIdentifiant` (`NumIdentifiant`),
  UNIQUE KEY `TypeTarif` (`TypeTarif`),
  UNIQUE KEY `codeTraverse` (`codeTraverse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`idLiaison`, `Miles`, `PortDepart`, `PortArrive`, `NumIdentifiant`, `TypeTarif`, `codeTraverse`) VALUES
('1', '400', '1', '2', '1', '1', '1');

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  `IdLiaison` int(11) NOT NULL,
  PRIMARY KEY (`dateDeb`),
  UNIQUE KEY `IdLiaison` (`IdLiaison`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`dateDeb`, `dateFin`, `IdLiaison`) VALUES
('2020-10-14', '2020-10-28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

DROP TABLE IF EXISTS `port`;
CREATE TABLE IF NOT EXISTS `port` (
  `Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`Id`, `nom`) VALUES
(1, 'Port Generique'),
(2, 'Port moins Generique');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `num` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adr` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `numType` int(11) NOT NULL,
  `numTraversee` int(20) NOT NULL,
  `NumClient` varchar(50) NOT NULL,
  `Total` decimal(50,0) NOT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `numTraversee` (`numTraversee`) USING BTREE,
  UNIQUE KEY `NumClient` (`NumClient`),
  UNIQUE KEY `TypeTarif` (`numType`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `NomSecteur` varchar(50) NOT NULL,
  `IdSecteur` varchar(50) NOT NULL,
  PRIMARY KEY (`IdSecteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`NomSecteur`, `IdSecteur`) VALUES
('Nord', '1'),
('Sud', '2');

-- --------------------------------------------------------

--
-- Structure de la table `tarifer`
--

DROP TABLE IF EXISTS `tarifer`;
CREATE TABLE IF NOT EXISTS `tarifer` (
  `CodeLiaison` int(11) NOT NULL,
  `DateDeb` date NOT NULL,
  `NumType` int(11) NOT NULL,
  `tarif` float NOT NULL,
  KEY `ParametreTarif` (`CodeLiaison`,`DateDeb`,`NumType`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tarifer`
--

INSERT INTO `tarifer` (`CodeLiaison`, `DateDeb`, `NumType`, `tarif`) VALUES
(1, '2020-10-14', 2, 1.46),
(1, '2020-10-14', 2, 1.46);

-- --------------------------------------------------------

--
-- Structure de la table `traverse`
--

DROP TABLE IF EXISTS `traverse`;
CREATE TABLE IF NOT EXISTS `traverse` (
  `numTraversee` int(50) NOT NULL,
  `DateTraversee` date NOT NULL,
  `heureTraverse` time NOT NULL,
  PRIMARY KEY (`numTraversee`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `traverse`
--

INSERT INTO `traverse` (`numTraversee`, `DateTraversee`, `heureTraverse`) VALUES
(1, '2020-10-14', '16:30:00'),
(2, '2020-10-14', '17:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `numType` int(11) NOT NULL,
  `libellé` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
