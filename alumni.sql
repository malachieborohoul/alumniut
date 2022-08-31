-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 août 2022 à 20:00
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alumni`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `idAnnonces` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `libelle` text NOT NULL,
  `vu` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `apropos`
--

CREATE TABLE `apropos` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `banniere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `apropos`
--

INSERT INTO `apropos` (`id`, `titre`, `description`, `photo`, `banniere`) VALUES
(17, 'Institut Universitaire de NGaoundéré', ' ', 'http://localhost/aiut/public/importer/apropos/1629814018_ffc381c9d38b80ffe4b6.jpg', 'http://localhost/aiut/public/importer/apropos/1629814018_5cbef1841b2f1d2abfbd.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `uniidblog` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `banniere` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `nbrComment` int(11) NOT NULL,
  `IdUsers` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'actif',
  `blogcreated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`uniidblog`, `id`, `titre`, `banniere`, `description`, `nbrComment`, `IdUsers`, `statut`, `blogcreated_at`) VALUES
(3907564, 31, 'L\'IUT ?', 'http://localhost:8080/importer/blog/1661857460_f201520327028a927af3.png', 'Est il à la hauteur ?', 0, 1049, 'actif', '2022-08-30');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idComment` int(11) NOT NULL,
  `message` text NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idBlog` int(11) NOT NULL,
  `vuReponse` int(11) NOT NULL,
  `commentcreated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `idCompte` int(11) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `idRole` int(11) NOT NULL DEFAULT 1,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `matricule`, `email`, `password`, `statut`, `idRole`, `photo`) VALUES
