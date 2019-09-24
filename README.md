# SRPHP
基于swoft的http服务和xadmin的模块化开发框架。
角色管理，管理员管理，订单管理，权限管理，系统设置，配置管理，管理员操作日志,模块安装。
兼容普通用户及管理员用户的验证及模块权限区分。
（将不定期更新）。


author:刘乔木 
email:329593870@qq.com
For you with stars in your eyes。Every spring, summer, autumn and winter。

更新日志：
10月7日支持swoft2.0.6
10月7日支持一键安装
10月7日将取消包启动改为项目启动（php swoftcli.phar run -c http:start 将改为 swoft http:start）

配置SRPHP
1、将bean.php中DB1,DB2账号密码变为自己的 
2、将app\InstallDb中数据库文件数据入库 
3、请将首页地址指向xadmin目录 
4、配置好后输入php swoftcli.phar run -c http:start 

演示地址：http://swoft.lkvip.com/admin/  admin admin
