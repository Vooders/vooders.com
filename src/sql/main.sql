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
--  Overwatch stat table
--
CREATE TABLE IF NOT EXISTS `overwatch_all_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `game_mode_id` int(11) NOT NULL,
  `melee_final_blows` int(11) NOT NULL,
  `solo_kills` int(11) NOT NULL,
  `objective_kills` int(11) NOT NULL,
  `final_blows` int(11) NOT NULL,
  `damage_done` int(11) NOT NULL,
  `eliminations` int(11) NOT NULL,
  `environmental_kills` int(11) NOT NULL,
  `multikills` int(11) NOT NULL,
  `healing_done` int(11) NOT NULL,
  `recon_assists` int(11) NOT NULL,
  `teleporter_pads_destroyed` int(11) NOT NULL,
  `eliminations_mostin_game` int(11) NOT NULL,
  `final_blows_mostin_game` int(11) NOT NULL,
  `damage_done_mostin_game` int(11) NOT NULL,
  `healing_done_mostin_game` int(11) NOT NULL,
  `defensive_assists_mostin_game` int(11) NOT NULL,
  `offensive_assists_mostin_game` int(11) NOT NULL,
  `objective_kills_mostin_game` int(11) NOT NULL,
  `objective_time_mostin_game` varchar(20) NOT NULL,
  `multikill_best` int(11) NOT NULL,
  `solo_kills_mostin_game` int(11) NOT NULL,
  `time_spenton_fire_mostin_game` varchar(20) NOT NULL,
  `melee_final_blows_average` float(11) NOT NULL,
  `final_blows_average` float(11) NOT NULL,
  `time_spenton_fire_average` varchar(20) NOT NULL,
  `solo_kills_average` float(11) NOT NULL,
  `objective_time_average` varchar(20) NOT NULL,
  `objective_kills_average` float(11) NOT NULL,
  `healing_done_average` int(11) NOT NULL,
  `deaths_average` float(11) NOT NULL,
  `damage_done_average` int(11) NOT NULL,
  `eliminations_average` float(11) NOT NULL,
  `deaths` int(11) NOT NULL,
  `environmental_deaths` int(11) NOT NULL,
  `cards` int(11) NOT NULL,
  `medals` int(11) NOT NULL,
  `medals_gold` int(11) NOT NULL,
  `medals_silver` int(11) NOT NULL,
  `medals_bronze` int(11) NOT NULL,
  `games_won` int(11) NOT NULL,
  `games_played` int(11) NOT NULL,
  `time_spenton_fire` varchar(20) NOT NULL,
  `objective_time` varchar(20) NOT NULL,
  `time_played` varchar(50) NOT NULL,
  `melee_final_blows_mostin_game` int(11) NOT NULL,
  `defensive_assists` int(11) NOT NULL,
  `defensive_assists_average` float(11) NOT NULL,
  `offensive_assists` int(11) NOT NULL,
  `offensive_assists_average` float(11) NOT NULL,
  `recon_assists_average` int(11) NOT NULL,
  `recon_assists_mostin_game` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
--  Overwatch lucio stat table
--
CREATE TABLE IF NOT EXISTS `overwatch_lucio_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `game_mode_id` int(11) NOT NULL,
  `SoundBarriersProvided` int(11) NOT NULL,
  `SoundBarriersProvided-MostinGame` int(11) NOT NULL,
  `SoundBarriersProvided-Average` float(11) NOT NULL,
  `eliminations` int(11) NOT NULL,
  `final_blows` int(11) NOT NULL,
  `solo_kills` int(11) NOT NULL,
  `damage_done` int(11) NOT NULL,
  `objective_kills` int(11) NOT NULL,
  `environmental_kills` int(11) NOT NULL,
  `critical_hits` int(11) NOT NULL,
  `critical_hits_accuracy` varchar(20) NOT NULL,
  `eliminations_per_life` float(20) NOT NULL,
  `weapon_accuracy` varchar(50) NOT NULL,
  `healing_done` int(11) NOT NULL,
  `self_healing` int(11) NOT NULL,
  `eliminations_mostin_life` int(11) NOT NULL,
  `damage_done_mostin_life` int(11) NOT NULL,
  `healing_done_mostin_life` int(11) NOT NULL,
  `damage_done_mostin_game` int(11) NOT NULL,
  `healing_done_mostin_game` int(11) NOT NULL,
  `eliminations_mostin_game` int(11) NOT NULL,
  `final_blows_mostin_game` int(11) NOT NULL,
  `objective_kills_mostin_game` int(11) NOT NULL,
  `objective_time_mostin_game` varchar(20) NOT NULL,
  `solo_kills_mostin_game` int(11) NOT NULL,
  `critical_hits_mostin_game` int(11) NOT NULL,
  `critical_hits_mostin_life` int(11) NOT NULL,
  `self_healing_mostin_game` int(11) NOT NULL,
  `deaths_average` float(11) NOT NULL,
  `solo_kills_average` float(11) NOT NULL,
  `objective_time_average` varchar(20) NOT NULL,
  `objective_kills_average` float(11) NOT NULL,
  `healing_done_average` int(11) NOT NULL,
  `final_blows_average` float(11) NOT NULL,
  `eliminations_average` float(11) NOT NULL,
  `damage_done_average` int(11) NOT NULL,
  `deaths` int(11) NOT NULL,
  `medals_gold` int(11) NOT NULL,
  `medals_silver` int(11) NOT NULL,
  `medals_bronze` int(11) NOT NULL,
  `cards` int(11) NOT NULL,
  `medals` int(11) NOT NULL,
  `time_played` varchar(50) NOT NULL,
  `games_played` int(11) NOT NULL,
  `games_won` int(11) NOT NULL,
  `objective_time` varchar(20) NOT NULL,
  `time_spenton_fire` varchar(20) NOT NULL,
  `win_percentage` varchar(10) NOT NULL,
  `offensive_assists` int(11) NOT NULL,
  `offensive_assists_mostin_game` int(11) NOT NULL,
  `defensive_assists` int(11) NOT NULL,
  `defensive_assists_mostin_game` int(11) NOT NULL,
  `defensive_assists_average` float(11) NOT NULL,
  `offensive_assists_average` float(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
--  Overwatch Junkrat stat table
--
CREATE TABLE IF NOT EXISTS `overwatch_junkrat_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `game_mode_id` int(11) NOT NULL,
  `EnemiesTrapped_MostinGame` int(11) NOT NULL,
  `EnemiesTrapped` int(11) NOT NULL,
  `RIP_TireKills_MostinGame` int(11) NOT NULL,
  `RIP_TireKills` int(11) NOT NULL,
  `EnemiesTrappedaMinute` int(11) NOT NULL,
  `Eliminations` int(11) NOT NULL,
  `FinalBlows` int(11) NOT NULL,
  `SoloKills` int(11) NOT NULL,
  `DamageDone` int(11) NOT NULL,
  `ObjectiveKills` int(11) NOT NULL,
  `Multikill` varchar(50) NOT NULL,
  `EliminationsperLife` int(10) NOT NULL,
  `WeaponAccuracy` varchar(50) NOT NULL,
  `HealingDone` int(11) NOT NULL,
  `Eliminations_MostinLife` int(11) NOT NULL,
  `DamageDone_MostinLife` int(11) NOT NULL,
  `HealingDone_MostinLife` int(11) NOT NULL,
  `KillStreak_Best` int(11) NOT NULL,
  `DamageDone_MostinGame` int(11) NOT NULL,
  `HealingDone_MostinGame` int(11) NOT NULL,
  `Eliminations_MostinGame` int(11) NOT NULL,
  `FinalBlows_MostinGame` int(11) NOT NULL,
  `ObjectiveKills_MostinGame` int(11) NOT NULL,
  `ObjectiveTime_MostinGame` varchar(20) NOT NULL,
  `SoloKills_MostinGame` int(11) NOT NULL,
  `Deaths_Average` float(11) NOT NULL,
  `SoloKills_Average` float(11) NOT NULL,
  `ObjectiveTime_Average` varchar(20)

    NOT NULL,
  `ObjectiveKills_Average` float(11) NOT NULL,
  `HealingDone_Average` float(11) NOT NULL,
  `FinalBlows_Average` float(11) NOT NULL,
  `Eliminations_Average` float(11) NOT NULL,
  `DamageDone_Average` int(11) NOT NULL,
  `Deaths` int(11) NOT NULL,
  `Medals_Gold` int(11) NOT NULL,
  `Medals_Silver` int(11) NOT NULL,
  `Medals_Bronze` int(11) NOT NULL,
  `Cards` int(11) NOT NULL,
  `Medals` int(11) NOT NULL,
  `TimePlayed` varchar(50) NOT NULL,
  `GamesPlayed` int(11) NOT NULL,
  `GamesWon` int(11) NOT NULL,
  `ObjectiveTime` varchar(20) NOT NULL,
  `TimeSpentonFire` varchar(20) NOT NULL,
  `WinPercentage` varchar(10) NOT NULL,
  `Multikill_Best` int(10) NOT NULL,
  `RIP_TireKills_Average` float(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
--  Overwatch McCree stat table
--
CREATE TABLE IF NOT EXISTS `overwatch_mccree_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `game_mode_id` int(11) NOT NULL,
  `deadeye_kills` int(11) NOT NULL,
  `deadeye_kills_mostin_game` int(11) NOT NULL,
  `fan_the_hammer_kills` int(11) NOT NULL,
  `fan_the_hammer_kills_average` float(11) NOT NULL,
  `deadeye_kills_average` float(11) NOT NULL,
  `eliminations` int(11) NOT NULL,
  `final_blows` int(11) NOT NULL,
  `solo_kills` int(11) NOT NULL,
  `damage_done` int(11) NOT NULL,
  `critical_hits` int(11) NOT NULL,
  `critical_hits_accuracy` varchar(20) NOT NULL,
  `objective_kills` int(11) NOT NULL,
  `eliminations_per_life` float(20) NOT NULL,
  `eliminations_mostin_life` int(11) NOT NULL,
  `damage_done_mostin_life` int(11) NOT NULL,
  `damage_done_mostin_game` int(11) NOT NULL,
  `eliminations_mostin_game` int(11) NOT NULL,
  `final_blows_mostin_game` int(11) NOT NULL,
  `objective_kills_mostin_game` int(11) NOT NULL,
  `objective_time_mostin_game` varchar(20) NOT NULL,
  `solo_kills_mostin_game` int(11) NOT NULL,
  `critical_hits_mostin_game` int(11) NOT NULL,
  `critical_hits_mostin_life` int(11) NOT NULL,
  `deaths_average` float(11) NOT NULL,
  `solo_kills_average` float(11) NOT NULL,
  `objective_time_average` varchar(20) NOT NULL,
  `objective_kills_average` float(11) NOT NULL,
  `final_blows_average` float(11) NOT NULL,
  `eliminations_average` float(11) NOT NULL,
  `damage_done_average` int(11) NOT NULL,
  `deaths` int(11) NOT NULL,
  `medals_gold` int(11) NOT NULL,
  `medals_silver` int(11) NOT NULL,
  `medals_bronze` int(11) NOT NULL,
  `cards` int(11) NOT NULL,
  `medals` int(11) NOT NULL,
  `time_played` varchar(50) NOT NULL,
  `games_played` int(11) NOT NULL,
  `games_won` int(11) NOT NULL,
  `objective_time` varchar(20) NOT NULL,
  `time_spenton_fire` varchar(20) NOT NULL,
  `win_percentage` varchar(10) NOT NULL,
  `fan_the_hammer_kills_mostin_game` int(11) NOT NULL,
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