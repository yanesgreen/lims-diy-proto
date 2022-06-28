/*
 Navicat Premium Data Transfer

 Source Server         : laragon_3306
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : smile_v1

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 16/07/2020 14:43:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asaltakah
-- ----------------------------
DROP TABLE IF EXISTS `asaltakah`;
CREATE TABLE `asaltakah`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `instansi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `satker_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `polda_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `polres_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `polsek_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `lembaga_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asaltakah
-- ----------------------------
INSERT INTO `asaltakah` VALUES (1, 'nonpolri', NULL, NULL, NULL, NULL, 2, '2020-07-16 14:18:45', '2020-07-16 14:18:45');

-- ----------------------------
-- Table structure for bap
-- ----------------------------
DROP TABLE IF EXISTS `bap`;
CREATE TABLE `bap`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `takah_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for barangbukti
-- ----------------------------
DROP TABLE IF EXISTS `barangbukti`;
CREATE TABLE `barangbukti`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenisbb_id` int(10) UNSIGNED NOT NULL,
  `dibuka_oleh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barangbukti
-- ----------------------------
INSERT INTO `barangbukti` VALUES (1, NULL, 20, NULL, '1', NULL, '_1594884059.jpg', '2020-07-16 14:20:59', '2020-07-16 14:20:59', NULL);
INSERT INTO `barangbukti` VALUES (2, NULL, 23, NULL, '1', NULL, '_1594884059.jpg', '2020-07-16 14:20:59', '2020-07-16 14:20:59', NULL);
INSERT INTO `barangbukti` VALUES (3, NULL, 30, NULL, '1', NULL, '_1594884059.jpg', '2020-07-16 14:20:59', '2020-07-16 14:20:59', NULL);

-- ----------------------------
-- Table structure for barangbukti_takah
-- ----------------------------
DROP TABLE IF EXISTS `barangbukti_takah`;
CREATE TABLE `barangbukti_takah`  (
  `takah_id` int(11) NOT NULL,
  `barangbukti_id` int(11) NOT NULL,
  PRIMARY KEY (`takah_id`, `barangbukti_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barangbukti_takah
-- ----------------------------
INSERT INTO `barangbukti_takah` VALUES (1, 1);
INSERT INTO `barangbukti_takah` VALUES (1, 2);
INSERT INTO `barangbukti_takah` VALUES (1, 3);

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bidang
-- ----------------------------
INSERT INTO `bidang` VALUES (1, 'Dokumen dan Uang Palsu Forensik', 'DOKUPALFOR', NULL, NULL, NULL);
INSERT INTO `bidang` VALUES (2, 'Balistik dan Metalurgi Forensik', 'BALMETFOR', NULL, NULL, NULL);
INSERT INTO `bidang` VALUES (3, 'Fisika dan Komputer Forensik', 'FISKOMFOR', NULL, NULL, NULL);
INSERT INTO `bidang` VALUES (4, 'Kimia dan Biologi Forensik', 'KIMBIOFOR', NULL, NULL, NULL);
INSERT INTO `bidang` VALUES (5, 'Narkotika dan Obat Berbahaya Forensik', 'NARKOBAFOR', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for detailpermintaan
-- ----------------------------
DROP TABLE IF EXISTS `detailpermintaan`;
CREATE TABLE `detailpermintaan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tgl_surat` timestamp(0) NOT NULL,
  `no_surat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detailpermintaan
-- ----------------------------
INSERT INTO `detailpermintaan` VALUES (1, '2020-07-16 00:00:00', 'R/32/687876', '2020-07-16 14:18:45', '2020-07-16 14:18:45', NULL);

-- ----------------------------
-- Table structure for dokumendiserahkan
-- ----------------------------
DROP TABLE IF EXISTS `dokumendiserahkan`;
CREATE TABLE `dokumendiserahkan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `takah_id` bigint(20) UNSIGNED NOT NULL,
  `bap_laboratoris` tinyint(1) NOT NULL,
  `bb_diserahkan` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `takah_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan1` tinyint(4) NULL DEFAULT NULL,
  `pertanyaan2` tinyint(4) NULL DEFAULT NULL,
  `pertanyaan3` tinyint(4) NULL DEFAULT NULL,
  `pertanyaan4` tinyint(4) NULL DEFAULT NULL,
  `pertanyaan5` tinyint(4) NULL DEFAULT NULL,
  `pertanyaan6` tinyint(4) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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

-- ----------------------------
-- Table structure for jenisidentitas
-- ----------------------------
DROP TABLE IF EXISTS `jenisidentitas`;
CREATE TABLE `jenisidentitas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenisidentitas
-- ----------------------------
INSERT INTO `jenisidentitas` VALUES (1, 'KTP', NULL, NULL, NULL);
INSERT INTO `jenisidentitas` VALUES (2, 'SIM', NULL, NULL, NULL);
INSERT INTO `jenisidentitas` VALUES (3, 'NRP', NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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

-- ----------------------------
-- Table structure for keteranganformiltambahan
-- ----------------------------
DROP TABLE IF EXISTS `keteranganformiltambahan`;
CREATE TABLE `keteranganformiltambahan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `takah_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for keteranganteknistambahan
-- ----------------------------
DROP TABLE IF EXISTS `keteranganteknistambahan`;
CREATE TABLE `keteranganteknistambahan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `takah_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lembaga
-- ----------------------------
INSERT INTO `lembaga` VALUES (1, 'BNN', NULL, NULL, NULL);
INSERT INTO `lembaga` VALUES (2, 'Kejaksaan', NULL, NULL, NULL);
INSERT INTO `lembaga` VALUES (3, 'KPK', NULL, NULL, NULL);
INSERT INTO `lembaga` VALUES (4, 'Polisi Militer', NULL, NULL, NULL);
INSERT INTO `lembaga` VALUES (5, 'Pengadilan', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_10_25_143239_create_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_10_30_094429_create_jabatan_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_10_30_094726_create_bidang_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_11_08_095747_create_jenisbb_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_06_10_135601_create_pangkat_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_06_10_165326_create_subbidang_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_06_22_031648_create_jenis_identitas_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_06_22_032045_create_jenis_kasus_table', 1);
INSERT INTO `migrations` VALUES (12, '2020_06_22_032333_create_lembaga_table', 1);
INSERT INTO `migrations` VALUES (13, '2020_06_23_071454_create_polda_table', 1);
INSERT INTO `migrations` VALUES (14, '2020_06_23_073342_create_polres_table', 1);
INSERT INTO `migrations` VALUES (15, '2020_06_23_155427_create_polsek_table', 1);
INSERT INTO `migrations` VALUES (16, '2020_06_25_161440_create_pemeriksa_table', 1);
INSERT INTO `migrations` VALUES (17, '2020_06_25_161917_create_unitkerja_table', 1);
INSERT INTO `migrations` VALUES (18, '2020_06_26_100220_create_satker_table', 1);
INSERT INTO `migrations` VALUES (19, '2020_06_26_143641_create_penyidik_table', 1);
INSERT INTO `migrations` VALUES (20, '2020_06_27_065807_create_detail_permintaan_table', 1);
INSERT INTO `migrations` VALUES (21, '2020_06_27_073004_create_asal_takah_table', 1);
INSERT INTO `migrations` VALUES (22, '2020_06_27_173031_create_barangbukti_table', 1);
INSERT INTO `migrations` VALUES (23, '2020_06_28_070409_create_mindik_table', 1);
INSERT INTO `migrations` VALUES (24, '2020_06_28_081640_create_tersangka_table', 1);
INSERT INTO `migrations` VALUES (25, '2020_06_28_103302_create_saksi_table', 1);
INSERT INTO `migrations` VALUES (26, '2020_06_28_150035_create_statustakah_table', 1);
INSERT INTO `migrations` VALUES (27, '2020_06_28_153708_create_takah_table', 1);
INSERT INTO `migrations` VALUES (28, '2020_06_28_182157_create_mindiktambahan_table', 1);
INSERT INTO `migrations` VALUES (29, '2020_06_30_130959_create_keteranganformiltambahan_table', 1);
INSERT INTO `migrations` VALUES (30, '2020_06_30_131603_create_keteranganteknistambahan_table', 1);
INSERT INTO `migrations` VALUES (31, '2020_06_30_171232_create_pemeriksa_takah_table', 1);
INSERT INTO `migrations` VALUES (32, '2020_06_30_175609_create_bap_table', 1);
INSERT INTO `migrations` VALUES (33, '2020_07_01_043907_create_dokumendiserahkan_table', 1);
INSERT INTO `migrations` VALUES (34, '2020_07_01_072407_update_takah_table', 1);
INSERT INTO `migrations` VALUES (35, '2020_07_01_131725_create_feedback_table', 1);
INSERT INTO `migrations` VALUES (36, '2020_07_01_144251_add_urtupenyerah_to_takah', 1);
INSERT INTO `migrations` VALUES (37, '2020_07_15_190611_create_barangbukti_takah_table', 1);

-- ----------------------------
-- Table structure for mindik
-- ----------------------------
DROP TABLE IF EXISTS `mindik`;
CREATE TABLE `mindik`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `laporan_polisi` tinyint(4) NOT NULL DEFAULT 0,
  `surat_permohonan` tinyint(4) NOT NULL DEFAULT 0,
  `sprin_penggeledahan` tinyint(4) NOT NULL DEFAULT 0,
  `bap_penggeledahan` tinyint(4) NOT NULL DEFAULT 0,
  `sprin_penyitaan` tinyint(4) NOT NULL DEFAULT 0,
  `bap_penyitaan` tinyint(4) NOT NULL DEFAULT 0,
  `bap_saksi` tinyint(4) NOT NULL DEFAULT 0,
  `bap_tersangka` tinyint(4) NOT NULL DEFAULT 0,
  `laporan_kemajuan` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mindik
-- ----------------------------
INSERT INTO `mindik` VALUES (1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-07-16 14:20:59', '2020-07-16 14:20:59', NULL);

-- ----------------------------
-- Table structure for mindiktambahan
-- ----------------------------
DROP TABLE IF EXISTS `mindiktambahan`;
CREATE TABLE `mindiktambahan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `takah_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mindiktambahan
-- ----------------------------
INSERT INTO `mindiktambahan` VALUES (1, 'mindik tambahan 1', 1, '2020-07-16 14:21:23', '2020-07-16 14:21:23', NULL);
INSERT INTO `mindiktambahan` VALUES (2, 'mindik tambahan 2', 1, '2020-07-16 14:21:23', '2020-07-16 14:21:23', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pemeriksa
-- ----------------------------
DROP TABLE IF EXISTS `pemeriksa`;
CREATE TABLE `pemeriksa`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `unitkerja_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `pangkat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pemeriksa_takah
-- ----------------------------
DROP TABLE IF EXISTS `pemeriksa_takah`;
CREATE TABLE `pemeriksa_takah`  (
  `takah_id` int(11) NOT NULL,
  `pemeriksa_id` int(11) NOT NULL,
  PRIMARY KEY (`takah_id`, `pemeriksa_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for penyidik
-- ----------------------------
DROP TABLE IF EXISTS `penyidik`;
CREATE TABLE `penyidik`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisidentitas_id` int(10) UNSIGNED NOT NULL,
  `pangkat_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `telepon` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `digitalsign` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penyidik
-- ----------------------------
INSERT INTO `penyidik` VALUES (1, 'Rizky Rizkia', '12345', 1, NULL, '8801875', 'rizkyrizkia_1594883924.jpg', 'rizkyrizkiaZhBUb8iIh4.png', '2020-07-16 14:18:44', '2020-07-16 14:18:44', NULL);

-- ----------------------------
-- Table structure for polda
-- ----------------------------
DROP TABLE IF EXISTS `polda`;
CREATE TABLE `polda`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorurut` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 703 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of polda
-- ----------------------------
INSERT INTO `polda` VALUES (101, 'Polda Metro Jaya', 'Jl. Jend. Sudirman No.Kav. 55, RT.5/RW.3, Senayan, Kby. Baru, Kota Jakarta Selatan, DKI Jakarta 1219', '(021) 5234077', 11, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (102, 'Polda Jawa Barat', 'Jl. Soekarno Hatta No.748, Cimenerang, Gedebage, Kota Bandung, Jawa Barat 40613', '(022) 7800011', 13, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (103, 'Polda Banten', 'Jl. Kotabaru, Kecamatan Serang, Banjarsari, Cipocok Jaya, Kota Serang, Banten 42112', '(0254) 200046', 12, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (104, 'Polda Jawa Tengah', 'Jl. Pahlawan No.1, Mugassari, Semarang Sel., Kota Semarang, Jawa Tengah 50142', '24110', 14, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (105, 'Polda DIY', 'Jl. Ring Road Utara, Depok, Sleman, Condongcatur, Kec. Depok, Yogyakarta, Daerah Istimewa Yogyakarta', '(0274) 884444', 15, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (106, 'Polda Jawa Timur', 'Jalan Jenderal Ahmad Yani No. 116, Wonocolo, Gayungan, Ketintang, Gayungan, Kota SBY, Jawa Timur 602', ' (031) 8280748', 16, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (201, 'Polda Aceh', 'Jl. Cut Meutia No.25, Jeulingke, Syiah Kuala, Kota Banda Aceh, Aceh', '(0651) 29556', 1, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (202, 'Polda Sumatera Utara', 'Jl. Tanjung Morawa Km. 10.5, Timbang Deli, Medan Amplas, Kota Medan, Sumatera Utara 20362', '(061) 7869000', 2, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (203, 'Polda Sumatera Barat ', 'Jl. Jenderal Sudirman No. 55, Kel. Padang Pasir, Kec. Padang Barat, Ujung Gurun, Padang Bar., Kota P', '0751) 8950779', 3, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (204, 'Polda Jambi', 'Jl. Jend. Sudirman No.45, Tambak Sari, Jambi Sel., Kota Jambi, Jambi 36138', '(0741) 34382', 6, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (205, 'Polda Riau', 'Jl. Jend. Sudirman No. 235, Simpang Empat, Pekanbaru Kota, Kota Pekanbaru, Riau 28111', '(0761) 31307', 4, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (206, 'Polda Kepri', 'Jl. Hang Jebat, Batu Besar, Batam, Kota Batam, Kepulauan Riau 29122', '(0778) 7763512', 5, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (207, 'Polda Babel', 'Jl. Komp. Perkantoran Gubenur No.14, Air Itam, Bukit Intan, Kota Pangkal Pinang, Kepulauan Bangka Be', ' (0717) 437908', 9, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (208, 'Polda Sumatera Selatan', 'Jl. Sudirman KM No.45, Karang Anyar, Gandus, Kota Palembang, Sumatera Selatan 30139', '(0711) 310264', 8, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (209, 'Polda Bengkulu', 'Jl. Adam Malik KM. 9, Sido Mulyo, Gading Cemp., Kota Bengkulu, Bengkulu 38211', '(0736) 51213', 7, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (210, 'Polda Lampung', 'Jl. WR. Supratman No.1, Kupang Kota, Tlk. Betung Utara, Kota Bandar Lampung, Lampung 35221', '(0721) 474182', 10, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (301, 'Polda Kalimantan Barat', 'Jl. Jenderal Ahmad Yani, Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat 78391', '(0561) 732465', 17, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (302, 'Polda Kalimantan Tengah', 'Jalan Cilik Riwut, Palangka, Jekan Raya, Palangka, Palangka Raya, Kota Palangka Raya, Kalimantan Ten', '(0536) 3236366', 18, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (303, 'Polda Kalimantan Timur', 'Jalan Syarifudin Yoes No. 99, Balikpapan Selatan, Sepinggan, Balikpapan, Kota Balikpapan, Kalimantan', '(0542) 878395', 20, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (304, 'Polda Kalimantan Selatan', 'Jl. S. Parman No. 16, Antasan Besar, Banjarmasin Tengah, Kota Banjarmasin, kelurahan 70123', '(0511) 3368571', 19, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (305, 'Polda Kalimantan Utara', 'Bumi Rahayu, Tj. Selor, Kabupaten Bulungan, Kalimantan Utara', '', 21, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (401, 'Polda Sulawesi Utara', 'Jl. Bethesda No.18, Sario, Kota Manado, Sulawesi Utara', '(0431) 862019', 22, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (402, 'Polda Gorontalo', 'Jalan Ahmad A. Wahab No. 17, Pantungo, Telaga Biru, Kota Gorontalo, Gorontalo 96211', '(0435) 838536', 23, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (403, 'Polda Sulawesi Tengah', 'Jl. Samratulangi No.78, Besusu Bar., Palu Tim., Kota Palu, Sulawesi Tengah 94111', '(0451) 456834', 24, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (404, 'Polda Sulawesi Tenggara', 'Jalan D.I. Panjaitan, Mokoau, Kendari, Kota Kendari, Sulawesi Tenggara 93111', '(0401) 395040', 27, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (405, 'Polda Sulawesi Barat', 'Jl. Mamuju - Kalukku, Tadui, Kec. Mamuju, Kabupaten Mamuju, Sulawesi Barat', '', 25, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (406, 'Polda Sulawesi Selatan', 'Jalan Perintis Kemerdekaan km 16, Tamalanrea Indah, Makassar, Pai, Makassar, Kota Makassar, Sulawesi', '(0411) 515201', 26, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (501, 'Polda Bali', 'Jl. Wr. Supratman No.7, Sumerta Kauh, Denpasar Tim., Kota Denpasar, Bali 80236', '(0361)227174', 28, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (502, 'Polda NTB', 'Jl. Langko No 77 Mataram 83112', '(0370) 633152', 29, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (503, 'Polda NTT', 'Jalan Jendral Soeharto No. 3, Kupang, Nusa Tenggara Timur', '0812-3716-7696', 30, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (601, 'Polda Maluku', 'Jl. Rijali, Kel Batu Meja, Sirimau, Kota Ambon, Maluku 97123', '(0911) 352912', 32, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (602, 'Polda Maluku Utara', 'Jl. Kapitan Pattimura, Kalumpang, Maliaro, Ternate Tengah, Kota Ternate, Maluku Utara', '(0921) 327045', 31, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (701, 'Polda Papua', 'Jl. Sam Ratulangi No.8, Bayangkara, Jayapura Utara, Kota Jayapura, Papua 99112', '(0967) 531014', 34, NULL, NULL, NULL);
INSERT INTO `polda` VALUES (702, 'Polda Papua Barat', 'Sanggeng, Manokwari Bar., Kabupaten Manokwari, Papua Bar. 98312', '', 33, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for polres
-- ----------------------------
DROP TABLE IF EXISTS `polres`;
CREATE TABLE `polres`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `polda_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70211 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of polres
-- ----------------------------
INSERT INTO `polres` VALUES (10101, 101, 'Polres Metro Jakarta Pusat', 'Jalan Kramat Raya No 61, Kramat, Senen, RT.8/RW.8, Kramat, Senen, Kota Jakarta Pusat, DKI Jakarta 10', '(021) 3909921', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10102, 101, 'Polres Metro Jakarta Selatan', 'Jl. Wijaya II No.42, Pulo, Kby. Baru, Kota Jakarta Selatan, DKI Jakarta 12160', '021) 7206004', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10103, 101, 'Polres Metro Jakarta Barat', ' Jalan Letjen. S. Parman No.31, Jl. Letjen S. Parman, RT.11/RW.3, Slipi, Palmerah, Kota Jakarta Bara', '(021) 5300330', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10104, 101, 'Polres Metro Jakarta Utara', 'Jl. Laksamana Yos Sudarso No. 1, Rawa Badak Utara, Koja, RT.1/RW.12, Rawabadak Utara, Koja, Kota Jkt', '(021) 43931017', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10105, 101, 'Polres Metro Jakarta Timur', 'Jl. Matraman Raya No.224, RT.3/RW.6, Bali Mester, Jatinegara, Kota Jakarta Timur, DKI Jakarta 13310', '(021) 8192262', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10106, 101, 'Polres Metro Tangerang Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10107, 101, 'Polresta Kota Bekasi', 'Jl. Pramuka No.79, Marga Jaya, Bekasi Sel., Kota Bks, Jawa Barat 17141', '(021) 8841110', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10108, 101, 'Polres Depok Kota', 'Jalan Margonda Raya No.14, Pancoran Mas, Depok, Kota Depok, Jawa Barat 16431', '(021) 7520535', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10109, 101, 'Polres Pelabuhan Tanjung Priok', 'Jl. Pelabuhan Nusantara II No.1, Tj. Priok, Kota Jkt Utara, DKI Jakarta 14310', '(021) 43932424', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10110, 101, 'Polres Bandara Soekarno Hatta', 'Kawasan Bandara JIA Soekarno-Hatta Gedung 641, Jalan C4, Tangerang, Jl. C3, Pajang, Banten, Kota Tan', '(021) 5501636', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10111, 101, 'Polres Tangerang Selatan', 'Jalan Boulevard Bintaro Jaya, Pondok Jaya, Pondok Aren, Pd. Pucung, Pd. Aren, Kota Tangerang Selatan', '(021) 29522262', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10112, 101, 'Polres Kepulauan Seribu', 'Pulau Karya, Pulau Panggang, Kepulauan Seribu Utara, Kabupaten Kepulauan Seribu, DKI Jakarta 14530', '(021) 29459802', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10113, 101, 'Polres Tangerang Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10114, 101, 'Ditlantas Polda Metro Jaya', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10115, 101, 'Polres Metro Bekasi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10116, 101, 'Polres Metro Bekasi Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10117, 101, 'Polrestro Bekasi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10118, 101, 'Polresta Depok', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10201, 102, 'Polrestabes Bandung', 'Jl. Merdeka No. 18-21, Babakan Ciamis, Bandung, Kota Bandung, Jawa Barat 40117', '(022) 4234558', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10202, 102, 'Polres Bandung', 'Jl. Jenderal Ahmad Yani No.282, Kebonwaru, Batununggal, Kota Bandung, Jawa Barat 40272', '(022) 7271115', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10203, 102, 'POLRES BOGOR KOTA', 'Jl. Raya Jakarta-Bogor No.22, Cibuluh, Bogor Utara, Kota Bogor, Jawa Barat 16158', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10204, 102, 'Polres Bogor', 'Jl. Tegar Beriman, Tengah, Cibinong, Bogor, Jawa Barat 16914', '(021) 8750163', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10205, 102, 'Polres Cirebon Kota', 'Jalan Veteran No.05, Kebonbaru, Kejaksan, Kebonbaru, Kejaksan, Kota Cirebon, Jawa Barat 45121', '(0231) 205179', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10206, 102, 'Polres Cirebon', 'Jl. Raden Dewi Sartika No.1, Tukmudal, Sumber, Cirebon, Jawa Barat 45611', '(0231) 321646', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10207, 102, 'Polres Indramayu', 'Jl. Jenderal Gatot Subroto No.3, Karangmalang, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45213', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10208, 102, 'Polres Kuningan', 'Jl. RE Martadinata No.526, Ancaran, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511', '(0232) 871180', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10209, 102, 'Polres Majalengka', 'Jl. KH. Abdul Halim No. 518, Kecamatan Majalengka, Tonjong, Kec. Majalengka, Kabupaten Majalengka, J', '(0233) 281221', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10210, 102, 'Polres Cimahi', 'Jalan Raya Jenderal Haji Amir Machmud No.333, Karangmekar, Cimahi Tengah, Cigugur Tengah, Cimahi, Ko', '(022) 6634299', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10211, 102, 'Polres Purwakarta', 'Jl. Veteran No.408, Ciseureuh, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41118', '(0264) 200833', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10212, 102, 'Polres Karawang', 'Jl. Surotokunto No.110, Warungbambu, Karawang Tim., Kabupaten Karawang, Jawa Barat 41571', '(0267) 8616994', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10213, 102, 'Polres Tasikmalaya Kota', 'Jl. Letnan Harun, Sukarindik, Bungursari, Tasikmalaya, Jawa Barat 46151', '(0265) 330032', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10214, 102, 'Polres Tasikmalaya', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10215, 102, 'Polres Garut', 'Jl. Jenderal Sudirman No.204, Sucikaler, Karangpawitan, Kabupaten Garut, Jawa Barat 44163', '(0262) 233027', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10216, 102, 'Polres Sumedang', 'Jl. Prabu Geusan Ulun No.7, Regol Wetan, Sumedang Sel., Kabupaten Sumedang, Jawa Barat 45311', '(0261) 201610', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10217, 102, 'Polres Sukabumi Kota', 'Jl. Perintis Kemerdekaan No.10, Gunungparang, Cikole, Kota Sukabumi, Jawa Barat 43111', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10218, 102, 'Polres Sukabumi ', 'JL. Sudirman, No. 12, Pelabuhan Ratu, Citepus, Sukabumi, Jawa Barat 43364', '(0266) 434110', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10219, 102, 'Polres Subang', 'Jl. Mayjen Sutoyo No.29, Karanganyar, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', '(0260) 411209', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10220, 102, 'Polres Ciamis', 'Jl. Jenderal Sudirman No.271 Cisadap, Kec. Ciamis, Kabupaten Ciamis, Jawa Barat 46215', '0853-5306-2249', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10221, 102, 'Polres Cianjur', 'Jalan KH. R. Abdullah Bin Nuh, Nagrak, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43211', '(0264) 261110', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10222, 102, 'Polres Banjar Kota', 'Jalan Siliwangi No.145, Mekarharja, Purwaharja, Karangpanimbal, Purwaharja, Kota Banjar, Jawa Barat ', '(0265) 745943', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10224, 102, 'Ditlantas Polda Jawa Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10301, 103, 'Polres Lebak', 'Jl. Siliwangi, Rangkasbitung Tim., Rangkasbitung, Kabupaten Lebak, Banten 42313', '0852-1234-5678', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10302, 103, 'Polres Pandeglang', 'Jl. Bhayangkara No.7, Pandeglang, Kec. Pandeglang, Kabupaten Pandeglang, Banten 42212', '(0253) 201409', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10303, 103, 'Polres Serang', 'Jl. Ahmad Yani No.64, Cipare, Kec. Serang, Kota Serang, Banten 42117', '(0254) 205444', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10304, 103, 'Polres Cilegon', 'Jl. Jenderal Sudirman No.1, Ramanuju, Kec. Cilegon, Kota Cilegon, Banten 42426', '(0254) 391024', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10305, 103, 'Polres Serang Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10306, 103, 'Polresta Tangerang', 'Kadu Agung, Tigaraksa, Tangerang, Banten 15720', '(021) 5995550', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10307, 103, 'Ditlantas Polda Banten', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10401, 104, 'Polrestabes Semarang', 'Jl. DR. Sutomo IV No.19, Barusari, Semarang Sel., Kota Semarang, Jawa Tengah 50244', '(024) 8444444', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10402, 104, 'Polresta Surakarta', 'Jalan Adi Sucipto No. 2, Banjarsari, Manahan, Surakarta, Kota Surakarta, Jawa Tengah 57139', ' (0271) 712600', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10403, 104, 'Polres Banjarnegara', 'Jl. Pemuda No.39, Semarang, Kec. Banjarnegara, Banjarnegara, Jawa Tengah 53411', ' (0271) 712600', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10404, 104, 'Polres Banyumas', 'Jalan Letjen. Pol. R. Sumarto No.100, Purwanegara, Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah ', '(0281) 622259', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10405, 104, 'Polres Batang', 'Jl. Gajah Mada No.200, Proyonanggan Sel., Kec. Batang, Kabupaten Batang, Jawa Tengah 51211', '(0285) 391074', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10406, 104, 'Polres Blora', 'Jl. Raya Blora - Cepu, Jepon, Kec. Blora Kota, Kabupaten Blora, Jawa Tengah 58261', '(0296) 525110', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10407, 104, 'Polres Boyolali', 'Jl. Solo-Semarang Km No.24, Mojosongo, Kec. Boyolali, Kabupaten Boyolali, Jawa Tengah 57352', '(0276) 321038', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10408, 104, 'Polres Brebes', 'Jl. Jenderal Sudirman No.189, Brebes, Kec. Brebes, Kabupaten Brebes, Jawa Tengah 52212', '(0283) 671004', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10409, 104, 'Polres Cilacap', 'Jalan Ir. Haji Juanda No. 18, Kebonmanis, Cilacap Utara, Kabupaten Cilacap, Jawa Tengah 53231', '(0282) 541110', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10410, 104, 'Polres Demak', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10411, 104, 'Polres Grobogan', 'Jl. Gajah Mada No.9, Purwodadi, Kec. Grobogan, Kabupaten Grobogan, Jawa Tengah 58111', '(0292) 421142', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10412, 104, 'Polres Jepara', 'Jalan K.S. Tubun No.2, Kec. Jepara, Jawa Tengah, 59412', '(0291) 591310', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10413, 104, 'Polres Karanganyar', 'Jl. Lawu No.3, Jungke, Kec. Karanganyar, Kabupaten Karanganyar, Jawa Tengah 57715', '(0271) 495170', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10414, 104, 'Polres Kebumen', 'Jl. Tentara Pelajar No.39, Panjer, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah 54311', '(0287) 383705', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10415, 104, 'Polres Kendal', 'Jl. Seokarno Hatta No.158, Karang Sari, Kendal, Kabupaten Kendal, Jawa Tengah 51318', '(0294) 382110', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10416, 104, 'Polres Klaten', 'Jl. Diponegoro No.27, Karanganom, Klaten Utara, Kabupaten Klaten, Jawa Tengah 57438', '(0272) 321234', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10417, 104, 'Polres Kudus', 'Jl. Jend. Sudirman 78, Kramat, Kota Kudus, Kabupaten Kudus, Jawa Tengah 59312', '(0291) 433008', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10418, 104, 'Polres Magelang', 'Jl. Soekarno Hatta No.7, Sawitan, Mungkid, Magelang, Jawa Tengah 56511', '(0293) 788787', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10419, 104, 'Polres Magelang Kota', 'Jl. Alun - Alun Selatan No.7, Kemirirejo, Magelang Sel., Kota Magelang, Jawa Tengah 56122', '(0293) 313134', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10420, 104, 'Polres Pati', 'Jl. Pemuda, Pati Wetan, Kec. Pati, Kabupaten Pati, Jawa Tengah 59119', '(0295) 382500', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10421, 104, 'Polres Pekalongan', 'Jalan. Diponegoro No.19, Dukuh, Pekalongan Utara, Kota Pekalongan, Jawa Tengah 51146', '(0285) 421692', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10422, 104, 'Polres Pekalongan Kota', 'Jalan. Diponegoro No.19, Dukuh, Pekalongan Utara, Kota Pekalongan, Jawa Tengah 51146', '(0285) 421692', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10423, 104, 'Polres Pemalang', 'Jl. Jend Sudirman Timur No. 25, Taman, Wanarejan Sel., Kec. Pemalang, Kabupaten Pemalang, Jawa Tenga', '(0284) 322274', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10424, 104, 'Polres Purbalingga', 'Jl. Mayjend Sungkono No.1, Kalikabong, Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53321', '(0281) 891110', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10425, 104, 'Polres Purworejo', 'Jl. Gajah Mada No.2, Candisari, Banyu Urip, Kabupaten Purworejo, Jawa Tengah 54171', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10426, 104, 'Polres Rembang', 'Jl. Pemuda Km. 4, Leteh, Rembang, Ngotet, Kec. Rembang, Kabupaten Rembang, Jawa Tengah 59217', '(0295) 691110', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10427, 104, 'Polres Salatiga', 'Jalan Adisucipto, Salatiga, Sidomukti, Kalicacing, Salatiga, Kota Salatiga, Jawa Tengah 50711', '(0298) 324172', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10428, 104, 'Polres Semarang', 'Jalan Gatot Subroto no. 85, Ungaran, Ungaran Barat, Bandarjo, Ungaran Bar., Semarang, Jawa Tengah 50', '(024) 6925405', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10429, 104, 'Polres Sragen', 'Jl. Veteran, Sragen Tengah, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57211', '(0271) 891510', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10430, 104, 'Polres Sukoharjo', 'Jl. Jaksa Agung R Suprapto No.15, Sukoharjo, Kec. Sukoharjo, Kabupaten Sukoharjo, Jawa Tengah 57512', '(0271) 593317', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10431, 104, 'Polres Tegal', 'Jl. AIP KS Tubun No.3, Pakembaran, Slawi, Tegal, Jawa Tengah 52415', '(0283) 492003', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10432, 104, 'Polres Tegal Kota', 'Jl. Pemuda No.2, Tegalsari, Tegal Bar., Kota Tegal, Jawa Tengah 52313', '(0283) 356016', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10433, 104, 'Polres Temanggung', 'Jl. Jenderal Sudirman No.9, Jampiroso, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56216', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10434, 104, 'Polres Wonogiri', 'Jl. Raya Wonogiri-Wuryantoro KM. 2, Wuryorejo, Kec. Wonogiri, Kabupaten Wonogiri, Jawa Tengah 57614', '(0273) 321510', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10435, 104, 'Polres Wonosobo', 'Jl. Bhayangkara, Wonosobo Bar., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56315', '(0286) 321076', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10436, 104, 'Ditlantas Polda Jawa Tengah', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10501, 105, 'Polresta Yogyakarta', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10502, 105, 'Polres Sleman', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10503, 105, 'Polres Bantul', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10504, 105, 'Polres Gunungkidul', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10505, 105, 'Polres Kulonprogo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10506, 105, 'Ditlantas Polda DIY', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10601, 106, 'Polrestabes Surabaya', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10602, 106, 'Polresta Sidoarjo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10603, 106, 'Polres Gresik', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10604, 106, 'Polres KPPP Tanjung Perak', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10605, 106, 'Polres Batu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10606, 106, 'Polres Malang Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10607, 106, 'Polres Malang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10608, 106, 'Polres Pasuruan Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10609, 106, 'Polres Pasuruan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10610, 106, 'Polres Probolinggo Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10611, 106, 'Polres Probolinggo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10612, 106, 'Polres Lumajang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10613, 106, 'Polres Jember', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10614, 106, 'Polres Banyuwangi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10615, 106, 'Polres Bondowoso', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10616, 106, 'Polres Situbondo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10617, 106, 'Polres Kediri Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10618, 106, 'Polres Kediri', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10619, 106, 'Polres Blitar Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10620, 106, 'Polres Blitar', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10621, 106, 'Polres Tulungagung', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10622, 106, 'Polres Trenggalek', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10623, 106, 'Polres Nganjuk', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10624, 106, 'Polres Lamongan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10625, 106, 'Polres Bojonegoro', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10626, 106, 'Polres Tuban', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10627, 106, 'Polres Mojokerto Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10628, 106, 'Polres Mojokerto', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10629, 106, 'Polres Jombang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10630, 106, 'Polresta Madiun Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10631, 106, 'Polres Madiun', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10632, 106, 'Polres Magetan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10633, 106, 'Polres Pacitan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10634, 106, 'Polres Ponorogo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10635, 106, 'Polres Ngawi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10636, 106, 'Polres Bangkalan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10637, 106, 'Polres Sampang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10638, 106, 'Polres Pamekasan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10639, 106, 'Polres Sumenep', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (10640, 106, 'Ditlantas Polda Jawa Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20101, 201, 'POLRES BANDA ACEH', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20102, 201, 'POLRES ACEH BESAR', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20103, 201, 'POLRES PIDIE', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20104, 201, 'POLRES ACEH BARAT', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20105, 201, 'POLRES ACEH SELATAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20106, 201, 'POLRES ACEH TENGAH', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20107, 201, 'POLRES ACEH TENGGARA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20108, 201, 'POLRES SABANG', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20109, 201, 'POLRES BIREUN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20110, 201, 'POLRES ACEH SINGKIL', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20111, 201, 'POLRES SIMEULUE', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20112, 201, 'POLRES ACEH TAMIANG', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20113, 201, 'POLRES GAYO LUES', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20114, 201, 'POLRES LHOKSEUMAWE', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20115, 201, 'POLRES LANGSA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20116, 201, 'POLRES SUBULUSSALAM', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20117, 201, 'POLRES PIDIE JAYA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20118, 201, 'POLRES BENER MERIAH', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20119, 201, 'POLRES NAGAN JAYA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20120, 201, 'Ditlantas Polda Aceh', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20201, 202, 'POLRES DELI SERDANG', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20202, 202, 'POLRES LANGKAT', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20203, 202, 'POLRES MANDAILING NATAL', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20204, 202, 'POLRES TANAH KARO', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20205, 202, 'POLRES SIMALUNGUN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20206, 202, 'POLRES ASAHAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20207, 202, 'POLRES LABUHAN BATU', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20208, 202, 'POLRES TAPANULI UTARA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20209, 202, 'POLRES TAPANULI SELATAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20210, 202, 'POLRES TAPANULI TENGAH', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20211, 202, 'POLRES NIAS', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20212, 202, 'POLRES KP3 BELAWAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20213, 202, 'POLRES DAIRI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20214, 202, 'POLRESTABES MEDAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20215, 202, 'POLRES TEBING TINGGI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20216, 202, 'POLRES BINJAI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20217, 202, 'POLRES GUNUNGSITOLI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20218, 202, 'POLRESTA PADANG SIDEMPUAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20219, 202, 'POLRES TANJUNG BALAI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20220, 202, 'POLRES SIBOLGA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20221, 202, 'POLRES PEMATANG SIANTAR', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20222, 202, 'POLRES NIAS BARAT', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20223, 202, 'POLRES NIAS UTARA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20224, 202, 'POLRES LABUAN BATU UTARA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20225, 202, 'POLRES LABUAN BATU SELATAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20226, 202, 'POLRES PADANG LAWAS', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20227, 202, 'POLRES PADANG LAWAS UTARA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20228, 202, 'POLRES BATU BARA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20229, 202, 'POLRES SERDANG BEDAGAI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20230, 202, 'POLRES SAMOSIR', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20231, 202, 'POLRES HUMBANG HASUNDUTAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20232, 202, 'POLRES PAKPAK BHARAT', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20233, 202, 'POLRES NIAS SELATAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20234, 202, 'POLRES TOBA SAMOSIR', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20235, 202, 'Ditlantas Polda Sumatera Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20301, 203, 'POLRESTABES PADANG', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20302, 203, 'POLRES BUKIT TINGGI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20303, 203, 'POLRES PASAMAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20304, 203, 'POLRES PESSEL', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20305, 203, 'POLRES PAYAKUMBUH', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20306, 203, 'POLRES LIMAPULUH KOTA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20307, 203, 'POLRES SIJUNJUNG', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20308, 203, 'POLRES DHARMASRAYA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20309, 203, 'POLRES SAWAH LUNTO', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20310, 203, 'POLRES SOLOK', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20311, 203, 'POLRES SOLOK KOTA', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20312, 203, 'POLRES SOLOK SELATAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20313, 203, 'POLRES TANAH DATAR', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20314, 203, 'POLRESTA PADANG PANJANG', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20315, 203, 'POLRES PADANG PARIAMAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20316, 203, 'POLRESTA PARIAMAN', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20317, 203, 'POLRES PASAMAN BARAT', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20318, 203, 'POLRES AGAM', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20319, 203, 'POLRES MENTAWAI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20320, 203, 'Ditlantas Sumatera Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20401, 204, 'Polresta Jambi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20402, 204, 'Polres Batanghari', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20403, 204, 'Polres Muaro Jambi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20404, 204, 'Polres Tanjung Jabung Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20405, 204, 'Polsek Jambi Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20406, 204, 'Polres Muaro Jambi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20407, 204, 'Polres Bungo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20408, 204, 'Ditlantas Polda Jambi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20501, 205, 'Polres Indragiri Hilir', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20502, 205, 'Polres Pelalawan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20503, 205, 'Polres Dumai', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20504, 205, 'Polres Siak', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20505, 205, 'Polres Rokan Hulu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20506, 205, 'Polres Bengkalis', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20507, 205, 'Polres Siak', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20508, 205, 'Polres Kampar', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20509, 205, 'Polres Kampar, Bangkinang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20510, 205, 'Polres Rokan Hilir', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20511, 205, 'Polres Indragiri Hulu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20512, 205, 'Polres Kuantan Sengingi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20513, 205, 'Satlantas Polres Kampar', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20514, 205, 'Polres Kuantan Singingi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20515, 205, 'Polres Kuansing', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20516, 205, 'Polresta Pekanbaru', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20517, 205, 'Polres Kep Meranti', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20518, 205, 'Ditlantas Polda Riau', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20601, 206, 'Polres Tanjungpinang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20602, 206, 'Polres Karimun', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20603, 206, 'Polres Bintan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20604, 206, 'Polres Lingga', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20605, 206, 'Ditlantas Polda Kepri', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20701, 207, 'Polresta Pangkalpinang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20702, 207, 'Polres Belitung', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20703, 207, 'Polres Bangka', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20704, 207, 'Polres Bangka Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20705, 207, 'Polres Bangka Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20706, 207, 'Ditlantas Polda Babel', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20801, 208, 'Polres Banyuasin', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20802, 208, 'Polres OKU TIMUR', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20803, 208, 'Polres Oku Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20804, 208, 'Polres Muara Enim', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20805, 208, 'Polres Muba', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20806, 208, 'Polres Musirawas', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20807, 208, 'Polres Lahat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20808, 208, 'Polresta Palembang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20809, 208, 'Polres Prabumulih', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20810, 208, 'POLRES OKI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20811, 208, 'Polres Empat Lawang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20812, 208, 'Polres Pagaralam', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20813, 208, 'Polres OKU', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20814, 208, 'POLRES OGAN ILIR', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20815, 208, 'Polres Ogan Komering Ulu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20816, 208, 'Polres Ogan Komering Ilir', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20817, 208, 'Ditlantas Polda Sumatera Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20901, 209, 'Polres Bengkulu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20902, 209, 'Polres Bengkulu Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20903, 209, 'Polres Bengkulu Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (20904, 209, 'Ditlantas Polda Bengkulu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (21001, 210, 'Lampung Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (21002, 210, 'Polres Lampung Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (21003, 210, 'Ditlantas Polda Lampung', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (21004, 210, 'Polres Lampung Tengah', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (21005, 210, 'Polresta Lampung', '-', '-', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (21006, 210, 'Polres Tulang Bawang', '-', '-', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (21007, 210, 'Polres Bandar Lampung', '-', '-', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30101, 301, 'Polres Sintang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30102, 301, 'Polres Ketapang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30103, 301, 'Polres Landak', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30104, 301, 'Polres Sambas', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30105, 301, 'Polresta Pontianak Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30106, 301, 'Polres Sanggau', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30107, 301, 'Polres Mempawah', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30108, 301, 'Bukan Polres Bengkayang.', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30109, 301, 'POLRES SEKADAU', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30110, 301, 'Polres Singkawang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30111, 301, 'Polres Kapuas Hulu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30112, 301, 'Ditlantas Polda Kalimantan Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30201, 302, 'polresta Palangka Raya', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30202, 302, 'Polres Palangka Raya', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30203, 302, 'Polres Kotawaringin Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30204, 302, 'Polres Kotawaringin Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30205, 302, 'Polres Pulang Pisau', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30206, 302, 'Polres Katingan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30207, 302, 'Polres Gunung Mas', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30208, 302, 'Polres Barito Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30209, 302, 'Polres Barito Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30210, 302, 'Polres Barito Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30211, 302, 'Polres Sukamara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30212, 302, 'Polres Murung Raya', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30213, 302, 'Polres Lamandau', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30214, 302, 'Polres Kapuas', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30215, 302, 'Polres Seruyan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30216, 302, 'Ditlantas Polda Kalimantan Tengah', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30301, 303, 'Polres Balikpapan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30302, 303, 'Polres Bontang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30303, 303, 'Polres Kutai Kartanegara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30304, 303, 'Polres Pasir', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30305, 303, 'Polresta Samarinda', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30306, 303, 'Polres KUBAR', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30307, 303, 'Polres KUTIM', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30308, 303, 'Polres PPU', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30309, 303, 'Polres Berau', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30310, 303, 'Polres Bulungan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30311, 303, 'Polres Nunukan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30312, 303, 'Polres Malinau', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30313, 303, 'Polres Tarakan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30314, 303, 'Ditlantas Polda Kalimantan Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30401, 304, 'Polres Banjar', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30402, 304, 'Polres Kotabaru', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30403, 304, 'Polres Tapin', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30404, 304, 'Polres Tanah Bumbu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30405, 304, 'Polres Tabalong', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30406, 304, 'Polres Tala', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30407, 304, 'Polres Banjar Baru', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30408, 304, 'Polres Hulu Sungai Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30409, 304, 'Polres Balangan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30410, 304, 'Polres HST', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30411, 304, 'Polres Banjarmasin', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30412, 304, 'Polres Batola', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30413, 304, 'Polres Hulu Sungai Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (30414, 304, 'Ditlantas Polda Kalimantan Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40101, 401, 'Polres Minahasa', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40102, 401, 'Polres Minahasa Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40103, 401, 'Polres Manado', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40104, 401, 'Polres Bolmong', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40105, 401, 'Polres kota tomohon', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40106, 401, 'Ditlantas Polda Sulawesi Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40201, 402, 'Polres Gorontalo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40202, 402, 'Polres Pohuwato', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40203, 402, 'Ditlantas Polda Gorontalo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40301, 403, 'Polres Palu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40302, 403, 'Polres Banggai', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40303, 403, 'Polres Poso', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40304, 403, 'Polres Tolitoli', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40305, 403, 'Polres Buol', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40306, 403, 'Polres Donggala', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40307, 403, 'Ditlantas Polda Selawesi Tengah', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40401, 404, 'Polresta Kendari', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40402, 404, 'Polres Konawe', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40403, 404, 'Polres Konawe Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40404, 404, 'Polres Kolaka', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40405, 404, 'Polres Kolaka Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40406, 404, 'Polres Bombana', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40407, 404, 'Polres Baubau', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40408, 404, 'Polres Buton', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40409, 404, 'Polres Muna', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40410, 404, 'Polres Wakatobi', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40411, 404, 'Ditlantas Polda Sulawesi Tenggara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40501, 405, 'Polres Maros', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40502, 405, 'Polres Pangkep', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40503, 405, 'Polres Pelabuhan Makassar', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40504, 405, 'Polres Pinrang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40505, 405, 'Polres Sidrap', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40506, 405, 'Polres Soppeng', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40507, 405, 'Polres Gowa', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40508, 405, 'Polres Luwu Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40509, 405, 'POLRES Palopo', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40510, 405, 'Polres Bulukumba', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40511, 405, 'Polres Takalar', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40512, 405, 'Polres Enrekang', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40513, 405, 'Polres Bone', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40514, 405, 'Polres Bantaeng', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40515, 405, 'Polres Sinjai', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40516, 405, 'Polres Makassar Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40517, 405, 'Polres Parepare', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (40518, 405, 'Ditlantas Polda Sulawesi Selatan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50101, 501, 'Polres Badung', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50102, 501, 'Polres Gianyar', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50103, 501, 'Polres Jembrana', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50104, 501, 'Polres Tabanan', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50105, 501, 'Polres Buleleng', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50106, 501, 'Polres Karangasem', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50107, 501, 'Polres Klungkung', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50108, 501, 'POLRESTA Denpasar', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50109, 501, 'Polres Bangli', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50110, 501, 'Ditlantas Polda Bali', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50201, 502, 'Polres Bima', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50202, 502, 'Polres Mataram', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50203, 502, 'Polres Lombok Tengah', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50204, 502, 'Polres Dompu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50205, 502, 'Polres Lombok Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50206, 502, 'Polres Lombok Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50207, 502, 'polres lombok utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50208, 502, 'Ditlantas Polda NTB', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50301, 503, 'Polres Belu', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50302, 503, 'Polres TTS', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50303, 503, 'Polres Kupang Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50304, 503, 'Polres TTU', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50305, 503, 'Polres Manggarai', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50306, 503, 'Polres Alor', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50307, 503, 'Polres Sikka', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50308, 503, 'Polres Lembata', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50309, 503, 'Polres Ende', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50310, 503, 'Polres Kupang Polda NTT', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50311, 503, 'Polres Sumba Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50312, 503, 'Polres Rote Ndao', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50313, 503, 'Polres Sumba Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50314, 503, 'Polres Ngada', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50315, 503, 'Polres Manggarai Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50316, 503, 'Polres Flores Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (50317, 503, 'Ditlantas Polda NTT', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60101, 601, 'Polres Maluku Tenggara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60102, 601, 'Polres Maluku Tengah', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60103, 601, 'Polres Maluku Tenggara Barat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60104, 601, 'Ditlantas Polda Maluku', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60201, 602, 'Polres Maluku Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60202, 602, 'Polres Halmahera Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60203, 602, 'Polres Tidore', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60204, 602, 'Polres Kepulauan Sula', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60205, 602, 'Polres Halmahera Timur', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60206, 602, 'POLRES HALMAHERA BARAT', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60207, 602, 'Polres Halmahera Tengah', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60208, 602, 'Polres Halteng', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (60209, 602, 'Ditlantas Polda Maluku Utara', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70101, 701, 'Polres Jayapura', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70102, 701, 'Polres Jayawijaya', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70103, 701, 'Polres Manokwari', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70104, 701, 'Polres Biak Numfor', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70105, 701, 'Polres Yapen Waropen', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70106, 701, 'Polres Merauke', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70107, 701, 'Polres Paniai', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70108, 701, 'Polres Sorong', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70109, 701, 'POLRES SERUI', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70110, 701, 'Polres Nabire', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70111, 701, 'Ditlantas Polda Papua', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70112, 701, 'Polres Resort Mimika', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70201, 702, 'Polres Manokwari', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70202, 702, 'Polres Kaimana', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70203, 702, 'Polres Kabupaten Sorong', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70204, 702, 'Polres Sorong Kota', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70205, 702, 'Polres Fakfak', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70206, 702, 'Polres Resort Manokwari', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70207, 702, 'Polres Sanggeng', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70208, 702, 'Polres Raja Ampat', '', '', NULL, NULL, NULL);
INSERT INTO `polres` VALUES (70210, 702, 'Ditlantas Polda Papua Barat', '', '', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for polsek
-- ----------------------------
DROP TABLE IF EXISTS `polsek`;
CREATE TABLE `polsek`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `polres_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `telepon` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7020804 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of polsek
-- ----------------------------
INSERT INTO `polsek` VALUES (1010101, 10101, 'Polsek Menteng', 'Jl. Sutan Syahrir No.1, RT.7/RW.2, Gondangdia, Menteng, Kota Jakarta Pusat, DKI Jakarta 10350', '(021) 3909162', NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010102, 10101, 'Polsek Senen', 'Jl. Stasiun Senen, RW.3, Senen, Jakarta Pusat, Kota Jakarta Pusat, DKI Jakarta 10410', '(021) 4265618', NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010103, 10101, 'Polsek Sawah Besar', 'Jl. Dr. Wahidin No. 8, Sawah Besar, Ps. Baru, Sawah Besar, Kota Jakarta Pusat, DKI Jakarta 10710', '(021) 3454363', NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010104, 10101, 'Polsek Metro Gambir', 'Jl. Cideng Bar. Dalam No.12, RT.13/RW.1, Cideng, Gambir, Kota Jakarta Pusat, DKI Jakarta 10150', '(021) 3456422', NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010105, 10101, 'Polsek Metro Cempaka Putih', '-', '-', NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010106, 10101, 'Polsek Johor Baru', '-', '-', NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010107, 10101, 'Polsek Tahah Abang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010108, 10101, 'Polsek Kemayoran', '-', '-', NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010201, 10102, 'Polsek Metro Cilandak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010202, 10102, 'Polsek Pancoran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010203, 10102, 'Polsek Pesanggrahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010204, 10102, 'Polsek Kebayoran Lama', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010205, 10102, 'Polsek Metro Setiabudi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010206, 10102, 'Polsek Mampang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010207, 10102, 'Polsek Jagakarsa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010208, 10102, 'Polsek Pasar Minggu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010209, 10102, 'Polsek Metropolitan Tebet', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010210, 10102, 'Polsek Metro Kebayoran Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010211, 10102, 'Polsek Tebet', '-', '-', NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010301, 10103, 'Polsek Palmerah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010302, 10103, 'Polsek Kebon Jeruk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010303, 10103, 'Polsek Tambora', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010304, 10103, 'Polsek Kembangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010305, 10103, 'Polsek Kalideres', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010306, 10103, 'Polsek Cengkareng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010307, 10103, 'Polsek Tanjung Duren', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010308, 10103, 'Polsek Metro Taman Sari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010401, 10104, 'Polsek Penjaringan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010402, 10104, 'Polsek Cilincing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010403, 10104, 'Polsek Koja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010404, 10104, 'Polsek Tanjung Priok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010405, 10104, 'Polsek Kelapa Gading', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010406, 10104, 'Polsek Pademangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010501, 10105, 'Polsek Jatinegara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010502, 10105, 'Polsek Kramat Jati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010503, 10105, 'Polsek Pasar Rebo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010504, 10105, 'Polsek Matraman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010505, 10105, 'Polsek Metro Makassar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010506, 10105, 'Polsek Cakung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010507, 10105, 'Polsek Pulo gadung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010508, 10105, 'Polsek Cipayung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010509, 10105, 'Polsek Duren Sawit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010510, 10105, 'Polsek Pasar Rebo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010601, 10106, 'Polsek Tangerang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010602, 10106, 'Polsek Cipondoh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010603, 10106, 'Polsek Benda', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010604, 10106, 'Polsek Ciledug', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010605, 10106, 'Polsek Batu Ceper', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010606, 10106, 'Polsek Karawaci', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010607, 10106, 'POLSEK JATIUWUNG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010609, 10106, 'Polsek Pasar Kemis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010610, 10106, 'Polsek Cipondoh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010611, 10106, 'Polsek Rajeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010612, 10106, 'Polres Metro Tangerang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010613, 10106, 'Polsek Neglasari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010701, 10107, 'Polsek Bekasi Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010702, 10107, 'Polsek Bekasi Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010703, 10107, 'Polsek Bekasi Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010704, 10107, 'Polsek Bekasi Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010705, 10107, 'Polsek Bantar Gebang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010706, 10107, 'Polsek Jatiasih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010707, 10107, 'Polsek Pondok Gede', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010708, 10107, 'Polsek Babelan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010709, 10107, 'Polsek Kedung Waringin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010710, 10107, 'Polsek Medan Satria', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010711, 10107, 'Polsek Kota Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010712, 10107, 'Polsek Cabang Bungin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010713, 10107, 'Polsek Tambelang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010801, 10108, 'Polsek Beji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010802, 10108, 'Polsek Sawangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010803, 10108, 'Polsek Pancoran Mas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010804, 10108, 'Polsek Sukma Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010805, 10108, 'Polsek Cimanggis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010806, 10108, 'Polsek Limo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010901, 10109, 'Polsek Kalibaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010902, 10109, 'Polsek Muara Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1010903, 10109, 'Polsek Sunda Kelapa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011001, 10110, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011101, 10111, 'Polsek Serpong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011102, 10111, 'Polsek Pondok Aren', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011103, 10111, 'Polsek Pamulang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011104, 10111, 'Polsek Ciputat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011105, 10111, 'Polsek Metro Ciputat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011106, 10111, 'Polsek Cisauk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011107, 10111, 'Polsek Kelapa Dua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011108, 10111, 'Polsek Curug', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011201, 10112, 'Polsek Pulau Seribu Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011202, 10112, 'Polsubsektor Pulau Panggang Polsek ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011203, 10112, 'Polsek Kepulauan Seribu Selatan - P', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011204, 10112, 'Polsek Pulau Seribu Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011301, 10113, 'Polsek Jatiuwung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011314, 10113, 'Polsek Teluk Naga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011315, 10113, 'Polsek Jatiuwung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011501, 10115, 'Polsek Cikarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011502, 10115, 'Polsek Tambun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011503, 10115, 'Polsek Tarumajaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011601, 10116, 'Polsek Medan Satria', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1011801, 10118, 'Polsek Bojong Gede', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020101, 10201, 'Polsek Buahbatu ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020201, 10202, 'Polsek Bandung Kidul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020202, 10202, 'Polsek Margaasih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020203, 10202, 'Polsek Margahayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020204, 10202, 'Polsek Bojongsoang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020205, 10202, 'Polsek Cileunyi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020206, 10202, 'Polsek Dayeuh Kolot', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020207, 10202, 'Polsek Katapang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020208, 10202, 'Polsek Baleendah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020209, 10202, 'Polsek Soreang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020210, 10202, 'Polsek Ujung Berung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020211, 10202, 'Polsek Banjaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020212, 10202, 'Polresta Bandung Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020213, 10202, 'Polsek Regol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020214, 10202, 'Polsekta Lengkong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020215, 10202, 'Polsek Sukasari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020216, 10202, 'Polsek Pameungpeuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020217, 10202, 'Polsek Cidadap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020218, 10202, 'Polsek Lembang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020301, 10203, 'Polsek Bogor Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020302, 10203, 'Polsek Tanah Sareal Bogor', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020303, 10203, 'Polsek Bogor Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020304, 10203, 'Polsek Bogor Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020305, 10203, 'Polsek Sukaraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020306, 10203, 'Polsek Dramaga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020307, 10203, 'Polsek Ciomas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020401, 10204, 'Polsek Caringin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020402, 10204, 'Polsek Gunung Putri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020403, 10204, 'Polsek Parung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020502, 10205, 'Polsek Weru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020503, 10205, 'Polsek Cirebon Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020504, 10205, 'Polsek Sel-Tim', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020505, 10205, 'Polsek Kedawung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020601, 10206, 'Polsek Sumber', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020602, 10206, 'Polsek Talun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020603, 10206, 'Polsek Arjawinangun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020604, 10206, 'Polsek Plered', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020605, 10206, 'Polsek Gunung Jati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020606, 10206, 'Polsek Astanajapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020607, 10206, 'Polsek Pabuaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020608, 10206, 'Polsek Gempol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020609, 10206, 'Polsek Klangenan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020701, 10207, 'Polsek Indramayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020702, 10207, 'Polsek Balongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020703, 10207, 'Polsek Haurgeulis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020704, 10207, 'Polsek Jatibarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020705, 10207, 'Polsek Sindang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020706, 10207, 'Polsek Patrol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020707, 10207, 'POLSEK GANTAR', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020708, 10207, 'Polsek Sukra', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020709, 10207, 'Polsek Anjatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020710, 10207, 'Polsek Kroya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020711, 10207, 'Polsek Anjatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020712, 10207, 'Polsek Gabus Wetan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020713, 10207, 'Polsek Lelea', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020714, 10207, 'Polsek Bongas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020715, 10207, 'Polsek Losarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020716, 10207, 'Polsek Widasari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020801, 10208, 'Polsek Kuningan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020802, 10208, 'Polsek Garawangi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020803, 10208, 'Polsek Jalaksana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020804, 10208, 'Polsek Pasawahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020805, 10208, 'Polsek Cilimus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020806, 10208, 'Polsek Pancalang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020807, 10208, 'Polsek Mandirancan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020808, 10208, 'Polsek Cibingbin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020809, 10208, 'Polsek Ciniru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020810, 10208, 'Polsek Luragung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020811, 10208, 'Polsek Selajambe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020812, 10208, 'Polsek Darma', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020813, 10208, 'Polsek Ciwaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020814, 10208, 'Polsek Subang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020815, 10208, 'Polsek Cidahu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020816, 10208, 'Polsek Ciawi Gebang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020817, 10208, 'Polsek Kadugede', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020818, 10208, 'Polsek Ciawigebang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020819, 10208, 'Polsek Cigugur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020901, 10209, 'Polsek Kota Majalengka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020902, 10209, 'Polsek Kadipaten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020903, 10209, 'Polsek Dawuan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020904, 10209, 'Polsek Talaga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020905, 10209, 'Polsek Kertajati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020906, 10209, 'Polsek Ligung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020907, 10209, 'Polsek Sumberjaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020908, 10209, 'Polsek Maja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020909, 10209, 'POLSEK Cikijing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020910, 10209, 'Polsek Leuwimunding', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020911, 10209, 'Polsek Cigasong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020912, 10209, 'Polsek Jatiwangi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020913, 10209, 'POLSEK PALASAH', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020914, 10209, 'Polsek Jatitujuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020915, 10209, 'Polsek Sumber Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020916, 10209, 'Polsek Kasokandel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1020917, 10209, 'Polsek Bantarujeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021001, 10210, 'Polsek Cimahi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021002, 10210, 'Polsek Pharmindo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021003, 10210, 'Polsek Cimenyan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021004, 10210, 'Polsek Lembang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021101, 10211, 'Polsek Purwakarta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021102, 10211, 'Polsek Bungursari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021103, 10211, 'Polsek Jatiluhur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021104, 10211, 'Polsek Cibatu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021105, 10211, 'Polsek Sukatani', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021201, 10212, 'Polsek Karawang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021202, 10212, 'Polsek Karawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021203, 10212, 'Polsek Teluk Jambe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021204, 10212, 'Polsek Klari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021205, 10212, 'Polsek kotabaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021206, 10212, 'Polsek Ciampel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021207, 10212, 'Polsek Cilamaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021208, 10212, 'Polsek Cikampek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021209, 10212, 'Polsek Telaga Sari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021210, 10212, 'Polsek Rengasdengklok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021301, 10213, 'Polsek Indihiang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021302, 10213, 'Polsek Tamansari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021401, 10214, 'Polsek Kawalu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021402, 10214, 'Polsek Sukarame Polres Tasikmalaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021403, 10214, 'Polsek Singaparna, Tasikmalaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021404, 10214, 'Polsek Sukaraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021405, 10214, 'Polsek Salawu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021406, 10214, 'Polsek Cisayong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021407, 10214, 'Polsek Salopa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021408, 10214, 'Polsek Taraju', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021409, 10214, 'Polsek Pagerageung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021410, 10214, 'Polsek Rajapolah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021411, 10214, 'Polsek Ciawi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021412, 10214, 'Polsek Pagerageung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021413, 10214, 'Polsek Kadipaten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021414, 10214, 'Polsek Leuwisari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021415, 10214, 'Polsek Bojonggambir, Polres Tasikma', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021416, 10214, 'Polsek Cineam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021501, 10215, 'Polsek Garut Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021601, 10216, 'Polsek Sumedang Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021602, 10216, 'Polsek Sumedang Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021603, 10216, 'Polsek Sumedang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021604, 10216, 'Polsek Jatinangor', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021605, 10216, 'Polsek Sumedang Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021606, 10216, 'Polsek Tanjungsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021607, 10216, 'Polsek Situraja Sumedang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021608, 10216, 'Polsek Cimalaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021609, 10216, 'Polsek Tomo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021610, 10216, 'Polsek Cisitu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021611, 10216, 'Polsek Conggeang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021612, 10216, 'Polsek Buah Dua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021613, 10216, 'Polsek Rancakalong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021614, 10216, 'Polsek Jatinangor', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021615, 10216, 'Polsek Tanjung Kerta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021616, 10216, 'Polsek Congeang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021617, 10216, 'Polsek Tanjungkerta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021618, 10216, 'Polsek Jatigede', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021619, 10216, 'Polsek ganeas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021620, 10216, 'POLSEK CIBUGEL', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021701, 10217, 'Polsek Cikole', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021702, 10217, 'Polsek Baros', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021703, 10217, 'Polsek Citamiang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021704, 10217, 'Polsek Cibeureum Sukabumi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021705, 10217, 'Polsek Gunung Puyuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021706, 10217, 'Polsek Lembur Situ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021801, 10218, 'Polsek Sukabumi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021802, 10218, 'Polsek Sukaraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021803, 10218, 'Polsek Cisaat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021804, 10218, 'Polsek Sukalarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021805, 10218, 'Polsek Cibadak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021806, 10218, 'Polsek Nagrak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021807, 10218, 'Polsek Cikembar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021808, 10218, 'Polsek Warungkiara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021809, 10218, 'Polsek Cicurug', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021810, 10218, 'Polsek Cisolok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021811, 10218, 'Polsek Cicurug', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021812, 10218, 'Polsek Kadudampit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021901, 10219, 'Polsek Subang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021902, 10219, 'Polsek Kalijati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021903, 10219, 'Polsek Patokbeusi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021904, 10219, 'Polsek Ciasem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021905, 10219, 'Polsek Pabuaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021906, 10219, 'Polsek Pusakanegara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021907, 10219, 'Polsek Jalan Cagak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021908, 10219, 'Polsek Pamanukan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1021909, 10219, 'Polsek Sagalaherang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022001, 10220, 'Polsek Panjalu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022002, 10220, 'Polsek Ciamis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022003, 10220, 'Polsek Cikoneng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022004, 10220, 'Polsek Cihaurbeuti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022101, 10221, 'Polsek Cianjur Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022102, 10221, 'Polsek Cianjur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022103, 10221, 'Polsek Pacet', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022104, 10221, 'Polsek Sukaresmi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022105, 10221, 'Polsek Sugenang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022106, 10221, 'Polsek Pacet', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022107, 10221, 'Polsek Cikalong Kulon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022108, 10221, 'Polsek Warung Kondang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022109, 10221, 'Polsek Cibeber', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022110, 10221, 'Polsek Sukabumi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022111, 10221, 'Polsek Karang Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022112, 10221, 'Polsek Mande', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022113, 10221, 'Polsek Ciranjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022114, 10221, 'Polsek Sukaluyu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022115, 10221, 'Polsek Cisarua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022116, 10221, 'Polsek Cibeber', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022117, 10221, 'Polsek Cugenang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022118, 10221, 'Polsek Ciranjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022201, 10222, 'Polsek Banjar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022202, 10222, 'Polsek Kota Banjar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022203, 10222, 'Polsek Purwaharja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022204, 10222, 'Polsek Purwaharja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022205, 10222, 'Polsek Langensari Kota Banjar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1022206, 10222, 'Polsek Pataruman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030101, 10301, 'Polsek Cimarga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030102, 10301, 'Polsek Sajira', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030103, 10301, 'Polsek Cipanas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030104, 10301, 'Polsek Leuwidamar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030105, 10301, 'Polsek Warung Gunung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030106, 10301, 'Polsek Cibadak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030107, 10301, 'Polsek Bayah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030108, 10301, 'Polsek Cibeber', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030109, 10301, 'Polsek Maja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030110, 10301, 'Polsek Gunung Kencana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030111, 10301, 'Polsek Muncang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030112, 10301, 'Polsek Walantaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030113, 10301, 'Polsek Cileles', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030114, 10301, 'Polsek Cikulur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030115, 10301, 'Polsek Banjarsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030201, 10302, 'Polsek Pandeglang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030202, 10302, 'Polsek Mandalawangi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030203, 10302, 'Polsek Cadasari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030204, 10302, 'Polsek Pandeglang Banten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030205, 10302, 'Polsek Carita', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030206, 10302, 'Polsek Banjar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030207, 10302, 'Polsek Cimanuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030208, 10302, 'Polsek Saketi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030209, 10302, 'Polsek Bojong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030210, 10302, 'Polsek Maja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030211, 10302, 'Polsek Munjul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030212, 10302, 'Polsek Cimanuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030213, 10302, 'Polsek Cibaliung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030301, 10303, 'Polsek Serang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030302, 10303, 'Polsek Kramat Watu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030303, 10303, 'Polsek Cikande', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030304, 10303, 'Polsek Pabuaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030305, 10303, 'Polsek Cikupa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030306, 10303, 'Polsek Cipocok Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030307, 10303, 'Polsek Curug', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030308, 10303, 'Polsek Kasemen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030309, 10303, 'Polsek Kragilan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030310, 10303, 'Polsek Walantaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030311, 10303, 'Polsek Kragilan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030312, 10303, 'Polsek Carenang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030313, 10303, 'Polsek Taktakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030401, 10304, 'Polsek Cilegon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030402, 10304, 'Polsek Bojonegara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030501, 10305, 'Polsek Serang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030502, 10305, 'Polsek Kasemen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030503, 10305, 'Polsek Walantaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030504, 10305, 'Polsek Taktakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030601, 10306, 'Polsek Cipondoh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030602, 10306, 'Polsek Benda', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030603, 10306, 'Polsek Balaraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030604, 10306, 'Polsek Cikupa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030605, 10306, 'Polsek Panongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1030606, 10306, 'Polsek Pasar kemis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040101, 10401, 'Polsek Semarang Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040102, 10401, 'Polsek Semarang Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040103, 10401, 'Polsek Semarang Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040104, 10401, 'Polsek Semarang Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040105, 10401, 'Polsek Tugu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040106, 10401, 'Polsek Banyumanik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040107, 10401, 'Polsek Gajah Mungkur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040108, 10401, 'Polsek Sidodadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040109, 10401, 'Polsek Kembangsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040110, 10401, 'Polsek Kali Banteng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040111, 10401, 'Polsek Mijen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040112, 10401, 'Polsek Purwadinatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040113, 10401, 'Polsek Candisari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040201, 10402, 'Polsek Banjarsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040202, 10402, 'Polsek Laweyan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040203, 10402, 'Polsek Jebres', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040204, 10402, 'Polsek Serengan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040205, 10402, 'Polsek Karanganyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040206, 10402, 'Polsek Jatinom', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040207, 10402, 'Polresta Surakarta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040208, 10402, 'Polsek Kartasura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040209, 10402, 'Polsek Jaten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040210, 10402, 'Polsek Weru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040211, 10402, 'Polsek Pasar Kliwon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040301, 10403, 'Polsek Banjarnegara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040302, 10403, 'Polsek Mandiraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040303, 10403, 'Polsek Rakit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040304, 10403, 'Polsek Kalibening', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040305, 10403, 'Polsek Batur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040306, 10403, 'Polsek Wanayasa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040401, 10404, 'Polsek Cilongok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040402, 10404, 'Polsek Wangon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040403, 10404, 'Polsek Rawalo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040404, 10404, 'Polsek Sumpiuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040405, 10404, 'Polsek Banyumas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040406, 10404, 'Polsek Sumbang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040407, 10404, 'Polsek Purwokerto Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040408, 10404, 'Polsek Sokaraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040409, 10404, 'Polsek Somagede', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040410, 10404, 'Polsek Kebasen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040411, 10404, 'Polsek Kemranjen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040412, 10404, 'Polsek Kembaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040413, 10404, 'Polsek Tambak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040414, 10404, 'Polsek Purwojati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040415, 10404, 'Polsek Purwokerto Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040416, 10404, 'Polsek Pekuncen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040417, 10404, 'Polsek Lumbir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040418, 10404, 'Polsek Ajibarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040501, 10405, 'Polsek Tulis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040502, 10405, 'Polsek Blado', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040503, 10405, 'Polsek Subah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040504, 10405, 'Polsek Bawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040505, 10405, 'Polsek Bandar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040506, 10405, 'Polsek Limpung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040507, 10405, 'Polsek Warungasem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040508, 10405, 'Polsek Tersono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040509, 10405, 'Polsek Wonotunggal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040601, 10406, 'Polsek Blora Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040602, 10406, 'Polsek Blora', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040701, 10407, 'Polsek Kota Boyolali', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040702, 10407, 'Polsek Teras', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040703, 10407, 'Polsek Selo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040704, 10407, 'Polsek Simo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040705, 10407, 'Polsek Ampel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040706, 10407, 'Polsek Mojosongo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040707, 10407, 'Polsek Cepogo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040708, 10407, 'Polsek Nogosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040709, 10407, 'Polsek Sawit Boyolali', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040710, 10407, 'Polsek Kemusu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040711, 10407, 'Polsek Sambi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040712, 10407, 'Polsek Klego', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040713, 10407, 'Polsek Andong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040714, 10407, 'Polsek Wonosegoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040715, 10407, 'Polsek Tulung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040716, 10407, 'Polsek Ngemplak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040717, 10407, 'Polsek Juwangi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040801, 10408, 'Polsek Brebes', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040802, 10408, 'Polsek Larangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040803, 10408, 'Polsek Tanjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040804, 10408, 'Polsek Tonjong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040805, 10408, 'Polsek Banjarharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040806, 10408, 'Polsek Bulakamba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040807, 10408, 'Polsek Paguyangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040808, 10408, 'Polsek Ketanggungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040809, 10408, 'Polsek Losari Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040810, 10408, 'Polsek Jatibarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040811, 10408, 'Polsek Kersana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040812, 10408, 'Polsek Losari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040813, 10408, 'Polsek Bumiayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040814, 10408, 'Polsek Bantarkawung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040815, 10408, 'Polsek Wanasari ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040816, 10408, 'Polsek Tonjong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040817, 10408, 'Polsek Sirampog Brebes', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040901, 10409, 'Polsek Cilacap Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040902, 10409, 'Polsek Cilacap Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040903, 10409, 'Polsek Cilacap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040904, 10409, 'Polsek Cilacap Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040905, 10409, 'Polsek Adipala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040906, 10409, 'Polsek Maos', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040907, 10409, 'Polsek Kroya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040908, 10409, 'Polsek Karangpucung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040909, 10409, 'Polsek Jeruklegi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040910, 10409, 'Polsek Bantarsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040911, 10409, 'Polsek Kesugihan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040912, 10409, 'Polsek Kawungaten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040913, 10409, 'Polsek Patimuan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1040914, 10409, 'Polsek Kawasan Pelabuhan Tanjung In', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041001, 10410, 'Polsek Demak Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041002, 10410, 'Polsek Wedung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041003, 10410, 'Polsek Sayung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041004, 10410, 'Polsek Dempet', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041005, 10410, 'Polsek Mranggen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041006, 10410, 'Polsek Kebonagung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041007, 10410, 'Polsek Mijen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041008, 10410, 'Polsek Guntur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041009, 10410, 'Polsek Karang Anyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041010, 10410, 'Polsek Wedung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041011, 10410, 'Polsek Karang Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041012, 10410, 'Polsek Wonosalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041013, 10410, 'Polsek Bonang Demak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041014, 10410, 'Polsek Mijen Demak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041015, 10410, 'Polsek Karangawen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041101, 10411, 'Polsek Grobogan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041102, 10411, 'Polsek Brati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041103, 10411, 'Polsek Purwodadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041104, 10411, 'Polsek Gabus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041105, 10411, 'Polsek Gubug', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041106, 10411, 'Polsek Godong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041107, 10411, 'Polsek Karangrayung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041108, 10411, 'Polsek Tanggungharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041109, 10411, 'Polsek Wirosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041110, 10411, 'Polsek Toroh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041111, 10411, 'Polsek Ngaringan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041112, 10411, 'Polsek Tawangharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041113, 10411, 'Polsek Penawangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041114, 10411, 'Polsek Klambu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041115, 10411, 'Polsek Gundih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041116, 10411, 'Polsek Pulokulon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041117, 10411, 'Polsek Kedung Jati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041201, 10412, 'Polsek Jepara Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041202, 10412, 'Polsek Pecangaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041203, 10412, 'Polsek Kalinyamatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041204, 10412, 'Polsek Mayong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041205, 10412, 'Polsek Nalumsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041206, 10412, 'Polsek Kedung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041207, 10412, 'Polsek Keling', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041208, 10412, 'Polsek Welahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041209, 10412, 'Polsek Karimun Jawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041210, 10412, 'Polsek Bangsri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041211, 10412, 'Polsek Donorojo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041301, 10413, 'Polsek Karanganyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041302, 10413, 'Polsek Matesih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041303, 10413, 'Polsek Kebakkramat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041304, 10413, 'Polsek Tasikmadu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041305, 10413, 'Polsek Karangpandan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041306, 10413, 'Polsek Karanganyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041307, 10413, 'Polsek Jatipuro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041308, 10413, 'Polsek Gondangrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041309, 10413, 'Polsek Kerjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041310, 10413, 'Polsek Tasikmadu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041311, 10413, 'Polsek Tawangmangu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041312, 10413, 'Polsek Colomadu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041313, 10413, 'Polsek Jenawi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041314, 10413, 'Polsek Jaten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041315, 10413, 'Polsek Ngargoyoso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041401, 10414, 'Polsek Alian', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041402, 10414, 'Polsek Kebumen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041501, 10415, 'Polsek Kendal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041502, 10415, 'Polsek Kaliwungu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041503, 10415, 'Polsek Boja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041504, 10415, 'Polsek Weleri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041505, 10415, 'Polsek Cepiring', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041506, 10415, 'Polsek Sukorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041507, 10415, 'Polsek Kangkung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041508, 10415, 'Polsek Brangsong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041509, 10415, 'Polsek Plantungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041510, 10415, 'Polsek Patean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041511, 10415, 'Polsek Gemuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041512, 10415, 'Polsek Patebon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041513, 10415, 'Polsek Cepiring', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041514, 10415, 'Polsek Limbangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041515, 10415, 'Polsek Rowosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041516, 10415, 'Polsek Pengandon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041517, 10415, 'Polsek pageruyung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041601, 10416, 'Polsek Klaten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041602, 10416, 'Polsek Ketandan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041603, 10416, 'Polsek Jogonalan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041604, 10416, 'Polsek Bayat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041605, 10416, 'Polsek Pedan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041606, 10416, 'Polsek Wedi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041607, 10416, 'Polsek Karangdowo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041608, 10416, 'Polsek Prambanan Klaten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041609, 10416, 'Polsek Cawas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041610, 10416, 'Polsek Ceper', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041611, 10416, 'Polsek Kalikotes', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041701, 10417, 'Polsek Kudus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041702, 10417, 'Polsek Jati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041703, 10417, 'Polsek Bae', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041704, 10417, 'Polsek Undaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041705, 10417, 'Polsek Mejobo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041706, 10417, 'Polsek Jekulo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041707, 10417, 'Polsek Kaliwungu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041708, 10417, 'Polsek Gebog', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041709, 10417, 'Polsek Dawe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041710, 10417, 'Polsek Undaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041711, 10417, 'Polsek Margorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041712, 10417, 'Polsek Brati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041713, 10417, 'Polsek Klambu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041714, 10417, 'Polsek Tenggeles', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041715, 10417, 'Polsek Cendono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041801, 10418, 'Polsek Pakis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041802, 10418, 'Polsek Mertoyudan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041803, 10418, 'Polsek Bandongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041804, 10418, 'Polsek Secang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041805, 10418, 'Polsek Mungkid', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041806, 10418, 'Polsek Salaman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041807, 10418, 'Polsek Candimulyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041808, 10418, 'Polsek Ngluwar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041809, 10418, 'Polsek Grabag', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041810, 10418, 'Polsek Sawangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041811, 10418, 'Polsek Muntilan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041812, 10418, 'Polsek Tegalrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041813, 10418, 'Polsek Dukun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041814, 10418, 'Polsek Borobudur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041815, 10418, 'Polsek Salam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041816, 10418, 'Polsek Kaliangkrik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041817, 10418, 'Polsek Srumbung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041818, 10418, 'Polsek Windusari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041819, 10418, 'Polsek Ngablak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041820, 10418, 'Polsek Kajoran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041821, 10418, 'Polsek Tempuran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041901, 10419, 'Polsek Magelang Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041902, 10419, 'Polsek Magelang Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1041903, 10419, 'Polsek Magelang Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042001, 10420, 'Polsek Batangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042002, 10420, 'Polsek Cluwak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042003, 10420, 'Polsek Dukuh Seti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042004, 10420, 'Polsek Gabus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042005, 10420, 'Polsek gembong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042006, 10420, 'Polsek Gunung Wungkal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042007, 10420, 'Polsek Jaken', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042008, 10420, 'Polsek Jakenan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042009, 10420, 'Polsek Juwana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042010, 10420, 'Polsek Kayen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042011, 10420, 'Polsek Margorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042012, 10420, 'Polsek Margoyoso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042013, 10420, 'Polsek Pati Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042014, 10420, 'Polsek Pucak Wangi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042015, 10420, 'Polsek Sukolilo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042016, 10420, 'Polsek Tambak Romo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042017, 10420, 'Polsek Tayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042018, 10420, 'Polsek Tlogowungu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042019, 10420, 'Polsek Wedari Jaksa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042020, 10420, 'Polsek Winong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042101, 10421, 'Polsek Bojong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042102, 10421, 'Polsek Doro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042103, 10421, 'Polsek Kajen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042104, 10421, 'Polsek Kandangserang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042105, 10421, 'Polsek Karanganyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042106, 10421, 'Polsek Karangdadap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042107, 10421, 'Polsek Kedungwuni', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042108, 10421, 'Polsek Kesesi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042109, 10421, 'Polsek Lebak Barang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042110, 10421, 'Polsek Paninggaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042111, 10421, 'Polsek Petungkriyono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042112, 10421, 'Polsek Sragi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042113, 10421, 'Polsek Talun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042114, 10421, 'Polsek Wiradesa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042115, 10421, 'Polsek Wonopringgo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042201, 10422, 'Polsek Pekalongan Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042202, 10422, 'Polsek Pekalongan Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042203, 10422, 'Polsek Pekalongan Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042204, 10422, 'Polsek Pekalongan Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042205, 10422, 'Polsek Tirto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042206, 10422, 'Polsek Buaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042301, 10423, 'Polsek Ampelgading', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042302, 10423, 'Polsek Bantarbolang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042303, 10423, 'Polsek Bodeh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042304, 10423, 'Polsek Belik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042305, 10423, 'Polsek Comal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042306, 10423, 'Polsek Moga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042307, 10423, 'Polsek Pemalang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042308, 10423, 'Polsek Petarukan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042309, 10423, 'Polsek Pulosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042310, 10423, 'Polsek Randudongkal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042311, 10423, 'Polsek Taman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042312, 10423, 'Polsek Ulujami', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042313, 10423, 'Polsek Warungpring', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042314, 10423, 'Polsek Watukumpul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042401, 10424, 'Polsek Bobotsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042402, 10424, 'Polsek Karangreja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042403, 10424, 'Polsek Karanganyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042404, 10424, 'Polsek Karangmoncol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042405, 10424, 'Polsek Rembang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042406, 10424, 'Polsek Kejobong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042407, 10424, 'Polsek Pengadegan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042408, 10424, 'Polsek Kaligondang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042409, 10424, 'Polsek Bukateja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042410, 10424, 'Polsek Kemangkon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042411, 10424, 'Polsek Kalimanah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042412, 10424, 'Polsek Purbalingga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042413, 10424, 'Polsek Padamara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042414, 10424, 'Polsek Kutasari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042415, 10424, 'Polsek Bojongsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042416, 10424, 'Polsek Mrebet', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042501, 10425, 'Polsek Bagelen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042502, 10425, 'Polsek Banyuurip', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042503, 10425, 'Polsek Bayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042504, 10425, 'Polsek Bener', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042505, 10425, 'Polsek Bruno', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042506, 10425, 'Polsek Butuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042507, 10425, 'Polsek Gebang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042508, 10425, 'Polsek Grabag', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042509, 10425, 'Polsek Kaligesing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042510, 10425, 'Polsek Kemiri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042511, 10425, 'Polsek Kutoarjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042512, 10425, 'Polsek Loano', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042513, 10425, 'Polsek Ngombol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042514, 10425, 'Polsek Pituruh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042515, 10425, 'Polsek Purwodadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042516, 10425, 'Polsek Purworejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042601, 10426, 'Polsek Bulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042602, 10426, 'Polsek Gunem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042603, 10426, 'Polsek Kaliori', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042604, 10426, 'Polsek Kota Rembang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042605, 10426, 'Polsek Kragan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042606, 10426, 'Polsek Lasem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042607, 10426, 'Polsek Pamotan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042608, 10426, 'Polsek Pancur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042609, 10426, 'Polsek Sale', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042610, 10426, 'Polsek Sarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042611, 10426, 'Polsek Sedan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042612, 10426, 'Polsek Sluke', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042613, 10426, 'Polsek Sulang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042614, 10426, 'Polsek Sumber', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042701, 10427, 'Polsek Argomulyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042702, 10427, 'Polsek Sidomukti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042703, 10427, 'Polsek Sidorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042704, 10427, 'Polsek Tingkir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042801, 10428, 'Polsek Semarang Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042802, 10428, 'Polsek Semarang Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042803, 10428, 'Polsek Semarang Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042804, 10428, 'Polsek Genuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042805, 10428, 'Polsek Pedurungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042806, 10428, 'Polsek Gayamsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042807, 10428, 'Polsek Gunungpati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042808, 10428, 'Polsek Gajah Mungkur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042809, 10428, 'Polsek Banyumanik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042810, 10428, 'Polsek Kalibanteng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042811, 10428, 'Polsek Tugu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042812, 10428, 'Polsek Ngaliyan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042813, 10428, 'Polsek Mijen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042901, 10429, 'Polsek Santel/Pemkab', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042902, 10429, 'Polsek SAR Himalawu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042903, 10429, 'Polsek Sambung Macan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042904, 10429, 'Polsek Ngrampal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042905, 10429, 'Polsek Gondang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042906, 10429, 'Polsek Sambirejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042907, 10429, 'Polsek Kedawung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042908, 10429, 'Polsek Karangmalang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042909, 10429, 'Polsek Sidoharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042910, 10429, 'Polsek Masaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042911, 10429, 'Polsek Jenar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042912, 10429, 'Polsek Tangen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042913, 10429, 'Polsek Gesi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042914, 10429, 'Polsek Sukodono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042915, 10429, 'Polsek Mondokan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042916, 10429, 'Polsek Sumber Lawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042917, 10429, 'Polsek Gemolong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1042918, 10429, 'Polsek Kalijambe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043001, 10430, 'Polsek Kartasura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043002, 10430, 'Polsek Gatak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043003, 10430, 'Polsek Baki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043004, 10430, 'Polsek Grogol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043005, 10430, 'Polsek Mojolaban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043006, 10430, 'Polsek Polokarto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043007, 10430, 'Polsek Bendosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043008, 10430, 'Polsek Nguter', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043009, 10430, 'Polsek Bulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043010, 10430, 'Polsek Tawangsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043011, 10430, 'Polsek Weru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043012, 10430, 'Polsek Sukoharjo Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043101, 10431, 'Polsek Adiewerna', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043102, 10431, 'Polsek Balapulang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043103, 10431, 'Polsek Bojong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043104, 10431, 'Polsek Bumijawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043105, 10431, 'Polsek Dukuhturi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043106, 10431, 'Polsek Dukuhwaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043107, 10431, 'Polsek Jatinegara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043108, 10431, 'Polsek Kedung Banteng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043109, 10431, 'Polsek Kramat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043110, 10431, 'Polsek Lebaksiu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043111, 10431, 'Polsek Margasari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043112, 10431, 'Polsek Pagerbarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043113, 10431, 'Polsek Pangkah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043114, 10431, 'Polsek Slawi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043115, 10431, 'Polsek Surodadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043116, 10431, 'Polsek Talang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043117, 10431, 'Polsek Tarub', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043118, 10431, 'Polsek Warurejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043201, 10432, 'Polsek Tegal Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043202, 10432, 'Polsek Tegal Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043203, 10432, 'Polsek Tegal Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043204, 10432, 'Polsek Sumurpanggang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043301, 10433, 'Polsek Bajen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043302, 10433, 'Polsek Bulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043303, 10433, 'Polsek Candiroto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043304, 10433, 'Polsek Jumo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043305, 10433, 'Polsek Kaloran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043306, 10433, 'Polsek Kandangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043307, 10433, 'Polsek Kedu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043308, 10433, 'Polsek Kranggan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043309, 10433, 'Polsek Ngadirejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043310, 10433, 'Polsek Parakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043311, 10433, 'Polsek Pringsurat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043312, 10433, 'Polsek Temanggung Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043313, 10433, 'Polsek Tembarak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043314, 10433, 'Polsek Tretep', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043401, 10434, 'Polsek?Baturetno', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043402, 10434, 'Polsek?Batuwarno', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043403, 10434, 'Polsek?Bulukerto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043404, 10434, 'Polsek?Eromoko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043405, 10434, 'Polsek?Girimarto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043406, 10434, 'Polsek?Giritontro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043407, 10434, 'Polsek?Giriwoyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043408, 10434, 'Polsek?Jatipurno', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043409, 10434, 'Polsek?Jatiroto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043410, 10434, 'Polsek?Jatisrono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043411, 10434, 'Polsek?Karangtengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043412, 10434, 'Polsek?Kismantoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043413, 10434, 'Polsek?Manyaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043414, 10434, 'Polsek?Ngadirojo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043415, 10434, 'Polsek?Nguntoronadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043416, 10434, 'Polsek?Paranggupito', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043417, 10434, 'Polsek?Pracimantoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043418, 10434, 'Polsek?Puhpelem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043419, 10434, 'Polsek?Purwantoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043420, 10434, 'Polsek?Selogiri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043421, 10434, 'Polsek?Sidoharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043422, 10434, 'Polsek?Slogohimo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043423, 10434, 'Polsek?Tirtomoyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043424, 10434, 'Polsek?Wonogiri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043425, 10434, 'Polsek Wuryantoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043501, 10435, 'Polsek Garung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043502, 10435, 'Polsek Kalikajar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043503, 10435, 'Polsek Kaliwiro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043504, 10435, 'Polsek Kejajar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043505, 10435, 'Polsek Kepil', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043506, 10435, 'Polsek Kertek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043507, 10435, 'Polsek Leksono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043508, 10435, 'Polsek Mojotengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043509, 10435, 'Polsek Sapuran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043510, 10435, 'Polsek Selomerto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043511, 10435, 'Polsek Sukoharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043512, 10435, 'Polsek Wadaslintang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043513, 10435, 'Polsek Watumalang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1043514, 10435, 'Polsek Wonosobo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050101, 10501, 'Polsek Ngampilan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050102, 10501, 'Polsek Tegalrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050103, 10501, 'Polsek Mantrijeron', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050104, 10501, 'Polsek Gondomanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050105, 10501, 'Polsek Kraton', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050106, 10501, 'Polsek Mergangsan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050107, 10501, 'Polsek Gondokusuman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050108, 10501, 'Polsek Wirobrajan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050109, 10501, 'Polsek Danurejan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050110, 10501, 'Polsek Jetis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050111, 10501, 'Polsek Gendongtengen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050112, 10501, 'Polsek Kotagede', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050113, 10501, 'Polsek Pakualaman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050114, 10501, 'Polsek Umbulharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050201, 10502, 'Polsek Sleman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050202, 10502, 'Polsek Mlati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050203, 10502, 'Polsek Depok Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050204, 10502, 'Polsek Ngaglik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050205, 10502, 'Polsek Pakem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050206, 10502, 'Polsek Kalasan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050207, 10502, 'Polsek Berbah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050208, 10502, 'Polsek Prambanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050209, 10502, 'Polsek Gamping', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050210, 10502, 'Polsek Turi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050211, 10502, 'Polsek Godean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050212, 10502, 'Polsek Seyegan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050213, 10502, 'Polsek Moyudan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050214, 10502, 'Polsek Minggir Sendangrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050215, 10502, 'Polsek Cangkringan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050216, 10502, 'Polsek Ngemplak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050217, 10502, 'Polsek Depok Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050218, 10502, 'Polsek Bulak Sumur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050219, 10502, 'Polsek Tempel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050301, 10503, 'Polsek Sedayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050302, 10503, 'Polsek Kasihan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050303, 10503, 'Polsek Sewon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050304, 10503, 'Polsek Banguntapan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050305, 10503, 'Polsek Piyungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050306, 10503, 'Polsek Dlingo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050307, 10503, 'Polsek Imogiri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050308, 10503, 'Polsek Pleret', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050309, 10503, 'Polsek Jetis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050310, 10503, 'Polsek Bantul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050311, 10503, 'Polsek Bambanglipuro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050312, 10503, 'Polsek Pundong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050313, 10503, 'Polsek Kretek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050314, 10503, 'Polsek Sanden', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050315, 10503, 'Polsek Pandak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050316, 10503, 'Polsek Srandakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050317, 10503, 'Polsek Pajangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050401, 10504, 'Polsek Patuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050402, 10504, 'Polsek Playen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050403, 10504, 'Polsek Paliyan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050404, 10504, 'Polsek Saptosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050405, 10504, 'Polsek Panggang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050406, 10504, 'Polsek Purwosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050407, 10504, 'Polsek Tepus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050408, 10504, 'Polsek Rongkop', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050409, 10504, 'Polsek Semanu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050410, 10504, 'Polsek Ronjong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050411, 10504, 'Polsek Karangmojo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050412, 10504, 'Polsek Semin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050413, 10504, 'Polsek Ngawen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050414, 10504, 'Polsek Nglipar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050415, 10504, 'Polsek Gedangsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050416, 10504, 'Polsek Tanjungsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050417, 10504, 'Polsek Wonosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050418, 10504, 'Polsek Girisubo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050501, 10505, 'Polsek Samigaluh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050502, 10505, 'Polsek Kalibawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050503, 10505, 'Polsek Nanggulan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050504, 10505, 'Polsek Girimulyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050505, 10505, 'Polsek Sentolo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050506, 10505, 'Polsek Lendah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050507, 10505, 'Polsek Panjatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050508, 10505, 'Polsek Galur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050509, 10505, 'Polsek Wates', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050510, 10505, 'Polsek Pengasih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050511, 10505, 'Polsek Kokap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1050512, 10505, 'Polsek Temon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060101, 10601, 'Polsek Tegalsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060102, 10601, 'Polsek Simokerto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060103, 10601, 'Polsek Genteng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060104, 10601, 'Polsek Bubutan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060105, 10601, 'Polsek Dukuh Pakis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060106, 10601, 'Polsek Gayungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060107, 10601, 'Polsek Jambangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060108, 10601, 'Polsek Sawahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060109, 10601, 'Polsek Wiyung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060110, 10601, 'Polsek Wonocolo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060111, 10601, 'Polsek Wonokromo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060112, 10601, 'Polsek Karang Pilang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060113, 10601, 'Polsek Gubeng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060114, 10601, 'Polsek Mulyorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060115, 10601, 'Polsek Rungkut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060116, 10601, 'Polsek Sukolilo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060117, 10601, 'Polsek Tambaksari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060118, 10601, 'Polsek Tenggilis Mejoyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060119, 10601, 'Polsek Pakal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060120, 10601, 'Polsek Sukomanunggal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060121, 10601, 'Polsek Laskar Santri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060122, 10601, 'Polsek Tendes', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060123, 10601, 'Polsek Benowo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060201, 10602, 'Polsek Sidoarjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060202, 10602, 'Polsek Candi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060203, 10602, 'Polsek Porong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060204, 10602, 'Polsek Waru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060205, 10602, 'Polsek Balongbendo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060206, 10602, 'Polsek Gedangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060207, 10602, 'Polsek Taman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060208, 10602, 'Polsek Buduran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060209, 10602, 'Polsek Krian', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060210, 10602, 'Polsek Tanggulangin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060211, 10602, 'Polsek Jabon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060212, 10602, 'Polsek Sedati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060213, 10602, 'Polsek Tulangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060214, 10602, 'Polsek Prambon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060215, 10602, 'Polsek Sukodono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060216, 10602, 'Polsek Wonoayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060217, 10602, 'Polsek Krembung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060218, 10602, 'Polsek Tarik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060301, 10603, 'Polsek Gresik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060302, 10603, 'Polsek Kebomas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060303, 10603, 'Polsek Driyorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060304, 10603, 'Polsek Wringin Anom', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060305, 10603, 'Polsek Kedamean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060306, 10603, 'Polsek Menganti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060307, 10603, 'Polsek Balongpanggang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060308, 10603, 'Polsek Benjeng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060309, 10603, 'Polsek Cerme', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060310, 10603, 'Polsek Duduk Sampean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060311, 10603, 'Polsek Bungah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060312, 10603, 'Polsek Manyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060313, 10603, 'Polsek Sidayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060314, 10603, 'Polsek Panceng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060315, 10603, 'Polsek Ujung Pangkah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060316, 10603, 'Polsek Dukun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060317, 10603, 'Polsek Kawasan Pelabuhan Gresik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060318, 10603, 'Polsek Sangkapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060319, 10603, 'Polsek Tambak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060401, 10604, 'Polsek Pabean Cantikan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060402, 10604, 'Polsek Semampir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060403, 10604, 'Polsek Asemrowo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060404, 10604, 'Polsek Kenjeran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060405, 10604, 'Polsek Krembangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060501, 10605, 'Polsek Batu Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060502, 10605, 'Polsek Junrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060503, 10605, 'Polsek Bumiaji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060504, 10605, 'Polsek Pujon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060505, 10605, 'Polsek Ngantang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060506, 10605, 'Polsek Kasembon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060601, 10606, 'Polsek Klojen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060602, 10606, 'Polsek Blimbing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060603, 10606, 'Polsek Kedung Kandang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060604, 10606, 'Polsek Lowokwaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060605, 10606, 'Polsek Sukun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060701, 10607, 'Polsek Lawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060702, 10607, 'Polsek Singosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060703, 10607, 'Polsek Karangploso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060704, 10607, 'Polsek Dau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060705, 10607, 'Polsek Tumpang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060706, 10607, 'Polsek Poncokusumo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060707, 10607, 'Polsek Pakis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060708, 10607, 'Polsek Jabung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060709, 10607, 'Polsek Bululawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060710, 10607, 'Polsek Gondang Legi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060711, 10607, 'Polsek Wajak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060712, 10607, 'Polsek Tajinan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060713, 10607, 'Polsek Kepanjen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060714, 10607, 'Polsek Wagir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060715, 10607, 'Polsek Pakisaji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060716, 10607, 'Polsek Ngajum', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060717, 10607, 'Polsek Sumber Pucung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060718, 10607, 'Polsek Pagak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060719, 10607, 'Polsek Kalipare', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060720, 10607, 'Polsek Donomulyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060721, 10607, 'Polsek Bantur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060722, 10607, 'Polsek Turen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060723, 10607, 'Polsek Dampit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060724, 10607, 'Polsek Ampel Gading', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060725, 10607, 'Polsek Sumber Manjing Wetan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060726, 10607, 'Polsek Gedangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060727, 10607, 'Polsek Tirtoyudo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060728, 10607, 'Polsek Wonosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060729, 10607, 'Polsek Kromengan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060730, 10607, 'Polsek Pagelaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060801, 10608, 'Polsek Gadingrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060802, 10608, 'Polsek Purworejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060803, 10608, 'Polsek Bugulkidul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060804, 10608, 'Polsek Pohjentrek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060805, 10608, 'Polsek Rejoso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060806, 10608, 'Polsek Grati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060807, 10608, 'Polsek Nguling', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060808, 10608, 'Polsek Lekok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060809, 10608, 'Polsek Keboncandi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060810, 10608, 'Polsek Kraton', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060901, 10609, 'Polsek Kejayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060902, 10609, 'Polsek Lumbang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060903, 10609, 'Polsek Winongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060904, 10609, 'Polsek Pasrepan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060905, 10609, 'Polsek Puspo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060906, 10609, 'Polsek Purwosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060907, 10609, 'Polsek Sukorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060908, 10609, 'Polsek Purwodadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060909, 10609, 'Polsek Tutur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060910, 10609, 'Polsek Bangil', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060911, 10609, 'Polsek Rembang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060912, 10609, 'Polsek Wonorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060913, 10609, 'Polsek Beji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060914, 10609, 'Polsek Pandaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060915, 10609, 'Polsek Gempol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060916, 10609, 'Polsek Prigen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1060917, 10609, 'Polsek Tosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061001, 10610, 'Polsek Kademangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061002, 10610, 'Polsek Wonoasih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061003, 10610, 'Polsek Mayangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061004, 10610, 'Polsek Tongas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061005, 10610, 'Polsek Wonomerto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061006, 10610, 'Polsek Sumberasih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061101, 10611, 'Polsek Leces', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061102, 10611, 'Polsek Bantaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061103, 10611, 'Polsek Sukapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061104, 10611, 'Polsek Lumbang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061105, 10611, 'Polsek Sumber', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061106, 10611, 'Polsek Kuripan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061107, 10611, 'Polsek Kraksaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061108, 10611, 'Polsek Pajarakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061109, 10611, 'Polsek Krejengan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061110, 10611, 'Polsek Besuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061111, 10611, 'Polsek Paiton', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061112, 10611, 'Polsek Kota Anyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061113, 10611, 'Polsek Pakuniran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061114, 10611, 'Polsek Gending', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061115, 10611, 'Polsek Banyu Anyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061116, 10611, 'Polsek Maron', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061117, 10611, 'Polsek Gading', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061118, 10611, 'Polsek Tiris', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061119, 10611, 'Polsek Krucil', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061120, 10611, 'Polsek Tegal Siwalan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061121, 10611, 'Polsek Dringu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061201, 10612, 'Polsek Senduro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061202, 10612, 'Polsek Sukodono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061203, 10612, 'Polsek Guci Alit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061204, 10612, 'Polsek Pasirian', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061205, 10612, 'Polsek Candipuro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061206, 10612, 'Polsek Tempeh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061207, 10612, 'Polsek Pronojiwo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061208, 10612, 'Polsek Yosowilangun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061209, 10612, 'Polsek Jatiroto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061210, 10612, 'Polsek Kunir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061211, 10612, 'Polsek Tekung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061212, 10612, 'Polsek Klakah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061213, 10612, 'Polsek Ranuyoso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061214, 10612, 'Polsek Randuagung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061215, 10612, 'Polsek Tempursari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061216, 10612, 'Polsek Rowokangkung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061217, 10612, 'Polsek Kedungjajang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061218, 10612, 'Polsek Padang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061219, 10612, 'Polsek Pasrujambe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061220, 10612, 'Polsek Sumbersuko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061221, 10612, 'Polsek Lumajang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061301, 10613, 'Polsek Arjasa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061302, 10613, 'Polsek Pakusari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061303, 10613, 'Polsek Jelbuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061304, 10613, 'Polsek Kalisat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061305, 10613, 'Polsek Sukowono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061306, 10613, 'Polsek Ledokombo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061307, 10613, 'Polsek Sumberjambe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061308, 10613, 'Polsek Mayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061309, 10613, 'Polsek Sumbersari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061310, 10613, 'Polsek Tempurejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061311, 10613, 'Polsek Sempolan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061312, 10613, 'Polsek Rambipuji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061313, 10613, 'Polsek Panti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061314, 10613, 'Polsek Jenggawah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061315, 10613, 'Polsek Ajung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061316, 10613, 'Polsek Balung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061317, 10613, 'Polsek Ambulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061318, 10613, 'Polsek Wuluhan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061319, 10613, 'Polsek Tanggul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061320, 10613, 'Polsek Bangsalsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061321, 10613, 'Polsek Sumberbaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061322, 10613, 'Polsek Kencong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061323, 10613, 'Polsek Gumukmas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061324, 10613, 'Polsek Umbulsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061325, 10613, 'Polsek Puger', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061326, 10613, 'Polsek Kaliwates', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061327, 10613, 'Polsek Patrang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061328, 10613, 'Polsek Mumbulsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061329, 10613, 'Polsek Sukorambi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061330, 10613, 'Polsek Semboro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061331, 10613, 'Polsek Jombang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061401, 10614, 'Polsek Giri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061402, 10614, 'Polsek Glagah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061403, 10614, 'PolsekWongsorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061404, 10614, 'Polsek Rogojampi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061405, 10614, 'Polsek Singojuruh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061406, 10614, 'Polsek Kabat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061407, 10614, 'Polsek Cluring', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061408, 10614, 'Polsek Tegaldelimo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061409, 10614, 'Polsek Muncar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061410, 10614, 'Polsek Purwoharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061411, 10614, 'Polsek Pesanggaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061412, 10614, 'Polsek Srono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061413, 10614, 'Polsek Bangorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061414, 10614, 'Polsek Genteng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061415, 10614, 'Polsek Kalibaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061416, 10614, 'Polsek Gambiran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061417, 10614, 'Polsek Glenmore', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061418, 10614, 'Polsek Songgon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061419, 10614, 'Polsek Banyuwangi Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061420, 10614, 'Polsek Sempu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061421, 10614, 'Polsek Kalipuro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061422, 10614, 'Polsek Kawasan Pelabuhan Tanjungwan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061423, 10614, 'Polsek Licin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061424, 10614, 'Polsek Tegal Sari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061425, 10614, 'Polsek Siliragung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061501, 10615, 'Polsek Tenggarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061502, 10615, 'Polsek Tegalampel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061503, 10615, 'Polsek Curahdami', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061504, 10615, 'Polsek Wringin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061505, 10615, 'Polsek Tamanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061506, 10615, 'Polsek Maesan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061507, 10615, 'Polsek Grujugan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061508, 10615, 'Polsek Pujer', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061509, 10615, 'Polsek Wonosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061510, 10615, 'Polsek Tapen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061511, 10615, 'Polsek Sukosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061512, 10615, 'Polsek Prajekan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061513, 10615, 'Polsek Klabang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061514, 10615, 'Polsek Tlogosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061515, 10615, 'Polsek Cermee', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061516, 10615, 'Polsek Pakem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061517, 10615, 'Polsek Binakal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061518, 10615, 'Polsek Sempol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061519, 10615, 'Polsek Sumber Wringin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061520, 10615, 'Polsek Bodowoso Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061601, 10616, 'Polsek Panji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061602, 10616, 'Polsek Mangaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061603, 10616, 'Polsek Kapongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061604, 10616, 'Polsek Panarukan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061605, 10616, 'Polsek kendit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061606, 10616, 'Polsek Besuki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061607, 10616, 'Polsek Jatibanteng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061608, 10616, 'Polsek Suboh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061609, 10616, 'Polsek Mlandingan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061610, 10616, 'Polsek Asembagus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061611, 10616, 'Polsek Banyuputih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061612, 10616, 'Polsek Jangkar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061613, 10616, 'Polsek Arjasa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061614, 10616, 'Polsek Sumbermalang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061615, 10616, 'Polsek Banyuglugur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061616, 10616, 'Polsek Bungatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061617, 10616, 'Polsek Situbondo Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061701, 10617, 'Polsek Mojoroto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061702, 10617, 'Polsek Kediri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061703, 10617, 'Polsek Pesantren', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061704, 10617, 'Polsek Semen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061705, 10617, 'Polsek Banyakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061706, 10617, 'Polsek Mojo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061707, 10617, 'Polsek Grogol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061708, 10617, 'Polsek Tarokan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061801, 10618, 'Polsek Kandangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061802, 10618, 'Polsek Kepung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061803, 10618, 'Polsek Plosoklaten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061804, 10618, 'Polsek Gurah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061805, 10618, 'Polsek Puncu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061806, 10618, 'Polsek Gampengrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061807, 10618, 'Polsek Ngasem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061808, 10618, 'Polsek Papar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061809, 10618, 'Polsek Plemahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061810, 10618, 'Polsek Pagu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061811, 10618, 'Polsek Purwoasri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061812, 10618, 'Polsek Ngadiluwih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061813, 10618, 'Polsek Kunjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061814, 10618, 'Polsek Wates', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061815, 10618, 'Polsek Kras', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061816, 10618, 'Polsek Kandat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061817, 10618, 'Polsek Ngancar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061818, 10618, 'Polsek Pare', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061819, 10618, 'Polsek Ringinrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061901, 10619, 'Polsek Kepanjen Kidul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061902, 10619, 'Polsek Sukorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061903, 10619, 'Polsek Sanan Wetan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061904, 10619, 'Polsek Sanan Kulon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061905, 10619, 'Polsek Nglegok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061906, 10619, 'Polsek Srengat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061907, 10619, 'Polsek Ponggok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061908, 10619, 'Polsek Udanawu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1061909, 10619, 'Polsek Wonodadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062001, 10620, 'Polsek Garum', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062002, 10620, 'Polsek Kanigoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062003, 10620, 'Polsek Wlingi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062004, 10620, 'Polsek Kesamben', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062005, 10620, 'Polsek Selorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062006, 10620, 'Polsek Doko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062007, 10620, 'Polsek Talun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062008, 10620, 'Polsek Gandusari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062009, 10620, 'Polsek Lodoyo Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062010, 10620, 'Polsek Panggungrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062011, 10620, 'Polsek Binangun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062012, 10620, 'Polsek Wates', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062013, 10620, 'Polsek Lodoyo Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062014, 10620, 'Polsek Bakung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062015, 10620, 'Polsek Wonotirto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062016, 10620, 'Polsek Selopuro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062101, 10621, 'Polsek Kedungwaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062102, 10621, 'Polsek Boyolangu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062103, 10621, 'Polsek Ngantru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062104, 10621, 'Polsek Kalangbret', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062105, 10621, 'Polsek Gondang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062106, 10621, 'Polsek Karangrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062107, 10621, 'Polsek Pagerwojo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062108, 10621, 'Polsek Sendang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062109, 10621, 'Polsek Ngunut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062110, 10621, 'Polsek Rejotangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062111, 10621, 'Polsek Sumber Gempol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062112, 10621, 'Polsek Kalidawir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062113, 10621, 'Polsek Pucanglaban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062114, 10621, 'Polsek Campur Darat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062115, 10621, 'Polsek Pakel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062116, 10621, 'Polsek Besuki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062117, 10621, 'Polsek Bandung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062118, 10621, 'Polsek Tanggung Gunung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062119, 10621, 'Polsek Tulungagung Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062201, 10622, 'Polsek Durenan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062202, 10622, 'Polsek Pogalan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062203, 10622, 'Polsek Bendungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062204, 10622, 'Polsek Karangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062205, 10622, 'Polsek Pule', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062206, 10622, 'Polsek Tugu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062207, 10622, 'Polsek Kampak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062208, 10622, 'Polsek Gandusari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062209, 10622, 'Polsek Watulimo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062210, 10622, 'Polsek Panggul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062211, 10622, 'Polsek Mujungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062212, 10622, 'Polsek Dongko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062213, 10622, 'Polsek Suruh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062301, 10623, 'Polsek Loceret', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062302, 10623, 'Polsek Brebeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062303, 10623, 'Polsek Sawahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062304, 10623, 'Polsek Bagor', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062305, 10623, 'Polsek Ngetos', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062306, 10623, 'Polsek Wilangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062307, 10623, 'Polsek Sukomoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062308, 10623, 'Polsek Kertosono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062309, 10623, 'Polsek Patianrowo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062310, 10623, 'Polsek Baron', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062311, 10623, 'Polsek Ngronggot', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062312, 10623, 'Polsek Lengkong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062313, 10623, 'Polsek Gondang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062314, 10623, 'Polsek Ngluyu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062315, 10623, 'Polsek Jatikalen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062316, 10623, 'Polsek Warujayeng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062317, 10623, 'Polsek Prambon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062318, 10623, 'Polsek Rejoso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062319, 10623, 'Polsek Pace', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062320, 10623, 'Polsek Nganjuk Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062401, 10624, 'Polsek Deket', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062402, 10624, 'Polsek Turi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062403, 10624, 'Polsek Tikung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062404, 10624, 'Polsek Kembangbahu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062405, 10624, 'Polsek Ngimbang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062406, 10624, 'Polsek Bluluk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062407, 10624, 'Polsek Solokuro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062408, 10624, 'Polsek Pucuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062409, 10624, 'Polsek Sambeng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062410, 10624, 'Polsek Mantub', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062411, 10624, 'Polsek Babat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062412, 10624, 'Polsek Kedungpring', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062413, 10624, 'Polsek Modo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062414, 10624, 'Polsek Sugio', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062415, 10624, 'Polsek Sukodadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062416, 10624, 'Polsek Karanggeneng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062417, 10624, 'Polsek Sekaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062418, 10624, 'Polsek Paciran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062419, 10624, 'Polsek Brondong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062420, 10624, 'Polsek Laren', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062421, 10624, 'Polsek Kangbinangun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062422, 10624, 'Polsek Glagah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062423, 10624, 'Polsek Kalitengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062424, 10624, 'Polsek Sukorame', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062425, 10624, 'Polsek lamongan Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062426, 10624, 'Polsek Maduran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062427, 10624, 'Polsek Sarirejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062501, 10625, 'Polsek Kapas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062502, 10625, 'Polsek Balen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062503, 10625, 'Polsek Sugihwaras', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062504, 10625, 'Polsek Dander', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062505, 10625, 'Polsek Baureno', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062506, 10625, 'Polsek Kepohbaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062507, 10625, 'Polsek Kedungadem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062508, 10625, 'Polsek Sumberejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062509, 10625, 'Polsek Kanor', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062510, 10625, 'Polsek Kalitidu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062511, 10625, 'Polsek Malo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062512, 10625, 'Polsek Ngasem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062513, 10625, 'Polsek Bubulan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062514, 10625, 'Polsek Padangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062515, 10625, 'Polsek Kasiman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062516, 10625, 'Polsek Purwosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062517, 10625, 'Polsek Tambakrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062518, 10625, 'Polsek Ngraho', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062519, 10625, 'Polsek Ngambon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062520, 10625, 'Polsek Temayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062521, 10625, 'Polsek Margomulyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062522, 10625, 'Polsek Gondang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062523, 10625, 'Polsek Bojonegoro Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062524, 10625, 'Polsek Sekar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062525, 10625, 'Polsek Sukosewu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062526, 10625, 'Polsek  Trucuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062527, 10625, 'Polsek Kedewan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062528, 10625, 'Polsek Kawasan Gayam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062601, 10626, 'Polsek Palang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062602, 10626, 'Polsek Semanding', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062603, 10626, 'Polsek Merak Urak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062604, 10626, 'Polsek Rengel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062605, 10626, 'Polsek Plumpang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062606, 10626, 'Polsek Widang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062607, 10626, 'Polsek Soko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062608, 10626, 'Polsek Senori', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062609, 10626, 'Polsek Parengan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062610, 10626, 'Polsek Singgahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062611, 10626, 'Polsek Tambakboyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062612, 10626, 'Polsek Bancar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062613, 10626, 'Polsek Kerek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062614, 10626, 'Polsek Jenu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062615, 10626, 'Polsek Jatirogo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062616, 10626, 'Polsek Kenduruan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062617, 10626, 'Polsek Bangilan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062618, 10626, 'Polsek Montong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062619, 10626, 'Polsek Grabagan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062620, 10626, 'Polsek Tuban Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062701, 10627, 'Polsek Prajurit Kulon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062702, 10627, 'Polsek Magersari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062703, 10627, 'Polsek Mojoanyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062704, 10627, 'Polsek Puri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062705, 10627, 'Polsek Jetis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062706, 10627, 'Polsek Sooko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062707, 10627, 'Polsek Gedeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062708, 10627, 'Polsek Kemlagi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062709, 10627, 'Polsek Dawarblandong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062801, 10628, 'Polsek Trowulan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062802, 10628, 'Polsek Bangsal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062803, 10628, 'Polsek Mojosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062804, 10628, 'Polsek Ngoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062805, 10628, 'Polsek Dlanggu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062806, 10628, 'Polsek Kutorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062807, 10628, 'Polsek Pungging', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062808, 10628, 'Polsek Trawas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062809, 10628, 'Polsek Gondang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062810, 10628, 'Polsek Jatirejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062811, 10628, 'Polsek Pacet', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062901, 10629, 'Polsek Perak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062902, 10629, 'Polsek Tembelang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062903, 10629, 'Polsek Diwek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062904, 10629, 'Polsek Gudo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062905, 10629, 'Polsek Ploso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062906, 10629, 'Polsek Kabuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062907, 10629, 'Polsek Plandaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062908, 10629, 'Polsek Kudu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062909, 10629, 'Polsek Ngoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062910, 10629, 'Polsek Mojowarno', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062911, 10629, 'Polsek Bareng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062912, 10629, 'Polsek Wonosalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062913, 10629, 'Polsek Mojoagung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062914, 10629, 'Polsek Peterongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062915, 10629, 'Polsek Sumobito', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062916, 10629, 'Polsek Kesamben', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062917, 10629, 'Polsek Megaluh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062918, 10629, 'Polsek Bandar Kedungmulyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062919, 10629, 'Polsek Jogoroto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062920, 10629, 'Polsek Jombang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1062921, 10629, 'Polsek Ngusikan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063001, 10630, 'Polsek Manguharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063002, 10630, 'Polsek Taman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063003, 10630, 'Polsek Kartoharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063004, 10630, 'Polsek Jiwan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063005, 10630, 'Polsek Sawahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063101, 10631, 'Polsek Balerejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063102, 10631, 'Polsek Nglames', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063103, 10631, 'Polsek Wungu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063104, 10631, 'Polsek Gemarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063105, 10631, 'Polsek Kare', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063106, 10631, 'Polsek Mejayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063107, 10631, 'Polsek Pilangkenceng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063108, 10631, 'Polsek Saradan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063109, 10631, 'Polsek Geger', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063110, 10631, 'Polsek Dolopo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063111, 10631, 'Polsek Kebonsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063112, 10631, 'Polsek Dagangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063113, 10631, 'Polsek Wonoasri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063201, 10632, 'Polsek Panekan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063202, 10632, 'Polsek Parang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063203, 10632, 'Polsek Poncol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063204, 10632, 'Polsek Plaosan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063205, 10632, 'Polsek Kawedanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063206, 10632, 'Polsek Takeran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063207, 10632, 'Polsek Lembeyan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063208, 10632, 'Polsek Bendo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063209, 10632, 'Polsek Maospati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063210, 10632, 'Polsek Sukomoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063211, 10632, 'Polsek Karangrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063212, 10632, 'Polsek Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063213, 10632, 'Polsek Kartoharjo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063214, 10632, 'Polsek Karas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063215, 10632, 'Polsek Magetan Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063216, 10632, 'Polsek Ngariboyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063217, 10632, 'Polsek Nguntoronadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063218, 10632, 'Polsek Sidorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063301, 10633, 'Polsek Arjosari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063302, 10633, 'Polsek Kebon Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063303, 10633, 'Polsek Punung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063304, 10633, 'Polsek Donorojo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063305, 10633, 'Polsek Pringkuku', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063306, 10633, 'Polsek Tegalombo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063307, 10633, 'Polsek nawangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063308, 10633, 'Polsek Bandar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063309, 10633, 'Polsek Ngadirojo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063310, 10633, 'polsek Tulakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063311, 10633, 'Polsek Sudimoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063312, 10633, 'Polsek Pacitan Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063401, 10634, 'Polsek Siman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063402, 10634, 'Polsek Babadan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063403, 10634, 'Polsek Jenangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063404, 10634, 'Polsek Balong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063405, 10634, 'Polsek Slahung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063406, 10634, 'Polsek Bungkal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063407, 10634, 'Polsek Ngrayun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063408, 10634, 'Polsek Sumoroto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063409, 10634, 'Polsek Sukorejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063410, 10634, 'Polsek Badegan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063411, 10634, 'Polsek Sampung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063412, 10634, 'Polsek Sambit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063413, 10634, 'Polsek Sawoo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063414, 10634, 'Polsek Mlarak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063415, 10634, 'Polsek Jetis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063416, 10634, 'Polsek Pulung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063417, 10634, 'Polsek Ngebel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063418, 10634, 'Polsek Jambon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063419, 10634, 'Polsek Sooko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063420, 10634, 'Polsek Pudak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063421, 10634, 'Polsek Ponorogo Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063501, 10635, 'Polsek Paron', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063502, 10635, 'Polsek Geneng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063503, 10635, 'Polsek Pitu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063504, 10635, 'Polsek Widodaren', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063505, 10635, 'Polsek Mantingan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063506, 10635, 'Polsek Kedunggalar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063507, 10635, 'Polsek Ngrambe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063508, 10635, 'Polsek Sine', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063509, 10635, 'Polsek Jogorogo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063510, 10635, 'Polsek Kendal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063511, 10635, 'Polsek Padas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063512, 10635, 'Polsek Kwadungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063513, 10635, 'Polsek Bringin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063514, 10635, 'Polsek Karangjati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063515, 10635, 'Polsek Pangkur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063516, 10635, 'Polsek Ngawi Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063517, 10635, 'Polsek Karanganyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063601, 10636, 'Polsek Burneh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063602, 10636, 'Polsek Socah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063603, 10636, 'Polsek Arosbaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063604, 10636, 'Polsek Klampis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063605, 10636, 'Polsek Geger', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063606, 10636, 'Polsek Tanjungbumi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063607, 10636, 'Polsek Kokop', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063608, 10636, 'Polsek Sepulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063609, 10636, 'Polsek Kamal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063610, 10636, 'Polsek Sukolilo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063611, 10636, 'Polsek Kwanyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063612, 10636, 'Polsek Tragah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063613, 10636, 'Polsek tanah merah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063614, 10636, 'Polsek Blega', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063615, 10636, 'Polsek Galis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063616, 10636, 'Polsek konang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063617, 10636, 'Polsek Modung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063701, 10637, 'Polsek Omben', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063702, 10637, 'Polsek Camplong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063703, 10637, 'Polsek Kedungdung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063704, 10637, 'Polsek Tambelangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063705, 10637, 'Polsek Robatal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063706, 10637, 'Polsek Torjun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063707, 10637, 'Polsek Jrengik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063708, 10637, 'Polsek Sreseh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063709, 10637, 'Polsek Ketapang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063710, 10637, 'Polsek Banyuates', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063711, 10637, 'Polsek Sokobanah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063712, 10637, 'Polsek Sampang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063713, 10637, 'Polsek Karang Penang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063801, 10638, 'Polsek Palengaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063802, 10638, 'Polsek Proppo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063803, 10638, 'Polsek Tlanakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063804, 10638, 'Polsek Pakong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063805, 10638, 'Polsek Pegantenan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063806, 10638, 'Polsek Tamberu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063807, 10638, 'Polsek Waru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063808, 10638, 'Polsek Galis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063809, 10638, 'Polsek Larangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063810, 10638, 'Polsek Pademawu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063811, 10638, 'Polsek kadur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063812, 10638, 'polsek Pasean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063813, 10638, 'Polsek Pamekasan Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063901, 10639, 'Polsek Kalianget', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063902, 10639, 'Polsek Bluto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063903, 10639, 'Polsek Saronggi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063904, 10639, 'Polsek Manding', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063905, 10639, 'Polsek Lenteng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063906, 10639, 'Polsek Masalembo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063907, 10639, 'Polsek Ambunten', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063908, 10639, 'Polsek Rubaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063909, 10639, 'Polsek Dasuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063910, 10639, 'Polsek Pasongsongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063911, 10639, 'Polsek Batangbatang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063912, 10639, 'Polsek Dungkek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063913, 10639, 'Polsek Gapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063914, 10639, 'Polsek Batu Putih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063915, 10639, 'Polsek Prenduan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063916, 10639, 'Polsek Ganding', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063917, 10639, 'Polsek Gulukguluk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063918, 10639, 'Polsek Kangean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063919, 10639, 'Polsek Sapeken', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063920, 10639, 'Polsek Sapudi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063921, 10639, 'Polsek Nonggunong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063922, 10639, 'Polsek Raas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063923, 10639, 'Polsek Talango', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063924, 10639, 'Polsek Giligenteng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063925, 10639, 'Polsek Sumenep Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (1063926, 10639, 'Polsek Kangayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010101, 20101, 'Polsek Baiturrahman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010102, 20101, 'Polsek Banda Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010103, 20101, 'Polsek Lueng Bat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010104, 20101, 'Polsek Syiah Kuala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010105, 20101, 'Polsek Ulee Kareng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010201, 20102, 'Polsek Darul Imarah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010202, 20102, 'Polsek Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010203, 20102, 'Polsek Indrapuri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010204, 20102, 'Polsek Muntasik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010205, 20102, 'Polsek Ingin Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010206, 20102, 'Polsek Kota Jantho?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010207, 20102, 'Polsek Kuta Baro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010301, 20103, 'Polsek Batee', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010302, 20103, 'Polsek Delima', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010303, 20103, 'Polsek Kembang Tanjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010304, 20103, 'Polsek Muara Tiga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010305, 20103, 'Polsek Padang Tiji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010306, 20103, 'Polsek Tangse', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010307, 20103, 'Polsek Tiro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010308, 20103, 'Polsek Keumala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010309, 20103, 'Polsek Grong-grong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010310, 20103, 'Polsek Mane', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010401, 20104, 'Polsek Johan Pahlawan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010402, 20104, 'Polsek Meureubo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010403, 20104, 'Polsek Bubon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010404, 20104, 'Polsek Samatiga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010405, 20104, 'Polsek Woyla', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010406, 20104, 'Polsek Woyla Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010407, 20104, 'Polsek Woyla Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010408, 20104, 'polsek Arongan Lambalek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010409, 20104, 'Polsek Sungai Mas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010410, 20104, 'polsek Pante Cermen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010411, 20104, 'Polsek Kaway XVI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010412, 20104, 'Polsek Panton Reu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010501, 20105, 'Polsek Bakongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010502, 20105, 'Polsek Bakongan Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010503, 20105, 'Polsek Kluet Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010504, 20105, 'Polsek Labuhan Haji Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010505, 20105, 'Polsek Labuhan Haji Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010506, 20105, 'Polsek Labuhan Haji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010507, 20105, 'Polsek Meukek', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010508, 20105, 'Polsek Trumon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010509, 20105, 'Polsek Trumon Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010601, 20106, 'Polsek Kota Takengon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010602, 20106, 'Jagong Jeget', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010603, 20106, 'Polsek Linge', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010604, 20106, 'Polsek Pegasing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010605, 20106, 'Polsek Silih Nara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010701, 20107, 'Polsek Bambel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010702, 20107, 'Polsek Simpang Empat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010703, 20107, 'Polsek Lawe Sigalagala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010801, 20108, 'Polsek Suka Karya Sabang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010901, 20109, 'Polsek Samalanga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010902, 20109, 'Polsek Jeunieb', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010903, 20109, 'Polsek Peudada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010904, 20109, 'Polsek Jeumpa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010905, 20109, 'Polsek ?Kota Juang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010906, 20109, 'Polsek Jangka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010907, 20109, 'Polsek Makmur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2010908, 20109, 'Polsek Gandapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011001, 20110, 'Polsek Singkil Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011002, 20110, 'Polsek Suro Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011003, 20110, 'Polsek Gunung Meriah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011004, 20110, 'Polsek Simpang Kanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011101, 20111, 'Polsek Simeulue Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011102, 20111, 'Polsek Tepak Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011103, 20111, 'Polsek Tepak Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011104, 20111, 'Polsek Seumelu Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011105, 20111, 'Polsek Seumelu Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011106, 20111, 'Polsek Seumelu Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011107, 20111, 'Polsek Salang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011108, 20111, 'Polsek Teluk Dalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011201, 20112, 'Polsek Karang Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011202, 20112, 'Polsek Kuala Simpang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011203, 20112, 'Polsek Kejuruan Muda', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011204, 20112, 'Polsek Tamiang Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011205, 20112, 'Polsek Seruway', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011206, 20112, 'Polsek Benda Hara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011207, 20112, 'Polsek Manyak Payet', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011208, 20112, 'Polsek Pemekaran Kecamatan Rantau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011301, 20113, 'POLSEK KUTA PANJANG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011302, 20113, 'Polsek Kota Blangkejeren', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011303, 20113, 'POLSEK Terangun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011401, 20114, 'Polsek Banda Sakti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011402, 20114, 'Polsek Blang Mangat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011403, 20114, 'Polsek Muara Dua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011404, 20114, 'Polsek Muara Batu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011405, 20114, 'Polsek Dewantara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011406, 20114, 'Polsek Geureudong Pase', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011407, 20114, 'Polsek Kuta Makmur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011408, 20114, 'Polsek Meurah Mulia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011409, 20114, 'Polsek Muara Batu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011410, 20114, 'Polsek Nisam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011411, 20114, 'Polsek Nisam Antara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011412, 20114, 'Polsek Samudera', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011413, 20114, 'Polsek Sawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011414, 20114, 'Polsek Simpang Keuramat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011415, 20114, 'Polsek Syamtalira Bayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011501, 20115, 'Polsek Manyak Payed', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011502, 20115, 'Polsek Langsa Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011503, 20115, 'Polsek Langsa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011504, 20115, 'Polsek Langsa Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011505, 20115, 'Polsek Birem Bayeun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011506, 20115, 'Polsek RT. Selamat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011507, 20115, 'Polsek Sungai Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011601, 20116, 'Polsek Simpang Kiri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011602, 20116, 'Polsek Sultan Daulat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011603, 20116, 'POLSEK RUNDENG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011604, 20116, 'Polsek Trumon Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011701, 20117, 'POLSEK MEUREUDU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011702, 20117, 'POLSEK MEURAH DUA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011703, 20117, 'POLSEK BANDAR DUA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011704, 20117, 'POLSEK JANGKA BUYA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011705, 20117, 'POLSEK ULIM', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011706, 20117, 'POLSEK TRIENGGADENG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011707, 20117, 'POLSEK PANTERAJA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011708, 20117, 'POLSEK BANDAR BARU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011801, 20118, 'Polsek Bukit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011901, 20119, 'Polsek Beutong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011902, 20119, 'Polsek Darul Makmur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2011903, 20119, 'Polsek Seunagan Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020101, 20201, 'Polsek Tanjung Morawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020102, 20201, 'Polsek Pagar Merbau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020103, 20201, 'Polsek Beringin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020104, 20201, 'Polsek Gunung Meriah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020105, 20201, 'Polsek Namu Rambe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020106, 20201, 'Polsek Biru-Biru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020107, 20201, 'Polsek Telun Kenas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020108, 20201, 'Polsek Tiga Juhar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020109, 20201, 'Polsek Bangun Purba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020110, 20201, 'Polsek Batang Kuis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020111, 20201, 'Polsek Galang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020112, 20201, 'Polsek Lubuk Pakam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020201, 20202, 'Polres Langkat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020202, 20202, 'Pos Lantas Besitang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020203, 20202, 'Polsek Pangkalan Brandan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020204, 20202, 'Polsek Bahorok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020205, 20202, 'Polsek Padang Tualang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020206, 20202, 'Polsek Pangkalan Brandan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020207, 20202, 'Polsek Hinai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020208, 20202, 'Polsek Kuala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020209, 20202, 'Polsek Padang Tualang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020210, 20202, 'Polsek Pangkalan Susu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020211, 20202, 'Polsek Salapian', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020212, 20202, 'Polsek Secanggang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020213, 20202, 'Polsek Selesai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020214, 20202, 'Polsek Stabat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020215, 20202, 'Polsek Tanjung Pura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020301, 20203, 'Polres Mandailing Natal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020302, 20203, 'Polsek Batahan mandailing natal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020303, 20203, 'Polsek Batang Natal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020304, 20203, 'Polsek Bukit Malintang?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020305, 20203, 'Polsek Kotanopan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020306, 20203, 'Polsek Panyabungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020307, 20203, 'Polsek Simpang gambir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020308, 20203, 'Polsek Muara Batang Gadis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020309, 20203, 'Polsek Muara Sipongi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020310, 20203, 'Polsek Siabu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020311, 20203, 'Polsek Natal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020312, 20203, 'Polsek Sinunukan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020401, 20204, 'Polsekta Berastagi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020402, 20204, 'Polsek Simpang Empat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020403, 20204, 'Polsek Barusjahe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020404, 20204, 'Polsek Payung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020405, 20204, 'Polsek Kuta Buluh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020406, 20204, 'Polsek Tigapanah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020407, 20204, 'Polsek Munte', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020408, 20204, 'Polsek Tigabinanga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020409, 20204, 'Polsek Juhar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020410, 20204, 'Polsek Mardingding', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020501, 20205, 'Polres Simalungun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020502, 20205, 'Polsek Perdagangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020503, 20205, 'Polsek Bosar Maliges', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020504, 20205, 'Polsek Serbelawan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020505, 20205, 'Polsek Dolok Perdamaian', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020506, 20205, 'Polsek Dolok Panribuan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020507, 20205, 'Polsek Saribu Dolok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020508, 20205, 'Polsek Parapat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020509, 20205, 'Polsek Balata', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020510, 20205, 'Polsek Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020511, 20205, 'Polsek Sidamanik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020512, 20205, 'Polsek Raya Kahean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020513, 20205, 'Polsek Sidamanik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020514, 20205, 'Polsek Silau Kahean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2020515, 20205, 'Polsek Saribu Dolok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030101, 20301, 'Polsek Padang Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030102, 20301, 'Polsek Koto Tangah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030103, 20301, 'Polsek Padang Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030104, 20301, 'Polsek Padang Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030105, 20301, 'Polsek Padang Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030106, 20301, 'Polsek Kuranji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030107, 20301, 'Polsek Pauh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030108, 20301, 'Polsek Lubuk Begalung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030109, 20301, 'Polsek Lubuk Kilangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030110, 20301, 'Polsek Kawasan Teluk Bayur ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030111, 20301, 'Polsek Bungus Teluk Kabung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030112, 20301, 'Polsek Nanggalo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030201, 20302, 'Polsek Lengayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030202, 20302, 'Polsek Batang Kapas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030203, 20302, 'Polsek Sutera', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030204, 20302, 'Polsek Bayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030205, 20302, 'Polsek BAB Tapan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030206, 20302, 'Polsek Kuranji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030207, 20302, 'Polsek Bukittinggi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030208, 20302, 'Polsek Banuhampu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030209, 20302, 'Polsek IV Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030210, 20302, 'Polsek Biaro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030211, 20302, 'Polsek Baso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030212, 20302, 'Polsek Tilatang Kaamang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030213, 20302, 'Polsek Palupuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030301, 20303, 'Polsek Kinali', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030302, 20303, 'Polres Pasaman Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030303, 20303, 'Polsek Bonjol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030304, 20303, 'Polsek Rao MT', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030305, 20303, 'POLSEK LEMBAH MELINTANG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030306, 20303, 'Polsek Lembah Malintang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030307, 20303, 'Polsek Mapat Tunggal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030308, 20303, 'Polsek Mapat Tunggul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030309, 20303, 'Polsek Bonjol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030310, 20303, 'Polsek Rao', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030311, 20303, 'Polsek Duo Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030312, 20303, 'Polsek Panti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030313, 20303, 'Polsek Mapat Tunggal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030314, 20303, 'Polsek Tigo Nagari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030315, 20303, 'Polsek Si Kaping', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030401, 20304, 'Polsek Bukittinggi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030402, 20304, 'Polsek Lubuk Alung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030403, 20304, 'Polsek IV Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030404, 20304, 'Polsek Sungai Puar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030405, 20304, 'Polsek Koto XI Tarusan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030406, 20304, 'Polsek Bayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030407, 20304, 'Polsek IV Jurai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030408, 20304, 'Polsek Batang Kapas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030409, 20304, 'Polsek Sutera', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030410, 20304, 'Polsek Lengayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030411, 20304, 'Polsek Ranah Pesisir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030412, 20304, 'Polsek Linggo Sari Baganti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030413, 20304, 'Polsek Pancung Soal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030414, 20304, 'Polsek Basa Ampek Balai Tapan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030415, 20304, 'Polsek Lunang Silaut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030501, 20305, 'Polsek Batang Anai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030502, 20305, 'Polsek Lubuk Alung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030503, 20305, 'Polsek Nan Sabaris', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030504, 20305, 'Polsek V Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030505, 20305, 'Polsek Pariaman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030506, 20305, 'Polsek Sungai Limau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030507, 20305, 'Polsek S Geringing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030508, 20305, 'Polsek Kuranji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030509, 20305, 'Polsek Aur Malintang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030510, 20305, 'Polsek BIM Olo Bangau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030511, 20305, 'Polsek Payakumbuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030512, 20305, 'Polsekta Pyk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030513, 20305, 'Polsek Pyk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030514, 20305, 'Polsek Luhak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030515, 20305, 'Polsek Situjuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030516, 20305, 'Polsek Akabiluru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030601, 20306, 'Polsek Pariangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030602, 20306, 'Polsek Rambatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030603, 20306, 'Polsek Salimpaung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030604, 20306, 'Polsek X Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030605, 20306, 'Polsek Lima Kaum', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030606, 20306, 'Polsek Tanjung Emas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030607, 20306, 'Polsek Tanjung Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030608, 20306, 'Polsek Padang Ganting', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030609, 20306, 'Polsek Lima Kaum', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030610, 20306, 'Polsek Ramabatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030611, 20306, 'Polsek Sungayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030612, 20306, 'Polsek X Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030613, 20306, 'Polsek Sunggayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030614, 20306, 'Polsek Padang Panjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030615, 20306, 'POLSEK BATIPUH', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030616, 20306, 'POLSEK LINTAU BUO UTARA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030617, 20306, 'Polsek Kapur 9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030618, 20306, 'Polsek Pangkalan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030619, 20306, 'Polsek Harau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030620, 20306, 'Polsek Guguk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030621, 20306, 'Polsek Suliki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030701, 20307, 'Polsek Talawi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030702, 20307, 'Polsek Sungai Rumbai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030703, 20307, 'Polsek Sumpur Kudus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030704, 20307, 'Polsek Koto VII', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030705, 20307, 'Polsek IV Nagari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030706, 20307, 'Polsek Sijunjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030707, 20307, 'Polsek Lubuk Tarok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030708, 20307, 'Polsek Tanjung Gadang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030709, 20307, 'Polsek Kamang Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030801, 20308, 'Polsek Kota Solok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030802, 20308, 'Polsek Kubung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030803, 20308, 'Polsek Kodya Solok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030804, 20308, 'Polsek Gunung Talang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030805, 20308, 'Polsek lembah gumanti?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030806, 20308, 'Polsek Bukit Sundi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030807, 20308, 'Polsek Sangir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030808, 20308, 'Polsek Sungai Lasi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030809, 20308, 'Polsek X Koto Dibawah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030810, 20308, 'Polsek Singkarak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030811, 20308, 'Polsek Lembang Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030812, 20308, 'Polsek Junjung Sirih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030813, 20308, 'Polsek Pulau Punjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030814, 20308, 'Polsek Sitiung Koto Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030815, 20308, 'Polsek Koto Bgaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030816, 20308, 'Polsek Sungai Rumbai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030901, 20309, 'Polsek Ampek Nagari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030902, 20309, 'Polsek Palembayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030903, 20309, 'Polsek IV Angkat Candung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030904, 20309, 'Polsek Tanjung Mutiara?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030905, 20309, 'PolSek Banuhampu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030906, 20309, 'Polsek Lubuk Basung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030907, 20309, 'Polsek Palembayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030908, 20309, 'POLSEK IV KOTO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030909, 20309, 'Polsek Tilatang Kamang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030910, 20309, 'Polsek Palupuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030911, 20309, 'Polsek Matur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030912, 20309, 'Polsek Muara Kalaban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030913, 20309, 'Polsek Kota Sawahlunto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030914, 20309, 'Polsek Barangin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2030915, 20309, 'Polsek Talawi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031001, 20310, 'Polsek Sipora', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031002, 20310, 'Polsek Siberut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031003, 20310, 'Polsek Kota Solok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031004, 20310, 'Polsek IX Koto Sungai Lasi ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031005, 20310, 'Polsek Bukit Sundi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031006, 20310, 'Polsek Junjung Sirih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031007, 20310, 'Polsek X Koto Dibawah ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031008, 20310, 'Polsek X Koto Diatas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031009, 20310, 'Polsek Pantai Cermin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031010, 20310, 'Poksek Alahan Panjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031011, 20310, 'Polsek Danau Kembar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031012, 20310, 'Polsek Kubung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031013, 20310, 'Polsek Talang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031014, 20310, 'Polsek Hiliran Gumanti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031015, 20310, 'Polsek Lembah Gumanti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031016, 20310, 'Polsek  Payung Sekaki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031101, 20311, 'Polsek Sijunjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031102, 20311, 'Polsek Lubuk Tarok Polres Sijunjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031103, 20311, 'Polsek IV Nagari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031104, 20311, 'Polsek Koto VII', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031105, 20311, 'Polsek Muaro Bodi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031106, 20311, 'Polsek IV Nagari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031107, 20311, 'Polsek Sumpur Kudus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031108, 20311, 'Polsek Muara Kalaban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031109, 20311, 'Polsek Koto Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031201, 20312, 'Polsek Limapuluh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031202, 20312, 'Polsek Pangkalan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031203, 20312, 'Polsek Suliki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031204, 20312, 'Polsek Harau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031205, 20312, 'Polsek Akabiluru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031206, 20312, 'Polsek Luhak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031207, 20312, 'Polsek Kodya Payakumbuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031208, 20312, 'Polsek Kec. Payakumbuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031209, 20312, 'Polsek Situjuh Limo Nagari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031210, 20312, 'Polsek Kapur 9?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031211, 20312, 'Polsek KPGD', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031212, 20312, 'Polsek Sungai Pagu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031213, 20312, 'Polsek Sangir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031214, 20312, 'Polsek Sangir Jujuan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031215, 20312, 'Polsek Sungai Batang Hari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031301, 20313, 'POLSEK PULAU PUNJUNG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031302, 20313, 'Polsek Sungai Rumbai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031303, 20313, 'Polsek Pulau Punjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031304, 20313, 'Polsek Koto Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031305, 20313, 'Polsek Koto Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031306, 20313, 'Polsek Kuantan Mudik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031307, 20313, 'Polsek Sitiung I Koto Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031308, 20313, 'Polsek Tanjung Emas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031309, 20313, 'Polsek Limo Kaum', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031310, 20313, 'Polsek SunGai Tarap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031311, 20313, 'Polsek Salimpaung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031312, 20313, 'Polsek Tanjung Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031401, 20314, 'Polsek Sangir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031402, 20314, 'Polsek Sangir Jujuan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031403, 20314, 'Polsek Koto Parik Gadang Diateh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031404, 20314, 'Polsek Sungai Pagu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031405, 20314, 'Polsek Sangir Batang Hari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031406, 20314, 'Polsek Koto Parik Gadang Diateh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031407, 20314, 'Polsek Sub Sektor Lubuk Malako', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031408, 20314, 'Polsek Padang Panjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031409, 20314, 'Polsek X Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031410, 20314, 'Polsek Batipuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031411, 20314, 'Polsek Batipuh Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031501, 20315, 'Polsek Kinali', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031502, 20315, 'POLSEK LEMBAH MELINTANG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031503, 20315, 'Polsek Bonjol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031504, 20315, 'Polsek Rao MT', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031505, 20315, 'Polsek Lembah Malintang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031506, 20315, 'Polsek Talu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031507, 20315, 'Polsek BIM', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031508, 20315, 'Poksek Batang Anai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031509, 20315, 'Polsek Pauh Kambar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031510, 20315, 'Polsek Lubuk Alung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031511, 20315, 'Polsek 2x11 Enam Lingkung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031512, 20315, 'Polsek Sungai Sarik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031601, 20316, 'Polsek Kubung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031602, 20316, 'Polres Solok Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031603, 20316, 'Polsek Pariaman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031604, 20316, 'Poksek Sungai Limau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031605, 20316, 'Polsek Sungai Geringging', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031606, 20316, 'Polsek Kampung Dalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031607, 20316, 'Polsek Aur Melintang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031701, 20317, 'Polresta Padang Panjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031702, 20317, 'Polsek Kinali', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031703, 20317, 'Polsek Pasaman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031704, 20317, 'Polsek Talu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031705, 20317, 'Polsek Gunung Tuleh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031706, 20317, 'Polsek Ranah Batahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031707, 20317, 'Polsek Ujuang Gadiang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031708, 20317, 'Polsek Air Bangis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031801, 20318, 'Polresta Pariaman?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031802, 20318, 'Polres Padang Pariaman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031803, 20318, 'Polsek  Tanjung Mutiara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031804, 20318, 'Polsek Lubuk Basung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031805, 20318, 'Polsek Tanjung Rajya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031806, 20318, 'Polsek IV Nagari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031807, 20318, 'Polsek Palembayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031808, 20318, 'Polsek Matur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031901, 20319, 'Polsek Kota Payakumbuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031902, 20319, 'Polsek Harau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031903, 20319, 'Polsek Kec. Payakumbuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031904, 20319, 'Polsek Kodya Payakumbuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031905, 20319, 'Polsek IV Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031906, 20319, 'Polsek Sipora', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031907, 20319, 'Polsek Sikabaluan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031908, 20319, 'Polsek Siberut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2031909, 20319, 'Polsek Sikakap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040101, 20401, 'Polresta Jambi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040102, 20401, 'Polsek Jambi Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040103, 20401, 'Polsek Jambi Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040104, 20401, 'Polres Muaro Jambi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040105, 20401, 'Polres Batanghari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040106, 20401, 'Polres Kerinci', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040201, 20402, 'POLSEK BATANGHARI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040202, 20402, 'Polsek Batang Hari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040301, 20403, 'Polsek Jaluko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040302, 20403, 'Polres Muaro Jambi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040303, 20403, 'POLSEK Sekernan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040304, 20403, 'Polsek Mestong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040305, 20403, 'Polsek Jambi Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040401, 20404, 'Polsek Nipah Panjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040402, 20404, 'Polsek Mendahara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040403, 20404, 'Polsek Muarasabak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040404, 20404, 'Polres Tanjung Jabung Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040501, 20405, 'Polsek Jambi Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040601, 20406, 'Polsek Jaluko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040602, 20406, 'POLSEK Sekernan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040603, 20406, 'Polsek Mestong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040701, 20407, 'Polsek Kota Muara Bungo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040702, 20407, 'Polsek Pelepat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040703, 20407, 'Polsek Rantau Pandan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040704, 20407, 'polsek babeko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040705, 20407, 'Polsek Tanah Tumbuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2040706, 20407, 'Polsek Tanah Sepenggal Lintas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050101, 20501, 'Polsek Kempas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050102, 20501, 'Polsek Tembilahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050103, 20501, 'Polsek Tanah Merah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050104, 20501, 'Polsek Mandah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050105, 20501, 'Polsek Kemuning', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050106, 20501, 'Polsek Enok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050107, 20501, 'Polsek Pelangeran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050108, 20501, 'Polsek Concong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050109, 20501, 'Polsek Kateman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050110, 20501, 'Polsek Teluk Belengkong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050111, 20501, 'Polsek Sungai Batang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050112, 20501, 'Polsek Tempuling', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050113, 20501, 'Polsek Reteh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050114, 20501, 'Polsek Kuala Indragiri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050115, 20501, 'Polsek Gaung Anak Serka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050116, 20501, 'Polsek Keritang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050117, 20501, 'Polsek Gaung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050118, 20501, 'Polsek Tembilahan Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050119, 20501, 'Polsek Pulau Burung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050120, 20501, 'Polsek Kawasan Pelabuhan Tembilahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050121, 20501, 'Polsek Batang Tuaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050201, 20502, 'Polsek Pelalawan Kerinci', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050202, 20502, 'Polsek Bunut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050203, 20502, 'Polsek Langgam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050204, 20502, 'Polsek Pangkalan Lesung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050205, 20502, 'Polsek Ukui', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050206, 20502, 'Polsek Kuala Kampar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050207, 20502, 'Polsek Bandar Seikijang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050208, 20502, 'Polsek Kerumutan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050209, 20502, 'Polsek Teluk Meranti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050210, 20502, 'Polsek Pangkalan Kuras', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050301, 20503, 'Polsek Dumai Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050302, 20503, 'Polsek Dumai Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050303, 20503, 'Polsek Bukit Kapur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050304, 20503, 'Polsek Dumai Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050305, 20503, 'Polsek Sei Sembilan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050306, 20503, 'POLSEK MEDANG KAMPAI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050307, 20503, 'KAWASAN PELABUHAN POLRES DUMAI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050401, 20504, 'Polsek Siak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050402, 20504, 'Polsek ?Bunga Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050403, 20504, 'Polsek Kandis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050404, 20504, 'Polsek Kerinci Kanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050405, 20504, 'Polsek Tualang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050406, 20504, 'Polsek Minas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050407, 20504, 'Polsek Sungai Apit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050408, 20504, 'Polsek Lubuk Dalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050409, 20504, 'Polsek Sei Mandau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050410, 20504, 'Polsek Sabak Auh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050411, 20504, 'Polsek Koto Gasib', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050501, 20505, 'Polres Rambah Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050502, 20505, 'Polsek Kabun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050503, 20505, 'Polsek Kepenuhan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050504, 20505, 'Polsek Kunto Darussalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050505, 20505, 'Polsek Rambah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050506, 20505, 'Kapolsek Rambah Samo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050507, 20505, 'Polsek Rokan IV Koto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050508, 20505, 'Polsek Tambusai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050509, 20505, 'Polsek Tandun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050510, 20505, 'Polsek Ujung Batu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050511, 20505, 'Polsek Kepenuhan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050512, 20505, 'Polsek Bonai Darussalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050601, 20506, 'Polsek Bengalis?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050602, 20506, 'Polsek Bantan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050603, 20506, 'Polsek Bukit Batu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050604, 20506, 'Polsek Mandau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050605, 20506, 'Polsek Rupat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050606, 20506, 'Polsek Pinggir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050607, 20506, 'Polsek Siak Kecil', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050608, 20506, 'Polsek Rupat Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050701, 20507, 'Polsek ?Bunga Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050702, 20507, 'Polsek Kandis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050703, 20507, 'Polsek Kerinci Kanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050704, 20507, 'Polsek Siak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050705, 20507, 'Polsek Tualang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050706, 20507, 'Polsek Minas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050707, 20507, 'Polsek Sungai Apit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050708, 20507, 'Polsek Lubuk Dalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050709, 20507, 'Polsek Sungai Mandau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050801, 20508, 'Polsek Bangkinang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050802, 20508, 'Polsek Tapung Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050803, 20508, 'Polsek Tambang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050804, 20508, 'Polsek Perhentian Raja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050805, 20508, 'Polsek Tapung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050806, 20508, 'Polsek Lantas Polsek XIII', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050807, 20508, 'Polsek Kampar Kiri Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050808, 20508, 'Polsek Kampar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050809, 20508, 'Polsek Siak Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050810, 20508, 'Polsek Kampar Kiri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050811, 20508, 'Polsek Tapung Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050812, 20508, 'Polsek Bangkinang Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050901, 20509, 'Polsek Bangkinang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050902, 20509, 'Polsek Air Tiris', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050903, 20509, 'Polsek Lipat Kain', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050904, 20509, 'Polsek Perhentian Raja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050905, 20509, 'Polsek Tapung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050906, 20509, 'Pos Lantas Polsek XIII', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2050907, 20509, 'Polsek XII Koto Kampar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051001, 20510, 'Polsek Kubu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051002, 20510, 'Polsek Tanah Putih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051003, 20510, 'Polsek Bangko Pusako', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051004, 20510, 'Polsek Bagan Sinembah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051005, 20510, 'Polsek Panipahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051006, 20510, 'Polsek Bangko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051007, 20510, 'Polsek Pujud', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051008, 20510, 'Polsek Rantau Kopar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051009, 20510, 'Polsek Batu Hampar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051010, 20510, 'Polsek Sipang Kanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051011, 20510, 'Polsek Sinaboi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051012, 20510, 'Polsek TP TJ. Melawan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051013, 20510, 'Polsek Rimba Melintang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051101, 20511, 'Polsek Lirik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051102, 20511, 'Polsek Pasir Penyu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051103, 20511, 'Polsek Batang Cenaku', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051104, 20511, 'Polsek Peranap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051105, 20511, 'Polsek Seberida', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051106, 20511, 'Polsek Rengat Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051107, 20511, 'Polsek Kalayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051108, 20511, 'Polsek Kuala Cenaku', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051109, 20511, 'Polsek Lubuk Batu Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051110, 20511, 'Polsek Batang Gansal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051201, 20512, 'Polsek Benai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051202, 20512, 'Polsek Cerenti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051203, 20512, 'Polsek Kuantan Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051204, 20512, 'Polsek Kuantan Mudik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051205, 20512, 'Polsek Kuantan Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051206, 20512, 'Polsek Pangean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051207, 20512, 'Polsek Logas Tanah Darat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051208, 20512, 'Polsek Singingi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051209, 20512, 'Polsek Hulu Kuantan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051301, 20513, 'Polsek ?Bunga Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051302, 20513, 'Polsek Kandis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051303, 20513, 'Polsek Cerenti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051304, 20513, 'Polsek Kerinci Kanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051305, 20513, 'Polsek Kuantan Hilir Baserah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051306, 20513, 'Polsek Siak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051307, 20513, 'Polsek Kuantan Mudik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051308, 20513, 'Polsek Tualang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051309, 20513, 'Polsek Kuantan Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051310, 20513, 'Polsek Minas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051311, 20513, 'Polsek Pangean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051312, 20513, 'Polsek Sungai Apit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051313, 20513, 'Polsek Muara Lembu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051314, 20513, 'Polsek Lubuk Dalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051315, 20513, 'Polsek Benai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051316, 20513, 'Polsek Sungai Mandau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051317, 20513, 'Polsek Benai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051601, 20516, 'POLSEK PEKANBARU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051602, 20516, 'POLSEK SENAPELAN', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051603, 20516, 'POLSEK SUKAJADI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051604, 20516, 'POLSEK LIMAPULUH', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051605, 20516, 'POLSEK RUMBAI PESISIR', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051606, 20516, 'POLSEK TAMPAN', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051607, 20516, 'POLSEK BUKIT RAYA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051608, 20516, 'POLSEK KAWASAN PELABUHAN PEKANBARU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051609, 20516, 'POLSEK RUMBAI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051610, 20516, 'POLSEK TENAYAN RAYA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051611, 20516, 'POLSEK PAYUNG SEKAKI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051701, 20517, 'Polsek Tebing Tinggi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051702, 20517, 'Polsek Merbau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051703, 20517, 'Polsek Rangsang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051704, 20517, 'Polsek Rangsang Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2051705, 20517, 'Polsek Tebing Tinggi Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060101, 20601, 'Polsek TPI Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060102, 20601, 'Polsek TPI Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060103, 20601, 'Polsek TPI Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060104, 20601, 'Polsek Bukit Bestari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060105, 20601, 'Polsek KKP', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060106, 20601, 'Polsek KKB', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060201, 20602, 'Polsek Balai Karimun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060202, 20602, 'Polsek Meral', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060203, 20602, 'Polsek Tebing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060204, 20602, 'Polsek KKP', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060205, 20602, 'Polsek Kundur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060206, 20602, 'Polsek Kuba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060207, 20602, 'Polsek Buru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060208, 20602, 'Polsek Moro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060301, 20603, 'Polsek Binut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060302, 20603, 'Polsek Gunung Kijang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060303, 20603, 'Polsek Jemaja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060401, 20604, 'Polsek Dabo Singkep', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060402, 20604, 'Polsek Senayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2060403, 20604, 'Polsek Singkep Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070101, 20701, 'Polsek Bukit Intan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070102, 20701, 'Polsek Gerunggang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070103, 20701, 'Polsek KP3 Pangkal Balam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070104, 20701, 'Polsek Pangkalan Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070105, 20701, 'Polsek Taman Sari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070201, 20702, 'Polsek Membalong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070202, 20702, 'Polsek Sijuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070203, 20702, 'Polsek Badau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070204, 20702, 'Polsek Selat Nasik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070301, 20703, 'Polsek Sungailiat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070302, 20703, 'Polsek Merawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070303, 20703, 'Polsek Belinyu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070304, 20703, 'Polsek Mendo Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070305, 20703, 'Polsek Bakam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070306, 20703, 'Polsek Puding Besar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070307, 20703, 'Polsek Pemali', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070308, 20703, 'Polsek Riau Silip', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070401, 20704, 'Polsek Toboali', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070402, 20704, 'Polsek Sadai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070403, 20704, 'Polsek Air Gegas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070404, 20704, 'Polsek Payung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070405, 20704, 'Polsek Pulau Besar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070406, 20704, 'Polsek Simbang Rimba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070407, 20704, 'Polsek Lepar Pongok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070501, 20705, 'Polsek Muntok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070502, 20705, 'Polsek SP Teritip', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070503, 20705, 'Polsek Jebus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070504, 20705, 'Polsek Kelapa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2070505, 20705, 'Polsek Tempilang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080101, 20801, 'Polsek Pangkalan Balai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080102, 20801, 'Polsek Mariana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080103, 20801, 'Polsek Pelabuhan Tanjung Api Api', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080104, 20801, 'Polsek Sungai Lilin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080105, 20801, 'Polsek Babat Toman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080106, 20801, 'Polsek Sungsang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080107, 20801, 'Polsek Betung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080108, 20801, 'Polsek Makarti Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080109, 20801, 'Polsek ?Muara Telang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080110, 20801, 'Polsek Pulau Rimau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080111, 20801, 'Polsek Rambutan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080112, 20801, 'Polsek Rantau Bayur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080113, 20801, 'Polsek Talang Kelapa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080114, 20801, 'Polsek Tanjung Lago', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080201, 20802, 'Polsek Cempaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080202, 20802, 'Polsek Martapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080203, 20802, 'Polsek Belitang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080301, 20803, 'Polsek Banding Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080302, 20803, 'Polsek Kisam Tinggi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080303, 20803, 'Polsek Muara Dua Kisam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080304, 20803, 'Polsek Pulau Beringin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080305, 20803, 'Polsek Simpang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080401, 20804, 'Polsek Rambang Dangku', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080402, 20804, 'Polsek Semendo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080403, 20804, 'Polsek Rambang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080404, 20804, 'Polsek Tanjung Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080405, 20804, 'Polsek Gelumbang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080406, 20804, 'Polsek Tanjung Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080407, 20804, 'Polsek Lawang Kidul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080408, 20804, 'Polsek Sungai Rotan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080409, 20804, 'Polsek Lembak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080501, 20805, 'Polsek Sanga Desa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080502, 20805, 'Polsek Sungai Lilin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080503, 20805, 'Polsek Babat Toman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080504, 20805, 'Polsek Sungai Keruh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080505, 20805, 'Polsek Bayunglincir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080601, 20806, 'Polsek Tugumulyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080602, 20806, 'Polsek Terawas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080603, 20806, 'Polsek Purwodadi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080604, 20806, 'Polsek Megang Sakti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080605, 20806, 'Polsek Muara Beliti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080606, 20806, 'Polsek Muara Kelingi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080607, 20806, 'Polsek Muara Lakitan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080608, 20806, 'Polsek BTS Ulu Cecar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080609, 20806, 'Polsek Jayaloka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080610, 20806, 'Polsek Karang Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080611, 20806, 'Polsek Muara Rupit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080612, 20806, 'Polsek Rawas Ulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080613, 20806, 'Polsek Karang Dapo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080614, 20806, 'Polsek Nibung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080615, 20806, 'Polsek Rawas Ilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080701, 20807, 'Polsek Mulak Ulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080702, 20807, 'Polsek Jarai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080703, 20807, 'Polsek Kikim Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080704, 20807, 'Polsek Kikim Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080705, 20807, 'Polsek Kikim Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080706, 20807, 'Polsek Lahat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080707, 20807, 'Polsek Mulak Ulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080708, 20807, 'Polsek Pulau Pinang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080709, 20807, 'Polsek Ulu Musi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080710, 20807, 'Polsek Dempo Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080801, 20808, 'POLSEK IT 1 KAMBOJA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080802, 20808, 'POLSEK IB II MAKRAYU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080803, 20808, 'POLSEK SUKARAMI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080804, 20808, 'POLSEK IB 1 PD SELASA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080805, 20808, 'POLSEK SAKO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080806, 20808, 'POLSEK SU II PLAJU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080807, 20808, '?POLSEK 1 KERTAPATI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080808, 20808, 'POLSEK IT II LEMABANG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080809, 20808, 'POLSEK GANDUS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080810, 20808, '?POLSEK KALIDONI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080811, 20808, 'POLSEK PLAJU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080812, 20808, 'POLSEK KERTAPATI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080901, 20809, 'Polsek Cambai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080902, 20809, 'Polsek Prabumulih Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2080903, 20809, 'Polsek Prabumulih Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081001, 20810, 'Polsek Sungai Menang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081002, 20810, 'Polsek Mesuji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081003, 20810, 'Polsek Mesuji Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081004, 20810, 'Polsek Tulung Selapan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081005, 20810, 'Polsek Tanjung Lubuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081006, 20810, 'Polsek Pedamaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081007, 20810, 'Polsek Kota Kayu Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081008, 20810, 'Polsek Pampangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081009, 20810, 'Polsek Pangkalan Lampam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081010, 20810, 'Polsek Jejawi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081011, 20810, 'Polsek Air Sugihan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081101, 20811, 'Polsek Lintang Kanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081102, 20811, 'Polsek Pendopo Lintang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081103, 20811, 'Polsek Tebing Tinggi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081104, 20811, 'Polsek Ulu Musi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081105, 20811, 'Polsek Pasemah Air Keruh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081201, 20812, 'Polsek Dempo Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081202, 20812, 'Polsek Dempo Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081203, 20812, 'Polsek Dempo Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081301, 20813, 'Polsek Pengandonan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081302, 20813, 'Polsek Peninjauan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081303, 20813, 'Polsek Belitang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081304, 20813, 'Polsek Martapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081305, 20813, 'Polsek Muara Dua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081306, 20813, 'Polsek Lubuk Raja OKU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081307, 20813, 'Polsek Baturaja Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081308, 20813, 'Polsek Semidang Aji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081401, 20814, 'Polsek Pemulutan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081402, 20814, 'Polsek Tanjung Batu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081403, 20814, 'Polsek Tanjung Raja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081404, 20814, 'Polsek Muara Kuang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081405, 20814, 'Polsek Rantau Alai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081406, 20814, 'Polsek Indralaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081407, 20814, 'Polsek Fajar Bulan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081501, 20815, 'Polsek Pengandonan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081502, 20815, 'Polsek Peninjauan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081503, 20815, 'Polsek Belitang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081504, 20815, 'Polsek Martapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081505, 20815, 'Polsek Muara Dua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081506, 20815, 'Polsek Lubuk Raja OKU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081507, 20815, 'Polsek Baturaja Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081508, 20815, 'Polsek Semidang Aji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081601, 20816, 'Polsek Jejawi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081602, 20816, 'Polsek Mesuji Oki Sumsel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081603, 20816, 'Polsek Lempuing, OKi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081604, 20816, 'Polsek Pampangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081605, 20816, 'Polsek Tulung Selapan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081606, 20816, 'Polsek Air Sugihan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081607, 20816, 'Polsek Pedamaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081608, 20816, 'Polsek Tanjung Lubuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081609, 20816, 'Polsek Talang Ubi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081610, 20816, 'Polsek Cegal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081611, 20816, 'POLSEK Sirah Pulau Padang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081612, 20816, 'Polsek Pangkalan Lampam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081613, 20816, 'Polsek Cengal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2081614, 20816, 'Polsek Kota Kayuagung OKI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090101, 20901, 'Polsek Ratu Samban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090102, 20902, 'Polsek Selebar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090103, 20903, 'Polsek Kampung Melayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090104, 20904, 'Polsek Teluk Segara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090105, 20905, 'Polsek Pondok Kelapa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090106, 20906, 'Polsek Muara Bangkahulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090107, 20907, 'Polsek Gading Cempaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090108, 20908, 'Polsek Ratu Agung Bengkulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090109, 20909, 'Polsek TALO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090110, 20910, 'Polsek Kepahiang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090111, 20901, 'Polsek Karang Tinggi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090201, 20902, 'Polsek Manna', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090202, 20902, 'Polsek Sukaraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090203, 20902, 'Polsek Kamboja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090204, 20902, 'Polsek Pino Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090205, 20902, 'Polsek Selebar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090301, 20903, 'Polsek Ipuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090302, 20903, 'Polsek Pondok Kelapa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090303, 20903, 'Polsek Air Sebakul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090304, 20903, 'Polsek Talang Empat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090305, 20903, 'Polsek Lais', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090306, 20903, 'Polsek Arga Makmur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090307, 20903, 'Polsek Batik Nau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090308, 20903, 'Polsek Napal Putih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090309, 20903, 'Polsek Putri Hijau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090310, 20903, 'Polsek Air Napal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090311, 20903, 'Polsek Giri Mulya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090312, 20903, 'Polsek Pagar Jati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090313, 20903, 'Polsek Air Besi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090314, 20903, 'Polsek Padang Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2090315, 20903, 'Polsek Muko-Muko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100101, 21001, 'Polsek Pasir Sakti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100102, 21001, 'Polsek Sekampung Udik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100103, 21001, 'Polsek Way Jepara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100104, 21001, 'Polsek Sukadana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100105, 21001, 'Polsek Bandar Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100106, 21001, 'Polsek Jabung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100107, 21001, 'Polsek L Maringai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100108, 21001, 'Polsek Marga Sekampung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100109, 21001, 'Polsek Labuhan Ratu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100110, 21001, 'Polsek Pekalongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100111, 21001, 'Polsek Batang Hari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100112, 21001, 'Polsek Mataram Batu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100113, 21001, 'Polsek Metro Kibang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100114, 21001, 'Polsek Braja Selebah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100115, 21001, 'Polsek Margatiga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100116, 21001, 'Polsek Purbolinggo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100201, 21002, 'Polsek Jati Agung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100202, 21002, 'Polsek Natar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100203, 21002, 'Polsek Candipuro Lampung Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100204, 21002, 'Polsek Sidomulyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100205, 21002, 'Polsek Tanjungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100206, 21002, 'Polsekta Panjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100207, 21002, 'Polsek Kaliandra', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100208, 21002, 'Polsek Penengahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100209, 21002, 'Polsek Sragi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100210, 21002, 'Polsek Teluk Betung Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100211, 21002, 'Polsek Bakau Heni', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100212, 21002, 'Polsek Gd. Tataan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100213, 21002, 'Polsek Krui', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100214, 21002, 'Polsek Sekampung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (2100215, 21002, 'Polsek Gadingrejo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010101, 30101, 'Polsek Sintang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010102, 30101, 'Polsek Binjai Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010103, 30101, 'Polsek Sungai Tebelian', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010104, 30101, 'Polsek Blimbing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010105, 30101, 'Polsek Nanga Pinoh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010106, 30101, 'Polsek Dedai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010201, 30102, 'polsek di ketapang tidak ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010301, 30103, 'polsek di landak tidak ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010401, 30104, 'Polsek Sambas?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010402, 30104, 'Polsek Pemangkat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010403, 30104, 'Polsek Jawai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010404, 30104, 'Polsek Selakau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010405, 30104, 'Polsek Paloh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010406, 30104, 'Polsek Teluk Keramat?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010501, 30105, 'Polsek Pontianak Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010502, 30105, 'Polsek Sungai Ambawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010503, 30105, 'Polsek Pontianak Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010504, 30105, 'Polsek Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010505, 30105, 'Polsek Pontianak Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010506, 30105, 'Polsek Pontianak Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010507, 30105, 'Polsek Pontianak Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010508, 30105, 'Polsek Pontianak Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010509, 30105, 'Polsek Siantan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010510, 30105, 'Polsek Sei Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010511, 30105, 'Polsek Terentang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010512, 30105, 'Polsek Kawasan Dwikora', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010513, 30105, 'Polsek Kota Selat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010514, 30105, 'Polsek Sei Pinyuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010515, 30105, 'Polsek Batu ampar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010601, 30106, 'POLSEK KAPUAS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010602, 30106, 'Polsek Sanggau Ledo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010603, 30106, 'Polsek Entikong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010604, 30106, 'Polsek Batang Tarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010605, 30106, 'Polsek Jangkang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010606, 30106, 'Polsek Noyan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010607, 30106, 'Polsek Sekayam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010608, 30106, 'Polsek Tayan Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010609, 30106, 'POLSEK SEKAYAM', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010610, 30106, 'Polsek Beduai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010611, 30106, 'Polsek Sekadau Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010612, 30106, 'Polsek Mukok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010613, 30106, 'Polsek Sanggau Ledo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010614, 30106, 'Polsek Tayan Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010615, 30106, 'Polsek Kembayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010616, 30106, 'Polsek Jangkang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010617, 30106, 'Polsek Meliau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010618, 30106, 'Polsek Parindu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010619, 30106, 'Polsek Bonti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010701, 30107, 'polsek di Mempawah tidak ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010801, 30108, 'Bukan Polsek Bengkayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010802, 30108, 'Polsek Ledo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010803, 30108, 'Polsek Seluas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010804, 30108, 'Polsek Sungai Betung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010805, 30108, 'Polsek Singkawang Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010806, 30108, 'Polsek Jagoi Babang Polres Bengkaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010807, 30108, 'Polsek Capkala Polres Bengkayang?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010808, 30108, 'Polsek Sanggau Ledo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010809, 30108, 'Polsek Teriak Polres Bengkayang - B', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010810, 30108, 'Polsek Lumar Polres Bengkayang - Wo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010811, 30108, 'Polsek Sungai Raya Polres Bengkayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010812, 30108, 'Polsek Samalantan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010813, 30108, 'Pospol Pulau Lemukutan Polsek Sunga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010814, 30108, 'Polsek Jagoi Babang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010901, 30109, 'Polsek Sekadau Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010902, 30109, 'Polsek Sekadau Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010903, 30109, 'Polsek Belitang Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010904, 30109, 'Polsek Belitang Hilir (Sungai Ayak)', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3010905, 30109, 'Mako Polsek Belitang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011001, 30110, 'Polsek Singkawang Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011002, 30110, 'Polsek Singkawang Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011003, 30110, 'Polsek Singkawang Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011004, 30110, 'Polsek Tujuh Belas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011005, 30110, 'Bukan Polsek Bengkayang?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011006, 30110, 'Polsek Sungai ayak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011007, 30110, 'Polsek Toba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011101, 30111, 'Polsek Mandai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011102, 30111, 'Polsek Sintang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011103, 30111, 'Polsek Badau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011104, 30111, 'Polsek Embaloh Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011105, 30111, 'Polsek Putussibau Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011106, 30111, 'Polsek Hulu Gurung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011107, 30111, 'Polsek Temunyuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011108, 30111, 'Polsek Batang Lupar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011109, 30111, 'POLSEK SILAT', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011110, 30111, 'Polsek Selimbau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011111, 30111, 'Polsek Embau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011112, 30111, 'Polsek Nanga Suhaid', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011113, 30111, 'Polsek Kutungau Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011114, 30111, 'Polsek Boyan Tanjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3011115, 30111, 'Polsek Boyan Tantung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020101, 30201, 'polresta Palangka Raya tidak ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020201, 30202, 'Polsek Pahandut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020202, 30202, 'Polsek Bukit Batu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020203, 30202, 'Polsek Kahayan Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020301, 30203, 'Polsek Ketapang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020302, 30203, 'Polsek Parenggean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020303, 30203, 'Polsek Baamang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020304, 30203, 'Polsek Sampit Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020305, 30203, 'Kantor Polsek Mentaya Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020306, 30203, 'Polsek Cempaga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020307, 30203, 'Polsek Prenggean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020308, 30203, 'Polsek Kota Besi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020309, 30203, 'Polsek Katingan Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020310, 30203, 'Polsek Kuayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020311, 30203, 'Polsek Pulau Hanaut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020312, 30203, 'Polsek Sungai Sampit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020401, 30204, 'Polsek Arut Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020402, 30204, 'Polsek Karang Mulya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020403, 30204, 'Polsek Kotawaringin Lama', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020404, 30204, 'Polsek Kumai?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020405, 30204, 'Polsek Lamando', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020406, 30204, 'Polsek Pangkalan Lada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020501, 30205, 'Polsek Kahayan Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020601, 30206, 'Polsek katingan hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020602, 30206, 'Polsek Katingan Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020603, 30206, 'Polsek Katingan Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020701, 30207, 'Polsek Kurun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020801, 30208, 'Polsek Lahe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020802, 30208, 'Polsek Muara Teweh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020803, 30208, 'Polsek Teleh Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020804, 30208, 'Polsek Montalat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020805, 30208, 'Polsek Gunung Purai?', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020806, 30208, 'Polsek Gunung Timang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020807, 30208, 'Polsek Teweh Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020808, 30208, 'POLSEK Bukit Sawit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020901, 30209, 'Polsek Dusun Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020902, 30209, 'Polsek Pematang Karau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020903, 30209, 'Polsek Dusun Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3020904, 30209, 'Polsek Benua Lima', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021001, 30210, 'Polsek Dusun Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021002, 30210, 'Polsek Bengkuang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021003, 30210, 'Polsek Pendang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021004, 30210, 'Polsek Mengkatib', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021005, 30210, 'Polsek Gunung Bintang Awai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021101, 30211, 'Polsek Sukamara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021102, 30211, 'Polsek Balai Riam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021103, 30211, 'POLSEK PANTAI LUNCI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021104, 30211, 'Polsek Delang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021201, 30212, 'Polsek Permata Intan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021202, 30212, 'Polsek Muara Laung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021301, 30213, 'Polsek Bulik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021401, 30214, 'Polsek Kapuas Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021402, 30214, 'Polsek Mandume', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021403, 30214, 'Polsek Palingkau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021404, 30214, 'Polsek Kapuas Murung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021405, 30214, 'Polsek Kota Selat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021406, 30214, 'Polsek Kapuas Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021407, 30214, 'Polsek Kapuas Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021408, 30214, 'Polsek Pulau Kupang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021409, 30214, 'Polsek Kapuas Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021410, 30214, 'Polsek Barimba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021411, 30214, 'Polsek Basarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021412, 30214, 'Polsek Pulau Kuala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021413, 30214, 'Polsek Timpah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021414, 30214, 'Polsek Kahayan Hulu Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021501, 30215, 'Polsek Seruyan Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3021502, 30215, 'Polsek Seruyan Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030101, 30301, 'Polsek Balikpapan Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030102, 30301, 'Polsekta Balikpapan Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030103, 30301, 'Polsek Balikpapan Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030104, 30301, 'Polsek Balikpapan Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030105, 30301, 'Polsek Kawasan Bandar Udara Sepingg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030106, 30301, 'Polsek Kawasan Pelabuhan Semayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030201, 30302, 'Polsek Bontang Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030202, 30302, 'Polsek Bontang Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030203, 30302, 'Polsubsek Kanaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030204, 30302, 'Polsubsek Loktuan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030301, 30303, 'Polsek Kenohan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030302, 30303, 'Polsek Tabang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030303, 30303, 'Polsek Kota Bangun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030304, 30303, 'Polsek Muara Badak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030305, 30303, 'Polsek Muara Muntai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030306, 30303, 'Polsek Kembang Janggut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030307, 30303, 'Polsek Teluk Dalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030308, 30303, 'Polsek Sebulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030309, 30303, 'Polsek Loa Janan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030310, 30303, 'Polsek Loa Kulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030311, 30303, 'Polsek Anggana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030312, 30303, 'Polsek Muara Wis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030313, 30303, 'Polsek Muara Kaman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030314, 30303, 'Polsek Sanga-Sanga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030315, 30303, 'Polsek Tahura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030316, 30303, 'Polsek Tenggarong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030317, 30303, 'Polsek Samboja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030318, 30303, 'Polsek Marang Kayu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030319, 30303, 'Polsek Kuala Samboja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030320, 30303, 'Polsek Handil Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030321, 30303, 'Polsek Muara Jawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030401, 30304, 'Polsek Longkali', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030402, 30304, 'Polsek Pasir Belengkong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030403, 30304, 'Polsek Tanah Grogot', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030404, 30304, 'Polsek Kerang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030405, 30304, 'Polsek Koaro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030406, 30304, 'Polsek Batu Kajang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030407, 30304, 'Polsek Muara Komam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030408, 30304, 'POLSEK LONGIKIS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030409, 30304, 'Polsubsek TG. Harapan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030410, 30304, 'Polsubsek Muara Samu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030501, 30305, 'Polsekta Samarinda Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030502, 30305, 'Polsekta Samarinda Ilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030503, 30305, 'Polsekta Samarinda', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030504, 30305, 'Polsekta Samarinda Seberang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030505, 30305, 'Polsekta Sungai Kujang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030506, 30305, 'Polsekta Palaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030507, 30305, 'Polsek Kawasan Pelabuhan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030601, 30306, 'Polsek Barong Tongkok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030602, 30306, 'Polsek Melak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030603, 30306, 'Polsek Bongan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030604, 30306, 'Polsek Jempang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030605, 30306, 'Polsek Damai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030606, 30306, 'Polsek Bentian Besar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030607, 30306, 'Polsek Penyinggahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030608, 30306, 'Polsek Muara lawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030609, 30306, 'Polsek Long Iram', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030610, 30306, 'Polsek Long Bangun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030611, 30306, 'Polsek Long Hubung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030612, 30306, 'Polsek Long Pahangai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030613, 30306, 'Polsek Long Apari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030701, 30307, 'Polsek Muara Ancalong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030702, 30307, 'Polsek Muara Wahau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030703, 30307, 'Polsek Muara Bengkal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030704, 30307, 'Polsek Sangatta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030705, 30307, 'Polsek Sangkulirang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030706, 30307, 'Polsek Bengalon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030707, 30307, 'Polsubsek Sangata Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030708, 30307, 'Polsubsek Teluk Dalam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030709, 30307, 'Polsubsek Rantau Pulung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030710, 30307, 'Polsubsek Kaliorang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030711, 30307, 'Polsubsek Sandaran', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030712, 30307, 'Polsubsek Telen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030713, 30307, 'Polsubsek Kongbeng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030714, 30307, 'Polsubsek Batu Ampar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030801, 30308, 'Polsek Penajam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030802, 30308, 'Polsek Waru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030803, 30308, 'Polsek Babulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030804, 30308, 'Polsek Sepaku', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030901, 30309, 'Polsek Tanjung Redep', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030902, 30309, 'Polsek Sambaliung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030903, 30309, 'Polsek Teluk Bayur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030904, 30309, 'Polsek Gunung Tabur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030905, 30309, 'Polsek Kelay', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030906, 30309, 'Polsek Segah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030907, 30309, 'Polsek Talisayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030908, 30309, 'Polsek Tubaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030909, 30309, 'Polsek Biduk-Biduk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030910, 30309, 'Polsek tanjung Batu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030911, 30309, 'Polsek Muara Tua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3030912, 30309, 'Polsubsek Batu Putih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031001, 30310, 'Polsek anjung Selor', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031002, 30310, 'Polsek Long Peso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031003, 30310, 'Polsek Sesayap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031004, 30310, 'Polsek Sekatak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031005, 30310, 'Polsek Bunyu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031006, 30310, 'Polsek TG. Palas Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031007, 30310, 'Polsek TG. Palas Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031008, 30310, 'Polsek TG. Palas Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031009, 30310, 'Polsek Tanah Lia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031010, 30310, 'Polsubsek TG. Selor', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031011, 30310, 'Polsubsek TG. Palas Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031012, 30310, 'Polsubsek Peso Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031101, 30311, 'Polsek Sungai Nyamuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031102, 30311, 'Polsek Nunukan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031103, 30311, 'Polsek Sembakung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031104, 30311, 'Polsek Lumbis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031105, 30311, 'Polsek Krayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031106, 30311, 'Polsek Sebuku', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031107, 30311, 'Polsek Krayan Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031108, 30311, 'Polsek Sebatik Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031109, 30311, 'Polsek Kawasan Pelabuhan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031110, 30311, 'Polsubsek SPI', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031201, 30312, 'Polsek Malinau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031202, 30312, 'Polsek Mentarang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031203, 30312, 'Polsek Kayan Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031204, 30312, 'Polsek Long Pujungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031205, 30312, 'Polsek Malinau Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031206, 30312, 'Polsek Malinau Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031207, 30312, 'Polsek Malinau Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031208, 30312, 'Polsubsek Sungai Boh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031209, 30312, 'Polsubsek Bahau Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031301, 30313, 'Polsek Tarakan Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031302, 30313, 'Polsek Tarakan Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031303, 30313, 'Polsek Tarakan Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3031304, 30313, 'Polsek Kawasan Pelabuhan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040101, 30401, 'Polsek Martapura Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040102, 30401, 'Polsek Karang Intan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040103, 30401, 'Polsek Astambul', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040104, 30401, 'Polsek Sungai Tabuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040105, 30401, 'Polsek Kertak Hanyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040106, 30401, 'Polsek Aluh-Aluh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040107, 30401, 'Polsek Simpang Empat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040108, 30401, 'Polsek Gambut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040109, 30401, 'Polsek Pengaron', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040110, 30401, 'Polsek Belimbing', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040111, 30401, 'Polsek Aranio', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040112, 30401, 'Polsek Matraman', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040113, 30401, 'Polsek Beruntung Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040114, 30401, 'Polsek Martapura Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040115, 30401, 'Polsek Martapura Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040116, 30401, 'Polsek Sambung Makmur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040201, 30402, 'Polsek Pulau Sebuku', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040202, 30402, 'Polsek Pulau Sembilan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040203, 30402, 'Polsek Pulau Laut Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040204, 30402, 'Polsek Pulau Laut Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040205, 30402, 'Polsek Pulau Laut Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040206, 30402, 'Polsek Pulau Laut Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040207, 30402, 'Polsek Pulau Laut Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040208, 30402, 'Polsek Pamukan Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040209, 30402, 'Polsek Pamukan Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040210, 30402, 'Polsek Sampanahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040211, 30402, 'Polsek kelumpang Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040212, 30402, 'Polsek kelumpang Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040213, 30402, 'Polsek kelumpang Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040214, 30402, 'Polsek kelumpang Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040215, 30402, 'Polsek kelumpang Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040216, 30402, 'Polsek kelumpang Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040217, 30402, 'Polsek Sungai Durian', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040218, 30402, 'Polsek Hampang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040301, 30403, 'Polsek Binuang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040302, 30403, 'Polsek Hatungan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040303, 30403, 'Polsek Tapin Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040304, 30403, 'Polsek Salam Babaris', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040305, 30403, 'Polsek Tapin Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040306, 30403, 'Polsek Bungur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040307, 30403, 'Polsek Lokpaikat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040308, 30403, 'Polsek Tapin Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040309, 30403, 'Polsek Bakarangan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040310, 30403, 'Polsek Candi Laras Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040311, 30403, 'Polsek Candi Laras Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040312, 30403, 'Polsek Miawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040401, 30404, 'Polsek Batulicin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040402, 30404, 'Polsek Kusan Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040403, 30404, 'Polsek Satui', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040404, 30404, 'Polsek Kusan Hulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040405, 30404, 'Polsek Sungai Loban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040406, 30404, 'Polsek Angsana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040407, 30404, 'Polsek Kuranji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040408, 30404, 'Polsek Karang Bintang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040409, 30404, 'Polsek Simpang Empat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040410, 30404, 'Polsek Mantewe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040501, 30405, 'Polsek Tanjung Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040502, 30405, 'Polsek Murung Pudak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040503, 30405, 'Polsek Tanta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040504, 30405, 'Polsek Muara Harus', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040505, 30405, 'Polsek Benua Lawag', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040506, 30405, 'Polsek Pugaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040507, 30405, 'Polsek Bintang Ara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040508, 30405, 'Polsek Haruai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040509, 30405, 'Polsek Upau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040510, 30405, 'Polsek Muara Uya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040511, 30405, 'Polsek Jaro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040512, 30405, 'Polsek Kelua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040601, 30406, 'Polsek Pelaihari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040602, 30406, 'Polsek Kintap', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040603, 30406, 'Polsek Jorong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040604, 30406, 'Polsek Takisung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040605, 30406, 'Polsek Panyipatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040606, 30406, 'Polsek Bati-Bati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040607, 30406, 'Polsek Kurau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040608, 30406, 'Polsek Batu Ampar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040609, 30406, 'Polsek Tambang Ulang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040701, 30407, 'Polsek Banjarbaru Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040702, 30407, 'Polsek Banjarbaru Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040703, 30407, 'Polsek Banjarbaru Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040801, 30408, 'Polsek Kandangan Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040802, 30408, 'Polsek Sungai Raya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040803, 30408, 'Polsek Daha Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040804, 30408, 'Polsek Kalumpang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040805, 30408, 'Polsek Daha Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040806, 30408, 'Polsek Angkinang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040807, 30408, 'Polsek Telaga Langsat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040808, 30408, 'Polsek Padang Batung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040809, 30408, 'Polsek Simpur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040810, 30408, 'Polsek Loksado', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040901, 30409, 'Polsek Paringin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040902, 30409, 'Polsek Lampihong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040903, 30409, 'Polsek Batu Mandi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040904, 30409, 'Polsek AWAyan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040905, 30409, 'Polsek Juai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3040906, 30409, 'Polsek Halong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041001, 30410, 'Polsek Batang Alai Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041002, 30410, 'Polsek Batang Alai Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041003, 30410, 'Polsek Labuan Amas Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041004, 30410, 'Polsek Labuan Amas Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041005, 30410, 'Polsek Pandawan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041006, 30410, 'Polsek Batu Benawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041007, 30410, 'Polsek Hantakan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041101, 30411, 'Polsekta Banjarmasin Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041102, 30411, 'Polsekta Banjarmasin Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041103, 30411, 'Polsekta Banjarmasin Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041104, 30411, 'Polsekta Banjarmasin Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041105, 30411, 'Polsekta Banjarmasin Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041106, 30411, 'Polsekta KP3 Banjarmasin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041201, 30412, 'Polsek Kuripan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041202, 30412, 'Polsek Cerbon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041203, 30412, 'Polsek Rantau Badauh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041204, 30412, 'Polsek Belawang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041205, 30412, 'Polsek Anjir Muara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041206, 30412, 'Polsek Anjir Pasar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041207, 30412, 'Polsek Berangas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041208, 30412, 'Polsek Mandastana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041209, 30412, 'Polsek Tamban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041210, 30412, 'Polsek Tabunganen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041211, 30412, 'Polsek Mekarsari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041212, 30412, 'Polsek Barambai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041213, 30412, 'Polsek Tabukan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041214, 30412, 'Polsek Wanaraya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041215, 30412, 'Polsek Marabahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041216, 30412, 'Polsek Bakumpai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041217, 30412, 'Polsek Jejangkit', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041301, 30413, 'Polsek Amuntai Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041302, 30413, 'Polsek Amuntai Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041303, 30413, 'Polsek Amuntai Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041304, 30413, 'Polsek Alabio', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041305, 30413, 'Polsek Babirik', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041306, 30413, 'Polsek Danau Panggang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (3041307, 30413, 'Polsek Banjang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010101, 40101, 'Polsek Langowan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010102, 40101, 'POLSEK KAKAS', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010103, 40101, 'Polsek Tondano', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010104, 40101, 'Polsek Kawangkowan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010105, 40101, 'Polsek Sonder', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010106, 40101, 'Polsek Ratahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010107, 40101, 'Polsek Toulimambot', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010108, 40101, 'Polsek Tompaso', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010109, 40101, 'Polsek Kombi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010110, 40101, 'Polsek Kauditan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010111, 40101, 'Polsek dimembe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010112, 40101, 'Polsek Tombatu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010113, 40101, 'Polsek Tumpaan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010114, 40101, 'Polsek Belang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010115, 40101, 'Polsek Amurang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010201, 40102, 'Polsek Kauditan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010202, 40102, 'Polsek dimembe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010203, 40102, 'Polsek Rural Kauditan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010204, 40102, 'Polsek Belang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010301, 40103, 'Polsek Tikala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010302, 40103, 'Polsek Singkil', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010303, 40103, 'polsek malalayang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010304, 40103, 'Polsek Bunaken', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010305, 40103, 'Polsek Urban Wanea', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010306, 40103, 'Polsek Uban Wenang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010307, 40103, 'Polsek Rural Tuminting', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010401, 40104, 'Polsek Lolayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010402, 40104, 'Polsek sangtombolang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010403, 40104, 'Polsek Lolak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010501, 40105, 'Polsek Tomohon Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4010502, 40105, 'Polsek Tomohon Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020101, 40201, 'Polsek Kota Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020102, 40201, 'polsek kota selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020103, 40201, 'Polsek Kota Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020104, 40201, 'Polsek Dungingi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020105, 40201, 'Polsek Kabila', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020106, 40201, 'Polsek Telaga Biru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020107, 40201, 'Polsek Kwandang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020108, 40201, 'Polsek Tapa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020201, 40202, 'Polsek Marisa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020202, 40202, 'Polsek Paguat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020203, 40202, 'Polsek Popayato', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4020204, 40202, 'Polsek Lemito', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030101, 40301, 'Polsek Palu Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030102, 40301, 'Polsek Dolo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030103, 40301, 'Polsekta Palu Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030104, 40301, 'Polsek Palu Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030105, 40301, 'Polsek Kulawi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030201, 40302, 'Polsek Bunta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030202, 40302, 'Polsek Kintom', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030203, 40302, 'Polsek Banggai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030204, 40302, 'Polsek Luwuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030205, 40302, 'Polsek Batui', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030206, 40302, 'Polsek Nuhon', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030207, 40302, 'Polsek Balantak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030208, 40302, 'Polsek Toili', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030301, 40303, 'Polsek Pamona Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030302, 40303, 'Polsek Poso Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030303, 40303, 'Polsek Tentena', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030304, 40303, 'Polsek Poso Pesisir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030305, 40303, 'Polsek Poso Pesisir Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030306, 40303, 'POLSEK POSO PESISIR SELATAN', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030401, 40304, 'Polsek Toli-Toli Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030402, 40304, 'Polsek Baolan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030403, 40304, 'Polsek Galang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030501, 40305, 'Polsek Paleleh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4030601, 40306, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040101, 40401, 'Polsek Mandonga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040102, 40401, 'Polsek Moramo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040103, 40401, 'Polsek Baruga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040104, 40401, 'Polsek Anduonohu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040105, 40401, 'Polsek Sampara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040201, 40402, 'Polsek Unaaha', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040202, 40402, 'Polsek Wawotobi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040203, 40402, 'Polsek Lambuya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040204, 40402, 'Polsek Abuki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040205, 40402, 'Polsek Sawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040206, 40402, 'Polsek Pondidaha', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040207, 40402, 'POLSEK BONDOALA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040208, 40402, 'Polsek Angata', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040209, 40402, 'Polsek Palangga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040210, 40402, 'Polsek Routa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040211, 40402, 'Polsek Andolo,konawe Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040301, 40403, 'Polsek Angata', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040302, 40403, 'Polsek Pondidaha', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040303, 40403, 'Polsek Andolo,konawe Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040304, 40403, 'Polsek Palangga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040305, 40403, 'Polsek Tinanggea', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040306, 40403, 'Polsek Kolono', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040307, 40403, 'POLSEK KOLONO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040308, 40403, 'Polsek Wolasi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040401, 40404, 'Polsek Kolaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040402, 40404, 'Polsek Pomalaa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040403, 40404, 'Polsek Mowewe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040404, 40404, 'Polsek Wundulako', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040501, 40405, 'Polsek Lasusua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040502, 40405, 'Polsek Pakue', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040503, 40405, 'Polsek Kodeoha', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040504, 40405, 'Polsek Tolala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040505, 40405, 'Polsek Ranteangin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040601, 40406, 'Polsek Kabaena Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040602, 40406, 'Polsek Rumbia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040603, 40406, 'Polsek Poleang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040604, 40406, 'Polsek Boepinang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040605, 40406, 'Polsek Lombakasih', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040701, 40407, 'Polsek Wolio', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040702, 40407, 'POLSEK KAWASAN PELABUHAN', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040801, 40408, 'Polsek Lasalimu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040901, 40409, 'Polsek Parigi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040902, 40409, 'Polsek Kusambi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040903, 40409, 'Polsek Tampo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040904, 40409, 'Polsek Lawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040905, 40409, 'Polsek Tiworo Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040906, 40409, 'Polsek Kabawo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4040907, 40409, 'Polsek Tikep Muna Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4041001, 40410, 'Polsek Wangsel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4041002, 40410, 'Polsek Binongko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4041003, 40410, 'Polsek Tomia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4041004, 40410, 'Polsek Wangi-Wangi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4041005, 40410, 'Polsek Kaledupa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4041006, 40410, 'Polsek Kaledupa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050101, 40501, 'POLSEK MALLAWA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050201, 40502, 'Polsek Bungoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050202, 40502, 'Polsek Pangkep', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050203, 40502, 'Polsek Ma Rang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050301, 40503, 'Polsek Kawasan Pelabuhan Paotere', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050401, 40504, 'Polsek Duampanua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050402, 40504, 'Polsek Mattiro bulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050403, 40504, 'Polsek Paleteang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050404, 40504, 'Polsek Watang Sawitto', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050405, 40504, 'Polsek Tiroang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050406, 40504, 'Polsek Lembang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050501, 40505, 'Polsek Dua Pitue', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050502, 40505, 'Polsek Watanpulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050503, 40505, 'Polsek Baranti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050504, 40505, 'Polsek Pancarijang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050601, 40506, 'Polsek marioriawa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050602, 40506, 'Polsek Ganra', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050603, 40506, 'Polsek Donri - Donri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050604, 40506, 'Polsek Lalabata', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050605, 40506, 'Polsek Liliriaja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050606, 40506, 'Polsek Lilirilau', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050607, 40506, 'Polsek Takalala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050701, 40507, 'Polsek Pallangga ', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050702, 40507, 'Polsek Bontonompo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050703, 40507, 'Polsek Somba Opu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050704, 40507, 'Polsek Tompobulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050705, 40507, 'Polsek parangloe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050706, 40507, 'Polsek Bajeng Limbung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050707, 40507, 'Polsek Barongpong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050708, 40507, 'Polsek Bungaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050709, 40507, 'Polsek parangloe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050710, 40507, 'Polsek Bonto Marannu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050711, 40507, 'Polsek Tombolo Pao', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050712, 40507, 'Polsek Tinggimoncong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050713, 40507, 'Polsek Biring Bulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050714, 40507, 'Polsekta Somba Opu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050715, 40507, 'Polsek Rappocini', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050716, 40507, 'Polsek Parangloy', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050717, 40507, 'Polsek Mapsu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050801, 40508, 'Polsek Bone-Bone', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050802, 40508, 'Polsek Sukamaju', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050803, 40508, 'Polsek Masamba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050804, 40508, 'Polsek Mappedeceng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050805, 40508, 'Polsek Baebunta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050806, 40508, 'Polsek Malangke', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050807, 40508, 'Polsek Mangkutana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050808, 40508, 'Polsek Wotu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050809, 40508, 'Polsek Limbong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050810, 40508, 'Polsek T. Siatinge', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050811, 40508, 'Polsek Malangke Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050812, 40508, 'Polsek Malili', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050813, 40508, 'POLSEK BURAU', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050901, 40509, 'Polsek Wara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050902, 40509, 'Polsek Wara Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050903, 40509, 'Polsek Walendrang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050904, 40509, 'Polsek Bua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4050905, 40509, 'Polsek Suli', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051001, 40510, 'Polsek Ujung Bulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051002, 40510, 'Polsek Kajang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051003, 40510, 'Polsek Tanete', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051004, 40510, 'Polsek Ujung Loe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051005, 40510, 'Polsek Bontotiro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051006, 40510, 'Polsek Gangking', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051007, 40510, 'Polsek Herleng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051101, 40511, 'Polsek Polsel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051102, 40511, 'Polsek Mapsu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051103, 40511, 'Polsek Galsel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051104, 40511, 'Polsek Galesong Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051105, 40511, 'Polsek Patalassang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051106, 40511, 'Polsek Galuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051107, 40511, 'Polsek Bontonompo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051108, 40511, 'Polsek Pattallassang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051109, 40511, 'Polsek Galesong Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051110, 40511, 'Polsek Mangarabombang (Marbo)', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051111, 40511, 'POLSEK POLOMBANGKENG UTARA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051201, 40512, 'Polsek Enrekang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051202, 40512, 'Polsek Alla', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051203, 40512, 'POLSEK Maiwa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051301, 40513, 'Polsek Awang Bone', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051302, 40513, 'Polsek T Riantang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051303, 40513, 'Polsek Ponre', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051304, 40513, 'Polsek Ulaweng Bone', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051305, 40513, 'Polsek Lappariaja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051306, 40513, 'POLSEK LIBURENG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051307, 40513, 'Polsek Dua Boccoe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051308, 40513, 'Polsek Kajuara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051309, 40513, 'Polsek Mare', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051310, 40513, 'Polsek Ulaweng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051311, 40513, 'Polsek Barebbo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051312, 40513, 'Polsek Lamuru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051313, 40513, 'Polsek BontoCani', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051401, 40514, 'Polsek Pajukukang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051402, 40514, 'polsek kota bantaeng', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051403, 40514, 'Polsek Bissapu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051404, 40514, 'Polsek Polut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051501, 40515, 'Polsek Sinjai Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051502, 40515, 'Polsek Sinjai Borong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051503, 40515, 'Polsek Sinjai Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051504, 40515, 'Polsek Sinjai Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051505, 40515, 'Polsek Sinjai Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051506, 40515, 'Polsek Manipi Sektor Sinjai Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051507, 40515, 'Polsek Pulau Sembilan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051508, 40515, 'Polsek Kajuara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051509, 40515, 'Polsek Tanete', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051601, 40516, 'Polsek Makasar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051602, 40516, 'Polsek Panakkukang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051603, 40516, 'Polsek Biringkanaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051604, 40516, 'POLSEK MAMAJANG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051605, 40516, 'Polsek Bontoala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051606, 40516, 'Polsek Wajo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051607, 40516, 'Polsekta Tamalanrea', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051608, 40516, 'Polsekta Manggala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051609, 40516, 'Polsek Ujungpandang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051610, 40516, 'Polsek Rappocini', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051701, 40517, 'Polsek Soreang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051702, 40517, 'Polsek Ujung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051703, 40517, 'Polsek Bacukiki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (4051704, 40517, 'Polsek Soreang Polres Parepare', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010101, 50101, 'Polsek Mengwi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010102, 50101, 'Polsek Kuta Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010103, 50101, 'Polsek Kuta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010104, 50101, 'Polres Badung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010105, 50101, 'Polsek Mengwi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010201, 50102, 'Polsek Gianyar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010202, 50102, 'Polsek Sukawati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010203, 50102, 'Polsek Ubud', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010204, 50102, 'Polsek Tegalalang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010205, 50102, 'Polsek Tampaksiring', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010206, 50102, 'Polsek Blahbatuh', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010301, 50103, 'Polsek Negara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010302, 50103, 'Polsek Kawasan Laut Gilimanuk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010303, 50103, 'Polsek Mendoyo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010401, 50104, 'Polsek Baturiti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010402, 50104, 'Polsek Selemadeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010403, 50104, 'Polsek Tabanan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010404, 50104, 'Kantor POLSEK Megati', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010405, 50104, 'Polsek Kerambitan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010406, 50104, 'Polsek Marga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010407, 50104, 'Polsek Penebel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010408, 50104, 'Polsek Kediri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010409, 50104, 'Polsek Pekutatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010410, 50104, 'Polsek Alas Kedaton', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010411, 50104, 'Polsek Perean', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010412, 50104, 'Polsek Candi Kuning', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010413, 50104, 'Polsek Pupuan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010414, 50104, 'POLSEK SELEMADEG BARAT', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010501, 50105, 'Polsek Sawan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010502, 50105, 'Polsek Singaraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010503, 50105, 'Polsek Kota Singaraja', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010504, 50105, 'Polsek Seririt', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010505, 50105, 'Polsek Banjar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010506, 50105, 'Polsek Sukasada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010507, 50105, 'Polsek Kubutambahan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010508, 50105, 'Polsek Tejakula', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010509, 50105, 'Polsek Tejakula', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010510, 50105, 'Polsek Grokgak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010511, 50105, 'Polsek Busungbiu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010601, 50106, 'Polsek Abang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010602, 50106, 'Polsek Kota Karangasem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010603, 50106, 'Polsek Rendang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010604, 50106, 'Polsek Kubu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010605, 50106, 'Polsek Manggis', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010606, 50106, 'Polsek Kubu Karangasem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010607, 50106, 'polsek selat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010608, 50106, 'Polsek Bebandem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010609, 50106, 'Polsek Sidemen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010701, 50107, 'Polsek Banjarangkan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010702, 50107, 'Polsek Klungkung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010703, 50107, 'Polsek Dawan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010704, 50107, 'Polsek Nusa Penida', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010801, 50108, 'Polsek Denpasar Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010802, 50108, 'Polsek Denpasar Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010803, 50108, 'Polsek Denpasar Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010804, 50108, 'Polsek Blahbatu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010805, 50108, 'Polsek Abian Semal', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010806, 50108, 'Polsek Klungkung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010807, 50108, 'Polsek Kawasan Laut Benoa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010808, 50108, 'Polsek Pupuan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010809, 50108, 'Polsek Petang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010810, 50108, 'Polsek Selemadeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010811, 50108, 'Polsek Kuta', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010812, 50108, 'Polsek Banjarangkan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010813, 50108, 'Polsek Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5010814, 50108, 'POLSEK MARANG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020101, 50201, 'Polsek Woha', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020201, 50202, 'Polsek Mataram', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020202, 50202, 'Polsek Lingsar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020203, 50202, 'Polsek Ampenan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020204, 50202, 'Polsek Cakranegara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020301, 50203, 'Polsek Pringgarata', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020302, 50203, 'Polsek Praya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020303, 50203, 'Polsek Janapria', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020304, 50203, 'Polsek Pujut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020305, 50203, 'Polsek Kuta lombok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020306, 50203, 'POLSEK BATUKLIANG LOMBOK TENGAH', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020307, 50203, 'Polsek Mantang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020308, 50203, 'Polsek Bon Jeruk', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020309, 50203, 'Polsek Kuta Lombok Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020310, 50203, 'Polsek Praya Barat Daya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020311, 50203, 'Polsek Praya Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020312, 50203, 'Polsek Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020313, 50203, 'Polsek Selong Blanak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020314, 50203, 'POLSEK KOPANG', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020315, 50203, 'Polsek Prabar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020316, 50203, 'polsek jonggat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020401, 50204, 'Polsek Kempo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020402, 50204, 'Polsek Pajo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020403, 50204, 'Polsek Kwangko', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020404, 50204, 'Polsek Hu U', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020501, 50205, 'Polsek Senggigi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020502, 50205, 'Polsek Kediri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020503, 50205, 'Polsek Sekotong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020504, 50205, 'Polsek Gerung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020505, 50205, 'Polsek Labu Api Police Station', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020506, 50205, 'Polsek Narmada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020507, 50205, 'Polsek Lembar Resort Lombok Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020508, 50205, 'Polsek baru Gunung Sari', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020509, 50205, 'Polsek KPPP Lembar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020510, 50205, 'Polsek Gangga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020511, 50205, 'Polsek Bayan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020512, 50205, 'Polsek Pringgarata', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020513, 50205, 'Polsek Pemenang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020514, 50205, 'Polsek Praya Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020515, 50205, 'Polsek Praya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020516, 50205, 'Polsek Praya Barat Daya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020517, 50205, 'Polsek Pujut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020518, 50205, 'Polsek Kuta lombok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020601, 50206, 'Polsek Jerowaru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020602, 50206, 'Polsek Terara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020603, 50206, 'Polsek Pringgasela', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020604, 50206, 'Polsek Sambelia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020605, 50206, 'Polsek Sakra', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020606, 50206, 'Polsek Sembalun', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020607, 50206, 'Polsek Montong Gading', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020608, 50206, 'Polsek Selong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020609, 50206, 'Polsek Aikmel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020610, 50206, 'Polsek Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020611, 50206, 'Polsek Pringgabaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020612, 50206, 'Polsek Sukamulya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020613, 50206, 'Polsek Sakra Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020614, 50206, 'Polsek Selong Blanak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020615, 50206, 'POLSEK LABUHAN LOMBOK', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020616, 50206, 'Polsek Labuhan Haji', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020617, 50206, 'Polsek Jarowaro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020618, 50206, 'POLSEK PELABUHAN KAYANGAN', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020701, 50207, 'Polsek Tanjung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020702, 50207, 'Polsek Pemenang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5020703, 50207, 'POLSEK KAYANGAN', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030101, 50301, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030201, 50302, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030301, 50303, 'Polsek Maulafa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030302, 50303, 'Polsek Kelapa Lima', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030303, 50303, 'Polsek Oebobo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030304, 50303, 'Polsek Kupang Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030305, 50303, 'Polsek Camplong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030306, 50303, 'Polsek Busalangga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030307, 50303, 'Polres Kupang Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030308, 50303, 'Polsek Noemuti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030309, 50303, 'Polsek Polen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030310, 50303, 'Pospol Tenau Polsek Alak', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030311, 50303, 'Polsek Ayotupas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030401, 50304, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030501, 50305, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030601, 50306, 'POLSEK ALOR TIMUR POLRES ALOR', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030602, 50306, 'Polsek Alor Barat Daya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030603, 50306, 'polsek alor timur laut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030604, 50306, 'POLSEK ALOR TIMUR POLRES ALOR', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030605, 50306, 'Polsek Alor Tengah Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030606, 50306, 'Polsek Pantar', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030701, 50307, 'Polsek Bola', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030702, 50307, 'Polsek Alok', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030703, 50307, 'Polsek Paga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030704, 50307, 'Polsek Nelle', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030801, 50308, 'Polsek Omesuri', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5030901, 50309, 'Polsek Ende', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031001, 50310, 'Polsek Maulafa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031002, 50310, 'Polsek Kupang Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031003, 50310, 'Polsek Kelapa Lima', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031004, 50310, 'Polsek Oebobo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031005, 50310, 'Polsek Camplong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031006, 50310, 'Polsek Noemuti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031007, 50310, 'Polsek Busalangga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031008, 50310, 'Polsek Ayotupas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031009, 50310, 'Polsek Kupang Tengah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031101, 50311, 'Polsek Walakaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031102, 50311, 'Polsek Loli', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031103, 50311, 'Polsek Kodi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031104, 50311, 'Polsek Wewewa Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031105, 50311, 'Polsek Kakikutana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031106, 50311, 'Polsek Wewewa Barat SBD', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031107, 50311, 'Polsek Laratama', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031108, 50311, 'Polsek Elopada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031201, 50312, 'Polsek Lobalain', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031202, 50312, 'POLSEK ROTE BARAT DAYA', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031203, 50312, 'Polsek Rote Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031204, 50312, 'POLSEK Rote Barat Laut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031205, 50312, 'Polsek Pantai Baru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031301, 50313, 'Polsek Pandawai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031302, 50313, 'Polsek Umalulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031303, 50313, 'Polsek Kahaungu Eti', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031304, 50313, 'Polsek Paberiwai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031305, 50313, 'Polsek Wulla Waijelu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031306, 50313, 'Polsek Kota Waingapu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031307, 50313, 'Polsek Lewa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031308, 50313, 'Polsek Haharu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031309, 50313, 'Polsek Ngadungala', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031310, 50313, 'polsek tabundung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031311, 50313, 'Polsek Tabungdung', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031312, 50313, 'Polsek Pahungalodu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031313, 50313, 'Polsek Rindi Umalulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031314, 50313, 'Polsek Walakaka', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031315, 50313, 'Polsek Loli', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031401, 50314, 'Polsek Nangaroro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031402, 50314, 'Polsek Golewa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031403, 50314, 'Polsek Aimere', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031404, 50314, 'Polsek Boawae', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031501, 50315, 'Polsek Komodo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031601, 50316, 'Polsek Wulanggitang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031602, 50316, 'Polsek Adonara Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031603, 50316, 'Polsek Solor Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031604, 50316, 'Polsek Solor Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031605, 50316, 'Polsek Adonara Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031606, 50316, 'Polsek Adonara Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (5031607, 50316, 'Polsek Adonara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010101, 60101, 'Polsek Kei Kecil', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010201, 60102, 'Polsek Waipia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010202, 60102, 'Polsek Amahai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010203, 60102, 'Polsek Tehoru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010204, 60102, 'Polsek Leihitu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010205, 60102, 'Polsek Saparua', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010206, 60102, 'Polsek Wahai', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010207, 60102, 'Polsek Bula', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010208, 60102, 'Polsek Kairatu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010209, 60102, 'Polsek Werinama', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010210, 60102, 'Polsek Piru', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010211, 60102, 'Polsek Banda Naira', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010212, 60102, 'Polsek Pulauw', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010213, 60102, 'Polsek Taniwel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6010301, 60103, 'Polsek Tanimbar Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020101, 60201, 'Polsek Ternate Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020102, 60201, 'Polsek Ternate', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020103, 60201, 'Polsek Kedi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020104, 60201, 'Polsek Weda', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020105, 60201, 'Polsek Tobelo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020106, 60201, 'Polsek Obi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020107, 60201, 'Polsek Kao', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020108, 60201, 'POLSEK TIDORE', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020109, 60201, 'Polsek Morotai Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020110, 60201, 'Polsek Maba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020111, 60201, 'Polsek Oba Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020112, 60201, 'Polsek Jailolo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020113, 60201, 'Polsek Morotai Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020114, 60201, 'Polsek Maliput', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020115, 60201, 'Polsek Galela', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020116, 60201, 'Polsek Kayoa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020117, 60201, 'Polsek Saketa', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020118, 60201, 'Polsek Patani', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020119, 60201, 'Polsek Bobong', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020120, 60201, 'Polsek Soasiu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020201, 60202, 'Polsek Tobelo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020202, 60202, 'POLRES HALUT', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020203, 60202, 'Polsek Kao', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020204, 60202, 'Polsek Maliput', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020205, 60202, 'Polsek Soasiu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020206, 60202, 'Polsek Galela', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020207, 60202, 'Polsek Jailolo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020301, 60203, 'POLSEK TIDORE', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020302, 60203, 'Polsek Oba Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020401, 60204, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020501, 60205, 'Polsek Maba', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020502, 60205, 'Polsek Subaem', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020601, 60206, 'Polsek Jailolo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020602, 60206, 'Polsek Ibu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020603, 60206, 'Polsek taltim', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020701, 60207, 'Polsek Weda', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020702, 60207, 'Polsek Fidi Jaya', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020703, 60207, 'Polsek Patani', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020704, 60207, 'Polsek Wairoro', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020801, 60208, 'Polsek Permata Intan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020802, 60208, 'Polsek Ketapang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020803, 60208, 'Polsek Pahandut', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020804, 60208, 'Polsek Kahayan Hilir', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020805, 60208, 'Polsek Arut Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (6020806, 60208, 'Polsek Gunung Timang', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010101, 70101, 'Polres Jayapura', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010102, 70101, 'Polsek Jayapura?Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010103, 70101, 'Polsek Jayapura Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010104, 70101, 'Polsek Sentani Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010201, 70102, 'Polsek Maki', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010202, 70102, 'Polsek Hom Hom', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010203, 70102, 'Polsek Asologiama', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010204, 70102, 'Polsek Pereme', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010205, 70102, 'Polsek Kelila', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010206, 70102, 'Polsek Karubaga', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010207, 70102, 'Polsek Bokondini', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010208, 70102, 'Polsek Tiom', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010209, 70102, 'Polsek Kurulu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010301, 70103, 'Polsek Amban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010401, 70104, 'Polsek Bumfir Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010402, 70104, 'Polres Biak Numfor', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010403, 70104, 'Polsek Biak Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010501, 70105, 'Polsek Yapen Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010502, 70105, 'Polsek Yapen Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010503, 70105, 'Polsek Angkaisera', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010504, 70105, 'Polsek Poom', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010505, 70105, 'Polres Yapen Waropen', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010601, 70106, 'Polsek Kota Merauke', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010701, 70107, 'Polsek Paniai Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010801, 70108, 'Polsek Sorong Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010802, 70108, 'Polsek Sorong Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010803, 70108, 'Polsek Sorong Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7010901, 70109, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7011001, 70110, 'Polsek Nabire', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7011002, 70110, 'POLSEK Nabire Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7011003, 70110, 'Polsek Kamu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020101, 70201, 'Polsek Amban', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020201, 70202, 'Polsek Kaimana', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020301, 70203, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020401, 70204, 'Polsek Sorong Kota', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020402, 70204, 'Polsek Sorong Timur', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020403, 70204, 'Polsek Sorong Barat', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020404, 70204, 'Polsek Missol', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020405, 70204, 'Polsek Kawasan Bandara Deo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020501, 70205, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020601, 70206, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020701, 70207, 'Tidak Ada', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020801, 70208, 'Polsek Waigeo Selatan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020802, 70208, 'Polsek Waigeo Utara', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `polsek` VALUES (7020803, 70208, 'Kabupaten Raja Ampat', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_nama_unique`(`nama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', '2020-07-16 14:10:58', '2020-07-16 14:10:58');
INSERT INTO `roles` VALUES (2, 'urtu/renmin', '2020-07-16 14:10:58', '2020-07-16 14:10:58');
INSERT INTO `roles` VALUES (3, 'kaurmin', '2020-07-16 14:10:58', '2020-07-16 14:10:58');
INSERT INTO `roles` VALUES (4, 'kalabforcab', '2020-07-16 14:10:58', '2020-07-16 14:10:58');

-- ----------------------------
-- Table structure for saksi
-- ----------------------------
DROP TABLE IF EXISTS `saksi`;
CREATE TABLE `saksi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `takah_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statustakah
-- ----------------------------
INSERT INTO `statustakah` VALUES (1, 'diterima urtu', 'Diterima Urtu.', NULL, NULL);
INSERT INTO `statustakah` VALUES (2, 'diserahkan ke kaurmin', 'Diterima Urtu.', NULL, NULL);
INSERT INTO `statustakah` VALUES (3, 'siap diserahkan ke urtu', 'Proses Pemeriksaan Laboratoris.', NULL, NULL);
INSERT INTO `statustakah` VALUES (4, 'diserahkan ke urtu', 'Barang bukti sudah selesai. Pemeriksaan telah selesai dan BAP laboratoris berikut barang bukti telah diserahkan ke Urtu. Siap diambil.', NULL, NULL);
INSERT INTO `statustakah` VALUES (5, 'siap diserahkan ke penyidik', 'Barang bukti sudah selesai. Pemeriksaan telah selesai dan BAP laboratoris berikut barang bukti telah diserahkan ke Urtu. Siap diambil.', NULL, NULL);
INSERT INTO `statustakah` VALUES (6, 'diserahkan ke penyidik', 'Barang bukti sudah selesai. Pemeriksaan telah selesai dan BAP laboratoris berikut barang bukti telah diserahkan ke Urtu. Siap diambil.', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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

-- ----------------------------
-- Table structure for takah
-- ----------------------------
DROP TABLE IF EXISTS `takah`;
CREATE TABLE `takah`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto_bb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dibuka_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penyidik_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `penyidikpenerima_id` tinyint(1) NULL DEFAULT NULL,
  `detailpermintaan_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `asaltakah_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `urtu_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `statustakah_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `jeniskasus_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `mindik_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `bidang_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `subbidang_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `editor_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `editable` tinyint(1) NULL DEFAULT NULL,
  `kasus_menonjol` tinyint(1) NOT NULL DEFAULT 0,
  `pemeriksaan_tkp` tinyint(1) NOT NULL DEFAULT 0,
  `synced` tinyint(1) NOT NULL DEFAULT 0,
  `tahap` tinyint(4) NULL DEFAULT NULL,
  `diserahkan_ke_kaurmin_at` timestamp(0) NULL DEFAULT NULL,
  `siap_diserahkan_ke_urtu_at` timestamp(0) NULL DEFAULT NULL,
  `diserahkan_ke_urtu_at` timestamp(0) NULL DEFAULT NULL,
  `siap_diserahkan_ke_penyidik_at` timestamp(0) NULL DEFAULT NULL,
  `diserahkan_ke_penyidik_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `urtupenyerah_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of takah
-- ----------------------------
INSERT INTO `takah` VALUES (1, '000001/FKF/2020/PUS', '_1594884059.jpg', NULL, 1, NULL, 1, 1, 4, 1, 4, 1, 3, 9, NULL, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, '2020-07-16 00:00:00', '2020-07-16 14:21:23', NULL, NULL);

-- ----------------------------
-- Table structure for tersangka
-- ----------------------------
DROP TABLE IF EXISTS `tersangka`;
CREATE TABLE `tersangka`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `takah_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tersangka
-- ----------------------------
INSERT INTO `tersangka` VALUES (1, 'Si Bengal 1', 1, '2020-07-16 14:21:23', '2020-07-16 14:21:23');
INSERT INTO `tersangka` VALUES (2, 'Si Bengal 2', 1, '2020-07-16 14:21:23', '2020-07-16 14:21:23');

-- ----------------------------
-- Table structure for unitkerja
-- ----------------------------
DROP TABLE IF EXISTS `unitkerja`;
CREATE TABLE `unitkerja`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unitkerja
-- ----------------------------
INSERT INTO `unitkerja` VALUES (1, 'PUSAT LABORATORIUM FORENSIK', 'PUS', 'Jl. Kav. Agraria No.94, RT.2/RW.16, Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13440', NULL, NULL, NULL);
INSERT INTO `unitkerja` VALUES (2, 'LABFOR POL CAB SURABAYA', 'SBY', 'Jenderal No. 116, Jl. Frontage Ahmad Yani Siwalankerto, Gayungan, Wonocolo, Kota SBY, Jawa Timur 60231', NULL, NULL, NULL);
INSERT INTO `unitkerja` VALUES (3, 'LABFOR POL CAB MEDAN', 'MDN', 'Jl. SM. Raja Km. 10,5 No. 60 Medan - Medan (Kota)', NULL, NULL, NULL);
INSERT INTO `unitkerja` VALUES (4, 'LABFOR POL CAB SEMARANG', 'SMG', 'Komplek akpol candi baru (Jl. Sultan agung) Semarang, Jawa Tengah, Indonesia', NULL, NULL, NULL);
INSERT INTO `unitkerja` VALUES (5, 'LABFOR POL CAB MAKASSAR', 'MKS', 'Pabaeng-Baeng, Tamalate, Kota Makassar, Sulawesi Selatan 90223', NULL, NULL, NULL);
INSERT INTO `unitkerja` VALUES (6, 'LABFOR POL CAB PALEMBANG', 'PLG', 'Jl. Kolonel H. Barlian KM.4,5, Pahlawan, Kemuning, Kota Palembang, Sumatera Selatan 30151', NULL, NULL, NULL);
INSERT INTO `unitkerja` VALUES (7, 'LABFOR POL CAB DENPASAR', 'DPS', 'Jalan Gunung Sanghyang No. 108 B, Padangsambian, Denpasar Barat, Padangsambian, Denpasar, Kota Denpasar, Bali 80117', NULL, NULL, NULL);
INSERT INTO `unitkerja` VALUES (8, 'LABFOR POL CAB RIAU', 'RI', 'Jl. Jenderal Sudirman No.235, Simpang Empat, Kec. Pekanbaru Kota, Kota Pekanbaru, Riau 28111', NULL, NULL, NULL);
INSERT INTO `unitkerja` VALUES (9, 'LABFOR POL CAB PAPUA', 'IRIAN', 'Jalan Sam Ratulangi No.8, Bayangkara, Jayapura Utara, Kota Jayapura, Papua 99112', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nrp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `subbidang_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `pangkat_id` bigint(20) UNSIGNED NOT NULL,
  `digitalsign` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'mnuhalazhar', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Muhammad Nuh Al Azhar', NULL, '74070762', 1, NULL, NULL, 9, 2, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'admintest', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Syah', NULL, '8373838', 1, NULL, NULL, 9, 21, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'kaurminfiskomfor1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Test Kaurmin Fiskomfor', NULL, '8748484', 3, 3, NULL, 6, 5, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 'testurtu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Test Urtu', NULL, '8398475', 2, NULL, NULL, 8, 26, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (5, 'royeka', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Roy Eka Yonata', NULL, '19770605203121000', 2, NULL, NULL, 7, 25, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (6, 'agusdwisetiyono', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Agus Dwi Setiyono', NULL, '198408102009120992', 1, NULL, NULL, 17, 26, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 'putriagustiani', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Putri Agustiani Endah Puspaningrum', NULL, '98080649', 2, NULL, NULL, 18, 13, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (8, 'teguhyuniarto', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Teguh Yuniarto', NULL, '197606182008120992', 2, 3, NULL, 19, 28, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (9, 'kaurminfiskomfor', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Aji Fibrianto Arrosyid', NULL, '86021596', 3, 3, NULL, 22, 5, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (10, 'afifah', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Afifah', NULL, '198112302008012000', 3, 2, NULL, 25, 25, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (11, 'achiriacaturini', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Achiria Caturini', NULL, '197710022006041984', 3, NULL, NULL, 3, 25, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (12, 'tirtisuhartini', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Tirti Suhartini', NULL, '196407131999032000', 3, 4, NULL, 23, 24, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (13, 'wasispriyo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Wasis Priyo Utomo', NULL, '19830223200801100', 3, 5, NULL, 24, 25, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 'dieramonica', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Diera Monica', NULL, '99050359', 3, 5, NULL, 20, 13, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 'heribertus', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Heribertus S', NULL, '82091343', 3, 1, NULL, 21, 5, '', 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 'adminfiskomfor', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ilham Syaekhul Amri', NULL, '99050292', 3, 3, NULL, 26, 13, '', 1, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
