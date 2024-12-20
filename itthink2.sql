-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 déc. 2024 à 11:38
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `itthink2`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégories`
--

CREATE TABLE `catégories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `freelances`
--

CREATE TABLE `freelances` (
  `id_freelance` int(11) NOT NULL,
  `nom_freelance` varchar(50) DEFAULT NULL,
  `competences` varchar(150) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hicham`
--

CREATE TABLE `hicham` (
  `fr` varchar(80) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id_offre` int(11) NOT NULL,
  `montant` decimal(6,2) DEFAULT NULL,
  `delai` varchar(50) DEFAULT NULL,
  `id_freelance` int(11) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id_projet` int(11) NOT NULL,
  `titre_projet` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_sous_categorie` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_catégories`
--

CREATE TABLE `sous_catégories` (
  `id_sous_categorie` int(11) NOT NULL,
  `nom_sous_categorie` varchar(50) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `témoignages`
--

CREATE TABLE `témoignages` (
  `id_temoignage` int(11) NOT NULL,
  `commentaire` varchar(100) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `mot_de_passe`, `email`) VALUES
(4, 'Abdellatif', '$2y$10$U4oHQ0932K5NDX4UWftUtu/tkaOGBFKzbbJbHfDHpYe', 'Abdellatif@gmail.com'),
(5, 'Fouad', '$2y$10$22S3e6J1FnoNg03GHkk/9ODYiA3EC8mmhsFBlioS3UZ', 'Fouad@gmail.com'),
(14, 'a', '$2y$10$qLE4NQ6oWKc/HmLl.JxROOFIgGvdsoTyhaseGH2y41z', 'a@gmal.com'),
(15, 'b', '$2y$10$Q.mEJFL.gs5DIulmLr3IKuH9J2WiTn/oj7wzdysiazk', 'b@b.com'),
(16, 'abde', '$2y$10$C69PBIDRAbXKwrG.p2RJrODaaMS.47R4kum0zhkVoXt', 'abde@gmail'),
(17, 'am', '$2y$10$E23h8EaonEEYWfvZkfXQ0O3gDooQrcURQ2O3HmQ2MZd', 'am@h.com'),
(18, 'ab', '$2y$10$x5Ds.qUb89i15nYGSsKoieA9dNJpxQb1vSYG88b4Tqw', 'ab@c.c'),
(19, 'ayoub', '$2y$10$guCpXQC7Fg8OwHYdLzAt.eev.2EGycvYbYGbKPdx3Xv', 'ayoub@gmail.com'),
(20, 'yas', '$2y$10$WtXmdb.FgIT.dSU2UIw8aOOtRYjksRD9AztPmdTj3Bd', 'yas@g.com'),
(21, 'amin', '$2y$10$XLYNY0K3dz81H.cRYgl1HOnhAwFjDhki2btyYW.76lT', 't@a.com'),
(22, 'you', '$2y$10$eNXkhvTJTlJ5lo0RoW4SKuTs6e/971i47ySGceT4d2n2A5sn7bZZu', 'you@gmail.com'),
(23, 'taza', '$2y$10$8ZwVuGpJjFnjGcoht/9SD.goIlmRnz3FPP.yIuXckVjJgPEF5iJ/i', 'a@a.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `catégories`
--
ALTER TABLE `catégories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `freelances`
--
ALTER TABLE `freelances`
  ADD PRIMARY KEY (`id_freelance`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `id_freelance` (`id_freelance`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_sous_categorie` (`id_sous_categorie`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `sous_catégories`
--
ALTER TABLE `sous_catégories`
  ADD PRIMARY KEY (`id_sous_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `témoignages`
--
ALTER TABLE `témoignages`
  ADD PRIMARY KEY (`id_temoignage`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `catégories`
--
ALTER TABLE `catégories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `freelances`
--
ALTER TABLE `freelances`
  MODIFY `id_freelance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_catégories`
--
ALTER TABLE `sous_catégories`
  MODIFY `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `témoignages`
--
ALTER TABLE `témoignages`
  MODIFY `id_temoignage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `freelances`
--
ALTER TABLE `freelances`
  ADD CONSTRAINT `freelances_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`id_freelance`) REFERENCES `freelances` (`id_freelance`),
  ADD CONSTRAINT `offres_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id_projet`);

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `catégories` (`id_categorie`),
  ADD CONSTRAINT `projets_ibfk_2` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_catégories` (`id_sous_categorie`),
  ADD CONSTRAINT `projets_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `sous_catégories`
--
ALTER TABLE `sous_catégories`
  ADD CONSTRAINT `sous_catégories_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `catégories` (`id_categorie`);

--
-- Contraintes pour la table `témoignages`
--
ALTER TABLE `témoignages`
  ADD CONSTRAINT `témoignages_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
