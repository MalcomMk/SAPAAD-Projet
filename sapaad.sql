-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 21 mars 2022 à 22:57
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sapaad`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_demande` datetime NOT NULL,
  `intervenant_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `heure` int(11) NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2694D7A5AB9A1716` (`intervenant_id`),
  KEY `IDX_2694D7A5A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id`, `date_demande`, `intervenant_id`, `user_id`, `heure`, `details`, `status`) VALUES
(1, '2022-03-08 15:55:00', 1, 1, 2, 'QCVQSDHBEFGHERSG', 1),
(2, '2022-03-13 17:28:46', 1, NULL, 4, NULL, 0),
(3, '2022-03-13 17:39:52', 1, NULL, 4, NULL, 0),
(4, '2022-03-15 21:40:31', 1, 2, 5, 'BLABLALBRA', 1),
(5, '2022-03-15 23:38:27', 2, 2, 7, 'qsvqdvsdvdsv', 1),
(6, '2022-03-18 14:29:50', 1, 2, 8, 'mzejfôzajfpazomjfazojf', 1),
(7, '2022-03-18 15:25:21', 1, 2, 8, 'mzejfôzajfpazomjfazojf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `demande_service`
--

DROP TABLE IF EXISTS `demande_service`;
CREATE TABLE IF NOT EXISTS `demande_service` (
  `demande_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`demande_id`,`service_id`),
  KEY `IDX_D16A217D80E95E18` (`demande_id`),
  KEY `IDX_D16A217DED5CA9E6` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demande_service`
--

INSERT INTO `demande_service` (`demande_id`, `service_id`) VALUES
(2, 30),
(2, 32),
(2, 34),
(3, 30),
(3, 32),
(3, 34),
(4, 30),
(4, 35),
(4, 36),
(5, 30),
(5, 31),
(5, 32),
(5, 34),
(5, 35),
(5, 36),
(6, 30),
(6, 31),
(6, 34),
(6, 35),
(7, 30),
(7, 31),
(7, 34),
(7, 35);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` decimal(10,2) NOT NULL,
  `creation` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `heure` int(11) NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_8B27C52BA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id`, `prix`, `creation`, `user_id`, `heure`, `details`) VALUES
(1, '2000.00', '2022-03-10 00:00:00', 2, 4, 'rfgdfhdshsdfh');

-- --------------------------------------------------------

--
-- Structure de la table `devis_intervenant`
--

DROP TABLE IF EXISTS `devis_intervenant`;
CREATE TABLE IF NOT EXISTS `devis_intervenant` (
  `devis_id` int(11) NOT NULL,
  `intervenant_id` int(11) NOT NULL,
  PRIMARY KEY (`devis_id`,`intervenant_id`),
  KEY `IDX_DDB1DF5D41DEFADA` (`devis_id`),
  KEY `IDX_DDB1DF5DAB9A1716` (`intervenant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devis_intervenant`
--

INSERT INTO `devis_intervenant` (`devis_id`, `intervenant_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `devis_service`
--

DROP TABLE IF EXISTS `devis_service`;
CREATE TABLE IF NOT EXISTS `devis_service` (
  `devis_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`devis_id`,`service_id`),
  KEY `IDX_7373018E41DEFADA` (`devis_id`),
  KEY `IDX_7373018EED5CA9E6` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220227155920', '2022-03-05 21:15:18', 503),
('DoctrineMigrations\\Version20220227161043', '2022-03-05 21:15:19', 25),
('DoctrineMigrations\\Version20220304180246', '2022-03-05 21:15:19', 293),
('DoctrineMigrations\\Version20220304185021', '2022-03-05 21:15:19', 91),
('DoctrineMigrations\\Version20220304191553', '2022-03-05 21:15:19', 41),
('DoctrineMigrations\\Version20220304192752', '2022-03-05 21:15:19', 302),
('DoctrineMigrations\\Version20220305130146', '2022-03-05 21:15:20', 25),
('DoctrineMigrations\\Version20220308123451', '2022-03-08 12:35:15', 247),
('DoctrineMigrations\\Version20220308150528', '2022-03-08 15:05:43', 117),
('DoctrineMigrations\\Version20220313163345', '2022-03-13 16:33:54', 139);

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

DROP TABLE IF EXISTS `intervenant`;
CREATE TABLE IF NOT EXISTS `intervenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`id`, `nom`, `prenom`, `metier`) VALUES
(1, 'Jean', 'Pierre', 'Livreur'),
(2, 'INTERVENANT', 'intervenant', 'aide à domicile');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `devis_id` int(11) NOT NULL,
  `creation` datetime NOT NULL,
  `stripe_session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B1DC7A1E41DEFADA` (`devis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcut_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `nom`, `description`, `illustration`, `shortcut_name`) VALUES
(30, 'Soutien scolaire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', '6f3e05911d09092ad59448715d7f9979992e1fc3.[ext]', 'Soutien scolaire'),
(31, 'Entretien de la maison et travaux ménagers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', 'a6eb378f9ec733d216a2b024be351a5bf63bd739.[ext]', 'Entretien maison'),
(32, 'Préparation de repas à domicile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', '0fb00b156810e6d511a81a68eb161a020f5859a3.[ext]', 'Préparation repas'),
(33, 'Assistance informatique et internet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', 'Assistance-informatique-a-distance-et-sur-site-1.jpg', 'Informatique'),
(34, 'Accompagnement des enfants dans leurs déplacements', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', '6a31c5d885ade5d18c3dd447e571e50a18e62a1a.[ext]', 'Déplacements'),
(35, 'Livraison de repas à domicile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', 'f2cb0dec0e4e3e6931d6a0a1de2bf0b344147165.[ext]', 'Livraison repas'),
(36, 'Jardinage et débroussaillage', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', 'jardinage.png', 'Jardinage'),
(37, 'Hommes toutes mains (Prestations de petit bricolage)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', '5579063cbd7a5f7d96d23f8a011ed490cceb7360.[ext]', 'Bricolage'),
(38, 'Collecte et livraison de linge repassé', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', 'Mettre-en-place-la-livraison-à-domicile-des-repas-pendant-le-confinement.jpeg', 'Propreté du linge'),
(39, 'Livraison de courses à domicile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', 'repas-1.jpg', 'Courses'),
(40, 'Maintenance, entretien et vigilance temporaires', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', '355d163adcd66ab81459faf86d050a915e9b259b.[ext]', 'Maintenance'),
(41, 'Les activités qui concourent directement et exclusivement à coordonner et délivrer les services à la personne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dolor lacinia, condimentum sapien vitae, vestibulum nisl. Aenean quis commodo dolor. Integer semper aliquet enim, at pretium tellus scelerisque in. Nunc varius tortor non augue luctus tincidunt. Maecenas non ultricies magna, et hendrerit ante.', 'shopping.jpg', 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intervenant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649AB9A1716` (`intervenant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `adresse`, `intervenant_id`) VALUES
(1, 'Admin@admin.com', '{\"1\":\"ROLE_ADMIN\"}', '$2y$13$PoqG4hUGK/yR8Y2iGTQK9.snz6ToI.WmLwxbnoXx1TnM6kFDETZk2', 'admin', 'Malcom', '48 rue riiiktfouuu', 1),
(2, 'bamby@merde.fr', '[]', '$2y$13$xDuhACRB2Uc5yBkAblODHedXKNyyibsWdW3GLRDZei5ZuJfu/Gsji', 'bamby', 'Dino', 'bambyland', NULL),
(6, 'admin@frosted.fr', '[\"ROLE_ADMIN\"]', '$2y$13$9gbACebgCL.yJTUjAbbCF.jS6W/5SQwX5oGn06M22KoAYJQclC.d6', 'admin', 'ADMIN', 'Allee des Neuveries, 91190 Gif-sur-Yvette', NULL),
(7, 'bamby@frosted.fr', '[\"ROLE_USER\"]', '$2y$13$A3tTAChZwWIlzW3pYHHVq.Sc8QeUxVrHvzPUG8VP4.jXIgbsk52v2', 'BAMBY', 'bamby', '4 Rue du Docteur Morere,91120 Palaiseau', NULL),
(8, 'intervenant@frosted.fr', '[\"ROLE_INTERVENANT\"]', '$2y$13$L7GRuOfZHnCJTx7SC2cwDOHrfA1sBsD2u2Z9ta1/cuCULCuRdoEQG', 'INTERVENANT', 'intervenant', '8 Rue de la Gare, 91800	Brunoy', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `FK_2694D7A5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_2694D7A5AB9A1716` FOREIGN KEY (`intervenant_id`) REFERENCES `intervenant` (`id`);

--
-- Contraintes pour la table `demande_service`
--
ALTER TABLE `demande_service`
  ADD CONSTRAINT `FK_D16A217D80E95E18` FOREIGN KEY (`demande_id`) REFERENCES `demande` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D16A217DED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `FK_8B27C52BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `devis_intervenant`
--
ALTER TABLE `devis_intervenant`
  ADD CONSTRAINT `FK_DDB1DF5D41DEFADA` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DDB1DF5DAB9A1716` FOREIGN KEY (`intervenant_id`) REFERENCES `intervenant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `devis_service`
--
ALTER TABLE `devis_service`
  ADD CONSTRAINT `FK_7373018E41DEFADA` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7373018EED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `FK_B1DC7A1E41DEFADA` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649AB9A1716` FOREIGN KEY (`intervenant_id`) REFERENCES `intervenant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
