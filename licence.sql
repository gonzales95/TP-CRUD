-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 25 nov. 2019 à 12:13
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `licence`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `note1` int(11) NOT NULL,
  `note2` int(11) NOT NULL,
  `note3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `picture`, `note1`, `note2`, `note3`) VALUES
(4, 'DZUSSSOUO FONWOUO', 'loic', '683323.jpg', 12, 12, 12),
(5, 'DZUSSSOUO', 'Osmelle', '68920.jpg', 2, 12, 12),
(6, 'gonzales la legende', 'loic', '240177.jpg', 12, 14, 12),
(7, 'loic', 'loic', '292102.jpg', 10, 10, 10),
(8, 'Ferié', 'Gustave', '959712.jpg', 12, 14, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
