/*
 Navicat Premium Data Transfer

 Source Server         : Mysql-3306
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : smile_v1

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 05/01/2022 14:46:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for satker
-- ----------------------------
DROP TABLE IF EXISTS `satker`;
CREATE TABLE `satker`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of satker
-- ----------------------------
INSERT INTO `satker` VALUES (1, 'Direktorat Tipidter Bareskrim', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (2, 'Direktorat Tipidum Bareskrim', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (3, 'Direktorat Tipideksus Bareskrim', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (4, 'Direktorat Tipidkor Bareskrim', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (5, 'Direktorat Tipidnarkoba Bareskrim', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (6, 'Direktorat Tipidsiber Bareskrim', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (7, 'Dipropam Polri', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (8, 'DIrektorat Polisi Perairan Baharkam', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (9, 'Detasemen Khusus 88 Anti Teror', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
