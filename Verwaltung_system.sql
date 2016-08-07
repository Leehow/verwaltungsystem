-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 07. Aug 2016 um 17:30
-- Server Version: 5.5.50-0ubuntu0.14.04.1
-- PHP-Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `Verwaltung_system`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Amtsperiode`
--

CREATE TABLE IF NOT EXISTS `Amtsperiode` (
  `A_id` int(11) NOT NULL AUTO_INCREMENT,
  `Beginn` text NOT NULL,
  `Ende` text NOT NULL,
  PRIMARY KEY (`A_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `Amtsperiode`
--

INSERT INTO `Amtsperiode` (`A_id`, `Beginn`, `Ende`) VALUES
(1, '01.10.2015', '01.03.2016'),
(2, '01.04.2016', '01.09.2016'),
(3, '01.10.2016', '01.03.2017');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Fachschaft`
--

CREATE TABLE IF NOT EXISTS `Fachschaft` (
  `F_id` int(11) NOT NULL AUTO_INCREMENT,
  `Bezeichnung` text NOT NULL,
  PRIMARY KEY (`F_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `Fachschaft`
--

INSERT INTO `Fachschaft` (`F_id`, `Bezeichnung`) VALUES
(1, 'Informatik'),
(2, 'Maschinenbau'),
(3, 'Mathematik'),
(4, 'Medizin'),
(5, 'Wirtschaftwissenschaften'),
(6, 'Naturwissenschaften');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Gremium`
--

CREATE TABLE IF NOT EXISTS `Gremium` (
  `G_id` int(11) NOT NULL AUTO_INCREMENT,
  `Bezeichnung` text NOT NULL,
  `Beschreibungsfeld` text NOT NULL,
  PRIMARY KEY (`G_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `Gremium`
--

INSERT INTO `Gremium` (`G_id`, `Bezeichnung`, `Beschreibungsfeld`) VALUES
(1, 'STuRa', 'Studentenrat'),
(2, 'FSR:Informatik', ''),
(3, 'FSR:Maschinenbau', ''),
(4, 'FSR:Mathematik', ''),
(5, 'FSR:Medizin', ''),
(6, 'FSR:Wirtschaftwissenschaften', ''),
(7, 'FSR:Naturwissenschaften', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Nutzer`
--

CREATE TABLE IF NOT EXISTS `Nutzer` (
  `Nutzer_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `zugriff` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Nutzer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Daten für Tabelle `Nutzer`
--

INSERT INTO `Nutzer` (`Nutzer_id`, `username`, `password`, `zugriff`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 2),
(10, 'zxv', '202cb962ac59075b964b07152d234b70', 1),
(11, 'thomas', '202cb962ac59075b964b07152d234b70', 1),
(12, 'bill', '202cb962ac59075b964b07152d234b70', 1),
(13, 'yichen', '202cb962ac59075b964b07152d234b70', 1),
(14, 'hao', '202cb962ac59075b964b07152d234b70', 1),
(15, 'bill', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(16, 'bettina', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(17, 'ccc', '202cb962ac59075b964b07152d234b70', 1),
(18, 'aaa', '5e543256c480ac577d30f76f9120eb74', 1),
(19, 'wer', '7681a3cf456258cf6d29f3b7fb1f702b', 1),
(20, 'asd', '202cb962ac59075b964b07152d234b70', 1),
(21, 'admin2', '202cb962ac59075b964b07152d234b70', 2),
(23, '1', 'c4ca4238a0b923820dcc509a6f75849b', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Person`
--

CREATE TABLE IF NOT EXISTS `Person` (
  `P_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `Nutzer_id` int(11) NOT NULL COMMENT '用户表id',
  `Name` varchar(20) NOT NULL COMMENT '姓',
  `Vorname` varchar(20) NOT NULL COMMENT '名',
  `Matrikelnr` int(11) DEFAULT NULL COMMENT '学号',
  `F_id` int(11) NOT NULL COMMENT 'fachschaft id',
  `F_vonbis` int(11) NOT NULL COMMENT 'fach时间',
  `G_id` int(11) NOT NULL COMMENT 'gremien id',
  `G_vonbis` int(11) NOT NULL COMMENT 'gremien时间',
  `Status` int(11) NOT NULL COMMENT '注释',
  `S_grund` text COMMENT '原因',
  `S_Datum` text COMMENT '时间',
  PRIMARY KEY (`P_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `Person`
--

INSERT INTO `Person` (`P_id`, `Nutzer_id`, `Name`, `Vorname`, `Matrikelnr`, `F_id`, `F_vonbis`, `G_id`, `G_vonbis`, `Status`, `S_grund`, `S_Datum`) VALUES
(1, 11, 'Thomas', 'Edison', 100001, 3, 1, 4, 1, 3, 'Krankenheit', '11.11.2015'),
(2, 12, 'Bill', 'Gates', 100002, 4, 1, 5, 2, 2, 'Fachwechsel', '01.11.2016'),
(3, 13, 'Yichen', 'Wang', 100003, 1, 1, 1, 1, 1, '', ''),
(4, 14, 'Hao', 'Li', 100004, 1, 1, 2, 1, 1, 'Krankenheit', '11.11.2015'),
(5, 15, 'Bill', 'Gates', 100005, 4, 1, 5, 2, 2, 'Fachwechsel', '01.11.2016'),
(6, 16, 'Bettina', 'Kehr', 100006, 5, 3, 1, 3, 1, 'Krankenheit', '11.11.2015');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
