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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
