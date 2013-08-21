-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 17 Août 2013 à 15:25
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(245) NOT NULL,
  `contenu` text NOT NULL,
  `id_usager` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_usager` (`id_usager`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_article`, `titre`, `contenu`, `id_usager`) VALUES
(1, 'Article 1', 'Contenu de l''Article 1', 1),
(2, 'Article 2', 'Contenu de l''Article 2', 2),
(3, 'Article 3', 'Contenu de l''Article 3', 3),
(4, 'Article 4', 'Contenu de l''Article 4', 3);

-- --------------------------------------------------------

--
-- Structure de la table `articles_mots_cle`
--

CREATE TABLE IF NOT EXISTS `articles_mots_cle` (
  `id_article` int(11) NOT NULL,
  `id_mot_cle` int(11) NOT NULL,
  KEY `id_article` (`id_article`),
  KEY `id_mot_cle` (`id_mot_cle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles_mots_cle`
--

INSERT INTO `articles_mots_cle` (`id_article`, `id_mot_cle`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `mots_cle`
--

CREATE TABLE IF NOT EXISTS `mots_cle` (
  `id_mot_cle` int(11) NOT NULL,
  `mot_cle` varchar(245) NOT NULL,
  PRIMARY KEY (`id_mot_cle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `mots_cle`
--

INSERT INTO `mots_cle` (`id_mot_cle`, `mot_cle`) VALUES
(1, 'motCle1'),
(2, 'motCle2'),
(3, 'motCle3');

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

CREATE TABLE IF NOT EXISTS `usagers` (
  `id_usager` int(11) NOT NULL AUTO_INCREMENT,
  `code_usager` varchar(45) NOT NULL UNIQUE,
  `mot_de_passe` varchar(32) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `courriel` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usager`,`code_usager`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usagers`
--

INSERT INTO `usagers` (`id_usager`, `code_usager`, `mot_de_passe`, `nom`, `prenom`, `courriel`) VALUES
(1, 'guillaume', '0937d6b529933d0ef59ce458668013b9', 'Harvey', 'Guillaume', 'guillaume@courriel.com'),
(2, 'louis', '777cadc280bb23ebea268ded98338c39', 'Cyr', 'Louis', 'louis@courriel.com'),
(3, 'valeriu', '92aad5242167295cde90f76ea947e12c', 'Tihai', 'Valeriu', 'valeriu@courriel.com');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_usager`) REFERENCES `usagers` (`id_usager`);

--
-- Contraintes pour la table `articles_mots_cle`
--
ALTER TABLE `articles_mots_cle`
  ADD CONSTRAINT `articles_mots_cle_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `articles_mots_cle_ibfk_2` FOREIGN KEY (`id_mot_cle`) REFERENCES `mots_cle` (`id_mot_cle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
