DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `due_date` date DEFAULT NULL,
  `status` enum('active','completed') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'test', 'test@example.com', '$2y$10$XFXvmaCwELULGFt.omQlEeSOkC.Kxy/Eu1QCSIt4ulrArwK8yDDfi', '2026-05-26 09:25:57');