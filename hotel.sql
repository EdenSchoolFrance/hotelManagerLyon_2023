-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 avr. 2023 à 08:53
-- Version du serveur : 8.0.27
-- Version de PHP : 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel_manager`
--

-- --------------------------------------------------------

--
-- Structure de la table `bar`
--

DROP TABLE IF EXISTS `bar`;
CREATE TABLE IF NOT EXISTS `bar` (
  `id_bar` int NOT NULL AUTO_INCREMENT,
  `name_bar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `bar`
--

INSERT INTO `bar` (`id_bar`, `name_bar`) VALUES
(1, 'kjgh');

-- --------------------------------------------------------

--
-- Structure de la table `bar_boisson`
--

DROP TABLE IF EXISTS `bar_boisson`;
CREATE TABLE IF NOT EXISTS `bar_boisson` (
  `id_boisson` int NOT NULL,
  `id_bar` int NOT NULL,
  `quantite_stock_bar_boisson` int NOT NULL,
  KEY `id_boisson` (`id_boisson`,`id_bar`),
  KEY `id_bar` (`id_bar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

DROP TABLE IF EXISTS `boisson`;
CREATE TABLE IF NOT EXISTS `boisson` (
  `id_boisson` int NOT NULL AUTO_INCREMENT,
  `name_boisson` varchar(50) NOT NULL,
  `description_boisson` varchar(255) NOT NULL,
  `image_boisson` varchar(255) NOT NULL,
  `prix_un_boisson` float NOT NULL,
  PRIMARY KEY (`id_boisson`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`id_boisson`, `name_boisson`, `description_boisson`, `image_boisson`, `prix_un_boisson`) VALUES
(1, 'gsdfg', 'sdghf', '626686ba8c531-Quad Ice Road 3.jpg', 22);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id_chambre` int NOT NULL AUTO_INCREMENT,
  `name_chambre` varchar(50) NOT NULL,
  `description_chambre` text NOT NULL,
  `image_chambre` varchar(255) NOT NULL,
  `options_chambre` varchar(255) NOT NULL,
  `prix_chambre` double NOT NULL,
  `occupe_chambre` tinyint(1) NOT NULL,
  `categorie_chambre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `name_chambre`, `description_chambre`, `image_chambre`, `options_chambre`, `prix_chambre`, `occupe_chambre`, `categorie_chambre`) VALUES
(2, 'chambre 200', 'sdfg gsgq qsgs gSG', '6266861bd2117-Quad Ice Road 3.jpg', 'dfs', 11, 0, 'fsd'),
(3, 'chambre 200', 'sdfg gsgq qsgs gSG', '6266862e23224-Quad Ice Road 3.jpg', 'dfs', 10, 0, 'fsd');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `mdp_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `email_client`, `mdp_client`) VALUES
(1, 'fgdh', 'hdfghjghfgh', 'adminoza@gmail.com', '$2y$10$IYBAvBX3Rqva0qr4NYPPMuGg2sn5AlxYtiyWqQidhycY6451uoU3C');

-- --------------------------------------------------------

--
-- Structure de la table `client_boisson`
--

DROP TABLE IF EXISTS `client_boisson`;
CREATE TABLE IF NOT EXISTS `client_boisson` (
  `id_client` int NOT NULL,
  `id_boisson` int NOT NULL,
  `quantite_client_boisson` int NOT NULL,
  `date_client_boisson` date NOT NULL,
  KEY `id_client` (`id_client`,`id_boisson`),
  KEY `id_boisson` (`id_boisson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_chambre`
--

DROP TABLE IF EXISTS `client_chambre`;
CREATE TABLE IF NOT EXISTS `client_chambre` (
  `id_client` int NOT NULL,
  `id_chambre` int NOT NULL,
  `date_debut_reservation_chambre` date NOT NULL,
  `date_fin_reservation_piscine_chambre` date NOT NULL,
  `num_reservation_chambre` int NOT NULL,
  `status_chambre` varchar(50) NOT NULL,
  PRIMARY KEY (`num_reservation_chambre`),
  KEY `id_client` (`id_client`,`id_chambre`),
  KEY `id_chambre` (`id_chambre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_menu`
--

DROP TABLE IF EXISTS `client_menu`;
CREATE TABLE IF NOT EXISTS `client_menu` (
  `id_client` int NOT NULL,
  `id_menu` int NOT NULL,
  `quantite_client_menu` int NOT NULL,
  `date_client_menu` date NOT NULL,
  KEY `id_client` (`id_client`,`id_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_piscine`
--

DROP TABLE IF EXISTS `client_piscine`;
CREATE TABLE IF NOT EXISTS `client_piscine` (
  `id_piscine` int NOT NULL,
  `id_client` int NOT NULL,
  `date_debut_reservation_piscine` date NOT NULL,
  `date_fin_reservation_piscine` date NOT NULL,
  `num_reservation_piscine` int NOT NULL,
  `status_piscine` varchar(50) NOT NULL,
  PRIMARY KEY (`num_reservation_piscine`),
  KEY `id_piscine` (`id_piscine`,`id_client`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_salle`
--

DROP TABLE IF EXISTS `client_salle`;
CREATE TABLE IF NOT EXISTS `client_salle` (
  `id_client` int NOT NULL,
  `id_salle` int NOT NULL,
  `date_debut_reservation_salle` date NOT NULL,
  `date_fin_reservation_salle` date NOT NULL,
  `num_reservation_salle` int NOT NULL,
  `status_salle` varchar(50) NOT NULL,
  PRIMARY KEY (`num_reservation_salle`),
  KEY `id_client` (`id_client`,`id_salle`),
  KEY `id_salle` (`id_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `num_reference` int NOT NULL,
  `date_facture` date NOT NULL,
  `total_ttc` float NOT NULL,
  PRIMARY KEY (`id_facture`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `id_restaurant` int NOT NULL,
  `name_menu` varchar(50) NOT NULL,
  `description_menu` varchar(255) NOT NULL,
  `image_menu` varchar(255) NOT NULL,
  `prix_un_menu` float NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id_restaurant` (`id_restaurant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `piscine`
--

DROP TABLE IF EXISTS `piscine`;
CREATE TABLE IF NOT EXISTS `piscine` (
  `id_piscine` int NOT NULL AUTO_INCREMENT,
  `name_piscine` varchar(255) NOT NULL,
  `description_piscine` text NOT NULL,
  `image_piscine` varchar(255) NOT NULL,
  `ouverture_piscine` time NOT NULL,
  `fermeture_piscine` time NOT NULL,
  `nettoyage_piscine` date NOT NULL,
  PRIMARY KEY (`id_piscine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `id_restaurant` int NOT NULL AUTO_INCREMENT,
  `name_restaurant` varchar(50) NOT NULL,
  PRIMARY KEY (`id_restaurant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `name_salle` varchar(52) NOT NULL,
  `description_salle` text NOT NULL,
  `image_salle` varchar(255) NOT NULL,
  `type_salle` varchar(50) NOT NULL,
  `options_salle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bar_boisson`
--
ALTER TABLE `bar_boisson`
  ADD CONSTRAINT `bar_boisson_ibfk_1` FOREIGN KEY (`id_bar`) REFERENCES `bar` (`id_bar`),
  ADD CONSTRAINT `bar_boisson_ibfk_2` FOREIGN KEY (`id_boisson`) REFERENCES `boisson` (`id_boisson`);

--
-- Contraintes pour la table `client_boisson`
--
ALTER TABLE `client_boisson`
  ADD CONSTRAINT `client_boisson_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `client_boisson_ibfk_2` FOREIGN KEY (`id_boisson`) REFERENCES `boisson` (`id_boisson`);

--
-- Contraintes pour la table `client_chambre`
--
ALTER TABLE `client_chambre`
  ADD CONSTRAINT `client_chambre_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `client_chambre_ibfk_2` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`);

--
-- Contraintes pour la table `client_menu`
--
ALTER TABLE `client_menu`
  ADD CONSTRAINT `client_menu_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `client_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Contraintes pour la table `client_piscine`
--
ALTER TABLE `client_piscine`
  ADD CONSTRAINT `client_piscine_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `client_piscine_ibfk_2` FOREIGN KEY (`id_piscine`) REFERENCES `piscine` (`id_piscine`);

--
-- Contraintes pour la table `client_salle`
--
ALTER TABLE `client_salle`
  ADD CONSTRAINT `client_salle_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `client_salle_ibfk_2` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_restaurant`) REFERENCES `restaurant` (`id_restaurant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
