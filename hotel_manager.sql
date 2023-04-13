-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 avr. 2023 à 17:56
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bar`
--

INSERT INTO `bar` (`id_bar`, `name_bar`) VALUES
(1, 'kjgh'),
(2, 'Montagne');

-- --------------------------------------------------------

--
-- Structure de la table `bar_boisson`
--

CREATE TABLE `bar_boisson` (
  `id_boisson` int(11) NOT NULL,
  `id_bar` int(11) NOT NULL,
  `quantite_stock_bar_boisson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bar_boisson`
--

INSERT INTO `bar_boisson` (`id_boisson`, `id_bar`, `quantite_stock_bar_boisson`) VALUES
(1, 2, 7),
(3, 1, 4),
(4, 2, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`id_boisson`, `name_boisson`, `description_boisson`, `image_boisson`, `prix_un_boisson`) VALUES
(1, 'gsdfg', 'sdghf', 'boisson1.jpg', 22),
(3, 'Vodka', 'dfffff', 'boisson2.jpg', 23),
(4, 'Pastis', 'zdzffzfz', 'boisson2.jpg', 78);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `name_chambre`, `description_chambre`, `image_chambre`, `options_chambre`, `prix_chambre`, `occupe_chambre`, `categorie_chambre`) VALUES
(1, 'Chambre 1', 'Lorem ipsumLorem ipsumLorem ipsum', 'chambre1.jpg', 'Balcon', 300, 0, 'dzdz'),
(2, 'Chambre 2', 'sdfg gsgq qsgs gSG', 'chambre2.jpg', '', 200, 0, 'fsd'),
(3, 'Chambre 3', 'sdfg gsgq qsgs gSG', 'chambre3.jpg', 'Climatisaion', 350, 0, 'fsd'),
(4, 'Chambre 4', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point o\r\n', 'chambre4.jpg', '', 120, 0, 'zddz'),
(5, 'Chambre 5', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point o', 'chambre5.jpg', '', 0, 0, 'zddz'),
(6, 'Chambre 6', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point o', 'chambre6.jpg', '', 0, 0, 'zdd');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `email_client`, `mdp_client`) VALUES
(45, 'Ulysse', 'pd', 'Ulysse.Giroud@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `client_boisson`
--

CREATE TABLE `client_boisson` (
  `id_client` int(11) NOT NULL,
  `id_boisson` int(11) NOT NULL,
  `quantite_client_boisson` int(11) NOT NULL,
  `date_client_boisson` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_chambre`
--

CREATE TABLE `client_chambre` (
  `id_client` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `date_debut_reservation_chambre` date NOT NULL,
  `date_fin_reservation_piscine_chambre` date NOT NULL,
  `num_reservation_chambre` int(11) NOT NULL,
  `status_chambre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_menu`
--

CREATE TABLE `client_menu` (
  `id_client` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `quantite_client_menu` int(11) NOT NULL,
  `date_client_menu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status_salle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `prix_menu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_restaurant`, `name_menu`, `description_menu`, `image_menu`, `prix_menu`) VALUES
(1, 1, 'Menu 1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point o', 'menu1.jpg', 15);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `piscine`
--

INSERT INTO `piscine` (`id_piscine`, `name_piscine`, `description_piscine`, `image_piscine`, `ouverture_piscine`, `fermeture_piscine`, `nettoyage_piscine`) VALUES
(1, 'Piscine', 'effzfeffz', 'piscine1.jpg', '23:36:02', '00:14:02', '2023-04-10'),
(4, 'Piscine 2', 'test', 'test', '09:30:00', '18:30:00', '0000-00-00'),
(5, 'test', 'test', 'test', '00:00:00', '00:00:00', '0000-00-00'),
(6, 'test', 'test', 'test', '00:00:00', '00:00:00', '0000-00-00'),
(7, 'test', 'test', 'test', '00:00:00', '00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id_restaurant` int(11) NOT NULL,
  `name_restaurant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`id_restaurant`, `name_restaurant`) VALUES
(1, 'Restaurant Nord'),
(2, 'Restaurant Sud');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `name_salle`, `description_salle`, `image_salle`, `type_salle`, `options_salle`) VALUES
(1, 'Cuisine', 'dzdzzdzddzd', 'salle1.jpg', '', '');

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
  MODIFY `id_bar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id_boisson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `piscine`
--
ALTER TABLE `piscine`
  MODIFY `id_piscine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
