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

 Date: 23/09/2019 20:10:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for system_menu_lang
-- ----------------------------
DROP TABLE IF EXISTS `system_menu_lang`;
CREATE TABLE `system_menu_lang`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `menu_id` smallint(6) NOT NULL COMMENT '菜单表id',
  `title` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `lang` tinyint(3) NULL DEFAULT NULL COMMENT '语言包',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '【系统】菜单语言包配置表' ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
