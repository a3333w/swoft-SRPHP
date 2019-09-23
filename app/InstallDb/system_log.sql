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

 Date: 23/09/2019 20:10:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for system_log
-- ----------------------------
DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` smallint(6) NOT NULL COMMENT '操作员id',
  `uname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作员名称',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单标题',
  `module` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块',
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '发生动作的url',
  `param` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '参数 {\"group\":\"base\"}',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '基础操作' COMMENT '发生动作',
  `count` smallint(6) NOT NULL DEFAULT 1 COMMENT '动作计数',
  `ip` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '发生时的ip',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `dtime` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员操作日志表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of system_log
-- ----------------------------
INSERT INTO `system_log` VALUES (19, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 248, '123.118.158.43', '2019-09-19 17:47:06', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (20, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 276, '123.118.158.43', '2019-09-19 17:47:18', '2019-09-20 18:58:12', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (21, 1, '星河长明', '权限分配时获得菜单', 'system', 'system/menu/getmenutreerole', '[]', '基础操作', 2, '123.118.158.43', '2019-09-19 17:55:13', '2019-09-19 17:55:13', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (22, 1, '星河长明', '获得单条信息', 'system', 'system/menu/getmenu', '[\"1\"]', '基础操作', 3, '123.118.158.43', '2019-09-19 18:04:08', '2019-09-20 18:24:56', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (23, 1, '星河长明', '获得单条信息', 'system', 'system/menu/getmenu', '[\"19\"]', '基础操作', 2, '123.118.158.43', '2019-09-19 18:04:10', '2019-09-19 18:04:10', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (24, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"goods\"]', '基础操作', 3, '123.118.158.43', '2019-09-19 18:06:53', '2019-09-20 17:32:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (25, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"]]', '基础操作', 2, '123.118.158.43', '2019-09-19 18:07:03', '2019-09-19 18:07:03', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (26, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 181, '123.118.158.43', '2019-09-20 09:09:22', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (27, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 181, '123.118.158.43', '2019-09-20 09:09:22', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (28, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 233, '123.118.158.43', '2019-09-20 09:09:22', '2019-09-20 18:58:12', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (29, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 233, '123.118.158.43', '2019-09-20 09:09:23', '2019-09-20 18:58:12', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (30, 1, '星河长明', '权限分配时获得菜单', 'system', 'system/menu/getmenutreerole', '[]', '基础操作', 1, '123.118.158.43', '2019-09-20 09:09:49', '2019-09-20 09:09:49', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (31, 1, '星河长明', '权限分配时获得菜单', 'system', 'system/menu/getmenutreerole', '[]', '基础操作', 1, '123.118.158.43', '2019-09-20 09:09:49', '2019-09-20 09:09:49', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (32, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 181, '123.118.158.43', '2019-09-20 09:29:48', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (33, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 181, '123.118.158.43', '2019-09-20 09:29:48', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (34, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 233, '123.118.158.43', '2019-09-20 09:29:48', '2019-09-20 18:58:12', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (35, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 233, '123.118.158.43', '2019-09-20 09:29:48', '2019-09-20 18:58:12', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (36, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 181, '123.118.158.43', '2019-09-20 09:58:32', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (37, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 181, '123.118.158.43', '2019-09-20 09:58:32', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (38, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"goods\"]', '基础操作', 2, '123.118.158.43', '2019-09-20 17:32:53', '2019-09-20 17:32:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (39, 1, '星河长明', '获得单条信息', 'system', 'system/menu/getmenu', '[\"1\"]', '基础操作', 2, '123.118.158.43', '2019-09-20 18:24:56', '2019-09-20 18:24:56', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (40, 1, '星河长明', '获得单条信息', 'system', 'system/menu/getmenu', '[\"2\"]', '基础操作', 2, '123.118.158.43', '2019-09-20 18:25:01', '2019-09-20 18:25:01', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (41, 1, '星河长明', '获得系统信息', 'system', 'system/information/getsysteminformation', '[]', '基础操作', 34, '123.118.158.43', '2019-09-20 18:42:00', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (42, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"10\",\"1\"]', '基础操作', 32, '123.118.158.43', '2019-09-20 18:42:05', '2019-09-20 18:49:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (43, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"3\",\"10\"]', '基础操作', 18, '123.118.158.43', '2019-09-20 18:42:07', '2019-09-20 18:45:50', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (44, 1, '星河长明', '获得所有模块', 'system', 'system/module/getmoduleconfig', '[]', '基础操作', 2, '123.118.158.43', '2019-09-20 18:42:18', '2019-09-20 18:42:18', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (45, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"2\",\"10\"]', '基础操作', 10, '123.118.158.43', '2019-09-20 18:42:55', '2019-09-20 18:46:35', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (46, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"1\",\"10\"]', '基础操作', 10, '123.118.158.43', '2019-09-20 18:45:39', '2019-09-20 18:46:35', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (47, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[\"1\",\"10\"]', '基础操作', 30, '123.118.158.43', '2019-09-20 18:50:30', '2019-09-20 19:01:09', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (48, 1, '星河长明', '获得系统信息', 'system', 'system/information/getsysteminformation', '[]', '基础操作', 34, '1.203.146.88', '2019-09-21 01:24:12', '2019-09-22 01:00:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (49, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 32, '1.203.146.88', '2019-09-21 01:24:12', '2019-09-22 01:00:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (50, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 254, '1.203.146.88', '2019-09-21 01:24:28', '2019-09-22 02:20:13', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (51, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[\"1\",\"10\"]', '基础操作', 286, '1.203.146.88', '2019-09-21 01:24:28', '2019-09-22 01:01:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (52, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[\"system\"]', '基础操作', 4, '1.203.146.88', '2019-09-21 01:55:46', '2019-09-21 01:55:54', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (53, 1, '星河长明', '获得系统信息', 'system', 'system/information/getsysteminformation', '[]', '基础操作', 5, '1.203.146.88', '2019-09-21 09:47:47', '2019-09-22 01:00:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (54, 1, '星河长明', '获得系统信息', 'system', 'system/information/getsysteminformation', '[]', '基础操作', 5, '1.203.146.88', '2019-09-21 09:47:47', '2019-09-22 01:00:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (55, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 5, '1.203.146.88', '2019-09-21 09:47:47', '2019-09-22 01:00:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (56, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 5, '1.203.146.88', '2019-09-21 09:47:47', '2019-09-22 01:00:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (57, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 61, '1.203.146.88', '2019-09-21 09:47:47', '2019-09-22 02:20:13', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (58, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 61, '1.203.146.88', '2019-09-21 09:47:47', '2019-09-22 02:20:13', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (59, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[\"1\",\"10\"]', '基础操作', 35, '1.203.146.88', '2019-09-21 09:47:47', '2019-09-22 01:01:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (60, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[\"1\",\"10\"]', '基础操作', 35, '1.203.146.88', '2019-09-21 09:47:47', '2019-09-22 01:01:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (61, 1, '星河长明', '获得模块列表', 'system', 'system/module/getlist', '[\"10\",\"1\"]', '基础操作', 3, '1.203.146.88', '2019-09-21 09:47:50', '2019-09-22 00:42:33', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (62, 1, '星河长明', '获得模块列表', 'system', 'system/module/getlist', '[\"10\",\"1\"]', '基础操作', 3, '1.203.146.88', '2019-09-21 09:47:50', '2019-09-22 00:42:33', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (63, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[\"1\",\"10\"]', '基础操作', 35, '1.203.146.88', '2019-09-21 09:48:34', '2019-09-22 01:01:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (64, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 61, '1.203.146.88', '2019-09-21 09:48:34', '2019-09-22 02:20:13', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (65, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[\"1\",\"10\"]', '基础操作', 35, '1.203.146.88', '2019-09-21 09:48:34', '2019-09-22 01:01:53', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (66, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 61, '1.203.146.88', '2019-09-21 09:48:34', '2019-09-22 02:20:13', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (67, 1, '星河长明', '管理员列表获取', 'system', 'system/administrators/getlist', '[\"10\",\"1\"]', '基础操作', 2, '1.203.146.88', '2019-09-22 00:42:35', '2019-09-22 00:42:35', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (68, 1, '星河长明', '获取角色列表', 'system', 'system/role/getlist', '[\"10\",\"1\"]', '基础操作', 2, '1.203.146.88', '2019-09-22 00:42:42', '2019-09-22 00:42:42', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (69, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"10\",\"1\"]', '基础操作', 2, '1.203.146.88', '2019-09-22 00:42:52', '2019-09-22 00:42:52', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (70, 1, '星河长明', '获得配置分组', 'system', 'system/config/getconfigtitle', '[]', '基础操作', 2, '1.203.146.88', '2019-09-22 01:00:57', '2019-09-22 01:00:57', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (71, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[]', '基础操作', 2, '1.203.146.88', '2019-09-22 01:00:57', '2019-09-22 01:00:57', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (72, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\"]', '基础操作', 2, '1.203.146.88', '2019-09-22 01:00:57', '2019-09-22 01:00:57', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (73, 1, '星河长明', '获得单条信息', 'system', 'system/menu/getmenu', '[\"1\"]', '基础操作', 2, '1.203.146.88', '2019-09-22 01:57:03', '2019-09-22 01:57:03', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (74, 1, '星河长明', '获得所有模块', 'system', 'system/module/getmoduleconfig', '[]', '基础操作', 6, '1.203.146.88', '2019-09-22 01:57:03', '2019-09-22 01:57:36', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (75, 1, '星河长明', '获得单条信息', 'system', 'system/menu/getmenu', '[\"56\"]', '基础操作', 2, '1.203.146.88', '2019-09-22 01:57:36', '2019-09-22 01:57:36', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (76, 1, '星河长明', '获得系统信息', 'system', 'system/information/getsysteminformation', '[]', '基础操作', 12, '123.123.141.102', '2019-09-23 15:06:44', '2019-09-23 18:04:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (77, 1, '星河长明', '获得账户角色权限的首页菜单', 'system', 'system/menu/getauthmenu', '[[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"36\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"58\",\"59\"],\"system\"]', '基础操作', 12, '123.123.141.102', '2019-09-23 15:06:44', '2019-09-23 18:04:03', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (78, 1, '星河长明', '获得菜单树', 'system', 'system/menu/getmenutree', '[]', '基础操作', 12, '123.123.141.102', '2019-09-23 15:06:44', '2019-09-23 18:04:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (79, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"10\",\"1\"]', '基础操作', 12, '123.123.141.102', '2019-09-23 15:06:44', '2019-09-23 18:04:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (80, 1, '星河长明', '获得配置分组', 'system', 'system/config/getconfigtitle', '[]', '基础操作', 54, '123.123.141.102', '2019-09-23 15:06:50', '2019-09-23 18:04:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (81, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"system\"]', '基础操作', 12, '123.123.141.102', '2019-09-23 15:06:50', '2019-09-23 18:04:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (82, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[]', '基础操作', 12, '123.123.141.102', '2019-09-23 15:06:56', '2019-09-23 18:04:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (83, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\"]', '基础操作', 12, '123.123.141.102', '2019-09-23 15:06:56', '2019-09-23 18:04:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (84, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[\"base\"]', '基础操作', 6, '123.123.141.102', '2019-09-23 15:07:54', '2019-09-23 15:08:06', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (85, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\",\"base\"]', '基础操作', 6, '123.123.141.102', '2019-09-23 15:07:55', '2019-09-23 15:08:06', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (86, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[\"system\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 15:07:55', '2019-09-23 15:07:55', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (87, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\",\"system\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 15:07:55', '2019-09-23 15:07:55', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (88, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[\"upload\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 15:07:55', '2019-09-23 15:07:55', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (89, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\",\"upload\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 15:07:55', '2019-09-23 15:07:55', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (90, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[\"databases\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 15:07:56', '2019-09-23 15:07:56', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (91, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\",\"databases\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 15:07:56', '2019-09-23 15:07:56', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (92, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[\"user\"]', '基础操作', 4, '123.123.141.102', '2019-09-23 15:07:57', '2019-09-23 15:08:05', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (93, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\",\"user\"]', '基础操作', 4, '123.123.141.102', '2019-09-23 15:07:57', '2019-09-23 15:08:05', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (94, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[\"pay\"]', '基础操作', 4, '123.123.141.102', '2019-09-23 15:07:58', '2019-09-23 15:08:05', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (95, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\",\"pay\"]', '基础操作', 4, '123.123.141.102', '2019-09-23 15:07:59', '2019-09-23 15:08:05', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (96, 1, '星河长明', '获取配置总条数', 'system', 'system/config/getconfigcount', '[\"order\"]', '基础操作', 6, '123.123.141.102', '2019-09-23 15:07:59', '2019-09-23 15:08:07', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (97, 1, '星河长明', '获得配置列表', 'system', 'system/config/getlist', '[\"1\",\"10\",\"order\"]', '基础操作', 6, '123.123.141.102', '2019-09-23 15:07:59', '2019-09-23 15:08:07', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (98, 1, '星河长明', '获得单个配置', 'system', 'system/config/editfindconfig', '[\"15\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 15:08:08', '2019-09-23 15:08:08', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (99, 1, '星河长明', '获取角色列表', 'system', 'system/role/getlist', '[\"10\",\"1\"]', '基础操作', 6, '123.123.141.102', '2019-09-23 15:45:06', '2019-09-23 17:27:57', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (100, 1, '星河长明', '管理员列表获取', 'system', 'system/administrators/getlist', '[\"10\",\"1\"]', '基础操作', 6, '123.123.141.102', '2019-09-23 15:45:06', '2019-09-23 17:27:56', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (101, 1, '星河长明', '获得模块列表', 'system', 'system/module/getlist', '[\"10\",\"1\"]', '基础操作', 10, '123.123.141.102', '2019-09-23 15:45:06', '2019-09-23 18:04:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (102, 1, '星河长明', '获得单个信息', 'system', 'system/administrators/editfindadministrators', '[\"1\"]', '基础操作', 4, '123.123.141.102', '2019-09-23 16:50:53', '2019-09-23 16:53:58', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (103, 1, '星河长明', '获得单条信息', 'system', 'system/module/editfindmodule', '[\"1\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 16:51:01', '2019-09-23 16:51:01', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (104, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"9\",\"10\"]', '基础操作', 4, '123.123.141.102', '2019-09-23 16:52:58', '2019-09-23 16:53:09', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (105, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"8\",\"10\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 16:53:00', '2019-09-23 16:53:00', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (106, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"7\",\"10\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 16:53:01', '2019-09-23 16:53:01', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (107, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"6\",\"10\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 16:53:02', '2019-09-23 16:53:02', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (108, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"5\",\"10\"]', '基础操作', 4, '123.123.141.102', '2019-09-23 16:53:02', '2019-09-23 16:53:07', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (109, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"4\",\"10\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 16:53:03', '2019-09-23 16:53:03', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (110, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"3\",\"10\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 16:53:04', '2019-09-23 16:53:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (111, 1, '星河长明', '获得日志列表', 'system', 'system/log/getlist', '[\"2\",\"10\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 16:53:04', '2019-09-23 16:53:04', '0000-00-00 00:00:00');
INSERT INTO `system_log` VALUES (112, 1, '星河长明', '获取单条角色', 'system', 'system/role/editfindrole', '[\"1\"]', '基础操作', 2, '123.123.141.102', '2019-09-23 16:53:52', '2019-09-23 16:53:52', '0000-00-00 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
