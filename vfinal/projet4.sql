-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 oct. 2019 à 17:11
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
-- Base de données :  `projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `password`) VALUES
(1, 'JeanForteroche', '$2y$10$5NKkMyxgdQBid2vK2ixrneoJ22DP6668KjwCzdDLjPT.kIbpkrar.');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `report`) VALUES
(20, 7, 'lol', 'tro for', '2019-08-24 10:40:01', 0),
(11, 1, 'aze', 'aze', '2019-07-31 18:00:47', 0),
(19, 1, 'coucou', 'test', '2019-08-24 10:23:30', 0),
(21, 8, 'claude', 'un autre contenu', '2019-10-03 01:48:51', 0),
(22, 8, 'Jack', 'Ceci est le contenu du comment', '2019-10-03 01:50:58', 0),
(23, 8, 'nouveau testeur', 'bonjour ça marche ?', '2019-10-04 20:18:27', 0),
(24, 7, 'Tiens tiens tiens', 'mais qui voilage', '2019-10-04 20:19:03', 0),
(25, 8, 'Coucou', 'test des classes', '2019-10-04 20:45:04', 0),
(26, 7, 'test avec l\'heritage', 'Fortune', '2019-10-04 20:50:49', 0),
(27, 8, 'test final', 'ah ', '2019-10-04 21:02:01', 0),
(28, 8, 'test avec la classe', 'Ouah la classe', '2019-10-04 21:11:20', 0),
(29, 1, 'on test enfin', 'la fin', '2019-10-04 21:15:36', 0),
(30, 7, 'un dernier ', 'pour la route\r\n', '2019-10-04 21:18:53', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(3000) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `published`, `creation_date`) VALUES
(1, 'Article 1', 'Je souhaite le modifier\r\n', 0, '2019-08-21 13:00:00'),
(7, 'Article2', 'aazazazazaz', 1, '2019-08-24 14:00:00'),
(8, 'Article 3', 'alors qu\'il gambadait tranquillement, son cheval, effrayé par l\'arrivée brusque d\'un lièvre, fit une voltige', 1, '2019-08-25 13:36:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
