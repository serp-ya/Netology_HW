<?php 

// полчение теста из list.php и проверка на существование теста
if (file_exists($_GET['testname'])) {
	$a = $_GET['testname'];
   $file = file_get_contents($a);
   $fileDecode = json_decode($file, true); 

}else{
	
	header("HTTP/1.1 404 Not Found");
    echo "Not found";
    die();
}

    
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Тестирование</title>
</head>
<body>
	<p>Решите тест:</p>
	<ul>
		<li><a href="list.php">К списку</a></li>
	</ul>
<form action="result.php" method="POST">
	
		<?php foreach ($fileDecode as  $value) { ?>
		
		<fieldset>

		<legend><?= $label = $value['question'] ?></legend>
				
				<?php foreach ($value['input'] as $key => $it) { ?>
					<input type="radio" name="<?php echo $it['name']?>" value="<?php echo $it['value']?>">
				<?= $it['answer'] ?>
				<?php } ?>
		
		</fieldset>
		
		<?php }?>
		
		<input type="submit" value="Закончить">
		
		
	
</form>



	
</body>
</html>
