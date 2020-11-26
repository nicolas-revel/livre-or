-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 nov. 2020 à 23:08
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'Ceci est un essai de commentaire.', 1, '2020-11-24 18:11:39'),
(2, 'Ceci est un autre test de commentaire par un autre utilisateur.', 4, '2020-11-24 18:13:03'),
(3, 'Ceci est un autre commentaire r&eacute;alis&eacute; par le m&ecirc;me utilisateur que pr&eacute;c&eacute;demment.', 4, '2020-11-24 18:16:05'),
(4, '&lt;b&gt;test&lt;b/&gt;', 1, '2020-11-26 17:01:25');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'test', '$2y$10$uN1YN8ZxP5ARYQj2yNEWzeZa4OJg1zMpi/X9jW8R4cBbR6SC3rNyi'),
(2, 'Nico_Rvl', '$2y$10$UUq9iyxYjhp/okfZgi32teZgg8VyQuDMCRZkXpZDKwMdO6UsKZ58G'),
(3, 'retest', '$2y$10$vqKJaHHXNBzUjvJ2NTIVKu5LlNhW/zAlD5xocuKD7ox9vhNsG3ts2'),
(4, 'hello', '$2y$10$Ku3IWID2YQPt27U1I7qd1u959eXIUMVlmkYhSoOUWnEv1glb4iMS2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
