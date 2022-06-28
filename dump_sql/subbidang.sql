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

 Date: 05/01/2022 14:47:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for subbidang
-- ----------------------------
DROP TABLE IF EXISTS `subbidang`;
CREATE TABLE `subbidang`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of subbidang
-- ----------------------------
INSERT INTO `subbidang` VALUES (1, 'Sub Bidang Dokumen', 'Biddokupalfor', 'DTF', 1, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (2, 'Sub Bidang Uang Palsu', 'Subbidupal', 'DUF', 1, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (3, 'Sub Bidang Produk Cetak', 'Subbidprodcet', 'DCF', 1, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (4, 'Sub Bidang Senjata Api', 'Subbidsenpi', 'BSF', 2, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (5, 'Sub Bidang Bahan Peledak', 'Subbidhandak', 'BHF', 2, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (6, 'Sub Bidang Metalurgi', 'Subbidmetal', 'BMF', 2, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (7, 'Sub Bidang Deteksi Khusus', 'Subbiddeteksus', 'FDF', 3, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (8, 'Sub Bidang Kecelakaan dan Kebakaran/ Pembakaran', 'Subbidlakabakar', 'FBF', 3, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (9, 'Sub Bidang Komputer Forensik', 'Subbidkomfor', 'FKF', 3, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (10, 'Sub Bidang Kimia', 'Subbidkim', 'KKF', 4, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (11, 'Sub Bidang Biologi dan Serologi', 'Subbidbioser', 'KBF', 4, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (12, 'Sub Bidang Toksikologi dan Lingkungan', 'Subbidtokling', 'KTF', 4, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (13, 'Sub Bidang Narkotika', 'Subbidnarko', 'NNF', 5, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (14, 'Sub Bidang Psikotropika', 'Subbidpsiko', 'NPF', 5, NULL, NULL, NULL);
INSERT INTO `subbidang` VALUES (15, 'Sub Bidang Obat Berbahaya', 'Subbidbaya', 'NOF', 5, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
