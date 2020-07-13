CREATE TABLE `users` (
    `id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `user`  varchar(255) NOT NULL ,
    `pass`  varchar(255) NOT NULL ,
    `created_at`  timestamp NULL ,
    `updated_at`  timestamp NULL ,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `users_user` (`user`) USING BTREE 
);

INSERT INTO users SET id = 1, user = 'garupa', pass = '$2y$10$i/abVbNCcdHmO9K5kJ00Tu0k2zRu7FAWuAGgHRrL2UiG.PZOp2t7m', created_at = '2020-03-18 07:12:31', updated_at = '2020-03-18 07:12:31';
INSERT INTO users SET id = 2, user = 'garupa2', pass = '$2y$10$i/abVbNCcdHmO9K5kJ00Tu0k2zRu7FAWuAGgHRrL2UiG.PZOp2t7m', created_at = '2020-03-18 07:12:31', updated_at = '2020-03-18 07:12:31';