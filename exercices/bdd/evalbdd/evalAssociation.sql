-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 10 Avril 2018 à 11:47
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evalAssociation`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `idactivite` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `activite`
--

INSERT INTO `activite` (`idactivite`, `nom`) VALUES
(1, 'Point de croix'),
(2, 'Peinture sur soie'),
(3, 'Philosophie asiatique'),
(4, 'Aikido'),
(5, 'Danse latine');

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `idadherent` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `statut` enum('dirigeant','participant') NOT NULL DEFAULT 'participant',
  `dateNaissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`idadherent`, `nom`, `prenom`, `statut`, `dateNaissance`) VALUES
(18, NULL, 'Stéphanie', 'participant', '2018-04-01'),
(19, NULL, 'Dorra', 'participant', '2018-04-01'),
(20, NULL, 'Chihab', 'participant', '2018-04-01'),
(21, NULL, 'Youcef', 'participant', '2018-04-01'),
(22, NULL, 'Nicolas', 'participant', '2018-04-01'),
(23, 'Sanchez', 'Paul', 'dirigeant', '2018-04-01'),
(24, NULL, 'Grégoire', 'participant', '2018-04-01'),
(25, NULL, 'Grégory', 'participant', '2018-04-01'),
(26, NULL, 'Mathias', 'participant', '2018-04-01'),
(27, '', 'Manu', 'dirigeant', '2018-04-01'),
(28, NULL, 'Maxime', 'participant', '2018-04-01'),
(29, NULL, 'Frédéric', 'participant', '2018-04-01'),
(30, 'Perisse', 'Sébastien', 'dirigeant', '2018-04-01'),
(31, 'Blaudez', 'Nicolas', 'participant', '2018-04-01'),
(32, 'Domenjoud', 'Yannick', 'participant', '2018-04-01'),
(33, 'Balzer', 'Antoine', 'participant', '2018-04-01'),
(34, 'Charalambides', 'Olivier', 'dirigeant', '2018-04-01');

-- --------------------------------------------------------

--
-- Structure de la table `adherent_has_session`
--

CREATE TABLE `adherent_has_session` (
  `adherent_idadherent` int(11) NOT NULL,
  `session_idsession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adherent_has_session`
--

INSERT INTO `adherent_has_session` (`adherent_idadherent`, `session_idsession`) VALUES
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(32, 1),
(18, 2),
(19, 2),
(22, 2),
(23, 2),
(29, 2),
(30, 2),
(20, 3),
(21, 3),
(22, 3),
(28, 3),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `idsession` int(11) NOT NULL,
  `date` date NOT NULL,
  `heuredebut` time NOT NULL,
  `heurefin` time NOT NULL,
  `activite_idactivite` int(11) NOT NULL,
  `adherent_idprofesseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`idsession`, `date`, `heuredebut`, `heurefin`, `activite_idactivite`, `adherent_idprofesseur`) VALUES
(1, '2018-04-10', '19:00:00', '21:00:00', 2, 31),
(2, '2018-04-11', '20:30:00', '22:30:00', 5, 34),
(3, '2018-04-12', '18:30:00', '20:00:00', 4, 33),
(4, '2013-04-13', '20:00:00', '22:00:00', 3, 32);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`idactivite`);

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`idadherent`);

--
-- Index pour la table `adherent_has_session`
--
ALTER TABLE `adherent_has_session`
  ADD PRIMARY KEY (`adherent_idadherent`,`session_idsession`),
  ADD KEY `fk_adherent_has_session_session1_idx` (`session_idsession`),
  ADD KEY `fk_adherent_has_session_adherent1_idx` (`adherent_idadherent`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idsession`,`activite_idactivite`,`adherent_idprofesseur`),
  ADD UNIQUE KEY `idsession_UNIQUE` (`idsession`),
  ADD KEY `fk_session_activite_idx` (`activite_idactivite`),
  ADD KEY `fk_session_adhérent1_idx` (`adherent_idprofesseur`),
  ADD KEY `session_date` (`date`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `idactivite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `idadherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherent_has_session`
--
ALTER TABLE `adherent_has_session`
  ADD CONSTRAINT `fk_adherent_has_session_adherent1` FOREIGN KEY (`adherent_idadherent`) REFERENCES `adherent` (`idadherent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adherent_has_session_session1` FOREIGN KEY (`session_idsession`) REFERENCES `session` (`idsession`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `fk_session_activite` FOREIGN KEY (`activite_idactivite`) REFERENCES `activite` (`idactivite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_session_adhérent1` FOREIGN KEY (`adherent_idprofesseur`) REFERENCES `adherent` (`idadherent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
