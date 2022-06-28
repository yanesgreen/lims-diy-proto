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

 Date: 05/01/2022 14:43:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bidang
-- ----------------------------
DROP TABLE IF EXISTS `bidang`;
CREATE TABLE `bidang`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `bidang_nama_unique`(`nama`) USING BTREE,
  UNIQUE INDEX `bidang_singkatan_unique`(`singkatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bidang
-- ----------------------------
INSERT INTO `bidang` VALUES (1, 'Dokumen dan Uang Palsu Forensik', 'DOKUPALFOR', NULL, NULL, NULL);
INSERT INTO `bidang` VALUES (2, 'Balistik dan Metalurgi Forensik', 'BALMETFOR', NULL, NULL, NULL);
INSERT INTO `bidang` VALUES (3, 'Fisika dan Komputer Forensik', 'FISKOMFOR', NULL, NULL, NULL);
INSERT INTO `bidang` VALUES (4, 'Kimia dan Biologi Forensik', 'KIMBIOFOR', NULL, NULL, NULL);
INSERT INTO `bidang` VALUES (5, 'Narkotika dan Obat Berbahaya Forensik', 'NARKOBAFOR', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
