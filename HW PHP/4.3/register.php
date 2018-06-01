<?php

session_start();

include("config.php");
include("function.php");

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$pdo->exec("SET NAMES utf8;");

//

$login = isset($_POST['login']) ? trim($_POST['login']) : false;
$password = isset($_POST['password']) ? $_POST['password'] : false;

$message = "Введите данные для регистрации или войдите, если уже регистрировались:";

if (isset($_POST['register'])) {
    if (!empty($login) && !empty($password)) {
        $hashedPassword = md5($password);
        
        $sql = "SELECT login FROM user WHERE login = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([
            $login
        ]);
        
        if (empty($stm->fetchColumn())) {
            $sql = "INSERT INTO user (login, password) VALUES (?, ?)";
            $stm = $pdo->prepare($sql);
            $stm->execute([
                $login,
                $hashedPassword
            ]);
            
            login($login);
        } else {
            $message = "Такой пользователь уже существует в базе данных.";
        }
    } else {
        $message = "Ошибка регистрации. Введите все необхдоимые данные.";
    }
}

if (isset($_POST['sign_in'])) {
    if (!empty($login) && !empty($password)) {
        $hashedPassword = md5($password);
        
        $sql = "SELECT login FROM user WHERE login = ? AND password = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([
            $login,
            $hashedPassword
        ]);
        
        if (!empty($stm->fetchColumn())) {
            
            login($login);
        } else {
            $message = "Такой пользователь не существует, либо неверный пароль.";
        }
    } else {
        $message = "Ошибка входа. Введите все необхдоимые данные.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="container-fluid text-center">
    <p><?=$message?></p>
    <form method="POST">
        <input type="text" name="login" placeholder="Логин" />
        <input type="password" name="password" placeholder="Пароль" />
        <input class="btn btn-primary" type="submit" name="sign_in" value="Вход" />
        <input class="btn btn-success" type="submit" name="register" value="Регистрация" />
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>

