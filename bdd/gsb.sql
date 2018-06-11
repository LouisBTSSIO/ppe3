-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 juin 2018 à 10:31
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `coefficient`
--

DROP TABLE IF EXISTS `coefficient`;
CREATE TABLE IF NOT EXISTS `coefficient` (
  `pra_coefnotoriete` int(11) NOT NULL,
  PRIMARY KEY (`pra_coefnotoriete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coefficient`
--

INSERT INTO `coefficient` (`pra_coefnotoriete`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Structure de la table `comptable`
--

DROP TABLE IF EXISTS `comptable`;
CREATE TABLE IF NOT EXISTS `comptable` (
  `Id_Comptable` char(4) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Comptable`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comptable`
--

INSERT INTO `comptable` (`Id_Comptable`, `nom`, `prenom`, `login`, `mdp`) VALUES
('C456', 'Navia', 'Thomas', 'ThomasN', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `delegue`
--

DROP TABLE IF EXISTS `delegue`;
CREATE TABLE IF NOT EXISTS `delegue` (
  `del_matricule` varchar(255) NOT NULL,
  `del_nom` varchar(255) NOT NULL,
  `del_prenom` varchar(255) NOT NULL,
  `del_adresse` varchar(255) NOT NULL,
  `del_ville` varchar(255) NOT NULL,
  `del_cp` int(11) NOT NULL,
  `del_mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`del_matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `delegue`
--

INSERT INTO `delegue` (`del_matricule`, `del_nom`, `del_prenom`, `del_adresse`, `del_ville`, `del_cp`, `del_mdp`) VALUES
('1', 'Jack', 'Henry', '5 rue de matignon', 'Paris', 75002, '1234');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('RB', 'Remboursée'),
('VA', 'Validée et mise en paiement');

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `fam_code` varchar(250) NOT NULL,
  `fam_libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`fam_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`fam_code`, `fam_libelle`) VALUES
('1', 'Corticoïde, antibiotique et antifongique à usage local'),
('2', 'Antibiotique de la famille des béta-lactamines '),
('3', 'Antibiotique urinaire minute'),
('4', 'Antalgique en association'),
('5', 'Antidépresseur d\'action centrale'),
('6', 'Psychostimulant, antiasthénique'),
('7', 'Antalgique antipyrétiques en association'),
('8', 'Antibiotique local (ORL)'),
('9', 'Antihistaminique H1 local');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

DROP TABLE IF EXISTS `fichefrais`;
CREATE TABLE IF NOT EXISTS `fichefrais` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT 'CR',
  `libelleEtat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idVisiteur`,`mois`),
  KEY `idEtat` (`idEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichefrais`
--

INSERT INTO `fichefrais` (`idVisiteur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`, `libelleEtat`) VALUES
('a131', '201712', 0, NULL, '2017-12-20', 'CR', NULL),
('a17', '201710', 0, '26034.00', '2017-10-11', 'VA', NULL),
('a17', '201711', 0, NULL, '2017-11-29', 'VA', NULL),
('a17', '201712', 0, NULL, '2017-12-06', 'CR', NULL),
('a17', '201804', 0, NULL, '2018-04-19', 'CR', NULL),
('a17', '201806', 0, NULL, '2018-06-04', 'CR', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

DROP TABLE IF EXISTS `fraisforfait`;
CREATE TABLE IF NOT EXISTS `fraisforfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', '110.00'),
('KM', 'Frais Kilometrique', '0.62'),
('NUI', 'Nuitee Hotel', '80.00'),
('REP', 'Repas Restaurant', '25.00');

-- --------------------------------------------------------

--
-- Structure de la table `justificatif`
--

DROP TABLE IF EXISTS `justificatif`;
CREATE TABLE IF NOT EXISTS `justificatif` (
  `IdJustificatif` int(11) NOT NULL AUTO_INCREMENT,
  `idVisiteur` varchar(10) NOT NULL,
  `mois` int(11) NOT NULL,
  `Chemin` varchar(50) NOT NULL,
  PRIMARY KEY (`IdJustificatif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

DROP TABLE IF EXISTS `lignefraisforfait`;
CREATE TABLE IF NOT EXISTS `lignefraisforfait` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`),
  KEY `idFraisForfait` (`idFraisForfait`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`idVisiteur`, `mois`, `idFraisForfait`, `quantite`) VALUES
('', '201712', 'ETP', 10),
('', '201712', 'KM', 0),
('', '201712', 'NUI', 0),
('', '201712', 'REP', 0),
('a17', '201710', 'ETP', 25),
('a17', '201710', 'KM', 56),
('a17', '201710', 'NUI', 6),
('a17', '201710', 'REP', 897),
('a17', '201711', 'ETP', 67),
('a17', '201711', 'KM', 70),
('a17', '201711', 'NUI', 0),
('a17', '201711', 'REP', 3),
('a17', '201712', 'ETP', 0),
('a17', '201712', 'KM', 4),
('a17', '201712', 'NUI', 0),
('a17', '201712', 'REP', 3),
('a17', '201804', 'ETP', 218),
('a17', '201804', 'KM', 278),
('a17', '201804', 'NUI', 262),
('a17', '201804', 'REP', 256),
('a17', '201806', 'ETP', 1),
('a17', '201806', 'KM', 1),
('a17', '201806', 'NUI', 1),
('a17', '201806', 'REP', 1);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

DROP TABLE IF EXISTS `lignefraishorsforfait`;
CREATE TABLE IF NOT EXISTS `lignefraishorsforfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idVisiteur` (`idVisiteur`,`mois`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignefraishorsforfait`
--

INSERT INTO `lignefraishorsforfait` (`id`, `idVisiteur`, `mois`, `libelle`, `date`, `montant`, `etat`) VALUES
(6, 'a17', '201710', 'RRR', '2017-09-11', '345.00', 0),
(7, 'a17', '201711', 'travaux', '2017-01-12', '323.00', 1),
(8, 'a17', '201711', 'lolilol', '2017-11-25', '367.00', 0),
(11, 'a17', '201701', 'libell&eacute;', '2017-12-12', '234.00', 0),
(13, 'a17', '201801', 'V', '2017-12-20', '6969.00', 0),
(14, 'a17', '201801', 'libelle20', '2017-12-20', '567.00', 0),
(15, 'a17', '201801', 'LOL', '2017-12-09', '323.00', 0),
(16, 'a17', '201804', 'ezeze', '2018-04-18', '50.00', 0),
(17, 'a17', '201804', 'ezezz', '2017-10-12', '12.00', 0),
(18, 'a17', '201804', 'hh', '2017-12-25', '10.00', 0),
(19, 'a17', '201804', 'hh', '2017-12-25', '10.00', 0),
(20, 'a17', '201804', 'hh', '2017-12-25', '10.00', 0),
(21, 'a17', '201804', 'rzrzzzr', '2017-10-20', '12.00', 0),
(22, 'a17', '201804', 'rzrzzzr', '2017-10-20', '12.00', 0),
(23, 'a17', '201804', 'rzrzzzr', '2017-10-20', '12.00', 0),
(24, 'a17', '201804', 'aeafza', '2018-04-18', '12.00', 0),
(25, 'a17', '201804', 'aeafza', '2018-04-18', '12.00', 0),
(26, 'a17', '201804', 'aeafza', '2018-04-18', '12.00', 0),
(27, 'a17', '201804', 'aeafza', '2018-04-18', '12.00', 0),
(28, 'a17', '201804', 'aeafza', '2018-04-18', '12.00', 0),
(29, 'a17', '201804', 'aeafza', '2018-04-18', '12.00', 0),
(30, 'a17', '201804', 'aeafza', '2018-04-18', '12.00', 0),
(31, 'a17', '201804', 'addzfzbi', '2018-03-14', '15.00', 0),
(32, 'a17', '201804', 'addzfzbi', '2018-03-14', '15.00', 0),
(33, 'a17', '201804', 'addzfzbi', '2018-03-14', '15.00', 0),
(34, 'a17', '201804', 'aeafza', '2018-04-18', '12.00', 0),
(35, 'a17', '201804', 'Noel', '2017-12-24', '25.00', 0),
(36, 'a17', '201804', 'aeaiheaiha', '2017-09-27', '18.00', 0),
(37, 'a17', '201806', 'test', '2018-06-02', '45.00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `med_depotlegal` varchar(250) NOT NULL,
  `med_nomcommercial` varchar(250) NOT NULL,
  `fam_code` varchar(250) NOT NULL,
  `med_composition` varchar(250) NOT NULL,
  `med_effets` varchar(250) NOT NULL,
  `med_contreindic` varchar(250) NOT NULL,
  `med_prixechantillon` int(11) NOT NULL,
  PRIMARY KEY (`med_depotlegal`),
  KEY `fam_code` (`fam_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`med_depotlegal`, `med_nomcommercial`, `fam_code`, `med_composition`, `med_effets`, `med_contreindic`, `med_prixechantillon`) VALUES
('3MYC7', 'TRIMYCINE', '1', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est un corticoïde à activité forte ou très forte associé à un antibiotique et un antifongique, utilisé en application locale dans certaines atteintes cutanées surinfectées.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants, d\'infections de la peau ou de parasitisme non traités, d\'acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', 30),
('AMOPIL7', 'AMOPIL', '2', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', 12),
('APATOUX22', 'APATOUX Vitamine C', '8', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants , en cas de phénylcétonurie et chez l\'enfant de moins de 6 ans.', 20),
('BITALV', 'BIVALIC', '7', 'Dextroproxyphène + Paracétamol', 'Ce médicament est utilisé pour traiter les douleurs d\'intensité modérée ou intense.', 'Ce médicament est contre-indiqué en cas d\'allergie aux médicaments de cette famille, d\'insuffisance hépatique ou d\'insuffisance rénale.', 17),
('DIMIRTAM6', 'DIMIRTAM', '5', 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.', 'La prise de ce produit est contre-indiquée en cas d\'allergie à l\'un des constituants.', 22),
('EVILR7', 'EVEILLOR', '6', 'Adrafinil', 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants.', 23),
('INSXT5', 'INSECTIL', '9', 'Diphénydramine', 'Ce médicament est utilisé en application locale sur les piqûres d\'insecte et l\'urticaire.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antihistaminiques.', 15),
('PARMOL16', 'PARMOCODEINE', '4', 'Codéine + Paracétamol', 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants, chez l\'enfant de moins de 15 kg, en cas d\'insuffisance hépatique ou respiratoire, d\'asthme, de phénylcétonurie et chez la femme qui allaite.', 19),
('PHYSOI8', 'PHYSICOR', '6', 'Sulbutiamine', 'Ce médicament est utilisé pour traiter les baisses d\'activité physique ou psychique , souvent dans un contexte de dépression.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants.', 15),
('URIEG6', 'URIREGUL', '3', 'Fosfomycine trométamol', 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.', 'La prise de ce médicament est contre-indiquée en cas d\'allergie à l\'un des constituants et d\'insuffisance rénale.', 20);

-- --------------------------------------------------------

--
-- Structure de la table `practicien`
--

DROP TABLE IF EXISTS `practicien`;
CREATE TABLE IF NOT EXISTS `practicien` (
  `pra_num` int(11) NOT NULL AUTO_INCREMENT,
  `pra_nom` varchar(250) NOT NULL,
  `pra_prenom` varchar(250) NOT NULL,
  `pra_adresse` varchar(250) NOT NULL,
  `pra_cp` int(11) NOT NULL,
  `pra_ville` varchar(250) NOT NULL,
  `pra_coefnotoriete` int(11) NOT NULL,
  `moyenne` varchar(250) DEFAULT NULL,
  `typ_code` varchar(250) NOT NULL,
  PRIMARY KEY (`pra_num`),
  KEY `typ_code` (`typ_code`),
  KEY `pra_coefnotoriete` (`pra_coefnotoriete`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `practicien`
--

INSERT INTO `practicien` (`pra_num`, `pra_nom`, `pra_prenom`, `pra_adresse`, `pra_cp`, `pra_ville`, `pra_coefnotoriete`, `moyenne`, `typ_code`) VALUES
(21, 'Houchard', 'Eliane', '9 rue Demolombes', 49100, 'Angers', 3, NULL, '4'),
(35, 'Leveneur', 'Hugues', '7 place St Gilles', 62000, 'Arras', 1, NULL, '5'),
(36, 'Mosquet', 'Isabelle', '22 rue Jules Vernes', 76000, 'Rouen', 3, NULL, '7'),
(41, 'Ain', 'Jean-Pierre', '4 résidence Olympia', 2000, 'Laon', 3, NULL, '10'),
(53, 'Vittorio', 'Myriam', '3 place Champlain', 94000, 'Boissy-Saint-Leger', 5, NULL, '9'),
(56, 'Chubilleau', 'Pascal', '3 rue Hastings', 15000, 'Aurillac', 4, NULL, '1'),
(62, 'Mirouf', 'Patrick', '22 rue Puits Picard', 74000, 'Annecy', 2, NULL, '6'),
(65, 'Duhamel', 'Philippe', '114 rue Authie', 34000, 'Montpellier', 4, NULL, '2'),
(70, 'Goessens', 'Pierre', '22 rue Jean Romain', 4000, 'Mont-de-Marsan', 3, NULL, '3'),
(80, 'Renouf', 'Sylvie', '98 boulevard Mar Lyautey', 88000, 'Epinal', 5, NULL, '8');

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite`
--

DROP TABLE IF EXISTS `rapport_visite`;
CREATE TABLE IF NOT EXISTS `rapport_visite` (
  `rap_num` int(11) NOT NULL AUTO_INCREMENT,
  `vis_matricule` int(11) NOT NULL,
  `pra_num` int(11) DEFAULT NULL,
  `rp_num` int(11) DEFAULT NULL,
  `rap_date` varchar(255) NOT NULL,
  `rap_bilan` varchar(500) NOT NULL,
  `rap_motif` varchar(500) NOT NULL,
  `pra_coefnotoriete` int(11) NOT NULL,
  `med_depotlegal` varchar(500) NOT NULL,
  `echantillon` int(11) NOT NULL,
  PRIMARY KEY (`rap_num`),
  KEY `vis_matricule` (`vis_matricule`),
  KEY `pra_num` (`pra_num`),
  KEY `med_depotlegal` (`med_depotlegal`(255)),
  KEY `pra_coefnotoriete` (`pra_coefnotoriete`),
  KEY `rp_num` (`rp_num`)
) ENGINE=InnoDB AUTO_INCREMENT=878 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rapport_visite`
--

INSERT INTO `rapport_visite` (`rap_num`, `vis_matricule`, `pra_num`, `rp_num`, `rap_date`, `rap_bilan`, `rap_motif`, `pra_coefnotoriete`, `med_depotlegal`, `echantillon`) VALUES
(44, 1, 35, 1, '16 April, 2018', 'test', 'test', 5, 'APATOUX22', 5),
(869, 1, 53, 1, '22 April, 2018', '896', '896', 3, 'PHYSOI8', 896),
(870, 1, 41, 1, '5 April, 2018', 'ttt', 'ttt', 4, 'PHYSOI8', 8),
(871, 1, 41, 1, '30 April, 2018', 'azazaz', 'azazaz', 5, 'URIEG6', 5),
(872, 1, 36, 1, '29 April, 2018', 'tetetete', 'tetetetet', 5, 'APATOUX22', 8),
(873, 1, 41, 1, '29 April, 2018', '999', '9999', 2, 'PHYSOI8', 999999),
(874, 1, NULL, 2, '26 April, 2018', 'test', 'test', 4, '3MYC7', 5),
(875, 1, NULL, 3, '30 April, 2018', 'aa', 'aa', 2, '3MYC7', 5),
(876, 1, 36, NULL, '23 April, 2018', 'annecy', 'annecy', 3, 'AMOPIL7', 5),
(877, 1, NULL, 3, '22 April, 2018', 'lyon', 'lyon', 3, 'DIMIRTAM6', 5);

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite_del`
--

DROP TABLE IF EXISTS `rapport_visite_del`;
CREATE TABLE IF NOT EXISTS `rapport_visite_del` (
  `rap_num_del` int(11) NOT NULL AUTO_INCREMENT,
  `del_matricule` varchar(255) NOT NULL,
  `pra_num` int(11) DEFAULT NULL,
  `rp_num` int(11) DEFAULT NULL,
  `rap_date_del` varchar(255) NOT NULL,
  `rap_bilan_del` varchar(500) NOT NULL,
  `rap_motif_del` varchar(500) NOT NULL,
  `pra_coefnotoriete` int(11) NOT NULL,
  `med_depotlegal` varchar(255) NOT NULL,
  `echantillon_del` int(11) NOT NULL,
  PRIMARY KEY (`rap_num_del`),
  KEY `med_depotlegal` (`med_depotlegal`),
  KEY `del_matricule` (`del_matricule`),
  KEY `pra_num_del` (`pra_num`),
  KEY `pra_coefnotoriete` (`pra_coefnotoriete`),
  KEY `rp_num` (`rp_num`)
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rapport_visite_del`
--

INSERT INTO `rapport_visite_del` (`rap_num_del`, `del_matricule`, `pra_num`, `rp_num`, `rap_date_del`, `rap_bilan_del`, `rap_motif_del`, `pra_coefnotoriete`, `med_depotlegal`, `echantillon_del`) VALUES
(99, '1', 35, 3, '24 April, 2018', 'test', 'test', 5, 'APATOUX22', 5),
(1000, '1', 41, 2, '30 April, 2018', 'idk', 'idk', 4, 'PHYSOI8', 5),
(1001, '1', 41, 3, '30 April, 2018', '999', '999', 5, 'URIEG6', 999),
(1002, '1', 36, 3, '29 April, 2018', 'jjjj', 'jjj', 1, 'URIEG6', 4),
(1003, '1', 36, 2, '28 April, 2018', '4545', '4545', 4, 'URIEG6', 4545),
(1004, '1', NULL, 3, '18 April, 2018', 'oo', 'oo', 4, '3MYC7', 1),
(1005, '1', 41, NULL, '22 April, 2018', 'annecy', 'annecy', 3, 'INSXT5', 5),
(1006, '1', NULL, 2, '22 April, 2018', 'lyon', 'lyon', 3, 'INSXT5', 5),
(1007, '1', 36, NULL, '22 April, 2018', 'test', 'test', 4, 'INSXT5', 5),
(1008, '1', NULL, 2, '11 April, 2018', 'aa', 'aa', 2, '3MYC7', 5);

-- --------------------------------------------------------

--
-- Structure de la table `remplacant`
--

DROP TABLE IF EXISTS `remplacant`;
CREATE TABLE IF NOT EXISTS `remplacant` (
  `rp_num` int(11) NOT NULL,
  `rp_nom` varchar(250) NOT NULL,
  `rp_prenom` varchar(250) NOT NULL,
  `rp_adresse` varchar(250) NOT NULL,
  `rp_cp` int(11) NOT NULL,
  `rp_ville` varchar(250) NOT NULL,
  PRIMARY KEY (`rp_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `remplacant`
--

INSERT INTO `remplacant` (`rp_num`, `rp_nom`, `rp_prenom`, `rp_adresse`, `rp_cp`, `rp_ville`) VALUES
(1, 'Potter', 'Harry', '4 Privet Drive', 45, 'Little Whinging'),
(2, 'Parker', 'Peter', '20 Ingram Street', 63, 'Hills Forest Gardens'),
(3, 'Wayne', 'Bruce', 'Batcave', 666, 'Gotham');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `resp_matricule` varchar(255) NOT NULL,
  `resp_nom` varchar(255) NOT NULL,
  `resp_prenom` varchar(255) NOT NULL,
  `resp_adresse` varchar(255) NOT NULL,
  `resp_cp` int(11) NOT NULL,
  `resp_ville` varchar(255) NOT NULL,
  `resp_mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`resp_matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`resp_matricule`, `resp_nom`, `resp_prenom`, `resp_adresse`, `resp_cp`, `resp_ville`, `resp_mdp`) VALUES
('1', 'Pierre', 'Marc', '37 rue de paris', 75002, 'Paris', '123');

-- --------------------------------------------------------

--
-- Structure de la table `type_individu`
--

DROP TABLE IF EXISTS `type_individu`;
CREATE TABLE IF NOT EXISTS `type_individu` (
  `tin_code` varchar(250) NOT NULL,
  `tin_libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`tin_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_practicien`
--

DROP TABLE IF EXISTS `type_practicien`;
CREATE TABLE IF NOT EXISTS `type_practicien` (
  `typ_code` varchar(250) NOT NULL,
  `typ_libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`typ_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_practicien`
--

INSERT INTO `type_practicien` (`typ_code`, `typ_libelle`) VALUES
('1', 'Médecin Généraliste'),
('10', 'Médecin Hospitalier'),
('2', 'Pharmacien Officine'),
('3', 'Pharmacien de Garde'),
('4', 'Infirmier'),
('5', 'Médecin du Sport'),
('6', 'Médecine de ville'),
('7', 'Médecin de Garde'),
('8', 'Homéopathe'),
('9', 'Personnel de santé');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`) VALUES
('a131', 'Villechalane', 'Louis', 'lvillachane', 'jux7g', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21'),
('a17', 'Andre', 'David', 'dandre', 'oppg5', '1 rue Petit', '46200', 'Lalbenque', '1998-11-23'),
('a55', 'Bedos', 'Christian', 'cbedos', 'gmhxd', '1 rue Peranud', '46250', 'Montcuq', '1995-01-12'),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'ktp3s', '22 rue des Ternes', '46123', 'Gramat', '2000-05-01'),
('b13', 'Bentot', 'Pascal', 'pbentot', 'doyw1', '11 allée des Cerises', '46512', 'Bessines', '1992-07-09'),
('b16', 'Bioret', 'Luc', 'lbioret', 'hrjfs', '1 Avenue gambetta', '46000', 'Cahors', '1998-05-11'),
('b19', 'Bunisset', 'Francis', 'fbunisset', '4vbnd', '10 rue des Perles', '93100', 'Montreuil', '1987-10-21'),
('b25', 'Bunisset', 'Denise', 'dbunisset', 's1y1r', '23 rue Manin', '75019', 'paris', '2010-12-05'),
('b28', 'Cacheux', 'Bernard', 'bcacheux', 'uf7r3', '114 rue Blanche', '75017', 'Paris', '2009-11-12'),
('b34', 'Cadic', 'Eric', 'ecadic', '6u8dc', '123 avenue de la République', '75011', 'Paris', '2008-09-23'),
('b4', 'Charoze', 'Catherine', 'ccharoze', 'u817o', '100 rue Petit', '75019', 'Paris', '2005-11-12'),
('b50', 'Clepkens', 'Christophe', 'cclepkens', 'bw1us', '12 allée des Anges', '93230', 'Romainville', '2003-08-11'),
('b59', 'Cottin', 'Vincenne', 'vcottin', '2hoh9', '36 rue Des Roches', '93100', 'Monteuil', '2001-11-18'),
('c14', 'Daburon', 'François', 'fdaburon', '7oqpv', '13 rue de Chanzy', '94000', 'Créteil', '2002-02-11'),
('c3', 'De', 'Philippe', 'pde', 'gk9kx', '13 rue Barthes', '94000', 'Créteil', '2010-12-14'),
('c54', 'Debelle', 'Michel', 'mdebelle', 'od5rt', '181 avenue Barbusse', '93210', 'Rosny', '2006-11-23'),
('d13', 'Debelle', 'Jeanne', 'jdebelle', 'nvwqq', '134 allée des Joncs', '44000', 'Nantes', '2000-05-11'),
('d51', 'Debroise', 'Michel', 'mdebroise', 'sghkb', '2 Bld Jourdain', '44000', 'Nantes', '2001-04-17'),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', 'f1fob', '14 Place d Arc', '45000', 'Orléans', '2005-11-12'),
('e24', 'Desnost', 'Pierre', 'pdesnost', '4k2o5', '16 avenue des Cèdres', '23200', 'Guéret', '2001-02-05'),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '44im8', '18 rue de l église', '23120', 'GrandBourg', '2000-08-01'),
('e49', 'Duncombe', 'Claude', 'cduncombe', 'qf77j', '19 rue de la tour', '23100', 'La souteraine', '1987-10-10'),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', 'y2qdu', '25 place de la gare', '23200', 'Gueret', '1995-09-01'),
('e52', 'Eynde', 'Valérie', 'veynde', 'i7sn3', '3 Grand Place', '13015', 'Marseille', '1999-11-01'),
('f21', 'Finck', 'Jacques', 'jfinck', 'mpb3t', '10 avenue du Prado', '13002', 'Marseille', '2001-11-10'),
('f39', 'Frémont', 'Fernande', 'ffremont', 'xs5tq', '4 route de la mer', '13012', 'Allauh', '1998-10-01'),
('f4', 'Gest', 'Alain', 'agest', 'dywvt', '30 avenue de la mer', '13025', 'Berre', '1985-11-01');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur_ppe3`
--

DROP TABLE IF EXISTS `visiteur_ppe3`;
CREATE TABLE IF NOT EXISTS `visiteur_ppe3` (
  `vis_matricule` int(11) NOT NULL AUTO_INCREMENT,
  `vis_nom` varchar(250) NOT NULL,
  `vis_prenom` varchar(250) NOT NULL,
  `vis_adresse` varchar(250) NOT NULL,
  `vis_cp` varchar(11) NOT NULL,
  `vis_ville` varchar(250) NOT NULL,
  `region` varchar(250) NOT NULL,
  `departement` varchar(250) NOT NULL,
  `secteur` varchar(250) NOT NULL,
  `vis_dateembauche` varchar(255) NOT NULL,
  PRIMARY KEY (`vis_matricule`),
  KEY `vis_cp` (`vis_cp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteur_ppe3`
--

INSERT INTO `visiteur_ppe3` (`vis_matricule`, `vis_nom`, `vis_prenom`, `vis_adresse`, `vis_cp`, `vis_ville`, `region`, `departement`, `secteur`, `vis_dateembauche`) VALUES
(1, 'Tusseau', 'Louis', '22 rue Renou', '86', 'Poitiers', 'Nouvelle-Aquitaine', 'Vienne', 'Ouest', '2000-12-12'),
(2, 'Bedoso', 'Christian', '1 rue Bénédictins', '65', 'Tarbes', 'Occitanie', 'Hautes-Pyrénées', 'Sud', '1999-08-22'),
(3, 'Andre', 'David', '1 rue Aimon de Chissée', '38', 'Grenoble', 'Auvergne-Rhône-Alpes', 'Isère', 'Est', '2018-03-08'),
(4, 'Bentot', 'Pascal', '11 avenue 6 Juin', '67', 'Strasbourg', 'Grand Est', 'Bas-Rhin', 'Est', '1997-10-30'),
(5, 'Bioret', 'Luc', '1 rue Linne', '35', 'Rennes', 'Bretagne', 'Ille et Vilaine', 'Ouest', '2002-06-14'),
(6, 'Bunisset', 'Francis', '10 rue Nicolas Chorier', '85', 'La-Roche-sur-Yon', 'Pays de la Loire', 'Vendée', 'Ouest', '2008-07-22'),
(7, 'Cacheux', 'Bernard', '114 rue Authie', '34', 'Montpellier', 'Occitanie', 'Hérault', 'Sud', '1998-01-08'),
(8, 'Cadic', 'Eric', '123 rue Caponière', '41', 'Blois', 'Centre-Val de Loire', 'Loir et Cher', 'Paris Centre', '2018-03-02'),
(9, 'Quiquandon', 'Joël', '7 rue Ernest Renan', '29', 'Quimper', 'Bretagne', 'Finistère', 'Ouest', '2006-03-14'),
(10, 'Onfroy', 'Den', '5 rue Sidonie Jacolin', '37', 'Tours', 'Centre-Val de Loire', 'Indre et Loire', 'Paris Centre', '1989-02-14'),
(12, 'vv', 'vv', 'vv', '10', 'vv', 'vv', 'vv', 'Est', '22 April, 2018');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `medicament_ibfk_1` FOREIGN KEY (`fam_code`) REFERENCES `famille` (`fam_code`);

--
-- Contraintes pour la table `practicien`
--
ALTER TABLE `practicien`
  ADD CONSTRAINT `practicien_ibfk_1` FOREIGN KEY (`typ_code`) REFERENCES `type_practicien` (`typ_code`),
  ADD CONSTRAINT `practicien_ibfk_2` FOREIGN KEY (`pra_coefnotoriete`) REFERENCES `coefficient` (`pra_coefnotoriete`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
