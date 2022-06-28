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

 Date: 05/01/2022 14:44:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jenisbb
-- ----------------------------
DROP TABLE IF EXISTS `jenisbb`;
CREATE TABLE `jenisbb`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bidang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `jenisbb_nama_unique`(`nama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jenisbb
-- ----------------------------
INSERT INTO `jenisbb` VALUES (1, 'Dokumen yang Diduga Palsu', NULL, 1, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (2, 'Produk Cetak yang Diduga Palsu', NULL, 1, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (3, 'Uang yang Diduga Palsu', NULL, 1, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (4, 'Residu Penembakan', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (5, 'Nomor Seri', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (6, 'Kerusakan/Kegagalan Konstruksi Logam', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (7, 'Pemalsuan Kualitas Logam dan Barang Tambang', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (8, 'Senjata Api', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (9, 'Peluru', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (10, 'Anak Peluru', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (11, 'Selongsong Peluru', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (12, 'Gun Shot Residu (GSR)', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (13, 'Komponen Bom', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (14, 'Row Material', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (15, 'Bahan Peledak', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (16, 'Pure Teknik ( Petasan, kembang api, dll)', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (17, 'Kendaran R2 dan R4 (Noka, Nosin dan Blok Mesin)', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (18, 'Bahan Tambang', NULL, 2, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (19, 'Komputer/Laptop/Server', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (20, 'Handphone/Smartphone/Tablet/Sim Card', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (21, 'Social Media/Email Account', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (22, 'Smart Devices', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (23, 'Memory Card', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (24, 'Card Reader / Writter', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (25, 'Audio Recorder / Rekaman Audio', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (26, 'Kamera/Video Digital', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (27, 'Gambar Digital', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (28, 'Harddisk External', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (29, 'CD/DVD', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (30, 'Flashdisk', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (31, 'DV AR/Perekam Digital', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (32, 'Router/Switch', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (33, 'Abu Bakar/Sisa Kebakaran', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (34, 'Kabel Instalasi Listrik', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (35, 'Kotak Kontak', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (36, 'Peralatan Listrik', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (37, 'Jejak Kaki', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (38, 'Tool Mark', NULL, 3, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (39, 'Darah', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (40, 'Sativa', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (41, 'Gigi', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (42, 'Tulang', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (43, 'Urine', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (44, 'Organ Tubuh Hewan', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (45, 'Organ Dalam Manusia', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (46, 'Cairan', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (47, 'Limbah Cair', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (48, 'Limbah Padat', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (49, 'Kosmetik', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (50, 'Jamu', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (51, 'Tumbuh-tumbuhan', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (52, 'Mikroorganisme', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (53, 'Rambut', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (54, 'Sperma', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (55, 'Swap Epitel', NULL, 4, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (56, 'Narkoba Berupa Bahan Dasar', NULL, 5, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (57, 'Narkoba Berupa Darah/Serum', NULL, 5, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (58, 'Narkoba Berupa Urine', NULL, 5, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (59, 'Obat Keras', NULL, 5, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (60, 'Narkoba Berupa Bahan Dasar dan Urine', NULL, 5, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (61, 'Narkotika Jenis Bahan Dasar dan Urine', NULL, 5, NULL, NULL, NULL);
INSERT INTO `jenisbb` VALUES (62, 'Narkoba Berupa Dahan Dasar dan Pil', NULL, 5, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
