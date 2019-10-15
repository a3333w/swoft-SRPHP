SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `system_menu_lang`;
CREATE TABLE `system_menu_lang`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `menu_id` smallint(6) NOT NULL COMMENT '菜单表id',
  `title` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `lang` tinyint(3) NULL DEFAULT NULL COMMENT '语言包',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '【系统】菜单语言包配置表' ROW_FORMAT = Compact;
SET FOREIGN_KEY_CHECKS = 1;