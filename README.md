#  SRPHP

###  基于swoft的后台管理系统

基于swoft，基于xadmin，前后台分离。

#####  特色：

1. 模块移植性：按设想，按目录结构研发，适合做前中后台，具有良好的模块移植性。
2. 灵活的配置管理：系统配置（数据库、配置文件）、模块配置（数据库、配置文件）
3. 灵活的权限验证：管理员（菜单、身份、模块权限）、用户（身份、模块权限）的接口权限
4. 高性能：基于swoole，良好的进程池、线程池，并发能力强
5. 协程：节省上下文切换资源，不在内核空间进行系统调用
6. 数据库备份、修复（自动功能，下次更新，计划半年无奈没时间）

#####  劣势：

1. 与apache架构php_mod运行模式相比，稳定性稍弱
2. 与nginx架构fast-cgi相比，静态处理能力较弱，且进程资源同样小且不稳定

email：329593870@qq.com author：刘浪同学

水平有限，不对的地方还请谅解。如果有问题可以邮箱我，尽量抽空回。

swoft的使用多看看swoft文档，SRPHP的使用及方法文档持续（有空）更新

swoft快不基于swoole了，赶紧更新一波。但写文档是个麻烦的事情。（所以不定期更新，近期会更新SRPHP的部分使用方式和方法）



###  SRPHP使用技术栈建议

+ 对linux系统调用有一定了解（熟悉微内核架构）

+ 对中间件(nginx)异步有一定了解

+ 熟悉swoole，并了解一定其异步原理

+ 熟悉协程（通常情况下会由用户态到内核态，再由内核进行系统调用，涉及比较多的用户空间与内核空间上下文切换，协程会在用户空间进行处理）


### 必要部分（推荐）

- PHP，版本 `7.3`
- PHP 包管理器 **Composer**
- **PCRE** 库
- PHP 扩展 **Swoole**，版本 `4.4`
- 额外扩展：**PDO**,**Redis** >= 4.0
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

+ 安装配置：输入配置初始化数据库(注意配置mysql数据库连接权限,并刷新设置)

+ 安装完成：浏览器进入（ 域名/admin），账号admin，密码admin

+ 重新打开app/Http/Middleware/AuthMiddleware.php process方法注释及app/Aspect文件夹下文件注释



###  生命周期

1. bean容器：SWOFT核心bean容器在项目启动时实例化90%部分；项目bean容器在启动完成后实例化

2. PHP：启动后模块初始化（保持）-->请求初始化-->执行阶段-->请求关闭-->模块保持(释放局部资源，保持全局和静态资源。注意内存溢出问题，使用良好的回收清理习惯。所以SRPHP的系统配置写好了，如何运用在周期中看个人。)


###  文件结构
```
app
| Annotation
| Aspect //AOP
| Common //基础
| Console
| Exception
| Helper //助手
| Http //http服务
| nstallDb //mysql初始化文件
| Listener //监听
| Logic
|   | System //系统模块逻辑层
|   | local //本地模块逻辑层（安装模块会生成）
| Migration
| Model
|   | BaseService
|   | System //系统模块数据处理
|   | Local //本地模块的数据处理（安装模块时生成）
| Process
| Rpc
| Task
| Tcp
| Utils
| Validator
| WebSocket
bin
config
| properties //jwt
| version //接口版本
| 本地模块的配置目录、基础配置文件
database
public
| xadmin
| image
resource
runtime
test
vendor
```

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
+ 数据库备份、修复（带自动，下次更新时）

http://121.36.11.159/admin/  admin  admin  测试地址。
