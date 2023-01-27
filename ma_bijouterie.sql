-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 27 jan. 2023 à 20:37
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ma_bijouterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Collier - Pendentif'),
(2, 'Bague'),
(3, 'Montre'),
(4, 'Bracelet'),
(5, 'Boucles d\'oreilles');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `size`, `picture`, `description`, `id_category`) VALUES
(10, 'Bague', 160, NULL, 'assets/upload/2601202320343863d2d5cef19e220210617142223-60cb3e7f47e85-bague4.jpg', 'Très belle bague. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum magnam rerum dicta quo dolorem tempora minima, eveniet veritatis id delectus.         ', 2),
(11, 'Pendentif', 205, NULL, 'assets/upload/2601202320370663d2d662df10620210623132607-60d31a4f2de58-collier3.jpg', 'Magnifique pendentif ! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum magnam rerum dicta quo dolorem tempora minima, eveniet veritatis id delectus.          ', 1),
(12, 'Montre', 150, NULL, 'assets/upload/2601202320380963d2d6a1bf6ba20210623131858-60d318a2c76fb-montre3.jpg', 'L&#039;élégance utile. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum magnam rerum dicta quo dolorem tempora minima, eveniet veritatis id delectus.            ', 3),
(13, 'Boucles d&#039;oreilles', 120, NULL, 'assets/upload/2601202320391063d2d6dea73a820210623132832-60d31ae0d214e-boucle3.jpg', 'Boucles d&#039;oreilles Saphir. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum magnam rerum dicta quo dolorem tempora minima, eveniet veritatis id delectus.   ', 5),
(14, 'Bracelet', 210, NULL, 'assets/upload/2601202320401263d2d71ccfb2620210622103701-60d1a12dd7966-bracelet3.jpg', 'Bracelet splendide ! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum magnam rerum dicta quo dolorem tempora minima, eveniet veritatis id delectus.        ', 4),
(15, 'Pendentif', 130, NULL, 'assets/upload/2601202320420363d2d78b6a11020210623132415-60d319df2370d-collier5.jpg', 'La beauté tout en sobriété. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum magnam rerum dicta quo dolorem tempora minima, eveniet veritatis id delectus.        ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rate` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rating`
--

INSERT INTO `rating` (`id`, `comment`, `rate`, `publish_date`, `id_product`, `id_user`) VALUES
(3, 'Ce pendentif est d&#039;une finesse incroyable ! Je le trouve magnifique.', 5, '2023-01-26 21:35:16', 11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `username`, `role`) VALUES
(3, 'flo@gmail.com', '$2y$10$Vl9keNh7Qa0h1o0sUqFt9eaHTYM.xsco35zzVZwEZAALFQqMioNKG', 'Flo', 'ROLE_ADMIN');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
