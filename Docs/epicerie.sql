-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 16, 2019 at 12:37 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epicerie`
--

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `societe` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Detail_commande`
--

CREATE TABLE `Detail_commande` (
  `id_ligne_commande` int(11) NOT NULL,
  `etat_commande` varchar(255) NOT NULL,
  `qte_prdt_commande` int(11) NOT NULL,
  `num_commande` varchar(255) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Entete_commande`
--

CREATE TABLE `Entete_commande` (
  `num_commande` varchar(255) NOT NULL,
  `date_commande` date NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Produit`
--

CREATE TABLE `Produit` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `prix_unitaire` varchar(50) NOT NULL,
  `qte_stock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Produit`
--

INSERT INTO `Produit` (`id_produit`, `nom_produit`, `description`, `photo`, `prix_unitaire`, `qte_stock`) VALUES
(1, 'Poulet', 'Emincé de poulet', 'img/poulet.jpg', '5', '10'),
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
-- Indexes for dumped tables
--

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `Detail_commande`
--
ALTER TABLE `Detail_commande`
  ADD PRIMARY KEY (`id_ligne_commande`),
  ADD KEY `Detail_commande_Entete_commande_FK` (`num_commande`),
  ADD KEY `Detail_commande_Produit0_FK` (`id_produit`);

--
-- Indexes for table `Entete_commande`
--
ALTER TABLE `Entete_commande`
  ADD PRIMARY KEY (`num_commande`),
  ADD KEY `Entete_commande_Client_FK` (`id_client`);

--
-- Indexes for table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Detail_commande`
--
ALTER TABLE `Detail_commande`
  MODIFY `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Detail_commande`
--
ALTER TABLE `Detail_commande`
  ADD CONSTRAINT `Detail_commande_Entete_commande_FK` FOREIGN KEY (`num_commande`) REFERENCES `Entete_commande` (`num_commande`),
  ADD CONSTRAINT `Detail_commande_Produit0_FK` FOREIGN KEY (`id_produit`) REFERENCES `Produit` (`id_produit`);

--
-- Constraints for table `Entete_commande`
--
ALTER TABLE `Entete_commande`
  ADD CONSTRAINT `Entete_commande_Client_FK` FOREIGN KEY (`id_client`) REFERENCES `Client` (`id_client`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
