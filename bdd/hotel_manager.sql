-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 avr. 2023 à 17:28
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

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

CREATE TABLE `bar` (
  `id_bar` int(11) NOT NULL,
  `name_bar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bar`
--

INSERT INTO `bar` (`id_bar`, `name_bar`) VALUES
(2, 'EdenBar'),
(3, 'WineWood');

-- --------------------------------------------------------

--
-- Structure de la table `bar_boisson`
--

CREATE TABLE `bar_boisson` (
  `id_boisson` int(11) NOT NULL,
  `id_bar` int(11) NOT NULL,
  `quantite_stock_bar_boisson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bar_boisson`
--

INSERT INTO `bar_boisson` (`id_boisson`, `id_bar`, `quantite_stock_bar_boisson`) VALUES
(3, 2, 94),
(5, 2, 100),
(2, 3, 100),
(4, 3, 100);

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `id_boisson` int(11) NOT NULL,
  `name_boisson` varchar(50) NOT NULL,
  `description_boisson` varchar(255) NOT NULL,
  `image_boisson` varchar(255) NOT NULL,
  `prix_un_boisson` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`id_boisson`, `name_boisson`, `description_boisson`, `image_boisson`, `prix_un_boisson`) VALUES
(2, 'Beaujolais Rouge', 'Vin Rouge Bio de haute qualité', 'beaujolais.jpg', 2.99),
(3, 'Jack Daniel', 'verre de whisky avec des glaçons', 'jack.jpg', 4.99),
(4, 'Chardonnay', 'Vin blanc fruité, gout divin', 'chardonnay.jpg', 4.99),
(5, 'Get 27', 'verre de Get 27 avec des glaçons', 'get.jpg', 4.99);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `name_chambre` varchar(50) NOT NULL,
  `description_chambre` text NOT NULL,
  `image_chambre` varchar(255) NOT NULL,
  `options_chambre` varchar(255) NOT NULL,
  `prix_chambre` double NOT NULL,
  `occupe_chambre` tinyint(1) NOT NULL,
  `categorie_chambre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `name_chambre`, `description_chambre`, `image_chambre`, `options_chambre`, `prix_chambre`, `occupe_chambre`, `categorie_chambre`) VALUES
(2, 'chambre 200', 'sdfg gsgq qsgs gSG', '555444.jpg', 'dfs', 11, 0, 'fsd'),
(3, 'chambre 205', 'sdfg gsgq qsgs gSG', '1455690.jpg', 'dfs', 10, 0, 'fsd');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `mdp_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `email_client`, `mdp_client`) VALUES
(2, 'Bouillard', 'Benjamin', 'benjibouillard@gmail.com', '$2y$10$qlhuJmMASJpco9DCEGAi0ezBbkXLNO7AQfB/.sW0rkBNElcLp7ZUS'),
(3, 'abdel', 'soulax', 'abdelsoulax@gmail.com', '$2y$10$gJmIpwSCecrBZOIrrpVh1.dt4Xe6PGLCO6m1Bybsn7V.r9plXC2hy'),
(4, 'dhfdhf', 'hfdhfdhdfhf', 'fhfdhdh@gmail.com', '$2y$10$WmqY5ERTUoddy8N01drlG.UWrdAFiUe5H38WgcU5TPn1hQ/rrVar2');

-- --------------------------------------------------------

--
-- Structure de la table `client_boisson`
--

