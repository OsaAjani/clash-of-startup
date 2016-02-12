-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Février 2016 à 11:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `clash_of_startup`
--

-- --------------------------------------------------------

--
-- Structure de la table `startups`
--

CREATE TABLE IF NOT EXISTS `startups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `randomid` varchar(32) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `randomid` (`randomid`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `startups`
--

INSERT INTO `startups` (`id`, `randomid`, `nom`, `description`) VALUES
(1, '56b7c025c2c9e', 'LogBerry', 'Création d''un boîtier de log pour les PME ne disposant pas de service informatique'),
(2, '56b7c064560e1', 'ASSINIE LA VIE', 'Création d''un dispensaire médical pour femmes enceintes en Côte d''Ivoire'),
(3, '56b7c064561be', 'D.I.P', 'Création d''un système de gestion centralisé de tous les objets et protocoles domotiques'),
(5, '56b7c0645617a', 'InCouch', 'Création d''une plateforme de streaming gratuite via un client lourd pour la diffusion de vieux films tombés dans le domaine publique.'),
(54, '56bc9a638e3e1', 'Sois créatif avec Bibou', 'Réalisation d''un livre interactif à destination des enfants de 3 à 6 ans.'),
(55, '56bc9a63d8484', 'Pluchovor', 'Création d''un site d''adoption de peluches.'),
(56, '56bc9a6427afb', 'Shoes Choices', 'Création d''une marque de chaussures ouvertes (estivales), ayant pour cible le sexe féminin, de l''enfant à l''adulte.'),
(58, '56bc9a6550669', 'PhotoFashion', 'Création de motifs et impression de photo sur tissu grâce à une impression numérique.'),
(59, '56bc9a6658250', 'Nails Cover', ''),
(60, '56bc9a66bd8c7', 'Les Illusions Architecturales', 'Création d''une perte de repère spatial, d''une désorientation, afin de laisser à l''utilisateur une liberté totale dans ses créations, quelle que soit sa spécialité (mode, espace, produit, communication visuelle), sur le thème de l''illusion.'),
(61, '56bc9a6774bbd', 'WiTime', 'Permettre à l’utilisateur de s’informer en temps réel sur l’état des files d’attentes depuis une application mobile ou un site web à l’aide d’une analyse vidéo.'),
(62, '56bc9a67b4d49', 'Product & Go', 'Création d''une interface entre les producteurs locaux et les particuliers.'),
(63, '56bc9a67ee22c', 'Création d’un jeu de société', 'Création d''un jeu de société permettant l''immersion dans un univers complet, de détente, de rire ou de réflexion.'),
(64, '56bc9a6861f37', 'Native Project, Marque vestimentaire', 'Création d''une marque en plusieurs collections pour jeunes à base d''impression de couleurs.'),
(65, '56bc9a68a555b', 'L’ANIMATION EN DIMENSION 2.5', 'Réalisation d''un court métrage en animation 2D, avec des décors réalisés en 3D.'),
(67, '56bc9a69db6e6', 'A vos concours (Mini Maousse)', 'Concevoir "la nouvelle maison des jours meilleurs". Il s''agit d''une "unité d''habitation temporaire pensée et économe", qui soit "modulable, adaptable, empilable, démontable et transportable".'),
(68, '56bc9a6beee80', 'POP UP STORE, magasin éphémère, concept store.', 'Création d''un "pop-up store" sur Bordeaux, afin de vendre une collection capsule de vêtement de créateurs.'),
(69, '56bc9a6c8b636', 'SOS SPA', 'Création d''une campagne de sensibilisation dans le but de renforcer sa présence auprès de la population et de venir en aide à la SPA de Mérignac.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
