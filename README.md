# mibac-lombardia
Museo&amp;Web CMS upgrade from 1.4 to 2.0.4

#####=================	FILES DA OLD A NEW	=======================#####
MW\pageTypes\userModule_contatti.xml

#####=================	CLASSES  DA OLD A NEW	=======================#####
# CLASSES
MW\classes\userModules
MW\classes\dr


#####=================	NUOVI FILES	=======================#####
# Copiato file
MW/pageTypes/Home.xml => MW/pageTypes/Home_lombardia.xml
MW/pageTypes/Page.xml => MW/pageTypes/Page_lombardia.xml

# Copiato file
MW/startup/remap.php => MW/startup/remap_lombardia.php

# Creato file
admin/MW/startup/remap_lombardia.php 
(vedi 'rimappare classi' in: https://groups.google.com/forum/#!searchin/museoweb/rimappatura|sort:relevance/museoweb/BX3EEOqh56U/YqOY3h-Ow_QJ)


#####=================	RIMAPPARE FILES & CLASSI	=======================#####
# Creato file: MW/startup/remap_lombardia.php
org_glizy_ObjectFactory::remapPageType('Home.xml', 'Home_lombardia.xml');
org_glizy_ObjectFactory::remapPageType('Page.xml', 'Page_lombardia.xml');


#####=================	MySQL	=======================#####
# Create table mw_menucomments_tbl

-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2016 at 11:02 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lombardia-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `mw_menucomments_tbl`
--

CREATE TABLE IF NOT EXISTS `mw_menucomments_tbl` (
  `menucomment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menucomment_FK_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `menucomment_FK_menu_id` int(10) unsigned NOT NULL DEFAULT '0',
  `menucomment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `menucomment_text` longtext NOT NULL,
  PRIMARY KEY (`menucomment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mw_menucomments_tbl`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

