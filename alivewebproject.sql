-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 mars 2019 à 13:44
-- Version du serveur :  5.7.24
-- Version de PHP :  7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alivewebproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `alive_keys`
--

DROP TABLE IF EXISTS `alive_keys`;
CREATE TABLE IF NOT EXISTS `alive_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(19) NOT NULL,
  `type` int(11) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `createdAt` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `status` (`status`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_keys`
--

INSERT INTO `alive_keys` (`id`, `code`, `type`, `userId`, `value`, `status`, `createdAt`) VALUES
(1, 'EPY7-U3US-GQIW-0Z9R', 1, 8, 'mehdi.rouis.1@laposte.net', 1, 1549615814),
(7, '1HL8-WP1U-LL5N-T7QC', 3, 8, 'mehdi.rouis.1@laposte.net', 1, 1549620814),
(8, '94750', 2, 8, '+33652632212', 2, 1549620944),
(10, '58005', 4, 8, '+33652632212', 1, 1550048946);

-- --------------------------------------------------------

--
-- Structure de la table `alive_keys_status`
--

DROP TABLE IF EXISTS `alive_keys_status`;
CREATE TABLE IF NOT EXISTS `alive_keys_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_keys_status`
--

INSERT INTO `alive_keys_status` (`id`, `name`) VALUES
(1, 'Non utilisée'),
(2, 'Utilisée');

-- --------------------------------------------------------

--
-- Structure de la table `alive_keys_types`
--

DROP TABLE IF EXISTS `alive_keys_types`;
CREATE TABLE IF NOT EXISTS `alive_keys_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_keys_types`
--

INSERT INTO `alive_keys_types` (`id`, `type`) VALUES
(1, 'Validation d\'adresse email'),
(2, 'Validation du numéro de téléphone'),
(3, 'Mot de passe oublié par email'),
(4, 'Mot de passe oublié par SMS');

-- --------------------------------------------------------

--
-- Structure de la table `alive_news`
--

