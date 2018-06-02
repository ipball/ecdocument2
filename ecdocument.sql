/*
 Navicat Premium Data Transfer

 Source Server         : bahtSoft
 Source Server Type    : MariaDB
 Source Server Version : 50556
 Source Host           : 128.199.173.141:3306
 Source Schema         : ecdocument

 Target Server Type    : MariaDB
 Target Server Version : 50556
 File Encoding         : 65001

 Date: 03/06/2018 00:43:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'ทดสอบ');
INSERT INTO `categories` VALUES (2, 'ทดสอบ 02');
INSERT INTO `categories` VALUES (3, 'ทดสอบ 03');

-- ----------------------------
-- Table structure for documents
-- ----------------------------
DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_date` timestamp(0) DEFAULT NULL,
  `status` enum('normal','canceled','lost') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `documents_code_no_unique`(`code_no`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of documents
-- ----------------------------
INSERT INTO `documents` VALUES (3, 'DF4444777', 'dkdkdkdk', 'ST02', 'MS0837', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'documents/HcVvRr6iQRxIS7JnQjCF7PEfyfoFEq0XQGZsX5r2.pdf', '2018-06-02 00:00:00', 'normal', 2, 2, 3, '2018-06-02 00:23:14', '2018-06-02 00:27:37');
INSERT INTO `documents` VALUES (4, 'RT3243424', 'DS3242424234', 'DDDD', NULL, NULL, 'documents/901MPDHCQnagS4DBbH9y4Eas2hczvqd4INsr3ild.pdf', '2018-06-03 00:00:00', 'normal', 2, NULL, 3, '2018-06-03 00:37:37', '2018-06-03 00:37:37');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2018_05_17_181821_create_categories_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_05_17_182335_create_documents_table', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` enum('member','moderator','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'tawatsak', '$2y$10$xty4iFRTu7lFQbQ5Ed5uW.oJTYFnDWPPPtTSfhRbM8pcAw6WrN21m', 'itoffside@hotmail.com', 'Tawatsak Tangeaim', 'MD', 'kXobpua6vGxv9Lr3VhtaqhRcgVAFjmxhFcQGrIcnQtmF3ZVM4bWyVC6l1YUW', '2018-05-30 21:48:57', 'admin', '2018-05-30 21:48:57', '2018-06-01 21:15:15');
INSERT INTO `users` VALUES (3, 'test01', '$2y$10$dgDq21zqCkHsinwcxxhkteCca3pHXPQIROsE49BjONdGlkL0Jb0cq', 'eeeing@hotmail.com', 'อิงดาว', 'MIS', '23RoGZEKo4ANXpxGNKm3VhGWS0ewOLHfhqt1PA0zbhcHq4yIJ5B7VFzOTycb', '2018-06-01 22:25:28', 'member', '2018-06-01 22:25:28', '2018-06-02 01:37:24');

SET FOREIGN_KEY_CHECKS = 1;
