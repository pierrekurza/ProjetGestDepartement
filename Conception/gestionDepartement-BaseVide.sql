-- phpMyAdmin SQL Dump
-- version 4.2.12deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 03 Février 2016 à 08:32
-- Version du serveur :  5.5.40-1
-- Version de PHP :  5.6.2-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestionDepartement`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
`id` bigint(20) NOT NULL,
  `datas_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11287 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `boss`
--

CREATE TABLE IF NOT EXISTS `boss` (
`id` bigint(20) NOT NULL,
  `groupe_id` bigint(20) DEFAULT NULL,
  `teacher_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3386 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `coefficient`
--

CREATE TABLE IF NOT EXISTS `coefficient` (
`id` bigint(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `type` varchar(2) NOT NULL,
  `coef` float(18,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`id` bigint(20) NOT NULL,
  `utilisateurcrous_id` bigint(20) NOT NULL,
  `produit_id` bigint(20) NOT NULL,
  `nb` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`id` bigint(20) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `module` varchar(255) NOT NULL,
  `description` text,
  `nbcmhours` float(18,2) DEFAULT NULL,
  `nbtdhours` float(18,2) DEFAULT NULL,
  `nbtphours` float(18,2) DEFAULT NULL,
  `nbgcm` bigint(20) DEFAULT NULL,
  `nbgtd` bigint(20) DEFAULT NULL,
  `nbgtp` bigint(20) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `comment` text,
  `subject_id` bigint(20) DEFAULT NULL,
  `traininginfo_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52039 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `datas`
--

CREATE TABLE IF NOT EXISTS `datas` (
`id` bigint(20) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `piece` varchar(255) NOT NULL,
  `justified` tinyint(1) NOT NULL,
  `etudiant_id` bigint(20) DEFAULT NULL,
  `lesson_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11467 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `delay`
--

CREATE TABLE IF NOT EXISTS `delay` (
`id` bigint(20) NOT NULL,
  `minuts` bigint(20) DEFAULT NULL,
  `datas_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

CREATE TABLE IF NOT EXISTS `devoir` (
`id` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `coef` double(20,18) NOT NULL,
  `jour` date DEFAULT NULL,
  `final` bigint(20) NOT NULL,
  `limite` int(11) NOT NULL,
  `evaluation_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devoirlesson`
--

CREATE TABLE IF NOT EXISTS `devoirlesson` (
`id` bigint(20) NOT NULL,
  `devoir_id` bigint(20) NOT NULL,
  `lesson_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

CREATE TABLE IF NOT EXISTS `disponibilite` (
`id` bigint(20) NOT NULL,
  `teacher_id` bigint(20) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `jour` varchar(20) NOT NULL,
  `h8` bigint(20) NOT NULL,
  `h9` bigint(20) NOT NULL,
  `h10` bigint(20) NOT NULL,
  `h11` bigint(20) NOT NULL,
  `h12` bigint(20) NOT NULL,
  `h13` bigint(20) NOT NULL,
  `h14` bigint(20) NOT NULL,
  `h15` bigint(20) NOT NULL,
  `h16` bigint(20) NOT NULL,
  `h17` bigint(20) NOT NULL,
  `comment` text
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
`id` bigint(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `adr` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `apogee` varchar(100) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1020 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
`id` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `groupe_id` bigint(20) NOT NULL,
  `teacher_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
`id` bigint(20) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `semester` varchar(30) NOT NULL,
  `surgroupe` bigint(20) DEFAULT NULL,
  `nbgroupes` bigint(20) NOT NULL,
  `defaulttype` varchar(5) NOT NULL,
  `maingroupe` varchar(20) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5030 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingroup`
--

CREATE TABLE IF NOT EXISTS `ingroup` (
`id` bigint(20) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `etudiant_id` bigint(20) NOT NULL,
  `groupe_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1091 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `knoweval`
--

CREATE TABLE IF NOT EXISTS `knoweval` (
`id` bigint(20) NOT NULL,
  `evaluation_id` bigint(20) NOT NULL,
  `teacher_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
`id` bigint(20) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `num` bigint(20) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `duration` bigint(20) DEFAULT NULL,
  `manual` tinyint(1) DEFAULT '1',
  `color` varchar(10) DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `teacher_id` bigint(20) DEFAULT NULL,
  `groupe_id` bigint(20) DEFAULT NULL,
  `room_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25436 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
`id` bigint(20) NOT NULL,
  `note` double(18,2) DEFAULT NULL,
  `etudiant_id` bigint(20) NOT NULL,
  `devoir_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=722 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
`id` bigint(20) NOT NULL,
  `teacher_id` bigint(20) DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `cm` float(18,2) DEFAULT NULL,
  `td` float(18,2) DEFAULT NULL,
  `tp` float(18,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6295 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
`id` bigint(20) NOT NULL,
  `principal` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pwdabsence`
--

CREATE TABLE IF NOT EXISTS `pwdabsence` (
`id` bigint(20) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`id` bigint(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `dept` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3048 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
`id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
`id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3410 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
`id` bigint(20) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `absences_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2151 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`id` bigint(20) NOT NULL,
  `shortname` varchar(30) DEFAULT NULL,
  `cnu` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52028 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`id` bigint(20) NOT NULL,
  `shortname` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `cnu` bigint(20) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `dept` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3337 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `traininginfo`
--

CREATE TABLE IF NOT EXISTS `traininginfo` (
`id` bigint(20) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `training` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `ue` varchar(255) DEFAULT NULL,
  `nbgcm` int(11) DEFAULT NULL,
  `nbgtd` int(11) DEFAULT NULL,
  `nbgtp` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50007 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurcrous`
--

CREATE TABLE IF NOT EXISTS `utilisateurcrous` (
`id` bigint(20) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `week`
--

CREATE TABLE IF NOT EXISTS `week` (
`id` bigint(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `students` date DEFAULT NULL,
  `teachers` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `weekcomment`
--

CREATE TABLE IF NOT EXISTS `weekcomment` (
`id` bigint(20) NOT NULL,
  `teacher_id` bigint(20) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `comment` text,
  `week` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
 ADD PRIMARY KEY (`id`), ADD KEY `datas_id_idx` (`datas_id`);

--
-- Index pour la table `boss`
--
ALTER TABLE `boss`
 ADD PRIMARY KEY (`id`), ADD KEY `groupe_id_idx` (`groupe_id`), ADD KEY `teacher_id_idx` (`teacher_id`);

--
-- Index pour la table `coefficient`
--
ALTER TABLE `coefficient`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`id`), ADD KEY `utilisateurcrous_id_idx` (`utilisateurcrous_id`), ADD KEY `produit_id_idx` (`produit_id`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`id`), ADD KEY `subject_id_idx` (`subject_id`), ADD KEY `traininginfo_id_idx` (`traininginfo_id`);

--
-- Index pour la table `datas`
--
ALTER TABLE `datas`
 ADD PRIMARY KEY (`id`), ADD KEY `etudiant_id_idx` (`etudiant_id`), ADD KEY `lesson_id_idx` (`lesson_id`);

--
-- Index pour la table `delay`
--
ALTER TABLE `delay`
 ADD PRIMARY KEY (`id`), ADD KEY `datas_id_idx` (`datas_id`);

--
-- Index pour la table `devoir`
--
ALTER TABLE `devoir`
 ADD PRIMARY KEY (`id`), ADD KEY `evaluation_id_idx` (`evaluation_id`);

--
-- Index pour la table `devoirlesson`
--
ALTER TABLE `devoirlesson`
 ADD PRIMARY KEY (`id`), ADD KEY `devoir_id_idx` (`devoir_id`), ADD KEY `lesson_id_idx` (`lesson_id`);

--
-- Index pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
 ADD PRIMARY KEY (`id`), ADD KEY `teacher_id_idx` (`teacher_id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `course_id` (`course_id`), ADD KEY `course_id_idx` (`course_id`), ADD KEY `groupe_id_idx` (`groupe_id`), ADD KEY `teacher_id_idx` (`teacher_id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingroup`
--
ALTER TABLE `ingroup`
 ADD PRIMARY KEY (`id`), ADD KEY `etudiant_id_idx` (`etudiant_id`), ADD KEY `groupe_id_idx` (`groupe_id`);

--
-- Index pour la table `knoweval`
--
ALTER TABLE `knoweval`
 ADD PRIMARY KEY (`id`), ADD KEY `evaluation_id_idx` (`evaluation_id`), ADD KEY `teacher_id_idx` (`teacher_id`);

--
-- Index pour la table `lesson`
--
ALTER TABLE `lesson`
 ADD PRIMARY KEY (`id`), ADD KEY `course_id_idx` (`course_id`), ADD KEY `groupe_id_idx` (`groupe_id`), ADD KEY `room_id_idx` (`room_id`), ADD KEY `teacher_id_idx` (`teacher_id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
 ADD PRIMARY KEY (`id`), ADD KEY `etudiant_id_idx` (`etudiant_id`), ADD KEY `devoir_id_idx` (`devoir_id`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
 ADD PRIMARY KEY (`id`), ADD KEY `teacher_id_idx` (`teacher_id`), ADD KEY `course_id_idx` (`course_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pwdabsence`
--
ALTER TABLE `pwdabsence`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id_idx` (`user_id`);

--
-- Index pour la table `sf_guard_group`
--
ALTER TABLE `sf_guard_group`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
 ADD PRIMARY KEY (`group_id`,`permission_id`), ADD KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`);

--
-- Index pour la table `sf_guard_permission`
--
ALTER TABLE `sf_guard_permission`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id_idx` (`user_id`);

--
-- Index pour la table `sf_guard_user`
--
ALTER TABLE `sf_guard_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_address` (`email_address`), ADD UNIQUE KEY `username` (`username`), ADD KEY `is_active_idx_idx` (`is_active`);

--
-- Index pour la table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
 ADD PRIMARY KEY (`user_id`,`group_id`), ADD KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`);

--
-- Index pour la table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
 ADD PRIMARY KEY (`user_id`,`permission_id`), ADD KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`);

--
-- Index pour la table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `shortname` (`shortname`);

--
-- Index pour la table `traininginfo`
--
ALTER TABLE `traininginfo`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurcrous`
--
ALTER TABLE `utilisateurcrous`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `week`
--
ALTER TABLE `week`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `dept` (`dept`);

--
-- Index pour la table `weekcomment`
--
ALTER TABLE `weekcomment`
 ADD PRIMARY KEY (`id`), ADD KEY `teacher_id_idx` (`teacher_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11287;
--
-- AUTO_INCREMENT pour la table `boss`
--
ALTER TABLE `boss`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3386;
--
-- AUTO_INCREMENT pour la table `coefficient`
--
ALTER TABLE `coefficient`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52039;
--
-- AUTO_INCREMENT pour la table `datas`
--
ALTER TABLE `datas`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11467;
--
-- AUTO_INCREMENT pour la table `delay`
--
ALTER TABLE `delay`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT pour la table `devoir`
--
ALTER TABLE `devoir`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `devoirlesson`
--
ALTER TABLE `devoirlesson`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1020;
--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5030;
--
-- AUTO_INCREMENT pour la table `ingroup`
--
ALTER TABLE `ingroup`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1091;
--
-- AUTO_INCREMENT pour la table `knoweval`
--
ALTER TABLE `knoweval`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `lesson`
--
ALTER TABLE `lesson`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25436;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=722;
--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6295;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `pwdabsence`
--
ALTER TABLE `pwdabsence`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3048;
--
-- AUTO_INCREMENT pour la table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sf_guard_group`
--
ALTER TABLE `sf_guard_group`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `sf_guard_permission`
--
ALTER TABLE `sf_guard_permission`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3410;
--
-- AUTO_INCREMENT pour la table `sf_guard_user`
--
ALTER TABLE `sf_guard_user`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2151;
--
-- AUTO_INCREMENT pour la table `subject`
--
ALTER TABLE `subject`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52028;
--
-- AUTO_INCREMENT pour la table `teacher`
--
ALTER TABLE `teacher`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3337;
--
-- AUTO_INCREMENT pour la table `traininginfo`
--
ALTER TABLE `traininginfo`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50007;
--
-- AUTO_INCREMENT pour la table `utilisateurcrous`
--
ALTER TABLE `utilisateurcrous`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `week`
--
ALTER TABLE `week`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `weekcomment`
--
ALTER TABLE `weekcomment`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
ADD CONSTRAINT `absenceFK` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `boss`
--
ALTER TABLE `boss`
ADD CONSTRAINT `boss_groupe_id_groupe_id` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`),
ADD CONSTRAINT `boss_teacher_id_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
ADD CONSTRAINT `course_subject_id_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
ADD CONSTRAINT `course_traininginfo_id_traininginfo_id` FOREIGN KEY (`traininginfo_id`) REFERENCES `traininginfo` (`id`);

--
-- Contraintes pour la table `datas`
--
ALTER TABLE `datas`
ADD CONSTRAINT `datasFK` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `delay`
--
ALTER TABLE `delay`
ADD CONSTRAINT `retardFK` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
ADD CONSTRAINT `devoir_evaluation_id_evaluation_id` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluation` (`id`);

--
-- Contraintes pour la table `devoirlesson`
--
ALTER TABLE `devoirlesson`
ADD CONSTRAINT `devoirlesson_devoir_id_devoir_id` FOREIGN KEY (`devoir_id`) REFERENCES `devoir` (`id`),
ADD CONSTRAINT `devoirlesson_lesson_id_lesson_id` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`);

--
-- Contraintes pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
ADD CONSTRAINT `disponibilite_teacher_id_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
ADD CONSTRAINT `evaluation_course_id_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
ADD CONSTRAINT `evaluation_groupe_id_groupe_id` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`),
ADD CONSTRAINT `evaluation_teacher_id_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);

--
-- Contraintes pour la table `ingroup`
--
ALTER TABLE `ingroup`
ADD CONSTRAINT `ingroupFK` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `knoweval`
--
ALTER TABLE `knoweval`
ADD CONSTRAINT `knoweval_evaluation_id_evaluation_id` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluation` (`id`),
ADD CONSTRAINT `knoweval_teacher_id_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);

--
-- Contraintes pour la table `lesson`
--
ALTER TABLE `lesson`
ADD CONSTRAINT `lesson_groupe_id_groupe_id` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`),
ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
ADD CONSTRAINT `lesson_room_id_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
ADD CONSTRAINT `lesson_teacher_id_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
ADD CONSTRAINT `note_devoir_id_devoir_id` FOREIGN KEY (`devoir_id`) REFERENCES `devoir` (`id`),
ADD CONSTRAINT `note_etudiant_id_etudiant_id` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
ADD CONSTRAINT `planning_course_id_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
ADD CONSTRAINT `planning_teacher_id_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);

--
-- Contraintes pour la table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `weekcomment`
--
ALTER TABLE `weekcomment`
ADD CONSTRAINT `weekcomment_teacher_id_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
