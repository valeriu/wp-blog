-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Ven 19 Juillet 2013 à 17:16
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id_posts` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(245) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `views` int(11) DEFAULT '0',
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id_posts`),
  KEY `fk_posts_users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id_posts`, `title`, `content`, `date`, `views`, `users_id`) VALUES
(1, 'Frist post', 'tect frist post', '2013-07-19 00:00:00', 0, 2),
(2, 'post 2', 'post2#', '2013-07-20 00:00:00', 0, 3),
(3, 'post3', 'post3', '2013-07-18 00:00:00', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `posts_tags`
--

CREATE TABLE IF NOT EXISTS `posts_tags` (
  `id_post_tag` int(11) NOT NULL AUTO_INCREMENT,
  `posts_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post_tag`),
  KEY `fk_post_tag_posts_id` (`posts_id`),
  KEY `fk_post_tag_tags_id` (`tags_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `posts_tags`
--

INSERT INTO `posts_tags` (`id_post_tag`, `posts_id`, `tags_id`) VALUES
(1, 1, 2),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id_tags` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id_tags`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id_tags`, `tag`) VALUES
(1, 'tag1'),
(2, 'tag2');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `email`, `nom`, `prenom`) VALUES
(1, 'valeriu', '202cb962ac59075b964b07152d234b70', 'valeriu@tihai.md', 'Valeriu', 'Tihai'),
(2, 'louis', '202cb962ac59075b964b07152d234b70', ' louis@cyr.ca', ' Louis', ' Cyr'),
(3, 'test', '202cb962ac59075b964b07152d234b70', 'test@testéca', 'Test', 'Testovici');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `fk_post_tag_posts` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id_posts`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_post_tag_tags` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id_tags`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
