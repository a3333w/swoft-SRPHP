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

 Date: 23/09/2019 20:09:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for system_config
-- ----------------------------
DROP TABLE IF EXISTS `system_config`;
CREATE TABLE `system_config`  (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `system` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否系统配置 1是 0不是',
  `group` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'base' COMMENT '配置分组',
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置标题',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置名称',
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置值',
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置类型（文件、图片、表单、多选）',
  `options` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置项目（表单：7:左下角1:左上角4:左居中）',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文件上传接口',
  `tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置提示',
  `sort` mediumint(4) NOT NULL DEFAULT 50 COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  `dtime` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `title`(`title`) USING BTREE COMMENT '标题唯一',
  UNIQUE INDEX `name`(`name`) USING BTREE COMMENT '标识唯一'
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '【系统】配置表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of system_config
-- ----------------------------
INSERT INTO `system_config` VALUES (1, 1, 'base', '网站名称', 'website_name', '蓝卡管理', 'input', '', '', '', 1, 1, '2019-09-04 15:30:47', '2019-09-05 15:04:53', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (2, 1, 'base', '网站域名', 'website_address', 'http://swoft.lkvip.com', 'input', '', '', '', 1, 1, '2019-09-04 17:39:34', '2019-09-05 11:55:18', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (3, 1, 'base', '网站标题', 'website_title', '蓝卡新系统', 'input', '', '', '', 1, 1, '2019-09-04 17:43:41', '2019-09-05 11:56:01', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (4, 1, 'base', '网站状态', 'website_status', '1', 'select', '1-打开\r\n2-关闭', '', '', 1, 1, '2019-09-04 19:10:42', '2019-09-05 11:58:14', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (5, 1, 'base', '网站描述', 'website_describe', '蓝卡新系统架构', 'input', '', '', '', 1, 1, '2019-09-05 11:59:53', '2019-09-05 13:08:31', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (6, 1, 'system', '后台管理路径', 'admin_path', 'admin/index.html', 'input', '', '', '', 1, 1, '2019-09-05 13:11:56', '2019-09-05 13:16:00', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (7, 1, 'system', '扩展配置分组', 'config_group', '用户-user\n支付-pay', 'textarea', '', '', '格式：\r\n用户-user\r\n其他-other\r\n(注意换行)', 1, 1, '2019-09-05 13:53:01', '2019-09-05 14:51:43', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (8, 1, 'system', '系统日志保留', 'system_log_retention', '30', 'input', '', '', '系统日志保留多少天', 1, 1, '2019-09-05 14:58:45', '2019-09-05 15:36:03', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (9, 1, 'upload', '文件上传大小限制', 'upload_driver', '0', 'input', '', '', '单位：kb 0不限制', 1, 1, '2019-09-05 15:39:39', '2019-09-05 18:06:35', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (10, 1, 'upload', '允许文件上传格式', 'upload_file_ext', 'doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,rar,zip', 'input', '', '', '英文逗号(,)分割', 1, 1, '2019-09-05 15:41:03', '2019-09-05 15:49:49', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (11, 1, 'upload', '图片上传大小限制', 'upload_image_size', '0', 'input', '', '', '单位：kb 0不限制', 1, 1, '2019-09-05 15:41:45', '2019-09-05 15:49:49', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (12, 1, 'upload', '允许图片上传格式', 'upload_image_ext', 'jpg,png,gif,jpeg,ico', 'input', '', '', '英文逗号(,)分割', 1, 1, '2019-09-05 15:43:23', '2019-09-05 15:49:49', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (13, 1, 'databases', '备份目录', 'backup_path', './backup/database/', 'input', '', '', '数据库备份目录。以/结束', 1, 1, '2019-09-05 15:44:32', '2019-09-05 15:51:02', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (14, 1, 'databases', '20971520', 'part_size', '20971520', 'input', '', '', '数据库分卷大小，以B 为单位。建议20M', 1, 1, '2019-09-05 15:45:42', '2019-09-05 15:51:02', '0000-00-00 00:00:00');
INSERT INTO `system_config` VALUES (15, 0, 'order', '订单可用类型', 'order-type', '', 'select', '1-积分订单\n2-礼包订单\n3-微信订单', '', '用于订单分类', 1, 1, '2019-09-17 15:33:21', '2019-09-18 16:19:59', '0000-00-00 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
