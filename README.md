# SRPHP
基于swoft的http服务和xadmin的模块化开发框架。角色管理，管理员管理，订单管理，权限管理，系统设置，配置管理，管理员操作日志,模块安装。兼容普通用户及管理员用户的验证及模块权限区分。如果你是swoft的使用者，又想摆脱繁杂庞大的后台系统开发工作。这或许是不错的选择。
（将不定期更新）。

author:刘乔木 
email:329593870@qq.com
For you with stars in your eyes。Every spring, summer, autumn and winter。

更新10月7日：版本1.0
1、支持swoft2.0.2
2、项目启动php swoftcli.phar run -c http:start

配置:
1、将bean.php中DB1,DB2账号密码变为自己的 
2、将app\InstallDb中数据库文件数据入库 
3、请将首页地址指向xadmin目录 
4、配置好后输入php swoftcli.phar run -c http:start 

10月16日更新：版本1.1
1、支持一件安装(自动生成主要配置文件及数据库数据)
2、完美支持swoft2.0.6
3、php bin/swoft http:start 启动


配置:
1、clone文件至项目文件夹
2、改.env中SWOFT_PATH为项目目录（例如：SWOFT_PATH=/data/swoft/swoft）
3、nginx root设置为项目目录下的app/xadmin
4、将xadmin/admin/js/config.js 配置文件配置成你所在项目
5、php bin/swoft http:start 启动(如果是18306端口)
6、浏览器输入地址+端口进入安装向导
7、点击开始安装输入相关信息，点击提交(注意php版本、MySQL版本、swoole版本及各项服务是否打开)
8、安装完成后 浏览器输入(地址:端口/admin)，账号admin 密码admin 进入控制台 结束

演示地址：http://47.92.79.128/admin/  admin admin  
