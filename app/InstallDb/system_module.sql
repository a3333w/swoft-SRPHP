SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `system_module`;
CREATE TABLE `system_module`  (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `system` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否系统模块 1是 2否',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块名称',
  `identifier` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块标识（模块名（字母）.开发者标识.module）',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块标题',
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块简介',
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '作者',
  `icon` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图标',
  `version` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '版本号',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块文档url',
  `sort` tinyint(4) NOT NULL DEFAULT 50 COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `default` tinyint(1) NOT NULL COMMENT '默认模板',
  `config` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置文件夹',
  `theme` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'default' COMMENT '主题模板',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  `dtime` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `title`(`title`) USING BTREE COMMENT '模块标题',
  UNIQUE INDEX `name`(`name`) USING BTREE COMMENT '模块名称',
  UNIQUE INDEX `identifier`(`identifier`) USING BTREE COMMENT '模块标识'
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '【系统】 模块表' ROW_FORMAT = Compact;
SET FOREIGN_KEY_CHECKS = 1;