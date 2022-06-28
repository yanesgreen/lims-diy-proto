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

 Date: 05/01/2022 14:45:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pangkat
-- ----------------------------
DROP TABLE IF EXISTS `pangkat`;
CREATE TABLE `pangkat`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pangkat
-- ----------------------------
INSERT INTO `pangkat` VALUES (1, 'Brigadir Jenderal Polisi (Brigjen Pol)', 'Brigjen Pol', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (2, 'Komisaris Besar Polisi (Kombes Pol)', 'Kombes Pol', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (3, 'Ajun Komisaris Besar Polisi (AKBP)', 'AKBP', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (4, 'Komisaris Polisi (Kompol)', 'Kompol', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (5, 'Ajun Komisaris Polisi (AKP)', 'AKP', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (6, 'Inspektur Polisi Satu (IPTU)', 'IPTU', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (7, 'Inspektur Polisi Dua (IPDA)', 'IPDA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (8, 'Ajun Inspektur Polisi Satu (AIPTU)', 'AIPTU', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (9, 'Ajun Inspektur Polisi Dua (AIPDA)', 'AIPDA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (10, 'Brigadir Polisi Kepala (BRIPKA)', 'BRIPKA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (11, 'Brigadir Polisi (BRIGPOL)', 'BRIGPOL', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (12, 'Brigadir Polisi Satu (BRIPTU)', 'BRIPTU', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (13, 'Brigadir Polisi Dua (BRIPDA)', 'BRIPDA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (14, 'Ajun Brigadir Polisi (ABRIP)', 'ABRIP', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (15, 'Ajun Brigadir Polisi Satu (ABRIPTU)', 'ABRIPTU', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (16, 'Ajun Brigadir Polisi Dua (ABRIPDA)', 'ABRIPDA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (17, 'Bhayangkara Kepala (BHARAKA)', 'BHARAKA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (18, 'Bhayangkara Satu (BHARATU)', 'BHARATU', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (19, 'Bhayangkara Dua (BHARADA)', 'BHARADA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (20, 'Pembina Utama (IV E)', 'PEMBINAUTAMA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (21, 'Pembina Utama Madya (IV D)', 'PEMBINAUTAMAMADYA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (22, 'Pembina Utama Muda (IV C)', 'PEMBINAUTAMAMUDA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (23, 'Pembina Tingkat 1 (IV B)', 'PEMBINA 1', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (24, 'Pembina (IV A)', 'PEMBINA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (25, 'Penata Tingkat 1 (III D)', 'PENATA 1', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (26, 'Penata (III C)', 'PENATA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (27, 'Penata Muda Tingkat 1 (III B)', 'PENATAMUDA I', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (28, 'Penata Muda (III A)', 'PENATAMUDA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (29, 'Pengatur Tingkat 1 (II D)', 'PENGATUR I', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (30, 'Pengatur (II C)', 'PENGATUR', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (31, 'Pengatur Muda Tingkat 1 (II B)', 'PENGATURMUDA I', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (32, 'Pengatur Muda (II A)', 'PENGATURMUDA', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (33, 'Juru Tingkat 1 (I D) ', 'JURU I', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (34, 'Juru (I C)', 'JURU', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (35, 'Juru Muda Tingkat 1 (I B)', 'JURDA I', NULL, NULL, NULL);
INSERT INTO `pangkat` VALUES (36, 'Juru Muda (I A)', 'JURDA', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
