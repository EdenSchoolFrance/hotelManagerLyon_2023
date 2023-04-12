-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 12 avr. 2023 à 16:27
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
(1, 'Le Drink');

-- --------------------------------------------------------

--
-- Structure de la table `bar_boisson`
--

CREATE TABLE `bar_boisson` (
  `id_boisson` int(11) NOT NULL,
  `id_bar` int(11) NOT NULL,
  `quantite_stock_bar_boisson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'gsdfg', 'sdghf', '626686ba8c531-Quad Ice Road 3.jpg', 22);

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
(2, 'chambre 201', 'Chambre avec vue sur la mer et spa sur le balcon', '6412ec575a81a.jpg', 'Mini_bar', 110, 1, 'premiere_classe'),
(3, 'chambre 200', 'sdfg gsgq qsgs gSG', 'maurice.jpg', 'dfs', 10, 0, 'fsd');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(13) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `mdp_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `email_client`, `mdp_client`) VALUES
(1, 'Deroubaix', 'Benoit', 'adminoza@gmail.com', '$2y$10$IYBAvBX3Rqva0qr4NYPPMuGg2sn5AlxYtiyWqQidhycY6451uoU3C'),
(642249, 'Amoille', 'Ellioma', 'ElliomAAmoillE', 'Toujours_pa'),
(6422433, 'Zitoune', 'Arbre', 'Arbre_fait_du_Zitoune', 'ZIT69/_\\for'),
(64352965, 'dupaef', 'robin', 'robdupa@edenschool.fr', ''),
(642263290, 'Richard', 'Botant', 'Richou_ptilou_69@jaimail.net', 'Y_a_pa_2_mo_de_pass_ici'),
(643529537, 'Sanchez', 'luka', 'sanchez_luka@jaimolle.com', ''),
(643529540, 'test', 'test', 'test@test.test', ''),
(643529542, 'Sanchis', 'Tom', 'tsanchis@edenschool.fr', '');

-- --------------------------------------------------------

--
-- Structure de la table `client_boisson`
--

CREATE TABLE `client_boisson` (
  `id_client` int(11) NOT NULL,
  `id_boisson` int(11) NOT NULL,
  `quantite_client_boisson` int(11) NOT NULL,
  `date_client_boisson` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client_chambre`
--

INSERT INTO `client_chambre` (`id_client`, `id_chambre`, `date_debut_reservation_chambre`, `date_fin_reservation_piscine_chambre`, `num_reservation_chambre`, `status_chambre`) VALUES
(643529540, 2, '2023-04-14', '2023-04-18', 6436, '');

-- --------------------------------------------------------

--
-- Structure de la table `client_menu`
--

CREATE TABLE `client_menu` (
  `id_client` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `quantite_client_menu` int(11) NOT NULL,
  `date_client_menu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status_salle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(67, 83, 'Entrée plats desserts', 'Au choix sur la carte, un plat, une entrée et un dessert.', 'P1060839 bis.jpg', 15);

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

--
-- Déchargement des données de la table `piscine`
--

INSERT INTO `piscine` (`id_piscine`, `name_piscine`, `description_piscine`, `image_piscine`, `ouverture_piscine`, `fermeture_piscine`, `nettoyage_piscine`) VALUES
(789, 'Piscine de saint-Vulbas', 'Cette piscine contient un bassin australien, convient à tout type d\'enfant et à n\'importe quel âge !', '6412ed9f7e731.jpg', '08:30:00', '17:30:00', '2023-04-01');

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
(83, 'Les Trois domes'),
(84, 'Restaurant Christian Tetedoie');

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
(4892, 'Salle des fêtes', 'Salle pouvant accueillir un D-J des pistolets à bulles et plein d\'autres outils de ce style.', 'maldives.jpg', 'Ouvert à tous', 'D-J, Cage à lumière, scène surélevé');

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
  MODIFY `id_bar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id_boisson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643529544;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `piscine`
--
ALTER TABLE `piscine`
  MODIFY `id_piscine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=790;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4893;

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
