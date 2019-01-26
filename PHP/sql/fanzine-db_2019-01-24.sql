-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3406
-- Généré le :  Jeu 24 Janvier 2019 à 07:49
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fanzine`
--

-- --------------------------------------------------------

--
-- Structure de la table `compose`
--

CREATE TABLE `compose` (
  `groupe_id` int(11) NOT NULL,
  `artiste_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `createur`
--

CREATE TABLE `createur` (
  `createur_id` int(11) NOT NULL,
  `createur_nom` varchar(80) COLLATE utf8_bin NOT NULL,
  `createur_prenom` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `createur_description` text COLLATE utf8_bin NOT NULL,
  `createur_type` enum('Groupe','Artiste') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `fan_x_createur`
--

CREATE TABLE `fan_x_createur` (
  `utilisateur_id` int(11) NOT NULL,
  `createur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `fan_x_oeuvre`
--

CREATE TABLE `fan_x_oeuvre` (
  `utilisateur_id` int(11) NOT NULL,
  `oeuvre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

CREATE TABLE `oeuvre` (
  `oeuvre_id` int(11) NOT NULL,
  `oeuvre_nom` varchar(80) COLLATE utf8_bin NOT NULL,
  `oeuvre_description` text COLLATE utf8_bin NOT NULL,
  `oeuvre_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `oeuvre`
--

INSERT INTO `oeuvre` (`oeuvre_id`, `oeuvre_nom`, `oeuvre_description`, `oeuvre_type_id`) VALUES
(1, 'La joconde', '	', 2);

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre_x_createur`
--

CREATE TABLE `oeuvre_x_createur` (
  `oeuvre_id` int(11) NOT NULL,
  `createur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_nom` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`type_id`, `type_nom`) VALUES
(1, 'musique'),
(2, 'peinture');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `utilisateur_prenom` varchar(80) COLLATE utf8_bin NOT NULL,
  `utilisateur_nom` varchar(80) COLLATE utf8_bin NOT NULL,
  `utilisateur_email` varchar(80) COLLATE utf8_bin NOT NULL,
  `utilisateur_avatar_url` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`groupe_id`,`artiste_id`),
  ADD KEY `createur_enfant` (`artiste_id`);

--
-- Index pour la table `createur`
--
ALTER TABLE `createur`
  ADD PRIMARY KEY (`createur_id`);

--
-- Index pour la table `fan_x_createur`
--
ALTER TABLE `fan_x_createur`
  ADD PRIMARY KEY (`utilisateur_id`,`createur_id`),
  ADD KEY `createur` (`createur_id`);

--
-- Index pour la table `fan_x_oeuvre`
--
ALTER TABLE `fan_x_oeuvre`
  ADD PRIMARY KEY (`utilisateur_id`,`oeuvre_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `oeuvre` (`oeuvre_id`);

--
-- Index pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD PRIMARY KEY (`oeuvre_id`),
  ADD KEY `type_oeuvre` (`oeuvre_type_id`);

--
-- Index pour la table `oeuvre_x_createur`
--
ALTER TABLE `oeuvre_x_createur`
  ADD PRIMARY KEY (`oeuvre_id`,`createur_id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `createur`
--
ALTER TABLE `createur`
  MODIFY `createur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  MODIFY `oeuvre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `createur_enfant` FOREIGN KEY (`artiste_id`) REFERENCES `createur` (`createur_id`),
  ADD CONSTRAINT `createur_parent` FOREIGN KEY (`groupe_id`) REFERENCES `createur` (`createur_id`);

--
-- Contraintes pour la table `fan_x_createur`
--
ALTER TABLE `fan_x_createur`
  ADD CONSTRAINT `createur` FOREIGN KEY (`createur_id`) REFERENCES `createur` (`createur_id`),
  ADD CONSTRAINT `utilisateur_createur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `fan_x_oeuvre`
--
ALTER TABLE `fan_x_oeuvre`
  ADD CONSTRAINT `oeuvre` FOREIGN KEY (`oeuvre_id`) REFERENCES `oeuvre` (`oeuvre_id`),
  ADD CONSTRAINT `utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD CONSTRAINT `type_oeuvre` FOREIGN KEY (`oeuvre_type_id`) REFERENCES `type` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
