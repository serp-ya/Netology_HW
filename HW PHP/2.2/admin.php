
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Тест</title>
</head>
<body>
  <form enctype="multipart/form-data" action="admin.php" method="POST">
    <input type="file" name="userfile">
    <input type="submit" value="Отправить">
  </form>
</body>
</html>

<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
$uploaddir = 'tests/';
if (isset($_FILES['userfile']['name'])) {
  $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
}

if (isset($_FILES['userfile']['tmp_name'])) {
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    print "Файл загружен." . "</br>";  
    echo  '<a href="list.php">"Список тестов"</a>';
  } 
}


?>