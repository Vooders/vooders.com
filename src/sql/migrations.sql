-- Add mumble id to users table
ALTER TABLE `users` ADD COLUMN `mumble_id` int(11) NULL NULL AFTER `last_access`;
-- --------------------------------------------------
--
CREATE TABLE IF NOT EXISTS `chats`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `text` varchar(700) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
-- 
INSERT INTO `chats` (`id`, `author`, `text`) 
	VALUES (1, 'vooders', 'hello world');
INSERT INTO `chats` (`id`, `author`, `text`) 
	VALUES (1, 'dude', 'hello');
--
-- -----------------------------------------
-- User Levels 
--
ALTER TABLE `users` ADD `admin` tinyint(1) NOT NULL DEFAULT 0 AFTER `id`;