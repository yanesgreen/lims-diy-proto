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

 Date: 05/01/2022 14:45:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lembaga
-- ----------------------------
DROP TABLE IF EXISTS `lembaga`;
CREATE TABLE `lembaga`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of lembaga
-- ----------------------------
INSERT INTO `lembaga` VALUES (1, 'BNN', NULL, NULL, NULL);
INSERT INTO `lembaga` VALUES (2, 'Kejaksaan', NULL, NULL, NULL);
INSERT INTO `lembaga` VALUES (3, 'KPK', NULL, NULL, NULL);
INSERT INTO `lembaga` VALUES (4, 'Polisi Militer', NULL, NULL, NULL);
INSERT INTO `lembaga` VALUES (5, 'Pengadilan', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
