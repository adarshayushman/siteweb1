-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 jan. 2024 à 20:39
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `megajoy_signup`
--
CREATE DATABASE IF NOT EXISTS `megajoy_signup` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `megajoy_signup`;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`) VALUES
(1, 'Shuntian', 'ZHANG', 'zhangshuntian1117@gmail.com', '$2y$10$OwwtW3z1T9m5Kc6rD8SzHejamhZNYuJFjSy5twBkLnOkLKAuMo10u', '0750791399'),
(2, 'SYLVAIN', 'ZHOU', 'zhsylvain@gmail.com', '$2y$10$lrwd1TcHf5.x3Xcy78Rpzu6OSBBRvAV9pi07cKRdUObUCk7uVvb/u', '0651305589'),
(3, 'Yue', 'YU', 'yuyue@email.com', '$2y$10$Sr3N7RwcWQfyqSTF72697.Minn3cFxzU38D9dI4r6cCbUuZ9cplAm', '0878673523'),
(4, 'Mengxin', 'Xiao', 'xmx@gmail.com', '$2y$10$noaipE5aWrpbuuWb9dox1.Wz2cxFV1TscTBJWmMnQUt6v48pkBRAG', '2356554676'),
(5, 'John', 'James', 'jj@gmail.com', '$2y$10$/jY6R4BoVZQTygZIQk.96OLpQJ.5jJxaSKfeYJKPECF3FhKzhSrz.', '1234543567'),
(6, 'lebron', 'james', 'lj@gmail.com', '$2y$10$GeY7cysB3wvAYPuuUHkIgecrt1zi0jebECuCi3hFOplLYpy5KFXp6', '1223221243'),
(7, 'west', 'book', 'wb@gmail.com', '$2y$10$7KOTx8rNhTMOQ889313MO.hsBGdc6ErzEhzlb.y5C7jMKXlTLSQbK', '1234567890'),
(25, 'SYLVAIN', 'Zh', 'sylvain.zhou-61806@eleve.isep.fr', '$2y$10$xByCbngLiTqy7oDtXc5c6.S/91O3zcfmXa71psaIiqfkbNUrA1gUq', '1234567891');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
