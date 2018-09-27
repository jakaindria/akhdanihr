/*
 Navicat Premium Data Transfer

 Source Server         : mariadb
 Source Server Type    : MariaDB
 Source Server Version : 100307
 Source Host           : localhost:3307
 Source Schema         : akhdanihr

 Target Server Type    : MariaDB
 Target Server Version : 100307
 File Encoding         : 65001

 Date: 27/09/2018 14:06:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `auth_assignment_user_id_idx`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `data` blob NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/cms/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/cms/default/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/cms/default/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/home/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/home/error', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/home/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/humancapital/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/humancapital/default/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/humancapital/default/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/default/*', 2, NULL, NULL, NULL, 1518803066, 1518803066);
INSERT INTO `auth_item` VALUES ('/master/default/index', 2, NULL, NULL, NULL, 1518803066, 1518803066);
INSERT INTO `auth_item` VALUES ('/master/grade/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/grade/create', 2, NULL, NULL, NULL, 1518803066, 1518803066);
INSERT INTO `auth_item` VALUES ('/master/grade/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/grade/index', 2, NULL, NULL, NULL, 1518803066, 1518803066);
INSERT INTO `auth_item` VALUES ('/master/grade/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/grade/view', 2, NULL, NULL, NULL, 1518803066, 1518803066);
INSERT INTO `auth_item` VALUES ('/master/hari-libur/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/hari-libur/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/hari-libur/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/hari-libur/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/hari-libur/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/hari-libur/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jabatan/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jabatan/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jabatan/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jabatan/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jabatan/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jabatan/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jenis-izin-cuti/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jenis-izin-cuti/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jenis-izin-cuti/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jenis-izin-cuti/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jenis-izin-cuti/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/jenis-izin-cuti/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kontak/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kontak/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kontak/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kontak/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kontak/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kontak/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kota/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kota/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kota/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kota/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kota/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/kota/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/provinsi/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/provinsi/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/provinsi/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/provinsi/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/provinsi/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/provinsi/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/unit-kerja/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/unit-kerja/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/unit-kerja/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/unit-kerja/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/unit-kerja/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/unit-kerja/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/universitas/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/universitas/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/universitas/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/universitas/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/universitas/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/master/universitas/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/default/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/default/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/izin-usaha/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/izin-usaha/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/izin-usaha/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/izin-usaha/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/izin-usaha/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/izin-usaha/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pajak/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pajak/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pajak/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pajak/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pajak/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pajak/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pemilik/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pemilik/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pemilik/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pemilik/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pemilik/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pemilik/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pengurus/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pengurus/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pengurus/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pengurus/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pengurus/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/pengurus/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/peralatan/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/peralatan/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/peralatan/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/peralatan/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/peralatan/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/org/peralatan/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/auth/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/auth/do-login', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/auth/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/auth/login', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/auth/logout', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/default/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/default/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/menu/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/menu/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/role/*', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/role/create', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/role/delete', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/role/index', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/role/update', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('/system/role/view', 2, NULL, NULL, NULL, 1518803067, 1518803067);
INSERT INTO `auth_item` VALUES ('admin', 1, 'Administrator', NULL, NULL, 1518766592, 1518766592);
INSERT INTO `auth_item` VALUES ('direksi', 1, 'Direksi', NULL, NULL, 1518780060, 1518780060);
INSERT INTO `auth_item` VALUES ('kadiv', 1, 'Kepala Divisi', NULL, NULL, 1518779932, 1518779932);
INSERT INTO `auth_item` VALUES ('manager', 1, 'Manajer', NULL, NULL, 1518779992, 1518779992);
INSERT INTO `auth_item` VALUES ('pegawai', 1, 'Pegawai', NULL, NULL, 1518766825, 1518766825);
INSERT INTO `auth_item` VALUES ('sdm', 1, 'Sumber Daya Manusia', NULL, NULL, 1518780040, 1518780040);

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for cms_berita
-- ----------------------------
DROP TABLE IF EXISTS `cms_berita`;
CREATE TABLE `cms_berita`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategoriid` int(10) UNSIGNED NULL DEFAULT NULL,
  `judul` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `intro` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `konten` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ispublished` int(11) NULL DEFAULT 0,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kategoriid`(`kategoriid`) USING BTREE,
  INDEX `ispublished`(`ispublished`) USING BTREE,
  CONSTRAINT `cms_berita_ibfk_1` FOREIGN KEY (`kategoriid`) REFERENCES `cms_kategori` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for cms_kategori
-- ----------------------------
DROP TABLE IF EXISTS `cms_kategori`;
CREATE TABLE `cms_kategori`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hcm_history_kepegawaian
-- ----------------------------
DROP TABLE IF EXISTS `hcm_history_kepegawaian`;
CREATE TABLE `hcm_history_kepegawaian`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawaiid` int(10) UNSIGNED NULL DEFAULT NULL,
  `gradeid` int(10) UNSIGNED NULL DEFAULT NULL,
  `jabatanid` int(10) UNSIGNED NULL DEFAULT NULL,
  `unitkerjaid` int(10) UNSIGNED NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pegawaiid`(`pegawaiid`) USING BTREE,
  INDEX `gradeid`(`gradeid`) USING BTREE,
  INDEX `jabatanid`(`jabatanid`) USING BTREE,
  INDEX `unitkerjaid`(`unitkerjaid`) USING BTREE,
  CONSTRAINT `hcm_history_kepegawaian_ibfk_1` FOREIGN KEY (`pegawaiid`) REFERENCES `hcm_pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hcm_history_kepegawaian_ibfk_2` FOREIGN KEY (`gradeid`) REFERENCES `mst_grade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hcm_history_kepegawaian_ibfk_3` FOREIGN KEY (`jabatanid`) REFERENCES `mst_jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hcm_history_kepegawaian_ibfk_4` FOREIGN KEY (`unitkerjaid`) REFERENCES `mst_unit_kerja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hcm_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `hcm_pegawai`;
CREATE TABLE `hcm_pegawai`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NULL DEFAULT NULL,
  `nip` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `tglmasukkerja` date NULL DEFAULT NULL,
  `tglpengangkatan` date NULL DEFAULT NULL,
  `tglmulaikontrak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tglakhirkontrak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempatlahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgllahir` date NULL DEFAULT NULL,
  `jeniskelamin` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agama` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `statusnikah` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `noktp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `npwp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamatktp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahanktp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatanktp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kotaktpid` int(10) UNSIGNED NULL DEFAULT NULL,
  `alamattinggal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahantinggal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatantinggal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kotatinggalid` int(10) UNSIGNED NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `emailpribadi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomorrekening` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pajakstatusnikah` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `pajakjumlahtanggungan` int(11) NULL DEFAULT NULL,
  `bpjskesnomor` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bpjskeskodefaskes1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bpjskesnamafaskes1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bpjskodedogi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bpjsnamadogi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `isactive` int(11) NOT NULL DEFAULT 1,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `nip`(`nip`) USING BTREE,
  UNIQUE INDEX `noktp`(`noktp`) USING BTREE,
  INDEX `kotaktp`(`kotaktpid`) USING BTREE,
  INDEX `kotatinggal`(`kotatinggalid`) USING BTREE,
  INDEX `userid`(`userid`) USING BTREE,
  INDEX `jenis`(`jenis`) USING BTREE,
  INDEX `jeniskelamin`(`jeniskelamin`) USING BTREE,
  INDEX `agama`(`agama`) USING BTREE,
  INDEX `isactive`(`isactive`) USING BTREE,
  CONSTRAINT `hcm_pegawai_ibfk_1` FOREIGN KEY (`kotaktpid`) REFERENCES `mst_kota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hcm_pegawai_ibfk_2` FOREIGN KEY (`kotatinggalid`) REFERENCES `mst_kota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hcm_pegawai_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `sys_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hcm_pegawai_grade
-- ----------------------------
DROP TABLE IF EXISTS `hcm_pegawai_grade`;
CREATE TABLE `hcm_pegawai_grade`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawaiid` int(255) UNSIGNED NOT NULL,
  `gradeid` int(10) UNSIGNED NOT NULL,
  `tglmulai` date NOT NULL,
  `tglakhir` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pegawaiid`(`pegawaiid`) USING BTREE,
  INDEX `gradeid`(`gradeid`) USING BTREE,
  CONSTRAINT `hcm_pegawai_grade_ibfk_1` FOREIGN KEY (`pegawaiid`) REFERENCES `hcm_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hcm_pegawai_grade_ibfk_2` FOREIGN KEY (`gradeid`) REFERENCES `mst_grade` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hcm_pegawai_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `hcm_pegawai_jabatan`;
CREATE TABLE `hcm_pegawai_jabatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jabatanid` int(10) UNSIGNED NOT NULL,
  `pegawaiid` int(10) UNSIGNED NOT NULL,
  `tglmulai` date NOT NULL,
  `tglselesai` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jabatanid`(`jabatanid`) USING BTREE,
  INDEX `pegawaiid`(`pegawaiid`) USING BTREE,
  CONSTRAINT `hcm_pegawai_jabatan_ibfk_1` FOREIGN KEY (`jabatanid`) REFERENCES `mst_jabatan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `hcm_pegawai_jabatan_ibfk_2` FOREIGN KEY (`pegawaiid`) REFERENCES `hcm_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hcm_pegawai_keluarga
-- ----------------------------
DROP TABLE IF EXISTS `hcm_pegawai_keluarga`;
CREATE TABLE `hcm_pegawai_keluarga`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawaiid` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgllahir` date NULL DEFAULT NULL,
  `tempatlahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jeniskelamin` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hubungan` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `noktp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bpjskesnomor` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `bpjskeskodefaskes1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `bpjskesnamafaskes1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `bpjskodedogi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `bpjsnamadogi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pegawaiid`(`pegawaiid`) USING BTREE,
  INDEX `jeniskelamin`(`jeniskelamin`) USING BTREE,
  INDEX `isdeleted`(`isdeleted`) USING BTREE,
  CONSTRAINT `hcm_pegawai_keluarga_ibfk_1` FOREIGN KEY (`pegawaiid`) REFERENCES `hcm_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hcm_pegawai_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `hcm_pegawai_pendidikan`;
CREATE TABLE `hcm_pegawai_pendidikan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawaiid` int(10) UNSIGNED NOT NULL,
  `universitasid` int(11) UNSIGNED NOT NULL,
  `gelar` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenjang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fakultas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomorijazah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tglijazah` date NULL DEFAULT NULL,
  `tahunmasuk` int(11) NULL DEFAULT NULL,
  `tahunlulus` int(11) NULL DEFAULT NULL,
  `ipk` decimal(10, 0) NULL DEFAULT NULL,
  `predikat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pegawaiid`(`pegawaiid`) USING BTREE,
  INDEX `universitasid`(`universitasid`) USING BTREE,
  CONSTRAINT `hcm_pegawai_pendidikan_ibfk_1` FOREIGN KEY (`pegawaiid`) REFERENCES `hcm_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `hcm_pegawai_pendidikan_ibfk_2` FOREIGN KEY (`universitasid`) REFERENCES `mst_universitas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hcm_pegawai_unitkerja
-- ----------------------------
DROP TABLE IF EXISTS `hcm_pegawai_unitkerja`;
CREATE TABLE `hcm_pegawai_unitkerja`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawaiid` int(10) UNSIGNED NOT NULL,
  `unitkerjaid` int(10) UNSIGNED NOT NULL,
  `nomorpenempatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tglpenempatan` date NOT NULL,
  `tglmulaiefektif` date NOT NULL,
  `tglakhirefektif` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pegawaiid`(`pegawaiid`) USING BTREE,
  INDEX `unitkerjaid`(`unitkerjaid`) USING BTREE,
  CONSTRAINT `hcm_pegawai_unitkerja_ibfk_1` FOREIGN KEY (`pegawaiid`) REFERENCES `hcm_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `hcm_pegawai_unitkerja_ibfk_2` FOREIGN KEY (`unitkerjaid`) REFERENCES `mst_unit_kerja` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1516769533);
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', 1516769653);
INSERT INTO `migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1516769653);

-- ----------------------------
-- Table structure for mst_grade
-- ----------------------------
DROP TABLE IF EXISTS `mst_grade`;
CREATE TABLE `mst_grade`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ratesalary` int(11) NULL DEFAULT NULL,
  `spjharian` int(10) UNSIGNED NULL DEFAULT NULL,
  `plafonpinjaman` int(11) NULL DEFAULT NULL,
  `isactive` int(11) NULL DEFAULT 1,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode`) USING BTREE,
  INDEX `isdeleted`(`isdeleted`) USING BTREE,
  INDEX `isactive`(`isactive`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_grade
-- ----------------------------
INSERT INTO `mst_grade` VALUES (2, 'G001', 'Grade 1', 3000000, 200000, 0, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_grade` VALUES (3, 'G002', 'Grade 2', 3500000, 200000, 500000, 1, 1, '2018-01-29 07:42:14', 1, '2018-01-29 08:25:46', 0, NULL, NULL);

-- ----------------------------
-- Table structure for mst_hari_libur
-- ----------------------------
DROP TABLE IF EXISTS `mst_hari_libur`;
CREATE TABLE `mst_hari_libur`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isinternal` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `isinternal`(`isinternal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_hari_libur
-- ----------------------------
INSERT INTO `mst_hari_libur` VALUES (2, '2018-01-31', 'Libur Aja', 1);

-- ----------------------------
-- Table structure for mst_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `mst_jabatan`;
CREATE TABLE `mst_jabatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `parentid` int(11) NULL DEFAULT NULL,
  `treecode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `isactive` int(11) NULL DEFAULT 1,
  `isapprover` int(11) NULL DEFAULT NULL,
  `approvalto` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `code`(`kode`) USING BTREE,
  UNIQUE INDEX `treecode`(`treecode`) USING BTREE,
  INDEX `isactive`(`isactive`) USING BTREE,
  INDEX `isdeleted`(`isdeleted`) USING BTREE,
  INDEX `isapprover`(`isapprover`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_jabatan
-- ----------------------------
INSERT INTO `mst_jabatan` VALUES (1, '0001', NULL, '0001', 'Direktur Utama', 1, 1, 'SDM', 1, '2018-01-08 16:37:09', NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jabatan` VALUES (2, '0002', NULL, '0002', 'Direktur Keuangan', 1, 1, 'SDM', 1, '2018-01-08 16:37:21', NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jabatan` VALUES (3, '0003', NULL, '0003', 'Direktur SDM', 1, 1, 'SDM', 1, '2018-01-08 16:37:33', NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jabatan` VALUES (4, '0004', NULL, '0004', 'Direktur', 1, 1, 'SDM', 1, '2018-01-08 16:37:44', NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jabatan` VALUES (5, '0005', 4, '0004.0005', 'Supervisor', 1, 1, 'SDM', 1, '2018-01-08 16:40:02', 1, '2018-01-08 16:40:26', 0, NULL, NULL);
INSERT INTO `mst_jabatan` VALUES (6, '0006', 2, '0002.0006', 'Finance Officer', 1, 0, 'SDM', 1, '2018-01-08 16:40:46', NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jabatan` VALUES (7, '0007', 5, '0004.0005.0007', 'Software Engineer', 1, 0, 'SDM', 1, '2018-01-08 16:41:47', NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jabatan` VALUES (8, '0008', 5, '0004.0005.0008', 'Dokumentator', 1, 0, 'SDM', 1, '2018-01-08 16:42:21', NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jabatan` VALUES (9, '0009', 5, '0004.0005.0009', 'Support', 1, 0, 'SDM', 1, '2018-01-08 16:42:38', NULL, NULL, 0, NULL, NULL);

-- ----------------------------
-- Table structure for mst_jenis_izincuti
-- ----------------------------
DROP TABLE IF EXISTS `mst_jenis_izincuti`;
CREATE TABLE `mst_jenis_izincuti`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `tipe` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `hitungberdasarkan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type`(`tipe`) USING BTREE,
  INDEX `hitungberdasarkan`(`hitungberdasarkan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_jenis_izincuti
-- ----------------------------
INSERT INTO `mst_jenis_izincuti` VALUES (1, 'Cuti Tahunan', 'CUTI', 'HARIKERJA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jenis_izincuti` VALUES (2, 'Potong Cuti Tahunan', 'CUTI', 'HARIKERJA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jenis_izincuti` VALUES (3, 'Ibadah', 'CUTI', 'KALENDER', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jenis_izincuti` VALUES (4, 'Cuti Melahirkan', 'CUTI', 'KALENDER', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jenis_izincuti` VALUES (5, 'Sakit', 'IZIN', 'HARIKERJA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jenis_izincuti` VALUES (6, 'Keperluan Keluarga', 'IZIN', 'HARIKERJA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_jenis_izincuti` VALUES (11, 'Bolos', 'IZIN', 'HARIKERJA', NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- ----------------------------
-- Table structure for mst_kontak
-- ----------------------------
DROP TABLE IF EXISTS `mst_kontak`;
CREATE TABLE `mst_kontak`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fax` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `npwp` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `asal` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `klasifikasi` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `isactive` int(11) NULL DEFAULT 1,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jenis`(`jenis`) USING BTREE,
  INDEX `asal`(`asal`) USING BTREE,
  INDEX `klasifikasi`(`klasifikasi`) USING BTREE,
  INDEX `isactive`(`isactive`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_kontak
-- ----------------------------
INSERT INTO `mst_kontak` VALUES (1, 'Jaka Indria', 'Buah Batu', '089657286375', NULL, NULL, NULL, 'JKIND', 'AKINT', 'KKETC', 1, 1, '2018-01-30 08:09:00', NULL, NULL, 0, NULL, NULL);

-- ----------------------------
-- Table structure for mst_kota
-- ----------------------------
DROP TABLE IF EXISTS `mst_kota`;
CREATE TABLE `mst_kota`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `provinceid` int(10) UNSIGNED NULL DEFAULT NULL,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `code`(`kode`) USING BTREE,
  INDEX `provinceid`(`provinceid`) USING BTREE,
  INDEX `isdeleted`(`isdeleted`) USING BTREE,
  CONSTRAINT `mst_kota_ibfk_1` FOREIGN KEY (`provinceid`) REFERENCES `mst_provinsi` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 514 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_kota
-- ----------------------------
INSERT INTO `mst_kota` VALUES (1, '11.01', 'Aceh Selatan', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (2, '11.02', 'Aceh Tenggara', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (3, '11.03', 'Aceh Timur', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (4, '11.04', 'Aceh Tengah', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (5, '11.05', 'Aceh Barat', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (6, '11.06', 'Aceh Besar', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (7, '11.07', 'Pidie', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (8, '11.08', 'Aceh Utara', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (9, '11.09', 'Simeulue', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (10, '11.10', 'Aceh Singkil', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (11, '11.11', 'Bireuen', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (12, '11.12', 'Aceh Barat Daya', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (13, '11.13', 'Gayo Lues', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (14, '11.14', 'Aceh Jaya', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (15, '11.15', 'Nagan Raya', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (16, '11.16', 'Aceh Tamiang', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (17, '11.17', 'Bener Meriah', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (18, '11.18', 'Pidie Jaya', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (19, '11.71', 'Kota Banda Aceh', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (20, '11.72', 'Kota Sabang', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (21, '11.73', 'Kota Lhokseumawe', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (22, '11.74', 'Kota Langsa', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (23, '11.75', 'Kota Subulussalam', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (24, '12.01', 'Tapanuli Tengah', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (25, '12.02', 'Tapanuli Utara', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (26, '12.03', 'Tapanuli Selatan', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (27, '12.04', 'Nias', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (28, '12.05', 'Langkat', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (29, '12.06', 'Karo', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (30, '12.07', 'Deli Serdang', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (31, '12.08', 'Simalungun', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (32, '12.09', 'Asahan', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (33, '12.10', 'Labuhanbatu', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (34, '12.11', 'Dairi', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (35, '12.12', 'Toba Samosir', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (36, '12.13', 'Mandailing Natal', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (37, '12.14', 'Nias Selatan', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (38, '12.15', 'Pakpak Bharat', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (39, '12.16', 'Humbang Hasundutan', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (40, '12.17', 'Samosir', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (41, '12.18', 'Serdang Bedagai', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (42, '12.19', 'Batubara', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (43, '12.20', 'Padang Lawas Utara', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (44, '12.21', 'Padang Lawas', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (45, '12.22', 'Labuhan Batu Selatan', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (46, '12.23', 'Labuhan Batu Utara', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (47, '12.24', 'Nias Utara', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (48, '12.25', 'Nias Barat', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (49, '12.71', 'Kota Medan', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (50, '12.72', 'Kota Pematangsiantar', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (51, '12.73', 'Kota Sibolga', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (52, '12.74', 'Kota Tanjung Balai', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (53, '12.75', 'Kota Binjai', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (54, '12.76', 'Kota Tebing Tinggi', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (55, '12.77', 'Kota Padang Sidempuan', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (56, '12.78', 'Kota Gunung Sitoli', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (57, '13.01', 'Pesisir Selatan', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (58, '13.02', 'Solok', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (59, '13.03', 'Sijunjung', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (60, '13.04', 'Tanah Datar', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (61, '13.05', 'Padang Pariaman', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (62, '13.06', 'Agam', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (63, '13.07', 'Lima Puluh Kota', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (64, '13.08', 'Pasaman', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (65, '13.09', 'Kepulauan Mentawai', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (66, '13.10', 'Dharmasraya', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (67, '13.11', 'Solok Selatan', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (68, '13.12', 'Pasaman Barat', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (69, '13.71', 'Kota Padang', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (70, '13.72', 'Kota Solok', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (71, '13.73', 'Kota Sawahlunto', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (72, '13.74', 'Kota Padang Panjang', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (73, '13.75', 'Kota Bukittinggi', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (74, '13.76', 'Kota Payakumbuh', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (75, '13.77', 'Kota Pariaman', 3, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (76, '14.01', 'Kampar', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (77, '14.02', 'Indragiri Hulu', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (78, '14.03', 'Bengkalis', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (79, '14.04', 'Indragiri Hilir', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (80, '14.05', 'Pelalawan', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (81, '14.06', 'Rokan Hulu', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (82, '14.07', 'Rokan Hilir', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (83, '14.08', 'Siak', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (84, '14.09', 'Kuantan Singingi', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (85, '14.10', 'Kepulauan Meranti', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (86, '14.71', 'Kota Pekanbaru', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (87, '14.72', 'Kota Dumai', 4, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (88, '15.01', 'Kerinci', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (89, '15.02', 'Merangin', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (90, '15.03', 'Sarolangun', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (91, '15.04', 'Batang Hari', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (92, '15.05', 'Muaro Jambi', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (93, '15.06', 'Tanjung Jabung Barat', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (94, '15.07', 'Tanjung Jabung Timur', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (95, '15.08', 'Bungo', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (96, '15.09', 'Tebo', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (97, '15.71', 'Kota Jambi', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (98, '15.72', 'Kota Sungai Penuh', 5, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (99, '16.01', 'Ogan Komering Ulu', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (100, '16.02', 'Ogan Komering Ilir', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (101, '16.03', 'Muara Enim', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (102, '16.04', 'Lahat', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (103, '16.05', 'Musi Rawas', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (104, '16.06', 'Musi Banyuasin', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (105, '16.07', 'Banyuasin', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (106, '16.08', 'Ogan Komering Ulu Timur', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (107, '16.09', 'Ogan Komering Ulu Selatan', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (108, '16.10', 'Ogan Ilir', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (109, '16.11', 'Empat Lawang', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (110, '16.71', 'Kota Palembang', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (111, '16.72', 'Kota Pagar Alam', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (112, '16.73', 'Kota Lubuk Linggau', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (113, '16.74', 'Kota Prabumulih', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (114, '16.75', 'Penukal Abab Lematang Ilir', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (115, '16.76', 'Musi Rawas Utara', 6, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (116, '17.01', 'Bengkulu Selatan', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (117, '17.02', 'Rejang Lebong', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (118, '17.03', 'Bengkulu Utara', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (119, '17.04', 'Kaur', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (120, '17.05', 'Seluma', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (121, '17.06', 'Mukomuko', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (122, '17.07', 'Lebong', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (123, '17.08', 'Kepahiang', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (124, '17.09', 'Bengkulu Tengah', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (125, '17.71', 'Kota Bengkulu', 7, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (126, '18.01', 'Lampung Selatan', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (127, '18.02', 'Lampung Tengah', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (128, '18.03', 'Lampung Utara', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (129, '18.04', 'Lampung Barat', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (130, '18.05', 'Tulang Bawang', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (131, '18.06', 'Tanggamus', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (132, '18.07', 'Lampung Timur', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (133, '18.08', 'Way Kanan', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (134, '18.09', 'Pesawaran', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (135, '18.10', 'Pring Sewu', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (136, '18.11', 'Mesuji', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (137, '18.12', 'Tulang Bawang Barat', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (138, '18.71', 'Kota Bandar Lampung', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (139, '18.72', 'Kota Metro', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (140, '18.73', 'Pesisir Barat', 8, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (141, '19.01', 'Bangka', 9, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (142, '19.02', 'Belitung', 9, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (143, '19.03', 'Bangka Selatan', 9, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (144, '19.04', 'Bangka Tengah', 9, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (145, '19.05', 'Bangka Barat', 9, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (146, '19.06', 'Belitung Timur', 9, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (147, '19.71', 'Kota Pangkal Pinang', 9, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (148, '21.01', 'Bintan', 10, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (149, '21.02', 'Karimun', 10, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (150, '21.03', 'Natuna', 10, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (151, '21.04', 'Lingga', 10, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (152, '21.05', 'Kepulauan Anambas', 10, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (153, '21.71', 'Kota Batam', 10, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (154, '21.72', 'Kota Tanjung Pinang', 10, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (155, '31.01', 'Kepulauan Seribu', 11, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (156, '31.71', 'Kota Jakarta Pusat', 11, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (157, '31.72', 'Kota Jakarta Utara', 11, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (158, '31.73', 'Kota Jakarta Barat', 11, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (159, '31.74', 'Kota Jakarta Selatan', 11, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (160, '31.75', 'Kota Jakarta Timur', 11, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (161, '32.01', 'Bogor', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (162, '32.02', 'Sukabumi', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (163, '32.03', 'Cianjur', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (164, '32.04', 'Kab. Bandung', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (165, '32.05', 'Garut', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (166, '32.06', 'Tasikmalaya', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (167, '32.07', 'Ciamis', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (168, '32.08', 'Kuningan', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (169, '32.09', 'Cirebon', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (170, '32.10', 'Majalengka', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (171, '32.11', 'Sumedang', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (172, '32.12', 'Indramayu', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (173, '32.13', 'Subang', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (174, '32.14', 'Purwakarta', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (175, '32.15', 'Karawang', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (176, '32.16', 'Bekasi', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (177, '32.17', 'Bandung Barat', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (178, '32.18', 'Pangandaran', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (179, '32.71', 'Kota Bogor', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (180, '32.72', 'Kota Sukabumi', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (181, '32.73', 'Kota Bandung', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (182, '32.74', 'Kota Cirebon', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (183, '32.75', 'Kota Bekasi', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (184, '32.76', 'Kota Depok', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (185, '32.77', 'Kota Cimahi', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (186, '32.78', 'Kota Tasikmalaya', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (187, '32.79', 'Kota Banjar', 12, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (188, '33.01', 'Cilacap', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (189, '33.02', 'Banyumas', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (190, '33.03', 'Purbalingga', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (191, '33.04', 'Banjarnegara', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (192, '33.05', 'Kebumen', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (193, '33.06', 'Purworejo', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (194, '33.07', 'Wonosobo', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (195, '33.08', 'Magelang', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (196, '33.09', 'Boyolali', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (197, '33.10', 'Klaten', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (198, '33.11', 'Sukoharjo', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (199, '33.12', 'Wonogiri', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (200, '33.13', 'Karanganyar', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (201, '33.14', 'Sragen', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (202, '33.15', 'Grobogan', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (203, '33.16', 'Blora', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (204, '33.17', 'Rembang', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (205, '33.18', 'Pati', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (206, '33.19', 'Kudus', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (207, '33.20', 'Jepara', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (208, '33.21', 'Demak', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (209, '33.22', 'Semarang', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (210, '33.23', 'Temanggung', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (211, '33.24', 'Kendal', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (212, '33.25', 'Batang', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (213, '33.26', 'Pekalongan', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (214, '33.27', 'Pemalang', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (215, '33.28', 'Tegal', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (216, '33.29', 'Brebes', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (217, '33.71', 'Kota Magelang', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (218, '33.72', 'Kota Surakarta', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (219, '33.73', 'Kota Salatiga', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (220, '33.74', 'Kota Semarang', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (221, '33.75', 'Kota Pekalongan', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (222, '33.76', 'Kota Tegal', 13, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (223, '34.01', 'Kulon Progo', 14, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (224, '34.02', 'Bantul', 14, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (225, '34.03', 'Gunung Kidul', 14, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (226, '34.04', 'Sleman', 14, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (227, '34.71', 'Kota Yogyakarta', 14, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (228, '35.01', 'Pacitan', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (229, '35.02', 'Ponorogo', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (230, '35.03', 'Trenggalek', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (231, '35.04', 'Tulungagung', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (232, '35.05', 'Blitar', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (233, '35.06', 'Kediri', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (234, '35.07', 'Malang', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (235, '35.08', 'Lumajang', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (236, '35.09', 'Jember', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (237, '35.10', 'Banyuwangi', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (238, '35.11', 'Bondowoso', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (239, '35.12', 'Situbondo', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (240, '35.13', 'Probolinggo', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (241, '35.14', 'Pasuruan', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (242, '35.15', 'Sidoarjo', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (243, '35.16', 'Mojokerto', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (244, '35.17', 'Jombang', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (245, '35.18', 'Nganjuk', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (246, '35.19', 'Madiun', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (247, '35.20', 'Magetan', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (248, '35.21', 'Ngawi', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (249, '35.22', 'Bojonegoro', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (250, '35.23', 'Tuban', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (251, '35.24', 'Lamongan', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (252, '35.25', 'Gresik', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (253, '35.26', 'Bangkalan', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (254, '35.27', 'Sampang', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (255, '35.28', 'Pamekasan', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (256, '35.29', 'Sumenep', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (257, '35.71', 'Kota Kediri', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (258, '35.72', 'Kota Blitar', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (259, '35.73', 'Kota Malang', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (260, '35.74', 'Kota Probolinggo', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (261, '35.75', 'Kota Pasuruan', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (262, '35.76', 'Kota Mojokerto', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (263, '35.77', 'Kota Madiun', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (264, '35.78', 'Kota Surabaya', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (265, '35.79', 'Kota Batu', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (266, '36.01', 'Pandeglang', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (267, '36.02', 'Lebak', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (268, '36.03', 'Tangerang', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (269, '36.04', 'Serang', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (270, '36.71', 'Kota Tangerang', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (271, '36.72', 'Kota Cilegon', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (272, '36.73', 'Kota Serang', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (273, '36.74', 'Kota Tangerang Selatan', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (274, '51.01', 'Jembrana', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (275, '51.02', 'Tabanan', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (276, '51.03', 'Badung', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (277, '51.04', 'Gianyar', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (278, '51.05', 'Klungkung', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (279, '51.06', 'Bangli', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (280, '51.07', 'Karang Asem', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (281, '51.08', 'Buleleng', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (282, '51.71', 'Kota Denpasar', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (283, '52.01', 'Lombok Barat', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (284, '52.02', 'Lombok Tengah', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (285, '52.03', 'Lombok Timur', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (286, '52.04', 'Sumbawa', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (287, '52.05', 'Dompu', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (288, '52.06', 'Bima', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (289, '52.07', 'Sumbawa Barat', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (290, '52.08', 'Lombok Utara', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (291, '52.71', 'Kota Mataram', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (292, '52.72', 'Kota Bima', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (293, '53.01', 'Kupang', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (294, '53.02', 'Timor Tengah Selatan', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (295, '53.03', 'Timor Tengah Utara', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (296, '53.04', 'Belu', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (297, '53.05', 'Alor', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (298, '53.06', 'Flores Timur', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (299, '53.07', 'Sikka', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (300, '53.08', 'Ende', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (301, '53.09', 'Ngada', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (302, '53.10', 'Manggarai', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (303, '53.11', 'Sumba Timur', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (304, '53.12', 'Sumba Barat', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (305, '53.13', 'Lembata', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (306, '53.14', 'Rotendao', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (307, '53.15', 'Manggarai Barat', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (308, '53.16', 'Nagekeo', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (309, '53.17', 'Sumba Tengah', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (310, '53.18', 'Sumba Barat Daya', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (311, '53.19', 'Manggarai Timur', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (312, '53.20', 'Sabu Raijua', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (313, '53.21', 'Malaka', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (314, '53.71', 'Kota Kupang', 19, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (315, '61.01', 'Sambas', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (316, '61.02', 'Pontianak', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (317, '61.03', 'Sanggau', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (318, '61.04', 'Ketapang', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (319, '61.05', 'Sintang', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (320, '61.06', 'Kapuas Hulu', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (321, '61.07', 'Bengkayang', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (322, '61.08', 'Landak', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (323, '61.09', 'Sekadau', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (324, '61.10', 'Melawi', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (325, '61.11', 'Kayong Utara', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (326, '61.12', 'Kubu Raya', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (327, '61.71', 'Kota Pontianak', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (328, '61.72', 'Kota Singkawang', 20, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (329, '62.01', 'Kotawaringin Barat', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (330, '62.02', 'Kotawaringin Timur', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (331, '62.03', 'Kapuas', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (332, '62.04', 'Barito Selatan', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (333, '62.05', 'Barito Utara', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (334, '62.06', 'Katingan', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (335, '62.07', 'Seruyan', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (336, '62.08', 'Sukamara', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (337, '62.09', 'Lamandau', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (338, '62.10', 'Gunung Mas', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (339, '62.11', 'Pulang Pisau', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (340, '62.12', 'Murung Raya', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (341, '62.13', 'Barito Timur', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (342, '62.71', 'Kota Palangkaraya', 21, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (343, '63.01', 'Tanah Laut', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (344, '63.02', 'Kotabaru', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (345, '63.03', 'Banjar', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (346, '63.04', 'Barito Kuala', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (347, '63.05', 'Tapin', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (348, '63.06', 'Hulu Sungai Selatan', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (349, '63.07', 'Hulu Sungai Tengah', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (350, '63.08', 'Hulu Sungai Utara', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (351, '63.09', 'Tabalong', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (352, '63.10', 'Tanah Bumbu', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (353, '63.11', 'Balangan', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (354, '63.71', 'Kota Banjarmasin', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (355, '63.72', 'Kota Banjar Baru', 22, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (356, '64.01', 'Paser', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (357, '64.02', 'Kutai Kartanegara', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (358, '64.03', 'Berau', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (359, '64.07', 'Kutai Barat', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (360, '64.08', 'Kutai Timur', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (361, '64.09', 'Penajam Paser Utara', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (362, '64.71', 'Kota Balikpapan', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (363, '64.72', 'Kota Samarinda', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (364, '64.73', 'Mahakam Ulu', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (365, '64.74', 'Kota Bontang', 23, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (366, '65.04', 'Bulungan', 24, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (367, '65.05', 'Nunukan', 24, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (368, '65.06', 'Malinau', 24, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (369, '65.10', 'Tana Tidung', 24, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (370, '65.73', 'Kota Tarakan', 24, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (371, '71.01', 'Bolaang Mongondow', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (372, '71.02', 'Minahasa', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (373, '71.03', 'Kepulauan Sangihe', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (374, '71.04', 'Kepulauan Talaud', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (375, '71.05', 'Minahasa Selatan', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (376, '71.06', 'Minahasa Utara', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (377, '71.07', 'Minahasa Tenggara', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (378, '71.08', 'Bolaang Mongondow Utara', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (379, '71.09', 'Kep. Siau Tagulandang Biaro', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (380, '71.10', 'Bolaang Mongondow Timur', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (381, '71.11', 'Bolaang Mongondow Selatan', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (382, '71.71', 'Kota Manado', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (383, '71.72', 'Kota Bitung', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (384, '71.73', 'Kota Tomohon', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (385, '71.74', 'Kota Kotamobagu', 25, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (386, '72.01', 'Banggai', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (387, '72.02', 'Poso', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (388, '72.03', 'Donggala', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (389, '72.04', 'Toli-Toli', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (390, '72.05', 'Buol', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (391, '72.06', 'Morowali', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (392, '72.07', 'Banggai Kepulauan', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (393, '72.08', 'Parigi Moutong', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (394, '72.09', 'Tojo Una-Una', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (395, '72.10', 'Sigi', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (396, '72.11', 'Banggai Laut', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (397, '72.12', 'Morowali Utara', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (398, '72.71', 'Kota Palu', 26, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (399, '73.01', 'Selayar', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (400, '73.02', 'Bulukumba', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (401, '73.03', 'Bantaeng', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (402, '73.04', 'Jeneponto', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (403, '73.05', 'Takalar', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (404, '73.06', 'Gowa', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (405, '73.07', 'Sinjai', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (406, '73.08', 'Bone', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (407, '73.09', 'Maros', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (408, '73.10', 'Pangkajene Kepulauan', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (409, '73.11', 'Barru', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (410, '73.12', 'Soppeng', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (411, '73.13', 'Wajo', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (412, '73.14', 'Sidenreng Rappang', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (413, '73.15', 'Pinrang', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (414, '73.16', 'Enrekang', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (415, '73.17', 'Luwu', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (416, '73.18', 'Tana Toraja', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (417, '73.22', 'Luwu Utara', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (418, '73.24', 'Luwu Timur', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (419, '73.26', 'Toraja Utara', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (420, '73.71', 'Kota Makasar', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (421, '73.72', 'Kota Pare-Pare', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (422, '73.73', 'Kota Palopo', 27, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (423, '74.01', 'Kolaka', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (424, '74.02', 'Kendari', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (425, '74.03', 'Muna', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (426, '74.04', 'Buton', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (427, '74.05', 'Konawe Selatan', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (428, '74.06', 'Bombana', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (429, '74.07', 'Wakatobi', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (430, '74.08', 'Kolaka Utara', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (431, '74.09', 'Konawe Utara', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (432, '74.10', 'Buton Utara', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (433, '74.11', 'Konawe Kepulauan', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (434, '74.12', 'Kolaka Timur', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (435, '74.14', 'Buton Tengah', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (436, '74.71', 'Kota Kendari', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (437, '74.72', 'Kota Bau-Bau', 28, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (438, '75.01', 'Gorontalo', 29, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (439, '75.02', 'Boalemo', 29, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (440, '75.03', 'Bone Bolango', 29, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (441, '75.04', 'Pohuwato', 29, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (442, '75.05', 'Gorontalo Utara', 29, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (443, '75.71', 'Kota Gorontalo', 29, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (444, '76.01', 'Mamuju Utara', 30, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (445, '76.02', 'Mamuju', 30, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (446, '76.03', 'Mamasa', 30, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (447, '76.04', 'Polewali Mandar', 30, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (448, '76.05', 'Majene', 30, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (449, '76.06', 'Mamuju Tengah', 30, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (450, '81.01', 'Maluku Tengah', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (451, '81.02', 'Maluku Tenggara', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (452, '81.03', 'Maluku Tenggara Barat', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (453, '81.04', 'Buru', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (454, '81.05', 'Seram Bagian Timur', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (455, '81.06', 'Seram Bagian Barat', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (456, '81.07', 'Kepulauan Aru', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (457, '81.08', 'Maluku Barat Daya', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (458, '81.09', 'Buru Selatan', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (459, '81.71', 'Kota Ambon', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (460, '81.72', 'Kota Tual', 31, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (461, '82.01', 'Halmahera Barat', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (462, '82.02', 'Halmahera Tengah', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (463, '82.03', 'Halmahera Utara', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (464, '82.04', 'Halmahera Selatan', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (465, '82.05', 'Kepulauan Sula', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (466, '82.06', 'Halmahera Timur', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (467, '82.07', 'Morotai', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (468, '82.08', 'Pulau Talibu', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (469, '82.71', 'Kota Ternate', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (470, '82.72', 'Kota Tidore', 32, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (471, '91.01', 'Merauke', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (472, '91.02', 'Jayawijaya', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (473, '91.03', 'Jayapura', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (474, '91.04', 'Nabire', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (475, '91.05', 'Kepulauan Yapen', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (476, '91.06', 'Biak Numfor', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (477, '91.07', 'Puncak Jaya', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (478, '91.08', 'Paniai', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (479, '91.09', 'Mimika', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (480, '91.10', 'Sarmi', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (481, '91.11', 'Keerom', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (482, '91.12', 'Pegunungan Bintang', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (483, '91.13', 'Yahukimo', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (484, '91.14', 'Tolikara', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (485, '91.15', 'Waropen', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (486, '91.16', 'Boven Digul', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (487, '91.17', 'Mappi', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (488, '91.18', 'Asmat', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (489, '91.19', 'Supiori', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (490, '91.20', 'Mamberamo Raya', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (491, '91.21', 'Mamberamo Tengah', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (492, '91.22', 'Yalimo', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (493, '91.23', 'Lanny Jaya', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (494, '91.24', 'Nduga', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (495, '91.25', 'Puncak', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (496, '91.26', 'Dogiyai', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (497, '91.27', 'Intan Jaya', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (498, '91.28', 'Deiyai', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (499, '91.71', 'Kota Jayapura', 33, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (500, '92.01', 'Sorong', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (501, '92.02', 'Manokwari', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (502, '92.03', 'Fakfak', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (503, '92.04', 'Sorong Selatan', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (504, '92.05', 'Raja Ampat', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (505, '92.06', 'Teluk Bintuni', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (506, '92.07', 'Teluk Wondama', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (507, '92.08', 'Kaimana', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (508, '92.09', 'Tambraw', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (509, '92.10', 'Maybrat', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (510, '92.11', 'Pegunungan Arfak', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (511, '92.12', 'Manokwari Selatan', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (512, '92.71', 'Kota Sorong', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_kota` VALUES (513, '9999', 'Test', 1, 1, '2018-01-18 08:56:05', NULL, NULL, 0, NULL, NULL);

-- ----------------------------
-- Table structure for mst_provinsi
-- ----------------------------
DROP TABLE IF EXISTS `mst_provinsi`;
CREATE TABLE `mst_provinsi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `kode` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'Kode',
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'Nama',
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `code`(`kode`) USING BTREE,
  INDEX `isdeleted`(`isdeleted`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_provinsi
-- ----------------------------
INSERT INTO `mst_provinsi` VALUES (1, '11', 'Aceh', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (2, '12', 'Sumatera Utara', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (3, '13', 'Sumatera Barat', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (4, '14', 'Riau', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (5, '15', 'Jambi', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (6, '16', 'Sumatera Selatan', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (7, '17', 'Bengkulu', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (8, '18', 'Lampung', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (9, '19', 'Bangka Belitung', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (10, '21', 'Kepulauan Riau', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (11, '31', 'DKI Jakarta', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (12, '32', 'Jawa Barat', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (13, '33', 'Jawa Tengah', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (14, '34', 'DI Yogyakarta', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (15, '35', 'Jawa Timur', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (16, '36', 'Banten', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (17, '51', 'Bali', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (18, '52', 'Nusa Tenggara Barat', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (19, '53', 'Nusa Tenggara Timur', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (20, '61', 'Kalimantan Barat', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (21, '62', 'Kalimantan Tengah', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (22, '63', 'Kalimantan Selatan', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (23, '64', 'Kalimantan Timur', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (24, '65', 'Kalimantan Utara', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (25, '71', 'Sulawesi Utara', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (26, '72', 'Sulawesi Tengah', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (27, '73', 'Sulawesi Selatan', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (28, '74', 'Sulawesi Tenggara', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (29, '75', 'Gorontalo', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (30, '76', 'Sulawesi Barat', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (31, '81', 'Maluku', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (32, '82', 'Maluku Utara', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (33, '91', 'Papua', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_provinsi` VALUES (34, '92', 'Papua Barat', NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- ----------------------------
-- Table structure for mst_referensi
-- ----------------------------
DROP TABLE IF EXISTS `mst_referensi`;
CREATE TABLE `mst_referensi`  (
  `nilai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `kategori` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `issystem` int(11) NULL DEFAULT 1,
  `isactive` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`nilai`) USING BTREE,
  INDEX `isactive`(`isactive`) USING BTREE,
  INDEX `issystem`(`issystem`) USING BTREE,
  INDEX `kategori`(`kategori`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_referensi
-- ----------------------------
INSERT INTO `mst_referensi` VALUES ('AGM01', 'HCM_AGAMA', 'Islam', 1, 1);
INSERT INTO `mst_referensi` VALUES ('AGM02', 'HCM_AGAMA', 'Protestan', 1, 1);
INSERT INTO `mst_referensi` VALUES ('AGM03', 'HCM_AGAMA', 'Katolik', 1, 1);
INSERT INTO `mst_referensi` VALUES ('AGM04', 'HCM_AGAMA', 'Hindu', 1, 1);
INSERT INTO `mst_referensi` VALUES ('AGM05', 'HCM_AGAMA', 'Budha', 1, 1);
INSERT INTO `mst_referensi` VALUES ('AGM06', 'HCM_AGAMA', 'Konghuchu', 1, 1);
INSERT INTO `mst_referensi` VALUES ('AKEXT', 'MST_ASALKONTAK', 'Eksternal', 1, 1);
INSERT INTO `mst_referensi` VALUES ('AKINT', 'MST_ASALKONTAK', 'Internal', 1, 1);
INSERT INTO `mst_referensi` VALUES ('HKL01', 'HCM_HUBUNGANKELUARGA', 'Istri', 1, 1);
INSERT INTO `mst_referensi` VALUES ('HKL02', 'HCM_HUBUNGANKELUARGA', 'Suami', 1, 1);
INSERT INTO `mst_referensi` VALUES ('HKL03', 'HCM_HUBUNGANKELUARGA', 'Anak', 1, 1);
INSERT INTO `mst_referensi` VALUES ('JKBHK', 'MST_JENISKONTAK', 'Badan Hukum', 1, 1);
INSERT INTO `mst_referensi` VALUES ('JKIND', 'MST_JENISKONTAK', 'Individu', 1, 1);
INSERT INTO `mst_referensi` VALUES ('KIU01', 'ORG_KUALIFIKASIIZINUSAHA', 'Perusahaan Kecil', 1, 1);
INSERT INTO `mst_referensi` VALUES ('KIU02', 'ORG_KUALIFIKASIIZINUSAHA', 'Perusahaan Besar', 1, 1);
INSERT INTO `mst_referensi` VALUES ('KKCSP', 'MST_KLASIFIKASIKONTAK', 'Customer & Supplier', 1, 1);
INSERT INTO `mst_referensi` VALUES ('KKCUS', 'MST_KLASIFIKASIKONTAK', 'Customer', 1, 1);
INSERT INTO `mst_referensi` VALUES ('KKETC', 'MST_KLASIFIKASIKONTAK', 'Lainnya', 1, 1);
INSERT INTO `mst_referensi` VALUES ('KKSUP', 'MST_KLASIFIKASIKONTAK', 'Supplier', 1, 1);
INSERT INTO `mst_referensi` VALUES ('KON01', 'ORG_KONDISIPERALATAN', 'Baik', 1, 1);
INSERT INTO `mst_referensi` VALUES ('KON02', 'ORG_KONDISIPERALATAN', 'Rusak', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PEG00', 'HCM_JENISPEGAWAI', 'Keluar', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PEG01', 'HCM_JENISPEGAWAI', 'Tetap', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PEG02', 'HCM_JENISPEGAWAI', 'Kontrak', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PEG03', 'HCM_JENISPEGAWAI', 'PDMP', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PEG04', 'HCM_JENISPEGAWAI', 'Pasif', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PEG05', 'HCM_JENISPEGAWAI', 'Outsource', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PEG06', 'HCM_JENISPEGAWAI', 'Pensiun', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PEG07', 'HCM_JENISPEGAWAI', 'Magang', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PSN01', 'HCM_STATUSNIKAHPAJAK', 'Kawin', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PSN02', 'HCM_STATUSNIKAHPAJAK', 'Tidak Kawin', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PSN03', 'HCM_STATUSNIKAHPAJAK', 'Hidup Berpisah', 1, 1);
INSERT INTO `mst_referensi` VALUES ('PSN04', 'HCM_STATUSNIKAHPAJAK', 'Pisah Harta', 1, 1);
INSERT INTO `mst_referensi` VALUES ('SKA01', 'ORG_STATUSKEPEMILIKANALAT', 'Milik Sendisi', 1, 1);
INSERT INTO `mst_referensi` VALUES ('SKA02', 'ORG_STATUSKEPEMILIKANALAT', 'Sewa', 1, 1);
INSERT INTO `mst_referensi` VALUES ('SKA03', 'ORG_STATUSKEPEMILIKANALAT', 'Dukungan', 1, 1);
INSERT INTO `mst_referensi` VALUES ('SNK01', 'HCM_STATUSNIKAH', 'Belum Menikah', 1, 1);
INSERT INTO `mst_referensi` VALUES ('SNK02', 'HCM_STATUSNIKAH', 'Menikah', 1, 1);
INSERT INTO `mst_referensi` VALUES ('SNK03', 'HCM_STATUSNIKAH', 'Duda / Janda', 1, 1);

-- ----------------------------
-- Table structure for mst_unit_kerja
-- ----------------------------
DROP TABLE IF EXISTS `mst_unit_kerja`;
CREATE TABLE `mst_unit_kerja`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `parentid` int(10) UNSIGNED NULL DEFAULT NULL,
  `treecode` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fax` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ishavegl` int(11) NULL DEFAULT 0,
  `isactive` int(11) NULL DEFAULT 1,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode`) USING BTREE,
  UNIQUE INDEX `treecode`(`treecode`) USING BTREE,
  INDEX `parentid`(`parentid`) USING BTREE,
  INDEX `ishavegl`(`ishavegl`) USING BTREE,
  INDEX `isactive`(`isactive`) USING BTREE,
  INDEX `isdeleted`(`isdeleted`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for mst_universitas
-- ----------------------------
DROP TABLE IF EXISTS `mst_universitas`;
CREATE TABLE `mst_universitas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `isdeleted`(`isdeleted`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 748 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_universitas
-- ----------------------------
INSERT INTO `mst_universitas` VALUES (1, '08752', 'POLITEKNIK TMKM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (2, '08768', 'UNIVERSITAS SAM RATULANGI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (3, '08770', 'UNIVERSITAS PANCASAKTI TEGAL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (4, '08772', 'ASMI BUDHI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (5, '08773', 'UNIVERSITAS MUHAMMADIYAH TANGERANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (6, '08775', 'UNIVERSITAS LAMBUNG MANGKURAT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (7, '08776', 'SEKOLAH TINGGI ILMU MANAJEMEN INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (8, '08777', 'POLIBAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (9, '08780', 'UNIVERSITAS SURYAKENCANA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (10, '08781', 'SEKOLAH TINGGI PARIWISATA TRISAKTI JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (11, '08782', 'SEKOLAH TINGGI TEKNIK PLN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (12, '08783', 'INSTITUT TEKNOLOGI TEXTIL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (13, '08786', 'STBA PERTIWI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (14, '08787', 'UNIVERSITAS KARTINI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (15, '08789', 'SEKOLAH TINGGI ILMU EKONOMI BINA BANGSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (16, '08790', 'UNIVERSITAS MATHLA`UL ANWAR (UNMA)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (17, '08791', 'SEKOLAH TINGGI ILMU MANAJEMEN (STIMA) KOSGORO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (18, '08794', 'SEKOLAH TINGGI TEKNIK (STT) HARAPAN MEDAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (19, '08795', 'SEKOLAH TINGGI PARIWISATA SAHID', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (20, '08797', 'SEKOLAH TINGGI ILMU KOMUNIKASI (STIKOM) INTERSTUDI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (21, '08798', 'SEKOLAH TINGGI FARMASI MUHAMMADIYAH TANGERANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (22, '08799', 'UNIVERSITI KEBANGSAAN MALAYSIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (23, '08801', 'UNIVERSITAS DIAN NUSWANTORO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (24, '00005', 'LAINNYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (25, '08803', 'STBA PERSAHABATAN INTERNASIONAL ASIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (26, '08804', 'STIK BINA HUSADA PALEMBANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (27, '08807', 'POLITEKNIK NEGERI BANJARMASIN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (28, '08806', 'AKADEMI PARIWISATA NASIONAL INDONESIA BANDUNG (AKPARINDO)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (29, '08810', 'SMPN 1 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (30, '08811', 'SMAN 3 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (31, '08813', 'STT IBNU SINA BATAM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (32, '08815', 'UNIVERSITAS KUTAI KARTANEGARA (UNIKARTA) TENGGARONG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (33, '08816', 'SEKOLAH TINGGI KESEJAHTERAAN SOSIAL BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (34, '08817', 'UNIVERSITAS MUSLIM INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (35, '08818', 'POLITEKNIK NEGERI UJUNG PANDANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (36, '08819', 'SEKOLAH TINGGI ILMU MANAJEMEN BONGAYA MAKASSAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (37, '08820', 'UNIVERSITAS NEGERI MAKASSAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (38, '08824', 'UNIVERSITAS MUHAMMADIYAH PURWOKERTO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (39, '08825', 'SEKOLAH TINGGI TEKNOLOGI NUKLIR BATAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (40, '08826', 'STIMIK POTENSI UTAMA MEDAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (41, '08828', 'SEKOLAH TINGGI ILMU EKONOMI (STIE) TRIBUANA JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (42, '08829', 'UNIVERSITAS ISLAM NEGERI KALIJAGA YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (43, '08830', 'POLITEKNIK KESEHATAN KEMENKES TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (44, '08831', 'UNIVERSITAS BUNG HATTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (45, '08832', 'STIKOM THE LONDON SCHOOL OF PUBLIC RELATIONS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (46, '08837', 'UNIVERSITAS YARSI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (47, '08839', 'STIE BINA BANGSA BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (48, '08843', 'STT NUSA PUTRA SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (49, '08844', 'STAI PALABUHAN RATU', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (50, '08845', 'UNIVERSITAS INDRAPRASTA PGRI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (51, '08847', 'STIE JAKARTA INTERNATIONAL COLLEGE', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (52, '08854', 'SMPN IX BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (53, '08856', 'SD CIENTEUNG IV', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (54, '08859', 'SDN 1 UJUNGBERUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (55, '08862', 'SDN SUKAJADI 2 CISAYONG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (56, '08865', 'SMPN 13 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (57, '08866', 'SMAN 5 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (58, '08896', 'SDN KEBON GEDANG IV', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (59, '08902', 'SMAN 1 BALEENDAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (60, '08903', 'SDN PASAR ANYAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (61, '08906', 'SDN CICADAS BARAT V', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (62, '08909', 'SDN 417', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (63, '08911', 'SMAN 38', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (64, '08917', 'SMPN BANJARAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (65, '08918', 'SMAN BALEENDAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (66, '08931', 'SMAN 13 CIMINDI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (67, '08937', 'UNIVERSITAS AZZAHRA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (68, '08945', 'UNIVERSITAS MUHAMMADIYAH METRO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (69, '08946', 'SEKOLAH TINGGI ILMU EKONOMI (STIE) TRIBUANA BEKASI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (70, '08952', 'UNIVERSITY OF STIRLING', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (71, '08953', 'UNIVERSITY OF GRONINGEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (72, '08955', 'SDN SALAKARIA I CIAMIS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (73, '08956', 'SMPN SALAKARIA CIAMIS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (74, '08957', 'SMU GALUH CIAMIS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (75, '08958', 'STAI SABILI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (76, '08960', 'AKADEMI PARIWISATA CITRA BUANA INDONESIA SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (77, '08964', 'UNIVERSITAS TEKNOLOGI YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (78, '08967', 'MACQUARIE UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (79, '08969', 'UNIVERSITAS MUHAMMADIYAH SUMATERA UTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (80, '08971', 'SEKOLAH TINGGI ILMU EKONOMI (STIE) BAJIMINASA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (81, '08973', 'STIE LA TANSA MASHIRO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (82, '08974', 'SEKOLAH TINGGI ILMU EKONOMI PELITA INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (83, '08976', 'STMIK CIC CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (84, '08981', 'UNIVERSITAS SATYA NEGARA INDONESIA (USNI)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (85, '08982', 'AMIK HASS BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (86, '08984', 'SMAN 1 KARANGANYAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (87, '08985', 'SMAN 1 JONGGOL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (88, '08986', 'AKADEMI AKUNTANSI BOROBUDUR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (89, '08987', 'AMIK TUNAS PATRIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (90, '08988', 'STIE KUSUMA NEGARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (91, '08989', 'UNIVERSITAS YOS SOEDARSO SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (92, '09013', 'UNIVERSITAS PEMBANGUNAN PANCA BUDI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (93, '08994', 'POLITEKNIK \"API\" YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (94, '08995', 'AKADEMI INDUSTRI TEKSTIL BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (95, '08996', 'STMIK DCI TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (96, '08997', 'STIKES SURYA GLOBAL YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (97, '09000', 'PERGURUAN TINGGI TEKNOKRAT LAMPUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (98, '09002', 'STMIK TRIGUNA DHARMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (99, '09005', 'STMIK PROVISI SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (100, '09006', 'SEKOLAH TINGGI ILMU EKONOMI (STIE) DHARMA BUMIPUTERA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (101, '09008', 'POLITEKNIK HARAPAN BERSAMA TEGAL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (102, '09009', 'UNIVERSITAS SISWA BANGSA INTERNATIONAL - SAMPOERNA UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (103, '09015', 'SEKOLAH TINGGI ILMU EKONOMI (STIE) NOBEL INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (104, '09016', 'AKADEMI MANAJEMEN INFORMATIKA DAN KOMPUTER (AMIK) SERANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (105, '09017', 'STIE KESATUAN BOGOR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (106, '09018', 'STIE WIDYA WIWAHA YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (107, '09020', 'STIENAS BANDARMASIH BANJARMASIN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (108, '09021', 'STIKES CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (109, '09022', 'STBA LIA JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (110, '09024', 'QUEEN MARY UNIVERSITY OF LONDON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (111, '09025', 'UNIVERSITAS SULTAN FATAH DEMAK', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (112, '09026', 'UNIVERSITAS SYIAH KUALA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (113, '09027', 'INSTITUT TEKNOLOGI NASIONAL MALANG (ITN)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (114, '09028', 'ASIA PACIFIC UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (115, '09029', 'SEKOLAH TINGGI PERIKANAN JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (116, '08950', 'STKIP PASUNDAN CIMAHI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (117, '08961', 'ASTON UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (118, '08972', 'Universitas Prof. Dr. Hazairin SH. Bengkulu', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (119, '08979', 'UNIVERSITAS MULTIMEDIA NUSANTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (120, '08991', 'UNIVERSITAS KADIRI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (121, '08992', 'UNIVERSITAS MALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (122, '08999', 'UIN SUNAN KALIJAGA YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (123, '09004', 'UNIVERSITAS WIJAYA KUSUMA SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (124, '09014', 'UNIVERSITAS AMIR HAMZAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (125, '09019', 'STKIP PGRI BANDAR LAMPUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (126, '09030', 'INTERNATIONAL UNIVERSITY OF JAPAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (127, '09035', 'UNIVERSITAS DARUL ULUM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (128, '08968', 'UNIVERSITAS SYIAH KUALA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (129, '08970', 'SEKOLAH TINGGI ILMU EKONOMI (STIE) MITRA LAMPUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (130, '08998', 'UNIVERSITAS ISLAM MALANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (131, '09001', 'STIE AL ANWAR MOJOKERTO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (132, '09003', 'STIE YAPAN SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (133, '09010', 'STMIK - STIE ASIA MALANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (134, '09011', 'UNIVERSITAS BATAM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (135, '09012', 'STIE STMIK IBBI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (136, '09023', 'UNIVERSITAS TRILOGI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (137, '08679', 'SEKOLAH TINGGI ILMU MANAJEMEN PRIMA GRAHA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (138, '08680', 'STMIK KHARISMA KARAWANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (139, '08682', 'STISIPOL KARTIKA BANGSA YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (140, '08688', 'STIE BISMA LEPISI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (141, '08690', 'STIE ADHY NIAGA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (142, '08693', 'STIE KRIDATAMA BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (143, '08694', 'SEKOLAH TINGGI TEKNOLOGI GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (144, '08695', 'UNIVERSITAS BALE BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (145, '08696', 'STAI AL-BAROKAH SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (146, '08697', 'UNIVERSITAS BANTEN JAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (147, '08698', 'STIM LPI MAKASSAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (148, '08699', 'STISIP WIDYAPURI MANDIRI SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (149, '08700', 'AMIK CITRA BUANA INDONESIA (CBI)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (150, '08701', 'AKADEMI PARIWISATA SILIWANGI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (151, '08702', 'SEKOLAH TINGGI ILMU EKONOMI KERJASAMA YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (152, '08703', 'SEKOLAH TINGGI ILMU ADMINISTRASI YPPT PRIATIM TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (153, '08704', 'STMIK EL RAHMA YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (154, '08705', 'STIE CIPASUNG SINGAPARNA TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (155, '08710', 'STMIK TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (156, '08711', 'AMIK BUMI NUSANTARA CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (157, '08713', 'AKADEMIK AKUNTANSI BINA INSANI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (158, '08714', 'STMIK BANI SALEH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (159, '08716', 'UNIVERSITAS MH THAMRIN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (160, '08717', 'AKBID BOGOR HUSADA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (161, '08719', 'STIA CIMAHI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (162, '08720', 'AKADEMI SEKRETARI DAN MANAJEMEN ARIYANTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (163, '08721', 'POLITEKNIK NEGERI JEMBER', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (164, '08722', 'STMIK MARDIRA INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (165, '08571', 'STIKOM SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (166, '08572', 'UNIVERSITAS DARMA PERSADA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (167, '08573', 'MONASH UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (168, '08574', 'UNIVERSITAS SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (169, '08575', 'LPKIA SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (170, '08576', 'AMIK PERTIWI SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (171, '08577', 'ST. INTEN BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (172, '08578', 'STIE KERTANEGARA MALANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (173, '08579', 'TMC INTERNATIONAL SCHOOL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (174, '08580', 'UNIVERSITY OF CAMBRIDGE', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (175, '08582', 'UNIVERSITAS SUMATRA UTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (176, '08583', 'STIMIK IKMI - CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (177, '08584', 'UNIVERSITAS BINA NUSANTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (178, '08585', 'AKADEMI SEKRETARI DAN MANAJEMEN LEPISI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (179, '08586', 'STIE DEWANTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (180, '08587', 'UNIVERSITAS METHODIST INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (181, '08588', 'INSTITUT KEUANGAN PERBANAS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (182, '08589', 'SEKOLAH TINGGI ILMU EKONOMI IBS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (183, '08590', 'POLITEKNIK LP3I', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (184, '08591', 'UNIVERSITAS BINA DARMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (185, '08592', 'POLITEKNIK PAJAJARAN (ICB)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (186, '08594', 'STIKOM POLTEK CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (187, '08595', 'STIE STEMBI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (188, '08596', 'POLITEKNIK NEGERI MEDAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (189, '08597', 'STIE BPD JATENG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (190, '08599', 'SEKOLAH TINGGI ILMU EKONOMI INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (191, '08600', 'SEKOLAH TINGGI ILMU EKONOMI KESATUAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (192, '08601', 'STIE INDONESIA BANKING SCHOOL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (193, '08602', 'UNIVERSITAS MUHAMMADIYAH CIREBON (UMC)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (194, '08603', 'UNIVERSITAS ANDALAS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (195, '08604', 'UNIVERSITAS TARUMANEGARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (196, '08605', 'POLITEKNIK PIKSI GANESHA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (197, '08606', 'UNIVERSITAS ISLAM SUMATERA UTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (198, '08607', 'UNIVERSITAS SANATA DHARMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (199, '08608', 'SEKOLAH TINGGI ILMU EKONOMI YKPN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (200, '08609', 'UNIVERSITAS DR. SOETOMO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (201, '08610', 'UNIVERSITAS SERANG RAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (202, '08611', 'INSTITUT TEKNOLOGI TELKOM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (203, '08612', 'UNIVERSITAS JEMBER', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (204, '08613', 'UNIVERSITAS KATOLIK SOEGIJAPRANATA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (205, '08614', 'INSTITUT ILMU SOSIAL DAN ILMU POLTIK JKT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (206, '08615', 'UNIVERSITAS RIAU', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (207, '08616', 'UNIVERSITAS TIMBUL NUSANTARA (UTIRA)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (208, '08617', 'UNIVERSITAS PAMULANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (209, '08618', 'POLITEKNIK KOMPUTER NIAGA LPKIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (210, '08619', 'UNIVERSITAS ISLAM SULTAN AGUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (211, '08620', 'STIE PENGUJI SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (212, '08621', 'UNIVERSITY OF OREGON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (213, '08622', 'UNIVERSITAS TRIDINANTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (214, '08623', 'UNIVERSITY OF VIRGINIA COMMONWEALTH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (215, '08624', 'AKADEMI BANK INDONESIA, JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (216, '08625', 'STIE MANADO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (217, '08626', 'AMERICAN UNIVERSITY, LONDON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (218, '08627', 'UNIVERSITY OF EXETER, UK', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (219, '08628', 'UNIVERSITY OF PITTSBURGH, USA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (220, '08629', 'SEKOLAH TINGGI ILMU EKONOMI PELITABANGSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (221, '08630', 'ASIA PACIFIC INSTITUTE', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (222, '08631', 'STAFFORDSIRE UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (223, '08632', 'UNIVERSITAS MEDAN AREA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (224, '08633', 'SEKOLAH TINGGI ILMU EKONOMI BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (225, '08634', 'UNIV INFORMATIKA DAN BISNIS INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (226, '08635', 'IPPM-RI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (227, '08636', 'UNIVERSITAS JENDERAL ACHMAD YANI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (228, '08637', 'UNIVERSITAS ISLAM NEGERI SUNAN GUNUNG DJATI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (229, '08638', 'POLITEKNIK GANESHA BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (230, '08778', 'STMIK INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (231, '08640', 'GLOBALMEDIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (232, '08641', 'POLITEKNIK PERDANAMANDIRI PURWAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (233, '08642', 'STIE WIBAWA KARTA RAHARJA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (234, '08643', 'STIE YASA ANGGANA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (235, '08644', 'STIE PGRI SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (236, '08646', 'MERCU BUANA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (237, '08647', 'INSTITUT TEKNOLOGI SEPULUH NOPEMBER', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (238, '08648', 'POLITEKNIK TELKOM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (239, '08649', 'UNIVERSITAS NEGERI PADANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (240, '08650', 'STIE AHMAD DAHLAN (JAKARTA)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (241, '08651', 'UNIVERSITAS PEMBANGUNAN NASIONAL-YOGYAKRT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (242, '08652', 'UNIVERSITAS PEMBANGUNAN NASIONAL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (243, '08653', 'AKADEMI AKUNTANSI \"BENTARA INDONESIA\"', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (244, '08655', 'LEMBAGA PENDIDIKAN INTERSTUDI - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (245, '08656', 'SEKOLAH TINGGI ILMU EKONOMI - ISM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (246, '08657', 'UNIVERSITI MALAYSIA SARAWAK', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (247, '08658', 'STIEM BONGAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (248, '08659', 'UNIVERSITAS HKBP NOMMENSEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (249, '08660', 'UNIVERSITAS NEGERI YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (250, '08661', 'UNIVERSITAS AHMAD DAHLAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (251, '08662', 'UNIVERSITAS TANJUNGPURA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (252, '08663', 'AKADEMI AKUNTANSI NASIONAL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (253, '08664', 'UIN SYARIF HIDAYATULLAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (254, '08665', 'INSTITUT TEKNOLOGI ADHI TAMA SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (255, '08666', 'SEKOLAH TINGGI ILMU MANAJEMEN KOSGORO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (256, '08667', 'UNIVERSITAS MPU TANTULAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (257, '08668', 'IAIN SYEKH NURJATI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (258, '08669', 'SEKOLAH TINGGI MANAJEMEN TRANSPOR TRISAK', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (259, '08670', 'UNIVERSITAS SAINS AL-QURAN (UNSIQ)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (260, '08458', 'STKIP SILIWANGI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (261, '08459', 'UNIVERSITAS ASIA - AFRIKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (262, '08460', 'AKADEMI KEUANGAN & PERBANKAN (AIKP) JKT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (263, '08461', 'SEKOLAH TINGGI ILMU EKONOMI SWADAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (264, '08462', 'SEKOLAH TINGGI PERTANIAN JAWA BARAT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (265, '08463', 'UNIVERSITAS PANCASILA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (266, '08465', 'UNIVERSITAS BRAWIJAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (267, '08466', 'STIE LABORA - JKT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (268, '08467', 'STIE BISNIS INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (269, '08468', 'AKADEMI AKUNTANSI LEMB. BINA WIRASWASTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (270, '08469', 'UNIVERSITAS ARS INTERNATIONAL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (271, '08470', 'STAI AL- QUDWAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (272, '08471', 'AKADEMI BANK MERDEKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (273, '08472', 'UNIVERSITAS SUBANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (274, '08473', 'STH GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (275, '08474', 'STIE DHARMA NEGARA BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (276, '08475', 'UNIVERSITAS SURAPATI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (277, '08476', 'UNIVERSITAS 17 AGUSTUS 1945 CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (278, '08477', 'UNIVERSITAS TERBUKA - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (279, '08478', 'STIE \"IEU\" YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (280, '08479', 'STIE PERTIWI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (281, '08480', 'STIE DR.MOECHTAR TALIB', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (282, '08481', 'STIM BUDI BAKTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (283, '08483', 'STIE DWIPA WACANA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (284, '08484', 'UNIVERSITAS KRISNA DWIPAYANA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (285, '08486', 'PAA UNPAD BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (286, '08487', 'UNIVERSITAS PUTRA INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (287, '08488', 'AKD MANAJEMEN INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (288, '08489', 'STAI SYAMSUL ULUM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (289, '08490', 'INSTITUTE KOMPUTER ISLAM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (290, '08491', 'STIE PBM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (291, '08492', 'STIMA IMMI JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (292, '08493', 'UNTAG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (293, '08494', 'STIE YPPM-MAJALENGKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (294, '08495', 'STIE KALPATARU CIBINONG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (295, '08497', 'UNSAP', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (296, '08498', 'STIEGOTONG ROYONG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (297, '08499', 'STIE GEMA WIDIA BANGSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (298, '08500', 'STIMIK TULUS CENDIKIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (299, '08501', 'STIE CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (300, '08502', 'MUHAMADDIYAH INDONESIA (IMMI)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (301, '08503', 'UNIVERSITAS KUNINGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (302, '08504', 'STIE GOTONG ROYONG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (303, '08505', 'STAI YAPATA AL-JAWAMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (304, '08506', 'STIEBI-JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (305, '08507', 'STIE MUHAMMADIYAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (306, '08508', 'UNIVERSITAS NURTANIO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (307, '08509', 'STIA MENARASISWA BOGOR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (308, '08510', 'AKADEMI KEUANGAN PERBANKAN YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (309, '08511', 'UNIVERSITAS MERCU BUANA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (310, '08512', 'MAASTRICHT SCHOOL OF MANAGEMENT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (311, '08513', 'UNIVERSITAS AIRLANGGA - SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (312, '08514', 'UNIVERSITAS YAI - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (313, '08515', 'STT TEXMACO - SUBANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (314, '08516', 'STIE MUHAMMADIYAH - TANGERANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (315, '08517', 'AKADEMI YPKP - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (316, '08518', 'STIE INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (317, '08519', 'UNIVERSITAS MUSLIM ASIA AFRIKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (318, '08520', 'STIE PELITA BANGSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (319, '08521', 'STIE STAN INDONESIA MANDIRI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (320, '08522', 'STIA - KOSGORO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (321, '08523', 'STIA YAPPANN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (322, '08524', 'SEKOLAH TINGGI HUKUM PASUNDAN SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (323, '08525', 'OHIO STATE UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (324, '08526', 'OKLAHOMA UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (325, '08527', 'UNIVERSITY OF OSAKA PREFECTURE', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (326, '08528', 'UNIVERSITAS MUHAMMADIYAH - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (327, '08529', 'IHE DELFT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (328, '08531', 'AMIK - GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (329, '08532', 'UNIVERSITAS OF TULSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (330, '08533', 'BOSTON UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (331, '08534', 'UNIVERSITAS SRIWIJAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (332, '08535', 'INSTITUT TEKNOLOGI SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (333, '08536', 'STIE IPWIJA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (334, '08537', 'UNIVERSITAS MUHAMMADIYAH SURAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (335, '08538', 'UNIVERSITAS NEGERI SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (336, '08539', 'UNIVERSITAS KATOLIK PARAHYANGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (337, '08540', 'SEKOLAH TINGGI MANAJEMEN BISNIS TELKOM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (338, '08541', 'UNIVERSITAS BUDILUHUR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (339, '08542', 'POLITEKNIK NEGERI SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (340, '08543', 'UNIVERSITAS SANGGA BUANA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (341, '08544', 'UNIVERSITAS STIKUBANK SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (342, '08545', 'POLITEKNIK NEGERI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (343, '08546', 'UNIVERSITAS BINA INSAN NUSANTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (344, '08547', 'POLITEKNIK POS INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (345, '08548', 'STIE YAI - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (346, '08549', 'UNIKA SOEGIJAPRANATA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (347, '08550', 'UNIVERSITAS JANABADRA YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (348, '08671', 'UNIVERSITAS MATARAM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (349, '08672', 'UNIVERSITAS MUHAMMADIYAH SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (350, '08673', 'UNIVERSITAS ISLAM JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (351, '08674', 'UNIVERSITAS AL AZHAR INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (352, '08675', 'SEKOLAH TINGGI MANAJEMEN INDUSTRI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (353, '08676', 'POLITEKNIK MANUFAKTUR NEGERI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (354, '08677', 'STIER YAPARI - AKTRIPA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (355, '08355', 'UNIVERSITAS ISLAM INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (356, '08356', 'STMIK LIKMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (357, '08357', 'STEI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (358, '08358', 'UNIVERSITAS INDONUSA ESA UNGGUL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (359, '08359', 'UNIVERSITAS NEGERI JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (360, '08360', 'AKADEMI KEUANGAN & PERBANKAN MERDEKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (361, '08361', 'UNIVERSITAS NASIONAL - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (362, '08362', 'UNIVERSITAS 17 AGUSTUS 1945 SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (363, '08363', 'UNIVERSITAS GUNADARMA - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (364, '08364', 'UNIVERSITAS SAHID - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (365, '08365', 'ICM ASASI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (366, '08366', 'LPL ARIYANTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (367, '08367', 'INSTITUT TEKNOLOGI NASIONAL - BDG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (368, '08368', 'STBA YAPARI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (369, '08369', 'AKADEMI MANAJEMEN INDUSTRI&NIAGA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (370, '08370', 'STIE YASMI CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (371, '08371', 'UNIVERSITAS SULTAN AGENG TIRTAYASA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (372, '08372', 'UNIVERSITAS MATHLA`UL ANWAR - BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (373, '08373', 'LEMBAGA PEND.SEKRETARIS-AMIK', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (374, '08374', 'UNIVERSITAS PENDIDIKAN INDONESIA - BDG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (375, '08375', 'AKADEMI AKUNTANSI ERA 2020', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (376, '08376', 'STIE WIDYA JAYAKARTA JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (377, '08377', 'STIE BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (378, '08378', 'STIE DHARMA AGUNG BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (379, '08379', 'ST IMMI JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (380, '08380', 'SEKOLAH TINGGI HUKUM PURNAWARMAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (381, '08381', 'UNIVERSITAS GALUH - CIAMIS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (382, '08382', 'UNIVERSITAS GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (383, '08383', 'STIE  LA TANSHA MASHIRO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (384, '08384', 'AKADEMI AKUNTANSI YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (385, '08385', 'STIA YPPM MAJALENGKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (386, '08386', 'UNIVERSITAS WIDYA GAMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (387, '08387', 'STIA BAGASASI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (388, '08388', 'UNIVERSITAS SURYAKANCANA CIANJUR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (389, '08389', 'STEKPI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (390, '08390', 'STIE GANESHA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (391, '08391', 'AKADEMI AKUNTANSI YAI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (392, '08392', 'STIE MIFTAHUL HUDA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (393, '08393', 'STIA KUTAWARINGIN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (394, '08394', 'STIE SUTAATMADJA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (395, '08395', 'DATA COMPUTER INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (396, '08396', 'PIKSI SATYADHARMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (397, '08397', 'IKSMI TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (398, '08398', 'STISIP GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (399, '08399', 'STIA LAN RI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (400, '08400', 'AKADEMI ILMU KEUANGAN PASUNDAN TSK', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (401, '08401', 'POLITEKNIK AKUNTANSI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (402, '08402', 'STIA ANGKASA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (403, '08403', 'INSTITUT KESENIAN JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (404, '08404', 'AKADEMI KEUANGAN & PERBANKAN `BOROBUDUR`', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (405, '08405', 'AKADEMI KEUANGAN DAN PERBANKAN BOROBUDUR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (406, '08407', 'AKADEMI BANK JPKP', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (407, '08408', 'BANKING BUSINESS INSTITUTE', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (408, '08409', 'AKADEMI ADMINISTRASI NIAGA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (409, '08410', 'AKADEMI SENI TARI INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (410, '08411', 'STMIK LPKIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (411, '08412', 'ASM TARUNA BAKTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (412, '08413', 'NHI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (413, '08414', 'AKADEMI MARITIM INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (414, '08415', 'SEKOLAH TINGGI AKUNTANSI NEGARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (415, '08416', 'UNIVERSITAS GAJAH MADA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (416, '08417', 'UNIVERSITAS HASANUDDIN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (417, '08418', 'GOLDEN GATE UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (418, '08419', 'UNIVERSITAS INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (419, '08420', 'STT MANDALA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (420, '08422', 'AKADEMI KEUANGAN & PERBANKAN INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (421, '08423', 'AKADEMI KEUANGAN & PERBANKAN (AKUB)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (422, '08424', 'UNIVERSITAS PROF. DR. MOESTOPO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (423, '08425', 'AKUBANK YPKP', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (424, '08426', 'AKADEMI MANAJEMEN KESATUAN ( AMK)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (425, '08427', 'SEKOLAH TINGGI HUKUM GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (426, '08428', 'AKADEMI ILMU & TEK. KOMPUTER', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (427, '08429', 'AKADEMI AKUNTANSI YKPN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (428, '08430', 'LEMBAGA PENGEMBANGAN PERBANKAN INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (429, '08431', 'STIE WIDYAJAYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (430, '08432', 'STIE GANESA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (431, '08433', 'IPWI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (432, '08434', 'STIE SATYAGAMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (433, '08551', 'UPN VETERAN JATIM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (434, '08552', 'UNIVERSITAS UPN VETERAN JATIM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (435, '08553', 'UNIVERSITAS UDAYANA BALI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (436, '08554', 'UNIVERSITAS NEGERI SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (437, '08555', 'PHIN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (438, '08556', 'UNIVERSITAS BHAYANGKARA JAKARTA RAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (439, '08557', 'MASSEY UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (440, '08558', 'SEKOLAH TINGGI PARIWISATA BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (441, '08560', 'STIE BUDI PERTIWI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (442, '08561', 'UNIVERSITAS PERSADA INDONESIA Y.A.I', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (443, '08562', 'IAIN SUKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (444, '08563', 'STT BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (445, '08564', 'UNIVERSITAS MUHAMMADIYAH YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (446, '08565', 'POLITEKNIK NEGERI JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (447, '08566', 'UNIVERSITAS ATMAJAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (448, '08567', 'INSTITUT MANAJEMEN TELKOM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (449, '08568', 'INSTITUT BISNIS NUSANTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (450, '08569', 'UNIVERSITAS MAJALENGKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (451, '08570', 'STIE AKTRIPA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (452, '08689', 'STIE PASIM SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (453, '08723', 'SEKOLAH TINGGI DESAIN INTERSTUDI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (454, '08724', 'STT TELEMATIKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (455, '08725', 'UPN VETERAN YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (456, '08726', 'UNIVERSITAS MUHAMMADIYAH MALANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (457, '08729', 'DOWLING COLLEGE', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (458, '08730', 'STKIP GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (459, '08732', 'GEORGIA STATE UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (460, '08733', 'UNIVERSITAS SUMATERA UTARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (461, '08735', 'IBI DARMAJAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (462, '08737', 'POLMAN BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (463, '08738', 'STKIP BANJARMASIN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (464, '08748', 'POLITEKNIK KESEHATAN KEMENKES BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (465, '08756', 'STIKES MUHAMMADIYAH CIAMIS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (466, '08757', 'UNIVERSITAS KRISTEN INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (467, '08761', 'STIE NUSA BANGSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (468, '08765', 'PRESIDENT UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (469, '08774', 'UNIVERSITAS BUDI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (470, '08800', 'STMIK NUSA MANDIRI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (471, '08867', 'SDN CIPAMOKOLAN I BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (472, '08869', 'SMAN 7 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (473, '08871', 'SMPN 7 MAKASSAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (474, '08873', 'SDN MARGALUYU BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (475, '08874', 'SMPN 14 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (476, '08875', 'SDN PASIRKALIKI 96/IV BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (477, '08876', 'SMPN 1 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (478, '08877', 'SMAN 3 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (479, '08878', 'SDN CIWALEN II GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (480, '08879', 'SMPN 1 GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (481, '08277', 'UNIVERSITAS PADJADJARAN (UNPAD) BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (482, '08278', 'AKADEMI KEUANGAN PERBANKAN MUHAMMADIYAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (483, '08279', 'UNIVERSITAS BOROBUDUR - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (484, '08281', 'IAI LPKIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (485, '08282', 'UNIVERSITAS IBN KHALDUN - BOGOR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (486, '08283', 'IKIP', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (487, '08284', 'INSTITUT KOPERASI INDONESIA (IKOPIN) BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (488, '08285', 'INSTITUT PERTANIAN BOGOR (IPB)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (489, '08286', 'INSTITUT TEKNOLOGI BANDUNG (ITB)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (490, '08287', 'UNIVERSITAS JAYABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (491, '08288', 'UNIVERSITAS KERTANEGARA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (492, '08289', 'PAAP UNPAD - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (493, '08290', 'UNIVERSITAS PAKUAN - BOGOR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (494, '08291', 'PASCA SARJANA UNPAD - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (495, '08292', 'STIE PERBANAS - JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (496, '08293', 'UNIVERSITAS SILIWANGI TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (497, '08294', 'UNIVERSITAS SINGAPERBANGSA - KARAWANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (498, '08295', 'SEKOLAH TINGGI HUKUM BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (499, '08296', 'STIE 11 APRIL SUMEDANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (500, '08297', 'STIE GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (501, '08298', 'STIE INABA BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (502, '08299', 'STIE IPWI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (503, '08300', 'STIE KUNINGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (504, '08301', 'UNIVERSITAS NASIONAL PASIM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (505, '08302', 'STIE PASUNDAN BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (506, '08303', 'STIE TRI DHARMA WIDYA JKT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (507, '08304', 'STIE TRIDHARMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (508, '08305', 'STIE TRIGUNA BOGOR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (509, '08306', 'STIE YPKP BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (510, '08307', 'STIEB BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (511, '08308', 'STKS - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (512, '08309', 'STT TELKOM - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (513, '08435', 'JIMS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (514, '08436', 'UNIVERSITAS MUHAMMADIYAH HAMKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (515, '08437', 'UNIVERSITAS SATYA GAMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (516, '08438', 'UNIVERSITAS KRISNADWIPAYANA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (517, '08439', 'STIA MAULANA YUSUF BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (518, '08440', 'STH PASUNDAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (519, '08441', 'AKADEMI AKUNTANSI PASUNDAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (520, '08442', 'AKADEMI KEUANGAN & PERBANKAN (AIKP) BDG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (521, '08443', 'AKADEMI MILITER (TNI- AD)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (522, '08444', 'STIA TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (523, '08445', 'UNIVERSITAS KOMPUTER INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (524, '08446', 'UNIVERSITAS KRISTEN MARANATHA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (525, '08447', 'STT NASIONAL YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (526, '08448', 'SEKOLAH TINGGI MANAJEMEN BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (527, '08449', 'STIM BUNDA MULIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (528, '08450', 'UNIVERSITAS SYEKH YUSUF', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (529, '08451', 'AKADEMI BANK NASIONAL JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (530, '08452', 'AKADEMI YPKP', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (531, '08453', 'AKADEMI ACCOUNTING JAYABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (532, '08454', 'AKADEMI MANAJEMEN PERUSAHAAN YKPN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (533, '08455', 'AKADEMI MANAJEMEN INDONESIA YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (534, '08456', 'STIAMI (MANDALA INDONESIA)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (535, '08457', 'UNIVERSITAS 17 AGUSTUS 1945 JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (536, '08683', 'STMIK AMIKOM YOGYAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (537, '08749', 'STIBA - IEC', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (538, '08766', 'INSTITUT MANAJEMEN KOPERASI INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (539, '08784', 'SEKOLAH TINGGI ILMU EKONOMI TRISAKTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (540, '08796', 'STIMIK NUSA MANDIRI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (541, '08821', 'UNIVERSITAS ISLAM NEGERI SYARIF HIDAYATULLAH JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (542, '08842', 'STT WASTUKANCANA PURWAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (543, '08858', 'SMA PANCASILA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (544, '08882', 'SMPN 2 KUNINGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (545, '08883', 'SMAN 1 KUNINGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (546, '08884', 'SD TRIGUNA JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (547, '08887', 'SDN NILEM III BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (548, '08888', 'SMAN 8 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (549, '08890', 'SMPN 1 KUNINGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (550, '08891', 'SDN PABAKI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (551, '08892', 'SMPN 10 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (552, '08898', 'SMAN MARGAHAYU', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (553, '08899', 'SDN PAKUWON II', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (554, '08900', 'SMPN 1 SUMEDANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (555, '08901', 'SMAN 1 SUMEDANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (556, '08904', 'SMPN 1 TANGERANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (557, '08912', 'SDN BEKASI TIMUR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (558, '08913', 'SDN TILIL 1 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (559, '08914', 'SMPN 26 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (560, '08919', 'SMPN 1 BEKASI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (561, '08920', 'SMAN 1 BEKASI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (562, '08921', 'SDN KRESNA 1', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (563, '08922', 'SMPN 1 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (564, '08923', 'SMAN 4 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (565, '08924', 'SDN 80 PALEMBANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (566, '08925', 'SMPN 6 PALEMBANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (567, '08310', 'STTI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (568, '08311', 'UNIVERSITAS SWADAYA GUNUNG DJATI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (569, '08312', 'UNIVERSITAS TIRTAYASA - BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (570, '08313', 'UNIVERSITAS BANDUNG RAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (571, '08314', 'UNIVERSITAS DIPONEGORO - SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (572, '08315', 'UNIVERSITAS ISLAM NUSANTARA (UNINUS)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (573, '08316', 'UNIVERSITAS ISLAM BANDUNG (UNISBA)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (574, '08317', 'UNIVERSITAS DJUANDA - BOGOR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (575, '08318', 'UNIVERSITAS LAMPUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (576, '08319', 'UNIVERSITAS NUSA BANGSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (577, '08320', 'UNIVERSITAS TERBUKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (578, '08321', 'UNIVERSITAS WIRALODRA - INDRAMAYU', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (579, '08322', 'UNIVERSITAS PASUNDAN - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (580, '08323', 'UNIV. JEND A. YANI (UNJANI) - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (581, '08324', 'UNIVERSITAS LANGLANGBUANA - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (582, '08325', 'UNIVERSITAS PARAHYANGAN BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (583, '08326', 'UNIVERSITAS TERBUKA \"ARIYANTI\"', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (584, '08327', 'UNIVERSITAS KEBANGSAAN - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (585, '08328', 'STIE EKUITAS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (586, '08329', 'LPKIA BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (587, '08330', 'A2B - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (588, '08331', 'UNIVERSITAS WR. SUPRATMAN - SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (589, '08332', 'POLITEKNIK ITB - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (590, '08333', 'STIE PERBANAS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (591, '08334', 'ASMI JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (592, '08335', 'BINA SARANA INFORMATIKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (593, '08336', 'IAIN JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (594, '08337', 'DEV. THE DELFT - BELANDA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (595, '08338', 'UNIVERSITAS JEND. SOEDIRMAN - PURWOKERTO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (596, '08339', 'UNIVERSITAS WIDYATAMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (597, '08340', 'UNIVERSITAS WINAYA MUKTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (598, '08341', 'IAIN \"SUNAN GUNUNG DJATI\"- BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (599, '08342', 'WIDYALOKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (600, '08343', 'IKPI- CIANJUR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (601, '08344', 'LEMB. PEND. SEKRETARIS DAN MANAJEN BPI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (602, '08345', 'UNIVERSITAS ISLAM \"45\" - BEKASI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (603, '08346', 'AKPI - BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (604, '08347', 'SKLH TNGGI KEUANGAN & PERBANKAN SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (605, '08348', 'UPN \" VETERAN\" JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (606, '08349', 'STIE IMMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (607, '08350', 'UNIVERSITAS TRISAKTI -  JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (608, '08351', 'UNIVERSITAS SEBELAS MARET - SOLO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (609, '08352', 'UNIVERSITAS MUHAMMADIYAH - PALEMBANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (610, '08353', 'AKADEMI PIMPINAN PERUSAHAAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (611, '08354', 'ISTN CIKINI JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (612, '08926', 'SMAN 1 PALEMBANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (613, '08927', 'SDN CILENGKRANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (614, '08929', 'SMA PETANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (615, '08934', 'SMP KANISIUS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (616, '08935', 'SMA KANISIUS', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (617, '08936', 'STIMIK TRIGUNA UTAMA TANGERANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (618, '08940', 'AKADEMI PELAYARAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (619, '08941', 'SEKOLAH TINGGI AGAMA ISLAM CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (620, '08943', 'AKADEMI KEPERAWATAN RS. DUSTIRA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (621, '08944', 'AKADEMI FARMASI DAN SMK FARMASI BHUMI HUSADA JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (622, '00003', 'SLTP', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (623, '08685', 'POLITEKNIK TEDC BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (624, '08736', 'POLMAN ASTRA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (625, '08740', 'STIE BINA NIAGA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (626, '08760', 'STISIP SETIA BUDHI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (627, '08767', 'STIE STIKUBANK SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (628, '08779', 'UNIVERSITAS NEGERI MEDAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (629, '08802', 'STIE HARAPAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (630, '08835', 'AKADEMI KIMIA ANALISIS BOGOR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (631, '08850', 'POLITEKNIK SWADHARMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (632, '08860', 'SMP TRIYASA UJUNGBERUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (633, '08907', 'SMP MUHAMMADIAH III', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (634, '08915', 'SMAN 15 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (635, '08947', 'UNIVERSITAS BAKRIE', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (636, '08948', 'UNIVERSITAS TRUNOJOYO MADURA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (637, '08954', 'UNIVERSITAS BENGKULU', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (638, '08962', 'UNIVERSITAS KRISTEN PETRA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (639, '08980', 'AKADEMI PIMPINAN PERUSAHAAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (640, '09031', 'SEKOLAH TINGGI ILMU ADMINISTRASI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (641, '09032', 'PASCASARJANA UNIVERSITAS PENDIDIKAN NASIONAL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (642, '09033', 'UNIVERSITAS HINDU INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (643, '09034', 'UNIVERSITAS PENDIDIKAN GANESHA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (644, '00004', 'SLTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (645, '08707', 'UNIVERSITAS SATRIA MAKASSAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (646, '08742', 'STMIK PASIM BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (647, '08745', 'AKPER KEBONJATI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (648, '08792', 'STIKES BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (649, '08793', 'AMIK PURNAMA NIAGA INDRAMAYU', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (650, '08805', 'SEKOLAH TINGGI TEKNOLOGI INFORMATIKA SONYSUGEMA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (651, '08834', 'STIE DWIMULYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (652, '08846', 'SEKOLAH TINGGI MANAJEMEN TRANSPOR TRISAKTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (653, '08852', 'UNIVERSITAS TELKOM BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (654, '08949', 'UNIVERSITAS ISLAM RIAU', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (655, '08975', 'STIE INSAN PEMBANGUNAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (656, '08990', 'INSTITUT BISNIS DAN INFORMATIKA INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (657, '08686', 'AKAMIGAS BALONGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (658, '08687', 'STMIK JABAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (659, '08692', 'STMIK SUMEDANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (660, '08706', 'IAIN SULTAN MAULANA HASANUDDIN BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (661, '08715', 'TROY UNIVERSITY', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (662, '08750', 'STIKES JENDERAL ACHMAD YANI CIMAHI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (663, '08751', 'STIA BANTEN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (664, '08753', 'STAI YAMISA SOREANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (665, '08754', 'STMIK WIT CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (666, '08788', 'UNIVERSITAS 11 APRIL SUMEDANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (667, '08769', 'POLITEKNIK NEGERI SRIWIJAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (668, '08814', 'UNIVERSITAS MULAWARMAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (669, '08848', 'AKADEMI KOMUNIKASI BINA SARANA INFORMATIKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (670, '08849', 'AKADEMI PARIWISATA JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (671, '08885', 'SMPN 19 JAKARTA SELATAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (672, '08889', 'SDN V KUNINGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (673, '08905', 'SMAN MAJALENGKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (674, '08928', 'SMPN 1 SUMEDANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (675, '08910', 'SMPN 3', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (676, '08932', 'SMP PASUNDAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (677, '08933', 'SD PANGUDI LUHUR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (678, '08965', 'SEKOLAH TINGGI TEKNOLOGI CIREBON (STTC)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (679, '08678', 'SEKOLAH TINGGI ILMU EKONOMI GEMA WIDYA BANGSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (680, '08708', 'SEKOLAH TINGGI TEKNOLOGI ADISUTJIPTO', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (681, '08712', 'POLITEKNIK PRAKTISI BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (682, '08718', 'SEKOLAH TINGGI TEKNOLOGI TEKSTIL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (683, '08731', 'UNIVERSITY OF HERTFORDSHIRE', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (684, '08741', 'AMIK BSI TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (685, '08763', 'STKIP PGRI SUMATERA BARAT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (686, '08771', 'AMIK RAHARJA INFORMATIKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (687, '08785', 'STKIP SETIA BUDHI RANGKASBITUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (688, '08809', 'SDN PASIRKALIKI 96', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (689, '08822', 'INSTITUT KEGURUAN DAN ILMU PENDIDIKAN SARASWATI TABANAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (690, '08823', 'UNIVERSITAS MAHASARASWATI DENPASAR (UNMAS)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (691, '08838', 'UNIVERSITAS PARAMADINA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (692, '08840', 'STMIK CATUR INSAN CENDEKIA (CIC)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (693, '08841', 'STMIK PRANATA INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (694, '08851', 'STMIK GI MULTI DATA PALEMBANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (695, '08938', 'STMIK PASIM SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (696, '08939', 'STIE AL-KHAIRIYAH CILEGON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (697, '08959', 'CERAM SCHOOL OF MANAGEMENT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (698, '08977', 'INSTITUT BISNIS DAN INFORMATIKA KOSGORO 1957', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (699, '08978', 'STAI FATAHILLAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (700, '09007', 'UNIVERSITAS NAHDLATUL WATHAN MATARAM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (701, '00001', 'TK', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (702, '00002', 'SD', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (703, '08681', 'SEKOLAH TINGGI HUKUM GALUNGGUNG TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (704, '08684', 'STMIK BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (705, '08691', 'SEKOLAH TINGGI PENERBANGAN AVIASI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (706, '08727', 'STTIKOM INSAN UNGGUL', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (707, '08739', 'STEI TAZKIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (708, '08764', 'INSTITUT TEKNOLOGI INDONESIA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (709, '08812', 'STIE IBNU SINA KOTA BATAM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (710, '08827', 'STKIP PGRI SUKABUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (711, '08833', 'STIE AL KHAIRIYAH', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (712, '08872', 'SMAN 1 MAKASSAR', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (713, '08894', 'SDN 1 KOTA BUMI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (714, '08895', 'SMAN 2 CIREBON', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (715, '08897', 'SMP MUSLIMIN VII', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (716, '08916', 'SDN JAGABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (717, '08930', 'SDN SOKA II', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (718, '08966', 'UNIVERSITAS TAMA JAGAKARSA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (719, '08709', 'UNIVERSITAS PELITA HARAPAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (720, '08728', 'INSTITUT TEKNOLOGI BUDI UTOMO (ITBU)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (721, '08734', 'UNIVERSITAS JENDERAL SOEDIRMAN (UNSOED)', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (722, '08743', 'IKIP PGRI MADIUN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (723, '08744', 'ABFI INSTITUTE PERBANAS JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (724, '08746', 'STMIK SISINGAMANGARAJA XII', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (725, '08747', 'UNIVERSITAS MUHAMMADIYAH PROF.DR.HAMKA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (726, '08758', 'SEKOLAH TINGGI MANAJEMEN PRASETYA MULYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (727, '08759', 'STMIK STIKOM BALI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (728, '08762', 'UNIVERSITAS TRIDHARMA BALIKPAPAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (729, '08808', 'POLITEKNIK KESEHATAN KEMENKES SEMARANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (730, '08836', 'STIKES FALETEHAN SERANG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (731, '08853', 'SDN NEGERI PAJAJARAN 62 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (732, '08855', 'SMA PGII BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (733, '08857', 'SMPN 3 TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (734, '08861', 'SMAN 1 UJUNGBERUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (735, '08863', 'SMPN CISAYONG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (736, '08942', 'STISIP TASIKMALAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (737, '08951', 'STMIK JAKARTA STI&K', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (738, '08963', 'POLITEKNIK WINAYA KARYA BHAKTI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (739, '08983', 'STIE ISM', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (740, '08993', 'UNIVERSITAS AL-GHIFARI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (741, '08864', 'SD BPI', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (742, '08868', 'SMPN 2 BANDUNG', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (743, '08870', 'SDN PERAK BARAT IV SURABAYA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (744, '08880', 'SMEA GARUT', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (745, '08881', 'SDN 7 KUNINGAN', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (746, '08886', 'SMAN 70 BULUNGAN JAKARTA', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `mst_universitas` VALUES (747, '08893', 'SMA PASUNDAN 1', NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- ----------------------------
-- Table structure for org_identitas_perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `org_identitas_perusahaan`;
CREATE TABLE `org_identitas_perusahaan`  (
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kolom` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nilai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of org_identitas_perusahaan
-- ----------------------------
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTADOCNAME', 'Nama Dokumen Akta', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTADOCURL', 'URL Dokumen Akta', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTANO', 'Nomor Akta', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTANOTARIS', 'Notaris Akta', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTAPDOCNAME', 'Nama Dokumen Akta Perubahan', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTAPDOCURL', 'URL Dokumen Akta Perubahan', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTAPNO', 'Nomor Akta Perubahan', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTAPNOTARIS', 'Notaris Akta Perubahan', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTAPTGL', 'Tanggal Akta', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('AKTATGL', 'Tanggal Akta', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('ALAMAT', 'Alamat', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('EMAIL', 'Email', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('FAX', 'Fax', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('KABKOTA', 'Kabupaten / Kota', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('KODEPOS', 'Kode Pos', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('NAMA', 'Nama Perusahaan', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('NOPKP', 'No Pengukuhan PKP', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('PROVINSI', 'Provinsi', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('TELEPON', 'Telepon', NULL);
INSERT INTO `org_identitas_perusahaan` VALUES ('WEBSITE', 'Website', NULL);

-- ----------------------------
-- Table structure for org_izin_usaha
-- ----------------------------
DROP TABLE IF EXISTS `org_izin_usaha`;
CREATE TABLE `org_izin_usaha`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tglberlaku` date NOT NULL,
  `instansi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `klasifikasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kualifikasi` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `docurl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `docname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `docid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jenis`(`jenis`) USING BTREE,
  INDEX `klasifikasi`(`klasifikasi`) USING BTREE,
  INDEX `kualifikasi`(`kualifikasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of org_izin_usaha
-- ----------------------------
INSERT INTO `org_izin_usaha` VALUES (2, 'Jenis Izin 1', '1', '2018-02-28', 'Instansi', 'Klasifikasi', 'KIU01', 'upload/alfresco-temp/Bukalapak - Meja Laptop.pdf', 'Bukalapak - Meja Laptop.pdf', 'd7eb7d64-0756-39f7-881a-acb3f3e318f5', 1, '2018-02-05 02:21:06', 1, '2018-02-08 01:45:48', 0, NULL, NULL);

-- ----------------------------
-- Table structure for org_pajak
-- ----------------------------
DROP TABLE IF EXISTS `org_pajak`;
CREATE TABLE `org_pajak`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masa` int(11) NOT NULL,
  `nomorbukti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tglbukti` date NOT NULL,
  `docid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `docurl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `docname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `nomorbukti`(`nomorbukti`) USING BTREE,
  INDEX `masa`(`masa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for org_pemilik
-- ----------------------------
DROP TABLE IF EXISTS `org_pemilik`;
CREATE TABLE `org_pemilik`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `noktp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `saham` decimal(10, 0) NOT NULL,
  `satuan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `noktp`(`noktp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for org_pengurus
-- ----------------------------
DROP TABLE IF EXISTS `org_pengurus`;
CREATE TABLE `org_pengurus`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `noktp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tglmenjabatdari` date NOT NULL,
  `tglmenjabatsampai` date NULL DEFAULT NULL,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `noktp`(`noktp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for org_peralatan
-- ----------------------------
DROP TABLE IF EXISTS `org_peralatan`;
CREATE TABLE `org_peralatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kapasitas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `merktipe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` int(11) NULL DEFAULT NULL,
  `kondisi` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `statuskepemilikan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bukti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createuser` int(11) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `modifieduser` int(11) NULL DEFAULT NULL,
  `modifiedtime` datetime(0) NULL DEFAULT NULL,
  `isdeleted` int(11) NULL DEFAULT 0,
  `deleteduser` int(11) NULL DEFAULT NULL,
  `deletedtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tahun`(`tahun`) USING BTREE,
  INDEX `kondisi`(`kondisi`) USING BTREE,
  INDEX `statuskepemilikan`(`statuskepemilikan`) USING BTREE,
  INDEX `isdeleted`(`isdeleted`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sys_config
-- ----------------------------
DROP TABLE IF EXISTS `sys_config`;
CREATE TABLE `sys_config`  (
  `kode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `nilai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kode`) USING BTREE,
  UNIQUE INDEX `code`(`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sys_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `parentid` int(10) UNSIGNED NULL DEFAULT NULL,
  `treecode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `label` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ordernumber` int(255) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode`) USING BTREE,
  UNIQUE INDEX `treecode`(`treecode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES (1, '0001', NULL, '0001', 'Organization', NULL, 'institution', 1);
INSERT INTO `sys_menu` VALUES (3, '0002', 1, '0001.0002', 'Identitas Perusahaan', NULL, NULL, 1);
INSERT INTO `sys_menu` VALUES (4, '0003', 1, '0001.0003', 'Izin Usaha', '/org/izin-usaha/*', NULL, 2);

-- ----------------------------
-- Table structure for sys_notifikasi
-- ----------------------------
DROP TABLE IF EXISTS `sys_notifikasi`;
CREATE TABLE `sys_notifikasi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reftable` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `refid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `refurl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `konten` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isread` int(1) NULL DEFAULT 0,
  `targetid` int(10) UNSIGNED NULL DEFAULT NULL,
  `pembuatid` int(11) UNSIGNED NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  `readtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `targetid`(`targetid`) USING BTREE,
  INDEX `isread`(`isread`) USING BTREE,
  INDEX `createuser`(`pembuatid`) USING BTREE,
  INDEX `tipe`(`tipe`) USING BTREE,
  CONSTRAINT `sys_notifikasi_ibfk_1` FOREIGN KEY (`targetid`) REFERENCES `hcm_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sys_role
-- ----------------------------
DROP TABLE IF EXISTS `sys_role`;
CREATE TABLE `sys_role`  (
  `id` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `islinktounitkerja` int(11) NULL DEFAULT 0,
  `isbuiltin` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_role
-- ----------------------------
INSERT INTO `sys_role` VALUES ('admin', 'Administrator', 0, 1);
INSERT INTO `sys_role` VALUES ('direksi', 'Direksi', 0, 1);
INSERT INTO `sys_role` VALUES ('kadiv', 'Kepala Divisi', 1, 1);
INSERT INTO `sys_role` VALUES ('manager', 'Manajer', 1, 1);
INSERT INTO `sys_role` VALUES ('pegawai', 'Pegawai', 1, 1);
INSERT INTO `sys_role` VALUES ('sdm', 'Sumber Daya Manusia', 0, 1);

-- ----------------------------
-- Table structure for sys_rolemenu
-- ----------------------------
DROP TABLE IF EXISTS `sys_rolemenu`;
CREATE TABLE `sys_rolemenu`  (
  `roleid` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menuid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`roleid`) USING BTREE,
  INDEX `menuid`(`menuid`) USING BTREE,
  CONSTRAINT `sys_rolemenu_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `sys_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sys_rolemenu_ibfk_2` FOREIGN KEY (`menuid`) REFERENCES `sys_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sys_todo
-- ----------------------------
DROP TABLE IF EXISTS `sys_todo`;
CREATE TABLE `sys_todo`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipetarget` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `roleid` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `unitid` int(10) UNSIGNED NULL DEFAULT NULL,
  `targetid` int(10) UNSIGNED NULL DEFAULT NULL,
  `pembuatid` int(10) UNSIGNED NULL DEFAULT NULL,
  `reftable` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `refid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `refurl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `konten` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `completetime` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `roleid`(`roleid`) USING BTREE,
  INDEX `unitid`(`unitid`) USING BTREE,
  INDEX `targetid`(`targetid`) USING BTREE,
  INDEX `pembuatid`(`pembuatid`) USING BTREE,
  INDEX `tipetarget`(`tipetarget`) USING BTREE,
  INDEX `status`(`status`) USING BTREE,
  INDEX `reftable`(`reftable`) USING BTREE,
  CONSTRAINT `sys_todo_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `sys_role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sys_todo_ibfk_2` FOREIGN KEY (`unitid`) REFERENCES `mst_unit_kerja` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sys_todo_ibfk_3` FOREIGN KEY (`targetid`) REFERENCES `hcm_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `access_token` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `isactive` int(11) NULL DEFAULT 1,
  `islocked` int(11) NULL DEFAULT 0,
  `lastlogin` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `access_token`(`access_token`) USING BTREE,
  INDEX `auth_key`(`auth_key`) USING BTREE,
  INDEX `isactive`(`isactive`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES (1, 'admin', '$2y$13$9yfj/qqIHTni.4ja7zx69u7EcPbqnVh6Zmm4Ylq7JUYqQjSEPP9D.', 'kxhVn4ux_YY5YZx95pD9wEK3C6IqkFX1', 'lApfPWqtSVbp3skgSIAstFH_nZwcka4K', 1, 0, '2018-03-06 09:19:09');

-- ----------------------------
-- Table structure for sys_userrole
-- ----------------------------
DROP TABLE IF EXISTS `sys_userrole`;
CREATE TABLE `sys_userrole`  (
  `userid` int(10) UNSIGNED NOT NULL,
  `roleid` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unitkerjaid` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE,
  INDEX `roleid`(`roleid`) USING BTREE,
  INDEX `unitkerjaid`(`unitkerjaid`) USING BTREE,
  CONSTRAINT `sys_userrole_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `sys_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sys_userrole_ibfk_2` FOREIGN KEY (`roleid`) REFERENCES `sys_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sys_userrole_ibfk_3` FOREIGN KEY (`unitkerjaid`) REFERENCES `mst_unit_kerja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
