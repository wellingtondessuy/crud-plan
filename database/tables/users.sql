/*
Navicat MySQL Data Transfer

Source Server         : plan
Source Server Version : 50648
Source Host           : localhost:3306
Source Database       : plan

Target Server Type    : MYSQL
Target Server Version : 50648
File Encoding         : 65001

Date: 2020-07-13 11:30:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `profile_photo_file_id` int(10) unsigned DEFAULT NULL,
  `removed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'wellington dessuy de almeida', 'wellington.dessuy@outlook.com', null, '51997502428', null, '0', null, null);
INSERT INTO `users` VALUES ('3', null, null, '$2y$10$mgPDwrwBH04A1c7LHNyR6uy9wVzFTyGiMLoAuDKFzYvPC1WyYNdnK', null, null, '0', '2020-07-13 14:20:47', '2020-07-13 14:20:47');
INSERT INTO `users` VALUES ('4', 'gkjhgkjhg', 'kjhgkjhgk', '$2y$10$HkQem0mS9P8x2zTCvMg6ouYa0dBZTLAPzz.EvQqcaWb23qeT4hXw6', 'gkjhgj', null, '0', '2020-07-13 14:23:48', '2020-07-13 14:23:48');
