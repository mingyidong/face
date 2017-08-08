<style>
body
{
	text-align:left; 
	height:500px;
	width:600px;
	top:50%;
	margin-top:330px;
	margin-left:590px;
	background-image:url(./imgs/back.jpg);
	background-position:center;
	background-repeat:repeat-y;
}
</style>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>测试提交</title>
</head>
<body>

<form action="train.php" method="get">
请输入训练图像文件夹路径名:<br>比如D:/test
<br>
训练需要一段时间，请耐心等待呀O(∩_∩)O亲！
<br>

<input type="text" name="trainDir">
<br>

<input type="submit" name="submit" value="提交">
<input type="reset" name="reset" value = "重置"> 
</form>
</body>
</html>

