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

 Date: 05/01/2022 14:42:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 703 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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

SET FOREIGN_KEY_CHECKS = 1;
