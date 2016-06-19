-- --------------------------------------------------------
--
-- Table structure for table `battle_tags`
--
CREATE TABLE IF NOT EXISTS `battle_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tag` varchar(256) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `failed_logins`
--
CREATE TABLE IF NOT EXISTS `failed_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `hearthstone_cards`
--
-- This table holds all of the cards in Hearthstone
-- it is populated from an API
--
CREATE TABLE IF NOT EXISTS `hearthstone_cards`(
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `card_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `card_set` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `faction` varchar(100) DEFAULT NULL,
  `rarity` varchar(100) DEFAULT NULL,
  `cost` int(100) DEFAULT NULL,
  `attack` int(100) DEFAULT NULL,
  `health` int(100) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `elite` varchar(100) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `img_gold` varchar(500) DEFAULT NULL,
  `collectible` tinyint(1) DEFAULT NULL,
  `player_class` varchar(100) DEFAULT NULL,
  `locale` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `hearthstone_decks`
--
CREATE TABLE IF NOT EXISTS `hearthstone_decks_cards`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hearthstone_card_id` int(11) NOT NULL,
  `hearthstone_deck_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `hearthstone_decks`
--
CREATE TABLE IF NOT EXISTS `hearthstone_decks`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `complete` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
ALTER TABLE `hearthstone_decks` ADD COLUMN `name` varchar(50) NOT NULL AFTER `user_id`;
-- --------------------------------------------------------
--
-- Table structure for table `hots_logs`
--
CREATE TABLE IF NOT EXISTS `hots_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `battle_tag_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `hl_mmr` int(5) NOT NULL,
  `qm_mmr` int(5) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Tables for SteamIds
--
CREATE TABLE IF NOT EXISTS `steam_ids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `steam_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preferred_contact` int(11) DEFAULT NULL COMMENT 'The id of the preferred contact',
  `account_status` int(2) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `last_access` datetime DEFAULT NULL,
  `reset_hash` varchar(256) DEFAULT NULL,
  `reset_time` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `user_contacts`
--
CREATE TABLE IF NOT EXISTS `user_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_contact_id` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `notes` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `user_emails`
--
CREATE TABLE IF NOT EXISTS `user_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL COMMENT 'i.e. Home Phone, Skype',
  `email` varchar(256) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;