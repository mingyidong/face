<style>
body
{
	text-align:left; 
	height:500px;
	width:600px;
	top:50%;
	margin-top:330px;
	margin-left:650px;
	background-image:url(./imgs/back.jpg);
	background-position:center;
	background-repeat:repeat-y;
}
</style>
<html>
<head>
<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />

</head>
<body>
<form method = "get" action = "recognition.php">
请选择测试图片地址<br>
<input type = "file" name = "testImgPath">
<br>
<input type="submit" name="submit" value="提交">
<input type="reset" name="reset" value = "重置"> 
</body>
</html>