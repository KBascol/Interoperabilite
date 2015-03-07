-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 07 Mars 2015 à 06:50
-- Version du serveur: 5.5.32
-- Version de PHP: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Structure de la table `Vote`
--

DROP TABLE IF EXISTS `Vote`;
CREATE TABLE IF NOT EXISTS `Vote` (
  `id_vote` int(11) NOT NULL AUTO_INCREMENT,
  `nom_lieu` varchar(255) NOT NULL,
  `total_vote` int(11) NOT NULL,
  PRIMARY KEY (`id_vote`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `VoteIp`
--

DROP TABLE IF EXISTS `VoteIp`;
CREATE TABLE IF NOT EXISTS `VoteIp` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;