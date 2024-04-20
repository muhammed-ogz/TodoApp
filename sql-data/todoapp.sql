/*
 Navicat Premium Data Transfer

 Source Server         : mySQL-patika
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : todoapp

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 20/04/2024 17:17:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp,
  `updated_date` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 3, 'JavaScript', '2024-04-08 12:05:38', '2024-04-16 17:34:04');
INSERT INTO `categories` VALUES (2, 3, 'Yapılacak İşler', '2024-04-09 01:34:02', '2024-04-16 17:33:45');

-- ----------------------------
-- Table structure for todos
-- ----------------------------
DROP TABLE IF EXISTS `todos`;
CREATE TABLE `todos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `end_date` datetime NULL DEFAULT NULL,
  `start_date` datetime NULL DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp,
  `updated_date` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `progress` tinyint NULL DEFAULT NULL,
  `status` enum('a','p','s') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'a',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of todos
-- ----------------------------
INSERT INTO `todos` VALUES (22, 3, 1, 'NodeJS', 'NodeJS API bağlama öğrenilecek', '#00ff6e', '2024-04-09 00:38:00', '2024-04-09 00:38:00', '2024-04-09 01:38:06', '2024-04-16 17:39:21', 50, 's');
INSERT INTO `todos` VALUES (23, 3, 2, 'Deneme Todom', 'Deneme Todosu', '#b3704d', '2024-04-09 14:22:00', '2024-04-09 11:11:00', '2024-04-09 15:22:28', '2024-04-15 20:43:19', 42, 'a');
INSERT INTO `todos` VALUES (24, 3, 2, 'Yemek', 'Yemek yap', '#00ffff', '2024-04-09 14:23:13', '2024-04-09 14:23:13', '2024-04-09 15:23:13', '2024-04-09 15:23:13', 20, 'a');
INSERT INTO `todos` VALUES (25, 3, 2, 'Bu da başka todo', 'Todomun todosu godumun godu gibi bişey', '#800080', '2024-04-09 14:23:46', '2024-04-09 14:23:46', '2024-04-09 15:23:46', '2024-04-09 15:23:46', 83, 'a');
INSERT INTO `todos` VALUES (26, 3, 1, 'Js Çalış', 'Sonra pythona geçeceğim', '#007bff', '2024-04-09 14:24:00', '2024-04-09 14:24:00', '2024-04-09 15:24:14', '2024-04-16 17:40:18', 50, 's');
INSERT INTO `todos` VALUES (27, 3, 2, 'Bu da başka bir kategori', 'Kategorinin anası', '#e1ff00', '2024-04-09 14:24:00', '2024-04-09 14:24:00', '2024-04-09 15:24:29', '2024-04-16 17:41:58', 50, 's');
INSERT INTO `todos` VALUES (28, 3, 1, 'Js kategorisi', 'Deneme Kategorisinin todosu', '#007bff', '2024-04-09 14:24:45', '2024-04-09 14:24:45', '2024-04-09 15:24:45', '2024-04-09 15:24:45', 50, 'a');
INSERT INTO `todos` VALUES (29, 3, 2, 'Codeİgniter ile proje', 'Codeİgniter ile proje', '#ca35a9', '2024-04-25 16:25:00', '2024-04-09 15:25:00', '2024-04-09 15:25:54', '2024-04-09 15:25:54', 21, 's');
INSERT INTO `todos` VALUES (30, 3, 2, 'todo15', 'Biraz daha todo ekleyim proje için', '#007bff', '2024-04-09 14:26:00', '2024-04-09 14:26:00', '2024-04-09 15:26:38', '2024-04-09 15:38:06', 50, 'p');
INSERT INTO `todos` VALUES (31, 3, 1, 'Axios', 'Projeye axios eklenecek', '#1eff00', '2024-04-15 19:42:33', '2024-04-15 19:42:33', '2024-04-15 20:42:33', '2024-04-15 20:42:33', 18, 'a');
INSERT INTO `todos` VALUES (32, 3, 2, 'Alışveriş', 'Kayseri Grosstan alışveriş işlemi yapılacak', '#80ff00', '2024-04-16 16:35:29', '2024-04-16 16:35:29', '2024-04-16 17:35:29', '2024-04-16 17:35:29', 68, 's');
INSERT INTO `todos` VALUES (33, 3, 1, 'React', 'Reac Native Öğrenilecek', '#ff0000', '2024-05-12 00:41:00', '2024-04-16 16:36:02', '2024-04-16 17:36:02', '2024-04-16 17:36:02', 0, 'a');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT ' ',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_move` datetime NULL DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp,
  `updated_date` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (3, 'Muhammed', 'Oğuz', 'muhammedoguz@gmail.com', '0ba0dd14265fced34a1202aeced9f02d', NULL, '2024-04-08 11:31:43', '2024-04-18 12:49:42');

SET FOREIGN_KEY_CHECKS = 1;
