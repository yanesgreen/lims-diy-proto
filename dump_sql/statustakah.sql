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

 Date: 05/01/2022 14:47:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for statustakah
-- ----------------------------
DROP TABLE IF EXISTS `statustakah`;
CREATE TABLE `statustakah`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of statustakah
-- ----------------------------
INSERT INTO `statustakah` VALUES (1, 'diterima urtu', 'Diterima Urtu.', NULL, NULL);
INSERT INTO `statustakah` VALUES (2, 'diserahkan ke kaurmin', 'Diterima Urtu.', NULL, NULL);
INSERT INTO `statustakah` VALUES (3, 'siap diserahkan ke urtu', 'Proses Pemeriksaan Laboratoris.', NULL, NULL);
INSERT INTO `statustakah` VALUES (4, 'diserahkan ke urtu', 'Barang bukti sudah selesai. Pemeriksaan telah selesai dan BAP laboratoris berikut barang bukti telah diserahkan ke Urtu. Siap diambil.', NULL, NULL);
INSERT INTO `statustakah` VALUES (5, 'siap diserahkan ke penyidik', 'Barang bukti sudah selesai. Pemeriksaan telah selesai dan BAP laboratoris berikut barang bukti telah diserahkan ke Urtu. Siap diambil.', NULL, NULL);
INSERT INTO `statustakah` VALUES (6, 'diserahkan ke penyidik', 'Barang bukti sudah selesai. Pemeriksaan telah selesai dan BAP laboratoris berikut barang bukti telah diserahkan ke Urtu. Siap diambil.', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
