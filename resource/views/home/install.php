<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SRPHP安装向导</title>
</head>
<body>
<p style="display: block;text-align: center">作者很懒，就不写样式了。也不想写你的数据库判断了。请你自己完全写对，不然你会重新安装</p>

<form action="/installpost" method="post" style="text-align:center;margin: auto;padding-top: 5%;">
    <input type="hidden" name="install" value="1">
    数据库IP:<br>
    <input type="text" name="ip" value="">
    <br>
    库名:<br>
    <input type="text" name="dbname" value="">
    <br>
    数据库账号:<br>
    <input type="text" name="username" value="">
    <br>
    密码:<br>
    <input type="password" name="passwd" value="">
    <br>
    <br>
    <input type="submit" value="提交" style="text-align: center">
</form>

</body>
</html>
