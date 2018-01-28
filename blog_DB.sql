/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-28 21:25:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `articlesId` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `articlesTitle` varchar(455) DEFAULT NULL,
  `articlesBody` text,
  `created_at` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1- active | 0- inactive',
  PRIMARY KEY (`articlesId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', 'admin', '1', 'test', '<p>test</p>', '2018-01-27 22:26:33', '2018-01-27 22:26:33', '1');
INSERT INTO `articles` VALUES ('2', 'admin', '3', 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2018-01-27 22:51:43', '2018-01-28 19:24:56', '1');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryTitle` varchar(455) CHARACTER SET utf8 DEFAULT NULL,
  `at_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1- active | 0- inactive',
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'technology', '2018-01-27 17:22:59', '1');
INSERT INTO `category` VALUES ('3', 'news', '2018-01-27 22:50:42', '1');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `commentsId` int(11) NOT NULL AUTO_INCREMENT,
  `articlesId` int(11) DEFAULT NULL,
  `visitor_name` varchar(455) CHARACTER SET utf8 DEFAULT NULL,
  `comment` text CHARACTER SET utf8,
  `at_time` datetime DEFAULT NULL,
  PRIMARY KEY (`commentsId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '2', 'mahmoud', 'test comment', '2018-01-27 23:40:05');
INSERT INTO `comments` VALUES ('2', '2', 'mahmoud', 'test 2', '2018-01-27 23:42:22');
INSERT INTO `comments` VALUES ('3', '2', 'mahmoud', 'test 2', '2018-01-27 23:43:34');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', '79ey3CuKiQ', 'info@admin.com');
