
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<p>Введите код с картинки:	</p>
<br/>
 <img style="border: 1px solid gray; background: url('img/bg_capcha.png');" src = "captcha.php" width="120" height="40"/>
<br/>
<form action="validator.php" method="POST">
	 <input type="text" name="capcha" />
	 <input type="submit" name="send" value="Отправить"/>
</form>
</body>
</html>



