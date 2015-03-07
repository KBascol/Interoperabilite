-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 07 Mars 2015 à 06:58
-- Version du serveur: 5.5.32
-- Version de PHP: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Structure de la table `Lieu`
--

DROP TABLE IF EXISTS `Lieu`;
CREATE TABLE IF NOT EXISTS `Lieu` (
  `id_lieu` int(11) NOT NULL AUTO_INCREMENT,
  `lng_lieu` double NOT NULL,
  `lat_lieu` double NOT NULL,
  `nom_lieu` varchar(250) NOT NULL,
  `adresse_lieu` varchar(1024) NOT NULL,
  `type_lieu` enum('library','movie_theater','bar','restaurant') NOT NULL,
  PRIMARY KEY (`id_lieu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
