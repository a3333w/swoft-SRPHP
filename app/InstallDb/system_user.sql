SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `system_user`;
CREATE TABLE `system_user`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `role_id` tinyint(3) NOT NULL COMMENT '角色表id',
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '账号',
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `nike` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '昵称',
  `mobile` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  `auth` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '[优先角色权限，再可单独设置此管理员权限]',
  `iframe` tinyint(1) NOT NULL COMMENT '0默认 1框架',
  `theme` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'default' COMMENT '前台主题',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态 1正常 0非正常',
  `last_login_ip` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '最后登陆ip',
  `last_login_time` int(10) NOT NULL COMMENT '最后登陆时间',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  `dtime` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE COMMENT '账号唯一索引'
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '【系统】管理员账号表' ROW_FORMAT = Compact;
INSERT INTO `system_user` VALUES (1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '星河长明', '', '', '', 0, 'default', 0, '', 0, '0000-00-00 00:00:00', '2019-09-25 09:04:09', '0000-00-00 00:00:00');
INSERT INTO `system_user` VALUES (2, 2, 'ce1', 'e10adc3949ba59abbe56e057f20f883e', '', '18996416534', '329593870@qq.com', '', 0, 'default', 1, '', 0, '2019-09-17 15:28:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `system_user` VALUES (3, 4, 'ce2', 'e10adc3949ba59abbe56e057f20f883e', '', '18996416534', '329593870@qq.com', '', 0, 'default', 1, '', 0, '2019-09-17 16:00:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
SET FOREIGN_KEY_CHECKS = 1;