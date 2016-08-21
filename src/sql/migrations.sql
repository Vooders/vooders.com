-- Add mumble id to users table
ALTER TABLE `users` ADD COLUMN `mumble_id` int(11) NULL NULL AFTER `last_access`;