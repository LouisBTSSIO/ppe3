-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Avril 2018 à 09:56
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `coefficient` (
  `pra_coefnotoriete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `coefficient`
--

INSERT INTO `coefficient` (`pra_coefnotoriete`) VALUES
(0),
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Structure de la table `delegue`
--

CREATE TABLE `delegue` (
  `del_matricule` varchar(255) NOT NULL,
  `del_nom` varchar(255) NOT NULL,
  `del_prenom` varchar(255) NOT NULL,
  `del_adresse` varchar(255) NOT NULL,
  `del_ville` varchar(255) NOT NULL,
  `del_cp` int(11) NOT NULL,
  `del_mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `delegue`
--

INSERT INTO `delegue` (`del_matricule`, `del_nom`, `del_prenom`, `del_adresse`, `del_ville`, `del_cp`, `del_mdp`) VALUES
('1', 'Jack', 'Henry', '5 rue de matignon', 'Paris', 75002, '1234');

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `fam_code` varchar(250) NOT NULL,
  `fam_libelle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `famille`
--

INSERT INTO `famille` (`fam_code`, `fam_libelle`) VALUES
('0', 'Antihistaminique H1 local'),
('1', 'Corticoïde, antibiotique et antifongique à usage local'),
('2', 'Antibiotique de la famille des béta-lactamines '),
('3', 'Antibiotique urinaire minute'),
('4', 'Antalgique en association'),
('5', 'Antidépresseur d\'action centrale'),
('6', 'Psychostimulant, antiasthénique'),
('7', 'Antalgique antipyrétiques en association'),
('8', 'Antibiotique local (ORL)');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `med_depotlegal` varchar(250) NOT NULL,
  `med_nomcommercial` varchar(250) NOT NULL,
  `fam_code` varchar(250) NOT NULL,
  `med_composition` varchar(250) NOT NULL,
  `med_effets` varchar(250) NOT NULL,
  `med_contreindic` varchar(250) NOT NULL,
  `med_prixechantillon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `medicament`
--

INSERT INTO `medicament` (`med_depotlegal`, `med_nomcommercial`, `fam_code`, `med_composition`, `med_effets`, `med_contreindic`, `med_prixechantillon`) VALUES
('3MYC7', 'TRIMYCINE', '1', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est un corticoïde à activité forte ou très forte associé à un antibiotique et un antifongique, utilisé en application locale dans certaines atteintes cutanées surinfectées.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants, d\'infections de la peau ou de parasitisme non traités, d\'acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', 30),
('AMOPIL7', 'AMOPIL', '2', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', 12),
('APATOUX22', 'APATOUX Vitamine C', '8', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants , en cas de phénylcétonurie et chez l\'enfant de moins de 6 ans.', 20),
('BITALV', 'BIVALIC', '7', 'Dextroproxyphène + Paracétamol', 'Ce médicament est utilisé pour traiter les douleurs d\'intensité modérée ou intense.', 'Ce médicament est contre-indiqué en cas d\'allergie aux médicaments de cette famille, d\'insuffisance hépatique ou d\'insuffisance rénale.', 17),
('DIMIRTAM6', 'DIMIRTAM', '5', 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.', 'La prise de ce produit est contre-indiquée en cas d\'allergie à l\'un des constituants.', 22),
('EVILR7', 'EVEILLOR', '6', 'Adrafinil', 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants.', 23),
('INSXT5', 'INSECTIL', '0', 'Diphénydramine', 'Ce médicament est utilisé en application locale sur les piqûres d\'insecte et l\'urticaire.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antihistaminiques.', 15),
('PARMOL16', 'PARMOCODEINE', '4', 'Codéine + Paracétamol', 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants, chez l\'enfant de moins de 15 kg, en cas d\'insuffisance hépatique ou respiratoire, d\'asthme, de phénylcétonurie et chez la femme qui allaite.', 19),
('PHYSOI8', 'PHYSICOR', '6', 'Sulbutiamine', 'Ce médicament est utilisé pour traiter les baisses d\'activité physique ou psychique , souvent dans un contexte de dépression.', 'Ce médicament est contre-indiqué en cas d\'allergie à l\'un des constituants.', 15),
('URIEG6', 'URIREGUL', '3', 'Fosfomycine trométamol', 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.', 'La prise de ce médicament est contre-indiquée en cas d\'allergie à l\'un des constituants et d\'insuffisance rénale.', 20);

-- --------------------------------------------------------

--
-- Structure de la table `practicien`
--

CREATE TABLE `practicien` (
  `pra_num` int(11) NOT NULL,
  `pra_nom` varchar(250) NOT NULL,
  `pra_prenom` varchar(250) NOT NULL,
  `pra_adresse` varchar(250) NOT NULL,
  `pra_cp` int(11) NOT NULL,
  `pra_ville` varchar(250) NOT NULL,
  `pra_coefnotoriete` int(11) NOT NULL,
  `moyenne` varchar(250) DEFAULT NULL,
  `typ_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `practicien`
--

INSERT INTO `practicien` (`pra_num`, `pra_nom`, `pra_prenom`, `pra_adresse`, `pra_cp`, `pra_ville`, `pra_coefnotoriete`, `moyenne`, `typ_code`) VALUES
(21, 'Houchard', 'Eliane', '9 rue Demolombes', 49100, 'Angers', 3, NULL, '4'),
(35, 'Leveneur', 'Hugues', '7 place St Gilles', 62000, 'Arras', 1, NULL, '5'),
(36, 'Mosquet', 'Isabelle', '22 rue Jules Vernes', 76000, 'Rouen', 3, NULL, '7'),
(41, 'Ain', 'Jean-Pierre', '4 résidence Olympia', 2000, 'Laon', 3, NULL, '0'),
(53, 'Vittorio', 'Myriam', '3 place Champlain', 94000, 'Boissy-Saint-Leger', 5, NULL, '9'),
(56, 'Chubilleau', 'Pascal', '3 rue Hastings', 15000, 'Aurillac', 4, NULL, '1'),
(62, 'Mirouf', 'Patrick', '22 rue Puits Picard', 74000, 'Annecy', 2, NULL, '6'),
(65, 'Duhamel', 'Philippe', '114 rue Authie', 34000, 'Montpellier', 4, NULL, '2'),
(70, 'Goessens', 'Pierre', '22 rue Jean Romain', 4000, 'Mont-de-Marsan', 3, NULL, '3'),
(80, 'Renouf', 'Sylvie', '98 boulevard Mar Lyautey', 88000, 'Epinal', 5, NULL, '8'),
(81, 'ff', 'ff', 'ff', 55, 'ff', 5, NULL, '1');

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite`
--

CREATE TABLE `rapport_visite` (
  `rap_num` int(11) NOT NULL,
  `vis_matricule` int(11) NOT NULL,
  `pra_num` int(11) DEFAULT NULL,
  `rp_num` int(11) DEFAULT NULL,
  `rap_date` varchar(255) NOT NULL,
  `rap_bilan` varchar(500) NOT NULL,
  `rap_motif` varchar(500) NOT NULL,
  `pra_coefnotoriete` int(11) NOT NULL,
  `med_depotlegal` varchar(500) NOT NULL,
  `echantillon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rapport_visite`
--

INSERT INTO `rapport_visite` (`rap_num`, `vis_matricule`, `pra_num`, `rp_num`, `rap_date`, `rap_bilan`, `rap_motif`, `pra_coefnotoriete`, `med_depotlegal`, `echantillon`) VALUES
(44, 1, 35, 1, '16 April, 2018', 'test', 'test', 5, 'APATOUX22', 5),
(869, 1, 53, 1, '22 April, 2018', '896', '896', 3, 'PHYSOI8', 896),
(870, 1, 41, 1, '5 April, 2018', 'ttt', 'ttt', 4, 'PHYSOI8', 8),
(871, 1, 41, 1, '30 April, 2018', 'azazaz', 'azazaz', 5, 'URIEG6', 5),
(872, 1, 36, 1, '29 April, 2018', 'tetetete', 'tetetetet', 5, 'APATOUX22', 8),
(873, 1, 41, 1, '29 April, 2018', '999', '9999', 2, 'PHYSOI8', 999999),
(874, 1, NULL, 2, '26 April, 2018', 'test', 'test', 4, '3MYC7', 5),
(875, 1, NULL, 3, '30 April, 2018', 'aa', 'aa', 2, '3MYC7', 5);

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite_del`
--

CREATE TABLE `rapport_visite_del` (
  `rap_num_del` int(11) NOT NULL,
  `del_matricule` varchar(255) NOT NULL,
  `pra_num` int(11) DEFAULT NULL,
  `rp_num` int(11) DEFAULT NULL,
  `rap_date_del` varchar(255) NOT NULL,
  `rap_bilan_del` varchar(500) NOT NULL,
  `rap_motif_del` varchar(500) NOT NULL,
  `pra_coefnotoriete` int(11) NOT NULL,
  `med_depotlegal` varchar(255) NOT NULL,
  `echantillon_del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rapport_visite_del`
--

INSERT INTO `rapport_visite_del` (`rap_num_del`, `del_matricule`, `pra_num`, `rp_num`, `rap_date_del`, `rap_bilan_del`, `rap_motif_del`, `pra_coefnotoriete`, `med_depotlegal`, `echantillon_del`) VALUES
(99, '1', 35, 3, '24 April, 2018', 'test', 'test', 5, 'APATOUX22', 5),
(1000, '1', 41, 2, '30 April, 2018', 'idk', 'idk', 4, 'PHYSOI8', 5),
(1001, '1', 41, 3, '30 April, 2018', '999', '999', 5, 'URIEG6', 999),
(1002, '1', 36, 3, '29 April, 2018', 'jjjj', 'jjj', 1, 'URIEG6', 4),
(1003, '1', 36, 2, '28 April, 2018', '4545', '4545', 4, 'URIEG6', 4545),
(1004, '1', NULL, 3, '18 April, 2018', 'oo', 'oo', 4, '3MYC7', 1);

-- --------------------------------------------------------

--
-- Structure de la table `remplacant`
--

CREATE TABLE `remplacant` (
  `rp_num` int(11) NOT NULL,
  `rp_nom` varchar(250) NOT NULL,
  `rp_prenom` varchar(250) NOT NULL,
  `rp_adresse` varchar(250) NOT NULL,
  `rp_cp` int(11) NOT NULL,
  `rp_ville` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `remplacant`
--

INSERT INTO `remplacant` (`rp_num`, `rp_nom`, `rp_prenom`, `rp_adresse`, `rp_cp`, `rp_ville`) VALUES
(1, 'Potter', 'Harry', '4 Privet Drive', 45, 'Little Whinging'),
(2, 'Parker', 'Peter', '20 Ingram Street', 63, 'Hills Forest Gardens'),
(3, 'Wayne', 'Bruce', 'Batcave', 666, 'Gotham');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `resp_matricule` varchar(255) NOT NULL,
  `resp_nom` varchar(255) NOT NULL,
  `resp_prenom` varchar(255) NOT NULL,
  `resp_adresse` varchar(255) NOT NULL,
  `resp_cp` int(11) NOT NULL,
  `resp_ville` varchar(255) NOT NULL,
  `resp_mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `responsable`
--

INSERT INTO `responsable` (`resp_matricule`, `resp_nom`, `resp_prenom`, `resp_adresse`, `resp_cp`, `resp_ville`, `resp_mdp`) VALUES
('1', 'Pierre', 'Marc', '37 rue de paris', 75002, 'Paris', '123');

-- --------------------------------------------------------

--
-- Structure de la table `type_individu`
--

CREATE TABLE `type_individu` (
  `tin_code` varchar(250) NOT NULL,
  `tin_libelle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_practicien`
--

CREATE TABLE `type_practicien` (
  `typ_code` varchar(250) NOT NULL,
  `typ_libelle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_practicien`
--

INSERT INTO `type_practicien` (`typ_code`, `typ_libelle`) VALUES
('0', 'Médecin Hospitalier'),
('1', 'Médecin Généraliste'),
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
-- Structure de la table `visiteur_ppe3`
--

CREATE TABLE `visiteur_ppe3` (
  `vis_matricule` int(11) NOT NULL,
  `vis_nom` varchar(250) NOT NULL,
  `vis_prenom` varchar(250) NOT NULL,
  `vis_adresse` varchar(250) NOT NULL,
  `vis_cp` varchar(11) NOT NULL,
  `vis_ville` varchar(250) NOT NULL,
  `region` varchar(250) NOT NULL,
  `departement` varchar(250) NOT NULL,
  `vis_dateembauche` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `visiteur_ppe3`
--

INSERT INTO `visiteur_ppe3` (`vis_matricule`, `vis_nom`, `vis_prenom`, `vis_adresse`, `vis_cp`, `vis_ville`, `region`, `departement`, `vis_dateembauche`) VALUES
(1, 'Tusseau', 'Louis', '22 rue Renou', '86', 'Poitiers', 'Nouvelle-Aquitaine', 'Vienne', '2000-12-12'),
(2, 'Bedoso', 'Christian', '1 rue Bénédictins', '65', 'Tarbes', 'Occitanie', 'Hautes-Pyrénées', '1999-08-22'),
(3, 'Andre', 'David', '1 rue Aimon de Chissée', '38', 'Grenoble', 'Auvergne-Rhône-Alpes', 'Isère', '2018-03-08'),
(4, 'Bentot', 'Pascal', '11 avenue 6 Juin', '67', 'Strasbourg', 'Grand Est', 'Bas-Rhin', '1997-10-30'),
(5, 'Bioret', 'Luc', '1 rue Linne', '35', 'Rennes', 'Bretagne', 'Ille et Vilaine', '2002-06-14'),
(6, 'Bunisset', 'Francis', '10 rue Nicolas Chorier', '85', 'La-Roche-sur-Yon', 'Pays de la Loire', 'Vendée', '2008-07-22'),
(7, 'Cacheux', 'Bernard', '114 rue Authie', '34', 'Montpellier', 'Occitanie', 'Hérault', '1998-01-08'),
(8, 'Cadic', 'Eric', '123 rue Caponière', '41', 'Blois', 'Centre-Val de Loire', 'Loir et Cher', '2018-03-02'),
(9, 'Quiquandon', 'Joël', '7 rue Ernest Renan', '29', 'Quimper', 'Bretagne', 'Finistère', '2006-03-14'),
(10, 'Onfroy', 'Den', '5 rue Sidonie Jacolin', '37', 'Tours', 'Centre-Val de Loire', 'Indre et Loire', '1989-02-14'),
(11, 'Test', 'Test', 'Test', '92', 'Boulogne', 'Test', 'Test', '2 April, 2018'),
(12, 'ff', 'ff', 'ff', '55', 'ff', 'ff', 'ff', '23 April, 2018');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `coefficient`
--
ALTER TABLE `coefficient`
  ADD PRIMARY KEY (`pra_coefnotoriete`);

--
-- Index pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD PRIMARY KEY (`del_matricule`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`fam_code`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`med_depotlegal`),
  ADD KEY `fam_code` (`fam_code`);

--
-- Index pour la table `practicien`
--
ALTER TABLE `practicien`
  ADD PRIMARY KEY (`pra_num`),
  ADD KEY `typ_code` (`typ_code`),
  ADD KEY `pra_coefnotoriete` (`pra_coefnotoriete`);

--
-- Index pour la table `rapport_visite`
--
ALTER TABLE `rapport_visite`
  ADD PRIMARY KEY (`rap_num`),
  ADD KEY `vis_matricule` (`vis_matricule`),
  ADD KEY `pra_num` (`pra_num`),
  ADD KEY `med_depotlegal` (`med_depotlegal`),
  ADD KEY `pra_coefnotoriete` (`pra_coefnotoriete`),
  ADD KEY `rp_num` (`rp_num`);

--
-- Index pour la table `rapport_visite_del`
--
ALTER TABLE `rapport_visite_del`
  ADD PRIMARY KEY (`rap_num_del`),
  ADD KEY `med_depotlegal` (`med_depotlegal`),
  ADD KEY `del_matricule` (`del_matricule`),
  ADD KEY `pra_num_del` (`pra_num`),
  ADD KEY `pra_coefnotoriete` (`pra_coefnotoriete`),
  ADD KEY `rp_num` (`rp_num`);

--
-- Index pour la table `remplacant`
--
ALTER TABLE `remplacant`
  ADD PRIMARY KEY (`rp_num`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`resp_matricule`);

--
-- Index pour la table `type_individu`
--
ALTER TABLE `type_individu`
  ADD PRIMARY KEY (`tin_code`);

--
-- Index pour la table `type_practicien`
--
ALTER TABLE `type_practicien`
  ADD PRIMARY KEY (`typ_code`);

--
-- Index pour la table `visiteur_ppe3`
--
ALTER TABLE `visiteur_ppe3`
  ADD PRIMARY KEY (`vis_matricule`),
  ADD KEY `vis_cp` (`vis_cp`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `practicien`
--
ALTER TABLE `practicien`
  MODIFY `pra_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT pour la table `rapport_visite`
--
ALTER TABLE `rapport_visite`
  MODIFY `rap_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=876;
--
-- AUTO_INCREMENT pour la table `rapport_visite_del`
--
ALTER TABLE `rapport_visite_del`
  MODIFY `rap_num_del` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT pour la table `visiteur_ppe3`
--
ALTER TABLE `visiteur_ppe3`
  MODIFY `vis_matricule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
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

--
-- Contraintes pour la table `rapport_visite`
--
ALTER TABLE `rapport_visite`
  ADD CONSTRAINT `rapport_visite_ibfk_3` FOREIGN KEY (`med_depotlegal`) REFERENCES `medicament` (`med_depotlegal`),
  ADD CONSTRAINT `rapport_visite_ibfk_4` FOREIGN KEY (`pra_coefnotoriete`) REFERENCES `coefficient` (`pra_coefnotoriete`),
  ADD CONSTRAINT `rapport_visite_ibfk_5` FOREIGN KEY (`rp_num`) REFERENCES `remplacant` (`rp_num`),
  ADD CONSTRAINT `rapport_visite_ibfk_6` FOREIGN KEY (`vis_matricule`) REFERENCES `visiteur_ppe3` (`vis_matricule`),
  ADD CONSTRAINT `rapport_visite_ibfk_7` FOREIGN KEY (`pra_num`) REFERENCES `practicien` (`pra_num`);

--
-- Contraintes pour la table `rapport_visite_del`
--
ALTER TABLE `rapport_visite_del`
  ADD CONSTRAINT `rapport_visite_del_ibfk_1` FOREIGN KEY (`med_depotlegal`) REFERENCES `medicament` (`med_depotlegal`),
  ADD CONSTRAINT `rapport_visite_del_ibfk_3` FOREIGN KEY (`del_matricule`) REFERENCES `delegue` (`del_matricule`),
  ADD CONSTRAINT `rapport_visite_del_ibfk_4` FOREIGN KEY (`pra_coefnotoriete`) REFERENCES `coefficient` (`pra_coefnotoriete`),
  ADD CONSTRAINT `rapport_visite_del_ibfk_5` FOREIGN KEY (`rp_num`) REFERENCES `remplacant` (`rp_num`),
  ADD CONSTRAINT `rapport_visite_del_ibfk_6` FOREIGN KEY (`pra_num`) REFERENCES `practicien` (`pra_num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
