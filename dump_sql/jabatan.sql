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

 Date: 05/01/2022 14:44:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `jabatan_nama_unique`(`nama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'Kepala Pusat Laboratorium Forensik', 'Kapuslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (2, 'Sekretaris Puslabfor', 'SES Puslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (3, 'Kabagjemen Mutu Puslabfor', 'Kabajemenmut Puslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (4, 'Kepala Bidang/Kepala Sub Bidang Puslabfor', 'Kabbid/Kasubbid Puslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (5, 'Kepala Sub Bagian Pembinaan Fungsi Puslabfor', 'Kasubbag Binfung Puslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (6, 'Kepala Urusan Administrasi Puslabfor', 'Kaurmin Puslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (7, 'Kepala Urusan Tata Usaha Puslabfor', 'Kaurtu Puslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (8, 'Staf Urusan Tata Usaha Puslabfor', 'Staf urtu Puslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (9, 'Administrator', 'Admin', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (10, 'Kepala Bidang Laboratorium Forensik Polda', 'Kabidlabfor Polda', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (11, 'Wakil Kepala Bidang Laboratorium Forensik Polda', 'Wakabidlabfor Polda', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (12, 'Kepala Sub Bagian Rencana Administrasi Bidang laboratorium Forensik Polda', 'Kasubbag Renmin Bidlabfor Polda', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (13, 'Kepala Sub Bidang Bidang Laboratorium Forensik Polda', 'Kasubbid Bidlabfor Polda', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (14, 'Kepala Urusan Administrasi Tata Usaha Bidang Laboratorium Forensik Polda', 'Kaurmintu Bidlabfor Polda', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (15, 'Staf Urusan Administrasi Tata Usaha Bidang Laboratorium Forensik Polda', 'Staf Urmintu Bidlabfor Polda', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (16, 'Kepala Urusan Administrasi', 'Kaurmin', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (17, 'Perwira Tata Usaha', 'Paur', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (18, 'Bantuan Umum Urusan Tata Usaha Puslabfor', 'Banum Urtu Set Puslabfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (19, 'Perwira Administrasi Deteksi Khusus Bidang Fiskomfor', 'Pamin Deteksus Bid Fiskomfor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (20, 'Bhayangkara Administrasi Bidang Narkobafor', 'Bamin Bid Narkobafor', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (21, 'Bhayangkara Pelaksana Sub Bidang Lakabakar', 'Bhayangkara Pelaksana Subbid Lakabakar', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