(1, '19I062IU', 'bsmlancer@gmail.com', '$2y$10$NuNibAWsnTcvvq8j8Cy2xOKFePi0zipbraYYt.Xm0NceznP6eNhba', 'actif', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `dernierdiplome`
--

CREATE TABLE `dernierdiplome` (
  `idDD` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dernierdiplome`
--

INSERT INTO `dernierdiplome` (`idDD`, `nom`) VALUES
(0, 'null'),
(1, 'MSc'),
(2, 'MBA'),
(3, 'PhD'),
(4, 'LICENCE'),
(5, 'DUT'),
(6, 'Ingénieur de conception'),
(7, 'Master professionel');

-- --------------------------------------------------------

--
-- Structure de la table `dut`
--

CREATE TABLE `dut` (
  `idDUT` int(11) NOT NULL,
  `nomDUT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dut`
--

INSERT INTO `dut` (`idDUT`, `nomDUT`) VALUES
(0, 'null'),
(1, 'GIN'),
(2, 'MIP'),
(3, 'GAI'),
(4, 'GEN'),
(5, 'ABB'),
(6, 'IAB'),
(7, 'GEL'),
(8, 'GMP'),
(9, 'GTE');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idE` int(11) NOT NULL,
  `nomE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`idE`, `nomE`) VALUES
(0, 'null'),
(3, 'SODECOTON'),
(4, 'ASECNA'),
(6, 'CAMWATER'),
(11, 'CAMTEL'),
(12, 'TIGO'),
(17, 'AIRTEL'),
(20, 'SOLO');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `banniere` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `vu` int(11) NOT NULL DEFAULT 0,
  `statut` varchar(11) NOT NULL DEFAULT 'inactif',
  `idUsers` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `lieu`, `dateDebut`, `dateFin`, `heureDebut`, `heureFin`, `banniere`, `description`, `vu`, `statut`, `idUsers`, `created_at`) VALUES
(40, 'Soutenance dut sortant', 'universite ngaoundere', '2021-10-05', '2021-10-08', '08:00:00', '17:00:00', 'http://localhost:8080/evenement/1633334280_056b918964dc13cf0002.sql', 'Ponctualités de rigueur ', 1, 'inactif', 1049, '2021-10-04'),
(44, 'ddkbk', 'bkbkbkkb', '2022-09-02', '2022-08-24', '03:11:00', '04:11:00', 'http://localhost:8080/importer/evenement/1661814715_eebbd0f258ce59cbb54a.png', 'efofonoef', 1, 'actif', 1049, '2022-08-30'),
(45, 'ddkbk', 'bkbkbkkb', '2022-09-02', '2022-08-24', '03:11:00', '04:11:00', 'http://localhost:8080/importer/evenement/1661814730_6348b9eeb0ee242a2a64.png', 'efofonoef', 1, 'actif', 1049, '2022-08-30'),
(46, 'dnkdnkd', 'ddndkdn', '2022-08-30', '2022-08-19', '20:55:00', '21:55:00', '/evenement/1661871603_275d4303e8dcee05c6ad.png', 'fjfjfjjff', 1, 'inactif', 1049, '2022-08-30'),
(47, 'ffbjb', 'bjkbjkbb', '2022-08-25', '2022-08-25', '19:02:00', '16:05:00', 'http://localhost:8080/evenement/1661871778_e4221ab658f00d86fef2.png', 'dbkdbkbkd', 0, 'actif', 1049, '2022-08-30');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`idFaq`, `question`, `reponse`, `created_at`, `updated_at`) VALUES
(1, 'Où se trouve le siège de l\'Alumni ', 'Le siège se trouve à Ngaoundéré', '2021-08-17', '2021-08-17'),
(2, 'Que signifie ALUMNI ou alumnius', 'ALUMNI ou encore alumnius signifie ancien', '2021-08-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'inactif',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `photo`, `statut`, `created_at`) VALUES
(240, 'http://localhost:8080/importer/galerie/1661859602_5d81803cf268b1752d43.png', 'inactif', '2022-08-30'),
(241, 'http://localhost:8080/importer/galerie/1661859603_4d6e91a9ec9e8f234c64.png', 'inactif', '2022-08-30');

-- --------------------------------------------------------

--
-- Structure de la table `infosite`
--

CREATE TABLE `infosite` (
  `idInfo` int(11) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `infosite`
--

INSERT INTO `infosite` (`idInfo`, `telephone`, `adresse`, `facebook`, `twitter`, `instagram`, `whatsapp`, `logo`) VALUES
(15, '45 45 45 45', '455 Ngaoundere', '#', '#', '#', '#', 'http://localhost:8080/logo/1661811733_a05309c6d9cdb9116ddb.png');

-- --------------------------------------------------------

--
-- Structure de la table `licence`
--

CREATE TABLE `licence` (
  `idLI` int(11) NOT NULL,
  `nomLI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `licence`
--

INSERT INTO `licence` (`idLI`, `nomLI`) VALUES
(0, 'null'),
(1, 'MIP'),
(2, 'GLO'),
(3, 'RIN'),
(4, 'GAI'),
(5, 'GEN'),
(6, 'ABB'),
(7, 'IAB'),
(8, 'GEL'),
(9, 'GMP'),
(10, 'GTE');

-- --------------------------------------------------------

--
-- Structure de la table `obtentiondut`
--

CREATE TABLE `obtentiondut` (
  `idODUT` int(11) NOT NULL,
  `anneeODUT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `obtentiondut`
--

INSERT INTO `obtentiondut` (`idODUT`, `anneeODUT`) VALUES
(0, 0),
(1, 2021),
(2, 1994),
(3, 1995),
(4, 1996),
(5, 1997),
(6, 1998),
(7, 1999),
(8, 2000),
(9, 2001),
(10, 2002),
(11, 2003),
(12, 2004),
(13, 2005),
(14, 2006),
(15, 2007),
(16, 2008),
(17, 2009),
(18, 2010),
(19, 2011),
(20, 2012),
(21, 2013),
(22, 2014),
(23, 2015),
(24, 2016),
(25, 2017),
(26, 2018),
(27, 2019),
(28, 2020),
(29, 2021),
(31, 1993),
(32, 2021),
(33, 2021),
(34, 2021),
(35, 2021),
(36, 2021),
(37, 2021),
(38, 2021),
(39, 2021),
(40, 2021),
(41, 2021),
(42, 2021),
(43, 2021),
(44, 2021),
(45, 2021),
(46, 2021),
(47, 2021),
(48, 2021),
(49, 2021),
(50, 2021),
(51, 2022),
(52, 2021),
(53, 2021),
(54, 2021),
(55, 2021),
(56, 2021),
(57, 2021),
(58, 2021),
(59, 2021),
(60, 2021),
(61, 2021),
(62, 2021),
(63, 2021),
(64, 2021),
(65, 2021),
(66, 2021),
(67, 2021),
(68, 2021),
(69, 2021),
(70, 2021),
(71, 2021),
(72, 2021),
(73, 2021),
(74, 2021),
(75, 2021),
(76, 2021),
(77, 2021),
(78, 2021),
(79, 2021),
(80, 2021),
(81, 2021),
(82, 2021),
(83, 2021),
(84, 2021),
(85, 2021),
(86, 2021),
(87, 2021),
(88, 2021),
(89, 2021),
(90, 2021);

-- --------------------------------------------------------

--
-- Structure de la table `obtentionlicence`
--

CREATE TABLE `obtentionlicence` (
  `idOL` int(11) NOT NULL,
  `anneeOL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `obtentionlicence`
--

INSERT INTO `obtentionlicence` (`idOL`, `anneeOL`) VALUES
(0, 0),
(1, 0),
(2, 2010),
(3, 2011),
(4, 2012),
(5, 2013),
(6, 2014),
(7, 2015),
(8, 2016),
(9, 2017),
(10, 2018),
(11, 2019),
(12, 2020),
(13, 2021),
(15, 2009),
(16, 2022);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `nomEntreprise` varchar(255) NOT NULL,
  `adresseEntreprise` varchar(255) NOT NULL,
  `emailEntreprise` varchar(255) NOT NULL,
  `telephoneEntreprise` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `salaire` varchar(255) NOT NULL,
  `exigence` varchar(255) NOT NULL,
  `attache` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `vu` int(11) NOT NULL DEFAULT 0,
  `statut` varchar(225) NOT NULL DEFAULT 'inactif',
  `idUsers` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`idOffre`, `titre`, `nomEntreprise`, `adresseEntreprise`, `emailEntreprise`, `telephoneEntreprise`, `description`, `salaire`, `exigence`, `attache`, `lien`, `dateDebut`, `dateFin`, `vu`, `statut`, `idUsers`, `created_at`) VALUES
(68, 'Récherche d\'un développeur fullstack, mobile pour le projet STARLING', 'STARLING SA', 'STARLING BP NEWYORK AVENUE', 'mdd@xn--dddjd-gsa.djd', '45555555555555', 'Les bons sont laissés au profit des excellents ', '10000', 'Être hautement qualifié', 'jgjgj', '', '2021-10-26', '2021-10-19', 1, 'actif', 1049, '2021-10-01'),
(69, 'Emploi', 'Secada', '', 'secada@gmail.com', '655229797', 'Avoir au moins 02 ans d\'expérience ', '300000', 'Avoir un BAC 03 ans', '', '', '2021-09-22', '2021-12-23', 1, 'actif', 1049, '2021-10-04'),
(70, 'EMPLOI', 'SODOCOTON', 'BP 345', 'secada@gmail.com', '68900000000', 'Ponctualité', '200000000', 'Avoir un BAC 03 ans', '', '', '2021-10-07', '2021-10-09', 1, 'actif', 1049, '2021-10-07'),
(72, 'concepteur et développeur web', 'Secada', 'BP 345', 'secada@gmail.com', '978655423', 'FACILITER', '6789900', 'Avoir un BAC 03 ans', '', '', '2021-10-08', '2021-10-22', 1, 'actif', 1049, '2021-10-08'),
(73, 'Amazon Recrutement', 'Amazon', '455, Ngaoundéré, Cameroun', '', '697140690', 'nkfnkfbkf', '', '', '', '', '2022-08-29', '2022-08-30', 1, 'actif', 1049, '2022-08-29'),
(74, 'kvnvnknknNKNNKK', 'Nnknknkn', '', '', '', 'rvkvbkv', '', '', '', '', '2022-08-27', '2022-08-22', 1, 'actif', 1049, '2022-08-30');

-- --------------------------------------------------------

--
-- Structure de la table `promotiondut`
--

CREATE TABLE `promotiondut` (
  `idPDUT` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `promotiondut`
--

INSERT INTO `promotiondut` (`idPDUT`, `annee`, `numero`) VALUES
(0, 0, 0),
(147, 1993, 0),
(148, 1994, 0),
(149, 1995, 0),
(150, 1996, 0),
(151, 1997, 0),
(152, 1998, 0),
(153, 1999, 0),
(154, 2000, 0),
(155, 2001, 0),
(156, 2002, 0),
(157, 2003, 0),
(158, 2004, 0),
(159, 2005, 0),
(160, 2006, 0),
(161, 2007, 0),
(162, 2008, 0),
(163, 2009, 0),
(164, 2010, 0),
(165, 2011, 0),
(166, 2012, 0),
(167, 2013, 0),
(168, 2014, 0),
(169, 2015, 0),
(170, 2016, 0),
(171, 2017, 0),
(172, 2018, 0),
(173, 2019, 0),
(174, 2020, 0),
(176, 2021, 0),
(177, 2022, 0);

-- --------------------------------------------------------

--
-- Structure de la table `promotionlicence`
--

CREATE TABLE `promotionlicence` (
  `idPLI` int(11) NOT NULL,
  `anneePL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `promotionlicence`
--

INSERT INTO `promotionlicence` (`idPLI`, `anneePL`) VALUES
(0, 0),
(1, 2009),
(2, 2010),
(4, 2011),
(5, 2012),
(6, 2013),
(7, 2014),
(8, 2015),
(9, 2016),
(10, 2017),
(11, 2018),
(12, 2019),
(13, 2020),
(14, 2021),
(15, 2022);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idReponse` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `idComment` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `nomRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `nomRole`) VALUES
(1, 'alumni'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

CREATE TABLE `rubrique` (
  `id` int(11) NOT NULL,
  `titre1` varchar(255) NOT NULL,
  `description1` text NOT NULL,
  `titre2` varchar(255) NOT NULL,
  `description2` text NOT NULL,
  `titre3` varchar(255) NOT NULL,
  `description3` text NOT NULL,
  `titre4` varchar(255) NOT NULL,
  `description4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rubrique`
--

INSERT INTO `rubrique` (`id`, `titre1`, `description1`, `titre2`, `description2`, `titre3`, `description3`, `titre4`, `description4`) VALUES
(1, 'Objectifs', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem ', 'Activités', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem ', 'Mode daccès', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem kk', 'Action', 'Lorem ');

-- --------------------------------------------------------

--
-- Structure de la table `situation`
--

CREATE TABLE `situation` (
  `idS` int(11) NOT NULL,
  `nomS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `situation`
--

INSERT INTO `situation` (`idS`, `nomS`) VALUES
(0, 'null'),
(1, 'Etudiant'),
(2, 'Chercheur d\'emploi'),
(3, 'Service gouvernemental'),
(4, 'Service privé'),
(5, 'Employé'),
(6, 'Homme d\'affaires'),
(7, 'Employeur'),
(8, 'Enseignant'),
(9, 'Docteur'),
(10, 'Ingénieur'),
(11, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `idSlider` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `textGras1` varchar(255) NOT NULL,
  `textNormal1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `textGras2` varchar(255) NOT NULL,
  `textNormal2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `textGras3` varchar(255) NOT NULL,
  `textNormal3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`idSlider`, `image1`, `textGras1`, `textNormal1`, `image2`, `textGras2`, `textNormal2`, `image3`, `textGras3`, `textNormal3`) VALUES
(1, 'http://localhost:8080/slider/1629234223_8a65561b34861647cbfb.png', 'Association des anciens étudiants de l&#39;IUT', 'Alumni IUT', 'http://localhost:8080/slider/1629234223_c06ce6c30e72ad7ff0d1.jpg', 'Institut Universitaire de Technologie', 'Formation', 'http://localhost:8080/slider/1629234223_1a86db988a3b034c1214.jpg', 'Une famille', 'Ensemble');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `course`, `created_at`) VALUES
(1, 'dkhk', 'hkhk', 'hkhk', 'hkhk', '2021-07-31 18:13:05'),
(2, 'dhkh', 'hkhk', 'hhk', 'hhk', '2021-07-31 18:20:12'),
(3, 'jlj', 'jljl', 'jljl', 'jljl', '2021-07-31 18:25:43'),
(4, 'dkhk', 'hkhkh', 'khkhkhk', 'hkhkh', '2021-07-31 18:28:51'),
(5, 'djj', 'jljldjl', 'jljdljlm', 'jmljlmjmd', '2021-07-31 18:30:08'),
(6, 'ljj', 'jljl', 'jljl', 'jljlj', '2021-08-01 02:59:54');

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE `suivre` (
  `idSuivre` int(11) NOT NULL,
  `idMem` int(11) NOT NULL,
  `idAbon` int(11) NOT NULL,
  `vuSuivre` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `suivre`
--

INSERT INTO `suivre` (`idSuivre`, `idMem`, `idAbon`, `vuSuivre`, `created_at`) VALUES
(51, 57, 59, 1, '2021-09-13'),
(52, 57, 58, 1, '2021-09-13'),
(53, 4, 60, 0, '2021-09-24'),
(54, 5518, 1049, 0, '2021-10-02'),
(55, 1049, 5989, 1, '2022-08-30'),
(56, 5989, 1049, 1, '2022-08-30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL DEFAULT 'male',
  `dateNaiss` date DEFAULT current_timestamp(),
  `lieuNaiss` varchar(255) DEFAULT NULL,
  `dut` int(11) DEFAULT 0,
  `promotionDUT` int(11) DEFAULT 0,
  `licence` int(11) DEFAULT 0,
  `promotionLicence` int(11) DEFAULT 0,
  `obtentionDUT` int(11) NOT NULL DEFAULT 1,
  `obtentionLicence` int(11) NOT NULL DEFAULT 1,
  `situation` int(11) DEFAULT 0,
  `dernierDiplome` varchar(255) NOT NULL,
  `entreprise` varchar(255) DEFAULT '0',
  `poste` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `objectif` text NOT NULL,
  `apporter` text DEFAULT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedln` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `attente` text DEFAULT NULL,
  `vu` int(9) UNSIGNED NOT NULL DEFAULT 1,
  `statut` varchar(255) NOT NULL DEFAULT 'inactif',
  `idRole` int(9) UNSIGNED NOT NULL DEFAULT 1,
  `photo` varchar(255) DEFAULT '0',
  `vuTel` int(11) NOT NULL DEFAULT 0,
  `vuDn` int(11) NOT NULL DEFAULT 0,
  `uniid` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `nom`, `prenom`, `genre`, `dateNaiss`, `lieuNaiss`, `dut`, `promotionDUT`, `licence`, `promotionLicence`, `obtentionDUT`, `obtentionLicence`, `situation`, `dernierDiplome`, `entreprise`, `poste`, `adresse`, `telephone`, `ville`, `email`, `password`, `objectif`, `apporter`, `facebook`, `twitter`, `linkedln`, `instagram`, `cv`, `attente`, `vu`, `statut`, `idRole`, `photo`, `vuTel`, `vuDn`, `uniid`, `created_at`) VALUES
(1049, 'FAOUZIA  AMINOU', 'jj', 'Femme', '1996-02-29', 'kk', 2, 173, 9, 13, 1, 1, 1, '', '11', NULL, 'DJAAFAR@gmail.com', '697140690', NULL, 'aminoufaouzia0@gmail.com', '$2y$10$PdZ4uMOidg3JfTnQk5u5FOLOmBihCe6QqJ2/dzP8H4AmfoMs/pOtS', '', NULL, 'dsds', 'sdsd', 'ssdds', '', 'http://localhost:8080/importer/cv/1661870136_1b5670d293c0aeec08e5.pdf', NULL, 1, 'actif', 2, 'http://localhost:8080/importer/profiles/1661867894_3c134759e0f6a2606f00.png', 1, 1, '', '2021-09-28 21:24:47'),
(5746, 'FTATSI MBETMI', 'Guy-de-patience', 'Homme', '0000-00-00', 'Ngaoundéré', 2, 0, 0, 0, 12, 0, 5, 'PhD', '0', 'Enseignant-chercheur', NULL, '675520567', NULL, 'fimigype@gmail.com', '', '', 'Mon expertise, mon temps et autres', '', '', '', '', '', 'Que ce réseau favorise l\'insertion professionnelle des diplômés de l\'IUT et assiste l\'école dans sa quête de notoriété.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5747, 'MBONSE SAH ', 'Vincent ', 'Homme', '0000-00-00', 'Bafoussam ', 2, 0, 1, 0, 24, 9, 1, 'LICENCE', '0', NULL, NULL, '699963405', NULL, 'mbonse_vincent@yahoo.fr', '', '', NULL, '', '', '', '', '', 'La valorisation de l\'IUT ngaoundere et la sociabilité entres anciens étudiants ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5748, 'MANGUILA BOUAYI', 'IVAN', 'Homme', '0000-00-00', 'Douala', 2, 0, 1, 0, 20, 5, 5, 'LICENCE', '0', 'Technicien', NULL, '696153850', NULL, 'maniguis_ivan@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5749, 'NUNLA', 'Pierrot', 'Homme', '0000-00-00', 'Yaoundé', 0, 0, 1, 0, 25, 10, 5, 'LICENCE', '0', 'Conducteur de Projet', NULL, '694184872', NULL, '1991pierrot@gmail.com', '', '', 'Mon expérience', '', '', '', '', '', 'Interechanges entre les anciens et nouveaux étudiants,  d\'autre part entre étudiants et enseignants.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5750, 'BATOURI MAIDADI', 'Innocent Emmanuel', 'Homme', '0000-00-00', 'Ngaoundéré', 1, 0, 2, 0, 25, 10, 1, 'LICENCE', '0', NULL, NULL, '695956707', NULL, 'batourimaidadi@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5751, 'NANA MBANGUEU', 'Franck Hervé', 'Homme', '0000-00-00', 'Douala', 7, 0, 0, 0, 21, 0, 5, 'Ingénieur', '0', 'Ingénieur Chargé d\'étude', NULL, '694488631', NULL, 'nanambangueu@yahoo.fr', '', '', 'Les opportunités d\'emplois', '', '', '', '', '', 'Mise sur pied d\'un réseau pour faciliter l\'insertion professionnel des alumin', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5752, 'HAYATA MANASTAD', 'Martin', 'Homme', '0000-00-00', 'Maroua', 6, 0, 0, 0, 21, 0, 5, 'Diplome ingénieur', '0', 'In Process Controller', NULL, '694911622', NULL, 'hayatamartin@yahoo.fr', '', '', 'Offre d\'emploi, conseil, orientation, suggestion\' a l\'améliora de la formation, stage etc ', '', '', '', '', '', 'Facilité l\'accès a l\'emploi des jeunes sortant de l\'IUT, orienter ces jeunes, créer un synergie entre l\'IUT et les entreprise où travail les anciens de l\'IUT. Tenir compte la contribution des anciens quand à l\'amélioration de la formation a l\'IUT', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5753, 'MPIT', 'Fernand Babyon', 'Homme', '0000-00-00', 'Yaounde', 2, 0, 0, 0, 12, 0, 5, 'Diplome d\'Ingénieur ', '0', 'Chef Service de l\'Eau', NULL, '699220081', NULL, 'mpitbaby@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5754, 'ZOURRIYAH ', 'ADAMOU MANA', 'Femme', '0000-00-00', 'Garoua', 5, 0, 0, 0, 21, 0, 5, 'Ingenieurie', '0', NULL, NULL, '696654295', NULL, 'zourriyahadamoumana@gmail.com', '', '', 'Ma présence et mon expertise mais surtout l\'esprit conviviale', '', '', '', '', '', 'Quelle soit constructive mais surtout qu\'elle permet d\'avoir les informations sur les anciens de l\'IUT pour qu\'ensemble nous puissions redoré l\'image de notre ecole', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5755, 'Aboubakar', 'Ilyassa', 'Homme', '0000-00-00', 'Mbang-foulbe', 2, 0, 1, 0, 25, 10, 2, 'LICENCE', '0', NULL, NULL, '+237 697685208', NULL, 'aboubakarilyassa95@gmail.com', '', '', 'Toujours mettre à la disposition du groupe des informations nécessaire dont je disposerais ', '', '', '', '', '', 'Éduquer, informer sur les recherches technologies et emploi', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5756, 'WASSOUO', 'Cyrille Armand', 'Homme', '0000-00-00', 'Garoua', 4, 0, 0, 0, 19, 0, 2, 'Master Professionnel', '0', NULL, NULL, '677926435', NULL, 'cyrillewass@yahoo.fr', '', '', 'Expertise sur le plan environnemental et social.', '', '', '', '', '', 'Informations concernant le domaine environnemental (séminaires, webinaires, bourses, opportunités, etc.)', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5757, 'AOUITA GUETSOP', NULL, 'Homme', '0000-00-00', 'Fonjumataw', 9, 0, 0, 0, 18, 0, 5, 'MSc', '0', 'Chef service', NULL, '661000107', NULL, 'aouitaguetsop@gmail.com', '', '', 'Experience en gestion des projets', '', '', '', '', '', 'Mise sur pied des projets', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5758, 'KOPHIO', 'Francine Carine', 'Femme', '0000-00-00', 'Edea', 4, 0, 0, 0, 21, 0, 5, 'MSc', '0', 'Ingénieur process', NULL, '695662766', NULL, 'kofranca8808@gmail.com', '', '', 'Probablement des stages et des opportunités d\'emploi pour l\'école et le reste des membres du groupe', '', '', '', '', '', 'Qui soit vraiment un bon réseau pour les anciens de l\'IUT', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5759, 'Ngrongbalé', 'Marius Elvis', 'Homme', '0000-00-00', 'Garoua boulai', 2, 0, 1, 0, 24, 9, 5, 'LICENCE', '0', 'Gestionneur de stock', NULL, '674148577 pjg', NULL, 'ngrongbale.marius@yahoo.fr', '', '', 'Les conseils', '', '', '', '', '', 'Partage des informations', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5760, 'YAMSEH NGANJO', 'ODETTE', 'Femme', '0000-00-00', 'NDOUNGUE-NKONGSAMBA', 3, 0, 0, 0, 11, 0, 5, 'MSc', '0', 'Responsable Qualité', NULL, '697178855', NULL, 'ynoddy2000@yahoo.co.uk', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5761, 'Beyala ', 'Didier ', 'Homme', '0000-00-00', 'Yaoundé ', 2, 0, 0, 0, 16, 0, 2, 'MSc', '0', NULL, NULL, '237675218932', NULL, 'beyala.ed@gmail.com', '', '', 'Conseils et offres d\'emplois ', '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5762, 'Abega messina', 'Denis', 'Homme', '0000-00-00', 'Yaoundé', 9, 0, 10, 0, 21, 6, 5, 'LICENCE', '0', 'Operateur', NULL, '694599514', NULL, 'denis.abega@globeleq.cm', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5763, 'IBRAHIM ABDOULAYE', NULL, 'Homme', '0000-00-00', 'Palar Maroua', 2, 0, 1, 0, 0, 10, 1, 'LICENCE', '0', NULL, NULL, '695294872', NULL, 'abdoulayeibson93@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5764, 'Mbezele onana', 'Joel Rolin', 'Homme', '0000-00-00', 'Ngoulemakong', 7, 0, 8, 0, 26, 11, 2, 'LICENCE', '0', NULL, NULL, '699393291', NULL, 'joelonanambezele@gmail.com', '', '', 'Mon savoir-faire', '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5765, 'Abdoul Aziz', 'Hamayadji', 'Homme', '0000-00-00', NULL, 1, 0, 2, 0, 23, 8, 2, 'MSc', '0', NULL, NULL, '697969283', NULL, 'abdoulazizhamayadji95@gmail.com', '', '', 'tout ce dont je suis capable. ', '', '', '', '', '', 'avoir un job, avoir une bourse pour continuer en PhD ou doctorat', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5766, 'PAWO NGNINTEDEM', 'Etienne Ariol', 'Homme', '0000-00-00', NULL, 2, 0, 0, 0, 21, 0, 5, 'MSc', '0', 'Ingenieur chargé des études électriques assistant', NULL, '694317502', NULL, 'pawoariol24@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5767, 'EBONGUE MIANO', 'Olivier Yvan', 'Homme', '0000-00-00', 'Douala', 7, 0, 0, 0, 25, 0, 1, 'DUT', '0', 'Etudiant', NULL, '655532267', NULL, 'ebongueolivier@gmail.com', '', '', '- informations sur les différentes entreprises dans lesquelles j\'ai eu à faire un stage ;\nAutres', '', '', '', '', '', '- conseils emanant des anciens ayant déjà une expérience professionnelle;', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5768, 'Danzabé Hounané', 'Donatien', 'Homme', '0000-00-00', 'Maroua', 7, 0, 8, 0, 21, 6, 2, 'Diplôme d\'Ingénieur de  Conception', '0', 'Etudiant', NULL, '696289661', NULL, 'ddanzab@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5769, 'EBODE', 'DIEUDONNÉ CÉDRIC', 'Homme', '0000-00-00', 'Yaoundé', 9, 0, 10, 0, 25, 10, 1, 'LICENCE', '0', 'Étudiant', NULL, '694671880', NULL, 'cedricebode@gmail.com', '', '', 'Mon expérience', '', '', '', '', '', 'La communication', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5770, 'LOYAKBA  YANENBO ', 'Peleg ', 'Homme', '0000-00-00', 'Garoua ', 1, 0, 3, 0, 24, 9, 1, 'LICENCE', '0', 'Étudiant ', NULL, '699793109', NULL, 'pelegloyakba@gmail.com', '', '', 'Mon aide si je peux bien sur je n\'hésiterai pas ', '', '', '', '', '', 'S\'entraider dans tout les domaine ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5771, 'Nkeng', 'Adonis junior', 'Homme', '0000-00-00', 'Fomopea', 1, 0, 2, 0, 25, 10, 1, 'LICENCE', '0', NULL, NULL, '691543585', NULL, 'adonisnkeng@gmail.com', '', '', 'What will ne needed', '', '', '', '', '', 'A good collaboration within us', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5772, 'Zoo', 'Fils Davy', 'Homme', '0000-00-00', 'Nkoumekeke', 2, 0, 1, 0, 26, 11, 2, 'LICENCE', '0', NULL, NULL, '695170637', NULL, 'dzoofils@gmail.com', '', '', 'Un plus', '', '', '', '', '', 'Mes attentes nombreuses ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5773, 'DJOMO Namegni', 'Arnold Constant', 'Homme', '0000-00-00', 'Limbe', 1, 0, 2, 0, 20, 5, 1, 'MSc', '0', NULL, NULL, '+4917634595973', NULL, 'constantdjomo@gmail.com', '', '', 'Savoir faire et opportunités d\'affaire', '', '', '', '', '', 'Retrouver les amis et autres....', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5774, 'Ndjanmo Kezembo ', 'Raïssa ', 'Femme', '0000-00-00', 'Bertoua ', 6, 0, 7, 0, 25, 10, 2, 'LICENCE', '0', NULL, NULL, '693519160', NULL, 'raissandjanmo3@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5775, 'BELLA ENYEGUE', 'Odile Charlotte', 'Femme', '0000-00-00', 'EDZEN (SA\'A)', 4, 0, 0, 0, 18, 0, 2, 'Diplôme d\'Ingénieur', '0', NULL, NULL, '00 237 697 04 94 01/00 237 678 32 51 61', NULL, 'bellaenyegueodile@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5776, 'Abdouraman Yaya', NULL, 'Homme', '0000-00-00', 'Guidiguis', 2, 0, 1, 0, 25, 10, 1, 'LICENCE', '0', NULL, NULL, '693499040', NULL, 'zokemassou@gmail.com', '', '', 'collaboration avec tous les autres membres', '', '', '', '', '', 'Facilité la communication', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5777, 'BABA SOULEY', 'HAMIDOU', 'Homme', '0000-00-00', 'GAROUA', 1, 0, 2, 0, 25, 10, 2, 'LICENCE', '0', NULL, NULL, '+237698875499', NULL, 'hamidou2016.bs@gmail.com', '', '', 'Mon Ingeniositer', '', '', '', '', '', 'Partage des Informations', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5778, 'Danwe ', 'Olivier Prosper ', 'Homme', '0000-00-00', 'Kaele', 9, 0, 10, 0, 25, 10, 1, 'LICENCE', '0', 'Étudiant', NULL, '693494801', NULL, 'olivierdanwe@gmail.com', '', '', 'Des conseils d\'expertise dans le domaine thermique à la limite de mes connaissances. ', '', '', '', '', '', 'Apporter de l\'aide des conseils et aides pour une bonne insertion en milieu professionnel ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5779, 'Kinfack Nanfack', 'Dimitri Vithan', 'Homme', '0000-00-00', 'Douala', 2, 0, 0, 0, 25, 0, 1, 'LICENCE', '0', 'Élève-Ingenieur', NULL, '698331408', NULL, 'kinfackdimitri@hotmail.com', '', '', 'Mettre mes connaissances acquises aucours de ma formation au service de groupe ', '', '', '', '', '', 'Avoir des opportunités d’échange et de coopération avec les anciens de l’IUT de Ngaoundéré', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5780, 'KUIGWA ', 'Williams Kessel ', 'Homme', '0000-00-00', 'Douala ', 2, 0, 0, 0, 23, 0, 2, 'Diplôme d\'ingénieur ', '0', NULL, NULL, '691216698', NULL, 'kuigwa.kessel98@gmail.com', '', '', 'Pour un début, une orientation académique. Aussi le partage des connaissances et offres d\'emploi ', '', '', '', '', '', 'La mise d\'un lobbing qui permettra la promotion de l\'iut de Ngaoundere, ceci par la facilité d\'insertion des étudiants stagiaires et finissants. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5781, 'ADJOMO', 'ROBERT BERTRAND', 'Homme', '0000-00-00', 'EFOULAN', 1, 0, 0, 0, 24, 0, 5, 'DUT', '0', 'Administrateur Reseaux et Système', NULL, '650650012', NULL, 'rbadjomo@gmail.com', '', '', 'Mon expertise', '', '', '', '', '', 'Être professionnel', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5782, 'ISMAÏLA ', 'Moubarak ', 'Homme', '0000-00-00', 'Ngaoundéré ', 2, 0, 0, 0, 23, 0, 2, 'Ingénieur ', '0', NULL, NULL, '694757069', NULL, 'moubarakislo@yahoo.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5783, 'KAMDOP FOTSO', 'william Donald', 'Homme', '0000-00-00', 'Batoufam', 2, 0, 9, 0, 23, 8, 2, 'Master 2', '0', 'Pas de poste', NULL, '655378789', NULL, 'williamdonald.kamdopfotso@yahoo.fr', '', '', 'Ma petite contribution en ce qui concerne les projets, la création d\'emplois ', '', '', '', '', '', 'Les échanges d\'informations surtout en ce qui concerne les offre d\'emploi et autres ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5784, 'Nguimfack', 'Jean Joseph ', 'Homme', '0000-00-00', 'Ngaoundere ', 1, 0, 3, 0, 19, 4, 7, 'LICENCE', '0', 'CEO', NULL, '695527576', NULL, 'dav.temfack@gmail.com', '', '', 'Des solutions pour la sécurité électronique et entrepreunariat ', '', '', '', '', '', 'Proposition des projets pour le développement ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5785, 'NDOZENG', 'Théodore Le Grang', 'Homme', '0000-00-00', 'Garoua-Boulaï', 9, 0, 10, 0, 25, 10, 1, 'LICENCE', '0', NULL, NULL, '+237693370399', NULL, 'ndozengtheodorelegrang@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5786, 'MOHAMADOU ', 'ISSA', 'Homme', '0000-00-00', 'Garoua ', 7, 0, 8, 0, 25, 10, 1, 'LICENCE', '0', '3ème année génie électrique ', NULL, '694563384', NULL, 'mohamadouissa24@yahoo.com', '', '', 'Ma réflexion aux problèmes posés ', '', '', '', '', '', 'Promouvoir image de Iut afin de faciliter intégrité de ses étudiants au sein des entreprises ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5787, 'BALLA MBENG', 'FABRICE MARTIAL', 'Homme', '0000-00-00', 'MEGNANGOUA', 2, 0, 0, 0, 17, 0, 5, 'INGENIEUR', '0', 'PROJECT MANAGER', NULL, '237696705886', NULL, 'pepsyballa@yahoo.fr', '', '', 'mon experience et ma disponibilité', '', '', '', '', '', 'un veritable reseua d\'ancien dans le sens propre du terme', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5788, 'ABDOULLAHI IBN', 'MOHAMMAD SAMBO', 'Homme', '0000-00-00', 'Ngaoundere', 9, 0, 10, 0, 24, 9, 2, 'Master professionnel ', '0', 'Étudiant', NULL, '677857022', NULL, 'abdoullahiibn@gmail.com', '', '', 'Un changement positif de toute nature qu\'elle soit', '', '', '', '', '', 'D\'être informé de toutes les informations nécessaires', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5789, 'Fokou', 'Eric Mervio ', 'Homme', '0000-00-00', 'Mbouda', 2, 0, 0, 0, 21, 0, 5, 'MBA', '0', 'ATP Completion engineer ', NULL, '+237 679364388 / 696237577', NULL, 'fmervio@gmail.com', '', '', 'I interterest in mentoring and discussing exchange forum with students, give motivation and professional live tips at Graduation ceremony or any event. Contribute build it other Alumni a strong network. ', '', '', '', '', '', 'At great and objectif colaboration to help the future gratuate as well as an effective exchange platform for us the Alumni. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5790, 'Ousseina', 'Yaya', 'Femme', '0000-00-00', 'Bertoua', 9, 0, 10, 0, 24, 9, 1, 'LICENCE', '0', 'Étudiante en Master 2 professionnel Maint-GEFT', NULL, '655534008', NULL, 'ousseina.yayamoussa@gmail.com', '', '', 'Mon expertise en matières de froid', '', '', '', '', '', 'La fiabilité et la prise en considération', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5791, 'AISSATOU', 'FARIKOU', 'Femme', '0000-00-00', 'Ngaoundéré', 5, 0, 0, 0, 25, 0, 1, 'Bac \"D\"', '0', 'Eléve Ingénieur', NULL, '6906580579', NULL, 'farikoukapoor2307@gmail.com', '', '', 'Conseil ,autres...', '', '', '', '', '', 'Esprit d\'equipe et de partage', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5792, 'Abdoul-Aziz ', 'Mohamed Moustapha ', 'Homme', '0000-00-00', 'Ngaoundere ', 4, 0, 0, 0, 24, 0, 1, 'DUT', '0', NULL, NULL, '696199407', NULL, 'aziz2433@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5793, 'Oumarou', 'Saabo', 'Homme', '0000-00-00', 'Meiganga', 2, 0, 1, 0, 24, 9, 1, 'LICENCE', '0', NULL, NULL, '696979973', NULL, 'saabo.oumar@gmail.com', '', '', 'Des informations et contributions active possible', '', '', '', '', '', 'Des offres et annonces d\'emploi', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5794, 'Abanda', 'Kenedy Nsanyu', 'Homme', '0000-00-00', 'Ngaoundere', 5, 0, 6, 0, 21, 6, 5, 'LICENCE', '0', 'N/A', NULL, '+971589340930', NULL, 'lilweezy59@yahoo.com', '', '', 'ma petite experience acquise ici, et la partager avec d\'autres personnes qui aimerait gagner un peu plus', '', '', '', '', '', 'pouvoir discuter avec les anciens de l\'ecole, echanger sur d\'autres questions', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5795, 'MOULIOM LINDOU', 'Mohamed', 'Homme', '0000-00-00', 'FOUMBAN', 9, 0, 10, 0, 23, 8, 2, 'LICENCE', '0', 'RAS', NULL, '699049525', NULL, 'mohamedlindou@gmail.com', '', '', 'Tout ce qui soit à mon pouvoir à commencer par ma disponibilité sans condition aucune...', '', '', '', '', '', 'Que ce soit une plate forme d\'échange, de partage, de débats constructif et de conception de projets devant contribuer à la création des emplois, au développement de l\'initiative privée et au développement du pays.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5796, 'DIBENGUE DIBENGUE', 'JACQUES FLORENTIN', 'Homme', '0000-00-00', 'Kribi', 6, 0, 0, 0, 24, 0, 1, 'Diplômes d\'ingénieur en IAA', '0', NULL, NULL, '690214281', NULL, 'djacquesflorentin@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5797, 'Tchiaga', 'Fred', 'Homme', '0000-00-00', 'Banka-Bafang ', 1, 0, 0, 0, 26, 0, 1, 'LICENCE', '0', NULL, NULL, '690208031', NULL, 'ftchiaga@gmail.com', '', '', 'Des nouvelles idées ', '', '', '', '', '', 'Maximum d\'informations, sur de divers domaines, projets informatiques, I-TECH, emploi, stages ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5798, 'TSASSE FOTIO', 'Carin', 'Homme', '0000-00-00', 'BATCHAM', 0, 0, 2, 0, 0, 10, 1, 'LICENCE', '0', NULL, NULL, '697223656', NULL, 'tfcarin02@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5799, 'SELLE ', 'Pierre Alberto Duclaux', 'Homme', '0000-00-00', 'Yaoundé', 9, 0, 0, 0, 16, 0, 5, 'MBA', '0', 'Directeur Technique', NULL, '694071667', NULL, 'albertoselle@gmail.com', '', '', NULL, '', '', '', '', '', 'Echanges, dynamisme, convivialité', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5800, 'PIAPDJE TAMO', 'Marius Ulrich', 'Homme', '0000-00-00', 'Ngaoundere', 9, 0, 0, 0, 18, 0, 5, 'MSc', '0', 'Stagiaire', NULL, '08080469674', NULL, 'piapdjeulrich@gmail.com', '', '', 'Des liens avec des entreprises ou universités Japonaise pour les affaires ou les recherches:', '', '', '', '', '', 'Pouvoir entrer en contact avec ceux qui sont ou veulent investir dans le domain des énergies renouvelables.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5801, 'Abena Gabriel', ' Brice', 'Homme', '0000-00-00', 'Mbalmayo', 9, 0, 10, 0, 22, 7, 2, 'MSc', '0', 'Doctorant à l\'ENSAI et moniteur à L\'IUT de ngaoundéré', NULL, '693740500', NULL, 'abenagabriel86@gmail.com', '', '', 'Mieux participer a l\'amélioration des études dans nos écoles de formations. ', '', '', '', '', '', 'Une collaboration avec mes grand frères, petit frères et camarade de promotion et si possible avec votre aide trouver un  emploi. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5802, 'evina djadji ', 'Stéphane Nathan ', 'Homme', '0000-00-00', 'batouri ', 2, 0, 1, 0, 24, 9, 2, 'Ingénieur', '0', NULL, NULL, '674953969', NULL, 'evinadjadji@yahoo.fr', '', '', 'Je peux apporter de l\'aide et des informations dans mon domaine de compétence (maintenance industrielle et productique )', '', '', '', '', '', 'Échanges et informations professionnelles ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5803, 'MBA KUEDEFFO ', 'Bertin', 'Homme', '0000-00-00', 'bonaberi-douala', 1, 0, 2, 0, 21, 6, 5, 'MSc', '0', 'Informaticien', NULL, '695393978', NULL, 'bertinmba@gmail.com', '', '', NULL, '', '', '', '', '', 'collaboration, partage', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5804, 'FOTSA TCHOUAZONG ', 'Harold Damasse', 'Homme', '0000-00-00', 'Penka-michel', 2, 0, 9, 0, 25, 10, 1, 'LICENCE', '0', NULL, NULL, '691615461/653254976', NULL, 'damasseharold31@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5805, 'YAOUBA', 'Houreï', 'Homme', '0000-00-00', 'Garoua', 7, 0, 0, 0, 25, 0, 2, 'DUT', '0', NULL, NULL, '(237)691091086', NULL, 'yaoubahourei1@gmail.com', '', '', 'De l\'aide', '', '', '', '', '', 'Le travail', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5806, 'MBOUMDA TIOGANG', 'ALAIN CEDRIC', 'Homme', '0000-00-00', 'BATOUFAM', 9, 0, 0, 0, 21, 0, 5, 'ENGINEER', '0', 'Planning, Basic Design Details & Maintenance Engineer', NULL, '670217108', NULL, 'tiogangalain@yahoo.com', '', '', 'Ma disponibilité', '', '', '', '', '', 'Orientation et Amélioration de la qualité de la formation et d’intégration de nos cadets', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5807, 'SEHOU', 'ABDOULKADIRI ', 'Homme', '0000-00-00', 'Ngaoundere ', 7, 0, 8, 0, 24, 9, 2, 'Master professionnel ', '0', 'Étudiant', NULL, '699474480', NULL, 'abdoulkadirsehou70@gmail.com', '', '', 'Confiance ', '', '', '', '', '', 'Emploi ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5808, 'Aminou', 'Mamoudou', 'Homme', '0000-00-00', 'Djarengol kodek', 6, 0, 0, 0, 25, 0, 1, 'DUT', '0', NULL, NULL, '697813759', NULL, 'amnmamoud@gmail.com', '', '', 'participation active à toutes les activités ', '', '', '', '', '', 'aider les jeunes dans l\'insertion professionnelle ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5809, 'HENDOU', 'Joëlle Cathy', 'Femme', '0000-00-00', NULL, 1, 0, 0, 0, 12, 0, 5, 'Ingénieure Réseaux et Systèmes', '0', 'Responsable Informatique', NULL, '696768048', NULL, 'cathyhendou@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5810, 'MBI-EGBE ', 'Amstrong ', 'Homme', '0000-00-00', 'Mbengwi', 6, 0, 7, 0, 0, 3, 5, 'MSc', '0', 'Assiatant Expert Normes et Qualité  N°1 ', NULL, '676050912', NULL, 'm.e.amstrong@gmail.com', '', '', 'Du dévouement dans un premier temps', '', '', '', '', '', 'Association solide avec des objectif précis et une gestion organisé.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5811, 'PAGORE ', 'Jean de Dieu', 'Homme', '0000-00-00', 'Guider ', 9, 0, 0, 0, 14, 0, 5, 'MSc', '0', 'Field service Engineer Electrical & Automation ', NULL, '697752892', NULL, 'pagorej@gmail.com', '', '', 'Soutien schoolaire et professionnel ', '', '', '', '', '', 'Partage ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5812, 'KASSIM', 'Dahirou', 'Homme', '0000-00-00', 'Mbong', 4, 0, 0, 0, 25, 0, 1, 'DUT', '0', NULL, NULL, '699154080', NULL, 'dahiroukassim@gmail.com', '', '', 'Participation a tout les événements qui seront organise par l\'Ecole', '', '', '', '', '', 'Des informations sur les Emplois récentes', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5813, 'demano mbonwo notsa', ' ilker', 'Homme', '0000-00-00', 'bagangté', 6, 0, 0, 0, 22, 0, 2, 'Ingénieur  ', '0', NULL, NULL, '679273023', NULL, 'demanonotsa9@gmail.com', '', '', 'faire parvenir des offres d\'emplois et des renseignements, prêt à toute coopération internationale', '', '', '', '', '', 'être informer des offres d\'emploi et création des synergies entre entrepreneurs', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5814, 'ALIOU', 'Bello', 'Homme', '0000-00-00', 'Mbang-Bouhari', 7, 0, 0, 0, 22, 0, 1, 'MSc', '0', 'Etudiant en Master 2 recherche, spécialité I.E.A. (Informatique-Électronique-Automatique)', NULL, '694868302', NULL, 'bellobia@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5815, 'Etsike Zang', 'Tedson Evrard', 'Homme', '0000-00-00', 'yaounde', 2, 0, 1, 0, 20, 5, 2, 'Master Professionnel ', '0', NULL, NULL, '656133606', NULL, 'tedsonevrard1@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5816, 'Tchamadjeu', 'Joseph', 'Homme', NULL, NULL, 2, 0, 1, 0, 22, 7, 2, 'MSc', '0', NULL, NULL, '698297360', NULL, 'tchamadjeudesire@gmail.com', '', '', NULL, '', '', '', '', '', 'Yaounde', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5817, 'ADAMOU ', 'HAMADOU YAYA', 'Homme', '0000-00-00', 'GAROUA', 2, 0, 0, 0, 22, 0, 1, 'Ingénierie ', '0', 'Étudiant ', NULL, '699554098', NULL, 'adamouhamadouyaya@gmail.com', '', '', 'Partager mes expériences avec les membres du groupe, publier s\'il y\'a les opportunités dans le groupe, ', '', '', '', '', '', 'Nous fournir des informations presque possible sur la vie professionnelle, ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5818, 'Moctar', 'Ibrahima', 'Homme', '0000-00-00', 'Garoua', 1, 0, 3, 0, 25, 10, 1, 'Master', '0', 'Étudiant', NULL, '694081709', NULL, 'moctar_ibrahima@yahoo.fr', '', '', 'Diverses informations', '', '', '', '', '', 'Reste en relation avec la famille de l\'iut', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5819, 'Penaye Lando', 'Cyrille Bertrand', 'Homme', '0000-00-00', 'Garoua', 1, 0, 2, 0, 24, 9, 5, 'LICENCE', '0', 'Développeur junior', NULL, '655669952', NULL, 'penayecyrille@gmail.com', '', '', 'Expertise, innovation, esprit d\'entreprise, soutien et conseils', '', '', '', '', '', 'Elargir mon réseau professionnel ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5820, 'AZOMBO', 'STEVE', 'Homme', '0000-00-00', 'YAOUNDE', 0, 0, 10, 0, 0, 9, 1, 'LICENCE', '0', NULL, NULL, '697008500', NULL, 'staz0834@gmail.com', '', '', 'Mes idéologies', '', '', '', '', '', 'Le partage de la connaissance', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5821, 'Soh', 'Loyick ghislain', 'Homme', '0000-00-00', 'Bansoa', 0, 0, 1, 0, 0, 10, 2, 'LICENCE', '0', NULL, NULL, '693622271', NULL, 'sohcahtoaghislain@yahoo.com', '', '', 'Infos dès que possible pour un emploi, apporter mon aide dès que possible.', '', '', '', '', '', 'Obtenir des informations pour emplois, opportunités de bourses, conseils et accompagnement dans les projets d\'études. Merci', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5822, 'MAIOULOU BISSEY', 'Tanguy', 'Homme', '0000-00-00', 'Douala', 1, 0, 2, 0, 24, 9, 2, 'Master Professionnel 1', '0', NULL, NULL, '698673806', NULL, 'TanguyMB34@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5823, 'DEMGNE', 'Michelle', 'Femme', '0000-00-00', 'Bafoussam', 5, 0, 6, 0, 20, 5, 2, 'MSc', '0', NULL, NULL, '678288757/ 695309934', NULL, 'demgne.michelle@yahoo.fr', '', '', 'Participer à l\'insertion professionnel des autres membres.', '', '', '', '', '', 'contribuera à mon insertion professionnel et à développer mon relationnel.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5824, 'Mpouli Njanga', 'Martin Thierry', 'Homme', NULL, NULL, 1, 0, 0, 0, 13, 0, 7, 'Ingénieur', '0', NULL, NULL, '+22501015224', NULL, 'tmpouli@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5825, 'Tom abakar ', NULL, 'Homme', '0000-00-00', 'Maroua ', 7, 0, 0, 0, 0, 0, 5, 'En cours ', '0', NULL, NULL, '691027207', NULL, 'abakartom@ymail.com', '', '', 'Participer aux préoccupations des autres ', '', '', '', '', '', 'Ce qui pourra nous aider dans notre domaine ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5826, 'Leumbou Tieutcheu ', 'Aris Naguy ', 'Homme', '0000-00-00', 'Edea', 0, 0, 9, 0, 0, 5, 5, 'MSc', '0', 'Service technique  ', NULL, '5145922688', NULL, 'leumbou7@gmail.com', '', '', 'Orientation, conseil, soutien financier ', '', '', '', '', '', 'Retrouver des anciens amis et partager l’expérience de la vie professionnelle ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5827, 'Beidi Dzire', 'Rodrigue Désiré', 'Homme', '0000-00-00', 'Bafang', 2, 0, 0, 0, 18, 0, 5, 'LICENCE', '0', 'Conducteur de travaux ', NULL, '677281884', NULL, 'beididzirerodriguedesire@yahoo.fr', '', '', 'Conseils', '', '', '', '', '', 'Partage d’informations et propositions de postes au chercheurs d’emplois ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5828, 'NGONO', 'Christian', 'Homme', '0000-00-00', 'Lebamzip', 2, 0, 0, 0, 24, 0, 1, 'MSc', '0', 'Etudiant', NULL, '690310891', NULL, 'christianngono3@gmail.com', '', '', 'Le partage de mon expérience', '', '', '', '', '', 'Une bonne communication entre les anciens étudiants', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5829, 'EYE\'E ENDOMBA', 'Basile', 'Homme', '0000-00-00', 'Bengbis', 2, 0, 1, 0, 18, 3, 5, 'MASTER PROFESSIONNEL 2 ', '0', 'CHARGE D\'OPERATIONS D\'EXPLOITATION', NULL, '674864185/694538871', NULL, 'basileeyee@yahoo.fr', '', '', 'mon s\'avoir faire ,mon expérience ,mes conseil et surtout finir mon doctorat.', '', '', '', '', '', 'groupe de travail professionnel,éducatif, et d\'aide pour nos frères cadet de cette illustre école de formation que nous portons dans nos cœur.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5830, 'Taira', 'Ngarsou', 'Homme', '0000-00-00', 'Saotchay', 2, 0, 1, 0, 19, 4, 5, 'DIPET 2', '0', NULL, NULL, '694625927/678370390', NULL, 'tngarsou@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5831, 'MOHAMADOU BELLO HAYATOU', NULL, 'Homme', '0000-00-00', 'Ngaoundéré', 2, 0, 0, 0, 23, 0, 2, 'Ing MIP ENSAI', '0', NULL, NULL, '678613839', NULL, 'mohamadouhayatou19@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5832, 'BINYOU BEBGA', 'Romain vianney', 'Homme', '0000-00-00', 'POUMA', 2, 0, 0, 0, 23, 0, 2, 'Ingénieur ', '0', NULL, NULL, '0698182998', NULL, 'romain.binyou@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5833, 'Mbita Mbita', 'Clyf de Vilier', 'Homme', '0000-00-00', 'Diang', 2, 0, 1, 0, 23, 7, 2, 'MSc', '0', NULL, NULL, '696005472', NULL, 'clyf.mbita@gmail.com', '', '', 'Mon savoir faire ! ', '', '', '', '', '', 'Echanges d\'informations et éventuellement la possibilité de décrocher un emploi ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5834, 'LOMA', 'Marcel', 'Homme', '0000-00-00', 'Bertoua', 7, 0, 8, 0, 24, 9, 5, 'LICENCE', '0', 'Électricien maintenancier', NULL, '652372116', NULL, 'lomaleplus@gmail.com', '', '', 'Le vécu sur le terrain en entreprise....et le challenge au cotidien du technicien.... tout en partageant mon expérience avec ceux qui sont encore a la recherche d\'emploi ou etudissent.... ainsi que ceux qui en ont déjà....', '', '', '', '', '', 'Le partage d\'informations pouvant aboutir à une meilleure insertion des un et des autres dans la vie professionnelle dans le respect et la bonne moralité pour que cette promotion reste la meilleure de toutes.....car GIM promo 22 c\'est la famille', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5835, 'abdoulaye ', 'kiari', 'Homme', '0000-00-00', 'douala', 2, 0, 10, 0, 24, 9, 2, 'LICENCE', '0', NULL, NULL, '696574953', NULL, 'kiariabdouyaye@gmail.com', '', '', 'Je ne sais pas', '', '', '', '', '', 'La sociabilité ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5836, 'KAAM KOUAM', 'Jean-pierre justin', 'Homme', '0000-00-00', 'Douala cameroun', 9, 0, 0, 0, 13, 2, 5, 'MSc', '0', 'Chef de section Industrie-Batiment-Fluides', NULL, '0022579188367', NULL, 'jpkouam2003@yahoo.fr', '', '', 'Mon expérience et mes conseils', '', '', '', '', '', 'Le partage et le développement des projets', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5837, 'Zeganawi', 'Zorane', 'Homme', '0000-00-00', NULL, 2, 0, 1, 0, 24, 9, 2, 'LICENCE', '0', 'Stagiaire professionnel en Conseiller Technique', NULL, '00237697850505', NULL, 'zeganawizorane@gmail.com', '', '', 'Partager les informations sur la boite GIZ cameroun,\nOpportunité de formation si possible,\nPartager de mes expériences acquis,', '', '', '', '', '', 'Etre conscient,\nResponsable,\nHumble,\nPublier les opprtunités d\'emploi et de formation,', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5838, 'YOUDOM TCHAIWAU', 'Japhet', 'Homme', '0000-00-00', 'Douala', 9, 0, 10, 0, 25, 10, 1, 'LICENCE', '0', NULL, NULL, '655817251', NULL, 'youdom.japhet@yahoo.fr', '', '', 'Mon expérience a l\'IUT aux nouveaux étudiants', '', '', '', '', '', 'Propositions d\'emploi et de bourses d\'études \nNouvelles et situations de l\'IUT de ngaoundéré et anciens étudiants\n', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5839, 'ABDOULAHI MAHAMA ', 'Danlami', 'Homme', '0000-00-00', 'Bafoussam', 9, 0, 0, 0, 23, 0, 2, 'Ingénieur ', '0', NULL, NULL, '694326162', NULL, 'abdoulmahama@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5840, 'MEFO DEJONG ', 'Santana Queline ', 'Femme', '0000-00-00', 'Ngaoundere ', 9, 0, 0, 0, 21, 0, 5, 'Master en sciences et technologie', '0', 'Ingénieur chargé d\'études électriques', NULL, '696678155', NULL, 'mefosantana@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5841, 'Younoussa', 'Hamadou', 'Homme', '0000-00-00', 'Napanla -agdo', 0, 0, 8, 0, 0, 9, 2, 'LICENCE', '0', NULL, NULL, '655670241', NULL, 'inousshamad53@gmail.com', '', '', NULL, '', '', '', '', '', 'Professionalisme', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5842, 'Mohamadou Nouroudini', 'Hamayadji', 'Homme', '0000-00-00', 'Mbalangsanga', 2, 0, 0, 0, 24, 0, 1, 'Ingénieur MIP ENSAI', '0', NULL, NULL, '691168747', NULL, 'mohamadounouroudinih94@gmail.com', '', '', 'Expertise', '', '', '', '', '', 'Innovation , développement , émergence , travail d\'équipe', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5843, 'DJODDA WANIE', 'Blaise', 'Homme', '0000-00-00', 'Ngaoundéré', 1, 0, 0, 0, 12, 0, 5, 'LICENCE', '0', NULL, NULL, '243027600', NULL, 'blaisedw007@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5844, 'HOUDEBA', 'MOISE', 'Homme', '0000-00-00', 'ngaoundere', 8, 0, 0, 0, 27, 0, 1, 'DUT', '0', NULL, NULL, '690957465', NULL, 'houdebamoussa@gmail.com', '', '', 'encouragements ', '', '', '', '', '', 'Produire du meilleure ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5845, 'Mballa  Ndzengue', 'Boris', 'Homme', NULL, 'Yaounde', 0, 0, 9, 0, 0, 11, 1, 'LICENCE', '0', NULL, NULL, '696493509', NULL, 'ndzengueboris93@gmail.com', '', '', 'La presence', '', '', '', '', '', 'La presence', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5846, 'Kepndep kepndep ', 'Samuel ', 'Homme', '0000-00-00', 'Douala ', 9, 0, 10, 0, 21, 6, 2, 'LICENCE', '0', NULL, NULL, '699620823', NULL, 'k2.samuel@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5847, 'NGAKE KAMAHA', 'Flavienne', 'Femme', NULL, NULL, 9, 0, 10, 0, 26, 11, 1, 'LICENCE', '0', NULL, NULL, '655631756', NULL, 'flaviekamaha@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5848, 'DJOMKAM DJEMENI', 'JYMI LANDRY', 'Homme', '0000-00-00', 'DOUALA', 2, 0, 0, 0, 13, 0, 5, 'DUT', '0', 'Offshore Field Manager', NULL, '694664201', NULL, 'djomkamjymi_business@yahoo.fr', '', '', 'Tous ce qui va dans le sens de regroupement et la promotion des étudiants sortis de l\'université de Ngaoundéré pour une meilleure insertion dans la vie d\'entreprise.  ', '', '', '', '', '', 'Apport et partage d’expérience de la vie en entreprise. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5849, 'FENDJI KEDIENG EBONGUE', 'Jean Louis', 'Homme', '0000-00-00', 'Douala', 1, 0, 0, 0, 14, 0, 5, 'PhD', '0', 'Enseignant', NULL, '655811916', NULL, 'lfendji@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5850, 'MOHAMADOU YAYA', 'BALLO', 'Homme', '0000-00-00', 'Garoua', 7, 0, 0, 0, 19, 0, 5, 'Ingénieur de conception ', '0', 'Assistant Expert industrie ', NULL, '699753505', NULL, 'mohamadouyayaballo@yahoo.fr', '', '', 'Ma disponibilité', '', '', '', '', '', 'Échanges, collaboration', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5851, 'MIAMO SINGOUE ', 'Clément ', 'Homme', '0000-00-00', 'Ndangueng II ', 8, 0, 9, 0, 24, 9, 1, 'MSc', '0', NULL, NULL, '+49 15211238788', NULL, 'clementmiamo@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5852, 'NGUE', 'Jean', 'Homme', '0000-00-00', 'Makondo', 2, 0, 1, 0, 21, 6, 2, 'MSc', '0', 'Stagiaire Mécanicien', NULL, '+237697344581', NULL, 'jeanngue280@gmail.com', '', '', 'Informations', '', '', '', '', '', 'Informations', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5853, 'WENDEU KAPSU', 'Michel', 'Homme', '0000-00-00', 'Ngaoundéré', 9, 0, 10, 0, 21, 6, 5, 'LICENCE', '0', 'responsable technique', NULL, '679694732', NULL, 'michael.wendeu@gmail.com', '', '', 'encadrement industriel', '', '', '', '', '', 'fraternité', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5854, 'TEKINZANG TEDONDJIO', 'Martial', 'Homme', '0000-00-00', 'Bamendou', 1, 0, 2, 0, 25, 10, 5, 'MSc', '0', 'Responsable informatique ', NULL, '696325295', NULL, 'tekinzang@yahoo.fr', '', '', 'Mes connaissances', '', '', '', '', '', 'Partage dans l\'humilité de nos expériences.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5855, 'OUMAROU', 'DJOUBAIROU OUMAROU', 'Homme', '0000-00-00', 'Ngaoundéré', 2, 0, 0, 0, 22, 0, 1, 'Ingénieur', '0', NULL, NULL, '697330332', NULL, 'alhoumar@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5856, 'TETANG FOKONE', 'Abraham', 'Homme', '0000-00-00', 'Nkongsamba', 2, 0, 0, 0, 14, 0, 5, 'PhD', '0', 'Enseignant', NULL, '675095065', NULL, 'abramtetang@gmail.com', '', '', 'Mon temps et mon expérience', '', '', '', '', '', 'Facilitation des stages pour les étudiants - Aide à l\'insertion professionnelle des diplômes - Contribution avec les professionnels pour la mise à jour des cours, l\'introduction  des nouvelles UEs et la création des nouvelles filières de formation professionnelle', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5857, 'FANDOM TCHIAGO ', 'Désiré ', 'Homme', '0000-00-00', 'Douala ', 4, 0, 5, 0, 19, 4, 7, 'LICENCE', '0', 'Directeur Général ', NULL, '696742777', NULL, 'desirefandom@gmail.com', '', '', 'Mon expérience ', '', '', '', '', '', 'Que la plate-forme soit très dynamique ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5858, 'FOUTE ', 'Jules ', 'Homme', '0000-00-00', 'Garoua', 2, 0, 0, 0, 19, 0, 5, 'Master ING', '0', NULL, NULL, '695645779', NULL, 'jules.tanto@cameroon-navy.cm', '', '', 'Idées pour l\'employabilite et l\'entrepreunariat ', '', '', '', '', '', 'Échanges et partages d\'informations et d\'idées ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5859, 'Zock', 'Gustave', 'Homme', '0000-00-00', 'Belabo', 9, 0, 0, 0, 0, 0, 5, 'MSc', '0', 'Ingenieur etudes', NULL, '696141639', NULL, 'gustavezock@gmail.com', '', '', NULL, '', '', '', '', '', 'douala cameroun', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5860, 'Nshari Tani', 'Madison', 'Homme', NULL, NULL, 9, 0, 0, 0, 14, 0, 5, 'Masters of Engineering', '0', 'Cadre/SREau/DRMINEE-Ad', NULL, '697991785', NULL, 'nsharirule@yahoo.fr', '', '', 'Expertise et opportunité en énergie (renouvelable, electrification rurale) et eau', '', '', '', '', '', 'Interactivités sur les opportunités d\'emploi, stages et seminaries de formations, les nouvelles technologies etc', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5861, 'KEMBEU KALEU', 'Pavell', 'Homme', '0000-00-00', 'Bapa', 5, 0, 0, 0, 21, 0, 2, 'MSc', '0', NULL, NULL, '+237697587255', NULL, 'kembeupavell@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5862, 'MOHAMADOU', 'BAH YADJI', 'Homme', '0000-00-00', 'DEMBO', 4, 0, 0, 0, 17, 0, 7, 'INGENIEUR', '0', 'CEO', NULL, '699826478', NULL, 'mohamadoubah@gmail.com', '', '', 'Une contribution à la hauteur que cette illustre école a apportée à ma réussite', '', '', '', '', '', 'Réunir tous les anciens étudiants de l\'IUT', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5863, 'Ngnassi djami', 'Aslain brisco', 'Homme', '0000-00-00', 'Ngaoundere', 2, 0, 0, 0, 20, 0, 1, 'DUT', '0', 'Doctorant', NULL, '690919718', NULL, 'ngnassbris@yahoo.fr', '', '', 'Toutes information utile relative à la recherche d\'emplois', '', '', '', '', '', 'Réactivité en informations et offre d\'emplois', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5864, 'HAPPI TCHUESSA', 'Emma Brice', 'Homme', '0000-00-00', 'Nkongsamba', 4, 0, 0, 0, 22, 0, 1, 'Ingénieur', '0', 'Doctorant chercheur', NULL, '00237696592695/ 0022675211596', NULL, 'emmabricehappi@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5865, 'NZEPANG NANA', 'Gael', 'Homme', '0000-00-00', 'Douala', 2, 0, 0, 0, 16, 0, 5, 'Diplôme d\'Ingénieur', '0', 'Ingénieur', NULL, '699904375', NULL, 'nzepang_01@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5866, 'HAOUNA ', 'ABBAKAR ', 'Homme', '0000-00-00', 'MIDRE ', 8, 0, 9, 0, 24, 9, 5, 'LICENCE', '0', 'Mécanicien ', NULL, '693949596/653531010/660414151', NULL, 'haounabbakar@gmail.com', '', '', 'Idées ', '', '', '', '', '', 'Faciliter l\'insertion socio professionnelle ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5867, 'TAIWE', 'WANGKAKE ', 'Homme', '0000-00-00', 'GUIDIGUIS', 2, 0, 0, 0, 20, 0, 5, 'INGÉNIEUR ', '0', 'Enseignant', NULL, '699358012', NULL, 'wtaiwe@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5868, 'Ngawa monthe ', 'Steve', 'Homme', '0000-00-00', 'Douala ', 2, 0, 1, 0, 20, 5, 5, 'MSc', '0', 'Superviseur de Production ', NULL, '0033698152282', NULL, 'ngawamonthesteve@yahoo.fr', '', '', 'Mon expérience professionnel et parcours. ', '', '', '', '', '', 'Garder le contact ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5869, 'Ndjongoue Yossa ', 'Alfred Michel ', 'Homme', '0000-00-00', 'Garoua ', 2, 0, 0, 0, 21, 0, 5, 'Diplôme d\'ingénieur ', '0', 'Assistant chef section planification et programme de maintenances ', NULL, '697071732', NULL, 'ndjongoueyossa@gmail.com', '', '', 'Opportunités ', '', '', '', '', '', 'Communication professionnelle ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5870, 'POKEP EPSE TCHOUAMOU', 'Irene Linda', 'Femme', '0000-00-00', 'Dschang', 4, 0, 0, 0, 16, 0, 5, 'Ingénieur en Chimie Indistrielle et Genie de l\'Environnement', '0', 'Adjoint QHSE', NULL, '675781085/697494700', NULL, 'pokeplili@yahoo.fr', '', '', 'Tout ce qui peux être utile à l\'un de nous', '', '', '', '', '', 'Partage des expériences et aussi des offres d\'emploi, création des activités pour le renforcement des capacités des uns et des autres', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5871, 'Ngo ndjip', 'Gislene', 'Femme', '0000-00-00', 'Pan kombe', 6, 0, 0, 0, 13, 0, 5, 'DUT', '0', 'Quality controller', NULL, '699552274', NULL, 'ghisln2002@yahoo.fr', '', '', 'Des expériences vécues et les stratégies ', '', '', '', '', '', 'Entr\'aide', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5872, 'YONGUI', 'Élie', 'Homme', '0000-00-00', 'HAL-LAGDO', 2, 0, 0, 0, 24, 0, 1, 'DUT', '0', 'Étudiant', NULL, '657875792', NULL, 'yonguielieelie@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5873, 'TCHUITCHA NJANDA', 'Arnauld Romuald', 'Homme', '0000-00-00', 'DOUALA', 2, 0, 0, 0, 23, 0, 2, 'INGENIEUR', '0', NULL, NULL, '691751177 / 675887630', NULL, 'romuald.tchuitcha@yahoo.com', '', '', 'Pour le moment, je ne peux que partager mon expérience avec les plus jeunes de l\'école pour les permettre de faire de bon choix', '', '', '', '', '', 'solutions d\'emploi, réflexions sur les projets de développement,aide aux plus jeunes de l\'école pour qu\'ils puissent éviter les difficultés par lesquels nous sommes passés', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5874, 'NGAPARE', 'Rai', 'Femme', '0000-00-00', 'Koussam', 4, 0, 5, 0, 13, 0, 5, 'Mastère spécialisé', '0', 'Business developer', NULL, '+33656862196', NULL, 'ladoucengapare@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5875, 'POUANI ENGOUE', 'Roméo', 'Homme', '0000-00-00', 'Banka', 7, 0, 0, 0, 21, 0, 5, 'ingénieur', '0', ' ingénieurs des techniques industrielles- cadre d\'appui', NULL, '655983620', NULL, 'pouaniromeo@gmail.com', '', '', ' expériences, disponibilité, informations et offres d\'emplois', '', '', '', '', '', 'Proposition de certifications, recherche documentaire, intégration dans les projets ou programmes', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5876, 'SOUOP TAGNE ', 'Alain Andrey', 'Homme', '0000-00-00', 'Bafoussam', 6, 0, 7, 0, 21, 6, 2, 'MSc', '0', NULL, NULL, '+237696568602', NULL, 'tagne.alain17@gmail.com', '', '', 'offrir des stages aux plus jeunes ', '', '', '', '', '', 'Que ce groupe permette un meilleur brassage entre les différentes générations de l\'université de Ngaoundéré ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5877, 'NEBA', 'Cornelius AMBE', 'Homme', '0000-00-00', 'Mambu- Bafut -North West region ', 8, 0, 0, 0, 25, 0, 1, 'Still studying ', '0', NULL, NULL, '679640550 /655692353. ', NULL, 'nebacornel16@gmail.com', '', '', 'I can help with my know  how, and knowledge that I have acquired so far. ', '', '', '', '', '', 'Expecting a good interaction where we can help each other with opportunity, information, and knowledge. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5878, 'SAID', 'Oumar', 'Homme', '0000-00-00', 'Yaoundé', 4, 0, 0, 0, 19, 0, 5, 'MSc', '0', 'Ingénieur-Chercheur', NULL, '677678841', NULL, 'said.oumar@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5879, 'Wanki', 'Calix', 'Homme', '0000-00-00', 'Bamenda', 2, 0, 1, 0, 20, 5, 5, 'Master of engineering', '0', 'Chef maintenance', NULL, '675554586', NULL, 'wanzeru2001@yahoo.co.uk', '', '', 'Will come back to this answer later', '', '', '', '', '', 'I wishing to see the this group full of experience personalities today could help assist for a better training of younger technicians in IUT ngouandere( by providing good and professional training with good teachers not just anyone who things due to unemployment can use his relationship to become a teacher)', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5880, 'Ngeutchue tchaha ', 'Franck', 'Homme', '0000-00-00', 'Mbanga', 7, 0, 0, 0, 24, 10, 7, 'LICENCE', '0', 'PDG', NULL, '695109517', NULL, 'franck.ngeutchue@yahoo.com', '', '', 'Contribué au développement de la plateforme', '', '', '', '', '', 'Partage et échange sociaux professionnel', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5881, 'Feudjio Dadjo', 'Christian', 'Homme', '0000-00-00', NULL, 6, 0, 0, 0, 16, 0, 5, 'MSc', '0', 'Ingénieur Exploitation', NULL, '675283352', NULL, 'feudjio_dadjo@yahoo.fr', '', '', 'Expérience Professionnelle ', '', '', '', '', '', 'Partage d\'expérience,  partage d\'opportunités,  investissements, propositions sur les contenus de formation des cadets', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5882, 'NGUEWA NZALI', 'Willy Martial', 'Homme', '0000-00-00', NULL, 2, 0, 0, 0, 19, 0, 2, 'Ingénieur de Conception à ENSAI', '0', NULL, NULL, '696867757', NULL, 'martialnzali@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5883, 'AHMADOU GOUROUDJA', 'ABDOUL AZIZ', 'Homme', '0000-00-00', 'Guirvidig- Maga', 2, 0, 0, 0, 21, 0, 5, 'Ingénieur', '0', 'Temporaire Programme de maintenance et planning', NULL, '651787038', NULL, 'aahmadougouroudjaa@gmail.com', '', '', 'Mon soutien', '', '', '', '', '', 'Douala', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00');
INSERT INTO `users` (`idUsers`, `nom`, `prenom`, `genre`, `dateNaiss`, `lieuNaiss`, `dut`, `promotionDUT`, `licence`, `promotionLicence`, `obtentionDUT`, `obtentionLicence`, `situation`, `dernierDiplome`, `entreprise`, `poste`, `adresse`, `telephone`, `ville`, `email`, `password`, `objectif`, `apporter`, `facebook`, `twitter`, `linkedln`, `instagram`, `cv`, `attente`, `vu`, `statut`, `idRole`, `photo`, `vuTel`, `vuDn`, `uniid`, `created_at`) VALUES
(5884, 'BIBEGA MEYONGO', 'JEAN PIERRE', 'Homme', '0000-00-00', 'DOUALA', 2, 0, 0, 0, 21, 0, 5, 'INGÉNIEUR ', '0', 'Chargé entretien Matériel ', NULL, '+237698841647', NULL, 'jeanpierrebibegameyongo@yahoo.com', '', '', 'Apporter ma modeste contribution dans la construction de cet édifice et contribuer partout où besoin se fera', '', '', '', '', '', 'Échanger dans le but de promouvoir les ressources locales pour l’evolunion de la technologie, Œuvrer pour l’amélioration des conditions de nos cadets à l’IUT.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5885, 'Fotsing', 'Ghislaine', 'Femme', '0000-00-00', 'Douala', 4, 0, 0, 0, 13, 0, 5, 'Ingénieur', '0', 'Country Sustainability Manager', NULL, '00237690886234', NULL, 'fghisga@gmail.com', '', '', 'encadrement étudiants; mentorship', '', '', '', '', '', 'Mentorship, Actualités sur anciens étudiants et sur IUT', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5886, 'YAYA', 'Aboubakar ', 'Homme', '0000-00-00', 'Ngaoundéré ', 4, 0, 0, 0, 19, 0, 2, 'Master Eng ENSAI ', '0', NULL, NULL, '697053525', NULL, 'abakyaya@gmail.com', '', '', 'Ma collaboration ', '', '', '', '', '', 'Developer les connections entre diplômés d’abord et diplômés avec l’administration de l’école et étudiants pour faciliter l’insertion professionnelle et orienter les plus jeunes ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5887, 'Soumana', 'Titus', 'Homme', '0000-00-00', 'Maroua', 9, 0, 0, 0, 22, 0, 2, 'Diplôme d\'ingénieur de conception', '0', NULL, NULL, '697106979', NULL, 'tituskorombe@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5888, 'AYISSI MEKONGO ', 'Dimitri ', 'Homme', '0000-00-00', 'Nkol-Nda ', 9, 0, 10, 0, 25, 10, 5, 'LICENCE', '0', 'Stagiaire professionnel ', NULL, '695170135', NULL, 'ayissidimitri013@gmail.com', '', '', 'Des possibilités d\'emploi ', '', '', '', '', '', 'Continuer à faire grandir la famille IUT pour s\'aider mutuellement ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5889, 'SOBGOU FOPPA', 'Parfait', 'Homme', '0000-00-00', 'Douala', 0, 0, 9, 0, 24, 9, 1, 'Master 1 IEAI ', '0', 'Etudiant', NULL, '697270541', NULL, 'parfaitsobgou@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5890, 'MAHAMAT tor', 'Talla', 'Homme', '0000-00-00', 'Ngaoundere', 7, 0, 8, 0, 24, 9, 2, 'LICENCE', '0', NULL, NULL, '696882069', NULL, 'mahamattor_talla@yahoo.fr', '', '', 'Les informations sur les offres présentées', '', '', '', '', '', 'Insertion professionnelle et évolution commune ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5891, 'MANDONG MBEA', 'André Calebtttt', 'Homme', '0000-00-00', NULL, 4, 0, 5, 0, 26, 0, 2, 'LICENCE', '0', NULL, NULL, '690682439', NULL, 'calebreznov@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5892, 'Attouhami', 'Mahamat Saleh Ahmat ', 'Homme', '0000-00-00', 'Abeche ', 0, 0, 7, 0, 0, 11, 1, 'DEUG', '0', NULL, NULL, '691362352', NULL, 'attouhami96@gmail.com', '', '', 'Tous les soutiens possible que ça soit moralement, physiquement, financièrement etc.', '', '', '', '', '', 'Collaboration, entente, succès, et là valorisation de notre école. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5893, 'ngwano', 'elvis', 'Homme', '0000-00-00', 'bambili-mezam', 2, 0, 0, 0, 24, 0, 2, 'MSc', '0', 'Ingenieur sortant', NULL, '670889286', NULL, 'ngwanoet@yahoo.com', '', '', 'des offres d\'emploi et idees innovatrices en sciences d\'ingeneurie', '', '', '', '', '', 'acquerir des bons infos', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5894, 'Moustapha ', 'Oumar Koulfou ', 'Homme', '0000-00-00', 'Matafo', 1, 0, 3, 0, 0, 10, 1, 'LICENCE', '0', NULL, NULL, '653284468', NULL, 'lkoulfou@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5895, 'Mimb', 'Nhook Nyambe', 'Homme', '0000-00-00', 'Yaoundé 5', 8, 0, 0, 0, 0, 0, 1, 'DUT', '0', NULL, NULL, '673547679', NULL, 'nhooknyambe19@gmail.com', '', '', 'Aidez mes fioles à mieux comprendre les sujet qui leur sembles difficiles.', '', '', '', '', '', 'Avoir toutes les information nécessaires pour faciliter mon parcours a l\'IUT jusqu\'à l\'obtention de ma licence.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5896, 'Iya', 'Aliou ', 'Homme', '0000-00-00', 'Malang-Ngaoundere', 4, 0, 5, 0, 23, 8, 2, 'MSc', '0', NULL, NULL, '656503433', NULL, 'aliouiya3@gmail.com', '', '', 'Des idées, la contribution pour la formation des nouveaux étudiants en qualité d\'ancienneté et autres ', '', '', '', '', '', 'Les informations relatives à l\'école et les opportunités d\'emploi si possible ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5897, 'NOUBISSIE', 'Eric', 'Homme', '0000-00-00', 'Doumé', 4, 0, 0, 0, 13, 0, 5, 'PhD', '0', 'Enseignant Chercheur', NULL, '(+237)677214633', NULL, 'noubissieerik@yahoo.fr', '', '', 'Mon soutien en recherche et dans d\'autres domaines', '', '', '', '', '', 'Collaboration en vu du développement de notre pays qui est celui de nos petits frères et enfants ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5898, 'Sawalda Alphonse Guidzavaï ', NULL, 'Homme', '0000-00-00', 'Bao', 0, 0, 8, 0, 0, 10, 1, 'LICENCE', '0', 'Étudiant', NULL, '695995199', NULL, 'sawaldito@gmail.com', '', '', 'Informations et aides nécessaires.', '', '', '', '', '', 'S\'informer.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5899, 'Mariamou', 'Abo oumarou', 'Femme', '0000-00-00', 'Garoua', 0, 0, 7, 0, 0, 8, 5, 'LICENCE', '0', 'Tenchniciennne', NULL, '697072650', NULL, 'mariamouabo4@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5900, 'Abdoul Wahabou', 'Abo', 'Homme', '0000-00-00', 'Batouri', 9, 0, 0, 0, 0, 0, 1, 'DUT', '0', 'Étudiant ', NULL, '691383875', NULL, 'whb3875@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5901, 'Chabou Leutieu', 'Fabiole Kevine', 'Femme', '0000-00-00', 'Bakou', 4, 0, 5, 0, 26, 11, 2, 'LICENCE', '0', NULL, NULL, '672858481', NULL, 'fabiolakevinechabou@gmail.com', '', '', 'Apporter des informations à mon niveau ', '', '', '', '', '', 'Me familiariser avec les autres étudiants ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5902, 'Fene Toguen', 'Marie Flore', 'Femme', '0000-00-00', 'Ngaoundere', 4, 0, 5, 0, 16, 2, 2, 'LICENCE', '0', NULL, NULL, '699264390', NULL, 'mffene@gmail.com', '', '', 'Mon expérience, compétences', '', '', '', '', '', 'Échange sur les expériences, échange d\'informations sur potentiel emploi, participation à l\'évolution de notre école IUT', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5903, 'YAWATA ', 'Hortence', 'Femme', '0000-00-00', 'Garoua', 5, 0, 0, 0, 23, 0, 2, 'Ingénieur ', '0', NULL, NULL, '691428095', NULL, 'yawata.horty@gmail.com', '', '', 'Une collaboration entre anciens et les actuels étudiants de l\'intérieur de Ngaoundere ', '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5904, 'Ngouotché djiya ', 'Stéphane Narcisse', 'Homme', '0000-00-00', 'Ngaoundéré ', 2, 0, 0, 0, 12, 0, 5, 'MSc', '0', 'Chef service adjoint ', NULL, '674138730', NULL, 'djiyastephane@yahoo.fr', '', '', 'Mon expérience ', '', '', '', '', '', 'Appartenir à un réseau fort et dynamique ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5905, 'ELLAMENGO', 'Jacques Thierry', 'Homme', '0000-00-00', 'MBALMAYO', 4, 0, 5, 0, 16, 2, 2, 'LICENCE', '0', NULL, NULL, '690239663', NULL, 'ella_thierry83@yahoo.fr', '', '', 'Mon expérience professionnelle', '', '', '', '', '', 'Retrouver les anciens camarades et avoir des opportunités d\'emploi', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5906, 'LINGOM', 'Jean Gustave', 'Homme', '0000-00-00', 'Libreville', 4, 0, 0, 0, 0, 0, 5, 'MSc', '0', 'Ingenieur Chimiste/Process', NULL, '696601063', NULL, 'lingom2000@yahoo.fr', '', '', 'Mon expérience', '', '', '', '', '', 'Echange d\'expériences', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5907, 'DJAMALOUDDINI', 'OUWAISSOU', 'Homme', '0000-00-00', 'NGAOUNDERE', 9, 0, 0, 0, 25, 0, 1, 'DUT', '0', 'Etudiant', NULL, '695405681', NULL, 'ouwaissoudjamal@gmail.com', '', '', 'Mon expérience et mon savoir', '', '', '', '', '', 'Partage de savoir, des diverses opportunités d\'étude et d\'insertion professionnelles', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5908, 'Yamseh', 'Odette', 'Femme', '0000-00-00', 'Nkongsamba', 3, 0, 0, 0, 11, 0, 5, 'MSc', '0', 'Laboratory Technicien', NULL, '697178855', NULL, 'ynoddy2000@yahoo.co.uk', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5909, 'LAH', 'Ethelbert Kimeng ', 'Homme', '0000-00-00', 'Bamenda', 2, 0, 0, 0, 14, 0, 5, 'MSc', '0', 'Chef d\'atelier Conditionnement', NULL, '699688342', NULL, 'ethelbertlah@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5910, 'TELEGANG CHEKEM', 'Cédric', 'Homme', '0000-00-00', 'Mbouda', 6, 0, 0, 0, 14, 0, 5, 'PhD', '0', 'Chercheur', NULL, '0033 (0)786426567', NULL, 'cedricchekem@gmail.com', '', '', 'Des idées', '', '', '', '', '', 'Metworking professionnel', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5911, 'AHI BESSALA', 'Bertrand Brunot', 'Homme', '0000-00-00', 'Doumé', 5, 0, 0, 0, 23, 0, 2, 'MSc', '0', NULL, NULL, '675398042', NULL, 'bertrandahi@gmail.com', '', '', 'Ma disponibilité', '', '', '', '', '', 'Consolider les liens entre anciens étudiants, Accentuer le réseautage, promouvoir l\'image de l\'IUT.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5912, 'WABO TEINGUA', 'Ange Patrick', 'Homme', '0000-00-00', 'BERTOUA', 8, 0, 0, 0, 26, 0, 1, 'DUT', '0', NULL, NULL, '690672469', NULL, 'waboangepatrick@gmail.com', '', '', NULL, '', '', '', '', '', 'Rester connecté avec tous les anciens camarades.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5913, 'MUTLEN ', 'Amandine Laure ', 'Femme', '0000-00-00', 'Yaoundé ', 4, 0, 0, 0, 24, 0, 2, 'Ingénieur ', '0', NULL, NULL, '697581456', NULL, 'mutlenamandinelaure@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5914, 'TCHAWO Sitcheu', 'Gaëlle', 'Femme', '0000-00-00', 'Bafang', 4, 0, 5, 0, 19, 4, 5, 'Master professionnel', '0', 'Enseignante et consultante QHSE', NULL, '699804815', NULL, 'laurypd2006@yahoo.fr', '', '', 'Opportunité de stage ', '', '', '', '', '', 'Insertion professionnelle', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5915, 'MBONG NGOUDJEDE', 'Hugues', 'Homme', '0000-00-00', 'Garoua', 4, 0, 0, 0, 25, 0, 1, 'DUT', '0', NULL, NULL, '698654474', NULL, 'huguesmbong@gmail.com', '', '', 'Pour le moment que des conseils ', '', '', '', '', '', 'Faciliter l\'insertion pour les cadets. Les stages, emplois et surtout les conseils', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5916, 'Ze BENGONO', 'Placide', 'Homme', '0000-00-00', 'Bertoua', 4, 0, 0, 0, 23, 0, 2, 'Ingénieur', '0', NULL, NULL, '694524558', NULL, 'bengoplacide@gmail.com', '', '', 'RAS', '', '', '', '', '', 'Gardé les liens entre nous les camarades', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5917, 'FON ', 'JULIUS NJI ', 'Homme', NULL, 'BAMENDA', 3, 0, 0, 0, 11, 0, 5, 'M.Eng', '0', 'PROCESS, QUALITY & FOOD SAFETY LEAD', NULL, '+584142731324 or +237679388106', NULL, 'fonjnji@yahoo.com', '', '', '- Sharing my experience in Process Qualityfor solution finding\n- Facilitate any group project to the best of my ability by contributing intellectually, physically and otherwise as best possible', '', '', '', '', '', 'Firstly, collaboration to encourage better education with more practical and real industry type experiences for our juniors (students). Finally, collaboration through sharing of information, internships, consultancy and employment opportunities and most especially creation of new enterprises and how to get financing for projects.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5918, 'Djorwé', 'Tapsala', 'Homme', '0000-00-00', 'Koza', 2, 0, 0, 0, 15, 0, 5, 'DUT', '0', 'Ing. Maintenance', NULL, '678827616', NULL, 'djtapsala@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5919, 'BEKOMBE KOUM ', 'Calice ', 'Femme', '0000-00-00', 'Mouanko ', 4, 0, 0, 0, 22, 0, 2, 'Ingénieur ', '0', NULL, NULL, '699019479', NULL, 'bekombekc@gmail.com', '', '', 'M\'impliquer des les activités du groupe ', '', '', '', '', '', 'Renforcer les liens; aider les non travailleurs a trouvé de bonnes opportunités ou emploi. Aider dans l\'insertion professionnelle. Par moment organiser des réunions ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5920, 'Zib ', 'William ', 'Homme', '0000-00-00', 'Kongsimbang 1', 6, 0, 7, 0, 23, 8, 5, 'MBA', '0', 'Contrôleur Qualité ', NULL, '672443646', NULL, 'williamzib42@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5921, 'MUSSANGO', 'TRIANA LAETITIA', 'Femme', '0000-00-00', 'MBALMAYO', 2, 0, 0, 0, 22, 0, 5, 'INGENIEUR', '0', 'Coordonateur maintenance reseaux de distribution', NULL, '693261338', NULL, 'trianamussango@yahoo.fr', '', '', 'Dans la mesure du possible, tout ce qui me sera demandé ', '', '', '', '', '', 'Partage d\'informations utiles, Facilitation de l\'insertion des jeunes dans le milieu professionnel, accompagnement des entrepreneurs dans le processus de création d\'entreprise...', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5922, 'NGUEMBEU BISILAH', 'Celestine Nchang', 'Femme', '0000-00-00', 'Garoua', 4, 0, 5, 0, 16, 0, 7, 'DUT', '0', 'Dg', NULL, '666064461', NULL, 'celestinenguembeu@yahoo.fr', '', '', 'Experience', '', '', '', '', '', 'Entre aide', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5923, 'Youmssi ', 'Joel', 'Homme', '0000-00-00', 'Nancy ', 7, 0, 0, 0, 21, 0, 5, 'MSc', '0', 'Ingénieur chargé des études en analyse et simulation électrique ', NULL, '695107046', NULL, 'y.ajonson9911@gmail.com', '', '', 'Stage', '', '', '', '', '', 'Coopération ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5924, 'Tiyou', 'Jules Padrik', 'Homme', NULL, NULL, 6, 0, 0, 0, 18, 0, 5, 'MSc', '0', NULL, NULL, '690294332', NULL, 'tiyoujules@yahoo.fr', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5925, 'NDOGO FOUDA', 'Joseph Olivier', 'Homme', '0000-00-00', 'Ngaoundéré', 6, 0, 0, 0, 18, 0, 5, 'DUT', '0', 'Assistant Coordinateur Qualité Fèves', NULL, '+237696890118', NULL, 'olivierfouda0812@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5926, 'Ndjem Nguimout', 'Evrard Narcisse', 'Homme', '0000-00-00', 'Song loulou', 6, 0, 7, 0, 19, 4, 5, 'LICENCE', '0', NULL, NULL, '+49 157 58890691', NULL, 'naredoevrard@yahoo.fr', '', '', NULL, '', '', '', '', '', 'informations, procédures sur le retrait des diplômes, la mise en place des conditions favorables pour un auto emploi.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5927, 'BOGNE', 'Aimar', 'Homme', '0000-00-00', NULL, 3, 0, 0, 0, 7, 0, 5, 'Ingé', '0', NULL, NULL, '677333495', NULL, 'aimar_bogne@yahoo.fr', '', '', 'Enseignement et experience.', '', '', '', '', '', 'Aider et se faire aider au besoin ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5928, 'PUEMI DPETCHOUA', 'Yolaine Prisca', 'Femme', '0000-00-00', 'Ngaoundéré', 6, 0, 0, 0, 24, 0, 2, 'Ingénieur de conception', '0', NULL, NULL, '691315171/676489113', NULL, 'puemi2015@gmail.com', '', '', 'Mes connaissances', '', '', '', '', '', 'Avoir les informations relatives aux travail et sur les projets de développement', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5929, 'Ibrahima', 'Madi', 'Homme', '0000-00-00', 'Maroua', 7, 0, 0, 0, 23, 0, 2, 'Ingénieur', '0', NULL, NULL, '695320614', NULL, 'Ibrahimamadi25@gmail.com', '', '', 'Mes expériences acquis et guidé ceux qui sont en difficultés', '', '', '', '', '', 'Mes attentes en vers ce groupe c\'est de donner l\'opportunité à tout un chacun d\'accéder au monde professionnel du travail et aider ceux qui ont des difficultés d\'insertion dans le monde du travail', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5930, 'YICHE', 'Adamou', 'Homme', '0000-00-00', 'Ngaoudere', 9, 0, 0, 0, 17, 0, 5, 'Ingenieur de Maintenance Industrielle', '0', 'CHARGE DE CONTRAT DE MAINTENANCE', NULL, '690098399', NULL, 'yiche_adamou@yahoo.fr', '', '', 'Mon expérience', '', '', '', '', '', 'Rester en contact permanent avec la famille IUT/ENSAI ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5931, 'Dr. DESOBGO ZANGUE', 'Steve Carly', 'Homme', '0000-00-00', 'Douala', 3, 0, 0, 0, 6, 0, 5, 'PhD', '0', 'Enseignant/Chercheur', NULL, '697160004', NULL, 'desobgo.zangue@gmail.com', '', '', 'les conseils et aussi être consultant pour certains d\'entre vous qui ont leur structure et qui souhaitent évoluer sereinement', '', '', '', '', '', 'la possibilité d\'insertion des étudiants de l\'IUT de Ngaoundéré aussi bien pour les stages que pour l\'emploi', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5932, 'MINE', 'Simon Dany', 'Homme', '0000-00-00', 'Abong-mbang', 6, 0, 7, 0, 26, 11, 2, 'LICENCE', '0', NULL, NULL, '695372737', NULL, 'mine.dany@yahoo.com', '', '', 'Je peux donner des suggestions par rapport aux décisions prise par les administrateurs ', '', '', '', '', '', 'Je m\'attend à ce que ce groupe puisse m\'aider à trouver un emploi ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5933, 'ABDOURAHMAN ', 'Ibnou Oumar', 'Homme', '0000-00-00', 'Ngaoundéré', 2, 0, 0, 0, 22, 0, 2, 'MSc', '0', 'Stagiaire au Bureau d’étude/Développement des Réseaux de distribution/Pôle simulation et analyse électrique ', NULL, '656841284', NULL, 'benoumar.ibnabdourahman@gmail.com', '', '', 'Retour d’expérience sur les profils recherchés par les employeurs.\nConseil technique ', '', '', '', '', '', 'Participer à des formations pratiques professionnelles ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5934, 'Ngwa', 'Amstrong Chi', 'Homme', '0000-00-00', 'Bamenda', 2, 0, 0, 0, 21, 0, 2, 'MSc', '0', 'mecanicien', NULL, '676326905', NULL, 'amstrongngwa1@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5935, 'Mohamadou Bello', 'Issa', 'Homme', '0000-00-00', 'GAROUA', 9, 0, 0, 0, 27, 0, 1, 'DUT', '0', 'Étudiant', NULL, '691618491', NULL, 'mohamadoubello760@gmail.com', '', '', 'Mes compétences ', '', '', '', '', '', 'Opportunité d\'emploi', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5936, 'Telewo', 'Nicaise', 'Homme', '0000-00-00', 'Ngaoundere ', 6, 0, 0, 0, 15, 0, 5, 'MSc', '0', 'Chef d\'atelier Fabrication bière ', NULL, '696370378', NULL, 'telewounicaise87@gmail.com', '', '', 'Mon expérience académique (major de promotion)  et mon expérience professionnel dans le domaine brassicol', '', '', '', '', '', 'Coaching des jeunes,  participer au réseau pour étendre mes compétences et accéder à des fonctions à l\'école ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5937, 'Ntuga', 'Suzie bernadette', 'Femme', NULL, NULL, 6, 0, 0, 0, 16, 2, 2, 'LICENCE', '0', NULL, NULL, '677459977', NULL, 'Suzientuga3@gmail.com', '', '', 'Mon expérience professionnelle dans les différents domaines d\'étude ', '', '', '', '', '', 'Avoir des opportunités d\'emploi ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5938, 'MANESSONG', ' Hermione Vanessa', 'Femme', '0000-00-00', 'Douala', 1, 0, 2, 0, 23, 8, 5, 'Master professionnel', '0', 'Développeur Web', NULL, '695595356', NULL, 'manessongvanessa@gmail.com', '', '', 'Mon retour d\'expérience, conseil pour la nouvelle génération', '', '', '', '', '', 'Offre d\'opportunité, emploi, formation pro, séminaire, rencontre', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5939, 'kouam', 'Corinne', 'Femme', '0000-00-00', 'Nkongsamba', 1, 0, 3, 0, 25, 10, 5, 'LICENCE', '0', 'Stagiaire ', NULL, '655659544', NULL, 'corinnakouam@gmail.com', '', '', 'Conseils', '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5940, 'Moumouni', 'Liman', 'Homme', '0000-00-00', 'Kousseri', 4, 0, 5, 0, 24, 9, 2, 'LICENCE', '0', NULL, NULL, '695105220', NULL, 'limanmoumouni18@gmail.com', '', '', 'Contribution', '', '', '', '', '', 'Recherche du travail', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5941, 'SAPEYA KANEDJA', 'sophonie', 'Homme', '0000-00-00', 'Douala', 1, 0, 3, 0, 25, 10, 1, 'DIPET 2', '0', NULL, NULL, '691019920', NULL, 'sapeyasapeya@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5942, 'Awamba ', 'Franck', 'Homme', '0000-00-00', 'Kekem', 6, 0, 7, 0, 23, 8, 5, 'LICENCE', '0', 'Responsable production ', NULL, '693514164', NULL, 'awambafranck@gmail.com', '', '', 'Mon expertise ', '', '', '', '', '', 'Partage des resources ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5943, 'NGANDO', 'GAETAN FREDERIC', 'Homme', '0000-00-00', 'YAOUNDE', 2, 0, 9, 0, 22, 7, 2, 'MSc', '0', NULL, NULL, '699979765', NULL, 'gaetanngando@gmail.com', '', '', 'Faire des propositions constructives, éventuellement proposer des stages uniquement aux plus méritants de mon point de vue.', '', '', '', '', '', 'Transmission des informations utiles à temps réel; sollicitation des anciens étudiants pour les cours de vacation.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5944, 'YALLA YOUMBI', 'Roge Darseyne', 'Homme', '0000-00-00', 'Banka', 8, 0, 9, 0, 24, 9, 2, 'LICENCE', '0', NULL, NULL, '690755924', NULL, 'youmbiroge@gmail.com', '', '', 'offre d\'emploi', '', '', '', '', '', 'offre d\'emploi', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5945, 'Mamoudou', 'Abdoulaye', 'Homme', '0000-00-00', 'Garoua', 9, 0, 10, 0, 27, 12, 1, 'LICENCE', '0', NULL, NULL, '693353404', NULL, 'mamoudouabdoulaye2@gmail.com', '', '', 'Les connaissances que j\'ai acquis a l\'école ', '', '', '', '', '', 'Les nouvelles connaissances ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5946, 'NOUADJEP ', 'Serge Narcisse ', 'Homme', '0000-00-00', NULL, 3, 0, 0, 0, 12, 0, 5, 'PhD', '0', 'Coordinator Electrical and Electronic Department ', NULL, '674857394', NULL, 'nouadjep@gmail.com', '', '', 'Relais de l\'IUT dans le Sud-Ouest ', '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5947, 'Mbezele', 'Antoine', 'Homme', '0000-00-00', 'Yaoundé', 2, 0, 0, 0, 26, 0, 1, 'DUT', '0', NULL, NULL, '693060201', NULL, 'antoinembezele@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5948, 'Manga NDI', 'Tobie Franck', 'Homme', NULL, 'Yaoundé', 2, 0, 0, 0, 26, 0, 1, 'DUT', '0', NULL, NULL, '656132023', NULL, 'tobiefranckmangandi@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5949, 'Betiné gambina', 'Michel Landry', 'Homme', '0000-00-00', 'Mbalmayo', 7, 0, 0, 0, 26, 0, 1, 'Insai de ngaoundere', '0', NULL, NULL, '699549326', NULL, 'michelbetine@gmail.com', '', '', 'Des réponses aux difficultés rencontrées par les uns et les autres', '', '', '', '', '', 'Infos concours stages dans les entreprises et la formation continue', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5950, 'TCHOUANKAM  TOUKAM', 'WILLIAM', 'Homme', '0000-00-00', 'Batoufam', 2, 0, 0, 0, 26, 0, 1, 'DUT', '0', NULL, NULL, '693408379', NULL, 'ttchouankamw99@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5951, 'Maïmouna', 'Sinaï', 'Femme', '0000-00-00', 'Garoua', 2, 0, 0, 0, 27, 0, 1, 'DUT', '0', 'Niveau 1', NULL, '694652910', NULL, 'sinaimaimounai@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5952, 'MOMO SADOH ', 'Kaïs Sandez ', 'Homme', '0000-00-00', 'Douala ', 2, 0, 0, 0, 26, 0, 1, 'DUT', '0', NULL, NULL, '690994961', NULL, 'momosadoh13@gmail.com', '', '', 'Rien pour le moment ', '', '', '', '', '', 'Les ouvertures au entreprise. Donc être informé en temps réel pour les différents recrutements lancé. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5953, 'MOHAMADOU', 'MOUCTAROU', 'Homme', '0000-00-00', 'Tourningal', 2, 0, 1, 0, 27, 12, 1, 'DUT', '0', NULL, NULL, '694783923', NULL, 'mouctarou.mohamadou@yahoo.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5954, 'NDINGA KOULEYA', 'Aristide', 'Homme', '0000-00-00', 'Garoua Boulaï', 8, 0, 0, 0, 27, 0, 1, 'DUT', '0', NULL, NULL, '694858551', NULL, 'haristidendinga@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5955, 'Bia', 'Aboubakari', 'Homme', '0000-00-00', 'Idool', 7, 0, 8, 0, 27, 0, 1, 'DUT', '0', NULL, NULL, '670681040', NULL, 'bsidoof@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5956, 'Mateke', 'Florent', 'Homme', '0000-00-00', 'Souza', 2, 0, 5, 0, 26, 0, 5, 'DUT', '0', 'Agent de production', NULL, '698520099', NULL, 'matekeflorent@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5957, 'NGONGANG ', 'TRISTANT ', 'Homme', '0000-00-00', 'DOUALA ', 2, 0, 1, 0, 27, 12, 2, 'LICENCE', '0', 'Etudiant', NULL, '656770997', NULL, 'ngongangtristant@gmail.com', '', '', 'Espérience en qualités de techniques industrielles et ouvrir la voie aux emplois et stages à mes filleuls', '', '', '', '', '', 'Offre d\'emploi et de stages.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5958, 'NGO BATADJAM', 'ROSE GLADYS', 'Femme', '0000-00-00', 'Edea', 2, 0, 0, 0, 27, 0, 1, 'DUT', '0', NULL, NULL, '695835254', NULL, 'rg08091995@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5959, 'Ngameni', 'Josy', 'Femme', '0000-00-00', 'Ngaoundere', 9, 0, 0, 0, 0, 0, 1, 'Baccalauréat ', '0', NULL, NULL, '695231454', NULL, 'ngameningounoujosy@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5960, 'ZOK NEYI', 'AISSATOU', 'Femme', '0000-00-00', 'NGAOUNDAL', 8, 0, 0, 0, 0, 0, 1, 'Baccalauréat', '0', NULL, NULL, '690612709', NULL, 'zokneyi@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5961, 'NGUEWOUO TCHUISSEU', 'JONATHAN', 'Homme', '0000-00-00', 'YAOUNDE', 0, 0, 0, 0, 0, 0, 1, 'BACCALAUREAT', '0', 'ETUDIANT', NULL, '698307728', NULL, 'johnngue13@gmail.com', '', '', 'Des informations utiles pour les autres étudiants et travailleurs. ', '', '', '', '', '', 'Obtenir des informations utiles pour ma formation et des ouvertures sur le monde professionnel et les stages. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5962, 'NDJENGUE NDJODO ', 'DAN MATHURIN', 'Homme', '0000-00-00', 'Yaoundé 5e', 9, 0, 10, 0, 0, 0, 1, 'Baccalauréat ', '0', 'Étudiant ', NULL, '697409964', NULL, 'mathurinndjodo2001@gmail.com', '', '', 'Aide si possible.', '', '', '', '', '', 'Rester en contact avec les membres du groupe.', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5963, 'NAGASSO', 'FRANÇOIS', 'Homme', '0000-00-00', 'Garoua', 7, 0, 8, 0, 28, 0, 1, 'LICENCE', '0', NULL, NULL, '658894242', NULL, 'nagassofrancois@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5964, 'WUNG NKUM ', 'KELVIN', 'Homme', '0000-00-00', 'YAOUNDE', 2, 0, 1, 0, 28, 13, 1, 'LICENCE', '0', 'Étudiant ', NULL, '691587651', NULL, 'kelvinnkum@gmail.com', '', '', 'Des informations sur des demandes d\'emploi ', '', '', '', '', '', 'Connaitre les ouvertures sur mon domaine d\'études et à savoir ce qui m\'attend en entreprise ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5965, 'OMAL', 'Maxime ', 'Homme', '0000-00-00', 'Yaounde ', 9, 0, 10, 0, 28, 0, 1, 'DUT', '0', NULL, NULL, '699357232', NULL, 'tresoromal@gmail.com', '', '', NULL, '', '', '', '', '', 'Formation et emploi', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5966, 'Harouna Elhadj', 'Aboubakar Wabbi', 'Homme', '0000-00-00', 'Kaele', 9, 0, 10, 0, 28, 0, 1, 'DUT', '0', NULL, NULL, '691003108', NULL, 'haelhadjaboubakarwabbi@gmail.com', '', '', 'Experience to my seniors', '', '', '', '', '', 'Jobs opportunities and academic advisor', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5967, 'Mendim', 'Langevin', 'Homme', '0000-00-00', 'Adjap', 2, 0, 1, 0, 28, 13, 1, 'LICENCE', '0', 'Étudiant', NULL, '(+237)655718132', NULL, 'langevinwesley@gmail.com', '', '', 'Mon savoir faire et idée', '', '', '', '', '', 'Les informations', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5968, 'Njabo', 'Tracy', 'Femme', '0000-00-00', 'Yaoundé', 2, 0, 0, 0, 0, 0, 1, 'Baccalaureat', '0', NULL, NULL, '695650206', NULL, 'tracynjabo@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5969, 'Zangue Jiokeng', 'Kessy Mégane', 'Femme', '0000-00-00', 'Ngaoundere', 2, 0, 0, 0, 0, 0, 1, 'Baccalauréat', '0', 'Étudiante', NULL, '693790337', NULL, 'zanguemegane@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5970, 'Tasona Mbele', 'Robert', 'Homme', '0000-00-00', 'Ngaoundéré', 2, 0, 0, 0, 0, 0, 1, 'Baccalauréat D', '0', NULL, NULL, '690162915', NULL, 'tasonambelerobert@gmail.com', '', '', 'Je veux découvrir le groupe lorsque j\'aurais ma contribution à apporter concernant un sujet je n\'hésiterais pas', '', '', '', '', '', 'J\'aimerai trouver du sérieux dans ce groupe et obtenir parfois des réponses à certaines questions concernant ma formation à l\'IUT qui pourrons m\'aider à avancer. ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5971, 'Ngeutchue Momeni', 'Eric Landry', 'Homme', '0000-00-00', 'Yaoundé', 2, 0, 8, 0, 26, 11, 2, 'LICENCE', '0', NULL, NULL, '656443408', NULL, 'ericmomeni@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5972, 'Djimrane', 'Arnaud', 'Homme', '0000-00-00', 'N\'djamena', 2, 0, 1, 0, 26, 11, 2, 'LICENCE', '0', NULL, NULL, '+23563411300', NULL, 'djimranedarnaud@gmail.com', '', '', 'Partager mes expérience', '', '', '', '', '', 'Partager et acquérir des nouvelle connaissance', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5973, 'Abdoulkadry', 'Hamidou', 'Homme', '0000-00-00', 'Mindif', 9, 0, 0, 0, 27, 0, 1, 'MBA', '0', 'Etudiant en licence a iut', NULL, '694961446', NULL, 'abdoulkadry446@gmail.col', '', '', 'Collaboration et esprit d equipe', '', '', '', '', '', 'Information et formation ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5974, 'Youssoufa', 'Djafarou', 'Homme', '0000-00-00', 'Bertoua', 2, 0, 0, 0, 0, 0, 1, 'Baccalauréat', '0', 'Étudiant', NULL, '695567461', NULL, 'yusufdjafar.dy@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5975, 'YADA', 'Serge', 'Homme', '0000-00-00', 'Maroua', 2, 0, 1, 0, 26, 11, 2, 'LICENCE', '0', 'Étudiant en Master recherche', NULL, '655422795', NULL, 'yadaserge95@gmail.com', '', '', 'Des services et aussi des soutiens en matière de monitoring', '', '', '', '', '', 'Échange mutuelle d\'informations ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5976, 'Talekezeu ', 'Julio cesar', 'Homme', '0000-00-00', 'Bonaberi', 2, 0, 0, 0, 28, 0, 1, 'Baccalaureat C', '0', 'Niveau 2', NULL, '694168634', NULL, 'juliocesarkenfacktale@gmail.com', '', '', 'Des informations relatives à l\'emploi', '', '', '', '', '', 'Trouvé un emploi', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5977, 'NGUEGOM FANKAM', 'Merveil Rodolpho', 'Homme', '0000-00-00', 'Banka-Bafang', 2, 0, 1, 0, 26, 11, 1, 'LICENCE', '0', NULL, NULL, '691638986', NULL, 'merveilrodolpho96@gmail.com', '', '', 'Mon dynamisme et mon savoir faire ', '', '', '', '', '', 'La création des liens entre les différentes générations et partage d\'expérience et des opportunités', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5978, 'Dapsie', 'Adonis Ledoux', 'Homme', '0000-00-00', 'Nkongsamba', 0, 0, 1, 0, 0, 11, 1, 'LICENCE', '0', NULL, NULL, '676165327', NULL, 'Ledoux.patcom@gmail.com', '', '', 'En proposer une offre ou publier ce qui me semble utile pour le groupe', '', '', '', '', '', 'Occasionnels offres d\'emploi ou toutes autres informations utiles', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5979, 'TANDOUM BIAMOU', 'Arnaud Aurélien', 'Homme', '0000-00-00', 'Douala', 1, 0, 2, 0, 20, 5, 5, 'Master', '0', 'IT-Analyst', NULL, '696336463', NULL, 'arnaud.biamou@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5980, 'Nouachi Fongang ', 'Celin ', 'Homme', '0000-00-00', 'Yaoundé ', 7, 0, 8, 0, 26, 11, 1, 'Ingénieur ', '0', NULL, NULL, '696180707/ 672499669', NULL, 'joelcelin7@gmail.com', '', '', 'Rien  pour le moment ', '', '', '', '', '', 'Nous  donne  des  opportunités d\'emploi ', 1, 'actif', 1, '0', 0, 0, '', '0000-00-00 00:00:00'),
(5981, 'ABBO', NULL, 'male', '2021-10-04', NULL, 0, 0, 0, 0, 1, 1, 0, '', '0', NULL, NULL, NULL, NULL, 'abdulkadirabbo01@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '436f0fc191b63789a649be3953d134c2', '2021-10-04 17:08:19'),
(5982, 'ABBO', NULL, 'male', '2021-10-07', NULL, 0, 0, 0, 0, 1, 1, 0, '', '0', NULL, NULL, NULL, NULL, 'djaafarabbo99@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, 'b56539df5e0448c22763d6f4182922c4', '2021-10-07 22:44:59'),
(5983, 'ALI BABA', NULL, 'male', '2021-10-07', NULL, 0, 0, 0, 0, 1, 1, 0, '', '0', NULL, NULL, NULL, NULL, 'khaled.rahul96@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '4900b20016b110abde68d4909dc777a6', '2021-10-07 22:46:34'),
(5984, 'DJERADE GOLBE PARFAIT', NULL, 'male', '2021-10-08', NULL, 0, 0, 0, 0, 1, 1, 0, '', '0', NULL, NULL, NULL, NULL, 'djeradegolbeparfait@gmail.com', '', '', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '19e19d99e3fd4b341b610618a15f21d1', '2021-10-08 11:30:23'),
(5989, 'BSM', 'bsm', 'male', '2022-08-30', NULL, 0, 0, 0, 0, 1, 1, 0, '', '0', NULL, NULL, NULL, NULL, 'bsmlancer@gmail.com', '$2y$10$oXGX5NSFq6fWun9uARm2kuZQtLvbvFmVWihbA6tgXeAC7VELTSd8K', 'bfkfbkf', NULL, '', '', '', '', '', NULL, 1, 'actif', 1, '0', 0, 0, '0b2d3a5fe3750fa9275d0fb2d78de9fa', '2022-08-30 17:24:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`idAnnonces`);

--
-- Index pour la table `apropos`
--
ALTER TABLE `apropos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniidblog` (`uniidblog`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `idUsers` (`idUsers`),
  ADD KEY `idBlog` (`idBlog`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idCompte`),
  ADD KEY `idRole` (`idRole`);

--
-- Index pour la table `dernierdiplome`
--
ALTER TABLE `dernierdiplome`
  ADD PRIMARY KEY (`idDD`);

--
-- Index pour la table `dut`
--
ALTER TABLE `dut`
  ADD PRIMARY KEY (`idDUT`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idE`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFaq`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infosite`
--
ALTER TABLE `infosite`
  ADD PRIMARY KEY (`idInfo`);

--
-- Index pour la table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`idLI`);

--
-- Index pour la table `obtentiondut`
--
ALTER TABLE `obtentiondut`
  ADD PRIMARY KEY (`idODUT`);

--
-- Index pour la table `obtentionlicence`
--
ALTER TABLE `obtentionlicence`
  ADD PRIMARY KEY (`idOL`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Index pour la table `promotiondut`
--
ALTER TABLE `promotiondut`
  ADD PRIMARY KEY (`idPDUT`);

--
-- Index pour la table `promotionlicence`
--
ALTER TABLE `promotionlicence`
  ADD PRIMARY KEY (`idPLI`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idReponse`),
  ADD KEY `idComment` (`idComment`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `rubrique`
--
ALTER TABLE `rubrique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `situation`
--
ALTER TABLE `situation`
  ADD PRIMARY KEY (`idS`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`idSlider`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD PRIMARY KEY (`idSuivre`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD KEY `situation` (`situation`),
  ADD KEY `promotionDUT` (`promotionDUT`),
  ADD KEY `promotionLicence` (`promotionLicence`),
  ADD KEY `dut` (`dut`),
  ADD KEY `licence` (`licence`),
  ADD KEY `optentionDUT` (`obtentionDUT`),
  ADD KEY `optentionLicence` (`obtentionLicence`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `idAnnonces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `apropos`
--
ALTER TABLE `apropos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `idCompte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `dernierdiplome`
--
ALTER TABLE `dernierdiplome`
  MODIFY `idDD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `dut`
--
ALTER TABLE `dut`
  MODIFY `idDUT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT pour la table `infosite`
--
ALTER TABLE `infosite`
  MODIFY `idInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `licence`
--
ALTER TABLE `licence`
  MODIFY `idLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `obtentiondut`
--
ALTER TABLE `obtentiondut`
  MODIFY `idODUT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `obtentionlicence`
--
ALTER TABLE `obtentionlicence`
  MODIFY `idOL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `promotiondut`
--
ALTER TABLE `promotiondut`
  MODIFY `idPDUT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT pour la table `promotionlicence`
--
ALTER TABLE `promotionlicence`
  MODIFY `idPLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `situation`
--
ALTER TABLE `situation`
  MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `idSlider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `suivre`
--
ALTER TABLE `suivre`
  MODIFY `idSuivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5990;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`uniidblog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`idComment`) REFERENCES `commentaire` (`idComment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`situation`) REFERENCES `situation` (`idS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`promotionDUT`) REFERENCES `promotiondut` (`idPDUT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`promotionLicence`) REFERENCES `promotionlicence` (`idPLI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`dut`) REFERENCES `dut` (`idDUT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`licence`) REFERENCES `licence` (`idLI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_7` FOREIGN KEY (`obtentionDUT`) REFERENCES `obtentiondut` (`idODUT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_8` FOREIGN KEY (`obtentionLicence`) REFERENCES `obtentionlicence` (`idOL`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
