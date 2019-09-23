/*
 Navicat Premium Data Transfer

 Source Server         : 蓝卡线上
 Source Server Type    : MySQL
 Source Server Version : 50616
 Source Host           : rm-2zeo1o8454uv23zjb.mysql.rds.aliyuncs.com:3306
 Source Schema         : swofttext

 Target Server Type    : MySQL
 Target Server Version : 50616
 File Encoding         : 65001

 Date: 23/09/2019 20:10:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `nike` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '昵称',
  `username` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '账号',
  `password` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `level` tinyint(1) NOT NULL COMMENT '等级',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  `dtime` timestamp(0) NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE COMMENT '账号唯一索引'
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '小张', 'xiaozhang', '92eb5ffee6ae2fec3ad71c777531578f', 0, '2019-09-16 10:09:54', '0000-00-00 00:00:00', NULL);

SET FOREIGN_KEY_CHECKS = 1;
