CREATE TABLE IF NOT EXISTS `developers` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`status` ENUM('front-end', 'back-end', 'full-stack') NOT NULL DEFAULT 'front-end',
	PRIMARY KEY(`id`)
);


CREATE TABLE IF NOT EXISTS `tasks` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) NOT NULL,
	`description` TEXT(65535) NOT NULL,
	`priority` ENUM('low', 'middle', 'high') NOT NULL DEFAULT 'low',
	`status` ENUM('waiting', 'progress', 'done') NOT NULL DEFAULT 'waiting',
	`developer_id` BIGINT NOT NULL,
	`tags` JSON NOT NULL,
	PRIMARY KEY(`id`)
);


ALTER TABLE `tasks`
ADD FOREIGN KEY(`developer_id`) REFERENCES `developers`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;