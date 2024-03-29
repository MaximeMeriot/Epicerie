-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 16, 2019 at 09:57 AM
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
(2, 'Salade', 'Feuilles de salade lavée prête à l\'emploi', 'img/salade.jpg', '2', '10'),
(3, 'Parmesan', 'Fromage parmesan', 'img/parmesan.jpg', '25', '5'),
(4, 'Sauce', 'Sauce pour salade César', 'img/sauce.jpg', '7', '5'),
(5, 'Croutons', 'Croutons de pain', 'img/crouton.jpg', '4', '10'),
(6, 'Lardons', 'Lardons fumés', 'img/lardon.jpg', '3', '10'),
(7, 'Oignons', 'Oignons origine France', 'img/oignon.jpg', '5', '10'),
(8, 'Patates', 'Pommes de terre origine UE', 'img/patate.jpg', '7', '20'),
(9, 'Bananes', 'bananes bio origine France', 'img/banane.jpg', '3', '5'),
(10, 'Oeufs', 'Oeufs frais moyen bio', 'img/oeuf.jpg', '4', '7'),
(11, 'Sucre', 'Sucre en poudre', 'img/sucre.jpg', '3', '10'),
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
-- Indexes for table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
