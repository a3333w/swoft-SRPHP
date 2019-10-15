SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` smallint(6) NOT NULL COMMENT '操作员id',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单标题',
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '发生动作的url',
  `param` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '参数 {\"group\":\"base\"}',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '发生动作',
  `count` smallint(6) NOT NULL COMMENT '动作计数',
  `ip` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '发生时的ip',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `dtime` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员操作日志表' ROW_FORMAT = Compact;
SET FOREIGN_KEY_CHECKS = 1;