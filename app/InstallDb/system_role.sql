SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `system_role`;
CREATE TABLE `system_role`  (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名称',
  `intro` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色简介',
  `auth` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '[1，2，3，4] 角色权限->菜单id',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  `dtime` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE COMMENT '角色唯一'
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '【系统】角色表' ROW_FORMAT = Compact;
INSERT INTO `system_role` VALUES (1, '超级管理员', '拥有至高无上权力的王者', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\"]', 1, '2019-09-10 14:10:31', '2019-09-12 18:20:06', '0000-00-00 00:00:00');
INSERT INTO `system_role` VALUES (2, '普通管理员', '分配部分权力', '[\"1\"]', 1, '2019-09-10 15:24:14', '2019-09-12 11:40:56', '0000-00-00 00:00:00');
INSERT INTO `system_role` VALUES (3, '其他普通管理员', '其他普通管理员权限', '[\"1\"]', 1, '2019-09-10 15:24:48', '2019-09-12 11:41:11', '0000-00-00 00:00:00');
SET FOREIGN_KEY_CHECKS = 1;