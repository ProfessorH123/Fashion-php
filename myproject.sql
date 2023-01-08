-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 08 jan. 2023 à 19:41
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
-- Base de données : `myproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `Product_id` varchar(20) NOT NULL,
  `Total` float NOT NULL,
  `Qte` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `CatName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`CatName`) VALUES
('all'),
('computer'),
('headsets'),
('phones'),
('shoes'),
('watch');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` varchar(20) NOT NULL,
  `cont_user` varchar(10) NOT NULL,
  `cont_email` varchar(20) NOT NULL,
  `cont_tel` int(10) NOT NULL,
  `cont_TEXT` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `idO` varchar(20) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `CardName` varchar(20) NOT NULL,
  `CardNumber` int(20) NOT NULL,
  `Day` int(2) NOT NULL,
  `Month` int(2) NOT NULL,
  `Adress` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `Qte` int(2) NOT NULL,
  `DateC` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'in progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` varchar(100) NOT NULL,
  `NameP` varchar(20) NOT NULL,
  `PriceP` int(10) NOT NULL,
  `ImageP` varchar(150) NOT NULL,
  `CatName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `NameP`, `PriceP`, `ImageP`, `CatName`) VALUES
('9IF3NIT5J8GUBmB27mx2', 'headsets2', 25, 'g_img6.jpg', 'headsets'),
('awmjYpKaqrafXoOA1kLG', 'watch2', 33, 'watch4.jpg', 'watch'),
('C4zO0sJ3Xw35rVDRSAKS', 'phone', 100, 'g_img1.jpg', 'phones'),
('doXB1boj3L0o4xOswOFu', 'computer1', 330, 'g_img3.jpg', 'computer'),
('DS1HkfV8gETFB0416MeH', 'computer2', 340, 'g_img5.jpg', 'computer'),
('jAivIjdpvQhilHOZUQSL', 'headsets1', 88, 'g_img9.jpg', 'headsets'),
('kEVlyEOqCZT8996DdZa7', 'shoes2', 14, 'g_img4.jpg', 'shoes'),
('NZeuVNMcMEp1NrOyT7vo', 'watch2', 34, 'watch3.jpg', 'watch'),
('OrFf0nX29silyZC0cYEi', 'shoes1', 22, 'arr_img3.jpg', 'shoes'),
('s1hHLLQ6mmfGw2XsczxJ', 'phone2', 130, 'g_img2.jpg', 'phones');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` varchar(30) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `User_Type` varchar(10) NOT NULL DEFAULT 'user',
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CatName`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idO`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
