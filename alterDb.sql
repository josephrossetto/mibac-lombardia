--
-- Altered tables with the following sql:
--


ALTER TABLE mw_menudetails_tbl ADD COLUMN media_linkImage  int (10) unsigned NOT NULL DEFAULT '' after menudetail_linkDescription
ALTER TABLE mw_competitiondetails_tbl ADD COLUMN competitiondetail_isPublished  tinyInt (1) NOT NULL DEFAULT 1
ALTER TABLE mw_eventsdetails_tbl ADD COLUMN eventdetail_endDate  Date() Default 0000-00-00
ALTER TABLE mw_eventsdetails_tbl ADD COLUMN eventdetail_isLittaEvent tinyInt (1) NOT NULL DEFAULT 0 AFTER eventdetail_FK_language_id
ALTER TABLE mw_eventsdetails_tbl ADD COLUMN eventdetail_shortDescription longtext NOT NULL DEFAULT 0 AFTER eventdetail_description
ALTER TABLE mw_media_tbl ADD COLUMN media_isHomeSlideshow tinyInt (1) NOT NULL DEFAULT 0 AFTER after media_type
ALTER TABLE mw_media_tbl ADD COLUMN media_linktitle  longtext NOT NULL
ALTER TABLE mw_media_tbl ADD COLUMN media_FK_language_id  int (11) unsigned NOT NULL DEFAULT '1' after media_id




--
-- Duplicated and renamed tables by adding prefix dr_ to existing tables (mw_competitiondetails_tbl, mw_eventsdetails_tbl and mw_media_tbl)
-- with the following sql:
--


--
-- Table structure for table `dr_mw_competitiondetails_tbl`
--

CREATE TABLE IF NOT EXISTS `dr_mw_competitiondetails_tbl` (
  `competitiondetail_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `competitiondetail_FK_competition_id` int(11) unsigned NOT NULL DEFAULT '0',
  `competitiondetail_FK_language_id` int(11) unsigned NOT NULL DEFAULT '0',
  `competitiondetail_FK_user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `competitiondetail_versionDate` date NOT NULL DEFAULT '0000-00-00',
  `competitiondetail_versionStatus` enum('PUBLISHED','DRAFT','OLD') NOT NULL DEFAULT 'DRAFT',
  `competitiondetail_title` varchar(255) NOT NULL DEFAULT '',
  `competitiondetail_type` varchar(255) NOT NULL DEFAULT '',
  `competitiondetail_duedate` date NOT NULL DEFAULT '0000-00-00',
  `competitiondetail_pubdate` date NOT NULL DEFAULT '0000-00-00',
  `competitiondetail_office` varchar(255) NOT NULL DEFAULT '',
  `competitiondetail_info` longtext NOT NULL,
  `competitiondetail_note` longtext NOT NULL,
  `competitiondetail_url` varchar(255) NOT NULL DEFAULT '',
  `competitiondetail_numdate` varchar(255) NOT NULL DEFAULT '',
  `competitiondetail_auction` varchar(255) NOT NULL DEFAULT '',
  `competitiondetail_decree` varchar(255) NOT NULL DEFAULT '',
  `competitiondetail_isPublished` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`competitiondetail_id`),
  KEY `competitiondetail_FK_competition_id` (`competitiondetail_FK_competition_id`),
  KEY `competitiondetail_FK_language_id` (`competitiondetail_FK_language_id`),
  KEY `competitiondetail_FK_user_id` (`competitiondetail_FK_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


--
-- Table structure for table `dr_mw_eventsdetails_tbl`
--

CREATE TABLE IF NOT EXISTS `dr_mw_eventsdetails_tbl` (
  `eventdetail_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `eventdetail_FK_event_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventdetail_FK_language_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventdetail_isLittaEvent` tinyint(1) NOT NULL DEFAULT '0',
  `eventdetail_title` varchar(255) NOT NULL DEFAULT '',
  `eventdetail_description` longtext NOT NULL,
  `eventdetail_shortDescription` longtext NOT NULL,
  `eventdetail_email` varchar(100) NOT NULL DEFAULT '',
  `eventdetail_url` varchar(255) NOT NULL DEFAULT '',
  `eventdetail_place` longtext NOT NULL,
  `eventdetail_date` varchar(255) NOT NULL DEFAULT '',
  `eventdetail_endDate` date DEFAULT '0000-00-00',
  `eventdetail_image` int(10) unsigned NOT NULL DEFAULT '0',
  `eventdetail_year` int(4) unsigned NOT NULL DEFAULT '0',
  `eventdetail_promoter` varchar(255) NOT NULL DEFAULT '',
  `eventdetail_category` varchar(255) NOT NULL DEFAULT '',
  `eventdetail_versionDate` date NOT NULL DEFAULT '0000-00-00',
  `eventdetail_versionStatus` enum('PUBLISHED','DRAFT','OLD') NOT NULL DEFAULT 'DRAFT',
  `eventdetail_FK_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventdetail_realDate` date NOT NULL DEFAULT '0000-00-00',
  `eventdetail_inHome` tinyint(1) NOT NULL DEFAULT '1',
  `eventdetail_inHomeOrder` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventdetail_id`),
  KEY `eventdetail_FK_event_id` (`eventdetail_FK_event_id`),
  KEY `eventdetail_FK_language_id` (`eventdetail_FK_language_id`),
  KEY `eventdetail_FK_user_id` (`eventdetail_FK_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;


--
-- Table structure for table `dr_mw_media_tbl`
--

CREATE TABLE IF NOT EXISTS `dr_mw_media_tbl` (
  `media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_FK_language_id` int(11) unsigned NOT NULL DEFAULT '1',
  `media_creationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `media_modificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `media_fileName` varchar(255) NOT NULL DEFAULT '',
  `media_title` varchar(255) NOT NULL DEFAULT '',
  `media_size` int(4) unsigned NOT NULL DEFAULT '0',
  `media_FK_user_id` int(11) NOT NULL DEFAULT '0',
  `media_type` enum('IMAGE','OFFICE','PDF','ARCHIVE','FLASH','AUDIO','VIDEO','OTHER') NOT NULL DEFAULT 'IMAGE',
  `media_isHomeSlideshow` tinyint(1) NOT NULL DEFAULT '0',
  `media_category` varchar(255) NOT NULL DEFAULT '',
  `media_author` varchar(255) NOT NULL DEFAULT '',
  `media_date` varchar(100) NOT NULL DEFAULT '',
  `media_originalFileName` varchar(255) NOT NULL DEFAULT '',
  `media_copyright` varchar(255) NOT NULL DEFAULT '',
  `media_zoom` tinyint(1) NOT NULL DEFAULT '0',
  `media_linktitle` longtext NOT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

