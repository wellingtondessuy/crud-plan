CREATE TABLE `actions` (
    `id`  bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `user_id`  int(10) UNSIGNED NOT NULL ,
    `action`  enum('LIKE','DISLIKE') NOT NULL ,
    `created_at`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`),
    CONSTRAINT `actions_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    INDEX `actions_action` (`action`) USING BTREE 
);