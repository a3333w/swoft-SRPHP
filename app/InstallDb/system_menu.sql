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

 Date: 23/09/2019 20:10:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for system_menu
-- ----------------------------
DROP TABLE IF EXISTS `system_menu`;
CREATE TABLE `system_menu`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` mediumint(9) NOT NULL COMMENT '管理员id 快捷菜单专用',
  `pid` smallint(6) NOT NULL COMMENT '父菜单id',
  `module` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块名称',
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单标题',
  `level` tinyint(1) NOT NULL DEFAULT 1 COMMENT '菜单级别',
  `icon` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单图标',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '方法路由(模块/控制器/方法)',
  `hraf` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单连接 仅用于2级菜单的页面跳转',
  `param` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '扩展参数',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '排序',
  `nav` tinyint(1) NOT NULL DEFAULT 1 COMMENT '菜单是否显示 1是 0否',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态 1显示 0 不显示',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  `dtime` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `url`(`url`) USING BTREE COMMENT '路由唯一',
  INDEX `titleurlhraf`(`title`, `url`) USING BTREE COMMENT '标题路由普通索引'
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '【系统】菜单表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of system_menu
-- ----------------------------
INSERT INTO `system_menu` VALUES (1, 0, 0, 'system', '系统基础', 1, '', 'system', '', '', 50, 1, 1, '2019-09-12 14:53:04', '2019-09-19 15:54:30', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (2, 0, 1, 'system', '系统设置', 2, '', 'system/system', 'system.html?group=system', '', 50, 1, 1, '2019-09-12 14:53:35', '2019-09-16 09:46:36', '2019-09-12 07:09:49');
INSERT INTO `system_menu` VALUES (3, 0, 1, 'system', '配置管理', 2, '', 'system/config', 'config-list.html', '', 50, 1, 1, '2019-09-12 15:49:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (4, 0, 1, 'system', '系统菜单', 2, '', 'system/menu', 'menu-list.html', '', 50, 1, 1, '2019-09-12 15:50:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (5, 0, 0, 'system', '管理员管理', 1, '', 'system/administrators', '', '', 50, 1, 1, '2019-09-12 15:52:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (6, 0, 5, 'system', '角色管理', 2, '', 'system/role', 'admin-role.html', '', 50, 1, 1, '2019-09-12 15:53:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (7, 0, 5, 'system', '管理员列表', 2, '', 'system/administratorslist', 'admin-list.html', '', 50, 1, 1, '2019-09-12 15:54:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (8, 0, 0, 'system', '系统扩展', 1, '', 'system/extend', '', '', 50, 1, 1, '2019-09-12 15:55:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (9, 0, 8, 'system', '本地模块', 2, '', 'system/module', 'module-list.html', '', 50, 1, 1, '2019-09-12 15:55:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (10, 0, 0, 'system', '图标字体', 1, '', 'icon/word', '', '', 50, 1, 1, '2019-09-12 15:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (11, 0, 10, 'system', '图标对应字体', 2, '', 'icon/wordicon', 'unicode.html', '', 50, 1, 1, '2019-09-12 16:00:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (12, 0, 0, 'system', '订单管理', 1, '', 'order/list', '', '', 50, 1, 1, '2019-09-17 15:25:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (13, 0, 12, 'order', '订单列表', 2, '', 'order/list/list', 'order-list-test.html', '', 50, 1, 1, '2019-09-17 15:26:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (14, 0, 0, 'goods', '商品管理', 1, '', 'goods', '', '', 50, 1, 1, '2019-09-17 15:57:08', '2019-09-17 18:29:25', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (16, 0, 14, 'goods', '商品列表', 2, '', 'goods/list', '', '', 50, 1, 1, '2019-09-17 15:58:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (17, 0, 2, 'system', '获得系统信息', 3, '', 'system/information/getsysteminformation', '', '', 50, 1, 1, '2019-09-18 16:10:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (18, 0, 3, 'system', '添加配置', 3, '', 'system/config/create', '', '', 50, 1, 1, '2019-09-18 16:11:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (19, 0, 3, 'system', '获得配置分组', 3, '', 'system/config/getconfigtitle', '', '', 50, 1, 1, '2019-09-18 16:12:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (20, 0, 3, 'system', '写入配置分组', 3, '', 'system/config/writeconfigtitle', '', '', 50, 1, 1, '2019-09-18 16:12:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (21, 0, 3, 'system', '获取分组配置', 3, '', 'system/config/getconfiglist', '', '', 50, 1, 1, '2019-09-18 16:15:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (22, 0, 3, 'system', '获取配置总条数', 3, '', 'system/config/getconfigcount', '', '', 50, 1, 1, '2019-09-18 16:16:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (23, 0, 2, 'system', '获得配置列表', 3, '', 'system/config/getlist', '', '', 50, 1, 1, '2019-09-18 16:17:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (24, 0, 3, 'system', '获得单个配置', 3, '', 'system/config/editfindconfig', '', '', 50, 1, 1, '2019-09-18 16:24:03', '2019-09-18 16:25:06', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (25, 0, 3, 'system', '编辑单个配置', 3, '', 'system/config/editconfig', '', '', 50, 1, 1, '2019-09-18 16:24:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (26, 0, 3, 'system', '删除单个配置', 3, '', 'system/config/deleteconfig', '', '', 50, 1, 1, '2019-09-18 16:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (27, 0, 2, 'system', '系统配置修改', 3, '', 'system/config/systemconfigedit', '', '', 50, 1, 1, '2019-09-18 16:26:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (28, 0, 6, 'system', '添加角色', 3, '', 'system/role/createrole', '', '', 50, 1, 1, '2019-09-18 16:27:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (29, 0, 6, 'system', '获取角色列表', 3, '', 'system/role/getlist', '', '', 50, 1, 1, '2019-09-18 16:28:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (30, 0, 7, 'system', '获取所有角色', 3, '', 'system/role/getrole', '', '', 50, 1, 1, '2019-09-18 16:29:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (31, 0, 6, 'system', '改变角色状态', 3, '', 'system/role/changestatus', '', '', 50, 1, 1, '2019-09-18 16:29:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (32, 0, 6, 'system', '获取单条角色', 3, '', 'system/role/editfindrole', '', '', 50, 1, 1, '2019-09-18 16:30:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (33, 0, 6, 'system', '编辑单条角色', 3, '', 'system/role/editrole', '', '', 50, 1, 1, '2019-09-18 16:30:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (34, 0, 7, 'system', '添加管理员', 3, '', 'system/administrators/create', '', '', 50, 1, 1, '2019-09-18 16:35:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (36, 0, 7, 'system', '管理员列表获取', 3, '', 'system/administrators/getlist', '', '', 50, 1, 1, '2019-09-18 16:36:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (38, 0, 7, 'system', '获取所有角色', 3, '', 'system/administrators/getrole', '', '', 50, 1, 1, '2019-09-18 16:37:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (39, 0, 7, 'system', '改变管理员状态', 3, '', 'system/administrators/changestatus', '', '', 50, 1, 1, '2019-09-18 16:40:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (40, 0, 7, 'system', '获得单个信息', 3, '', 'system/administrators/editfindadministrators', '', '', 50, 1, 1, '2019-09-18 16:41:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (41, 0, 7, 'system', '编辑单个信息', 3, '', 'system/administrators/editadministrators', '', '', 50, 1, 1, '2019-09-18 16:42:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (42, 0, 4, 'system', '创建顶级菜单', 3, '', 'system/menu/createtop', '', '', 50, 1, 1, '2019-09-18 16:43:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (43, 0, 4, 'system', '创建子菜单', 3, '', 'system/menu/createchild', '', '', 50, 1, 1, '2019-09-18 16:43:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (44, 0, 4, 'system', '获得单条信息', 3, '', 'system/menu/getmenu', '', '', 50, 1, 1, '2019-09-18 16:45:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (45, 0, 4, 'system', '编辑单条信息', 3, '', 'system/menu/menuedit', '', '', 50, 1, 1, '2019-09-18 16:46:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (46, 0, 4, 'system', '删除菜单', 3, '', 'system/menu/deletemenu', '', '', 50, 1, 1, '2019-09-18 16:46:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (47, 0, 4, 'system', '获得菜单树', 3, '', 'system/menu/getmenutree', '', '', 50, 1, 1, '2019-09-18 16:47:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (48, 0, 6, 'system', '权限分配时获得菜单', 3, '', 'system/menu/getmenutreerole', '', '', 50, 1, 1, '2019-09-18 16:47:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (49, 0, 2, 'system', '获得账户角色权限的首页菜单', 3, '', 'system/menu/getauthmenu', '', '', 50, 1, 1, '2019-09-18 16:48:49', '2019-09-18 16:51:06', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (50, 0, 9, 'system', '添加模块', 3, '', 'system/module/create', '', '', 50, 1, 1, '2019-09-18 16:51:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (51, 0, 9, 'system', '获得模块列表', 3, '', 'system/module/getlist', '', '', 50, 1, 1, '2019-09-18 16:52:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (52, 0, 9, 'system', '获得单条信息', 3, '', 'system/module/editfindmodule', '', '', 50, 1, 1, '2019-09-18 16:52:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (53, 0, 9, 'system', '编辑单条信息', 3, '', 'system/module/editmodule', '', '', 50, 1, 1, '2019-09-18 16:53:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (54, 0, 9, 'system', '删除模块', 3, '', 'system/module/deletemodule', '', '', 50, 1, 1, '2019-09-18 16:53:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (55, 0, 4, 'system', '获得所有模块', 3, '', 'system/module/getmoduleconfig', '', '', 50, 1, 1, '2019-09-19 10:05:49', '2019-09-19 10:08:06', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (56, 0, 13, 'order', '订单审核', 3, '', 'admin/order/audit', '', '', 50, 1, 1, '2019-09-19 11:53:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (57, 0, 56, 'system', '订单查看', 4, '', 'admin/order/look', '', '', 50, 1, 1, '2019-09-19 11:53:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (58, 0, 1, 'system', '系统日志', 2, '', 'system/log', 'system-log.html', '', 50, 1, 1, '2019-09-19 16:28:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_menu` VALUES (59, 0, 58, 'system', '获得日志列表', 3, '', 'system/log/getlist', '', '', 50, 1, 1, '2019-09-19 16:53:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
