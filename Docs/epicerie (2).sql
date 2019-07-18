-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 18 juil. 2019 à 07:19
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
-- Base de données :  `epicerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `societe` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `societe`, `mdp`, `email`, `admin`) VALUES
(1, 'Gentilhomme', 'Alanus', 'Lemur Technologie', 'XXXX', 'Alan@yahoo.com', 0),
(2, 'Meriot', 'Maxime', 'TTT', 'AAAA', 'Max', 0),
(3, 'Archibald', 'Tata', 'Titi', 'TOUTOU', 'tutu@tete.com', 1),
(4, 'Meriot', 'Paulo', 'TonCUL', 'yyyy', 'a@a.com', 0),
(5, 'fe', 'fe', 'fe', '$2y$10$junxHshFF9UOMqWFcUtskusw4Q/slWzZ8MtgcLVPCsLrtZ9ofqsfG', 'admin@hotail.fr', 0),
(6, 'Meriot', 'Maxime', 'cefii', '$2y$10$ZasaU9D69YrMWYA9vaWQsefor2W/5I0JB5oxm.wMh6zcK4UBZ3/nu', 'maxime@test.fr', 1),
(7, 'Mat', 'Cab', 'MatCab', '$2y$10$PDEwnkkY0FP03rTdfEUi5.GpwvTNvs3LceQWolrDNI1zUDinr4Vg.', 'Caba@mat.fr', 0),
(8, 'LACAN', 'Marjo', 'cefii', '$2y$10$jyHLgjeyIOBzlZrR/YnEne2ywKLuVIPDNaD1.BcLtP9Hsq0UZ7ph6', 'test@gmail.com', 0),
(9, 'test', 'test', 'test', '$2y$10$i.RbjF2VhaU6BfNxTSDLdeuqVudqFutpt9/k1Nvz.THhdjzsTD/3q', 'test@test.fr', 0),
(10, 'Mat', 'Cab', 'matcab', '$2y$10$0AxQD7MOqV1xKpjRKN/UoOTT/Ih.UP0c2C4uVga6tAoptPNNn/E1W', 'matcab@test.fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

DROP TABLE IF EXISTS `detail_commande`;
CREATE TABLE IF NOT EXISTS `detail_commande` (
  `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT,
  `etat_commande` varchar(255) NOT NULL,
  `qte_prdt_commande` int(11) NOT NULL,
  `num_commande` varchar(255) NOT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_ligne_commande`),
  KEY `Detail_commande_Entete_commande_FK` (`num_commande`),
  KEY `Detail_commande_Produit0_FK` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_commande`
--

INSERT INTO `detail_commande` (`id_ligne_commande`, `etat_commande`, `qte_prdt_commande`, `num_commande`, `id_produit`) VALUES
(2, 'EN cours', 3, '3456', 18);

-- --------------------------------------------------------

--
-- Structure de la table `entete_commande`
--

DROP TABLE IF EXISTS `entete_commande`;
CREATE TABLE IF NOT EXISTS `entete_commande` (
  `num_commande` varchar(255) NOT NULL,
  `date_commande` date NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`num_commande`),
  KEY `Entete_commande_Client_FK` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entete_commande`
--

INSERT INTO `entete_commande` (`num_commande`, `date_commande`, `id_client`) VALUES
('3456', '2019-07-01', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `prix_unitaire` varchar(50) NOT NULL,
  `qte_stock` varchar(50) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `description`, `photo`, `prix_unitaire`, `qte_stock`) VALUES
(1, 'Poulet', 'Emincï¿½ de poulet', 'img/poulet.jpg', '5', '15'),
(2, 'Salade', 'Salade lavée prête à l\'emploi', 'img/salade.jpg', '2', '10'),
(3, 'Parmesan', 'Fromage parmesan', 'img/parmesan.jpg', '25', '5'),
(4, 'Sauce', 'Sauce pour salade César', 'img/sauce.jpg', '7', '5'),
(5, 'Croutons', 'Croutons de pain', 'img/crouton.jpg', '4', '10'),
(6, 'Lardons', 'Lardons fumés', 'img/lardon.jpg', '3', '10'),
(7, 'Oignons', 'Oignons origine France', 'img/oignon.jpg', '5', '10'),
(8, 'Patates', 'Pommes de terre origine UE', 'img/patate.jpg', '7', '20'),
(9, 'Bananes', 'Bananes bio origine France', 'img/banane.jpg', '3', '5'),
(10, 'Oeufs', 'Oeufs frais moyen bio', 'img/oeuf.jpg', '4', '7'),
(11, 'Sucre', 'Sucre en poudre en dosettes', 'img/sucre.jpg', '3', '10'),
(13, 'Tomates', 'Tomates origine France', 'img/tomate.jpg', '3', '10'),
(14, 'Melon', 'Melon français', 'img/melon.jpg', '4', '5'),
(15, 'Jambon', 'Jambon blanc', 'img/jambon.jpg', '6', '6'),
(16, 'Feta', 'Feta origine Grèce', 'img/feta.jpg', '9', '3'),
(17, 'Chèvre', 'Chèvre fermier', 'img/chevre.jpg', '6', '3'),
(18, 'Concombre', 'Concombre origine UE', 'img/concombre.jpg', '2', '7'),
(19, 'Olives', 'Olives', 'img/olive.jpg', '7', '5');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `Detail_commande_Entete_commande_FK` FOREIGN KEY (`num_commande`) REFERENCES `entete_commande` (`num_commande`),
  ADD CONSTRAINT `Detail_commande_Produit0_FK` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `entete_commande`
--
ALTER TABLE `entete_commande`
  ADD CONSTRAINT `Entete_commande_Client_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