CREATE TABLE `client_boisson` (
  `id_client` int(11) NOT NULL,
  `id_boisson` int(11) NOT NULL,
  `quantite_client_boisson` int(11) NOT NULL,
  `date_client_boisson` date NOT NULL,
  `status_boisson` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client_boisson`
--

INSERT INTO `client_boisson` (`id_client`, `id_boisson`, `quantite_client_boisson`, `date_client_boisson`, `status_boisson`) VALUES
(2, 3, 3, '2023-04-13', 0),
(2, 3, 3, '2023-04-13', 0),
(2, 3, 3, '2023-04-13', 0),
(2, 3, 3, '2023-04-13', 0);

-- --------------------------------------------------------

--
-- Structure de la table `client_chambre`
--

CREATE TABLE `client_chambre` (
  `id_client` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `date_debut_reservation_chambre` date NOT NULL,
  `date_fin_reservation_chambre` date NOT NULL,
  `num_reservation_chambre` varchar(15) NOT NULL,
  `status_chambre` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client_chambre`
--

INSERT INTO `client_chambre` (`id_client`, `id_chambre`, `date_debut_reservation_chambre`, `date_fin_reservation_chambre`, `num_reservation_chambre`, `status_chambre`) VALUES
(3, 2, '2023-04-14', '2023-04-16', '6437bb3962aa2', 0),
(2, 2, '2023-04-01', '2023-04-02', '643815b8654c6', 0),
(4, 3, '2023-04-14', '2023-04-28', '643819fdb96a2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `client_menu`
--

CREATE TABLE `client_menu` (
  `id_client` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `quantite_client_menu` int(11) NOT NULL,
  `date_client_menu` date NOT NULL,
  `status_menu` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client_menu`
--

INSERT INTO `client_menu` (`id_client`, `id_menu`, `quantite_client_menu`, `date_client_menu`, `status_menu`) VALUES
(2, 3, 3, '2023-04-13', 0),
(2, 1, 1, '2023-04-13', 0);

-- --------------------------------------------------------

--
-- Structure de la table `client_piscine`
--

CREATE TABLE `client_piscine` (
  `id_piscine` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_debut_reservation_piscine` date NOT NULL,
  `date_fin_reservation_piscine` date NOT NULL,
  `num_reservation_piscine` int(11) NOT NULL,
  `status_piscine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client_salle`
--

CREATE TABLE `client_salle` (
  `id_client` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `date_debut_reservation_salle` date NOT NULL,
  `date_fin_reservation_salle` date NOT NULL,
  `num_reservation_salle` int(11) NOT NULL,
  `status_salle` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client_salle`
--

INSERT INTO `client_salle` (`id_client`, `id_salle`, `date_debut_reservation_salle`, `date_fin_reservation_salle`, `num_reservation_salle`, `status_salle`) VALUES
(2, 1, '2023-04-29', '2023-04-30', 643807, 0),
(2, 1, '2023-04-20', '2023-04-22', 6438081, 0);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `num_reference` int(11) NOT NULL,
  `date_facture` date NOT NULL,
  `total_ttc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `name_menu` varchar(50) NOT NULL,
  `description_menu` varchar(255) NOT NULL,
  `image_menu` varchar(255) NOT NULL,
  `prix_un_menu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_restaurant`, `name_menu`, `description_menu`, `image_menu`, `prix_un_menu`) VALUES
(1, 1, 'EdenChild', 'Menu enfant : hamburger maison, frites, boisson, dessert.', 'edenchild.jpg', 9.99),
(2, 2, 'Kebab', 'Kebab recette maison (poulet, crudités,...)', 'kebab.jpg', 8.99),
(3, 2, 'Galette', 'Galette recette maison (poulet, crudité,...)', 'galette.jpg', 5.99),
(4, 1, 'EdenGourmand', 'Menu XXL pour les gourmands (2x Hamburger, frites, tenders, 2x Boisson)', 'edengourmand.jpg', 18.99);

-- --------------------------------------------------------

--
-- Structure de la table `piscine`
--

CREATE TABLE `piscine` (
  `id_piscine` int(11) NOT NULL,
  `name_piscine` varchar(255) NOT NULL,
  `description_piscine` text NOT NULL,
  `image_piscine` varchar(255) NOT NULL,
  `ouverture_piscine` time NOT NULL,
  `fermeture_piscine` time NOT NULL,
  `nettoyage_piscine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id_restaurant` int(11) NOT NULL,
  `name_restaurant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`id_restaurant`, `name_restaurant`) VALUES
(1, 'EdenFood'),
(2, 'Chef Berliner');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `name_salle` varchar(52) NOT NULL,
  `description_salle` text NOT NULL,
  `image_salle` varchar(255) NOT NULL,
  `type_salle` varchar(50) NOT NULL,
  `options_salle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `name_salle`, `description_salle`, `image_salle`, `type_salle`, `options_salle`) VALUES
(1, 'Salle réunion', 'Salle de réunion (max 12 pers.) avec grande table centrale.', 'sallereunion.jpg', 'reunion', 'videoprojecteur'),
(2, 'Salle Eden Festivités', 'Salle conçu pour accueillir une cinquantaine de personnes.', 'sallefestivite.jpg', 'fêtes', 'boisson à volonté');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`id_bar`);

--
-- Index pour la table `bar_boisson`
--
ALTER TABLE `bar_boisson`
  ADD KEY `id_boisson` (`id_boisson`,`id_bar`),
  ADD KEY `id_bar` (`id_bar`);

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`id_boisson`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `client_boisson`
--
ALTER TABLE `client_boisson`
  ADD KEY `id_client` (`id_client`,`id_boisson`),
  ADD KEY `id_boisson` (`id_boisson`);

--
-- Index pour la table `client_chambre`
--
ALTER TABLE `client_chambre`
  ADD PRIMARY KEY (`num_reservation_chambre`),
  ADD KEY `id_client` (`id_client`,`id_chambre`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `client_menu`
--
ALTER TABLE `client_menu`
  ADD KEY `id_client` (`id_client`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Index pour la table `client_piscine`
--
ALTER TABLE `client_piscine`
  ADD PRIMARY KEY (`num_reservation_piscine`),
  ADD KEY `id_piscine` (`id_piscine`,`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `client_salle`
--
ALTER TABLE `client_salle`
  ADD PRIMARY KEY (`num_reservation_salle`),
  ADD KEY `id_client` (`id_client`,`id_salle`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_restaurant` (`id_restaurant`);

--
-- Index pour la table `piscine`
--
ALTER TABLE `piscine`
  ADD PRIMARY KEY (`id_piscine`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bar`
--
ALTER TABLE `bar`
  MODIFY `id_bar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id_boisson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `piscine`
--
ALTER TABLE `piscine`
  MODIFY `id_piscine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
