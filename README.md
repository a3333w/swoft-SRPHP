#  SRPHP

###  基于swoft的后台管理系统



### 必要部分（推荐）

- PHP，版本 `7.3`
- PHP 包管理器 **Composer**
- **PCRE** 库
- PHP 扩展 **Swoole**，版本 `4.4`
- 额外扩展：**PDO**、**Redis ** `>=4.0`
- SWOFT版本：`>=2.0.6`
- Mysql版本：`5.7`
- Nginx版本:`>=1.14`



###   安装流程

+ clone

+ .env文件 SWOFT_PATH为项目目录（例如：SWOFT_PATH=/www/swoft-SRPHP）

+ nginx root指向public/xadmin 

+ public/xadmin/admin/js/config.js 配置为所在项目

+ app/Http/Middleware/AuthMiddleware.php process方法注释掉除以下代码 （安装完成后解开注释）

  ```
  $response = $handler->handle($request);
  return $response;
  ```

+ php bin/swoft http:start 启动

+ my.cnf 加入[mysqld] sql_mode="NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" 

+ 安装向导：浏览器地址:端口

+ 安装配置：输入配置

+ 安装完成：浏览器进入（ 域名/admin），账号admin，密码admin



###  系统功能

+ 角色管理

  + 管理员管理
  + 用户管理
  + 管理员操作日志

+ 模块管理

  + 模块安装
  + 模块配置生成

+ 配置管理

  + 系统配置
  + 全局配置管理
  + 模块配置管理

+ 权限管理

  + 模块权限管理

  + 菜单权限管理

  + 单点登陆验证
