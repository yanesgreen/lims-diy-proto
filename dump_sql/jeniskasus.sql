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

 Date: 05/01/2022 14:45:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jeniskasus
-- ----------------------------
DROP TABLE IF EXISTS `jeniskasus`;
CREATE TABLE `jeniskasus`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jeniskasus
-- ----------------------------
INSERT INTO `jeniskasus` VALUES (1, 'Kebakaran', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (2, 'Kecelakaan Konstruksi', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (3, 'Kasus Deteksi Kebohongan', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (4, 'Kasus Komputer/Cyber', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (5, 'Penyalahgunaan Narkoba', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (6, 'Kasus Pemalsuan Dokumen', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (7, 'Kasus Uang Palsu', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (8, 'Kasus Produk Cetak', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (9, 'Penembakan', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (10, 'Ledakan Bom', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (11, 'Nomor Seri Kendaraan', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (12, 'Pembunuhan', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (13, 'Keracunan', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (14, 'Pemerkosaan', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (15, 'Pemalsuan Produk Industri', NULL, NULL, NULL);
INSERT INTO `jeniskasus` VALUES (16, 'Lain-lain', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
