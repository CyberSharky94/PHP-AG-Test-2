/*

 Source Server         : laragon-localhost
 Source Server Type    : MySQL
 Source Server Version : 100313 (MariaDB)
 Source Host           : localhost:3306
 Source Schema         : ag_test_2

 Target Server Type    : MySQL
 Target Server Version : 100313 (MariaDB)
 File Encoding         : 65001

 Date: 04/08/2019 09:25:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for selected_states
-- ----------------------------
DROP TABLE IF EXISTS `selected_states`;
CREATE TABLE `selected_states`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_state` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `selected_state_fk`(`id_state`) USING BTREE,
  CONSTRAINT `selected_state_fk` FOREIGN KEY (`id_state`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for states
-- ----------------------------
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of states
-- ----------------------------
INSERT INTO `states` VALUES (1, 'Perak');
INSERT INTO `states` VALUES (2, 'Melaka');
INSERT INTO `states` VALUES (3, 'Selangor');
INSERT INTO `states` VALUES (4, 'Johor');
INSERT INTO `states` VALUES (5, 'Pahang');
INSERT INTO `states` VALUES (6, 'Kelantan');
INSERT INTO `states` VALUES (7, 'Pulau Pinang');
INSERT INTO `states` VALUES (8, 'Sabah');
INSERT INTO `states` VALUES (9, 'Serawak');

SET FOREIGN_KEY_CHECKS = 1;
