SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
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
  UNIQUE INDEX `title`(`title`) USING BTREE COMMENT '标题唯一',
  UNIQUE INDEX `url`(`url`) USING BTREE COMMENT '路由唯一'
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '【系统】菜单表' ROW_FORMAT = Compact;
INSERT INTO `system_menu` VALUES (1, 0, 0, 'system', '系统基础', 1, '', 'system', '', '', 50, 1, 1, '2019-09-12 14:53:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
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
SET FOREIGN_KEY_CHECKS = 1;