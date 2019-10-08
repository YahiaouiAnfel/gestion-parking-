-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 28 jan. 2018 à 09:02
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `id4037200_projett`
--

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `idA` int(11) NOT NULL,
  `numero_police_assurance` int(11) NOT NULL,
  `date_effet` date NOT NULL,
  `date_expiration` date NOT NULL,
  `nom_compagnie_assurance` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type_assurance` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `prix_assurance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

CREATE TABLE `conducteur` (
  `idC` int(11) NOT NULL,
  `nom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Date_naissance` date NOT NULL,
  `adresse` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `situation_familiale` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `num_permis_conduire` int(11) NOT NULL,
  `anneeobtention` int(4) NOT NULL,
  `wilayaobtention` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `controle`
--

CREATE TABLE `controle` (
  `idControle` int(11) NOT NULL,
  `numero_controle_technique` int(11) NOT NULL,
  `organisme_emetteur` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date_effet` date NOT NULL,
  `date_fin` date NOT NULL,
  `Observations` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `incident_depense`
--

CREATE TABLE `incident_depense` (
  `id` int(11) NOT NULL,
  `incident` text COLLATE utf8_unicode_ci NOT NULL,
  `depense` int(11) NOT NULL,
  `idV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` text COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_en_service`
--

CREATE TABLE `vehicule_en_service` (
  `num_permis_conduire` int(11) NOT NULL,
  `numero_sequence_matricule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `idV` int(11) NOT NULL,
  `numero_sequence_matricule` int(11) NOT NULL,
  `WilayaImmatriculation` int(11) NOT NULL,
  `AnneeCirculation` int(11) NOT NULL,
  `Marque` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Modele` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Couleur` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voiture_assurance`
--

CREATE TABLE `voiture_assurance` (
  `numero_sequence_matricule` int(11) NOT NULL,
  `numero_police_assurance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voiture_controle`
--

CREATE TABLE `voiture_controle` (
  `numero_controle_technique` int(11) NOT NULL,
  `numero_sequence_matricule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`idA`);

--
-- Index pour la table `conducteur`
--
ALTER TABLE `conducteur`
  ADD PRIMARY KEY (`idC`);

--
-- Index pour la table `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`idControle`);

--
-- Index pour la table `incident_depense`
--
ALTER TABLE `incident_depense`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`idV`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conducteur`
--
ALTER TABLE `conducteur`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `controle`
--
ALTER TABLE `controle`
  MODIFY `idControle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `incident_depense`
--
ALTER TABLE `incident_depense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `idV` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