DROP TABLE IF EXISTS `alive_news`;
CREATE TABLE IF NOT EXISTS `alive_news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `createdAt` int(11) NOT NULL,
  `createdBy` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createdBy` (`createdBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alive_projects`
--

DROP TABLE IF EXISTS `alive_projects`;
CREATE TABLE IF NOT EXISTS `alive_projects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `statusId` int(11) NOT NULL,
  `createdBy` bigint(20) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `editedAt` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `createdBy` (`createdBy`),
  KEY `statusId` (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alive_projects_members`
--

DROP TABLE IF EXISTS `alive_projects_members`;
CREATE TABLE IF NOT EXISTS `alive_projects_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '1',
  `projectId` bigint(20) NOT NULL,
  `joinedAt` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `rank` (`rank`),
  KEY `projectId` (`projectId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alive_projects_ranks`
--

DROP TABLE IF EXISTS `alive_projects_ranks`;
CREATE TABLE IF NOT EXISTS `alive_projects_ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_projects_ranks`
--

INSERT INTO `alive_projects_ranks` (`id`, `name`) VALUES
(1, 'Membre de l\'&eacute;quipe'),
(2, 'Mod&eacute;ration'),
(3, 'Responsable');

-- --------------------------------------------------------

--
-- Structure de la table `alive_projects_status`
--

DROP TABLE IF EXISTS `alive_projects_status`;
CREATE TABLE IF NOT EXISTS `alive_projects_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_projects_status`
--

INSERT INTO `alive_projects_status` (`id`, `name`) VALUES
(1, 'En cours'),
(2, 'Recherche des d&eacute;veloppeurs'),
(3, 'Mod&eacute;ration'),
(4, 'Termin&eacute;'),
(5, 'Suppression');

-- --------------------------------------------------------

--
-- Structure de la table `alive_settings`
--

DROP TABLE IF EXISTS `alive_settings`;
CREATE TABLE IF NOT EXISTS `alive_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteName` varchar(50) NOT NULL,
  `maintenanceStatus` enum('true','false') CHARACTER SET latin1 NOT NULL DEFAULT 'true',
  `contact` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_settings`
--

INSERT INTO `alive_settings` (`id`, `siteName`, `maintenanceStatus`, `contact`) VALUES
(1, 'AliveWebProject', 'false', 'mehdi.rouis.1@laposte.net');

-- --------------------------------------------------------

--
-- Structure de la table `alive_users`
--

DROP TABLE IF EXISTS `alive_users`;
CREATE TABLE IF NOT EXISTS `alive_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `birthDay` date NOT NULL,
  `password` text NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '1',
  `email` text NOT NULL,
  `shopPoints` int(11) NOT NULL DEFAULT '0',
  `profile_type` enum('public','private') NOT NULL DEFAULT 'public',
  `profile_banner` varchar(255) DEFAULT NULL,
  `createdAt` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rank` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_users`
--

INSERT INTO `alive_users` (`id`, `userName`, `lastName`, `firstName`, `phoneNumber`, `birthDay`, `password`, `rank`, `email`, `shopPoints`, `profile_type`, `profile_banner`, `createdAt`) VALUES
(8, '&Egrave;sska', 'ROUIS', 'Mehdi', '+33652632212', '1999-06-06', '$2y$10$aDo2iy7GIzLuwLhwHMbZx.fEpd2c8/tpjYxS3dRNrqun6nMTl.6rC', 8, 'mehdi.rouis.1@laposte.net', 0, 'private', '215440af8e0530849e16e03c61fd09b6.png', 1549441876);

-- --------------------------------------------------------

--
-- Structure de la table `alive_users_actions`
--

DROP TABLE IF EXISTS `alive_users_actions`;
CREATE TABLE IF NOT EXISTS `alive_users_actions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action` enum('register','login','forgotPassword','createProject','validateProject') NOT NULL,
  `createdAt` int(11) NOT NULL,
  `createdBy` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createdBy` (`createdBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alive_users_permissions`
--

DROP TABLE IF EXISTS `alive_users_permissions`;
CREATE TABLE IF NOT EXISTS `alive_users_permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parseName` varchar(255) DEFAULT NULL,
  `parseDescription` text,
  `minRank` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `minRank` (`minRank`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_users_permissions`
--

INSERT INTO `alive_users_permissions` (`id`, `name`, `parseName`, `parseDescription`, `minRank`) VALUES
(1, 'admin-access', 'Accès à l\'administration', 'Permet &agrave; l\'utilisateur d\'acc&eacute;der &agrave; l\'administration.', 4),
(2, 'edit-users', '&Eacute;dition des utilisateurs', 'Possibilit&eacute; d\'&eacute;diter des utilisateurs.', 8),
(3, 'edit-permissions', '&Eacute;dition des permissions', 'Possibilit&eacute; de modifier les permissions.', 7),
(4, 'view-ranks', 'Voir les rangs', 'Possibilit&eacute; de voir les rangs du site.', 4),
(5, 'edit-ranks', '&Eacute;diter un rang', 'Possibilit&eacute; d\'&eacute;diter un rang.', 8),
(6, 'view-projects', 'Voir les projets des utilisateurs', 'Possibilit&eacute; de voir les projets des diff&eacute;rents utilisateurs.', 4),
(7, 'edit-projects', '&Egrave;dition des projets', 'Possibilit&eacute; d\'&eacute;diter des projets.', 4),
(8, 'validate-projects', 'Valider des projets', 'Possibilit&eacute; de valider des projets en attente.', 4),
(9, 'delete-projects', 'Supprimer des projets', 'Possibilit&eacute; de supprimer des projets.', 6),
(10, 'view-users', 'Voir les utilisateurs', 'Possibilit&eacute; de voir les informations des utilisateurs.', 6),
(11, 'delete-users', 'Suppression des utilisateurs', 'Possibilit&eacute; de supprimer un utilisateur.', 7);

-- --------------------------------------------------------

--
-- Structure de la table `alive_users_ranks`
--

DROP TABLE IF EXISTS `alive_users_ranks`;
CREATE TABLE IF NOT EXISTS `alive_users_ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alive_users_ranks`
--

INSERT INTO `alive_users_ranks` (`id`, `name`, `icon`, `color`) VALUES
(1, 'Particulier', 'fas fa-user', '#fff'),
(2, 'Entreprise', 'fas fa-users', '#FE8C01'),
(3, 'Développeur', 'fas fa-code', '#00D103'),
(4, 'Gestionnaire', 'fas fa-comment', '#D7DF01'),
(5, 'Community Manager', 'fas fa-bullhorn', '#FF00FF'),
(6, 'Modérateur', 'fas fa-tools', 'skyblue'),
(7, 'Administrateur', 'fas fa-code-branch', 'red'),
(8, 'Fondateur', 'fas fa-cogs', '#00FFAA');

-- --------------------------------------------------------

--
-- Structure de la table `alive_users_skills`
--

DROP TABLE IF EXISTS `alive_users_skills`;
CREATE TABLE IF NOT EXISTS `alive_users_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `skillType` int(11) NOT NULL,
  `skillLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `skillId` (`skillType`),
  KEY `levelId` (`skillLevel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alive_users_skills_levels`
--

DROP TABLE IF EXISTS `alive_users_skills_levels`;
CREATE TABLE IF NOT EXISTS `alive_users_skills_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alive_users_skills_types`
--

DROP TABLE IF EXISTS `alive_users_skills_types`;
CREATE TABLE IF NOT EXISTS `alive_users_skills_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alive_keys`
--
ALTER TABLE `alive_keys`
  ADD CONSTRAINT `alive_keys_ibfk_1` FOREIGN KEY (`type`) REFERENCES `alive_keys_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alive_keys_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `alive_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alive_keys_ibfk_3` FOREIGN KEY (`status`) REFERENCES `alive_keys_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `alive_news`
--
ALTER TABLE `alive_news`
  ADD CONSTRAINT `alive_news_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `alive_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `alive_projects`
--
ALTER TABLE `alive_projects`
  ADD CONSTRAINT `alive_projects_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `alive_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alive_projects_ibfk_2` FOREIGN KEY (`statusId`) REFERENCES `alive_projects_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `alive_projects_members`
--
ALTER TABLE `alive_projects_members`
  ADD CONSTRAINT `alive_projects_members_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `alive_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alive_projects_members_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `alive_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alive_projects_members_ibfk_3` FOREIGN KEY (`rank`) REFERENCES `alive_projects_ranks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `alive_users`
--
ALTER TABLE `alive_users`
  ADD CONSTRAINT `alive_users_ibfk_1` FOREIGN KEY (`rank`) REFERENCES `alive_users_ranks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `alive_users_actions`
--
ALTER TABLE `alive_users_actions`
  ADD CONSTRAINT `alive_users_actions_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `alive_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `alive_users_permissions`
--
ALTER TABLE `alive_users_permissions`
  ADD CONSTRAINT `alive_users_permissions_ibfk_1` FOREIGN KEY (`minRank`) REFERENCES `alive_users_ranks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `alive_users_skills`
--
ALTER TABLE `alive_users_skills`
  ADD CONSTRAINT `alive_users_skills_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `alive_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alive_users_skills_ibfk_2` FOREIGN KEY (`skillLevel`) REFERENCES `alive_users_skills_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alive_users_skills_ibfk_3` FOREIGN KEY (`skillType`) REFERENCES `alive_users_skills_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `alive_users_skills_levels`
--
ALTER TABLE `alive_users_skills_levels`
  ADD CONSTRAINT `alive_users_skills_levels_ibfk_1` FOREIGN KEY (`id`) REFERENCES `alive_users_skills` (`skillLevel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `alive_users_skills_types`
--
ALTER TABLE `alive_users_skills_types`
  ADD CONSTRAINT `alive_users_skills_types_ibfk_1` FOREIGN KEY (`id`) REFERENCES `alive_users_skills` (`skillType`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
