<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>您好, {{ $username }} ！ 请点击下面链接完成注册:</p>
<a href="http://yewenshu.top/iBook2.0/public/index.php/checkVerifyEmail?verify={{ $token }}">激活链接</a>
</body>
</html>