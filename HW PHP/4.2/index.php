<?php 
include_once 'config.php';
include_once 'change.php';

$sql = "SELECT * FROM TODO";
$TODO = $sth->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
 	<style>
	h1 {
		text-align: center;
	}

    table { 
    	margin: 0 auto;
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
    table th {
        background: #eee;
    }

    .form {
    	display: flex; 
        align-items: left; 
        justify-content: center;

    } 

    .form>form:first-child {
    	margin-right: 20px;
    }
    
    </style>
 	<meta charset="UTF-8">
 	<title>Список дел</title>
</head>
<body>
 	<h1>Список дел на сегодня</h1>
 	<div class="form">
	    <form method="POST" action="add.php" >
            <input type="text" name="description" placeholder="Описание задачи"   />
            <input type="submit" name="save"  />
        </form>

        <form method="POST">
        	<label for="sort">Сортировать по:</label>
            <select name="sort_by">
            	<option value="date_add">Дате добавления</option>
            	<option value="status">Статусу</option>
            	<option value="description">Описанию</option>
            </select>
            <input type="submit" name="sort" value="Отсортировать">
        </form>
    </div> <br>
 	<table>
    <tr>
        <th>Описание задачи</th>
        <th>Дата добавления</th>
        <th>Статус</th>
        <th></th>
    </tr>
    <?php
    foreach ($TODO as $row) { ?>
        <tr>
          <td><?= $row['description'] ?></td>
          <td><?= $row['date_add'] ?></td>
          <td><?= $row['status'] ?></td>
          <td>
          	<a href='change.php?id=<?= $row['id']?> &action=change'>Изменить</a> 
          	<a href='change.php?id=<?= $row['id']?> &action=done'>Выполено</a> 
          	<a href='change.php?id=<?= $row['id']?> &action=delete'>Удалить</a>
          </td>         
        </tr>
     <?php } ?> 	
 	
</body>
</html>