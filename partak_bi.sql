/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 80034
 Source Host           : localhost:3306
 Source Schema         : partak_bi

 Target Server Type    : MySQL
 Target Server Version : 80034
 File Encoding         : 65001

 Date: 09/06/2024 14:50:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `primary_color` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `secondary_color` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `subdomain` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `api` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `group_id` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `company_to_company_group`(`group_id` ASC) USING BTREE,
  CONSTRAINT `company_to_company_group` FOREIGN KEY (`group_id`) REFERENCES `companies_group` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (1, 'پارتاک', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `companies` VALUES (2, 'ارتباط پیشگام سبزنت', '#00c800', '#008200', '1', 'sabznet', NULL, 'Servlet.png', 'توضیحی ندارد', 1, NULL, NULL);

-- ----------------------------
-- Table structure for companies_group
-- ----------------------------
DROP TABLE IF EXISTS `companies_group`;
CREATE TABLE `companies_group`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies_group
-- ----------------------------
INSERT INTO `companies_group` VALUES (1, 'گروه طلایی', '1');

-- ----------------------------
-- Table structure for companies_group_indicator
-- ----------------------------
DROP TABLE IF EXISTS `companies_group_indicator`;
CREATE TABLE `companies_group_indicator`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `indicator_id` int NULL DEFAULT NULL,
  `company_group_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `indicator_index`(`indicator_id` ASC) USING BTREE,
  INDEX `company_group_index`(`company_group_id` ASC) USING BTREE,
  CONSTRAINT `company_group_access_to_company_group` FOREIGN KEY (`company_group_id`) REFERENCES `companies_group` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `company_group_access_to_indicator` FOREIGN KEY (`indicator_id`) REFERENCES `indicators` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies_group_indicator
-- ----------------------------
INSERT INTO `companies_group_indicator` VALUES (1, 1, 1);

-- ----------------------------
-- Table structure for graphs
-- ----------------------------
DROP TABLE IF EXISTS `graphs`;
CREATE TABLE `graphs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of graphs
-- ----------------------------
INSERT INTO `graphs` VALUES (1, 'bar', 'میله ای');
INSERT INTO `graphs` VALUES (2, 'line', 'خطی');
INSERT INTO `graphs` VALUES (3, 'pie', 'کیک');
INSERT INTO `graphs` VALUES (4, 'radar', 'رادار');
INSERT INTO `graphs` VALUES (5, 'timeline', 'زمان');

-- ----------------------------
-- Table structure for indicators
-- ----------------------------
DROP TABLE IF EXISTS `indicators`;
CREATE TABLE `indicators`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `indicator_group_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `indicator_to_indicator_group`(`indicator_group_id` ASC) USING BTREE,
  CONSTRAINT `indicator_to_indicator_group` FOREIGN KEY (`indicator_group_id`) REFERENCES `indicators_group` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of indicators
-- ----------------------------
INSERT INTO `indicators` VALUES (1, 'شاخص وضعیت', '1', 1);

-- ----------------------------
-- Table structure for indicators_graph
-- ----------------------------
DROP TABLE IF EXISTS `indicators_graph`;
CREATE TABLE `indicators_graph`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `indicator_id` int NULL DEFAULT NULL,
  `graph_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `indicator_index`(`indicator_id` ASC) USING BTREE,
  INDEX `graph_index`(`graph_id` ASC) USING BTREE,
  CONSTRAINT `indicators_graph_to_graphs` FOREIGN KEY (`graph_id`) REFERENCES `graphs` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `indicators_graph_to_indicators` FOREIGN KEY (`indicator_id`) REFERENCES `indicators` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of indicators_graph
-- ----------------------------
INSERT INTO `indicators_graph` VALUES (1, 1, 1);
INSERT INTO `indicators_graph` VALUES (2, 1, 2);
INSERT INTO `indicators_graph` VALUES (3, 1, 3);
INSERT INTO `indicators_graph` VALUES (4, 1, 4);

-- ----------------------------
-- Table structure for indicators_group
-- ----------------------------
DROP TABLE IF EXISTS `indicators_group`;
CREATE TABLE `indicators_group`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of indicators_group
-- ----------------------------
INSERT INTO `indicators_group` VALUES (1, 'مشتریان');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `route` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `indicator_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menus_to_indicator`(`indicator_id` ASC) USING BTREE,
  CONSTRAINT `menus_to_indicator` FOREIGN KEY (`indicator_id`) REFERENCES `indicators` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'service', 'stack', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `company_id` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_to_company`(`company_id` ASC) USING BTREE,
  CONSTRAINT `user_to_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'یوزر پارتاک', 'partak', '$2y$10$DDsvWVjNyS7G4CAs6N9alOzwbRKVCJ/DMh3HVKzajz34cPdyFPbCi', '1', 1, NULL, NULL);
INSERT INTO `users` VALUES (2, 'طه حاجی وند', 'taha', '$2y$10$rhwWOLxbrkWfP3tKM.2gxe8pTpKeC1qNdKox4xQxOk/lVgcif2OWS', '1', 2, '2024-06-09 14:31:46', '2024-06-09 14:31:46');

SET FOREIGN_KEY_CHECKS = 1;
